<?php 
if ($this->session->userdata('account_type') != "admin"){
	redirect('auth/unauthorized');
} ?>
<div class="container_12">
<form action="<?php echo base_url(); ?>index.php/restaurants/processEdit" method="post" name="processEdit">
	<h2>Edit restaurant</h2>
	<label for="name">Name</label><br />
	<input type="text" name="name" id="name" class="input-xxlarge" value="<?php echo $restaurant['name']; ?>"/><br /><br />
	<label for="postalCode">Postal Code</label><br />
	<input type="text" name="postalCode" id="postalCode" class="input-xxlarge" value="<?php echo $restaurant['postal_code']; ?>"/><br /><br />
	<label for="address">Address</label><br />
	<input type="text" name="address" id="address" class="input-xxlarge" value="<?php echo $restaurant['address']; ?>"/><br /><br />

	 <label>Location:</label><br/>	          
	<select name="location" id="location" name="location"> 
	  <option value="Aljunied" >Aljunied</option>
	  <option value="Ang Mo Kio" >Ang Mo Kio</option>
	  <option value="Balestier Road" >Balestier Road</option>
	  <option value="Bedok" >Bedok</option>
	  <option value="Bishan" >Bishan</option>
	  <option value="Bugis" >Bugis</option>
	  <option value="Chinatown" >Chinatown</option>
	  <option value="Geylang" >Geylang</option>
	  <option value="Jurong East" >Jurong East</option>
	  <option value="Kallang" >Kallang</option>
	  <option value="Tampines" >Tampines</option>
	  <option value="Toa Payoh" >Toa Payoh</option>
	  <option value="Tiong Bahru" >Tiong Bahru</option>
	  <option value="West Coast" >West Coast</option>
	</select><br/>

	<label for="phone">Phone</label><br />
	<input type="text" name="phone" id="phone" class="input-xxlarge" value="<?php echo $restaurant['phone']; ?>"/><br /><br />

	<label for="website">Website</label><br />
	<input type="text" name="website" id="website" class="input-xxlarge" value="<?php echo $restaurant['website']; ?>"/><br /><br />

	<label for="timing">Timing</label><br />
	<input type="text" name="timing" id="timing" class="input-xxlarge" value="<?php echo $restaurant['timing']; ?>"/><br /><br />
	         
	 <label>Cuisine:</label><br/>         
	<select name="cuisine" id="cuisine" name="cuisine" > 
	  <option value="" ></option>
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
	</select><br />

	<input type="hidden" name="oldName" value="<?php echo $restaurant['name']; ?>"/>
	<input type="hidden" name="oldPostalCode" value="<?php echo $restaurant['postal_code']; ?>"/>
	<input type="submit" class="btn" value="Submit" />
</form>
</div>

<script type="text/javascript">

window.onload = function execute(){
	console.log("in function execute");
var location = document.getElementById('location');
for (var i=0; i<location.options.length; i++){
		if (location.options[i].value == "<?php echo $restaurant['location']; ?>")
			location.options[i].selected = true;
	}

	var cuisine = document.getElementById('cuisine');
	for (var i=0; i<cuisine.options.length; i++){
		if (cuisine.options[i].value == "<?php echo $restaurant['cuisine']; ?>")
		cuisine.options[i].selected = true;
	}
}
</script>