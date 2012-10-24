<h2>Update user</h2>

<?php echo validation_errors(); ?>
<?php echo form_open('users/edit/'.$user['username']) ?>
	<input type="hidden" name="oldUsername" value= "<?php echo $user['username'] ?>" />
	<label for="username">Username</label> 
	<input type="input" name="username" value= "<?php echo $user['username'] ?>" /><br />

	<label for="title">Email</label> 
	<input type="input" name="email" value= "<?php echo $user['email'] ?>" /><br />

	<label for="password">Password</label> 
	<input type="password" name="password" value= "<?php echo $user['password'] ?>" /><br />

	<input type="submit" name="submit" value="Save" /> 

</form>
