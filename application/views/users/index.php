<div class="container_12">
<?php foreach ($users as $user): ?>

    <b>Email:</b> <?php echo $user['email'] ?><br />
    <b>Username:</b> <?php echo $user['username'] ?><br />
    <b>Password:</b> <?php echo $user['password'] ?><br />
    <a href="<?php echo base_url()."index.php/users/edit/".$user['username']; ?>">Edit user</a><br />
    <a href="<?php echo base_url()."index.php/users/delete/".$user['username']; ?>">Delete user</a><br /><br /><br />

<?php endforeach ?>
</div>