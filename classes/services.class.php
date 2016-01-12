<?php 

class ServicesDetails {
	
	public $_service_id;
	public $_service_parent_id;
	public $_service_title;
	public $_service_description;
	public $_service_order;
	public $_service_date_submited;
	public $_service_date_updated;
	
	public function __construct(){
	
	}
	
	public static function Insert(ServicesDetails $s){
		
		return 0;
	}
	
	/****************************************************/
	
	public static function Update(ServicesDetails $s) {
		
		return 0;
	}
	
	/****************************************************/
	
	public static function ParentServicesList() {
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT service_id,service_title,service_description,service_date_submited";
		$query .= " FROM ";
		$query .= "lab_services";
		
		$conditions = "service_parent_id is null";
		$order = array('service_order'=>"ASC",'service_title'=>"ASC",'service_date_submited'=>"DESC");
		$limit = array();
		$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
		
		if(!empty($fun_array[0]))
		{
			return $fun_array;
		}
		
		return false;
	}
	
	/****************************************************/
	
	public static function ChildServicesList($service_parent_id) {
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT service_id,service_parent_id,service_title,service_description,service_date_submited";
		$query .= " FROM ";
		$query .= "lab_services";
		
		$conditions = array('service_parent_id'=>$service_parent_id);
		$order = array('service_order'=>"ASC",'service_title'=>"ASC",'service_date_submited'=>"DESC");
		$limit = array();
		$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
		
		if(!empty($fun_array[0]))
		{
			return $fun_array;
		}
		
		return false;
	}
	
	/****************************************************/
	
}

?>