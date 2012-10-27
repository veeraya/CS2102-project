<?php foreach ($restaurants as $restaurant): ?>

    <h2><?php echo $restaurant['name'] ?></h2>
    <div id="main">
        <?php echo $restaurant['postal_code'] ?>
    </div>
    <p><a href="<?php echo $restaurant['url'] ?>">View this restaurant</a></p>

<?php endforeach ?>
