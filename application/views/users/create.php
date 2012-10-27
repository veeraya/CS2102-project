

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
