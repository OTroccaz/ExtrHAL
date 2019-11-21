<?php
declare(strict_types=1);

if (php_sapi_name() != "cli") {
	chdir("../");
}

spl_autoload_register(function ($class_name) {
	$filename = str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
	//$filename = $_SERVER['DOCUMENT_ROOT'].'/ExtrHAL/lib/pChart2/' . $class_name . '.php';
	//if (!file_exists($filename)) {$filename = $_SERVER['DOCUMENT_ROOT'].'/ExtrHAL/lib/pChart2/pChart/' . $class_name . '.php';}
	include_once $filename;
});

?>