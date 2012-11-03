<div class="container_12">
<form action="<?php echo base_url(); ?>index.php/restaurants/createRestaurant" method="post" name="createRestaurant">
	<h2>Add a restaurant</h2>
	<label for="name">Name</label>
	<input type="text" name="name" id="name"/><br />

	<label for="postalCode">Postal Code</label>
	<input type="text" name="postalCode" id="postalCode" /><br />

	 <!-- address, phone, website, timing, cuisine -->

	 <label for="address">Address</label>
	 <input type="text" name="address" id="address" /><br />

	 <label for="phone">Phone</label>
	 <input type="text" name="phone" id="phone" /><br />

	 <label for="website">Website</label>
	<input type="text" name="website" id="website" /><br />

	<label for="timing">Timing</label>
	<input type="text" name="timing" id="timing" /><br />

	<label for="cuisine">Cuisine</label>
	<label for="cuisine">Cuisine</label>
	<select name="cuisine" id="cuisine" name="cuisine"> 
	  <option value="Asian" >Asian</option>
	  <option value="Chinese" >Chinese</option>
	  <option value="Italian" >Italian</option>
	  <option value="Thai" >Thai</option>
	  <option value="Indian" >Indian</option>
	  <option value="Malay" >Malay</option>
	  <option value="Western" >Western</option>
	  <option value="Japanese" >Japanese</option>
	  <option value="Snack" >Snack</option>
	  <option value="Dessert" >Dessert</option>
	</select>

	<input type="submit" class="btn" value="Create" />
</form>
</div>