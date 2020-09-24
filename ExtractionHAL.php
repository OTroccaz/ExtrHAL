<?php
//Nettoyage URL
$redir = "non";
$root = 'http';
if (isset ($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on")	{
  $root.= "s";
}
if (!isset($_SERVER['REQUEST_URI']) && isset($_SERVER['SCRIPT_NAME']) && isset($_SERVER['QUERY_STRING'])) {
    $_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'] . '?' . $_SERVER['QUERY_STRING'];
}
$urlnet = $root."://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
$urlnet = str_replace(" ", "%20", $urlnet);
while (stripos($urlnet, "%3C") !== false) {
  $redir = "oui";
  $posi = stripos($urlnet, "%3C");
  $posf = stripos($urlnet, "%3E", $posi) + 3;
  $urlnet = substr($urlnet, 0, $posi).substr($urlnet, $posf, strlen($urlnet));
}
if ($redir == "oui") {header("Location: ".$urlnet);}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/html4/loose.dtd">
<html lang="fr">
<head>
  <title>ExtrHAL : outil d’extraction des publications HAL d’une unité, d'une équipe de recherche ou d'un auteur</title>
  <meta name="Description" content="ExtrHAL : outil d’extraction des publications HAL d’une unité, d'une équipe de recherche ou d'un auteur">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="icon" type="type/ico" href="favicon.ico">
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
  <script type='text/x-mathjax-config'>
    MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['$$','$$']]}});
  </script>
  <link rel="stylesheet" href="./ExtractionHAL.css">
  <link rel="stylesheet" href="./bootstrap.min.css">
  <script src="./lib/jscolor-2.0.4/jscolor.js"></script>
</head>

<?php
//Institut général
$institut = "";// -> univ-rennes1/ par exemple, mais est-ce vraiment nécessaire ?

include "./ExtractionHAL-fonctions.php";

//Initialisation des variables
$teamInit = "";
$idhal = "";
$evhal = "";
$refint = "";
//$anneeforce = "";
$anneedeb = "";
$anneefin = "";
$depotforce = "";
$depotdeb = "";
$depotfin = "";
$typidh = "";
$typcro = "";
$prefeq = "";
$sortArray = array();
$rtfArray = array();
$bibArray = array();
$gr = "";
$listedoi = "";
$listetitre = "";
$arriv = "";
$depar = "";

include "./ExtractionHAL-post.php";
include "./ExtractionHAL-get.php";
?>

<body style="font-family: corbel, verdana, sans-serif;">

<noscript>
<div class='center, red' id='noscript'><strong>ATTENTION !!! JavaScript est désactivé ou non pris en charge par votre navigateur : cette procédure ne fonctionnera pas correctement.</strong><br>
<strong>Pour modifier cette option, voir <a target='_blank' rel='noopener noreferrer' href='http://www.libellules.ch/browser_javascript_activ.php'>ce lien</a>.</strong></div><br>
</noscript>

<table class="table100" aria-describedby="Entêtes">
<tr>
<th scope="col" style="text-align: left;"><img alt="Extraction HAL" title="ExtrHAL" width="250px" src="./img/logo_Extrhal.png"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Votre bilan en un clic !</th>
<th scope="col" style="text-align: right;"><img alt="Université de Rennes 1" title="Université de Rennes 1" width="150px" src="./img/logo_UR1_gris_petit.jpg"></th>
</tr>
</table>
<hr style="color: #467666; height: 1px; border-width: 1px; border-top-color: #467666; border-style: inset;">

<p>ExtrHAL permet d’afficher et d’exporter en RTF, CSV et/ou Bibtex des listes de publications HAL d’une unité, d'une équipe de recherche ou d'un auteur,
à partir d’un script PHP créé par <a target="_blank" rel="noopener noreferrer" href="http://igm.univ-mlv.fr/~gambette/ExtractionHAL/ExtractionHAL.php?collection=UPEC-UPEM">
Philippe Gambette</a>, repris et modifié par <a target="_blank" rel="noopener noreferrer" href="https://ecobio.univ-rennes1.fr/personnel.php?qui=Olivier_Troccaz">Olivier Troccaz</a> (ECOBIO - OSUR) pour l’Université de Rennes 1.
<br>Pour tout renseignement, n'hésitez pas à contacter <a target="_blank" rel="noopener noreferrer" href="https://openaccess.univ-rennes1.fr/interlocuteurs/laurent-jonchere">Laurent Jonchère</a> ou <a target="_blank" rel="noopener noreferrer" href="https://ecobio.univ-rennes1.fr/personnel.php?qui=Olivier_Troccaz">Olivier Troccaz</a>.
<br>Si vous souhaitez utiliser et adapter ExtrHAL pour une autre institution, consultez
<a target="_blank" rel="noopener noreferrer" href="https://wiki.ccsd.cnrs.fr/wikis/hal/index.php/Outils_et_services_d%C3%A9velopp%C3%A9s_localement_pour_am%C3%A9liorer_ou_faciliter_l%27utilisation_de_HAL#Extraction_et_mise_en_forme_des_publications">le wiki du CCSD</a>.</p>

