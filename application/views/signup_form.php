<h1>Create an Account</h1>

<fieldset>
	<legend>Personal Infomation</legend>

	<?php
	echo form_open('login/create_member');
	echo form_input('username','');
	echo form_input('email_address','');
	#echo form_input('email_address',set_value('email_address','Email_address'));
	?>

</fieldset>

<fieldset>
	<legend>Login Info</legend>

	<?php
	#echo form_input('username',set_value('username','Username'));
	echo form_input('password','');
	echo form_input('password2','');

	echo form_submit('submit','Create Account');
	?>

	<?php echo validation_errors('<p class="erorr">'); ?>

</fieldset>	
