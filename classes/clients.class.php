<?php 

class ClientsDetails {

	public $_client_id;
	public $_client_title;
	public $_client_brief;
	public $_client_thumbnail;
	public $_client_image;
	public $_client_featured;
	public $_client_order;
	public $_client_date_submited;
	public $_client_date_update;

	public function __construct(){
	
	}
	
	public static function Insert(ClientsDetails $c){
		
		return 0;
	}
	
	/****************************************************/
	
	public static function Update(ClientsDetails $c) {
		
		return 0;
	}
	
	/****************************************************/
	
	public static function ClientsList() {
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT client_id,client_title,client_brief,client_thumbnail,client_image,client_date_submited";
		$query .= " FROM ";
		$query .= "lab_clients";
		
		$conditions = array();
		$order = array('client_order'=>"ASC",'client_title'=>"ASC",'client_date_submited'=>"DESC");
		$limit = array();
		$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
		
		if(!empty($fun_array[0]))
		{
			return $fun_array;
		}
		
		return false;
	}
	
	/****************************************************/
	
	public static function ClientsFeatured() {
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT client_id,client_title,client_brief,client_thumbnail,client_date_submited";
		$query .= " FROM ";
		$query .= "lab_clients";
		
		$conditions = array('client_featured'=>"Y");
		$order = array('client_order'=>"ASC",'client_title'=>"ASC",'client_date_submited'=>"DESC");
		$limit = "5";
		$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
		
		if(!empty($fun_array[0]))
		{
			return $fun_array;
		}
		
		return false;
	}
}

?>