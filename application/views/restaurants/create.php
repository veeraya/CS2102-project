<form action="<?php echo base_url(); ?>index.php/restaurants/createRestaurant" method="post" name="createRestaurant">
	<h2>Add a restaurant</h2>
	<label for="name">Name</label>
	<input type="text" name="name" id="name"/><br />

	<label for="postalCode">Postal Code</label>
	<input type="text" name="postalCode" id="postalCode" /><br />

	<input type="submit" value="Create" />
</form>