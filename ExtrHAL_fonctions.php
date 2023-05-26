<?php
/*
 * ExtrHAL - Votre bilan en un clic ! - Your assessment in one click!
 *
 * Copyright (C) 2023 Olivier Troccaz (olivier.troccaz@cnrs.fr) and Laurent Jonchère (laurent.jonchere@univ-rennes.fr)
 * Released under the terms and conditions of the GNU General Public License (https://www.gnu.org/licenses/gpl-3.0.txt)
 *
 * Regroupement des fonctions définies - Grouping of defined functions
 */
 
function suppression($dossier, $age, $comp) {
  $repertoire = opendir($dossier);
    while(false !== ($fichier = readdir($repertoire)))
    {
      $chemin = $dossier."/".$fichier;
			//echo $fichier.'<br>';
      $age_fichier = time() - filemtime($chemin);
			if ($comp == "") {
				if($fichier != "." && $fichier != ".." && !is_dir($fichier) && $age_fichier > $age)
				{
				unlink($chemin);
				//echo $chemin." - ".date ("F d Y H:i:s.", filemtime($chemin))."<br>";
				}
			}else{
				if($fichier != "." && $fichier != ".." && !is_dir($fichier) && ($age_fichier > $age) && (strpos($fichier, $comp) !== false))
				{
				unlink($chemin);
				//echo $chemin." - ".date ("F d Y H:i:s.", filemtime($chemin))."<br>";
				}
			}
    }
  closedir($repertoire);
}

include("./Glob_normalize.php");

function utf8_fopen_read($fileName) {
    $fc = file_get_contents($fileName);
    $handle=fopen("php://memory", "rw");
    fwrite($handle, $fc);
    fseek($handle, 0);
    return $handle;
}

function cleanup_title($titre) {
  //remplacement des ;
	$titre = str_replace(";", "¡", $titre);
	//remplacement des expressions MathJax > problème pour la création des RTF
	$titre = str_replace(array('${', '}$'), '', $titre);
	$titre = str_replace(array('{\\rm ', '\\rm ', '}', '_{'), '', $titre);
	$titre = str_replace(array('{', '}'), array('[',']'), $titre);
	// présence de " et combien
  $nb = mb_substr_count ($titre, '"', 'UTF-8');
  if ($nb%2 == 0) {
    return $titre;  // nombre pair (ou 0) rien à faire
  }
  // on ajoute le " à la fin
  return $titre . '"';
}

function nettoy1($quoiAvt) {
  $quoiApr = str_replace(array(". : ",",, ",", , ","..","?.","?,","<br>.","--"," p. p.",", .",",  ","(dir. ."," - .., ",", , ", ", . "), array(" : ",", ",", ",".","?","?","<br>","-"," p.",",",", ","(dir.). ",", ",", ",". "), $quoiAvt);
  return($quoiApr);
}

function mb_ucwords($str) {
  $str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
  return ($str);
}

function prenomCompInit($prenom) {
  $prenom = str_replace("  ", " ",$prenom);
  if (strpos(trim($prenom),"-") !== false) {//Le prénom comporte un tiret
    $postiret = mb_strpos(trim($prenom),'-', 0, 'UTF-8');
    if ($postiret != 1) {
      $prenomg = trim(mb_substr($prenom,0,($postiret-1),'UTF-8'));
    }else{
      $prenomg = trim(mb_substr($prenom,0,1,'UTF-8'));
    }
    $prenomd = trim(mb_substr($prenom,($postiret+1),strlen($prenom),'UTF-8'));
    $autg = mb_substr($prenomg,0,1,'UTF-8');
    $autd = mb_substr($prenomd,0,1,'UTF-8');
    $prenom = mb_ucwords($autg).".-".mb_ucwords($autd).".";
  }else{
    if (strpos(trim($prenom)," ") !== false) {//plusieurs prénoms
      $tabprenom = explode(" ", trim($prenom));
      $p = 0;
      $prenom = "";
      while (isset($tabprenom[$p])) {
        if ($p == 0) {
          $prenom .= mb_ucwords(mb_substr($tabprenom[$p], 0, 1, 'UTF-8')).".";
        }else{
					if (substr_count($tabprenom[$p], ".") >= 2) {//Cas Kahn Cyril J.F.
						$prenom .= " ".mb_strtoupper($tabprenom[$p], 'UTF-8');
					}else{
						$prenom .= " ".mb_ucwords(mb_substr($tabprenom[$p], 0, 1, 'UTF-8')).".";
					}
        }
        $p++;
      }
    }else{
      $prenom = mb_ucwords(mb_substr($prenom, 0, 1, 'UTF-8')).".";
    }
  }
  return $prenom;
}

