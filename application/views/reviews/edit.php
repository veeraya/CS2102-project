<?php 
if ($this->session->userdata('account_type') != "admin" && $review['user_email'] != $this->session->userdata('email')){
	redirect('auth/unauthorized');
} ?>
<div class="container_12">
<form action="<?php echo base_url(); ?>index.php/reviews/processEdit" method="post" name="processEdit">
	<h2>Edit your review</h2>
	<label for="title">Title</label><br />
	<input type="text" name="title" id="title" class="input-xxlarge" value="<?php echo $review['title']; ?>"/><br /><br />
	<label for="content">Content</label><br />
	<textarea name="content" cols="130" rows="15"><?php echo $review['content']; ?></textarea><br /><br />
	<label for="foodRating">Food Rating</label><br />
	<select name="foodRating" id="foodRating"> 
	  <option value="1" >1</option>
	  <option value="2" >2</option>
	  <option value="3" >3</option>
	  <option value="4" >4</option>
	  <option value="5" >5</option>
	</select><br /><br />
	<label for="serviceRating">Service Rating</label><br />
	<select name="serviceRating" id="serviceRating"> 
	  <option value="1" >1</option>
	  <option value="2" >2</option>
	  <option value="3" >3</option>
	  <option value="4" >4</option>
	  <option value="5" >5</option>
	</select><br /><br />

	<label for="recommend">Would you recommend this restaurant to your friends?</label><br />
	<input type="radio" name="recommend" id="doRecommend" value="1">Yes<br />
	<input type="radio" name="recommend" id="dontRecommend" value="0">No<br /><br />

	<input type="hidden" name="restaurantName" value="<?php echo $review['restaurant_name']; ?>"/>
	<input type="hidden" name="restaurantPostalCode" value="<?php echo $review['restaurant_postal_code']; ?>"/>
	<input type="hidden" name="userEmail" value="<?php echo $review['user_email']; ?>"/>
	<input type="hidden" name="updatedOn" value="<?php echo $review['updated_on']; ?>"/>
	<input type="hidden" name="url" value="<?php echo $review['url']; ?>"/>

	<input type="submit" class="btn" value="Submit" />
</form>
</div>

<script type="text/javascript">
var serviceRating = document.getElementById('serviceRating');
var index = "<?php echo $review['service_rating'] ?>" - 1;
serviceRating.options[index].selected = true;

var foodRating = document.getElementById('foodRating');
index = "<?php echo $review['food_rating'] ?>" - 1;
foodRating.options[index].selected = true;

if ("<?php echo $review['recommend'] ==1 ?>")
	document.getElementById('doRecommend').checked = true;
else
	document.getElementById('dontRecommend').checked = true;

</script>