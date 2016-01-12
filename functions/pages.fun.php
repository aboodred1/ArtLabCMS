<?php 

function GetCurrentNodeInformation() {
	global $config;
	
	$content = PagesDetails::GetSelectedPage($config["node"]);
	
	$config["title"] = $content[0]["page_title"];
	$config["description"] = $content[0]["page_meta_description"];
	$config["keywords"] = $content[0]["page_meta_keyword"];
	$config["content"] = $content[0]["page_description"];
	$config["module"] = $content[0]["control_file"];
}

/********************************************************************************/

function GetTopMenu(){
	global $config;
	
	$content = "";
	
	$content .= "<embed src=\"" . $config["path"] . "userfiles/flash/top_navigation_menu.swf\" width=\"530px\" height=\"170px\" />";
	
	return $content;
}

/********************************************************************************/

function GetLeftMenu(){
	global $config;
	
	$content = "";
	
	//$content .= "<img src=\"" . $config["path"] . "userfiles/images/leftmenu.jpg\" alt=\"\" title=\"\"  />";
	$content .= "<embed src=\"" . $config["path"] . "userfiles/flash/top_navigation_menu_v.swf\" width=\"200px\" height=\"460px\" />";
	
	return $content;
}

/********************************************************************************/

function GetFooterMenu() {
	global $config;
	
	$content = "";
	$link = "";
	$dt = PagesDetails::GetAllTitlePages();
	

	if($dt) {
		$content .= "<ul>\n";
		
		for($i=0; $i<count($dt) - 1; $i++){
			$content .= "\t<li>";
			$content .= "<span><a href=\"" . url("index.php?node=" . $dt[$i]["page_id"]) . "\" title=\"". $dt[$i]["page_title"] ."\">" . $dt[$i]["page_name"] . "</a></span>";
			$content .= "</li>\n";
		}
		
		$content .= "</ul>\n";
	}
	
	return $content;
}

/********************************************************************************/

function url($link) {
	global $config;
	
	$tweak = "";
	
	if($config["is_rewrite"]) {
		
		$url = explode("?",$link);
		
		$param = parse_query_string($url[1]);
		
		if(count($param) == 1){
		
			switch($param['node']) {
				case 0:
					$tweak = "home" . ".html";
					break;
				case 1:
					$tweak = "ourservices" . ".html";
					break;
				case 2:
					$tweak = "portfolio" . ".html";
					break;
				case 3:
					$tweak = "clients" . ".html";
					break;
				case 4:
					$tweak = "contactus" . ".html";
					break;
				case 5:
					$tweak = "about" . ".html";
					break;
				case 6:
					$tweak = "privacy-policy" . ".html";
					break;
				case 7:
					$tweak = "careers" . ".html";
					break;
				case 8:
					$tweak = "news" . ".html";
					break;
				case 9:
					$tweak = "thank-you" . ".html";
					break;
				case 10:
					$tweak = "useful-links" . ".html";
					break;
				default:
					$tweak = "home" . ".html";
					break;
			}
		} else {
			
			if(($param['node'] == 8) && (isset($param['news']))) {
				
				$tweak = "news/news-" . $param['news'] . ".html";
				
			} elseif (($param['node'] == 8) && (isset($param['page']))) {
				
				$tweak = "news/page-" . $param['page'] . ".html";
				
			} elseif (($param['node'] == 2) && (isset($param['taxonomy'])) && (isset($param['profile']))) {
				
				$tweak = "portfolio/taxonomy-" . $param['taxonomy'] . "-" . $param['profile'] . ".html";
				
			} elseif (($param['node'] == 2) && (isset($param['taxonomy']))) {
				
				$tweak = "portfolio/taxonomy-" . $param['taxonomy'] . ".html";
			} else {
			
			}
			
			//print isset($param['news']);
			//print_r($param);
		}
	}
	else {
		$tweak = str_replace("&","&amp;",$link);
	}
	
	return $config["path"] . $tweak;
}

/********************************************************************************/

