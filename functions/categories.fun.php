<?php 
function GetTopOneCategory() {
	global $config;
	
	$td = CategoriesDetails::TopOneCategory();
	
	if($td) {
		return $td[0]["category_id"];
	}
	
	return false;
}

/*****************************************************************************/

function GetTitleCategoriesBlock(){
	global $config;
	
	$content = "";
	$link = "";
	
	
	$td = CategoriesDetails::CategoryList();
	
	if($td) {
		$content .= "\t<ul class=\"category-list\">\n";
		
		for($i=0; $i<count($td)-1; $i++) {
			
			$active = "";

			if($config["taxonomy"] == $td[$i]["category_id"]) {
				$active = "class=\"active\"";
			} elseif(($i == 0) && ($config["taxonomy"] == 0)) {
				$active = "class=\"active\"";
			}
			
			$content .= "\t\t<li><span><a $active href=\"" . url("index.php?node=2&taxonomy=" . $td[$i]["category_id"]) . "\" title=\"" . $td[$i]["category_title"] . "\">" . $td[$i]["category_title"] . "</a></span></li>\n";
		}
		
		$content .= "\t</ul>\n";
		
		return $content;
	}
	
	return false;
}

?>