<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="fr">
<head>
<title>ExtrHAL : listing des rangs des revues CNRS et AERES-SHS</title>
<meta name="Description" content="ExtrHAL : listing des rangs des revues CNRS et AERES-SHS">
<meta name="robots" content="noindex">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="icon" type="type/ico" href="HAL_favicon.ico" />
<link rel="stylesheet" href="./ExtrHAL.css">
</head>
<body style="font-family:corbel, verdana, sans-serif;font-size:12px;">
<table class="table100" aria-describedby="Entêtes">
<tr>
<th scope="col" style="text-align: left;"><img alt="ExtrHAL" title="ExtrHAL" width="250px" src="./img/logo_Extrhal.png"></th>
<th scope="col" style="text-align: right;"><img alt="Université de Rennes 1" title="Université de Rennes 1" width="150px" src="./img/logo_UR1_gris_petit.jpg"></th>
</tr>
</table>
<hr style="color: #467666;">
<h1>Création des fichiers de listing des rangs des revues CNRS</h1>
<?php
$temp = "2016-listing-revues-HCERES-CNRS-AERES-SHS.csv";
$handle = fopen($temp, 'r');//Ouverture du fichier
if ($handle)  {//Si on a réussi à ouvrir le fichier
  $ligne = 1;
  $total = count(file($temp));
  //export listes php
  $Fnm = "./ExtrHAL_rang_CNRS.php";
  $Fnm1 = "./ExtrHAL_rang_AERES_SHS.php";
  $inF = fopen($Fnm,"w");
  $inF1 = fopen($Fnm1,"w");
  fseek($inF, 0);
  fseek($inF1, 0);
  $chaine = "";
  $chaine1 = "";
  $chaine .= '<?php'.chr(13);
  $chaine1 .= '<?php'.chr(13);
  $chaine .= '$CNRS = array('.chr(13);
  $chaine1 .= '$AERES_SHS = array('.chr(13);
  fwrite($inF,$chaine);
  fwrite($inF1,$chaine1);
  while($tab = fgetcsv($handle, 0, ';')) {
    if ($ligne != 1) {//On exclut la première ligne > noms des colonnes
      $i = $ligne - 1;
      //CNRS
      $chaine = $i.' => array("titre"=>"'.str_replace('"', '\"', $tab[1]).'", ';
      $chaine .= '"rang"=>"'.$tab[2].'")';
      if ($i != $total-1) {$chaine .= ',';}
      $chaine .= chr(13);
      fwrite($inF,$chaine);
      //AERES-SHS
      $chaine1 = $i.' => array("issn"=>"'.$tab[0].'", ';
      $chaine1 .= '"titre"=>"'.str_replace('"', '\"', $tab[1]).'", ';
      $chaine1 .= '"rang"=>"'.$tab[4].'")';
      if ($i != $total-1) {$chaine1 .= ',';}
      $chaine1 .= chr(13);
      fwrite($inF1,$chaine1);
    }
  $ligne ++;
  }
}else{
  die("<font color='red'><big><big>Votre fichier source est incorrect.</big></big></font>");
}
$chaine = ');'.chr(13);
$chaine1 = ');'.chr(13);
$chaine .= '?>';
$chaine1 .= '?>';
fwrite($inF,$chaine);
fwrite($inF1,$chaine1);
fclose($inF);
fclose($inF1);
fclose($handle);//fermeture du fichier

//tableau résultat
include $Fnm;
echo('<table width="100%">');
echo('<tr><td colspan="14" align="center">');
$total = count($CNRS);
$iaut = 0;
$text = '';
echo ('<b>Total de '.$total.' revues renseignées</b>');
$text .= '</td></tr>';
$text .= '<tr><td colspan="14">&nbsp;</td></tr>';
$text .= '<tr><td>&nbsp;</td>';
$text .= '<td valign=top><b>Titre</b></td>';
$text .= '<td valign=top><b>Rang</b></td>';
$text .= '</tr>';

foreach($CNRS AS $i => $valeur) {
  $iaut += 1;
  $text .= '<tr><td valign=top>'.$iaut.'</td>';
  $text .= '<td valign=top>'.$CNRS[$i]['titre'].'</td>';
  $text .= '<td valign=top>'.$CNRS[$i]['rang'].'</td>';
  $text .= '</tr>';
}
$text .= '</table>';
echo $text;
?>
<br><br>
<h1>Création des fichiers de listing des rangs des revues AERES-SHS</h1>
<?php
//tableau résultat
include $Fnm1;
echo('<table width="100%">');
echo('<tr><td colspan="14" align="center">');
$total = count($AERES_SHS);
$iaut = 0;
$text = '';
echo ('<b>Total de '.$total.' revues renseignées</b>');
$text .= '</td></tr>';
$text .= '<tr><td colspan="14">&nbsp;</td></tr>';
$text .= '<tr><td>&nbsp;</td>';
$text .= '<td valign=top><b>ISSN</b></td>';
$text .= '<td valign=top><b>Titre</b></td>';
$text .= '<td valign=top><b>Rang</b></td>';
$text .= '</tr>';

foreach($AERES_SHS AS $i => $valeur) {
  $iaut += 1;
  $text .= '<tr><td valign=top>'.$iaut.'</td>';
  $text .= '<td valign=top>'.$AERES_SHS[$i]['issn'].'</td>';
  $text .= '<td valign=top>'.$AERES_SHS[$i]['titre'].'</td>';
  $text .= '<td valign=top>'.$AERES_SHS[$i]['rang'].'</td>';
  $text .= '</tr>';
}
$text .= '</table>';
echo $text;
?>
