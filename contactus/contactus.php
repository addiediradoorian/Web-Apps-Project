<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact Us</title>
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
<div class="out"><a href="logout.php">Log Out</a></div>
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
              <li><a href="http://cscilab.bc.edu/~diradoor/final/londoneat.php">Eat</a></li>
              <li><a href="http://cscilab.bc.edu/~diradoor/final/londonsleep.php">Sleep</a></li>
              <li><a href="http://cscilab.bc.edu/~diradoor/final/londonsee.php"">See</a></li>
            </ul>
          </li>
          <li class="with_ul"><a>Paris</a>
            <ul>
              <li><a href="http://cscilab.bc.edu/~diradoor/final/pariseat.php">Eat</a></li>
              <li><a href="http://cscilab.bc.edu/~diradoor/final/parissleep.php">Sleep</a></li>
              <li><a href="http://cscilab.bc.edu/~diradoor/final/parissee.php">See</a></li>
            </ul>
          </li>          
	  <li class="with_ul"><a>Rome</a>
            <ul>
              <li><a href="http://cscilab.bc.edu/~diradoor/final/romeeat.php">Eat</a></li>
              <li><a href="http://cscilab.bc.edu/~diradoor/final/romesleep.php">Sleep</a></li>
              <li><a href="http://cscilab.bc.edu/~diradoor/final/romesee.php">See</a></li>
            </ul>
          </li>
          <li class="with_ul"><a>Sydney</a>
            <ul>
              <li><a href="http://cscilab.bc.edu/~diradoor/final/sydneyeat.php">Eat</a></li>
              <li><a href="http://cscilab.bc.edu/~diradoor/final/sydneysleep.php">Sleep</a></li>
              <li><a href="http://cscilab.bc.edu/~diradoor/final/sydneysee.php">See</a></li>
            </ul>
          </li>
          <li class="with_ul"><a>Tokyo</a>
            <ul>
              <li><a href="http://cscilab.bc.edu/~diradoor/final/tokyoeat.php">Eat</a></li>
              <li><a href="http://cscilab.bc.edu/~diradoor/final/tokyosleep.php">Sleep</a></li>
              <li><a href="http://cscilab.bc.edu/~diradoor/final/tokyosee.php">See</a></li>
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
if (isset($_GET['submit']) && isset($_GET['name']) && isset($_GET['email'])
&& isset($_GET['comments'])) {
handle_contact_form();
} else {
	echo "Fill out all of the fields!";}
display_contact_form();

?>




      <div class="grid_9">


</div>
</div>
</div>
</div>
</body>
</html>


<?php
function display_contact_form(){
?>
	<form name="signupform" method="get">
		Name: <input type="text" name="name" id="namevalue" />
		<br>
		Email: <input type="text" name="email" id="emailvalue" />
		<br>
		Message: <br>
		<textarea rows="5" cols="50" name="comments" value="comments"></textarea>
		<br>
		<input type="submit" name="submit" value="Send us a message!" />
	</form>
<?php
}

//include('dbconn.php');


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


function handle_contact_form(){
	$dbc = connect_to_db( "diradoor" );	
	$name = isset($_GET['name']) ? $_GET['name'] : "";
	$email = isset($_GET['email']) ? $_GET['email'] : "";
	$message = isset($_GET['comments']) ? $_GET['comments'] : "";
	$query = "insert into contactus (name, email, message) 
		values ('$name', '$email', '$message')"; 
	$result = perform_query( $dbc, $query );


	if ($dbc->query($query) === TRUE) { 
			echo "Thank you for your feedback!";
	} else {
		echo "Error: " . $query . "<br>" . $dbc->error;
	}
	//disconnect_from_db( $dbc, $result );
}
?>
