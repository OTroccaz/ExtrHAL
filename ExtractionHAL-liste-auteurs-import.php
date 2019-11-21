<?php
header('Content-type: text/html; charset=UTF-8');
ini_set('auto_detect_line_endings',TRUE);
function mb_ucwords($str) {
  $str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
  return ($str);
}
function utf8_fopen_read($fileName) {
    //$fc = iconv('windows-1250', 'utf-8', file_get_contents($fileName));
    $fc = file_get_contents($fileName);
    $handle=fopen("php://memory", "rw");
    fwrite($handle, $fc);
    fseek($handle, 0);
    return $handle;
}
//fichier CSV ou txt
$complet = '';
$partiel = '';
if ($_FILES['importcomplet']['name'] != "") {
  $ext = strtolower(strrchr($_FILES['importcomplet']['name'], '.'));
  if ($ext != ".csv" && $ext != ".txt"){
    header("location:"."ExtractionHAL-liste-auteurs.php?erreur=extfic"); exit;
  }else{
    if ($_FILES['importcomplet']['size'] == "0") {
      header("location:"."ExtractionHAL-liste-auteurs.php?erreur=nulfic"); exit;
    }else{
      $temp = $_FILES['importcomplet']['tmp_name'];
      $complet = 'ok';
    }
  }
}
if ($_FILES['importpartiel']['name'] != "") {
  $ext = strtolower(strrchr($_FILES['importpartiel']['name'], '.'));
  if ($ext != ".csv" && $ext != ".txt"){
    header("location:"."ExtractionHAL-liste-auteurs.php?erreur=extfic"); exit;
  }else{
    if ($_FILES['importpartiel']['size'] == "0") {
      header("location:"."ExtractionHAL-liste-auteurs.php?erreur=nulfic"); exit;
    }else{
      $temp = $_FILES['importpartiel']['tmp_name'];
      $partiel = 'ok';
    }
  }
}
if ($complet != '') {// Import d'un fichier complet
  //$handle = fopen($temp, 'r');//Ouverture du fichier
  $handle = utf8_fopen_read($temp);
  if ($handle)  {//Si on a réussi à ouvrir le fichier
    $ligne = 1;
    $total = count(file($temp));
    //export liste php et CSV
    $Fnm = "./pvt/ExtractionHAL-auteurs.php";
    $Fnm1 = "./pvt/ExtractionHAL-auteurs.csv";
    $inF = fopen($Fnm,"w");
    $inF1 = fopen($Fnm1,"w");
    fseek($inF, 0);
    fseek($inF1, 0);
    $chaine = "";
    $chaine1 = "\xEF\xBB\xBF";
    $chaine1 .= "Nom;Prénom;Secteur;Titre;Unité;UMR;Grade;Numeq;Eqrec;Collection HAL;Collection équipe HAL;Arrivée;Départ".chr(13);
    $chaine .= '<?php'.chr(13);
    $chaine .= '$AUTEURS_LISTE = array('.chr(13);
    fwrite($inF,$chaine);
    fwrite($inF1,$chaine1);
    while($tab = fgetcsv($handle, 0, ';')) {
      if ($ligne != 1) {//On exclut la première ligne > noms des colonnes
        $i = $ligne - 2;
        $chaine = $i.' => array("nom"=>"'.mb_ucwords($tab[0]).'", ';
        $chaine .= '"prenom"=>"'.mb_ucwords($tab[1]).'", ';
        $chaine .= '"secteur"=>"'.$tab[2].'", ';
        $chaine .= '"titre"=>"'.$tab[3].'", ';
        $chaine .= '"unite"=>"'.$tab[4].'", ';
        $chaine .= '"umr"=>"'.$tab[5].'", ';
        $chaine .= '"grade"=>"'.$tab[6].'", ';
        $chaine .= '"numeq"=>"'.$tab[7].'", ';
        $chaine .= '"eqrec"=>"'.$tab[8].'", ';
        $chaine .= '"collhal"=>"'.$tab[9].'", ';
        $chaine .= '"colleqhal"=>"'.$tab[10].'", ';
        $chaine .= '"arriv"=>"'.$tab[11].'", ';
        $chaine .= '"depar"=>"'.$tab[12].'")';
        //export csv
        $chaine1 = mb_ucwords($tab[0]).';';
        $chaine1 .= mb_ucwords($tab[1]).';';
        $chaine1 .= $tab[2].';';
        $chaine1 .= $tab[3].';';
        $chaine1 .= $tab[4].';';
        $chaine1 .= $tab[5].';';
        $chaine1 .= $tab[6].';';
        $chaine1 .= $tab[7].';';
        $chaine1 .= $tab[8].';';
        $chaine1 .= $tab[9].';';
        $chaine1 .= $tab[10].';';
        $chaine1 .= $tab[11].';';
        $chaine1 .= $tab[12];
        if ($i != $total-1) {$chaine .= ',';}
        $chaine .= chr(13);
        $chaine = str_replace(array("Č","č","ď"), array("È","è","ï"), $chaine);
        $chaine1 .= chr(13);
        fwrite($inF,$chaine);
        fwrite($inF1,$chaine1);
      }
    $ligne++;
    }
  }else{
    die("<font color='red'><big><big>Votre fichier source est incorrect.</big></big></font>");
  }
  $chaine = ');'.chr(13);
  $chaine .= '?>';
  fwrite($inF,$chaine);
  fclose($inF);
  fclose($inF1);
  fclose($handle);//fermeture du fichier
}
if ($partiel != '') {//Import d'un fichier partiel
  $fichier_auteurs = './pvt/ExtractionHAL-auteurs.php';
  include $fichier_auteurs;
  //Début d'écriture du fichier avec l'existant
  //export liste php et CSV
	$Fnm = "./pvt/ExtractionHAL-auteurs.php";
	$Fnm1 = "./pvt/ExtractionHAL-auteurs.csv";
	$inF = fopen($Fnm,"w");
	$inF1 = fopen($Fnm1,"w");
	fseek($inF, 0);
	fseek($inF1, 0);
	$chaine = "";
	$chaine1 = "\xEF\xBB\xBF";
	$chaine1 .= "Nom;Prénom;Secteur;Titre;Unité;UMR;Grade;Numeq;Eqrec;Collection HAL;Collection équipe HAL;Arrivée;Départ";
	$chaine .= '<?php'.chr(13);
	$chaine .= '$AUTEURS_LISTE = array('.chr(13);
	fwrite($inF,$chaine);
	fwrite($inF1,$chaine1);
	$j = 0;
	foreach($AUTEURS_LISTE AS $i => $valeur) {
		$chaine = $j.' => array("nom"=>"'.mb_ucwords($AUTEURS_LISTE[$i]["nom"]).'", ';
		$chaine .= '"prenom"=>"'.mb_ucwords($AUTEURS_LISTE[$i]["prenom"]).'", ';
		$chaine .= '"secteur"=>"'.$AUTEURS_LISTE[$i]["secteur"].'", ';
		$chaine .= '"titre"=>"'.$AUTEURS_LISTE[$i]["titre"].'", ';
		$chaine .= '"unite"=>"'.$AUTEURS_LISTE[$i]["unite"].'", ';
		$chaine .= '"umr"=>"'.$AUTEURS_LISTE[$i]["umr"].'", ';
		$chaine .= '"grade"=>"'.$AUTEURS_LISTE[$i]["grade"].'", ';
		$chaine .= '"numeq"=>"'.$AUTEURS_LISTE[$i]["numeq"].'", ';
		$chaine .= '"eqrec"=>"'.$AUTEURS_LISTE[$i]["eqrec"].'", ';
		$chaine .= '"collhal"=>"'.$AUTEURS_LISTE[$i]["collhal"].'", ';
		$chaine .= '"colleqhal"=>"'.$AUTEURS_LISTE[$i]["colleqhal"].'", ';
		$chaine .= '"arriv"=>"'.$AUTEURS_LISTE[$i]["arriv"].'", ';
		$chaine .= '"depar"=>"'.$AUTEURS_LISTE[$i]["depar"].'")';
		//export csv
		$chaine1 = mb_ucwords($AUTEURS_LISTE[$i]["nom"]).';';
		$chaine1 .= mb_ucwords($AUTEURS_LISTE[$i]["prenom"]).';';
		$chaine1 .= $AUTEURS_LISTE[$i]["secteur"].';';
		$chaine1 .= $AUTEURS_LISTE[$i]["titre"].';';
		$chaine1 .= $AUTEURS_LISTE[$i]["unite"].';';
		$chaine1 .= $AUTEURS_LISTE[$i]["umr"].';';
		$chaine1 .= $AUTEURS_LISTE[$i]["grade"].';';
		$chaine1 .= $AUTEURS_LISTE[$i]["numeq"].';';
		$chaine1 .= $AUTEURS_LISTE[$i]["eqrec"].';';
		$chaine1 .= $AUTEURS_LISTE[$i]["collhal"].';';
		$chaine1 .= $AUTEURS_LISTE[$i]["colleqhal"].';';
		$chaine1 .= $AUTEURS_LISTE[$i]["arriv"].';';
		$chaine1 .= $AUTEURS_LISTE[$i]["depar"];
		$chaine .= ',';
		$chaine .= chr(13);
    $chaine = str_replace(array("Č","č","ď"), array("È","è","ï"), $chaine);
		$chaine1 .= chr(13);
		fwrite($inF,$chaine);
		fwrite($inF1,$chaine1);
		$j++;
	}
	$imax = count($AUTEURS_LISTE);

	//Suite d'écriture du fichier avec le complément
  //$handle = fopen($temp, 'r');//Ouverture du fichier
  $handle = utf8_fopen_read($temp);
  if ($handle)  {//Si on a réussi à ouvrir le fichier
    $ligne = 1;
    $total = count(file($temp));
    //export liste php et CSV
    while($tab = fgetcsv($handle, 0, ';')) {
      if ($ligne != 1) {//On exclut la première ligne > noms des colonnes
        $i = $imax + $ligne - 2;
        echo $i.'<br>';
        $chaine = $i.' => array("nom"=>"'.mb_ucwords($tab[0]).'", ';
        $chaine .= '"prenom"=>"'.mb_ucwords($tab[1]).'", ';
        $chaine .= '"secteur"=>"'.$tab[2].'", ';
        $chaine .= '"titre"=>"'.$tab[3].'", ';
        $chaine .= '"unite"=>"'.$tab[4].'", ';
        $chaine .= '"umr"=>"'.$tab[5].'", ';
        $chaine .= '"grade"=>"'.$tab[6].'", ';
        $chaine .= '"numeq"=>"'.$tab[7].'", ';
        $chaine .= '"eqrec"=>"'.$tab[8].'", ';
        $chaine .= '"collhal"=>"'.$tab[9].'", ';
        $chaine .= '"colleqhal"=>"'.$tab[10].'", ';
        $chaine .= '"arriv"=>"'.$tab[11].'", ';
        $chaine .= '"depar"=>"'.$tab[12].'")';
        //export csv
        $chaine1 = mb_ucwords($tab[0]).';';
        $chaine1 .= mb_ucwords($tab[1]).';';
        $chaine1 .= $tab[2].';';
        $chaine1 .= $tab[3].';';
        $chaine1 .= $tab[4].';';
        $chaine1 .= $tab[5].';';
        $chaine1 .= $tab[6].';';
        $chaine1 .= $tab[7].';';
        $chaine1 .= $tab[8].';';
        $chaine1 .= $tab[9].';';
        $chaine1 .= $tab[10].';';
        $chaine1 .= $tab[11].';';
        $chaine1 .= $tab[12];
        if ($i != $imax + $total - 1) {$chaine .= ',';}
        $chaine = str_replace(array("Č","č","ď"), array("È","è","ï"), $chaine);
        $chaine .= chr(13);
        $chaine1 .= chr(13);
        fwrite($inF,$chaine);
        fwrite($inF1,$chaine1);
      }
    $ligne++;
    }
  }
  $chaine = ');'.chr(13);
  $chaine .= '?>';
  fwrite($inF,$chaine);
  fclose($inF);
  fclose($inF1);
  fclose($handle);//fermeture du fichier
}
if (isset($_POST["cehval"]) && $_POST["cehval"] != "") {
  header("location:"."ExtractionHAL-liste-auteurs.php?cehval=".$_POST["cehval"]); exit;
}else{
  header("location:"."ExtractionHAL-liste-auteurs.php"); exit;
}
?>
