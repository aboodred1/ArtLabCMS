<?php 

class ContactsDetails {

	public $_contact_id;
	public $_contact_name;
	public $_contact_email;
	public $_contact_type;
	public $_contact_company;
	public $_contact_title;
	public $_contact_subject;
	public $_contact_message;
	public $_contact_date_submited;

	public function __construct(){
	
	}
	
	/****************************************************/
	
	public static function Insert(ContactsDetails $c){
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;

		$lab_contacts = array('contact_name'=>$c->_contact_name,
							'contact_email'=>$c->_contact_email,
							'contact_type'=>$c->_contact_type,
							'contact_company'=>$c->_contact_company,
							'contact_title'=>$c->_contact_title,
							'contact_subject'=>$c->_contact_subject,
							'contact_message'=>$c->_contact_message,
							'contact_date_submited'=>$c->_contact_date_submited
							);

		$dl->insert("lab_contacts",$lab_contacts) or die($dl->getError());
		
		$val_array = array("id"=>$dl->inserted(""));
			
		
		return $val_array;
	}
	
	/****************************************************/
	
	public static function Update(ContactsDetails $c) {
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		return 0;
	}
	
	/****************************************************/	
}


?>