<!-- <div class="container_12">
<form action="<?php echo base_url(); ?>index.php/auth/processLogin" method="post" name="processLogin">
	
	<?php if (!is_null($errorMsg)) echo $errorMsg; ?>
	<label for="email">Email</label>
	<input type="text" name="email" id="email"/><br />

	<label for="password">Password</label>
	<input type="password" name="password" id="password" /><br />

	<input type="submit" value="Login" />
</form>
  No account? <a href="<?php echo base_url(); ?>index.php/users/create">Sign up here.</a>
</div> -->

<div id= "homepage" class= "clear">
	<div class = "f1_left">
		<h2>Sign In</h2>
		<form action="<?php echo base_url(); ?>index.php/auth/processLogin" method="post" name="processLogin">
	
			<?php if (!is_null($errorMsg)) echo $errorMsg; ?>
			<label for="email">Email</label>
			<input type="text" name="email" id="email"/><br />

			<label for="password">Password</label>
			<input type="password" name="password" id="password" /><br />

			<input type="submit" value="Login" />
		</form>
	</div>
	<div class = "f1_right">
		<h2>Sign Up</h2>
			<?php echo validation_errors(); ?>

			<?php echo form_open('users/create') ?>

			<label for="title">Email</label> 
			<input type="text" name="email" /><br />

			<label for="username">Username</label> 
			<input type="text" name="username" /><br />

			<label for="password">Password</label> 
			<input type="password" name="password" /><br />

			<input type="submit" name="submit" class="btn" value="Sign up" /> 

		</form>
	</div>
</div>