<!DOCTYPE html>
<html lang="en">
<head>
<title>Review</title>
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
<div class="sign"><a href="http://cscilab.bc.edu/~diradoor/final/newentry.php">Submit a Review!</div></a>
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

if (isset($_GET['submit']) && isset($_GET['typeofentry']) && isset($_GET['entryloc'])
&& isset($_GET['estname']) && isset($_GET['stars']) && isset($_GET['comments'])) {
handle_entry_form();
} else {
	echo "Fill out all of the fields!";}
display_entry_form();

?>


      <div class="grid_9">


</div>
</div>
</div>
</div>
</body>
</html>


<?php

function display_entry_form(){
?>
	<form>
	Select a type: <br>
		<select name="typeofentry">
			<option disabled selected>Select Eat, Sleep or See</option>
			<option id="typeeat" value="Eat">Eat</option>
			<option id="typesleep" value="Sleep">Sleep</option>
			<option id="typesee" value="See">See</option>
		</select>
	<br> <br>
	Location: <br>
		<select name="entryloc">
			<option disabled selected>Select a City</option>
			<option id="loclondon" value="London">London</option>
			<option id="locparis" value="Paris">Paris</option>
			<option id="locrome" value="Rome">Rome</option>
			<option id="locsydney" value="Sydney">Sydney</option>
			<option id="loctokyo" value="Tokyo">Tokyo</option>
		</select>
	<br> <br>
	Name of establishment: <br>
		<input type="text" name="estname">
	<br> <br>
	How many stars do you rate it? <br>	
		<input type="radio" name="stars" value="1"> 1 <br>
		<input type="radio" name="stars" value="2"> 2 <br>
		<input type="radio" name="stars" value="3"> 3 <br>
		<input type="radio" name="stars" value="4"> 4 <br>
		<input type="radio" name="stars" value="5"> 5 <br>
	<br> <br>
	Any additional comments? <br>
		<textarea rows="5" cols="50" name="comments" value="comments"></textarea>
	<br>
	<br>
	<input type="submit" name="submit" value="Submit Entry!" />
	</form>	
<?php	
}

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

function handle_entry_form(){
	$dbc = connect_to_db( "diradoor" );	
	$type = isset($_GET['typeofentry']) ? $_GET['typeofentry'] : "";
	$location = isset($_GET['entryloc']) ? $_GET['entryloc'] : "";
	$estname = isset($_GET['estname']) ? $_GET['estname'] : "";
	$stars = isset($_GET['stars']) ? $_GET['stars'] : "";
	$comments = isset($_GET['comments']) ? $_GET['comments'] : "";
	$query = "insert into entries (EatSleeporSee, City, EstName, Stars, Comments) 
		values ('$type', '$location', '$estname', '$stars', '$comments')"; 
	$result = perform_query( $dbc, $query );


	if ($dbc->query($query) === TRUE) {
			echo "Thank you for your entry!";
			//header("Location: londoneat.php");
	} else {
		echo "Error: " . $query . "<br>" . $dbc->error;
	}
	//disconnect_from_db( $dbc, $result );
}


?>	
