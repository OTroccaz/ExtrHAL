<?php
/*
index.php - Sandbox web front end

Version     : 1.2.1
Made by     : Jean-Damien POGOLOTTI
MaintainedBy: Momchil Bozhinov
Last Update : 09/05/19

This file can be distributed under the license you can find at :

	http://www.pchart.net/license

You can find the whole class documentation on the pChart web site.
*/

function listfonts($selected)
{
	$list = ["advent_light", "Bedizen", "Forgotte", "pf_arma_five", "GeosansLight", "Silkscreen"];
	foreach($list as $font){
		echo "<option value='".$font.".ttf'".(($font == $selected) ? " selected='selected'" : "").">".$font."</option>";
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Sandbox system</title>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
	<link rel='stylesheet' type='text/css' href='style.css'/>
	<script src='../resources/jquery-3.4.1.min.js' type="text/javascript"></script>
	<script type='text/javascript' src='includes/jscolor.js'></script>
	<script type='text/javascript' src='includes/functions.js'></script>
</head>
<body>
 <table style=''><tr><td>
  <table style='padding: 2px; background-color: #E0E0E0; border: 1px solid #D0D0D0;'><tr>
   <td class='topMenu'>
    <div class='topMenu' id='menu1' onmouseover='highlightDIV(1);' onmouseout='clearDIV(1);' onclick='toggleDIV(1);'>
     <table style='padding: 2px; border: 1px solid #D0D0D0;'><tr>
      <td class='topMenu'><img src='graphix/tab.png' /></td>
      <td class='topMenu'>&nbsp;General settings&nbsp;</td>
     </tr></table>
    </div>
   </td>
   <td class='topMenu' width='5'></td>
   <td class='topMenu'>
    <div class='topMenu' id='menu2' onmouseover='highlightDIV(2);' onmouseout='clearDIV(2);' onclick='toggleDIV(2);'>
     <table style='padding: 2px; border: 1px solid #D0D0D0;'><tr>
      <td class='topMenu'><img src='graphix/tab.png' /></td>
      <td class='topMenu'>&nbsp;Data&nbsp;</td>
     </tr></table>
    </div>
   </td>
   <td class='topMenu' width='5'></td>
   <td class='topMenu'>
    <div class='topMenu' id='menu3' onmouseover='highlightDIV(3);' onmouseout='clearDIV(3);' onclick='toggleDIV(3);'>
     <table style='padding: 2px; border: 1px solid #D0D0D0;'><tr>
      <td class='topMenu'><img src='graphix/tab.png' /></td>
      <td class='topMenu'>&nbsp;Scale&nbsp;</td>
     </tr></table>
    </div>
   </td>
   <td class='topMenu' width='5'></td>
   <td class='topMenu'>
    <div class='topMenu' id='menu4' onmouseover='highlightDIV(4);' onmouseout='clearDIV(4);' onclick='toggleDIV(4);'>
     <table style='padding: 2px; border: 1px solid #D0D0D0;'><tr>
      <td class='topMenu'><img src='graphix/tab.png' /></td>
      <td class='topMenu'>&nbsp;Chart&nbsp;</td>
     </tr></table>
    </div>
   </td>
   <td class='topMenu' width='5'></td>
   <td class='topMenu'>
    <div class='topMenu' id='menu5' onmouseover='highlightDIV(5);' onmouseout='clearDIV(5);' onclick='toggleDIV(5);'>
     <table style='padding: 2px; border: 1px solid #D0D0D0;'><tr>
      <td class='topMenu'><img src='graphix/tab.png' /></td>
      <td class='topMenu'>&nbsp;Legend, thresholds &amp; Misc&nbsp;</td>
     </tr></table>
    </div>
   </td>
  </tr></table>
 </td>
 <td width='5'></td>
 <td>
  <table style='padding: 2px; background-color: #D0D0D0; border: 1px solid #D0D0D0;'><tr>
   <td class='topMenu'>
    <div class='topMenu' id='menu6' onmouseover='highlightDIV(6);' onmouseout='clearDIV(6);' onclick='code();'>
     <table style='padding: 2px; border: 1px solid #D0D0D0;'><tr>
      <td class='topMenu'><img src='graphix/cog.png' /></td>
      <td class='topMenu'>&nbsp;Show code&nbsp;</td>
     </tr></table>
    </div>
   </td>
   <td class='topMenu' width='5'></td>
   <td class='topMenu'>
    <div class='topMenu' id='menu7' onmouseover='highlightDIV(7);' onmouseout='clearDIV(7);' onclick='render();'>
     <table style='padding: 2px; border: 1px solid #D0D0D0;'><tr>
      <td class='topMenu'><img src='graphix/accept.png' /></td>
      <td class='topMenu'>&nbsp;Render picture&nbsp;</td>
     </tr></table>
    </div>
   </td>
  </tr></table>
 </td></tr></table>

 <table><tr><td valign='top'>

 <div class="roundedCorner" id='tab1' style='margin-top: 30px; margin-left: 20px; width: 350px; height: 420px; background: #F0F0F0; padding: 10px; color: #667309; border: 1px solid #E0E0E0'>
  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/wrench.png' /></td>
   <td width='300'><b>General settings</b></td>
  </tr></table>
  <br/>
  <table><tr>
   <td>Width &nbsp;</td>
   <td><input type='text' id='g_width' value='700' style='width: 30px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' onkeyup='doLayout();' /></td>
   <td>&nbsp;&nbsp; Height &nbsp;</td>
   <td><input type='text' id='g_height' value='230' style='width: 30px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' onkeyup='doLayout();' /></td>
   <td>&nbsp;&nbsp;<input type='checkbox' id='g_transparent' /></td>
   <td>Transparent background</td>
  </tr></table>
  <table><tr>
   <td><input type='checkbox' id='g_aa' checked='checked' /></td>
   <td>Turn on anti-aliasing</td>
   <td>&nbsp;&nbsp;<input type='checkbox' id='g_shadow' checked='checked' /></td>
   <td>Enable shadow</td>
   <td>&nbsp;&nbsp; <input type='checkbox' id='g_border' checked='checked' /></td>
   <td>with a border</td>
  </tr></table>
  <table><tr>
   <td><input type='checkbox' id='g_autopos' checked='checked' onclick='toggleAuto();' /></td>
   <td>Automatic positioning of the elements</td>
  </tr></table>

  <br/>

  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/comment.png' /></td>
   <td width='240'><b>Chart title</b></td>
   <td width='20'><input type='checkbox' id='g_title_enabled' checked='checked' /></td>
   <td width='38'>Enabled</td>
  </tr></table>
  <br/>
  <table><tr>
   <td width='55'>Chart Title</td>
   <td><input type='text' id='g_title' value='My first pChart project' style='width: 260px;' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
  </tr></table>
  <table><tr>
   <td width='147'>Alignment method (<a class='smallLinkBlack' target='_new' href='http://wiki.pchart.net/doc.draw.text.html'>help</a>)</td>
   <td>
	<select id='g_title_align'>
		<option value='TEXT_ALIGN_TOPLEFT'>TEXT_ALIGN_TOPLEFT</option>
		<option value='TEXT_ALIGN_TOPMIDDLE'>TEXT_ALIGN_TOPMIDDLE</option>
		<option value='TEXT_ALIGN_TOPRIGHT'>TEXT_ALIGN_TOPRIGHT</option>
		<option value='TEXT_ALIGN_MIDDLELEFT'>TEXT_ALIGN_MIDDLELEFT</option>
		<option selected='selected' value='TEXT_ALIGN_MIDDLEMIDDLE'>TEXT_ALIGN_MIDDLEMIDDLE</option>
		<option value='TEXT_ALIGN_MIDDLERIGHT'>TEXT_ALIGN_MIDDLERIGHT</option>
		<option value='TEXT_ALIGN_BOTTOMLEFT'>TEXT_ALIGN_BOTTOMLEFT</option>
		<option value='TEXT_ALIGN_BOTTOMMIDDLE'>TEXT_ALIGN_BOTTOMMIDDLE</option>
		<option value='TEXT_ALIGN_BOTTOMRIGHT'>TEXT_ALIGN_BOTTOMRIGHT</option>
	</select>
</td>
  </tr></table>
  <table><tr>
   <td width='55'>X position &nbsp;</td>
   <td><input type='text' id='g_title_x' value='350' style='width: 30px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp;&nbsp; Y position &nbsp;</td>
   <td><input type='text' id='g_title_y' value='25' style='width: 30px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp;&nbsp; Color &nbsp;</td>
   <td><input type='text' class='jscolor' id='g_title_color' value='#FFFFFF' style='text-align: center; width: 60px;' onchange='applyColor("g_title_color","g_title_color_show");' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td><div id='g_title_color_show' style='margin-left: 4px; width: 10px; height: 10px; border: 1px solid #808080;'></div></td>
  </tr></table>
  <table><tr>
   <td width='55'>Font name &nbsp;</td>
   <td><select id='g_title_font'><?php listfonts("Forgotte"); ?></select></td>
   <td>&nbsp;&nbsp; Size &nbsp;</td>
   <td><input type='text' id='g_title_font_size' value='14' style='width: 20px; text-align: center;' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp;&nbsp; <input type='checkbox' id='g_title_box' /></td>
   <td>in a box</td>
  </tr></table>

  <br/>

  <table style='background-color: #E8E8E8; padding:1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/paintcan.png' /></td>
   <td width='240'><b>Solid background</b></td>
   <td width='20'><input type='checkbox' id='g_solid_enabled' checked='checked' /></td>
   <td width='38'>Enabled</td>
  </tr></table>
  <br/>
  <table><tr>
   <td width='55'>Color</td>
   <td><input type='text' class='jscolor' id='g_solid_color' value='#AAB757' style='text-align: center; width: 60px;' onchange='applyColor("g_solid_color","g_solid_color_show");' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td width='40'><div id='g_solid_color_show' style='margin-left: 4px; width: 10px; height: 10px; border: 1px solid #808080;'></div></td>
   <td width='20'><input type='checkbox' id='g_solid_dashed' checked='checked' /></td>
   <td width='38'>Dashed</td>
  </tr></table>

  <br/>

  <table style='background-color: #E8E8E8; padding:1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/paintcan.png' /></td>
   <td width='240'><b>Gradient background</b></td>
   <td width='20'><input type='checkbox' id='g_gradient_enabled' checked='checked' /></td>
   <td width='38'>Enabled</td>
  </tr></table>
  <br/>
  <table><tr>
   <td width='55'>Start color</td>
   <td><input type='text' class='jscolor' id='g_gradient_start' value='#DBE78B' style='text-align: center; width: 60px;' onchange='applyColor("g_gradient_start","g_gradient_start_show");' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td width='55'><div id='g_gradient_start_show' style='margin-left: 4px; width: 10px; height: 10px; border: 1px solid #808080;'></div></td>
   <td width='54'>End color &nbsp;</td>
   <td><input type='text' class='jscolor' id='g_gradient_end' value='#018A44' style='text-align: center; width: 60px;' onchange='applyColor("g_gradient_end","g_gradient_end_show");' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td><div id='g_gradient_end_show' style='margin-left: 4px; width: 10px; height: 10px; border: 1px solid #808080;'></div></td>
  </tr></table>
  <table><tr>
   <td width='55'>Direction</td>
   <td width='75'><select id='g_gradient_direction'><option value='vertical'>Vertical</option><option value='horizontal'>Horizontal</option></select></td>
   <td width='100'>&nbsp; Alpha transparency</td>
   <td><input type='text' id='g_gradient_alpha' value='50' style='width: 20px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>%</td>
  </tr></table>
 </div>

 <div class="roundedCorner" id='tab2' style='display: none; margin-top: 30px; margin-left: 20px; width: 350px; height: 455px; background: #F0F0F0; padding: 10px; color: #667309; border: 1px solid #E0E0E0'>
  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/database_table.png' /></td>
   <td width='300'><b>Dataset definition</b></td>
  </tr></table>
  <br/>
  <table>
   <tr>
    <td width='46'></td>
    <td width='65'><center>Serie 1</center></td>
    <td width='65'><center>Serie 2</center></td>
    <td width='65'><center>Serie 3</center></td>
    <td width='65'><center>Abscissa</center></td>
   </tr>
   <tr>
    <td>Enabled</td>
    <td><center><input type='checkbox' id='d_serie1_enabled' checked='checked' onclick='checkEnabledAxis();' /></center></td>
    <td><center><input type='checkbox' id='d_serie2_enabled' checked='checked' onclick='checkEnabledAxis();' /></center></td>
    <td><center><input type='checkbox' id='d_serie3_enabled' checked='checked' onclick='checkEnabledAxis();' /></center></td>
    <td><center><input type='checkbox' id='d_absissa_enabled' checked='checked' /></center></td>
   </tr>
  </table>
  <table>
   <tr>
    <td width='46'>Name</td>
    <td width='65'><center><input type='text' id='d_serie1_name' value='Serie 1' style='width: 50px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></center></td>
    <td width='65'><center><input type='text' id='d_serie2_name' value='Serie 2' style='width: 50px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></center></td>
    <td width='65'><center><input type='text' id='d_serie3_name' value='Serie 3' style='width: 50px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></center></td>
    <td width='65'><center>-</center></td>
   </tr>
   <tr>
    <td width='46'>Binding</td>
    <td width='65'><center>
	<select id='d_serie1_axis' style='width: 54px;' onchange='checkEnabledAxis();'>
		<option value='0' selected='selected'>Axis 0</option>
		<option value='1'>Axis 1</option>
		<option value='2'>Axis 2</option>
	</select>
	</center></td>
    <td width='65'><center>
	<select id='d_serie2_axis' style='width: 54px;' onchange='checkEnabledAxis();'>
		<option value='0' selected='selected'>Axis 0</option>
		<option value='1'>Axis 1</option>
		<option value='2'>Axis 2</option>	
	</select>
	</center></td>
    <td width='65'><center>
	<select id='d_serie3_axis' style='width: 54px;' onchange='checkEnabledAxis();'>
		<option value='0' selected='selected'>Axis 0</option>
		<option value='1'>Axis 1</option>
		<option value='2'>Axis 2</option>
	</select>
	</center></td>
    <td width='65'><center>-</center></td>
   </tr>
<?php
	for($i=0; $i<8;$i++){
		echo "<tr><td>";

		if ($i == 0){
			echo "Data";
		}

		echo "</td><td><center><input type='text' id='d_serie1_data".$i."' style='width: 50px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></center></td>
		<td><center><input type='text' id='d_serie2_data".$i."' style='width: 50px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></center></td>
		<td><center><input type='text' id='d_serie3_data".$i."' style='width: 50px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></center></td>
		<td><center><input type='text' id='d_absissa_data".$i."' style='width: 60px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></center></td>
		</tr>";
  }
?>
  </table>
  <table>
   <tr>
    <td width='50'></td>
    <td><input type='checkbox' id='d_normalize_enabled' /></td>
    <td>normalize the datasets.</td>
    <td width='10'></td>
    <td>[ <a class='smallLinkBlack' href='javascript:randomize();'>randomize</a> ]</td>
   </tr>
  </table>
  <br/>
  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/chart_bar_edit.png' /></td>
   <td width='300'><b>Axis position and units</b></td>
  </tr></table>
  <br/>
  <table>
   <tr>
    <td width='40'></td>
    <td width='90'><center><b>Axis 0</b></center></td>
    <td width='90'><center><b>Axis 1</b></center></td>
    <td width='90'><center><b>Axis 2</b></center></td>
   </tr>
   <tr>
    <td>Name</td>
    <td><center><input type='text' id='d_axis0_name' value='1st axis' style='width: 76px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></center></td>
    <td><center><input type='text' id='d_axis1_name' value='2nd axis' style='width: 76px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></center></td>
    <td><center><input type='text' id='d_axis2_name' value='3rd axis' style='width: 76px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></center></td>
   </tr>
   <tr>
    <td>Unit</td>
    <td><center><input type='text' id='d_axis0_unit' style='width: 76px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></center></td>
    <td><center><input type='text' id='d_axis1_unit' style='width: 76px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></center></td>
    <td><center><input type='text' id='d_axis2_unit' style='width: 76px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></center></td>
   </tr>
   <tr>
    <td>Position</td>
    <td><center>
		<select id='d_axis0_position' style='width: 80px;' onchange='checkEnabledAxis();'>
			<option value='left' selected='selected'>Left</option>
			<option value='right'>Right</option>
		</select>
	</center></td>
	<td><center>
		<select id='d_axis1_position' style='width: 80px;' onchange='checkEnabledAxis();'>
			<option value='left' selected='selected'>Left</option>
			<option value='right'>Right</option>
		</select>
	</center></td>
    <td><center>
		<select id='d_axis2_position' style='width: 80px;' onchange='checkEnabledAxis();'>
			<option value='left' selected='selected'>Left</option>
			<option value='right'>Right</option>
		</select>
	</center></td>
   </tr>
   <tr>
    <td>Format</td>
    <td><center>
		<select id='d_axis0_format' style='width: 80px;' onchange='checkEnabledAxis();'>
			<option selected='selected' value='AXIS_FORMAT_DEFAULT'>DEFAULT</option>
			<option value='AXIS_FORMAT_METRIC'>METRIC</option>
			<option value='AXIS_FORMAT_CURRENCY'>CURRENCY</option>
		</select>
	</center></td>
    <td><center>
		<select id='d_axis1_format' style='width: 80px;' onchange='checkEnabledAxis();'>
			<option selected='selected' value='AXIS_FORMAT_DEFAULT'>DEFAULT</option>
			<option value='AXIS_FORMAT_METRIC'>METRIC</option>
			<option value='AXIS_FORMAT_CURRENCY'>CURRENCY</option>
		</select>
	</center></td>
    <td><center>
		<select id='d_axis2_format' style='width: 80px;' onchange='checkEnabledAxis();'>
			<option selected='selected' value='AXIS_FORMAT_DEFAULT'>DEFAULT</option>
			<option value='AXIS_FORMAT_METRIC'>METRIC</option>
			<option value='AXIS_FORMAT_CURRENCY'>CURRENCY</option>
		</select>
	</center></td>
   </tr>
  </table>
 </div>

 <div class="roundedCorner" id='tab3' style='display: none; margin-top: 30px; margin-left: 20px; width: 350px; height: 435px; background: #F0F0F0; padding: 10px; color: #667309; border: 1px solid #E0E0E0'>
  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/layout_edit.png' /></td>
   <td width='300'><b>Charting area definition</b></td>
  </tr></table>
  <br/>
  <table><tr>
   <td width='50'>X &nbsp;</td>
   <td><input type='text' id='s_x' value='70' style='width: 30px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp;&nbsp; Y &nbsp;</td>
   <td><input type='text' id='s_y' value='50' style='width: 30px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp;&nbsp; Width &nbsp;</td>
   <td><input type='text' id='s_width' value='590' style='width: 30px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp;&nbsp; Height &nbsp;</td>
   <td><input type='text' id='s_height' value='140' style='width: 30px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
  </tr></table>
  <table><tr>
   <td width='50'>Direction</td>
   <td width='160'><select id='s_direction' onchange='checkEnabledAxis();'><option value='SCALE_POS_LEFTRIGHT'>SCALE_POS_LEFTRIGHT</option><option value='SCALE_POS_TOPBOTTOM'>SCALE_POS_TOPBOTTOM</option></select></td>
   <td>&nbsp;<input type='checkbox' id='s_arrows_enabled' /></td>
   <td>&nbsp;with arrows</td>
  </tr></table>
  <table><tr>
   <td width='50'>Mode</td>
   <td width='160'><select id='s_mode'><option value='SCALE_MODE_FLOATING'>SCALE_MODE_FLOATING</option><option value='SCALE_MODE_START0'>SCALE_MODE_START0</option><option value='SCALE_MODE_ADDALL'>SCALE_MODE_ADDALL</option><option value='SCALE_MODE_ADDALL_START0'>SCALE_MODE_ADDALL_START0</option></select></td>
   <td>&nbsp;<input type='checkbox' id='s_cycle_enabled' checked='checked' /></td>
   <td>&nbsp;Background</td>
  </tr></table>
  <table><tr>
   <td width='50'>X Margin</td>
   <td width='35'><input type='text' id='s_x_margin' value='0' style='width: 30px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td width='50'>&nbsp; Y Margin</td>
   <td width='68'><input type='text' id='s_y_margin' value='0' style='width: 30px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp;&nbsp;<input type='checkbox' id='s_automargin_enabled' checked='checked' onclick='toggleAutoMargins();' /></td>
   <td>&nbsp;automatic</td>
  </tr></table>
  <table><tr>
   <td width='50'>Font</td>
   <td><select id='s_font'><?php listfonts("pf_arma_five"); ?></select></td>
   <td>&nbsp; Size &nbsp;</td>
   <td><input type='text' id='s_font_size' value='6' style='width: 20px; text-align: center;' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp; Color &nbsp;</td>
   <td><input type='text' id='s_font_color' class='jscolor' value='#000000' style='text-align: center; width: 50px;' onchange='applyColor("s_font_color","s_font_color_show");' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td><div id='s_font_color_show' style='margin-left: 4px; width: 10px; height: 10px; border: 1px solid #808080;'></div></td>
  </tr></table>
  <br/>
  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/page_edit.png' /></td>
   <td width='300'><b>X Axis configuration</b></td>
  </tr></table>
  <br/>
  <table><tr>
   <td width='50'>Mode</td>
   <td><select id='s_x_labeling'><option value='LABELING_ALL'>LABELING_ALL</option><option value='LABELING_DIFFERENT'>LABELING_DIFFERENT</option></select></td>
   <td>&nbsp;&nbsp; Skip each</td>
   <td>&nbsp;<input type='text' id='s_x_skip' value='0' style='width: 20px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp;labels</td>
  </tr></table>
  <table><tr>
   <td width='50'>Rotation</td>
   <td><input type='text' id='s_x_label_rotation' value='0' style='width: 30px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
  </tr></table>
  <br/>
  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/page_edit.png' /></td>
   <td width='300'><b>Grid</b></td>
  </tr></table>
  <br/>
  <table><tr>
   <td width='70'>Grid color</td>
   <td><input type='text' id='s_grid_color' class='jscolor' value='#FFFFFF' style='text-align: center; width: 60px; text-align: center' onchange='applyColor("s_grid_color","s_grid_color_show");' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td><div id='s_grid_color_show' style='margin-left: 4px; width: 10px; height: 10px; border: 1px solid #808080;'></div></td>
   <td>&nbsp; Alpha</td>
   <td>&nbsp; <input type='text' id='s_grid_alpha' value='50' style='width: 30px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
  </tr></table>
  <table><tr>
   <td width='70'>Display</td>
   <td>&nbsp;<input type='checkbox' id='s_grid_x_enabled' checked='checked' /></td>
   <td>&nbsp;X Lines</td>
   <td>&nbsp;&nbsp;&nbsp;<input type='checkbox' id='s_grid_y_enabled' checked='checked' /></td>
   <td>&nbsp;Y Lines</td>
  </tr></table>

  <br/>
  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/page_edit.png' /></td>
   <td width='300'><b>Ticks</b></td>
  </tr></table>
  <br/>
  <table><tr>
   <td width='70'>Ticks color</td>
   <td><input type='text' id='s_ticks_color' class='jscolor' value='#000000' style='text-align: center; width: 60px; text-align: center' onchange='applyColor("s_ticks_color","s_ticks_color_show");' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td><div id='s_ticks_color_show' style='margin-left: 4px; width: 10px; height: 10px; border: 1px solid #808080;'></div></td>
   <td>&nbsp; Alpha</td>
   <td>&nbsp; <input type='text' id='s_ticks_alpha' value='50' style='width: 30px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
  </tr></table>
  <table><tr>
   <td width='70'>Sub ticks color</td>
   <td><input type='text' id='s_subticks_color' class='jscolor' value='#FF0000' style='text-align: center; width: 60px; text-align: center' onchange='applyColor("s_subticks_color","s_subticks_color_show");' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td><div id='s_subticks_color_show' style='margin-left: 4px; width: 10px; height: 10px; border: 1px solid #808080;'></div></td>
   <td>&nbsp; Alpha</td>
   <td>&nbsp; <input type='text' id='s_subticks_alpha' value='50' style='width: 30px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp;<input type='checkbox' id='s_subticks_enabled' checked='checked' onclick='toggleSubTicks();' /></td>
   <td>&nbsp;enabled</td>
  </tr></table>
 </div>

 <div class="roundedCorner" id='tab4' style='display: none; margin-top: 30px; margin-left: 20px; width: 350px; height: 420px; background: #F0F0F0; padding: 10px; color: #667309; border: 1px solid #E0E0E0'>
  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/wrench.png' /></td>
   <td width='300'><b>Chart</b></td>
  </tr></table>
  <br/>
  <table><tr>
   <td width='60'>Chart family</td>
   <td>
	<select id='c_family' onchange='checkChartSettings();'>
		<option value='plot'>Plot chart</option>
		<option value='line'>Line chart</option>
		<option value='spline' selected='selected'>Spline chart</option>
		<option value='step'>Step chart</option>
		<option value='bar'>Bar chart</option>
		<option value='area'>Area chart</option>
		<option value='fspline'>Filled spline chart &nbsp;&nbsp;&nbsp;&nbsp;</option>
		<option value='fstep'>Filled step chart</option>
		<option value='sbar'>Stacked bar chart</option>
		<option value='sarea'>Stacked area chart</option>
	</select>
</td>
   <td>&nbsp;Break color</td>
   <td>&nbsp;<input type='text' id='c_break_color' class='jscolor' value='#EA371A' style='text-align: center; width: 60px; text-align: center' onchange='applyColor("c_break_color","c_break_color_show");' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td><div id='c_break_color_show' style='margin-left: 4px; width: 10px; height: 10px; border: 1px solid #808080;'></div></td>
  </tr></table>
  <table><tr>
   <td width='60'>Settings : </td>
   <td><input type='checkbox' id='c_display_values' /></td>
   <td>&nbsp;Display values</td>
   <td>&nbsp;<input type='checkbox' id='c_break' /></td>
   <td>&nbsp;Don't break on VOID</td>
  </tr></table>
  <div style='background: #D2F5C1; padding: 4px; color: #667309; margin-top: 10px;'>
   <table><tr>
    <td width='20'><img src='graphix/comment.png' /></td>
    <td>Selecting a chart layout will enable/disable chart specifics options.</td>
   </tr></table>
  </div>
  <br/>
  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/chart_line.png' /></td>
   <td width='300'><b>Plot specifics</b></td>
  </tr></table>
  <br/>
  <table><tr>
   <td width='60'>Plot size</td>
   <td><input type='text' id='c_plot_size' value='3' style='width: 20px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td width='60'>&nbsp;&nbsp; Border size</td>
   <td>&nbsp;<input type='text' id='c_border_size' value='2' style='width: 20px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp;<input type='checkbox' id='c_border_enabled' checked='checked' onclick='checkPlotBorder();' /></td>
   <td>&nbsp;border enabled</td>
  </tr></table>
  <br/>
  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/chart_bar.png' /></td>
   <td width='300'><b>Bar charts specifics</b></td>
  </tr></table>
  <br/>
  <table><tr>
   <td>&nbsp;<input type='radio' id='c_bar_classic' name='c_bar_design' value='0' checked='checked' /></td>
   <td>&nbsp;Classic</td>
   <td>&nbsp;<input type='radio' id='c_bar_rounded' name='c_bar_design' value='1' /></td>
   <td>&nbsp;Rounded</td>
   <td>&nbsp;<input type='radio' id='c_bar_gradient' name='c_bar_design' value='2' /></td>
   <td>&nbsp;Gradient filling</td>
   <td>&nbsp;<input type='checkbox' id='c_around_zero1' checked='checked' /></td>
   <td>&nbsp;around zero</td>
  </tr></table>
  <br/>
  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/chart_curve.png' /></td>
   <td width='300'><b>Area charts specifics</b></td>
  </tr></table>
  <br/>
  <table><tr>
   <td width='100'>Forced transparency</td>
   <td><input type='text' id='c_transparency' value='50' style='width: 20px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp;<input type='checkbox' id='c_forced_transparency' checked='checked' onclick='checkAreaChart();' /></td>
   <td>&nbsp;enabled</td>
   <td>&nbsp;<input type='checkbox' id='c_around_zero2' checked='checked' /></td>
   <td>&nbsp;wrapped around zero</td>
  </tr></table>
 </div>

 <div class="roundedCorner" id='tab5' style='display: none; margin-top: 30px; margin-left: 20px; width: 350px; height: 420px; background: #F0F0F0; padding: 10px; color: #667309; border: 1px solid #E0E0E0'>
  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/application_form.png' /></td>
   <td width='240'><b>Legend</b></td>
   <td width='20'><input type='checkbox' id='l_enabled' checked='checked' /></td>
   <td width='38'>Enabled</td>
  </tr></table>
  <br/>
  <table><tr>
   <td width='50'>Font</td>
   <td><select id='l_font'><?php listfonts("pf_arma_five"); ?></select></td>
   <td>&nbsp; Size &nbsp;</td>
   <td><input type='text' id='l_font_size' value='6' style='width: 20px; text-align: center;' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp; Color &nbsp;</td>
   <td><input type='text' id='l_font_color' class='jscolor' value='#000000' style='text-align: center; width: 50px;' onchange='applyColor("l_font_color","l_font_color_show");' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td><div id='l_font_color_show' style='margin-left: 4px; width: 10px; height: 10px; border: 1px solid #808080;'></div></td>
  </tr></table>
  <table><tr>
   <td width='50'>Margin</td>
   <td><input type='text' id='l_margin' value='6' style='width: 20px; text-align: center;' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp; Alpha &nbsp;</td>
   <td><input type='text' id='l_alpha' value='30' style='width: 20px; text-align: center;' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp; Format</td>
   <td>&nbsp; 
	<select id='l_format'>
		<option value='LEGEND_NOBORDER' selected='selected'>LEGEND_NOBORDER</option>
		<option value='LEGEND_BOX'>LEGEND_BOX</option>
		<option value='LEGEND_ROUND'>LEGEND_ROUND</option>
	</select>
</td>
  </tr></table>
  <table><tr>
   <td width='50'>Orientation</td>
   <td>&nbsp; <select id='l_orientation' style='width: 160px;'><option value='LEGEND_VERTICAL'>LEGEND_VERTICAL</option><option value='LEGEND_HORIZONTAL' selected='selected'>LEGEND_HORIZONTAL</option></select></td>
   <td>&nbsp; Box size &nbsp;</td>
   <td><input type='text' id='l_box_size' value='5' style='width: 20px; text-align: center;' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
  </tr></table>
  <table><tr>
   <td width='50'>Position</td>
   <td>&nbsp; <select id='l_position' style='width: 160px;' onclick='checkLegend();'><option value='CORNER_TOP_RIGHT'>CORNER_TOP_RIGHT</option><option value='CORNER_BOTTOM_RIGHT'>CORNER_BOTTOM_RIGHT</option><option value='Manual'>Manual</option></select></td>
   <td>&nbsp; X &nbsp;</td>
   <td><input type='text' id='l_x' value='10' style='width: 20px; text-align: center;' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp; Y &nbsp;</td>
   <td><input type='text' id='l_y' value='10' style='width: 20px; text-align: center;' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
  </tr></table>
  <table><tr>
   <td width='50'>Layout</td>
   <td>&nbsp; <select id='l_family' style='width: 160px;'><option value='LEGEND_SERIE_BOX'>LEGEND_SERIE_BOX</option><option value='LEGEND_FAMILY_CIRCLE'>LEGEND_FAMILY_CIRCLE</option><option value='LEGEND_FAMILY_LINE'>LEGEND_FAMILY_LINE</option></select></td>
  </tr></table>
  <br/>
  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/vector.png' /></td>
   <td width='240'><b>Threshold</b></td>
   <td width='20'><input type='checkbox' id='t_enabled' /></td>
   <td width='38'>Enabled</td>
  </tr></table>
  <br/>
  <table><tr>
   <td width='50'>Value</td>
   <td width='60'><input type='text' id='t_value' value='0' style='width: 30px; text-align: center' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp;<input type='radio' id='t_axis0' name='t_axis' value='0' checked='checked' /></td>
   <td>&nbsp;Axis 0</td>
   <td>&nbsp;<input type='radio' id='t_axis1' name='t_axis' value='1' /></td>
   <td>&nbsp;Axis 1</td>
   <td>&nbsp;<input type='radio' id='t_axis2' name='t_axis' value='2' /></td>
   <td>&nbsp;Axis 2</td>
  </tr></table>
  <table><tr>
   <td width='50'>Color</td>
   <td><input type='text' id='t_color' class='jscolor' value='#000000' style='text-align: center; width: 50px;' onchange='applyColor("t_color","t_color_show");' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td><div id='t_color_show' style='margin-left: 4px; width: 10px; height: 10px; border: 1px solid #808080;'></div></td>
   <td>&nbsp; Alpha &nbsp;</td>
   <td><input type='text' id='t_alpha' value='50' style='width: 20px; text-align: center;' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp;&nbsp; <input type='checkbox' id='t_ticks' checked='checked' /></td>
   <td>&nbsp; ticks &nbsp;</td>
  </tr></table>
  <table><tr>
   <td width='50'>Caption</td>
   <td><input type='text' id='t_caption' value='Threshold' style='width: 50px;' onmouseover='setFocus(this,true);' onmouseout='setFocus(this,false);' /></td>
   <td>&nbsp; <input type='checkbox' id='t_box' checked='checked' /></td>
   <td>&nbsp;in a box&nbsp;</td>
   <td>&nbsp; <input type='checkbox' id='t_caption_enabled' checked='checked' /></td>
   <td>&nbsp;caption enabled &nbsp;</td>
  </tr></table>
  <br/>
  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/shape_flip_vertical.png' /></td>
   <td width='240'><b>Slope chart</b></td>
   <td width='20'><input type='checkbox' id='sl_enabled' onclick='doLayout();' /></td>
   <td width='38'>Enabled</td>
  </tr></table>
  <table><tr>
   <td>&nbsp; <input type='checkbox' id='sl_shaded' checked='checked' /></td>
   <td>&nbsp;Shaded&nbsp;</td>
   <td>&nbsp; <input type='checkbox' id='sl_caption_enabled' checked='checked' /></td>
   <td>&nbsp;With caption &nbsp;</td>
   <td>&nbsp; <input type='checkbox' id='sl_caption_line' checked='checked' /></td>
   <td>&nbsp;Use line as caption &nbsp;</td>
  </tr></table>
  <br/>

  <table style='background-color: #E8E8E8; padding: 1px; border-top: 1px solid #F5F5F5; border-bottom: 1px solid #E0E0E0'><tr>
   <td width='20'><img src='graphix/color_swatch.png' /></td>
   <td width='300'><b>Palette</b></td>
  </tr></table>
  <br/>
  <table><tr>
   <td width='50'>Template</td>
   <td>&nbsp; 
	<select id='p_template'>
		<option value='default'>Default</option>
		<option value='autumn'>Autumn</option>
		<option value='blind'>Blind</option>
		<option value='evening'>Evening</option>
		<option value='kitchen'>Kitchen</option>
		<option value='light'>Light</option>
		<option value='navy'>Navy</option>
		<option value='shade'>Shade</option>
		<option value='spring'>Spring</option>
		<option value='shade'>Shade</option>
		<option value='summer'>Summer</option>
	</select>
</td>
  </tr></table>
 </div>
 </td>
 <td width='20'></td>
 <td width='730'>
  <center><div id='result_area' style='font-size: 10px;'></div></center>
 </td>
 </tr></table>
<script type="text/javascript">
 CurrentDiv = 1;
 URL        = "";
 Automatic  = true;

 /* Initial layout */
 toggleDIV(1);
 randomize();
 setDefaultAbsissa();
 checkEnabledAxis();
 toggleSubTicks();
 toggleAutoMargins();
 checkChartSettings();
 checkLegend();
 setColors();
</script>
</body>
</html>