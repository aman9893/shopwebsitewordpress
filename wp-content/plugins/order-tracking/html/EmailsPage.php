<?php
	$Admin_Email = get_option("EWD_OTP_Admin_Email");
	$From_Name = get_option("EWD_OTP_From_Name");
	$Username = get_option("EWD_OTP_Username");
	$Encrypted_Admin_Password = get_option("EWD_OTP_Admin_Password");
	$Port = get_option("EWD_OTP_Port");
	$Use_SMTP = get_option("EWD_OTP_Use_SMTP");
	$SMTP_Mail_Server = get_option("EWD_OTP_SMTP_Mail_Server");
	$Encryption_Type = get_option("EWD_OTP_Encryption_Type");
	$Email_Messages_Array = get_option("EWD_OTP_Email_Messages_Array");
    $Subject_Line = get_option("EWD_OTP_Subject_Line");
    $Tracking_Page = get_option("EWD_OTP_Tracking_Page");

    $Email_Messages_Array = get_option("EWD_OTP_Email_Messages_Array");
	if (!is_array($Email_Messages_Array)) {$Email_Messages_Array = array();}

	$key = 'EWD_OTP';
	if (function_exists('mcrypt_decrypt')) {$Admin_Password = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($Encrypted_Admin_Password), MCRYPT_MODE_CBC, md5(md5($key))), "\0");}
	else {$Admin_Password = $Encrypted_Admin_Password;}
?>
<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div><h2>Email Settings</h2>
<p>We've switched to using the default WordPress SMTP mail function. To send SMTP email, use a plugin such as <a href='https://wordpress.org/plugins/wp-mail-smtp/'>WP Mail SMTP</a> to input your settings</p>

<form method="post" action="admin.php?page=EWD-OTP-options&DisplayPage=Emails&OTPAction=EWD_OTP_UpdateEmailSettings">
<?php wp_nonce_field('EWD_OTP_Admin_Nonce', 'EWD_OTP_Admin_Nonce'); ?>
<table class="form-table">
<?php /* <tr>
<th scope="row">"Send-From" Email Address</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Email Address</span></legend>
	<label title='Email Address'><input type='text' name='admin_email' value='<?php echo $Admin_Email; ?>' /> </label><br />
	<p>The email address that order messages should be sent from to users.</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">"Send-From" Name</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Email Address</span></legend>
	<label title='Email Address'><input type='text' name='from_name' value='<?php echo $From_Name; ?>' /> </label><br />
	<p>The name on the e-mail account that order messages should be sent from to users.</p>
	</fieldset>
</td>
</tr> */ ?>

<tr>
<th scope="row">Subject Line</th>
<td>
    <fieldset><legend class="screen-reader-text"><span>Subject Line</span></legend>
    <label title='Subject Line'><input type='text' name='subject_line' value='<?php echo $Subject_Line; ?>' /> </label><br />
    <p>The subject line for your e-mails.</p>
    </fieldset>
</td>
</tr>

<tr>
<th scope="row">Admin Email</th>
<td>
    <fieldset><legend class="screen-reader-text"><span>Admin Email</span></legend>
    <label title='Admin Email'><input type='text' name='admin_email' value='<?php echo $Admin_Email; ?>' /> </label><br />
    <p>What email should customer note and customer order notifications be sent to, if they'd been set in the "Premium" area of the "Options" tab?</p>
    </fieldset>
</td>
</tr>

<tr>
<th scope="row">Status Tracking URL</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Status Tracking URL</span></legend>
	<label title='Tracking URL'><input type='text' name='tracking_page' value='<?php echo $Tracking_Page; ?>' /> </label><br />
	<p>The URL of your tracking page, required if you want to include a tracking link in your message body.</p>
	</fieldset>
</td>
</tr>

