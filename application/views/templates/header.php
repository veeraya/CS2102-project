<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>PhotoProwess</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="assets/styles/layout.css" type="text/css" />
<script type="text/javascript" src="assets/scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="assets/scripts/jquery.defaultvalue.js"></script>
<script type="text/javascript" src="assets/scripts/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="assets/scripts/jquery.scrollTo-min.js"></script>
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
<script type="text/javascript" src="assets/scripts/jquery.cycle.min.js"></script>
<script type="text/javascript" src="assets/scripts/jquery.cycle.setup.js"></script>
<script type="text/javascript" src="assets/scripts/piecemaker/swfobject/swfobject.js"></script>
<script type="text/javascript">
var flashvars = {};
flashvars.cssSource = "assets/scripts/piecemaker/piecemaker.css";
flashvars.xmlSource = "assets/scripts/piecemaker/piecemaker.xml";
var params = {};
params.play = "false";
params.menu = "false";
params.scale = "showall";
params.wmode = "transparent";
params.allowfullscreen = "true";
params.allowscriptaccess = "sameDomain";
params.allownetworking = "all";
swfobject.embedSWF('assets/scripts/piecemaker/piecemaker.swf', 'piecemaker', '960', '430', '10', null, flashvars, params, null);
</script>
<!-- End Homepage Only Scripts -->
</head>
<body id="top">
<div class="wrapper col1">
  <div id="topbar" class="clear">
      <ul class="nav pull-right">
        <li></li>
      </ul>
      <span float="right">
      <form class="navbar-form pull-right" action="http://pook.in/CS2102-project/index.php/auth/processLogin" method="post" name="processLogin" id="search">
        <input class="span2" type="text" name="email" id="email" placeholder="Email">
        <input class="span2" type="password" name="password" placeholder="Password">
        <button type="submit" class="btn" id="login">Log in</button>
          <a href="http://pook.in/CS2102-project/index.php/users/create">Sign up!</a>
      </form>
    
      </span>

  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="index.html">WTF!</a></h1>
      <p>Where's The Food</p>
    </div>
    <div id="topnav">
      <ul>
        <li><a href="#">Add Restaurant</a></li>
        <li><a href="#">Add a Review</a></li>
        <li><a href="#">Profile</a></li>
        <li class="active"><a href="homepage.html">Homepage</a></li>
      </ul>
    </div>
  </div>
</div>
