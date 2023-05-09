                                        <?php
																				// récupération de l'adresse IP du client (on cherche d'abord à savoir s'il est derrière un proxy)
																				if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
																					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
																				}elseif(isset($_SERVER['HTTP_CLIENT_IP'])) {
																					$ip = $_SERVER['HTTP_CLIENT_IP'];
																				}else {
																					$ip = $_SERVER['REMOTE_ADDR'];
																				}
																				?>
																				<form method="POST" accept-charset="utf-8" name="extrhal" action="ExtrHAL.php#sommaire" class="form-horizontal">
                                            <div class="border border-gray rounded p-2 mb-2">
																							<div class="border border-gray rounded p-2 mb-2">
																								<div class="form-group row mb-1">
																										<label for="team" class="col-12 col-md-3 col-form-label font-weight-bold">
																										Code collection HAL
																										</label>
																										
																										<div class="col-12 col-md-9">
																												<div class="input-group">
																														<div class="input-group-prepend">
																																<button type="button" tabindex="0" class="btn btn-info" data-html="true" data-toggle="popover" data-trigger="focus" title="" data-content='Code visible dans l&apos;URL d&apos;une collection.
																								Exemple IPR-MOL est le code de la collection http://hal.archives-ouvertes.fr/ <span class="font-weight-bold">IPR-PMOL</span> de l&apos;équipe Physique moléculaire de l&apos;unité IPR UMR CNRS 6251' data-original-title="">
																																<i class="mdi mdi-help text-white"></i>
																																</button>
																														</div>
																														
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
																														
																														<input type="text" id="team" name="team" class="form-control"  value="<?php echo $team1;?>" onclick="this.value='<?php echo $team2;?>';" onkeydown="document.getElementById('idhal').value = ''; document.getElementById('evhal').value = ''; document.getElementById('idst').value = '';">
																												<a class="ml-2 small" target="_blank" rel="noopener noreferrer" href="https://hal-univ-rennes1.archives-ouvertes.fr/page/codes-collections">Trouvez le code<br>de mon équipe / labo</a>
																												</div>

																												
																										</div>
																								</div> <!-- .form-group -->
																								<div class="form-group row mb-1">
																									<div class="col-12">
																											ou
																									</div>
																								</div> <!-- .form-group -->
																								<div class="form-group row mb-1">
																									<label for="idst" class="col-12 col-md-3 col-form-label font-weight-bold">
																									Identifiant HAL de la structure
																									</label>
																									
																									<div class="col-12 col-md-9">
																												<div class="input-group">
																														<div class="input-group-prepend">
																																<button type="button" tabindex="0" class="btn btn-info" data-html="true" data-toggle="popover" data-trigger="focus" title="" data-content='Identifiant HAL de la structure - Exemple 480855' data-original-title="">
																																<i class="mdi mdi-help text-white"></i>
																																</button>
																														</div>
																														
																														<?php
																														if (!isset($listaut)) {$listaut = "";}
																														?>
																														
																														<input type="text" id="idst" name="idst" class="form-control"  value="<?php echo $idst;?>" onkeydown="document.getElementById('idhal').value = ''; document.getElementById('evhal').value = ''; document.getElementById('team').value = '';">
																														<a class="ml-2 small" target="_blank" rel="noopener noreferrer" href="https://aurehal.archives-ouvertes.fr/structure/">Trouvez l'identifiant<br>de votre équipe / labo</a>
																												</div>

																												
																										</div>
																								</div> <!-- .form-group -->
																							</div> <!-- end border grey -->
																							
																							<div class="form-group row mb-1">
																									<div class="col-12">
																											et/ou
																									</div>
																							</div> <!-- .form-group -->
																							
																							<div class="border border-gray rounded p-2 mb-2">
																								<div class="form-group row mb-1">
																										<label for="refint" class="col-12 col-md-3 col-form-label font-weight-bold">
																										Champ HAL "référence interne" (mots séparés par des tildes ~)
																										
																										</label>
																										
																										<div class="col-12 col-md-9">
																												<div class="input-group">
																														<div class="input-group-prepend">
																																<button type="button" tabindex="0" class="btn btn-info" data-html="true" data-toggle="popover" data-trigger="focus" title="" data-content="Champ référence(s) interne(s) des dépôts HAL. Exemple IMoPA hospitalière~activité hospitalière IMoPA~IMOPA - Activité hospitalière" data-original-title="">
																																<i class="mdi mdi-help text-white"></i>
																																</button>
																														</div>
																														<input type="text" id="refint" name="refint" class="form-control"  value="<?php echo $refint;?>" onkeydown="document.getElementById('idhal').value = ''; document.getElementById('evhal').value = ''; document.getElementById('idst').value = '';">
																												</div>
																										</div>
																								</div> <!-- .form-group -->
																							</div> <!-- end border grey -->

																							<div class="form-group row mb-1">
																									<label for="listaut" class="col-12 col-md-3 col-form-label font-weight-bold pt-0">
																									Labo, équipe ou tutelle des auteurs à souligner (séparés par des tildes ~)  - <a target="_blank" rel="noopener noreferrer" href="https://aurehal.archives-ouvertes.fr/structure/">Vérifiez le nom dans AuréHAL</a>
																									</label>
																									
																									<div class="col-12 col-md-9">
																											<div class="input-group">
																													<div class="input-group-prepend">
																															<button type="button" tabindex="0" class="btn btn-info" data-html="true" data-toggle="popover" data-trigger="focus" title="Exemple" data-content="Indiquez ici l'id AuréHAL, le nom ou l'acronyme de votre unité, selon que vous souhaitez mettre en évidence le nom des auteurs de l'unité.  Exemple 928~ECOBIO~575446" data-original-title="">
																															<i class="mdi mdi-help text-white"></i>
																													</button>
																											</div>
																											<input type="text" id="listaut" name="listaut" class="form-control"  value="<?php echo urldecode($listaut);?>">
																											
																									</div>
																											
																									</div>
																							</div><!-- .form-group -->
																						</div> <!-- end border grey -->

                                            <div class="form-group row mb-1">
                                                <div class="col-12">
                                                    <h3 class="d-inline-block border-bottom border-primary text-primary">OU</h3>
                                                </div>
                                            </div> <!-- .form-group -->

                                            <div class="border border-gray rounded p-2 mb-2">
																							<div class="form-group row mb-1">
																									<label for="idhal" class="col-12 col-md-3 col-form-label font-weight-bold pt-0">
																									Identifiant auteur HAL
																									</label>
																									
																									<div class="col-12 col-md-9">
																											<div class="input-group">
																													<div class="input-group-prepend">
																															<button type="button" tabindex="0" class="btn btn-info" data-html="true" data-toggle="popover" data-trigger="focus" title="Pour une requête sur plusieurs IdHAL" data-content="Mettre entre parenthèses, et remplacer les guillemets par %22 et les espaces par %20. Exemple <strong>(%22laurent-jonchere%22%20OR%20%22olivier-troccaz%22)</strong> - Utilisez le <a target='_blank' href='https://www.textmagic.com/free-tools/url-encoder-decoder'>site textmagic</a> pour encoder votre requête : ce site permet d'encoder facilement une requête 'naturelle'" data-original-title="">
																															<i class="mdi mdi-help text-white"></i>
																															</button>
																													</div>
																											<input type="text" id="idhal" name="idhal" class="form-control" value="<?php echo $idhal;?>" onkeydown="document.getElementById('team').value = ''; document.getElementById('listaut').value = ''; document.getElementById('refint').value = ''; document.getElementById('idst').value = '';">
																											<a class="ml-2 small" target="_blank" rel="noopener noreferrer" href="https://hal.archives-ouvertes.fr/page/mon-idhal">Créer mon IdHAL</a>
																											<p class="small mt-2 w-100">(IdHAL > olivier-troccaz, par exemple)</p>
																										 
																									</div>
																											
																									</div>
																							</div><!-- .form-group -->
																							
																							<div class="form-group row mb-4">
																									<label for="evhal" class="col-12 col-md-3 col-form-label font-weight-bold pt-0">
																									Auteurs à souligner (via leur IdHAL)
																									</label>
																									
																									<div class="col-12 col-md-9">
																											<div class="input-group">
																													<div class="input-group-prepend">
																															<button type="button" tabindex="0" class="btn btn-info" data-html="true" data-toggle="popover" data-trigger="focus" title="Instructions" data-content="Pour une requête sur un seul IdHAL, remplacer les espaces du prénom ou du nom par des tirets bas _. Exemple <strong>Jean-Luc Le_Breton</strong>.<br>Pour une requête sur plusieurs IdHAL, séparer en plus les auteurs par un tilde ~. Exemple <strong>Laurent Jonchère~Olivier Troccaz</strong>." data-original-title="">
																															<i class="mdi mdi-help text-white"></i>
																													</button>
																											</div>
																											<input type="text" id="evhal" name="evhal" class="form-control" value="<?php echo $evhal;?>">
																										 
																									</div>
																											
																									</div>
																							</div><!-- .form-group -->
																						</div> <!-- end border grey -->

																						<!-- <div class="col-12"> -->
																						<!-- 	<span class="aaa"><em>Cliquez sur les titres des menus pour afficher les choix et options</em></span> -->
																						<!-- </div>  -->

                                            <div class="form-group row mb-1">
                                                <div class="col-12">
                                                    <div class="accordion" id="accordionChoix">
                                                        <div class="card mb-0">
                                                            <div class="card-header" id="headingOne">
                                                                <h5 class="m-0">
                                                                    <a class="custom-accordion-title collapsed d-block" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Choix des listes et dates de publications</a>
                                                                </h5>
                                                            </div>

                                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionChoix">
                                                                <div class="card-body">
																																	 <?php
																																	 if ($periode == "") {
																																		 $anneeencours = date('Y', time());
																																		 $anneedeb = date('d/m/Y', mktime(0, 0, 0, 1, 1, $anneeencours));
																																		 $anneefin = date('d/m/Y', mktime(0, 0, 0, 12, 31, $anneeencours));
																																		 $periodeval = $anneedeb.' - '.$anneefin;
																																	 }else{
																																		 $periodeval = $periode;
																																	 }
																																	 ?>
																																	 <div class="form-group row mb-1">
                                                                        <label for="singledaterange1" class="col-12 col-md-3 col-form-label font-weight-bold pt-0">
                                                                        Période
                                                                        </label>
                                                                        
                                                                        <div class="col-12 col-md-9">
                                                                            <input type="text" class="form-control date" id="singledaterange1" name="periode" data-toggle="date-picker" data-cancel-class="btn-warning" value="<?php echo $periodeval;?>">
                                                                            
                                                                        </div>
                                                                    </div><!-- .form-group -->

																																		<?php
																																		if ($depotforce == "oui" || $depot == "") {
																																		  $anneeencours = date('Y', time());
																																		  $anneedeb = date('d/m/Y', mktime(0, 0, 0, 1, 1, 1900));
																																		  $anneefin = date('d/m/Y', mktime(0, 0, 0, 12, 31, $anneeencours));
																																		  $depotval = $anneedeb.' - '.$anneefin;
																																	  }else{
																																		  $depotval = $depot;
																																	  }
																																		?>
																																		
                                                                    <div class="form-group row mb-1">
                                                                        <label for="singledaterange2" class="col-12 col-md-3 col-form-label font-weight-bold pt-0">
                                                                        Date de dépôt
                                                                        </label>
                                                                        
                                                                        <div class="col-12 col-md-9">
                                                                            <input type="text" class="form-control date" id="singledaterange2" name="depot" data-toggle="date-picker" data-cancel-class="btn-warning" value="<?php echo $depotval;?>">
                                                                            
                                                                        </div>
                                                                    </div><!-- .form-group -->

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
																																		if (isset($choix_publis) && strpos($choix_publis, "-ASYN-") !== false) {$asyn = "selected";}else{$asyn = "";}
																																		if (isset($choix_publis) && strpos($choix_publis, "-DPAP-") !== false) {$dpap = "selected";}else{$dpap = "";}
																																		if (isset($choix_publis) && strpos($choix_publis, "-CRDL-") !== false) {$crdl = "selected";}else{$crdl = "";}
																																		if (isset($choix_publis) && strpos($choix_publis, "-APNV-") !== false) {$apnv = "selected";}else{$apnv = "";}
																																		?>

                                                                    <div class="form-group row mb-1">
                                                                        <label for="publis" class="col-12 col-md-3 col-form-label font-weight-bold pt-0">
                                                                        Articles de revue
                                                                        </label>
                                                                        
                                                                        <div class="col-12 col-md-9">
                                                                            <div class="input-group select-help">
                                                                                <div class="input-group-prepend">
                                                                                    <button type="button" tabindex="0" class="btn btn-info" data-html="true" data-toggle="popover" data-trigger="focus" title="" data-content="<a target='_blank' href='./ExtrHAL_criteres_types_publis.pdf'>Quels champs compléter dans HAL ?</a>" data-original-title="">
                                                                                    <i class="mdi mdi-help text-white"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <select id="publis" class="select2 form-control select2-multiple" size="10" name="publis[]" data-toggle="select2" multiple="multiple" data-placeholder="Choix multiple possible...">
                                                                                    <option value="TA"<?php echo $ta;?>>Tous les articles (sauf vulgarisation) </option>
                                                                                    <option value="ACL"<?php echo $acl;?>>Articles de revues à comité de lecture</option>
                                                                                    <option value="ASCL"<?php echo $ascl;?>>Articles de revues sans comité de lecture</option>
                                                                                    <option value="ARI"<?php echo $ari;?>>Articles de revues internationales</option>
                                                                                    <option value="ARN"<?php echo $arn;?>>Articles de revues nationales</option>
                                                                                    <option value="ACLRI"<?php echo $aclri;?>>Articles de revues internationales à comité de lecture</option>
                                                                                    <option value="ACLRN"<?php echo $aclrn;?>>Articles de revues nationales à comité de lecture</option>
                                                                                    <option value="ASCLRI"<?php echo $asclri;?>>Articles de revues internationales sans comité de lecture</option>
                                                                                    <option value="ASCLRN"<?php echo $asclrn;?>>Articles de revues nationales sans comité de lecture</option>
                                                                                    <option value="AV"<?php echo $av;?>>Articles de vulgarisation</option>
																																										<option value="ASYN"<?php echo $asyn;?>>Articles de synthèse</option>
																																										<option value="DPAP"<?php echo $dpap;?>>Data papers</option>
																																										<option value="CRDL"<?php echo $crdl;?>>Comptes rendus de lecture</option>
																																										<option value="APNV"<?php echo $apnv;?>>Publications non ventilées (articles)</option>
                                                                                </select>
                                                                            </div> <!-- .input-group -->
                                                                            
                                                                        </div>
                                                                    </div><!-- .form-group -->

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
																																		if (isset($choix_comm) && strpos($choix_comm, "-CPNV-") !== false) {$cpnv = "selected";}else{$cpnv = "";}
																																		?>

                                                                    <div class="form-group row mb-1">
                                                                        <label for="comm" class="col-12 col-md-3 col-form-label font-weight-bold pt-0">
                                                                        Communications / conférences
                                                                        </label>
                                                                        
                                                                        <div class="col-12 col-md-9">
                                                                            <div class="input-group select-help">
                                                                                <div class="input-group-prepend">
                                                                                    <button type="button" tabindex="0" class="btn btn-info" data-html="true" data-toggle="popover" data-trigger="focus" title="" data-content="<a target='_blank' href='./ExtrHAL_criteres_types_publis.pdf'>Quels champs compléter dans HAL ?</a>" data-original-title="">
                                                                                    <i class="mdi mdi-help text-white"></i>
                                                                                    </button>
                                                                                </div>
                                                                                
                                                                                <select id="comm"  class="select2 form-control select2-multiple" size="10" data-toggle="select2" multiple="multiple" data-placeholder="Choix multiple possible..." name="comm[]">
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
                                                                                    <option value="CPASANI" <?php echo $cpasani;?>>Communications par affiches (posters) avec ou sans actes, nationales ou internationales</option>
                                                                                    <option value="CPA" <?php echo $cpa;?>>Communications par affiches (posters) avec actes</option>
                                                                                    <option value="CPSA" <?php echo $cpsa;?>>Communications par affiches (posters) sans actes</option>
                                                                                    <option value="CPI" <?php echo $cpi;?>>Communications par affiches internationales</option>
                                                                                    <option value="CPN" <?php echo $cpn;?>>Communications par affiches nationales</option>
                                                                                    <option value="CGP" <?php echo $cgp;?>>Conférences grand public</option>
																																										<option value="CPNV" <?php echo $cpnv;?>>Publications non ventilées (conférences)</option>
                                                                                </select>
                                                                            </div> <!-- .input-group -->
                                                                            
                                                                        </div>
                                                                    </div><!-- .form-group -->

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
																																		if (isset($choix_ouvr) && strpos($choix_ouvr, "-EOS-") !== false) {$eos = "selected";}else{$eos = "";}
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
																																		//if (isset($choix_ouvr) && strpos($choix_ouvr, "-CNR-") !== false) {$cnr = "selected";}else{$cnr = "";}
																																		if (isset($choix_ouvr) && strpos($choix_ouvr, "-OSYN-") !== false) {$osyn = "selected";}else{$osyn = "";}
																																		if (isset($choix_ouvr) && strpos($choix_ouvr, "-MANU-") !== false) {$manu = "selected";}else{$manu = "";}
																																		if (isset($choix_ouvr) && strpos($choix_ouvr, "-DICO-") !== false) {$dico = "selected";}else{$dico = "";}
																																		if (isset($choix_ouvr) && strpos($choix_ouvr, "-ECRI-") !== false) {$ecri = "selected";}else{$ecri = "";}
																																		if (isset($choix_ouvr) && strpos($choix_ouvr, "-ACTC-") !== false) {$actc = "selected";}else{$actc = "";}
																																		if (isset($choix_ouvr) && strpos($choix_ouvr, "-NUMR-") !== false) {$numr = "selected";}else{$numr = "";}
																																		if (isset($choix_ouvr) && strpos($choix_ouvr, "-OPNV-") !== false) {$opnv = "selected";}else{$opnv = "";}
																																		?>

                                                                    <div class="form-group row mb-1">
                                                                        <label for="ouvr" class="col-12 col-md-3 col-form-label font-weight-bold pt-0">
                                                                        Ouvrages
                                                                        </label>
                                                                        
                                                                        <div class="col-12 col-md-9">
                                                                            <div class="input-group select-help">
                                                                                <div class="input-group-prepend">
                                                                                    <button type="button" tabindex="0" class="btn btn-info" data-html="true" data-toggle="popover" data-trigger="focus" title="" data-content="<a target='_blank' href='./ExtrHAL_criteres_types_publis.pdf'>Quels champs compléter dans HAL ?</a>" data-original-title="">
                                                                                    <i class="mdi mdi-help text-white"></i>
                                                                                    </button>
                                                                                </div>
                                                                                
                                                                                <select id="ouvr"  class="select2 form-control select2-multiple" size="10" data-toggle="select2" multiple="multiple" data-placeholder="Choix multiple possible..." name="ouvr[]">
                                                                                    <option value="OCDO" <?php echo $ocdo;?>>Ouvrages ou chapitres ou directions d&apos;ouvrages</option>
                                                                                    <option value="OCDOI" <?php echo $ocdoi;?>>Ouvrages ou chapitres ou directions d&apos;ouvrages de portée internationale</option>
                                                                                    <option value="OCDON" <?php echo $ocdon;?>>Ouvrages ou chapitres ou directions d&apos;ouvrages de portée nationale</option>
                                                                                    <option value="TO" <?php echo $to;?>>Tous les ouvrages (sauf vulgarisation)</option>
                                                                                    <option value="OSPI" <?php echo $ospi;?>>Ouvrages scientifiques de portée internationale</option>
                                                                                    <option value="OSPN" <?php echo $ospn;?>>Ouvrages scientifiques de portée nationale</option>
                                                                                    <option value="COS" <?php echo $cos;?>>Chapitres d&apos;ouvrages scientifiques</option>
                                                                                    <option value="COSI" <?php echo $cosi;?>>Chapitres d&apos;ouvrages scientifiques de portée internationale</option>
                                                                                    <option value="COSN" <?php echo $cosn;?>>Chapitres d&apos;ouvrages scientifiques de portée nationale</option>
                                                                                    <option value="DOS" <?php echo $dos;?>>Directions d&apos;ouvrages scientifiques</option>
                                                                                    <option value="DOSI" <?php echo $dosi;?>>Directions d&apos;ouvrages scientifiques de portée internationale</option>
                                                                                    <option value="DOSN" <?php echo $dosn;?>>Directions d&apos;ouvrages scientifiques de portée nationale</option>
																																										<option value="EOS" <?php echo $eos;?>>Editions d&apos;ouvrages</option>
                                                                                    <option value="OCO" <?php echo $oco;?>>Ouvrages (tout type) ou chapitres d&apos;ouvrages</option>
                                                                                    <option value="OCOI" <?php echo $ocoi;?>>Ouvrages (tout type) ou chapitres d&apos;ouvrages de portée internationale</option>
                                                                                    <option value="OCON" <?php echo $ocon;?>>Ouvrages (tout type) ou chapitres d&apos;ouvrages de portée nationale</option>
                                                                                    <option value="ODO" <?php echo $odo;?>>Ouvrages ou directions d&apos;ouvrages</option>
                                                                                    <option value="ODOI" <?php echo $odoi;?>>Ouvrages ou directions d&apos;ouvrages de portée internationale</option>
                                                                                    <option value="ODON" <?php echo $odon;?>>Ouvrages ou directions d&apos;ouvrages de portée nationale</option>
                                                                                    <option value="OCV" <?php echo $ocv;?>>Ouvrages ou chapitres de vulgarisation</option>
																																										<option value="OSYN" <?php echo $osyn;?>>Ouvrages de synthèse</option>
																																										<option value="MANU" <?php echo $manu;?>>Manuels</option>
																																										<option value="DICO" <?php echo $dico;?>>Dictionnaires ou encyclopédies</option>
																																										<option value="ECRI" <?php echo $ecri;?>>Éditions critiques</option>
																																										<option value="ACTC" <?php echo $actc;?>>Actes de congrès / Proceedings / Recueil de communications</option>
																																										<option value="NUMR" <?php echo $numr;?>>N° spécial de revue / N° thématique de revue / Dossier</option>
																																										<option value="OPNV" <?php echo $opnv;?>>Publications non ventilées (ouvrages)</option>
                                                                                    </select>
                                                                            </div> <!-- .input-group -->
                                                                            
                                                                        </div>
                                                                    </div><!-- .form-group -->
																																		
																																		<?php
																																		if (isset($choix_rapp) && strpos($choix_rapp, "-RAP-") !== false) {$rap = "selected";}else{$rap = "";}
																																		if (isset($choix_rapp) && strpos($choix_rapp, "-RAPR-") !== false) {$rapr = "selected";}else{$rapr = "";}
																																		if (isset($choix_rapp) && strpos($choix_rapp, "-RAPT-") !== false) {$rapt = "selected";}else{$rapt = "";}
																																		if (isset($choix_rapp) && strpos($choix_rapp, "-RAPC-") !== false) {$rapc = "selected";}else{$rapc = "";}
																																		if (isset($choix_rapp) && strpos($choix_rapp, "-RAPE-") !== false) {$rape = "selected";}else{$rape = "";}
																																		if (isset($choix_rapp) && strpos($choix_rapp, "-PGED-") !== false) {$pged = "selected";}else{$pged = "";}
																																		?>

                                                                    <div class="form-group row mb-1">
                                                                        <label for="rapp" class="col-12 col-md-3 col-form-label font-weight-bold pt-0">
                                                                        Rapports
                                                                        </label>
                                                                        
                                                                        <div class="col-12 col-md-9">
                                                                            <div class="input-group select-help">
                                                                                <div class="input-group-prepend">
                                                                                    <button type="button" tabindex="0" class="btn btn-info" data-html="true" data-toggle="popover" data-trigger="focus" title="" data-content="<a target='_blank' href='./ExtrHAL_criteres_types_publis.pdf'>Quels champs compléter dans HAL ?</a>" data-original-title="">
                                                                                    <i class="mdi mdi-help text-white"></i>
                                                                                    </button>
                                                                                </div>
                                                                                
                                                                                <select id="rapp"  class="select2 form-control select2-multiple" size="10" data-toggle="select2" multiple="multiple" data-placeholder="Choix multiple possible..." name="rapp[]">
                                                                                        <option value="RAP" <?php echo $rap;?>>Rapports</option>
																																												<option value="RAPR" <?php echo $rapr;?>>Rapports de recherche</option>
																																												<option value="RAPT" <?php echo $rapt;?>>Rapports techniques</option>
																																												<option value="RAPC" <?php echo $rapc;?>>Rapports contrat/projet</option>
																																												<option value="RAPE" <?php echo $rape;?>>Rapports d'expertise</option>
																																												<option value="PGED" <?php echo $pged;?>>Plans de gestion de données (PGD)</option>
                                                                                    </select>
                                                                            </div> <!-- .input-group -->
                                                                            
                                                                        </div>
                                                                    </div><!-- .form-group -->
																																		
																																		<?php
																																		if (isset($choix_imag) && strpos($choix_imag, "-IMG-") !== false) {$img = "selected";}else{$img = "";}
																																		if (isset($choix_imag) && strpos($choix_imag, "-PHOT-") !== false) {$phot = "selected";}else{$phot = "";}
																																		if (isset($choix_imag) && strpos($choix_imag, "-DESS-") !== false) {$dess = "selected";}else{$dess = "";}
																																		if (isset($choix_imag) && strpos($choix_imag, "-ILLU-") !== false) {$illu = "selected";}else{$illu = "";}
																																		if (isset($choix_imag) && strpos($choix_imag, "-GRAV-") !== false) {$grav = "selected";}else{$grav = "";}
																																		if (isset($choix_imag) && strpos($choix_imag, "-ISYN-") !== false) {$isyn = "selected";}else{$isyn = "";}
																																		?>

                                                                    <div class="form-group row mb-1">
                                                                        <label for="imag" class="col-12 col-md-3 col-form-label font-weight-bold pt-0">
                                                                        Images
                                                                        </label>
                                                                        
                                                                        <div class="col-12 col-md-9">
                                                                            <div class="input-group select-help">
                                                                                <div class="input-group-prepend">
                                                                                    <button type="button" tabindex="0" class="btn btn-info" data-html="true" data-toggle="popover" data-trigger="focus" title="" data-content="<a target='_blank' href='./ExtrHAL_criteres_types_publis.pdf'>Quels champs compléter dans HAL ?</a>" data-original-title="">
                                                                                    <i class="mdi mdi-help text-white"></i>
                                                                                    </button>
                                                                                </div>
                                                                                
                                                                                <select id="imag"  class="select2 form-control select2-multiple" size="10" data-toggle="select2" multiple="multiple" data-placeholder="Choix multiple possible..." name="imag[]">
                                                                                        <option value="IMG" <?php echo $img;?>>Images</option>
																																												<option value="PHOT" <?php echo $phot;?>>Photographies</option>
																																												<option value="DESS" <?php echo $dess;?>>Dessins</option>
																																												<option value="ILLU" <?php echo $illu;?>>Illustrations</option>
																																												<option value="GRAV" <?php echo $grav;?>>Gravures</option>
																																												<option value="ISYN" <?php echo $isyn;?>>Images de synthèse</option>
                                                                                    </select>
                                                                            </div> <!-- .input-group -->
                                                                            
                                                                        </div>
                                                                    </div><!-- .form-group -->

																																		<?php
																																		if (isset($choix_autr) && strpos($choix_autr, "-BRE-") !== false) {$bre = "selected";}else{$bre = "";}
																																		//if (isset($choix_autr) && strpos($choix_autr, "-RAP-") !== false) {$rap = "selected";}else{$rap = "";}
																																		if (isset($choix_autr) && strpos($choix_autr, "-THE-") !== false) {$the = "selected";}else{$the = "";}
																																		if (isset($choix_autr) && strpos($choix_autr, "-HDR-") !== false) {$hdr = "selected";}else{$hdr = "";}
																																		if (isset($choix_autr) && strpos($choix_autr, "-VID-") !== false) {$vid = "selected";}else{$vid = "";}
																																		//if (isset($choix_autr) && strpos($choix_autr, "-IMG-") !== false) {$img = "selected";}else{$img = "";}
																																		if (isset($choix_autr) && strpos($choix_autr, "-PWM-") !== false) {$pwm = "selected";}else{$pwm = "";}
																																		if (isset($choix_autr) && strpos($choix_autr, "-PREP-") !== false) {$prep = "selected";}else{$prep = "";}
																																		if (isset($choix_autr) && strpos($choix_autr, "-WORK-") !== false) {$work = "selected";}else{$work = "";}
																																		if (isset($choix_autr) && strpos($choix_autr, "-BLO-") !== false) {$blo = "selected";}else{$blo = "";}
																																		if (isset($choix_autr) && strpos($choix_autr, "-NED-") !== false) {$ned = "selected";}else{$ned = "";}
																																		if (isset($choix_autr) && strpos($choix_autr, "-TRA-") !== false) {$tra = "selected";}else{$tra = "";}
																																		if (isset($choix_autr) && strpos($choix_autr, "-LOG-") !== false) {$log = "selected";}else{$log = "";}
																																		if (isset($choix_autr) && strpos($choix_autr, "-AP-") !== false) {$ap = "selected";}else{$ap = "";}
																																		?>

                                                                    <div class="form-group row mb-1">
                                                                        <label for="autr" class="col-12 col-md-3 col-form-label font-weight-bold pt-0">
                                                                        Autres productions scientifiques
                                                                        </label>
                                                                        
                                                                        <div class="col-12 col-md-9">
                                                                            <div class="input-group select-help">
                                                                                <div class="input-group-prepend">
                                                                                    <button type="button" tabindex="0" class="btn btn-info" data-html="true" data-toggle="popover" data-trigger="focus" title="" data-content="<a target='_blank' href='./ExtrHAL_criteres_types_publis.pdf'>Quels champs compléter dans HAL ?</a>" data-original-title="">
                                                                                    <i class="mdi mdi-help text-white"></i>
                                                                                    </button>
                                                                                </div>
                                                                                
                                                                                <select id="autr"  class="select2 form-control select2-multiple" size="10" data-toggle="select2" multiple="multiple" data-placeholder="Choix multiple possible..." name="autr[]">
                                                                                   
                                                                                        <option value="BRE" <?php echo $bre;?>>Brevets</option>
                                                                                        <!-- <option value="RAP" <?php echo $rap;?>>Rapports</option> -->
                                                                                        <option value="THE" <?php echo $the;?>>Thèses</option>
                                                                                        <option value="HDR" <?php echo $hdr;?>>HDR</option>
                                                                                        <option value="VID" <?php echo $vid;?>>Vidéos</option>
																																												<!-- <option value="IMG" <?php echo $img;?>>Images</option> -->
                                                                                        <option value="PWM" <?php echo $pwm;?>>Preprints, working papers, manuscrits non publiés</option>
																																												<option value="PREP" <?php echo $prep;?>>Preprints</option>
																																												<option value="WORK" <?php echo $work;?>>Working papers</option>
																																												<option value="BLO" <?php echo $blo;?>>Articles de blog scientifique</option>
																																												<option value="NED" <?php echo $ned;?>>Notices d'encyclopédie / Articles d'encyclopédie</option>
                                                                                        <option value="TRA" <?php echo $tra;?>>Traductions</option>
                                                                                        <option value="LOG" <?php echo $log;?>>Logiciels</option>
                                                                                        <option value="AP" <?php echo $ap;?>>Autres publications</option>
                                                                                    </select>
                                                                            </div> <!-- .input-group -->
                                                                            
                                                                        </div>
                                                                    </div><!-- .form-group -->

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card mb-0">
                                                            <div class="card-header" id="headingTwo">
                                                                <h5 class="m-0">
                                                                    <a class="custom-accordion-title collapsed d-block"
                                                                        data-toggle="collapse" href="#collapseTwo"
                                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                                        Options d'affichage et d'export
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionChoix">
                                                                <div class="card-body">
																																		<div class="border border-dark rounded p-2 mb-2">
																																				<div class="form-row mb-2">
																																						<div class="form-group col-sm-4">
																																								<label for="typnum" class="font-weight-bold">
																																								Numérotation
																																								</label>
																																								<select class="custom-select" id="typnum" name="typnum">
																																									<?php
																																									if (isset($typnum) && $typnum == "viscon" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																									echo '<option value="viscon" '.$txt.'>visible et continue</option>';
																																									if (isset($typnum) && $typnum == "visdis") {$txt = "selected";}else{$txt = "";}
																																									echo '<option value="visdis" '.$txt.'>visible et discontinue</option>';
																																									if (isset($typnum) && $typnum == "inv") {$txt = "selected";}else{$txt = "";}
																																									echo '<option value="inv" '.$txt.'>invisible</option>';
																																									?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-4">
																																								<label for="typtri" class="font-weight-bold">
																																								Classer par
																																								</label>
																																								<select class="custom-select" id="typtri" name="typtri">
																																										<?php
																																										if (isset($typtri) && $typtri == "premierauteur" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="premierauteur" '.$txt.'>année puis nom du premieur auteur</option>';
																																										if (isset($typtri) && $typtri == "journal") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="journal" '.$txt.'>année puis journal</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																			
																																						<div class="form-group col-sm-4">
																																								<label for="typchr" class="font-weight-bold">
																																								Années
																																								</label>
																																								<select class="custom-select" id="typchr" name="typchr">
																																										<?php
																																										if (isset($typchr) && $typchr == "decr" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="decr" '.$txt.'>décroissante</option>';
																																										if (isset($typchr) && $typchr == "croi") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="croi" '.$txt.'>croissante</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->					
																																				</div>
																																		</div>
																																	
																																		<div class="border border-dark rounded p-2 mb-2">
																																				<div class="form-row mb-2">
																																						<div class="form-group col-sm-4">
																																								<label for="typaut" class="font-weight-bold">
																																								Auteurs (tous) 
																																								</label>
																																								<select class="custom-select" id="typaut" name="typaut">
																																										<?php
																																										if (isset($typaut) && $typaut == "soul") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="soul" '.$txt.'>soulignés</option>';
																																										if (isset($typaut) && $typaut == "gras") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="gras" '.$txt.'>gras</option>';
																																										if (isset($typaut) && $typaut == "aucun" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="aucun" '.$txt.'>aucun</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-4">
																																								<label for="typnom" class="font-weight-bold">
																																								Auteurs (tous) 
																																								</label>
																																								<select class="custom-select" id="typnom" name="typnom">
																																										<?php
																																										if (isset($typnom) && $typnom == "nominit" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="nominit" '.$txt.'>Nom, initiale(s) du(des) prénom(s)</option>';
																																										if (isset($typnom) && $typnom == "nomcomp1" || isset($stpdf) && $stpdf == "chi") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="nomcomp1" '.$txt.'>Nom Prénom(s)</option>';
																																										if (isset($typnom) && $typnom == "nomcomp2") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="nomcomp2" '.$txt.'>Prénom(s) Nom</option>';
																																										if (isset($typnom) && $typnom == "nomcomp3") {$txt = "selected";}else{$txt = "";}//NOM (Prénom(s))		
																																										echo '<option value="nomcomp3" '.$txt.'>NOM (Prénom(s))</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-4">
																																								<label for="typcol" class="font-weight-bold">
																																								Auteurs (de la collection) ou auteur IdHAL
																																								</label>
																																								<select class="custom-select" id="typcol" name="typcol">
																																										<?php
																																										if (isset($typcol) && $typcol == "soul" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="soul" '.$txt.'>soulignés</option>';
																																										if (isset($typcol) && $typcol == "gras") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="gras" '.$txt.'>gras</option>';
																																										if (isset($typcol) && $typcol == "aucun") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="aucun" '.$txt.'>aucun</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																				</div>
																																				
																																				<div class="form row mb-2">
																																						<div class="form-group col-sm-2">
																																								<label for="typbib" class="font-weight-bold">
																																								Mettre en évidence (\labo{xxxxx}) les auteurs de la collection dans l'export Bibtex
																																								</label>
																																								<select class="custom-select" id="typbib" name="typbib">
																																									<?php
																																									if (isset($typbib) && $typbib == "oui") {$txt = "selected";}else{$txt = "";}
																																									echo '<option value="oui" '.$txt.'>oui</option>';
																																									if (isset($typbib) && $typbib == "non" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																									echo '<option value="non" '.$txt.'>non</option>';
																																									?>
																																								</select>
																																						</div><!-- .form-group -->

																																						<div class="form-group col-sm-2">
																																								<label for="limaff1" class="font-weight-bold">
																																								Limiter l&apos;affichage aux
																																								</label>
																																								<select id="limaff1" class="custom-select"  name="limaff">
																																										<?php
																																										if (isset($limaff) && $limaff == 1 || isset($stpdf) && $stpdf == "mla") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value=1 '.$txt.'>1</option>';
																																										if ((isset($limaff) && $limaff == 5) || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value=5 '.$txt.'>5</option>';
																																										if (isset($limaff) && $limaff == 10) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value=10 '.$txt.'>10</option>';
																																										if (isset($limaff) && $limaff == 15) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value=15 '.$txt.'>15</option>';
																																										if (isset($limaff) && $limaff == 20) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value=20 '.$txt.'>20</option>';
																																										?>
																																								</select>
																																								<span class="font-weight-bold">
																																								premier(s) auteur(s) (« et al. »)
																																								</span>
																																								<select class="custom-select" id="typlim" name="typlim">
																																									<?php
																																									if (isset($typlim) && $typlim == "oui") {$txt = "selected";}else{$txt = "";}
																																									echo '<option value="oui" '.$txt.'>oui</option>';
																																									if (isset($typlim) && $typlim == "non" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																									echo '<option value="non" '.$txt.'>non</option>';
																																									?>
																																								</select>
																																						</div><!-- .form-group -->

																																						<div class="form-group col-sm-2">
																																								<label for="trpaff" class="font-weight-bold">Remplacer les auteurs hors collection par '...' au-delà de</label>
																																								<?php
																																								if (isset($trpaff)) {$trpaffval = $trpaff;}else{$trpaffval = "";}
																																								?>
																																								<input type="text" id="trpaff" name="trpaff" value="<?php echo $trpaffval;?>" class="form-control">
																																								<span class="font-weight-bold">
																																									auteur(s)
																																								</span>
																																						</div><!-- .form-group -->
																																				
																																						<div class="form-group col-sm-2">
																																								<label for="typgra" class="font-weight-bold">Mettre la citation en gras si auteurs de la collection en 1<sup>ère</sup> position ou en position finale</label>
																																								<select class="custom-select" id="typgra" name="typgra">
																																									<?php
																																									if (isset($typgra) && $typgra == "oui") {$txt = "selected";}else{$txt = "";}
																																									echo '<option value="oui" '.$txt.'>oui</option>';
																																									if (isset($typgra) && $typgra == "non" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																									echo '<option value="non" '.$txt.'>non</option>';
																																									?>
																																								</select>
																																						</div><!-- .form-group -->
																																				
																																						<div class="form-group col-sm-2">
																																								<label for="limgra" class="font-weight-bold">Limiter l'affichage aux seules références en gras</label>
																																								<select class="custom-select" id="limgra" name="limgra">
																																									<?php
																																									if (isset($limgra) && $limgra == "oui") {$txt = "selected";}else{$txt = "";}
																																									echo '<option value="oui" '.$txt.'>oui</option>';
																																									if (isset($limgra) && $limgra == "non" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																									echo '<option value="non" '.$txt.'>non</option>';
																																									?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-2">
																																								<label for="typcrp" class="font-weight-bold">Mettre en évidence l'auteur correspondant*</label>
																																								<select class="custom-select" id="typcrp" name="typcrp">
																																									<?php
																																									if (isset($typcrp) && $typcrp == "oui" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																									echo '<option value="oui" '.$txt.'>oui</option>';
																																									if (isset($typcrp) && $typcrp == "non") {$txt = "selected";}else{$txt = "";}
																																									echo '<option value="non" '.$txt.'>non</option>';
																																									?>
																																								</select>
																																						</div><!-- .form-group -->
																																				</div>
																																				
																																				<div class="form row mb-2">
																																						<div class="form-group col-12">
																																						<?php
																																						if (isset($rstaff)) {$rstaffval = $rstaff;}else{$rstaffval = "";}
																																						?>
																																								<div class="form-group row">
																																										<label for="rstaff" class="col-sm-4 font-weight-bold">
																																										Restreindre l'affichage à certains auteurs de la collection et leur réserver la mise en valeur 
																																										</label>
																																										<div class="col-sm-8">
																																												<div class="input-group">
																																														<div class="input-group-prepend">
																																																<button type="button" tabindex="0" class="btn btn-info" data-html="true" data-toggle="popover" data-trigger="focus" title="Instructions" data-content="Renseigner sous la forme 'Nom Prénom' en remplaçant les espaces du nom ou du prénom par des tirets bas _ et séparer les auteurs par un tilde ~. Exemple <strong>Jonchère Laurent~Troccaz Olivier~Le_Borgne Stéphane</strong>" data-original-title="">
																																																<i class="mdi mdi-help text-white"></i>
																																														</button>
																																												</div>
																																												<input id="rstaff" class="form-control" type="text" name="rstaff" value="<?php echo $rstaffval;?>">
																																										</div>
																																										
																																											 
																																										</div>
																																								</div>
																																						</div> <!-- .form-group -->
																																				</div>
																																				
																																				<!--
																																				<div class="form row mb-2">
																																						<div class="form-group col-12">
																																								<a target="_blank" rel="noopener noreferrer" href="./ExtrHAL_liste_auteurs.php">Gérer ma liste d'auteurs</a>
																																								<button type="button" tabindex="0" class="btn btn-info" data-html="true" data-toggle="popover" data-trigger="focus" title="Informations" data-content="Option réservée à la version installée d'ExtrHAL. Voir mode d'emploi" data-original-title="">
																																									<i class="mdi mdi-help text-white"></i>
																																								</button>
																																						</div>
																																				</div>
																																				-->
																																		</div>
																																	
																																		<div class="border border-dark rounded p-2 mb-2">
																																				<div class="form-group row mb-2">
																																						<div class="form-group col-sm-2">
																																								<label for="typidh" class="font-weight-bold">
																																								Identifiant HAL 
																																								</label>
																																								<select class="custom-select" id="typidh" name="typidh">
																																										<?php
																																										if (isset($typidh) && $typidh == "vis" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="vis" '.$txt.'>visible</option>';
																																										if (isset($typidh) && $typidh == "inv") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="inv" '.$txt.'>invisible</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																				
																																						<div class="form-group col-sm-2">
																																								<?php
																																								if (!isset($racine)) {$racine = "https://univ-rennes.hal.science/";}
																																								?>
																																								<label for="racine" class="font-weight-bold">
																																								URL racine HAL
																																								</label>
																																								<?php
																																								$colPort = array();
																																								$urlPort = "https://api.archives-ouvertes.fr/ref/instance";
																																								$contents = file_get_contents($urlPort);
																																								$results = json_decode($contents);
																																								foreach($results->response->docs as $entry) {
																																									//$colPort[$entry->url."/"] = $entry->name;
																																									$colPort[] = $entry->url."/";
																																								}
																																								array_multisort($colPort, SORT_ASC);
																																								?>
																																								<select id="racine" class="custom-select" name="racine">
																																								<?php
																																								for ($i=0; $i < count($colPort); $i++) {
																																									if($racine == $colPort[$i]) {$txt = "selected";}else{$txt = "";}
																																									echo '<option '.$txt.' value="'.$colPort[$i].'">'.$colPort[$i].'</option>';
																																								}
																																								?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-2">
																																								<label for="typurl" class="font-weight-bold">
																																								Lien URL 
																																								</label>
																																								<select class="custom-select" id="typurl" name="typurl">
																																										<?php
																																										if (isset($typurl) && $typurl == "vis" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="vis" '.$txt.'>visible</option>';
																																										if (isset($typurl) && $typurl == "inv") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="inv" '.$txt.'>invisible</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-2">
																																								<label for="typdoi" class="font-weight-bold">
																																								Lien DOI 
																																								</label>
																																								<select class="custom-select" id="typdoi" name="typdoi">
																																										<?php
																																										if (isset($typdoi) && $typdoi == "vis" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="vis" '.$txt.'>visible</option>';
																																										if (isset($typdoi) && $typdoi == "inv") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="inv" '.$txt.'>invisible</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-2">
																																								<label for="typpub" class="font-weight-bold">
																																								Lien Pubmed 
																																								</label>
																																								<select class="custom-select" id="typpub" name="typpub">
																																										<?php
																																										if (isset($typpub) && $typpub == "vis") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="vis" '.$txt.'>visible</option>';
																																										if (isset($typpub) && $typpub == "inv" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="inv" '.$txt.'>invisible</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-2">
																																								<label for="typisbn" class="font-weight-bold">
																																								ISBN 
																																								</label>
																																								<select class="custom-select" id="typisbn" name="typisbn">
																																										<?php
																																										if (isset($typisbn) && $typisbn == "vis") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="vis" '.$txt.'>visible</option>';
																																										if (isset($typisbn) && $typisbn == "inv" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="inv" '.$txt.'>invisible</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																				</div>
																																				
																																				<div class="form-group row mb-2">
																																						<div class="form-group col-sm-2">
																																								<label for="typcomm" class="font-weight-bold">
																																								Commentaire 
																																								</label>
																																								<select class="custom-select" id="typcomm" name="typcomm">
																																										<?php
																																										if (isset($typcomm) && $typcomm == "vis") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="vis" '.$txt.'>visible</option>';
																																										if (isset($typcomm) && $typcomm == "inv" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="inv" '.$txt.'>invisible</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-2">
																																								<label for="typrefi" class="font-weight-bold">
																																								Référence interne 
																																								</label>
																																								<select class="custom-select" id="typrefi" name="typrefi">
																																										<?php
																																										if (isset($typrefi) && $typrefi == "vis") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="vis" '.$txt.'>visible</option>';
																																										if (isset($typrefi) && $typrefi == "inv" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="inv" '.$txt.'>invisible</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-2">
																																								<label for="prefeq" class="font-weight-bold">
																																								Afficher le préfixe AERES 
																																								</label>
																																								<select class="custom-select" id="prefeq" name="prefeq">
																																										<?php
																																										if (isset($prefeq) && $prefeq == "oui") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="oui" '.$txt.'>oui</option>';
																																										if (isset($prefeq) && $prefeq == "non" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="non" '.$txt.'>non</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-2">
																																								<label for="surdoi" class="font-weight-bold">
																																								Afficher les doublons par surlignage
																																								</label>
																																								<select class="custom-select" id="surdoi" name="surdoi">
																																										<?php
																																										if (isset($surdoi) && $surdoi == "oui") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="oui" '.$txt.'>oui</option>';
																																										if (isset($surdoi) && $surdoi == "non" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="non" '.$txt.'>non</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-2">
																																								<label for="sursou" class="font-weight-bold">
																																								Afficher les absences d'affiliation par surlignage
																																								</label>
																																								<select class="custom-select" id="sursou" name="sursou">
																																										<?php
																																										if (isset($sursou) && $sursou == "oui") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="oui" '.$txt.'>oui</option>';
																																										if (isset($sursou) && $sursou == "non" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="non" '.$txt.'>non</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-2">
																																								<label for="finass" class="font-weight-bold">
																																								Afficher les financements associés (ANR/EU)
																																								</label>
																																								<select class="custom-select" id="finass" name="finass">
																																										<?php
																																										if (isset($finass) && $finass == "oui") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="oui" '.$txt.'>oui</option>';
																																										if (isset($finass) && $finass == "non" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="non" '.$txt.'>non</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																				</div>
																																			
																																		</div>
																																		
																																		<div class="border border-dark rounded p-2 mb-2">
																																				<div class="form-group row mb-2">
																																						<div class="form-group col-sm-3">
																																							<span class="font-weight-bold">
																																							Titres (articles, ouvrages, chapitres, etc.)
																																							</span>
																																						</div><!-- .form-group -->
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
																																						<div class="form-group col-sm-2">
																																							<div class="custom-control custom-checkbox">
																																								<input type="checkbox" id="typtit1" name="typtit[]" value="guil" <?php echo $guil;?> class="custom-control-input">
																																								<label class="custom-control-label" for="typtit1">entre guillemets</label>
																																							</div>
																																						</div><!-- .form-group -->
																																						<div class="form-group col-sm-2">
																																							<div class="custom-control custom-checkbox">
																																								<input type="checkbox" id="typtit2" name="typtit[]" value="gras" <?php echo $gras;?> class="custom-control-input">
																																								<label class="custom-control-label" for="typtit2">en gras</label>
																																							</div>
																																						</div><!-- .form-group -->
																																						<div class="form-group col-sm-2">
																																							<div class="custom-control custom-checkbox">
																																								<input type="checkbox" id="typtit3" name="typtit[]" value="ital" <?php echo $ital;?> class="custom-control-input">
																																								<label class="custom-control-label" for="typtit3">en italique</label>
																																							</div>
																																						</div><!-- .form-group -->
																																						<div class="form-group col-sm-2">
																																							<div class="custom-control custom-checkbox">
																																								<input type="checkbox" id="typtit4" name="typtit[]" value="reto" <?php echo $reto;?> class="custom-control-input">
																																								<label class="custom-control-label" for="typtit4">suivi d'un saut de ligne</label>
																																							</div>
																																						</div><!-- .form-group -->
																																				</div>
																																				
																																				<div class="form-group row mb-2">
																																						<div class="form-group col-sm-2">
																																								<label for="typrvg" class="font-weight-bold">
																																								Revue en gras 
																																								</label>
																																								<select class="custom-select" id="typrvg" name="typrvg">
																																										<?php
																																										if (isset($typrvg) && $typrvg == "oui") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="oui" '.$txt.'>oui</option>';
																																										if (isset($typrvg) && $typrvg == "non" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="non" '.$txt.'>non</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-2">
																																								<label for="typann" class="font-weight-bold">
																																								Année 
																																								</label>
																																								<select class="custom-select" id="typann" name="typann">
																																										<?php
																																										if (isset($typann) && $typann == "apres" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="apres" '.$txt.'>après les auteurs</option>';
																																										if (isset($typann) && $typann == "avant") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="avant" '.$txt.'>avant le numéro de volume</option>';
																																										if (isset($typann) && $typann == "alafin") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="alafin" '.$txt.'>à la fin, avant la pagination</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-2">
																																								<label for="typfor" class="font-weight-bold">
																																								Format métadonnées 
																																								</label>
																																								<select class="custom-select" id="typfor" name="typfor">
																																										<?php
																																										if (isset($typfor) && $typfor == "typ1") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="typ1" '.$txt.'>vol 5, n°2, pp. 320</option>';
																																										if (isset($typfor) && $typfor == "typ2") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="typ2" '.$txt.'>vol 5, n°2, 320 p.</option>';
																																										if (isset($typfor) && $typfor == "typ3" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="typ3" '.$txt.'>5(2):320</option>';
																																										if (isset($typfor) && $typfor == "typ4") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="typ4" '.$txt.'>invisible</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-4">
																																								<label for="typavsa" class="font-weight-bold">
																																								Information <span class="font-italic">(acte)/(sans acte)</span> pour les communications et posters 
																																								</label>
																																								<select class="custom-select" id="typavsa" name="typavsa">
																																										<?php
																																										if (isset($typavsa) && $typavsa == "vis") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="vis1" '.$txt.'>visible</option>';
																																										if (isset($typavsa) && $typavsa == "inv" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="inv" '.$txt.'>invisible</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-2">
																																								<label for="typlng" class="font-weight-bold">
																																								Langue 
																																								</label>
																																								<select class="custom-select" id="typlng" name="typlng">
																																										<?php
																																										if (isset($typlng) && $typlng == "toutes" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="toutes" '.$txt.'>toutes</option>';
																																										if (isset($typlng) && $typlng == "lngf") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="lngf" '.$txt.'>français</option>';
																																										if (isset($typlng) && $typlng == "lnga") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="lnga" '.$txt.'>autres</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																				</div>
																																		</div>
																																		
																																		<div class="border border-dark rounded p-2 mb-2">
																																				<div class="form-group row mb-2">
																																						<div class="form-group col-sm-4">
																																								<label for="delim" class="font-weight-bold">
																																								Délimiteur export CSV
																																								</label>
																																								<select class="custom-select" id="delim" name="delim">
																																										<?php
																																										if (isset($delim) && $delim == ",") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="," '.$txt.'>virgule</option>';
																																										if (isset($delim) && $delim == ";" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value=";" '.$txt.'>point-virgule</option>';
																																										if (isset($delim) && $delim == "£") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="£" '.$txt.'>symbole pound (£)</option>';
																																										if (isset($delim) && $delim == "§") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="§" '.$txt.'>symbole paragraphe (§)</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-4">
																																								<label for="UBitly" class="font-weight-bold">
																																								Disposer d'une URL raccourcie directe
																																								</label>
																																								<select class="custom-select" id="UBitly" name="UBitly">
																																										<?php
																																										if (isset($UBitly) && $UBitly == "oui") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="oui" '.$txt.'>oui</option>';
																																										if (isset($UBitly) && $UBitly == "non" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="non" '.$txt.'>non</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-4">
																																								<label for="typeqp" class="font-weight-bold">
																																								Numérotation/codification par équipe
																																								</label>
																																								<select class="custom-select" id="typeqp" name="typeqp" onchange="afficache_form();">
																																										<?php
																																										if (isset($typeqp) && $typeqp == "oui") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="oui" '.$txt.'>oui</option>';
																																										if (isset($typeqp) && $typeqp == "non" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="non" '.$txt.'>non</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																				</div>
																																				
																																				<div id="deteqp" class="form-group row mb-2">
																																					<div class="col-12">
																																						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="nbeqpid">. Nombre d'équipes</label>
																																						<?php
																																						if (!isset($nbeqp)) {$nbeqp = "";}
																																						?>
																																						<div class="col-sm-1 d-inline-block">
																																							<input type="text" class="form-control" name="nbeqp" id="nbeqpid" value="<?php echo $nbeqp;?>">
																																						</div>
																																					</div>
																																				</div><!-- .form-group -->
																																				
																																				<div id="eqp" class="form-group row mb-2">
																																				<?php
																																				if (isset($typcro) && $typcro == "non" || !isset($team)) {$cron = "checked=\"\"";}else{$cron = "";}
																																				if (isset($typcro) && $typcro == "oui") {$croo = "checked=\"\"";}else{$croo = "";}
																																				if (isset($typexc) && $typexc == "non" || !isset($team)) {$excn = "checked=\"\"";}else{$excn = "";}
																																				if (isset($typexc) && $typexc == "oui") {$exco = "checked=\"\"";}else{$exco = "";}
																																				if (isset($typeqp) && $typeqp == "oui") {//Numérotation/codification par équipe
																																					if (isset($_POST["soumis"])) {
																																						for($i = 1; $i <= $nbeqp; $i++) {
																																							echo '<div class="col-12">';
																																							echo '	<div class="col-sm-8 d-inline-block">';
																																							echo '		<label for="eqp'.$i.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;. Nom HAL équipe '.$i.'</label>';
																																							echo '		<input type="text" class="form-control" id="eqp'.$i.'" name="eqp'.$i.'" value = "'.strtoupper($_POST['eqp'.$i]).'"><br>';
																																							echo '	</div>';
																																							echo '</div>';
																																						}
																																						echo '<div class="form-group row mb-2">';
																																						echo '	<div class="col-sm-8">';
																																						echo '    <label for="typcro" class="font-weight-bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;. Limiter l\'affichage seulement aux &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;publications croisées </label>';
																																						echo '	</div>';
																																						echo '	<div class="col-sm-2">';
																																						echo '		<input type="radio" id="typcro1" name="typcro" value="non" '.$cron.' class="custom-control-input">';
																																						echo '		<label class="custom-control-label" for="typcro1">non</label>';
																																						echo '	</div>';
																																						echo '	<div class="col-sm-2">';
																																						echo '		<input type="radio" id="typcro2" name="typcro" value="oui" '.$croo.' class="custom-control-input">';
																																						echo '		<label class="custom-control-label" for="typcro2">oui</label>';
																																						echo '	</div>';
																																						echo '</div>';

																																						echo '<div class="form-group row mb-2">';
																																						echo '	<div class="col-sm-8">';
																																						echo '    <label for="typexc" class="font-weight-bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ne pas afficher les publications&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;de cette(ces) équipe(s) </label>';
																																						echo '	</div>';
																																						echo '	<div class="col-sm-2">';
																																						echo '		<input type="radio" id="typexc1" name="typexc" value="non" '.$excn.' class="custom-control-input">';
																																						echo '		<label class="custom-control-label" for="typexc1">non</label>';
																																						echo '	</div>';
																																						echo '	<div class="col-sm-2">';
																																						echo '		<input type="radio" id="typexc2" name="typexc" value="oui" '.$exco.' class="custom-control-input">';
																																						echo '		<label class="custom-control-label" for="typexc2">oui</label>';
																																						echo '	</div>';
																																						echo '</div>';																																						
																																					}
																																					if (isset($_GET["team"])) {
																																						for($i = 1; $i <= $nbeqp; $i++) {
																																							echo '<div class="col-12">';
																																							echo '	<div class="col-sm-8 d-inline-block">';
																																							echo '		<label for="eqp'.$i.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;. Nom HAL équipe '.$i.'</label>';
																																							echo '		<input type="text" class="form-control" id="eqp'.$i.'" name="eqp'.$i.'" value = "'.$_GET['eqp'.$i].'"><br>';
																																							echo '	</div>';
																																							echo '</div>';
																																						}
																																						echo '<div class="col-12">';
																																						echo '<label for="typcro" class="col-sm-3 font-weight-bold text-left d-inline-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;. Limiter l\'affichage seulement aux publications croisées </label>';
																																						echo '	<div class="col-sm-2 custom-control custom-radio d-inline-block">';
																																						echo '		<input type="radio" id="typcro1" name="typcro" value="non" '.$cron.' class="custom-control-input">';
																																						echo '		<label class="custom-control-label" for="typcro1">non</label>';
																																						echo '	</div>';
																																						echo '	<div class="col-sm-2 custom-control custom-radio d-inline-block">';
																																						echo '		<input type="radio" id="typcro2" name="typcro" value="oui" '.$croo.' class="custom-control-input">';
																																						echo '		<label class="custom-control-label" for="typcro2">oui</label>';
																																						echo '	</div>';
																																						echo '</div>';

																																						echo '<div class="form-group row mb-2">';
																																						echo '	<div class="col-sm-8">';
																																						echo '    <label for="typcro" class="font-weight-bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ne pas afficher les publications&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;de cette(ces) équipe(s) </label>';
																																						echo '	</div>';
																																						echo '	<div class="col-sm-2">';
																																						echo '		<input type="radio" id="typexc1" name="typexc" value="non" '.$excn.' class="custom-control-input">';
																																						echo '		<label class="custom-control-label" for="typexc1">non</label>';
																																						echo '	</div>';
																																						echo '	<div class="col-sm-2">';
																																						echo '		<input type="radio" id="typexc2" name="typexc" value="oui" '.$exco.' class="custom-control-input">';
																																						echo '		<label class="custom-control-label" for="typexc2">oui</label>';
																																						echo '	</div>';
																																						echo '</div>';																																						
																																					}
																																				}
																																				?>
																																				</div><!-- .form-group -->
																																				
																																		</div>
																																		
                                                                </div>
																														</div>
                                                        </div>
																												
																												<?php
																													include("./Glob_IP_list.php");
																													if (in_array($ip, $IP_aut)) {
																												?>
																												
																												<div class="card mb-0">
                                                            <div class="card-header" id="headingThree">
                                                                <h5 class="m-0">
                                                                    <a class="custom-accordion-title collapsed d-block"
                                                                        data-toggle="collapse" href="#collapseThree"
                                                                        aria-expanded="true" aria-controls="collapseThree">
                                                                        Options supplémentaires
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionChoix">
                                                                <div class="card-body">
																																		<!-- <div class="border border-dark rounded p-2 mb-2"> -->
																																				<!-- <div class="form-group row mb-2"> -->
																																						<!--Suppression temporaire (?) des Rang revues HCERES/CNRS (Economie-Gestion) -->

																																						<!-- <div class="form-group col-sm-2"> -->
																																								<!-- <label for="typreva" class="font-weight-bold"> -->
																																								<!-- Rang revues HCERES (Economie-Gestion) -->
																																								<!-- </label> -->
																																								<!-- <select class="custom-select" id="typreva" name="typreva"> -->
																																										<?php
																																										//if (isset($typreva) && $typreva == "vis") {$txt = "selected";}else{$txt = "";}
																																										//echo '<option value="vis" '.$txt.'>visible</option>';
																																										//if (isset($typreva) && $typreva == "inv" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										//echo '<option value="inv" '.$txt.'>invisible</option>';
																																										?>
																																								<!-- </select> -->
																																						<!-- </div> .form-group -->
																																						
																																						<!-- <div class="form-group col-sm-4"> -->
																																								<!-- <label for="typrevh" class="font-weight-bold"> -->
																																								<!-- Rang revues HCERES (Toutes disciplines) -->
																																								<!-- </label> -->
																																								<!-- <select class="custom-select" id="typrevh" name="typrevh"> -->
																																										<?php
																																										//if (isset($typrevh) && $typrevh == "vis") {$txt = "selected";}else{$txt = "";}
																																										//echo '<option value="vis" '.$txt.'>visible</option>';
																																										//if (isset($typrevh) && $typrevh == "inv" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										//echo '<option value="inv" '.$txt.'>invisible</option>';
																																										?>
																																								<!-- </select> -->
																																						<!-- </div> .form-group  -->
																																						
																																						<!-- <div class="form-group col-sm-8">
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
																																							<label for="dscp" class="font-weight-bold">
																																							Discipline rang revues HCERES
																																							</label>
																																							<select id="dscp" class=" form-control" name="dscp">
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
																																						</div> .form-group -->
																																						
																																						<!-- <div class="form-group col-sm-2">
																																								<label for="typrevc" class="font-weight-bold">
																																								Rang revues CNRS (Economie-Gestion) 
																																								</label>
																																								<select class="custom-select" id="typrevc" name="typrevh">
																																										<?php
																																										//if (isset($typrevc) && $typrevc == "vis") {$txt = "selected";}else{$txt = "";}
																																										//echo '<option value="vis" '.$txt.'>visible</option>';
																																										//if (isset($typrevc) && $typrevc == "inv" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										//echo '<option value="inv" '.$txt.'>invisible</option>';
																																										?>
																																								</select>
																																						</div> .form-group 
																																				</div>
																																		</div> -->
																																		
																																		<div class="border border-dark rounded p-2 mb-2">
																																				<div class="form-group row mb-2">
																																						<div class="form-group col-sm-4">
																																								<label for="typif" class="font-weight-bold">
																																								IF des revues <span class="font-italic font-weight-normal">(il peut être nécessaire de lancer <a target="_blank" rel="noopener noreferrer" href="./ExtrHAL_IF.php">la procédure d'extraction</a> à partir de votre liste CSV réalisée selon ce <a href="./modele-JCR.csv">modèle</a>)</span> 
																																								</label>
																																								<select class="custom-select" id="typif" name="typif">
																																										<?php
																																										//if (strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false || strpos($_SERVER['HTTP_HOST'], 'ecobio') !== false) {
																																										if (isset($typif) && $typif == "vis") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="vis" '.$txt.'>visible</option>';
																																										if (isset($typif) && $typif == "inv" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="inv" '.$txt.'>invisible</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-4">
																																								<label for="typinc" class="font-weight-bold">
																																								InCites Top 1%/10% <span class="font-italic font-weight-normal">(il peut être nécessaire de lancer <a target="_blank" rel="noopener noreferrer" href="./ExtrHAL_InCites.php">la procédure d'extraction</a> à partir de votre liste CSV réalisée selon ce <a href="./modele-InCites.csv">modèle</a>)</span> 
																																								</label>
																																								<select class="custom-select" id="typinc" name="typinc">
																																										<?php
																																										if (isset($typinc) && $typinc == "vis") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="vis" '.$txt.'>visible</option>';
																																										if (isset($typinc) && $typinc == "vis1") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="vis1" '.$txt.'>top 1%</option>';
																																										if (isset($typinc) && $typinc == "vis10") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="vis10" '.$txt.'>top 10%</option>';
																																										if (isset($typinc) && $typinc == "inv" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="inv" '.$txt.'>invisible</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																						<div class="form-group col-sm-4">
																																								<label for="typsign" class="font-weight-bold">
																																								HCERES distinguer les 20% / 80% : <span class="font-weight-normal"><a target="_blank" rel="noopener noreferrer" href="./ExtrHAL_signif.php">chargez votre liste CSV</a> en suivant ce <a href="./modele-signif.csv">modèle</a></span> 
																																								</label>
																																								<select class="custom-select" id="typsign" name="typsign">
																																										<?php
																																										if (isset($typsign) && $typsign == "ts100") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="ts100" '.$txt.'>visible (→)</option>';
																																										if (isset($typsign) && $typsign == "ts2080") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="ts2080" '.$txt.'>visible (20% / 80%)</option>';
																																										if (isset($typsign) && $typsign == "ts20") {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="ts20" '.$txt.'>visible (20%)</option>';
																																										if (isset($typsign) && $typsign == "ts0" || !isset($team)) {$txt = "selected";}else{$txt = "";}
																																										echo '<option value="ts0" '.$txt.'>invisible</option>';
																																										?>
																																								</select>
																																						</div><!-- .form-group -->
																																						
																																				</div>
																																		</div>
																																</div>
																														</div>
                                                        </div>
																												
																												<?php
																													}else{
																														echo '<input type="hidden" name="typif" value="inv">';
																														echo '<input type="hidden" name="typinc" value="inv">';
																														echo '<input type="hidden" name="typsign" value="ts0">';
																													}
																												?>

                                                        <div class="card mb-0">
                                                            <div class="card-header" id="headingFour">
                                                                <h5 class="m-0">
                                                                    <a class="custom-accordion-title collapsed d-block"
                                                                        data-toggle="collapse" href="#collapseFour"
                                                                        aria-expanded="true" aria-controls="collapseFour">
                                                                        Options de styles de citations
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionChoix">
                                                                <div class="card-body">
                                                                    <div class="alert alert-warning" role="alert">
                                                                        <strong>Attention !</strong> Cette fonctionnalité est expérimentale et concerne essentiellement les articles de revues.
                                                                    </div>
                                                                    <p>
                                                                        <strong>Important, loi du tout ou rien</strong> si aucune option ci-dessous n'est choisie, ce sont les règles équivalentes ci-dessus qui seront appliquées. A l'inverse, si une option ci-dessous est choisie, il faut alors obligatoirement faire un choix pour toutes les autres possibilités et ce seront ces règles qui seront appliquées. Le style 'Majuscules' sera prioritaire au style 'Minuscules' si les deux sont sélectionnés.
                                                                     </p>
																																		
																																		<div class="form-group">
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
																																			<label for="stpdf">Styles prédéfinis</label> <em>(l'adéquation avec le style demandé dépend des éléments qui ont été renseignés dans HAL)</em><br>
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
																																			<span id="Styles_personnalises">Styles personnalisés <em>(mise en forme interne des groupes sélection/désélection multiple en maintenant la touche 'Ctrl' (PC) ou 'Pomme' (Mac) enfoncée - Par exemple, Gras + Entre () + Majuscule)</em></span>
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
																																			<table style="font-size: 80%; margin: auto; width: 100%;" class="form-inline" aria-describedby="Styles_personnalises">
																																				<tr>
																																					<th scope="col" colspan="15">
																																						<label for="spa" class="d-inline-block">Séparateur interne au groupe d'auteurs</label>
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
																																					<td><label for="sep5">Sép. 5</label></td>
																																					<td><label for="gp6">Groupe 6</label></td>
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
																																					<td style="width: 100px;">
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
																																					<td style="width: 100px;">
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
																																					<td style="width: 100px;">
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
																																					<td style="width: 100px;">
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
																																					<td style="width: 100px;">
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
																																					<td style="width: 100px;">
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
																																					<td style="width: 100px;">
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
																																					<td style="width: 100px;">
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
																																					<td style="width: 100px;">
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
																																					<td style="width: 100px;">
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
																																							<td style="width: 100px;">
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
																																							<td style="width: 100px;">
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
																																						<select id="mp2" class="form-control" style="width: 75px; font-size: 80%;" size="11" name="mp2[]" multiple>
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
																																						<select id="mp3" class="form-control" style="width: 75px; font-size: 80%;" size="11" name="mp3[]" multiple>
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
																																						<select id="mp4" class="form-control" style="width: 75px; font-size: 80%;" size="11" name="mp4[]" multiple>
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
																																						<select id="mp5" class="form-control" style="width: 75px; font-size: 80%;" size="11" name="mp5[]" multiple>
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
																																						<select id="mp6" class="form-control" style="width: 75px; font-size: 80%;" size="11" name="mp6[]" multiple>
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
																																						<select id="mp7" class="form-control" style="width: 75px; font-size: 80%;" size="11" name="mp7[]" multiple>
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
																																				 <td><input type="text" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" id="cg1" name="cg1" size="10" class="form-control jscolor {closable:true,closeText:'Fermer'}" value="<?php echo $cg1v;?>" onChange="majapercu();"></td>
																																				 <td>&nbsp;</td>
																																				 <td><input type="text" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" id="cg2" name="cg2" size="10" class="form-control jscolor {closable:true,closeText:'Fermer'}" value="<?php echo $cg2v;?>" onChange="majapercu();"></td>
																																				 <td>&nbsp;</td>
																																				 <td><input type="text" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" id="cg3" name="cg3" size="10" class="form-control jscolor {closable:true,closeText:'Fermer'}" value="<?php echo $cg3v;?>" onChange="majapercu();"></td>
																																				 <td>&nbsp;</td>
																																				 <td><input type="text" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" id="cg4" name="cg4" size="10" class="form-control jscolor {closable:true,closeText:'Fermer'}" value="<?php echo $cg4v;?>" onChange="majapercu();"></td>
																																				 <td>&nbsp;</td>
																																				 <td><input type="text" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" id="cg5" name="cg5" size="10" class="form-control jscolor {closable:true,closeText:'Fermer'}" value="<?php echo $cg5v;?>" onChange="majapercu();"></td>
																																				 <td>&nbsp;</td>
																																				 <td><input type="text" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" id="cg6" name="cg6" size="10" class="form-control jscolor {closable:true,closeText:'Fermer'}" value="<?php echo $cg6v;?>" onChange="majapercu();"></td>
																																				 <td>&nbsp;</td>
																																				 <td><input type="text" style="width: 60px; height: 16px; font-size: 80%; padding: 0px;" id="cg7" name="cg7" size="10" class="form-control jscolor {closable:true,closeText:'Fermer'}" value="<?php echo $cg7v;?>" onChange="majapercu();"></td>
																																				 <td>&nbsp;</td>
																																				</tr>
																																			</table><br><br>
																																			<u>Aperçu</u><br>
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
																																			La suite sera constituée des éléments habituels s'ils ont été demandés DOI, Pubmed, etc.
																																			<br><br>
																																	
                                                                    </div>
																																</div>
																														</div>
                                                        </div>
																										</div> <!-- .accordion -->
																								</div> <!-- .col -->
                                            </div> <!-- .form-group -->

                                            <div class="form-group row mt-4">
                                                <div class="col-12 justify-content-center d-flex">
                                                    <input type="submit" class="btn btn-md btn-primary btn-lg" value="Valider" name="soumis">
                                                </div>
                                            </div>
                                            
                                        </form>