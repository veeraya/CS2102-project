<div class="container_12">
<h2>
	<?php echo $restaurant['name'] ?>
</h2>
	<b>Postal code:</b> <?php echo $restaurant['postal_code'] ?><br />
	<b>Address:</b> <?php echo $restaurant['address'] ?><br />
	<b>Phone:</b> <?php echo $restaurant['phone'] ?><br />
	<b>Timing:</b> <?php echo $restaurant['timing'] ?><br />
	<b>Cuisine:</b> <?php echo $restaurant['cuisine'] ?><br />
	<b>Food rating:</b> <?php echo $restaurant['food_rating'] ?><br />
	<b>Service Rating:</b> <?php echo $restaurant['service_rating'] ?><br />
	<b>% recommended:</b> <?php echo $restaurant['recommend_percent'] ?><br />
	<a href="<?php echo base_url(); ?>index.php/restaurants/<?php echo $restaurant['url'] ?>/reviews">View reviews</a><br />
    <a href="<?php echo base_url(); ?>index.php/restaurants/<?php echo $restaurant['url'] ?>/createReview">Submit a review</a><br />
	
    <!-- admin function -->
    <?php if ($this->session->userdata['account_type'] == "admin"){
        $editUrl = base_url()."index.php/restaurants/".$restaurant['url']."/edit";
        $deleteUrl = base_url()."index.php/restaurants/".$restaurant['url']."/delete";
        echo <<<"EOT"
        <a href="$editUrl">Edit restaurant details</a><br />
        <a href="$deleteUrl">Delete restaurant</a><br />
EOT;
    }
    ?>
    <!-- The menu is hard-coded because there's no time left!-->
	<h3>Menu</h3>
	<b>Spaghetti Carbonara</b><br/>
	<b>Price:</b> $14<br/>
	<b>Type:</b> Main Course<br />
	<b>Cuisine:</b> Italian<br />
	<b>Description:</b> Chef's favourite!<br /><br />
	
	<b>Hawaiian Pizza</b><br/>
	<b>Price:</b> $14<br/>
	<b>Type:</b> Main Course<br />
	<b>Cuisine:</b> Italian<br />
	<b>Description:</b> Extra pineapple for hot sunny day<br />

	
</div>