function parse_query_string($query_string) {
	
	$items = explode("&",$query_string);
	
	$qs_array = array();
	
	foreach($items as $i) {
		$pair = explode("=",$i);
		$qs_array[urldecode($pair[0])] = urldecode($pair[1]);
	}
	
	return 	$qs_array;
}

/********************************************************************************/

  function arc_rewrite_href_link($apartments_id, $name, $case = '') {

    $link = '';

    if ($case == 'reviews') {

      $link = arc_href_link('reviews-' . $apartments_id . '-' . arc_strip_non_alphanum($name) . '.html');

    } elseif ($case == 'photos') {

      $link = arc_href_link('photos-' . $apartments_id . '-' . arc_strip_non_alphanum($name) . '.html');

    } elseif ($case == 'villas') {

      $link = arc_href_link('villa-' . $apartments_id . '-' . arc_strip_non_alphanum($name) . '.html');

	  //SILVIU ADD CODE

    } elseif ($case == 'newcode') {

      $link = arc_href_link('hotel-' . $apartments_id . '-' . $name . '.html');

  	  //SILVIU ADD CODE END

    } else {

      $link = arc_href_link('hotel-' . $apartments_id . '-' . arc_strip_non_alphanum($name) . '.html');

    }

    return $link;

  }
  
/********************************************************************************/

function arc_strip_non_alphanum($string) {

  if ($string) {

    $string = ereg_replace ('[^a-zA-Z0-9 ]','',$string);

    $string = ereg_replace ('[ ]+','-',$string);

  } else {

    $string = '';

  }

  return $string;

}



  function arc_href_link($page = '', $parameters = '', $connection = 'NONSSL', $add_session_id = false, $search_engine_safe = true) {

    if (!arc_not_null($page)) {

      //die('<br><br><font color="#ff0000"><b>Error!</b></font><br><br><b>Unable to determine the page link!<br><br>');

    }



    if ($connection == 'NONSSL') {

      // partners areas

      if (strstr($page, '/partners/')) {

        $link = HTTP_SERVER;

      } elseif (strstr($page, DIR_INSTALL) && DIR_INSTALL != '/') {

        $link = HTTP_SERVER;

       // echo "link1 -->".$link;

      } else {

        $link = DIR_WS_WEBSITE;

       // echo "link2 -->".$link;

      }



    } elseif ($connection == 'SSL') {

      if (ENABLE_SSL == true) {

        $link = DIR_WS_WEBSITE;

        //$link = HTTPS_SERVER . DIR_WS_WEBSITE;

      } else {

        //$link = DIR_WS_WEBSITE;

        //$link = HTTP_SERVER . DIR_WS_WEBSITE;

      }

    } else {

      die('<br><br><font color="#ff0000"><b>Error!</b></font><br><br><b>Unable to determine connection method on a link!<br><br>Known methods: NONSSL SSL</b><br><br>');

    }



    if (arc_not_null($parameters)) {

      $link .= $page . '?' . $parameters;

      $separator = '&';

    } else {

      $link .= $page;

      $separator = '?';

    }



    while ((substr($link, -1) == '&') || (substr($link, -1) == '?') ) $link = substr($link, 0, -1);



    // Add the session ID when moving from HTTP and HTTPS servers or when SID is defined

    if ((ENABLE_SSL == true ) && ($connection == 'SSL') && ($add_session_id == true) ) {

      $sid = session_name() . '=' . session_id();

    } elseif (($add_session_id == true) && (arc_not_null(SID)) ) {

      $sid = SID;

    }



    if ((SEARCH_ENGINE_FRIENDLY_URLS == 'true') && ($search_engine_safe == true) ) {

      while (strstr($link, '&&')) $link = str_replace('&&', '&', $link);



      //$link = str_replace('?', '/', $link);

      $link = str_replace('&', '/', $link);

      $link = str_replace('=', '/', $link);



      $separator = '?';

    }



    if (isset($sid)) {

      $link .= $separator . $sid;

    }



    return $link;

  }
?>