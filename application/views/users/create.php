<h2>Sign up</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('users/create') ?>

	<label for="title">Email</label> 
	<input type="input" name="email" /><br />

	<label for="username">Username</label> 
	<input type="input" name="username" /><br />

	<label for="password">Password</label> 
	<input type="password" name="password" /><br />

	<input type="submit" name="submit" value="Create news item" /> 

</form>
