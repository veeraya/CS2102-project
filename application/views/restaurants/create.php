<form action="<?php echo base_url(); ?>index.php/restaurants/createRestaurant" method="post" name="createRestaurant">
	
	<label for="name">Name</label><br />
	<input type="text" name="name" id="name"/><br />

	<label for="postalCode">Postal Code</label><br />
	<input type="text" name="postalCode" id="postalCode" /><br />

	<input type="submit" value="Create" />
</form>