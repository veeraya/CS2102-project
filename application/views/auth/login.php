<form action="<?php echo base_url(); ?>index.php/auth/processLogin" method="post" name="processLogin">
	
	<?php if (!is_null($errorMsg)) echo $errorMsg; ?>
	<label for="email">Email</label><br />
	<input type="text" name="email" id="email"/><br />

	<label for="password">Password</label><br />
	<input type="password" name="password" id="password" /><br />

	<input type="submit" value="Login" />
</form>