<?php foreach ($users as $user): ?>

    <h2><?php echo $user['email'] ?></h2>
    <div id="main">
        <?php echo $user['username'] ?>
    </div>
    <p><a href="users/<?php echo $user['url'] ?>">View user</a></p>

<?php endforeach ?>
