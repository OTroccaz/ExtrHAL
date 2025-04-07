<?php
/*
 * ExtrHAL - Votre bilan en un clic ! - Your assessment in one click!
 *
 * Copyright (C) 2023 Olivier Troccaz (olivier.troccaz@cnrs.fr) and Laurent Jonchère (laurent.jonchere@univ-rennes.fr)
 * Released under the terms and conditions of the GNU General Public License (https://www.gnu.org/licenses/gpl-3.0.txt)
 *
 * Page d'accueil - Home page
 */
 
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
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	<title>ExtrHAL - HALUR</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="ExtrHAL permet d'afficher et d'exporter des listes de publications HAL d'une unité de recherche, d'une équipe ou d'un auteur" name="description" />
	<meta content="Coderthemes + Lizuka + OTroccaz + LJonchere" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

	<!-- third party css -->
	<!-- <link href="./assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" /> -->
	<!-- third party css end -->

	<!-- App css -->
	<link href="./assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="./assets/css/app-hal-ur1.min.css" rel="stylesheet" type="text/css" id="light-style" />
	<link href="./ExtrHAL.css" rel="stylesheet" type="text/css" />
	<!-- <link href="./assets/css/app-creative-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" /> -->
				
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
  <script type='text/x-mathjax-config'>
    MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['$$','$$']]}});
  </script>
  <!--<link rel="stylesheet" href="./ExtrHAL.css"> -->
  <!--<link rel="stylesheet" href="./bootstrap.min.css"> -->
	<script src="./lib/jscolor-2.0.4/jscolor.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	
	<!-- bundle -->
	<script src="./assets/js/vendor.min.js"></script>
	<script src="./assets/js/app.min.js"></script>

	<!-- third party js -->
	<!-- <script src="./assets/js/vendor/Chart.bundle.min.js"></script> -->
	<!-- third party js ends -->
	<script src="./assets/js/pages/hal-ur1.chartjs.js"></script>
	
	<?php
	//Stats Google
	if (strpos($_SERVER['HTTP_HOST'], '127.0.0.1') === false) {
		include("./Glob_gstats.php");
	}
	?>

</head>

<?php
//Institut général
$institut = "";// -> univ-rennes1/ par exemple, mais est-ce vraiment nécessaire ?

include "./ExtrHAL_fonctions.php";

//Initialisation des variables
$teamInit = "";
$idst = "";
$idhal = "";
$evhal = "";
$refint = "";
$financ = "";
//$anneeforce = "";
$periode = "";
$anneedeb = "";
$anneefin = "";
$depot = "";
$depotforce = "";
$depotdeb = "";
$depotfin = "";
$typidh = "";
$typcro = "";
$typexc = "";
$prefeq = "";
$sortArray = array();
$rtfArray = array();
$bibArray = array();
$gr = "";
$listedoi = "";
$listetitre = "";
$arriv = "";
$depar = "";

include "./ExtrHAL_post.php";
include "./ExtrHAL_get.php";
?>

<body class="loading" data-layout="topnav" >

