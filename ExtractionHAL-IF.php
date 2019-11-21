    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>ExtrHAL : outil d’extraction des publications HAL d’une unité, d'une équipe de recherche ou d'un auteur</title>
  <meta name="Description" content="ExtrHAL : outil d’extraction des publications HAL d’une unité, d'une équipe de recherche ou d'un auteur">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="icon" type="type/ico" href="HAL_favicon.ico">
  <link rel="stylesheet" href="./ExtractionHAL.css">
</head>
<?php
if (isset($_GET["erreur"])) {
  $erreur = $_GET["erreur"];
  if ($erreur == "extfic") {echo('<script type="text/javascript">alert("Vous ne pouvez importer que des fichiers de type csv ou txt !")</script>');}
  if ($erreur == "nulfic") {echo('<script type="text/javascript">alert("Le fichier csv ou txt est vide !")</script>');}
}
?>
<body style="font-family:calibri,verdana">
<br><b>Procédure d'extraction des IF :</b><br><br>

<form method="POST" accept-charset="utf-8" name="ajout" action="ExtractionHAL-IF-import.php" enctype="multipart/form-data">
Sélectionnez le fichier à importer :
<input type="file" name="import" size="30" style="font-family: Corbel; font-size: 10pt;"><br>
<br>
<input type="submit" value="Importer">
</form>
</body>
</html>