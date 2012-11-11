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
<div class="wrapper">
  <div id="footer" class="clear" background = >
  	<div style="color: red"><?php if (!is_null($errorMsg)) echo $errorMsg; ?></div><br />
    <div class="fl_left">
      <div class="about_us border">
		<h2>Sign In</h2>
		<form action="<?php echo base_url(); ?>index.php/auth/processLogin" method="post" name="processLogin">


			<label for="email">Email</label>
			<input type="text" name="email" value="Email Address"/><br />

			<label for="password">Password</label>
			<input type="password" name="password" value="password" /><br />

			<button type="submit" value="submit"><span>LOGIN</span></button>
		</form>
	</div>
</div>
	<div class="f1_right">
      <div id="contact" class="clear">
		<h2>Sign Up</h2>
			<?php echo validation_errors(); ?>

			<?php echo form_open('users/create') ?>

			<label for="title">Email</label>
			<input type="text" name="email" value="Email Address" />
			<label for="username">Username</label>
			<input type="text" name="username" value="Username" />
			<label for="password">Password</label>
			<input type="password" name="password" value="Password" />

			<button type="submit" value="submit" float = "right"><span>SIGN UP</span></button>

		</form>
	</div>
</div>
</div>
</div>
<div><hr></div>