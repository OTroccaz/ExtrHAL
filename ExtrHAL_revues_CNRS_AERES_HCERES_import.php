<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="fr">
<head>
<title>ExtrHAL : listing des revues AERES-HCERES</title>
<meta name="Description" content="ExtrHAL :  listing des revues AERES-HCERES">
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
<h1>Création des fichiers de listing des revues AERES-HCERES</h1>
<?php
$temp = "2016-revues-AERES-HCERES.csv";
$handle = fopen($temp, 'r');//Ouverture du fichier
if ($handle)  {//Si on a réussi à ouvrir le fichier
  $ligne = 1;
  $total = count(file($temp));
  //export listes php
  $Fnm = "./ExtrHAL_revues_AERES_HCERES.php";
  $inF = fopen($Fnm,"w");
  fseek($inF, 0);
  $chaine = "";
  $chaine .= '<?php'.chr(13);
  $chaine .= '$AERES_HCERES = array('.chr(13);
  fwrite($inF,$chaine);
  while($tab = fgetcsv($handle, 0, ';')) {
    if ($ligne != 1) {//On exclut la première ligne > noms des colonnes
      $i = $ligne - 1;
      $chaine = $i.' => array("titre"=>"'.str_replace('"', '\"', $tab[0]).'", ';
      $chaine .= '"issn"=>"'.$tab[1].'", ';
      //Géographie, Aménagement, Urbanisme (2013) > GAU
      if ($tab[3] != "") {$chaine .= '"gau"=>"1", ';}else{$chaine .= '"gau"=>"0", ';}
      //Science Politique (2011) > SP
      if ($tab[4] != "") {$chaine .= '"sp"=>"1", ';}else{$chaine .= '"sp"=>"0", ';}
      //Théologie et Sciences religieuses (2012) > TSR
      if ($tab[5] != "") {$chaine .= '"tsr"=>"1", ';}else{$chaine .= '"tsr"=>"0", ';}
      //Histoire et Philosophie des Sciences (2012) > HPS
      if ($tab[6] != "") {$chaine .= '"hps"=>"1", ';}else{$chaine .= '"hps"=>"0", ';}
      //Droit (2010) > D
      if ($tab[7] != "") {$chaine .= '"d"=>"1", ';}else{$chaine .= '"d"=>"0", ';}
      //Anthropologie, Ethnologie (2012) > AE
      if ($tab[8] != "") {$chaine .= '"ae"=>"1", ';}else{$chaine .= '"ae"=>"0", ';}
      //Sociologie, Démographie (2013) > SD
      if ($tab[9] != "") {$chaine .= '"sd"=>"1", ';}else{$chaine .= '"sd"=>"0", ';}
      //Arts (2014) > A
      if ($tab[10] != "") {$chaine .= '"a"=>"1", ';}else{$chaine .= '"a"=>"0", ';}
      //Philosophie (2013) > P
      if ($tab[11] != "") {$chaine .= '"p"=>"1", ';}else{$chaine .= '"p"=>"0", ';}
      //Sciences de l'Education (2014) > SE
      if ($tab[12] != "") {$chaine .= '"se"=>"1", ';}else{$chaine .= '"se"=>"0", ';}
      //SIC (2013)
      if ($tab[13] != "") {$chaine .= '"sic"=>"1", ';}else{$chaine .= '"sic"=>"0", ';}
      //STAPS (2012)
      if ($tab[14] != "") {$chaine .= '"staps"=>"1", ';}else{$chaine .= '"staps"=>"0", ';}
      //Gestion (2016) > G
      if ($tab[15] != "") {$chaine .= '"g"=>"1", ';}else{$chaine .= '"g"=>"0", ';}
      //Economie (2015) > E
      if ($tab[16] != "") {$chaine .= '"e"=>"1", ';}else{$chaine .= '"e"=>"0", ';}
      //Histoire, Histoire de l'Art, Archéologie (2009) > ARC
      if ($tab[17] != "") {$chaine .= '"arc"=>"1", ';}else{$chaine .= '"arc"=>"0", ';}
      //Histoire (2012) > H
      if ($tab[18] != "") {$chaine .= '"h"=>"1", ';}else{$chaine .= '"h"=>"0", ';}
      //Psychologie – Ethologie – Ergonomie (2011) > PEE
      if ($tab[19] != "") {$chaine .= '"pee"=>"1")';}else{$chaine .= '"pee"=>"0")';}
      if ($i != $total-1) {$chaine .= ',';}
      $chaine .= chr(13);
      fwrite($inF,$chaine);
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
fclose($handle);//fermeture du fichier

//tableau résultat
include $Fnm;
echo('<table width="100%">');
echo('<tr><td colspan="14" align="center">');
$total = count($AERES_HCERES);
$iaut = 0;
$text = '';
echo ('<b>Total de '.$total.' revues renseignées</b>');
$text .= '</td></tr>';
$text .= '<tr><td colspan="14">&nbsp;</td></tr>';
$text .= '<tr><td>&nbsp;</td>';
$text .= '<td valign=top><b>Titre</b></td>';
$text .= '<td valign=top><b>ISSN</b></td>';
$text .= '<td valign=top><b>GAU</b></td>';
$text .= '<td valign=top><b>SP</b></td>';
$text .= '<td valign=top><b>TSR</b></td>';
$text .= '<td valign=top><b>HPS</b></td>';
$text .= '<td valign=top><b>D</b></td>';
$text .= '<td valign=top><b>AE</b></td>';
$text .= '<td valign=top><b>SD</b></td>';
$text .= '<td valign=top><b>A</b></td>';
$text .= '<td valign=top><b>P</b></td>';
$text .= '<td valign=top><b>SE</b></td>';
$text .= '<td valign=top><b>SIC</b></td>';
$text .= '<td valign=top><b>STAPS</b></td>';
$text .= '<td valign=top><b>G</b></td>';
$text .= '<td valign=top><b>E</b></td>';
$text .= '<td valign=top><b>ARC</b></td>';
$text .= '<td valign=top><b>H</b></td>';
$text .= '<td valign=top><b>PEE</b></td>';
$text .= '</tr>';

foreach($AERES_HCERES AS $i => $valeur) {
  $iaut += 1;
  $text .= '<tr><td valign=top>'.$iaut.'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['titre'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['issn'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['gau'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['sp'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['tsr'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['hps'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['d'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['ae'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['sd'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['a'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['p'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['se'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['sic'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['staps'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['g'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['e'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['arc'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['h'].'</td>';
  $text .= '<td valign=top>'.$AERES_HCERES[$i]['pee'].'</td>';
  $text .= '</tr>';
}
$text .= '</table>';
echo $text;
?>
