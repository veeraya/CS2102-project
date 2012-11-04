<div class="container_12">
<!--  	<?php echo "<pre>";
	echo var_dump($query);
	echo "</pre>";
	?> -->
<a href="restaurants/create"><button type="button" class="btn btn-primary">Add a restaurant</button></a>
<?php foreach ($restaurants as $restaurant): ?>

    <h3><?php echo $restaurant['name'] ?></h3>
    Postal code: <?php echo $restaurant['postal_code'] ?><br />
    Address: <?php echo $restaurant['address'] ?><br />
    Location: <?php echo $restaurant['location'] ?><br />
    Phone: <?php echo $restaurant['phone'] ?><br />
    Timing: <?php echo $restaurant['timing'] ?><br />
    Cuisine: <?php echo $restaurant['cuisine'] ?><br />
    Food rating: <?php echo $restaurant['food_rating'] ?><br />
    Service Rating: <?php echo $restaurant['service_rating'] ?><br />
    % recommended: <?php echo ($restaurant['recommend_percent']*100); ?><br />
    <a href="<?php echo base_url(); ?>index.php/restaurants/<?php echo $restaurant['url'] ?>/reviews">View reviews</a><br />
    <a href="<?php echo base_url(); ?>index.php/restaurants/<?php echo $restaurant['url'] ?>/createReview">Submit a review</a>

<?php endforeach ?>
</div>