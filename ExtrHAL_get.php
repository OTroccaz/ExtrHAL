<?php
if (isset($_GET["team"])) {
  $team = strtoupper(htmlspecialchars($_GET["team"]));
	$teamInit = $team;
	if ($team == "ENTREZ LE CODE DE VOTRE COLLECTION") {$team = "";}
	$idst = $_GET["idst"];
  $idhal = $_GET["idhal"];
	if (isset($_GET["refint"])) {$refint = $_GET["refint"];}
  $quand0 = time();
	$quand = substr($quand0, 0, 9);
  if (isset($idhal) && $idhal != "") {$team = str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $idhal);}
	if (isset($refint) && $refint != "" && $team == "") {$team = $refint;}
	//export VOSviewerDOI
	$Fnm3 = "./HAL/VOSviewerDOI_".str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).".txt";
	$inF3 = fopen($Fnm3,"w+");
	fseek($inF3, 0);
	$chaine3 = "\xEF\xBB\xBF";
	fwrite($inF3,$chaine3);
	fclose($inF3);
	//export Bibtex
	$Fnm2 = "./HAL/extractionHAL_".str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team)."_".$quand.".bib";
	//$Fnm2 = "./HAL/extractionHAL_".$team.".bib";
	$inF2 = fopen($Fnm2,"w+");
	fseek($inF2, 0);
	$chaine2 = "\xEF\xBB\xBF";
	fwrite($inF2,$chaine2);
	fclose($inF2);
	//export CSV
	$Fnm1 = "./HAL/extractionHAL_".str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team)."_".$quand.".csv";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"w");
	fseek($inF1, 0);
	$chaine1 = "\xEF\xBB\xBF";
	fwrite($inF1,$chaine1);
	//export HCERES
	$FnmH = "./HAL/HCERES_".str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).".csv";
	//$FnmH = "./HAL/HCERES_".$team.".csv";
	$inFH = fopen($FnmH,"w");
	fseek($inFH, 0);
	$chaineH = "\xEF\xBB\xBF";
	fwrite($inFH,$chaineH);
	//export en RTF
	$Fnm = "./HAL/extractionHAL_".str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team)."_".$quand.".rtf";
	require_once ("./lib/phprtflite-1.2.0/lib/PHPRtfLite.php");
	PHPRtfLite::registerAutoloader();
	$rtfic = new PHPRtfLite();
	$sect = $rtfic->addSection();
	$font = new PHPRtfLite_Font(12, 'Corbel', '#000000', '#FFFFFF');
	$fontlien = new PHPRtfLite_Font(12, 'Corbel', '#0000FF', '#FFFFFF');
	$fontsign = new PHPRtfLite_Font(12, 'Corbel', '#CC0000', '#FFFFFF');
	$fonth3 = new PHPRtfLite_Font(14, 'Corbel', '#000000', '#FFFFFF');
	$fonth2 = new PHPRtfLite_Font(16, 'Corbel', '#000000', '#FFFFFF');
	$parFormat = new PHPRtfLite_ParFormat(PHPRtfLite_ParFormat::TEXT_ALIGN_JUSTIFY);

	//sauvegarde URL
	$root = 'http';
	if ( isset ($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on")	{
		$root.= "s";
	}
	$urlsauv = $root."://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	$urlsauv .= "?team=".urlencode($teamInit);
  $listaut = strtoupper(urlencode($_GET["listaut"]));
  if ($listaut == "") {$listaut = $team;}
  $urlsauv .= "&listaut=".urlencode($listaut);
	$urlsauv .= "&idst=".urlencode($idst);
  $urlsauv .= "&idhal=".urlencode($idhal);
	$urlsauv = str_replace("%257E", "~", $urlsauv);
  $evhal = $_GET["evhal"];
  $urlsauv .= "&evhal=".$evhal;
	$urlsauv .= "&refint=".$refint;
  if (isset($_GET['publis'])) {//Articles de revue
    $publis = $_GET["publis"];
    $urlsauv .= "&publis=".$publis;
    $tabpublis = explode("~", $publis);
    $i = 0;
    $choix_publis = "-";
    while (isset($tabpublis[$i])) {
      $choix_publis .= $tabpublis[$i]."-";
      $i++;
    }
  }
  if (isset($_GET['comm'])) {//Communications / conférences
    $comm = $_GET["comm"];
    $urlsauv .= "&comm=".$comm;
    $tabcomm = explode("~", $comm);
    $i = 0;
    $choix_comm = "-";
    while (isset($tabcomm[$i])) {
      $choix_comm .= $tabcomm[$i]."-";
      $i++;
    }
  }
  if (isset($_GET['ouvr'])) {//Ouvrages
    $ouvr = $_GET["ouvr"];
    $urlsauv .= "&ouvr=".$ouvr;
    $tabouvr = explode("~", $ouvr);
    $i = 0;
    $choix_ouvr = "-";
    while (isset($tabouvr[$i])) {
      $choix_ouvr .= $tabouvr[$i]."-";
      $i++;
    }
  }
	if (isset($_GET['rapp'])) {//rapports
    $rapp = $_GET["rapp"];
    $urlsauv .= "&rapp=".$rapp;
    $tabrapp = explode("~", $rapp);
    $i = 0;
    $choix_rapp = "-";
    while (isset($tabrapp[$i])) {
      $choix_rapp .= $tabrapp[$i]."-";
      $i++;
    }
  }
	if (isset($_GET['imag'])) {//images
    $imag = $_GET["imag"];
    $urlsauv .= "&imag=".$imag;
    $tabimag = explode("~", $imag);
    $i = 0;
    $choix_imag = "-";
    while (isset($tabimag[$i])) {
      $choix_imag .= $tabimag[$i]."-";
      $i++;
    }
  }
  if (isset($_GET['autr'])) {//Autres
    $autr = $_GET["autr"];
    $urlsauv .= "&autr=".$autr;
    $tabautr = explode("~", $autr);
    $i = 0;
    $choix_autr = "-";
    while (isset($tabautr[$i])) {
      $choix_autr .= $tabautr[$i]."-";
      $i++;
    }
  }

	//Création des listes des auteurs appartenant à la collection spécifiée pour la liste
  if (isset($_GET['extur1']) && $_GET['extur1'] != '') {//Liste d'auteurs extérieurs à Rennes 1
    $uniq = $_GET['extur1'];
    include "./pvt/ExtractionHAL-auteurs-extur1-".$uniq.".php";
    $urlsauv .= "&extur1=".$uniq;
  }else{
    include "./pvt/ExtractionHAL-auteurs.php";
  }
  $listenominit = "~";
  $listenomcomp1 = "~";
  $listenomcomp2 = "~";
	$listenomcomp3 = "~";
	$arriv = "~";
	$depar = "~";
	$tabLA = explode("%7E", $listaut);//%7E <=> ~
	foreach($tabLA as $la) {
		foreach($AUTEURS_LISTE AS $i => $valeur) {
			$lat = 0;
			$chalTab = explode(",", $AUTEURS_LISTE[$i]['collhal']);
			$ehalTab = explode(",", $AUTEURS_LISTE[$i]['colleqhal']);
			while (isset($chalTab[$lat]) || isset($ehalTab[$lat])) {
				if ((isset($chalTab[$lat]) && trim($chalTab[$lat]) == $listaut) || (isset($ehalTab[$lat]) && trim($ehalTab[$lat]) == $listaut)) {
					$listenomcomp1 .= nomCompEntier($AUTEURS_LISTE[$i]['nom'])." ".prenomCompEntier($AUTEURS_LISTE[$i]['prenom'])."~";
					$listenomcomp2 .= prenomCompEntier($AUTEURS_LISTE[$i]['prenom'])." ".nomCompEntier($AUTEURS_LISTE[$i]['nom'])."~";
					$listenomcomp3 .= mb_strtoupper(nomCompEntier($AUTEURS_LISTE[$i]['nom']), 'UTF-8')." (".prenomCompEntier($AUTEURS_LISTE[$i]['prenom']).")~";
					//si prénom composé et juste les ititiales
					$prenom = prenomCompInit($AUTEURS_LISTE[$i]['prenom']);
					$listenominit .= nomCompEntier($AUTEURS_LISTE[$i]['nom'])." ".$prenom.".~";
					if (isset($AUTEURS_LISTE[$i]['arriv']) && $AUTEURS_LISTE[$i]['arriv'] != "" && $AUTEURS_LISTE[$i]['arriv'] != "x") {
						$arriv .= $AUTEURS_LISTE[$i]['arriv']."~";
					}else{
						$arriv .= "1900~";
					}
					if (isset($AUTEURS_LISTE[$i]['depar']) && $AUTEURS_LISTE[$i]['depar'] != "" && $AUTEURS_LISTE[$i]['depar'] != "x") {
						$depar .= $AUTEURS_LISTE[$i]['depar']."~";
					}else{
						$moisactuel = date('n', time());
						if ($moisactuel >= 10) {$idepar = date('Y', time())+1;}else{$idepar = date('Y', time());}
						$depar .= $idepar."~";
					}
				}
				$lat++;
			}
		}
	}
	
	//Si une restriction de l'affichage à certains auteurs a été demandée
	if (isset($_GET['rstaff']) && $_GET['rstaff'] != '') {
		//$restrict = "Menshikov M.~Wade A.~Belitsky V.";
		//$restrict = "Menshikov Mikhail~Wade Andrew~Belitsky Vladimir";
		$restrict = $_GET['rstaff'];
		$listenomcomp1 = "~".$restrict."~";
		$listenomcomp2 = "~";
		$listenomcomp3 = "~";
		$listenominit = "~";
		$arriv = "~";
		$depar = "~";
		$tabRestrict = explode("~", $restrict);
		foreach($tabRestrict as $tabR) {
      $listenominit .= nomCompEntier(strstr($tabR, ' ', true))." ".prenomCompInit(trim(strstr($tabR, ' '))).".~";
			$listenomcomp2 .= prenomCompEntier(trim(strstr($tabR, ' ')))." ".nomCompEntier(strstr($tabR, ' ', true))."~";
			$listenomcomp3 .= mb_strtoupper(nomCompEntier(strstr($tabR, ' ', true), 'UTF-8'))." (".prenomCompEntier(trim(strstr($tabR, ' '))).")~";
			$arriv .= "1900~";
			$moisactuel = date('n', time());
			if ($moisactuel >= 10) {$idepar = date('Y', time())+1;}else{$idepar = date('Y', time());}
			$depar .= $idepar."~";
		}
		$listenominit = str_replace('_', ' ', $listenominit);
		$listenomcomp1 = str_replace('_', ' ', $listenomcomp1);
		$listenomcomp2 = str_replace('_', ' ', $listenomcomp2);
		$listenomcomp3 = str_replace('_', ' ', $listenomcomp3);
	}
	
	/*
	$tabN = explode("~", $listenominit);
	$tabA = explode("~", $arriv);
	$tabD = explode("~", $depar);
	var_dump($tabN);
	var_dump($tabA);
	var_dump($tabD);
	for($t = 0; $t < count($tabA); $t++) {
		echo($tabN[$t].' > '.$tabA[$t].' - '.$tabD[$t].'<br>';
	}
	for($t = 0; $t < count($tabN); $t++) {
		echo '~'.$tabN[$t]);
	}
	*/
	
  //Extraction sur un IdHAL > auteur à mettre en évidence
  if (isset($evhal) && $evhal != "") {
		$listenominit = "~";
		$listenomcomp1 = "~";
		$listenomcomp2 = "~";
		$listenomcomp3 = "~";
		$arriv = "~";
		$depar = "~";
		$listTab = explode("~", $evhal);
		$listI = 0;
		while (isset($listTab[$listI])) {
			$list = explode(" ", $listTab[$listI]);
			$listenomcomp1 .= str_replace("_", " ", nomCompEntier($list[1]))." ".str_replace("_", " ", prenomCompEntier($list[0]))."~";
			$listenomcomp2 .= str_replace("_", " ", prenomCompEntier($list[0]))." ".str_replace("_", " ", nomCompEntier($list[1]))."~";
			$listenomcomp3 .= mb_strtoupper(nomCompEntier($list[1]), 'UTF-8')." (".prenomCompEntier($list[0]).")~";
			//si prénom composé et juste les ititiales
			$prenom = prenomCompInit($list[0]);
			$listenominit .= str_replace("_", " ", nomCompEntier($list[1]))." ".$prenom.".~";
			$arriv .= "1900~";
			$moisactuel = date('n', time());
			if ($moisactuel >= 10) {$idepar = date('Y', time())+1;}else{$idepar = date('Y', time());}
			$depar .= $idepar."~";
			$listI++;
		}
  }
  
  //remplacement des espaces insécables
  $listenomcomp1 = str_replace(array("\xC2\xA0"." ", "\xC2\xA0"), " ", $listenomcomp1);
  $listenomcomp2 = str_replace(array("\xC2\xA0"." ", "\xC2\xA0"), " ", $listenomcomp2);
	$listenomcomp3 = str_replace(array("\xC2\xA0"." ", "\xC2\xA0"), " ", $listenomcomp3);
  $listenominit = str_replace(array("\xC2\xA0"." ", "\xC2\xA0"), " ", $listenominit);
	
	$anneedeb = '';
	$anneefin = '';
	if (isset($_GET['periode'])) {
		$periode = $_GET['periode'];
		$tabPer = explode(" - ", $periode);
		$anneedeb = $tabPer[0];
		$anneefin = $tabPer[1];
	}
  // si anneedeb et anneefin non définies, on force anneedeb au 01/01/anneeencours et anneefin au 31/12/anneeencours
  if ($anneedeb == '' && $anneefin == '') {
    //$anneeforce = "oui";
    $anneeencours = date('Y', time());
    $anneedeb = date('d/m/Y', mktime(0, 0, 0, 1, 1, $anneeencours));
    $anneefin = date('d/m/Y', mktime(0, 0, 0, 12, 31, $anneeencours));
		$periode = $anneedeb.' - '.$anneefin;
  }
  // si anneedeb défini mais pas anneefin, on force anneefin à aujourd'hui
  if ($anneedeb != '' && $anneefin == '') {$anneefin = date('d/m/Y', time());}
  // si anneefin défini mais pas anneedeb, on force anneedeb au 1er janvier de l'année de anneefin
  if ($anneedeb == '' && $anneefin != '') {
    $tabanneefin = explode('/', $anneefin);
    $anneedeb = date('d/m/Y', mktime(0, 0, 0, 1, 1, $tabanneefin[2]));
  }
  // si anneedeb est postérieur à anneefin, on inverse les deux
  if ($anneedeb != '' && $anneefin != '') {
    $tabanneedeb = explode('/', $anneedeb);
    $tabanneefin = explode('/', $anneefin);
    $timedeb = mktime(0, 0, 0, $tabanneedeb[1], $tabanneedeb[0], $tabanneedeb[2]);
    $timefin = mktime(0, 0, 0, $tabanneefin[1], $tabanneefin[0], $tabanneefin[2]);
    if ($timefin < $timedeb) {$anneetemp = $anneedeb; $anneedeb = $anneefin; $anneefin = $anneetemp;}
  }
  $urlsauv .= "&anneedeb=".$anneedeb;
  $urlsauv .= "&anneefin=".$anneefin;

	$depotdeb = '';
	$depotfin = '';
  if (isset($_GET['depot'])) {
		$depot = $_GET['depot'];
		$tabDep = explode(" - ", $depot);
		$depotdeb = $tabDep[0];
		$depotfin = $tabDep[1];
	}
	// si depotdeb et depotfin non définis, on force depotdeb au 01/01/anneedeb et depotfin au 31/12/anneefin
  if ($depotdeb == '' && $depotfin == '') {
    $depotforce = "oui";
    //$depotdeb = date('d/m/Y', mktime(0, 0, 0, 1, 1, $anneedeb));
    //$depotfin = date('d/m/Y', mktime(0, 0, 0, 12, 31, $anneefin));
  }
  // si depotdeb défini mais pas depotfin, on force depotfin à aujourd'hui
  if ($depotdeb != '' && $depotfin == '') {$depotfin = date('d/m/Y', time());}
  // si depotfin défini mais pas depotdeb, on force depotdeb au 1er janvier de l'année de depotfin
  if ($depotdeb == '' && $depotfin != '') {
    $tabdepotfin = explode('/', $depotfin);
    $depotdeb = date('d/m/Y', mktime(0, 0, 0, 1, 1, $tabdepotfin[2]));
  }
  // si depotdeb est postérieur à depotfin, on inverse les deux
  if ($depotdeb != '' && $depotfin != '') {
    $tabdepotdeb = explode('/', $depotdeb);
    $tabdepotfin = explode('/', $depotfin);
    $timedeb = mktime(0, 0, 0, $tabdepotdeb[1], $tabdepotdeb[0], $tabdepotdeb[2]);
    $timefin = mktime(0, 0, 0, $tabdepotfin[1], $tabdepotfin[0], $tabdepotfin[2]);
    if ($timefin < $timedeb) {$depottemp = $depotdeb; $depotdeb = $depotfin; $depotfin = $depottemp;}
  }
  $urlsauv .= "&depotdeb=".$depotdeb;
  $urlsauv .= "&depotfin=".$depotfin;

  $typnum = $_GET["typnum"];
	$urlsauv .= "&typnum=".$typnum;
  $typaut = $_GET["typaut"];
	$urlsauv .= "&typaut=".$typaut;
  $typnom = $_GET["typnom"];
	$urlsauv .= "&typnom=".$typnom;
  $typcol = $_GET["typcol"];
	$urlsauv .= "&typcol=".$typcol;
	$typbib = $_GET["typbib"];
	$urlsauv .= "&typbib=".$typbib;
  $typlim = $_GET["typlim"];
	$urlsauv .= "&typlim=".$typlim;
  $limaff = $_GET["limaff"];
	$urlsauv .= "&limaff=".$limaff;
	$trpaff = $_GET["trpaff"];
	$urlsauv .= "&trpaff=".$trpaff;
  $typtit = $_GET["typtit"];
	$urlsauv .= "&typtit=".$typtit;
	$typrvg = $_GET["typrvg"];
	$urlsauv .= "&typrvg=".$typrvg;
  $typann = $_GET["typann"];
	$urlsauv .= "&typann=".$typann;
  $typchr = $_GET["typchr"];
	$urlsauv .= "&typchr=".$typchr;
	$typgra = $_GET["typgra"];
	$urlsauv .= "&typgra=".$typgra;
	$limgra = $_GET["limgra"];
	$urlsauv .= "&limgra=".$limgra;
	$typcrp = $_GET["typcrp"];
	$urlsauv .= "&typcrp=".$typcrp;
	$rstaff = $_GET["rstaff"];
	$urlsauv .= "&rstaff=".$rstaff;
	$typtri = $_GET["typtri"];
	$urlsauv .= "&typtri=".$typtri;
  $typfor = $_GET["typfor"];
	$urlsauv .= "&typfor=".$typfor;
  $typdoi = $_GET["typdoi"];
	$urlsauv .= "&typdoi=".$typdoi;
	$typurl = $_GET["typurl"];
	$urlsauv .= "&typurl=".$typurl;
	$typpub = $_GET["typpub"];
	$urlsauv .= "&typpub=".$typpub;
	$surdoi = $_GET["surdoi"];
	$urlsauv .= "&surdoi=".$surdoi;
	$sursou = $_GET["sursou"];
	$urlsauv .= "&sursou=".$sursou;
	$finass = $_GET["finass"];
	$urlsauv .= "&finass=".$finass;
  $typidh = $_GET["typidh"];
	$urlsauv .= "&typidh=".$typidh;
	$racine = $_GET["racine"];
	$urlsauv .= "&racine=".$racine;
	//Suppression temporaire des Rang revues HCERES/CNRS (Economie-Gestion)
	$typreva = "";
	$typrevh = "";
	$typrevc = "";
	$dscp = "";
  /*
	$typreva = $_GET["typreva"];
	$urlsauv .= "&typreva=".$typreva;
  $typrevc = $_GET["typrevc"];
	$urlsauv .= "&typrevc=".$typrevc;
	*/
	/*
	$typrevh = $_GET["typrevh"];
	$urlsauv .= "&typrevh=".$typrevh;
  $dscp = $_GET["dscp"];
	$urlsauv .= "&dscp=".$dscp;
	*/
	$typcomm = $_GET["typcomm"];
	$urlsauv .= "&typcomm=".$typcomm;
	$typisbn = $_GET["typisbn"];
	$urlsauv .= "&typisbn=".$typisbn;
	$typrefi = $_GET["typrefi"];
	$urlsauv .= "&typrefi=".$typrefi;
	$typsign = $_GET["typsign"];
	$urlsauv .= "&typsign=".$typsign;
  $typif = $_GET["typif"];
  $urlsauv .= "&typif=".$typif;
	$typinc = $_GET["typinc"];
  $urlsauv .= "&typinc=".$typinc;
  $typavsa = $_GET["typavsa"];
	$urlsauv .= "&typavsa=".$typavsa;
	$typlng = $_GET["typlng"];
	$urlsauv .= "&typlng=".$typlng;
  $delim = $_GET["delim"];
  switch($delim) {
    case "pvir":
      $delim = ";";
			$urlsauv .= "&delim=pvir";
      break;
    case "poun":
      $delim = "£";
			$urlsauv .= "&delim=poun";
      break;
    case "para":
      $delim = "§";
			$urlsauv .= "&delim=para";
      break;
  }
  $nomeqp[0] = $team;
  if (isset($_GET['typcro'])) {
    $typcro = $_GET["typcro"];
    $urlsauv .= "&typcro=".$typcro;
  }
	if (isset($_GET['typexc'])) {
    $typexc = $_GET["typexc"];
    $urlsauv .= "&typexc=".$typexc;
  }
	if (isset($_GET['UBitly'])) {
    $UBitly = $_GET["UBitly"];
    $urlsauv .= "&UBitly=".$UBitly;
  }
  if (isset($_GET['typeqp'])) {
    $typeqp = $_GET["typeqp"];
    $urlsauv .= "&typeqp=".$typeqp;
  }
  if (isset($_GET['prefeq'])) {
    $prefeq = $_GET["prefeq"];
    $urlsauv .= "&prefeq=".$prefeq;
  }
  if (isset($_GET['nbeqp'])) {
    $nbeqp = $_GET["nbeqp"];
    $urlsauv .= "&nbeqp=".$nbeqp;
  }
  if (isset($typeqp) && $typeqp == "oui") {//Numérotation/codification par équipe
    $gr = "¤".$team."¤";
    for($i = 1; $i <= $nbeqp; $i++) {
      $gr .= $_GET['eqp'.$i]."¤";
      $nomeqp[$i] = $_GET['eqp'.$i];
			$urlsauv .= "&eqp".$i."=".$nomeqp[$i];
    }
  }

  $stpdf = $_GET['stpdf'];
  $urlsauv .= "&stpdf=".$stpdf;

  $spa = $_GET['spa'];
  $urlsauv .= "&spa=".$spa;

  $nmo = $_GET['nmo'];
  $urlsauv .= "&nmo=".$nmo;

  $gp1 = $_GET['gp1'];
  $urlsauv .= "&gp1=".$gp1;

  $gp2 = $_GET['gp2'];
  $urlsauv .= "&gp2=".$gp2;

  $gp3 = $_GET['gp3'];
  $urlsauv .= "&gp3=".$gp3;

  $gp4 = $_GET['gp4'];
  $urlsauv .= "&gp4=".$gp4;

  $gp5 = $_GET['gp5'];
  $urlsauv .= "&gp5=".$gp5;

  $gp6 = $_GET['gp6'];
  $urlsauv .= "&gp6=".$gp6;

  $gp7 = $_GET['gp7'];
  $urlsauv .= "&gp7=".$gp7;

  $sep1 = $_GET['sep1'];
  $urlsauv .= "&sep1=".$sep1;

  $sep2 = $_GET['sep2'];
  $urlsauv .= "&sep2=".$sep2;

  $sep3 = $_GET['sep3'];
  $urlsauv .= "&sep3=".$sep3;

  $sep4 = $_GET['sep4'];
  $urlsauv .= "&sep4=".$sep4;

  $sep5 = $_GET['sep5'];
  $urlsauv .= "&sep5=".$sep5;

  $sep6 = $_GET['sep6'];
  $urlsauv .= "&sep6=".$sep6;

  $sep7 = $_GET['sep7'];
  $urlsauv .= "&sep7=".$sep7;

  $choix_mp1 = $_GET["mp1"];//Mise en page 1
	$urlsauv .= "&mp1=".$choix_mp1;
  $tabmp1 = explode("~", $choix_mp1);
  $i = 0;
  $choix_mp1 = "~";
  while (isset($tabmp1[$i])) {
    $choix_mp1 .= $tabmp1[$i]."~";
    $i++;
  }

  $choix_mp2 = $_GET["mp2"];//Mise en page 2
	$urlsauv .= "&mp2=".$choix_mp2;
  $tabmp2 = explode("~", $choix_mp2);
  $i = 0;
  $choix_mp2 = "~";
  while (isset($tabmp2[$i])) {
    $choix_mp2 .= $tabmp2[$i]."~";
    $i++;
  }

  $choix_mp3 = $_GET["mp3"];//Mise en page 3
	$urlsauv .= "&mp3=".$choix_mp3;
  $tabmp3 = explode("~", $choix_mp3);
  $i = 0;
  $choix_mp3 = "~";
  while (isset($tabmp3[$i])) {
    $choix_mp3 .= $tabmp3[$i]."~";
    $i++;
  }

  $choix_mp4 = $_GET["mp4"];//Mise en page 4
	$urlsauv .= "&mp4=".$choix_mp4;
  $tabmp4 = explode("~", $choix_mp4);
  $i = 0;
  $choix_mp4 = "~";
  while (isset($tabmp4[$i])) {
    $choix_mp4 .= $tabmp4[$i]."~";
    $i++;
  }

  $choix_mp5 = $_GET["mp5"];//Mise en page 5
	$urlsauv .= "&mp5=".$choix_mp5;
  $tabmp5 = explode("~", $choix_mp5);
  $i = 0;
  $choix_mp5 = "~";
  while (isset($tabmp5[$i])) {
    $choix_mp5 .= $tabmp5[$i]."~";
    $i++;
  }

  $choix_mp6 = $_GET["mp6"];//Mise en page 6
	$urlsauv .= "&mp6=".$choix_mp6;
  $tabmp6 = explode("~", $choix_mp6);
  $i = 0;
  $choix_mp6 = "~";
  while (isset($tabmp6[$i])) {
    $choix_mp6 .= $tabmp6[$i]."~";
    $i++;
  }

  $choix_mp7 = $_GET["mp7"];//Mise en page 7
	$urlsauv .= "&mp7=".$choix_mp7;
  $tabmp7 = explode("~", $choix_mp7);
  $i = 0;
  $choix_mp7 = "~";
  while (isset($tabmp7[$i])) {
    $choix_mp7 .= $tabmp7[$i]."~";
    $i++;
  }

  $choix_cg1 = "#".$_GET['cg1'];
  $urlsauv .= "&cg1=".$_GET['cg1'];

  $choix_cg2 = "#".$_GET['cg2'];
  $urlsauv .= "&cg2=".$_GET['cg2'];

  $choix_cg3 = "#".$_GET['cg3'];
  $urlsauv .= "&cg3=".$_GET['cg3'];

  $choix_cg4 = "#".$_GET['cg4'];
  $urlsauv .= "&cg4=".$_GET['cg4'];

  $choix_cg5 = "#".$_GET['cg5'];
  $urlsauv .= "&cg5=".$_GET['cg5'];

  $choix_cg6 = "#".$_GET['cg6'];
  $urlsauv .= "&cg6=".$_GET['cg6'];

  $choix_cg7 = "#".$_GET['cg7'];
  $urlsauv .= "&cg7=".$_GET['cg7'];
}
?>