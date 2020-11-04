document.getElementById("deteqp").style.display = "none";

function affich_form() {
  document.getElementById("deteqp").style.display = "block";
  //document.getElementById("panel2").style.maxHeight = document.getElementById("panel2").scrollHeight + "px";
}

function cacher_form() {
  document.getElementById("deteqp").style.display = "none";
  document.getElementById("eqp").style.display = "none";
  //document.getElementById("panel2").style.maxHeight = document.getElementById("panel2").scrollHeight + "px";
}

function affich_form2() {
  document.getElementById("detrac").style.display = "block";
  //document.getElementById("panel2").style.maxHeight = document.getElementById("panel2").scrollHeight + "px";
}

function cacher_form2() {
  document.getElementById("detrac").style.display = "none";
  //document.getElementById("panel2").style.maxHeight = document.getElementById("panel2").scrollHeight + "px";
}

function appst() {
  var select = document.getElementById("stpdf");
  var choix = select.selectedIndex;
  var valeur = document.getElementById("stpdf").options[choix].value;
  if (valeur == "- -") {//Réinitialisation
    for (i = 1; i < 5; i++) {
      document.getElementById("spa").options[i].selected = "";
      document.getElementById("nmo").options[i].selected = "";
    }
    document.getElementById("nmo").options[0].selected = "selected";
    for (i = 1; i < 8; i++) {
      document.getElementById("gp"+i).options[0] = new Option("- -", "- -", false, true);
      document.getElementById("gp"+i).options[1] = new Option("Auteurs", "auteurs", false, false);
      document.getElementById("gp"+i).options[2] = new Option("Année", "année", false, false);
      document.getElementById("gp"+i).options[3] = new Option("Titre", "titre", false, false);
      document.getElementById("gp"+i).options[4] = new Option("Revue", "revue", false, false);
      document.getElementById("gp"+i).options[5] = new Option("Volume", "volume", false, false);
      document.getElementById("gp"+i).options[6] = new Option("Numéro", "numéro", false, false);
      document.getElementById("gp"+i).options[7] = new Option("Pages", "pages", false, false);
      document.getElementById("mp"+i).options[0].selected = "selected";
      for (var j = 1; j < 10; j++) {
        document.getElementById("mp"+i).options[j].selected = "";
      }
      document.getElementById("sep"+i).options[0].selected = "selected";
      for (j = 1; j < 7; j++) {
        document.getElementById("sep"+i).options[j].selected = "";
      }
      document.getElementById("cg"+i).value = "000000";
    }
  }
  
  //Réinitialisation mp, sep et gp
  for (i = 1; i < 8; i++) {
    for (j = 0; j < 11 ; j++) {
        document.getElementById("mp"+i).options[j].selected = "";
    }
    for (j = 1; j < 8; j++) {
      document.getElementById("sep"+i).options[j].selected = "";
    }
    document.getElementById("gp"+i).options[0] = new Option("- -", "- -", false, true);
  }

  //American Chemical Society
  if (valeur == "acs") {
    document.getElementById("spa").options[2].selected = "selected";
    document.getElementById("nmo").options[3].selected = "selected";
    document.getElementById("gp1").options[1] = new Option("Auteurs", "auteurs", false, true);   
    document.getElementById("mp1").options[1].selected = "selected";
    document.getElementById("sep1").options[1] = new Option("_", " ", false, true);
    document.getElementById("gp2").options[1] = new Option("Titre", "titre", false, true);
    document.getElementById("mp2").options[1].selected = "selected";
    document.getElementById("sep2").options[3] = new Option("._", ". ", false, true);
    document.getElementById("gp3").options[1] = new Option("Revue", "revue", false, true);
    document.getElementById("mp3").options[4].selected = "selected";
    document.getElementById("sep3").options[3] = new Option("._", ". ", false, true);
    document.getElementById("gp4").options[1] = new Option("Année", "année", false, true);
    document.getElementById("mp4").options[2].selected = "selected";
    document.getElementById("sep4").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp5").options[1] = new Option("Volume", "volume", false, true);
    document.getElementById("mp5").options[4].selected = "selected";
    document.getElementById("sep5").options[1] = new Option("_", " ", false, true);
    document.getElementById("gp6").options[1] = new Option("Numéro", "numéro", false, true);
    document.getElementById("mp6").options[5].selected = "selected";
    document.getElementById("sep6").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp7").options[1] = new Option("Pages", "pages", false, true);
    document.getElementById("mp7").options[1].selected = "selected";
    document.getElementById("sep7").options[1] = new Option("_", " ", false, true);
  }

  //American Psychological Association, 6th ed.
  if (valeur == "apa") {
    document.getElementById("spa").options[1].selected = "selected";
    document.getElementById("nmo").options[1].selected = "selected";
    document.getElementById("gp1").options[1] = new Option("Auteurs", "auteurs", false, true);
    document.getElementById("mp1").options[1].selected = "selected";
    document.getElementById("sep1").options[1] = new Option("_", " ", false, true);
    document.getElementById("gp2").options[1] = new Option("Année", "année", false, true);
    document.getElementById("mp2").options[5].selected = "selected";
    document.getElementById("sep2").options[3] = new Option("._", ". ", false, true);
    document.getElementById("gp3").options[1] = new Option("Titre", "titre", false, true);
    document.getElementById("mp3").options[1].selected = "selected";
    document.getElementById("sep3").options[3] = new Option("._", ". ", false, true);
    document.getElementById("gp4").options[1] = new Option("Revue", "revue", false, true);
    document.getElementById("mp4").options[4].selected = "selected";
    document.getElementById("sep4").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp5").options[1] = new Option("Volume", "volume", false, true);
    document.getElementById("mp5").options[4].selected = "selected";
    document.getElementById("sep5").options[6] = new Option("auc", "", false, true);
    document.getElementById("gp6").options[1] = new Option("Numéro", "numéro", false, true);
    document.getElementById("mp6").options[5].selected = "selected";
    document.getElementById("sep6").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp7").options[1] = new Option("Pages", "pages", false, true);
    document.getElementById("mp7").options[1].selected = "selected";
    document.getElementById("sep7").options[1] = new Option("_", " ", false, true);
  }
  
  //Chicago
  if (valeur == "chi") {
    document.getElementById("spa").options[1].selected = "selected";
    document.getElementById("nmo").options[1].selected = "selected";
    document.getElementById("gp1").options[1] = new Option("Auteurs", "auteurs", false, true);   
    document.getElementById("mp1").options[1].selected = "selected";
    document.getElementById("sep1").options[2] = new Option("._", ". ", false, true);
    document.getElementById("gp2").options[1] = new Option("Année", "année", false, true);
    document.getElementById("mp2").options[1].selected = "selected";
    document.getElementById("sep2").options[3] = new Option("._", ". ", false, true);
    document.getElementById("gp3").options[1] = new Option("Titre", "titre", false, true);
    document.getElementById("mp3").options[7].selected = "selected";
    document.getElementById("sep3").options[3] = new Option("._", ". ", false, true);
    document.getElementById("gp4").options[1] = new Option("Revue", "revue", false, true);
    document.getElementById("mp4").options[4].selected = "selected";
    document.getElementById("sep4").options[1] = new Option("_", " ", false, true);
    document.getElementById("gp5").options[1] = new Option("Volume", "volume", false, true);
    document.getElementById("mp5").options[1].selected = "selected";
    document.getElementById("sep5").options[1] = new Option("_", " ", false, true);
    document.getElementById("gp6").options[1] = new Option("Numéro", "numéro", false, true);
    document.getElementById("mp6").options[5].selected = "selected";
    document.getElementById("sep6").options[7] = new Option(":_", ": ", false, true);
    document.getElementById("gp7").options[1] = new Option("Pages", "pages", false, true);
    document.getElementById("mp7").options[1].selected = "selected";
    document.getElementById("sep7").options[3] = new Option("._", ". ", false, true);
  }
  
  //Harvard
  if (valeur == "har") {
    document.getElementById("spa").options[1].selected = "selected";
    document.getElementById("nmo").options[1].selected = "selected";
    document.getElementById("gp1").options[1] = new Option("Auteurs", "auteurs", false, true);   
    document.getElementById("mp1").options[1].selected = "selected";
    document.getElementById("sep1").options[1] = new Option("_", " ", false, true);
    document.getElementById("gp2").options[1] = new Option("Année", "année", false, true);
    document.getElementById("mp2").options[5].selected = "selected";
    document.getElementById("sep2").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp3").options[1] = new Option("Titre", "titre", false, true);
    document.getElementById("mp3").options[7].selected = "selected";
    document.getElementById("sep3").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp4").options[1] = new Option("Revue", "revue", false, true);
    document.getElementById("mp4").options[4].selected = "selected";
    document.getElementById("sep4").options[2] = new Option(",_", ", Vol. ", false, true);
    document.getElementById("gp5").options[1] = new Option("Volume", "volume", false, true);
    document.getElementById("mp5").options[1].selected = "selected";
    document.getElementById("sep5").options[2] = new Option(",_", ", No.", false, true);
    document.getElementById("gp6").options[1] = new Option("Numéro", "numéro", false, true);
    document.getElementById("mp6").options[1].selected = "selected";
    document.getElementById("sep6").options[2] = new Option(",_", ", pp. ", false, true);
    document.getElementById("gp7").options[1] = new Option("Pages", "pages", false, true);
    document.getElementById("mp7").options[1].selected = "selected";
    document.getElementById("sep7").options[3] = new Option("._", ". ", false, true);
  }
  
  //IEEE
  if (valeur == "iee") {
    document.getElementById("spa").options[1].selected = "selected";
    document.getElementById("nmo").options[4].selected = "selected";
    document.getElementById("gp1").options[1] = new Option("Auteurs", "auteurs", false, true);   
    document.getElementById("mp1").options[1].selected = "selected";
    document.getElementById("sep1").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp2").options[1] = new Option("Titre", "titre", false, true);
    document.getElementById("mp2").options[7].selected = "selected";
    document.getElementById("sep2").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp3").options[1] = new Option("Revue", "revue", false, true);
    document.getElementById("mp3").options[4].selected = "selected";
    document.getElementById("sep3").options[2] = new Option(",_", ", vol. ", false, true);
    document.getElementById("gp4").options[1] = new Option("Volume", "volume", false, true);
    document.getElementById("mp4").options[4].selected = "selected";
    document.getElementById("sep4").options[2] = new Option(",_", ", no. ", false, true);
    document.getElementById("gp5").options[1] = new Option("Numéro", "numéro", false, true);
    document.getElementById("mp5").options[1].selected = "selected";
    document.getElementById("sep5").options[2] = new Option(",_", ", pp. ", false, true);
    document.getElementById("gp6").options[1] = new Option("Pages", "pages", false, true);
    document.getElementById("mp6").options[1].selected = "selected";
    document.getElementById("sep6").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp7").options[1] = new Option("Année", "année", false, true);
    document.getElementById("mp7").options[1].selected = "selected";
    document.getElementById("sep7").options[3] = new Option("._", ". ", false, true);
  }
  
  //National Library of Medicine (NLM)
  if (valeur == "nlm") {
    document.getElementById("spa").options[1].selected = "selected";
    document.getElementById("nmo").options[1].selected = "selected";
    document.getElementById("gp1").options[1] = new Option("Auteurs", "auteurs", false, true);   
    document.getElementById("mp1").options[1].selected = "selected";
    document.getElementById("sep1").options[1] = new Option("_", " ", false, true);
    document.getElementById("gp2").options[1] = new Option("Titre", "titre", false, true);
    document.getElementById("mp2").options[1].selected = "selected";
    document.getElementById("sep2").options[3] = new Option("._", ". ", false, true);
    document.getElementById("gp3").options[1] = new Option("Revue", "revue", false, true);
    document.getElementById("mp3").options[1].selected = "selected";
    document.getElementById("sep3").options[3] = new Option("._", ". ", false, true);
    document.getElementById("gp4").options[1] = new Option("Année", "année", false, true);
    document.getElementById("mp4").options[1].selected = "selected";
    document.getElementById("sep4").options[4] = new Option(";_", ";", false, true);
    document.getElementById("gp5").options[1] = new Option("Volume", "volume", false, true);
    document.getElementById("mp5").options[1].selected = "selected";
    document.getElementById("sep5").options[6] = new Option("", "", false, true);
    document.getElementById("gp6").options[1] = new Option("Numéro", "numéro", false, true);
    document.getElementById("mp6").options[5].selected = "selected";
    document.getElementById("sep6").options[7] = new Option(":_", ":", false, true);
    document.getElementById("gp7").options[1] = new Option("Pages", "pages", false, true);
    document.getElementById("mp7").options[1].selected = "selected";
    document.getElementById("sep7").options[3] = new Option("._", ". ", false, true);
  }
  
  //Nature
  if (valeur == "nat") {
    document.getElementById("spa").options[1].selected = "selected";
    document.getElementById("nmo").options[2].selected = "selected";
    document.getElementById("gp1").options[1] = new Option("Auteurs", "auteurs", false, true);   
    document.getElementById("mp1").options[1].selected = "selected";
    document.getElementById("sep1").options[1] = new Option("_", " ", false, true);
    document.getElementById("gp2").options[1] = new Option("Titre", "titre", false, true);
    document.getElementById("mp2").options[1].selected = "selected";
    document.getElementById("sep2").options[3] = new Option("._", ". ", false, true);
    document.getElementById("gp3").options[1] = new Option("Revue", "revue", false, true);
    document.getElementById("mp3").options[4].selected = "selected";
    document.getElementById("sep3").options[3] = new Option("._", ". ", false, true);
    document.getElementById("gp4").options[1] = new Option("Volume", "volume", false, true);
    document.getElementById("mp4").options[2].selected = "selected";
    document.getElementById("sep4").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp5").options[1] = new Option("Pages", "pages", false, true);
    document.getElementById("mp5").options[1].selected = "selected";
    document.getElementById("sep5").options[1] = new Option(" ", " ", false, true);
    document.getElementById("gp6").options[1] = new Option("Année", "année", false, true);
    document.getElementById("mp6").options[5].selected = "selected";
    document.getElementById("sep6").options[6] = new Option("", "", false, true);
    document.getElementById("gp7").options[1] = new Option("Numéro", "numéro", false, true);
    document.getElementById("mp7").options[10].selected = "selected";
    document.getElementById("sep7").options[3] = new Option("._", ". ", false, true);
  }
  
  //Modern Language Association (MLA), 8th ed.
  if (valeur == "mla") {
    document.getElementById("spa").options[1].selected = "selected";
    document.getElementById("nmo").options[1].selected = "selected";
    document.getElementById("gp1").options[1] = new Option("Auteurs", "auteurs", false, true);   
    document.getElementById("mp1").options[1].selected = "selected";
    document.getElementById("sep1").options[1] = new Option("_", " ", false, true);
    document.getElementById("gp2").options[1] = new Option("Titre", "titre", false, true);
    document.getElementById("mp2").options[7].selected = "selected";
    document.getElementById("sep2").options[3] = new Option("._", ". ", false, true);
    document.getElementById("gp3").options[1] = new Option("Revue", "revue", false, true);
    document.getElementById("mp3").options[4].selected = "selected";
    document.getElementById("sep3").options[2] = new Option(",_", ", vol. ", false, true);
    document.getElementById("gp4").options[1] = new Option("Volume", "volume", false, true);
    document.getElementById("mp4").options[1].selected = "selected";
    document.getElementById("sep4").options[2] = new Option(",_", ", no. ", false, true);
    document.getElementById("gp5").options[1] = new Option("Numéro", "numéro", false, true);
    document.getElementById("mp5").options[1].selected = "selected";
    document.getElementById("sep5").options[2] = new Option(", ", ", ", false, true);
    document.getElementById("gp6").options[1] = new Option("Année", "année", false, true);
    document.getElementById("mp6").options[1].selected = "selected";
    document.getElementById("sep6").options[2] = new Option(", ", ", pp. ", false, true);
    document.getElementById("gp7").options[1] = new Option("Pages", "pages", false, true);
    document.getElementById("mp7").options[1].selected = "selected";
    document.getElementById("sep7").options[3] = new Option("._", ". ", false, true);
  }
  
  //Vancouver
  if (valeur == "van") {
    document.getElementById("spa").options[1].selected = "selected";
    document.getElementById("nmo").options[2].selected = "selected";
    document.getElementById("gp1").options[1] = new Option("Auteurs", "auteurs", false, true);   
    document.getElementById("mp1").options[1].selected = "selected";
    document.getElementById("sep1").options[1] = new Option("_", " ", false, true);
    document.getElementById("gp2").options[1] = new Option("Titre", "titre", false, true);
    document.getElementById("mp2").options[1].selected = "selected";
    document.getElementById("sep2").options[3] = new Option("._", ". ", false, true);
    document.getElementById("gp3").options[1] = new Option("Revue", "revue", false, true);
    document.getElementById("mp3").options[1].selected = "selected";
    document.getElementById("sep3").options[3] = new Option("._", ". ", false, true);
    document.getElementById("gp4").options[1] = new Option("Année", "année", false, true);
    document.getElementById("mp4").options[1].selected = "selected";
    document.getElementById("sep4").options[4] = new Option(";_", ";", false, true);
    document.getElementById("gp5").options[1] = new Option("Volume", "volume", false, true);
    document.getElementById("mp5").options[1].selected = "selected";
    document.getElementById("sep5").options[6] = new Option("auc", "", false, true);
    document.getElementById("gp6").options[1] = new Option("Numéro", "numéro", false, true);
    document.getElementById("mp6").options[5].selected = "selected";
    document.getElementById("sep6").options[7] = new Option(": ", ":", false, true);
    document.getElementById("gp7").options[1] = new Option("Pages", "pages", false, true);
    document.getElementById("mp7").options[1].selected = "selected";
    document.getElementById("sep7").options[3] = new Option("._", ". ", false, true);
  }
  
  //Zotero1
  if (valeur == "zo1") {
    document.getElementById("spa").options[1].selected = "selected";
    document.getElementById("nmo").options[1].selected = "selected";
    document.getElementById("gp1").options[1] = new Option("Auteurs", "auteurs", false, true);   
    document.getElementById("mp1").options[9].selected = "selected";
    document.getElementById("sep1").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp2").options[1] = new Option("Année", "année", false, true);
    document.getElementById("mp2").options[1].selected = "selected";
    document.getElementById("sep2").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp3").options[1] = new Option("Titre", "titre", false, true);
    document.getElementById("mp3").options[7].selected = "selected";
    document.getElementById("sep3").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp4").options[1] = new Option("Revue", "revue", false, true);
    document.getElementById("mp4").options[4].selected = "selected";
    document.getElementById("sep4").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp5").options[1] = new Option("Volume", "volume", false, true);
    document.getElementById("mp5").options[1].selected = "selected";
    document.getElementById("sep5").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp6").options[1] = new Option("Numéro", "numéro", false, true);
    document.getElementById("mp6").options[1].selected = "selected";
    document.getElementById("sep6").options[2] = new Option(",_", ", ", false, true);
    document.getElementById("gp7").options[1] = new Option("Pages", "pages", false, true);
    document.getElementById("mp7").options[1].selected = "selected";
    document.getElementById("sep7").options[3] = new Option("._", ".", false, true);
  }
}

