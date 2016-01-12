<?php 

function AddContacts() {
	global $config,$txtName,$txtEmail,$txtType,$txtCompany,$txtTitle,$txtSubject,$txtMessage;
	
	$c = new ContactsDetails();
	$c->_contact_name = $txtName;
	$c->_contact_email = $txtEmail;
	$c->_contact_type = $txtType;
	$c->_contact_company = $txtCompany;
	$c->_contact_title = $txtTitle;
	$c->_contact_subject = $txtSubject;
	$c->_contact_message = nl2br($txtMessage); //eregi_replace(chr(13),"<br>",$txtMessage);
	$c->_contact_date_submited = date("Y-m-d");
	
	if(ValidateContacts()) {
		$td = ContactsDetails::Insert($c);
		
		//send email
		SendEmail();
		
		return $td;
	}
	
	return false;
}


function ValidateContacts() {
	global $config,$txtName,$txtEmail,$txtType,$txtCompany,$txtTitle,$txtSubject,$txtMessage;
	
	$is_valid = true;
	
	$arr_messages = array();
	
	if(empty($txtName)) {
		
		$arr_messages["error"]["empty_name"] = "Your Name is required ";
		
		$is_valid = false;
	}
	
	if(empty($txtEmail)) {
		
		$arr_messages["error"]["empty_mail"] = "Your Email Address is required";
		
		$is_valid = false;
		
	} else if(!eregi("^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$",$txtEmail)) {
		
		$arr_messages["error"]["invalid_mail"] = "Your Email Address is invalid";
		
		$is_valid = false;
	}
	/*
	if(empty($txtType)) {
		
		$arr_messages["error"]["empty_type"] = "Contact type is required";
		
		$is_valid = false;
	}
	*/
	if(empty($txtSubject)) {
		
		$arr_messages["error"]["empty_subject"] = "Contact subject is required";
		
		$is_valid = false;
	}
	
	if(empty($txtMessage)) {
		
		$arr_messages["error"]["empty_message"] = "Contact message is required";
		
		$is_valid = false;
	}
	
	if(count($arr_messages) > 0) {
		
		$_SESSION["error_message"] = $arr_messages["error"];
	}
	
	return $is_valid;
}

function ContactsErrorMessage() {
	global $config;
	
	$content = "";
	
	if(isset($_SESSION["error_message"])) {
		
		$arr_errors = $_SESSION["error_message"];

		$content .= "\t<ul>\n";
		
		foreach($arr_errors as $key=>$value) {

			$content .= "\t\t<li title=\"heloo\">";
			$content .= "<span>" . $value . "</span>\n";
			$content .= "</li>\n";
		}

		$content .= "\t</ul>\n";
		
		return $content;		
	}
	
	return false;
}

function SendEmail() {
	global $config,$txtName,$txtEmail,$txtType,$txtCompany,$txtTitle,$txtSubject,$txtMessage;
	
	$mail = new PHPMailer();
	

	$mail->From     = $txtEmail;
	$mail->FromName = $txtName;
	$mail->AddAddress($config["owner_email"], $config["owner_Name"]);
	// Fill in Username and Password for servers requiring authentication
	//$mail->Username = //$smtp_username;
	//$mail->Password = //$smtp_password;

	// SMTP server name
	//$mail->Host     = "localhost";
	//$mail->Mailer   = "mail";

	$mail->Subject = $txtSubject;
	$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
	$mail->MsgHTML(nl2br($txtMessage));

	if(!$mail->Send()) { 
		$results = 'Error message';
	} else {
		$results = 'Success message';
	}
	
	
	return $results;
}
?>