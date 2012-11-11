<div class="container_12">
<?php $restaurantName = $reviews[0]['restaurant_name']; ?>
<h2>All reviews for <?php  echo $restaurantName ?></h2>

<ul>
<!-- Display each review and its commments -->
<?php foreach ($reviews as $review): ?>
    <li>
    <h3><?php echo $review['title'] ?></h3>
	<b>Reviewed by:</b> <?php echo $review['user_email'] ?><br />
    <b>Content:</b> <?php echo $review['content'] ?><br />
    <b>Food Rating:</b> <?php echo $review['food_rating'] ?><br />
    <b>Service Rating:</b> <?php echo $review['service_rating'] ?><br />
    <b>Recommend?:</b>  <?php if ($review['recommend'] == 1) echo "Yes"; else echo "No"; ?><br />
    <?php
        // Admin function to edit and delete review
		if (isset($this->session->userdata['email']) && isset($this->session->userdata['account_type']) && ($this->session->userdata['email'] == $review['user_email'] || $this->session->userdata['account_type'] == "admin")){
			$editUrl = base_url()."index.php/reviews/edit/".$review['url'];
			$deleteUrl = base_url()."index.php/reviews/delete/".$review['url'];
			echo "<a href=\"$editUrl\">Edit review</a><br />";
			echo "<a href=\"$deleteUrl\">Delete review</a><br /><br />";
		}
?>
    <b>Comments</b><br />
    <ul>
    <?php
        foreach ($review['comments'] as $comment){
            echo "<li>".$comment['content']."</li>";
        }
	 ?>
    </ul>

     <br />
    <form action="<?php echo base_url(); ?>index.php/comments/create/<?php echo $review['url'] ?>" method="post" name="createComment">
     <input type="text" name="<?php echo $review['url'] ?>_content" id="<?php echo $review['url'] ?>_content" placeholder="Add comment" />
     <input type="submit" class="btn" value="Add" /><br />
 </form>
    </li>
<?php endforeach ?>
</ul>
</div>
