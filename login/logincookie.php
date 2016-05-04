<?php

//connect to db
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

//set cookies

$debug = 1;
if ( ! isset( $_POST['email'] ) or  
		! isset( $_POST['password'] ) or 
		( 0 == checklogin( $_POST['email'], $_POST['password'] ) ) ) {
	//echo "You logged in!";
  header("Location: home.html"); //this is not where it should go
 
 } else { 
	// Store the login information in cookies	
	setcookie('loginCookieUser', $_POST['email']);
  	header("Location: signup.php");
}

function checklogin($email, $password){
	$encoded1 = sha1($password);
	$query = "SELECT * FROM signup WHERE email='$email' and password1='$encoded1'";
	$dbc = connect_to_db("diradoor");
	$result = perform_query($dbc, $query);
	$matches = mysqli_num_rows($result);
	mysqli_free_result($result);
	return($matches != 0);
}

