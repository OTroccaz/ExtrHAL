<form method="POST" accept-charset="utf-8" name="extrhal" action="ExtractionHAL.php#sommaire">
<p class="form-inline"><strong><label for="team">Code collection HAL</label></strong> <a class=info onclick='return false' href="#">(qu’est-ce que c’est ?)<span>Code visible dans l’URL d’une collection.
Exemple : IPR-MOL est le code de la collection http://hal.archives-ouvertes.fr/<strong>IPR-PMOL</strong> de l’équipe Physique moléculaire
de l’unité IPR UMR CNRS 6251</span></a> :
<?php
$team1 = "";
$team2 = "";
if (isset($team) && $team != "" && isset($refint) && $refint != $team) {
	$team1 = $team;
	$team2 = $team;
}else{
	if (!isset($refint)) {
		$team1 = "Entrez le code de votre collection";
		$team2 = "";
	}
}
if (!isset($listaut)) {$listaut = "";}
if (isset($idhal) && $idhal != "") {$team1 = ""; $listaut = "";}
//if (isset($refint) && $refint != "") {$team1 = ""; $listaut = "";}
?>
<input type="text" id ="team" name="team" class="form-control" style="height: 25px; width:300px" value="<?php echo $team1;?>" onClick="this.value='<?php echo $team2;?>';"  onkeydown="document.getElementById('idhal').value = ''; document.getElementById('evhal').value = '';">&nbsp;<a target="_blank" rel="noopener noreferrer" href="https://hal-univ-rennes1.archives-ouvertes.fr/page/codes-collections">Trouver le code de mon équipe / labo</a><br>
et/ou<br>
<strong><label for="refint">Référence interne</label></strong> <a class=info onclick='return false' href="#">(qu’est-ce que c’est ?)<span>Champ référence interne des dépôts HAL</span></a> :
<input type="text" id ="refint" name="refint" class="form-control" style="height: 25px; width:300px" value="<?php echo $refint;?>" onkeydown="document.getElementById('idhal').value = ''; document.getElementById('evhal').value = '';">
<p class="form-inline"><label for="listaut">Code collection HAL pour la liste des auteurs à mettre en évidence</label> <a class=info onclick='return false' href="#">(exemple)<span>Indiquez ici le code collection de votre labo ou de votre équipe, selon que vous souhaitez mettre en évidence le nom des auteurs du labo ou de l'équipe.</span></a> :
<input type="text" id="listaut" name="listaut" class="form-control" style="height: 25px; width:300px" value="<?php echo $listaut;?>">
<br>
<?php
$uniq = "";
if (isset($_GET['extur1']) && $_GET['extur1'] != '') {$uniq = $_GET['extur1'];}
if (isset($_POST['extur1']) && $_POST['extur1'] != '') {$uniq = $_POST['extur1'];}
if ($uniq != '') {
  echo 'Vous utilisez votre propre fichier de liste d\'auteurs à mettre en évidence';
  echo '<input type="hidden" value="'.$uniq.'" name="extur1">';
}else{
  echo '<p style="margin-left:20px;"<strong><u>Attention ! Ce champ ne fonctionne que pour les unités affiliées à Rennes 1</u></strong>. Extérieurs à Rennes 1, vous avez la possibilité de mettre en évidence les auteurs de votre collection ou de votre référence interne en <a href="ExtractionHAL-liste-auteurs-extur1.php">prétéléchargeant un fichier CSV ou TXT</a> réalisé selon <a href="https://halur1.univ-rennes1.fr/modele.csv">ce modèle</a>.</p>';
}
?>
<h2><strong><u>ou</u></strong></h2>
<p class="form-inline"><strong><label for="idhal">Identifiant alphabétique auteur HAL</label></strong> <em>(IdHAL > olivier-troccaz, par exemple)</em> <a class=info onclick='return false' href="#">(Pour une requête sur plusieurs IdHAL)<span>Mettre entre parenthèses, et remplacer les guillemets par %22 et les espaces par %20. Exemple : <strong>(%22laurent-jonchere%22%20OR%20%22olivier-troccaz%22)</strong>.</span></a> :
<input type="text" id="idhal" name="idhal" class="form-control" style="height: 25px; width:300px" value="<?php echo $idhal;?>" onkeydown="document.getElementById('team').value = ''; document.getElementById('listaut').value = ''; document.getElementById('refint').value = '';">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" rel="noopener noreferrer" href="https://hal.archives-ouvertes.fr/page/mon-idhal">Créer mon IdHAL</a>
<br>
<p class="form-inline"><label for="evhal">Auteur correspondant à l'IdHAL à mettre en évidence</label> <a class=info onclick='return false' href="#">(Instructions)<span>Pour une requête sur un seul IdHAL, remplacer les espaces du prénom ou du nom par des tirets bas _. Exemple : <strong>Jean-Luc Le_Breton</strong>.<br>Pour une requête sur plusieurs IdHAL, séparer en plus les auteurs par un tilde ~. Exemple : <strong>Laurent Jonchère~Olivier Troccaz</strong>.</span></a> :
<input type="text" id="evhal" name="evhal" class="form-control" style="height: 25px; width:300px" value="<?php echo $evhal;?>"></p>
<br>
<?php
if (isset($choix_publis) && strpos($choix_publis, "-TA-") !== false) {$ta = "selected";}else{$ta = "";}
if (isset($choix_publis) && strpos($choix_publis, "-ACL-") !== false) {$acl = "selected";}else{$acl = "";}
if (isset($choix_publis) && strpos($choix_publis, "-ASCL-") !== false) {$ascl = "selected";}else{$ascl = "";}
if (isset($choix_publis) && strpos($choix_publis, "-ARI-") !== false) {$ari = "selected";}else{$ari = "";}
if (isset($choix_publis) && strpos($choix_publis, "-ARN-") !== false) {$arn = "selected";}else{$arn = "";}
if (isset($choix_publis) && strpos($choix_publis, "-ACLRI-") !== false) {$aclri = "selected";}else{$aclri = "";}
if (isset($choix_publis) && strpos($choix_publis, "-ACLRN-") !== false) {$aclrn = "selected";}else{$aclrn = "";}
if (isset($choix_publis) && strpos($choix_publis, "-ASCLRI-") !== false) {$asclri = "selected";}else{$asclri = "";}
if (isset($choix_publis) && strpos($choix_publis, "-ASCLRN-") !== false) {$asclrn = "selected";}else{$asclrn = "";}
if (isset($choix_publis) && strpos($choix_publis, "-AV-") !== false) {$av = "selected";}else{$av = "";}
?>
<div style='width:99%;float: left;'>
<span class="aaa"><em>Cliquez sur les titres des menus pour afficher les choix et options</em></span>
<div style='width:100%;float: left;background-color:#d9face;border:1px solid #dddddd;padding: 3px;border-radius: 3px;margin-bottom: 10px;'>
<span style='color:#333333;' class='accordeon'><strong>Choix des listes de publications à afficher :</strong></span>
<div class="panel" style="margin-bottom: 0px; border: 0px;">
<br>
<table aria-describedby="Périodes">
<tr class="form-inline"><td><label class="nameField" for="periode">Période :&nbsp;</label></td>
<th scope="col">

<label for="anneedeb">Du&nbsp;</label><em>(JJ/MM/AAAA)</em><input type="text"id="anneedeb" class="form-control calendrier" size="1" style="padding:0px; width:200px; height:20px;" name="anneedeb" value="<?php echo $anneedeb;?>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="anneefin">Jusqu'au&nbsp;</label><em>(JJ/MM/AAAA)</em>
<input type="text" id="anneefin" class="form-control calendrier" size="1" style="padding:0px; width:200px; height:20px;" name="anneefin" value="<?php echo $anneefin;?>" class="calendrier">
</select></th></tr>

<?php
if ($depotforce == "oui") {
  $depotdebval = "";
  $depotfinval = "";
}else{
  $depotdebval = $depotdeb;
  $depotfinval = $depotfin;
}
?>

