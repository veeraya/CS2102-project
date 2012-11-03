<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>PhotoProwess</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/styles/layout.css" type="text/css" />
<!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/styles/reset.css" type="text/css" /> -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/styles/grid.css" type="text/css" />


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="assets/script.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/jquery.defaultvalue.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/jquery.scrollTo-min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $("#fullname, #validemail, #message").defaultvalue("Full Name", "Email Address", "Message");
    $('#shout a').click(function () {
        var to = $(this).attr('href');
        $.scrollTo(to, 1200);
        return false;
    });
    $('a.topOfPage').click(function () {
        $.scrollTo(0, 1200);
        return false;
    });
    $("#tabcontainer").tabs({
        event: "click"
    });
});
</script>
<!-- Homepage Only Scripts -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/jquery.cycle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/jquery.cycle.setup.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/scripts/piecemaker/swfobject/swfobject.js"></script>
<script type="text/javascript">
var flashvars = {};
flashvars.cssSource = "<?php echo base_url() ?>assets/scripts/piecemaker/piecemaker.css";
flashvars.xmlSource = "<?php echo base_url() ?>assets/scripts/piecemaker/piecemaker.xml";
var params = {};
params.play = "false";
params.menu = "false";
params.scale = "showall";
params.wmode = "transparent";
params.allowfullscreen = "true";
params.allowscriptaccess = "sameDomain";
params.allownetworking = "all";
swfobject.embedSWF('<?php echo base_url() ?>assets/scripts/piecemaker/piecemaker.swf', 'piecemaker', '960', '430', '10', null, flashvars, params, null);
</script>
<!-- End Homepage Only Scripts -->
</head>
<body id="top">
<div class="wrapper col1">
  <div id="topbar" class="clear">

    <?php if (!$this->session->userdata('username')) {
      $loginUrl = base_url()."index.php/auth/processLogin";
      $signupUrl = base_url()."index.php/auth/login";
      echo <<<"EOT"
      <form action="$loginUrl" method="post" name="processLogin" id="search">
        <input class="span2" type="text" name="email" placeholder="Email">
        <input class="span2" type="password" name="password" placeholder="Password">
        <button type="submit" class="btn" id="login">Log in</button>
        <a href="$signupUrl">Sign up!</a>
      </form>
EOT;
}
        else {
          $logoutUrl = base_url()."index.php/auth/logout";
          $username = $this->session->userdata('username');
          $profileUrl = base_url()."index.php/users/view/".$username;
          $searchGif = base_url()."assets/images/search.gif";
          echo <<<"ABC"
          <form action="#" method="post" id="search">
            <fieldset>
              <legend>Search</legend>
              <input type="text" value="Search" onfocus="this.value=(this.value=='Search')? '' : this.value ;">
              <input type="image" id="go" src="$searchGif" alt="Search">
            </fieldset>
          </form>
          <ul>
          <li><a href="$profileUrl">Dashboard</a>
          <li><a href="$logoutUrl">Logout</a></li>
          </ul>
ABC;
}
    ?> 

  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="<?php echo base_url() ?>">WTF!</a></h1>
      <p>Where's The Food</p>
    </div>
    <div id="topnav">
      <ul>
        <li><a href="<?php echo base_url() ?>index.php/restaurants/create">Add Restaurant</a></li>
        <li><a href="<?php echo base_url() ?>index.php/restaurants/best">Best Restaurants</a></li>
        <li><a href="<?php echo base_url() ?>index.php/restaurants">Browse Restaurants</a></li>
        <li><a href="<?php echo base_url() ?>">Homepage</a></li>
      </ul>
    </div>
  </div>
</div>

