<h2>Edit profile</h2>

<?php echo validation_errors(); ?>
<?php echo form_open('users/edit/'.$user['username']) ?>
	<input type="hidden" name="oldUsername" value= "<?php echo $user['username'] ?>" />
	<label for="username">Username</label> 
	<input type="text" name="username" value= "<?php echo $user['username'] ?>" /><br />

	<label for="title">Email</label> 
	<input type="text" name="email" value= "<?php echo $user['email'] ?>" /><br />

	<label for="password">Password</label> 
	<input type="password" name="password" value= "<?php echo $user['password'] ?>" /><br />

	<input type="submit" name="submit" class="btn" value="Save" /> 

</form>
