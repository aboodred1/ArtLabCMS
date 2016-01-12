<?php 

class CategoriesDetails {
	
	public $_category_id;
	public $_category_title;
	
	public function __construct(){
	
	}
	
	/****************************************************/
	
	public static function Insert(CategoriesDetails $c){
		
		return 0;
	}
	
	/****************************************************/
	
	public static function Update(CategoriesDetails $c) {
		
		return 0;
	}
	
	/****************************************************/
	public static function TopOneCategory() {
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT category_id,category_title";
		$query .= " FROM ";
		$query .= "lab_categories";
		
		$conditions = array();
		$order = array('category_title'=>"ASC",'category_id'=>"ASC");
		$limit = array(1);
		$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
		
		if(!empty($fun_array[0]))
		{
			return $fun_array;
		}
		
		return false;
	}
	/****************************************************/
	
	public static function CategoryList() {
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT category_id,category_title";
		$query .= " FROM ";
		$query .= "lab_categories";
		
		$conditions = array();
		$order = array('category_title'=>"ASC",'category_id'=>"ASC");
		$limit = array();
		$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
		
		if(!empty($fun_array[0]))
		{
			return $fun_array;
		}
		
		return false;
	}
}

?>