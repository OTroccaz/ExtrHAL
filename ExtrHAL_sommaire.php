                                        <h5 class="badge badge-primary badge-pill"><a id="sommaire"></a>Sommaire</h5>

																				<ul>
																				<?php
																				if (isset($choix_publis) && strpos($choix_publis, "-TA-") !== false) {echo '<li><a href="#TA">Tous les articles (sauf vulgarisation)</a></li>';}
																				if (isset($choix_publis) && strpos($choix_publis, "-ACL-") !== false) {echo '<li><a href="#ACL">Articles de revues à comité de lecture</a></li>';}
																				if (isset($choix_publis) && strpos($choix_publis, "-ASCL-") !== false) {echo '<li><a href="#ASCL">Articles de revues sans comité de lecture</a></li>';}
																				if (isset($choix_publis) && strpos($choix_publis, "-ARI-") !== false) {echo '<li><a href="#ARI">Articles de revues internationales</a></li>';}
																				if (isset($choix_publis) && strpos($choix_publis, "-ARN-") !== false) {echo '<li><a href="#ARN">Articles de revues nationales</a></li>';}
																				if (isset($choix_publis) && strpos($choix_publis, "-ACLRI-") !== false) {echo '<li><a href="#ACLRI">Articles de revues internationales à comité de lecture</a></li>';}
																				if (isset($choix_publis) && strpos($choix_publis, "-ACLRN-") !== false) {echo '<li><a href="#ACLRN">Articles de revues nationales à comité de lecture</a></li>';}
																				if (isset($choix_publis) && strpos($choix_publis, "-ASCLRI-") !== false) {echo '<li><a href="#ASCLRI">Articles de revues internationales sans comité de lecture</a></li>';}
																				if (isset($choix_publis) && strpos($choix_publis, "-AV-") !== false) {echo '<li><a href="#AV">Articles de vulgarisation</a></li>';}
																				if (isset($choix_publis) && strpos($choix_publis, "-APNV-") !== false) {echo '<li><a href="#APNV">Publications non ventilées (articles)</a></li>';}
																				if (isset($choix_publis) && strpos($choix_publis, "-ASYN-") !== false) {echo '<li><a href="#ASYN">Articles de synthèse</a></li>';}
																				if (isset($choix_publis) && strpos($choix_publis, "-DPAP-") !== false) {echo '<li><a href="#DPAP">Data papers</a></li>';}
																				if (isset($choix_publis) && strpos($choix_publis, "-CRDL-") !== false) {echo '<li><a href="#CRDL">Comptes rendus de lecture</a></li>';}
																				
																				if (isset($choix_comm) && strpos($choix_comm, "-TC-") !== false) {echo '<li><a href="#TC">Toutes les communications (sauf grand public)</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CA-") !== false) {echo '<li><a href="#CA">Communications avec actes</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CSA-") !== false) {echo '<li><a href="#CSA">Communications sans actes</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CI-") !== false) {echo '<li><a href="#CI">Communications internationales</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CN-") !== false) {echo '<li><a href="#CN">Communications nationales</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CAI-") !== false) {echo '<li><a href="#CAI">Communications avec actes internationales</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CSAI-") !== false) {echo '<li><a href="#CAI">Communications sans actes internationales</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CAN-") !== false) {echo '<li><a href="#CSAN">Communications avec actes nationales</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CSAN-") !== false) {echo '<li><a href="#CSAN">Communications sans actes nationales</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CINVASANI-") !== false) {echo '<li><a href="#CINVASANI">Communications invitées avec ou sans actes, nationales ou internationales</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CINVA-") !== false) {echo '<li><a href="#CINVA">Communications invitées avec actes</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CINVSA-") !== false) {echo '<li><a href="#CINVSA">Communications invitées sans actes</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CNONINVA-") !== false) {echo '<li><a href="#CNONINVA">Communications non invitées avec actes</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CNONINVSA-") !== false) {echo '<li><a href="#CNONINVSA">Communications non invitées sans actes</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CINVI-") !== false) {echo '<li><a href="#CINVI">Communications invitées internationales</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CNONINVI-") !== false) {echo '<li><a href="#CNONINVI">Communications non invitées internationales</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CINVN-") !== false) {echo '<li><a href="#CINVN">Communications invitées nationales</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CNONINVN-") !== false) {echo '<li><a href="#CNONINVN">Communications non invitées nationales</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CPASANI-") !== false) {echo '<li><a href="#CPASANI">Communications par affiches (posters) avec ou sans actes, nationales ou internationales</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CPA-") !== false) {echo '<li><a href="#CPA">Communications par affiches (posters) avec actes</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CPSA-") !== false) {echo '<li><a href="#CPSA">Communications par affiches (posters) sans actes</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CPI-") !== false) {echo '<li><a href="#CPI">Communications par affiches internationales</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CPN-") !== false) {echo '<li><a href="#CPN">Communications par affiches nationales</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CGP-") !== false) {echo '<li><a href="#CGP">Conférences grand public</a></li>';}
																				if (isset($choix_comm) && strpos($choix_comm, "-CPNV-") !== false) {echo '<li><a href="#CPNV">Publications non ventilées (conférences)</a></li>';}
																				
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCDO-") !== false) {echo '<li><a href="#OCDO">Ouvrages ou chapitres ou directions d&apos;ouvrages</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCDOI-") !== false) {echo '<li><a href="#OCDOI">Ouvrages ou chapitres ou directions d&apos;ouvrages de portée internationale</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCDON-") !== false) {echo '<li><a href="#OCDON">Ouvrages ou chapitres ou directions d&apos;ouvrages de portée internationale</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-TO-") !== false) {echo '<li><a href="#TO">Tous les ouvrages (sauf vulgarisation)</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-OSPI-") !== false) {echo '<li><a href="#OSPI">Ouvrages scientifiques de portée internationale</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-OSPN-") !== false) {echo '<li><a href="#OSPN">Ouvrages scientifiques de portée nationale</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-COS-") !== false) {echo '<li><a href="#COS">Chapitres d&apos;ouvrages scientifiques</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-COSI-") !== false) {echo '<li><a href="#COSI">Chapitres d&apos;ouvrages scientifiques de portée internationale</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-COSN-") !== false) {echo '<li><a href="#COSN">Chapitres d&apos;ouvrages scientifiques de portée nationale</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-DOS-") !== false) {echo '<li><a href="#DOS">Directions d&apos;ouvrages scientifiques</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-DOSI-") !== false) {echo '<li><a href="#DOSI">Directions d&apos;ouvrages scientifiques de portée internationale</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-DOSN-") !== false) {echo '<li><a href="#DOSN">Directions d&apos;ouvrages scientifiques de portée nationale</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-EOS-") !== false) {echo '<li><a href="#EOS">Editions d&apos;ouvrages scientifiques</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCO-") !== false) {echo '<li><a href="#OCO">Ouvrages (tout type) ou chapitres d&apos;ouvrages</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCOI-") !== false) {echo '<li><a href="#OCOI">Ouvrages (tout type) ou chapitres d&apos;ouvrages de portée internationale</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCON-") !== false) {echo '<li><a href="#OCON">Ouvrages (tout type) ou chapitres d&apos;ouvrages de portée nationale</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-ODO-") !== false) {echo '<li><a href="#ODO">Ouvrages ou directions d&apos;ouvrages</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-ODOI-") !== false) {echo '<li><a href="#ODOI">Ouvrages ou directions d&apos;ouvrages de portée internationale</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-ODON-") !== false) {echo '<li><a href="#ODON">Ouvrages ou directions d&apos;ouvrages de portée nationale</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCV-") !== false) {echo '<li><a href="#OCV">Ouvrages ou chapitres de vulgarisation</a></li>';}
																				//if (isset($choix_ouvr) && strpos($choix_ouvr, "-CNR-") !== false) {echo '<li><a href="#CNR">Coordination de numéro de revue</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-OSYN-") !== false) {echo '<li><a href="#OSYN">Ouvrages de synthèse</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-MANU-") !== false) {echo '<li><a href="#MANU">Manuels</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-DICO-") !== false) {echo '<li><a href="#DICO">Dictionnaires ou encyclopédies</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-ECRI-") !== false) {echo '<li><a href="#ECRI">Éditions critiques</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-ACTC-") !== false) {echo '<li><a href="#ACTC">Actes de congrès / Proceedings / Recueil de communications</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-NUMR-") !== false) {echo '<li><a href="#NUMR">N° spécial de revue / N° thématique de revue / Dossier</a></li>';}
																				if (isset($choix_ouvr) && strpos($choix_ouvr, "-OPNV-") !== false) {echo '<li><a href="#OPNV">Publications non ventilées (ouvrages)</a></li>';}
																				
																				if (isset($choix_rapp) && strpos($choix_rapp, "-RAP-") !== false) {echo '<li><a href="#RAP">Rapports</a></li>';}
																				if (isset($choix_rapp) && strpos($choix_rapp, "-RAPR-") !== false) {echo '<li><a href="#RAPR">Rapports de recherche</a></li>';}
																				if (isset($choix_rapp) && strpos($choix_rapp, "-RAPT-") !== false) {echo '<li><a href="#RAPT">Rapports techniques</a></li>';}
																				if (isset($choix_rapp) && strpos($choix_rapp, "-RAPC-") !== false) {echo '<li><a href="#RAPC">Rapports conntrat/projet</a></li>';}
																				if (isset($choix_rapp) && strpos($choix_rapp, "-RAPE-") !== false) {echo '<li><a href="#RAPE">Rapports d&apos;expertise</a></li>';}
																				if (isset($choix_rapp) && strpos($choix_rapp, "-PGED-") !== false) {echo '<li><a href="#PGED">Plan de gestions de données (PGD)</a></li>';}
																				
																				if (isset($choix_imag) && strpos($choix_imag, "-IMG-") !== false) {echo '<li><a href="#IMG">Images</a></li>';}
																				if (isset($choix_imag) && strpos($choix_imag, "-PHOT-") !== false) {echo '<li><a href="#PHOT">Photographies</a></li>';}
																				if (isset($choix_imag) && strpos($choix_imag, "-DESS-") !== false) {echo '<li><a href="#DESS">Dessins</a></li>';}
																				if (isset($choix_imag) && strpos($choix_imag, "-ILLU-") !== false) {echo '<li><a href="#ILLU">Illustrations</a></li>';}
																				if (isset($choix_imag) && strpos($choix_imag, "-GRAV-") !== false) {echo '<li><a href="#GRAV">Gravures</a></li>';}
																				if (isset($choix_imag) && strpos($choix_imag, "-ISYN-") !== false) {echo '<li><a href="#ISYN">Images de synthèse</a></li>';}
																				
																				if (isset($choix_autr) && strpos($choix_autr, "-BRE-") !== false) {echo '<li><a href="#BRE">Brevets</a></li>';}
																				//if (isset($choix_autr) && strpos($choix_autr, "-RAP-") !== false) {echo '<li><a href="#RAP">Rapports</a></li>';}
																				if (isset($choix_autr) && strpos($choix_autr, "-THE-") !== false) {echo '<li><a href="#THE">Thèses</a></li>';}
																				if (isset($choix_autr) && strpos($choix_autr, "-HDR-") !== false) {echo '<li><a href="#HDR">HDR</a></li>';}
																				if (isset($choix_autr) && strpos($choix_autr, "-VID-") !== false) {echo '<li><a href="#VID">Vidéos</a></li>';}
																				//if (isset($choix_autr) && strpos($choix_autr, "-IMG-") !== false) {echo '<li><a href="#IMG">Images</a></li>';}
																				if (isset($choix_autr) && strpos($choix_autr, "-PWM-") !== false) {echo '<li><a href="#PWM">Preprints, working papers, manuscrits non publiés</a></li>';}
																				if (isset($choix_autr) && strpos($choix_autr, "-PREP-") !== false) {echo '<li><a href="#PREP">Preprints</a></li>';}
																				if (isset($choix_autr) && strpos($choix_autr, "-WORK-") !== false) {echo '<li><a href="#WORK">Working papers</a></li>';}
																				if (isset($choix_autr) && strpos($choix_autr, "-BLO-") !== false) {echo '<li><a href="#BLO">Articles de blog scientifique</a></li>';}
																				if (isset($choix_autr) && strpos($choix_autr, "-NED-") !== false) {echo '<li><a href="#NED">Notices d\'encyclopédie / Articles d\'encyclopédie</a></li>';}
																				if (isset($choix_autr) && strpos($choix_autr, "-TRA-") !== false) {echo '<li><a href="#TRA">Traductions</a></li>';}
																				if (isset($choix_autr) && strpos($choix_autr, "-LOG-") !== false) {echo '<li><a href="#LOG">Logiciels</a></li>';}
																				if (isset($choix_autr) && strpos($choix_autr, "-AP-") !== false) {echo '<li><a href="#AP">Autres publications</a></li>';}
																				echo '<li><a href="#BILAN">Bilan quantitatif</a></li>';
																				?>
																				</ul>