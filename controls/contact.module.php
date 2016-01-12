<div id="contactus">
	<form id="frmContact" name="frmContact" method="post" action="process.php">
		<?php if(ContactsErrorMessage()) { ?>
			<a name="error"></a>
			<div id="contact-error" class="message error"><?php print ContactsErrorMessage(); ?></div>
		<?php } ?>
		<div class="form-items clr" >
			<span class="form left"><label for="txtName" class="label-form"><span>Your Name:</span></label></span>
			<span class="form right must"><input id="txtName" name="txtName" type="text" value="" class="text-form" /></span>
			<br class="clr" /> 
			<span class="form left"><label for="txtEmail" class="label-form"><span>Your Email:</span></label></span>
			<span class="form right must"><input id="txtEmail" name="txtEmail" type="text" value="" class="text-form" /></span>
			<br class="clr" /> 
			<!-- 
			<span class="form left"><label for="txtType" class="label-form"><span>Company:</span></label></span>
			<span class="form right option"><input id="txtType" name="txtType" type="text" value="" class="text-form" /></span>
			<br class="clr" /> 
			-->
			<span class="form left"><label for="txtCompany" class="label-form"><span>Company:</span></label></span>
			<span class="form right option"><input id="txtCompany" name="txtCompany" type="text" value="" class="text-form" /></span>
			<br class="clr" /> 
			<span class="form left"><label for="txtTitle" class="label-form"><span>Title:</span></label></span>
			<span class="form right option"><input id="txtTitle" name="txtTitle" type="text" value="" class="text-form" /></span>
			<br class="clr" /> 
			<span class="form left"><label for="txtSubject" class="label-form"><span>Subject:</span></label></span>
			<span class="form right must"><input id="txtSubject" name="txtSubject" type="text" value="" class="text-form" /></span>
			<br class="clr" /> 
			<span class="form left"><label for="txtMessage" class="label-form"><span>Message:</span></label></span>
			<span class="form right must"><textarea id="txtMessage" name="txtMessage" class="textarea-form"></textarea></span>
			<br class="clr" /> 
			<span class="form submit">
				<input id="btnSubmit" name="btnSubmit" type="submit" value="  Submit  " class="submit-form" />
				<input id="nodeID" name="nodeID" type="hidden" value="<?php print $config["node"]; ?>" /></span>
			<br class="clr" /> 
		</div>
	</form>
</div>
<?php unset($_SESSION["error_message"]); ?>