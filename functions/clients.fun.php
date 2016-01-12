<?php

function GetClientsList() {
	global $config;
	
	$content = "";
	$thumbnail = "";
	$image = "";
	
	$td = ClientsDetails::ClientsList();
	
	if($td) {
		
		$content .= "\t<ul>\n";
		
		for($i=0; $i<count($td)-1; $i++) {
			
			if(file_exists("userfiles/client/" . $td[$i]["client_thumbnail"]) && !empty($td[$i]["client_thumbnail"])) {
				$thumbnail = $td[$i]["client_thumbnail"];
			} else {
				$thumbnail = "default_thumb.gif";
			}
			
			if(file_exists("userfiles/client/" . $td[$i]["client_image"]) && !empty($td[$i]["client_image"])) {
				$image = $td[$i]["client_image"];
			} else {
				$image = "default.gif";
			}
			
			$class_last = "";
			
			if((($i + 1) % 5 == 0)) {
				$class_last = "class=\"last\"";
			}
			
			//$content .= "\t\t<li $class_last><a href=\"userfiles/client/" . $image . "\" title=\"" . $td[$i]["client_title"] . "\" class=\"lightbox\" ><img src=\"userfiles/client/" . $thumbnail . "\" alt=\"" . $td[$i]["client_brief"] . "\" title=\"" . $td[$i]["client_title"] . "\" /></a></li>\n";
			//$content .= "\t\t<li $class_last><img src=\"userfiles/client/" . $thumbnail . "\" alt=\"" . $td[$i]["client_brief"] . "\" title=\"" . $td[$i]["client_title"] . "\" /></li>\n";
			$content .= "\t\t<li $class_last><a href=\"userfiles/client/" . $image . "\" title=\"" . $td[$i]["client_title"] . "\" class=\"lightbox\" ><img src=\"userfiles/client/" . $thumbnail . "\" alt=\"" . $td[$i]["client_brief"] . "\" title=\"" . $td[$i]["client_title"] . "\" width=\"153px\" height=\"100px\" /></a></li>\n";
		}
		
		$content .= "\t</ul>\n";
		
		return $content;
	}
	
	return false;
}

/*****************************************************************************/

function GetClientsFeaturedBlock() {	
	global $config;
	
	$content = "";
	$thumbnail = "";
	
	$td = ClientsDetails::ClientsFeatured();
	
	if($td) {
		
		for($i=0; $i<count($td)-1; $i++) {
			
			if(file_exists("userfiles/client/" . $td[$i]["client_thumbnail"]) && !empty($td[$i]["client_thumbnail"])) {
				$thumbnail = $td[$i]["client_thumbnail"];
			} else {
				$thumbnail = "default_thumb.gif";
			}
			
			$content .= "\t<div class=\"clients-featured\">\n";
			$content .= "\t\t<img src=\"userfiles/client/" . $thumbnail . "\" title=\"" . $td[$i]["client_title"] . "\" alt=\"" . $td[$i]["client_brief"] . "\" /><br/>\n";
			$content .= "\t</div>\n";
			
		}
		
		return $content;
	}
	
	return false;
}

/*****************************************************************************/

function GetClientsFeaturedSlideShow() {
	global $config;
	
	$content = "";
	$thumbnail = "";
	
	$td = ClientsDetails::ClientsFeatured();
	
	if($td) {
		
		$content .= "\t<script type=\"text/javascript\">";	

		$content .= "\t$(function() {\n";
		
		$content .= "\t$('div.clients-featured').crossSlide({ sleep: 2, fade: 1}, [\n";
			
		for($i=0; $i<count($td)-1; $i++) {
			
			if(file_exists("userfiles/client/" . $td[$i]["client_thumbnail"]) && !empty($td[$i]["client_thumbnail"])) {
				$thumbnail = $td[$i]["client_thumbnail"];
			} else {
				$thumbnail = "default_thumb.gif";
			}
			
			$content .= "\t\t{ src: '" . $config["path"] . "userfiles/client/" . $thumbnail . "',dir: 'up' }";
			
			if($i != count($td)-2) {
				$content .= ",\n";
			}
		}
			
		$content .= "\t\n]);\n";

		$content .= "\t});\n";
		
		$content .= "\t</script>";	

		$content .= "\t<div class=\"clients-featured\">\n";

		for($i=0; $i<count($td)-1; $i++) {
			
			if(file_exists("userfiles/client/" . $td[$i]["client_thumbnail"]) && !empty($td[$i]["client_thumbnail"])) {
				$thumbnail = $td[$i]["client_thumbnail"];
			} else {
				$thumbnail = "default_thumb.gif";
			}
			
			$content .= "\t\t<img src=\"" . $config["path"] . "userfiles/client/" . $thumbnail . "\" title=\"" . $td[$i]["client_title"] . "\" alt=\"" . $td[$i]["client_brief"] . "\" />\n";
		}
		
		$content .= "\t</div>\n";
		
		return $content;
	}
	
	return false;
}

/*****************************************************************************/

function GetClientsFeaturedMarquee() {
	global $config;
	
	$content = "";
	$thumbnail = "";
	
	$td = ClientsDetails::ClientsFeatured();
	
	if($td) {

		$content .= "\t<div class=\"clients-featured\">\n";
		$content .= "\t<marquee id=\"marquee1\" behavior=\"scroll\" OnMouseOver=\"this.stop();\" OnMouseOut=\"this.start();\">\n";

		for($i=0; $i<count($td)-1; $i++) {
			
			if(file_exists("userfiles/client/" . $td[$i]["client_thumbnail"]) && !empty($td[$i]["client_thumbnail"])) {
				$thumbnail = $td[$i]["client_thumbnail"];
			} else {
				$thumbnail = "default_thumb.gif";
			}
			
			$content .= "\t\t<a href=\"" . url("index.php?node=3") . "\"><img src=\"" . $config["path"] . "userfiles/client/" . $thumbnail . "\" title=\"" . $td[$i]["client_title"] . "\" alt=\"" . $td[$i]["client_brief"] . "\" width=\"155\" height=\"100\" /></a>\n";
		}

		$content .= "\t</marquee>\n";
		$content .= "\t</div>\n";
		
		return $content;
	}
	
	return false;
}

?>