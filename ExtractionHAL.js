document.getElementById("deteqp").style.display = "none";
document.getElementById("detrac").style.display = "block";

var acc = document.getElementsByClassName("accordeon");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    majapercu();
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  }
}

function affich_form() {
  document.getElementById("deteqp").style.display = "block";
  document.getElementById("panel2").style.maxHeight = document.getElementById("panel2").scrollHeight + "px";
}

function cacher_form() {
  document.getElementById("deteqp").style.display = "none";
  document.getElementById("eqp").style.display = "none";
  document.getElementById("panel2").style.maxHeight = document.getElementById("panel2").scrollHeight + "px";
}

function affich_form2() {
  document.getElementById("detrac").style.display = "block";
  document.getElementById("panel2").style.maxHeight = document.getElementById("panel2").scrollHeight + "px";
}

function cacher_form2() {
  document.getElementById("detrac").style.display = "none";
  document.getElementById("panel2").style.maxHeight = document.getElementById("panel2").scrollHeight + "px";
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

// librairie calendrier

/* ##################### CONFIGURATION ##################### */

/* ##- INITIALISATION DES VARIABLES -##*/
var calendrierSortie = '';
//Date actuelle
var today = '';
//Mois actuel
var current_month = '';
//Année actuelle
var current_year = '' ;
//Jours actuel
var current_day = '';
//Nombres de jours depuis le début de la semaine
var current_day_since_start_week = '';
//On initialise le nom des mois et le nom des jours en VF :)
var month_name = new Array('Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre');
var day_name = new Array('L','M','M','J','V','S','D');
//permet de récupèrer l'input sur lequel on a clické et de le remplir avec la date formatée
var myObjectClick = null;
//Classe qui sera détecté pour afficher le calendrier
var classMove = "calendrier";
//Variable permettant de savoir si on doit garder en mémoire le champs input clické
var lastInput = null;
//Div du calendrier
var div_calendar = "";



//########################## FIN DES FONCTION LISTENER ########################## //
/*Ajout du listener pour détecter le click sur l'élément et afficher le calendrier
uniquement sur les textbox de class css date */

//Fonction permettant d'initialiser les listeners
function init_evenement(){
    //On commence par affecter une fonction à chaque évènement de la souris
    if(window.attachEvent){
        document.onmousedown = start;
        document.onmouseup = drop;
    }
    else{
        document.addEventListener("mousedown",start, false);
        document.addEventListener("mouseup",drop, false);
    }
}
//Fonction permettant de récupèrer l'objet sur lequel on a clické, et l'on récupère sa classe
function start(e){
    //On initialise l'évènement s'il n'a aps été créé ( sous ie )
    if(!e){
        e = window.event;
    }
    //Détection de l'élément sur lequel on a clické
    var monElement = null;
    monElement = (e.target)? e.target:e.srcElement;
    if(monElement != null && monElement)
    {
        //On appel la fonction permettant de récupèrer la classe de l'objet et assigner les variables
        getClassDrag(monElement);

        if(myObjectClick){
            initialiserCalendrier(monElement);
            lastInput = myObjectClick;
        }
    }
}
function drop(){
         myObjectClick = null;
}

function getClassDrag(myObject){
    with(myObject){
        var x = className;
        var listeClass = x.split(" ");
        //On parcours le tableau pour voir si l'objet est de type calendrier
        for(var i = 0 ; i < listeClass.length ; i++){
            if(listeClass[i] == classMove){
                myObjectClick = myObject;
                break;
            }
        }
    }
}
window.onload = init_evenement;

//########################## Pour combler un bug d'ie 6 on masque les select ########################## //
function masquerSelect(){
        var ua = navigator.userAgent.toLowerCase();
        var versionNav = parseFloat( ua.substring( ua.indexOf('msie ') + 5 ) );
        var isIE        = ( (ua.indexOf('msie') != -1) && (ua.indexOf('opera') == -1) && (ua.indexOf('webtv') == -1) );

        if(isIE && (versionNav < 7)){
             var svn = document.getElementsByTagName("SELECT");
             for (var a = 0; a<svn.length; a++){
                svn[a].style.visibility="hidden";
             }
        }
}

function montrerSelect(){
       var ua = navigator.userAgent.toLowerCase();
        var versionNav = parseFloat( ua.substring( ua.indexOf('msie ') + 5 ) );
        var isIE        = ( (ua.indexOf('msie') != -1) && (ua.indexOf('opera') == -1) && (ua.indexOf('webtv') == -1) );
        if(isIE && versionNav < 7){
             svn=document.getElementsByTagName("SELECT");
             for (a=0;a<svn.length;a++){
                svn[a].style.visibility="visible";
             }
         }
}

//########################## FIN DES FONCTION LISTENER ########################## //

// ## PARAMETRE D'AFFICHAGE du CALENDRIER ## //
//si enLigne est a true , le calendrier s'affiche sur une seule ligne,
//sinon il prend la taille spécifié par défaut;

var enLigne = false ;
var largeur = "175";
var formatage = "/";

/* ##################### FIN DE LA CONFIGURATION ##################### */

//Fonction permettant de passer a l'annee précédente
function annee_precedente(){

    //On récupère l'annee actuelle puis on vérifit que l'on est pas en l'an 1 :-)
    if(current_year == 1){
        //current_year = current_year;
    }
    else{
        current_year = current_year - 1 ;
    }
    //et on appel la fonction de génération de calendrier
    calendrier(    current_year , current_month, current_day);
}

//Fonction permettant de passer à l'annee suivante
function annee_suivante(){
    //Pas de limite pour l'ajout d'année
    current_year = current_year +1 ;
    //et on appel la fonction de génération de calendrier
    calendrier(    current_year , current_month, current_day);
}




//Fonction permettant de passer au mois précédent
function mois_precedent(){

    //On récupère le mois actuel puis on vérifit que l'on est pas en janvier sinon on enlève une année
    if(current_month == 0){
        current_month = 11;
        current_year = current_year - 1;
    }
    else{
        current_month = current_month - 1 ;
    }
    //et on appel la fonction de génération de calendrier
    calendrier(    current_year , current_month, current_day);
}

//Fonction permettant de passer au mois suivant
function mois_suivant(){
    //On récupère le mois actuel puis on vérifit que l'on est pas en janvier sinon on ajoute une année
    if(current_month == 12){
        current_month = 1;
        current_year = current_year  + 1;
    }
    else{
        current_month = current_month + 1;
    }
    //et on appel la fonction de génération de calendrier
    calendrier(    current_year , current_month, current_day);
}

//Fonction principale qui génère le calendrier
//Elle prend en paramètre, l'année , le mois , et le jour
//Si l'année et le mois ne sont pas renseignés , la date courante est affecté par défaut
function calendrier(year, month, day ){

    //Aujourd'hui si month et year ne sont pas renseignés
    if(month == null || year == null){
        today = new Date();
    }
    else{
        //month = month - 1;
        //Création d'une date en fonction de celle passée en paramètre
        today = new Date(year, month , day);
    }

    //Mois actuel
    current_month = today.getMonth()

    //Année actuelle
    current_year = today.getFullYear();

    //Jours actuel
    current_day = today.getDate();

    // On récupère le premier jour de la semaine du mois
    var dateTemp = new Date(current_year, current_month,1);

    //test pour vérifier quel jour était le prmier du mois
    current_day_since_start_week = (( dateTemp.getDay()== 0 ) ? 6 : dateTemp.getDay() - 1);

    //variable permettant de vérifier si l'on est déja rentré dans la condition pour éviter une boucle infinit
    var verifJour = false;

    //On initialise le nombre de jour par mois
    var nbJoursfevrier = (current_year % 4) == 0 ? 29 : 28;
    //Initialisation du tableau indiquant le nombre de jours par mois
    var day_number = new Array(31,nbJoursfevrier,31,30,31,30,31,31,30,31,30,31);

    //On initialise la ligne qui comportera tous les noms des jours depuis le début du mois
    var list_day = '';
    var day_calendar = '';

    var x = 0

    //Lignes permettant de changer  de mois

    var month_bef = "<a href=\"javascript:mois_precedent()\" style=\"float:left;margin-left:3px;\" > << </a>";
    var month_next = "<a href=\"javascript:mois_suivant()\" style=\"float:right;margin-right:3px;\" > >> </a>";

	  /*   //Lignes permettant de changer l'année et de mois
	  var month_bef = "<a href=\"javascript:mois_precedent()\" style=\"margin-left:3px;\" > < </a>";
    var month_next = "<a href=\"javascript:mois_suivant()\" style=\"margin-right:3px;\"> > </a>";
    var year_next = "<a href=\"javascript:annee_suivante()\" style=\"float:right;margin-right:3px;\" >&nbsp;&nbsp; > > </a>";
    var year_bef = "<a href=\"javascript:annee_precedente()\" style=\"float:left;margin-left:3px;\"  > < < &nbsp;&nbsp;</a>";
	 */
    calendrierSortie = "<p class=\"titleMonth\"> <a href=\"javascript:alimenterChamps('')\" style=\"float:left;margin-left:3px;color:#cccccc;font-size:10px;\"> Effacer la date </a><a href=\"javascript:masquerCalendrier()\" style=\"float:right;margin-right:3px;color:red;font-weight:bold;font-size:12px;\">X</a>&nbsp;</p>";
    //On affiche le mois et l'année en titre
   // calendrierSortie += "<p class=\"titleMonth\" style=\"float:left;\">" + year_next + year_bef+  month_bef +  month_name[current_month]+ " "+ current_year + month_next+"</p>";
    calendrierSortie += "<p class=\"titleMonth\" style=\"float:left;\">" +  month_bef +  month_name[current_month]+ " "+ current_year + month_next+"</p>";
    //On remplit le calendrier avec le nombre de jour, en remplissant les premiers jours par des champs vides
    for(var nbjours = 0 ; nbjours < (day_number[current_month] + current_day_since_start_week) ; nbjours++){

        // On boucle tous les 7 jours pour créer la ligne qui comportera le nom des jours en fonction des<br />
        // paramètres d'affichage
        if(enLigne == true){
            // Si le premier jours de la semaine n'est pas un lundi alors on commence ce jours ci
            if(current_day_since_start_week != 1 && verifJour == false){
                i  = current_day_since_start_week - 1 ;
                list_day += "<span>" + day_name[x] + "</span>";
                verifJour = true;
            }
            else{
                list_day += "<span>" + day_name[x] + "</span>";
            }
            x = (x == 6) ? 0: x    + 1;
        }
        else if( enLigne == false && verifJour == false){
            for(x = 0 ; x < 7 ; x++){
                list_day += "<span>" + day_name[x] + "</span>";
            }
            verifJour = true;
        }
        //et enfin on ajoute les dates au calendrier
        //Pour gèrer les jours "vide" et éviter de faire une boucle on vérifit que le nombre de jours corespond bien au
        //nombre de jour du mois
        if(nbjours < day_number[current_month]){
            if(current_day == (nbjours+1)){
                day_calendar += "<span onclick=\"alimenterChamps(this.innerHTML)\" class=\"currentDay\">" + (nbjours+1) + "</span>";
            }
            else{
                day_calendar += "<span onclick=\"alimenterChamps(this.innerHTML)\">" + (nbjours+1) + "</span>";
            }
        }
    }

    //On ajoute les jours "vide" du début du mois
    for(i  = 0 ; i < current_day_since_start_week ; i ++){
        day_calendar = "<span>&nbsp;</span>" + day_calendar;
    }
    //Si aucun calendrier n'a encore été crée :
    if(!document.getElementById("calendrier")){
        //On crée une div dynamiquement, en absolute, positionné sous le champs input
        var div_calendar = document.createElement("div");

        //On lui attribut un id
        div_calendar.setAttribute("id","calendrier");

        //On définit les propriétés de cette div ( id et classe )
        div_calendar.className = "calendar_input";

        //Pour ajouter la div dans le document
        var mybody = document.getElementsByTagName("body")[0];

        //Pour finir on ajoute la div dans le document
        mybody.appendChild(div_calendar);
    }
    else{
            div_calendar = document.getElementById("calendrier");
    }

    //On insèrer dans la div, le contenu du calendrier généré
    //On assigne la taille du calendrier de façon dynamique ( on ajoute 10 px pour combler un bug sous ie )
    var width_calendar = ( enLigne == false ) ?  largeur+"px" : ((nbjours * 20) + ( nbjours * 4 ))+10+"px" ;

    calendrierSortie = calendrierSortie + list_day  + day_calendar + "<div class=\"separator\"></div>";
    div_calendar.innerHTML = calendrierSortie;
    div_calendar.style.width = width_calendar;
}

//Fonction permettant de trouver la position de l'élément ( input ) pour pouvoir positioner le calendrier
function ds_getleft(el) {
    var tmp = el.offsetLeft;
    el = el.offsetParent
    while(el) {
        tmp += el.offsetLeft;
        el = el.offsetParent;
    }
    return tmp;
}

function ds_gettop(el) {
    var tmp = el.offsetTop;
    el = el.offsetParent
    while(el) {
        tmp += el.offsetTop;
        el = el.offsetParent;
    }
    return tmp;
}

//fonction permettant de positioner le calendrier
function positionCalendar(objetParent){
    //document.getElementById('calendrier').style.left = ds_getleft(objetParent) + "px";
    document.getElementById('calendrier').style.left = ds_getleft(objetParent) + "px";
    //document.getElementById('calendrier').style.top = ds_gettop(objetParent) + 20 + "px" ;
    document.getElementById('calendrier').style.top = ds_gettop(objetParent) + 20 + "px" ;
    // et on le rend visible
    document.getElementById('calendrier').style.visibility = "visible";
}

function initialiserCalendrier(objetClick){
        //on affecte la variable définissant sur quel input on a clické
        myObjectClick = objetClick;

        if(myObjectClick.disabled != true){
            //On vérifit que le champs n'est pas déja remplit, sinon on va se positionner sur la date du champs
            if(myObjectClick.value != ''){
                //On utilise la chaine de formatage
                var reg=new RegExp("/", "g");
                var dateDuChamps = myObjectClick.value;
                var tableau=dateDuChamps.split(reg);
                calendrier(    tableau[2] , tableau[1] - 1 , tableau[0]);
            }
            else{
                //on créer le calendrier
                calendrier(objetClick);

            }
            //puis on le positionne par rapport a l'objet sur lequel on a clické
            //positionCalendar(objetClick);
            positionCalendar(objetClick);
            masquerSelect();
        }

}

//Fonction permettant d'alimenter le champ
function alimenterChamps(daySelect){
        if(daySelect != ''){
            lastInput.value= formatInfZero(daySelect) + formatage + formatInfZero((current_month+1)) + formatage +current_year;
        }
        else{
            lastInput.value = '';
        }
        masquerCalendrier();
}
function masquerCalendrier(){
        document.getElementById('calendrier').style.visibility = "hidden";
        montrerSelect();
}

function formatInfZero(numberFormat){
        if(parseInt(numberFormat) < 10){
                numberFormat = "0"+numberFormat;
        }

        return numberFormat;
}
