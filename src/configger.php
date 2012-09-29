#!/usr/bin/php
<?php

require_once(__DIR__."/Mustache.php");
function logIt($msg,$newLine=true){
	if (is_null($newLine)){
		echo $msg;
	}
	else {
	echo date("Y-m-d H:i:s") . "==== " . $msg . " ==========";
	if ($newLine){
	echo "\n";
	}
	}
}

$appcfg = $argv[1];
if (file_exists($appcfg)){
	$appcfg = json_decode(file_get_contents($appcfg));
}
else {
	$appcfg = json_decode('{"MONGO_HOST" : "127.0.0.1:27017", "MONGO_DB": "tango", "APP_NAME":"tango"}');
}
logit("Loaded Appconfig for APP_NAME: " . $appcfg->APP_NAME);
$templates = array();
foreach(glob(__DIR__."/config/*.php") as $file){
	$templates[basename($file)] = file_get_contents($file);
}
logit("Loaded Templates : " . implode(",", array_keys($templates)));
$mustache = new Mustache();
$out = array();
foreach($templates as $name => $content){
	$out[$name] = $mustache->render($content, $appcfg);
}
logIt("Rendered Configs with AppConfig");

$basePath = realpath(__DIR__."/../". $appcfg->APP_NAME . "/protected");
$cfgsPath = $basePath . "/config";
if(!file_exists($cfgsPath)){
	mkdir($cfgsPath, 0755, true);
}

foreach($out as $name => $content){
	$fullPath = $cfgsPath."/".$name;
	logIt("Writing Config to: " . $fullPath);
	file_put_contents($fullPath, $content);
}
logIt("Done!");


