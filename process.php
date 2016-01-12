<?php 
require_once("onload.php");

$nodeID = $_POST["nodeID"];

switch($nodeID) {
	case 4:
		
		$txtName = $_POST["txtName"];
		$txtEmail = $_POST["txtEmail"];
		$txtType = $_POST["txtType"];
		$txtCompany = $_POST["txtCompany"];
		$txtTitle = $_POST["txtTitle"];
		$txtSubject = $_POST["txtSubject"];
		$txtMessage = $_POST["txtMessage"];

		if(AddContacts()) {
			//header("Location: index.php?node=9"); 
			header("Location: " . url("index.php?node=9")); 
		} else {
			//header("Location: index.php?node=4"); 
			header("Location: " . url("index.php?node=4") . "#error"); 
		}
		
		break;
	default:
		header("Location: index.php"); 
		break;
}



require_once("unload.php");
?>