<h2>All reviews for this restaurant</h2>
<?php foreach ($reviews as $review): ?>

    <h3><?php echo $review['title'] ?></h3>
	<b>Reviewed by:</b> <?php echo $review['user_email'] ?><br />
    <b>Content:</b> <?php echo $review['content'] ?><br />
    <b>Food Rating:</b> <?php echo $review['food_rating'] ?><br />
    <b>Service Rating:</b> <?php echo $review['service_rating'] ?><br />
    <b>Recommend?:</b> <?php echo $review['recommend'] ?><br />
<?php endforeach ?>
