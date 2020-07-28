<?php
ob_start();
session_start();

$dbconsel = mysqli_connect("localhost","root","root","d-translator");

// header("Access-Control-Allow-Origin: *");

    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, PUT,  POST, DELETE, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

// Charasary keshay Nwseen (?????????)
$dbconsel->query("SET NAMES 'utf8'");
$dbconsel->query("SET CHARACTER SET 'utf8'");
ini_set('default_charset','UTF-9');

if(!$dbconsel){
    exit("Error in conection");
    echo mysqli_error_connect($dbconsel);
}

function hack($variable){
	global $dbconsel;
	$variable = mysqli_real_escape_string($dbconsel,htmlspecialchars($variable, ENT_QUOTES, 'UTF-8'));
	return $variable;
}

function refresh($page,$sec){
	echo "
		<meta http-equiv='refresh'; content='".$sec."'; url='".$page."'/>
	";
}
?>

