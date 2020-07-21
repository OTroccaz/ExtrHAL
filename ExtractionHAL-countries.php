<?php
//List of country codes
$countries = array(
"af" => "Afghanistan",
"za" => "Afrique du Sud",
"al" => "Albanie",
"dz" => "Algérie",
"de" => "Allemagne",
"ad" => "Andorre",
"ao" => "Angola",
"ai" => "Anguilla",
"aq" => "Antarctique",
"ag" => "Antigua-et-Barbuda",
"an" => "Antilles Néerlandaises",
"sa" => "Arabie Saoudite",
"ar" => "Argentine",
"am" => "Arménie",
"aw" => "Aruba",
"au" => "Australie",
"at" => "Autriche",
"az" => "Azerbaïdjan",
"bs" => "Bahamas",
"bh" => "Bahreïn",
"bd" => "Bangladesh",
"bb" => "Barbade",
"be" => "Belgique",
"bz" => "Belize",
"bm" => "Bermudes",
"bt" => "Bhoutan",
"bo" => "Bolivie",
"ba" => "Bosnie-Herzégovine",
"bw" => "Botswana",
"bv" => "Bouvet Island",
"bn" => "Brunei",
"br" => "Brésil",
"bg" => "Bulgarie",
"bf" => "Burkina Faso",
"bi" => "Burundi",
"by" => "Biélorussie",
"bj" => "Bénin",
"kh" => "Cambodge",
"cm" => "Cameroun",
"ca" => "Canada",
"cv" => "Cap Vert",
"cl" => "Chili",
"cn" => "Chine",
"cy" => "Chypre",
"va" => "Cité du Vatican",
"co" => "Colombie",
"km" => "Comores",
"cg" => "Congo, République",
"cd" => "République Démocratique du Congo",
"kp" => "Corée du Nord",
"kr" => "Corée du Sud",
"cr" => "Costa Rica",
"hr" => "Croatie",
"cu" => "Cuba",
"cw" => "Curaçao",
"ci" => "Côte d'Ivoire",
"dk" => "Danemark",
"dj" => "Djibouti",
"dm" => "Dominique",
"eg" => "Égypte",
"ae" => "Émirats Arabes Unis",
"ec" => "Équateur",
"er" => "Érythrée",
"es" => "Espagne",
"ee" => "Estonie",
"us" => "États-Unis",
"et" => "Éthiopie",
"fj" => "Fidji",
"fi" => "Finlande",
"fr" => "France",
"fx" => "France métropolitaine",
"ga" => "Gabon",
"gm" => "Gambie",
"ps" => "Gaza",
"gh" => "Ghana",
"gi" => "Gibraltar",
"gd" => "Grenade",
"gl" => "Groenland",
"gr" => "Grèce",
"gp" => "Guadeloupe",
"gu" => "Guam",
"gt" => "Guatemala",
"gn" => "Guinée",
"gw" => "Guinée Bissau",
"gq" => "Guinée Équatoriale",
"gy" => "Guyana",
"gf" => "Guyane",
"ge" => "Géorgie",
"gs" => "Géorgie du Sud et les îles Sandwich du Sud",
"ht" => "Haïti",
"hn" => "Honduras",
"hk" => "Hong Kong",
"hu" => "Hongrie",
"im" => "Île de Man",
"ky" => "Îles Caïman",
"cx" => "Îles Christmas",
"cc" => "Îles Cocos",
"ck" => "Îles Cook",
"fo" => "Îles Féroé",
"gg" => "Îles Guernesey",
"hm" => "Îles Heardet McDonald",
"fk" => "Îles Malouines",
"mp" => "Îles Mariannes du Nord",
"mh" => "Îles Marshall",
"mu" => "Îles Maurice",
"um" => "Îles mineures éloignées des États-Unis",
"nf" => "Îles Norfolk",
"sb" => "Îles Salomon",
"tc" => "Îles Turques et Caïque",
"vi" => "Îles Vierges des États-Unis",
"vg" => "Îles Vierges du Royaume-Uni",
"in" => "Inde",
"id" => "Indonésie",
"ir" => "Iran",
"iq" => "Iraq",
"ie" => "Irlande",
"is" => "Islande",
"il" => "Israël",
"it" => "Italie",
"jm" => "Jamaïque",
"jp" => "Japon",
"je" => "Jersey",
"jo" => "Jordanie",
"kz" => "Kazakhstan",
"ke" => "Kenya",
"kg" => "Kirghizistan",
"ki" => "Kiribati",
"xk" => "Kosovo",
"kw" => "Koweït",
"la" => "Laos",
"ls" => "Lesotho",
"lv" => "Lettonie",
"lb" => "Liban",
"ly" => "Libye",
"lr" => "Liberia",
"li" => "Liechtenstein",
"lt" => "Lituanie",
"lu" => "Luxembourg",
"mo" => "Macao",
"mk" => "Macédoine",
"mg" => "Madagascar",
"my" => "Malaisie",
"mw" => "Malawi",
"mv" => "Maldives",
"ml" => "Mali",
"mt" => "Malte",
"ma" => "Maroc",
"mq" => "Martinique",
"mr" => "Mauritanie",
"yt" => "Mayotte",
"mx" => "Mexique",
"fm" => "Micronésie",
"md" => "Moldavie",
"mc" => "Monaco",
"mn" => "Mongolie",
"ms" => "Montserrat",
"me" => "Monténégro",
"mz" => "Mozambique",
"mm" => "Birmanie",
"na" => "Namibie",
"nr" => "Nauru",
"ni" => "Nicaragua",
"ne" => "Niger",
"ng" => "Nigeria",
"nu" => "Niue",
"no" => "Norvège",
"nc" => "Nouvelle Calédonie",
"nz" => "Nouvelle Zélande",
"np" => "Népal",
"om" => "Oman",
"ug" => "Ouganda",
"uz" => "Ouzbékistan",
"pk" => "Pakistan",
"pw" => "Palau",
"pa" => "Panama",
"pg" => "Papouasie-Nouvelle-Guinée",
"py" => "Paraguay",
"nl" => "Pays-Bas",
"ph" => "Philippines",
"pn" => "Pitcairn",
"pl" => "Pologne",
"pf" => "Polynésie Française",
"pr" => "Porto Rico",
"pt" => "Portugal",
"pe" => "Pérou",
"qa" => "Qatar",
"ro" => "Roumanie",
"gb" => "Royaume-Uni",
"ru" => "Russie",
"rw" => "Rwanda",
"cf" => "République Centraficaine",
"do" => "République Dominicaine",
"cz" => "République Tchèque",
"re" => "Réunion",
"eh" => "Sahara Occidental",
"bl" => "Saint Barthelemy",
"sh" => "Saint Hélène",
"kn" => "Saint Kitts et Nevis",
"mf" => "Saint Martin",
"sx" => "Saint Martin",
"pm" => "Saint Pierre et Miquelon",
"vc" => "Saint Vincent et les Grenadines",
"lc" => "Sainte Lucie",
"sv" => "Salvador",
"as" => "Samoa Américaines",
"ws" => "Samoa Occidentales",
"sm" => "San Marin",
"st" => "Sao Tomé et Principe",
"rs" => "Serbie",
"sc" => "Seychelles",
"sl" => "Sierra Léone",
"sg" => "Singapour",
"sk" => "Slovaquie",
"si" => "Slovénie",
"so" => "Somalie",
"sd" => "Soudan",
"lk" => "Sri Lanka",
"ss" => "Sud Soudan",
"ch" => "Suisse",
"sr" => "Surinam",
"se" => "Suède",
"sj" => "Svalbard et Jan Mayen",
"sz" => "Swaziland",
"sy" => "Syrie",
"sn" => "Sénégal",
"tj" => "Tadjikistan",
"tw" => "Taïwan",
"tz" => "Tanzanie",
"td" => "Tchad",
"tf" => "Terres Australes et Antarctique Françaises",
"ps" => "Territoires Palestiniens occupés",
"th" => "Thaïlande",
"tl" => "Timor-Leste",
"tg" => "Togo",
"tk" => "Tokelau",
"to" => "Tonga",
"tt" => "Trinité et Tobago",
"tn" => "Tunisie",
"tm" => "Turkménistan",
"tr" => "Turquie",
"tv" => "Tuvalu",
"io" => "Territoire Britannique de l'Océan Indien",
"ua" => "Ukraine",
"uy" => "Uruguay",
"vu" => "Vanuatu",
"ve" => "Venezuela",
"vn" => "Vietnam",
"wf" => "Wallis et Futuna",
"ye" => "Yémen",
"zm" => "Zambie",
"zw" => "Zimbabwe",
"xx" => "inconnu",
"zz" => "inconnu",);
?>