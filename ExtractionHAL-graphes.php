<?php
//Création de graphes
if (strpos(phpversion(), "7") !== false) {//PHP7 > pChart2
	//Librairies pChart
	include_once("./lib/pChart2/pChart/pDraw.php");
	include_once("./lib/pChart2/pChart/pException.php");
	include_once("./lib/pChart2/pChart/pColor.php");
	include_once("./lib/pChart2/pChart/pColorGradient.php");
	include_once("./lib/pChart2/pChart/pData.php");
	include_once("./lib/pChart2/pChart/pCharts.php");
	include_once("./lib/pChart2/pChart/pPie.php");
}else{//PHP 5 > pChart
	//Librairies pChart
	include("./lib/pChart/class/pData.class.php");
	include("./lib/pChart/class/pDraw.class.php");
	include("./lib/pChart/class/pImage.class.php");
	include("./lib/pChart/class/pPie.class.php");
}
	
// Données type de publication par année
if (strpos(phpversion(), "7") !== false) {//PHP7 > pChart2
	$myPicture = new pDraw(700,280);
	$rTypeArr = array();
	foreach($numbers as $rType => $yearNumbers){
		array_push($rTypeArr, $rType);
		foreach($availableYears as $year => $nb){
			$rYearArr = array();
			if(array_key_exists($year,$yearNumbers)){
				array_push($rYearArr, $yearNumbers[$year]);
			} else {
				array_push($rYearArr, VOID);
			}
			$rYearArr = array_map(function($value) {
				return intval($value);
			}, $rYearArr);
			$myPicture->myData->addPoints($rYearArr,$year);
	 }
	}

	$myPicture->myData->addPoints($rTypeArr,"Labels");
	$myPicture->myData->setAxisName(0,"Nombre");
	$myPicture->myData->setSerieDescription("Labels","Type de publication");
	$myPicture->myData->setAbscissa("Labels");
	$myPicture->myData->setAbscissaName("Type de publication");

	/* Create the pChart object */
	$myPicture->drawGradientArea(0,0,700,280,DIRECTION_VERTICAL, ["StartColor"=>new pColor(240,240,240,100),"EndColor"=>new pColor(180,180,180,100)]);
	$myPicture->drawGradientArea(0,0,700,280,DIRECTION_HORIZONTAL, ["StartColor"=>new pColor(240,240,240,20),"EndColor"=>new pColor(180,180,180,20)]);
	$myPicture->drawRectangle(0,0,699,279,array("R"=>0,"G"=>0,"B"=>0));
	$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));

	/* Turn of Antialiasing */
	$myPicture->Antialias = FALSE;

	/* Draw the scale  */
	$myPicture->setGraphArea(50,50,680,220);
	$myPicture->drawText(350,40,"Type de publication par année".$detail,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
	$myPicture->drawScale(["CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"GridColor"=>new pColor(0,0,0,10),"Mode"=>SCALE_MODE_START0]);

	/* Turn on shadow computing */
	$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));

	/* Draw the chart */
	$settings = array("Gradient"=>TRUE,"DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"DisplayR"=>255,"DisplayG"=>255,"DisplayB"=>255,"DisplayShadow"=>TRUE,"Surrounding"=>-30,"InnerSurrounding"=>30);
	(new pCharts($myPicture))->drawBarChart($settings);

	/* Write the chart legend */
	$myPicture->drawLegend(30,260,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

	/* Do the mirror effect */
	$myPicture->drawAreaMirror(0,220,700,15);

	/* Draw the horizon line */
	//$myPicture->drawLine(1,220,698,220,array("R"=>80,"G"=>80,"B"=>80));
}else{//PHP 5 > pChart
	$MyData = new pData();
	foreach($numbers as $rType => $yearNumbers){
		$MyData->addPoints($rType,"Labels");
		foreach($availableYears as $year => $nb){
			if(array_key_exists($year,$yearNumbers)){
				 $MyData->addPoints($yearNumbers[$year],$year);
			} else {
				 $MyData->addPoints(VOID,$year);
			}
	 }
	}
	$MyData->setAxisName(0,"Nombre");
	$MyData->setSerieDescription("Labels","Type de publication");
	$MyData->setAbscissa("Labels");
	$MyData->setAbscissaName("Type de publication");

	/* Create the pChart object */
	$myPicture = new pImage(700,280,$MyData);
	$myPicture->drawGradientArea(0,0,700,280,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100));
	$myPicture->drawGradientArea(0,0,700,280,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
	$myPicture->drawRectangle(0,0,699,279,array("R"=>0,"G"=>0,"B"=>0));
	$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));
	
	/* Turn of Antialiasing */
	$myPicture->Antialias = FALSE;
	
	/* Draw the scale  */
	$myPicture->setGraphArea(50,50,680,220);
	$myPicture->drawText(350,40,"Type de publication par année".$detail,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
	$myPicture->drawScale(array("CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10,"Mode"=>SCALE_MODE_START0));
	
	/* Turn on shadow computing */
	$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
	
	/* Draw the chart */
	$settings = array("Gradient"=>TRUE,"DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"DisplayR"=>255,"DisplayG"=>255,"DisplayB"=>255,"DisplayShadow"=>TRUE,"Surrounding"=>-30,"InnerSurrounding"=>30);
	$myPicture->drawBarChart($settings);
	
	/* Write the chart legend */
	$myPicture->drawLegend(30,260,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
	
	/* Do the mirror effect */
	$myPicture->drawAreaMirror(0,220,700,15);
	
	/* Draw the horizon line */
	//$myPicture->drawLine(1,220,698,220,array("R"=>80,"G"=>80,"B"=>80));
}
/* Render the picture (choose the best way) */
$myPicture->render("img/mypic1_".str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team)."_".$typsign.".png");
echo '<center><img alt="Type de publication par année" src="img/mypic1_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team)."_".$typsign.'.png"></center><br>';

// Données année par type de publication
if (strpos(phpversion(), "7") !== false) {//PHP7 > pChart2
	$myPicture = new pDraw(700,280);
	$rYearArr = array();
	foreach($availableYears as $year => $nb){
		array_push($rYearArr, $year);
		foreach($numbers as $rType => $yearNumbers){
			$rTypeArr = array();
			if(array_key_exists($year,$yearNumbers)){
				 array_push($rTypeArr, $yearNumbers[$year]);
			} else {
				 array_push($rTypeArr, VOID);
			}
			$rTypeArr = array_map(function($value) {
				return intval($value);
			}, $rTypeArr);
			$myPicture->myData->addPoints($rTypeArr,$rType);
		}
	}
	
	$myPicture->myData->addPoints($rYearArr,"Labels");
	$myPicture->myData->setAxisName(0,"Nombre");
	$myPicture->myData->setSerieDescription("Labels","Année");
	$myPicture->myData->setAbscissa("Labels");
	$myPicture->myData->setAbscissaName("Année");

	/* Create the pChart object */
	$myPicture->drawGradientArea(0,0,700,280,DIRECTION_VERTICAL, ["StartColor"=>new pColor(240,240,240,100),"EndColor"=>new pColor(180,180,180,100)]);
	$myPicture->drawGradientArea(0,0,700,280,DIRECTION_HORIZONTAL, ["StartColor"=>new pColor(240,240,240,20),"EndColor"=>new pColor(180,180,180,20)]);
	$myPicture->drawRectangle(0,0,699,279,array("R"=>0,"G"=>0,"B"=>0));
	$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));

	/* Turn of Antialiasing */
	$myPicture->Antialias = FALSE;

	/* Draw the scale  */
	$myPicture->setGraphArea(50,50,680,220);
	$myPicture->drawText(350,40,"Année par type de publication".$detail,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
	$myPicture->drawScale(array("CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10,"Mode"=>SCALE_MODE_START0));

	/* Turn on shadow computing */
	$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));

	/* Draw the chart */
	$settings = array("Gradient"=>TRUE,"DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"DisplayR"=>255,"DisplayG"=>255,"DisplayB"=>255,"DisplayShadow"=>TRUE,"Surrounding"=>-30,"InnerSurrounding"=>30);
	(new pCharts($myPicture))->drawBarChart($settings);

	/* Write the chart legend */
	$myPicture->drawLegend(30,260,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

	/* Do the mirror effect */
	$myPicture->drawAreaMirror(0,220,700,15);

	/* Draw the horizon line */
	//$myPicture->drawLine(1,220,698,220,array("R"=>80,"G"=>80,"B"=>80));
}else{//PHP 5 > pChart
	$MyData = new pData();
	foreach($availableYears as $year => $nb){
		$MyData->addPoints($year,"Labels");
		foreach($numbers as $rType => $yearNumbers){
			if(array_key_exists($year,$yearNumbers)){
				 $MyData->addPoints($yearNumbers[$year],$rType);
			} else {
				 $MyData->addPoints(VOID,$rType);
			}
		}
	}
	$MyData->setAxisName(0,"Nombre");
	$MyData->setSerieDescription("Labels","Année");
	$MyData->setAbscissa("Labels");
	$MyData->setAbscissaName("Année");
	
	/* Create the pChart object */
	$myPicture = new pImage(700,280,$MyData);
	$myPicture->drawGradientArea(0,0,700,280,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100));
	$myPicture->drawGradientArea(0,0,700,280,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
	$myPicture->drawRectangle(0,0,699,279,array("R"=>0,"G"=>0,"B"=>0));
	$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));
	
	/* Turn of Antialiasing */
	$myPicture->Antialias = FALSE;
	
	/* Draw the scale  */
	$myPicture->setGraphArea(50,50,680,220);
	$myPicture->drawText(350,40,"Année par type de publication".$detail,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
	$myPicture->drawScale(array("CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10,"Mode"=>SCALE_MODE_START0));
	
	/* Turn on shadow computing */
	$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
	
	/* Draw the chart */
	$settings = array("Gradient"=>TRUE,"DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"DisplayR"=>255,"DisplayG"=>255,"DisplayB"=>255,"DisplayShadow"=>TRUE,"Surrounding"=>-30,"InnerSurrounding"=>30);
	$myPicture->drawBarChart($settings);
	
	/* Write the chart legend */
	$myPicture->drawLegend(30,260,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
	
	/* Do the mirror effect */
	$myPicture->drawAreaMirror(0,220,700,15);
	
	/* Draw the horizon line */
	//$myPicture->drawLine(1,220,698,220,array("R"=>80,"G"=>80,"B"=>80));
}
/* Render the picture (choose the best way) */
$myPicture->render("img/mypic2_".str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team)."_".$typsign.".png");
echo '<center><img alt="Année par type de publication"src="img/mypic2_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team)."_".$typsign.'.png"></center><br>';

//Si choix sur tous les articles, camembert avec détails
if (isset($choix_publis) && strpos($choix_publis, "-TA-") !== false) {
	$i = 3;
	
	if (isset($idhal) && $idhal != "") {
		$atester = "authIdHal_s:".$team;
		$atesteropt = "";
	}else{
		if (isset($refint) && $refint != "") {
			if ($teamInit != "") {
				$atester = "collCode_s:".$teamInit;
				$atesteropt = "%20AND%20localReference_s:".$refint;
			}else{
				$atester = "";
				$atesteropt = "localReference_s:".$refint;
			}
		}else{
			 $atester = "collCode_s:".$teamInit;
			 $atesteropt = "";
		}
	}
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
			if (strpos(phpversion(), "7") !== false) {//PHP7 > pChart2
				$myPicture = new pDraw(350,230);
				
				$arpTab= [$ACLRI,$ACLRN,$ASCLRI,$ASCLRN];
				$arpTab = array_map(function($value) {
							return intval($value);
					}, $arpTab);

				$myPicture->myData->addPoints($arpTab,"Detail");
				$myPicture->myData->setSerieDescription("Detail","Application A");

				/* Define the absissa serie */
				$myPicture->myData->addPoints(["ACLRI","ACLRN","ASCLRI","ASCLRN"],"Labels");
				$myPicture->myData->setAbscissa("Labels");

				/* Draw a solid background */
				$Settings = ["Color"=>new pColor(173,152,217), "Dash"=>TRUE, "DashColor"=>new pColor(193,172,237)];
				$myPicture->drawFilledRectangle(0,0,350,230,$Settings);

				/* Draw a gradient overlay */
				$myPicture->drawGradientArea(0,0,350,280,DIRECTION_VERTICAL, ["StartColor"=>new pColor(240,240,240,100),"EndColor"=>new pColor(180,180,180,100)]);
				$myPicture->drawGradientArea(0,0,350,280,DIRECTION_HORIZONTAL, ["StartColor"=>new pColor(240,240,240,20),"EndColor"=>new pColor(180,180,180,20)]);


				/* Add a border to the picture */
				$myPicture->drawRectangle(0,0,349,229,array("R"=>0,"G"=>0,"B"=>0));

				/* Write the picture title */
				$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));
				$myPicture->drawText(175,40,"Détail TA".$year.$detail,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));

				/* Set the default font properties */
				$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10,"R"=>80,"G"=>80,"B"=>80));

				/* Create the pPie object */
				$PieChart = new pPie($myPicture);
				
				/* Define the slice colors */
				$myPicture->myData->savePalette([
					0 => new pColor(143,197,0),
					1 => new pColor(97,77,63),
					2 => new pColor(97,113,63)
				]);

				/* Enable shadow computing */
				$myPicture->setShadow(TRUE,array("X"=>3,"Y"=>3,"Color"=>new pColor(0,0,0,10)));

				/* Draw a splitted pie chart */
				$PieChart->draw3DPie(175,125,["WriteValues"=>TRUE,"ValuePosition"=>PIE_VALUE_OUTSIDE,"ValueColor"=>new pColor(0,0,0,100),"DataGapAngle"=>10,"DataGapRadius"=>6,"Border"=>TRUE]);

				/* Write the legend */
				$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));
				$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"Color"=>new pColor(0,0,0,20)));

				/* Write the legend box */
				$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10,"R"=>0,"G"=>0,"B"=>0));
				$PieChart->drawPieLegend(30,200,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
			}else{//PHP 5 > pChart
				$MyData = new pData();
				
				$arpTab= array($ACLRI,$ACLRN,$ASCLRI,$ASCLRN);
				$arpTab = array_map(function($value) {
							return intval($value);
					}, $arpTab);
				
				$MyData->addPoints($arpTab,"Detail");
				$MyData->setSerieDescription("ScoreA","Application A");
				
				/* Define the absissa serie */
				$MyData->addPoints(array("ACLRI","ACLRN","ASCLRI","ASCLRN"),"Labels");
				$MyData->setAbscissa("Labels");
				
				/* Create the pChart object */
				$myPicture = new pImage(350,230,$MyData,TRUE);
				
				/* Draw a solid background */
				$Settings = array("R"=>173, "G"=>152, "B"=>217, "Dash"=>1, "DashR"=>193, "DashG"=>172, "DashB"=>237);
				$myPicture->drawFilledRectangle(0,0,350,230,$Settings);
				
				/* Draw a gradient overlay */
				$myPicture->drawGradientArea(0,0,350,280,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100));
				$myPicture->drawGradientArea(0,0,350,280,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
				
				/* Add a border to the picture */
				$myPicture->drawRectangle(0,0,349,229,array("R"=>0,"G"=>0,"B"=>0));
				
				/* Write the picture title */
				$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));
				$myPicture->drawText(175,40,"Détail TA".$year.$detail,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
				
				/* Set the default font properties */
				$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10,"R"=>80,"G"=>80,"B"=>80));
				
				/* Create the pPie object */
				$PieChart = new pPie($myPicture,$MyData);
				
				/* Define the slice color */
				$PieChart->setSliceColor(0,array("R"=>143,"G"=>197,"B"=>0));
				$PieChart->setSliceColor(1,array("R"=>97,"G"=>77,"B"=>63));
				$PieChart->setSliceColor(2,array("R"=>97,"G"=>113,"B"=>63));
				
				/* Enable shadow computing */
				$myPicture->setShadow(TRUE,array("X"=>3,"Y"=>3,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
				
				/* Draw a splitted pie chart */
				$PieChart->draw3DPie(175,125,array("WriteValues"=>TRUE,"ValuePosition"=>PIE_VALUE_OUTSIDE,"ValueR"=>0,"ValueG"=>0,"ValueB"=>0,"DataGapAngle"=>10,"DataGapRadius"=>6,"Border"=>TRUE));
				
				/* Write the legend */
				$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));
				$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
				
				/* Write the legend box */
				$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10,"R"=>0,"G"=>0,"B"=>0));
				$PieChart->drawPieLegend(30,200,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
			}
			$myPicture->render('img/mypic'.$i.'_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).'_'.$typsign.'.png');
			echo '<center><img alt="Détails" src="img/mypic'.$i.'_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).'_'.$typsign.'.png"></center><br>';
			$i++;
		}
	}
	
	//Graphes détail avec moyenne et somme des différentes années
	if(count($availableYears) > 1) {
		$ACLRImoy = $ACLRItot/count($availableYears);
		$ACLRNmoy = $ACLRNtot/count($availableYears);
		$ASCLRImoy = $ASCLRItot/count($availableYears);
		$ASCLRNmoy = $ASCLRNtot/count($availableYears);
		
		//Moyenne
		if (strpos(phpversion(), "7") !== false) {//PHP7 > pChart2
			$myPicture = new pDraw(350,230);
			
			$arpTab= [$ACLRImoy,$ACLRNmoy,$ASCLRImoy,$ASCLRNmoy];
			$arpTab = array_map(function($value) {
						return intval($value);
				}, $arpTab);

			$myPicture->myData->addPoints($arpTab,"Detail");
			$myPicture->myData->setSerieDescription("Detail","Application A");

			/* Define the absissa serie */
			$myPicture->myData->addPoints(["ACLRI","ACLRN","ASCLRI","ASCLRN"],"Labels");
			$myPicture->myData->setAbscissa("Labels");

			/* Draw a solid background */
			$Settings = ["Color"=>new pColor(173,152,217), "Dash"=>TRUE, "DashColor"=>new pColor(193,172,237)];
			$myPicture->drawFilledRectangle(0,0,350,230,$Settings);

			/* Draw a gradient overlay */
			$myPicture->drawGradientArea(0,0,350,280,DIRECTION_VERTICAL, ["StartColor"=>new pColor(240,240,240,100),"EndColor"=>new pColor(180,180,180,100)]);
			$myPicture->drawGradientArea(0,0,350,280,DIRECTION_HORIZONTAL, ["StartColor"=>new pColor(240,240,240,20),"EndColor"=>new pColor(180,180,180,20)]);


			/* Add a border to the picture */
			$myPicture->drawRectangle(0,0,349,229,array("R"=>0,"G"=>0,"B"=>0));

			/* Write the picture title */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));
			$anneeFin = count($yearMS) - 1;
			$myPicture->drawText(175,40,"Moyenne détail TA".$yearMS[0].'-'.$yearMS[$anneeFin].$detail,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));

			/* Set the default font properties */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10,"R"=>80,"G"=>80,"B"=>80));

			/* Create the pPie object */
			$PieChart = new pPie($myPicture);
			
			/* Define the slice colors */
			$myPicture->myData->savePalette([
				0 => new pColor(143,197,0),
				1 => new pColor(97,77,63),
				2 => new pColor(97,113,63)
			]);

			/* Enable shadow computing */
			$myPicture->setShadow(TRUE,array("X"=>3,"Y"=>3,"Color"=>new pColor(0,0,0,10)));

			/* Draw a splitted pie chart */
			$PieChart->draw3DPie(175,125,["WriteValues"=>TRUE,"ValuePosition"=>PIE_VALUE_OUTSIDE,"ValueColor"=>new pColor(0,0,0,100),"DataGapAngle"=>10,"DataGapRadius"=>6,"Border"=>TRUE]);

			/* Write the legend */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));
			$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"Color"=>new pColor(0,0,0,20)));

			/* Write the legend box */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10,"R"=>0,"G"=>0,"B"=>0));
			$PieChart->drawPieLegend(30,200,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
		}else{//PHP 5 > pChart
			$MyData = new pData();
			
			$arpTab= array($ACLRImoy,$ACLRNmoy,$ASCLRImoy,$ASCLRNmoy);
			$arpTab = array_map(function($value) {
						return intval($value);
				}, $arpTab);
			
			$MyData->addPoints($arpTab,"Detail");
			$MyData->setSerieDescription("ScoreA","Application A");
			
			/* Define the absissa serie */
			$MyData->addPoints(array("ACLRI","ACLRN","ASCLRI","ASCLRN"),"Labels");
			$MyData->setAbscissa("Labels");
			
			/* Create the pChart object */
			$myPicture = new pImage(350,230,$MyData,TRUE);
			
			/* Draw a solid background */
			$Settings = array("R"=>173, "G"=>152, "B"=>217, "Dash"=>1, "DashR"=>193, "DashG"=>172, "DashB"=>237);
			$myPicture->drawFilledRectangle(0,0,350,230,$Settings);
			
			/* Draw a gradient overlay */
			$myPicture->drawGradientArea(0,0,350,280,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100));
			$myPicture->drawGradientArea(0,0,350,280,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
			
			/* Add a border to the picture */
			$myPicture->drawRectangle(0,0,349,229,array("R"=>0,"G"=>0,"B"=>0));
			
			/* Write the picture title */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));
			$anneeFin = count($yearMS) - 1;
			$myPicture->drawText(175,40,"Moyenne détail TA".$yearMS[0].'-'.$yearMS[$anneeFin].$detail,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
			
			/* Set the default font properties */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10,"R"=>80,"G"=>80,"B"=>80));
			
			/* Create the pPie object */
			$PieChart = new pPie($myPicture,$MyData);
			
			/* Define the slice color */
			$PieChart->setSliceColor(0,array("R"=>143,"G"=>197,"B"=>0));
			$PieChart->setSliceColor(1,array("R"=>97,"G"=>77,"B"=>63));
			$PieChart->setSliceColor(2,array("R"=>97,"G"=>113,"B"=>63));
			
			/* Enable shadow computing */
			$myPicture->setShadow(TRUE,array("X"=>3,"Y"=>3,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
			
			/* Draw a splitted pie chart */
			$PieChart->draw3DPie(175,125,array("WriteValues"=>TRUE,"ValuePosition"=>PIE_VALUE_OUTSIDE,"ValueR"=>0,"ValueG"=>0,"ValueB"=>0,"DataGapAngle"=>10,"DataGapRadius"=>6,"Border"=>TRUE));
			
			/* Write the legend */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));
			$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
			
			/* Write the legend box */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10,"R"=>0,"G"=>0,"B"=>0));
			$PieChart->drawPieLegend(30,200,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
		}
		$myPicture->render('img/mypic'.$i.'_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).'_'.$typsign.'.png');
		echo '<center><img alt="Détails" src="img/mypic'.$i.'_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).'_'.$typsign.'.png"></center><br>';
		$i++;
		
		//Somme
		if (strpos(phpversion(), "7") !== false) {//PHP7 > pChart2
			$myPicture = new pDraw(350,230);
			
			$arpTab= [$ACLRItot,$ACLRNtot,$ASCLRItot,$ASCLRNtot];
			$arpTab = array_map(function($value) {
						return intval($value);
				}, $arpTab);

			$myPicture->myData->addPoints($arpTab,"Detail");
			$myPicture->myData->setSerieDescription("Detail","Application A");

			/* Define the absissa serie */
			$myPicture->myData->addPoints(["ACLRI","ACLRN","ASCLRI","ASCLRN"],"Labels");
			$myPicture->myData->setAbscissa("Labels");

			/* Draw a solid background */
			$Settings = ["Color"=>new pColor(173,152,217), "Dash"=>TRUE, "DashColor"=>new pColor(193,172,237)];
			$myPicture->drawFilledRectangle(0,0,350,230,$Settings);

			/* Draw a gradient overlay */
			$myPicture->drawGradientArea(0,0,350,280,DIRECTION_VERTICAL, ["StartColor"=>new pColor(240,240,240,100),"EndColor"=>new pColor(180,180,180,100)]);
			$myPicture->drawGradientArea(0,0,350,280,DIRECTION_HORIZONTAL, ["StartColor"=>new pColor(240,240,240,20),"EndColor"=>new pColor(180,180,180,20)]);


			/* Add a border to the picture */
			$myPicture->drawRectangle(0,0,349,229,array("R"=>0,"G"=>0,"B"=>0));

			/* Write the picture title */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));
			$anneeFin = count($yearMS) - 1;
			$myPicture->drawText(175,40,"Somme détail TA".$yearMS[0].'-'.$yearMS[$anneeFin].$detail,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));

			/* Set the default font properties */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10,"R"=>80,"G"=>80,"B"=>80));

			/* Create the pPie object */
			$PieChart = new pPie($myPicture);
			
			/* Define the slice colors */
			$myPicture->myData->savePalette([
				0 => new pColor(143,197,0),
				1 => new pColor(97,77,63),
				2 => new pColor(97,113,63)
			]);

			/* Enable shadow computing */
			$myPicture->setShadow(TRUE,array("X"=>3,"Y"=>3,"Color"=>new pColor(0,0,0,10)));

			/* Draw a splitted pie chart */
			$PieChart->draw3DPie(175,125,["WriteValues"=>TRUE,"ValuePosition"=>PIE_VALUE_OUTSIDE,"ValueColor"=>new pColor(0,0,0,100),"DataGapAngle"=>10,"DataGapRadius"=>6,"Border"=>TRUE]);

			/* Write the legend */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));
			$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"Color"=>new pColor(0,0,0,20)));

			/* Write the legend box */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10,"R"=>0,"G"=>0,"B"=>0));
			$PieChart->drawPieLegend(30,200,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
		}else{//PHP 5 > pChart
			$MyData = new pData();
			
			$arpTab= array($ACLRItot,$ACLRNtot,$ASCLRItot,$ASCLRNtot);
			$arpTab = array_map(function($value) {
						return intval($value);
				}, $arpTab);
			
			$MyData->addPoints($arpTab,"Detail");
			$MyData->setSerieDescription("ScoreA","Application A");
			
			/* Define the absissa serie */
			$MyData->addPoints(array("ACLRI","ACLRN","ASCLRI","ASCLRN"),"Labels");
			$MyData->setAbscissa("Labels");
			
			/* Create the pChart object */
			$myPicture = new pImage(350,230,$MyData,TRUE);
			
			/* Draw a solid background */
			$Settings = array("R"=>173, "G"=>152, "B"=>217, "Dash"=>1, "DashR"=>193, "DashG"=>172, "DashB"=>237);
			$myPicture->drawFilledRectangle(0,0,350,230,$Settings);
			
			/* Draw a gradient overlay */
			$myPicture->drawGradientArea(0,0,350,280,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100));
			$myPicture->drawGradientArea(0,0,350,280,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
			
			/* Add a border to the picture */
			$myPicture->drawRectangle(0,0,349,229,array("R"=>0,"G"=>0,"B"=>0));
			
			/* Write the picture title */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));
			$anneeFin = count($yearMS) - 1;
			$myPicture->drawText(175,40,"Somme détail TA".$yearMS[0].'-'.$yearMS[$anneeFin].$detail,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
			
			/* Set the default font properties */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10,"R"=>80,"G"=>80,"B"=>80));
			
			/* Create the pPie object */
			$PieChart = new pPie($myPicture,$MyData);
			
			/* Define the slice color */
			$PieChart->setSliceColor(0,array("R"=>143,"G"=>197,"B"=>0));
			$PieChart->setSliceColor(1,array("R"=>97,"G"=>77,"B"=>63));
			$PieChart->setSliceColor(2,array("R"=>97,"G"=>113,"B"=>63));
			
			/* Enable shadow computing */
			$myPicture->setShadow(TRUE,array("X"=>3,"Y"=>3,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
			
			/* Draw a splitted pie chart */
			$PieChart->draw3DPie(175,125,array("WriteValues"=>TRUE,"ValuePosition"=>PIE_VALUE_OUTSIDE,"ValueR"=>0,"ValueG"=>0,"ValueB"=>0,"DataGapAngle"=>10,"DataGapRadius"=>6,"Border"=>TRUE));
			
			/* Write the legend */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));
			$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
			
			/* Write the legend box */
			$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10,"R"=>0,"G"=>0,"B"=>0));
			$PieChart->drawPieLegend(30,200,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
		}
		$myPicture->render('img/mypic'.$i.'_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).'_'.$typsign.'.png');
		echo '<center><img alt="Détails" src="img/mypic'.$i.'_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).'_'.$typsign.'.png"></center><br>';
		$i++;
	}
}

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
		case "OCDO" :
			echo '&nbsp;&nbsp;&nbsp;OCDO = Ouvrages ou chapitres ou directions d’ouvrages'.$cpmlng.$detail.'<br>';
			break;
		case "OCDOI" :
			echo '&nbsp;&nbsp;&nbsp;OCDOI = Ouvrages ou chapitres ou directions d’ouvrages de portée internationale'.$cpmlng.$detail.'<br>';
			break;
		case "OCDON" :
			echo '&nbsp;&nbsp;&nbsp;OCDON = Ouvrages ou chapitres ou directions d’ouvrages de portée nationale'.$cpmlng.$detail.'<br>';
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
			echo '&nbsp;&nbsp;&nbsp;COS = Chapitres d’ouvrages scientifiques'.$cpmlng.$detail.'<br>';
			break;
		case "COSI" :
			echo '&nbsp;&nbsp;&nbsp;COSI = Chapitres d’ouvrages scientifiques de portée internationale'.$cpmlng.$detail.'<br>';
			break;
		case "COSN" :
			echo '&nbsp;&nbsp;&nbsp;COSN = Chapitres d’ouvrages scientifiques de portée nationale'.$cpmlng.$detail.'<br>';
			break;
		case "DOS" :
			echo '&nbsp;&nbsp;&nbsp;DOS = Directions d’ouvrages scientifiques'.$cpmlng.$detail.'<br>';
			break;
		case "DOSI" :
			echo '&nbsp;&nbsp;&nbsp;DOSI = Directions d’ouvrages scientifiques de portée internationale'.$cpmlng.$detail.'<br>';
			break;
		case "DOSN" :
			echo '&nbsp;&nbsp;&nbsp;DOSN = Directions d’ouvrages scientifiques de portée nationale'.$cpmlng.$detail.'<br>';
			break;
		case "OCO" :
			echo '&nbsp;&nbsp;&nbsp;OCO = Ouvrages ou chapitres d’ouvrages'.$cpmlng.$detail.'<br>';
			break;
		case "OCOI" :
			echo '&nbsp;&nbsp;&nbsp;OCOI = Ouvrages ou chapitres d’ouvrages de portée internationale'.$cpmlng.$detail.'<br>';
			break;
		case "OCON" :
			echo '&nbsp;&nbsp;&nbsp;OCON = Ouvrages ou chapitres d’ouvrages de portée nationale'.$cpmlng.$detail.'<br>';
			break;
		case "ODO" :
			echo '&nbsp;&nbsp;&nbsp;ODO = Ouvrages ou directions d’ouvrages'.$cpmlng.$detail.'<br>';
			break;
		case "ODOI" :
			echo '&nbsp;&nbsp;&nbsp;ODOI = Ouvrages ou directions d’ouvrages de portée internationale'.$cpmlng.$detail.'<br>';
			break;
		case "ODON" :
			echo '&nbsp;&nbsp;&nbsp;ODON = Ouvrages ou directions d’ouvrages de portée nationale'.$cpmlng.$detail.'<br>';
			break;
		case "OCV" :
			echo '&nbsp;&nbsp;&nbsp;OCV = Ouvrages ou chapitres de vulgarisation'.$cpmlng.$detail.'<br>';
			break;
		case "CNR" :
			echo '&nbsp;&nbsp;&nbsp;CNR = Coordination de numéro de revue'.$cpmlng.$detail.'<br>';
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

