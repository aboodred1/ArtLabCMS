<?php 

function GetLeftBlocks() {
	global $config;
	
	$content = "";
	$no_title = "";
	
	$td = BlocksDetails::LeftBlocks($config["node"]);
	
	if($td) {
		
		for($i=0; $i<count($td)-1; $i++) {
		
			$content .= "<div id=\"block-block-". $td[$i]["block_id"] ."\" class=\"block block-left block-clear\">\n";
			
			$content .= "\t<div class=\"block-inner\">\n";
			
			if($td[$i]["block_has_title"] == "Y") {
				$no_title = "";
				$content .= "\t\t<h3 class=\"title\">". $td[$i]["block_title"] ."</h3>\n";
			} else { 
				$no_title = "-no-title";
			}
			
			$content .= "\t\t<div class=\"content$no_title\">\n";
			
			$content .= "\t\t\t" . GetDynamicContent($td[$i]["block_content"]) . "\n";
			
			$content .= "\t\t</div>\n";
			
			$content .= "\t\t<div class=\"block-bottom$no_title\"></div>\n";
			
			$content .= "\t</div>\n";
			
			$content .= "</div>\n";
		
		}
		
		return $content;
	}
	
	return false;
}

function GetRightBlocks() {
	global $config;
	
	$content = "";
	$no_title = "";
	
	$td = BlocksDetails::RightBlocks($config["node"]);
	
	if($td) {
		
		for($i=0; $i<count($td)-1; $i++) {
		
			$content .= "<div id=\"block-block-". $td[$i]["block_id"] ."\" class=\"block block-right block-clear\">\n";
			
			$content .= "\t<div class=\"block-inner\">\n";
			
			if($td[$i]["block_has_title"] == "Y") {
				$no_title = "";
				$content .= "\t\t<h3 class=\"title\">". $td[$i]["block_title"] ."</h3>\n";
			} else { 
				$no_title = "-no-title";
			}
			
			$content .= "\t\t<div class=\"content$no_title\">\n";
			
			$content .= "\t\t\t" . GetDynamicContent($td[$i]["block_content"]) . "\n";
			
			$content .= "\t\t</div>\n";
			
			$content .= "\t\t<div class=\"block-bottom$no_title\"></div>\n";
			
			$content .= "\t</div>\n";
			
			$content .= "</div>\n";
		
		}
		
		return $content;
	}
	
	return false;
}
	
function GetDynamicContent($block_content) {
	
	$content = "";
	$expression = "";
	
	if(strpos($block_content,"!mainmenu") !== false) {
		
		$content .= str_replace("!mainmenu", GetLeftMenu(), $block_content);
		
	} elseif(strpos($block_content,"!services") !== false) {
		
		$content .= str_replace("!services", GetTitleServicesBlock(), $block_content);
		
	} elseif(strpos($block_content,"!portfolio") !== false) {
		
		$content .= str_replace("!portfolio", GetTitleCategoriesBlock(), $block_content);
		
	} elseif(strpos($block_content,"!featurednews") !== false) {
		
		$content .= str_replace("!featurednews", GetNewsFeatured(), $block_content);
		
	} elseif(strpos($block_content,"!featuredclients") !== false) {
		
		//$content .= str_replace("!featuredclients", GetClientsFeaturedBlock(), $block_content);
		//$content .= str_replace("!featuredclients", GetClientsFeaturedSlideShow(), $block_content);
		$content .= str_replace("!featuredclients", GetClientsFeaturedMarquee(), $block_content);

	} else {
	
		return $block_content;
	
	}

	return $content;
}



?>