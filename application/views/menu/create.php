<div class="container_12">
<form action="<?php echo base_url(); ?>index.php/restaurants/<? echo $restaurantUrl ?>/processCreateMenu" method="post" name="processCreateMenu">	
	<h2>Add a dish</h2>
	<label for="name">Name</label>
	<input type="text" name="name" id="name"/><br />

	<label for="price">Price</label>
	<input type="text" name="price" id="price" /><br />

	 <label for="type">Type</label>
	 <input type="text" name="type" id="type" /><br />

	 <label for="cuisine">Cuisine</label>
	 <input type="text" name="cuisine" id="cuisine" /><br />

	<label for="description">Description</label>
	<input type="text" name="description" id="description" /><br />


	<input type="submit" class="btn" value="Create" />
</form>
</div>