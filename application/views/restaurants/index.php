<div class="container_12">
<a href="restaurants/create"><button type="button" class="btn btn-primary">Add a restaurant</button></a>
<?php foreach ($restaurants as $restaurant): ?>

    <h3><a href="<?php echo base_url(); ?>index.php/restaurants/<?php echo $restaurant['url'] ?>"><?php echo $restaurant['name'] ?></a></h3>
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
<?php endforeach ?>
</div>