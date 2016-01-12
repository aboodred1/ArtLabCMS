<link rel="stylesheet" href="<?php print $config["path"]; ?>styles/codaslider.css" type="text/css" media="screen" title="no title" charset="utf-8">
<script src="<?php print $config["path"]; ?>scripts/jquery.scrollto.js" type="text/javascript"></script>
<script src="<?php print $config["path"]; ?>scripts/jquery.localscroll.js" type="text/javascript"></script>
<script src="<?php print $config["path"]; ?>scripts/jquery.serialscroll.js" type="text/javascript"></script>
<script src="<?php print $config["path"]; ?>scripts/coda-slider.js" type="text/javascript"></script>
<?php //print GetTitleCategoriesBlock(); ?>
<div id="portfolios">
	<?php  print GetPortfolioDetails(); ?>
	<div id="slider">
		<img class="scrollButtons left" src="<?php print $config["path"]; ?>userfiles/spacer.gif">
		<div style="overflow: hidden;" class="scroll">
			<div style="width: 7000px;" class="scrollContainer">
				<?php  print GetPortfolioGallery(); ?>
			</div>
		</div>
		<img class="scrollButtons right" src="<?php print $config["path"]; ?>userfiles/spacer.gif">
	</div>
	<br class="clr" />
</div>