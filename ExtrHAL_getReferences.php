<?php
function getReferences($infoArray,$resArray,$sortArray,$docType,$collCode_s,$specificRequestCode,$countries,$anneedeb,$anneefin,$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$idst,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$FnmH,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7){
	 static $listedoi = "";
	 include "ExtrHAL_rang_AERES_SHS.php";
   include "ExtrHAL_rang_CNRS.php";
   include "ExtrHAL_revues_AERES_HCERES.php";
   $docType_s = $docType;
   if (isset($idhal) && $idhal != "") {
		 $atester = "authIdHal_s:".$collCode_s;
		 $atesteropt = "";
	 }else{
		 if (isset($refint) && $refint != "") {
			 $tstRefint = "%22".$refint."%22";
			 if (strpos($refint, "~") !== false) {
				 $tstRefint = "(";
				 $tabRefint = explode("~", $refint);
				 foreach($tabRefint as $ri) {
					 $tstRefint .= "%22".$ri."%22%20OR%20";
				 }
				 $tstRefint = substr($tstRefint, 0, -8);
				 $tstRefint .= ")";
			 }
			 if (strtolower($collCode_s) == "entrez le code de votre collection") {$collCode_s = "";}
			 if ($teamInit != "") {
				 $atester = "collCode_s:".$teamInit;
				 $atesteropt = "%20AND%20localReference_t:".$tstRefint;
			 }else{
				 if ($idst != "") {
					 $atester = "structId_i:".$idst;
					 $atesteropt = "%20AND%20localReference_t:".$tstRefint;
				 }else{
					 $atester = "";
					 $atesteropt = "localReference_t:".$tstRefint;
				 }
			 }
		 }else{
			 if ($idst != "") {
				 $atester = "structId_i:".$idst;
				 $atesteropt = "";
			 }else{
				 $atester = "collCode_s:".$teamInit;
				 $atesteropt = "";
			 }
		 }
	 }
	 
	 //Langue des documents
	 if (isset($typlng)) {
		 if ($typlng == "lngf") {
			 $atesteropt .= "%20AND%20language_s:\"fr\"";
		 }else{
			 if ($typlng == "lnga") {
				 $atesteropt .= "%20AND%20NOT%20language_s:\"fr\"";
			 }
		 }
	 }
	 
	 $atesteropt = str_replace(" ", "%20", $atesteropt);
	 
		if ($docType_s == "COMM" || $docType_s == "POSTER" || $docType_s == "COMM+POST") {
			//Période de recherche
			if (isset($anneedeb) && $anneedeb != "" && isset($anneefin) && $anneefin != "") {
				//Conversion des dates au format HAL ISO 8601 jj/mm/aaaa > aaaa-mm-jjT00:00:00Z
				$tabanneedeb = explode('/', $anneedeb);
				$anneedebiso = $tabanneedeb[2].'-'.$tabanneedeb[1].'-'.$tabanneedeb[0].'T00:00:00Z';
				$tabanneefin = explode('/', $anneefin);
				$anneefiniso = $tabanneefin[2].'-'.$tabanneefin[1].'-'.$tabanneefin[0].'T00:00:00Z';
				$periodeiso = '['.$anneedebiso.'%20TO%20'.$anneefiniso.']';
			}
			$replinit = '%20AND%20(producedDate_tdate:'.$periodeiso.'%20OR%20publicationDate_tdate:'.$periodeiso.')';
			$replfini = '%20AND%20((proceedings_s:0%20AND%20conferenceStartDate_tdate:'.$periodeiso.')%20OR%20(proceedings_s:1%20AND%20((NOT%20publicationDate_tdate:*%20AND%20conferenceStartDate_tdate:'.$periodeiso.')%20OR%20(publicationDate_tdate:'.$periodeiso.'))))';
			$specificRequestCode = str_replace($replinit, $replfini, $specificRequestCode);
		}
	 
	 $reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:".$docType_s.$specificRequestCode."&rows=0";
   $contents = file_get_contents($reqAPI);
	 //echo $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:".$docType_s.$specificRequestCode."&rows=0";

   if ($docType_s=="COMM+POST"){
			$reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20(docType_s:\"COMM\"%20OR%20docType_s:\"POSTER\")".$specificRequestCode."&rows=0";
      $contents = file_get_contents($reqAPI);
   }
	 if ($docType_s=="OUV+COUV"){
			$reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20(docType_s:\"OUV\"%20OR%20docType_s:\"COUV\")".$specificRequestCode."&rows=0";
      $contents = file_get_contents($reqAPI);
   }
   if ($docType_s=="OUV+DOUV"){
			$reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20(docType_s:\"OUV\"%20OR%20docType_s:\"DOUV\")".$specificRequestCode."&rows=0";
      $contents = file_get_contents($reqAPI);
   }
   if ($docType_s=="OUV+COUV+DOUV"){
      $reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20(docType_s:\"OUV\"%20OR%20docType_s:\"COUV\"%20OR%20docType_s:\"DOUV\")".$specificRequestCode."&rows=0";
			$contents = file_get_contents($reqAPI);
   }
	 if ($docType_s=="CNR"){
      $reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:\"DOUV\"".$specificRequestCode."&rows=0";
			$contents = file_get_contents($reqAPI);
   }
   if ($docType_s=="UNDEF"){
      $reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:\"UNDEFINED\"".$specificRequestCode."&rows=0";
			$contents = file_get_contents($reqAPI);
   }
	 if ($docType_s=="CRO" || $docType_s=="BLO" || $docType_s=="NED" || $docType_s=="TRA"){
      $reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:\"OTHER\"".$specificRequestCode;
			$contents = file_get_contents($reqAPI);
   }
	 if ($docType_s=="LOG"){
      $reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:\"SOFTWARE\"".$specificRequestCode."&rows=0";
			$contents = file_get_contents($reqAPI);
   }
   if ($docType_s!="OUV+COUV" && $docType_s!="OUV+DOUV" && $docType_s!="OUV+COUV+DOUV" && $docType_s!="UNDEF" && $docType_s!="COMM+POST" && $docType_s!="CRO" && $docType_s!="BLO" && $docType_s!="NED" && $docType_s!="TRA" && $docType_s!="CNR"){
      $reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:".$docType_s.$specificRequestCode."&rows=0";
			$contents = file_get_contents($reqAPI);
    }
   $contents = utf8_encode($contents);
   $results = json_decode($contents);
	 $numFound = 0;
	 if (isset($results->response->numFound)) {$numFound=$results->response->numFound;}
	 
	 $fields = "abstract_s,anrProjectReference_s,arxivId_s,audience_s,authAlphaLastNameFirstNameId_fs,authFirstName_s,authFullName_s,authIdHalFullName_fs,authLastName_s,authMiddleName_s,authorityInstitution_s,bookCollection_s,bookTitle_s,city_s,collCode_s,comment_s,conferenceEndDateD_i,conferenceEndDateM_i,conferenceEndDateY_i,conferenceStartDate_s,conferenceStartDateD_i,conferenceStartDateM_i,conferenceStartDateY_i,conferenceTitle_s,country_s,defenseDateY_i,description_s,director_s,docid,docType_s,doiId_s,europeanProjectCallId_s,files_s,halId_s,invitedCommunication_s,isbn_s,issue_s,journalIssn_s,journalTitle_s,label_bibtex,label_s,language_s,localReference_s,nntId_id,nntId_s,number_s,page_s,peerReviewing_s,popularLevel_s,proceedings_s,producedDateY_i,publicationDateY_i,publicationLocation_s,publisher_s,publisherLink_s,pubmedId_s,related_s,reportType_s,scientificEditor_s,seeAlso_s,serie_s,source_s,*_subTitle_s,subTitle_s,swhId_s,*_title_s,title_s,version_i,volume_s,authQuality_s,authIdHasPrimaryStructure_fs,inPress_bool,submitType_s,linkExtId_s,wosId_s,linkExtUrl_s,files_s";

   //Cas particuliers pour combinaisons
   if ($docType_s=="COMM+POST"){
      $reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20(docType_s:\"COMM\"%20OR%20docType_s:\"POSTER\")".$specificRequestCode."&rows=".$numFound."&fl=".$fields."&sort=auth_sort%20asc";
			$contents = file_get_contents($reqAPI);
   }
	 if ($docType_s=="OUV+COUV"){
      $reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20(docType_s:\"OUV\"%20OR%20docType_s:\"COUV\")".$specificRequestCode."&rows=".$numFound."&fl=".$fields."&sort=auth_sort%20asc";
			$contents = file_get_contents($reqAPI);
   }
   if ($docType_s=="OUV+DOUV"){
			$reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20(docType_s:\"OUV\"%20OR%20docType_s:\"DOUV\")".$specificRequestCode."&rows=".$numFound."&fl=".$fields."&sort=auth_sort%20asc";
			$contents = file_get_contents($reqAPI);
   }
   if ($docType_s=="OUV+COUV+DOUV"){
			$reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20(docType_s:\"OUV\"%20OR%20docType_s:\"COUV\"%20OR%20docType_s:\"DOUV\")".$specificRequestCode."&rows=".$numFound."&fl=".$fields."&sort=auth_sort%20asc";
			$contents = file_get_contents($reqAPI);
   }
   if ($docType_s=="UNDEF"){
      $reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:\"UNDEFINED\"".$specificRequestCode."&rows=".$numFound."&fl=".$fields."&sort=auth_sort%20asc";
			$contents = file_get_contents($reqAPI);
   }
	 if ($docType_s=="CRO" || $docType_s=="BLO" || $docType_s=="NED" || $docType_s=="TRA"){
			$reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt.$specificRequestCode."&rows=".$numFound."&fl=".$fields."&sort=auth_sort%20asc";
			$contents = file_get_contents($reqAPI);
	 }
	 if ($docType_s=="SOFTWARE"){
      $reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:\"UNDEFINED\"".$specificRequestCode."&rows=".$numFound."&fl=".$fields."&sort=auth_sort%20asc";
			$contents = file_get_contents($reqAPI);
   }
	 if ($docType_s=="CNR"){
			$reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:\"DOUV\"".$specificRequestCode."&rows=".$numFound."&fl=".$fields."&sort=auth_sort%20asc";
			$contents = file_get_contents($reqAPI);
	 }
   if ($docType_s!="OUV+COUV" && $docType_s!="OUV+DOUV" && $docType_s!="OUV+COUV+DOUV" && $docType_s!="UNDEF" && $docType_s!="COMM+POST"  && $docType_s!="CRO" && $docType_s!="BLO" && $docType_s!="NED" && $docType_s!="TRA" && $docType_s!="CNR"){
      $reqAPI = $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:".$docType_s.$specificRequestCode."&rows=".$numFound."&fl=".$fields."&sort=auth_sort%20asc";
			$contents = file_get_contents($reqAPI);
      //$contents = utf8_encode($contents);
    }
   //echo "http://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:".$docType_s.$specificRequestCode."&rows=".$numFound."&fl=".$fields."&sort=auth_sort%20asc";
	 
	 //suite avec URL requête API
	 echo "<a target='_blank' href='".$reqAPI."'>URL requête API HAL</a>";
	 
   ini_set('memory_limit', '256M');
   $results = json_decode($contents);
	 
	 //Recherche des auteurs de la collection grâce aux affiliations > ne pas appliquer si extraction sur un IdHAL
	 if ($idhal == "") {
		 $strId = "~";
		 $tabLA = explode("%7E", $listaut);//%7E <=> ~
		 foreach($tabLA as $la) {
			 if (is_numeric($la)) {
				 $reqId = "https://api.archives-ouvertes.fr/ref/structure/?q=docid:".$la."%20AND%20country_s:%22fr%22&fl=docid";
			 }else{
				$reqId = "https://api.archives-ouvertes.fr/ref/structure/?q=(name_t:".$la."%20OR%20acronym_t:".$la.")%20AND%20valid_s:(VALID%20OR%20OLD)%20AND%20country_s:%22fr%22&fl=docid";
			 }
			 $conId = file_get_contents($reqId);
			 $resId = json_decode($conId);
			 $nF = 0;
			 if (isset($resId->response->numFound)) {$nF = $resId->response->numFound;}
			 if ($nF != 0) {
				 foreach($resId->response->docs as $entry){
					 $strId .= $entry->docid."~";
				 }
			 }
			 
			 if ($strId != "~") {
				 $tabId = explode("~", $strId);
				 foreach($tabId as $Id) {
					 if ($Id != "") {
						 foreach($results->response->docs as $entry){
							 foreach($entry->authIdHasPrimaryStructure_fs as $auth){
								 $tabAuth = explode("_FacetSep_", $auth);
								 if (strpos($tabAuth[1], $Id) !== false) {//Auteur de la collection
									 $tabQ = explode("_JoinSep_", $tabAuth[1]);
									 $indQ = 0;
									 foreach($entry->authFullName_s as $funa){
										if ($funa == $tabQ[0] && stripos($listenomcomp1, nomCompEntier($entry->authLastName_s[$indQ])." ".prenomCompEntier($entry->authFirstName_s[$indQ])) === false) {
											 $prenom = prenomCompInit($entry->authFirstName_s[$indQ]);
											 $listenominit .= nomCompEntier($entry->authLastName_s[$indQ])." ".$prenom.".~";
											 $listenomcomp1 .= nomCompEntier($entry->authLastName_s[$indQ])." ".prenomCompEntier($entry->authFirstName_s[$indQ])."~";
											 $listenomcomp2 .= prenomCompEntier($entry->authFirstName_s[$indQ])." ".nomCompEntier($entry->authLastName_s[$indQ])."~";
											 $listenomcomp3 .= mb_strtoupper(nomCompEntier($entry->authLastName_s[$indQ]), 'UTF-8')." (".prenomCompEntier($entry->authFirstName_s[$indQ]).")~";
											 $arriv .= "1900~";
											 $moisactuel = date('n', time());
											 if ($moisactuel >= 10) {$idepar = date('Y', time())+1;}else{$idepar = date('Y', time());}
											 $depar .= $idepar."~";
											 break;
										 }
										 $indQ++;
									 }
								 }
							 }
						 }
					 }
				 }
			 }
		 }
	 }
	 //echo $listenomcomp1;
   //var_dump($results->response->docs);
	 
	 //Vérification préalable > Si 2 notices ont des liens HAL identiques, n'en afficher qu'une seule (avec priorité pour celle qui a un PDF le cas échéant)
	 $tabAff = array();
	 $tabHid = array();
	 $tabFil = array();
	 $tab = 0;
	 foreach($results->response->docs as $entry){
		 if (!in_array($entry->halId_s, $tabHid)) {
			 $tabHid[$tab] = $entry->halId_s;
			 $tabAff[$tab] = "oui";
			 if (isset($entry->files_s[0]) && $entry->files_s[0] != "") {$tabFil[$tab] = "oui";}else{$tabFil[$tab] = "non";}
		 }else{
			 $numFound--;
			 $key = array_search($entry->halId_s, $tabHid);
			 if ($tabFil[$key] == "oui") {$tabAff[$tab] = "non";}else{$tabAff[$key] = "non"; $tabAff[$tab] = "oui";}
		 }
		 $tab++;
	 }
	 $tab = 0;
	 
	 //Est-ce que les notices significatives sont à mettre en évidence ?
	 if (isset($typsign) && $typsign != "ts0") {
			include "./pvt/signif.php";
			$isign = 0;
			foreach($results->response->docs as $entry){
				$results->response->docs[$isign]->signif = (in_array($entry->halId_s, $signif)) ? "oui" : "ras";
				$isign++;
			}
			usort($results->response->docs, function($a, $b) {return strcmp($b->signif, $a->signif);});
	 }
	 //var_dump($results->response->docs);
   $iRA = 0;
   $nmoOrd = 0;
	 $signTxt = "&#8594;&nbsp;";
	 
	 if ($numFound != 0) {
		 foreach($results->response->docs as $entry){
			 if ($tabAff[$tab] == "oui") {
				//Si notices significatives à mettre en évidence, il faut pouvoir les extraire en tête de liste > ajout d'un paramètre à $sortArray
				$sign = (isset($entry->signif) && $entry->signif == "oui") ? "oui" : "ras";
				//Si demandé > si auteurs de la collection interrogée apparaissent soit en 1ère position, soit en position finale, mettre toute la citation en gras
				$debgras = "";
				$fingras = "";
				$CA = "N"; //HCERES > Publication en premier, dernier ou corresponding auteur
				$img = "";
				$chaine1 = "";
				$chaine2 = "";
				$chaineH = "";
				$listTit = "";
				if(isset($entry->files_s)){
					 $img="<a href=\"".$entry->files_s[0]."\"><img alt=\"Haltools PDF\" src=\"http://haltools-new.inria.fr/images/Haltools_pdf.png\"/></a>";
				}
				$img.=" <a href=\"http://api.archives-ouvertes.fr/search/".$institut."?q=docid:".$entry->docid."&wt=bibtex\"><img alt=\"Haltools bibtex\"
				src=\"http://haltools-new.inria.fr/images/Haltools_bibtex3.png\"/></a>";

				$entryInfo0 = "";//Début avec auteurs + titre + année + revue
				$entryInfo0H = "";//Idemn mais réduit à la mise en évidence des sous équipes pour l'export HCERES
				$entryInfo = "";//Suite avec doi + pubmed + ...

				//Est-ce une notice significative à mettre en évidence et, si oui, faut-il l'afficher ?
				if (isset($entry->signif) && $entry->signif == "oui") {
					//$entryInfo0 .= "<img alt='Important' title='Notice importante' src='./img/sign.jpg'>&nbsp;";
					$entryInfo0 .= $signTxt;
					//$resArray[$iRA]["authors"] = $extract;
				}

				//Adding collCode_s for specific case GR
				$listColl = "~";
				if (isset($collCode_s) && $collCode_s != "" && isset($gr) && (strpos($gr, $collCode_s) !== false)) {
					foreach($entry->collCode_s as $coll){
						if (strpos($listColl, "~".$coll."~") === false) {
							$listColl .= "~".$coll."~";
							for($i = 1; $i <= $nbeqp; $i++) {
								if (isset($_POST["soumis"])) {
									if ($coll == strtoupper($_POST['eqp'.$i])) {
										$entryInfo0 .= "GR".$i." - ¤ - ";
										$entryInfo0H .= "GR".$i." - ¤ - ";
										$eqpgr = strtoupper($_POST['eqp'.$i]);
										break;
									}
								}
								if (isset($_GET["team"])) {
									if ($coll == $_GET['eqp'.$i]) {
										$entryInfo0 .= "GR".$i." - ¤ - ";
										$entryInfo0H .= "GR".$i." - ¤ - ";
										$eqpgr = $_GET['eqp'.$i];
										break;
									}
								}
							}
						}
					}
					$chaine1 .= "Collection";
					$chaine2 .= $entryInfo0;
					$resArray[$iRA]["GR"] = $entryInfo0;
				}

				//Le champ 'producedDateY_i' n'est pas obligatoire pour les communications et posters > on testera alors avec publicationDateY_i ou conferenceStartDateY_i
				if ($docType_s != "COMM" && $docType_s != "POSTER" && $docType_s != "COMM+POST") {
					if (isset($entry->inPress_bool)) {//Notice à paraître
						if ($entry->inPress_bool == false) {$dateprod = $entry->producedDateY_i;}else{$dateprod = "0000";}
					}else{
						$dateprod = $entry->producedDateY_i;
					}
				}else{
					if ($entry->proceedings_s == 0) {//Publications SANS actes > année = date de congrès
						$dateprod = $entry->conferenceStartDateY_i;
					}else{
						//if (isset($entry->producedDateY_i)) {
						if (isset($entry->publicationDateY_i)) {
							$dateprod = $entry->publicationDateY_i;
						}else{
							$dateprod = $entry->conferenceStartDateY_i;
						}
					}
				}

				//Est-ce une notice significative à mettre en évidence et, si oui, faut-il l'afficher ?
				$chaine1 = (isset($entry->signif) && $entry->signif == "oui") ?"Sélection HCERES" : "";
				$chaine2 = (isset($entry->signif) && $entry->signif == "oui") ? "Oui" : "";

				//Adding authors
				$initial = 1;
				$initialH = 1;
				$i = 0;
				$affil = "aucune";
				
				foreach($entry->authLastName_s as $nom){
					//$nom = ucwords(mb_strtolower($nom, 'UTF-8'));
					$nom = ucwords(nomCompEntier(str_replace("&apos;", "'", $nom)), "'");
					$nomH = ucwords(nomCompEntier(str_replace("&apos;", "'", $nom)), "'");
					$prenom = ucfirst(mb_strtolower(str_replace("&apos;", "'", $entry->authFirstName_s[$i]), 'UTF-8'));
					$prenomH = ucfirst(mb_strtolower(str_replace("&apos;", "'", $entry->authFirstName_s[$i]), 'UTF-8'));
					$prenomPlus = "";
					//if (isset($entry->authMiddleName_s[$i])) {
					if (isset($entry->authMiddleName_s[0])) {
						foreach($entry->authMiddleName_s as $mid){
							$midTab = explode(" ", $mid);
							if (stripos($entry->authIdHalFullName_fs[$i], $midTab[0]." ") !== false || stripos($entry->authIdHalFullName_fs[$i], $midTab[0].". ") !== false) {//Pour vérifier qu'authMiddleName s'applique bien à cet auteur
								$prenomPlus = ucwords(mb_strtolower(str_replace("&apos;", "'", $mid), 'UTF-8'));//Champ HAL prévu pour complément prénom
								//echo 'toto : '.$nom.' '.$prenom.' '.$prenomPlus.'<br>';
							}
						}
					}
					
					//Si, Nom, initiale du prénom
					if ($typnom == "nominit") {
						//$prenominit = $prenom;
						//si prénom composé et initiales
						$prenomentier = $prenom;
						$prenom = prenomCompInit($prenom);
						$prenominit = $prenom;
						//si prénom décliné "à l'américaine"
						if (strpos($prenom, " ") !== false) {
							$tabpren = explode(" ", $prenom);
							$prenom = $tabpren[0];
						}
						if ($prenomPlus != "") {
							$prenomPlus = prenomCompInit($prenomPlus);
							$prenomPlus = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $prenomPlus);
						}
						$prenom2 = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $prenominit);
						$nom2 = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $nom);
						$deb = "";
						$fin = "";
						if ($initial == 1){
							$initial = 0;
							$authors = "";
						}else{
							$authors .= ", ";
						}
						//if (stripos(wd_remove_accents($listenominit), wd_remove_accents($nom." ".$prenom)) === false) {
						//Pour éviter les faux homonymes avec les initiales > J. Crassous (pour Jérôme Crassous) et J. Crassous (Jeanne Crassous)
						//Si demandé et si authQuality_s renseigné, mettre en évidence l'auteur correspondant
						if ($typcrp == "oui") {
							if ($entry->authQuality_s[$i] == "crp") {$fin .= "*";}
						}
						if (stripos(wd_remove_accents($listenomcomp1), wd_remove_accents("~".$nom." ".str_replace(".", "", $prenomentier))) === false) {
						}else{
							//On vérifie que l'auteur est bien dans la collection pour l'année de la publication
							$pos = stripos(wd_remove_accents($listenominit), wd_remove_accents($nom." ".$prenom));
							/*
							if ($nom == "Roquelaure" || $nom == "Jouan") {
								echo '<script>console.log("'.$pos." > ".wd_remove_accents($nom." ".$prenom).'");</script>';
							}
							*/
							$pos = substr_count(mb_substr($listenominit, 0, $pos, 'UTF-8'), '~');
							$crit = 0;
							for ($k = 1; $k <= $pos; $k++) {
								$crit = strpos($arriv, '~', $crit+1);
								//echo 'toto : '.strlen($arriv).' - '.$crit.'<br>';
								//echo 'toto : '.$arriv.'<br>';
								//echo 'toto : '.$depar.'<br>';
							}
							$datearriv = substr($arriv, $crit-4, 4);
							$datedepar = substr($depar, $crit-4, 4);
							//echo 'titi : '.$dateprod <= $datedepar;
							/*
							if ($nom == "Roquelaure" || $nom == "Jouan") {
								echo '<script>console.log("'.$listenominit.'");</script>';
								echo '<script>console.log("'.$nom." ".$prenom." > ".$datearriv." - ".$datedepar." > ".$pos.'");</script>';
							}
							*/
							if (($dateprod >= $datearriv && $dateprod <= $datedepar) || $dateprod == "0000") {
								$affil = "ok";
								if ($typcol == "soul") {$deb .= "<u>";$fin .= "</u>";}
								if ($typcol == "gras") {$deb .= "<strong>";$fin .= "</strong>";}
								if ($typcol == "aucun") {$deb .= "";$fin .= "";}
								//Si demandé > si auteurs de la collection interrogée apparaissent soit en 1ère position, soit en position finale, mettre toute la citation en gras
								if ($typgra == "oui" && ($i == 0 || $i == count($entry->authLastName_s) - 1)) {$debgras = "<strong>"; $fingras = "</strong>";}
								//HCERES > Test pour savoir si un auteur de la collection est premier auteur OU dernier auteur OU auteur correspond 
								if ($i == 0 || $i == count($entry->authLastName_s) - 1 || $entry->authQuality_s[$i] == "crp") {$CA = "O";}
							}
						}
						//Pour COMM et POSTER, si authQuality_s renseigné, souligner automatiquement les orateurs ou présentateurs
						if ($docType_s == "COMM" || $docType_s == "POSTER" || $docType_s == "COMM+POST") {
							if ($entry->authQuality_s[$i] == "spk" || $entry->authQuality_s[$i] == "presenter") {$deb .= "<u>";$fin .= "</u>";}
						}
						if ($prenomPlus != "") {
							$authors .= $nom2."troliesp".$prenom2."troliesp".$prenomPlus;
							$authors = mise_en_evidence(wd_remove_accents($nom2."troliesp".$prenom2."troliesp".$prenomPlus), $authors, $deb, $fin);
							$authors = mise_en_evidence(wd_remove_accents("troliesp".$nom2."troliesp".$prenom2."troliesp".$prenomPlus), $authors, $deb, $fin);
						}else{
							$authors .= $nom2."troliesp".$prenom2;
							$authors = mise_en_evidence(wd_remove_accents($nom2."troliesp".$prenom2), $authors, $deb, $fin);
							$authors = mise_en_evidence(wd_remove_accents("troliesp".$nom2."troliesp".$prenom2), $authors, $deb, $fin);
						}
						$authors = str_replace($deb."troliesp", "troliesp".$deb, $authors);
						$authors = str_ireplace(array("troliesp", "trolipoint", "trolitiret", "troliapos", "troliparo", "troliparf"), array(" ", ".", "-", "'", "(", ")") , $authors);
					}else{//Si nom/prénom complets
						if ($typnom == "nomcomp1") {//Nom Prénom
							$deb = "";
							$fin = "";
							if ($initial == 1){
								$initial = 0;
								$authors = "";
							}else{
								$authors .= ", ";
							}
							$prenomentier = $prenom;
							$prenom = prenomCompEntier($prenom);
							$prenominit = $prenom;
							//si prénom décliné "à l'américaine"
							if (strpos($prenom, " ") !== false) {
								$tabpren = explode(" ", $prenom);
								$prenom = $tabpren[0];
							}
							$prenom2 = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $prenominit);
							$nom2 = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $nom);
							//Si demandé et si authQuality_s renseigné, mettre en évidence l'auteur correspondant
							if ($typcrp == "oui") {
								if ($entry->authQuality_s[$i] == "crp") {$fin .= "*";}
							}
							if (stripos(wd_remove_accents($listenomcomp1), wd_remove_accents("~".$nom." ".str_replace(".", "", $prenomentier))) === false) {
							}else{
								//On vérifie que l'auteur est bien dans la collection pour l'année de la publication
								$pos = stripos(wd_remove_accents($listenomcomp1), wd_remove_accents($nom." ".$prenom));
								$pos = substr_count(mb_substr($listenomcomp1, 0, $pos, 'UTF-8'), '~');
								$crit = 0;
								for ($k = 1; $k <= $pos; $k++) {
									$crit = strpos($arriv, '~', $crit+1);
								}
								$datearriv = substr($arriv, $crit-4, 4);
								$datedepar = substr($depar, $crit-4, 4);
								if (($dateprod >= $datearriv && $dateprod <= $datedepar) || $dateprod == "0000") {
									$affil = "ok";
									if ($typcol == "soul") {$deb .= "<u>";$fin .= "</u>";}
									if ($typcol == "gras") {$deb .= "<strong>";$fin .= "</strong>";}
									if ($typcol == "aucun") {$deb .= "";$fin .= "";}
									//Si demandé > si auteurs de la collection interrogée apparaissent soit en 1ère position, soit en position finale, mettre toute la citation en gras
									if ($typgra == "oui" && ($i == 0 || $i == count($entry->authLastName_s) - 1)) {$debgras = "<strong>"; $fingras = "</strong>";}
									//HCERES > Test pour savoir si un auteur de la collection est premier auteur OU dernier auteur OU auteur correspond 
								if ($i == 0 || $i == count($entry->authLastName_s) - 1 || $entry->authQuality_s[$i] == "crp") {$CA = "O";}
								}
								//echo $nom.' - '.$prenom.' -> '.$nom2.' - '.$prenom2.' / '.$prenomPlus.'<br>';
							}
							//Pour COMM et POSTER, si authQuality_s renseigné, souligner automatiquement les orateurs ou présentateurs
							if ($docType_s == "COMM" || $docType_s == "POSTER" || $docType_s == "COMM+POST") {
								if ($entry->authQuality_s[$i] == "spk" || $entry->authQuality_s[$i] == "presenter") {$deb .= "<u>";$fin .= "</u>";}
							}
							if ($prenomPlus != "") {
								$authors .= $nom2."troliesp".$prenom2."troliesp".$prenomPlus;
								$authors = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $authors);
								$authors = str_replace("troliesptroliesp", "troliesp", $authors);
								$authors = mise_en_evidence(wd_remove_accents($nom2."troliesp".$prenom2."troliesp".$prenomPlus), $authors, $deb, $fin);
								$authors = mise_en_evidence(wd_remove_accents("troliesp".$nom2."troliesp".$prenom2."troliesp".$prenomPlus), $authors, $deb, $fin);
							}else{
								$authors .= $nom2."troliesp".$prenom2;
								$authors = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $authors);
								$authors = str_replace("troliesptroliesp", "troliesp", $authors);
								$authors = mise_en_evidence(wd_remove_accents($nom2."troliesp".$prenom2), $authors, $deb, $fin);
								$authors = mise_en_evidence(wd_remove_accents("troliesp".$nom2."troliesp".$prenom2), $authors, $deb, $fin);
							}
							$authors = str_replace($deb."troliesp", "troliesp".$deb, $authors);
							$authors = str_ireplace(array("troliesp", "trolipoint", "trolitiret", "troliapos", "troliparo", "troliparf"), array(" ", ".", "-", "'", "(", ")") , $authors);
						}else{
							if ($typnom == "nomcomp2") {//Prénom Nom
								$deb = "";
								$fin = "";
								if ($initial == 1){
									$initial = 0;
									$authors = "";
								}else{
									$authors .= ", ";
								}
								$prenomentier = $prenom;
								$prenom = prenomCompEntier($prenom);
								$prenominit = $prenom;
								//si prénom décliné "à l'américaine"
								if (strpos($prenom, " ") !== false) {
									$tabpren = explode(" ", $prenom);
									$prenom = $tabpren[0];
								}
								$prenom2 = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $prenominit);
								$nom2 = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $nom);
								//Si demandé et si authQuality_s renseigné, mettre en évidence l'auteur correspondant
								if ($typcrp == "oui") {
									if ($entry->authQuality_s[$i] == "crp") {$fin .= "*";}
								}
								if (stripos(wd_remove_accents($listenomcomp2), wd_remove_accents("~".str_replace(".", "", $prenomentier)." ".$nom)) === false) {
								}else{
									//On vérifie que l'auteur est bien dans la collection pour l'année de la publication
									$pos = stripos(wd_remove_accents($listenomcomp2), wd_remove_accents($prenom." ".$nom));
									$pos = substr_count(mb_substr($listenomcomp2, 0, $pos, 'UTF-8'), '~');
									$crit = 0;
									for ($k = 1; $k <= $pos; $k++) {
										$crit = strpos($arriv, '~', $crit+1);
									}
									$datearriv = substr($arriv, $crit-4, 4);
									$datedepar = substr($depar, $crit-4, 4);
									if (($dateprod >= $datearriv && $dateprod <= $datedepar) || $dateprod == "0000") {
										$affil = "ok";
										if ($typcol == "soul") {$deb .= "<u>";$fin .= "</u>";}
										if ($typcol == "gras") {$deb .= "<strong>";$fin .= "</strong>";}
										if ($typcol == "aucun") {$deb .= "";$fin .= "";}
										//Si demandé > si auteurs de la collection interrogée apparaissent soit en 1ère position, soit en position finale, mettre toute la citation en gras
										if ($typgra == "oui" && ($i == 0 || $i == count($entry->authLastName_s) - 1)) {$debgras = "<strong>"; $fingras = "</strong>";}
										//HCERES > Test pour savoir si un auteur de la collection est premier auteur OU dernier auteur OU auteur correspond 
										if ($i == 0 || $i == count($entry->authLastName_s) - 1 || $entry->authQuality_s[$i] == "crp") {$CA = "O";}
									}
								}
								//Pour COMM et POSTER, si authQuality_s renseigné, souligner automatiquement les orateurs ou présentateurs
								if ($docType_s == "COMM" || $docType_s == "POSTER" || $docType_s == "COMM+POST") {
									if ($entry->authQuality_s[$i] == "spk" || $entry->authQuality_s[$i] == "presenter") {$deb .= "<u>";$fin .= "</u>";}
								}
								//echo $prenom2."troliesp".$prenomPlus."troliesp".$nom2."<br>";
								if ($prenomPlus != "") {
									$authors .= $prenom2."troliesp".$prenomPlus."troliesp".$nom2;
									$authors = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $authors);
									$authors = str_replace("troliesptroliesp", "troliesp", $authors);
									$authors = mise_en_evidence(wd_remove_accents($prenom2."troliesp".$prenomPlus."troliesp".$nom2), $authors, $deb, $fin);
									$authors = mise_en_evidence(wd_remove_accents("troliesp".$prenom2."troliesp".$prenomPlus."troliesp".$nom2), $authors, $deb, $fin);
								}else{
									$authors .= $prenom2."troliesp".$nom2;
									$authors = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $authors);
									$authors = str_replace("troliesptroliesp", "troliesp", $authors);
									$authors = mise_en_evidence(wd_remove_accents($prenom2."troliesp".$nom2), $authors, $deb, $fin);
									$authors = mise_en_evidence(wd_remove_accents("troliesp".$prenom2."troliesp".$nom2), $authors, $deb, $fin);
								}
								$authors = str_replace($deb."troliesp", "troliesp".$deb, $authors);
								$authors = str_ireplace(array("troliesp", "trolipoint", "trolitiret", "troliapos", "troliparo", "troliparf"), array(" ", ".", "-", "'", "(", ")") , $authors);
							}else{//NOM (Prénom(s))
								$deb = "";
								$fin = "";
								if ($initial == 1){
									$initial = 0;
									$authors = "";
								}else{
									$authors .= ", ";
								}
								$prenom = prenomCompEntier($prenom);
								$prenominit = $prenom;
								//si prénom décliné "à l'américaine"
								if (strpos($prenom, " ") !== false) {
									$tabpren = explode(" ", $prenom);
									$prenom = $tabpren[0];
								}

								$prenom2 = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $prenominit);
								$nom2 = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $nom);
								//Si demandé et si authQuality_s renseigné, mettre en évidence l'auteur correspondant
								if ($typcrp == "oui") {
									if ($entry->authQuality_s[$i] == "crp") {$fin .= "*";}
								}
								if (stripos(wd_remove_accents($listenomcomp3), wd_remove_accents("~".mb_strtoupper($nom, 'UTF-8')." (".str_replace(".", "", $prenom).")")) === false) {
								}else{
									//On vérifie que l'auteur est bien dans la collection pour l'année de la publication
									$pos = stripos(wd_remove_accents($listenomcomp3), wd_remove_accents(mb_strtoupper($nom, 'UTF-8')." (".$prenom.")"));
									$pos = substr_count(mb_substr($listenomcomp3, 0, $pos, 'UTF-8'), '~');
									$crit = 0;
									for ($k = 1; $k <= $pos; $k++) {
										$crit = strpos($arriv, '~', $crit+1);
									}
									$datearriv = substr($arriv, $crit-4, 4);
									$datedepar = substr($depar, $crit-4, 4);
									if (($dateprod >= $datearriv && $dateprod <= $datedepar) || $dateprod == "0000") {
										$affil = "ok";
										if ($typcol == "soul") {$deb .= "<u>";$fin .= "</u>";}
										if ($typcol == "gras") {$deb .= "<strong>";$fin .= "</strong>";}
										if ($typcol == "aucun") {$deb .= "<t>";$fin .= "</t>";}//<t> and </t> are factice and just serve to identify the author of the collection for $trpaff
										//Si demandé > si auteurs de la collection interrogée apparaissent soit en 1ère position, soit en position finale, mettre toute la citation en gras
										if ($typgra == "oui" && ($i == 0 || $i == count($entry->authLastName_s) - 1)) {$debgras = "<strong>"; $fingras = "</strong>";}
										//HCERES > Test pour savoir si un auteur de la collection est premier auteur OU dernier auteur OU auteur correspond 
										if ($i == 0 || $i == count($entry->authLastName_s) - 1 || $entry->authQuality_s[$i] == "crp") {$CA = "O";}
									}
								}
								//Pour COMM et POSTER, si authQuality_s renseigné, souligner automatiquement les orateurs ou présentateurs
								if ($docType_s == "COMM" || $docType_s == "POSTER" || $docType_s == "COMM+POST") {
									if ($entry->authQuality_s[$i] == "spk" || $entry->authQuality_s[$i] == "presenter") {$deb .= "<u>";$fin .= "</u>";}
								}
								//echo $prenom2."troliesp".$prenomPlus."troliesp".$nom2."<br>";
								if ($prenomPlus != "") {
									$authors .= mb_strtoupper($nom2, 'UTF-8')."troliesp(".$prenom2."troliesp".$prenomPlus.")";
									$authors = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $authors);
									$authors = str_ireplace("troliesptroliesp", "troliesp", $authors);
									$authors = mise_en_evidence(wd_remove_accents(mb_strtoupper($nom2, 'UTF-8')."troliesptroliparo".$prenom2."troliesp".$prenomPlus."troliparf"), $authors, $deb, $fin);
									$authors = mise_en_evidence(wd_remove_accents("troliesp".mb_strtoupper($nom2, 'UTF-8')."troliesptroliparo".$prenom2."troliesp".$prenomPlus."troliparf"), $authors, $deb, $fin);
								}else{
									$authors .= mb_strtoupper($nom2, 'UTF-8')."troliesp(".$prenom2.")";
									$authors = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $authors);
									$authors = str_ireplace("troliesptroliesp", "troliesp", $authors);
									$authors = mise_en_evidence(wd_remove_accents(mb_strtoupper($nom2, 'UTF-8')."troliesptroliparo".$prenom2."troliparf"), $authors, $deb, $fin);
									$authors = mise_en_evidence(wd_remove_accents("troliesp".mb_strtoupper($nom2, 'UTF-8')."troliesptroliparo".$prenom2."troliparf"), $authors, $deb, $fin);
								}
								$authors = str_replace($deb."troliesp", "troliesp".$deb, $authors);
								$authors = str_ireplace(array("troliesp", "trolipoint", "trolitiret", "troliapos", "troliparo", "troliparf"), array(" ", ".", "-", "'", "(", ")") , $authors);
							}
						}
					}
					
					//Auteurs pour HCERES > NOM Prénom(s)
					//(!empty($prenomPlus)) ? ($chaineH .= mb_strtoupper($nom, 'UTF-8')." ".$prenom." ".$prenomPlus.", ") : ($chaineH .= mb_strtoupper($nom, 'UTF-8')." ".$prenom.", ");
					$debH = "";
					$finH = "";
					if ($initialH == 1){
						$initialH = 0;
						$authorsH = "";
					}else{
						$authorsH .= ", ";
					}
					$prenomentier = $prenomH;
					$prenom = prenomCompEntier($prenomH);
					$prenominit = $prenom;
					//si prénom décliné "à l'américaine"
					if (strpos($prenom, " ") !== false) {
						$tabpren = explode(" ", $prenom);
						$prenom = $tabpren[0];
					}

					$prenom2 = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $prenominit);
					$nom2 = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $nomH);
					//Si demandé et si authQuality_s renseigné, mettre en évidence l'auteur correspondant
					if ($typcrp == "oui") {
						if ($entry->authQuality_s[$i] == "crp") {$finH .= "*";}
					}
					if (stripos(wd_remove_accents($listenomcomp1), wd_remove_accents("~".$nomH." ".str_replace(".", "", $prenomentier))) === false) {
					}else{
						//On vérifie que l'auteur est bien dans la collection pour l'année de la publication
						$pos = stripos(wd_remove_accents($listenomcomp1), wd_remove_accents($nomH." ".$prenom));
						$pos = substr_count(mb_substr($listenomcomp1, 0, $pos, 'UTF-8'), '~');
						$crit = 0;
						for ($k = 1; $k <= $pos; $k++) {
							$crit = strpos($arriv, '~', $crit+1);
						}
						$datearriv = substr($arriv, $crit-4, 4);
						$datedepar = substr($depar, $crit-4, 4);
						if (($dateprod >= $datearriv && $dateprod <= $datedepar) || $dateprod == "0000") {
							$affil = "ok";
							$debH .= "_";
							$finH .= "_";
						}
					}
					//echo $prenom2."troliesp".$prenomPlus."troliesp".$nom2."<br>";
					if ($prenomPlus != "") {
						$authorsH .= mb_strtoupper($nom2, 'UTF-8')."troliesp".$prenom2."troliesp".$prenomPlus;
						$authorsH = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $authorsH);
						$authorsH = str_ireplace("troliesptroliesp", "troliesp", $authorsH);
						$authorsH = mise_en_evidence(wd_remove_accents(mb_strtoupper($nom2, 'UTF-8')."troliesp".$prenom2."troliesp".$prenomPlus), $authorsH, $debH, $finH);
						$authorsH = mise_en_evidence(wd_remove_accents("troliesp".mb_strtoupper($nom2, 'UTF-8')."troliesp".$prenom2."troliesp".$prenomPlus), $authorsH, $debH, $finH);
					}else{
						$authorsH .= mb_strtoupper($nom2, 'UTF-8')."troliesp".$prenom2;
						$authorsH = str_replace(array(".", "-", "'", " ", "(", ")"), array("trolipoint", "trolitiret", "troliapos", "troliesp", "troliparo", "troliparf") , $authorsH);
						$authorsH = str_ireplace("troliesptroliesp", "troliesp", $authorsH);
						$authorsH = mise_en_evidence(wd_remove_accents(mb_strtoupper($nom2, 'UTF-8')."troliesp".$prenom2), $authorsH, $debH, $finH);
						$authorsH = mise_en_evidence(wd_remove_accents("troliesp".mb_strtoupper($nom2, 'UTF-8')."troliesp".$prenom2), $authorsH, $debH, $finH);
					}
					$authorsH = str_replace($debH."troliesp", "troliesp".$debH, $authorsH);
					$authorsH = str_ireplace(array("troliesp", "trolipoint", "trolitiret", "troliapos", "troliparo", "troliparf"), array(" ", ".", "-", "'", "(", ")") , $authorsH);
					
					$i++;
				}
				
				$chaineH = $authorsH;
				$authorsBT = $authors;
				if (isset($typbib) && $typbib == "oui") {		
					$iTA = 0;
					$aLN = array();
					while ($iTA < count($entry->authLastName_s)){
						array_push($aLN, ucwords(strtolower($entry->authLastName_s[$iTA]), "-"));
						$iTA++;
					}
					if (isset($typcol) && $typcol == "soul") {
						while (strpos($authorsBT, "<u>") !== false) {
							$posi = strpos($authorsBT, "<u>");
							$posf = strpos($authorsBT, "</u>", $posi);
							$autcol = substr($authorsBT, $posi, ($posf - $posi));
							$autfin = str_replace(array("<u>", "</u>"), "", $autcol);
							$tabAF = explode(" ", $autfin);
							$autfin = "";
							if (in_array($tabAF[0], $aLN)) {//Nom simple
								$autfin .= "\labo{".$tabAF[0]."}, ";
								$autfin .= "\labo{".$tabAF[1]."}, ";
							}else{//Nom composé
								$autfin .= "\labo{".$tabAF[0]." ".$tabAF[1]."}, ";
								$autfin .= "\labo{".$tabAF[2]."}, ";
							}
							$autfin = substr($autfin, 0, (strlen($autfin) - 2));
							$authorsBT = str_replace($autcol, $autfin, $authorsBT);
						}
					}
					if (isset($typcol) && $typcol == "gras") {
						$authorsBT = $authors;
						while (strpos($authorsBT, "<strong>") !== false) {
							$posi = strpos($authorsBT, "<strong>");
							$posf = strpos($authorsBT, "</strong>", $posi);
							$autcol = substr($authorsBT, $posi, ($posf - $posi));
							$autfin = str_replace(array("<strong>", "</strong>"), "", $autcol);
							$tabAF = explode(" ", $autfin);
							$autfin = "";
							if (in_array($tabAF[0], $aLN)) {//Nom simple
								$autfin .= "\labo{".$tabAF[0]."}, ";
								$autfin .= "\labo{".$tabAF[1]."}, ";
							}else{//Nom composé
								$autfin .= "\labo{".$tabAF[0]." ".$tabAF[1]."}, ";
								$autfin .= "\labo{".$tabAF[2]."}, ";
							}
							$autfin = substr($autfin, 0, (strlen($autfin) - 2));
							$authorsBT = str_replace($autcol, $autfin, $authorsBT);
						}
					}
					//echo $authorsBT."<br>";
				}

				//echo str_replace(" ", "_", $listenomcomp2)."<br>";
				//echo "toto : ".stripos(wd_remove_accents(str_replace(" ", " ", $listenomcomp2)), wd_remove_accents("Abdelhak El Amrani"))."<br>";
				//Limiting to 1, 5, 10, 15 or 20 authors + et al.
				if (isset($typlim) && $typlim == "oui") {
					$cpt = 1;
					$pospv = 0;
					$lim_aut_ok = 1;
					$limvirg = $limaff;
					while ($cpt <= $limvirg) {
						if (strpos($authors, ",", $pospv+1) !== false) {
							$pospv = strpos($authors, ",", $pospv+1);
							$cpt ++;
						}else{
							$lim_aut_ok = 0;
							break;
						}
					}
					$extract = $authors;
					if ($lim_aut_ok != 0) {
						//$extract = mb_substr($authors, 0, $pospv, 'UTF-8');
						$extract = substr($authors, 0, $pospv);
						if (isset($stpdf) && $stpdf == "mla") {//Cas spécifique du style MLA prédéfini
							$extract .= ", et al.";
						}else{
							$extract .= " <em> et al.</em>";
						}
					}else{
						if ($typnom != "nominit") {
							$extract .= ".";
						}
					}
				}else{
					$extract = $authors;
				}
				
				//exprt HCERES > limiter aux 5 premiers auteurs
				$cpt = 1;
					$pospv = 0;
					$lim_aut_ok = 1;
					while ($cpt <= 5) {
						if (strpos($chaineH, ",", $pospv+1) !== false) {
							$pospv = strpos($chaineH, ",", $pospv+1);
							$cpt ++;
						}else{
							$lim_aut_ok = 0;
							break;
						}
					}
					if ($lim_aut_ok != 0) {
						$chaineH = substr($chaineH, 0, $pospv);
						$chaineH .= ", et al.";
					}
				
				//Replace authors outside the collection by '...'' beyond x authors
				if (isset($trpaff) && $trpaff != "") {
					$trpTab = explode(", ", $extract);
					//var_dump($trpTab);
					$extractTmp = "";
					$trp = 0;
					while(isset($trpTab[$trp])) {
						if ($trp >= $trpaff && strpos($trpTab[$trp], "<strong>") === false && strpos($trpTab[$trp], "<u>") === false && strpos($trpTab[$trp], "<t>") === false) {
							$extractTmp .= "trolitrp, ";
						}else{
							$extractTmp .= $trpTab[$trp].", ";
						}
						$trp++;
					}
					$extract = substr($extractTmp, 0, (strlen($extractTmp)-2));
				}
				
				//Cas spécifique CNR
				if ($docType_s == "CNR" || $entry->docType_s == "DOUV") {$extract .= " (dir.)";}
				
				$extractpur = $extract;
				if ($typaut == "soul") {$extract = "<u>".$extract."</u>";}
				if ($typaut == "gras") {$extract = "<strong>".$extract."</strong>";}
				if (isset($spa) && $spa == "pvi") {$extract = str_replace(", ", "; ", $extract);}
				if (isset($spa) && $spa == "esp") {$extract = str_replace(", ", " ", $extract);}
				if (isset($spa) && $spa == "tir") {$extract = str_replace(", ", " - ", $extract);}

				$deb3 = "";
				$fin3 = "";
				//Y-a-t-il absence d'affiliation, et, si oui, faut-il l'afficher ?
				if ($sursou == "vis" && $affil == "aucune") {
					$deb3 = "<span style='background:#FF0000'>";
					$fin3 = "</span>";
				}

				$entryInfo0 .= $deb3.$extract.$fin3;
				
				$resArray[$iRA]["authors"] = $extract;
				if (isset($collCode_s) && $collCode_s != "" && isset($gr) && (strpos($gr, $collCode_s) !== false)) {
					$chaine1 .= $delim."Auteurs";
					$chaine2 .= $delim.strip_tags($extractpur);
				}else{
					if (isset($typsign) && $typsign != "ts0") {
						$chaine1 .= $delim."Auteurs";
						$chaine2 .= $delim.strip_tags($extractpur);
					}else{
						$chaine1 .= "Auteurs";
						$chaine2 .= strip_tags($extractpur);
					}
				}
				
				if ($docType_s == "NED") {
					//Adding scientificEditor_s
					$sedCnt = "";
					$sed = 0;
					$in = 0;			
					while (isset($entry->scientificEditor_s[$sed])) {
						if ($in == 0) {				
								$sedCnt .= ". <em>In</em> ".$entry->scientificEditor_s[$sed].", ";
								$in = 1;
						}else{
							$sedCnt .= $entry->scientificEditor_s[$sed].", ";
						}
						$sed ++;
					}
					$sedCnt = substr($sedCnt, 0, (strlen($sedCnt) - 2));
					$sedCnt .= " (dir.)";
					if ($in == 1) {
						$entryInfo0 .= $sedCnt;
						$sedCnt = str_replace(array(". <em>In</em> "," (dir.)"), "", $sedCnt);
						$chaine1 .= $delim."Editeur scientifique";
						$chaine2 .= $delim.$sedCnt;
					}
				}

				//Adding producedDateY_i:
				$chaine1 .= $delim."Année";
				$resArray[$iRA]["annee"] = $dateprod;
				if ($typann == "apres") {//Année après les auteurs
					if ($docType_s=="ART" || $docType_s=="UNDEF" || $docType_s=="COMM" || $docType_s == "OUV" or $docType_s == "DOUV" || $docType_s=="COUV" or $docType_s=="OUV+COUV" or $docType_s=="OUV+COUV+DOUV" or $docType_s=="OTHER" or $docType_s=="OTHERREPORT" or $docType_s=="REPORT" or $docType_s=="COMM+POST" or $docType_s=="VIDEO" or $docType_s=="CRO" or $docType_s=="SOFTWARE"){
						 $entryInfo0 .= " (".$dateprod.")";
						 $chaine2 .= $delim.$dateprod;
					}else{
						$chaine2 .= $delim;
					}
				}else{
					$entryInfo0 .= ", ";
					$chaine2 .= $delim;
				}

				//HDR - adding defenseDateY_i
				$chaine1 .= $delim."Année de soutenance";
				if ($docType_s=="HDR" && isset($entry->defenseDateY_i)){
					$entryInfo0 .= " (".$entry->defenseDateY_i.")";
					$resArray[$iRA]["annee"] = " (".$entry->defenseDateY_i.")";
					$chaine2 .= $delim.$entry->defenseDateY_i;
				}else{
					$chaine2 .= $delim;
				}

				//Adding title:
				$chaine1 .= $delim."Titre";
				if ($typann == "apres" || $typann == "alafin" && $docType_s != "NED") {$point = ".";}else{$point = "";}
				if ($docType_s != "NED") {$deb = "&nbsp;";}
				if ($docType_s == "CNR") {$deb = ",&nbsp;";}
				$fin = "";
				if (strpos($typtit,"gras") !== false) {$deb .= "<strong>";}
				if (strpos($typtit,"ital") !== false) {$deb .= "<em>";}
				if (strpos($typtit,"guil") !== false) {$deb .= "«&nbsp;";$fin .= "&nbsp;»";}
				if (strpos($typtit,"gras") !== false) {$fin .= "</strong>";}
				if (strpos($typtit,"ital") !== false) {;$fin .= "</em>";}
				if (strpos($typtit,"reto") !== false) {$fin .= "<br>";}
				//Titre et sous titre peuvent être dans des langues différentes
				if (count($entry->title_s) > 1) {//Il y a au moins 2 langues
					if (isset($entry->en_title_s[0])) {//Recherche d'abord en anglais
						$titrePlus = $entry->en_title_s[0];
						if (isset($entry->en_subTitle_s[0])) {//Existence d'un sous-titre en anglais
							$titrePlus .= " : ".$entry->en_subTitle_s[0];
						}
					}else{
						if (isset($entry->fr_title_s[0])) {//Recherche d'abord en anglais
							$titrePlus = $entry->fr_title_s[0];
							if (isset($entry->fr_subTitle_s[0])) {//Existence d'un sous-titre en anglais
								$titrePlus .= " : ".$entry->fr_subTitle_s[0];
							}
						}
					}
				}else{
					if (isset($entry->title_s[0])) {
						$titrePlus = $entry->title_s[0];
						if (isset($entry->subTitle_s[0])) {//existence d'un sous-titre
							$titrePlus .= " : ".$entry->subTitle_s[0];
						}
					}
				}				
				$titre = nettoy1(cleanup_title($titrePlus));
				if ($docType_s == "NED" && isset($entry->bookTitle_s)) {
					$entryInfo0 = substr($entryInfo0, 0, strlen($entryInfo0)-2).". ";
					$titre = nettoy1(cleanup_title("<em>".$entry->bookTitle_s."</em>"));
					if (isset($entry->title_s[0])) {
						if (isset($entry->description_s)) {
							$titre .= ", [".$entry->description_s."]&nbsp;: «&nbsp;".$entry->title_s[0]."&nbsp;»";
						}else{
							$titre .= ", «&nbsp;".$entry->title_s[0]."&nbsp;»";
						}
					}
				}
				$deb2 = "";
				$fin2 = "";
				
				//Export HCERES
				$chaineH .= $delim.$titre;

				//Est-ce un doublon et, si oui, faut-il l'afficher ?
				if (stripos($listetitre, $titre) === false) {//non
					$listetitre .= "¤".$titre;
				}else{
					if ($surdoi == "vis") {
						$deb2 = "<span style='background:#00FF00'><strong>";
						$fin2 = "</strong></span>";
					}
				}
				$entryInfo0 .= $point.$deb.$deb2.$titre.$fin2.$fin;
				$resArray[$iRA]["titre"] = $titre;
				$chaine2 .= $delim.$titre;
				
				//Adding journalTitle_s:
				$chaine1 .= $delim."Titre journal";
				if ($typrvg == "non") {$debrev = "";$finrev = "";}else{$debrev = "<strong>";$finrev = "</strong>";}
				if (isset($entry->journalTitle_s)) {
					$resArray[$iRA]["revue"] = $entry->journalTitle_s;
					if ($docType_s == "ART" OR $docType_s == "CRO"){
						$entryInfo0 .= ". <em>".$debrev.$entry->journalTitle_s.$finrev."</em>";
						$chaine2 .= $delim.$entry->journalTitle_s;
						$JT = $entry->journalTitle_s;//for IF
					}else{
						if ($docType_s == "CNR"){
							$entryInfo0 .= ", <em>".$debrev.$entry->journalTitle_s.$finrev."</em>";
							$chaine2 .= $delim.$entry->journalTitle_s;
							$JT = $entry->journalTitle_s;//for IF
						}
					}
				}else{
					$chaine2 .= $delim;
				}
				
				//Export HCERES
				if (isset($entry->journalTitle_s)) {$chaineH .= $delim.$entry->journalTitle_s;}else{$chaineH .= $delim;}

				//Cas spécifiques "OTHER" > BLO + CRO + NED + TRA
				if ($docType_s == "BLO") {
					//Adding description_s
					if (isset($entry->description_s)) {
						$chaine1 .= $delim."Description";
						$entryInfo0 .= ". <em>".ucfirst($entry->description_s)."</em>";
						$chaine2 .= $delim.$entry->description_s;
					}
					//Adding dateprod
					$chaine1 .= $delim."Année";
					$entryInfo0 .= ", ".$dateprod;
					$chaine2 .= $delim.$dateprod;
				}
				if ($docType_s == "NED") {
					//Adding publisher_s
					if (isset($entry->publisher_s[0])) {
						$pubS = $entry->publisher_s[0];
							if (isset($entry->publisher_s[1]) && $entry->publisher_s[1] != "") {$pubS .= ", ".$entry->publisher_s[1];}//2 valeurs pour le champ "Editeur commercial"
						$chaine1 .= $delim."Editeur commercial";
						$entryInfo0 .= " ".ucfirst($pubS.",");
						$chaine2 .= $delim.$pubS;
					}
				}
				if ($docType_s == "TRA") {
					$entryInfo0 = "";
					//Est-ce une notice significative à mettre en évidence et, si oui, faut-il l'afficher ?
					$chaine1 = (isset($entry->signif) && $entry->signif == "oui") ?"Sélection HCERES" : "";
					$chaine2 = (isset($entry->signif) && $entry->signif == "oui") ? "Oui" : "";
					$entryInfo0 .= (isset($entry->signif) && $entry->signif == "oui") ? $signTxt : "";
					//Adding title
					$chaine1 .= $delim."Titre";
					$deb = "";
					$fin = "";
					if (strpos($typtit,"gras") !== false) {$deb .= "<strong>";}
					if (strpos($typtit,"ital") !== false) {$deb .= "<em>";}
					if (strpos($typtit,"guil") !== false) {$deb .= "«&nbsp;";$fin .= "&nbsp;»";}
					if (strpos($typtit,"gras") !== false) {$fin .= "</strong>";}
					if (strpos($typtit,"ital") !== false) {;$fin .= "</em>";}
					if (strpos($typtit,"reto") !== false) {$fin .= "<br>";}
					//Titre et sous titre peuvent être dans des langues différentes
					if (count($entry->title_s) > 1) {//Il y a au moins 2 langues
						if (isset($entry->en_title_s[0])) {//Recherche d'abord en anglais
							$titrePlus = $entry->en_title_s[0];
							if (isset($entry->en_subTitle_s[0])) {//Existence d'un sous-titre en anglais
								$titrePlus .= " : ".$entry->en_subTitle_s[0];
							}
						}else{
							if (isset($entry->fr_title_s[0])) {//Recherche d'abord en anglais
								$titrePlus = $entry->fr_title_s[0];
								if (isset($entry->fr_subTitle_s[0])) {//Existence d'un sous-titre en anglais
									$titrePlus .= " : ".$entry->fr_subTitle_s[0];
								}
							}
						}
					}else{
						if (isset($entry->title_s[0])) {
							$titrePlus = $entry->title_s[0];
							if (isset($entry->subTitle_s[0])) {//existence d'un sous-titre
								$titrePlus .= " : ".$entry->subTitle_s[0];
							}
						}
					}
					$titre = nettoy1(cleanup_title($titrePlus));
					$deb2 = "";
					$fin2 = "";

					//Est-ce un doublon et, si oui, faut-il l'afficher ?
					if (stripos($listetitre, $titre) === false) {//non
						$listetitre .= "¤".$titre;
					}else{
						if ($surdoi == "vis") {
							$deb2 = "<span style='background:#00FF00'><strong>";
							$fin2 = "</strong></span>";
						}
					}
					$entryInfo0 .= $deb.$deb2.$titre.$fin2.$fin;
					$resArray[$iRA]["titre"] = $titre;
					$chaine2 .= $delim.$titre;
					//Adding authors
					$entryInfo0 .= ", traduit par ".$deb3.$extract.$fin3.".";
					$resArray[$iRA]["authors"] = $extract;
					if (isset($collCode_s) && $collCode_s != "" && isset($gr) && (strpos($gr, $collCode_s) !== false)) {
						$chaine1 .= $delim."Auteurs";
						$chaine2 .= $delim.strip_tags($extractpur);
					}else{
						if (isset($typsign) && $typsign != "ts0") {
							$chaine1 .= $delim."Auteurs";
							$chaine2 .= $delim.strip_tags($extractpur);
						}else{
							$chaine1 .= "Auteurs";
							$chaine2 .= strip_tags($extractpur);
						}
					}
					//Adding publisher_s
					if (isset($entry->publisher_s[0])) {
						$pubS = $entry->publisher_s[0];
							if (isset($entry->publisher_s[1]) && $entry->publisher_s[1] != "") {$pubS .= ", ".$entry->publisher_s[1];}//2 valeurs pour le champ "Editeur commercial"
						$chaine1 .= $delim."Editeur commercial";
						$entryInfo0 .= " ".ucfirst($pubS.",");
						$chaine2 .= $delim.$pubS;
					}
				}
				
				//Cas spécifique CNR
				if ($docType_s == "CNR" && isset($entry->issue_s[0]) && !is_array($entry->issue_s[0])){
					$entryInfo0 .= ", n° ".$entry->issue_s[0];
				}
				
				//Adding $dateprod (=producedDateY_i ou conferenceStartDateY_i)
				if ($typann == "avant") {//Année avant le numéro de volume
					$chaine1 .= $delim."Année";
					if ($docType_s == "ART" || $docType_s == "UNDEF"){
						if (strpos($typtit,"reto") !== false) {
							$entryInfo0 .= $dateprod.",";
						}else{
							$entryInfo0 .= ", ".$dateprod.",";
						}
						$chaine2 .= $delim.$dateprod;
					}else{
						$chaine2 .= $delim;
					}
					if ($docType_s == "COMM" || $docType_s == "COMM+POST"){
						if (strpos($typtit,"reto") !== false) {
							$entryInfo0 .= $dateprod.",";
						}else{
							$entryInfo0 .= ", ".$dateprod.",";
						}
						$chaine2 .= $delim.$dateprod;
					}else{
						$chaine2 .= $delim;
					}
				}else{
					if ($typann == "apres") {
						$chaine1 .= $delim."Année";
						if ($docType_s != "THESE" && $docType_s != "HDR" && $docType_s != "CRO") {
							if (strpos($typtit,"reto") !== false) {
							}else{
								$entryInfo0 .= ", ";
							}
							$chaine2 .= $delim;
						}else{
							$entryInfo0 .= ". ";
							$chaine2 .= $delim;
						}
					}
				}

				$hasVolumeOrNumber=0;
				$toAppear=0;

				if ($typfor != "typ4") {
					//Adding volume_s:
					$vol = "";
					if ($docType_s=="ART"){
						 $chaine1 .= $delim."Volume";
						 if(isset($entry->volume_s) && !is_array($entry->volume_s)){
								if($entry->volume_s!="" and $entry->volume_s!=" " and $entry->volume_s!="-" and $entry->volume_s!="()"){
									 if(toAppear($entry->volume_s)){
											$toAppear=1;
									 } else {
											$resArray[$iRA]["volume"] = $entry->volume_s;
											if ($typfor == "typ2" || $typfor == "typ1") {
												$entryInfo0 .= "vol ".$entry->volume_s;
												$chaine2 .= $delim.$entry->volume_s;
												$hasVolumeOrNumber=1;
											}else{
												if ($typfor == "typ3") {
													$entryInfo0 .= $entry->volume_s;
													$chaine2 .= $delim.$entry->volume_s;
													$hasVolumeOrNumber=1;
												}else{
													$vol = $entry->volume_s;
													$hasVolumeOrNumber=1;
													$chaine2 .= $delim;
												}
											}
									 }
								}else{
									$chaine2 .= $delim;
								}
						 }else{
							 $chaine2 .= $delim;
						 }
					}else{
						if ($docType_s=="OUV" OR $docType_s=="DOUV" OR $docType_s=="COUV" OR $docType_s=="OUV+COUV" OR $docType_s=="OUV+DOUV" OR $docType_s=="OUV+COUV+DOUV" OR $docType_s == "NED"){
							if(isset($entry->volume_s) && !is_array($entry->volume_s)){
								if($entry->volume_s!="" and $entry->volume_s!=" " and $entry->volume_s!="-" and $entry->volume_s!="()"){
									$resArray[$iRA]["volume"] = $entry->volume_s;
									$vol = $entry->volume_s;
									$hasVolumeOrNumber=1;
								}
							}
						}else{
							$chaine2 .= $delim;
						}
					}

					//Adding issue_s:
					$iss = "";
					//if ($docType_s=="ART" OR $docType_s=="OUV" or $docType_s=="DOUV" OR $docType_s=="COUV" OR $docType_s=="OUV+COUV" OR $docType_s=="OUV+DOUV" OR $docType_s=="OUV+COUV+DOUV"){
						if ($docType_s=="ART") {
						 $chaine1 .= $delim."Issue";
						 if(isset($entry->issue_s[0]) && !is_array($entry->issue_s[0])){
								if($entry->issue_s[0]!="" and $entry->issue_s[0]!=" " and $entry->issue_s[0]!="-" and $entry->issue_s[0]!="()"){
									 if(toAppear($entry->issue_s[0])){
											$toAppear=1;
									 }else{
											$resArray[$iRA]["issue"] = $entry->issue_s[0];
											if ($typfor == "typ2" || $typfor == "typ1") {
												//$entryInfo0 .= "(".$entry->issue_s[0].")";
												$entryInfo0 .= ", n°".$entry->issue_s[0];
												$chaine2 .= $delim.$entry->issue_s[0];
												$hasVolumeOrNumber=1;
											}else{
												if ($typfor == "typ3") {
													$entryInfo0 .= "(".$entry->issue_s[0].")";
													$chaine2 .= $delim.$entry->issue_s[0];
													$hasVolumeOrNumber=1;
												}else{
													$iss = $entry->issue_s[0];
													$hasVolumeOrNumber=1;
													$chaine2 .= $delim;
												}
											}
									 }
								}else{
									$chaine2 .= $delim;
								}
						 }else{
							 $chaine2 .= $delim;
						 }
					}else{
						if ($docType_s=="OUV" OR $docType_s=="DOUV" OR $docType_s=="COUV" OR $docType_s=="OUV+COUV" OR $docType_s=="OUV+DOUV" OR $docType_s=="OUV+COUV+DOUV" OR $docType_s == "NED"){
							if(isset($entry->issue_s[0]) && !is_array($entry->issue_s[0])){
								if($entry->issue_s[0]!="" and $entry->issue_s[0]!=" " and $entry->issue_s[0]!="-" and $entry->issue_s[0]!="()"){
									$resArray[$iRA]["issue"] = $entry->issue_s[0];
									$iss =  $entry->issue_s[0];
									$hasVolumeOrNumber=1;
								}
							}
						}else{
							$chaine2 .= $delim;
						}
					}
				}
				
				//Export HCERES
				if(isset($entry->volume_s) && !is_array($entry->volume_s)){
					(isset($entry->issue_s[0]) && !is_array($entry->issue_s[0])) ? $chaineH .= $delim.$entry->volume_s."(".$entry->issue_s[0].")" : $chaineH .= $delim.$entry->volume_s;
				}else{
					$chaineH .= $delim;
				}

				//Adding scientificEditor_s:
				$chaine1 .= $delim."Editeur scientifique";
				//if ($docType_s=="OUV" or $docType_s=="DOUV" or $docType_s=="COUV" OR $docType_s=="OUV+COUV" OR $docType_s=="OUV+DOUV" OR $docType_s=="OUV+COUV+DOUV"){
					if (($docType_s=="OUV" or $docType_s=="DOUV" or $docType_s=="COUV" OR $docType_s=="OUV+COUV" OR $docType_s=="OUV+DOUV" OR $docType_s=="OUV+COUV+DOUV") && $entry->docType_s != "DOUV" && $entry->docType_s != "COUV"){
					 if (isset($entry->scientificEditor_s)) {
						 if(count($entry->scientificEditor_s)>0){
								$initial = 1;
								foreach($entry->scientificEditor_s as $editor){
									 if ($initial==1){
											//$entryInfo .= ", <em>in</em> ".$editor;
											$resArray[$iRA]["editor"] = $editor;
											$chaine2 .= $delim.$editor;
											$initial=0;
									 } else {
											//$entryInfo .= ", <em>in</em> ".$editor;
											$entryInfo .= ", ".$editor;
											$resArray[$iRA]["editor"] .= "~ ".$editor;
											$chaine2 .= $delim.$editor;
									 }
								}
								$entryInfo .= " (dir.)";
						 }else{
							$chaine2 .= $delim;
						 }
					 }else{
						 $chaine2 .= $delim;
					 }
				}else{
					$chaine2 .= $delim;
				}
				
				//Cas spécififique COUV
				if ($entry->docType_s == "COUV") {
					//Adding scientificEditor_s
					$sedCnt = "";
					$sed = 0;
					$in = 0;			
					while (isset($entry->scientificEditor_s[$sed])) {
						if ($in == 0) {				
								$sedCnt .= ". <em>In</em> ".$entry->scientificEditor_s[$sed].", ";
								$in = 1;
						}else{
							$sedCnt .= $entry->scientificEditor_s[$sed].", ";
						}
						$sed ++;
					}
					$sedCnt = substr($sedCnt, 0, (strlen($sedCnt) - 2));
					$sedCnt .= " (dir.)";
					if ($in == 1) {
						$entryInfo0 .= $sedCnt;
						$sedCnt = str_replace(array(". <em>In</em> "," (dir.)"), "", $sedCnt);
						$chaine1 .= $delim."Editeur scientifique";
						$chaine2 .= $delim.$sedCnt;
					}
				}

				//Adding bookTitle_s:
				$chaine1 .= $delim."Titre ouvrage";
				if ($docType_s=="OUV" OR $docType_s=="DOUV" OR $docType_s=="COUV" OR $docType_s=="OUV+COUV" OR $docType_s=="OUV+DOUV" OR $docType_s=="OUV+COUV+DOUV"){
					if (isset($entry->bookTitle_s)) {
						$entryInfo .= ", <em>".$entry->bookTitle_s."</em>";
						$resArray[$iRA]["bookTitle"] = $entry->bookTitle_s;
						$chaine2 .= $delim.$entry->bookTitle_s;
					}else{
						$chaine2 .= $delim;
					}
				}else{
					$chaine2 .= $delim;
				}

				//Adding bookCollection_s:
				$chaine1 .= $delim."Titre du volume";
				if ($docType_s=="OUV" or $docType_s=="DOUV" or $docType_s=="COUV" OR $docType_s=="OUV+COUV" OR $docType_s=="OUV+DOUV" OR $docType_s=="OUV+COUV+DOUV"){
					if (isset($entry->bookCollection_s)) {
						$entryInfo .= ". ".$entry->bookCollection_s;
						$resArray[$iRA]["bookCollection"] = $entry->bookCollection_s;
						$chaine2 .= $delim.$entry->bookCollection_s;
					}else{
						$chaine2 .= $delim;
					}
				}else{
					$chaine2 .= $delim;
				}
				
				//Adding publicationLocation_s:
				$chaine1 .= $delim."Lieu de publication";
				if ($docType_s=="OUV" OR $docType_s=="DOUV" OR $docType_s=="COUV" OR $docType_s=="OUV+COUV" OR $docType_s=="OUV+DOUV" OR $docType_s=="OUV+COUV+DOUV"){
					 if(isset($entry->publicationLocation_s) && $entry->publicationLocation_s[0] != ""){
							$entryInfo .= ", ".$entry->publicationLocation_s[0];
							$resArray[$iRA]["publisher"] = $entry->publicationLocation_s[0];
							$chaine2 .= $delim.$entry->publicationLocation_s[0];
					 }else{
						$chaine2 .= $delim;
					 }
				}else{
					$chaine2 .= $delim;
				}

				//Adding publisher_s:
				$chaine1 .= $delim."Editeur revue";
				if ($docType_s=="OUV" OR $docType_s=="DOUV" OR $docType_s=="COUV" OR $docType_s=="OUV+COUV" OR $docType_s=="OUV+DOUV" OR $docType_s=="OUV+COUV+DOUV"){
					 if(isset($entry->publisher_s) && $entry->publisher_s[0] != ""){
							$pubS = $entry->publisher_s[0];
							if (isset($entry->publisher_s[1]) && $entry->publisher_s[1] != "") {$pubS .= ", ".$entry->publisher_s[1];}//2 valeurs pour le champ "Editeur commercial"
							$entryInfo .= ", ".$pubS;
							$resArray[$iRA]["publisher"] = $pubS;
							$chaine2 .= $delim.$pubS;
					 }else{
						$chaine2 .= $delim;
					 }
				}else{
					$chaine2 .= $delim;
				}
				
				//Adding $dateprod
				if ($typann == "alafin" && $docType_s != "BLO") {
					$chaine1 .= $delim."Année";
					if ($docType_s == "TRA") {
						$entryInfo .= " ".$dateprod.".";
					}else{
						$entryInfo .= ", ".$dateprod;
					}
					$chaine2 .= $delim.$dateprod;
				}
				
				//Vol et num pour xOUV+y
				if ($typfor != "typ4") {
					if ($docType_s=="OUV" OR $docType_s=="DOUV" OR $docType_s=="COUV" OR $docType_s=="OUV+COUV" OR $docType_s=="OUV+DOUV" OR $docType_s=="OUV+COUV+DOUV" OR $docType_s == "NED"){
						$chaine1 .= $delim."Volume";
						if ($vol != "") {
							if ($typfor == "typ2" || $typfor == "typ1") {$entryInfo .= ", vol ".$vol;}else{$entryInfo .= ", ".$vol;}
							$chaine2 .= $delim.$vol;
						}else{
							$chaine2 .= $delim;
						}
						$chaine1 .= $delim."Issue";
						if ($iss != "") {
							if ($typfor == "typ2" || $typfor == "typ1") {$entryInfo .= ", n°".$iss;}else{$entryInfo .= "(".$iss.")";}
							$chaine2 .= $delim.$iss;
						}else{
							$chaine2 .= $delim;
						}
					}
				}
				
				if ($typfor != "typ4") {
					//Adding page_s:
					//$chaine1 .= $delim."Volume, Issue, Pages";
					$chaine1 .= $delim."Pages";
					if ($docType_s=="ART" OR $docType_s=="OUV" OR $docType_s=="DOUV" OR $docType_s=="COUV" OR $docType_s=="OUV+COUV" OR $docType_s=="OUV+DOUV" OR $docType_s=="OUV+COUV+DOUV" OR $docType_s == "NED"){
						 if ($docType_s=="ART") {$eI = $entryInfo0;}else{$eI = $entryInfo;}
						 if (isset($entry->page_s)) {
							 $page = $entry->page_s;
							 $patterns = array();
							 $patterns[0] = '/--/';
							 $patterns[1] = '/Pages:/';
							 $patterns[2] = '/–/';
							 $patterns[3] = '/ - /';
							 $replacements = array();
							 $replacements[0] = '-';
							 $replacements[1] = '';
							 $replacements[2] = '-';
							 $replacements[3] = '-';

							 $page = preg_replace($patterns, $replacements, $page);
							 if(substr($page,0,1)==" "){
									$page=substr($page,-(strlen($page)-1));
							 }
							 if(toAppear($page)){
									$toAppear=1;
							 }
							 if($toAppear==1){
									$eI .= ", to appear";
									$chaine2 .= $delim."to appear";
							 } else {
									if(!($page=="?" or $page=="-" or $page=="" or $page==" " or $page=="–")){
										$resArray[$iRA]["page"] = $page;
										if ($typfor == "typ2") {
										 if($hasVolumeOrNumber==1){
												$eI .= ", ".$page." p.";
												//$resArray[$iRA]["page"] = ":".$page;
												$chaine2 .= $delim.$page;
										 }else{
												$eI .= ", ".$page;
												//$resArray[$iRA]["page"] = ", ".$page;
												$chaine2 .= $delim.$page;
										 }
										}else{
											//if ($vol != "") {$entryInfo0 .= " vol ".$vol;$chaine2 .= $delim." vol ".$vol;}else{$chaine2 .= $delim;}
											//if ($iss != "") {$entryInfo0 .= ", n°".$iss;$chaine2 .= " ,n° ".$iss;}
											if ($page != "") {
												if ($typfor == "typ1") {
													if (is_numeric(substr($page,0,1))) {
														$eI .= ", pp. ".$page;
														//$resArray[$iRA]["page"] = ", pp. ".$page;
														$chaine2 .= $delim.$page;
													}else{
														$eI .= $page;
														//$resArray[$iRA]["page"] = $page;
														$chaine2 .= $delim.$page;
													}
												}else{
													if (is_numeric(substr($page,0,1))) {
														//$eI .= ", ".$page." p.";
														$eI .= ":".$page;
														//$resArray[$iRA]["page"] = ", ".$page." p.";
														$chaine2 .= $delim.$page;
													}else{
														$eI .= $page;
														//$resArray[$iRA]["page"] = $page;
														$chaine2 .= $delim.$page;
													}
												}
											}
										}
									}else{
										$chaine2 .= $delim;
									}
							 }
							 if ($docType_s=="ART") {$entryInfo0 = $eI;}else{$entryInfo = $eI;}
						 }else{
							if ($docType_s=="ART") {$entryInfo0 .= ' in press';}
							$chaine2 .= $delim;
						 }
					}else{
						$chaine2 .= $delim;
					}
				}
				
				//Export HCERES
				(isset($entry->page_s)) ? $chaineH .= $delim.$entry->page_s : $chaineH .= $delim;
				$chaineH .= $delim.$dateprod;

				//Adding isbn_s:
				if ($typisbn == "vis") {
					$chaine1 .= $delim."ISBN";
					if ($docType_s=="OUV" or $docType_s=="DOUV" or $docType_s=="COUV" OR $docType_s=="OUV+COUV" OR $docType_s=="OUV+DOUV" OR $docType_s=="OUV+COUV+DOUV"){
						 if (isset($entry->isbn_s)) {
							 $entryInfo .= ", ".$entry->isbn_s.".";
							 $resArray[$iRA]["isbn"] = $entry->isbn_s;
							 $chaine2 .= $delim.$entry->isbn_s;
						 }else{
							$chaine2 .= $delim;
						 }
					}else{
						 $chaine2 .= $delim;
					}
				}

				//Adding conferenceTitle_s:
				$chaine1 .= $delim."Titre conférence";
				if ($docType_s=="COMM" || $docType_s=="POSTER" || $docType_s == "COMM+POST"){
					 $resArray[$iRA]["conferenceTitle"] = $entry->conferenceTitle_s;
					 if (strpos($typtit,"reto") !== false) {
						 $entryInfo .= " ".$entry->conferenceTitle_s;
					 }else{
						 $entryInfo .= ", ".$entry->conferenceTitle_s;
					 }
					 $chaine2 .= $delim.$entry->conferenceTitle_s;
				}else{
					 $chaine2 .= $delim;
				}

				/*
				//Adding comment:
				$chaine1 .= $delim."Commentaire";
				if (($docType_s=="COMM" and $specificRequestCode=="%20AND%20invitedCommunication_s:1") or ($docType_s=="OTHER") or ($docType_s=="OTHERREPORT") || $docType_s == "COMM+POST" || $docType_s == "VIDEO"){
					 if (isset($entry->comment_s) && $entry->comment_s!="" and $entry->comment_s!=" " and $entry->comment_s!="-" and $entry->comment_s!="?"){
						 $entryInfo .= ", ".$entry->comment_s;
						 $resArray[$iRA]["commentaire"] = $entry->comment_s;
						 $chaine2 .= $delim.$entry->comment_s;
					 }else{
						 $chaine2 .= $delim;
					 }
				}else{
					$chaine2 .= $delim;
				}
				*/

				//Adding congress dates
				$chaine1 .= $delim."Date congrès";
				$mois = Array('','janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre');
				if ($docType_s=="COMM" || $docType_s=="POSTER" || $docType_s == "COMM+POST"){
					if (isset($entry->conferenceStartDateY_i) && isset($entry->conferenceEndDateY_i) && $entry->conferenceStartDateY_i != "" && $entry->conferenceStartDateY_i == $entry->conferenceEndDateY_i) {//même année
						if (isset($entry->conferenceStartDateM_i) && isset($entry->conferenceEndDateM_i) && $entry->conferenceStartDateM_i != "" && $entry->conferenceStartDateM_i == $entry->conferenceEndDateM_i) {//même mois
							if (isset($entry->conferenceStartDateD_i) && isset($entry->conferenceEndDateD_i) && $entry->conferenceStartDateD_i != "" && $entry->conferenceStartDateD_i == $entry->conferenceEndDateD_i) {//même jour
								$entryInfo .= ", ".$entry->conferenceStartDateD_i." ".$mois[$entry->conferenceEndDateM_i]." ".$entry->conferenceEndDateY_i;
								$resArray[$iRA]["congressDates"] = ", ".$entry->conferenceStartDateD_i." ".$mois[$entry->conferenceEndDateM_i]." ".$entry->conferenceEndDateY_i;
								$chaine2 .= $delim.$entry->conferenceStartDateD_i." ".$mois[$entry->conferenceEndDateM_i]." ".$entry->conferenceEndDateY_i;
							}else{//jours différents
								if (isset($entry->conferenceStartDateD_i) && $entry->conferenceStartDateD_i != "") {
									$entryInfo .= ", ".$entry->conferenceStartDateD_i;
									$resArray[$iRA]["congressDates"] = ", ".$entry->conferenceStartDateD_i;
									$chaine2 .= $delim.$entry->conferenceStartDateD_i;
								}
								if (isset($entry->conferenceEndDateD_i) && $entry->conferenceEndDateD_i != "" && $entry->conferenceEndDateM_i != "" && $entry->conferenceEndDateY_i != "") {
									$entryInfo .= "-".$entry->conferenceEndDateD_i." ".$mois[$entry->conferenceEndDateM_i]." ".$entry->conferenceEndDateY_i;
									$resArray[$iRA]["congressDates"] = "-".$entry->conferenceEndDateD_i." ".$mois[$entry->conferenceEndDateM_i]." ".$entry->conferenceEndDateY_i;
									$chaine2 .= "-".$entry->conferenceEndDateD_i." ".$mois[$entry->conferenceEndDateM_i]." ".$entry->conferenceEndDateY_i;
								}
							}
						}else{//mois différents
							if (isset($entry->conferenceStartDateD_i) && $entry->conferenceStartDateD_i != "" && $entry->conferenceStartDateM_i != "") {
								$entryInfo .= ", ".$entry->conferenceStartDateD_i." ".$mois[$entry->conferenceStartDateM_i];
								$resArray[$iRA]["congressDates"] = ", ".$entry->conferenceStartDateD_i." ".$mois[$entry->conferenceStartDateM_i];
								$chaine2 .= $delim.$entry->conferenceStartDateD_i." ".$mois[$entry->conferenceStartDateM_i];
							}
							if (isset($entry->conferenceEndDateD_i) && $entry->conferenceEndDateD_i != "" && $entry->conferenceEndDateM_i != "" && $entry->conferenceEndDateY_i != "") {
								$entryInfo .= "-".$entry->conferenceEndDateD_i." ".$mois[$entry->conferenceEndDateM_i]." ".$entry->conferenceEndDateY_i;
								$resArray[$iRA]["congressDates"] = "-".$entry->conferenceEndDateD_i." ".$mois[$entry->conferenceEndDateM_i]." ".$entry->conferenceEndDateY_i;
								$chaine2 .= "-".$entry->conferenceEndDateD_i." ".$mois[$entry->conferenceEndDateM_i]." ".$entry->conferenceEndDateY_i;
							}
						}
					}else{//années différentes
						if (isset($entry->conferenceStartDateD_i) && $entry->conferenceStartDateD_i != "" && $entry->conferenceStartDateM_i != "" && $entry->conferenceStartDateY_i != "") {
							$entryInfo .= ", ".$entry->conferenceStartDateD_i." ".$mois[$entry->conferenceStartDateM_i]." ".$entry->conferenceStartDateY_i;
							$resArray[$iRA]["congressDates"] = ", ".$entry->conferenceStartDateD_i." ".$mois[$entry->conferenceStartDateM_i]." ".$entry->conferenceStartDateY_i;
							$chaine2 .= $delim.$entry->conferenceStartDateD_i." ".$mois[$entry->conferenceStartDateM_i]." ".$entry->conferenceStartDateY_i;
						}
						if (isset($entry->conferenceEndDateD_i) && $entry->conferenceEndDateD_i != "" && $entry->conferenceEndDateM_i != "" && $entry->conferenceEndDateY_i != "") {
							$entryInfo .= " - ".$entry->conferenceEndDateD_i." ".$mois[$entry->conferenceEndDateM_i]." ".$entry->conferenceEndDateY_i;
							$resArray[$iRA]["congressDates"] = " - ".$entry->conferenceEndDateD_i." ".$mois[$entry->conferenceEndDateM_i]." ".$entry->conferenceEndDateY_i;
							$chaine2 .= " - ".$entry->conferenceEndDateD_i." ".$mois[$entry->conferenceEndDateM_i]." ".$entry->conferenceEndDateY_i;
						}
					}
					//si aucune date renseignée
					if (isset($entry->conferenceStartDateY_i) && $entry->conferenceStartDateY_i == "" && $entry->conferenceStartDateM_i == "" && $entry->conferenceStartDateD_i == "" && $entry->conferenceEndDateY_i == "" && $entry->conferenceEndDateM_i == "" && $entry->conferenceEndDateD_i == "") {
						$chaine2 .= $delim;
					}
				}else{
					$chaine2 .= $delim;
				}

				//Adding city_s:
				$chaine1 .= $delim."Ville";
				if ($docType_s=="COMM" || $docType_s=="POSTER" || $docType_s == "COMM+POST"){
					 if(isset($entry->city_s)){
							$entryInfo .= ", ".$entry->city_s;
							$resArray[$iRA]["city"] = $entry->city_s;
							$chaine2 .= $delim.$entry->city_s;
					 }else{
					$chaine2 .= $delim;
					}
				}else{
					$chaine2 .= $delim;
				}

				//Adding country_s:
				$chaine1 .= $delim."Pays";
				if ($docType_s=="COMM" || $docType_s=="POSTER" || $docType_s == "COMM+POST"){
					 if($entry->country_s!=""){
						 $entryInfo .= " (".$countries[$entry->country_s].").";
						 $resArray[$iRA]["countries"] = $countries[$entry->country_s];
						 $chaine2 .= $delim.$countries[$entry->country_s];
					 }else{
						 $entryInfo .= ".";
						 $chaine2 .= $delim;
					 }
				}else{
					$chaine2 .= $delim;
				}

				//Cas où certaines communications sont recensées sous formes d'abstracts dans des revues
				if ($docType_s == "COMM" || $docType_s == "COMM+POST") {
					//Adding source_s:
					$chaine1 .= $delim."Source";
					if(isset($entry->source_s) && $entry->source_s != ""){
						$entryInfo .= " <em>".$entry->source_s."</em>,";
						$resArray[$iRA]["source"] = $entry->source_s;
						$chaine2 .= $delim.$entry->source_s;
					}else{
						if(isset($entry->bookTitle_s) && $entry->bookTitle_s != "") {
							$entryInfo .= " <em>".$entry->bookTitle_s."</em>,";
							$resArray[$iRA]["source"] = $entry->bookTitle_s;
							$chaine2 .= $delim.$entry->bookTitle_s;
						}else{
							$chaine2 .= $delim;
						}
					}
					//Adding volume_s:
					$vol = 0;
					$chaine1 .= $delim."Volume";
					if(isset($entry->volume_s) && $entry->volume_s != ""){
						$vol = 1;
						$entryInfo .= " ".$entry->volume_s;
						$chaine2 .= $delim.$entry->volume_s;
					}else{
						$chaine2 .= $delim;
					}
					//Adding issue_s:
					$iss = 0;
					$chaine1 .= $delim."Numéro";
					if(isset($entry->issue_s) && $entry->issue_s != ""){
					 $iss = 1;
					 $entryInfo .= "(".$entry->issue_s[0].")";
					 $chaine2 .= $delim.$entry->issue_s[0];
					}else{
					 $chaine2 .= $delim;
					}
					//Adding page_s:
					$chaine1 .= $delim."Pagination";
					if(isset($entry->page_s) && $entry->page_s != ""){
					 if ($vol == 1 && $iss == 1) {
						$entryInfo .= ":";
					 }else{
						$entryInfo .= " ";
					 }
					 $entryInfo .= $entry->page_s;
					 $chaine2 .= $delim.$entry->page_s;
					}else{
					 $entryInfo .= " in press";
					 $chaine2 .= $delim;
					}
					$entryInfo .= ".";
				}

				//Adding conferenceStartDate_s:
				//if ($docType_s=="COMM" || $docType_s=="POSTER" || $docType_s == "COMM+POST"){
					 //$entryInfo .= ", ".$entry->conferenceStartDate_s;
				//}

				//Ajout de l'identifiant et des actes pour les posters avec actes
				if ($docType_s == "POSTER") {
					//Adding source_s:
					$chaine1 .= $delim."Source";
					if(isset($entry->source_s) && $entry->source_s != ""){
					 $entryInfo .= " <em>".$entry->source_s."</em>,";
					 $chaine2 .= $delim.$entry->source_s;
					}
					$chaine2 .= $delim;
					//Adding volume_s:
					$chaine1 .= $delim."Volume";
					if(isset($entry->volume_s) && $entry->volume_s != ""){
					 $entryInfo .= " <em>".$entry->volume_s."</em>,";
					 $chaine2 .= $delim.$entry->volume_s;
					}
					$chaine2 .= $delim;
					//Adding page_s:
					$chaine1 .= $delim."Page/identifiant";
					if(isset($entry->page_s) && $entry->page_s != ""){
					 $entryInfo .= " <em>pp.".$entry->page_s."</em>,";
					 $chaine2 .= $delim.$entry->page_s;
					}
					$chaine2 .= $delim;
				}

				//Adding (avec acte)/(sans acte) pour les communications et posters
				if ($docType_s == "COMM" || $docType_s == "POSTER" || $docType_s == "COMM+POST") {
					if (isset($typavsa) && $typavsa == "vis") {
						$chaine1 .= $delim."Info avsa";
						if ($entry->proceedings_s == "0") {
							$entryInfo .= " <em>(sans acte)</em>";
							$resArray[$iRA]["avsa"] = " <em>(sans acte)</em>";
							$chaine2 .= $delim."(sans acte)";
						}else{
							$entryInfo .= " <em>(avec acte)</em>";
							$resArray[$iRA]["avsa"] = " <em>(avec acte)</em>";
							$chaine2 .= $delim."(avec acte)";
						}
					}
				}

				//Adding patent number:
				$chaine1 .= $delim."Patent n°";
				if ($docType_s=="PATENT"){
					$entryInfo .= " Patent n°".$entry->number_s[0];
					$chaine2 .= $delim.$entry->number_s[0];
				}else{
					$chaine2 .= $delim;
				}

				//Adding $dateprod (=producedDateY_i ou conferenceStartDateY_i) :
				$chaine1 .= $delim."Date de publication";
				if ($docType_s=="PATENT"){
					$entryInfo .= " (".$dateprod.")";
					$chaine2 .= $delim.$dateprod;
				}else{
					$chaine2 .= $delim;
				}

				//Adding reportType_s:
				$chaine1 .= $delim."Type de rapport";
				if ($docType_s=="REPORT" && isset($entry->reportType_s)) {
					if ($entry->reportType_s == 6) {$reportType = "Rapport de recherche";}
					if ($entry->reportType_s == 2) {$reportType = "Contrat";}
					if ($entry->reportType_s == 5) {$reportType = "Stage";}
					if ($entry->reportType_s == 3) {$reportType = "Interne";}
					if ($entry->reportType_s == 1) {$reportType = "Travail universitaire";}
					if ($entry->reportType_s == 4) {$reportType = "Rapport technique";}
					if ($entry->reportType_s == 0) {$reportType = "Rapport de recherche";}
					$entryInfo .= ". ".$reportType;
					$resArray[$iRA]["reportType"] = $reportType;
					$chaine2 .= $delim.$reportType;
				}else{
					$chaine2 .= $delim;
				}

				//Adding number_s:
				$chaine1 .= $delim."N°";
				if ($docType_s=="REPORT" && isset($entry->number_s)) {
					 $entryInfo .= ", N°".$entry->number_s[0];
					 $resArray[$iRA]["reportNumber"] = ", N°".$entry->number_s[0];
					 $chaine2 .= $delim.$entry->number_s[0];
				}else{
					$chaine2 .= $delim;
				}

				//Adding authorityInstitution_s:
				$chaine1 .= $delim."Organisme de délivrance";
				if ($docType_s=="REPORT" && isset($entry->authorityInstitution)) {
					 $entryInfo .= ". ".$entry->authorityInstitution;
					 $resArray[$iRA]["authorityInstitution"] = $entry->authorityInstitution;
					 $chaine2 .= $delim.$entry->authorityInstitution;
				}else{
					$chaine2 .= $delim;
				}

				//Adding page_s for report:
				$chaine1 .= $delim."Pages";
				if ($docType_s=="REPORT") {
					if (isset($entry->page_s)) {
						 $entryInfo .= ". ".$entry->page_s;
						 $chaine2 .= $delim.$entry->page_s;
						 if (strpos($entry->page_s, "p") === false) {$entryInfo .= "p.";}
					}else{
						$entryInfo .= ", in press";
						$chaine2 .= $delim;
					}
				}else{
					$chaine2 .= $delim;
				}

				//Adding $dateprod (=producedDateY_i ou conferenceStartDateY_i) :
				$chaine1 .= $delim."Date de publication";
				if ($docType_s=="OUV" or $docType_s=="DOUV" or $docType_s=="COUV" or $docType_s=="OUV+COUV" or $docType_s=="OUV+DOUV" or $docType_s=="OUV+COUV+DOUV" or $docType_s=="OTHER" or $docType_s=="OTHERREPORT" or $docType_s=="REPORT" or $docType_s=="VIDEO"){
					 if ($typann == "avant") {
						$entryInfo .= ", ".$dateprod.".";
						$chaine2 .= $delim.$dateprod;
					 }else{
						$chaine2 .= $delim;
					 }
				}else{
					$chaine2 .= $delim;
				}

				//Thesis - adding director_s
				$chaine1 .= $delim."Directeur de thèse";
				if ($docType_s=="THESE" && isset($entry->director_s)){
					$entryInfo .= "Dir : ".$entry->director_s[0].".";
					$resArray[$iRA]["thesisDirector"] = "Dir : ".$entry->director_s[0].".";
					$chaine2 .= $delim.$entry->director_s[0];
				}else{
					$chaine2 .= $delim;
				}

				//Thesis - adding authorityInstitution_s
				$chaine1 .= $delim."Université de soutenance";
				if ($docType_s=="THESE" && isset($entry->authorityInstitution_s)){
					$entryInfo .= " ".$entry->authorityInstitution_s[0];
					$resArray[$iRA]["authorityInstitution"] = $entry->authorityInstitution_s[0];
					$chaine2 .= $delim.$entry->authorityInstitution_s[0];
				}else{
					$chaine2 .= $delim;
				}

				//Thesis - adding defenseDateY_i
				$chaine1 .= $delim."Année de soutenance";
				if ($docType_s=="THESE" && isset($entry->defenseDateY_i)){
					$entryInfo .= ", ".$entry->defenseDateY_i;
					$resArray[$iRA]["defenseDate"] = $entry->defenseDateY_i;
					$chaine2 .= $delim.$entry->defenseDateY_i;
				}else{
					$chaine2 .= $delim;
				}

				//HDR - adding authorityInstitution_s
				$chaine1 .= $delim."Organisme de délivrance";
				if ($docType_s=="HDR" && isset($entry->authorityInstitution_s)){
					$entryInfo .= "HDR, ".$entry->authorityInstitution_s[0];
					$chaine2 .= $delim.$entry->authorityInstitution_s[0];
				}else{
					$chaine2 .= $delim;
				}
				
				//Corrections diverses
				$entryInfo = nettoy1($entryInfo);
				$entryInfo0 = nettoy1($entryInfo0);
				//$entryInfo = str_replace(array(". : ",",, ",", , ","..","?.","?,","<br>.","--"), array(" : ",", ",", ",".","?","?","<br>","-"), $entryInfo);
				//$entryInfo0 = str_replace(array(". : ",",, ",", , ","..","?.","?,","<br>.","--"), array(" : ",", ",", ",".","?","?","<br>","-"), $entryInfo0);

				//Ordre à respecter
				$ord = "non";
				if ($nmo != "- -" && $gp1 != "- -" && $gp2 != "- -" && $gp3 != "- -" && $gp4 != "- -" && $gp5 != "- -" && $gp6 != "- -" && $gp7 != "- -" && $sep1 != "- -" && $sep2 != "- -" && $sep3 != "- -" && $sep4 != "- -" && $sep5 != "- -" && $sep6 != "- -" && $sep7 != "- -") {
					//echo 'toto : '.$gp1.' '.$gp2.' '.$gp3.' '.$gp4.' ';
					$ord = "oui";
					//Mise en page des groupes
					$i = 1;
					while ($i <= 7) {//$i = Nombre de groupes
						if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~gras~") !== false) {${"deb" .$i . "_1"} = "<strong>";${"fin" . $i ."_1"} = "</strong>";}else{${"deb" .$i . "_1"} = "";${"fin" .$i . "_1"} = "";}
						if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~soul~") !== false) {${"deb" .$i . "_2"} = "<u>";${"fin" . $i ."_2"} = "</u>";}else{${"deb" .$i . "_2"} = "";${"fin" .$i . "_2"} = "";}
						if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~ital~") !== false) {${"deb" .$i . "_3"} = "<em>";${"fin" . $i ."_3"} = "</em>";}else{${"deb" .$i . "_3"} = "";${"fin" .$i . "_3"} = "";}
						if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~epar~") !== false) {${"deb" .$i . "_4"} = "(";${"fin" . $i ."_4"} = ")";}else{${"deb" .$i . "_4"} = "";${"fin" .$i . "_4"} = "";}
						if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~egui~") !== false) {${"deb" .$i . "_5"} = "\"";${"fin" . $i ."_5"} = "\"";}else{${"deb" .$i . "_5"} = "";${"fin" .$i . "_5"} = "";}
						if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~ecro~") !== false) {${"deb" .$i . "_6"} = "[";${"fin" . $i ."_6"} = "]";}else{${"deb" .$i . "_6"} = "";${"fin" .$i . "_6"} = "";}
						${"debcg" .$i} = "<font color=\"".${"choix_cg" . $i}."\">";
						${"fincg" . $i} = "</font>";
						$i++;
					}
					$entryOrd = "";
					$rtfOrd = array();
					$rtfSep = array();
					$rtfOrd[0] = $entryOrd;
					$rtfSep[0] = "";
					//Est-ce une notice significative à mettre en évidence et, si oui, faut-il l'afficher ?
					if (isset($entry->signif) && $entry->signif == "oui") {
						//$entryInfo0 .= "<img alt='Important' title='Notice importante' src='./img/sign.jpg'>&nbsp;";
						$entryOrd .= $signTxt;
						//$resArray[$iRA]["authors"] = $extract;
					}
					if (isset($resArray[$iRA]["GR"])) {$entryOrd .= $resArray[$iRA]["GR"];}
					$i = 1;
					while ($i <= 7) {//$i = Nombre de groupes
						$entryOrdi = "".${"deb" .$i . "_1"};
						$entryOrdi .= "".${"deb" .$i . "_2"};
						$entryOrdi .= "".${"deb" .$i . "_3"};
						$entryOrdi .= "".${"deb" .$i . "_4"};
						$entryOrdi .= "".${"deb" .$i . "_5"};
						$entryOrdi .= "".${"deb" .$i . "_6"};
						//$entryOrdi .= "".${"debcg" .$i};
						//$entryOrdf = "".${"fincg" .$i};
						$entryOrdf = "".${"fin" .$i . "_6"};
						$entryOrdf .= "".${"fin" .$i . "_5"};
						$entryOrdf .= "".${"fin" .$i . "_4"};
						$entryOrdf .= "".${"fin" .$i . "_3"};
						$entryOrdf .= "".${"fin" .$i . "_2"};
						$entryOrdf .= "".${"fin" .$i . "_1"};
						switch (${"gp" . $i}) {
							case "auteurs":
								if (isset($resArray[$iRA]["authors"])) {
									$entryAut = $resArray[$iRA]["authors"];
								}else{
									$entryAut = "";
								}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~emin~") !== false) {$entryAut = mb_strtolower($resArray[$iRA]["authors"],'UTF-8');}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~emaj~") !== false) {$entryAut = mb_strtoupper($resArray[$iRA]["authors"],'UTF-8');}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~effa~") !== false) {$entryAut = "";}
								$rtfOrd[$i] = $entryOrdi.$entryAut.$entryOrdf;
								$entryOrd .= $entryOrdi.${"debcg" .$i};
								$entryOrd .= $entryAut;
								$entryOrd .= ${"fincg" .$i}.$entryOrdf;
								break;
							case "revue":
								if (isset($resArray[$iRA]["revue"])) {
									$entryRev = $resArray[$iRA]["revue"];
								}else{
									$entryRev = "";
								}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~emin~") !== false) {$entryRev = mb_strtolower($resArray[$iRA]["revue"],'UTF-8');}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~emaj~") !== false) {$entryRev = mb_strtoupper($resArray[$iRA]["revue"],'UTF-8');}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~effa~") !== false) {$entryRev = "";}
								$rtfOrd[$i] = $entryOrdi.$entryRev.$entryOrdf;
								$entryOrd .= $entryOrdi.${"debcg" .$i};
								$entryOrd .= $entryRev;
								$entryOrd .= ${"fincg" .$i}.$entryOrdf;
								break;
							case "titre":
								if (isset($resArray[$iRA]["titre"])) {
									$entryTit = $resArray[$iRA]["titre"];
								}else{
									$entryTit = "";
								}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~emin~") !== false) {$entryTit = mb_strtolower($resArray[$iRA]["titre"],'UTF-8');}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~emaj~") !== false) {$entryTit = mb_strtoupper($resArray[$iRA]["titre"],'UTF-8');}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~effa~") !== false) {$entryTit = "";}
								$rtfOrd[$i] = $entryOrdi.$entryTit.$entryOrdf;
								$entryOrd .= $entryOrdi.${"debcg" .$i};
								$entryOrd .= $entryTit;
								$entryOrd .= ${"fincg" .$i}.$entryOrdf;
								break;
							case "année":
								if (isset($resArray[$iRA]["annee"])) {
									$entryAnn = $resArray[$iRA]["annee"];
								}else{
									$entryAnn = "";
								}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~emin~") !== false) {$entryAnn = mb_strtolower($resArray[$iRA]["annee"],'UTF-8');}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~emaj~") !== false) {$entryAnn = mb_strtoupper($resArray[$iRA]["annee"],'UTF-8');}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~effa~") !== false) {$entryAnn = "";}
								$rtfOrd[$i] = $entryOrdi.$entryAnn.$entryOrdf;
								$entryOrd .= $entryOrdi.${"debcg" .$i};
								$entryOrd .= $entryAnn;
								$entryOrd .= ${"fincg" .$i}.$entryOrdf;
								break;
							case "volume":
								if (isset($resArray[$iRA]["volume"])) {
									if (isset($stpdf) && $stpdf == "zo1") {
										$entryVol = "vol.".$resArray[$iRA]["volume"];
									}else{
										$entryVol = $resArray[$iRA]["volume"];
									}
								}else{
									$entryVol = "";
								}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~emin~") !== false) {$entryVol = mb_strtolower($resArray[$iRA]["volume"],'UTF-8');}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~emaj~") !== false) {$entryVol = mb_strtoupper($resArray[$iRA]["volume"],'UTF-8');}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~effa~") !== false) {$entryVol = "";}
								$rtfOrd[$i] = $entryOrdi.$entryVol.$entryOrdf;
								$entryOrd .= $entryOrdi.${"debcg" .$i};
								$entryOrd .= $entryVol;
								$entryOrd .= ${"fincg" .$i}.$entryOrdf;
								break;
							case "numéro":
								if (isset($resArray[$iRA]["issue"])) {
									if (isset($stpdf) && $stpdf == "zo1") {
										$entryNum = "n°".$resArray[$iRA]["issue"];
									}else{
										$entryNum = $resArray[$iRA]["issue"];
									}
								}else{
									$entryNum = "";
								}
								if ($entryNum != "") {
									if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~emin~") !== false) {$entryNum = mb_strtolower($resArray[$iRA]["issue"],'UTF-8');}
									if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~emaj~") !== false) {$entryNum = mb_strtoupper($resArray[$iRA]["issue"],'UTF-8');}
									if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~effa~") !== false) {$entryNum = "";}
									$rtfOrd[$i] = $entryOrdi.$entryNum.$entryOrdf;
									$entryOrd .= $entryOrdi.${"debcg" .$i};
									$entryOrd .= $entryNum;
									$entryOrd .= ${"fincg" .$i}.$entryOrdf;
								}else{
									$rtfOrd[$i] = $entryOrdi.$entryNum.$entryOrdf;
								}
								break;
							case "pages":
								if (isset($resArray[$iRA]["page"])) {
									$entryPag = $resArray[$iRA]["page"];
								}else{
									$entryPag = "";
								}
								if ($entryPag == "") {$entryPag = "sans pagination";}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~emin~") !== false) {$entryPag = mb_strtolower($resArray[$iRA]["page"],'UTF-8');}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~emaj~") !== false) {$entryPag = mb_strtoupper($resArray[$iRA]["page"],'UTF-8');}
								if (isset(${"choix_mp" . $i}) && strpos(${"choix_mp" . $i}, "~effa~") !== false) {$entryPag = "";}
								$rtfOrd[$i] = $entryOrdi.$entryPag.$entryOrdf;
								$entryOrd .= $entryOrdi.${"debcg" .$i};
								$entryOrd .= $entryPag;
								$entryOrd .= ${"fincg" .$i}.$entryOrdf;
								break;
						}
						switch (${"sep" . $i}) {
							case " ":
								$entryOrd .= " ";
								$rtfSep[$i] = " ";
								break;
							case ", ":
								$entryOrd .= ", ";
								$rtfSep[$i] = ", ";
								break;
							case ". ":
								$entryOrd .= ". ";
								$rtfSep[$i] = ". ";
								break;
							case "; ":
								$entryOrd .= "; ";
								$rtfSep[$i] = "; ";
								break;
							case " - ":
								$entryOrd .= " - ";
								$rtfSep[$i] = " - ";
								break;
							case "":
								$entryOrd .= "";
								$rtfSep[$i] = "";
								break;
							case ": ":
								$entryOrd .= ": ";
								$rtfSep[$i] = ": ";
								break;
							//cas spéciaux
							case ", vol. ":
								$entryOrd .= ", vol. ";
								$rtfSep[$i] = ", vol. ";
								break;
							case ", Vol. ":
								$entryOrd .= ", Vol. ";
								$rtfSep[$i] = ", Vol. ";
								break;
							case ", no. ":
								$entryOrd .= ", no. ";
								$rtfSep[$i] = ", no. ";
								break;
							case ", No.":
								$entryOrd .= " , No.";
								$rtfSep[$i] = " , No.";
								break;
							case ", pp. ":
								$entryOrd .= ", pp. ";
								$rtfSep[$i] = ", pp. ";
								break;
							case ":":
								$entryOrd .= ":";
								$rtfSep[$i] = ":";
								break;
							case ";":
								$entryOrd .= ";";
								$rtfSep[$i] = ";";
								break;
						}
						$i++;
					}
					$rtfOrd[$i] = $entryInfo;
					//$entryInfo = $entryOrd . $entryInfo;
					$entryInfo = $entryOrd;
					$i = 0;
					$rtfInfo = "~|~";
					while($i < count($rtfSep)) {
						$rtfInfo .= $rtfOrd[$i]."~|~".$rtfSep[$i]."~|~";
						$i++;
					}
					$rtfInfo .= $rtfOrd[$i]."~|~";
				}else{
					//Concaténation
					$entryInfo = $entryInfo0 . $entryInfo;
					$rtfInfo = $entryInfo;
				}

				$rtfInfo = str_ireplace(array("  ", "~|~. ~|~~|~", "<SUP>", "</SUP>", "<SUB>", "</SUB>", "<INF>", "</INF>"), array(" ", "", "", "", "", ""), $rtfInfo);
				//echo $entryOrd.'<br>';
				//echo $entryInfo.'<br>';
				//echo $rtfInfo.'<br>';
				//var_dump($rtfSep);

				//Thesis - adding nntId_s
				$rtfnnt = "";
				$chaine1 .= $delim."NNT";
				if ($docType_s=="THESE" && isset($entry->nntId_s)){
					$entryInfo .= ". NNT: <a target='_blank' href='http://www.theses.fr/".$entry->nntId_s."'>".$entry->nntId_s."</a>";
					$rtfnnt = $entry->nntId_s;
					$chaine2 .= $delim.$entry->nntId_s;
				}else{
					$chaine2 .= $delim;
				}
				
				//Adding URL
				$rtfurl = "";
				$chaine1 .= $delim."URL";
				if (isset($entry->publisherLink_s[0]) && $typurl == "vis") {
					$entryInfo .= ". URL: <a target='_blank' href='".$entry->publisherLink_s[0]."'>".$entry->publisherLink_s[0]."</a>";
					$entryInfo = str_replace(array(" . URL", " , "), array(". URL", ", "), $entryInfo);
					$rtfurl = $entry->publisherLink_s[0];
					$chaine2 .= $delim.$entry->publisherLink_s[0];
				}else{
					if ($docType_s == "BLO" && isset($entry->page_s)) {
						$entryInfo .= ", [En ligne] URL : <a target='_blank' href='".$entry->page_s."'>".$entry->page_s."</a>";
						$rtfurl = $entry->page_s;
						$chaine2 .= $delim.$entry->page_s;
					}else{
						$chaine2 .= $delim;
					}
				}
				
				//Adding DOI
				$rtfdoi = "";
				$chaine1 .= $delim."DOI";
				if (isset($entry->doiId_s) && $typdoi == "vis") {
					//Est-ce un doublon et, si oui, faut-il l'afficher?
					$deb = "";
					$fin = "";
					if (stripos($listedoi, $entry->doiId_s) === false) {//non
						$listedoi .= "~".$entry->doiId_s;
					}else{
						if ($surdoi == "vis") {
							$deb = "<span style='background:#00FF00'><strong>";
							$fin = "</strong></span>";
						}
					}
					$entryInfo .= ". DOI: <a target='_blank' href='https://doi.org/".$entry->doiId_s."'>".$deb."https://doi.org/".$entry->doiId_s.$fin."</a>";
					$entryInfo = str_replace(array(" . DOI", " , "), array(". DOI", ", "), $entryInfo);
					$rtfdoi = $entry->doiId_s;
					$chaine2 .= $delim.$entry->doiId_s;
				}else{
					$chaine2 .= $delim;
				}

				//Export DOI pour VOSviewerDOI
				if (isset($entry->doiId_s)) {
					$chaine3 = $entry->doiId_s.chr(13).chr(10);
					$inF3 = fopen($Fnm3,"a+");
					fwrite($inF3,$chaine3);
				}
				
				//Export HCERES
				(isset($entry->doiId_s)) ? $chaineH .= $delim.$entry->doiId_s : $chaineH .= $delim;
				//Equipe
				$eqpH = '';
				for($i = 1; $i <= $nbeqp; $i++) {
					if (strpos($entryInfo0H, 'GR'.$i) !== false) {
						$eqpH .= $i.', ';
					}
				}
				if (strlen($eqpH) > 0) {$eqpH = substr($eqpH, 0, -2);}
				$chaineH .= $delim.$eqpH;
				//Doctorant
				$chaineH .= $delim;
				//CA
				$chaineH .= $delim.$CA;
				//OA
				if ((!empty($entry->submitType_s) && $entry->submitType_s == "file") || (!empty($entry->linkExtId_s) && ($entry->linkExtId_s == "openaccess" || $entry->linkExtId_s == "arxiv" || $entry->linkExtId_s == "pubmedcentral"))) {$chaineH .= $delim.'O';}else{$chaineH .= $delim.'N';}
				//HAL id
				if (!empty($entry->halId_s)) {$chaineH .= $delim.$entry->halId_s;}else{$chaineH .= $delim;}
				//UT
				if (!empty($entry->wosId_s)) {$chaineH .= $delim.$entry->wosId_s[0];}else{$chaineH .= $delim;}
				
				//Adding Pubmed ID
				$rtfpubmed = "";
				$chaine1 .= $delim."Pubmed";
				if (isset($entry->pubmedId_s) && $typpub == "vis") {
					$entryInfo .= ". Pubmed: <a target='_blank' href='http://www.ncbi.nlm.nih.gov/pubmed/".$entry->pubmedId_s."'>".$entry->pubmedId_s."</a>";
					$rtfpubmed = $entry->pubmedId_s;
					$chaine2 .= $delim.$entry->pubmedId_s;
				}else{
					$chaine2 .= $delim;
				}

				//Adding localReference_s
				$rtflocref = "";
				$chaine1 .= $delim."Référence locale";
				if ($docType_s=="UNDEF" && isset($entry->localReference_s[0])) {
					$entryInfo .= ". Référence: ".$entry->localReference_s[0];
					$rtflocref = $entry->localReference_s[0];
					$chaine2 .= $delim.$entry->localReference_s[0];
				}else{
					$chaine2 .= $delim;
				}

				//Adding ArXiv ID
				$rtfarxiv = "";
				$chaine1 .= $delim."ArXiv";
				if (isset($entry->arxivId_s) && $typidh != "vis") {
					$entryInfo .= ". ArXiv: <a target='_blank' href='http://arxiv.org/abs/".$entry->arxivId_s."'>".$entry->arxivId_s."</a>";
					$rtfarxiv = $entry->arxivId_s;
					$chaine2 .= $delim.$entry->arxivId_s;
				}else{
					$chaine2 .= $delim;
				}

				//Adding description_s
				$rtfdescrip = "";
				$chaine1 .= $delim."Description";
				if ($docType_s=="OTHER" && isset($entry->description_s)) {
					$entryInfo .= ". ".ucfirst($entry->description_s);
					$rtfdescrip = $entry->description_s;
					$chaine2 .= $delim.$entry->description_s;
				}else{
					$chaine2 .= $delim;
				}

				//Adding seeAlso_s
				$rtfalso = "";
				$chaine1 .= $delim."Voir aussi";
				if (($docType_s=="PATENT" || $docType_s=="REPORT" || $docType_s=="UNDEF" || $docType_s=="OTHER") && isset($entry->seeAlso_s)) {
					$entryInfo .= ". URL: <a target='_blank' href='".$entry->seeAlso_s[0]."'>".$entry->seeAlso_s[0]."</a>";
					$rtfalso = $entry->seeAlso_s[0];
					$chaine2 .= $delim.$entry->seeAlso_s[0];
				}else{
					$chaine2 .= $delim;
				}
				
				//Adding swhId_s for docType SOFTWARE
				$rtfrefswh = "";
				if ($docType_s == "SOFTWARE") {
					$chaine1 .= $delim."Lien Software Heritage";
					if (isset($entry->swhId_s)) {
						$urlSWH = "https://archive.softwareheritage.org/browse/".$entry->swhId_s[0];
						$entryInfo .= ". <a target='_blank' href='https://archive.softwareheritage.org/browse/".$entry->swhId_s[0]."'>".$entry->swhId_s[0]."</a>";
						$rtfrefswh = $entry->swhId_s[0];
						$chaine2 .= $delim.$entry->swhId_s[0];
					}else{
						$chaine2 .= $delim;
					}
				}

				//Adding in relation with
				$rtfrelation = "";
				$chaine1 .= $delim."Fait référence à";
				if (isset($entry->related_s)) {
					$entryInfo .= ". Fait référence à: <a target='_blank' href='".$entry->related_s[0]."'>".str_replace("https://hal.archives-ouvertes.fr/", "", $entry->related_s[0])."</a>";
					$rtfrelation = $entry->related_s[0];
					$chaine2 .= $delim.str_replace("https://hal.archives-ouvertes.fr/", "", $entry->related_s[0]);
				}else{
					$chaine2 .= $delim;
				}
				
				//Adding référence HAL
				$rtfrefhal = "";
				$chaine1 .= $delim."Réf. HAL";
				if (isset($entry->halId_s) && $typidh == "vis") {
					$entryInfo .= ". Réf. HAL: <a target='_blank' href='".$racine.$entry->halId_s."'>".$entry->halId_s."</a>";
					$rtfrefhal = $entry->halId_s;
					$chaine2 .= $delim.$entry->halId_s;
				}else{
					$chaine2 .= $delim;
				}
				
				//Adding ANR associated funding
				$rtffinANR = "";
				$chaine1 .= $delim."ANR associated funding";
				if (isset($entry->anrProjectReference_s) && $finass == "oui") {
					$iANR = 0;
					$entryInfo .= ". ANR: ";
					while(isset($entry->anrProjectReference_s[$iANR])) {
						$entryInfo .= $entry->anrProjectReference_s[$iANR].", ";
						$rtffinANR .= $entry->anrProjectReference_s[$iANR].", ";
						$iANR++;
					}
					$entryInfo = substr($entryInfo, 0, (strlen($entryInfo)-2));
					$rtffinANR = substr($rtffinANR, 0, (strlen($rtffinANR)-2));
					$chaine2 .= $delim.$rtffinANR;
				}else{
					$chaine2 .= $delim;
				}
				
				//Adding EU associated funding
				$rtffinEU = "";
				$chaine1 .= $delim."EU associated funding";
				if (isset($entry->europeanProjectCallId_s) && $finass == "oui") {
					$iEU = 0;
					$entryInfo .= ". EU: ";
					while(isset($entry->europeanProjectCallId_s[$iEU])) {
						$entryInfo .= $entry->europeanProjectCallId_s[$iEU].", ";
						$rtffinEU .= $entry->europeanProjectCallId_s[$iEU].", ";
						$iEU++;
					}
					$entryInfo = substr($entryInfo, 0, (strlen($entryInfo)-2));
					$rtffinEU = substr($rtffinEU, 0, (strlen($rtffinEU)-2));
					$chaine2 .= $delim.$rtffinEU;
				}else{
					$chaine2 .= $delim;
				}
				
				//Adding rang HCERES (Economie-Gestion)
				$rtfaeres = "";
				$chaine1 .= $delim."Rang HCERES (Economie-Gestion)";
				if ($docType_s=="ART" && isset($entry->journalIssn_s) && $typreva == "vis") {
					foreach($AERES_SHS AS $i => $valeur) {
						if (($AERES_SHS[$i]['issn'] == $entry->journalIssn_s) && ($AERES_SHS[$i]['rang'] != "")) {
							$entryInfo .= ". Rang HCERES: ".$AERES_SHS[$i]['rang'];
							$rtfaeres = $AERES_SHS[$i]['rang'];
							$chaine2 .= $delim.$AERES_SHS[$i]['rang'];
							break;
						}
					}
					if ($rtfaeres == "") {$chaine2 .= $delim;}
				}else{
					$chaine2 .= $delim;
				}

				//Adding rang HCERES (Toutes disciplines)
				$rtfhceres = "";
				$chaine1 .= $delim."Rang HCERES (Toutes disciplines)";
				if ($docType_s=="ART" && isset($entry->journalIssn_s) && $typrevh == "vis") {
					foreach($AERES_HCERES AS $i => $valeur) {
						if (($AERES_HCERES[$i]['issn'] == $entry->journalIssn_s) && ($AERES_HCERES[$i][$dscp] != "0")) {
							$entryInfo .= ". Revue classée HCERES";
							$rtfhceres = ". Revue classée HCERES";
							$chaine2 .= $delim."oui";
							break;
						}
					}
					if ($rtfhceres == "") {$chaine2 .= $delim;}
				}else{
					$chaine2 .= $delim;
				}

				//Adding rang CNRS
				$rtfcnrs = "";
				$chaine1 .= $delim."Rang CNRS";
				if ($docType_s=="ART" && $typrevc == "vis") {
					foreach($CNRS AS $i => $valeur) {
						if (($CNRS[$i]['titre'] == $entry->journalTitle_s) && ($CNRS[$i]['rang'] != "")) {
							$entryInfo .= ". Rang CNRS: ".$CNRS[$i]['rang'];
							$rtfcnrs = $CNRS[$i]['rang'];
							$chaine2 .= $delim.$CNRS[$i]['rang'];
							break;
						}
					}
					if ($rtfcnrs == "") {$chaine2 .= $delim;}
				}else{
					$chaine2 .= $delim;
				}
				
				//Adding Impact Factor
				ini_set('max_execution_time', 300);
				$rtfif = "";
				$JCR_LISTE = array();
				for ($t=1; $t<=20; $t++) {
					$JCR_LISTE[$t] = array();
				}
				if (isset($typif) && $typif == "vis") {
					if ($JT != "") {
						$IF = "";
						for ($t=1; $t<=20; $t++) {
							if (file_exists("./pvt/JCR".$t.".php")) {include "./pvt/JCR".$t.".php";}
						}
						if (file_exists("./pvt/JCR1.php")) {
							$JCR_LISTE = array_merge($JCR_LISTE[1], $JCR_LISTE[2], $JCR_LISTE[3], $JCR_LISTE[4], $JCR_LISTE[5], $JCR_LISTE[6], $JCR_LISTE[7], $JCR_LISTE[8], $JCR_LISTE[9], $JCR_LISTE[10], $JCR_LISTE[11], $JCR_LISTE[12], $JCR_LISTE[13], $JCR_LISTE[14], $JCR_LISTE[15], $JCR_LISTE[16], $JCR_LISTE[17], $JCR_LISTE[18], $JCR_LISTE[19], $JCR_LISTE[20]);
							foreach($JCR_LISTE AS $i => $valeur) {
								if (normalize(strtoupper(str_replace('&', 'and', $JCR_LISTE[$i]["Full Journal Title"]))) == normalize(strtoupper(str_replace('&', 'and', $JT)))) {$IF = $JCR_LISTE[$i]["Journal Impact Factor"];}
							}
						}else{
							$IF = "<em>unkwown</em>";
						}
						$chaine1 .= $delim."IF";
						$resArray[$iRA]["IF"] = $IF;
						if ($IF != ""){
							$entryInfo .= ". IF=".$IF;
							$rtfif = $IF;
							$chaine2 .= $delim.$IF;
						}else{
							$chaine2 .= $delim;
						}
					}
				}
				
				$rtfinc = "";
				/*
				//Adding JCR Top
				ini_set('max_execution_time', 300);
				$rtfinc = "";
				$InCites_LISTE = array();
				for ($t=1; $t<=20; $t++) {
					$InCites_LISTE[$t] = array();
				}
				if (isset($entry->journalIssn_s)) {$ISSN = $entry->journalIssn_s;}
				if (isset($typinc) && ($typinc == "vis" || $typinc == "vis1" || $typinc == "vis10")) {
					if ($ISSN != "") {
						$Inc = "";
						for ($t=1; $t<=20; $t++) {
							if (file_exists("./pvt/InCites".$t.".php")) {include "./pvt/InCites".$t.".php";}
						}
						if (file_exists("./pvt/InCites1.php")) {
							$InCites_LISTE = array_merge($InCites_LISTE[1], $InCites_LISTE[2], $InCites_LISTE[3], $InCites_LISTE[4], $InCites_LISTE[5], $InCites_LISTE[6], $InCites_LISTE[7], $InCites_LISTE[8], $InCites_LISTE[9], $InCites_LISTE[10], $InCites_LISTE[11], $InCites_LISTE[12], $InCites_LISTE[13], $InCites_LISTE[14], $InCites_LISTE[15], $InCites_LISTE[16], $InCites_LISTE[17], $InCites_LISTE[18], $InCites_LISTE[19], $InCites_LISTE[20]);
							foreach($InCites_LISTE AS $i => $valeur) {
								if (str_replace("-", "", $InCites_LISTE[$i]["ISSN"]) == str_replace("-", "", $ISSN) && ($InCites_LISTE[$i]["Quartile (top)"] == "1 %" || $InCites_LISTE[$i]["Quartile (top)"] == "10 %")) {//Correspondance ISSN
									$Inc = $InCites_LISTE[$i]["Quartile (top)"];
								}else{//Si pas de correspondance ISSN ou si absent, recherche sur le titre
									if (normalize(strtoupper(str_replace('&', 'and', $InCites_LISTE[$i]["Full Journal Title"]))) == normalize(strtoupper(str_replace('&', 'and', $JT))) && ($InCites_LISTE[$i]["Quartile (top)"] == "1 %" || $InCites_LISTE[$i]["Quartile (top)"] == "10 %")) {
										$Inc = $InCites_LISTE[$i]["Quartile (top)"];
									}
								}
							}
						}else{
							$Inc = "<em>unkwown</em>";
						}
						$chaine1 .= $delim."JCR Top";
						$resArray[$iRA]["JCR Top"] = $Inc;
						if ($Inc != ""){
							$entryInfo .= ". JCR Top ".$Inc;
							$rtfinc = $Inc;
							$chaine2 .= $delim.$Inc;
						}else{
							$chaine2 .= $delim;
						}
					}
				}
				*/
				
				//Adding comment:
				//if (isset($entry->comment_s)) {echo 'toto : '.$entry->comment_s.'<br>';}
				$rtfcomm = "";
				$chaine1 .= $delim."Commentaire";
				if (isset($typcomm) && $typcomm == "vis") {
					 if (isset($entry->comment_s) && $entry->comment_s!="" and $entry->comment_s!=" " and $entry->comment_s!="-" and $entry->comment_s!="?"){
						 $entryInfo .= " - ".$entry->comment_s;
						 $rtfcomm = $entry->comment_s;
						 $resArray[$iRA]["commentaire"] = $entry->comment_s;
						 $chaine2 .= $delim.$entry->comment_s;
					 }else{
						 $chaine2 .= $delim;
					 }
				}else{
					$chaine2 .= $delim;
				}
				
				//Adding internal reference:
				//if (isset($entry->comment_s)) {echo 'toto : '.$entry->comment_s.'<br>';}
				$rtfrefi = "";
				$chaine1 .= $delim."Référence interne";
				if (isset($typrefi) && $typrefi == "vis") {
					 if (isset($entry->localReference_s[0]) && $entry->localReference_s[0]!="" and $entry->localReference_s[0]!=" " and $entry->localReference_s[0]!="-" and $entry->localReference_s[0]!="?"){
						 $entryInfo .= " - ".$entry->localReference_s[0];
						 $rtfrefi = $entry->localReference_s[0];
						 $resArray[$iRA]["reference_interne"] = $entry->localReference_s[0];
						 $chaine2 .= $delim.$entry->localReference_s[0];
					 }else{
						 $chaine2 .= $delim;
					 }
				}else{
					$chaine2 .= $delim;
				}
				
				//Adding OA
				$rtfOA = "";
				$rtfOAURL = "";
				//PDF dans HAL
				if (!empty($entry->submitType_s) && $entry->submitType_s == "file") {
					$entryInfo .= " <a target='_blank' href='".$entry->files_s[0]."'><img style='width: 50px;' src='./img/pdf_grand.png'></a>";
					$rtfOA = "OA HAL";
					$rtfOAURL = $entry->files_s[0];
				}else{
					//Fichier hors HAL
					if (!empty($entry->linkExtId_s) && ($entry->linkExtId_s == "openaccess" || $entry->linkExtId_s == "arxiv" || $entry->linkExtId_s == "pubmedcentral")) {
						$entryInfo .= " <a target='_blank' href='".$entry->linkExtUrl_s."'><img style='width: 50px;' src='./img/oa_grand.png'></a>";
						$rtfOA = "OA hors HAL";
						$rtfOAURL = $entry->linkExtUrl_s;
					}
				}
				
				//Corrections diverses
				$entryInfo =str_replace("..", ".", $entryInfo);
				$entryInfo =str_replace(", .", ".", $entryInfo);
				$entryInfo =str_replace(",,", ",", $entryInfo);
				$entryInfo =str_replace(", , ", ", ", $entryInfo);
				$entryInfo =str_replace(" : ", ": ", $entryInfo);
				$entryInfo =str_replace(", No.,", ",", $entryInfo);
				$entryInfo =str_replace(", no.,", ",", $entryInfo);
				$entryInfo =str_replace("trolitrp", "...", $entryInfo);
				$rtfInfo =str_replace("..", ".", $rtfInfo);
				$rtfInfo =str_replace(",,", ",", $rtfInfo);
				$rtfInfo =str_replace(", .", ".", $rtfInfo);
				$rtfInfo =str_replace("trolitrp", "...", $rtfInfo);
				$rtfInfo =str_replace("~|~, ~|~~|~, ~|~", "~|~, ~|~", $rtfInfo);
				$rtfInfo =str_replace(", , ", ", ", $rtfInfo);
				$rtfInfo =str_replace(", . ", ". ", $rtfInfo);

				if (!isset($entry->page_s)) {
					$entryInfo = str_replace(array(",  in press", ", in press", " in press.", " in press", "; in press"), "", $entryInfo);
					$rtfInfo = str_replace(array(",  in press", ", in press", " in press.", " in press", "; in press"), "", $rtfInfo);
				}
				
				$entryInfo = $debgras.$entryInfo.$fingras;
				$rtfInfo = $debgras.$rtfInfo.$fingras;

				//Ajout de la référence au tableau final s'il n'a pas été demandé de limiter aux références dont le premier ou le dernier auteur dépend de la collection
				array_push($infoArray,$entryInfo);

				//if (isset($collCode_s) && $collCode_s != "" && isset($gr) && (strpos($gr, $collCode_s) !== false)) {
					//créer un tableau avec GR1,2,3... + (10000 - année) + premier auteur + année et faire un tri ensuite dessus ?
					//if($typchr == "decr") {//ordre chronologique décroissant
					 //array_push($sortArray,substr(10000-($dateprod),0,5)."-".$eqpgr."-".$entry->authAlphaLastNameFirstNameId_fs[0]."-".$entry->title_s[0]."-".$dateprod);
					//}else{
						//array_push($sortArray,substr($dateprod,0,5)."-".$eqpgr."-".$entry->authAlphaLastNameFirstNameId_fs[0]."-".$entry->title_s[0]."-".$dateprod);
					//}
				//}else{
					if($typtri == "premierauteur") {
						if($typchr == "decr") {//ordre chronologique décroissant
							array_push($sortArray,substr(10000-($dateprod),0,5)."-".$sign."-".$entry->authAlphaLastNameFirstNameId_fs[0]."-".$entry->title_s[0]."-".$dateprod);
						}else{
							array_push($sortArray,substr($dateprod,0,5)."-".$sign."-".$entry->authAlphaLastNameFirstNameId_fs[0]."-".$entry->title_s[0]."-".$dateprod);
						}
					}else{
						if($typchr == "decr") {//ordre chronologique décroissant
							array_push($sortArray,$sign."-".substr(10000-($dateprod),0,5)."-".$entry->journalTitle_s."-".$entry->authAlphaLastNameFirstNameId_fs[0]."-".$entry->title_s[0]."-".$dateprod);
						}else{
							array_push($sortArray,$sign."-".substr($dateprod,0,5)."-".$entry->journalTitle_s."-".$entry->authAlphaLastNameFirstNameId_fs[0]."-".$entry->title_s[0]."-".$dateprod);
						}
					}
				//}
				//array_push($sortArray,$dateprod);

				//Récupération du préfixe AERES pour affichage éventuel
				$affprefeq = "";
				if (isset($entry->popularLevel_s)) {
					if ($entry->popularLevel_s == 1) {
						$affprefeq = "PV";
					}else{
						if ($docType_s == "ART") {
							if (isset($entry->peerReviewing_s) && $entry->peerReviewing_s == 0) {
								$affprefeq = "ASCL";
							}else{
								$affprefeq = "ACL";
							}
						}
						if ($docType_s == "PATENT") {$affprefeq = "BRE";}
						if ($docType_s == "COMM") {
							if ($entry->invitedCommunication_s == 1) {$affprefeq = "C-INV";}
							if ($entry->proceedings_s == 1) {
								if ($entry->audience_s == 2) {
									$affprefeq = "C-ACTI";
								}else{
									$affprefeq = "C-ACTN";
								}
							}
							if ($entry->proceedings_s == 0) {$affprefeq = "C-COM";}
						}
						if ($docType_s == "POSTER") {$affprefeq = "C-AFF";}
						if ($docType_s == "DOUV") {$affprefeq = "DO";}
						if ($docType_s == "OUV" || $docType_s == "COUV") {$affprefeq = "OS";}
						//$affprefeq = "Toto";
					}
					if ($affprefeq == "") {$affprefeq = "AP";}
				}
				
				array_push($rtfArray,$rtfInfo."^|^".$rtfdoi."^|^".$rtfpubmed."^|^".$rtflocref."^|^".$rtfarxiv."^|^".$rtfdescrip."^|^".$rtfalso."^|^".$rtfrefhal."^|^".$rtfaeres."^|^".$rtfcnrs."^|^".$chaine1."^|^".$chaine2."^|^".$rtfnnt."^|^".$affprefeq."^|^".$racine."^|^".$rtfhceres."^|^".$rtfif."^|^".$rtfurl."^|^".$rtfcomm."^|^".$rtfrefi."^|^".$rtffinANR."^|^".$rtffinEU."^|^".$rtfrefswh."^|^".$rtfrelation."^|^".$rtfinc."^|^".$chaineH."^|^".$rtfOA."^|^".$rtfOAURL);
				
				//bibtex
				$bibLab = "";
				//if (isset($entry->label_bibtex)) {$bibLab = $entry->label_bibtex;}
				$typebib = "";
				$type = $entry->docType_s;
				switch($type)
					{
						case "ART":
							$typebib = "article";
							break;
						case "COMM":
							$typebib = "inproceedings";
							break;
						case "COUV":
							//$typebib = "inbook";
							$typebib = "incollection";
							break;
						case "THESE":
							$typebib = "phdthesis";
							break;
						case "UNDEFINED":
							$typebib = "unpublished";
							break;
						case "OTHER":
							$typebib = "misc";
							break;
						case "OUV":
							$typebib = "book";
							break;
						case "DOUV":
							$typebib = "proceedings";
							break;
						case "MEM":
							$typebib = "masterthesis";
							break;
						case "POSTER":
							$typebib = "poster";
							break;
						case "HDR":
							$typebib = "phdthesis";
							break;
						case "PATENT":
							$typebib = "patent";
							break;
						case "PRESCONF":
							$typebib = "presconf";
							break;
						case "VIDEO":
							$typebib = "video";
							break;
						case "SOFTWARE":
							$typebib = "software";
							break;
					}
				$bibLab .= chr(13).chr(10)."@".$typebib."{";
				$auteurs = $entry->authLastName_s[0];
				$bibLab .= mb_strtolower(str_replace(" ", "_", $auteurs), 'UTF-8');
				$titre = explode(" ", $entry->title_s[0]);
				$bibLab .= "_".mb_strtolower(normalize($titre[0]), 'UTF-8');
				if (isset($titre[1])) {$bibLab .= "_".mb_strtolower(normalize($titre[1]), 'UTF-8');}
				if (isset($titre[2])) {$bibLab .= "_".mb_strtolower(normalize($titre[2]), 'UTF-8');}
				//add a constant to differenciate same initial identifier
				if (isset($auteurs) && isset($titre))
				{
					$tit = mb_strtolower(str_replace(" ", "_", $auteurs), 'UTF-8')."_".mb_strtolower(normalize($titre[0]), 'UTF-8');
					if (isset($titre[1])) {$tit .= "_".mb_strtolower(normalize($titre[1]), 'UTF-8');}
					if (isset($titre[2])) {$tit .= "_".mb_strtolower(normalize($titre[2]), 'UTF-8');}
					if (strpos($listTit, "¤".$tit."¤") !== false)
					{
						$cst++;
						$chaine .= $cst;
					}
					$listTit .= $tit."¤";
				}
				if (isset($entry->producedDateY_i)) {$bibLab .= "_".mb_strtolower($entry->producedDateY_i, 'UTF-8');}
				if (isset($entry->halId_s)) {$bibLab .= "_".$entry->halId_s;}
				//Titre et sous titre peuvent être dans des langues différentes
				if (count($entry->title_s) > 1) {//Il y a au moins 2 langues
					if (isset($entry->en_title_s[0])) {//Recherche d'abord en anglais
						$bibLab .= ",".chr(13).chr(10)."	title = {".$entry->en_title_s[0];
						if (isset($entry->en_subTitle_s[0])) {//Existence d'un sous-titre en anglais
							$bibLab .= " : ".$entry->en_subTitle_s[0];
						}
						$bibLab .= "}";
					}else{
						if (isset($entry->fr_title_s[0])) {//Recherche d'abord en anglais
							$bibLab .= ",".chr(13).chr(10)."	title = {".$entry->fr_title_s[0];
							if (isset($entry->fr_subTitle_s[0])) {//Existence d'un sous-titre en anglais
								$bibLab .= " : ".$entry->fr_subTitle_s[0];
							}
							$bibLab .= "}";
						}
					}
				}else{
					if (isset($entry->title_s[0])) {
						$bibLab .= ",".chr(13).chr(10)."	title = {".$entry->title_s[0];
						if (isset($entry->subTitle_s[0])) {//existence d'un sous-titre
							$bibLab .= " : ".$entry->subTitle_s[0];
						}
						$bibLab .= "}";
					}
				}				
				if (isset($entry->volume_s)) {$bibLab .= ",".chr(13).chr(10)."	volume = {".$entry->volume_s."}";}
				if (isset($entry->bookTitle_s)) {$bibLab .= ",".chr(13).chr(10)."	booktitle= {".$entry->bookTitle_s."}";}
				if (isset($entry->scientificEditor_s)) {
					$sciedi = "";
					for($se=0; $se<count($entry->scientificEditor_s); $se++) {
						$sciedi .= $entry->scientificEditor_s[$se]." and ";
					}
					$sciedi = substr($sciedi, 0, (strlen($sciedi) - 4));
					$bibLab .= ",".chr(13).chr(10)."	editor= {".trim($sciedi)."}";
				}
				if (isset($entry->serie_s[0])) {$bibLab .= ",".chr(13).chr(10)."	series = {".$entry->serie_s[0]."}";}
				if (isset($entry->conferenceTitle_s)) {$bibLab .= ",".chr(13).chr(10)."	booktitle = {".$entry->conferenceTitle_s."}";}
				if (isset($entry->journalIssn_s)) {$bibLab .= ",".chr(13).chr(10)."	issn = {".$entry->journalIssn_s."}";}
				if (isset($entry->publisherLink_s[0])) {$bibLab .= ",".chr(13).chr(10)."	url = {".$entry->publisherLink_s[0]."}";}
				if (isset($entry->doiId_s)) {$bibLab .= ",".chr(13).chr(10)."	doi = {".$entry->doiId_s."}";}
				if (isset($entry->abstract_s[0])) {$bibLab .= ",".chr(13).chr(10)."	abstract = {".str_replace(array("{", "}"), "_", $entry->abstract_s[0])."}";}
				if (isset($entry->journalTitle_s)) {$bibLab .= ",".chr(13).chr(10)."	journal = {".$entry->journalTitle_s."}";}
				if (isset($authors)) {
					//add a comma after the name
					$iTA = 0;
					$auteurs = "";
					while ($iTA < count($entry->authLastName_s)){
						$auteurs .= ucwords(strtolower($entry->authLastName_s[$iTA]), "-").", ".prenomCompInit($entry->authFirstName_s[$iTA]).", ";
						$authorsBT = str_replace(ucwords(strtolower($entry->authLastName_s[$iTA]), "-")." ".prenomCompInit($entry->authFirstName_s[$iTA]), ucwords(strtolower($entry->authLastName_s[$iTA]), "-").", ".prenomCompInit($entry->authFirstName_s[$iTA]), $authorsBT);
						$iTA++;
					}
					$auteurs = substr($auteurs, 0, (strlen($auteurs) - 2));
					$auteurs = str_replace(".,", ". and ", $auteurs);
					if ($typbib == "oui") {
						$auteursBT = str_replace(array(".,", ".}</u>,", ".}</strong>,",".},"), array(". and ", ".} and ", ".} and ", ".} and "), $authorsBT);
						if (substr($auteursBT, -5) == " and ") {$auteursBT = substr($auteursBT, 0, (strlen($auteursBT) - 5));}
						$auteursBT = str_replace(array("<u>", "<strong>", "</u>", "</strong>"), "", $auteursBT);
						$bibLab .= ",".chr(13).chr(10)."	author = {".$auteursBT."}";
					}else{
						$bibLab .= ",".chr(13).chr(10)."	author = {".$auteurs."}";
					}
				}
				if (isset($entry->uri_s)) {$bibLab .= ",".chr(13).chr(10)."	url = {".$entry->uri_s."}";}
				if (isset($entry->page_s)) {$bibLab .= ",".chr(13).chr(10)."	pages = {".$entry->page_s."}";}
				if (isset($entry->funding_s)) {
					$funding = "";
					for($fu=0; $fu<count($entry->funding_s); $fu++) {
						$funding .= $entry->funding_s[$fu].", ";
					}
					$funding = substr($funding, 0, (strlen($funding) - 2));
					$bibLab .= ",".chr(13).chr(10)."	x-funding= {".$funding."}";
				}
				if (isset($entry->pubmedId_s)) {$bibLab .= ",".chr(13).chr(10)."	pmid = {".$entry->pubmedId_s."}";}
				if (isset($entry->publisher_s)) {$bibLab .= ",".chr(13).chr(10)."	publisher = {".$entry->publisher_s[0]."}";}
				if (isset($entry->producedDateY_i)) {$bibLab .= ",".chr(13).chr(10)."	year = {".$entry->producedDateY_i."}";}
				if ($entry->docType_s == "HDR") {$bibLab .= ",".chr(13).chr(10)."	type = {HDR}";}
				if (isset($entry->keyword_s)) {
					$keyword = "";
					for($ke=0; $ke<count($entry->keyword_s); $ke++) {
						$keyword .= $entry->keyword_s[$ke].", ";
					}
					$keyword = substr($keyword, 0, (strlen($keyword) - 2));
					$bibLab .= ",".chr(13).chr(10)."	keywords= {".$keyword."}";
				}
				if (isset($entry->halId_s)) {$bibLab .= ",".chr(13).chr(10)."	HAL_id = {".$entry->halId_s."}";}
				if (isset($entry->peerReviewing_s)) {$bibLab .= ",".chr(13).chr(10)."	peer_reviewing = {".$entry->peerReviewing_s."}";}
				if (isset($entry->audience_s)) {$bibLab .= ",".chr(13).chr(10)."	audience = {".$entry->audience_s."}";}
				if (isset($entry->proceedings_s)) {$bibLab .= ",".chr(13).chr(10)."	proceedings = {".$entry->proceedings_s."}";}
				if (isset($entry->invitedCommunication_s)) {$bibLab .= ",".chr(13).chr(10)."	invited_communication = {".$entry->invitedCommunication_s."}";}
				if (isset($entry->version_i)) {$bibLab .= ",".chr(13).chr(10)."	HAL_version = {v".$entry->version_i."}";}
				//$bibPR = "";
				//if (isset($entry->peerReviewing_s)) {$bibPR = $entry->peerReviewing_s;}
				//$bibAud = "";
				//if (isset($entry->audience_s)) {$bibAud = $entry->audience_s;}
				//$bibPro = "";
				//if (isset($entry->proceedings_s)) {$bibPro = $entry->proceedings_s;}
				//$bibInv = "";
				//if (isset($entry->invitedCommunication_s)) {$bibInv = $entry->invitedCommunication_s;}
				//array_push($bibArray,$bibLab."¤".$bibPR."¤".$bibAud."¤".$bibPro."¤".$bibInv);
				$bibLab .= ",".chr(13).chr(10)."}";
				array_push($bibArray,$bibLab);
		 $iRA++;
		 }
		 $tab++;
	  }
	 }
   $result=array();
   array_push($result,$infoArray);
   array_push($result,$sortArray);
   array_push($result,$rtfArray);
   array_push($result,$bibArray);
   array_push($result,$resArray);
   //var_dump($infoArray);
   return $result;
}
?>