function prenomCompEntier($prenom) {
  $prenom = trim($prenom);
  if (strpos($prenom,"-") !== false) {//Le prénom comporte un tiret
    $postiret = strpos($prenom,"-");
    $autg = substr($prenom,0,$postiret);
    $autd = substr($prenom,($postiret+1),strlen($prenom));
    $prenom = mb_ucwords($autg)."-".mb_ucwords($autd);
  }else{
    $prenom = mb_ucwords($prenom);
  }
  return $prenom;
}

function nomCompEntier($nom) {
  $nom = trim(mb_strtolower($nom,'UTF-8'));
  if (strpos($nom,"-") !== false) {//Le nom comporte un tiret
    $postiret = strpos($nom,"-");
    $autg = substr($nom,0,$postiret);
    $autd = substr($nom,($postiret+1),strlen($nom));
    $nom = mb_ucwords($autg)."-".mb_ucwords($autd);
  }else{
    $nom = mb_ucwords($nom);
  }
  return $nom;
}

function mise_en_evidence($phrase, $string, $deb, $fin) {
  $non_letter_chars = '/[^\pL]/iu';
  $words = preg_split($non_letter_chars, $phrase);

  $search_words = array();
  foreach ($words as $word) {
    if (strlen($word) > 2 && !preg_match($non_letter_chars, $word)) {
      $search_words[] = $word;
    }
  }

  $search_words = array_unique($search_words);

  $patterns = array(
    /* à répéter pour chaque caractère accentué possible */
    '/(ae|æ)/iu' => '(ae|æ)',
    '/(oe|œ)/iu' => '(oe|œ)',
    '/[aàáâãäåăãąā]/iu' => '[aàáâãäåăãąā]',
		'/[bḃбБ]/iu' => '[bḃбБ]',
    '/[cçčćĉċцЦ]/iu' => '[cçčćĉċцЦ]',
		'/[dďḋđдД]/iu' => '[dďḋđдД]',
    '/[eèéêëĕěėęēэЭ]/iu' => '[eèéêëĕěėęēэЭ]',
		'/[fḟƒфФ]/iu' => '[fḟƒфФ]',
		'/[gğĝġģгГ]/iu' => '[gğĝġģгГ]',
		'/[hĥħ]/iu' => '[hĥħ]',
    '/[iìíîïĩįīiiиИ]/iu' => '[iìíîïĩįīiiиИ]',
		'/[jĵйЙ]/iu' => '[jĵйЙ]',
		'/[kķк]/iu' => '[kķк]',
		'/[lĺľļłлЛ]/iu' => '[lĺľļłлЛ]',
		'/[mṁм]/iu' => '[mṁм]',
    '/[nñńňņн]/iu' => '[nñńňņн]',
    '/[oòóôõöőøōơ]/iu' => '[oòóôõöőøōơ]',
		'/[pṗпП]/iu' => '[pṗпП]',
		'/[rŕřŗ]/iu' => '[rŕřŗ]',
    '/[sšśŝṡşș]/iu' => '[sšśŝṡşș]',
		'/[tťṫţțŧт]/iu' => '[tťṫţțŧт]',
    '/[uùúûüŭųūư]/iu' => '[uùúûüŭųūư]',
		'/[vв]/iu' => '[vв]',
    '/[wẃẁŵẅ]/iu' => '[wẃẁŵẅ]',
		'/[yýÿỳŷ]/iu' => '[yýÿỳŷ]',
    '/[zžźżзЗ]/iu' => '[zžźżзЗ]',
  );

  foreach ($search_words as $word) {
    $search = preg_quote($word);
    $search = preg_replace(array_keys($patterns), $patterns, $search);
    return preg_replace('/\b' . $search . '(e?s)?\b/iu', $deb.'$0'.$fin, $string);
  }
}

