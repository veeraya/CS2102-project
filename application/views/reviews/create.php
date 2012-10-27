<form action="<?php echo base_url(); ?>index.php/restaurants/<? echo $restaurantUrl ?>/processCreateReview" method="post" name="processCreateReview">
	<h2>Submit a review</h2>
	<label for="title">Title</label>
	<input type="text" name="title" id="title" class="input-xxlarge"/><br />
	<label for="content">Content</label>
	<textarea name="content" id="content" rows="8" class="input-xxlarge"></textarea><br />
	<label for="foodRating">Food Rating</label>
	<select name="foodRating"> 
	  <option value="1" >1</option>
	  <option value="2" >2</option>
	  <option value="3" >3</option>
	  <option value="4" >4</option>
	  <option value="5" >5</option>
	</select><br />
	<label for="serviceRating">Service Rating</label>
	<select name="serviceRating"> 
	  <option value="1" >1</option>
	  <option value="2" >2</option>
	  <option value="3" >3</option>
	  <option value="4" >4</option>
	  <option value="5" >5</option>
	</select><br />

	<label for="recommend">Would you recommend this restaurant to your friends?</label>
	<input type="radio" name="recommend" value="1">Yes<br />
	<input type="radio" name="recommend" value="0">No<br /><br />


	<input type="submit" class="btn" value="Submit" />
</form>