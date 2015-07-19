<?php
$start = microtime();
session_start();

require_once "/config.php";
require_once "/init.php";

//ini_set('display_errors', true);
$registry = new \Registry();

$db = new \db\MySqli();
$registry->set('db', $db);

// $test = $db->query("INSERT INTO kids (first_name,last_name,age,birthday,gender)
//   VALUES ('windows', 'sucks', '24', '1993-03-15', 'male')");
// echo "<hr><pre>";
// var_dump($test);
// echo "<hr></pre>";
$server = new \Server();
$registry->set('server', $server);

// $need = $registry->get('server');
// echo "<pre>";print_r($need); echo "</pre>";

$error = new \Error($registry);
$registry->set('error', $error);

// $loader = new \Loader($registry);
// $registry->set('loader', $load);

error_reporting(E_ALL);
set_error_handler(array($error, 'handleError'));

//echo "<pre>"; print_r($registry); echo "</pre>";

// $need = $registry->get('error');
//  echo "<pre>";print_r($need); echo "</pre>";

$app = new \Router($registry);
// $stop = microtime();
// echo "loaded Herrera-Lite in : <b>".($stop-$start)."</b> seconds";
// /trigger_error("want", E_USER_ERROR);

// echo "<pre>";
// print_r($registry);
