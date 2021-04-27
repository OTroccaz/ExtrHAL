																				<!-- Création de graphes -->
																				<?php
																				//Tableau de couleurs
																				//$tabCol = array('rgba(31, 119, 180, 1)', 'rgba(174, 199, 232, 1)', 'rgba(255, 127, 14, 1)', 'rgba(255, 187, 120, 1)', 'rgba(44, 60, 44, 1)', 'rgba(152, 223, 138, 1)', 'rgba(214, 39, 40, 1)', 'rgba(255, 152, 150, 1)', 'rgba(148, 103, 189, 1)', 'rgba(197, 176, 213, 1)', 'rgba(140, 86, 75, 1)', 'rgba(196, 156, 148, 1)', 'rgba(227, 119, 194, 1)', 'rgba(247, 182, 210, 1)', 'rgba(127, 127, 127, 1)', 'rgba(199, 199, 199, 1)', 'rgba(188, 189, 34, 1)', 'rgba(219, 219, 141, 1)', 'rgba(23, 190, 207, 1)', 'rgba(158, 218, 229, 1)');
																				$tabCol = array('rgba(78, 121, 167, 1)', 'rgba(160, 203, 232, 1)', 'rgba(242, 142, 43, 1)', 'rgba(255, 190, 125, 1)', 'rgba(89, 161, 79, 1)', 'rgba(140, 209, 125, 1)', 'rgba(182, 153, 45, 1)', 'rgba(241, 206, 99, 1)', 'rgba(73, 152, 148, 1)', 'rgba(134, 188, 182, 1)', 'rgba(225, 87, 89, 1)', 'rgba(225, 157, 154, 1)', 'rgba(121, 112, 110, 1)', 'rgba(186, 176, 172, 1)', 'rgba(211, 114, 149, 1)', 'rgba(250, 191, 210, 1)', 'rgba(176, 122, 161, 1)', 'rgba(212, 166, 200, 1)', 'rgba(157, 118, 196, 1)', 'rgba(215, 181, 166, 1)');
																				?>
																				<div class="row">
                                            <div class="col-12 justify-content-center">
                                                <div class="col-8 chartjs-chart">
																										<!-- Type de publication par année -->
																										<?php
																										$rTypeArr = array();
																										foreach($availableYears as $year => $nb){
																											$rYearArr[$year] = array();
																										}
																										foreach($numbers as $type => $yearNumbers){
																											array_push($rTypeArr, $type);
																											foreach($availableYears as $year => $nb){
																												if(array_key_exists($year,$yearNumbers)){
																													array_push($rYearArr[$year], $yearNumbers[$year]);
																												} else {
																													array_push($rYearArr[$year], 'VOID');
																												}
																											}
																										}
																										?>
																										<canvas id="typepubliparannees" width="500" height="280" class="border border-gray p-1"></canvas>
																										<script>
																												new Chart(document.getElementById("typepubliparannees"), {
																														type: 'bar',
																														data: {
																															labels: <?php echo json_encode($rTypeArr);?>,
																															datasets: [
																															<?php
																															$col = 0;
																															foreach($availableYears as $year => $nb){
																																echo '{';
																																echo 'label: "'.$year.'",';
																																echo 'data: '.json_encode($rYearArr[$year]).',';
																																echo 'backgroundColor: "'.$tabCol[$col].'"';
																																echo '},';
																																$col++;
																															}
																															?>
																															]
																														},
																														options: {
																															legend: { display: true },
																															title: {
																																display: true,
																																text: 'Type de publication par année<?php echo $detail;?>',
																																fontStyle: 'bold',
																																fontSize: 18
																															},
																															scales: {
																																yAxes: [{
																																	ticks: {
																																		min: 0
																																	},
																																	scaleLabel: {
																																		display: true,
																																		labelString: 'Nombre',
																																		fontStyle: 'bold',
																																		fontSize: 16
																																	}
																																}],
																																xAxes: [{
																																	scaleLabel: {
																																		display: true,
																																		labelString: 'Type de publication',
																																		fontStyle: 'bold',
																																		fontSize: 16
																																	}
																																}]
																															}
																														}
																												});
																										</script>
                                                </div>
																								<br><br>
																								
																								<div class="col-8 chartjs-chart">
																										<!-- Année par type de publication -->
																										<?php
																										$rYearArr = array();
																										foreach($numbers as $type => $yearNumbers){
																											$rTypeArr[$type] = array();
																										}
																										//foreach($numbers as $rType => $yearNumbers){
																										foreach($availableYears as $year => $nb){
																											array_push($rYearArr, $year);
																											//foreach($availableYears as $year => $nb){
																											foreach($numbers as $type => $yearNumbers){
																												if(array_key_exists($year,$yearNumbers)){
																													array_push($rTypeArr[$type], $yearNumbers[$year]);
																												} else {
																													array_push($rTypeArr[$type], 'VOID');
																												}
																											}
																										}
																										?>

																										<canvas id="annepartypepubli" width="500" height="280" class="border border-gray p-1"></canvas>
																										<script>
																												new Chart(document.getElementById("annepartypepubli"), {
																														type: 'bar',
																														data: {
																															labels: <?php echo json_encode($rYearArr);?>,
																															datasets: [
																															<?php
																															$col = 0;
																															foreach($numbers as $rType => $yearNumbers){
																																echo '{';
																																echo 'label: "'.$rType.'",';
																																echo 'data: '.json_encode($rTypeArr[$rType]).',';
																																echo 'backgroundColor: "'.$tabCol[$col].'"';
																																echo '},';
																																$col++;
																															}
																															?>
																															]
																														},
																														options: {
																															legend: { display: true },
																															title: {
																																display: true,
																																text: 'Année par type de publication<?php echo $detail;?>',
																																fontStyle: 'bold',
																																fontSize: 18
																															},
																															scales: {
																																yAxes: [{
																																	ticks: {
																																		min: 0
																																	},
																																	scaleLabel: {
																																		display: true,
																																		labelString: 'Nombre',
																																		fontStyle: 'bold',
																																		fontSize: 16
																																	}
																																}],
																																xAxes: [{
																																	scaleLabel: {
																																		display: true,
																																		labelString: 'Année',
																																		fontStyle: 'bold',
																																		fontSize: 16
																																	}
																																}]
																															}
																														}
																												});
																										</script>
                                                </div>
																								<br><br>
																				
																								<?php
																								//Si choix sur tous les articles, camembert avec détails
																								if (isset($choix_publis) && strpos($choix_publis, "-TA-") !== false) {
																									
																									 if (isset($idhal) && $idhal != "") {
																										 $atester = "authIdHal_s:".$collCode_s;
																										 $atesteropt = "";
																									 }else{
																										 if (isset($refint) && $refint != "") {
																											 $tstRefint = "%22".$refint."%22";
																											 if (strpos($refint, "~") !== false) {
																												 $tstRefint = "(";
																												 $tabRefint = explode("~", $refint);
																												 foreach($tabRefint as $ri) {
																													 $tstRefint .= "%22".$ri."%22%20OR%20";
																												 }
																												 $tstRefint = substr($tstRefint, 0, -8);
																												 $tstRefint .= ")";
																											 }
																											 if (strtolower($collCode_s) == "entrez le code de votre collection") {$collCode_s = "";}
																											 if ($teamInit != "") {
																												 $atester = "collCode_s:".$teamInit;
																												 $atesteropt = "%20AND%20localReference_t:".$tstRefint;
																											 }else{
																												 if ($idst != "") {
																													 $atester = "structId_i:".$idst;
																													 $atesteropt = "%20AND%20localReference_t:".$tstRefint;
																												 }else{
																													 $atester = "";
																													 $atesteropt = "localReference_t:".$tstRefint;
																												 }
																											 }
																										 }else{
																											 if ($idst != "") {
																												 $atester = "structId_i:".$idst;
																												 $atesteropt = "";
																											 }else{
																												 $atester = "collCode_s:".$teamInit;
																												 $atesteropt = "";
																											 }
																										 }
																									 }
																									$atesteropt = str_replace(" ", "%20", $atesteropt);
																									$contents = file_get_contents($root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:ART%20AND%20audience_s:2%20AND%20peerReviewing_s:1%20AND%20producedDateY_i:".$year);

																									$ACLRItot = 0;
																									$ACLRNtot = 0;
																									$ASCLRItot = 0;
																									$ASCLRNtot = 0;
																									$yearMS = array();
																									
																									foreach($availableYears as $year => $nb){
																										$yearMS[] = $year;
																										$contents = file_get_contents($root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:ART%20AND%20NOT%20popularLevel_s:1%20AND%20audience_s:2%20AND%20peerReviewing_s:1%20AND%20producedDateY_i:".$year);
																										//echo $root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester."%20AND%20docType_s:ART%20AND%20audience_s:2%20AND%20peerReviewing_s:1%20AND%20producedDateY_i:".$year;
																										$results = json_decode($contents);
																										$ACLRI=$results->response->numFound;
																										$ACLRItot+=$results->response->numFound;

																										$contents = file_get_contents($root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:ART%20AND%20(audience_s:3%20OR%20audience_s:0%20OR%20audience_s:1)%20AND%20peerReviewing_s:1%20AND%20producedDateY_i:".$year);
																										$results = json_decode($contents);
																										$ACLRN=$results->response->numFound;
																										$ACLRNtot+=$results->response->numFound;

																										$contents = file_get_contents($root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:ART%20AND%20NOT%20popularLevel_s:1%20AND%20audience_s:2%20AND%20peerReviewing_s:0%20AND%20producedDateY_i:".$year);
																										$results = json_decode($contents);
																										$ASCLRI=$results->response->numFound;
																										$ASCLRItot+=$results->response->numFound;

																										$contents = file_get_contents($root."://api.archives-ouvertes.fr/search/".$institut."?q=".$atester.$atesteropt."%20AND%20docType_s:ART%20AND%20(audience_s:3%20OR%20audience_s:0%20OR%20audience_s:1)%20AND%20peerReviewing_s:0%20AND%20producedDateY_i:".$year);
																										$results = json_decode($contents);
																										$ASCLRN=$results->response->numFound;
																										$ASCLRNtot+=$results->response->numFound;
																										
																										if ($ACLRI != 0 || $ACLRN != 0 || $ASCLRI != 0 || $ASCLRN != 0) {
																										?>
																												<div class="col-8 chartjs-chart">
																														<!-- Détail TA -->
																														<canvas id="detail<?php echo $year;?>" width="500" height="280" class="border border-gray p-1"></canvas>
																														<script>
																																new Chart(document.getElementById("detail<?php echo $year;?>"), {
																																		type: 'pie',
																																		data: {
																																			labels: ["ACLRI","ACLRN","ASCLRI","ASCLRN"],
																																			datasets: [
																																			<?php
																																			$arpTab= array($ACLRI,$ACLRN,$ASCLRI,$ASCLRN);
																																			$arpTab = array_map(function($value) {
																																						return intval($value);
																																				}, $arpTab);
																																			echo '{';
																																			echo 'label: "'.$rType.'",';
																																			echo 'data: '.json_encode($arpTab).',';
																																			echo 'backgroundColor: '.json_encode($tabCol);
																																			echo '},';
																																			?>
																																			]
																																		},
																																		options: {
																																			legend: { display: true },
																																			title: {
																																				display: true,
																																				text: 'Détail TA <?php echo $year.$detail;?>',
																																				fontStyle: 'bold',
																																				fontSize: 18
																																			},
																																			tooltips: {
																																				callbacks: {
																																					label: function(tooltipItem, data) {
																																						var allData = data.datasets[tooltipItem.datasetIndex].data;
																																						var tooltipLabel = data.labels[tooltipItem.index];
																																						var tooltipData = allData[tooltipItem.index];
																																						var total = 0;
																																						for (var i in allData) {
																																							total += parseFloat(allData[i]);
																																						}
																																						var tooltipPercentage = Math.round((tooltipData / total) * 100);
																																						return tooltipLabel + ': ' + tooltipData + ' (' + tooltipPercentage + '%)';
																																					}
																																				}
																																			}
																																		}
																																});
																														</script>
																												</div>
																												<br><br>
																										<?php																										
																										}
																									}
																									
																									//Graphes détail avec moyenne et somme des différentes années
																									if(count($availableYears) > 1) {
																										$ACLRImoy = $ACLRItot/count($availableYears);
																										$ACLRNmoy = $ACLRNtot/count($availableYears);
																										$ASCLRImoy = $ASCLRItot/count($availableYears);
																										$ASCLRNmoy = $ASCLRNtot/count($availableYears);
																										
																										$arpTabmoy = array($ACLRImoy,$ACLRNmoy,$ASCLRImoy,$ASCLRNmoy);
																										$arpTabmoy = array_map(function($value) {
																													return intval($value);
																											}, $arpTabmoy);
																											
																										$arpTabtot = [$ACLRItot,$ACLRNtot,$ASCLRItot,$ASCLRNtot];
																										$arpTabtot = array_map(function($value) {
																													return intval($value);
																											}, $arpTabtot);
																										
																										$anneeFin = count($yearMS) - 1;
																										$txttit = $yearMS[0].'-'.$yearMS[$anneeFin].$detail;
																									?>
																										<div class="col-8 chartjs-chart">
																												<!-- Détail moyenne des différentes années -->
																												<canvas id="moyenne" width="500" height="280" class="border border-gray p-1"></canvas>
																												<script>
																														new Chart(document.getElementById("moyenne"), {
																																type: 'pie',
																																data: {
																																	labels: ["ACLRI","ACLRN","ASCLRI","ASCLRN"],
																																	datasets: [
																																	<?php
																																	echo '{';
																																	echo 'label: "'.$rType.'",';
																																	echo 'data: '.json_encode($arpTabmoy).',';
																																	echo 'backgroundColor: '.json_encode($tabCol);
																																	echo '},';
																																	?>
																																	]
																																},
																																options: {
																																	legend: { display: true },
																																	title: {
																																		display: true,
																																		text: 'Moyenne détail TA <?php echo $txttit?>',
																																		fontStyle: 'bold',
																																		fontSize: 18
																																	},
																																	tooltips: {
																																		callbacks: {
																																			label: function(tooltipItem, data) {
																																				var allData = data.datasets[tooltipItem.datasetIndex].data;
																																				var tooltipLabel = data.labels[tooltipItem.index];
																																				var tooltipData = allData[tooltipItem.index];
																																				var total = 0;
																																				for (var i in allData) {
																																					total += parseFloat(allData[i]);
																																				}
																																				var tooltipPercentage = Math.round((tooltipData / total) * 100);
																																				return tooltipLabel + ': ' + tooltipData + ' (' + tooltipPercentage + '%)';
																																			}
																																		}
																																	}
																																}
																														});
																												</script>
																										</div>
																										<br><br>
																										
																										<div class="col-8 chartjs-chart">
																												<!-- Détail somme des différentes années -->
																												<canvas id="somme" width="500" height="280" class="border border-gray p-1"></canvas>
																												<script>
																														new Chart(document.getElementById("somme"), {
																																type: 'pie',
																																data: {
																																	labels: ["ACLRI","ACLRN","ASCLRI","ASCLRN"],
																																	datasets: [
																																	<?php
																																	echo '{';
																																	echo 'label: "'.$rType.'",';
																																	echo 'data: '.json_encode($arpTabtot).',';
																																	echo 'backgroundColor: '.json_encode($tabCol);
																																	echo '},';
																																	?>
																																	]
																																},
																																options: {
																																	legend: { display: true },
																																	title: {
																																		display: true,
																																		text: 'Somme détail TA <?php echo $txttit;?>',
																																		fontStyle: 'bold',
																																		fontSize: 18
																																	},
																																	tooltips: {
																																		callbacks: {
																																			label: function(tooltipItem, data) {
																																				var allData = data.datasets[tooltipItem.datasetIndex].data;
																																				var tooltipLabel = data.labels[tooltipItem.index];
																																				var tooltipData = allData[tooltipItem.index];
																																				var total = 0;
																																				for (var i in allData) {
																																					total += parseFloat(allData[i]);
																																				}
																																				var tooltipPercentage = Math.round((tooltipData / total) * 100);
																																				return tooltipLabel + ': ' + tooltipData + ' (' + tooltipPercentage + '%)';
																																			}
																																		}
																																	}
																																}
																														});
																												</script>
																										</div>
																										<br><br>
																									<?php
																									}
																								}
																								?>
																								
																								<?php
																								foreach($numbers as $rType => $yearNumbers){
																									switch($rType) {
																										case "TA":
																											echo '&nbsp;&nbsp;&nbsp;TA = Tous les articles (sauf vulgarisation)'.$cpmlng.$detail.'<br>';
																											break;
																										case "ACL" :
																											echo '&nbsp;&nbsp;&nbsp;ACL = Articles de revues à comité de lecture'.$cpmlng.$detail.'<br>';
																											break;
																										case "ASCL" :
																											echo '&nbsp;&nbsp;&nbsp;ASCL = Articles de revues sans comité de lecture'.$cpmlng.$detail.'<br>';
																											break;
																										case "ARI" :
																											echo '&nbsp;&nbsp;&nbsp;ARI = Articles de revues internationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "ARN" :
																											echo '&nbsp;&nbsp;&nbsp;ARN = Articles de revues nationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "ACLRI" :
																											echo '&nbsp;&nbsp;&nbsp;ACLRI = Articles de revues internationales à comité de lecture'.$cpmlng.$detail.'<br>';
																											break;
																										case "ACLRN" :
																											echo '&nbsp;&nbsp;&nbsp;ACLRN = Articles de revues nationales à comité de lecture'.$cpmlng.$detail.'<br>';
																											break;
																										case "ASCLRI" :
																											echo '&nbsp;&nbsp;&nbsp;ASCLRI = Articles de revues internationales sans comité de lecture'.$cpmlng.$detail.'<br>';
																											break;
																										case "ASCLRN" :
																											echo '&nbsp;&nbsp;&nbsp;ASCLRN = Articles de revues nationales sans comité de lecture'.$cpmlng.$detail.'<br>';
																											break;
																										case "AV" :
																											echo '&nbsp;&nbsp;&nbsp;AV = Articles de vulgarisation'.$cpmlng.$detail.'<br>';
																											break;
																										case "APNV" :
																											echo '&nbsp;&nbsp;&nbsp;APNV = Publications non ventilées (articles)'.$cpmlng.$detail.'<br>';
																											break;
																										case "TC" :
																											echo '&nbsp;&nbsp;&nbsp;TC = Toutes les communications (sauf grand public)'.$cpmlng.$detail.'<br>';
																											break;
																										case "CA" :
																											echo '&nbsp;&nbsp;&nbsp;CA = Communications avec actes'.$cpmlng.$detail.'<br>';
																											break;
																										case "CSA" :
																											echo '&nbsp;&nbsp;&nbsp;CSA = Communications sans actes'.$cpmlng.$detail.'<br>';
																											break;
																										case "CI" :
																											echo '&nbsp;&nbsp;&nbsp;CI = Communications internationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "CN" :
																											echo '&nbsp;&nbsp;&nbsp;CN = Communications nationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "CAI" :
																											echo '&nbsp;&nbsp;&nbsp;CAI = Communications avec actes internationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "CSAI" :
																											echo '&nbsp;&nbsp;&nbsp;CSAI = Communications sans actes internationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "CAN" :
																											echo '&nbsp;&nbsp;&nbsp;CAN = Communications avec actes nationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "CSAN" :
																											echo '&nbsp;&nbsp;&nbsp;CSAN = Communications sans actes nationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "CINVASANI" :
																											echo '&nbsp;&nbsp;&nbsp;CINVASANI = Communications invitées avec ou sans actes, nationales ou internationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "CINVA" :
																											echo '&nbsp;&nbsp;&nbsp;CINVA = Communications invitées avec actes'.$cpmlng.$detail.'<br>';
																											break;
																										case "CINVSA" :
																											echo '&nbsp;&nbsp;&nbsp;CINVSA = Communications invitées sans actes'.$cpmlng.$detail.'<br>';
																											break;
																										case "CNONINVA" :
																											echo '&nbsp;&nbsp;&nbsp;CNONINVA = Communications non invitées avec actes'.$cpmlng.$detail.'<br>';
																											break;
																										case "CNONINVSA" :
																											echo '&nbsp;&nbsp;&nbsp;CNONINVSA = Communications non invitées sans actes'.$cpmlng.$detail.'<br>';
																											break;
																										case "CINVI" :
																											echo '&nbsp;&nbsp;&nbsp;CINVI = Communications invitées internationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "CNONINVI" :
																											echo '&nbsp;&nbsp;&nbsp;CNONINVI = Communications non invitées internationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "CINVN" :
																											echo '&nbsp;&nbsp;&nbsp;CINVN = Communications invitées nationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "CNONINVN" :
																											echo '&nbsp;&nbsp;&nbsp;CNONINVN = Communications non invitées nationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "CPASANI" :
																											echo '&nbsp;&nbsp;&nbsp;CPASANI = Communications par affiches (posters) avec ou sans actes, nationales ou internationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "CPA" :
																											echo '&nbsp;&nbsp;&nbsp;CPA = Communications par affiches (posters) avec actes'.$cpmlng.$detail.'<br>';
																											break;
																										case "CPSA" :
																											echo '&nbsp;&nbsp;&nbsp;CPSA = Communications par affiches (posters) sans actes'.$cpmlng.$detail.'<br>';
																											break;
																										case "CPI" :
																											echo '&nbsp;&nbsp;&nbsp;CPI = Communications par affiches internationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "CPN" :
																											echo '&nbsp;&nbsp;&nbsp;CPN = Communications par affiches nationales'.$cpmlng.$detail.'<br>';
																											break;
																										case "CGP" :
																											echo '&nbsp;&nbsp;&nbsp;CGP = Conférences grand public'.$cpmlng.$detail.'<br>';
																											break;
																										case "CPNV" :
																											echo '&nbsp;&nbsp;&nbsp;CPNV = Publications non ventilées (conférences)'.$cpmlng.$detail.'<br>';
																											break;
																										case "OCDO" :
																											echo '&nbsp;&nbsp;&nbsp;OCDO = Ouvrages ou chapitres ou directions d&apos;ouvrages'.$cpmlng.$detail.'<br>';
																											break;
																										case "OCDOI" :
																											echo '&nbsp;&nbsp;&nbsp;OCDOI = Ouvrages ou chapitres ou directions d&apos;ouvrages de portée internationale'.$cpmlng.$detail.'<br>';
																											break;
																										case "OCDON" :
																											echo '&nbsp;&nbsp;&nbsp;OCDON = Ouvrages ou chapitres ou directions d&apos;ouvrages de portée nationale'.$cpmlng.$detail.'<br>';
																											break;
																										case "TO" :
																											echo '&nbsp;&nbsp;&nbsp;TO = Tous les ouvrages (sauf vulgarisation)'.$cpmlng.$detail.'<br>';
																											break;
																										case "OSPI" :
																											echo '&nbsp;&nbsp;&nbsp;OSPI = Ouvrages scientifiques de portée internationale'.$cpmlng.$detail.'<br>';
																											break;
																										case "OSPN" :
																											echo '&nbsp;&nbsp;&nbsp;OSPN = Ouvrages scientifiques de portée nationale'.$cpmlng.$detail.'<br>';
																											break;
																										case "COS" :
																											echo '&nbsp;&nbsp;&nbsp;COS = Chapitres d&apos;ouvrages scientifiques'.$cpmlng.$detail.'<br>';
																											break;
																										case "COSI" :
																											echo '&nbsp;&nbsp;&nbsp;COSI = Chapitres d&apos;ouvrages scientifiques de portée internationale'.$cpmlng.$detail.'<br>';
																											break;
																										case "COSN" :
																											echo '&nbsp;&nbsp;&nbsp;COSN = Chapitres d&apos;ouvrages scientifiques de portée nationale'.$cpmlng.$detail.'<br>';
																											break;
																										case "DOS" :
																											echo '&nbsp;&nbsp;&nbsp;DOS = Directions d&apos;ouvrages scientifiques'.$cpmlng.$detail.'<br>';
																											break;
																										case "DOSI" :
																											echo '&nbsp;&nbsp;&nbsp;DOSI = Directions d&apos;ouvrages scientifiques de portée internationale'.$cpmlng.$detail.'<br>';
																											break;
																										case "DOSN" :
																											echo '&nbsp;&nbsp;&nbsp;DOSN = Directions d&apos;ouvrages scientifiques de portée nationale'.$cpmlng.$detail.'<br>';
																											break;
																										case "OCO" :
																											echo '&nbsp;&nbsp;&nbsp;OCO = Ouvrages ou chapitres d&apos;ouvrages'.$cpmlng.$detail.'<br>';
																											break;
																										case "OCOI" :
																											echo '&nbsp;&nbsp;&nbsp;OCOI = Ouvrages ou chapitres d&apos;ouvrages de portée internationale'.$cpmlng.$detail.'<br>';
																											break;
																										case "OCON" :
																											echo '&nbsp;&nbsp;&nbsp;OCON = Ouvrages ou chapitres d&apos;ouvrages de portée nationale'.$cpmlng.$detail.'<br>';
																											break;
																										case "ODO" :
																											echo '&nbsp;&nbsp;&nbsp;ODO = Ouvrages ou directions d&apos;ouvrages'.$cpmlng.$detail.'<br>';
																											break;
																										case "ODOI" :
																											echo '&nbsp;&nbsp;&nbsp;ODOI = Ouvrages ou directions d&apos;ouvrages de portée internationale'.$cpmlng.$detail.'<br>';
																											break;
																										case "ODON" :
																											echo '&nbsp;&nbsp;&nbsp;ODON = Ouvrages ou directions d&apos;ouvrages de portée nationale'.$cpmlng.$detail.'<br>';
																											break;
																										case "OCV" :
																											echo '&nbsp;&nbsp;&nbsp;OCV = Ouvrages ou chapitres de vulgarisation'.$cpmlng.$detail.'<br>';
																											break;
																										case "CNR" :
																											echo '&nbsp;&nbsp;&nbsp;CNR = Coordination de numéro de revue'.$cpmlng.$detail.'<br>';
																											break;
																										case "OPNV" :
																											echo '&nbsp;&nbsp;&nbsp;OPNV = Publications non ventilées (ouvrages)'.$cpmlng.$detail.'<br>';
																											break;
																										case "BRE" :
																											echo '&nbsp;&nbsp;&nbsp;BRE = Brevets'.$cpmlng.$detail.'<br>';
																											break;
																										case "RAP" :
																											echo '&nbsp;&nbsp;&nbsp;RAP = Rapports'.$cpmlng.$detail.'<br>';
																											break;
																										case "THE" :
																											echo '&nbsp;&nbsp;&nbsp;THE = Thèses'.$cpmlng.$detail.'<br>';
																											break;
																										case "HDR" :
																											echo '&nbsp;&nbsp;&nbsp;HDR = HDR'.$cpmlng.$detail.'<br>';
																											break;
																										case "VID" :
																											echo '&nbsp;&nbsp;&nbsp;VID = Vidéos'.$cpmlng.$detail.'<br>';
																											break;
																										case "PWM" :
																											echo '&nbsp;&nbsp;&nbsp;PWM = Preprints, working papers, manuscrits non publiés'.$cpmlng.$detail.'<br>';
																											break;
																										case "CRO" :
																											echo '&nbsp;&nbsp;&nbsp;CRO = Comptes rendus d\'ouvrage ou notes de lecture'.$cpmlng.$detail.'<br>';
																											break;
																										case "BLO" :
																											echo '&nbsp;&nbsp;&nbsp;BLO = Billets de blog'.$cpmlng.$detail.'<br>';
																											break;
																										case "NED" :
																											echo '&nbsp;&nbsp;&nbsp;NED = Notices d\'encyclopédie ou dictionnaire'.$cpmlng.$detail.'<br>';
																											break;
																										case "TRA" :
																											echo '&nbsp;&nbsp;&nbsp;TRA = Traductions'.$cpmlng.$detail.'<br>';
																											break;
																										case "LOG" :
																											echo '&nbsp;&nbsp;&nbsp;LOG = Logiciels'.$cpmlng.$detail.'<br>';
																											break;
																										case "AP" :
																											echo '&nbsp;&nbsp;&nbsp;AP = Autres publications'.$cpmlng.$detail.'<br>';
																											break;
																									}
																								}
																								if (isset($choix_publis) && strpos($choix_publis, "-TA-") !== false) {
																									echo '&nbsp;&nbsp;&nbsp;ACLRI = Articles de revues internationales à comité de lecture'.$cpmlng.$detail.'<br>';
																									echo '&nbsp;&nbsp;&nbsp;ACLRN = Articles de revues nationales à comité de lecture'.$cpmlng.$detail.'<br>';
																									echo '&nbsp;&nbsp;&nbsp;ASCLRI = Articles de revues internationales sans comité de lecture'.$cpmlng.$detail.'<br>';
																									echo '&nbsp;&nbsp;&nbsp;ASCLRN = Articles de revues nationales sans comité de lecture'.$cpmlng.$detail.'<br>';
																								}

																								//Nombre de publications croisées par équipe sur la période
																								$graphe = "";
																								$iGR = 0;
																								$testT = "non";
																								$testI = "non";
																								if (isset($team) && $team != "" && isset($gr)) {
																									if (strpos($gr, $team) !== false) {$$testT = "oui";}
																								}
																								if (isset($idst) && $idst != "" && isset($gr)) {
																									if (strpos($gr, $idst) !== false) {$$testI = "oui";}
																								}
																								foreach($numbers as $rType => $yearNumbers){
																									$nomeqpArr = array();
																									$croresArr = array();
																									if ($testT == "oui" || $testI == "oui") {//GR
																										$graphe = "non";
																										for($j=1;$j<count($crores[$rType]);$j++) {
																											if($crores[$rType][$j] != 0){
																												$graphe = "oui";
																											}
																										}
																										
																										if ($typexc == "oui") {$graphe = "non";}//Ne pas afficher les graphes des publications croisées si le but était de ne pas afficher les publications de certaines équipes
																											
																										if ($graphe == "oui") {
																											//Calcul des totaux
																											$croTotal = array();
																											
																											echo '<br><br>';
																											
																											$i = 0;
																											for($i=0;$i<count($crores[$rType]);$i++) {
																												$j = $i+1;
																												array_push($nomeqpArr, $nomeqp[$j]);
																												if($crores[$rType][$j] != 0){
																													array_push($croresArr, (int)$crores[$rType][$j]);
																												} else {
																													array_push($croresArr, 'VOID');
																												}
																											}
																											$croresArr = array_map(function($value) {
																													return intval($value);
																											}, $croresArr);
																										?>
																										<div class="col-8 chartjs-chart">
																												<canvas id="publicroisees<?php echo $rType;?>" width="500" height="280" class="border border-gray p-1"></canvas>
																												<script>
																														new Chart(document.getElementById("publicroisees<?php echo $rType;?>"), {
																																type: 'bar',
																																data: {
																																	labels: <?php echo json_encode($nomeqpArr);?>,
																																	datasets: [
																																	<?php
																																	echo '{';
																																	echo 'label: "",';
																																	echo 'data: '.json_encode($croresArr).',';
																																	echo 'backgroundColor: '.json_encode($tabCol);
																																	echo '},';
																																	?>
																																	]
																																},
																																options: {
																																	legend: { display: false },
																																	title: {
																																		display: true,
																																		text: 'Nombre global de publications croisées de type <?php echo $rType?> par équipe',
																																		fontStyle: 'bold',
																																		fontSize: 18
																																	},
																																	scales: {
																																		yAxes: [{
																																			ticks: {
																																				min: 0
																																			},
																																			scaleLabel: {
																																				display: true,
																																				labelString: 'Nombre',
																																				fontStyle: 'bold',
																																				fontSize: 16
																																			}
																																		}],
																																		xAxes: [{
																																			scaleLabel: {
																																				display: true,
																																				labelString: 'Equipe',
																																				fontStyle: 'bold',
																																				fontSize: 16
																																			}
																																		}]
																																	}
																																}
																														});
																												</script>
																										</div>
																										<br><br>
																							

																								<?php
																								}
																							}
																							$iGR++;
																						}

																						if ($graphe == "oui") {
																							echo 'Ce(s) graphe(s) est(sont) généré(s) lors d\'une numérotation/codification par équipe :<br>';
																							echo '. Dans le cas d\'une extraction pour une unité, il représente l\'ensemble des publications croisées identifiées pour chaque équipe.<br>';
																							echo '. Dans le cas d\'une extraction pour une équipe, il représente le nombre de publications croisées de cette équipe et celui des autres équipes concernées en regard.';
																							echo 'Les sommes respectives ne sont pas forcément égales car une même publication croisée peut concerner plus de deux équipes : elle comptera alors pour 1 pour l\'équipe concernée par l\'extraction,';
																							echo 'mais également pour 1 pour chacune des autres équipes associées.<br><br>';
																							//echo '<center><table cellpadding="5" width="80%"><tr><td width="45%" valign="top" style="text-align: justify;"><em>Pour illuster ce dernier cas, l\'exemple ci-contre représente l\'extraction des publications de l\'équipe GR2 dans une unité comportant quatre équipes. GR2 compte ainsi un total de 6 publications croisées: précisément, 3 avec GR1 seule, 1 avec GR3 seule, 1 avec GR1 et GR3, et 1 avec GR1 et GR4, d\'où, globalement, 5 avec GR1, 2 avec GR3 et 1 avec GR4.</em></td><td>&nbsp;&nbsp;&nbsp;<img alt="Exemple" src="HAL_exemple.jpg"></td></tr></table></center><br><br>';
																						}
																						?>
																						</div>
																				</div>