<tr>
<th scope="row">E-mail Messages</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>E-mail Messages</span></legend>
	<table id='ewd-otp-email-messages-table'>
		<tr>
			<th></th>
			<th>Message Name</th>
			<th>Message</th>
		</tr>
		<?php
			$Counter = 0;
			if (!is_array($Email_Messages_Array)) {$Email_Messages_Array = array();}
			foreach ($Email_Messages_Array as $Email_Message_Item) {
				echo "<tr id='ewd-otp-email-message-" . $Counter . "'>";
					echo "<td><a class='ewd-otp-delete-message' data-messagenumber='" . $Counter . "'>Delete</a></td>";
					echo "<td><input class='ewd-otp-array-text-input' type='text' name='Email_Message_" . $Counter . "_Name' value='" . $Email_Message_Item['Name']. "'/></td>";
					echo "<td><textarea class='ewd-otp-array-textarea' name='Email_Message_" . $Counter . "_Body'>" . $Email_Message_Item['Message'] . "</textarea></td>";
				echo "</tr>";
				$Counter++;
			}
			echo "<tr><td colspan='4'><a class='ewd-otp-add-email' data-nextid='" . $Counter . "'>Add</a></td></tr>";
		?>
	</table>
	<p>What should be in the messages sent to users? You can put [order-name], [order-number], [order-status], [order-notes], [customer-notes] and [order-time] into the message, to include current order name, order number, order status, public order notes or the time the order was updated.</p>
	<p>You can also use [tracking-link], [customer-name], [customer-id], [sales-rep] or the slug of a customer field enclosed in square brackets to include those fields in the e-mail.</p>
	</fieldset>
</td>
</tr>

</table>

<?php /*
<div class="otp-email-advanced-settings">
<h3>SMTP Mail Settings</h3>
<table class="form-table">
<tr>
<th scope="row">Use SMTP</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Use SMTP</span></legend>
	<label title='Yes'><input type='radio' name='use_smtp' value='Yes' <?php if($Use_SMTP == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label>
	<label title='No'><input type='radio' name='use_smtp' value='No' <?php if($Use_SMTP == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
	<p>Should SMTP be used to send order e-mails?</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">SMTP Mail Server Address</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>SMTP Mail Server Address</span></legend>
	<label title='Mail Server'><input type='text' name='smtp_mail_server' value='<?php echo $SMTP_Mail_Server; ?>' /> </label><br />
	<p>The server that should be connected to for SMTP e-mail, if you're using SMTP to send your e-mails.</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">SMTP Port</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>SMTP Port</span></legend>
	<label title='Port'><input type='text' name='port' value='<?php echo $Port; ?>' /> </label><br />
	<p>The port that should be used to send e-mail.</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">SMTP Username</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>SMTP Username</span></legend>
	<label title='Username'><input type='text' name='username' value='<?php echo $Username; ?>' /> </label><br />
	<p>The username for your email account, if you'd like to use SMTP to send your e-mails.</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">SMTP Mail Password</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>SMTP Mail Password</span></legend>
	<label title='Email Password'><input type='password' name='admin_password' value='<?php echo $Admin_Password; ?>' /> </label><br />
	<p>The password for your email account, if you'd like to use SMTP to send your e-mails.</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Encryption Type</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Encryption Type</span></legend>
	<label title='SSL'><input type='radio' name='encryption_type' value='ssl' <?php if($Encryption_Type == "ssl") {echo "checked='checked'";} ?> /> <span>SSL</span></label>
	<label title='TSL'><input type='radio' name='encryption_type' value='tsl' <?php if($Encryption_Type == "tsl") {echo "checked='checked'";} ?> /> <span>TSL</span></label><br />
	<p>What ecryption type should be used to send order e-mails?</p>
	</fieldset>
</td>
</tr>
</table>
</div>
<div class="otp-email-toggle-show" onclick="ShowMoreOptions()"><a> Show Advanced Settings... </a></div>
<div class="otp-email-toggle-hide" onclick="ShowMoreOptions()" style="display:none;"><a> Hide Advanced Settings... </a></div>
*/ ?>
<p class="submit"><input type="submit" name="Options_Submit" id="submit" class="button button-primary" value="Save Changes"  /></p></form>

</div>
