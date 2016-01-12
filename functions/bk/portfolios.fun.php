<?php 

function GetPortfolioGallery(){
	global $config;
	
	$category_id = 0;
	$content = "";
	$content_header = "";
	$content_footer = "";
	$thumbnail = "";
	
	if($config["taxonomy"] > 0) {
		$category_id = $config["taxonomy"];
	} else {
		$category_id = GetTopOneCategory();
	}
	
	$td = PortfoliosDetails::PortfolioGallery($category_id);
	
	if($td) {
		
		$content .= "";

		for($i=0; $i<(count($td)-1); $i+=4) {

			$content .= "\t<div style=\"float: left; position: relative;\" class=\"panel\" id=\"slide-" . $td[$i]["portfolio_id"] . "\">\n";
			$content .= "\t\t<ul class=\"portfolio-thumbnail\">\n";

			for($j=$i; $j<$i+4; $j++){

				if(file_exists("userfiles/portfolio/" . $td[$j]["portfolio_thumbnail"]) && !empty($td[$j]["portfolio_thumbnail"])) {
					$thumbnail = $td[$j]["portfolio_thumbnail"];
				} else {
					$thumbnail = "default.jpg";
				}
				
				$content .= "\t\t\t<li><a href=\"" . url("index.php?node=2&taxonomy=". $td[$j]["category_id"] ."&profile=" . $td[$j]["portfolio_id"] . "") . "\" title=\"" . $td[$j]["portfolio_title"] . "\"><img src=\"" . $config["path"] . "userfiles/portfolio/" . $thumbnail . "\" title=\"" . $td[$j]["portfolio_title"] . "\" alt=\"" . $td[$j]["portfolio_title"] . "\" /></a></li>\n";
				
				if($j == (count($td)-2)) { //-2 because j index starts from 0
					break;
				}
			}
			
			$content .= "\t\t</ul>\n";
			$content .= "\t\t<div class=\"clr\"/></div>";
			$content .= "\t</div>\n";
		}

		
		return $content;
	}
	
	return false;
}

/*****************************************************************************/

function GetTopOnePortfolioDetails() {
	global $config;
	
	$category_id = 0;
	
	if($config["taxonomy"] > 0) {
		$category_id = $config["taxonomy"];
	} else {
		$category_id = GetTopOneCategory();
	}
	
	$td = PortfoliosDetails::TopOnePortfolioDetails($category_id);
	
	if($td) {
		return $td[0]["portfolio_id"];
	}
	
	return false;
}

/*****************************************************************************/

function GetPortfolioDetails() {
	global $config;
	
	$portfolio_id = 0;
	$content = "";
	$image = "";
	
	if($config["profile"] > 0) {
		$portfolio_id = $config["profile"];
	} else {
		$portfolio_id = GetTopOnePortfolioDetails();
	}
	
	$td = PortfoliosDetails::PortfolioDetails($portfolio_id);
	
	if($td) {
	
		if(file_exists("userfiles/portfolio/" . $td[0]["portfolio_image"]) && !empty($td[0]["portfolio_image"])) {
			$image = $td[0]["portfolio_image"];
		} else {
			$image = "default.jpg";
		}
	
		$content .= "\t<div id=\"portfolio-profile\">\n";
		$content .= "\t\t<h3 class=\"title\">" . $td[0]["category_title"] . "</h3>\n";
		$content .= "\t\t<div id=\"portfolio-image\">\n";
		$content .= "\t\t\t<img src=\"". $config["path"] ."userfiles/portfolio/" . $image . "\" alt=\"" . $td[0]["portfolio_brief"] . "\" title=\"" . $td[0]["portfolio_title"] . "\" />\n";
		$content .= "\t\t</div>\n";
		$content .= "\t\t<div id=\"portfolio-brief\">\n";
		$content .= "\t\t\t<h3 class=\"title\">" . $td[0]["portfolio_title"] . "</h3>\n";
		$content .= "\t\t\t<div class=\"content\">" . $td[0]["portfolio_brief"] . "</div>\n";
		$content .= "\t\t</div>\n";
		$content .= "\t\t<div class=\"clr\"/></div>";
		$content .= "\t</div>";
		
		
		return $content;
	}
	
	return false;
}

?>