<div class="container_12">
<p>
Title: <?php echo $review['title'] ?> <br />
Content: <?php echo $review['content'] ?> <br />
Food rating: <?php echo $review['food_rating'] ?> <br />
Service rating: <?php echo $review['service_rating'] ?> <br />
Recommend:  <?php if ($review['recommend'] == 1) echo "Yes"; else echo "No"; ?> <br /><br />
<?php
	if (isset($this->session->userdata['email']) && isset($this->session->userdata['account_type']) && ($this->session->userdata['email'] == $review['user_email'] || $this->session->userdata['account_type'] == "admin")){
		$editUrl = base_url()."index.php/reviews/edit/".$review['url'];
		$deleteUrl = base_url()."index.php/reviews/delete/".$review['url'];
		echo "<a href=\"$editUrl\">Edit review</a><br />";
		echo "<a href=\"$deleteUrl\">Delete review</a><br /><br />";
	}
?>

</p>
</div>