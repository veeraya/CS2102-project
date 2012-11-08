<div class="container_12">
<h2>All reviews</h2>
<?php foreach ($reviews as $review): ?>

	<b>Title:</b> <?php echo $review['title'] ?><br />
	<?php echo $review['user_email'] ?> reviews <?php echo $review['restaurant_name'] ?><br /> 
	<b>Content:</b> <?php echo $review['content'] ?><br />
	<b>Food rating:</b> <?php echo $review['food_rating'] ?><br />
	<b>Service rating:</b> <?php echo $review['service_rating'] ?><br />
	<b>Recommend:</b>  <?php if ($review['recommend'] == 1) echo "Yes"; else echo "No"; ?><br />
	<b>Url:</b> <?php echo $review['url'] ?><br />	
	<?php 
		$editUrl = base_url()."index.php/reviews/edit/".$review['url'];
		$deleteUrl = base_url()."index.php/reviews/delete/".$review['url'];
		echo "<a href=\"$editUrl\">Edit review</a><br />";
		echo "<a href=\"$deleteUrl\">Delete review</a><br /><br />";
	?>

<?php endforeach ?>
</div>