//Suppresion des accents
function wd_remove_accents($str, $charset='utf-8') {
	$str = htmlentities($str, ENT_NOQUOTES, $charset);
	$str = preg_replace('#&([A-za-z])(?:acute|cedil|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
	$str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
	return preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
}

function mpcg($sect, $groupe, $choix_cg1, $choix_cg2, $choix_cg3, $choix_cg4, $choix_cg5, $choix_cg6, $choix_cg7, $sign) {//fonction pour ordonner les groupes et attribuer les couleurs au RTF
	$tabgp = explode("~|~", $groupe);
	//var_dump($tabgp);
	$font = new PHPRtfLite_Font(12, 'Corbel', '#000000', '#FFFFFF');
	$fontgp1 = new PHPRtfLite_Font(12, 'Corbel', $choix_cg1, '#FFFFFF');
	$fontgp2 = new PHPRtfLite_Font(12, 'Corbel', $choix_cg2, '#FFFFFF');
	$fontgp3 = new PHPRtfLite_Font(12, 'Corbel', $choix_cg3, '#FFFFFF');
	$fontgp4 = new PHPRtfLite_Font(12, 'Corbel', $choix_cg4, '#FFFFFF');
	$fontgp5 = new PHPRtfLite_Font(12, 'Corbel', $choix_cg5, '#FFFFFF');
	$fontgp6 = new PHPRtfLite_Font(12, 'Corbel', $choix_cg6, '#FFFFFF');
	$fontgp7 = new PHPRtfLite_Font(12, 'Corbel', $choix_cg7, '#FFFFFF');
	if (isset($tabgp[3])) {$sect->writeText($tabgp[3], $fontgp1);}//1er groupe
	if (isset($tabgp[4])) {$sect->writeText($tabgp[4], $font);}//1er séparateur
	if (isset($tabgp[5])) {$sect->writeText($tabgp[5], $fontgp2);}//2ème groupe
	if (isset($tabgp[6])) {$sect->writeText($tabgp[6], $font);}//2ème séparateur
	if (isset($tabgp[7])) {$sect->writeText($tabgp[7], $fontgp3);}//3ème groupe
	if (isset($tabgp[8])) {$sect->writeText($tabgp[8], $font);}//3ème séparateur
	if (isset($tabgp[9])) {$sect->writeText($tabgp[9], $fontgp4);}//4ème groupe
	if (isset($tabgp[10])) {$sect->writeText($tabgp[10], $font);}//4ème séparateur
	if (isset($tabgp[11])) {$sect->writeText($tabgp[11], $fontgp5);}//5ème groupe
	if (isset($tabgp[12])) {$sect->writeText($tabgp[12], $font);}//5ème séparateur
	if (isset($tabgp[13])) {$sect->writeText($tabgp[13], $fontgp6);}//6ème groupe
	if (isset($tabgp[14])) {$sect->writeText($tabgp[14], $font);}//6ème séparateur
	if (isset($tabgp[15])) {$sect->writeText($tabgp[15], $fontgp7);}//7ème groupe
	if (isset($tabgp[16])) {$sect->writeText($tabgp[16], $font);}//7ème séparateur
	if (isset($tabgp[17])) {$sect->writeText($tabgp[17], $font);}//suite
}
function toAppear($string){
	$toAppear=0;
	if (strtolower($string)=="accepted" or strtolower($string)=="accepté" or strtolower($string)=="to appear" or strtolower($string)=="accepted manuscript"){
		$toAppear=1;
	}
	return $toAppear;
}

?>