    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/html4/loose.dtd">
<html lang="fr">
<head>
  <title>ExtrHAL : outil d&apos;extraction des publications HAL d&apos;une unité, d'une équipe de recherche ou d'un auteur</title>
  <meta name="Description" content="ExtrHAL : outil d&apos;extraction des publications HAL d&apos;une unité, d'une équipe de recherche ou d'un auteur">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="icon" type="type/ico" href="HAL_favicon.ico">
  <link rel="stylesheet" href="./ExtrHAL.css">
</head>
<body style="font-family:calibri, verdana, sans-serif">
<?php
function utf8_fopen_read($fileName) {
    $fc = file_get_contents($fileName);
    $handle=fopen("php://memory", "rw");
    fwrite($handle, $fc);
    fseek($handle, 0);
    return $handle;
}

//fichier CSV ou txt
if (isset($_FILES['import']['name']) && $_FILES['import']['name'] != "") {
  $ext = strtolower(strrchr($_FILES['import']['name'], '.'));
  if ($ext != ".csv" && $ext != ".txt"){
    header("location:"."ExtrHAL_InCites.php?erreur=extfic"); exit;
  }else{
    if ($_FILES['import']['size'] == "0") {
      header("location:"."ExtrHAL_InCites.php?erreur=nulfic"); exit;
    }else{
      $temp = $_FILES['import']['tmp_name'];
    }
  }
}

$ifi = 1;
$Fnm = "./pvt/InCites".$ifi.".php";
$inF = fopen($Fnm,"w");
fseek($inF, 0);
$chaine = "";
$chaine .= '<?php'.chr(13);
$chaine .= '$InCites_LISTE['.$ifi.'] = array('.chr(13);
fwrite($inF,$chaine);
if (isset($temp)) {
	$handle = utf8_fopen_read($temp);
	if ($handle) {
		$ligne = 0;
		$total = count(file($temp));
		while($tab = fgetcsv($handle, 0, ';')) {
			if ($ligne != 0) {//Exclure les noms des colonnes
				$ind = $ligne - 1;
				$chaine = $ind.' => array("Rank"=>"'.$tab[0].'", ';
				$chaine .= '"Full Journal Title"=>"'.$tab[1].'", ';
				$chaine .= '"JCR Abbreviated Title"=>"'.$tab[2].'", ';
				$chaine .= '"ISSN"=>"'.$tab[3].'", ';
				$chaine .= '"Journal Impact Factor"=>"'.$tab[4].'", ';
				$chaine .= '"Field"=>"'.$tab[5].'", ';
				$chaine .= '"Quartile (top)"=>"'.$tab[6].'", ';
				$chaine .= '"Statusd"=>"'.$tab[7].'")';
				if ($ligne != $total-1 && $ligne != $ifi*1000) {$chaine .= ',';}
				$chaine .= chr(13);
				fwrite($inF,$chaine);
			}
			if ($ligne == 1000*$ifi) {//créer des tableaux de 1000 lignes max pour alléger le chargement ensuite
				$chaine = ');'.chr(13);
				$chaine .= '?>';
				fwrite($inF,$chaine);
				fclose($inF);
				$ifi++;
				$Fnm = "./pvt/InCites".$ifi.".php";
				$inF = fopen($Fnm,"w");
				fseek($inF, 0);
				$chaine = "";
				$chaine .= '<?php'.chr(13);
				$chaine .= '$InCites_LISTE['.$ifi.'] = array('.chr(13);
				fwrite($inF,$chaine);
			}
			$ligne++;
		}
		$chaine = ');'.chr(13);
		$chaine .= '?>';
		fwrite($inF,$chaine);
		fclose($inF);
		fclose($handle);
	}else{
		die("<font color='red'><big><big>Votre fichier source est incorrect.</big></big></font>");
	}
	echo '<br><b>Les fichiers nécessaires à l\'affichage des InCites ont été créés avec succès.<br><br>';
}else{
	die("<font color='red'><big><big>Votre fichier source est incorrect.</big></big></font>");
}

?>
</body>
</html>