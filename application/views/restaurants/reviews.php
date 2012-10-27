<h2>All reviews for this restaurant</h2>
<?php foreach ($reviews as $review): ?>

    <h3><?php echo $review['title'] ?></h3>
    <div id="main">
    	Reviewed by: <?php echo $review['user_email'] ?><br />
        Content: <?php echo $review['content'] ?><br />
        Food Rating: <?php echo $review['food_rating'] ?><br />
        Service Rating: <?php echo $review['service_rating'] ?><br />
        Recommend?: <?php echo $review['recommend'] ?><br />
    </div>
<?php endforeach ?>
