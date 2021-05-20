<?php
function displayRefList($docType_s,$collCode_s,$specificRequestCode,$countries,$anneedeb,$anneefin,$refType,$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$idst,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7){
	$infoArray = array();
	$sortArray = array();
	$rtfArray = array();
	$bibArray = array();
	$resArray = array();

	if ($docType_s=="COMPOSTER"){
		//Request on a union of HAL types
		//COMM ACTI
		$result = getReferences($infoArray,$resArray,$sortArray,"COMM",$collCode_s,"%20AND%20proceedings_s:1%20AND%20audience_s:2".$specificRequestCode,$countries,$anneedeb,$anneefin,$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$idst,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
		//$result = getReferences($infoArray,$resArray,$sortArray,"COMM",$collCode_s,$specificRequestCode,$countries);
		$infoArray = $result[0];
		$sortArray = $result[1];
		$rtfArray = $result[2];
		$bibArray = $result[3];
		$resArray = $result[4];
		//COMM ACTN
		$result = getReferences($infoArray,$resArray,$sortArray,"COMM",$collCode_s,"%20AND%20proceedings_s:1%20AND%20audience_s:3%20OR%20audience_s:1%20OR%20audience_s:0".$specificRequestCode,$countries,$anneedeb,$anneefin,$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$idst,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
		//$result = getReferences($infoArray,$resArray,$sortArray,"COMM",$collCode_s,$specificRequestCode,$countries);
		$infoArray = $result[0];
		$sortArray = $result[1];
		$rtfArray = $result[2];
		$bibArray = $result[3];
		$resArray = $result[4];
		//COMM COM
		$specificRequestCode = '%20AND%20proceedings_s:0';
		$result = getReferences($infoArray,$resArray,$sortArray,"COMM",$collCode_s,"%20AND%20proceedings_s:0".$specificRequestCode,$countries,$anneedeb,$anneefin,$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$idst,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
		//$result = getReferences($infoArray,$resArray,$sortArray,"COMM",$collCode_s,$specificRequestCode,$countries);
		$infoArray = $result[0];
		$sortArray = $result[1];
		$rtfArray = $result[2];
		$bibArray = $result[3];
		$resArray = $result[4];
		//COMM POSTER
		$result = getReferences($infoArray,$resArray,$sortArray,"POSTER",$collCode_s,$specificRequestCode,$countries,$anneedeb,$anneefin,$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$idst,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
		$infoArray = $result[0];
		$sortArray = $result[1];
		$rtfArray = $result[2];
		$bibArray = $result[3];
		$resArray = $result[4];
	} else {
		if ($docType_s=="VULG"){
		//Request on a union of HAL types
			 $result = getReferences($infoArray,$resArray,$sortArray,"COUV",$collCode_s,$specificRequestCode,$countries,$anneedeb,$anneefin,$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$idst,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
			 $infoArray = $result[0];
			 $sortArray = $result[1];
			 $rtfArray = $result[2];
			 $bibArray = $result[3];
			 $resArray = $result[4];
			 $result = getReferences($infoArray,$resArray,$sortArray,"OUV",$collCode_s,$specificRequestCode,$countries,$anneedeb,$anneefin,$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$idst,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
			 $infoArray = $result[0];
			 $sortArray = $result[1];
			 $rtfArray = $result[2];
			 $bibArray = $result[3];
			 $resArray = $result[4];
		} else {
			 if ($docType_s=="OTHER"){
			 //Request on a union of HAL types
					$result = getReferences($infoArray,$resArray,$sortArray,"OTHER",$collCode_s,$specificRequestCode,$countries,$anneedeb,$anneefin,$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$idst,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
					$infoArray = $result[0];
					$sortArray = $result[1];
					$rtfArray = $result[2];
					$bibArray = $result[3];
					$resArray = $result[4];
					$result = getReferences($infoArray,$resArray,$sortArray,"OTHERREPORT",$collCode_s,$specificRequestCode,$countries,$anneedeb,$anneefin,$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$idst,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
					$infoArray = $result[0];
					$sortArray = $result[1];
					$rtfArray = $result[2];
					$bibArray = $result[3];
					$resArray = $result[4];
			 } else {
					//Request on a simple HAL type
					$result = getReferences($infoArray,$resArray,$sortArray,$docType_s,$collCode_s,$specificRequestCode,$countries,$anneedeb,$anneefin,$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$idst,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
					$infoArray = $result[0];
					$sortArray = $result[1];
					$rtfArray = $result[2];
					$bibArray = $result[3];
					$resArray = $result[4];
					//var_dump($result[1]);
			 }
		}
	}

	//var_dump($sortArray);
	//var_dump($infoArray);
	//var_dump($rtfArray);
	//var_dump($resArray);
	array_multisort($sortArray, $infoArray, $rtfArray, $bibArray, $resArray);

	$currentYear="99999";
	$i = 0;
	$ind = 0;
	static $indgr = array();
	static $crogr = array();
	static $drefl = array();
	/*A quoi servait le test initial ci-dessous qui est faussé (cf. http://localhost:9000/coding_rules?open=php%3AS3923&rule_key=php%3AS3923) ???
	for ($j = 1; $j <= $nbeqp; $j++) {
	 if (isset($drefl[0]) && $drefl[0] == "") {
		 $indgr[$j] = 1;
		 $crogr[$j] = 0;
	 }else{
		 $indgr[$j] = 1;
		 $crogr[$j] = 0;
	 }
	}
	*/
	$bilEqp = array();
	$croEqp = array();
	for ($j = 1; $j <= $nbeqp; $j++) {
	 $indgr[$j] = 1;
	 $crogr[$j] = 0;
	 //Pour le bilan quantitatif par équipes et collection si numérotation/codification demandée
	 $bilEqp[$j] = array();
	 //Tableau quantitatif indiquant le total des publications communes entre chaque équipe si numérotation/codification demandée
	 for ($k = 1; $k <= $nbeqp; $k++) {
		 $croEqp[$j][$k] = 0;
	 }
	}
	//var_dump($indgr);
	//var_dump($crogr);
	//var_dump($drefl);

	//Pour compter les notices où un auteur de la collection est en 1ère position ou en position finale
	$yearNumbersTG = array();
	for($iAnn = substr($anneedeb, 6, 4); $iAnn <= substr($anneefin, 6, 4); $iAnn++) {
		$yearNumbersTG[$iAnn] = 0;
	}
	
	$yearNumbers = array();
	$ngis = "oui";
	$signTxt = "&#8594;&nbsp;";

	foreach($infoArray as $entryInfo){
	 //Affichage de la référence s'il n'a pas été demandé de limiter aux références dont le premier ou le dernier auteur dépend de la collection
	 $lignAff = "non";
	 if ($limgra == "oui") {
		if (substr($entryInfo, 0, 8) == "<strong>") {
			$lignAff = "oui";
		}
	 }else{
		 $lignAff = "oui";
	 }
	 
	 //Affichage de la référence si une restriction de l'affichage à certains auteurs a été demandée et si l'un des auteurs est justement présent dans la liste
	 if (isset($rstaff) && $rstaff != "") {
		 $lignAff = "non";
		 //$restrict = "Mikhail Menshikov~Andrew Wade~Vladimir Belitsky";
		 //$restrict = "Menshikov M.~Wade A.~Belitsky V.";
		 switch ($typnom) {
			 case "nominit":
				$restrict = str_replace('..', '.', substr($listenominit, 1, (strlen($listenominit) - 2)));
				break;
			case "nomcomp1":
				$restrict = str_replace('..', '.', substr($listenomcomp1, 1, (strlen($listenomcomp1) - 2)));
				break;
			case "nomcomp2":
				$restrict = str_replace('..', '.', substr($listenomcomp2, 1, (strlen($listenomcomp2) - 2)));
				break;
			case "nomcomp3":
				$restrict = str_replace('..', '.', substr($listenomcomp3, 1, (strlen($listenomcomp3) - 2)));
				break;
		 }
		 $tabRestrict = explode("~", $restrict);
		 foreach($tabRestrict as $tabR) {
			 if (strpos($entryInfo, $tabR) !== false) {$lignAff = "oui"; break;}
		 }
	 }
	 
	 //Affichage de la référence s'il n'a pas été demandé de limiter aux références Top 1% ou Top 10%
	 if ($typinc == "vis1" && strpos($entryInfo, "JCR Top 1 %") === false) {$lignAff = "non";}
	 if ($typinc == "vis10" && strpos($entryInfo, "JCR Top 10 %") === false) {$lignAff = "non";}
					
	 if ($lignAff == "oui") {
		 if ($typsign == "ts2080") {$tst = (strpos($entryInfo, $signTxt) === false); $entryInfo = str_replace($signTxt, "", $entryInfo); $rtfArray[$i] = str_replace($signTxt, "", $rtfArray[$i]);}
		 if ($typsign == "ts20") {$tst = (strpos($entryInfo, $signTxt) !== false); $entryInfo = str_replace($signTxt, "", $entryInfo); $rtfArray[$i] = str_replace($signTxt, "", $rtfArray[$i]);}
		 if ($typsign == "ts100" || $typsign == "ts0") {$tst = 1;}

		 if ($tst == 1) {
			if ($typcro == "oui") {//afficher seulement les publications croisées
				$aff = "non";//critère d'affichage (ou non) des résultats
			}else{
				$aff = "oui";
			}
			
			//Pour compter les notices où un auteur de la collection est en 1ère position ou en position finale
			if (substr($entryInfo, 0, 8) == "<strong>" && $lignAff == "oui" && $aff == "oui") {$yearNumbersTG[substr($sortArray[$i],-4)] += 1;}
			
			if (strcmp($currentYear,substr($sortArray[$i],-4))==0){ // Même année
				 $sign = (strpos($entryInfo, $signTxt) !== false) ? "oui" : "ras";
				 $rtf = explode("^|^", $rtfArray[$i]);
				 if (substr($sortArray[$i],-4) == "0000") {//Notice à paraître)
					 $entryInfo = str_replace("(0000).", "(A paraître).", $entryInfo);
					 $rtf[0] = str_replace("(0000).", "(A paraître).", $rtf[0]);
					 $rtf[11] = str_replace("(0000).", "(A paraître).", $rtf[11]);
				 }
				 if (isset($collCode_s) && $collCode_s != "" && isset($gr) && (strpos($gr, $collCode_s) !== false)) {//GR
					 $rtfval = $rtf[0];
					 $rtfcha = $rtf[11];
					 $cptCro = "non";//Compteur de publications croisées

					 for ($j = 1; $j <= $nbeqp; $j++) {
						 if (!isset($bilEqp[$j][$currentYear])) {$bilEqp[$j][$currentYear] = 0;}
						 if (strpos($entryInfo,"GR".$j." - ¤ -") !== false) {
							 //echo $entryInfo.'<br>';
							 
							 if ($cptCro == "non") {
								 $croCpt = "";
								 for ($k = 1; $k <= $nbeqp; $k++) {
									 if (strpos($entryInfo,"GR".$k." - ¤ -") !== false) {
										 $croCpt .= $k."troli";
									 }
								 }
								 $croCpt = substr($croCpt, 0, -5);
								 $tabCro = explode("troli", $croCpt);
								 
								 if (count($tabCro > 1)) {
									 foreach($tabCro as $cro1) {
										 foreach($tabCro as $cro2) {
											 if ($cro1 != $cro2) {
												 $croEqp[intval($cro1)][intval($cro2)] += 1;
											 }
										 }
									 }
								 }
								 $cptCro = "oui";
							 }
							 
							 $entryInfo = str_replace("GR".$j." - ¤ -", "GR".$j." - ".$indgr[$j]." -", $entryInfo);
							 $rtfval = str_replace("GR".$j." - ¤ -", "GR".$j." - ".$indgr[$j]." -", $rtfval);
							 $rtfcha = str_replace("GR".$j." - ¤ -", "GR".$j." - ".$indgr[$j], $rtfcha);
							 if (strpos($entryInfo, " - GR") !== false) {//publication croisée
								 $crogr[$j] += 1;
								 $aff = "oui";
								 
								 /*
								 for ($k = 1; $k <= $nbeqp; $k++) {
									 if (strpos($entryInfo," - GR".$k." - ¤ -") !== false) {
										 for ($l = 1; $l <= $nbeqp; $l++) {
											 if ($l != $k && strpos($entryInfo,"GR".$l) !== false && strpos($entryInfo, " - ¤ - ") !== false) {
												$croEqp[$l][$k] += 1;
												//var_dump($croEqp);
												//$entryInfo = str_replace("GR".$l, $nomeqp[$l], $entryInfo);
												//$rtfval = str_replace("GR".$l, $nomeqp[$l], $rtfval);
												//$rtfcha = str_replace("GR".$l, $nomeqp[$l], $rtfcha);
											 }
										 }
									 }
								 }
								 */
							 }
							
							 if ($typexc == "oui") {$aff = "non";}//Publication d'une équipe à ne pas afficher
							 if ($aff == "oui") {
								 $indgr[$j] += 1;
								 $bilEqp[$j][$currentYear] += 1;
							 }
						 }
					 }
				 }
				 for ($j = 1; $j <= $nbeqp; $j++) {
					 $entryInfo = str_replace("GR".$j, $nomeqp[$j], $entryInfo);
					 $rtfval = str_replace("GR".$j, $nomeqp[$j], $rtfval);
					 $rtfcha = str_replace("GR".$j, $nomeqp[$j], $rtfcha);
				 }
				 if ($aff == "oui") {
					 if ($ngis != $sign){
							echo "<br><br>";
							$sect->writeText("<br><br>", $font);
							$ngis = "ras";
					 }
					 $notsign = "non";
					 //Est-ce une notice significative ?
					 if (strpos($entryInfo, $signTxt) !== false) {
						 $entryInfo = str_replace($signTxt, "", $entryInfo);
						 if (isset($rtfval)) {
							 $rtfval = str_replace($signTxt, "", $rtfval);
						 }else{
							 $rtf[0] = str_replace($signTxt, "", $rtf[0]);
						 }
						 $notsign = "oui";
						 echo "<p>".$signTxt;
						 $sect->writeText($signTxt, $font);
					 }
					 if ($typnum == "viscon" || $typnum == "visdis") {
						 $ind += 1;
						 if ($notsign == "non") {echo "<p>";}
						 echo $ind.". ";
						 if ($prefeq == "oui") {echo $rtf[13]." - ";}//Affichage préfixe AERES
						 echo $entryInfo."</p>";
						 if (isset($collCode_s) && $collCode_s != "" && isset($gr) && (strpos($gr, $collCode_s) !== false)){//GR
							 if ($prefeq == "oui") {//Ecriture préfixe AERES
								 $sect->writeText($ind.". ".$rtf[13]." - ", $font);
								 if (strpos($rtfval, "~|~") !== false) {//Ordre à respecter
									 mpcg($sect, $rtfval, $choix_cg1, $choix_cg2, $choix_cg3, $choix_cg4, $choix_cg5, $choix_cg6, $choix_cg7, $sign);
								 }else{
									 $sect->writeText($rtfval, $font);
								 }
							 }else{
								 $sect->writeText($ind.". ", $font);
								 if (strpos($rtfval, "~|~") !== false) {//Ordre à respecter
									 mpcg($sect, $rtfval, $choix_cg1, $choix_cg2, $choix_cg3, $choix_cg4, $choix_cg5, $choix_cg6, $choix_cg7, $sign);
								 }else{
									 $sect->writeText($rtfval, $font);
								 }
							 }
						 }else{
							 $sect->writeText($ind.". ", $font);
							 if (strpos($rtf[0], "~|~") !== false) {//Ordre à respecter
								 mpcg($sect, $rtf[0], $choix_cg1, $choix_cg2, $choix_cg3, $choix_cg4, $choix_cg5, $choix_cg6, $choix_cg7, $sign);
							 }else{
								 $sect->writeText($rtf[0], $font);
							 }
						 }
					 }else{
						 if ($notsign == "non") {echo "<p>";}
						 if (isset($nmo) && $nmo == "sim") {$ind += 1; echo $ind.". "; $sect->writeText($ind.". ", $font);}
						 if (isset($nmo) && $nmo == "par") {$ind += 1; echo "(".$ind.") "; $sect->writeText("(".$ind.") ", $font);}
						 if (isset($nmo) && $nmo == "cro") {$ind += 1; echo "[".$ind."] "; $sect->writeText("[".$ind."] ", $font);}
						 if ($prefeq == "oui") {echo $rtf[13]." - ";}
						 echo $entryInfo."</p>";
						 if (isset($collCode_s) && $collCode_s != "" && isset($gr) && (strpos($gr, $collCode_s) !== false)){//GR
							 if ($prefeq == "oui") {//Ecriture préfixe AERES
								 $sect->writeText($rtf[13]." - ", $font);
								 if (strpos($rtfval, "~|~") !== false) {//Ordre à respecter
									 mpcg($sect, $rtfval, $choix_cg1, $choix_cg2, $choix_cg3, $choix_cg4, $choix_cg5, $choix_cg6, $choix_cg7, $sign);
								 }else{
									 $sect->writeText($rtfval, $font);
								 }
							 }else{
								 if (strpos($rtfval, "~|~") !== false) {//Ordre à respecter
									 mpcg($sect, $rtfval, $choix_cg1, $choix_cg2, $choix_cg3, $choix_cg4, $choix_cg5, $choix_cg6, $choix_cg7, $sign);
								 }else{
									 $sect->writeText($rtfval, $font);
								 }
							 }
						 }else{
							 if (strpos($rtf[0], "~|~") !== false) {//Ordre à respecter
								 mpcg($sect, $rtf[0], $choix_cg1, $choix_cg2, $choix_cg3, $choix_cg4, $choix_cg5, $choix_cg6, $choix_cg7, $sign);
							 }else{
								 $sect->writeText($rtf[0], $font);
							 }
						 }
					 }
					 if ($rtf[17] != "") {
						 if ($docType_s == "BLO") {
							 $sect->writeText(", [En ligne] URL: ", $font);
						 }else{
							 $sect->writeText(". URL: ", $font);
						 }
							$sect->writeHyperLink($rtf[17], "<u>".$rtf[17]."</u>", $fontlien);
					 }
					 if ($rtf[1] != "") {
							$sect->writeText(". DOI: ", $font);
							$sect->writeHyperLink("https://doi.org/".$rtf[1], "<u>https://doi.org/".$rtf[1]."</u>", $fontlien);
					 }
					 if ($rtf[12] != "") {
							$sect->writeText(". NNT: ", $font);
							$sect->writeHyperLink("http://www.theses.fr/".$rtf[12], "<u>".$rtf[12]."</u>", $fontlien);
					 }
					 if ($rtf[2] != "") {
							$sect->writeText(". Pubmed: ", $font);
							$sect->writeHyperLink("http://www.ncbi.nlm.nih.gov/pubmed/".$rtf[2], "<u>".$rtf[2]."</u>", $fontlien);
					 }
					 if ($rtf[3] != "") {
							$sect->writeText(". Référence: ".$rtf[3], $font);
					 }
					 if ($rtf[4] != "") {
							$sect->writeText(". ArXiv: ", $font);
							$sect->writeHyperLink("http://arxiv.org/abs/".$rtf[4], "<u>".$rtf[4]."</u>", $fontlien);
					 }
					 if ($rtf[5] != "") {
							$sect->writeText(". ".ucfirst($rtf[5]), $font);
					 }
					 if ($rtf[6] != "") {
							$sect->writeText(". URL: ", $font);
							$sect->writeHyperLink($rtf[5], "<u>".$rtf[6]."</u>", $fontlien);
					 }
					 if ($rtf[22] != "") {
							$sect->writeText(" ", $font);
							$sect->writeHyperLink("https://archive.softwareheritage.org/browse/".$rtf[22], "<u>".$rtf[22]."</u>", $fontlien);
					 }
					 if ($rtf[23] != "") {
							$sect->writeText(". Fait référence à: ", $font);
							$sect->writeHyperLink($rtf[23], "<u>".str_replace("https://hal.archives-ouvertes.fr/", "", $rtf[23])."</u>", $fontlien);
					 }
					 if ($rtf[7] != "") {
							$sect->writeText(". Réf. HAL: ", $font);
							$sect->writeHyperLink($rtf[14].$rtf[7], "<u>".$rtf[7]."</u>", $fontlien);
					 }
					 if ($rtf[20] != "") {
							$sect->writeText(". ANR: ".ucfirst($rtf[20]), $font);
					 }
					 if ($rtf[21] != "") {
							$sect->writeText(". EU: ".ucfirst($rtf[21]), $font);
					 }
					 if ($rtf[8] != "") {
							$sect->writeText(". Rang HCERES: ".$rtf[8], $font);
					 }
					 if ($rtf[15] != "") {
							$sect->writeText($rtf[15], $font);
					 }
					 if ($rtf[9] != "") {
							$sect->writeText(". Rang CNRS: ".$rtf[9], $font);
					 }
					 if (isset($typif)) {
						 if ($rtf[16] != "") {
								$sect->writeText(". IF=".$rtf[16], $font);
						 }
					 }
					 if (isset($typinc)) {
						 if ($rtf[24] != "") {
								$sect->writeText(". JCR Top ".$rtf[24], $font);
						 }
					 }
					 if (isset($typcomm)) {
						 if ($rtf[18] != "") {
								$sect->writeText(" - ".$rtf[18], $font);
						 }
					 }
					 if (isset($typrefi)) {
						 if ($rtf[19] != "") {
								$sect->writeText(" - ".$rtf[19], $font);
						 }
					 }
					 $sect->writeText("<br><br>", $font);
					 $yearNumbers[substr($sortArray[$i],-4)]+=1;
					 //export CSV
					 if ($i == 0) {
						 if (isset($collCode_s) && $collCode_s != "" && isset($gr) && (strpos($gr, $collCode_s) !== false)) {//GR
							 $chaine = $rtf[10].chr(13).chr(10).$rtfcha.chr(13).chr(10);
						 }else{
							 $chaine = $rtf[10].chr(13).chr(10).$rtf[10].chr(13).chr(10);
						 }
					 }else{
						 if (isset($collCode_s) && $collCode_s != "" && isset($gr) && (strpos($gr, $collCode_s) !== false)) {//GR
							 $chaine = $rtfcha.chr(13).chr(10);
						 }else{
							 $chaine = $rtf[11].chr(13).chr(10);
						 }
					 }
					 if (isset($idhal) && $idhal != "") {$team = $idhal;}
					 //$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
					 $inF1 = fopen($Fnm1,"a+");
					 //fseek($inF1, 0);
					 fwrite($inF1,$chaine);
					 
					 //export bibtex
					 $bib = explode("¤", $bibArray[$i]);
					 $tex0 = $bib[0];
					 //$tex = substr($bib[0], 0, (strlen($bib[0])-2));
					 $tex1 = "";
					 if (isset($bib[1])) {$tex1 .= "PEER_REVIEWING = {".$bib[1]."},\r\n";}
					 if (isset($bib[2])) {$tex1 .= "  AUDIENCE = {".$bib[2]."},\r\n";}
					 if (isset($bib[3])) {$tex1 .= "  PROCEEDINGS = {".$bib[3]."},\r\n";}
					 if (isset($bib[4])) {$tex1 .= "  INVITED_COMMUNICATION = {".$bib[4]."},\r\n";}
					 //$tex .= "}\r\n";
					 $tex = str_replace("HAL_VERSION", $tex1."  HAL_VERSION", $tex0);
					 //$Fnm2 = "./HAL/extractionHAL_".$team.".bib";
					 $inF2 = fopen($Fnm2,"a+");
					 fseek($inF2, 0);
					 fwrite($inF2,$tex."\r\n");
					 fclose($inF2);
				 }
			 }else{ //Année différente
				 $sign = (strpos($entryInfo, $signTxt) !== false) ? "oui" : "ras";
				 $ngis = $sign;
				 $rtf = explode("^|^", $rtfArray[$i]);
				 if (substr($sortArray[$i],-4) == "0000") {//Notice à paraître)
					 echo "<h3>A paraître</h3>";
					 $entryInfo = str_replace("(0000).", "(A paraître).", $entryInfo);
					 $rtf[0] = str_replace("(0000).", "(A paraître).", $rtf[0]);
					 $rtf[11] = str_replace("(0000).", "(A paraître).", $rtf[11]);
				 }else{
					echo "<h3>".substr($sortArray[$i],-4)."</h3>";
				 }
				 $currentYear=substr($sortArray[$i],-4);
				 $yearNumbers[$currentYear] = 0;
				 if (substr($sortArray[$i],-4) == "0000") {//Notice à paraître)
					 $sect->writeText("<br><strong>A paraître</strong><br><br>", $fonth3);
				 }else{
					 $sect->writeText("<br><strong>".substr($sortArray[$i],-4)."</strong><br><br>", $fonth3);
				 }
				 if (isset($collCode_s) && $collCode_s != "" && isset($gr) && (strpos($gr, $collCode_s) !== false)) {//GR
					 $rtfval = $rtf[0];
					 $rtfcha = $rtf[11];
					 $cptCro = "non";//Compteur de publications croisées
					 
					 for ($j = 1; $j <= $nbeqp; $j++) {
						 if (!isset($bilEqp[$j][$currentYear])) {$bilEqp[$j][$currentYear] = 0;}
						 if (strpos($entryInfo,"GR".$j." - ¤ -") !== false) {
							 //echo $entryInfo.'<br>';
							 
							 if ($cptCro == "non") {
								 $croCpt = "";
								 for ($k = 1; $k <= $nbeqp; $k++) {
									 if (strpos($entryInfo,"GR".$k." - ¤ -") !== false) {
										 $croCpt .= $k."troli";
									 }
								 }
								 $croCpt = substr($croCpt, 0, -5);
								 $tabCro = explode("troli", $croCpt);
								 
								 if (count($tabCro > 1)) {
									 foreach($tabCro as $cro1) {
										 foreach($tabCro as $cro2) {
											 if ($cro1 != $cro2) {
												 $croEqp[intval($cro1)][intval($cro2)] += 1;
											 }
										 }
									 }
								 }
								 $cptCro = "oui";
							 }
							 
							 $entryInfo = str_replace("GR".$j." - ¤ -", "GR".$j." - ".$indgr[$j]." -", $entryInfo);
							 $rtfval = str_replace("GR".$j." - ¤ -", "GR".$j." - ".$indgr[$j]." -", $rtfval);
							 $rtfcha = str_replace("GR".$j." - ¤ -", "GR".$j." - ".$indgr[$j], $rtfcha);
							 if (strpos($entryInfo, " - GR") !== false) {//publication croisée
								 $crogr[$j] += 1;
								 $aff = "oui";
								 
								 /*
								 for ($k = 1; $k <= $nbeqp; $k++) {
									 if (strpos($entryInfo," - GR".$k) !== false) {
										 for ($l = 1; $l <= $nbeqp; $l++) {
											 if ($l != $k && strpos($entryInfo,"GR".$l) !== false && strpos($entryInfo, " - ¤ - ") !== false) {
												$croEqp[$l][$k] += 1;
											 }
										 }
									 }
								 }
								 */
							 }
							 
							 if ($typexc == "oui") {$aff = "non";}//Publication d'une équipe à ne pas afficher
							 if ($aff == "oui") {
								 $indgr[$j] += 1;
								 $bilEqp[$j][$currentYear] += 1;
							 }
						 }
					 }
				 }
				 for ($j = 1; $j <= $nbeqp; $j++) {
					 $entryInfo = str_replace("GR".$j, $nomeqp[$j], $entryInfo);
					 $rtfval = str_replace("GR".$j, $nomeqp[$j], $rtfval);
					 $rtfcha = str_replace("GR".$j, $nomeqp[$j], $rtfcha);
				 }
				 if ($aff == "oui") {
					 $yearNumbers[substr($sortArray[$i],-4)]=1;
					 $notsign = "non";
					 //Est-ce une notice significative ?
					 if (strpos($entryInfo, $signTxt) !== false) {
						 $entryInfo = str_replace($signTxt, "", $entryInfo);
						 if (isset($rtfval)) {
							 $rtfval = str_replace($signTxt, "", $rtfval);
						 }else{
							 $rtf[0] = str_replace($signTxt, "", $rtf[0]);
						 }
						 $notsign = "oui";
						 echo "<p>".$signTxt;
						 $sect->writeText($signTxt, $font);
					 }
					 if ($typnum == "viscon" || $typnum == "visdis") {
						 $typnum == "visdis" ? $ind = 1 : $ind += 1;
						 if ($notsign == "non") {echo "<p>";}
						 echo $ind.". ";
						 if ($prefeq == "oui") {echo $rtf[13]." - ";}//Affichage préfixe AERES
						 echo $entryInfo."</p>";
						 if (isset($collCode_s) && $collCode_s != "" && isset($gr) && (strpos($gr, $collCode_s) !== false)){//GR
							 if ($prefeq == "oui") {//Ecriture préfixe AERES
								 $sect->writeText($ind.". ".$rtf[13]." - ", $font);
								 if (strpos($rtfval, "~|~") !== false) {//Ordre à respecter
									 mpcg($sect, cccc, $choix_cg1, $choix_cg2, $choix_cg3, $choix_cg4, $choix_cg5, $choix_cg6, $choix_cg7, $sign);
								 }else{
									 $sect->writeText($rtfval, $font);
								 }
							 }else{
								 $sect->writeText($ind.". ", $font);
								 if (strpos($rtfval, "~|~") !== false) {//Ordre à respecter
									 mpcg($sect, $rtfval, $choix_cg1, $choix_cg2, $choix_cg3, $choix_cg4, $choix_cg5, $choix_cg6, $choix_cg7, $sign);
								 }else{
									 $sect->writeText($rtfval, $font);
								 }
							 }
						 }else{
							 $sect->writeText($ind.". ", $font);
							 if (strpos($rtf[0], "~|~") !== false) {//Ordre à respecter
								 mpcg($sect, $rtf[0], $choix_cg1, $choix_cg2, $choix_cg3, $choix_cg4, $choix_cg5, $choix_cg6, $choix_cg7, $sign);
							 }else{
								 $sect->writeText($rtf[0], $font);
							 }
						 }
					 }else{
						 if ($notsign == "non") {echo "<p>";}
						 if (isset($nmo) && $nmo == "sim") {$ind += 1; echo $ind.". "; $sect->writeText($ind.". ", $font);}
						 if (isset($nmo) && $nmo == "par") {$ind += 1; echo "(".$ind.") "; $sect->writeText("(".$ind.") ", $font);}
						 if (isset($nmo) && $nmo == "cro") {$ind += 1; echo "[".$ind."] "; $sect->writeText("[".$ind."] ", $font);}
						 if ($prefeq == "oui") {echo $rtf[13]." - ";}
						 echo $entryInfo."</p>";
						 if (isset($collCode_s) && $collCode_s != "" && isset($gr) && (strpos($gr, $collCode_s) !== false)){//GR
							 if ($prefeq == "oui") {//Ecriture préfixe AERES
								 $sect->writeText($rtf[13]." - ", $font);
								 if (strpos($rtfval, "~|~") !== false) {//Ordre à respecter
									 mpcg($sect, $rtfval, $choix_cg1, $choix_cg2, $choix_cg3, $choix_cg4, $choix_cg5, $choix_cg6, $choix_cg7, $sign);
								 }else{
									 $sect->writeText($rtfval, $font);
								 }
							 }else{
								 if (strpos($rtfval, "~|~") !== false) {//Ordre à respecter
									 mpcg($sect, $rtfval, $choix_cg1, $choix_cg2, $choix_cg3, $choix_cg4, $choix_cg5, $choix_cg6, $choix_cg7, $sign);
								 }else{
									 $sect->writeText($rtfval, $font);
								 }
							 }
						 }else{
							 if (strpos($rtf[0], "~|~") !== false) {//Ordre à respecter
								 mpcg($sect, $rtf[0], $choix_cg1, $choix_cg2, $choix_cg3, $choix_cg4, $choix_cg5, $choix_cg6, $choix_cg7, $sign);
							 }else{
								 $sect->writeText($rtf[0], $font);
							 }
						 }
					 }
					 if ($rtf[17] != "") {
						 if ($docType_s == "BLO") {
							 $sect->writeText(", [En ligne] URL: ", $font);
						 }else{
							 $sect->writeText(". url: ", $font);
						 }
							$sect->writeHyperLink($rtf[17], "<u>".$rtf[17]."</u>", $fontlien);
					 }
					 if ($rtf[1] != "") {
							$sect->writeText(". DOI: ", $font);
							$sect->writeHyperLink("https://doi.org/".$rtf[1], "<u>https://doi.org/".$rtf[1]."</u>", $fontlien);
					 }
					 if ($rtf[12] != "") {
							$sect->writeText(". NNT: ", $font);
							$sect->writeHyperLink("http://www.theses.fr/".$rtf[12], "<u>".$rtf[12]."</u>", $fontlien);
					 }
					 if ($rtf[2] != "") {
							$sect->writeText(". Pubmed: ", $font);
							$sect->writeHyperLink("http://www.ncbi.nlm.nih.gov/pubmed/".$rtf[2], "<u>".$rtf[2]."</u>", $fontlien);
					 }
					 if ($rtf[3] != "") {
							$sect->writeText(". Référence: ".$rtf[3], $font);
					 }
					 if ($rtf[4] != "") {
							$sect->writeText(". ArXiv: ", $font);
							$sect->writeHyperLink("http://arxiv.org/abs/".$rtf[4], "<u>".$rtf[4]."</u>", $fontlien);
					 }
					 if ($rtf[5] != "") {
							$sect->writeText(". ".ucfirst($rtf[5]), $font);
					 }
					 if ($rtf[6] != "") {
							$sect->writeText(". URL: ", $font);
							$sect->writeHyperLink($rtf[5], "<u>".$rtf[6]."</u>", $fontlien);
					 }
					 if ($rtf[22] != "") {
							$sect->writeText(" ", $font);
							$sect->writeHyperLink("https://archive.softwareheritage.org/browse/".$rtf[22], "<u>".$rtf[22]."</u>", $fontlien);
					 }
					 if ($rtf[23] != "") {
							$sect->writeText(". Fait référence à: ", $font);
							$sect->writeHyperLink($rtf[23], "<u>".str_replace("https://hal.archives-ouvertes.fr/", "", $rtf[23])."</u>", $fontlien);
					 }
					 if ($rtf[7] != "") {
							$sect->writeText(". Réf. HAL: ", $font);
							$sect->writeHyperLink($rtf[14].$rtf[7], "<u>".$rtf[7]."</u>", $fontlien);
					 }
					 if ($rtf[20] != "") {
							$sect->writeText(". ANR: ".ucfirst($rtf[20]), $font);
					 }
					 if ($rtf[21] != "") {
							$sect->writeText(". EU: ".ucfirst($rtf[21]), $font);
					 }
					 if ($rtf[8] != "") {
							$sect->writeText(". Rang HCERES: ".$rtf[8], $font);
					 }
					 if ($rtf[15] != "") {
							$sect->writeText($rtf[15], $font);
					 }
					 if ($rtf[9] != "") {
							$sect->writeText(". Rang CNRS: ".$rtf[9], $font);
					 }
					 if (isset($typif)) {
						 if ($rtf[16] != "") {
								$sect->writeText(". IF=".$rtf[16], $font);
						 }
					 }
					 if (isset($typinc)) {
						 if ($rtf[24] != "") {
								$sect->writeText(". JCR Top ".$rtf[24], $font);
						 }
					 }
					 if (isset($typcomm)) {
						 if ($rtf[18] != "") {
								$sect->writeText(" - ".$rtf[18], $font);
						 }
					 }
					 if (isset($typrefi)) {
						 if ($rtf[19] != "") {
								$sect->writeText(" - ".$rtf[19], $font);
						 }
					 }
					 $sect->writeText("<br><br>", $font);
					 //export CSV
					 if ($i == 0) {
						 if (isset($collCode_s) && $collCode_s != "" && isset($gr) && (strpos($gr, $collCode_s) !== false)){
							 $chaine = $rtf[10].chr(13).chr(10).$rtfcha.chr(13).chr(10);
						 }else{
							 $chaine = $rtf[10].chr(13).chr(10).$rtf[11].chr(13).chr(10);
						 }
					 }else{
						 if (isset($collCode_s) && $collCode_s != "" && isset($gr) && (strpos($gr, $collCode_s) !== false)){
							 $chaine = $rtfcha.chr(13).chr(10);
						 }else{
							 $chaine = $rtf[11].chr(13).chr(10);
						 }
					 }
					 if (isset($idhal) && $idhal != "") {$team = $idhal;}
					 //$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
					 $inF1 = fopen($Fnm1,"a+");
					 //fseek($inF1, 0);
					 fwrite($inF1,$chaine);
					 
					 //export bibtex
					 $bib = explode("¤", $bibArray[$i]);
					 $tex0 = $bib[0];
					 //$tex = substr($bib[0], 0, (strlen($bib[0])-2));
					 $tex1 = "";
					 if (isset($bib[1])) {$tex1 .= "PEER_REVIEWING = {".$bib[1]."},\r\n";}
					 if (isset($bib[2])) {$tex1 .= "  AUDIENCE = {".$bib[2]."},\r\n";}
					 if (isset($bib[3])) {$tex1 .= "  PROCEEDINGS = {".$bib[3]."},\r\n";}
					 if (isset($bib[4])) {$tex1 .= "  INVITED_COMMUNICATION = {".$bib[4]."},\r\n";}
					 //$tex .= "}\r\n";
					 $tex = str_replace("HAL_VERSION", $tex1."  HAL_VERSION", $tex0);
					 //$Fnm2 = "./HAL/extractionHAL_".$team.".bib";
					 $inF2 = fopen($Fnm2,"a+");
					 fseek($inF2, 0);
					 fwrite($inF2,$tex."\r\n");
					 fclose($inF2);
				 }
			 }
		 }
	 }
	 $i++;
	}
	
	$fontfoot = new PHPRtfLite_Font(9, 'Corbel', '#000000', '#FFFFFF');
	$fontlienfoot = new PHPRtfLite_Font(9, 'Corbel', '#0000FF', '#FFFFFF');
	//$fontfoot = new PHPRtfLite_Font(9, 'Corbel', '#AFAFAF', '#FFFFFF');
	//$fontlienfoot = new PHPRtfLite_Font(9, 'Corbel', '#8989FF', '#FFFFFF');
	$footer = $sect->addFooter();
	$footer->writeText('<em>Liste générée via ExtrHAL. </em>', $fontfoot);
	$footer->writeHyperLink('https://halur1.univ-rennes1.fr/ExtrHAL.php', '<em><u>ExtrHAL</u></em>', $fontlienfoot);
	$footer->writeText('<em> (https://halur1.univ-rennes1.fr/ExtrHAL.php) est un outil conçu et développé par Olivier Troccaz et Laurent Jonchère / CNRS et Université de Rennes 1.</em>', $fontfoot);
	//$footer->writeText('<em> est un outil conçu et développé par Olivier Troccaz et Laurent Jonchère / CNRS et Université de Rennes 1.</em>', $fontfoot);
	//$sect->addFootnote('This is the endnote text');
	if (isset($idhal) && $idhal != "") {$team = $idhal;}
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF, 0);
	fwrite($inF1,chr(13).chr(10));
	$drefl[0] = $yearNumbers;//le nombre de publications
	$drefl[1] = $crogr;//le nombre de publications croisées
	$drefl[2] = $yearNumbersTG;//Le nombre de publications où un auteur de la collection est en 1ère position ou en position finale
	//return $yearNumbers;
	//var_dump($crogr);
	$drefl[3] = $bilEqp;//Bilan quantitatif par équipes et collection si numérotation/codification demandée
	$drefl[4] = $croEqp;//Tableau quantitatif indiquant le total des publications communes entre chaque équipe si numérotation/codification demandée
	return $drefl;
}
?>