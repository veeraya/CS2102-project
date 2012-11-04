 <!--<?php echo "<pre>";
  echo var_dump($randomRestaurants);
  echo "</pre>";
  ?> -->
<div class="wrapper col3">
  <div id="featured_slide">
  <div id="homepage">
    <!-- ####################################################################################################### -->
    <!--<div id="piecemaker"> <img src="assets/images/demo/piecemaker/960x360.gif" alt="" /> </div>-->
    <div id="hpage_slider" class="clear" style="width:960px; height:380px;">
          <div class="item"><img src="<?php echo base_url() ?>assets/images/demo/featured-project/1.jpg" alt="" width="940px" height="360px"/></div>
          <div class="item"><img src="<?php echo base_url() ?>assets/images/demo/featured-project/2.jpg" alt="" width="940px" height="360px"/></div>
          <div class="item"><img src="<?php echo base_url() ?>assets/images/demo/featured-project/3.jpg" alt="" width="940px" height="360px"/></div>
          <div class="item"><img src="<?php echo base_url() ?>assets/images/demo/featured-project/4.jpg" alt="" width="940px" height="360px"/></div>
          <div class="item"><img src="<?php echo base_url() ?>assets/images/demo/featured-project/5.jpg" alt="" width="940px" height="360px"/></div>
        </div>
        </div>
    <!-- ####################################################################################################### -->
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->
    <div id="shout" class="clear">
      <div class="fl_left">
        <h2>Hungry is it?</h2>
        <p>Why not try our services today, you won't regret your choice !</p>
      </div>
      <p class="fl_right"><a href="<?php echo base_url(); ?>index.php/auth/login">Sign Up Now!</a></p>
    </div>
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear">
      <div class="fl_left">
        <h2>Featured Food and Restaurant</h2>
        <div id="hpage_slider1">
<!--           <div class="item"><img src="assets/images/demo/featured-project/6.jpg" alt="" width="480px" height="320px"/></div>
 -->          <?php foreach ($randomRestaurants as $restaurant): ?>
          <div class="item">
              <h3><a href="<?php echo base_url(); ?>index.php/restaurants/<?php echo $restaurant['url'] ?>"><?php echo $restaurant['name'] ?></a></h3>
              <b>Cuisine:</b> <?php echo $restaurant['cuisine'] ?><br />
              <b>Food rating:</b> <?php echo $restaurant['food_rating'] ?><br />
              <b>Service Rating:</b> <?php echo $restaurant['service_rating'] ?><br />
              <b>% recommended:</b> <?php echo ($restaurant['recommend_percent']*100); ?><br />
            </div>
          <?php endforeach ?>
        </div><br/><br/>

        <h2>Latest Reviews</h2>
     <?php foreach ($latestReviews as $review): ?>
          <div class="item1">
              <h3><a href="<?php echo base_url(); ?>index.php/reviews/view/<?php echo $review['url'] ?>"><?php echo $review['title'] ?></a></h3>
              <b><i><?php echo $review['restaurant_name'] ?></i></b> <br />
              <?php echo substr($review['content'], 0, 138)."..."; ?><br />
              <b>Food rating:</b> <?php echo $review['food_rating'] ?><br />
              <b>Service Rating:</b> <?php echo $review['service_rating'] ?><br />
              <b>Recommend:</b> <?php if ($review['recommend'] == 1) echo "Yes"; else echo "No"; ?><br /><br />
            </div>
          <?php endforeach ?>      
       
      </div>
      <div class="fl_right">
        <h2>Search</h2>
        <form action="<?php echo base_url(); ?>index.php/search/search" method="post" id="search_body">
          <fieldset>
          <label>Name of Restaurant:</label>
            <input type="text" id="Name" name="Name" value="Name of Restaurant&hellip;" onfocus="this.value=(this.value=='Name of Restaurant/ Dish&hellip;' || this.value=='')? '' : this.value ;" />
            
            </br>
             </br> </br> 
             <label>Cuisine:</label><br/>
           
  <select name="cuisine" id="cuisine" name="cuisine" style="display:block; 	float:left;	width:283px; height:33px; margin:0; padding:1px 1px; color:#989898; background:url("assets/images/newsletter_form.gif") 0 0 no-repeat #FAFAFA; border:none;"> 
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
  </select>
            </br>
             </br> 
             <label>Location:</label><br/>
             
   <select name="location" id="location" name="location" style="display:block; 	float:left;	width:283px; height:33px; margin:0; padding:1px 1px; color:#989898; background:url("assets/images/newsletter_form.gif") 0 0 no-repeat #FAFAFA; border:none;"> 
     <option value="" ></option>
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
            
            <br/>
            
           

            <input type="Submit" id="subscribe" src="images/sign-up.gif" value="Search" alt="Submit" />
          </fieldset>
        </form>

       
      </div>
    </div>
    <!-- ####################################################################################################### -->
  </div>
</div>
<!-- ####################################################################################################### -->
