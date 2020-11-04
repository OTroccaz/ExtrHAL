<script src="./ExtrHAL.js"></script>
<script>
  function affich_form_suite() {
    nbeqpval = document.extrhal.nbeqp.value;
    var eqpaff = '';
    for (i=1; i<=nbeqpval; i++) {
			eqpaff += '<div class="col-12">';
			eqpaff += '	<div class="col-sm-8 d-inline-block">';
			eqpaff += '		<label for="eqp'+i+'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;. Nom HAL équipe '+i+' :</label>';
			eqpaff += '		<input type="text" class="form-control" id="eqp'+i+'" name="eqp'+i+'"><br>';
			eqpaff += '	</div>';
			eqpaff += '</div>';
    }
    eqpaff += '<div class="form-group row mb-2">';
		eqpaff += '	<div class="col-sm-8">';
    eqpaff += '  <label for="typcro">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;. Limiter l\'affichage seulement aux &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;publications croisées : </label>';
		eqpaff += '	</div>';
		eqpaff += '	<div class="col-sm-2">';
		eqpaff += '		<input type="radio" id="typcro1" name="typcro" value="non" <?php echo $cron;?> class="custom-control-input">';
		eqpaff += '		<label class="custom-control-label" for="typcro1">non</label>';
		eqpaff += '	</div>';
		eqpaff += '	<div class="col-sm-2">';
		eqpaff += '		<input type="radio" id="typcro2" name="typcro" value="oui" <?php echo $croo;?> class="custom-control-input">';
		eqpaff += '		<label class="custom-control-label" for="typcro2">oui</label>';
		eqpaff += '	</div>';
		eqpaff += '</div>';
    document.getElementById("eqp").innerHTML = eqpaff;
    //document.getElementById("panel2").style.maxHeight = document.getElementById("panel2").scrollHeight + "px";
  }

  $("#nbeqpid").keyup(function(event) {affich_form_suite();});

  function majapercu(){
    var selsep = [];
    selsep.push('- -');
    var selgrp = [];
    selgrp.push('- -');
    var idmaxi = 8;
    var idtest = 1;
    var contApercu = "";
    if (document.getElementById("nmo").options[2].selected) {contApercu += "x. ";}
    if (document.getElementById("nmo").options[3].selected) {contApercu += "(x) ";}
    if (document.getElementById("nmo").options[4].selected) {contApercu += "[x] ";}
    while (idtest < idmaxi) {
      var selcnt = document.getElementById("gp"+idtest);
      for (var i = 0; i < selcnt.length; i++) {
        if (selcnt.options[i].selected) selgrp.push(selcnt.options[i].value);
      }
      var selcnt = document.getElementById("sep"+idtest);
      for (var i = 0; i < selcnt.length; i++) {
        if (selcnt.options[i].selected) selsep.push(selcnt.options[i].value);
      }
      idtest++;
    }
    //console.log(selsep);
    var idmaxi = 8;
    var idtest = 1;
    while (idtest < idmaxi) {
      switch(selgrp[idtest]) {
        case "auteurs":
          select = document.getElementById("stpdf");
          choix = select.selectedIndex;
          valeur = document.getElementById("stpdf").options[choix].value;
          if (valeur == "mla") {
            var txtAut = "<?php echo $txtAutMla?>";
            var txtAut2 = "<?php echo $txtAutMla?>";
          }else{
            if (valeur == "chi") {
              var txtAut = "<?php echo $txtAutChi?>";
              var txtAut2 = "<?php echo $txtAutChi?>";
            }else{
              var txtAut = "<?php echo $txtAut?>";
              var txtAut2 = "<?php echo $txtAut?>";
            }
          }
          if (document.getElementById("spa").options[1].selected) {txtAut2 = txtAut.replace(/.; /g, "., ");}
          if (document.getElementById("spa").options[3].selected) {txtAut2 = txtAut.replace(/.; /g, ". ");}
          if (document.getElementById("spa").options[4].selected) {txtAut2 = txtAut.replace(/.; /g, ". -  ");}
          contApercu += "<span id=\"listAut\">"+txtAut2+"</span>";
          break;
        case "titre":
          contApercu += "<span id=\"listTit\"><?php echo($txtTit);?></span>";
          break;
        case "année":
          contApercu += "<span id=\"listAnn\"><?php echo($txtAnn);?></span>";
          break;
        case "revue":
          contApercu += "<span id=\"listRev\"><?php echo($txtRev);?></span>";
          break;
        case "volume":
          contApercu += "<span id=\"listVol\"><?php echo($txtVol);?></span>";
          break;
        case "numéro":
          contApercu += "<span id=\"listNum\"><?php echo($txtNum);?></span>";
          break;
        case "pages":
          contApercu += "<span id=\"listPag\"><?php echo($txtPag);?></span>";
          break;
      }
      if (selsep[idtest] == "- -") {
        contApercu += "";
      }else{
        contApercu += selsep[idtest];
      }
      //alert(contApercu);
      idtest++;
    }
    //var contApercu = "<span id=\"listAut\"><?php echo($txtAut);?></span>" + selsep[1];
    //contApercu += "<span id=\"listTit\"><?php echo($txtTit);?></span>";
    //contApercu += "<span id=\"listAnn\"><?php echo($txtAnn);?></span>";
    //contApercu += "<span id=\"listRev\"><?php echo($txtRev);?></span>";
    //contApercu += "<span id=\"listVol\"><?php echo($txtVol);?></span>";
    //contApercu += "<span id=\"listNum\"><?php echo($txtNum);?></span>";
    //contApercu += "<span id=\"listPag\"><?php echo($txtPag);?></span>";
    document.getElementById("apercu").innerHTML = contApercu;

    var listgp = "~|~";
    var idmaxi = 8;
    var idtest = 1;
    var selmpgpAut = "";
    var selmpgpTit = "";
    var selmpgpAnn = "";
    var selmpgpRev = "";
    var selmpgpVol = "";
    var selmpgpNum = "";
    var selmpgpPag = "";
    while (idtest < idmaxi) {
      selgp = document.getElementById("gp"+idtest);//Quel attribut de groupe ?
      var choixgp = selgp.selectedIndex;
      var valgp = document.getElementById("gp"+idtest).options[choixgp].value;
      listgp += valgp + "~|~";
      if (listgp.indexOf("auteurs") != -1 && selmpgpAut == "") {
        var selmpgpAut = '~|~';
        selmp = document.getElementById("mp"+idtest);//Quelles valeurs de mise en page ?
        for (var i = 0; i < selmp.length; i++) {
          if (selmp.options[i].selected) selmpgpAut += selmp.options[i].value + '~|~';
        }
        valcg = document.getElementById("cg"+idtest).value;//Quelle couleur de texte ?
        selmpgpAut += valcg + '~|~';
        document.getElementById("listAut").innerHTML = txtAut2;
        if (selmpgpAut.indexOf("- -") != -1) {//Réinitialisation
          mp(selmpgpAut, "- -", "listAut", "", "", txtAut2);
        }else{
          mp(selmpgpAut, "norm", "listAut", "", "", txtAut2);
          mp(selmpgpAut, "emin", "listAut", "", "", txtAut2);
          mp(selmpgpAut, "emaj", "listAut", "", "", txtAut2);
          mp(selmpgpAut, "effa", "listAut", "", "", txtAut2);
          mp(selmpgpAut, "gras", "listAut", "<strong>", "</strong>", txtAut2);
          mp(selmpgpAut, "soul", "listAut", "<u>", "</u>", txtAut2);
          mp(selmpgpAut, "ital", "listAut", "<em>", "</em>", txtAut2);
          mp(selmpgpAut, "epar", "listAut", "(", ")", txtAut2);
          mp(selmpgpAut, "ecro", "listAut", "[", "]", txtAut2);
          mp(selmpgpAut, "egui", "listAut", "\"", "\"", txtAut2);
          mp(selmpgpAut, "ecol", "listAut", valcg, "", txtAut2);
        }
      }
      if (listgp.indexOf("titre") != -1 && selmpgpTit == "") {
        var selmpgpTit = '~|~';
        selmp = document.getElementById("mp"+idtest);//Quelles valeurs de mise en page ?
        for (var i = 0; i < selmp.length; i++) {
          if (selmp.options[i].selected) selmpgpTit += selmp.options[i].value + '~|~';
        }
        valcg = document.getElementById("cg"+idtest).value;//Quelle couleur de texte ?
        selmpgpTit += valcg + '~|~';
        document.getElementById("listTit").innerHTML = "<?php echo $txtTit;?>";
        if (selmpgpTit.indexOf("- -") != -1) {//Réinitialisation
          mp(selmpgpTit, "- -", "listTit", "", "", "<?php echo $txtTit;?>");
        }else{
          mp(selmpgpTit, "norm", "listTit", "", "", "<?php echo $txtTit;?>");
          mp(selmpgpTit, "emin", "listTit", "", "", "<?php echo $txtTit;?>");
          mp(selmpgpTit, "emaj", "listTit", "", "", "<?php echo $txtTit;?>");
          mp(selmpgpTit, "effa", "listTit", "", "", "<?php echo $txtTit;?>");
          mp(selmpgpTit, "gras", "listTit", "<strong>", "</strong>", "<?php echo $txtTit;?>");
          mp(selmpgpTit, "soul", "listTit", "<u>", "</u>", "<?php echo $txtTit;?>");
          mp(selmpgpTit, "ital", "listTit", "<em>", "</em>", "<?php echo $txtTit;?>");
          mp(selmpgpTit, "epar", "listTit", "(", ")", "<?php echo $txtTit;?>");
          mp(selmpgpTit, "ecro", "listTit", "[", "]", "<?php echo $txtTit;?>");
          mp(selmpgpTit, "egui", "listTit", "\"", "\"", "<?php echo $txtTit;?>");
          mp(selmpgpTit, "ecol", "listTit", valcg, "", "<?php echo $txtTit;?>");
        }
      }
      if (listgp.indexOf("année") != -1 && selmpgpAnn == "") {
        var selmpgpAnn = '~|~';
        selmp = document.getElementById("mp"+idtest);//Quelles valeurs de mise en page ?
        for (var i = 0; i < selmp.length; i++) {
          if (selmp.options[i].selected) selmpgpAnn += selmp.options[i].value + '~|~';
        }
        valcg = document.getElementById("cg"+idtest).value;//Quelle couleur de texte ?
        selmpgpAnn += valcg + '~|~';
        document.getElementById("listAnn").innerHTML = "<?php echo $txtAnn;?>";
        if (selmpgpAnn.indexOf("- -") != -1) {//Réinitialisation
          mp(selmpgpAnn, "- -", "listAnn", "", "", "<?php echo $txtAnn;?>");
        }else{
          mp(selmpgpAnn, "norm", "listAnn", "", "", "<?php echo $txtAnn;?>");
          mp(selmpgpAnn, "emin", "listAnn", "", "", "<?php echo $txtAnn;?>");
          mp(selmpgpAnn, "emaj", "listAnn", "", "", "<?php echo $txtAnn;?>");
          mp(selmpgpAnn, "effa", "listAnn", "", "", "<?php echo $txtAnn;?>");
          mp(selmpgpAnn, "gras", "listAnn", "<strong>", "</strong>", "<?php echo $txtAnn;?>");
          mp(selmpgpAnn, "soul", "listAnn", "<u>", "</u>", "<?php echo $txtAnn;?>");
          mp(selmpgpAnn, "ital", "listAnn", "<em>", "</em>", "<?php echo $txtAnn;?>");
          mp(selmpgpAnn, "epar", "listAnn", "(", ")", "<?php echo $txtAnn;?>");
          mp(selmpgpAnn, "ecro", "listAnn", "[", "]", "<?php echo $txtAnn;?>");
          mp(selmpgpAnn, "egui", "listAnn", "\"", "\"", "<?php echo $txtAnn;?>");
          mp(selmpgpAnn, "ecol", "listAnn", valcg, "", "<?php echo $txtAnn;?>");
        }
      }
      if (listgp.indexOf("revue") != -1 && selmpgpRev == "") {
        var selmpgpRev = '~|~';
        selmp = document.getElementById("mp"+idtest);//Quelles valeurs de mise en page ?
        for (var i = 0; i < selmp.length; i++) {
          if (selmp.options[i].selected) selmpgpRev += selmp.options[i].value + '~|~';
        }
        valcg = document.getElementById("cg"+idtest).value;//Quelle couleur de texte ?
        selmpgpRev += valcg + '~|~';
        document.getElementById("listRev").innerHTML = "<?php echo $txtRev;?>";
        if (selmpgpRev.indexOf("- -") != -1) {//Réinitialisation
          mp(selmpgpRev, "- -", "listRev", "", "", "<?php echo $txtRev;?>");
        }else{
          mp(selmpgpRev, "norm", "listRev", "", "", "<?php echo $txtRev;?>");
          mp(selmpgpRev, "emin", "listRev", "", "", "<?php echo $txtRev;?>");
          mp(selmpgpRev, "emaj", "listRev", "", "", "<?php echo $txtRev;?>");
          mp(selmpgpRev, "effa", "listRev", "", "", "<?php echo $txtRev;?>");
          mp(selmpgpRev, "gras", "listRev", "<strong>", "</strong>", "<?php echo $txtRev;?>");
          mp(selmpgpRev, "soul", "listRev", "<u>", "</u>", "<?php echo $txtRev;?>");
          mp(selmpgpRev, "ital", "listRev", "<em>", "</em>", "<?php echo $txtRev;?>");
          mp(selmpgpRev, "epar", "listRev", "(", ")", "<?php echo $txtRev;?>");
          mp(selmpgpRev, "ecro", "listRev", "[", "]", "<?php echo $txtRev;?>");
          mp(selmpgpRev, "egui", "listRev", "\"", "\"", "<?php echo $txtRev;?>");
          mp(selmpgpRev, "ecol", "listRev", valcg, "", "<?php echo $txtRev;?>");
        }
      }
      if (listgp.indexOf("volume") != -1 && selmpgpVol == "") {
        var selmpgpVol = '~|~';
        selmp = document.getElementById("mp"+idtest);//Quelles valeurs de mise en page ?
        for (var i = 0; i < selmp.length; i++) {
          if (selmp.options[i].selected) selmpgpVol += selmp.options[i].value + '~|~';
        }
        valcg = document.getElementById("cg"+idtest).value;//Quelle couleur de texte ?
        selmpgpVol += valcg + '~|~';
        document.getElementById("listVol").innerHTML = "<?php echo $txtVol;?>";
        if (selmpgpVol.indexOf("- -") != -1) {//Réinitialisation
          mp(selmpgpVol, "- -", "listVol", "", "", "<?php echo $txtVol;?>");
        }else{
          mp(selmpgpVol, "norm", "listVol", "", "", "<?php echo $txtVol;?>");
          mp(selmpgpVol, "emin", "listVol", "", "", "<?php echo $txtVol;?>");
          mp(selmpgpVol, "emaj", "listVol", "", "", "<?php echo $txtVol;?>");
          mp(selmpgpVol, "effa", "listVol", "", "", "<?php echo $txtVol;?>");
          mp(selmpgpVol, "gras", "listVol", "<strong>", "</strong>", "<?php echo $txtVol;?>");
          mp(selmpgpVol, "soul", "listVol", "<u>", "</u>", "<?php echo $txtVol;?>");
          mp(selmpgpVol, "ital", "listVol", "<em>", "</em>", "<?php echo $txtVol;?>");
          mp(selmpgpVol, "epar", "listVol", "(", ")", "<?php echo $txtVol;?>");
          mp(selmpgpVol, "ecro", "listVol", "[", "]", "<?php echo $txtVol;?>");
          mp(selmpgpVol, "egui", "listVol", "\"", "\"", "<?php echo $txtVol;?>");
          mp(selmpgpVol, "ecol", "listVol", valcg, "", "<?php echo $txtVol;?>");
        }
      }
      if (listgp.indexOf("numéro") != -1 && selmpgpNum == "") {
        var selmpgpNum = '~|~';
        selmp = document.getElementById("mp"+idtest);//Quelles valeurs de mise en page ?
        for (var i = 0; i < selmp.length; i++) {
          if (selmp.options[i].selected) selmpgpNum += selmp.options[i].value + '~|~';
        }
        valcg = document.getElementById("cg"+idtest).value;//Quelle couleur de texte ?
        selmpgpNum += valcg + '~|~';
        document.getElementById("listNum").innerHTML = "<?php echo $txtNum;?>";
        if (selmpgpNum.indexOf("- -") != -1) {//Réinitialisation
          mp(selmpgpNum, "- -", "listNum", "", "", "<?php echo $txtNum;?>");
        }else{
          mp(selmpgpNum, "norm", "listNum", "", "", "<?php echo $txtNum;?>");
          mp(selmpgpNum, "emin", "listNum", "", "", "<?php echo $txtNum;?>");
          mp(selmpgpNum, "emaj", "listNum", "", "", "<?php echo $txtNum;?>");
          mp(selmpgpNum, "effa", "listNum", "", "", "<?php echo $txtNum;?>");
          mp(selmpgpNum, "gras", "listNum", "<strong>", "</strong>", "<?php echo $txtNum;?>");
          mp(selmpgpNum, "soul", "listNum", "<u>", "</u>", "<?php echo $txtNum;?>");
          mp(selmpgpNum, "ital", "listNum", "<em>", "</em>", "<?php echo $txtNum;?>");
          mp(selmpgpNum, "epar", "listNum", "(", ")", "<?php echo $txtNum;?>");
          mp(selmpgpNum, "ecro", "listNum", "[", "]", "<?php echo $txtNum;?>");
          mp(selmpgpNum, "egui", "listNum", "\"", "\"", "<?php echo $txtNum;?>");
          mp(selmpgpNum, "ecol", "listNum", valcg, "", "<?php echo $txtNum;?>");
        }
      }
      if (listgp.indexOf("pages") != -1 && selmpgpPag == "") {
        var selmpgpPag = '~|~';
        selmp = document.getElementById("mp"+idtest);//Quelles valeurs de mise en page ?
        for (var i = 0; i < selmp.length; i++) {
          if (selmp.options[i].selected) selmpgpPag += selmp.options[i].value + '~|~';
        }
        valcg = document.getElementById("cg"+idtest).value;//Quelle couleur de texte ?
        selmpgpPag += valcg + '~|~';
        document.getElementById("listPag").innerHTML = "<?php echo $txtPag;?>";
        if (selmpgpPag.indexOf("- -") != -1) {//Réinitialisation
          mp(selmpgpPag, "- -", "listPag", "", "", "<?php echo $txtPag;?>");
        }else{
          mp(selmpgpPag, "norm", "listPag", "", "", "<?php echo $txtPag;?>");
          mp(selmpgpPag, "emin", "listPag", "", "", "<?php echo $txtPag;?>");
          mp(selmpgpPag, "emaj", "listPag", "", "", "<?php echo $txtPag;?>");
          mp(selmpgpPag, "effa", "listPag", "", "", "<?php echo $txtPag;?>");
          mp(selmpgpPag, "gras", "listPag", "<strong>", "</strong>", "<?php echo $txtPag;?>");
          mp(selmpgpPag, "soul", "listPag", "<u>", "</u>", "<?php echo $txtPag;?>");
          mp(selmpgpPag, "ital", "listPag", "<em>", "</em>", "<?php echo $txtPag;?>");
          mp(selmpgpPag, "epar", "listPag", "(", ")", "<?php echo $txtPag;?>");
          mp(selmpgpPag, "ecro", "listPag", "[", "]", "<?php echo $txtPag;?>");
          mp(selmpgpPag, "egui", "listPag", "\"", "\"", "<?php echo $txtPag;?>");
          mp(selmpgpPag, "ecol", "listPag", valcg, "", "<?php echo $txtPag;?>");
        }
      }
      idtest++;
    }
  }
</script>