<div id="clients">
<?php print GetClientsList(); ?>
	<br class="clr" />
</div>
<link rel="stylesheet" href="<?php print $config["path"]; ?>styles/lightbox.css" type="text/css" media="screen" />
<script src="<?php print $config["path"]; ?>scripts/jquery.lightbox.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".lightbox").lightbox();
	});
</script>