<h2>Mode d'emploi</h2>
<a target="_blank" href="./ExtrHAL-manuel-v2.pdf">Télécharger le manuel</a>
<br>
<a target="_blank" href="./ExtrHAL-criteres-types-publis.pdf">Quels champs compléter dans HAL ?</a>
<br>

<h2>Paramétrage</h2>

<?php
include "./ExtractionHAL-formulaire.php";

//Si aucun type de publications choisi > arrêt du script avec message d'information
if ((isset($_POST["soumis"]) || isset($_GET["team"])) && (!isset($choix_publis) && !isset($choix_comm) && !isset($choix_ouvr) && !isset($choix_autr))) {
	die('<br><br><font color=red><strong>Veuillez renseigner le(les) type(s) de publications dans le menu !</strong></font><br><br>');
}
?>

<br>
<?php
//Quelques liens pour les utilitaires
if (isset($_POST["soumis"]) || isset($_GET["team"])) {
  //Si demandée, URL de sauvegarde raccourcie via Bitly
  $bitly = "aucun";
	if ($UBitly == "oui") {
		if (strlen($urlsauv) < 1700) {
			include_once('bitly_extrhal.php');
			$urlbitly = bitly_v4_shorten($urlsauv);
		}else{
			$urlbitly = "Impossible car URL trop longue";
		}
		$bitly = "ok";
	}

  if (isset($idhal) && $idhal != "") {$team = $idhal;}
  echo "<center><strong><a target='_blank' href='./HAL/extractionHAL_".str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).".rtf'>Exporter les données affichées en RTF</a></strong>, <strong><a target='_blank' href='./HAL/extractionHAL_".str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).".csv'>en CSV</a>, <strong><a target='_blank' href='./HAL/extractionHAL_".str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).".bib'>en Bibtex</a></strong> ou <strong><a target='_blank' href='./HAL/VOSviewerDOI_".str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).".txt'>VOSviewerDOI</a></strong>";
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
  echo "<a href='ExtractionHAL.php'>Réinitialiser tous les paramètres</a>";
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	if ($UBitly == "oui") {
		if ($urlbitly != "Impossible car URL trop longue") {
			echo "URL raccourcie directe : <a href=".$urlbitly.">".$urlbitly."</a></strong></center>";
		}else{
			echo "URL raccourcie directe : ".$urlbitly."</strong></center>";
		}
	}else{
		echo "Pas d'URL raccourcie directe demandée</strong></center>";
	}
	echo "<br><br>";
}

include "./ExtractionHAL-sommaire.php";

//Compilation des critères de recherche
$specificRequestCode = '';

//Période de recherche
if (isset($anneedeb) && $anneedeb != "" && isset($anneefin) && $anneefin != "") {
	//Conversion des dates au format HAL ISO 8601 jj/mm/aaaa > aaaa-mm-jjT00:00:00Z
  $tabanneedeb = explode('/', $anneedeb);
  $anneedebiso = $tabanneedeb[2].'-'.$tabanneedeb[1].'-'.$tabanneedeb[0].'T00:00:00Z';
  $tabanneefin = explode('/', $anneefin);
  $anneefiniso = $tabanneefin[2].'-'.$tabanneefin[1].'-'.$tabanneefin[0].'T00:00:00Z';
  $specificRequestCode .= '%20AND%20(producedDate_tdate:['.$anneedebiso.'%20TO%20'.$anneefiniso.']%20OR%20publicationDate_tdate:['.$anneedebiso.'%20TO%20'.$anneefiniso.'])';
}

//Date de dépôt
if (isset($depotdeb) && $depotdeb != "" && isset($depotfin) && $depotfin != "") {
  //Conversion des dates au format HAL ISO 8601 jj/mm/aaaa > aaaa-mm-jjT00:00:00Z
  $tabdepotdeb = explode('/', $depotdeb);
  $depotdebiso = $tabdepotdeb[2].'-'.$tabdepotdeb[1].'-'.$tabdepotdeb[0].'T00:00:00Z';
  $tabdepotfin = explode('/', $depotfin);
  $depotfiniso = $tabdepotfin[2].'-'.$tabdepotfin[1].'-'.$tabdepotfin[0].'T00:00:00Z';
  //champ:[valeurDébut TO valeurFin]
  $specificRequestCode .= '%20AND%20submittedDate_tdate:['.$depotdebiso.'%20TO%20'.$depotfiniso.']';
}

