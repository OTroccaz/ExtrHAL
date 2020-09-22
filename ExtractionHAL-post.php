<?php
if (isset($_POST["soumis"])) {
  $team = strtoupper(htmlspecialchars($_POST["team"]));
	$teamInit = $team;
	if ($team == "ENTREZ LE CODE DE VOTRE COLLECTION") {$team = "";}
  $idhal = htmlspecialchars($_POST["idhal"]);
	$refint = htmlspecialchars($_POST["refint"]);
  if (isset($idhal) && $idhal != "") {$team = $idhal;}
	if (isset($refint) && $refint != "" && $team == "") {$team = $refint;}
	//export VOSviewerDOI
	$Fnm3 = "./HAL/VOSviewerDOI_".str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).".txt";
	$inF3 = fopen($Fnm3,"w+");
	fseek($inF3, 0);
	$chaine3 = "\xEF\xBB\xBF";
	fwrite($inF3,$chaine3);
	fclose($inF3);
	//export Bibtex
	$Fnm2 = "./HAL/extractionHAL_".str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).".bib";
	$inF2 = fopen($Fnm2,"w+");
	fseek($inF2, 0);
	$chaine2 = "\xEF\xBB\xBF";
	fwrite($inF2,$chaine2);
	fclose($inF2);
	//export CSV
	$Fnm1 = "./HAL/extractionHAL_".str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).".csv";
	$inF = fopen($Fnm1,"w+");
	fseek($inF, 0);
	$chaine = "\xEF\xBB\xBF";
	fwrite($inF,$chaine);
	//export en RTF
	$Fnm = "./HAL/extractionHAL_".str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).".rtf";
	require_once ("./lib/phprtflite-1.2.0/lib/PHPRtfLite.php");
	PHPRtfLite::registerAutoloader();
	$rtfic = new PHPRtfLite();
	$sect = $rtfic->addSection();
	$font = new PHPRtfLite_Font(12, 'Corbel', '#000000', '#FFFFFF');
	$fontlien = new PHPRtfLite_Font(12, 'Corbel', '#0000FF', '#FFFFFF');
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
  $listaut = strtoupper(urlencode(htmlspecialchars($_POST["listaut"])));
  if ($listaut == "") {$listaut = $team;}
  $urlsauv .= "&listaut=".urlencode($listaut);
  $urlsauv .= "&idhal=".urlencode($idhal);
  $evhal = htmlspecialchars($_POST["evhal"]);
  $urlsauv .= "&evhal=".$evhal;
	$urlsauv .= "&refint=".$refint;

  if (isset($_POST['publis'])) {
    $choix_publis = "-";
    $liste_publis = "~";
    $publis_array = $_POST['publis'];
    if (!empty($publis_array)) {
      foreach($publis_array as $selectValue){
        $choix_publis .= $selectValue."-";
        $liste_publis .= $selectValue."~";
      }
    }
    $urlsauv .= "&publis=".$liste_publis;
  }

  if (isset($_POST['comm'])) {
    $choix_comm = "-";
    $liste_comm = "~";
    $comm_array = $_POST['comm'];
    if (!empty($comm_array)) {
      foreach($comm_array as $selectValue){
        $choix_comm .= $selectValue."-";
        $liste_comm .= $selectValue."~";
      }
    }
    $urlsauv .= "&comm=".$liste_comm;
  }

  if (isset($_POST['ouvr'])) {
    $choix_ouvr = "-";
    $liste_ouvr = "~";
    $ouvr_array = $_POST['ouvr'];
    if (!empty($ouvr_array)) {
      foreach($ouvr_array as $selectValue){
        $choix_ouvr .= $selectValue."-";
        $liste_ouvr .= $selectValue."~";
      }
    }
    $urlsauv .= "&ouvr=".$liste_ouvr;
  }

  if (isset($_POST['autr'])) {
    $choix_autr = "-";
    $liste_autr = "~";
    $autr_array = $_POST['autr'];
    if (!empty($autr_array)) {
      foreach($autr_array as $selectValue){
        $choix_autr .= $selectValue."-";
        $liste_autr .= $selectValue."~";
      }
    }
    $urlsauv .= "&autr=".$liste_autr;
  }

	//Création des listes des auteurs appartenant à la collection spécifiée pour la liste
  if (isset($_POST['extur1']) && $_POST['extur1'] != '') {//Liste d'auteurs extérieurs à Rennes 1
    $uniq = $_POST['extur1'];
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
  //echo $depar;
	
	//Si une restriction de l'affichage à certains auteurs a été demandée
	if (isset($_POST['rstaff']) && $_POST['rstaff'] != '') {
		//$rstaff = "Menshikov M.~Wade A.~Belitsky V.";
		//$rstaff = "Menshikov Mikhail~Wade Andrew~Belitsky Vladimir";
		$restrict = $_POST['rstaff'];
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

	if (isset($_POST['anneedeb'])) {$anneedeb = $_POST['anneedeb'];}
  if (isset($_POST['anneefin'])) {$anneefin = $_POST['anneefin'];}
  // si anneedeb et anneefin non définies, on force anneedeb au 01/01/anneeencours et anneefin au 31/12/anneeencours
  if ($anneedeb == '' && $anneefin == '') {
    //$anneeforce = "oui";
		$anneeencours = date('Y', time());
    $anneedeb = date('d/m/Y', mktime(0, 0, 0, 1, 1, $anneeencours));
    $anneefin = date('d/m/Y', mktime(0, 0, 0, 12, 31, $anneeencours));
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

  if (isset($_POST['depotdeb'])) {$depotdeb = $_POST['depotdeb'];}
  if (isset($_POST['depotfin'])) {$depotfin = $_POST['depotfin'];}
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

	$typnum = $_POST["typnum"];
	$urlsauv .= "&typnum=".$typnum;
	$typaut = $_POST["typaut"];
	$urlsauv .= "&typaut=".$typaut;
	$typnom = $_POST["typnom"];
	$urlsauv .= "&typnom=".$typnom;
	$typcol = $_POST["typcol"];
	$urlsauv .= "&typcol=".$typcol;
	$typbib = $_POST["typbib"];
	$urlsauv .= "&typbib=".$typbib;
	$typlim = $_POST["typlim"];
	$urlsauv .= "&typlim=".$typlim;
  $limaff = $_POST["limaff"];
	$urlsauv .= "&limaff=".$limaff;
	(intval($_POST["trpaff"]) != 0) ? $trpaff = intval($_POST["trpaff"]) : $trpaff = "";
	$urlsauv .= "&trpaff=".$trpaff;
	$typtit = '';
	$listit = '';
	if (!isset($_POST['typtit'])) {
		$typtit = ',';
		$listit = '~';
	}else{
		for ($i=0;$i<count($_POST['typtit']);$i++) {
			$typtit .= $_POST['typtit'][$i].',';
			$listit .= $_POST['typtit'][$i].'~';
		}
	}
  $urlsauv .= "&typtit=".$listit;
	$typrvg = $_POST["typrvg"];
	$urlsauv .= "&typrvg=".$typrvg;
	$typann = $_POST["typann"];
	$urlsauv .= "&typann=".$typann;
	$typchr = $_POST["typchr"];
	$urlsauv .= "&typchr=".$typchr;
	$typgra = $_POST["typgra"];
	$urlsauv .= "&typgra=".$typgra;
	$limgra = $_POST["limgra"];
	$urlsauv .= "&limgra=".$limgra;
	$rstaff = $_POST["rstaff"];
	$urlsauv .= "&rstaff=".$rstaff;
	$typtri = $_POST["typtri"];
	$urlsauv .= "&typtri=".$typtri;
	$typfor = $_POST["typfor"];
	$urlsauv .= "&typfor=".$typfor;
	$typdoi = $_POST["typdoi"];
	$urlsauv .= "&typdoi=".$typdoi;
	$typurl = $_POST["typurl"];
	$urlsauv .= "&typurl=".$typurl;
	$typpub = $_POST["typpub"];
	$urlsauv .= "&typpub=".$typpub;
	$surdoi = $_POST["surdoi"];
	$urlsauv .= "&surdoi=".$surdoi;
	$sursou = $_POST["sursou"];
	$urlsauv .= "&sursou=".$sursou;
	$finass = $_POST["finass"];
	$urlsauv .= "&finass=".$finass;
	$typidh = $_POST["typidh"];
	$urlsauv .= "&typidh=".$typidh;
	$racine = $_POST["racine"];
	$urlsauv .= "&racine=".$racine;
	//Suppression temporaire des Rang revues HCERES/CNRS (Economie-Gestion)
	$typreva = "";
	$typrevh = "";
	$typrevc = "";
	$dscp = "";
	/*
	$typreva = $_POST["typreva"];
	$urlsauv .= "&typreva=".$typreva;
	$typrevc = $_POST["typrevc"];
	$urlsauv .= "&typrevc=".$typrevc;
	*/
	$typrevh = $_POST["typrevh"];
	$urlsauv .= "&typrevh=".$typrevh;
  $dscp = $_POST["dscp"];
	$urlsauv .= "&dscp=".$dscp;
	$typcomm = $_POST["typcomm"];
	$urlsauv .= "&typcomm=".$typcomm;
	$typisbn = $_POST["typisbn"];
	$urlsauv .= "&typisbn=".$typisbn;
	$typrefi = $_POST["typrefi"];
	$urlsauv .= "&typrefi=".$typrefi;
	$typsign = $_POST["typsign"];
	$urlsauv .= "&typsign=".$typsign;
  $typif = $_POST["typif"];
  $urlsauv .= "&typif=".$typif;
	$typinc = $_POST["typinc"];
  $urlsauv .= "&typinc=".$typinc;
	$typavsa = $_POST["typavsa"];
	$urlsauv .= "&typavsa=".$typavsa;
	$typlng = $_POST["typlng"];
	$urlsauv .= "&typlng=".$typlng;
	$delim = $_POST["delim"];
	switch($delim) {
    case ";":
      $urlsauv .= "&delim=pvir";
      break;
    case "£":
      $urlsauv .= "&delim=poun";
      break;
    case "§":
      $urlsauv .= "&delim=para";
      break;
  }
  if (isset($_POST['typcro'])) {
    $typcro = $_POST["typcro"];
    $urlsauv .= "&typcro=".$typcro;
  }
	if (isset($_POST['UBitly'])) {
    $UBitly = $_POST["UBitly"];
    $urlsauv .= "&UBitly=".$UBitly;
  }
  if (isset($_POST['typeqp'])) {
    $typeqp = $_POST["typeqp"];
    $urlsauv .= "&typeqp=".$typeqp;
  }
  if (isset($_POST['prefeq'])) {
    $prefeq = $_POST["prefeq"];
    $urlsauv .= "&prefeq=".$prefeq;
  }
  if (isset($_POST['nbeqp'])) {
    $nbeqp = $_POST["nbeqp"];
    $urlsauv .= "&nbeqp=".$nbeqp;
  }

  $nomeqp[0] = $team;
  $typeqp = $_POST["typeqp"];
  if (isset($typeqp) && $typeqp == "oui") {//Numérotation/codification par équipe
    $nbeqp = $_POST['nbeqp'];
    $gr = "¤".$team."¤";
    for($i = 1; $i <= $nbeqp; $i++) {
      //$gr = "¤GR¤GR1¤GR2¤GR3¤GR4¤GR5¤GR6¤GR7¤GR8¤GR9¤";
      $gr .= strtoupper($_POST['eqp'.$i])."¤";
      $nomeqp[$i] = strtoupper($_POST['eqp'.$i]);
      $urlsauv .= "&eqp".$i."=".$nomeqp[$i];
    }
  }

  $stpdf = $_POST['stpdf'];
  $urlsauv .= "&stpdf=".$stpdf;

  $spa = $_POST['spa'];
  $urlsauv .= "&spa=".$spa;

  $nmo = $_POST['nmo'];
  $urlsauv .= "&nmo=".$nmo;

  $gp1 = $_POST['gp1'];
  $urlsauv .= "&gp1=".$gp1;

  $gp2 = $_POST['gp2'];
  $urlsauv .= "&gp2=".$gp2;

  $gp3 = $_POST['gp3'];
  $urlsauv .= "&gp3=".$gp3;

  $gp4 = $_POST['gp4'];
  $urlsauv .= "&gp4=".$gp4;

  $gp5 = $_POST['gp5'];
  $urlsauv .= "&gp5=".$gp5;

  $gp6 = $_POST['gp6'];
  $urlsauv .= "&gp6=".$gp6;

  $gp7 = $_POST['gp7'];
  $urlsauv .= "&gp7=".$gp7;

  $sep1 = $_POST['sep1'];
  $urlsauv .= "&sep1=".$sep1;

  $sep2 = $_POST['sep2'];
  $urlsauv .= "&sep2=".$sep2;

  $sep3 = $_POST['sep3'];
  $urlsauv .= "&sep3=".$sep3;

  $sep4 = $_POST['sep4'];
  $urlsauv .= "&sep4=".$sep4;

  $sep5 = $_POST['sep5'];
  $urlsauv .= "&sep5=".$sep5;

  $sep6 = $_POST['sep6'];
  $urlsauv .= "&sep6=".$sep6;

  $sep7 = $_POST['sep7'];
  $urlsauv .= "&sep7=".$sep7;

  $choix_mp1 = "~";
  $choix_mp2 = "~";
  $choix_mp3 = "~";
  $choix_mp4 = "~";
  $choix_mp5 = "~";
  $choix_mp6 = "~";
  $choix_mp7 = "~";
  if (isset($_POST['mp1'])) {$mp1_array = $_POST['mp1'];}
  if (!empty($mp1_array)) {
    foreach($mp1_array as $selectValue){
      $choix_mp1 .= $selectValue."~";
    }
  }
  $urlsauv .= "&mp1=".$choix_mp1;

  if (isset($_POST['mp2'])) {$mp2_array = $_POST['mp2'];}
  if (!empty($mp2_array)) {
    foreach($mp2_array as $selectValue){
      $choix_mp2 .= $selectValue."~";
    }
  }
  $urlsauv .= "&mp2=".$choix_mp2;

  if (isset($_POST['mp3'])) {$mp3_array = $_POST['mp3'];}
  if (!empty($mp3_array)) {
    foreach($mp3_array as $selectValue){
      $choix_mp3 .= $selectValue."~";
    }
  }
  $urlsauv .= "&mp3=".$choix_mp3;

  if (isset($_POST['mp4'])) {$mp4_array = $_POST['mp4'];}
  if (!empty($mp4_array)) {
    foreach($mp4_array as $selectValue){
      $choix_mp4 .= $selectValue."~";
    }
  }
  $urlsauv .= "&mp4=".$choix_mp4;

  if (isset($_POST['mp5'])) {$mp5_array = $_POST['mp5'];}
  if (!empty($mp5_array)) {
    foreach($mp5_array as $selectValue){
      $choix_mp5 .= $selectValue."~";
    }
  }
  $urlsauv .= "&mp5=".$choix_mp5;

  if (isset($_POST['mp6'])) {$mp6_array = $_POST['mp6'];}
  if (!empty($mp6_array)) {
    foreach($mp6_array as $selectValue){
      $choix_mp6 .= $selectValue."~";
    }
  }
  $urlsauv .= "&mp6=".$choix_mp6;

  if (isset($_POST['mp7'])) {$mp7_array = $_POST['mp7'];}
  if (!empty($mp7_array)) {
    foreach($mp7_array as $selectValue){
      $choix_mp7 .= $selectValue."~";
    }
  }
  $urlsauv .= "&mp7=".$choix_mp7;

  $choix_cg1 = "#".$_POST['cg1'];
  $urlsauv .= "&cg1=".$_POST['cg1'];

  $choix_cg2 = "#".$_POST['cg2'];
  $urlsauv .= "&cg2=".$_POST['cg2'];

  $choix_cg3 = "#".$_POST['cg3'];
  $urlsauv .= "&cg3=".$_POST['cg3'];

  $choix_cg4 = "#".$_POST['cg4'];
  $urlsauv .= "&cg4=".$_POST['cg4'];

  $choix_cg5 = "#".$_POST['cg5'];
  $urlsauv .= "&cg5=".$_POST['cg5'];

  $choix_cg6 = "#".$_POST['cg6'];
  $urlsauv .= "&cg6=".$_POST['cg6'];

  $choix_cg7 = "#".$_POST['cg7'];
  $urlsauv .= "&cg7=".$_POST['cg7'];
}
?>