<tr class="form-inline"><td><label class="nameField" for="datedepot">Date de dépôt :&nbsp;</label></td>
<th scope="col">
<label for="depotdeb">Du&nbsp;</label><em>(JJ/MM/AAAA)</em><input type="text"id="depotdeb" class="form-control calendrier" size="1" style="padding:0px; width:200px; height:20px;" name="depotdeb" value="<?php echo $depotdebval;?>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="depotfin">Jusqu'au&nbsp;</label><em>(JJ/MM/AAAA)</em>
<input type="text" id="depotfin" class="form-control calendrier" size="1" style="padding:0px; width:200px; height:20px;" name="depotfin" value="<?php echo $depotfinval;?>" class="calendrier">
</th></tr></table>
<br>
<em>(sélection/désélection multiple en maintenant la touche 'Ctrl' (PC) ou 'Pomme' (Mac) enfoncée)</em>:
<table aria-describedby="Articles">
<tr><th scope="col" valign="top"><label for="publis">Articles de revue <a class=info target="_blank" href="./ExtrHAL-criteres-types-publis.pdf"><img alt="Question" src="./img/pdi.jpg"><span>Quels champs compléter dans HAL ?</span></a> :&nbsp;</label></th>
<th scope="col"><select id="publis" class="form-control" style="margin:0px; width:400px" size="10" name="publis[]" multiple>
<option value="TA" <?php echo $ta;?>>Tous les articles (sauf vulgarisation) </option>
<option value="ACL" <?php echo $acl;?>>Articles de revues à comité de lecture</option>
<option value="ASCL" <?php echo $ascl;?>>Articles de revues sans comité de lecture</option>
<option value="ARI" <?php echo $ari;?>>Articles de revues internationales</option>
<option value="ARN" <?php echo $arn;?>>Articles de revues nationales</option>
<option value="ACLRI" <?php echo $aclri;?>>Articles de revues internationales à comité de lecture</option>
<option value="ACLRN" <?php echo $aclrn;?>>Articles de revues nationales à comité de lecture</option>
<option value="ASCLRI" <?php echo $asclri;?>>Articles de revues internationales sans comité de lecture</option>
<option value="ASCLRN" <?php echo $asclrn;?>>Articles de revues nationales sans comité de lecture</option>
<option value="AV" <?php echo $av;?>>Articles de vulgarisation</option>
</select></th></tr></table><br>
<br>
<?php
if (isset($choix_comm) && strpos($choix_comm, "-TC-") !== false) {$tc = "selected";}else{$tc = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CA-") !== false) {$ca = "selected";}else{$ca = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CSA-") !== false) {$csa = "selected";}else{$csa = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CI-") !== false) {$ci = "selected";}else{$ci = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CN-") !== false) {$cn = "selected";}else{$cn = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CAI-") !== false) {$cai = "selected";}else{$cai = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CSAI-") !== false) {$csai = "selected";}else{$csai = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CAN-") !== false) {$can = "selected";}else{$can = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CSAN-") !== false) {$csan = "selected";}else{$csan = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CINVASANI-") !== false) {$cinvasani = "selected";}else{$cinvasani = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CINVA-") !== false) {$cinva = "selected";}else{$cinva = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CINVSA-") !== false) {$cinvsa = "selected";}else{$cinvsa = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CNONINVA-") !== false) {$cnoninva = "selected";}else{$cnoninva = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CNONINVSA-") !== false) {$cnoninvsa = "selected";}else{$cnoninvsa = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CINVI-") !== false) {$cinvi = "selected";}else{$cinvi = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CNONINVI-") !== false) {$cnoninvi = "selected";}else{$cnoninvi = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CINVN-") !== false) {$cinvn = "selected";}else{$cinvn = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CNONINVN-") !== false) {$cnoninvn = "selected";}else{$cnoninvn = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CPASANI-") !== false) {$cpasani = "selected";}else{$cpasani = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CPA-") !== false) {$cpa = "selected";}else{$cpa = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CPSA-") !== false) {$cpsa = "selected";}else{$cpsa = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CPI-") !== false) {$cpi = "selected";}else{$cpi = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CPN-") !== false) {$cpn = "selected";}else{$cpn = "";}
if (isset($choix_comm) && strpos($choix_comm, "-CGP-") !== false) {$cgp = "selected";}else{$cgp = "";}
?>
<table aria-describedby="Communications">
<tr><th scope="col" valign="top"><label for="comm">Communications / conférences <a class=info target="_blank" href="./ExtrHAL-criteres-types-publis.pdf"><img alt="Question" src="./img/pdi.jpg"><span>Quels champs compléter dans HAL ?</span></a> :&nbsp;</label></th>
<th scope="col"><select size="24" id="comm" class="form-control" style="margin:0px; width:600px" name="comm[]" multiple>
<option value="TC" <?php echo $tc;?>>Toutes les communications (sauf grand public)</option>
<option value="CA" <?php echo $ca;?>>Communications avec actes</option>
<option value="CSA" <?php echo $csa;?>>Communications sans actes</option>
<option value="CI" <?php echo $ci;?>>Communications internationales</option>
<option value="CN" <?php echo $cn;?>>Communications nationales</option>
<option value="CAI" <?php echo $cai;?>>Communications avec actes internationales</option>
<option value="CSAI" <?php echo $csai;?>>Communications sans actes internationales</option>
<option value="CAN" <?php echo $can;?>>Communications avec actes nationales</option>
<option value="CSAN" <?php echo $csan;?>>Communications sans actes nationales</option>
<option value="CINVASANI" <?php echo $cinvasani;?>>Communications invitées avec ou sans actes, nationales ou internationales</option>
<option value="CINVA" <?php echo $cinva;?>>Communications invitées avec actes</option>
<option value="CINVSA" <?php echo $cinvsa;?>>Communications invitées sans actes</option>
<option value="CNONINVA" <?php echo $cnoninva;?>>Communications non invitées avec actes</option>
<option value="CNONINVSA" <?php echo $cnoninvsa;?>>Communications non invitées sans actes</option>
<option value="CINVI" <?php echo $cinvi;?>>Communications invitées internationales</option>
<option value="CNONINVI" <?php echo $cnoninvi;?>>Communications non invitées internationales</option>
<option value="CINVN" <?php echo $cinvn;?>>Communications invitées nationales</option>
<option value="CNONINVN" <?php echo $cnoninvn;?>>Communications non invitées nationales</option>
<option value="CPASANI" <?php echo $cpa;?>>Communications par affiches (posters) avec ou sans actes, nationales ou internationales</option>
<option value="CPA" <?php echo $cpa;?>>Communications par affiches (posters) avec actes</option>
<option value="CPSA" <?php echo $cpsa;?>>Communications par affiches (posters) sans actes</option>
<option value="CPI" <?php echo $cpi;?>>Communications par affiches internationales</option>
<option value="CPN" <?php echo $cpn;?>>Communications par affiches nationales</option>
<option value="CGP" <?php echo $cgp;?>>Conférences grand public</option>
</select></th></tr></table><br>
<br>
<?php
if (isset($choix_ouvr) && strpos($choix_ouvr, "-TO-") !== false) {$to = "selected";}else{$to = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OSPI-") !== false) {$ospi = "selected";}else{$ospi = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OSPN-") !== false) {$ospn = "selected";}else{$ospn = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-COS-") !== false) {$cos = "selected";}else{$cos = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-COSI-") !== false) {$cosi = "selected";}else{$cosi = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-COSN-") !== false) {$cosn = "selected";}else{$cosn = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-DOS-") !== false) {$dos = "selected";}else{$dos = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-DOSI-") !== false) {$dosi = "selected";}else{$dosi = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-DOSN-") !== false) {$dosn = "selected";}else{$dosn = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCO-") !== false) {$oco = "selected";}else{$oco = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCOI-") !== false) {$ocoi = "selected";}else{$ocoi = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCON-") !== false) {$ocon = "selected";}else{$ocon = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-ODO-") !== false) {$odo = "selected";}else{$odo = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-ODOI-") !== false) {$odoi = "selected";}else{$odoi = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-ODON-") !== false) {$odon = "selected";}else{$odon = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCDO-") !== false) {$ocdo = "selected";}else{$ocdo = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCDOI-") !== false) {$ocdoi = "selected";}else{$ocdoi = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCDON-") !== false) {$ocdon = "selected";}else{$ocdon = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCV-") !== false) {$ocv = "selected";}else{$ocv = "";}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-CNR-") !== false) {$cnr = "selected";}else{$cnr = "";}
?>
<table aria-describedby="Ouvrages">
<tr><th scope="col" valign="top"><label for="ouvr">Ouvrages <a class=info target="_blank" href="./ExtrHAL-criteres-types-publis.pdf"><img alt="Question" src="./img/pdi.jpg"><span>Quels champs compléter dans HAL ?</span></a> :</label>&nbsp;</th>
<th scope="col"><select size="20" id="ouvr" class="form-control" style="margin:0px; width:500px" name="ouvr[]" multiple>
<option value="OCDO" <?php echo $ocdo;?>>Ouvrages ou chapitres ou directions d’ouvrages</option>
<option value="OCDOI" <?php echo $ocdoi;?>>Ouvrages ou chapitres ou directions d’ouvrages de portée internationale</option>
<option value="OCDON" <?php echo $ocdon;?>>Ouvrages ou chapitres ou directions d’ouvrages de portée nationale</option>
<option value="TO" <?php echo $to;?>>Tous les ouvrages (sauf vulgarisation)</option>
<option value="OSPI" <?php echo $ospi;?>>Ouvrages scientifiques de portée internationale</option>
<option value="OSPN" <?php echo $ospn;?>>Ouvrages scientifiques de portée nationale</option>
<option value="COS" <?php echo $cos;?>>Chapitres d’ouvrages scientifiques</option>
<option value="COSI" <?php echo $cosi;?>>Chapitres d’ouvrages scientifiques de portée internationale</option>
<option value="COSN" <?php echo $cosn;?>>Chapitres d’ouvrages scientifiques de portée nationale</option>
<option value="DOS" <?php echo $dos;?>>Directions d’ouvrages scientifiques</option>
<option value="DOSI" <?php echo $dosi;?>>Directions d’ouvrages scientifiques de portée internationale</option>
<option value="DOSN" <?php echo $dosn;?>>Directions d’ouvrages scientifiques de portée nationale</option>
<option value="OCO" <?php echo $oco;?>>Ouvrages ou chapitres d’ouvrages</option>
<option value="OCOI" <?php echo $ocoi;?>>Ouvrages ou chapitres d’ouvrages de portée internationale</option>
<option value="OCON" <?php echo $ocon;?>>Ouvrages ou chapitres d’ouvrages de portée nationale</option>
<option value="ODO" <?php echo $odo;?>>Ouvrages ou directions d’ouvrages</option>
<option value="ODOI" <?php echo $odoi;?>>Ouvrages ou directions d’ouvrages de portée internationale</option>
<option value="ODON" <?php echo $odon;?>>Ouvrages ou directions d’ouvrages de portée nationale</option>
<option value="OCV" <?php echo $ocv;?>>Ouvrages ou chapitres de vulgarisation</option>
<option value="CNR" <?php echo $cnr;?>>Coordination de numéro de revue</option>
</select></th></tr></table><br>
<br>
<?php
if (isset($choix_autr) && strpos($choix_autr, "-BRE-") !== false) {$bre = "selected";}else{$bre = "";}
if (isset($choix_autr) && strpos($choix_autr, "-RAP-") !== false) {$rap = "selected";}else{$rap = "";}
if (isset($choix_autr) && strpos($choix_autr, "-THE-") !== false) {$the = "selected";}else{$the = "";}
if (isset($choix_autr) && strpos($choix_autr, "-HDR-") !== false) {$hdr = "selected";}else{$hdr = "";}
if (isset($choix_autr) && strpos($choix_autr, "-VID-") !== false) {$vid = "selected";}else{$vid = "";}
if (isset($choix_autr) && strpos($choix_autr, "-PWM-") !== false) {$pwm = "selected";}else{$pwm = "";}
if (isset($choix_autr) && strpos($choix_autr, "-CRO-") !== false) {$cro = "selected";}else{$cro = "";}
if (isset($choix_autr) && strpos($choix_autr, "-BLO-") !== false) {$blo = "selected";}else{$blo = "";}
if (isset($choix_autr) && strpos($choix_autr, "-NED-") !== false) {$ned = "selected";}else{$ned = "";}
if (isset($choix_autr) && strpos($choix_autr, "-TRA-") !== false) {$tra = "selected";}else{$tra = "";}
if (isset($choix_autr) && strpos($choix_autr, "-LOG-") !== false) {$log = "selected";}else{$log = "";}
if (isset($choix_autr) && strpos($choix_autr, "-AP-") !== false) {$ap = "selected";}else{$ap = "";}
?>
<table aria-describedby="Autres publications">
<tr><th scope="col" valign="top"><label for="autr">Autres productions scientifiques <a class=info target="_blank" href="./ExtrHAL-criteres-types-publis.pdf"><img alt="Question" src="./img/pdi.jpg"><span>Quels champs compléter dans HAL ?</span></a> :</label>&nbsp;</th>
<th scope="col"><select size="12" id="autr" class="form-control" style="margin:0px; width:400px" name="autr[]" multiple>
<option value="BRE" <?php echo $bre;?>>Brevets</option>
<option value="RAP" <?php echo $rap;?>>Rapports</option>
<option value="THE" <?php echo $the;?>>Thèses</option>
<option value="HDR" <?php echo $hdr;?>>HDR</option>
<option value="VID" <?php echo $vid;?>>Vidéos</option>
<option value="PWM" <?php echo $pwm;?>>Preprints, working papers, manuscrits non publiés</option>
<option value="CRO" <?php echo $cro;?>>Comptes rendus d'ouvrage ou notes de lecture</option>
<option value="BLO" <?php echo $blo;?>>Billets de blog</option>
<option value="NED" <?php echo $ned;?>>Notices d'encyclopédie ou dictionnaire</option>
<option value="TRA" <?php echo $tra;?>>Traductions</option>
<option value="LOG" <?php echo $log;?>>Logiciels</option>
<option value="AP" <?php echo $ap;?>>Autres publications</option>
</select></th></tr></table><br>
<br>
<br>
<?php
if (isset($typnum) && $typnum == "viscon" || !isset($team)) {$viscon = "checked=\"\"";}else{$viscon = "";}
if (isset($typnum) && $typnum == "visdis") {$visdis = "checked=\"\"";}else{$visdis = "";}
if (isset($typnum) && $typnum == "inv") {$inv = "checked=\"\"";}else{$inv = "";}
?>
</div>
</div>
<div style='width:100%;float: left;background-color:#afeafc;border:1px solid #dddddd;padding: 3px;border-radius: 3px;margin-bottom: 10px;'>
<span style='color:#333333;' class='accordeon'><strong>Options d'affichage et d'export</strong> :</span>
<div class="panel form-inline"  style="margin-bottom: 0px; border: 0px;" id="panel2"><br>
	<div class="panel-body" style="padding: 3px; border:1px solid #dddddd; border-radius: 3px; margin-bottom: 10px;">
		<div class="form-group" style="display:block;">
			<label for="typnum" class="col-sm-3 control-label">Numérotation :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typnum" id="typnum1" value="viscon" <?php echo $viscon;?> style="position:absolute; margin-left:-20px;">visible et continue
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typnum" id="typnum3" value="visdis" <?php echo $visdis;?> style="position:absolute; margin-left:-20px;">visible et discontinue
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typnum" id="typnum2" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
		</div>
		<br>
		<?php
		if (isset($typtri) && $typtri == "premierauteur" || !isset($team)) {$premierauteur= "checked=\"\"";}else{$premierauteur = "";}
		if (isset($typtri) && $typtri == "journal") {$journal = "checked=\"\"";}else{$journal = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typtri" class="col-sm-3 control-label">Classer par :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typtri" id="typtri1" value="premierauteur" <?php echo $premierauteur;?> style="position:absolute; margin-left:-20px;">année puis nom du premieur auteur
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typtri" id="typtri2" value="journal" <?php echo $journal;?> style="position:absolute; margin-left:-20px;">année puis journal
					</label>
			</div>
		</div>
		<br>
		<br>
		<?php
		if (isset($typchr) && $typchr == "decr" || !isset($team)) {$decr= "checked=\"\"";}else{$decr = "";}
		if (isset($typchr) && $typchr == "croi") {$croi = "checked=\"\"";}else{$croi = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typchr" class="col-sm-3 control-label">Années :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typchr" id="typchr1" value="decr" <?php echo $decr;?> style="position:absolute; margin-left:-20px;">décroissantes
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typchr" id="typchr2" value="croi" <?php echo $croi;?> style="position:absolute; margin-left:-20px;">croissantes
					</label>
			</div>
		</div>
		<br>
	</div>
	<div class="panel-body" style="padding: 3px; border:1px solid #dddddd; border-radius: 3px; margin-bottom: 10px;">
		<?php
		if (isset($typaut) && $typaut == "soul") {$soul = "checked=\"\"";}else{$soul = "";}
		if (isset($typaut) && $typaut == "gras") {$gras = "checked=\"\"";}else{$gras = "";}
		if (isset($typaut) && $typaut == "aucun" || !isset($team)) {$auc = "checked=\"\"";}else{$auc = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typaut" class="col-sm-3 control-label">Auteurs (tous) :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typaut" id="typaut1" value="soul" <?php echo $soul;?> style="position:absolute; margin-left:-20px;">soulignés
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typaut" id="typaut2" value="gras" <?php echo $gras;?> style="position:absolute; margin-left:-20px;">gras
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typaut" id="typaut3" value="aucun" <?php echo $auc;?> style="position:absolute; margin-left:-20px;">aucun
					</label>
			</div>
		</div>
		<br>
		<?php
		if (isset($typnom) && $typnom == "nominit" || !isset($team)) {$nominit = "checked=\"\"";}else{$nominit = "";}
		if (isset($typnom) && $typnom == "nomcomp1" || isset($stpdf) && $stpdf == "chi") {$nomcomp1 = "checked=\"\"";}else{$nomcomp1 = "";}
		if (isset($typnom) && $typnom == "nomcomp2") {$nomcomp2 = "checked=\"\"";}else{$nomcomp2 = "";}
		if (isset($typnom) && $typnom == "nomcomp3") {$nomcomp3 = "checked=\"\"";}else{$nomcomp3 = "";}//NOM (Prénom(s))
		?>
		<div class="form-group" style="display:block;">
			<label for="typnom" class="col-sm-3 control-label">Auteurs (tous) :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typnom" id="typnom1" value="nominit" <?php echo $nominit;?> style="position:absolute; margin-left:-20px;">Nom, initiale(s) du(des) prénom(s)
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typnom" id="typnom2" value="nomcomp1" <?php echo $nomcomp1;?> style="position:absolute; margin-left:-20px;">Nom Prénom(s)
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typnom" id="typnom3" value="nomcomp2" <?php echo $nomcomp2;?> style="position:absolute; margin-left:-20px;">Prénom(s) Nom
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typnom" id="typnom4" value="nomcomp3" <?php echo $nomcomp3;?> style="position:absolute; margin-left:-20px;">NOM (Prénom(s))
					</label>
			</div>
		</div>
		<br>
		<br>
		<?php
		if (isset($typcol) && $typcol == "soul" || !isset($team)) {$soul = "checked=\"\"";}else{$soul = "";}
		if (isset($typcol) && $typcol == "gras") {$gras = "checked=\"\"";}else{$gras = "";}
		if (isset($typcol) && $typcol == "aucun") {$auc = "checked=\"\"";}else{$auc = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typcol" class="col-sm-3 control-label">Auteurs (de la collection) ou auteur IdHAL :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typcol" id="typcol1" value="soul" <?php echo $soul;?> style="position:absolute; margin-left:-20px;">soulignés
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typcol" id="typcol2" value="gras" <?php echo $gras;?> style="position:absolute; margin-left:-20px;">gras
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typcol" id="typcol3" value="aucun" <?php echo $auc;?> style="position:absolute; margin-left:-20px;">aucun
					</label>
			</div>
		</div>
		<br>
		<br>
		<?php
		if (isset($typbib) && $typbib == "oui") {$oui= "checked=\"\"";}else{$oui = "";}
		if (isset($typbib) && $typbib == "non" || !isset($team)) {$non = "checked=\"\"";}else{$non = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typbib" class="col-sm-3 control-label">Mettre en évidence (\labo{xxxxx}) les auteurs de la collection dans l'export Bibtex :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typbib" id="typbib1" value="oui" <?php echo $oui;?> style="position:absolute; margin-left:-20px;">oui
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typbib" id="typbib2" value="non" <?php echo $non;?> style="position:absolute; margin-left:-20px;">non
					</label>
			</div>
		</div>
		<br>
		<br>
		<br>
		<?php
		if (isset($typlim) && $typlim == "non" || !isset($team)) {$limn = "checked=\"\"";}else{$limn = "";}
		if (isset($typlim) && $typlim == "oui") {$limo = "checked=\"\"";}else{$limo = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="limaff" class="col-sm-3 control-label">Limiter l’affichage aux :</label>
			<div class="col-sm-4">
					<label>
							<select id="limaff1" class="form-control" size="1" name="limaff" style="padding: 0px;">
							<?php
							if(isset($limaff) && $limaff == 1 || isset($stpdf) && $stpdf == "mla") {$txt = "selected";}else{$txt = "";}
							echo '<option value=1 '.$txt.'>1</option>';
							if((isset($limaff) && $limaff == 5) || !isset($team)) {$txt = "selected";}else{$txt = "";}
							echo '<option value=5 '.$txt.'>5</option>';
							if(isset($limaff) && $limaff == 10) {$txt = "selected";}else{$txt = "";}
							echo '<option value=10 '.$txt.'>10</option>';
							if(isset($limaff) && $limaff == 15) {$txt = "selected";}else{$txt = "";}
							echo '<option value=15 '.$txt.'>15</option>';
							if(isset($limaff) && $limaff == 20) {$txt = "selected";}else{$txt = "";}
							echo '<option value=20 '.$txt.'>20</option>';
							?>
							</select>
					</label>
					premier(s) auteur(s) (« et al. ») :
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typlim" id="limaff2" value="non" <?php echo $limn;?> style="position:absolute; margin-left:-20px;">non
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typlim" id="limaff3" value="oui" <?php echo $limo;?> style="position:absolute; margin-left:-20px;">oui
					</label>
			</div>
		</div>
		<br>
		<br>
		<?php
		if (isset($trpaff)) {$trpaffval = $trpaff;}else{$trpaffval = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="trpaff" class="col-sm-6 control-label">Remplacer les auteurs hors collection par '...' au-delà de :
				<input id="trpaff" class="form-control" type="text" name="trpaff" value="<?php echo $trpaffval;?>" style="height: 25px; width: 50px;">
			auteur(s)
			</label>
		</div>
		<br>
		<br>
		<?php
		if (isset($typgra) && $typgra == "non" || !isset($team)) {$granon= "checked=\"\"";}else{$granon = "";}
		if (isset($typgra) && $typgra == "oui") {$graoui = "checked=\"\"";}else{$graoui = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typgra" class="col-sm-3 control-label">Mettre la citation en gras si auteurs de la collection en 1<sup>ère</sup> position ou en position finale :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typgra" id="typgra1" value="oui" <?php echo $graoui;?> style="position:absolute; margin-left:-20px;">oui
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typgra" id="typgra2" value="non" <?php echo $granon;?> style="position:absolute; margin-left:-20px;">non
					</label>
			</div>
		</div>
		<br>
		<br>
		<?php
		if (isset($limgra) && $limgra == "non" || !isset($team)) {$limnon= "checked=\"\"";}else{$limnon = "";}
		if (isset($limgra) && $limgra == "oui") {$limoui = "checked=\"\"";}else{$limoui = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="limgra" class="col-sm-3 control-label">Limiter l'affichage aux seules références en gras :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="limgra" id="limgra1" value="oui" <?php echo $limoui;?> style="position:absolute; margin-left:-20px;">oui
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="limgra" id="limgra2" value="non" <?php echo $limnon;?> style="position:absolute; margin-left:-20px;">non
					</label>
			</div>
		</div>
		<br>
		<br>
		<?php
		if (isset($rstaff)) {$rstaffval = $rstaff;}else{$rstaffval = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="rstaff" class="col-sm-3 control-label">Restreindre l'affichage à certains auteurs de la collection et leur réserver la mise en valeur <a class=info onclick='return false' href="#">(Instructions)<span>Renseigner sous la forme 'Nom Prénom' et séparer les auteurs par un tilde ~. Exemple : <strong>Jonchère Laurent~Troccaz Olivier</strong>.</span></a> :</label>
				<input id="rstaff" class="col-sm-3 form-control" type="text" name="rstaff" value="<?php echo $rstaffval;?>" style="height: 20px; width: 600px;">
		</div>
		<br>
		<br>
	</div>
	<div class="panel-body" style="padding: 3px; border:1px solid #dddddd; border-radius: 3px; margin-bottom: 10px;">
		<?php
		if (isset($typidh) && $typidh == "vis" || !isset($team)) {$vis = "checked=\"\"";}else{$vis = "";}
		if (isset($typidh) && $typidh == "inv") {$inv = "checked=\"\"";}else{$inv = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typidh" class="col-sm-3 control-label">Identifiant HAL :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typidh" id="typidh1" value="vis" onClick="affich_form2();" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">visible
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typidh" id="typidh2" value="inv" onClick="cacher_form2();" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
		</div>
		<br>
		<div id="detrac">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="racine">URL racine HAL :</label>
		<?php
		if (!isset($racine)) {$racine = "https://hal-univ-rennes1.archives-ouvertes.fr/";}
		?>
		<select id="racine" class="form-control" size="1" name="racine" style="padding: 0px;">
		<?php if ($racine == "http://archivesic.ccsd.cnrs.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://archivesic.ccsd.cnrs.fr/">http://archivesic.ccsd.cnrs.fr/</option>
		<?php if ($racine == "http://artxiker.ccsd.cnrs.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://artxiker.ccsd.cnrs.fr/">http://artxiker.ccsd.cnrs.fr/</option>
		<?php if ($racine == "https://cel.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://cel.archives-ouvertes.fr/">https://cel.archives-ouvertes.fr/</option>
		<?php if ($racine == "http://dumas.ccsd.cnrs.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://dumas.ccsd.cnrs.fr/">http://dumas.ccsd.cnrs.fr/</option>
		<?php if ($racine == "https://edutice.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://edutice.archives-ouvertes.fr/">https://edutice.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal.archives-ouvertes.fr/">https://hal.archives-ouvertes.fr/</option>
		<?php if ($racine == "http://hal.cirad.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal.cirad.fr/">http://hal.cirad.fr/</option>
		<?php if ($racine == "http://hal.grenoble-em.com/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal.grenoble-em.com/">http://hal.grenoble-em.com</option>
		<?php if ($racine == "http://hal.in2p3.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal.in2p3.fr/">http://hal.in2p3.fr/</option>
		<?php if ($racine == "https://hal.inrae.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal.inrae.fr/">https://hal.inrae.fr/</option>
		<?php if ($racine == "https://hal.inria.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal.inria.fr/">https://hal.inria.fr/</option>
		<?php if ($racine == "http://hal.ird.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal.ird.fr/">http://hal.ird.fr/</option>
		<?php if ($racine == "http://hal.univ-brest.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal.univ-brest.fr/">http://hal.univ-brest.fr/</option>
		<?php if ($racine == "http://hal.univ-grenoble-alpes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal.univ-grenoble-alpes.fr/">http://hal.univ-grenoble-alpes.fr/</option>
		<?php if ($racine == "http://hal.univ-lille3.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal.univ-lille3.fr/">http://hal.univ-lille3.fr/</option>
		<?php if ($racine == "http://hal.univ-nantes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal.univ-nantes.fr/">http://hal.univ-nantes.fr/</option>
		<?php if ($racine == "http://hal.univ-reunion.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal.univ-reunion.fr/">http://hal.univ-reunion.fr/</option>
		<?php if ($racine == "http://hal.univ-smb.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal.univ-smb.fr/">http://hal.univ-smb.fr/</option>
		<?php if ($racine == "http://hal.upmc.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal.upmc.fr/">http://hal.upmc.fr/</option>
		<?php if ($racine == "https://hal-agrocampus-ouest.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-agrocampus-ouest.archives-ouvertes.fr/">https://hal-agrocampus-ouest.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-agroparistech.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-agroparistech.archives-ouvertes.fr/">https://hal-agroparistech.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-amu.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-amu.archives-ouvertes.fr/">https://hal-amu.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-anses.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-anses.archives-ouvertes.fr/">https://hal-anses.archives-ouvertes.fr/</option>
		<?php if ($racine == "http://hal-audencia.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal-audencia.archives-ouvertes.fr/">http://hal-audencia.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-auf.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-auf.archives-ouvertes.fr/">https://hal-auf.archives-ouvertes.fr/</option>
		<?php if ($racine == "http://hal-bioemco.ccsd.cnrs.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal-bioemco.ccsd.cnrs.fr/">http://hal-bioemco.ccsd.cnrs.fr/</option>
		<?php if ($racine == "https://hal-bnf.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-bnf.archives-ouvertes.fr/">https://hal-bnf.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-brgm.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-brgm.archives-ouvertes.fr/">https://hal-brgm.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-cea.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-cea.archives-ouvertes.fr/">https://hal-cea.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-centralesupelec.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-centralesupelec.archives-ouvertes.fr/">https://hal-centralesupelec.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-clermont-univ.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-clermont-univ.archives-ouvertes.fr/">https://hal-clermont-univ.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-confremo.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-confremo.archives-ouvertes.fr/">https://hal-confremo.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-cstb.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-cstb.archives-ouvertes.fr/">https://hal-cstb.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-descartes.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-descartes.archives-ouvertes.fr/">https://hal-descartes.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-ecp.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-ecp.archives-ouvertes.fr/">https://hal-ecp.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-em-normandie.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-em-normandie.archives-ouvertes.fr/">https://hal-em-normandie.archives-ouvertes.fr/</option>
		<?php if ($racine == "http://hal-emse.ccsd.cnrs.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal-emse.ccsd.cnrs.fr/">http://hal-emse.ccsd.cnrs.fr/</option>
		<?php if ($racine == "https://hal-enac.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-enac.archives-ouvertes.fr/">https://hal-enac.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-enpc.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-enpc.archives-ouvertes.fr/">https://hal-enpc.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-ens.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-ens.archives-ouvertes.fr/">https://hal-ens.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-enscp.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-enscp.archives-ouvertes.fr/">https://hal-enscp.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-ens-lyon.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-ens-lyon.archives-ouvertes.fr/">https://hal-ens-lyon.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-ensta.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-ensta.archives-ouvertes.fr/">https://hal-ensta.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-ensta-bretagne.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-ensta-bretagne.archives-ouvertes.fr/">https://hal-ensta-bretagne.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-ephe.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-ephe.archives-ouvertes.fr/">https://hal-ephe.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-esc-rennes.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-esc-rennes.archives-ouvertes.fr/">https://hal-esc-rennes.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-espci.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-espci.archives-ouvertes.fr/">https://hal-espci.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-essec.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-essec.archives-ouvertes.fr/">https://hal-essec.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-genes.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-genes.archives-ouvertes.fr/">https://hal-genes.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-hcl.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-hcl.archives-ouvertes.fr/">https://hal-hcl.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-hec.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-hec.archives-ouvertes.fr/">https://hal-hec.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-hprints.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-hprints.archives-ouvertes.fr/">https://hal-hprints.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-icp.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-icp.archives-ouvertes.fr/">https://hal-icp.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-ifp.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-ifp.archives-ouvertes.fr/">https://hal-ifp.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-inalco.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-inalco.archives-ouvertes.fr/">https://hal-inalco.archives-ouvertes.fr/</option>
		<?php if ($racine == "http://hal-ineris.ccsd.cnrs.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal-ineris.ccsd.cnrs.fr/">http://hal-ineris.ccsd.cnrs.fr/</option>
		<?php if ($racine == "https://hal-inrap.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-inrap.archives-ouvertes.fr/">https://hal-inrap.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-insa-rennes.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-insa-rennes.archives-ouvertes.fr/">https://hal-insa-rennes.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-institut-mines-telecom.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-institut-mines-telecom.archives-ouvertes.fr/">https://hal-institut-mines-telecom.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-insu.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-insu.archives-ouvertes.fr/">https://hal-insu.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-iogs.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-iogs.archives-ouvertes.fr/">https://hal-iogs.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-irsn.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-irsn.archives-ouvertes.fr/">https://hal-irsn.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-lara.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-lara.archives-ouvertes.fr/">https://hal-lara.archives-ouvertes.fr/</option>
		<?php if ($racine == "http://hal-lirmm.ccsd.cnrs.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal-lirmm.ccsd.cnrs.fr/">http://hal-lirmm.ccsd.cnrs.fr/</option>
		<?php if ($racine == "https://hal-meteofrance.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-meteofrance.archives-ouvertes.fr/">https://hal-meteofrance.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-mines-albi.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-mines-albi.archives-ouvertes.fr/">https://hal-mines-albi.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-mines-nantes.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-mines-nantes.archives-ouvertes.fr/">https://hal-mines-nantes.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-mines-paristech.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-mines-paristech.archives-ouvertes.fr/">https://hal-mines-paristech.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-mnhn.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-mnhn.archives-ouvertes.fr/">https://hal-mnhn.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-neoma-bs.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-neoma-bs.archives-ouvertes.fr/">https://hal-neoma-bs.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-normandie-univ.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-normandie-univ.archives-ouvertes.fr/">https://hal-normandie-univ.archives-ouvertes.fr/</option>
		<?php if ($racine == "http://hal-obspm.ccsd.cnrs.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal-obspm.ccsd.cnrs.fr/">http://hal-obspm.ccsd.cnrs.fr/</option>
		<?php if ($racine == "https://hal-onera.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-onera.archives-ouvertes.fr/">https://hal-onera.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-paris1.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-paris1.archives-ouvertes.fr/">https://hal-paris1.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-pasteur.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-pasteur.archives-ouvertes.fr/">https://hal-pasteur.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-pjse.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-pjse.archives-ouvertes.fr/">https://hal-pjse.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-polytechnique.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-polytechnique.archives-ouvertes.fr/">https://hal-polytechnique.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-pse.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-pse.archives-ouvertes.fr/">https://hal-pse.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-rbs.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-rbs.archives-ouvertes.fr/">https://hal-rbs.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-riip.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-riip.archives-ouvertes.fr/">https://hal-riip.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-sciencespo.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-sciencespo.archives-ouvertes.fr/">https://hal-sciencespo.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-sde.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-sde.archives-ouvertes.fr/">https://hal-sde.archives-ouvertes.fr/</option>
		<?php if ($racine == "http://hal-sfo.ccsd.cnrs.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://hal-sfo.ccsd.cnrs.fr/">http://hal-sfo.ccsd.cnrs.fr/</option>
		<?php if ($racine == "https://halshs.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://halshs.archives-ouvertes.fr/">https://halshs.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-ssa.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-ssa.archives-ouvertes.fr/">https://hal-ssa.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-supelec.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-supelec.archives-ouvertes.fr/">https://hal-supelec.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-uag.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-uag.archives-ouvertes.fr/">https://hal-uag.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-ujm.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-ujm.archives-ouvertes.fr/">https://hal-ujm.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-unice.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-unice.archives-ouvertes.fr/">https://hal-unice.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-unilim.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-unilim.archives-ouvertes.fr/">https://hal-unilim.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal.univ-angers.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal.univ-angers.fr/">https://hal.univ-angers.fr/</option>
		<?php if ($racine == "https://hal-univ-artois.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-artois.archives-ouvertes.fr/">https://hal-univ-artois.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-avignon.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-avignon.archives-ouvertes.fr/">https://hal-univ-avignon.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-bourgogne.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-bourgogne.archives-ouvertes.fr/">https://hal-univ-bourgogne.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-corse.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-corse.archives-ouvertes.fr/">https://hal-univ-corse.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-diderot.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-diderot.archives-ouvertes.fr/">https://hal-univ-diderot.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-fcomte.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-fcomte.archives-ouvertes.fr/">https://hal-univ-fcomte.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-lorraine.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-lorraine.archives-ouvertes.fr/">https://hal-univ-lorraine.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-lyon3.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-lyon3.archives-ouvertes.fr/">https://hal-univ-lyon3.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-orleans.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-orleans.archives-ouvertes.fr/">https://hal-univ-orleans.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-paris13.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-paris13.archives-ouvertes.fr/">https://hal-univ-paris13.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-paris3.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-paris3.archives-ouvertes.fr/">https://hal-univ-paris3.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-paris8.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-paris8.archives-ouvertes.fr/">https://hal-univ-paris8.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-paris-dauphine.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-paris-dauphine.archives-ouvertes.fr/">https://hal-univ-paris-dauphine.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-perp.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-perp.archives-ouvertes.fr/">https://hal-univ-perp.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-rennes1.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-rennes1.archives-ouvertes.fr/">https://hal-univ-rennes1.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-tln.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-tln.archives-ouvertes.fr/">https://hal-univ-tln.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-tlse2.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-tlse2.archives-ouvertes.fr/">https://hal-univ-tlse2.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-tlse3.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-tlse3.archives-ouvertes.fr/">https://hal-univ-tlse3.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-tours.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-tours.archives-ouvertes.fr/">https://hal-univ-tours.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-univ-ubs.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-univ-ubs.archives-ouvertes.fr/">https://hal-univ-ubs.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-upec-upem.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-upec-upem.archives-ouvertes.fr/">https://hal-upec-upem.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-usj.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-usj.archives-ouvertes.fr/">https://hal-usj.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://hal-uvsq.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://hal-uvsq.archives-ouvertes.fr/">https://hal-uvsq.archives-ouvertes.fr/</option>
		<?php if ($racine == "http://jeannicod.ccsd.cnrs.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://jeannicod.ccsd.cnrs.fr/">http://jeannicod.ccsd.cnrs.fr/</option>
		<?php if ($racine == "https://medihal.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://medihal.archives-ouvertes.fr/">https://medihal.archives-ouvertes.fr/</option>
		<?php if ($racine == "http://memsic.ccsd.cnrs.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://memsic.ccsd.cnrs.fr/">http://memsic.ccsd.cnrs.fr/</option>
		<?php if ($racine == "https://pastel.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://pastel.archives-ouvertes.fr/">https://pastel.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://tel.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://tel.archives-ouvertes.fr/">https://tel.archives-ouvertes.fr/</option>
		<?php if ($racine == "https://telearn.archives-ouvertes.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="https://telearn.archives-ouvertes.fr/">https://telearn.archives-ouvertes.fr/</option>
		<?php if ($racine == "http://www.hal.inserm.fr/") {$txt = "selected";}else{$txt = "";}?>
		<option <?php echo $txt;?> value="http://www.hal.inserm.fr/">http://www.hal.inserm.fr/</option>
		</select>
		</div>
		
		<?php
		if (isset($typurl) && $typurl == "vis" || !isset($team)) {$vis = "checked=\"\"";}else{$vis = "";}
		if (isset($typurl) && $typurl == "inv") {$inv = "checked=\"\"";}else{$inv = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typurl" class="col-sm-3 control-label">Lien URL :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typurl" id="typurl1" value="vis" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">visible
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typurl" id="typurl2" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
		</div>
		<br>
		<?php
		if (isset($typdoi) && $typdoi == "vis" || !isset($team)) {$vis = "checked=\"\"";}else{$vis = "";}
		if (isset($typdoi) && $typdoi == "inv") {$inv = "checked=\"\"";}else{$inv = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typdoi" class="col-sm-3 control-label">Lien DOI :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typdoi" id="typdoi1" value="vis" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">visible
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typdoi" id="typdoi2" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
		</div>
		<br>
		<?php
		if (isset($typpub) && $typpub == "vis") {$vis = "checked=\"\"";}else{$vis = "";}
		if (isset($typpub) && $typpub == "inv" || !isset($team)) {$inv = "checked=\"\"";}else{$inv = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typpub" class="col-sm-3 control-label">Lien Pubmed :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typpub" id="typpub1" value="vis" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">visible
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typpub" id="typpub2" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
		</div>
		<br>
		<?php
		if (isset($typisbn) && $typisbn == "vis") {$vis = "checked=\"\"";}else{$vis = "";}
		if (isset($typisbn) && $typisbn == "inv" || !isset($team)) {$inv = "checked=\"\"";}else{$inv = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typisbn" class="col-sm-3 control-label">ISBN :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typisbn" id="typisbn1" value="vis" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">visible
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typisbn" id="typisbn2" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
		</div>
		<br>
		<?php
		if (isset($typcomm) && $typcomm == "vis") {$vis = "checked=\"\"";}else{$vis = "";}
		if (isset($typcomm) && $typcomm == "inv" || !isset($team)) {$inv = "checked=\"\"";}else{$inv = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typcomm" class="col-sm-3 control-label">Commentaire :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typcomm" id="typcomm1" value="vis" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">visible
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typcomm" id="typcomm2" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
		</div>
		<br>
		<?php
		if (isset($typrefi) && $typrefi == "vis") {$vis = "checked=\"\"";}else{$vis = "";}
		if (isset($typrefi) && $typrefi == "inv" || !isset($team)) {$inv = "checked=\"\"";}else{$inv = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typrefi" class="col-sm-3 control-label">Référence interne :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typrefi" id="typrefi1" value="vis" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">visible
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typrefi" id="typrefi2" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
		</div>
		<br>
		<?php
		if (isset($prefeq) && $prefeq == "oui") {$prefo = "checked=\"\"";}else{$prefo = "";}
		if (isset($prefeq) && $prefeq == "non" || !isset($team)) {$prefn = "checked=\"\"";}else{$prefn = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="prefeq" class="col-sm-3 control-label">Afficher le préfixe AERES :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="prefeq" id="prefeq1" value="oui" <?php echo $prefo;?> style="position:absolute; margin-left:-20px;">oui
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="prefeq" id="prefeq2" value="non" <?php echo $prefn;?> style="position:absolute; margin-left:-20px;">non
					</label>
			</div>
		</div>
		<br>
		<?php
		if (isset($surdoi) && $surdoi == "inv" || !isset($team)) {$inv = "checked=\"\"";}else{$inv = "";}
		if (isset($surdoi) && $surdoi == "vis") {$vis = "checked=\"\"";}else{$vis = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="surdoi" class="col-sm-3 control-label">Afficher les doublons par surlignage :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="surdoi" id="surdoi1" value="vis" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">oui
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="surdoi" id="surdoi2" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">non
					</label>
			</div>
		</div>
		<br>
		<?php
		if (isset($sursou) && $sursou == "inv" || !isset($team)) {$inv = "checked=\"\"";}else{$inv = "";}
		if (isset($sursou) && $sursou == "vis") {$vis = "checked=\"\"";}else{$vis = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="sursou" class="col-sm-3 control-label">Afficher les absences d'affiliation par surlignage :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="sursou" id="sursou1" value="vis" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">oui
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="sursou" id="sursou2" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">non
					</label>
			</div>
		</div>
		<br>
		<br>
		<?php
		if (isset($finass) && $finass == "inv" || !isset($team)) {$inv = "checked=\"\"";}else{$inv = "";}
		if (isset($finass) && $finass == "vis") {$vis = "checked=\"\"";}else{$vis = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="finass" class="col-sm-3 control-label">Afficher les financements associés (ANR/EU) :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="finass" id="finass1" value="vis" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">oui
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="finass" id="finass2" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">non
					</label>
			</div>
		</div>
		<br>
	</div>
	<div class="panel-body" style="padding: 3px; border:1px solid #dddddd; border-radius: 3px; margin-bottom: 10px;">
		<!--Suppression temporaire des Rang revues HCERES/CNRS (Economie-Gestion)-->
		<!--
		<?php
		if (isset($typreva) && $typreva == "vis") {$vis = "checked=\"\"";}else{$vis = "";}
		if (isset($typreva) && $typreva == "inv" || !isset($team)) {$inv = "checked=\"\"";}else{$inv = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typreva" class="col-sm-3 control-label">Rang revues HCERES (Economie-Gestion) :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typreva" id="typreva1" value="vis" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">visible
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typreva" id="typreva2" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
		</div>
		<br>
		<?php
		if (isset($typrevh) && $typrevh == "vis") {$vis = "checked=\"\"";}else{$vis = "";}
		if (isset($typrevh) && $typrevh == "inv" || !isset($team)) {$inv = "checked=\"\"";}else{$inv = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typrevh" class="col-sm-3 control-label">Rang revues HCERES (Toutes disciplines) :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typrevh" id="typrevh1" value="vis" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">visible
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typrevh" id="typrevh2" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
			<?php
			if (isset($dscp) && $dscp == "gau") {$gau = "selected";}else{$gau = "";}
			if (isset($dscp) && $dscp == "sp") {$sp = "selected";}else{$sp = "";}
			if (isset($dscp) && $dscp == "tsr") {$tsr = "selected";}else{$tsr = "";}
			if (isset($dscp) && $dscp == "hps") {$hps = "selected";}else{$hps = "";}
			if (isset($dscp) && $dscp == "d") {$d = "selected";}else{$d = "";}
			if (isset($dscp) && $dscp == "ae") {$ae = "selected";}else{$ae = "";}
			if (isset($dscp) && $dscp == "sd") {$sd = "selected";}else{$sd = "";}
			if (isset($dscp) && $dscp == "a") {$a = "selected";}else{$a = "";}
			if (isset($dscp) && $dscp == "p") {$p = "selected";}else{$p = "";}
			if (isset($dscp) && $dscp == "se") {$se = "selected";}else{$se = "";}
			if (isset($dscp) && $dscp == "sic") {$sic = "selected";}else{$sic = "";}
			if (isset($dscp) && $dscp == "staps") {$staps = "selected";}else{$staps = "";}
			if (isset($dscp) && $dscp == "g") {$g = "selected";}else{$g = "";}
			if (isset($dscp) && $dscp == "e") {$e = "selected";}else{$e = "";}
			if (isset($dscp) && $dscp == "arc") {$arc = "selected";}else{$arc = "";}
			if (isset($dscp) && $dscp == "h") {$h = "selected";}else{$h = "";}
			if (isset($dscp) && $dscp == "pee") {$pee = "selected";}else{$pee = "";}
			?>
			<div class="col-sm-4">
				<label for="dscp">Discipline :</label>
				<select id="dscp" class="form-control" size="1" name="dscp" style="padding: 0px;">
				<option value='gau' <?php echo $gau;?>>Géographie, Aménagement, Urbanisme (2013)</option>
				<option value='sp' <?php echo $sp;?>>Science Politique (2011)</option>
				<option value='tsr' <?php echo $tsr;?>>Théologie et Sciences religieuses (2012)</option>
				<option value='hps' <?php echo $hps;?>>Histoire et Philosophie des Sciences (2012)</option>
				<option value='d' <?php echo $d;?>>Droit (2010)</option>
				<option value='ae' <?php echo $ae;?>>Anthropologie, Ethnologie (2012)</option>
				<option value='sd' <?php echo $sd;?>>Sociologie, Démographie (2013)</option>
				<option value='a' <?php echo $a;?>>Arts (2014)</option>
				<option value='p' <?php echo $p;?>>Philosophie (2013)</option>
				<option value='se' <?php echo $se;?>>Sciences de l'Education (2014)</option>
				<option value='sic' <?php echo $sic;?>>SIC (2013)</option>
				<option value='staps' <?php echo $staps;?>>STAPS (2012)</option>
				<option value='g' <?php echo $g;?>>Gestion (2016)</option>
				<option value='e' <?php echo $e;?>>Economie (2015)</option>
				<option value='arc' <?php echo $arc;?>>Histoire, Histoire de l'Art, Archéologie (2009)</option>
				<option value='h' <?php echo $h;?>>Histoire (2012)</option>
				<option value='pee' <?php echo $pee;?>>Psychologie – Ethologie – Ergonomie (2011)</option>
				</select>
			</div>
		</div>
		<br>
		<?php
		if (isset($typrevc) && $typrevc == "vis") {$vis = "checked=\"\"";}else{$vis = "";}
		if (isset($typrevc) && $typrevc == "inv" || !isset($team)) {$inv = "checked=\"\"";}else{$inv = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typrevc" class="col-sm-3 control-label">Rang revues CNRS (Economie-Gestion) :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typrevc" id="typrevc1" value="vis" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">visible
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typrevc" id="typrevc2" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
		</div>
		<br>
		<br>
		-->
		<?php
		//if (strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false || strpos($_SERVER['HTTP_HOST'], 'ecobio') !== false) {
		if (isset($typif) && $typif == "vis") {$vis = "checked=\"\"";}else{$vis = "";}
		if (isset($typif) && $typif == "inv" || !isset($team)) {$inv = "checked=\"\"";}else{$inv = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typif" class="col-sm-3 control-label">IF des revues <em style="font-weight:normal;">(il peut être nécessaire de lancer <a target="_blank" href="./ExtractionHAL-IF.php">la procédure d'extraction</a> à partir de votre liste CSV réalisée selon ce <a href="./modele-JCR.csv">modèle</a>)</em> :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typif" id="typif1" value="vis" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">visible
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typif" id="typif2" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<?php
		if (isset($typinc) && $typinc == "vis") {$vis = "checked=\"\"";}else{$vis = "";}
		if (isset($typinc) && $typinc == "vis1") {$vis1 = "checked=\"\"";}else{$vis1 = "";}
		if (isset($typinc) && $typinc == "vis10") {$vis10 = "checked=\"\"";}else{$vis10 = "";}
		if (isset($typinc) && $typinc == "inv" || !isset($team)) {$inv = "checked=\"\"";}else{$inv = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typinc" class="col-sm-3 control-label">InCites Top 1%/10% <em style="font-weight:normal;">(il peut être nécessaire de lancer <a target="_blank" href="./ExtractionHAL-InCites.php">la procédure d'extraction</a> à partir de votre liste CSV réalisée selon ce <a href="./modele-InCites.csv">modèle</a>)</em> :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typinc" id="typinc1" value="vis" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">visible
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typinc" id="typinc2" value="vis1" <?php echo $vis1;?> style="position:absolute; margin-left:-20px;">Top 1%
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typinc" id="typinc3" value="vis10" <?php echo $vis10;?> style="position:absolute; margin-left:-20px;">Top 10%
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typinc" id="typinc4" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<?php
		if (isset($typsign) && $typsign == "ts100") {$vis100 = "checked=\"\"";}else{$vis100 = "";}
		if (isset($typsign) && $typsign == "ts2080") {$vis2080 = "checked=\"\"";}else{$vis2080 = "";}
		if (isset($typsign) && $typsign == "ts20") {$vis20 = "checked=\"\"";}else{$vis20 = "";}
		if (isset($typsign) && $typsign == "ts0" || !isset($team)) {$inv = "checked=\"\"";}else{$inv = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typsign" class="col-sm-3 control-label">HCERES : distinguer les 20% / 80% : <span style="font-weight:normal;"><a target="_blank" href="./ExtractionHAL-signif.php">chargez votre liste CSV</a> en suivant ce <a href="./modele-signif.csv">modèle</a></span> :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typsign" id="typsign1" value="ts100" <?php echo $vis100;?> style="position:absolute; margin-left:-20px;">visible (→)
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typsign" id="typsign2" value="ts2080" <?php echo $vis2080;?> style="position:absolute; margin-left:-20px;">visible (20% / 80 %)
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typsign" id="typsign3" value="ts20" <?php echo $vis20;?> style="position:absolute; margin-left:-20px;">visible (20%)
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typsign" id="typsign4" value="ts0" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
	</div>
	<div class="panel-body" style="padding: 3px; border:1px solid #dddddd; border-radius: 3px; margin-bottom: 10px;">
		<?php
		$guil = "";
		$gras = "";
		$ital = "";
		$reto = "";
		$aucun = "";
		if ((isset($typtit) && $typtit == ",") || !isset($team)) {
			$typtit = ",";
			$guil = "";
			$gras = "";
			$ital = "";
			$reto = "";
		}else{
			if (strpos($typtit,"guil") >= 1) {$guil = "checked=\"\"";}
			if (strpos($typtit,"gras") >= 1) {$gras = "checked=\"\"";}
			if (strpos($typtit,"ital") >= 1) {$ital = "checked=\"\"";}
			if (strpos($typtit,"reto") >= 1) {$reto = "checked=\"\"";}
		}
		?>
		<div class="form-group" style="display:block;">
			<label for="typtit" class="col-sm-3 control-label">Titres (articles, ouvrages, chapitres, etc.) :</label>
			<div class="col-sm-2 checkbox">
					<label>
							<input type="checkbox" name="typtit[]" id="typtit1" value="guil" <?php echo $guil;?> style="position:absolute; margin-left:-20px;">entre guillemets
					</label>
			</div>
			<div class="col-sm-2 checkbox">
					<label>
							<input type="checkbox" name="typtit[]" id="typtit2" value="gras" <?php echo $gras;?> style="position:absolute; margin-left:-20px;">en gras
					</label>
			</div>
			<div class="col-sm-2 checkbox">
					<label>
							<input type="checkbox" name="typtit[]" id="typtit3" value="ital" <?php echo $ital;?> style="position:absolute; margin-left:-20px;">en italique
					</label>
			</div>
			<div class="col-sm-2 checkbox">
					<label>
							<input type="checkbox" name="typtit[]" id="typtit4" value="reto" <?php echo $reto;?> style="position:absolute; margin-left:-20px;">suivi d'un saut de ligne
					</label>
			</div>
		</div>
		<br>
		<?php
		if (isset($typrvg) && $typrvg == "oui") {$oui = "checked=\"\"";}else{$oui = "";}
		if (isset($typrvg) && $typrvg == "non" || !isset($team)) {$non = "checked=\"\"";}else{$non = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typrvg)" class="col-sm-3 control-label">Revue en gras :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typrvg" id="typrvg1" value="oui" <?php echo $oui;?> style="position:absolute; margin-left:-20px;">oui
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typrvg" id="typrvg2" value="non" <?php echo $non;?> style="position:absolute; margin-left:-20px;">non
					</label>
			</div>
		</div>
		<br>
		<br>
		<?php
		if (isset($typann) && $typann == "apres" || !isset($team)) {$apres = "checked=\"\"";}else{$apres = "";}
		if (isset($typann) && $typann == "avant") {$avant = "checked=\"\"";}else{$avant = "";}
		if (isset($typann) && $typann == "alafin") {$alafin = "checked=\"\"";}else{$alafin = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typann" class="col-sm-3 control-label">Année :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typann" id="typann1" value="apres" <?php echo $apres;?> style="position:absolute; margin-left:-20px;">après les auteurs
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typann" id="typann2" value="avant" <?php echo $avant;?> style="position:absolute; margin-left:-20px;">avant le numéro de volume
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typann" id="typann3" value="alafin" <?php echo $alafin;?> style="position:absolute; margin-left:-20px;">à la fin, avant la pagination
					</label>
			</div>
		</div>
		<br>
		<br>
		<?php
		if (isset($typfor) && $typfor == "typ1") {$typ1 = "checked=\"\"";}else{$typ1 = "";}
		if (isset($typfor) && $typfor == "typ2") {$typ2 = "checked=\"\"";}else{$typ2 = "";}
		if (isset($typfor) && $typfor == "typ3" || !isset($team )) {$typ3 = "checked=\"\"";}else{$typ3 = "";}
		if (isset($typfor) && $typfor == "typ4") {$typ4 = "checked=\"\"";}else{$typ4 = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typfor" class="col-sm-3 control-label">Format métadonnées :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typfor" id="typfor1" value="typ1" <?php echo $typ1;?> style="position:absolute; margin-left:-20px;">vol 5, n°2, pp. 320
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typfor" id="typfor2" value="typ2" <?php echo $typ2;?> style="position:absolute; margin-left:-20px;">vol 5, n°2, 320 p.
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typfor" id="typfor3" value="typ3" <?php echo $typ3;?> style="position:absolute; margin-left:-20px;">5(2):320
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typfor" id="typfor4" value="typ4" <?php echo $typ4;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
		</div>
		<br>
		<?php
		if (isset($typavsa) && $typavsa == "vis") {$vis = "checked=\"\"";}else{$vis = "";}
		if (isset($typavsa) && $typavsa == "inv" || !isset($team)) {$inv = "checked=\"\"";}else{$inv = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typavsa" class="col-sm-3 control-label">Information <em>(acte)/(sans acte)</em> pour les communications et posters :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typavsa" id="typavsa1" value="vis" <?php echo $vis;?> style="position:absolute; margin-left:-20px;">visible
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typavsa" id="typavsa2" value="inv" <?php echo $inv;?> style="position:absolute; margin-left:-20px;">invisible
					</label>
			</div>
		</div>
		<br>
	</div>
	<div class="panel-body" style="padding: 3px; border:1px solid #dddddd; border-radius: 3px; margin-bottom: 10px;">
		<?php
		if (isset($typlng) && $typlng == "toutes" || !isset($team)) {$lngt = "checked=\"\"";}else{$lngt = "";}
		if (isset($typlng) && $typlng == "français") {$lngf = "checked=\"\"";}else{$lngf = "";}
		if (isset($typlng) && $typlng == "autres") {$lnga = "checked=\"\"";}else{$lnga = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typeqp" class="col-sm-3 control-label">Langue :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typlng" id="typlngt" value="toutes" <?php echo $lngt;?> style="position:absolute; margin-left:-20px;">toutes
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typlng" id="typlngf" value="français" <?php echo $lngf;?> style="position:absolute; margin-left:-20px;">français
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typlng" id="typlnga" value="autres" <?php echo $lnga;?> style="position:absolute; margin-left:-20px;">autres
					</label>
			</div>
		</div>
		<br>
	</div>
	<div class="panel-body" style="padding: 3px; border:1px solid #dddddd; border-radius: 3px; margin-bottom: 10px;">
		<?php
		if (isset($delim) && $delim == ",") {$virg = "selected";}else{$virg = "";}
		if (isset($delim) && $delim == ";") {$pvir = "selected";}else{$pvir = "";}
		if (isset($delim) && $delim == "£") {$poun = "selected";}else{$poun = "";}
		if (isset($delim) && $delim == "§") {$para = "selected";}else{$para = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="delim" class="col-sm-3 control-label">Délimiteur export CSV :</label>
			<div class="col-sm-4">
					<label>
							<select id="delim" class="form-control" size="1" name="delim" style="padding: 0px;">
							<option value=';' <?php echo $pvir;?>>Point-virgule</option>
							<option value='£' <?php echo $poun;?>>Symbole pound (£)</option>
							<option value='§' <?php echo $para;?>>Symbole paragraphe (§)</option>
							</select>
							</select>
					</label>
			</div>
		</div>
		<br>
		<br>
		<?php
		if (isset($UBitly) && $UBitly == "oui") {$blyo = "checked=\"\"";}else{$blyo = "";}
		if (isset($UBitly) && $UBitly == "non" || !isset($team)) {$blyn = "checked=\"\"";}else{$blyn = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typeqp" class="col-sm-3 control-label">Disposer d'une URL raccourcie directe :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="UBitly" id="UBitly1" value="oui" <?php echo $blyo;?> style="position:absolute; margin-left:-20px;">oui
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="UBitly" id="UBitly2" value="non" <?php echo $blyn;?> style="position:absolute; margin-left:-20px;">non
					</label>
			</div>
		</div>
		<br>
		<?php
		if (isset($typeqp) && $typeqp == "oui") {$eqpo = "checked=\"\"";}else{$eqpo = "";}
		if (isset($typeqp) && $typeqp == "non" || !isset($team)) {$eqpn = "checked=\"\"";}else{$eqpn = "";}
		?>
		<div class="form-group" style="display:block;">
			<label for="typeqp" class="col-sm-3 control-label">Numérotation/codification par équipe :</label>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typeqp" id="typeqp1" value="oui" onClick="affich_form();" <?php echo $eqpo;?> style="position:absolute; margin-left:-20px;">oui
					</label>
			</div>
			<div class="col-sm-2 radio">
					<label>
							<input type="radio" name="typeqp" id="typeqp2" value="non" onClick="cacher_form();" <?php echo $eqpn;?> style="position:absolute; margin-left:-20px;">non
					</label>
			</div>
		</div>
		<br>
		<div id="deteqp">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="nbeqpid">. Nombre d'équipes :</label>
		<?php
		if (!isset($nbeqp)) {$nbeqp = "";}
		?>
		<input type="text" class="form-control" name="nbeqp" id="nbeqpid" size="1" value="<?php echo $nbeqp;?>" style="padding:0px; height:20px;">
		</div>
		<div id="eqp">
		<?php
		if (isset($typcro) && $typcro == "non" || !isset($team)) {$cron = "checked=\"\"";}else{$cron = "";}
		if (isset($typcro) && $typcro == "oui") {$croo = "checked=\"\"";}else{$croo = "";}
		if (isset($typeqp) && $typeqp == "oui") {//Numérotation/codification par équipe
			if (isset($_POST["soumis"])) {
				for($i = 1; $i <= $nbeqp; $i++) {
					echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;. <label for="eqp">Nom HAL équipe '.$i.' :</label> <input type="text" class="form-control" id="eqp'.$i.'" style="width:300px; padding:0px; height:20px;" name="eqp'.$i.'" value = "'.strtoupper($_POST['eqp'.$i]).'"><br>';
				}
				echo '<br>';
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;. <label for="typcro">Limiter l\'affichage seulement aux publications croisées :</label>';
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				echo '<label><input type="radio" id="typcro1" name="typcro" value="non" '.$cron.'>&nbsp;&nbsp;&nbsp;non</label>';
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				echo '<label><input type="radio" id="typcro2" name="typcro" value="oui" '.$croo.'>&nbsp;&nbsp;&nbsp;oui</label>';
			}
			if (isset($_GET["team"])) {
				for($i = 1; $i <= $nbeqp; $i++) {
					echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;. <label for="eqp">Nom HAL équipe '.$i.' :</label> <input type="text" class="form-control" id="eqp'.$i.'" style="width:300px; padding:0px; height:20px;" name="eqp'.$i.'" value = "'.$_GET['eqp'.$i].'"><br>';
				}
				echo '<br>';
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;. <label for="typcro">Limiter l\'affichage seulement aux publications croisées :</label>';
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				echo '<label><input type="radio" id="typcro1" name="typcro" value="non" '.$cron.'>&nbsp;&nbsp;&nbsp;non</label>';
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				echo '<label><input type="radio" id="typcro2" name="typcro" value="oui" '.$croo.'>&nbsp;&nbsp;&nbsp;oui</label>';
			}
		}
		?>
		</div><br>
	</div>
</div>
</div>
<br><br>
<div style='width:100%;float: left;background-color:#fcecc9;border:1px solid #dddddd;padding: 3px;border-radius: 3px;margin-bottom: 10px;'>
<span style='color:#333333;' class='accordeon'><strong>Options et styles de citations :</strong></span>
<div class="panel" style="margin-bottom: 0px; border: 0px;"><br>
<div class="alert alert-warning" role="alert">
  <strong>Attention !</strong> Cette fonctionnalité est expérimentale et concerne essentiellement les articles de revues.
</div>
<strong>Important, loi du tout ou rien :</strong> si aucune option ci-dessous n'est choisie, ce sont les règles équivalentes ci-dessus qui seront appliquées. A l'inverse, si une option ci-dessous est choisie, il faut alors <u>obligatoirement</u> faire un choix pour toutes les autres possibilités et ce seront ces règles qui seront appliquées. Le style 'Majuscules' sera prioritaire au style 'Minuscules' si les deux sont sélectionnés.<br><br>
<?php
if (isset($stpdf) && $stpdf == "- -" || !isset($team)) {$st0 = "selected ";}else{$st0 = "";}
if (isset($stpdf) && $stpdf == "acs") {$st1 = "selected ";}else{$st1 = "";}
if (isset($stpdf) && $stpdf == "apa") {$st2 = "selected ";}else{$st2 = "";}
if (isset($stpdf) && $stpdf == "chi") {$st3 = "selected "; $typnom = "nomcomp1"; $nomcomp1 = "checked";}else{$st3 = "";}
if (isset($stpdf) && $stpdf == "har") {$st4 = "selected ";}else{$st4 = "";}
if (isset($stpdf) && $stpdf == "iee") {$st5 = "selected ";}else{$st5 = "";}
if (isset($stpdf) && $stpdf == "nlm") {$st6 = "selected ";}else{$st6 = "";}
if (isset($stpdf) && $stpdf == "nat") {$st7 = "selected ";}else{$st7 = "";}
if (isset($stpdf) && $stpdf == "mla") {$st8 = "selected "; $typlim = "oui"; $limaff = 1; $typnom = "nomcomp1"; $nomcomp1 = "checked";}else{$st8 = "";}
if (isset($stpdf) && $stpdf == "van") {$st9 = "selected ";}else{$st9 = "";}
if (isset($stpdf) && $stpdf == "zo1") {$st10 = "selected ";}else{$st10 = "";}
?>
<label for="stpdf">Styles prédéfinis :</label> <em>(l'adéquation avec le style demandé dépend des éléments qui ont été renseignés dans HAL)</em><br>
<select id="stpdf" class="form-control" style="width: 400px; padding: 0px;" size="1" name="stpdf" onChange="appst();mise_en_ordre('1');mise_en_ordre('2');majapercu();">
<option <?php echo $st0;?>value="- -">- -</option>
<option <?php echo $st1;?>value="acs">ACS - American Chemical Society</option>
<option <?php echo $st2;?>value="apa">APA - American Psychological Association, 6th ed.</option>
<option <?php echo $st3;?>value="chi">Chicago</option>
<option <?php echo $st4;?>value="har">Harvard</option>
<option <?php echo $st5;?>value="iee">IEEE</option>
<option <?php echo $st6;?>value="nlm">National Library of Medicine (NLM)</option>
<option <?php echo $st7;?>value="nat">Nature</option>
<option <?php echo $st8;?>value="mla">Modern Language Association (MLA), 8th ed.</option>
<option <?php echo $st9;?>value="van">Vancouver</option>
<option <?php echo $st10;?>value="zo1">Zotero1</option>
</select>
<br>
<label for="stprs">Styles personnalisés :</label> <em>(mise en forme interne des groupes : sélection/désélection multiple en maintenant la touche 'Ctrl' (PC) ou 'Pomme' (Mac) enfoncée - Par exemple, Gras + Entre () + Majuscule)</em>
<label for="mp1" style="color: white;">_</label>
<label for="mp2" style="color: white;">_</label>
<label for="mp3" style="color: white;">_</label>
<label for="mp4" style="color: white;">_</label>
<label for="mp5" style="color: white;">_</label>
<label for="mp6" style="color: white;">_</label>
<label for="mp7" style="color: white;">_</label>
<label for="cg1" style="color: white;">_</label>
<label for="cg2" style="color: white;">_</label>
<label for="cg3" style="color: white;">_</label>
<label for="cg4" style="color: white;">_</label>
<label for="cg5" style="color: white;">_</label>
<label for="cg6" style="color: white;">_</label>
<label for="cg7" style="color: white;">_</label>
<br>
<table style="font-size: 80%; margin: auto; width: 80%;" class="form-inline" aria-describedby="Styles personnalisés">
  <tr>
    <th scope="col" colspan="15">
      <label for="spa">Séparateur interne au groupe d'auteurs :</label>
      <?php
      if (isset($spa) && $spa == "- -" || !isset($team)) {$spa_0 = "selected ";}else{$spa_0 = "";}
      if (isset($spa) && $spa == "vir") {$spa_1 = "selected ";}else{$spa_1 = "";}
      if (isset($spa) && $spa == "pvi") {$spa_2 = "selected ";}else{$spa_2 = "";}
      if (isset($spa) && $spa == "esp") {$spa_3 = "selected ";}else{$spa_3 = "";}
      if (isset($spa) && $spa == "tir") {$spa_4 = "selected ";}else{$spa_4 = "";}
      ?>
      <select id="spa" class="form-control" style="width: 100px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="spa" onChange="mise_en_ordre('1'); majapercu();">
      <option <?php echo $spa_0;?>value="- -">- -</option>
      <option <?php echo $spa_1;?>value="vir">virg. + esp.</option>
      <option <?php echo $spa_2;?>value="pvi">p.virg. + esp.</option>
      <option <?php echo $spa_3;?>value="esp">espace</option>
      <option <?php echo $spa_4;?>value="tir">esp. + tiret + esp.</option>
      </select>
    </th>
  </tr>
  <tr>
    <td><label for="nmo">Numérot.</label></td>
    <td><label for="gp1">Groupe 1</label></td>
    <td><label for="sep1">Sép. 1</label></td>
    <td><label for="gp2">Groupe 2</label></td>
    <td><label for="sep2">Sép. 2</label></td>
    <td><label for="gp3">Groupe 3</label></td>
    <td><label for="sep3">Sép. 3</label></td>
    <td><label for="gp4">Groupe 4</label></td>
    <td><label for="sep4">Sép. 4</label></td>
    <td><label for="gp5">Groupe 5</label></td>
    <td><label for="sep5">Sép. 5</td>
    <td><label for="gp6">Groupe 6</td>
    <td><label for="sep6">Sép. 6</label></td>
    <td><label for="gp7">Groupe 7</label></td>
    <td><label for="sep7">Sép. 7</label></td>
  </tr>
  <tr>
<?php
if (isset($nmo) && $nmo == "- -" || !isset($team)) {$nmo_0 = "selected ";}else{$nmo_0 = "";}
if (isset($nmo) && $nmo == "auc") {$nmo_1 = "selected ";}else{$nmo_1 = "";}
if (isset($nmo) && $nmo == "sim") {$nmo_2 = "selected ";}else{$nmo_2 = "";}
if (isset($nmo) && $nmo == "par") {$nmo_3 = "selected ";}else{$nmo_3 = "";}
if (isset($nmo) && $nmo == "cro") {$nmo_4 = "selected ";}else{$nmo_4 = "";}
?>
    <td width="100px">
      <select id="nmo" class="form-control" style="width: 70px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="nmo" onChange="mise_en_ordre('1'); majapercu();">
      <option <?php echo $nmo_0;?>value="- -">- -</option>
      <option <?php echo $nmo_1;?>value="auc">Aucune</option>
      <option <?php echo $nmo_2;?>value="sim">x. + esp.</option>
      <option <?php echo $nmo_3;?>value="par">(x) + esp.</option>
      <option <?php echo $nmo_4;?>value="cro">[x] + esp.</option>
      </select>
    </td>
<?php
if (isset($gp1) && $gp1 == "- -" || !isset($team)) {$gp1_0 = "selected ";}else{$gp1_0 = "";}
if (isset($gp1) && $gp1 == "auteurs") {$gp1_1 = "selected ";}else{$gp1_1 = "";}
if (isset($gp1) && $gp1 == "année") {$gp1_2 = "selected ";}else{$gp1_2 = "";}
if (isset($gp1) && $gp1 == "titre") {$gp1_3 = "selected ";}else{$gp1_3 = "";}
if (isset($gp1) && $gp1 == "revue") {$gp1_4 = "selected ";}else{$gp1_4 = "";}
if (isset($gp1) && $gp1 == "volume") {$gp1_5 = "selected ";}else{$gp1_5 = "";}
if (isset($gp1) && $gp1 == "numéro") {$gp1_6 = "selected ";}else{$gp1_6 = "";}
if (isset($gp1) && $gp1 == "pages") {$gp1_7 = "selected ";}else{$gp1_7 = "";}
?>
    <td width="100px">
      <select id="gp1" class="form-control" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="gp1" onChange="mise_en_ordre('1'); majapercu();">
      <option <?php echo $gp1_0;?>value="- -">- -</option>
      <option <?php echo $gp1_1;?>value="auteurs">Auteurs</option>
      <option <?php echo $gp1_2;?>value="année">Année</option>
      <option <?php echo $gp1_3;?>value="titre">Titre</option>
      <option <?php echo $gp1_4;?>value="revue">Revue</option>
      <option <?php echo $gp1_5;?>value="volume">Volume</option>
      <option <?php echo $gp1_6;?>value="numéro">Numéro</option>
      <option <?php echo $gp1_7;?>value="pages">Pages</option>
      </select>
    </td>
<?php
if (isset($sep1) && $sep1 == "- -" || !isset($team)) {$sep1_0 = "selected ";}else{$sep1_0 = "";}
if (isset($sep1) && $sep1 == " ") {$sep1_1 = "selected ";}else{$sep1_1 = "";}
if (isset($sep1) && $sep1 == ", ") {$sep1_2 = "selected ";}else{$sep1_2 = "";}
if (isset($sep1) && $sep1 == ". ") {$sep1_3 = "selected ";}else{$sep1_3 = "";}
if (isset($sep1) && $sep1 == "; ") {$sep1_4 = "selected ";}else{$sep1_4 = "";}
if (isset($sep1) && $sep1 == " - ") {$sep1_5 = "selected ";}else{$sep1_5 = "";}
if (isset($sep1) && $sep1 == "auc") {$sep1_6 = "selected ";}else{$sep1_6 = "";}
if (isset($sep1) && $sep1 == ": ") {$sep1_7 = "selected ";}else{$sep1_7 = "";}
?>
    <td width="100px">
      <select id="sep1" class="form-control" style="width: 45px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="sep1" onChange="majapercu();">
      <option <?php echo $sep1_0;?>value="- -" >- -</option>
      <option <?php echo $sep1_1;?>value=" ">_</option>
      <option <?php echo $sep1_2;?>value=", ">,_</option>
      <option <?php echo $sep1_3;?>value=". ">._</option>
      <option <?php echo $sep1_4;?>value="; ">;_</option>
      <option <?php echo $sep1_5;?>value=" - ">_-_</option>
      <option <?php echo $sep1_6;?>value="">auc</option>
      <option <?php echo $sep1_7;?>value=": ">:_</option>
      </select>
    </td>
<?php
if (isset($gp2) && $gp2 == "- -" || !isset($team)) {$gp2_0 = "selected ";}else{$gp2_0 = "";}
if (isset($gp2) && $gp2 == "auteurs") {$gp2_1 = "selected ";}else{$gp2_1 = "";}
if (isset($gp2) && $gp2 == "année") {$gp2_2 = "selected ";}else{$gp2_2 = "";}
if (isset($gp2) && $gp2 == "titre") {$gp2_3 = "selected ";}else{$gp2_3 = "";}
if (isset($gp2) && $gp2 == "revue") {$gp2_4 = "selected ";}else{$gp2_4 = "";}
if (isset($gp2) && $gp2 == "volume") {$gp2_5 = "selected ";}else{$gp2_5 = "";}
if (isset($gp2) && $gp2 == "numéro") {$gp2_6 = "selected ";}else{$gp2_6 = "";}
if (isset($gp2) && $gp2 == "pages") {$gp2_7 = "selected ";}else{$gp2_7 = "";}
?>
    <td width="100px">
      <select id="gp2" class="form-control" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="gp2" onChange="mise_en_ordre('2'); majapercu();">
      <option <?php echo $gp2_0;?>value="- -">- -</option>
      <option <?php echo $gp2_1;?>value="auteurs">Auteurs</option>
      <option <?php echo $gp2_2;?>value="année">Année</option>
      <option <?php echo $gp2_3;?>value="titre">Titre</option>
      <option <?php echo $gp2_4;?>value="revue">Revue</option>
      <option <?php echo $gp2_5;?>value="volume">Volume</option>
      <option <?php echo $gp2_6;?>value="numéro">Numéro</option>
      <option <?php echo $gp2_7;?>value="pages">Pages</option>
      </select>
    </td>
<?php
if (isset($sep2) && $sep2 == "- -" || !isset($team)) {$sep2_0 = "selected ";}else{$sep2_0 = "";}
if (isset($sep2) && $sep2 == " ") {$sep2_1 = "selected ";}else{$sep2_1 = "";}
if (isset($sep2) && $sep2 == ", ") {$sep2_2 = "selected ";}else{$sep2_2 = "";}
if (isset($sep2) && $sep2 == ". ") {$sep2_3 = "selected ";}else{$sep2_3 = "";}
if (isset($sep2) && $sep2 == "; ") {$sep2_4 = "selected ";}else{$sep2_4 = "";}
if (isset($sep2) && $sep2 == " - ") {$sep2_5 = "selected ";}else{$sep2_5 = "";}
if (isset($sep2) && $sep2 == "auc") {$sep2_6 = "selected ";}else{$sep2_6 = "";}
if (isset($sep2) && $sep2 == ": ") {$sep2_7 = "selected ";}else{$sep2_7 = "";}
?>
    <td width="100px">
      <select id="sep2" class="form-control" style="width: 45px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="sep2" onChange="majapercu();">
      <option <?php echo $sep2_0;?>value="- -">- -</option>
      <option <?php echo $sep2_1;?>value=" ">_</option>
      <option <?php echo $sep2_2;?>value=", ">,_</option>
      <option <?php echo $sep2_3;?>value=". ">._</option>
      <option <?php echo $sep2_4;?>value="; ">;_</option>
      <option <?php echo $sep2_5;?>value=" - ">_-_</option>
      <option <?php echo $sep2_6;?>value="">auc</option>
      <option <?php echo $sep2_7;?>value=": ">:_</option>
      </select>
    </td>
<?php
if (isset($gp3) && $gp3 == "- -" || !isset($team)) {$gp3_0 = "selected ";}else{$gp3_0 = "";}
if (isset($gp3) && $gp3 == "auteurs") {$gp3_1 = "selected ";}else{$gp3_1 = "";}
if (isset($gp3) && $gp3 == "année") {$gp3_2 = "selected ";}else{$gp3_2 = "";}
if (isset($gp3) && $gp3 == "titre") {$gp3_3 = "selected ";}else{$gp3_3 = "";}
if (isset($gp3) && $gp3 == "revue") {$gp3_4 = "selected ";}else{$gp3_4 = "";}
if (isset($gp3) && $gp3 == "volume") {$gp3_5 = "selected ";}else{$gp3_5 = "";}
if (isset($gp3) && $gp3 == "numéro") {$gp3_6 = "selected ";}else{$gp3_6 = "";}
if (isset($gp3) && $gp3 == "pages") {$gp3_7 = "selected ";}else{$gp3_7 = "";}
?>
    <td width="100px">
      <select id="gp3" class="form-control" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="gp3" onChange="mise_en_ordre('3'); majapercu();">
      <option <?php echo $gp3_0;?>value="- -">- -</option>
      <option <?php echo $gp3_1;?>value="auteurs">Auteurs</option>
      <option <?php echo $gp3_2;?>value="année">Année</option>
      <option <?php echo $gp3_3;?>value="titre">Titre</option>
      <option <?php echo $gp3_4;?>value="revue">Revue</option>
      <option <?php echo $gp3_5;?>value="volume">Volume</option>
      <option <?php echo $gp3_6;?>value="numéro">Numéro</option>
      <option <?php echo $gp3_7;?>value="pages">Pages</option>
      </select>
    </td>
<?php
if (isset($sep3) && $sep3 == "- -" || !isset($team)) {$sep3_0 = "selected ";}else{$sep3_0 = "";}
if (isset($sep3) && $sep3 == " ") {$sep3_1 = "selected ";}else{$sep3_1 = "";}
if (isset($sep3) && $sep3 == ", ") {$sep3_2 = "selected ";}else{$sep3_2 = "";}
if (isset($sep3) && $sep3 == ". ") {$sep3_3 = "selected ";}else{$sep3_3 = "";}
if (isset($sep3) && $sep3 == "; ") {$sep3_4 = "selected ";}else{$sep3_4 = "";}
if (isset($sep3) && $sep3 == " - ") {$sep3_5 = "selected ";}else{$sep3_5 = "";}
if (isset($sep3) && $sep3 == "auc") {$sep3_6 = "selected ";}else{$sep3_6 = "";}
if (isset($sep3) && $sep3 == ": ") {$sep3_7 = "selected ";}else{$sep3_7 = "";}
?>
    <td width="100px">
      <select id="sep3" class="form-control" style="width: 45px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="sep3" onChange="majapercu();">
      <option <?php echo $sep3_0;?>value="- -">- -</option>
      <option <?php echo $sep3_1;?>value=" ">_</option>
      <option <?php echo $sep3_2;?>value=", ">,_</option>
      <option <?php echo $sep3_3;?>value=". ">._</option>
      <option <?php echo $sep3_4;?>value="; ">;_</option>
      <option <?php echo $sep3_5;?>value=" - ">_-_</option>
      <option <?php echo $sep3_6;?>value="">auc</option>
      <option <?php echo $sep3_7;?>value=": ">:_</option>
      </select>
    </td>
<?php
if (isset($gp4) && $gp4 == "- -" || !isset($team)) {$gp4_0 = "selected ";}else{$gp4_0 = "";}
if (isset($gp4) && $gp4 == "auteurs") {$gp4_1 = "selected ";}else{$gp4_1 = "";}
if (isset($gp4) && $gp4 == "année") {$gp4_2 = "selected ";}else{$gp4_2 = "";}
if (isset($gp4) && $gp4 == "titre") {$gp4_3 = "selected ";}else{$gp4_3 = "";}
if (isset($gp4) && $gp4 == "revue") {$gp4_4 = "selected ";}else{$gp4_4 = "";}
if (isset($gp4) && $gp4 == "volume") {$gp4_5 = "selected ";}else{$gp4_5 = "";}
if (isset($gp4) && $gp4 == "numéro") {$gp4_6 = "selected ";}else{$gp4_6 = "";}
if (isset($gp4) && $gp4 == "pages") {$gp4_7 = "selected ";}else{$gp4_7 = "";}
?>
    <td width="100px">
      <select id="gp4" class="form-control" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="gp4" onChange="mise_en_ordre('4'); majapercu();">
      <option <?php echo $gp4_0;?>value="- -">- -</option>
      <option <?php echo $gp4_1;?>value="auteurs">Auteurs</option>
      <option <?php echo $gp4_2;?>value="année">Année</option>
      <option <?php echo $gp4_3;?>value="titre">Titre</option>
      <option <?php echo $gp4_4;?>value="revue">Revue</option>
      <option <?php echo $gp4_5;?>value="volume">Volume</option>
      <option <?php echo $gp4_6;?>value="numéro">Numéro</option>
      <option <?php echo $gp4_7;?>value="pages">Pages</option>
      </select>
    </td>
<?php
if (isset($sep4) && $sep4 == "- -" || !isset($team)) {$sep4_0 = "selected ";}else{$sep4_0 = "";}
if (isset($sep4) && $sep4 == " ") {$sep4_1 = "selected ";}else{$sep4_1 = "";}
if (isset($sep4) && $sep4 == ", ") {$sep4_2 = "selected ";}else{$sep4_2 = "";}
if (isset($sep4) && $sep4 == ". ") {$sep4_3 = "selected ";}else{$sep4_3 = "";}
if (isset($sep4) && $sep4 == "; ") {$sep4_4 = "selected ";}else{$sep4_4 = "";}
if (isset($sep4) && $sep4 == " - ") {$sep4_5 = "selected ";}else{$sep4_5 = "";}
if (isset($sep4) && $sep4 == "auc") {$sep4_6 = "selected ";}else{$sep4_6 = "";}
if (isset($sep4) && $sep4 == ": ") {$sep4_7 = "selected ";}else{$sep4_7 = "";}
?>
    <td width="100px">
      <select id="sep4" class="form-control" style="width: 45px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="sep4" onChange="majapercu();">
      <option <?php echo $sep4_0;?>value="- -">- -</option>
      <option <?php echo $sep4_1;?>value=" ">_</option>
      <option <?php echo $sep4_2;?>value=", ">,_</option>
      <option <?php echo $sep4_3;?>value=". ">._</option>
      <option <?php echo $sep4_4;?>value="; ">;_</option>
      <option <?php echo $sep4_5;?>value=" - ">_-_</option>
      <option <?php echo $sep4_6;?>value="">auc</option>
      <option <?php echo $sep4_7;?>value=": ">:_</option>
      </select>
    </td>
<?php
if (isset($gp5) && $gp5 == "- -" || !isset($team)) {$gp5_0 = "selected ";}else{$gp5_0 = "";}
if (isset($gp5) && $gp5 == "auteurs") {$gp5_1 = "selected ";}else{$gp5_1 = "";}
if (isset($gp5) && $gp5 == "année") {$gp5_2 = "selected ";}else{$gp5_2 = "";}
if (isset($gp5) && $gp5 == "titre") {$gp5_3 = "selected ";}else{$gp5_3 = "";}
if (isset($gp5) && $gp5 == "revue") {$gp5_4 = "selected ";}else{$gp5_4 = "";}
if (isset($gp5) && $gp5 == "volume") {$gp5_5 = "selected ";}else{$gp5_5 = "";}
if (isset($gp5) && $gp5 == "numéro") {$gp5_6 = "selected ";}else{$gp5_6 = "";}
if (isset($gp5) && $gp5 == "pages") {$gp5_7 = "selected ";}else{$gp5_7 = "";}
?>
    <td width="100px">
      <select id="gp5" class="form-control" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="gp5" onChange="mise_en_ordre('5'); majapercu();">
      <option <?php echo $gp5_0;?>value="- -">- -</option>
      <option <?php echo $gp5_1;?>value="auteurs">Auteurs</option>
      <option <?php echo $gp5_2;?>value="année">Année</option>
      <option <?php echo $gp5_3;?>value="titre">Titre</option>
      <option <?php echo $gp5_4;?>value="revue">Revue</option>
      <option <?php echo $gp5_5;?>value="volume">Volume</option>
      <option <?php echo $gp5_6;?>value="numéro">Numéro</option>
      <option <?php echo $gp5_7;?>value="pages">Pages</option>
      </select>
    </td>
    <?php
    if (isset($sep5) && $sep5 == "- -" || !isset($team)) {$sep5_0 = "selected ";}else{$sep5_0 = "";}
    if (isset($sep5) && $sep5 == " ") {$sep5_1 = "selected ";}else{$sep5_1 = "";}
    if (isset($sep5) && $sep5 == ", ") {$sep5_2 = "selected ";}else{$sep5_2 = "";}
    if (isset($sep5) && $sep5 == ". ") {$sep5_3 = "selected ";}else{$sep5_3 = "";}
    if (isset($sep5) && $sep5 == "; ") {$sep5_4 = "selected ";}else{$sep5_4 = "";}
    if (isset($sep5) && $sep5 == " - ") {$sep5_5 = "selected ";}else{$sep5_5 = "";}
    if (isset($sep5) && $sep5 == "auc") {$sep5_6 = "selected ";}else{$sep5_6 = "";}
    if (isset($sep5) && $sep5 == ": ") {$sep5_7 = "selected ";}else{$sep5_7 = "";}
    ?>
    <td>
      <select id="sep5" class="form-control" style="width: 45px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="sep5"  onChange="majapercu();">
      <option <?php echo $sep5_0;?>value="- -">- -</option>
      <option <?php echo $sep5_1;?>value=" ">_</option>
      <option <?php echo $sep5_2;?>value=", ">,_</option>
      <option <?php echo $sep5_3;?>value=". ">._</option>
      <option <?php echo $sep5_4;?>value="; ">;_</option>
      <option <?php echo $sep5_5;?>value=" - ">_-_</option>
      <option <?php echo $sep5_6;?>value="">auc</option>
      <option <?php echo $sep5_7;?>value=": ">:_</option>
      </select>
    </td>
    <?php
    if (isset($gp6) && $gp6 == "- -" || !isset($team)) {$gp6_0 = "selected ";}else{$gp6_0 = "";}
    if (isset($gp6) && $gp6 == "auteurs") {$gp6_1 = "selected ";}else{$gp6_1 = "";}
    if (isset($gp6) && $gp6 == "année") {$gp6_2 = "selected ";}else{$gp6_2 = "";}
    if (isset($gp6) && $gp6 == "titre") {$gp6_3 = "selected ";}else{$gp6_3 = "";}
    if (isset($gp6) && $gp6 == "revue") {$gp6_4 = "selected ";}else{$gp6_4 = "";}
    if (isset($gp6) && $gp6 == "volume") {$gp6_5 = "selected ";}else{$gp6_5 = "";}
    if (isset($gp6) && $gp6 == "numéro") {$gp6_6 = "selected ";}else{$gp6_6 = "";}
    if (isset($gp6) && $gp6 == "pages") {$gp6_7 = "selected ";}else{$gp6_7 = "";}
    ?>
        <td width="100px">
          <select id="gp6" class="form-control" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="gp6" onChange="mise_en_ordre('6'); majapercu();">
          <option <?php echo $gp6_0;?>value="- -">- -</option>
          <option <?php echo $gp6_1;?>value="auteurs">Auteurs</option>
          <option <?php echo $gp6_2;?>value="année">Année</option>
          <option <?php echo $gp6_3;?>value="titre">Titre</option>
          <option <?php echo $gp6_4;?>value="revue">Revue</option>
          <option <?php echo $gp6_5;?>value="volume">Volume</option>
          <option <?php echo $gp6_6;?>value="numéro">Numéro</option>
          <option <?php echo $gp6_7;?>value="pages">Pages</option>
          </select>
        </td>
    <?php
    if (isset($sep6) && $sep6 == "- -" || !isset($team)) {$sep6_0 = "selected ";}else{$sep6_0 = "";}
    if (isset($sep6) && $sep6 == " ") {$sep6_1 = "selected ";}else{$sep6_1 = "";}
    if (isset($sep6) && $sep6 == ", ") {$sep6_2 = "selected ";}else{$sep6_2 = "";}
    if (isset($sep6) && $sep6 == ". ") {$sep6_3 = "selected ";}else{$sep6_3 = "";}
    if (isset($sep6) && $sep6 == "; ") {$sep6_4 = "selected ";}else{$sep6_4 = "";}
    if (isset($sep6) && $sep6 == " - ") {$sep6_5 = "selected ";}else{$sep6_5 = "";}
    if (isset($sep6) && $sep6 == "auc") {$sep6_6 = "selected ";}else{$sep6_6 = "";}
    if (isset($sep6) && $sep6 == ": ") {$sep6_7 = "selected ";}else{$sep6_7 = "";}
    ?>
        <td>
          <select id="sep6" class="form-control" style="width: 45px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="sep6"  onChange="majapercu();">
          <option <?php echo $sep6_0;?>value="- -">- -</option>
          <option <?php echo $sep6_1;?>value=" ">_</option>
          <option <?php echo $sep6_2;?>value=", ">,_</option>
          <option <?php echo $sep6_3;?>value=". ">._</option>
          <option <?php echo $sep6_4;?>value="; ">;_</option>
          <option <?php echo $sep6_5;?>value=" - ">_-_</option>
          <option <?php echo $sep6_6;?>value="">auc</option>
          <option <?php echo $sep6_7;?>value=": ">:_</option>
          </select>
        </td>
    <?php
    if (isset($gp7) && $gp7 == "- -" || !isset($team)) {$gp7_0 = "selected ";}else{$gp7_0 = "";}
    if (isset($gp7) && $gp7 == "auteurs") {$gp7_1 = "selected ";}else{$gp7_1 = "";}
    if (isset($gp7) && $gp7 == "année") {$gp7_2 = "selected ";}else{$gp7_2 = "";}
    if (isset($gp7) && $gp7 == "titre") {$gp7_3 = "selected ";}else{$gp7_3 = "";}
    if (isset($gp7) && $gp7 == "revue") {$gp7_4 = "selected ";}else{$gp7_4 = "";}
    if (isset($gp7) && $gp7 == "volume") {$gp7_5 = "selected ";}else{$gp7_5 = "";}
    if (isset($gp7) && $gp7 == "numéro") {$gp7_6 = "selected ";}else{$gp7_6 = "";}
    if (isset($gp7) && $gp7 == "pages") {$gp7_7 = "selected ";}else{$gp7_7 = "";}
    ?>
        <td width="100px">
          <select id="gp7" class="form-control" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="gp7" onChange="mise_en_ordre('7'); majapercu();">
          <option <?php echo $gp7_0;?>value="- -">- -</option>
          <option <?php echo $gp7_1;?>value="auteurs">Auteurs</option>
          <option <?php echo $gp7_2;?>value="année">Année</option>
          <option <?php echo $gp7_3;?>value="titre">Titre</option>
          <option <?php echo $gp7_4;?>value="revue">Revue</option>
          <option <?php echo $gp7_5;?>value="volume">Volume</option>
          <option <?php echo $gp7_6;?>value="numéro">Numéro</option>
          <option <?php echo $gp7_7;?>value="pages">Pages</option>
          </select>
        </td>
    <?php
    if (isset($sep7) && $sep7 == "- -" || !isset($team)) {$sep7_0 = "selected ";}else{$sep7_0 = "";}
    if (isset($sep7) && $sep7 == " ") {$sep7_1 = "selected ";}else{$sep7_1 = "";}
    if (isset($sep7) && $sep7 == ", ") {$sep7_2 = "selected ";}else{$sep7_2 = "";}
    if (isset($sep7) && $sep7 == ". ") {$sep7_3 = "selected ";}else{$sep7_3 = "";}
    if (isset($sep7) && $sep7 == "; ") {$sep7_4 = "selected ";}else{$sep7_4 = "";}
    if (isset($sep7) && $sep7 == " - ") {$sep7_5 = "selected ";}else{$sep7_5 = "";}
    if (isset($sep7) && $sep7 == "auc") {$sep7_6 = "selected ";}else{$sep7_6 = "";}
    if (isset($sep7) && $sep7 == ": ") {$sep7_7 = "selected ";}else{$sep7_7 = "";}
    ?>
        <td>
          <select id="sep7" class="form-control" style="width: 45px; height: 16px; font-size: 80%; padding: 0px;" size="1" name="sep7" onChange="majapercu();">
          <option <?php echo $sep7_0;?>value="- -">- -</option>
          <option <?php echo $sep7_1;?>value=" ">_</option>
          <option <?php echo $sep7_2;?>value=", ">,_</option>
          <option <?php echo $sep7_3;?>value=". ">._</option>
          <option <?php echo $sep7_4;?>value="; ">;_</option>
          <option <?php echo $sep7_5;?>value=" - ">_-_</option>
          <option <?php echo $sep7_6;?>value="">auc</option>
          <option <?php echo $sep7_7;?>value=": ">:_</option>
          </select>
        </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
<?php
if (isset($choix_mp1) && strpos($choix_mp1, "~- -~") !== false || !isset($team)) {$mp1v = "selected ";}else{$mp1v = "";}
if (isset($choix_mp1) && strpos($choix_mp1, "~norm~") !== false) {$mp1n = "selected ";}else{$mp1n = "";}
if (isset($choix_mp1) && strpos($choix_mp1, "~gras~") !== false) {$mp1g = "selected ";}else{$mp1g = "";}
if (isset($choix_mp1) && strpos($choix_mp1, "~soul~") !== false) {$mp1s = "selected ";}else{$mp1s = "";}
if (isset($choix_mp1) && strpos($choix_mp1, "~ital~") !== false) {$mp1i = "selected ";}else{$mp1i = "";}
if (isset($choix_mp1) && strpos($choix_mp1, "~epar~") !== false) {$mp1e = "selected ";}else{$mp1e = "";}
if (isset($choix_mp1) && strpos($choix_mp1, "~ecro~") !== false) {$mp1c = "selected ";}else{$mp1c = "";}
if (isset($choix_mp1) && strpos($choix_mp1, "~egui~") !== false) {$mp1u = "selected ";}else{$mp1u = "";}
if (isset($choix_mp1) && strpos($choix_mp1, "~emin~") !== false) {$mp1m = "selected ";}else{$mp1m = "";}
if (isset($choix_mp1) && strpos($choix_mp1, "~emaj~") !== false) {$mp1a = "selected ";}else{$mp1a = "";}
if (isset($choix_mp1) && strpos($choix_mp1, "~effa~") !== false) {$mp1f = "selected ";}else{$mp1f = "";}
?>
    <td>
      <select id="mp1" class="form-control" style="width: 75px; font-size: 80%;" size="11" name="mp1[]" multiple>
      <option <?php echo $mp1v;?>value="- -" onClick="majapercu();">- -</option>
      <option <?php echo $mp1n;?>value="norm" onClick="majapercu();">Normal</option>
      <option <?php echo $mp1g;?>value="gras" onClick="majapercu();">Gras</option>
      <option <?php echo $mp1s;?>value="soul" onClick="majapercu();">Souligné</option>
      <option <?php echo $mp1i;?>value="ital" onClick="majapercu();">Italique</option>
      <option <?php echo $mp1e;?>value="epar" onClick="majapercu();">Entre ( )</option>
      <option <?php echo $mp1c;?>value="ecro" onClick="majapercu();">Entre [ ]</option>
      <option <?php echo $mp1u;?>value="egui" onClick="majapercu();">Entre " "</option>
      <option <?php echo $mp1m;?>value="emin" onClick="majapercu();">Minuscules</option>
      <option <?php echo $mp1a;?>value="emaj" onClick="majapercu();">Majuscules</option>
      <option <?php echo $mp1f;?>value="effa" onClick="majapercu();">Effacé</option>
      </select>
    </td>
    <td>&nbsp;</td>
<?php
if (isset($choix_mp2) && strpos($choix_mp2, "~- -~") !== false || !isset($team)) {$mp2v = "selected ";}else{$mp2v = "";}
if (isset($choix_mp2) && strpos($choix_mp2, "~norm~") !== false) {$mp2n = "selected ";}else{$mp2n = "";}
if (isset($choix_mp2) && strpos($choix_mp2, "~gras~") !== false) {$mp2g = "selected ";}else{$mp2g = "";}
if (isset($choix_mp2) && strpos($choix_mp2, "~soul~") !== false) {$mp2s = "selected ";}else{$mp2s = "";}
if (isset($choix_mp2) && strpos($choix_mp2, "~ital~") !== false) {$mp2i = "selected ";}else{$mp2i = "";}
if (isset($choix_mp2) && strpos($choix_mp2, "~epar~") !== false) {$mp2e = "selected ";}else{$mp2e = "";}
if (isset($choix_mp2) && strpos($choix_mp2, "~ecro~") !== false) {$mp2c = "selected ";}else{$mp2c = "";}
if (isset($choix_mp2) && strpos($choix_mp2, "~egui~") !== false) {$mp2u = "selected ";}else{$mp2u = "";}
if (isset($choix_mp2) && strpos($choix_mp2, "~emin~") !== false) {$mp2m = "selected ";}else{$mp2m = "";}
if (isset($choix_mp2) && strpos($choix_mp2, "~emaj~") !== false) {$mp2a = "selected ";}else{$mp2a = "";}
if (isset($choix_mp2) && strpos($choix_mp2, "~effa~") !== false) {$mp2f = "selected ";}else{$mp2f = "";}
?>
    <td>
      <select id="mp2" class="form-control" style="width: 75px; font-size: 80%;" size="11" name="mp2[]" multiple style="font-size: 80%">
      <option <?php echo $mp2v;?>value="- -" onClick="majapercu();">- -</option>
      <option <?php echo $mp2n;?>value="norm" onClick="majapercu();">Normal</option>
      <option <?php echo $mp2g;?>value="gras" onClick="majapercu();">Gras</option>
      <option <?php echo $mp2s;?>value="soul" onClick="majapercu();">Souligné</option>
      <option <?php echo $mp2i;?>value="ital" onClick="majapercu();">Italique</option>
      <option <?php echo $mp2e;?>value="epar" onClick="majapercu();">Entre ( )</option>
      <option <?php echo $mp2c;?>value="ecro" onClick="majapercu();">Entre [ ]</option>
      <option <?php echo $mp2u;?>value="egui" onClick="majapercu();">Entre " "</option>
      <option <?php echo $mp2m;?>value="emin" onClick="majapercu();">Minuscules</option>
      <option <?php echo $mp2a;?>value="emaj" onClick="majapercu();">Majuscules</option>
      <option <?php echo $mp2f;?>value="effa" onClick="majapercu();">Effacé</option>
      </select>
    </td>
    <td>&nbsp;</td>
<?php
if (isset($choix_mp3) && strpos($choix_mp3, "~- -~") !== false || !isset($team)) {$mp3v = "selected ";}else{$mp3v = "";}
if (isset($choix_mp3) && strpos($choix_mp3, "~norm~") !== false) {$mp3n = "selected ";}else{$mp3n = "";}
if (isset($choix_mp3) && strpos($choix_mp3, "~gras~") !== false) {$mp3g = "selected ";}else{$mp3g = "";}
if (isset($choix_mp3) && strpos($choix_mp3, "~soul~") !== false) {$mp3s = "selected ";}else{$mp3s = "";}
if (isset($choix_mp3) && strpos($choix_mp3, "~ital~") !== false) {$mp3i = "selected ";}else{$mp3i = "";}
if (isset($choix_mp3) && strpos($choix_mp3, "~epar~") !== false) {$mp3e = "selected ";}else{$mp3e = "";}
if (isset($choix_mp3) && strpos($choix_mp3, "~ecro~") !== false) {$mp3c = "selected ";}else{$mp3c = "";}
if (isset($choix_mp3) && strpos($choix_mp3, "~egui~") !== false) {$mp3u = "selected ";}else{$mp3u = "";}
if (isset($choix_mp3) && strpos($choix_mp3, "~emin~") !== false) {$mp3m = "selected ";}else{$mp3m = "";}
if (isset($choix_mp3) && strpos($choix_mp3, "~emaj~") !== false) {$mp3a = "selected ";}else{$mp3a = "";}
if (isset($choix_mp3) && strpos($choix_mp3, "~effa~") !== false) {$mp3f = "selected ";}else{$mp3f = "";}
?>
    <td>
      <select id="mp3" class="form-control" style="width: 75px; font-size: 80%;" size="11" name="mp3[]" multiple style="font-size: 80%">
      <option <?php echo $mp3v;?>value="- -" onClick="majapercu();">- -</option>
      <option <?php echo $mp3n;?>value="norm" onClick="majapercu();">Normal</option>
      <option <?php echo $mp3g;?>value="gras" onClick="majapercu();">Gras</option>
      <option <?php echo $mp3s;?>value="soul" onClick="majapercu();">Souligné</option>
      <option <?php echo $mp3i;?>value="ital" onClick="majapercu();">Italique</option>
      <option <?php echo $mp3e;?>value="epar" onClick="majapercu();">Entre ( )</option>
      <option <?php echo $mp3c;?>value="ecro" onClick="majapercu();">Entre [ ]</option>
      <option <?php echo $mp3u;?>value="egui" onClick="majapercu();">Entre " "</option>
      <option <?php echo $mp3m;?>value="emin" onClick="majapercu();">Minuscules</option>
      <option <?php echo $mp3a;?>value="emaj" onClick="majapercu();">Majuscules</option>
      <option <?php echo $mp3f;?>value="effa" onClick="majapercu();">Effacé</option>
      </select>
    </td>
    <td>&nbsp;</td>
<?php
if (isset($choix_mp4) && strpos($choix_mp4, "~- -~") !== false || !isset($team)) {$mp4v = "selected ";}else{$mp4v = "";}
if (isset($choix_mp4) && strpos($choix_mp4, "~norm~") !== false) {$mp4n = "selected ";}else{$mp4n = "";}
if (isset($choix_mp4) && strpos($choix_mp4, "~gras~") !== false) {$mp4g = "selected ";}else{$mp4g = "";}
if (isset($choix_mp4) && strpos($choix_mp4, "~soul~") !== false) {$mp4s = "selected ";}else{$mp4s = "";}
if (isset($choix_mp4) && strpos($choix_mp4, "~ital~") !== false) {$mp4i = "selected ";}else{$mp4i = "";}
if (isset($choix_mp4) && strpos($choix_mp4, "~epar~") !== false) {$mp4e = "selected ";}else{$mp4e = "";}
if (isset($choix_mp4) && strpos($choix_mp4, "~ecro~") !== false) {$mp4c = "selected ";}else{$mp4c = "";}
if (isset($choix_mp4) && strpos($choix_mp4, "~egui~") !== false) {$mp4u = "selected ";}else{$mp4u = "";}
if (isset($choix_mp4) && strpos($choix_mp4, "~emin~") !== false) {$mp4m = "selected ";}else{$mp4m = "";}
if (isset($choix_mp4) && strpos($choix_mp4, "~emaj~") !== false) {$mp4a = "selected ";}else{$mp4a = "";}
if (isset($choix_mp4) && strpos($choix_mp4, "~effa~") !== false) {$mp4f = "selected ";}else{$mp4f = "";}
?>
    <td>
      <select id="mp4" class="form-control" style="width: 75px; font-size: 80%;" size="11" name="mp4[]" multiple style="font-size: 80%">
      <option <?php echo $mp4v;?>value="- -" onClick="majapercu();">- -</option>
      <option <?php echo $mp4n;?>value="norm" onClick="majapercu();">Normal</option>
      <option <?php echo $mp4g;?>value="gras" onClick="majapercu();">Gras</option>
      <option <?php echo $mp4s;?>value="soul" onClick="majapercu();">Souligné</option>
      <option <?php echo $mp4i;?>value="ital" onClick="majapercu();">Italique</option>
      <option <?php echo $mp4e;?>value="epar" onClick="majapercu();">Entre ( )</option>
      <option <?php echo $mp4c;?>value="ecro" onClick="majapercu();">Entre [ ]</option>
      <option <?php echo $mp4u;?>value="egui" onClick="majapercu();">Entre " "</option>
      <option <?php echo $mp4m;?>value="emin" onClick="majapercu();">Minuscules</option>
      <option <?php echo $mp4a;?>value="emaj" onClick="majapercu();">Majuscules</option>
      <option <?php echo $mp4f;?>value="effa" onClick="majapercu();">Effacé</option>
      </select>
    </td>
    <td>&nbsp;</td>
<?php
if (isset($choix_mp5) && strpos($choix_mp5, "~- -~") !== false || !isset($team)) {$mp5v = "selected ";}else{$mp5v = "";}
if (isset($choix_mp5) && strpos($choix_mp5, "~norm~") !== false) {$mp5n = "selected ";}else{$mp5n = "";}
if (isset($choix_mp5) && strpos($choix_mp5, "~gras~") !== false) {$mp5g = "selected ";}else{$mp5g = "";}
if (isset($choix_mp5) && strpos($choix_mp5, "~soul~") !== false) {$mp5s = "selected ";}else{$mp5s = "";}
if (isset($choix_mp5) && strpos($choix_mp5, "~ital~") !== false) {$mp5i = "selected ";}else{$mp5i = "";}
if (isset($choix_mp5) && strpos($choix_mp5, "~epar~") !== false) {$mp5e = "selected ";}else{$mp5e = "";}
if (isset($choix_mp5) && strpos($choix_mp5, "~ecro~") !== false) {$mp5c = "selected ";}else{$mp5c = "";}
if (isset($choix_mp5) && strpos($choix_mp5, "~egui~") !== false) {$mp5u = "selected ";}else{$mp5u = "";}
if (isset($choix_mp5) && strpos($choix_mp5, "~emin~") !== false) {$mp5m = "selected ";}else{$mp5m = "";}
if (isset($choix_mp5) && strpos($choix_mp5, "~emaj~") !== false) {$mp5a = "selected ";}else{$mp5a = "";}
if (isset($choix_mp5) && strpos($choix_mp5, "~effa~") !== false) {$mp5f = "selected ";}else{$mp5f = "";}
?>
    <td>
      <select id="mp5" class="form-control" style="width: 75px; font-size: 80%;" size="11" name="mp5[]" multiple style="font-size: 80%">
      <option <?php echo $mp5v;?>value="- -" onClick="majapercu();">- -</option>
      <option <?php echo $mp5n;?>value="norm" onClick="majapercu();">Normal</option>
      <option <?php echo $mp5g;?>value="gras" onClick="majapercu();">Gras</option>
      <option <?php echo $mp5s;?>value="soul" onClick="majapercu();">Souligné</option>
      <option <?php echo $mp5i;?>value="ital" onClick="majapercu();">Italique</option>
      <option <?php echo $mp5e;?>value="epar" onClick="majapercu();">Entre ( )</option>
      <option <?php echo $mp5c;?>value="ecro" onClick="majapercu();">Entre [ ]</option>
      <option <?php echo $mp5u;?>value="egui" onClick="majapercu();">Entre " "</option>
      <option <?php echo $mp5m;?>value="emin" onClick="majapercu();">Minuscules</option>
      <option <?php echo $mp5a;?>value="emaj" onClick="majapercu();">Majuscules</option>
      <option <?php echo $mp5f;?>value="effa" onClick="majapercu();">Effacé</option>
      </select>
    </td>
    <td>&nbsp;</td>
<?php
if (isset($choix_mp6) && strpos($choix_mp6, "~- -~") !== false || !isset($team)) {$mp6v = "selected ";}else{$mp6v = "";}
if (isset($choix_mp6) && strpos($choix_mp6, "~norm~") !== false) {$mp6n = "selected ";}else{$mp6n = "";}
if (isset($choix_mp6) && strpos($choix_mp6, "~gras~") !== false) {$mp6g = "selected ";}else{$mp6g = "";}
if (isset($choix_mp6) && strpos($choix_mp6, "~soul~") !== false) {$mp6s = "selected ";}else{$mp6s = "";}
if (isset($choix_mp6) && strpos($choix_mp6, "~ital~") !== false) {$mp6i = "selected ";}else{$mp6i = "";}
if (isset($choix_mp6) && strpos($choix_mp6, "~epar~") !== false) {$mp6e = "selected ";}else{$mp6e = "";}
if (isset($choix_mp6) && strpos($choix_mp6, "~ecro~") !== false) {$mp6c = "selected ";}else{$mp6c = "";}
if (isset($choix_mp6) && strpos($choix_mp6, "~egui~") !== false) {$mp6u = "selected ";}else{$mp6u = "";}
if (isset($choix_mp6) && strpos($choix_mp6, "~emin~") !== false) {$mp6m = "selected ";}else{$mp6m = "";}
if (isset($choix_mp6) && strpos($choix_mp6, "~emaj~") !== false) {$mp6a = "selected ";}else{$mp6a = "";}
if (isset($choix_mp6) && strpos($choix_mp6, "~effa~") !== false) {$mp6f = "selected ";}else{$mp6f = "";}
?>
    <td>
      <select id="mp6" class="form-control" style="width: 75px; font-size: 80%;" size="11" name="mp6[]" multiple style="font-size: 80%">
      <option <?php echo $mp6v;?>value="- -" onClick="majapercu();">- -</option>
      <option <?php echo $mp6n;?>value="norm" onClick="majapercu();">Normal</option>
      <option <?php echo $mp6g;?>value="gras" onClick="majapercu();">Gras</option>
      <option <?php echo $mp6s;?>value="soul" onClick="majapercu();">Souligné</option>
      <option <?php echo $mp6i;?>value="ital" onClick="majapercu();">Italique</option>
      <option <?php echo $mp6e;?>value="epar" onClick="majapercu();">Entre ( )</option>
      <option <?php echo $mp6c;?>value="ecro" onClick="majapercu();">Entre [ ]</option>
      <option <?php echo $mp6u;?>value="egui" onClick="majapercu();">Entre " "</option>
      <option <?php echo $mp6m;?>value="emin" onClick="majapercu();">Minuscules</option>
      <option <?php echo $mp6a;?>value="emaj" onClick="majapercu();">Majuscules</option>
      <option <?php echo $mp6f;?>value="effa" onClick="majapercu();">Effacé</option>
      </select>
    </td>
    <td>&nbsp;</td>
<?php
if (isset($choix_mp7) && strpos($choix_mp7, "~- -~") !== false || !isset($team)) {$mp7v = "selected ";}else{$mp7v = "";}
if (isset($choix_mp7) && strpos($choix_mp7, "~norm~") !== false) {$mp7n = "selected ";}else{$mp7n = "";}
if (isset($choix_mp7) && strpos($choix_mp7, "~gras~") !== false) {$mp7g = "selected ";}else{$mp7g = "";}
if (isset($choix_mp7) && strpos($choix_mp7, "~soul~") !== false) {$mp7s = "selected ";}else{$mp7s = "";}
if (isset($choix_mp7) && strpos($choix_mp7, "~ital~") !== false) {$mp7i = "selected ";}else{$mp7i = "";}
if (isset($choix_mp7) && strpos($choix_mp7, "~epar~") !== false) {$mp7e = "selected ";}else{$mp7e = "";}
if (isset($choix_mp7) && strpos($choix_mp7, "~ecro~") !== false) {$mp7c = "selected ";}else{$mp7c = "";}
if (isset($choix_mp7) && strpos($choix_mp7, "~egui~") !== false) {$mp7u = "selected ";}else{$mp7u = "";}
if (isset($choix_mp7) && strpos($choix_mp7, "~emin~") !== false) {$mp7m = "selected ";}else{$mp7m = "";}
if (isset($choix_mp7) && strpos($choix_mp7, "~emaj~") !== false) {$mp7a = "selected ";}else{$mp7a = "";}
if (isset($choix_mp7) && strpos($choix_mp7, "~effa~") !== false) {$mp7f = "selected ";}else{$mp7f = "";}
?>
    <td>
      <select id="mp7" class="form-control" style="width: 75px; font-size: 80%;" size="11" name="mp7[]" multiple style="font-size: 80%">
      <option <?php echo $mp7v;?>value="- -" onClick="majapercu();">- -</option>
      <option <?php echo $mp7n;?>value="norm" onClick="majapercu();">Normal</option>
      <option <?php echo $mp7g;?>value="gras" onClick="majapercu();">Gras</option>
      <option <?php echo $mp7s;?>value="soul" onClick="majapercu();">Souligné</option>
      <option <?php echo $mp7i;?>value="ital" onClick="majapercu();">Italique</option>
      <option <?php echo $mp7e;?>value="epar" onClick="majapercu();">Entre ( )</option>
      <option <?php echo $mp7c;?>value="ecro" onClick="majapercu();">Entre [ ]</option>
      <option <?php echo $mp7u;?>value="egui" onClick="majapercu();">Entre " "</option>
      <option <?php echo $mp7m;?>value="emin" onClick="majapercu();">Minuscules</option>
      <option <?php echo $mp7a;?>value="emaj" onClick="majapercu();">Majuscules</option>
      <option <?php echo $mp7f;?>value="effa" onClick="majapercu();">Effacé</option>
      </select>
    </td>
    <td>&nbsp;</td>
  </tr>
<?php
$cg1v = "000000";
$cg2v = "000000";
$cg3v = "000000";
$cg4v = "000000";
$cg5v = "000000";
$cg6v = "000000";
$cg7v = "000000";
if (isset($choix_cg1)) {$cg1v = $choix_cg1;}
if (isset($choix_cg2)) {$cg2v = $choix_cg2;}
if (isset($choix_cg3)) {$cg3v = $choix_cg3;}
if (isset($choix_cg4)) {$cg4v = $choix_cg4;}
if (isset($choix_cg5)) {$cg5v = $choix_cg5;}
if (isset($choix_cg6)) {$cg6v = $choix_cg6;}
if (isset($choix_cg7)) {$cg7v = $choix_cg7;}
?>
  <tr>
   <td>&nbsp;</td>
   <td><input type="text" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" id="cg1" name="cg1" size="10" class="form-control jscolor {closable:true,closeText:'Fermer'}" value="<?php echo $cg1v;?>" onChange="majapercu();" style="font-size: 80%"></td>
   <td>&nbsp;</td>
   <td><input type="text" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" id="cg2" name="cg2" size="10" class="form-control jscolor {closable:true,closeText:'Fermer'}" value="<?php echo $cg2v;?>" onChange="majapercu();" style="font-size: 80%"></td>
   <td>&nbsp;</td>
   <td><input type="text" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" id="cg3" name="cg3" size="10" class="form-control jscolor {closable:true,closeText:'Fermer'}" value="<?php echo $cg3v;?>" onChange="majapercu();" style="font-size: 80%"></td>
   <td>&nbsp;</td>
   <td><input type="text" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" id="cg4" name="cg4" size="10" class="form-control jscolor {closable:true,closeText:'Fermer'}" value="<?php echo $cg4v;?>" onChange="majapercu();" style="font-size: 80%"></td>
   <td>&nbsp;</td>
   <td><input type="text" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" id="cg5" name="cg5" size="10" class="form-control jscolor {closable:true,closeText:'Fermer'}" value="<?php echo $cg5v;?>" onChange="majapercu();" style="font-size: 80%"></td>
   <td>&nbsp;</td>
   <td><input type="text" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" id="cg6" name="cg6" size="10" class="form-control jscolor {closable:true,closeText:'Fermer'}" value="<?php echo $cg6v;?>" onChange="majapercu();" style="font-size: 80%"></td>
   <td>&nbsp;</td>
   <td><input type="text" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" id="cg7" name="cg7" size="10" class="form-control jscolor {closable:true,closeText:'Fermer'}" value="<?php echo $cg7v;?>" onChange="majapercu();" style="font-size: 80%"></td>
   <td>&nbsp;</td>
  </tr>
</table><br><br>
<u>Aperçu :</u><br>
<?php
  //Définition des variables initiales
  //26 (14), 1911–1915 DOI: 10.1016/j.cub.2016.05.047.
  $txtAut = "Hisakata, R.; Nishida, S.; Johnston, A.";
  $txtAutChi = "Hisakata, Rumi, Shin 'ya Nishida, and Alan Johnston";
  $txtAutMla = "Hisakata, Rumi, et al.";
  $txtTit = "An Adaptable Metric Shapes Perceptual Space";
  $txtAnn = "2016";
  $txtRev = "Current Biology";
  $txtVol = "26";
  $txtNum = "14";
  $txtPag = "1911-1915";
?>
<div id="apercu">
<!--<span id="listAut"><?php echo($txtAut);?></span>
<span id="listTit"><?php echo($txtTit);?></span>
<span id="listAnn"><?php echo($txtAnn);?></span>
<span id="listRev"><?php echo($txtRev);?></span>
<span id="listVol"><?php echo($txtVol);?></span>
<span id="listNum"><?php echo($txtNum);?></span>
<span id="listPag"><?php echo($txtPag);?></span>-->
</div>
<br><br>
La suite sera constituée des éléments habituels s'ils ont été demandés : DOI, Pubmed, etc.
<br><br>
</div></div></div>
<br><br>
<input type="submit" class="btn btn-md btn-primary" value="Valider" name="soumis">
</form>