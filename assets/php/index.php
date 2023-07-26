<?php
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('Asia/Kolkata');

include("config.php");

$f_split = explode("/", trim(str_replace("://", "", BASE_URL), "/"));

$url_str = explode("?", trim($_SERVER['REQUEST_URI'], "/"));

$url_segment = explode("/", $url_str[0]);

if (count($f_split) > 1)
    for ($d = 1; $d < count($f_split); $d++) {
        array_shift($url_segment);
    }
	
	$mm = end($url_segment);
	array_pop($url_segment);
	$cc = end($url_segment);
	
$controller = $cc;
$method = $mm;

// >>> first lever parameter
$parameter_1 = $url_segment;
unset($parameter_1[0]);
unset($parameter_1[1]);
$parameter_1 = array_values($parameter_1);
// <<< first lever parameter

// >>> second lever parameter
$parameter_2 = array();

if (isset($url_str[1])) {
    $spl_1 = explode("&", $url_str[1]);
    foreach ($spl_1 as $key => $val) {
        $spl_2 = explode("=", $val);
        $parameter_2[$spl_2[0]] = trim(str_replace("%20", " ", $spl_2[1]));
    }
}

$browser_title = ucwords(str_replace("_", " ", $controller));

$isAjas = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
define("ISAJAX", $isAjas);

include("controller/" . $controller . ".php");
$object = new $controller;

$object->$method($parameter_1, $parameter_2);
?>