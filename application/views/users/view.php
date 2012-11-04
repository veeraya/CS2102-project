<div class="container_12">
<h2>My Profile</h2>
<p>
Username: <?php echo $user['username'] ?> <br />
Email: <?php echo $user['email'] ?> <br /> <br />
<?php 
	$editUrl = base_url()."index.php/users/edit/".$user['username'];
	echo "<a href=\"$editUrl\">Edit profile</a>";
?>
<h2>My Reviews</h2>
<?php foreach ($reviews as $review): ?>
Restaurant: <?php echo $review['restaurant_name'] ?><br />
Last updated: <?php echo $review['updated_on'] ?><br />
Title: <?php echo $review['title'] ?> <br />
Content: <?php echo $review['content'] ?> <br />
Food rating: <?php echo $review['food_rating'] ?> <br />
Service rating: <?php echo $review['service_rating'] ?> <br />
Recommend: <?php echo $review['recommend'] ?> <br />
<?php 
	$editUrl = base_url()."index.php/reviews/edit/".$review['url'];
	echo "<a href=\"$editUrl\">Edit review</a>";
?><br />
<a href="#">Delete review</a>
<br /><br/>
<?php endforeach ?>
To do: Display this user's reviews
</p>
</div>