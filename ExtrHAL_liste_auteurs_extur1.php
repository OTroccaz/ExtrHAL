    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/html4/loose.dtd">
<html lang="fr">
<head>
  <title>ExtrHAL : liste des auteurs</title>
  <meta name="Description" content="ExtrHAL : liste des auteurs">
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
<h1>Création des fichiers de liste d'auteurs extérieurs à Rennes 1</h1>
<?php

function mb_ucwords($str) {
  $str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
  return ($str);
}

if (isset($_GET["erreur"])) {
  $erreur = $_GET["erreur"];
  if ($erreur == "extfic") {echo('<script type="text/javascript">alert("Vous ne pouvez importer que des fichiers de type csv ou txt !")</script>');}
  if ($erreur == "nulfic") {echo('<script type="text/javascript">alert("Le fichier csv ou txt est vide !")</script>');}
  if ($erreur == "nulteam") {echo('<script type="text/javascript">alert("Vous devez spécifier un code collection HAL !")</script>');}
  if ($erreur == "nofic") {echo('<script type="text/javascript">alert("Vous devez renseigner un fichier !")</script>');}
}
?>
<form method="POST" accept-charset="utf-8" name="ajout" action="ExtrHAL_liste_auteurs_extur1_import.php" enctype="multipart/form-data">
Code collection HAL : <input type="text" name="team" size="40"><br>
Sélectionnez le fichier CSV à importer <em>(<a href="https://halur1.univ-rennes1.fr/modele.csv">cf. modèle</a>)</em> :
<input type="file" name="import" size="30" style="font-family: calibri, verdana, sans-serif; font-size: 10pt;"><br>
<input type="submit" value="Importer">
</form>


</body></html>
