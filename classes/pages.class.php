<?php 

class PagesDetails {

	public $_page_id;
	public $_control_id;
	public $_page_name;
	public $_page_title;
	public $_page_description;
	public $_page_meta_keyword;
	public $_page_meta_description;
	public $_page_order;
	public $_page_status;
	public $_page_date_submited;
	public $_page_date_updated;

	public function __construct(){
	
	}

	public static function Insert(PagesDetails $p){
		
		return 0;
	}
	
	/****************************************************/
	
	public static function Update(PagesDetails $p) {
		
		return 0;
	}
	
	/****************************************************/
	
	public static function GetAllTitlePages()
	{
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT page.page_id,page.page_name,page.page_title";
		$query .= " FROM ";
		$query .= "lab_pages as page";
		
		$conditions = array('page.page_status'=>"Y");
		$order = array('page.page_order'=>"ASC",'page.page_title'=>"ASC");
		$limit = array();
		$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
		
		if(!empty($fun_array[0]))
		{
			return $fun_array;
		}
		
		return false;
	}
	
	/****************************************************/
	
	public static function GetSelectedPage($page_id) {
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT page.page_id,
						page.control_id, 
						page.page_title,
						page.page_description, 
						page.page_meta_keyword,
						page.page_meta_description,
						control.control_file";
		$query .= " FROM ";
		$query .= "lab_pages as page";
		$query .= " LEFT OUTER JOIN ";
		$query .= "lab_controls as control";
		$query .= " ON ";
		$query .= "page.control_id = control.control_id";
		
		$conditions = array('page.page_id'=>$page_id);
		$order = array();
		$limit = "0,1";
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