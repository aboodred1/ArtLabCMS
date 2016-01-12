<?php //print GetTitleCategoriesBlock(); ?>
<div id="portfolios">
	<?php  print GetPortfolioDetails(); ?>
	<div id="slider">
		<img class="scrollButtons left" src="<?php print $config["path"]; ?>userfiles/spacer.gif">
		<div style="overflow: hidden;" class="scroll">
			<div style="width: 4340px;" class="scrollContainer">
				<?php print GetPortfolioGallery(); ?>
				<br class="clr" />
			</div>
		</div>
		<img class="scrollButtons right" src="<?php print $config["path"]; ?>userfiles/spacer.gif">
	</div>
</div>
<link rel="stylesheet" href="<?php print $config["path"]; ?>styles/codaslider.css" type="text/css" media="screen" title="no title" charset="utf-8">
<script src="<?php print $config["path"]; ?>scripts/jquery.scrollto.js" type="text/javascript"></script>
<script src="<?php print $config["path"]; ?>scripts/jquery.localscroll.js" type="text/javascript"></script>
<script src="<?php print $config["path"]; ?>scripts/jquery.serialscroll.js" type="text/javascript"></script>
<script src="<?php print $config["path"]; ?>scripts/coda-slider.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$(".image").click(function() {
		var image = $(this).attr("rel");
		var title = $(this).attr("title");
		var brief = $(this).find("img").attr("alt");
		$('#portfolio-image').hide();
		$('#portfolio-image').fadeIn('slow');
		$('#portfolio-image').html('<img src="' + image + '" width="400" height="500" />');
		$('#portfolio-brief h3.title').html(title);
		$('#portfolio-brief div.content').html(brief);
		
		document.location.href = "#image";
		return false;
	});
});
</script>