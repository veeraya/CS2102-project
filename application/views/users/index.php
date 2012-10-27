<?php foreach ($users as $user): ?>

    <h2>Email: <?php echo $user['email'] ?></h2>
    <div id="main">
        Username: <?php echo $user['username'] ?>
    </div>
    <p><a href="users/view/<?php echo $user['username'] ?>">View user</a></p>

<?php endforeach ?>