function mise_en_ordre(id) {
  var idmaxi = 8;
  var idtest = 1;
  var test = "";
  while (idtest < idmaxi) {
    select = document.getElementById("gp"+idtest);
    choix = select.selectedIndex;
    valeur = document.getElementById("gp"+idtest).options[choix].value;
    if (valeur != "- -") {
      test += "~"+valeur;
    }
    idtest++;
  }
  var idtest = 1;
  while (idtest < idmaxi) {
    var selectid = document.getElementById("gp"+idtest);
    var choixid = selectid.selectedIndex;
    var valeurid = document.getElementById("gp"+idtest).options[choixid].value;
    if (idtest != id || (idtest == id && valeurid == "- -")) {
      switch(valeurid) {
        case "- -":
          var true0 = true;
          var true1 = false;
          var true2 = false;
          var true3 = false;
          var true4 = false;
          var true5 = false;
          var true6 = false;
          var true7 = false;
          break;
        case "auteurs":
          var true0 = false;
          var true1 = true;
          var true2 = false;
          var true3 = false;
          var true4 = false;
          var true5 = false;
          var true6 = false;
          var true7 = false;
          break;
        case "année":
          var true0 = false;
          var true1 = false;
          var true2 = true;
          var true3 = false;
          var true4 = false;
          var true5 = false;
          var true6 = false;
          var true7 = false;
          break;
        case "titre":
          var true0 = false;
          var true1 = false;
          var true2 = false;
          var true3 = true;
          var true4 = false;
          var true5 = false;
          var true6 = false;
          var true7 = false;
          break;
        case "revue":
          var true0 = false;
          var true1 = false;
          var true2 = false;
          var true3 = false;
          var true4 = true;
          var true5 = false;
          var true6 = false;
          var true7 = false;
          break;
        case "volume":
          var true0 = false;
          var true1 = false;
          var true2 = false;
          var true3 = false;
          var true4 = false;
          var true5 = true;
          var true6 = false;
          var true7 = false;
          break;
        case "numéro":
          var true0 = false;
          var true1 = false;
          var true2 = false;
          var true3 = false;
          var true4 = false;
          var true5 = false;
          var true6 = true;
          var true7 = false;
          break;
        case "pages":
          var true0 = false;
          var true1 = false;
          var true2 = false;
          var true3 = false;
          var true4 = false;
          var true5 = false;
          var true6 = false;
          var true7 = true;
          break;
      }
      document.getElementById("gp"+idtest).options.length = 0;
      document.getElementById("gp"+idtest).options[0] = new Option("- -", "- -", false, true0);
      var i = 1;
      if (test.indexOf("auteurs") == -1 || true1 == true) {document.getElementById("gp"+idtest).options[i] = new Option("Auteurs", "auteurs", false, true1); i++;}
      if (test.indexOf("année") == -1 || true2 == true) {document.getElementById("gp"+idtest).options[i] = new Option("Année", "année", false, true2); i++;}
      if (test.indexOf("titre") == -1 || true3 == true) {document.getElementById("gp"+idtest).options[i] = new Option("Titre", "titre", false, true3); i++;}
      if (test.indexOf("revue") == -1 || true4 == true) {document.getElementById("gp"+idtest).options[i] = new Option("Revue", "revue", false, true4); i++;}
      if (test.indexOf("volume") == -1 || true5 == true) {document.getElementById("gp"+idtest).options[i] = new Option("Volume", "volume", false, true5); i++;}
      if (test.indexOf("numéro") == -1 || true6 == true) {document.getElementById("gp"+idtest).options[i] = new Option("Numéro", "numéro", false, true6); i++;}
      if (test.indexOf("pages") == -1 || true7 == true) {document.getElementById("gp"+idtest).options[i] = new Option("Pages", "pages", false, true7); i++;}
    }
    idtest++;
  }
}

//Librairie aperçu
function mp(sel, quoi, qui, code1, code2, mem) {
  var contres = document.getElementById(qui).innerHTML;
  if (quoi == "- -") {
    document.getElementById(qui).innerHTML = mem;
    return;
  }
  if (quoi == "ecol") {
    contaff = "<font color='#"+code1+"'>"+contres+"</font>";
  }else{
    if (quoi == "emin" && sel.indexOf("emin") != -1 || quoi == "emaj" && sel.indexOf("emaj") != -1 || quoi == "effa" && sel.indexOf("effa") != -1) {
      switch(quoi) {
        case "emin":
          contaff = contres.toLowerCase();
          break;
        case "emaj":
          contaff = contres.toUpperCase();
          break;
        case "effa":
          contaff = '';
          break;
      }
    }else{
      if (sel.indexOf(quoi) != -1) {
        var contaff = contres;
        if (contres.indexOf(code1) == -1 && contres.indexOf(code2) == -1) {
          var contaff = code1+contres+code2;
        }
      }else{
        var contaff = contres.replace(code1, "");
        var contaff = contaff.replace(code2, "");
      }
    }
  }
  document.getElementById(qui).innerHTML = contaff;
}