<noscript>
<div class='text-primary' id='noscript'><strong>ATTENTION !!! JavaScript est désactivé ou non pris en charge par votre navigateur : cette procédure ne fonctionnera pas correctement.</strong><br>
<strong>Pour modifier cette option, voir <a target='_blank' rel='noopener noreferrer' href='http://www.libellules.ch/browser_javascript_activ.php'>ce lien</a>.</strong></div><br>
</noscript>

				<!-- Begin page -->
        <div class="wrapper">

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
								
								<?php
								include "./Glob_haut.php";
								?>
                    
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb bg-light-lighten p-2">
                                                <li class="breadcrumb-item"><a href="index.php"><i class="uil-home-alt"></i> Accueil HALUR</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Extr<span class="font-weight-bold">HAL</span></li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <h4 class="page-title">Votre bilan en un clic !</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-8 col-lg-6 d-flex">
                                <!-- project card -->
                                <div class="card d-block w-100 shadow-lg">
                                    <div class="card-body">
                                        
                                        <!-- project title-->
                                        <h2 class="h1 mt-0">
																						<i class="mdi mdi-file-export-outline text-primary"></i>
                                            <span class="font-weight-light">Extr</span><span class="text-primary">HAL</span>
                                        </h2>
                                        <h5 class="badge badge-primary badge-pill">Présentation</h5><br>

                                        <img src="./img/hilthart-pedersen-beach-of-list-sylt-unsplash.jpg" alt="Accueil ExtrHAL" class="img-fluid"><br>
																				<p class="font-italic">Photo : Beach of List Sylt by Hilthart Pedersen on Unsplash (détail)</p>

                                        <p class="mb-2 text-justify">
                                            ExtrHAL permet d&apos;afficher et d&apos;exporter des listes de publications HAL d&apos;une unité de recherche, d'une équipe ou d'un auteur. Conçu à partir d'un script de Philippe Gambette (ExtractionHAL), il a été créé par Olivier Troccaz (conception-développement) et Laurent Jonchère (conception). Son code est disponible <a target='_blank' rel='noopener noreferrer' href="https://github.com/OTroccaz/ExtrHAL">sur GitHub</a> sous licence <a target='_blank' rel='noopener noreferrer' href="https://www.gnu.org/licenses/gpl-3.0.fr.html">GPLv3</a>.
                                        </p>

                                        <p class="mb-4">
                                            Contacts : <a target='_blank' rel='noopener noreferrer' href="https://scienceouverte.univ-rennes.fr/interlocuteurs/laurent-jonchere">Laurent Jonchère</a> (Université de Rennes) / <a target='_blank' rel='noopener noreferrer' href="https://scienceouverte.univ-rennes.fr/interlocuteurs/olivier-troccaz">Olivier Troccaz</a> (CNRS CReAAH/OSUR).
                                        </p>


                                    </div> <!-- end card-body-->
                                    
                                </div> <!-- end card-->

                            </div> <!-- end col -->
                            <div class="col-lg-6 col-xl-4 d-flex">
                                <div class="card shadow-lg w-100">
                                    <div class="card-body">
                                        <h5 class="badge badge-primary badge-pill">Mode d'emploi</h5>
                                        <div class="mb-2">
                                            <ul class="list-group">
																						<li class="list-group-item">
                                                    <a target="_blank" rel="noopener noreferrer" href="./ExtrHAL_rapide.pdf"><i class="mdi mdi-file-pdf-box-outline mr-1"></i> Prise en main rapide d'ExtrHAL</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a target="_blank" rel="noopener noreferrer" href="./ExtrHAL_tutoriel.pdf"><i class="mdi mdi-file-pdf-box-outline mr-1"></i> Guide d'utilisation</a>
                                                </li>
																								<li class="list-group-item">
                                                    <a target="_blank" rel="noopener noreferrer" href="./ExtrHAL_installation.pdf"><i class="mdi mdi-file-pdf-box-outline mr-1"></i> Installer ExtrHAL</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a target="_blank" rel="noopener noreferrer" href="./ExtrHAL_criteres_types_publis.pdf"><i class="mdi mdi-file-pdf-box-outline mr-1"></i> Quels champs compléter dans HAL ?</a>
                                                </li>
                                            </ul> 
                                        </div>
                                    </div>
                                </div>
                                <!-- end card-->
                            </div>
                        </div>
                        <!-- end row -->

												<div class="row">
                            <div class="col-12 d-flex">
                                <!-- project card -->
                                <div class="card w-100 d-block shadow-lg">
                                    <div class="card-body">
                                        
                                        <h5 class="badge badge-primary badge-pill">Paramétrage</h5>

																				<?php
																				include "./ExtrHAL_formulaire.php";

																				//Si aucun type de publications choisi > choix par défaut de tous les articles
																				if ((isset($_POST["soumis"]) || isset($_GET["team"])) && (!isset($choix_publis) && !isset($choix_comm) && !isset($choix_ouvr) && !isset($choix_rapp) && !isset($choix_imag) && !isset($choix_autr))) {
																					//die('<br><br><font color=red><strong>Veuillez renseigner le(les) type(s) de publications dans le menu !</strong></font><br><br>');
																				}
																				?>

	                                    </div> <!-- end card-body-->
                                    
                                </div> <!-- end card-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12 d-flex">
                                <div class="card shadow-lg w-100">
                                    <div class="card-body">
                                        <p class="mb-2 text-center font-weight-bold">
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
																							
																							echo '<span class="mr-2">Exporter les données affichées </span>';
																							echo '<a class="btn btn-primary" target="_blank" href="./HAL/extractionHAL_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).'.rtf">en RTF</a>&nbsp;';
																							echo '<a class="btn btn-primary" target="_blank" href="./HAL/extractionHAL_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).'.csv">en CSV</a>&nbsp;';
																							echo '<a class="btn btn-primary" target="_blank" href="./HAL/HCERES_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).'.csv">HCERES</a>&nbsp;';
																							echo '<a class="btn btn-primary" target="_blank" href="./HAL/extractionHAL_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).'.bib">en Bibtex</a>&nbsp;';
																							echo '<a class="btn btn-primary" target="_blank" href="./HAL/VOSviewerDOI_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).'.txt">VOSviewerDOI</a>&nbsp;';
																							echo '<a class="btn btn-info" href="ExtrHAL.php">Réinitialiser tous les paramètres</a>&nbsp;';
																							if ($UBitly == "oui") {
																							 if ($urlbitly != "Impossible car URL trop longue") {
																								 echo "<br><span class='ml-2'>URL raccourcie directe : <a href=".$urlbitly.">".$urlbitly."</span>";
																							 }else{
																								 echo "<br><span class='ml-2'>URL raccourcie directe : ".$urlbitly."</span>";
																							 }
																							}else{
																							 echo "<br><span class='ml-2'>Pas d'URL raccourcie directe demandée</span>";
																							}
																						}
																					?>
                                            
                                        </p>	
		
																				<?php
																				include "./ExtrHAL_sommaire.php";

																				//Compilation des critères de recherche
																				$specificRequestCode = '';

																				//Période de recherche
																				if (isset($anneedeb) && $anneedeb != "" && isset($anneefin) && $anneefin != "") {
																					//Conversion des dates au format HAL ISO 8601 jj/mm/aaaa > aaaa-mm-jjT00:00:00Z
																					$tabanneedeb = explode('/', $anneedeb);
																					$anneedebiso = $tabanneedeb[2].'-'.$tabanneedeb[1].'-'.$tabanneedeb[0].'T00:00:00Z';
																					$tabanneefin = explode('/', $anneefin);
																					$anneefiniso = $tabanneefin[2].'-'.$tabanneefin[1].'-'.$tabanneefin[0].'T00:00:00Z';
																					//N'inclure les notices à paraître que si la recherche porte sur l'année courante ou n+1
																					if ($tabanneedeb[2] >= date("Y")) { 
																						$specificRequestCode .= '%20AND%20(producedDate_tdate:['.$anneedebiso.'%20TO%20'.$anneefiniso.']%20OR%20publicationDate_tdate:['.$anneedebiso.'%20TO%20'.$anneefiniso.']%20OR%20inPress_bool:%22true%22)';
																					}else{
																						$specificRequestCode .= '%20AND%20(producedDate_tdate:['.$anneedebiso.'%20TO%20'.$anneefiniso.']%20OR%20publicationDate_tdate:['.$anneedebiso.'%20TO%20'.$anneefiniso.'])';
																					}
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
																				include "./ExtrHAL_getReferences.php";
																				include "./ExtrHAL_displayRefList_fct.php";
																				include "./ExtrHAL_countries.php";

																				$detail = "";
																				$hcmax = 1;
																				if (isset($typsign) && $typsign == "ts20") {$detail = " (20%)";}
																				if (isset($typsign) && $typsign == "ts2080") {$hcmax = 2;}

																				for ($hc = 1; $hc <= $hcmax; $hc++) {
																					if (isset($typsign) && $typsign == "ts2080" && $hc == 1) {$detail = " (20%)"; $typsign = "ts20";}
																					if (isset($typsign) && $typsign == "ts20" && $hc == 2) {$detail = " (80%)"; $typsign = "ts2080";}
																					
																					$numbers=array();
																					$numbersTG = array();

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
																					
																					include "./ExtrHAL_displayRefList_res.php";
	
																					echo "<br><a id=\"BILAN\"></a><h2 class=\"font-weight-normal\"><span class=\"badge badge-primary badge-pill\">Bilan quantitatif".$detail." </span><a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
																					$yearTotal = array();
																					$yearTotalTG = array();
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
																							 $yearTotalTG[$year] = 0;
																						}
																						echo "<td style='padding: 2px;'>Total</td>";
																						
																						if($typgra == "oui" && $limgra == "non") {
																							echo "<td style='width: 20px;'>&nbsp;</td>";
																							foreach($availableYears as $year => $nb){
																							 echo "<td style='padding: 2px;'><strong>".$year."</strong></td>";
																							}
																							echo "<td style='padding: 2px;'><strong>Total</strong></td>";
																						}
																						
																						echo "</tr>";
																						
																						foreach($numbers as $rType => $yearNumbers){
																							 echo "<tr><td style='padding: 2px;'>".$rType."</td>";
																							 $somme = 0;
																							 $sommeTG = 0;
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
																							 
																							 if($typgra == "oui" && $limgra == "non") {
																								 echo "<td style='width: 20px;'>&nbsp;</td>";
																								 foreach($availableYears as $year => $nb){
																									 if(isset($numbersTG[$rType][$year])){
																										 echo "<td style='padding: 2px;'><strong>".$numbersTG[$rType][$year]."</strong></td>";
																										 $yearTotalTG[$year] += $numbersTG[$rType][$year];
																										 $sommeTG += $numbersTG[$rType][$year];
																									 } else {
																										 echo "<td style='padding: 2px;'><strong>0</strong></td>";
																									 }
																								 }
																								 echo "<td style='padding: 2px;'><strong>".$sommeTG."</strong></td>";
																							 }			 
																							 echo "</tr>";
																						}
																						
																						//Totaux
																						echo "<tr>";
																						echo "<td style='padding: 2px;'>Total</td>";
																						foreach($yearTotal as $year => $nb){
																							 echo "<td style='padding: 2px;'>".$yearTotal[$year]."</td>";
																						}
																						if($typgra == "oui" && $limgra == "non") {
																							echo "<td style='width: 20px;'>&nbsp;</td>";
																							echo "<td style='width: 20px;'>&nbsp;</td>";
																							foreach($yearTotal as $year => $nb){
																								 echo "<td style='padding: 2px;'><strong>".$yearTotalTG[$year]."</strong></td>";
																							}
																						}
																						echo "</tr>";
																						echo "</table>";
																						
																						if ($typgra == "oui" && $limgra == "non") {
																							echo('Les valeurs en gras correspondent aux bilans concernant les notices dont un auteur de la collection est en 1<sup>ère</sup> position ou en position finale.<br>');
																						}
																						
																						echo "<br><br>";
																						
																						//Bilan quantitatif par équipes et collection si numérotation/codification demandée
																						if (isset($typeqp) && $typeqp == "oui") {
																							/*
																							var_dump($numbers);
																							if (isset($bilEqp["TA"])) {var_dump($bilEqp["TA"]);}
																							echo 'toto : '.$nbeqp.'<br>';
																							var_dump($nomeqp);
																							*/
																							
																							//Display the table of publications by year (column) and by collection and team(s) (line)
																							echo "<br><a id=\"BILAN QTT\"></a><h2 class=\"font-weight-normal\"><span class=\"badge badge-primary badge-pill\">Bilan quantitatif par collection et équipes".$detail." </span><a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
																							$colTotal = array();
																							$eqpTotal = array();
																							$ceqTotal = array();
																							
																							$ceqTotal[$team] = 0;
																							foreach($nomeqp as $nqp) {
																								if ($nqp != $team) {
																									$ceqTotal[$nqp] = 0;
																								}
																							}
																					
																							echo "<table>";
																							echo "<tr><td style='padding: 2px;'></td>";
																							foreach($availableYears as $year => $nb){
																								 echo "<td style='padding: 2px;'>".$year."</td>";
																								 //Total collection tout type confondu
																								 $colTotal[$year] = 0;
																								 foreach($numbers as $rType => $yearNumbers){
																										if(array_key_exists($year,$yearNumbers)){
																											 $colTotal[$year] += $yearNumbers[$year];
																											 $ceqTotal[$team] += $yearNumbers[$year];
																										}
																								 }
																								 
																								 //Total équipe tout type confondu
																								 $eqp = 0;
																								 foreach($nomeqp as $nqp) {
																									 if ($nqp != $team) {
																										 $eqpTotal[$nqp][$year] = 0;
																										 foreach($numbers as $rType => $yearNumbers){
																											 //foreach($availableYears as $year => $nb){
																												 if (isset($bilEqp[$rType][$eqp][$year])) {
																													 $eqpTotal[$nqp][$year] += $bilEqp[$rType][$eqp][$year];
																													 $ceqTotal[$nqp] += $bilEqp[$rType][$eqp][$year];
																												 }
																											 //}
																										 }
																									 }
																									 $eqp++;
																								 }
																								 
																							}
																							echo "<td style='padding: 2px;'>Total</td>";
																							echo "</tr>";
																							
																							//Collection
																							echo "<tr>";
																							echo "<td style='padding: 2px;'>".$team."</td>";
																							foreach($availableYears as $year => $nb){
																								echo "<td style='padding: 2px;'>".$colTotal[$year]."</td>";
																							}
																							echo "<td style='padding: 2px;'>".$ceqTotal[$team]."</td>";
																							echo "</tr>";
																							
																							//Equipes
																							foreach($nomeqp as $nqp) {
																								if ($nqp != $team) {
																									echo "<tr>";
																									echo "<td style='padding: 2px;'>".$nqp."</td>";
																									foreach($availableYears as $year => $nb){
																										echo "<td style='padding: 2px;'>".$eqpTotal[$nqp][$year]."</td>";
																									}
																									echo "<td style='padding: 2px;'>".$ceqTotal[$nqp]."</td>";
																									echo "</tr>";
																								}
																							}
																							
																							echo "</table>";
																							
																							echo "<br><br>";
																							
																							//Display the table of crossed publications by teams
																							echo "<br><a id=\"BILAN QTTCRO\"></a><h2 class=\"font-weight-normal\"><span class=\"badge badge-primary badge-pill\">Bilan quantitatif du total des publications communes entre chaque équipe".$detail." </span><a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
																							
																							$croTotal = array();
																							$croEqpTp = array();
																							
																							$j = 1;
																							foreach($nomeqp as $nqp) {
																								if ($nqp != $team) {
																									if (!isset($croTotal[$nqp])) {$croTotal[$nqp] = 0;}
																									foreach($numbers as $rType => $yearNumbers){
																										for ($k = 1; $k <= $nbeqp; $k++) {
																											if (!isset($croEqpTp[$j][$k])) {$croEqpTp[$j][$k] = 0;}
																											//$croTotal[$nqp] = $croEqp[$rType][$j][$k];
																											$croEqpTp[$j][$k] += $croEqp[$rType][$j][$k];
																										}
																									}
																									$j++;
																								}
																							}
																							
																							foreach($numbers as $rType => $yearNumbers){
																								$k = 0;
																								foreach($nomeqp as $nqp) {
																									if ($nqp != $team) {
																										$croTotal[$nqp] += $crores[$rType][$k];
																									}
																									$k++;
																								}
																							}
																																													
																							echo "<table>";
																							echo "<tr><td style='padding: 2px;'></td>";
																							
																							//Equipes
																							foreach($nomeqp as $nqp) {
																								if ($nqp != $team) {
																									echo "<td style='padding: 2px;'>".$nqp."</td>";
																								}
																							}
																							echo "</tr>";
																							
																							$j = 0;//Lignes
																							$k = 0;//Colonnes
																							
																							//Ligne pour chaque équipe
																							foreach($nomeqp as $nqp) {
																								$k = 0;
																								if ($nqp != $team) {
																									foreach($nomeqp as $nqpk) {
																										if ($k == 0) {
																											echo "<tr><td style='padding: 2px;'>".$nqp."</td>";
																										}else{
																											if ($k == $j) {
																												echo "<td style='padding: 2px; background-color: #d9d9d9;'>".$croTotal[$nqpk]."</td>";
																											}else{
																												echo "<td style='padding: 2px;'>".$croEqpTp[$j][$k]."</td>";
																											}
																										}
																										$k++;
																									}
																									echo "</tr>";
																								}
																								$j++;
																							}
																							
																							
																							echo "</table>";
																							
																							echo "<br><br>";
																						}
																						
																						echo "<br><br>";

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
																							include "./ExtrHAL_graphes.php";
																						}
																					}else{
																						echo '<p>Aucun résultat</p>';
																					}
																				}
																				echo '<br>';
																				include "./ExtrHAL_scriptsJS.php";
																				?>
                                    </div>
                                </div>
                                <!-- end card-->
                            </div> <!-- .col -->
                            
                        </div> <!-- .row -->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

								<?php
								include "./Glob_bas.php";
								?>

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
				
				<button id="scrollBackToTop" class="btn btn-primary"><i class="mdi mdi-24px text-white mdi-chevron-double-up"></i></button>
        <!-- END wrapper -->
				
				<!-- bundle -->
				<!-- <script src="./assets/js/vendor.min.js"></script> -->
				<script src="./assets/js/app.min.js"></script>

				<!-- third party js -->
				<!-- <script src="./assets/js/vendor/Chart.bundle.min.js"></script> -->
				<!-- third party js ends -->
				<script src="./assets/js/pages/hal-ur1.chartjs.js"></script>
				
				<script>
            (function($) {
                'use strict';
                $('#warning-alert-modal').modal({
									'show': true,
									'backdrop': 'static'
								});
                $(document).scroll(function() {
                  var y = $(this).scrollTop();
                  if (y > 200) {
                    $('#scrollBackToTop').fadeIn();
                  } else {
                    $('#scrollBackToTop').fadeOut();
                  }
                });
                $('#scrollBackToTop').each(function(){
                    $(this).click(function(){ 
                        $('html,body').animate({ scrollTop: 0 }, 'slow');
                        return false; 
                    });
                });
            })(window.jQuery)
        </script>
				
    </body>
                                                	
</html>
