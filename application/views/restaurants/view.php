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
    <?php if (isset($this->session->userdata['account_type']) && $this->session->userdata['account_type'] == "admin"){
        $editUrl = base_url()."index.php/restaurants/".$restaurant['url']."/edit";
        $deleteUrl = base_url()."index.php/restaurants/".$restaurant['url']."/delete";
        echo <<<"EOT"
        <a href="$editUrl">Edit restaurant details</a><br />
        <a href="$deleteUrl">Delete restaurant</a><br />
EOT;
    }
    ?>
	<h3>Menu</h3>
	<a href="<?php echo base_url(); ?>index.php/restaurants/<?php echo $restaurant['url'] ?>/createMenu">Add menu</a><br /><br />
	<?php foreach ($menu as $m): ?>

	<b><?php echo $m['name'] ?></b><br/>
	<b>Price:</b> $<?php echo $m['price'] ?><br/>
	<b>Type:</b> <?php echo $m['type'] ?><br />
	<b>Cuisine:</b> <?php echo $m['cuisine'] ?><br />
	<b>Description:</b><?php echo $m['description'] ?><br />

    <!-- admin delete menu function -->
    <?php if (isset($this->session->userdata['account_type']) && $this->session->userdata['account_type'] == "admin"){
        $deleteUrl = base_url()."index.php/menu/delete/".$m['url'];
        echo "<a href=\"$deleteUrl\">Delete</a>";
    } ?>

	<?php endforeach; ?>
</div>