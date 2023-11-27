<?php 
/* configuration*/
ini_set('display_error','on');
error_reporting(E_ALL);

//echo '<pre>'; print_r(($_SERVER)); exit;
$root = $_SERVER['DOCUMENT_ROOT'];
$host = $_SERVER['HTTP_HOST'];



define('HOST','http://'.$host.'/application/mafia-Co/');
define('ROOT',$root.'/application/mafia-Co/');

define('CONTROLLERS',ROOT.'controllers/');
define('MODELS',ROOT.'models/');
define('VIEWS',ROOT.'views/');

define('ASSETS',HOST.'assets/');


//echo HOST; exit ;
//echo ROOT; exit ;
//echo CONTROLLERS; exit ;






?>