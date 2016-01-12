<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7;FF=2" />
<meta name="verify-v1" content="55oL+M23W7YN9qBx5lshlCW8U8GBErbWfrcS75Q0EAA=" >
<title><?php print $config["title"]; ?></title>
<meta name="description" content="<?php print $config["description"]; ?>" />
<meta name="keywords" content="<?php print $config["keywords"]; ?>" />
<meta name="copyright" content="<?php print $config["copyright"]; ?>" />
<meta name="author" content="<?php print $config["author"]; ?>" />
<meta name="email" content="<?php print $config["email"]; ?>" />
<meta name="Charset" content="UTF-8" />
<meta name="Distribution" content="Global" />
<meta name="Rating" content="General" />
<meta name="Robots" content="INDEX,FOLLOW" />
<link href="<?php print $config["path"]; ?>styles/style.css" type="text/css" rev="stylesheet" rel="stylesheet" />
<script src="<?php print $config["path"]; ?>scripts/artlab.js" language="javascript" type="text/javascript" ></script>
<script src="<?php print $config["path"]; ?>scripts/jquery.js" language="javascript" type="text/javascript" ></script>
<?php if($config["is_home"]) { ?>
<script src="<?php print $config["path"]; ?>scripts/jquery.cross-slide.js" language="javascript" type="text/javascript" ></script>
<?php } ?>
</head>
<?php 
	$class_home = "";
	
	if($config["is_home"]) {
		$class_home = "class=\"home\"";
	}
?>
<body id="wrap">
	<div id="page">
		<div id="page-top"></div>
		<div id="page-inner">
			<div id="header" <?php print $class_home; ?>>
				<div id="header-inner" class="clr">
					<div id="logo"><a href="<?php print $config["path"]; ?>"><img src="<?php print $config["path"]; ?>logo.gif" title="Art Lab" alt="Art Lab" /></a></div>
					<div id="nav"><?php print GetTopMenu(); ?></div>
					<div id="slogan"><img src="<?php print $config["path"]; ?>slogan.gif" alt="fills the GAP" title="fills the GAP" /></div>
					<br class="clr" />
					<div id="main-logo"><a href="<?php print $config["path"]; ?>"><img src="<?php print $config["path"]; ?>userfiles/images/artlab_logo_home.gif" title="Art Lab" alt="Art Lab" /></a></div>
				</div>
			</div><!-- header -->
			<?php
				$content_id = "";
				
				if(GetLeftBlocks() && GetRightBlocks()) {
					$content_id = "-both";
				} else if(GetLeftBlocks() && !GetRightBlocks()) {
					$content_id = "-left";
				} else if(!GetLeftBlocks() && GetRightBlocks()) {
					$content_id = "-right";
				}
			?>
			<div id="main">
				<div id="main-inner" class="clr">
					<?php if(GetLeftBlocks()) { ?>
					<div id="sidebar-left"  <?php print $class_home; ?>>
						<div id="sidebar-left-inner">
							<?php print GetLeftBlocks(); ?>
						</div>
					</div>
					<?php } ?>
					
					<div id="content<?php print $content_id; ?>">
						<div id="content-inner<?php print $content_id; ?>">
							<?php print $config["main"]; ?>
							<?php 
								if(!empty($config["module"]) && file_exists("controls/" . $config["module"]))
								{
									include_once("controls/".$config["module"]);
								}
							?>
						</div>
					</div>
					
					<?php if(GetRightBlocks()) { ?>
					<div id="sidebar-right" <?php print $class_home; ?>>
						<div id="sidebar-right-inner">
							<?php print GetRightBlocks(); ?>
						</div>
					</div>
					<?php } ?>
					<div class="clr"><br class="clr"/></div>
				</div>
			</div><!-- main -->
			<div class="clr"></div>
			<div id="footer">
				<div id="footer-inner">
					<div id="footer-links">
						<?php print GetFooterMenu(); ?>
						<div class="clr"></div>
					</div>
					<div id="message">All Contents Copyright 2009 ARTLAB And Our Clients.AllRights Reserved</div>
				</div>
			</div><!-- footer -->
		
		</div><!--  page inner -->
		<div id="page-bottom"></div>
	</div>
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	try {
	var pageTracker = _gat._getTracker("UA-10402142-1");
	pageTracker._trackPageview();
	} catch(err) {}</script>
	<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
	<script type="text/javascript">
		try {
		_uacct = "UA-10402142-1";
		urchinTracker();
		} catch(err) {}
	</script>
</body>
</html>