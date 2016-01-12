<?php 

$config["title"] = ""; //page title
$config["description"] = ""; //page description
$config["keywords"] = ""; //page keywords
$config["copyright"] = "Copyright Art Lab"; //page copyright
$config["author"] = "Abdullah Najem Radwan"; //page author
$config["email"] = "Abdullah Najem Radwan"; //page email
$config["node"] = (isset($_GET["node"]))? $_GET["node"] : 0; //page/node number
$config["news"] = (isset($_GET["news"]))? $_GET["news"] : 0; //news number ... for details
$config["page"] = (isset($_GET["page"]))? $_GET["page"] : 0; //paging number if there any limits
$config["page_by"] = 10;
$config["taxonomy"] = (isset($_GET["taxonomy"]))? $_GET["taxonomy"] : 0; //categorizing portfolio
$config["profile"] = (isset($_GET["profile"]))? $_GET["profile"] : 0; //portfolio id ... for details
$config["left"] = ""; //left navigation
$config["main"] = ""; //main content
$config["right"] = ""; //right navigation
$config["is_home"] = true; //check whether if it home page or not
$config["content"] = "";
$config["module"] = "";
$config["path"] = "/artlab/";
$config["is_rewrite"] = true; 
$config["owner_email"] = "info@artlabjo.com"; 
$config["owner_Name"] = "Rami J. Khalifeh"; 


?>