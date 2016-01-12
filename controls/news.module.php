<div id="news">
<?php 
if($config["news"] > 0) {
	print GetNewsDetails();
} else {
	print GetNewsList();
}
?>
	<br class="clr" />
</div>