//si GR, graphes dédiés
if (strpos(phpversion(), "7") !== false) {//PHP7 > pChart2
	$iGR = 0;
	$nomeqpArr = array();
	$croresArr = array();
	$myPicture = new pDraw(900,280);
	foreach($numbers as $rType => $yearNumbers){
		if (isset($team) && isset($gr) && (strpos($gr, $team) !== false)) {//GR
			$graphe = "non";
			for($j=1;$j<count($crores[$rType]);$j++) {
				if($crores[$rType][$j] != 0){
					$graphe = "oui";
				}
			}
			
			if ($graphe == "oui") {
				echo '<br><br>';
				//Nombre de publications croisées par équipe sur la période
				$i = 0;
				for($i=0;$i<count($crores[$rType]);$i++) {
					$j = $i+1;
					array_push($nomeqpArr, $nomeqp[$j]);
					//$myPicture->myData->addPoints($nomeqpArr,"Labels");
					if($crores[$rType][$j] != 0){
						array_push($croresArr, (int)$crores[$rType][$j]);
					} else {
						array_push($croresArr, VOID);
					}
					//$myPicture->myData->addPoints($croresArr,"Equipe");
				}
				$croresArr = array_map(function($value) {
						return intval($value);
				}, $croresArr);
				$myPicture->myData->addPoints($nomeqpArr,"Labels");
				$myPicture->myData->addPoints($croresArr,"Equipe");
				//$myPicture->myData->addPoints(array($gr1,$gr2,$gr3,$gr4,$gr5,$gr6,$gr7,$gr8,$gr9),"Equipe");
				//$myPicture->myData->addPoints(array("GR1","GR2","GR3","GR4","GR5","GR6","GR7","GR8","GR9"),"Labels");
				$myPicture->myData->setAxisName(0,"Nombre");
				$myPicture->myData->setSerieDescription("Labels","Nombre de publications croisées");
				$myPicture->myData->setAbscissa("Labels");
				$myPicture->myData->setAbscissaName("Equipe");

				/* Create the pChart object */
				$myPicture->drawGradientArea(0,0,900,280,DIRECTION_VERTICAL,["StartColor"=>new pColor(240,240,240,100),"EndColor"=>new pColor(180,180,180,100)]);
				$myPicture->drawGradientArea(0,0,900,280,DIRECTION_HORIZONTAL,["StartColor"=>new pColor(240,240,240,20),"EndColor"=>new pColor(180,180,180,20)]);
				$myPicture->drawRectangle(0,0,899,279,array("R"=>0,"G"=>0,"B"=>0));
				$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));

				/* Turn of Antialiasing */
				$myPicture->Antialias = FALSE;

				/* Draw the scale  */
				$myPicture->setGraphArea(50,50,880,220);
				$myPicture->drawText(450,40,"Nombre global de publications croisées de type ".$rType." par équipe".$detail,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
				$myPicture->drawScale(["CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"GridColor"=>new pColor(0,0,0,10),"Mode"=>SCALE_MODE_START0]);

				/* Turn on shadow computing */
				$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));

				/* Draw the chart */
				$settings = array("Gradient"=>TRUE,"DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"DisplayR"=>255,"DisplayG"=>255,"DisplayB"=>255,"DisplayShadow"=>TRUE,"Surrounding"=>-30,"InnerSurrounding"=>30);
				(new pCharts($myPicture))->drawBarChart($settings);

				/* Write the chart legend */
				//$myPicture->drawLegend(30,260,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

				/* Do the mirror effect */
				$myPicture->drawAreaMirror(0,220,900,15);

				/* Draw the horizon line */
				//$myPicture->drawLine(1,220,898,220,array("R"=>80,"G"=>80,"B"=>80));

				/* Render the picture (choose the best way) */
				$myPicture->render('img/mypic_crogr_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).'_'.$rType.'_'.$typsign.'.png');
				echo '<center><img alt="Publications croisées par équipe sur la période" src="img/mypic_crogr_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).'_'.$rType.'_'.$typsign.'.png"></center><br>';
			}
		}
		$iGR++;
	}
}else{//PHP 5 > pChart
	$iGR = 0;
	foreach($numbers as $rType => $yearNumbers){
		if (isset($team) && isset($gr) && (strpos($gr, $team) !== false)) {//GR
			$graphe = "non";
			for($j=1;$j<count($crores[$rType]);$j++) {
				if($crores[$rType][$j] != 0){
					$graphe = "oui";
				}
			}
			
			if ($graphe == "oui") {
				echo '<br><br>';
				//Nombre de publications croisées par équipe sur la période
				$MyData = new pData();
				$i = 0;
				for($i=0;$i<count($crores[$rType]);$i++) {
					$j = $i+1;
					$MyData->addPoints($nomeqp[$j],"Labels");
					if($crores[$rType][$j] != 0){
						$MyData->addPoints($crores[$rType][$j],"Equipe");
					} else {
						$MyData->addPoints(VOID,"Equipe");
					}
				}
				$croresArr = array_map(function($value) {
						return intval($value);
				}, $croresArr);
				//$MyData->addPoints(array($gr1,$gr2,$gr3,$gr4,$gr5,$gr6,$gr7,$gr8,$gr9),"Equipe");
				//$MyData->addPoints(array("GR1","GR2","GR3","GR4","GR5","GR6","GR7","GR8","GR9"),"Labels");
				$MyData->setAxisName(0,"Nombre");
				$MyData->setSerieDescription("Labels","Nombre de publications croisées");
				$MyData->setAbscissa("Labels");
				$MyData->setAbscissaName("Equipe");
				
				/* Create the pChart object */
				$myPicture = new pImage(900,280,$MyData);
				$myPicture->drawGradientArea(0,0,900,280,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100));
				$myPicture->drawGradientArea(0,0,900,280,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
				$myPicture->drawRectangle(0,0,899,279,array("R"=>0,"G"=>0,"B"=>0));
				$myPicture->setFontProperties(array("FontName"=>"./lib/pChart/fonts/corbel.ttf","FontSize"=>10));
				
				/* Turn of Antialiasing */
				$myPicture->Antialias = FALSE;
				/* Draw the scale  */
				$myPicture->setGraphArea(50,50,880,220);
				$myPicture->drawText(450,40,"Nombre global de publications croisées de type ".$rType." par équipe".$detail,array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
				$myPicture->drawScale(array("CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10,"Mode"=>SCALE_MODE_START0));
				
				/* Turn on shadow computing */
				$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
				
				/* Draw the chart */
				$settings = array("Gradient"=>TRUE,"DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"DisplayR"=>255,"DisplayG"=>255,"DisplayB"=>255,"DisplayShadow"=>TRUE,"Surrounding"=>-30,"InnerSurrounding"=>30);
				$myPicture->drawBarChart($settings);
				
				/* Write the chart legend */
				//$myPicture->drawLegend(30,260,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
				
				/* Do the mirror effect */
				$myPicture->drawAreaMirror(0,220,900,15);
				
				/* Draw the horizon line */
				//$myPicture->drawLine(1,220,898,220,array("R"=>80,"G"=>80,"B"=>80));
				
				/* Render the picture (choose the best way) */
				$myPicture->render('img/mypic_crogr_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).'_'.$rType.'_'.$typsign.'.png');
				echo '<center><img alt="Publications croisées par équipe sur la période" src="img/mypic_crogr_'.str_replace(array("(", ")", "%22", "%20OR%20"), array("", "", "", "_"), $team).'_'.$rType.'_'.$typsign.'.png"></center><br>';
			}
		}
		$iGR++;
	}
}
if (isset($team) && isset($gr) && (strpos($gr, $team) !== false)) {//GR
	echo 'Ce(s) graphe(s) est(sont) généré(s) lors d\'une numérotation/codification par équipe :<br>';
	echo '. Dans le cas d\'une extraction pour une unité, il représente l\'ensemble des publications croisées identifiées pour chaque équipe.<br>';
	echo '. Dans le cas d\'une extraction pour une équipe, il représente le nombre de publications croisées de cette équipe et celui des autres équipes concernées en regard.';
	echo 'Les sommes respectives ne sont pas forcément égales car une même publication croisée peut concerner plus de deux équipes : elle comptera alors pour 1 pour l\'équipe concernée par l\'extraction,';
	echo 'mais également pour 1 pour chacune des autres équipes associées.<br><br>';
	echo '<center><table cellpadding="5" width="80%"><tr><td width="45%" valign="top" style="text-align: justify;"><em>Pour illuster ce dernier cas, l\'exemple ci-contre représente l\'extraction des publications de l\'équipe GR2 dans une unité comportant quatre équipes. GR2 compte ainsi un total de 6 publications croisées: précisément, 3 avec GR1 seule, 1 avec GR3 seule, 1 avec GR1 et GR3, et 1 avec GR1 et GR4, d\'où, globalement, 5 avec GR1, 2 avec GR3 et 1 avec GR4.</em></td><td>&nbsp;&nbsp;&nbsp;<img alt="Exemple" src="HAL_exemple.jpg"></td></tr></table></center><br><br>';
}
?>