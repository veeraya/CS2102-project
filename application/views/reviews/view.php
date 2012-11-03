<div class="container_12">
<p>
Title: <?php echo $review['title'] ?> <br />
Content: <?php echo $review['content'] ?> <br />
Food rating: <?php echo $review['food_rating'] ?> <br />
Service rating: <?php echo $review['service_rating'] ?> <br />
Recommend: <?php echo $review['recommend'] ?> <br /><br />
<?php 
	$editUrl = base_url()."index.php/reviews/edit/".$review['url'];
	echo "<a href=\"$editUrl\">Edit review</a>";
?>
</p>
</div>