<!DOCTYPE html>
<html>
  <head>
    <title>CS2102 Project</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
  	<div class="navbar navbar-fixed-top">
  	      <div class="navbar-inner">
  	        <div class="container">
  	          <a class="brand" href="<?php echo base_url() ?>">CS2102</a>
  	          <div class="nav-collapse collapse">
  	            <ul class="nav">
  	              <li><a href="<?php echo base_url() ?>index.php/restaurants">Restaurants</a></li>
  	              <li><a href="<?php echo base_url() ?>index.php/reviews">Reviews</a></li>
  	              <li><a href="<?php echo base_url() ?>index.php/users">Users</a></li>
  	            </ul>
              
                <?php if (!$this->session->userdata('username')) {
                  $loginUrl = base_url()."index.php/auth/processLogin";
                  $signupUrl = base_url()."index.php/users/create";
                echo <<<"EOT"
                <ul class="nav pull-right">
                  <li><a href="$signupUrl">Sign up!</a></li>
                  </ul>
                <form class="navbar-form pull-right" action="$loginUrl" method="post" name="processLogin">
                  <input class="span2" type="text" name="email" placeholder="Email">
                  <input class="span2" type="password" name="password" placeholder="Password">
                  <button type="submit" class="btn">Log in</button>
                </form>

               
EOT;

                }
                else {
                  $logoutUrl = base_url()."index.php/auth/logout";
                  $username = $this->session->userdata('username');
                  $profileUrl = base_url()."index.php/users/view/".$username;
                  echo <<<"ABC"
                  <ul class="nav pull-right">
                  <li><a href="$profileUrl">Dashboard</a>
                  <li><a href="$logoutUrl">Logout</a></li>
                  </ul>
ABC;

                }
                ?>

  	          </div><!--/.nav-collapse -->
  	        </div>
  	      </div>
  	    </div>
  	<div class="container">
