<?php 

class NewsDetails {

	public $_news_id;
	public $_news_title;
	public $_news_brief;
	public $_news_description;
	public $_news_thumbnail;
	public $_news_featured;
	public $_news_order;
	public $_news_date_submited;
	public $_news_date_updated;
	
	public function __construct(){
	
	}
	
	public static function Insert(NewsDetails $n){
		
		return 0;
	}
	
	/****************************************************/
	
	public static function Update(NewsDetails $n) {
		
		return 0;
	}
	
	/****************************************************/
	
	public static function NewsList($offset,$paging) {
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT news_id,news_title,news_brief,news_thumbnail,news_date_submited";
		$query .= " FROM ";
		$query .= "lab_news";
		
		$conditions = array();
		$order = array('news_order'=>"ASC",'news_date_submited'=>"DESC");
		//$limit = array($page=>$paging);
		$limit = "$offset,$paging";
		$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
		
		if(!empty($fun_array[0]))
		{
			return $fun_array;
		}
		
		return false;
	}
	
	/****************************************************/
	/*                 Related      */
	/****************************************************/
	
	public static function NewsListNumberRows(){
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT COUNT(news_id) as num";
		$query .= " FROM ";
		$query .= "lab_news";
		
		$conditions = array();
		$order = array('news_order'=>"ASC",'news_date_submited'=>"DESC");
		$limit = array();
		$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
		
		if(!empty($fun_array[0]))
		{
			return $fun_array;
		}
		
		return false;
	}
	
	/****************************************************/
	
	public static function NewsDetails($news_id) {
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT news_id,news_title,news_description,news_date_submited";
		$query .= " FROM ";
		$query .= "lab_news";
		
		$conditions = array('news_id'=>$news_id);
		$order = array();
		$limit = array();
		$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
		
		if(!empty($fun_array[0]))
		{
			return $fun_array;
		}
		
		return false;
	}
	
	/****************************************************/
	
	public static function NewsFeatured() {
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT news_id,news_title,news_brief,news_thumbnail,news_date_submited";
		$query .= " FROM ";
		$query .= "lab_news";
		
		$conditions = array('news_featured'=>"Y");
		$order = array('news_order'=>"ASC",'news_date_submited'=>"DESC");
		$limit = array('5');
		$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
		
		if(!empty($fun_array[0]))
		{
			return $fun_array;
		}
		
		return false;
	}
}


?>