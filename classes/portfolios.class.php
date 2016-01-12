<?php 

class PortfoliosDetails {

	public $_portfolio_id;
	public $_category_id;
	public $_portfolio_title;
	public $_portfolio_brief;
	public $_portfolio_thumbnail;
	public $_portfolio_image;
	public $_portfolio_order;
	public $_portfolio_date_submited;
	public $_portfolio_date_update;

	public function __construct(){
	
	}
	
	/****************************************************/
	
	public static function Insert(PortfoliosDetails $p){
		
		return 0;
	}
	
	/****************************************************/
	
	public static function Update(PortfoliosDetails $p) {
		
		return 0;
	}
	
	/****************************************************/	

	public static function PortfolioGallery($category_id) {
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT portfolio_id,category_id,portfolio_title,portfolio_brief,portfolio_thumbnail,portfolio_image,portfolio_date_submited";
		$query .= " FROM ";
		$query .= "lab_portfolios";
		
		$conditions = array('category_id'=>$category_id);
		$order = array('portfolio_order'=>"ASC",'portfolio_title'=>"ASC");
		$limit = array();
		$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
		
		if(!empty($fun_array[0]))
		{
			return $fun_array;
		}
		
		return false;
	}
	
	/****************************************************/
	
	public static function TopOnePortfolioDetails($category_id){
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT portfolio_id";
		$query .= " FROM ";
		$query .= "lab_portfolios";
		
		$conditions = array('category_id'=>$category_id);
		$order = array('portfolio_order'=>"ASC",'portfolio_title'=>"ASC");
		$limit = array(1);
		$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
		
		if(!empty($fun_array[0]))
		{
			return $fun_array;
		}
		
		return false;
	}
	
	/****************************************************/
	
	public static function PortfolioDetails($portfolio_id) {
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT port.portfolio_id,port.category_id,cat.category_title,port.portfolio_title,port.portfolio_brief,port.portfolio_thumbnail,port.portfolio_image,port.portfolio_date_submited";
		$query .= " FROM ";
		$query .= "lab_portfolios as port";
		$query .= " INNER JOIN ";
		$query .= "lab_categories as cat";
		$query .= " ON ";
		$query .= "port.category_id = cat.category_id";
		
		$conditions = array('portfolio_id'=>$portfolio_id);
		$order = array();
		$limit = array(1);
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