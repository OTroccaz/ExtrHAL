<?php 
$chem = realpath('chemin.php');
$chempass = str_replace (array('aide','chemin.php'), array('pvt','.htpasswd'), $chem);
echo $chempass;
?>