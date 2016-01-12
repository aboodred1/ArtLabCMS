<?php 

function GetNewsFeatured(){
	global $config;
	
	$content = "";
	$thumbnail = "";
	$link = "";
	
	$td = NewsDetails::NewsFeatured();
	
	if($td) {
		
		for($i=0; $i<count($td)-1; $i++) {
		
			$link = url("index.php?node=8&news=" . $td[$i]["news_id"]);
		
			if(file_exists("userfiles/news/" . $td[$i]["news_thumbnail"]) && !empty($td[$i]["news_thumbnail"])) {
				$thumbnail = $td[$i]["news_thumbnail"];
			} else {
				$thumbnail = "default.jpg";
			}
			
			$content .= "\t<div class=\"news-featured\">\n";
			$content .= "\t\t<a href=\"$link\"><img src=\"userfiles/news/" . $thumbnail . "\" title=\"" . $td[$i]["news_title"] . "\" alt=\"" . $td[$i]["news_title"] . "\" /></a><br/>\n";
			$content .= "\t\t<div class=\"news-content\"><a href=\"$link\">" . $td[$i]["news_title"] . "</a></div>\n";
			$content .= "\t</div>\n";
		}
		
		return $content;
	}
	
	return false;
}
/*****************************************************************************/
function GetNewsList() {
	global $config;
	
	$content = "";
	$thumbnail = "";
	$link = "";
	
	$offset = $config["page"] * $config["page_by"];
	
	$td_num = NewsDetails::NewsListNumberRows();
	
	$td = NewsDetails::NewsList($offset,$config["page_by"]);
	
	$max_num = ceil($td_num[0]["num"] / $config["page_by"]);
	
	if($td) {
		
		for($i=0; $i<count($td)-1; $i++) {
			
			$link = url("index.php?node=8&news=" . $td[$i]["news_id"]);
			
			if(file_exists("userfiles/news/" . $td[$i]["news_thumbnail"]) && !empty($td[$i]["news_thumbnail"])) {
				$thumbnail = $td[$i]["news_thumbnail"];
			} else {
				$thumbnail = "default.jpg";
			}
			
			$content .= "\t<div class=\"news-list\">\n";
			$content .= "\t\t<div class=\"news-list-img\"><a href=\"$link\"><img src=\"userfiles/news/" . $thumbnail . "\" title=\"" . $td[$i]["news_title"] . "\" alt=\"" . $td[$i]["news_title"] . "\" /></a></div>\n";
			$content .= "\t\t<div class=\"news-list-content\">\n";
			$content .= "\t\t\t<h3 class=\"title\"><a href=\"$link\">" . $td[$i]["news_title"] . "</a></h3>\n";
			//$content .= "\t\t\t<p>" . $td[$i]["news_brief"] . "</p>\n";
			//$content .= "\t\t\t<div class=\"align-right\"><a href=\"" . url("index.php?node=8&news=" . $td[$i]["news_id"]) . "\">more...</a></div>";
			$content .= "\t\t</div>\n";
			
			$content .= "\t\t<div class=\"clr\"></div>\n";
			$content .= "\t</div>\n";
			
		}
		
		//paging will be here
		$content .= GetNewsListPages($max_num);
		
		
		return $content;
	}
	
	return false;
}
/*****************************************************************************/

function GetNewsListPages($max){
	global $config;
	
	$content = "";
	
	$content .= "<form id=\"frmPaging\" name=\"frmPaging\" method=\"post\">\n";
	
	$content .= "\t<select id=\"page\" name=\"page\" size=\"1\" class=\"select-form\" onchange=\"ChangePage('" . $config["path"] . "', this," . $config["is_rewrite"] . ");\">\n";
	
	for($i=0; $i<$max; $i++) {
		$selected = ($i == $config["page"])? "selected=\"selected\"":"";
		$content .= "\t\t<option value=\"" . $i . "\" ". $selected .">" . ($i+1) . "</option> \n";
	}
	
	$content .= "\t</select>\n";
	
	$content .= "<form>\n";
	
	return $content;
	
}
/*****************************************************************************/

function GetNewsTitle() {
	global $config;
	
	$content = "";
	
	$td = NewsDetails::NewsDetails($config["news"]);
	
	if($td) { 
		$content = $td[0]["news_title"];
	}
	
	return $content;
}

/*****************************************************************************/
function GetNewsDetails() {
	global $config;
	
	$content = "";
	
	$td = NewsDetails::NewsDetails($config["news"]);
	
	if($td) {
		
		$content .= "\t<h2 class=\"title\">" . $td[0]["news_title"] . "</h2>\n";
		
		$content .= "\t<div class=\"content\">" . $td[0]["news_description"] . "</div>\n";
		
		return $content;
	}
	
	return false;
}


?>