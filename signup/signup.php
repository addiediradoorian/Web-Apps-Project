<!DOCTYPE html>
<html lang="en">
<head>
<title>Eat Sleep See | Sign Up</title>
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
<div class="sign"><a href="http://cscilab.bc.edu/~diradoor/final/newentry/newentry.php">Submit a Review!</a></div>
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
              <li><a href="http://London/londoneat.php">Eat</a></li>
              <li><a href="London/londonsleep.php">Sleep</a></li>
              <li><a href="London/londonsee.php">See</a></li>
            </ul>
          </li>
          <li class="with_ul"><a>Paris</a>
            <ul>
              <li><a href="Paris/pariseat.php">Eat</a></li>
              <li><a href="Paris/parissleep.php">Sleep</a></li>
              <li><a href="Paris/parissee.php">See</a></li>
            </ul>
          </li>          
	  <li class="with_ul"><a>Rome</a>
            <ul>
              <li><a href="Rome/romeeat.php">Eat</a></li>
              <li><a href="Rome/romesleep.php">Sleep</a></li>
              <li><a href="Rome/romesee.php">See</a></li>
            </ul>
          </li>
          <li class="with_ul"><a>Sydney</a>
            <ul>
              <li><a href="Sydney/sydneyeat.php">Eat</a></li>
              <li><a href="Sydney/sydneysleep.php">Sleep</a></li>
              <li><a href="Sydney/sydneysee.php">See</a></li>
            </ul>
          </li>
          <li class="with_ul"><a>Tokyo</a>
            <ul>
              <li><a href="Tokyo/tokyoeat.php">Eat</a></li>
              <li><a href="Tokyo/tokyosleep.php">Sleep</a></li>
              <li><a href="Tokyo/tokyosee.php">See</a></li>
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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Sign Up</title>
	<style type = "text/css">		  
			body {font-family: Avenir;}
	</style>
</head>
<body>
<?php
if (isset($_GET['submit']) && isset($_GET['firstname']) && isset($_GET['lastname'])
&& isset($_GET['email']) && isset($_GET['password1']) && isset($_GET['password2'])) {
handle_form();
} else {
	echo "Fill out all of the fields!";}
display_form();

?>
</body>

<?php
function display_form(){
?>
	<form name="signupform" method="get">
		First Name: <input type="text" name="firstname" id="firstnamevalue" />
		<br>
		Last Name: <input type="text" name="lastname" id="lastnamevalue" />
		<br>
		Email: <input type="text" name="email" id="emailvalue" />
		<br>
		Enter a password: <input type="password" name="password1" id="passwordvalue1" />
		<br>
		Enter password again: <input type="password" name="password2" id="passwordvalue2" />
		<br>
		<input type="submit" name="submit" value="Sign Up!" />
	</form>
<?php
}

function handle_form(){
	$dbc = connect_to_db( "diradoor" );	
	$firstnamevalue = isset($_GET['firstname']) ? $_GET['firstname'] : "";
	$lastnamevalue = isset($_GET['lastname']) ? $_GET['lastname'] : "";
	$emailvalue = isset($_GET['email']) ? $_GET['email'] : "";
	$passwordvalue1 = isset($_GET['password1']) ? $_GET['password1'] : "";
	$passwordvalue2 = isset($_GET['password2']) ? $_GET['password2'] : "";
	$encoded1 = sha1( $passwordvalue1 );
	$encoded2 = sha1( $passwordvalue2 );
	$query = "insert into signup (firstname, lastname, email, password1, password2) 
		values ('$firstnamevalue', '$lastnamevalue', '$emailvalue', '$encoded1',
		'$encoded2')"; 
	$result = perform_query( $dbc, $query );

	if ($dbc->query($query) === TRUE) {
			echo "Congrats you've successfully signed up!";
			echo "  Click <a href='home.html'>here</a> to start exploring!";

	} else {
		echo "Error: " . $query . "<br>" . $dbc->error;
	}
	//disconnect_from_db( $dbc, $result );
}
?>
</div>



      <div class="grid_9">


</div>
</div>
</div>
</div>
</body>
</html>







