<?php 

class BlocksDetails {
	
	public $_block_id;
	public $_page_id;
	public $_block_title;
	public $_block_has_title;
	public $_block_direction;
	public $_block_content;
	public $_block_order;
	
	public function __construct(){
	
	}
	
	public static function Insert(BlocksDetails $b){
		
		return 0;
	}
	
	/****************************************************/
	
	public static function Update(BlocksDetails $b) {
		
		return 0;
	}
	
	/****************************************************/
	
	public static function LeftBlocks($page_id) {
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT block_id,page_id,block_title,block_has_title,block_content";
		$query .= " FROM ";
		$query .= "lab_blocks";
		
		$conditions = array('block_direction'=>"LEFT",'page_id'=>$page_id);
		$order = array('block_order'=>"ASC");
		$limit = array();
		$fun_array = $dl->select($query,$conditions,$order,$limit) or die($dl->getError());
		
		if(!empty($fun_array[0]))
		{
			return $fun_array;
		}
		
		return false;
	}
	
	public static function RightBlocks($page_id) {
		global $conn;
		$dl = new DataLayer($conn->link);
		$dl->debug = false;
		
		$query = "SELECT block_id,page_id,block_title,block_has_title,block_content";
		$query .= " FROM ";
		$query .= "lab_blocks";
		
		$conditions = array('block_direction'=>"RIGHT",'page_id'=>$page_id);
		$order = array('block_order'=>"ASC");
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