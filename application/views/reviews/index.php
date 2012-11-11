<div class="container_12">
<h2>All reviews</h2>
<ul>
<!-- Display each review and its commments -->
<?php foreach ($reviews as $review): ?>
    <li>
    <h3><?php echo $review['title'] ?></h3>
    <b>Restaurant reviewed:</b> <a href="<?php echo base_url()."index.php/restaurants/".url_title($review['restaurant_name']." ".$review['restaurant_postal_code'], 'dash', TRUE) ?>"><?php echo $review['restaurant_name'] ?></a><br />
	<b>Reviewed by:</b> <?php echo $review['user_email'] ?><br />
    <b>Content:</b> <?php echo $review['content'] ?><br />
    <b>Food Rating:</b> <?php echo $review['food_rating'] ?><br />
    <b>Service Rating:</b> <?php echo $review['service_rating'] ?><br />
    <b>Recommend?:</b>  <?php if ($review['recommend'] == 1) echo "Yes"; else echo "No"; ?><br />

    <!-- Admin function to edit and delete review -->
    <?php
		$editUrl = base_url()."index.php/reviews/edit/".$review['url'];
		$deleteUrl = base_url()."index.php/reviews/delete/".$review['url'];
		echo "<a href=\"$editUrl\">Edit review</a><br />";
		echo "<a href=\"$deleteUrl\">Delete review</a><br /><br />";

    ?>

    <!-- Display comments -->
    <b>Comments</b><br />
    <ul>
    <?php
        foreach ($review['comments'] as $comment){
            echo "<li>".$comment['content'];
            $deleteUrl = base_url()."index.php/comments/delete/".$comment['id'];
            echo "<a href=\"$deleteUrl\">  DELETE</a>";
            echo "</li>";
        }
	 ?>
    </ul>

     <br />
     <!-- Show comment box if the user is logged-in -->
    <form action="<?php echo base_url(); ?>index.php/comments/create/<?php echo $review['url'] ?>" method="post" name="createComment">
        <input type="text" name="<?php echo $review['url'] ?>_content" id="<?php echo $review['url'] ?>_content" placeholder="Add comment" />
        <input type="submit" class="btn" value="Add" /><br />
    </form>
    </li>
<?php endforeach ?>
</ul>
</div>