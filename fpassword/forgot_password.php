<!DOCTYPE html>
<html lang="en">
<head>
<title>London | Sleep</title>
<meta charset="utf-8">
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.ui.totop.js"></script>
<script>
$(window).load(function () {
    $().UItoTop({
        easingType: 'easeOutQuart'
    });
});
</script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
<div class="sign"><a href="newentry.php">Submit a Review!</div></a>
</head>


<body>
<header>
  <div class="container_12">
    <div class="grid_12">
      <h1><a href="home.html"><img src="images/logo.png" alt="Eat Sleep See"></a></h1>
      <div class="clear"></div>
    </div>
    <div class="menu_block">
      <nav>
        <ul class="sf-menu">
          <li class="current"><a href="home.html">Home</a></li>
          <li class="with_ul"><a>London</a>
            <ul>
              <li><a href="londoneat.php">Eat</a></li>
              <li><a href="londonsleep.php">Sleep</a></li>
              <li><a href="londonsee.php">See</a></li>
            </ul>
          </li>
          <li class="with_ul"><a>Paris</a>
            <ul>
              <li><a href="pariseat.php">Eat</a></li>
              <li><a href="parissleep.php">Sleep</a></li>
              <li><a href="parissee.php">See</a></li>
            </ul>
          </li>          
	  <li class="with_ul"><a>Rome</a>
            <ul>
              <li><a href="romeeat.php">Eat</a></li>
              <li><a href="romesleep.php">Sleep</a></li>
              <li><a href="romesee.php">See</a></li>
            </ul>
          </li>
          <li class="with_ul"><a>Sydney</a>
            <ul>
              <li><a href="sydneyeat.php">Eat</a></li>
              <li><a href="sydneysleep.php">Sleep</a></li>
              <li><a href="sydneysee.php">See</a></li>
            </ul>
          </li>
          <li class="with_ul"><a>Tokyo</a>
            <ul>
              <li><a href="tokyoeat.php">Eat</a></li>
              <li><a href="tokyosleep.php">Sleep</a></li>
              <li><a href="tokyosee.php">See</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>

</header>



<div class="main">
  <div class="content">
 <div class="container_12">

<?php
function connect_to_db( $diradoor ){
	$dbc = @mysqli_connect( "localhost", "diradoor", "nXze83Ks", $diradoor ) or
			die( "Connect failed: ". mysqli_connect_error() );
	return $dbc;
}
function disconnect_from_db( $dbc, $result ){
	mysqli_free_result( $result ); //mysqli_free_result( $result );
	mysqli_close( $dbc );
}
function perform_query( $dbc, $query ){
	//echo $query;
	$result = mysqli_query($dbc, $query) or 
			die( "bad query".mysqli_error( $dbc ) );
	return $result;
}
?>
	<form action="change.php" method="POST">
	Email Address: <input type="text" name="email" size="20"/> <input type="submit" 
	name=:ForgotPassword" value=" Request Reset " />
	</form>


      <div class="grid_9">


</div>
</div>
</div>
</div>
</body>
</html>
