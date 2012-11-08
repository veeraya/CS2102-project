<div class="container_12">

	<?php if ($user["account_type"] == "admin") {
		$usersUrl = base_url()."index.php/users/";
		$reviewsUrl = base_url()."index.php/reviews/";
		$restaurantsUrl = base_url()."index.php/restaurants/";
		echo <<<"ABC"
		<h2>
	<a href="$restaurantsUrl">Restaurants Management</a>
	<br />
	<a href="$reviewsUrl">Reviews Management</a>
	<br />
	<a href="$usersUrl">Users Management</a>
</h2>
ABC;
	}
	 ?>
<h2>My Profile</h2>
<p>
	Username:
	<?php echo $user['username'] ?>
	<br />
	Email:
	<?php echo $user['email'] ?>
	<br />
	<br />
	<?php if ($user['username'] == $this->
	session->userdata('username') || $this->session->userdata('account_type') == "admin"){
	$editUrl = base_url()."index.php/users/edit/".$user['username'];
	echo "
	<a href=\"$editUrl\">Edit profile</a>
	<br />
	"; }
	?>
	<br />
	<h2>My Reviews</h2>
	<?php foreach ($reviews as $review): ?>
	Restaurant:
	<?php echo $review['restaurant_name'] ?>
	<br />
	Last updated:
	<?php echo $review['updated_on'] ?>
	<br />
	Title:
	<?php echo $review['title'] ?>
	<br />
	Content:
	<?php echo $review['content'] ?>
	<br />
	Food rating:
	<?php echo $review['food_rating'] ?>
	<br />
	Service rating:
	<?php echo $review['service_rating'] ?>
	<br />
	Recommend:
	<?php echo $review['recommend'] ?>
	<br />
	<?php if ($user['username'] == $this->
	session->userdata('username') || $this->session->userdata('account_type') == "admin"){
	$editUrl = 
	$deleteUrl = base_url()."index.php/reviews/delete/".$review['url'];
	echo "<a href=\"$editUrl\">Edit review</a><br />";
	echo "<a href=\"$deleteUrl\">Delete review</a><br />";}
	?>
<br />
<br />
<br/>
<?php endforeach ?>To do: Display this user's reviews</p>
</div>