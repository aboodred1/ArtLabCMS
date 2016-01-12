<?php 
ob_start();
session_start();
//error_reporting(E_ALL);
error_reporting(0);
ob_start("ob_gzhandler");  

header('Expires: ' . gmdate('D, d M Y H:i:s',time() * 10) . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');


require_once("config.php");

/****************************************************************/
//Classes
/****************************************************************/
require_once("classes/datalayer.class.php");
require_once("classes/pages.class.php");
require_once("classes/blocks.class.php");
require_once("classes/controls.class.php");
require_once("classes/news.class.php");
require_once("classes/contacts.class.php");
require_once("classes/clients.class.php");
require_once("classes/services.class.php");
require_once("classes/portfolios.class.php");
require_once("classes/categories.class.php");
require_once("classes/phpmailer.class.php");

$conn = new DBConnection();

$mysql_hostname = DBVariables::$mysql_hostname;
$mysql_username = DBVariables::$mysql_username;
$mysql_password = DBVariables::$mysql_password;
$mysql_database = DBVariables::$mysql_database;

$conn->connect($mysql_hostname,$mysql_username,$mysql_password,$mysql_database);
$conn->debug = true;

/****************************************************************/
//Functions
/****************************************************************/

require_once("functions/pages.fun.php");
require_once("functions/blocks.fun.php");
require_once("functions/news.fun.php");
require_once("functions/clients.fun.php");
require_once("functions/categories.fun.php");
require_once("functions/portfolios.fun.php");
require_once("functions/services.fun.php");
require_once("functions/contacts.fun.php");


/****************************************************************/

GetCurrentNodeInformation();

if($config["news"] > 0) {
	$config["title"] = GetNewsTitle() . " | " . $config["title"];
}

/****************************************************************/

if($config["node"] > 0){
	$config["is_home"] = false;
}



/****************************************************************/
$mtime = microtime(); 

$mtime = explode(' ', $mtime); 

$mtime = $mtime[1] + $mtime[0]; 

$starttime = $mtime; 
/****************************************************************/
?>