//collCode_s sert aussi bien pour une collection que pour un idhal
include "./ExtractionHAL-getReferences.php";
include "./ExtractionHAL-displayRefList-fct.php";
include "./ExtractionHAL-countries.php";

$detail = "";
$hcmax = 1;
if (isset($typsign) && $typsign == "ts20") {$detail = " (20%)";}
if (isset($typsign) && $typsign == "ts2080") {$hcmax = 2;}

for ($hc = 1; $hc <= $hcmax; $hc++) {
	if (isset($typsign) && $typsign == "ts2080" && $hc == 1) {$detail = " (20%)"; $typsign = "ts20";}
	if (isset($typsign) && $typsign == "ts20" && $hc == 2) {$detail = " (80%)"; $typsign = "ts2080";}
	
	$numbers=array();

	//$critNat = "%20AND%20language_s:fr";//critère national > seulement les publications en langue française
	//$critInt = "%20AND%20NOT%20language_s:fr";//critère international > on écarte les publications en langue française
	$critNat = "";
	$critInt = "";

	//Complément pour l'intitulé si langue des documents demandée
	$cpmlng = "";
	if (isset($typlng) && $typlng == "français") {$cpmlng = " en français";}
	if (isset($typlng) && $typlng == "autres") {$cpmlng = " en anglais ou dans une autre langue étrangère";}
	//$team sert aussi bien à une collection qu'à un idhal
	if (isset($idhal) && $idhal != "") {$team = $idhal;}
	
	include "./ExtractionHAL-displayRefList-res.php";
	
	echo "<br><a name=\"BILAN\"></a><h2>Bilan quantitatif".$detail." <a href=\"#sommaire\">&#8683;</a></h2>";
	$yearTotal = array();
	//Find all years with publications
	$availableYears=array();
	foreach($numbers as $rType => $yearNumbers){
		 foreach($yearNumbers as $year => $nb){
				$availableYears[$year]=1;
		 }
	}
	ksort($availableYears);

	if (count($availableYears) != 0) {//Y-a-t-il au moins un résultat ?
		//Display the table of publications by year (column) and by type (line)
		echo "<table>";
		echo "<tr><td style='padding: 2px;'></td>";
		foreach($availableYears as $year => $nb){
			 echo "<td style='padding: 2px;'>".$year."</td>";
			 $yearTotal[$year] = 0;
		}
		echo "<td style='padding: 2px;'>Total</td>";
		echo "</tr>";
		foreach($numbers as $rType => $yearNumbers){
			 echo "<tr><td style='padding: 2px;'>".$rType."</td>";
			 $somme = 0;
			 foreach($availableYears as $year => $nb){
					if(array_key_exists($year,$yearNumbers)){
						 echo "<td style='padding: 2px;'>".$yearNumbers[$year]."</td>";
						 $yearTotal[$year] += $yearNumbers[$year];
						 $somme += $yearNumbers[$year];
					} else {
						 echo "<td style='padding: 2px;'>0</td>";
					}
			 }
			 echo "<td style='padding: 2px;'>".$somme."</td>";
			 echo "</tr>";
		}
		//Totaux
		echo "<tr>";
		echo "<td style='padding: 2px;'>Total</td>";
		foreach($yearTotal as $year => $nb){
			 echo "<td style='padding: 2px;'>".$yearTotal[$year]."</td>";
		}
		echo "</tr>";
		echo "</table><br><br>";

		//export en RTF
		$sect->writeText("<br><br>", $font);
		$rtfic->save($Fnm);

		if (isset($_GET["team"])) {
			copy ($Fnm, "./HAL/extractionHAL_".$team.".rtf");
			copy ($Fnm1, "./HAL/extractionHAL_".$team.".csv");
			copy ($Fnm2, "./HAL/extractionHAL_".$team.".bib");
		}
		
		suppression("./HAL", 3600, "");//Suppression des fichiers du dossier HAL créés il y a plus d'une heure
		suppression("./img", 2592000, "mypic");//Suppression des images du dossier img créées il y a plus d'un mois

		if (isset($_POST["soumis"]) || isset($_GET["team"])) {
			include "./ExtractionHAL-graphes.php";
		}
	}else{
		echo ('Aucun résultat');
	}
}
echo '<br>';
include "./ExtractionHAL-scriptsJS.php";
?>
</body></html>
<?php
if ($typidh == "vis") {echo '<script type="text/javascript" charset="UTF-8">document.getElementById("detrac").style.display = "block";</script>';}
?>
<br>
<?php
include "./bas.php";
?>