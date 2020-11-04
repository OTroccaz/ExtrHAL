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

$chaine = ');'.chr(13);
$chaine .= '?>';
fwrite($inF,$chaine);
fclose($inF);
fclose($inF1);

?>
