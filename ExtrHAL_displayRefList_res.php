<?php
if (isset($choix_publis) && strpos($choix_publis, "-TA-") !== false) {
	//$sect->writeText(substr($sortArray[$i],-4)."<br><br>", $font);
	echo "<br><a name=\"TA\"></a><h2>Tous les articles (sauf vulgarisation)".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	$sect->writeText("<br><strong>Tous les articles (sauf vulgarisation)".$cpmlng.$detail."</strong><br>", $fonth2);
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Tous les articles (sauf vulgarisation)".$cpmlng.$detail.chr(13).chr(10));
	list($numbers["TA"],$crores["TA"],$numbersTG["TA"]) = displayRefList("ART",$team,"%20AND%20NOT%20popularLevel_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"TA",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_publis) && strpos($choix_publis, "-ACL-") !== false) {
	echo "<br><a name=\"ACL\"></a><h2>Articles de revues à comité de lecture".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Articles de revues à comité de lecture".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Articles de revues à comité de lecture".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["ACL"],$crores["ACL"],$numbersTG["ACL"]) = displayRefList("ART",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20peerReviewing_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"ACL",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_publis) && strpos($choix_publis, "-ASCL-") !== false) {
	echo "<br><a name=\"ASCL\"></a><h2>Articles de revues sans comité de lecture".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Articles de revues sans comité de lecture".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Articles de revues sans comité de lecture".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["ASCL"],$crores["ASCL"],$numbersTG["ASCL"]) = displayRefList("ART",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20peerReviewing_s:0".$specificRequestCode,$countries,$anneedeb,$anneefin,"ASCL",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_publis) && strpos($choix_publis, "-ARI-") !== false) {
	echo "<br><a name=\"ARI\"></a><h2>Articles de revues internationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Articles de revues internationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Articles de revues internationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["ARI"],$crores["ARI"],$numbersTG["ARI"]) = displayRefList("ART",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20audience_s:2".$critInt.$specificRequestCode,$countries,$anneedeb,$anneefin,"ARI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_publis) && strpos($choix_publis, "-ARN-") !== false) {
	echo "<br><a name=\"ARN\"></a><h2>Articles de revues nationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Articles de revues nationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Articles de revues nationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["ARN"],$crores["ARN"],$numbersTG["ARN"]) = displayRefList("ART",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20(audience_s:3%20OR%20audience_s:0%20OR%20audience_s:1)".$critNat.$specificRequestCode,$countries,$anneedeb,$anneefin,"ARN",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_publis) && strpos($choix_publis, "-ACLRI-") !== false) {
	echo "<br><a name=\"ACLRI\"></a><h2>Articles de revues internationales à comité de lecture".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Articles de revues internationales à comité de lecture".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Articles de revues internationales à comité de lecture".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["ACLRI"],$crores["ACLRI"],$numbersTG["ACLRI"]) = displayRefList("ART",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20audience_s:2%20AND%20peerReviewing_s:1".$critInt.$specificRequestCode,$countries,$anneedeb,$anneefin,"ACLRI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_publis) && strpos($choix_publis, "-ACLRN-") !== false) {
	echo "<br><a name=\"ACLRN\"></a><h2>Articles de revues nationales à comité de lecture".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Articles de revues nationales à comité de lecture".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Articles de revues nationales à comité de lecture".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["ACLRN"],$crores["ACLRN"],$numbersTG["ACLRN"]) = displayRefList("ART",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20(audience_s:3%20OR%20audience_s:0%20OR%20audience_s:1)%20AND%20peerReviewing_s:1".$critNat.$specificRequestCode,$countries,$anneedeb,$anneefin,"ACLRN",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_publis) && strpos($choix_publis, "-ASCLRI-") !== false) {
	echo "<br><a name=\"ASCLRI\"></a><h2>Articles de revues internationales sans comité de lecture".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Articles de revues internationales sans comité de lecture".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Articles de revues internationales sans comité de lecture".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["ASCLRI"],$crores["ASCLRI"],$numbersTG["ASCLRI"]) = displayRefList("ART",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20audience_s:2%20AND%20peerReviewing_s:0".$critInt.$specificRequestCode,$countries,$anneedeb,$anneefin,"ASCLRI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_publis) && strpos($choix_publis, "-ASCLRN-") !== false) {
	echo "<br><a name=\"ASCLRN\"></a><h2>Articles de revues nationales sans comité de lecture".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Articles de revues nationales sans comité de lecture".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Articles de revues nationales sans comité de lecture".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["ASCLRN"],$crores["ASCLRN"],$numbersTG["ASCLRN"]) = displayRefList("ART",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20(audience_s:3%20OR%20audience_s:0%20OR%20audience_s:1)%20AND%20peerReviewing_s:0".$critNat.$specificRequestCode,$countries,$anneedeb,$anneefin,"ASCLRN",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_publis) && strpos($choix_publis, "-AV-") !== false) {
	echo "<br><a name=\"AV\"></a><h2>Articles de vulgarisation".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Articles de vulgarisation".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Articles de vulgarisation".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["AV"],$crores["AV"],$numbersTG["AV"]) = displayRefList("ART",$team,"%20AND%20popularLevel_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"AV",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-TC-") !== false) {
	echo "<br><a name=\"TC\"></a><h2>Toutes les communications (sauf grand public)".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Toutes les communications (sauf grand public)".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Toutes les communications (sauf grand public)".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["TC"],$crores["TC"],$numbersTG["TC"]) = displayRefList("COMM+POST",$team,"%20AND%20NOT%20popularLevel_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"TC",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CA-") !== false) {
	echo "<br><a name=\"CA\"></a><h2>Communications avec actes".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications avec actes".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications avec actes".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CA"],$crores["CA"],$numbersTG["CA"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20proceedings_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"CA",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CSA-") !== false) {
	echo "<br><a name=\"CSA\"></a><h2>Communications sans actes".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications sans actes".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications sans actes".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CSA"],$crores["CSA"],$numbersTG["CSA"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20proceedings_s:0".$specificRequestCode,$countries,$anneedeb,$anneefin,"CSA",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CI-") !== false) {
	echo "<br><a name=\"CI\"></a><h2>Communications internationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications internationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications internationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CI"],$crores["CI"],$numbersTG["CI"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20audience_s:2".$critInt.$specificRequestCode,$countries,$anneedeb,$anneefin,"CI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CN-") !== false) {
	echo "<br><a name=\"CN\"></a><h2>Communications nationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications nationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications nationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CN"],$crores["CN"],$numbersTG["CN"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20(audience_s:3%20OR%20audience_s:1%20OR%20audience_s:0)".$critNat.$specificRequestCode,$countries,$anneedeb,$anneefin,"CN",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CAI-") !== false) {
	echo "<br><a name=\"CAI\"></a><h2>Communications avec actes internationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications avec actes internationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications avec actes internationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CAI"],$crores["CAI"],$numbersTG["CAI"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20proceedings_s:1%20AND%20audience_s:2".$critInt.$specificRequestCode,$countries,$anneedeb,$anneefin,"CAI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CSAI-") !== false) {
	echo "<br><a name=\"CSAI\"></a><h2>Communications sans actes internationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications sans actes internationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications sans actes internationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CSAI"],$crores["CSAI"],$numbersTG["CSAI"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20proceedings_s:0%20AND%20audience_s:2".$critInt.$specificRequestCode,$countries,$anneedeb,$anneefin,"CSAI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CAN-") !== false) {
	echo "<br><a name=\"CAN\"></a><h2>Communications avec actes nationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications avec actes nationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications avec actes nationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CAN"],$crores["CAN"],$numbersTG["CAN"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20proceedings_s:1%20AND%20(audience_s:3%20OR%20audience_s:1%20OR%20audience_s:0)".$critNat.$specificRequestCode,$countries,$anneedeb,$anneefin,"CAN",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CSAN-") !== false) {
	echo "<br><a name=\"CSAN\"></a><h2>Communications sans actes nationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications sans actes nationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications sans actes nationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CSAN"],$crores["CSAN"],$numbersTG["CSAN"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20proceedings_s:0%20AND%20(audience_s:3%20OR%20audience_s:1%20OR%20audience_s:0)".$critNat.$specificRequestCode,$countries,$anneedeb,$anneefin,"CSAN",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CINVASANI-") !== false) {
	echo "<br><a name=\"CINVASANI\"></a><h2>Communications invitées avec ou sans actes, nationales ou internationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications invitées avec ou sans actes, nationales ou internationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications invitées avec ou sans actes, nationales ou internationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CINVASANI"],$crores["CINVASANI"],$numbersTG["CINVASANI"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20invitedCommunication_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"CINVASANI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CINVA-") !== false) {
	echo "<br><a name=\"CINVA\"></a><h2>Communications invitées avec actes".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications invitées avec actes".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications invitées avec actes".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CINVA"],$crores["CINVA"],$numbersTG["CINVA"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20invitedCommunication_s:1%20AND%20proceedings_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"CINVA",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CINVSA-") !== false) {
	echo "<br><a name=\"CINVSA\"></a><h2>Communications invitées sans actes".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications invitées sans actes".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications invitées sans actes".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CINVSA"],$crores["CINVSA"],$numbersTG["CINVSA"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20invitedCommunication_s:1%20AND%20proceedings_s:0".$specificRequestCode,$countries,$anneedeb,$anneefin,"CINVSA",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CNONINVA-") !== false) {
	echo "<br><a name=\"CNONINVA\"></a><h2>Communications non invitées avec actes".$cpmlng.$detail."<a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications non invitées avec actes".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications non invitées avec actes".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CNONINVA"],$crores["CNONINVA"],$numbersTG["CNONINVA"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20invitedCommunication_s:0%20AND%20proceedings_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"CNONINVA",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CNONINVSA-") !== false) {
	echo "<br><a name=\"CNONINVSA\"></a><h2>Communications non invitées sans actes".$cpmlng.$detail."<a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications non invitées sans actes".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications non invitées sans actes".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CNONINVSA"],$crores["CNONINVSA"],$numbersTG["CNONINVSA"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20invitedCommunication_s:0%20AND%20proceedings_s:0".$specificRequestCode,$countries,$anneedeb,$anneefin,"CNONINVSA",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CINVI-") !== false) {
	echo "<br><a name=\"CINVI\"></a><h2>Communications invitées internationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications invitées internationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications invitées internationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CINVI"],$crores["CINVI"],$numbersTG["CINVI"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20invitedCommunication_s:1%20AND%20audience_s:2".$critInt.$specificRequestCode,$countries,$anneedeb,$anneefin,"CINVI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CNONINVI-") !== false) {
	echo "<br><a name=\"CNONINVI\"></a><h2>Communications non invitées internationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications non invitées internationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications non invitées internationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CNONINVI"],$crores["CNONINVI"],$numbersTG["CNONINVI"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20invitedCommunication_s:0%20AND%20audience_s:2".$critInt.$specificRequestCode,$countries,$anneedeb,$anneefin,"CNONINVI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CINVN-") !== false) {
	echo "<br><a name=\"CINVN\"></a><h2>Communications invitées nationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications invitées nationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications invitées nationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CINVN"],$crores["CINVN"],$numbersTG["CINVN"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20invitedCommunication_s:1%20AND%20(audience_s:3%20OR%20audience_s:1%20OR%20audience_s:0)".$critNat.$specificRequestCode,$countries,$anneedeb,$anneefin,"CINVN",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CNONINVN-") !== false) {
	echo "<br><a name=\"CNONINVN\"></a><h2>Communications non invitées nationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications non invitées nationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications non invitées nationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CNONINVN"],$crores["CONOINVN"],$numbersTG["CONOINVN"]) = displayRefList("COMM",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20invitedCommunication_s:0%20AND%20(audience_s:3%20OR%20audience_s:1%20OR%20audience_s:0)".$critNat.$specificRequestCode,$countries,$anneedeb,$anneefin,"CNONINVN",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CPASANI-") !== false) {
	echo "<br><a name=\"CPASANI\"></a><h2>Communications par affiches (posters) avec ou sans actes, nationales ou internationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications par affiches (posters) avec ou sans actes, nationales ou internationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications par affiches (posters) avec ou sans actes, nationales ou internationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CPASANI"],$crores["CPASANI"],$numbersTG["CPASANI"]) = displayRefList("POSTER",$team,"%20AND%20NOT%20popularLevel_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"CPASANI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CPA-") !== false) {
	echo "<br><a name=\"CPA\"></a><h2>Communications par affiches (posters) avec actes".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications par affiches (posters) avec actes".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications par affiches (posters) avec actes".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CPA"],$crores["CPA"],$numbersTG["CPA"]) = displayRefList("POSTER",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20proceedings_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"CPA",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CPSA-") !== false) {
	echo "<br><a name=\"CPSA\"></a><h2>Communications par affiches (posters) sans actes".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications par affiches (posters) sans actes".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications par affiches (posters) sans actes".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CPSA"],$crores["CPSA"],$numbersTG["CPSA"]) = displayRefList("POSTER",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20proceedings_s:0".$specificRequestCode,$countries,$anneedeb,$anneefin,"CPSA",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CPI-") !== false) {
	echo "<br><a name=\"CPI\"></a><h2>Communications par affiches internationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications par affiches internationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications par affiches internationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CPI"],$crores["CPI"],$numbersTG["CPI"]) = displayRefList("POSTER",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20audience_s:2".$critInt.$specificRequestCode,$countries,$anneedeb,$anneefin,"CPI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CPN-") !== false) {
	echo "<br><a name=\"CPN\"></a><h2>Communications par affiches nationales".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Communications par affiches nationales".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Communications par affiches nationales".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CPN"],$crores["CPN"],$numbersTG["CPN"]) = displayRefList("POSTER",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20(audience_s:3%20OR%20audience_s:1%20OR%20audience_s:0)".$critNat.$specificRequestCode,$countries,$anneedeb,$anneefin,"CPN",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_comm) && strpos($choix_comm, "-CGP-") !== false) {
	echo "<br><a name=\"CGP\"></a><h2>Conférences grand public".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Conférences grand public".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Conférences grand public".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CGP"],$crores["CGP"],$numbersTG["CGP"]) = displayRefList("COMM",$team,"%20AND%20popularLevel_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"CGP",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCDO-") !== false) {
	echo "<br><a name=\"OCDO\"></a><h2>Ouvrages ou chapitres ou directions d’ouvrages".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Ouvrages ou chapitres ou directions d’ouvrages".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Ouvrages ou chapitres ou directions d’ouvrages".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["OCDO"],$crores["OCDO"],$numbersTG["OCDO"]) = displayRefList("OUV+COUV+DOUV",$team,"%20AND%20NOT%20popularLevel_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"OCDO",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCDOI-") !== false) {
	echo "<br><a name=\"OCDOI\"></a><h2>Ouvrages ou chapitres ou directions d’ouvrages de portée internationale".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Ouvrages ou chapitres ou directions d’ouvrages de portée internationale".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Ouvrages ou chapitres ou directions d’ouvrages de portée internationale".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["OCDOI"],$crores["OCDOI"],$numbersTG["OCDOI"]) = displayRefList("OUV+COUV+DOUV",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20audience_s:2".$critInt.$specificRequestCode,$countries,$anneedeb,$anneefin,"OCDOI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCDON-") !== false) {
	echo "<br><a name=\"OCDON\"></a><h2>Ouvrages ou chapitres ou directions d’ouvrages de portée nationale".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Ouvrages ou chapitres ou directions d’ouvrages de portée nationale".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Ouvrages ou chapitres ou directions d’ouvrages de portée nationale".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["OCDON"],$crores["OCDON"],$numbersTG["OCDON"]) = displayRefList("OUV+COUV+DOUV",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20(audience_s:3%20OR%20audience_s:1%20OR%20audience_s:0)".$critNat.$specificRequestCode,$countries,$anneedeb,$anneefin,"OCDON",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-TO-") !== false) {
	echo "<br><a name=\"TO\"></a><h2>Tous les ouvrages (sauf vulgarisation)".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Tous les ouvrages (sauf vulgarisation)".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Tous les ouvrages (sauf vulgarisation)".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["TO"],$crores["TO"],$numbersTG["TO"]) = displayRefList("OUV",$team,"%20AND%20NOT%20popularLevel_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"TO",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OSPI-") !== false) {
	echo "<br><a name=\"OSPI\"></a><h2>Ouvrages scientifiques de portée internationale".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Ouvrages scientifiques de portée internationale".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Ouvrages scientifiques de portée internationale".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["OSPI"],$crores["OSPI"],$numbersTG["OSPI"]) = displayRefList("OUV",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20audience_s:2".$critInt.$specificRequestCode,$countries,$anneedeb,$anneefin,"OSPI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OSPN-") !== false) {
	echo "<br><a name=\"OSPN\"></a><h2>Ouvrages scientifiques de portée nationale".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Ouvrages scientifiques de portée nationale".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Ouvrages scientifiques de portée nationale".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["OSPN"],$crores["OSPN"],$numbersTG["OSPN"]) = displayRefList("OUV",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20(audience_s:3%20OR%20audience_s:1%20OR%20audience_s:0)".$critNat.$specificRequestCode,$countries,$anneedeb,$anneefin,"OSPN",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-COS-") !== false) {
	echo "<br><a name=\"COS\"></a><h2>Chapitres d’ouvrages scientifiques".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Chapitres d'ouvrages scientifiques".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Chapitres d’ouvrages scientifiques".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["COS"],$crores["COS"],$numbersTG["COS"]) = displayRefList("COUV",$team,""."%20AND%20NOT%20popularLevel_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"COS",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-COSI-") !== false) {
	echo "<br><a name=\"COSI\"></a><h2>Chapitres d’ouvrages scientifiques de portée internationale".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Chapitres d’ouvrages scientifiques de portée internationale".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Chapitres d’ouvrages scientifiques de portée internationale".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["COSI"],$crores["COSI"],$numbersTG["COSI"]) = displayRefList("COUV",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20audience_s:2".$critInt.$specificRequestCode,$countries,$anneedeb,$anneefin,"COSI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-COSN-") !== false) {
	echo "<br><a name=\"COSN\"></a><h2>Chapitres d’ouvrages scientifiques de portée nationale".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Chapitres d’ouvrages scientifiques de portée nationale".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Chapitres d’ouvrages scientifiques de portée nationale".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["COSN"],$crores["COSN"],$numbersTG["COSN"]) = displayRefList("COUV",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20(audience_s:3%20OR%20audience_s:1%20OR%20audience_s:0)".$critNat.$specificRequestCode,$countries,$anneedeb,$anneefin,"COSN",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-DOS-") !== false) {
	echo "<br><a name=\"DOS\"></a><h2>Directions d’ouvrages scientifiques".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Directions d’ouvrages scientifiques".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Directions d’ouvrages scientifiques".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["DOS"],$crores["DOS"],$numbersTG["DOS"]) = displayRefList("DOUV",$team,""."%20AND%20NOT%20popularLevel_s:1%20AND%20NOT%20journalTitle_s:*".$specificRequestCode,$countries,$anneedeb,$anneefin,"DOS",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-DOSI-") !== false) {
	echo "<br><a name=\"DOSI\"></a><h2>Directions d’ouvrages scientifiques de portée internationale".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Directions d’ouvrages scientifiques de portée internationale".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Directions d’ouvrages scientifiques de portée internationale".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["DOSI"],$crores["DOSI"],$numbersTG["DOSI"]) = displayRefList("DOUV",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20audience_s:2%20AND%20NOT%20journalTitle_s:*".$critInt.$specificRequestCode,$countries,$anneedeb,$anneefin,"DOSI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);

}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-DOSN-") !== false) {
	echo "<br><a name=\"DOSN\"></a><h2>Directions d’ouvrages scientifiques de portée nationale".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Directions d’ouvrages scientifiques de portée nationale".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Directions d’ouvrages scientifiques de porté nationale".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["DOSN"],$crores["DOSN"],$numbersTG["DOSN"]) = displayRefList("DOUV",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20(audience_s:3%20OR%20audience_s:1%20OR%20audience_s:0)%20AND%20NOT%20journalTitle_s:*".$critNat.$specificRequestCode,$countries,$anneedeb,$anneefin,"DOSN",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCO-") !== false) {
	echo "<br><a name=\"OCO\"></a><h2>Ouvrages ou chapitres d’ouvrages".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Ouvrages ou chapitres d’ouvrages".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Ouvrages ou chapitres d’ouvrages".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["OCO"],$crores["OCO"],$numbersTG["OCO"]) = displayRefList("OUV+COUV",$team,""."%20AND%20NOT%20popularLevel_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"OCO",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCOI-") !== false) {
	echo "<br><a name=\"OCOI\"></a><h2>Ouvrages ou chapitres d’ouvrages de portée internationale".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Ouvrages ou chapitres d’ouvrages de portée internationale".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Ouvrages ou chapitres d’ouvrages de portée internationale".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["OCOI"],$crores["OCOI"],$numbersTG["OCOI"]) = displayRefList("OUV+COUV",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20audience_s:2".$critInt.$specificRequestCode,$countries,$anneedeb,$anneefin,"OCOI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCON-") !== false) {
	echo "<br><a name=\"OCON\"></a><h2>Ouvrages ou chapitres d’ouvrages de portée nationale".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Ouvrages ou chapitres d’ouvrages de portée nationale".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Ouvrages ou chapitres d’ouvrages de portée nationale".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["OCON"],$crores["OCON"],$numbersTG["OCON"]) = displayRefList("OUV+COUV",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20(audience_s:3%20OR%20audience_s:1%20OR%20audience_s:0)".$critNat.$specificRequestCode,$countries,$anneedeb,$anneefin,"OCON",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-ODO-") !== false) {
	echo "<br><a name=\"ODO\"></a><h2>Ouvrages ou directions d’ouvrages".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Ouvrages ou directions d’ouvrages".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Ouvrages ou directions d’ouvrages".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["ODO"],$crores["ODO"],$numbersTG["ODO"]) = displayRefList("OUV+DOUV",$team,""."%20AND%20NOT%20popularLevel_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"ODO",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-ODOI-") !== false) {
	echo "<br><a name=\"ODOI\"></a><h2>Ouvrages ou directions d’ouvrages de portée internationale".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Ouvrages ou directions d’ouvrages de portée internationale".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Ouvrages ou directions d’ouvrages de portée internationale".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["ODOI"],$crores["ODOI"],$numbersTG["ODOI"]) = displayRefList("OUV+DOUV",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20audience_s:2".$critInt.$specificRequestCode,$countries,$anneedeb,$anneefin,"ODOI",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-ODON-") !== false) {
	echo "<br><a name=\"ODON\"></a><h2>Ouvrages ou directions d’ouvrages de portée nationale".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Ouvrages ou directions d’ouvrages de portée nationale".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Ouvrages ou directions d’ouvrages de portée nationale".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["ODON"],$crores["ODON"],$numbersTG["ODON"]) = displayRefList("OUV+DOUV",$team,"%20AND%20NOT%20popularLevel_s:1%20AND%20(audience_s:3%20OR%20audience_s:1%20OR%20audience_s:0)".$critNat.$specificRequestCode,$countries,$anneedeb,$anneefin,"ODON",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-OCV-") !== false) {
	echo "<br><a name=\"OCV\"></a><h2>Ouvrages ou chapitres de vulgarisation".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Ouvrages ou chapitres de vulgarisation".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Ouvrages ou chapitres de vulgarisation".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["OCV"],$crores["OCV"],$numbersTG["OCV"]) = displayRefList("OUV+COUV",$team,"%20AND%20popularLevel_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"OCV",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_ouvr) && strpos($choix_ouvr, "-CNR-") !== false) {
	echo "<br><a name=\"CNR\"></a><h2>Coordination de numéro de revue".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Coordination de numéro de revue".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Coordination de numéro de revue".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CNR"],$crores["CNR"],$numbersTG["CNR"]) = displayRefList("CNR",$team,"%20AND%20journalTitle_s:*".$specificRequestCode,$countries,$anneedeb,$anneefin,"CNR",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_autr) && strpos($choix_autr, "-BRE-") !== false) {
	echo "<br><a name=\"BRE\"></a><h2>Brevets".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Brevets".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Brevets".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["BRE"],$crores["BRE"],$numbersTG["BRE"]) = displayRefList("PATENT",$team,"".$specificRequestCode,$countries,$anneedeb,$anneefin,"BRE",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_autr) && strpos($choix_autr, "-RAP-") !== false) {
	echo "<br><a name=\"RAP\"></a><h2>Rapports".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Rapports".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Rapports".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["RAP"],$crores["RAP"],$numbersTG["RAP"]) = displayRefList("REPORT",$team,"".$specificRequestCode,$countries,$anneedeb,$anneefin,"RAP",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_autr) && strpos($choix_autr, "-THE-") !== false) {
	echo "<br><a name=\"THE\"></a><h2>Thèses".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Thèses".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Thèses".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["THE"],$crores["THE"],$numbersTG["THE"]) = displayRefList("THESE",$team,"".$specificRequestCode,$countries,$anneedeb,$anneefin,"THE",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_autr) && strpos($choix_autr, "-HDR-") !== false) {
	echo "<br><a name=\"HDR\"></a><h2>HDR".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"HDR".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>HDR".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["HDR"],$crores["HDR"],$numbersTG["HDR"]) = displayRefList("HDR",$team,"".$specificRequestCode,$countries,$anneedeb,$anneefin,"HDR",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_autr) && strpos($choix_autr, "-VID-") !== false) {
	echo "<br><a name=\"VIDEO\"></a><h2>Vidéos".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Vidéos".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Vidéos".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["VID"],$crores["VID"],$numbersTG["VID"]) = displayRefList("VIDEO",$team,"".$specificRequestCode,$countries,$anneedeb,$anneefin,"VID",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_autr) && strpos($choix_autr, "-PWM-") !== false) {
	echo "<br><a name=\"PWM\"></a><h2>Preprints, working papers, manuscrits non publiés".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Preprints, working papers, manuscrits non publiés".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Preprints, working papers, manuscrits non publiés".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["PWM"],$crores["PWM"],$numbersTG["PWM"]) = displayRefList("UNDEF",$team,"".$specificRequestCode,$countries,$anneedeb,$anneefin,"PWM",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_autr) && strpos($choix_autr, "-CRO-") !== false) {
	echo "<br><a name=\"CRO\"></a><h2>Comptes rendus d'ouvrage ou notes de lecture".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Comptes rendus d'ouvrage ou notes de lecture".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Comptes rendus d'ouvrage ou notes de lecture".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["CRO"],$crores["CRO"],$numbersTG["CRO"]) = displayRefList("CRO",$team,"%20AND%20otherType_s:2".$specificRequestCode,$countries,$anneedeb,$anneefin,"CRO",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_autr) && strpos($choix_autr, "-BLO-") !== false) {
	echo "<br><a name=\"CRO\"></a><h2>Billets de blog".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Billets de blog".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Billets de blog".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["BLO"],$crores["BLO"],$numbersTG["BLO"]) = displayRefList("BLO",$team,"%20AND%20otherType_s:1".$specificRequestCode,$countries,$anneedeb,$anneefin,"BLO",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_autr) && strpos($choix_autr, "-NED-") !== false) {
	echo "<br><a name=\"CRO\"></a><h2>Notices d'encyclopédie ou dictionnaire".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Notices d'encyclopédie ou dictionnaire".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Notices d'encyclopédie ou dictionnaire".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["NED"],$crores["NED"],$numbersTG["NED"]) = displayRefList("NED",$team,"%20AND%20otherType_s:3".$specificRequestCode,$countries,$anneedeb,$anneefin,"NED",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_autr) && strpos($choix_autr, "-TRA-") !== false) {
	echo "<br><a name=\"TRA\"></a><h2>Traductions".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Traductions".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Traductions".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["TRA"],$crores["TRA"],$numbersTG["TRA"]) = displayRefList("TRA",$team,"%20AND%20otherType_s:4".$specificRequestCode,$countries,$anneedeb,$anneefin,"TRA",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_autr) && strpos($choix_autr, "-LOG-") !== false) {
	echo "<br><a name=\"LOG\"></a><h2>Logiciels".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Logiciels".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Logiciels".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["LOG"],$crores["LOG"],$numbersTG["LOG"]) = displayRefList("SOFTWARE",$team,$specificRequestCode,$countries,$anneedeb,$anneefin,"LOG",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
if (isset($choix_autr) && strpos($choix_autr, "-AP-") !== false) {
	echo "<br><a name=\"AP\"></a><h2>Autres publications".$cpmlng.$detail." <a href=\"#sommaire\"><i class=\"mdi mdi-arrow-up-bold\"></i></a></h2>";
	//$Fnm1 = "./HAL/extractionHAL_".$team.".csv";
	$inF1 = fopen($Fnm1,"a+");
	//fseek($inF1, 0);
	fwrite($inF1,"Autres publications".$cpmlng.$detail.chr(13).chr(10));
	$sect->writeText("<br><strong>Autres publications".$cpmlng.$detail."</strong><br>", $fonth2);
	list($numbers["AP"],$crores["AP"],$numbersTG["AP"]) = displayRefList("OTHER",$team,"".$specificRequestCode,$countries,$anneedeb,$anneefin,"AP",$institut,$typnum,$typaut,$typnom,$typcol,$typbib,$typlim,$limaff,$trpaff,$typtit,$team,$teamInit,$listaut,$idhal,$refint,$typann,$typrvg,$typchr,$typgra,$limgra,$typcrp,$rstaff,$typtri,$typfor,$typdoi,$typurl,$typpub,$surdoi,$sursou,$finass,$typidh,$racine,$typreva,$typif,$typinc,$typrevh,$dscp,$typrevc,$typcomm,$typisbn,$typrefi,$typsign,$typavsa,$typlng,$typcro,$typexc,$listenominit,$listenomcomp1,$listenomcomp2,$listenomcomp3,$arriv,$depar,$sect,$Fnm,$Fnm1,$Fnm2,$Fnm3,$delim,$prefeq,$rtfArray,$bibArray,$font,$fontlien,$fonth2,$fonth3,$root,$gr,$nbeqp,$nomeqp,$listedoi,$listetitre,$stpdf,$spa,$nmo,$gp1,$gp2,$gp3,$gp4,$gp5,$gp6,$gp7,$sep1,$sep2,$sep3,$sep4,$sep5,$sep6,$sep7,$choix_mp1,$choix_mp2,$choix_mp3,$choix_mp4,$choix_mp5,$choix_mp6,$choix_mp7,$choix_cg1,$choix_cg2,$choix_cg3,$choix_cg4,$choix_cg5,$choix_cg6,$choix_cg7);
}
?>