<div class="container_12">
<a href="restaurants/create"><button type="button" class="btn btn-primary">Add a restaurant</button></a>
<?php foreach ($restaurants as $restaurant): ?>

    <h3><?php echo $restaurant['name'] ?></h3>
    Postal code: <?php echo $restaurant['postal_code'] ?><br />
    Address: <?php echo $restaurant['address'] ?><br />
    Location: <?php echo $restaurant['location'] ?><br />
    Phone: <?php echo $restaurant['phone'] ?><br />
    Timing: <?php echo $restaurant['timing'] ?><br />
    Cuisine: <?php echo $restaurant['cuisine'] ?><br />
    
    <a href="restaurants/<?php echo $restaurant['url'] ?>/reviews">View reviews</a><br />
    <a href="restaurants/<?php echo $restaurant['url'] ?>/createReview">Submit a review</a>

<?php endforeach ?>
</div>