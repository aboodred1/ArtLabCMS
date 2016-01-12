<?php

function GetTitleServicesBlock() {
	global $config;
	
	$content = "";
	
	$td = ServicesDetails::ParentServicesList();
	
	if($td) {
		
		$content .= "\t<ul class=\"services-parent\">\n";
		
		for($i=0; $i<count($td)-1; $i++) {
			
			$content .= "\t\t<li>";
			$content .= "<span><a href=\"#". ServiceTitleHashing($td[$i]["service_title"]) ."\">" . $td[$i]["service_title"] . "</a></span>";
			
			$td2 = ServicesDetails::ChildServicesList($td[$i]["service_id"]);
			
			if($td2) {
				
				$content .= "\t\t\t<ul class=\"services-child\">\n";
				
				for($j=0; $j<count($td2)-1; $j++) {
				
					$content .= "\t\t\t\t<li>";
				
					$content .= "<span><a href=\"#". ServiceTitleHashing($td2[$j]["service_title"]) ."\">" . $td2[$j]["service_title"] . "</a></span>";
					
					$content .= "\t\t\t\t</li>\n";
				}
				
				$content .= "\t\t\t</ul>\n";
			}
			
			$content .= "\t\t</li>\n";
		}
		
		$content .= "\t</ul>\n";
		
		return $content;
	}
	
	return false;
}

/*****************************************************************************/

function GetDescriptionServices() {	
	global $config;
	
	$content = "";
	$anchor = "";
	
	$td = ServicesDetails::ParentServicesList();
	
	if($td) {
		
		for($i=0; $i<count($td)-1; $i++) {
			
			$content .= "\t<a name=\"" . ServiceTitleHashing($td[$i]["service_title"]) . "\"></a>\n";
			
			$content .= "\t<h3 class=\"title\"><span>" . $td[$i]["service_title"] . "</span></h3>\n";
			
			$content .= "\t<div class=\"content\">" . $td[$i]["service_description"] . "</div>\n";

			$content .= "\t<div class=\"clr\"></div>\n";

			$td2 = ServicesDetails::ChildServicesList($td[$i]["service_id"]);

			if($td2) {
				for($j=0; $j<count($td2)-1; $j++) {

					$content .= "\t\t<a name=\"" . ServiceTitleHashing($td2[$j]["service_title"]) . "\"></a>\n";
					
					$content .= "\t\t<h3 class=\"title\"><span>" . $td2[$j]["service_title"] . "</span></h3>\n";
					
					$content .= "\t\t<div class=\"content\">" . $td2[$j]["service_description"] . "</div>\n";
				}
			}
		}
		
		return $content;
	}
	
	return false;
}

/*****************************************************************************/

function ServiceTitleHashing($title){
	return strtolower(str_replace(" ","_",$title));
}

?>