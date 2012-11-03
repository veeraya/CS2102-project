<div class="container_12">
<form action="<?php echo base_url(); ?>index.php/restaurants/<? echo $restaurantUrl ?>/processCreateReview" method="post" name="processCreateReview">
	<h2>Submit a review</h2>
	<label for="title">Title</label><br />
		<input type="text" name="title" id="title" class="input-xxlarge"/><br /><br />
		<label for="content">Content</label><br />
		<textarea name="content" cols="130" rows="15"></textarea><br /><br />
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

	<input type="submit" class="btn" value="Submit" />
</form>
</div>