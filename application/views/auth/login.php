<div class="container_12">
<form action="<?php echo base_url(); ?>index.php/auth/processLogin" method="post" name="processLogin">
	
	<?php if (!is_null($errorMsg)) echo $errorMsg; ?>
	<label for="email">Email</label>
	<input type="text" name="email" id="email"/><br />

	<label for="password">Password</label>
	<input type="password" name="password" id="password" /><br />

	<input type="submit" value="Login" />
</form>
  No account? <a href="<?php echo base_url(); ?>index.php/users/create">Sign up here.</a>
</div>