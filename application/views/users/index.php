<?php foreach ($users as $user): ?>

    <b>Email:</b> <?php echo $user['email'] ?><br />
    <b>Username:</b> <?php echo $user['username'] ?><br />
    <b>Password:</b> <?php echo $user['password'] ?><br />
    <?php if ($user['username'] == $this->session->userdata('username')){
    	$editUrl = base_url()."index.php/users/edit/".$user['username'];
    	echo "<a href=\"$editUrl\">Edit profile</a><br/><br/>";
    	}
    	else echo "<br />";
    ?>

<?php endforeach ?>
