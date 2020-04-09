<?php
ini_set('auto_detect_line_endings',TRUE);
function mb_ucwords($str) {
  $str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
  return ($str);
}
//code collection
if (isset($_POST["team"])) {$uniq = htmlspecialchars($_POST["team"]);}
if (!isset($uniq) || $uniq == "") {header("location:"."ExtractionHAL-liste-auteurs-extur1.php?erreur=nulteam"); exit;}
//fichier CSV ou txt
if ($_FILES['import']['name'] != "") {
  $ext = strtolower(strrchr($_FILES['import']['name'], '.'));
  if ($ext != ".csv" && $ext != ".txt"){
    header("location:"."ExtractionHAL-liste-auteurs-extur1.php?erreur=extfic"); exit;
  }else{
    if ($_FILES['import']['size'] == "0") {
      header("location:"."ExtractionHAL-liste-auteurs-extur1.php?erreur=nulfic"); exit;
    }else{
      $temp = $_FILES['import']['tmp_name'];
    }
  }
}else{
  header("location:"."ExtractionHAL-liste-auteurs-extur1.php?erreur=nofic"); exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>ExtrHAL : liste des auteurs</title>
<meta name="Description" content="ExtrHAL : liste des auteurs">
<meta name="robots" content="noindex">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="icon" type="type/ico" href="HAL_favicon.ico" />
</head>
<body style="font-family:corbel;font-size:12px;">
<table width="100%">
<tr>
<td style="text-align: left;"><img alt="ExtrHAL" title="ExtrHAL" width="250px" src="./img/logo_Extrhal.png"></td>
<td style="text-align: right;"><img alt="Université de Rennes 1" title="Université de Rennes 1" width="150px" src="./img/logo_UR1_gris_petit.jpg"></td>
</tr>
</table>
<hr style="color: #467666;">
<h1>Création des fichiers de liste d'auteurs extérieurs à Rennes 1</h1>
<?php
$handle = fopen($temp, 'r');//Ouverture du fichier
if ($handle)  {//Si on a réussi à ouvrir le fichier
  $ligne = 1;
  $total = count(file($temp));
  //export liste php et CSV
  $Fnm = "./pvt/ExtractionHAL-auteurs-extur1-".$uniq.".php";
  $Fnm1 = "./pvt/ExtractionHAL-auteurs-extur1-".$uniq.".csv";
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
      $i = $ligne - 1;
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
      $chaine1 .= chr(13);
      fwrite($inF,$chaine);
      fwrite($inF1,$chaine1);
    }
  $ligne ++;
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

$fichier_auteurs = './pvt/ExtractionHAL-auteurs-extur1-'.$uniq.'.php';

include $fichier_auteurs;
array_multisort($AUTEURS_LISTE);

//tableau résultat
echo('<table width="100%">');
echo('<tr><td colspan="14" align="center">');
$total = count($AUTEURS_LISTE);
$iaut = 0;
$text = '';
echo ('<b>Total de '.$total.' auteurs renseignés</b>');
$text .= '</td></tr>';
$text .= '<tr><td colspan="14">&nbsp;</td></tr>';
$text .= '<tr><td>&nbsp;</td>';
$text .= '<td valign=top><b>Nom</b></td>';
$text .= '<td valign=top><b>Prénom</b></td>';
$text .= '<td valign=top><b>Secteur</b></td>';
$text .= '<td valign=top><b>Titre</b></td>';
$text .= '<td valign=top><b>Unité</b></td>';
$text .= '<td valign=top><b>UMR</b></td>';
$text .= '<td valign=top><b>Grade</b></td>';
$text .= '<td valign=top><b>Numeq</b></td>';
$text .= '<td valign=top><b>Eqrec</b></td>';
$text .= '<td valign=top><b>Collection HAL</b></td>';
$text .= '<td valign=top><b>Collection équipe HAL</b></td>';
$text .= '<td valign=top><b>Arrivée</b></td>';
$text .= '<td valign=top><b>Départ</b></td>';
$text .= '<td valign=top>&nbsp;</td>';
$text .= '<td valign=top>&nbsp;</td>';
$text .= '</tr>';

foreach($AUTEURS_LISTE AS $i => $valeur) {
  $iaut += 1;
  $text .= '<tr><td valign=top>'.$iaut.'</td>';
  $text .= '<td valign=top>'.mb_ucwords($AUTEURS_LISTE[$i]['nom']).'</td>';
  $text .= '<td valign=top>'.mb_ucwords($AUTEURS_LISTE[$i]['prenom']).'</td>';
  $text .= '<td valign=top>'.$AUTEURS_LISTE[$i]['secteur'].'</td>';
  $text .= '<td valign=top>'.$AUTEURS_LISTE[$i]['titre'].'</td>';
  $text .= '<td valign=top>'.$AUTEURS_LISTE[$i]['unite'].'</td>';
  $text .= '<td valign=top>'.$AUTEURS_LISTE[$i]['umr'].'</td>';
  $text .= '<td valign=top>'.$AUTEURS_LISTE[$i]['grade'].'</td>';
  $text .= '<td valign=top>'.$AUTEURS_LISTE[$i]['numeq'].'</td>';
  $text .= '<td valign=top>'.$AUTEURS_LISTE[$i]['eqrec'].'</td>';
  $text .= '<td valign=top>'.$AUTEURS_LISTE[$i]['collhal'].'</td>';
  $text .= '<td valign=top>'.$AUTEURS_LISTE[$i]['colleqhal'].'</td>';
  $text .= '<td valign=top>'.$AUTEURS_LISTE[$i]['arriv'].'</td>';
  $text .= '<td valign=top>'.$AUTEURS_LISTE[$i]['depar'].'</td>';
  $text .= '</tr>';
}
$text .= '</table>';
echo $text;
?>
<br><br>
<center>
<a href="./ExtractionHAL.php?import=ok&amp;extur1=<?php echo $uniq;?>">Tout est correct : poursuivre avec ExtrHAL</a> - <a href="./ExtractionHAL-liste-auteurs-extur1.php">Il y a une/des erreur(s) : recommencer la procédure d'import</a> - <a href="./ExtractionHAL.php">Tout annuler et revenir à ExtrHAL</a>
</center>
<br><br>
