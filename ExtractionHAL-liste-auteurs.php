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
<h1>ExtrHAL : création des fichiers de liste d'auteurs à mettre en évidence</h1>
<?php
// récupération de l'adresse IP du client (on cherche d'abord à savoir s'il est derrière un proxy)
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}elseif(isset($_SERVER['HTTP_CLIENT_IP'])) {
  $ip = $_SERVER['HTTP_CLIENT_IP'];
}else {
  $ip = $_SERVER['REMOTE_ADDR'];
}

include("./IP_list.php");
if (in_array($ip, $IP_aut)) {
  //Déclaration des variables
  if (!isset($cehval)) {$cehval = "TouCol";}

  $fichier_auteurs = './pvt/ExtractionHAL-auteurs.php';

  function mb_ucwords($str) {
    $str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
    return ($str);
  }

  include $fichier_auteurs;
  array_multisort($AUTEURS_LISTE);

  if (isset($_GET["erreur"])) {
    $erreur = $_GET["erreur"];
    if ($erreur == "extfic") {echo('<script type="text/javascript">alert("Vous ne pouvez importer que des fichiers de type csv ou txt !")</script>');}
    if ($erreur == "nulfic") {echo('<script type="text/javascript">alert("Le fichier csv ou txt est vide !")</script>');}
  }


  if (isset($_POST["action"]) && $_POST["action"] == "ajout") {//Validation de l'ajout d'un auteur
    $modif = count($AUTEURS_LISTE);
    $AUTEURS_LISTE[$modif]["nom"] = str_replace('"','&#039;',$_POST["nom"]);
    $AUTEURS_LISTE[$modif]["prenom"] = str_replace('"','&#039;',$_POST["prenom"]);
    $AUTEURS_LISTE[$modif]["secteur"] = str_replace('"','&#039;',$_POST["secteur"]);
    $AUTEURS_LISTE[$modif]["titre"] = str_replace('"','&#039;',$_POST["titre"]);
    $AUTEURS_LISTE[$modif]["unite"] = str_replace('"','&#039;',$_POST["unite"]);
    $AUTEURS_LISTE[$modif]["umr"] = str_replace('"','&#039;',$_POST["umr"]);
    $AUTEURS_LISTE[$modif]["grade"] = str_replace('"','&#039;',$_POST["grade"]);
    $AUTEURS_LISTE[$modif]["numeq"] = str_replace('"','&#039;',$_POST["numeq"]);
    $AUTEURS_LISTE[$modif]["eqrec"] = str_replace('"','&#039;',$_POST["eqrec"]);
    $AUTEURS_LISTE[$modif]["collhal"] = str_replace('"','&#039;',$_POST["collhal"]);
    $AUTEURS_LISTE[$modif]["colleqhal"] = str_replace('"','&#039;',$_POST["colleqhal"]);
    $AUTEURS_LISTE[$modif]["arriv"] = str_replace('"','&#039;',$_POST["arriv"]);
    $AUTEURS_LISTE[$modif]["depar"] = str_replace('"','&#039;',$_POST["depar"]);
    $total = count($AUTEURS_LISTE);
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
    foreach($AUTEURS_LISTE AS $i => $valeur) {
      $chaine = $i.' => array("nom"=>"'.mb_ucwords($AUTEURS_LISTE[$i]["nom"]).'", ';
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
      if ($i != $total-1) {$chaine .= ',';}
      $chaine .= chr(13);
      $chaine1 .= chr(13);
      fwrite($inF,$chaine);
      fwrite($inF1,$chaine1);
    }
    $chaine = ');'.chr(13);
    $chaine .= '?>';
    fwrite($inF,$chaine);
    fclose($inF);
    fclose($inF1);
    array_multisort($AUTEURS_LISTE);
  }

  if (isset($_POST["modif"]) && $_POST["modif"] != "") {//Validation de la modification d'une entrée
    $modif = $_POST["modif"];
    if (isset($_POST["cehval"]) && $_POST["cehval"] != "TouCol") {
      $cehval = $_POST["cehval"];
      $te = "";
    }else{
      $te = "selected";
    }
    $AUTEURS_LISTE[$modif]["nom"] = str_replace('"','&#039;',$_POST["nom"]);
    $AUTEURS_LISTE[$modif]["prenom"] = str_replace('"','&#039;',$_POST["prenom"]);
    $AUTEURS_LISTE[$modif]["secteur"] = str_replace('"','&#039;',$_POST["secteur"]);
    $AUTEURS_LISTE[$modif]["titre"] = str_replace('"','&#039;',$_POST["titre"]);
    $AUTEURS_LISTE[$modif]["unite"] = str_replace('"','&#039;',$_POST["unite"]);
    $AUTEURS_LISTE[$modif]["umr"] = str_replace('"','&#039;',$_POST["umr"]);
    $AUTEURS_LISTE[$modif]["grade"] = str_replace('"','&#039;',$_POST["grade"]);
    $AUTEURS_LISTE[$modif]["numeq"] = str_replace('"','&#039;',$_POST["numeq"]);
    $AUTEURS_LISTE[$modif]["eqrec"] = str_replace('"','&#039;',$_POST["eqrec"]);
    $AUTEURS_LISTE[$modif]["collhal"] = str_replace('"','&#039;',$_POST["collhal"]);
    $AUTEURS_LISTE[$modif]["colleqhal"] = str_replace('"','&#039;',$_POST["colleqhal"]);
    $AUTEURS_LISTE[$modif]["arriv"] = str_replace('"','&#039;',$_POST["arriv"]);
    $AUTEURS_LISTE[$modif]["depar"] = str_replace('"','&#039;',$_POST["depar"]);
    $total = count($AUTEURS_LISTE);
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
    foreach($AUTEURS_LISTE AS $i => $valeur) {
      $chaine = $i.' => array("nom"=>"'.mb_ucwords($AUTEURS_LISTE[$i]["nom"]).'", ';
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
      if ($i != $total-1) {$chaine .= ',';}
      $chaine .= chr(13);
      $chaine1 .= chr(13);
      fwrite($inF,$chaine);
      fwrite($inF1,$chaine1);
    }
    $chaine = ');'.chr(13);
    $chaine .= '?>';
    fwrite($inF,$chaine);
    fclose($inF);
    fclose($inF1);
  }

  if (isset($_GET["suppr"]) && $_GET["suppr"] != "") {//Suppression d'une entrée
    $suppr = $_GET["suppr"];
    if (isset($_GET["cehval"]) && $_GET["cehval"] != "TouCol") {
      $cehval = $_GET["cehval"];
      $te = "";
    }else{
     $te = "selected";
    }
    unset($AUTEURS_LISTE[$suppr]);
    $AUTEURS_LISTE = array_values($AUTEURS_LISTE);
    $total = count($AUTEURS_LISTE);
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
    foreach($AUTEURS_LISTE AS $i => $valeur) {
      $chaine = $i.' => array("nom"=>"'.mb_ucwords($AUTEURS_LISTE[$i]["nom"]).'", ';
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
      if ($i != $total-1) {$chaine .= ',';}
      $chaine .= chr(13);
      $chaine1 .= chr(13);
      fwrite($inF,$chaine);
      fwrite($inF1,$chaine1);
    }
    $chaine = ');'.chr(13);
    $chaine .= '?>';
    fwrite($inF,$chaine);
    fclose($inF);
    fclose($inF1);
    if ($cehval != "") {
      header('Location: ExtractionHAL-liste-auteurs.php?cehval='.$cehval);
    }else{
      header('Location: ExtractionHAL-liste-auteurs.php');
    }
  }

  if (isset($_GET["action"]) && $_GET["action"] == "ajout") {//Ajout d'un auteur
    echo('<form method="POST" accept-charset="utf-8" name="ajout" action="ExtractionHAL-liste-auteurs.php">');
    echo('<b>Ajout d\'un auteur :</b><br><br>');
    echo('<b>Nom</b> : <input type="text" name="nom"><br>');
    echo('<b>Prénom</b> : <input type="text" name="prenom"><br>');
    echo('<b>Secteur</b> : <input type="text" name="secteur"><br>');
    echo('<b>Titre</b> : <input type="text" name="titre"><br>');
    echo('<b>Unité</b> : <input type="text" name="unite"><br>');
    echo('<b>UMR</b> : <input type="text" name="umr"><br>');
    echo('<b>Grade</b> : <input type="text" name="grade"><br>');
    echo('<b>Numeq</b> : <input type="text" name="umeq"><br>');
    echo('<b>Eqrec</b> : <input type="text" name="eqrec"><br>');
    echo('<b>Collection HAL</b> : <input type="text" name="collhal"><br>');
    echo('<b>Collection équipe HAL</b> : <input type="text" name="colleqhal"><br>');
    echo('<b>Arrivée <i>(aaaa)</i></b> : <input type="text" name="arriv"><br>');
    echo('<b>Départ <i>(aaaa)</i></b> : <input type="text" name="depar"><br><br>');
    echo('<input type="hidden" value="ajout" name="action">');
    if (isset($_GET["cehval"]) && $_GET["cehval"] != "") {
      echo('<input type="hidden" value="'.$_GET["cehval"].'" name="cehval">');
    }
    echo('<input type="submit" value="Valider" name="ajout">');
    echo('</form>');
  }else{
    if (isset($_GET["modif"]) && $_GET["modif"] != "") {//Modification d'une entrée
      $modif = $_GET["modif"];
      echo('<form method="POST" accept-charset="utf-8" name="modification" action="ExtractionHAL-liste-auteurs.php">');
      echo('<b>Modification de l\'entrée '.$modif.' :</b><br><br>');
      echo('<b>Nom</b> : <input type="text" value="'.mb_ucwords($AUTEURS_LISTE[$modif]['nom']).'" name="nom"><br>');
      echo('<b>Prénom</b> : <input type="text" value="'.mb_ucwords($AUTEURS_LISTE[$modif]['prenom']).'" name="prenom"><br>');
      echo('<b>Secteur</b> : <input type="text" value="'.$AUTEURS_LISTE[$modif]['secteur'].'" name="secteur"><br>');
      echo('<b>Titre</b> : <input type="text" value="'.$AUTEURS_LISTE[$modif]['titre'].'" name="titre"><br>');
      echo('<b>Unité</b> : <input type="text" value="'.$AUTEURS_LISTE[$modif]['unite'].'" name="unite"><br>');
      echo('<b>UMR</b> : <input type="text" value="'.$AUTEURS_LISTE[$modif]['umr'].'" name="umr"><br>');
      echo('<b>Grade</b> : <input type="text" value="'.$AUTEURS_LISTE[$modif]['grade'].'" name="grade"><br>');
      echo('<b>Numeq</b> : <input type="text" value="'.$AUTEURS_LISTE[$modif]['numeq'].'" name="numeq"><br>');
      echo('<b>Eqrec</b> : <input type="text" value="'.$AUTEURS_LISTE[$modif]['eqrec'].'" name="eqrec"><br>');
      echo('<b>Collection HAL</b> : <input type="text" value="'.$AUTEURS_LISTE[$modif]['collhal'].'" name="collhal"><br>');
      echo('<b>Collection équipe HAL</b> : <input type="text" value="'.$AUTEURS_LISTE[$modif]['colleqhal'].'" name="colleqhal"><br>');
      echo('<b>Arrivée <i>(aaaa)</i></b> : <input type="text" value="'.$AUTEURS_LISTE[$modif]['arriv'].'" name="arriv"><br>');
      echo('<b>Départ <i>(aaaa)</i></b> : <input type="text" value="'.$AUTEURS_LISTE[$modif]['depar'].'" name="depar"><br><br>');
      echo('<input type="hidden" value="'.$modif.'" name="modif">');
      if (isset($_GET["cehval"]) && $_GET["cehval"] != "") {
        echo('<input type="hidden" value="'.$_GET["cehval"].'" name="cehval">');
      }
      echo('<input type="submit" value="Valider" name="modification">');
      echo('</form>');
    }else{
      include $fichier_auteurs;
      array_multisort($AUTEURS_LISTE);
      //critère d'affichage
      $ceh = 0;
      $cehalcrit = "~";
      $cehal = array();
      foreach($AUTEURS_LISTE AS $i => $valeur) {
        if ($AUTEURS_LISTE[$i]['collhal'] != '') {
          if ((strpos($cehalcrit,$AUTEURS_LISTE[$i]['collhal']) === false) && ($AUTEURS_LISTE[$i]['collhal'] != "")) {
            $cehal[$ceh] = $AUTEURS_LISTE[$i]['collhal'];
            $cehalcrit .= $AUTEURS_LISTE[$i]['collhal']."~";
            $ceh++;
          }
        }
      }
      array_multisort($cehal);
      ?>
      <form method="POST" accept-charset="utf-8" name="extrhaliste" action="ExtractionHAL-liste-auteurs.php">
      <?php
      //$cehval = "ECOBIO-PAYS";
      if ((isset($_POST["cehval"]) && $_POST["cehval"] != "TouCol") || (isset($_GET["cehval"]) && $_GET["cehval"] != "TouCol")) {
        if (isset($_POST["cehval"])) {$cehval = $_POST["cehval"];}else{$cehval = $_GET["cehval"];}
        $te = "";
      }else{
        //$cehval = "TouCol";
        $te = "selected";
      }
      ?>
      <select name="cehval">
      <option value="TouCol" <?php echo $te;?>>Toutes les collections</option>
      <?php
      for($i=0; $i<$ceh; $i++) {
        if (isset($cehval) && $cehval == $cehal[$i]) {$ta = "selected";}else{$ta = "";}
        echo('<option value="'.$cehal[$i].'" '.$ta.'>'.$cehal[$i].'</option>');
      }
      ?>
      </select><br>
      <input type="submit" value="Valider" name="soumis">
      </form>
      <br><a href="ExtractionHAL-liste-auteurs.php?action=ajout&cehval=<?php echo($cehval);?>">Ajouter un auteur</a> -
      <a href="./pvt/ExtractionHAL-auteurs.csv">Exporter la liste au format CSV</a> -
      <?php
      if ((isset($_POST["cehval"]) && $_POST["cehval"] != "TouCol") || (isset($_GET["cehval"]) && $_GET["cehval"] != "TouCol")){
        if (isset($_POST["cehval"])) {$cehvalimp = $_POST["cehval"];}else{$cehvalimp = $_GET["cehval"];}
        $cehvalimp = str_replace("&", "&amp;", $cehvalimp);
      ?>
        <a href="ExtractionHAL-liste-auteurs.php?cehval=<?php echo($cehvalimp);?>&action=supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette liste ?');">Supprimer cette liste</a>
        - Importer une liste <a href="ExtractionHAL-liste-auteurs.php?cehval=<?php echo($cehvalimp);?>&action=importcomplet">entière</a> ou
        compléter avec une liste <a href="ExtractionHAL-liste-auteurs.php?cehval=<?php echo($cehvalimp);?>&action=importpartiel">partielle</a> à partir d'un fichier csv ou txt (<i><a href="./modele.csv">cf. modèle</a></i>) -
      <?php
      }else{
      ?>
        Importer une liste <a href="ExtractionHAL-liste-auteurs.php?action=importcomplet">entière</a> ou
        compléter avec une liste <a href="ExtractionHAL-liste-auteurs.php?action=importpartiel">partielle</a>	 à partir d'un fichier csv ou txt (<i><a href="./modele.csv">cf. modèle</a></i>) -
      <?php
      }
      ?>
      <br><br>
      <?php
      if (isset($_GET["action"]) && $_GET["action"] == "supprimer") {//Suppression d'une liste
        $cehvalsup = $_GET["cehval"];
        $AUTEURS_LISTE = array_values($AUTEURS_LISTE);
        $total = count($AUTEURS_LISTE);
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
        foreach($AUTEURS_LISTE AS $i => $valeur) {
          if ($AUTEURS_LISTE[$i]["collhal"] != $cehvalsup) {
            $chaine = $i.' => array("nom"=>"'.mb_ucwords($AUTEURS_LISTE[$i]["nom"]).'", ';
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
            if ($i != $total-1) {$chaine .= ',';}
            $chaine .= chr(13);
            $chaine1 .= chr(13);
            fwrite($inF,$chaine);
            fwrite($inF1,$chaine1);
          }
        }
        $chaine = ');'.chr(13);
        $chaine .= '?>';
        fwrite($inF,$chaine);
        fclose($inF);
        fclose($inF1);
        header('Location: ExtractionHAL-liste-auteurs.php');
      }
      if (isset($_GET["action"]) && $_GET["action"] == "importcomplet") {//Importation complète à partir d'un fichier CSV
      ?>
        <form method="POST" accept-charset="utf-8" name="ajout" action="ExtractionHAL-liste-auteurs-import.php" enctype="multipart/form-data">
        Sélectionnez le fichier à importer :
        <input type="file" name="importcomplet" size="30" style="font-family: Corbel; font-size: 10pt;"><br>
        <?php if (isset($_GET["cehval"]) && $_GET["cehval"] != "") {
          echo('<input type="hidden" value="'.$_GET["cehval"].'" name="cehval">');
        }?>
        <input type="submit" value="Importer">
        </form>
        <?php
      }
      if (isset($_GET["action"]) && $_GET["action"] == "importpartiel") {//Importation partielle à partir d'un fichier CSV
      ?>
        <form method="POST" accept-charset="utf-8" name="ajout" action="ExtractionHAL-liste-auteurs-import.php" enctype="multipart/form-data">
        Sélectionnez le fichier à importer :
        <input type="file" name="importpartiel" size="30" style="font-family: Corbel; font-size: 10pt;"><br>
        <?php if (isset($_GET["cehval"]) && $_GET["cehval"] != "") {
          echo('<input type="hidden" value="'.$_GET["cehval"].'" name="cehval">');
        }?>
        <input type="submit" value="Importer">
        </form>
        <?php
      }
      //tableau résultat
      echo('<table width="100%">');
      echo('<tr><td colspan="14" align="center">');
      $total = count($AUTEURS_LISTE);
      $iaff = 1;
      $iaut = 0;
      $text = '';
      echo ('<b>Total de '.$total.' auteurs renseignés, toutes collections confondues</b>');
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
      //export CSV
      $Fnm1 = "./pvt/ExtractionHAL-auteurs.csv";
      $inF1 = fopen($Fnm1,"w");
      fseek($inF1, 0);
      $chaine1 = "\xEF\xBB\xBF";
      $chaine1 .= "Nom;Prénom;Secteur;Titre;Unité;UMR;Grade;Numeq;Eqrec;Collection HAL;Collection équipe HAL;Arrivée;Départ";
      $chaine1 .= chr(13);
      fwrite($inF1,$chaine1);
      foreach($AUTEURS_LISTE AS $i => $valeur) {
        $aff = "non";
        if (isset($cehval) && $cehval !="TouCol") {
          if ($AUTEURS_LISTE[$i]['collhal'] == $cehval) {$aff = "oui";}
        }else{
          $aff = "oui";
        }
        if ($aff == "oui") {
          $iaut += 1;
          $text .= '<tr><td valign=top>'.$iaff.'</td>';
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
          if (isset($cehval)) {
            $text .= '<td valign=top><a href="ExtractionHAL-liste-auteurs.php?modif='.$i.'&cehval='.$cehval.'">Modifier</a></td>';
            $text .= '<td valign=top><a href="ExtractionHAL-liste-auteurs.php?suppr='.$i.'&cehval='.$cehval.'" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette entrée ?\');">Supprimer</a></td>';
          }else{
            $text .= '<td valign=top><a href="ExtractionHAL-liste-auteurs.php?modif='.$i.'">Modifier</a></td>';
            $text .= '<td valign=top><a href="ExtractionHAL-liste-auteurs.php?suppr='.$i.'" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette entrée ?\');">Supprimer</a></td>';
          }
          //$text .= '<td valign=top><a href="ExtractionHAL-liste-auteurs.php?suppr='.$i.'&cehval='.$cehval.'" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette entrée ?\');">Supprimer</a></td>';
          $text .= '</tr>';
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
          $chaine1 .= chr(13);
          fwrite($inF1,$chaine1);
          $iaff += 1;
        }
      }
      $text .= '</table>';
      fclose($inF1);
      if (isset($cehval) && $cehval !="TouCol") {
        echo ('<br>Détail pour la collection '.$cehval.' - '.$iaut.' auteurs renseignés');
      }
      echo $text;
    }
  }
}else{
  echo("<br/>La fonctionnalité de création de liste d'auteurs n'est possible que pour les utilisateurs autorisés (adresse IP).<br/>");
}
?>
</body></html>
