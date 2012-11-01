<div class="container_12">
<h2>My Profile</h2>
<p>
Username: <?php echo $user['username'] ?> <br />
Email: <?php echo $user['email'] ?> <br /> <br />
<?php if ($user['username'] == $this->session->userdata('username')){
	$editUrl = base_url()."index.php/users/edit/".$user['username'];
	echo "<a href=\"$editUrl\">Edit profile</a>";
	}
?>
</p>
</div>