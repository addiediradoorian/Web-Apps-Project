<!DOCTYPE html>
<html lang="en">
<head>
<title>Rome | See</title>
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
</head>


<body>
	<div class="sign">
	<div class="out"><a href="logout.php">Log Out</a></div>
	<a href="http://cscilab.bc.edu/~diradoor/final/newentry.php">Submit a Review!</a>
	</div>

<header>
  <div class="container_12">
    <div class="grid_12">
      <h1><a href="http://cscilab.bc.edu/~diradoor/final/home.html"><img src="images/logo.png" alt="Eat Sleep See"></a></h1>
      <div class="clear"></div>
    </div>
    <div class="menu_block">
      <nav>
        <ul class="sf-menu">
          <li class="current"><a href="http://cscilab.bc.edu/~diradoor/final/home.html">Home</a></li>
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

<div class="table">
<table><tr><th>Eat/Sleep/See</th><th>City</th><th>Place Name</th><th>Stars</th><th>Comments</th></tr>

<?php
show_rome_see();

function connect_to_db( $diradoor ){
	$dbc = @mysqli_connect( "localhost", "diradoor", "nXze83Ks", $diradoor ) or
			die( "Connect failed: ". mysqli_connect_error() );
	return $dbc;
}

function disconnect_from_db( $dbc, $result ){
	mysqli_free_result( $result ); //mysqli_free_result( $result );
	mysqli_close( $dbc );
}


function perform_query( $dbc, $romequery ){
	//echo $query;
	$result = mysqli_query($dbc, $romequery) or 
			die( "bad query".mysqli_error( $dbc ) );
	return $result;
}


/* show tables */

function show_rome_see() {
	$dbc = connect_to_db( "diradoor" );	
	//$parisquery = "select * from entries";
	
	//$result = perform_query( $dbc, $romequery );
	
	$sql = "SELECT DISTINCT EatSleeporSee, City, EstName, Stars, Comments FROM entries
	WHERE EatSleeporSee='see' AND City='rome' ORDER BY EstName ASC";
	$result = $dbc->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr>" . "<td>" . $row["EatSleeporSee"] . " " . "</td>" . "<td>" . $row["City"]
          . "</td>" . " " . "<td>" . $row["EstName"] . " " . "</td>" . "<td>" . $row["Stars"] 
          . " " . "</td>" . "<td>" . $row["Comments"] . "</td>" . "</tr>";
         echo "<br>";
     }
} else {
     echo "0 results";
}
}

?>
</table>
</div>



      <div class="grid_9">


</div>
</div>
</div>
</div>
</body>
</html>
