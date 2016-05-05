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
	//echo "not logged in!";
  //header("Location: home.html");
 
 } else { 
	setcookie('loginCookieUser', $_POST['email']);
  	//header("Location: home.html");
}

if (isset( $_POST['op'] ))
	handleForm( $_POST['op'] );
	//display_login_form();
	
function handleForm( $op ) {
		$entered_name = $_POST['name'];	
		$entered_passwd = $_POST['pass'];
		
		switch ( $op ) {
		case "validate":
			validate_user( $entered_name, $entered_passwd );	
			break;
		default:
			die( "Invalid operation" );
	}	
}	
function validate_user( $name, $pw ){
	$encode = sha1( $pw );
	$query = "SELECT * from signup WHERE email='$name' 
	AND password1='$encode'";
	$dbc = connect_to_db( "diradoor" );
	$result = perform_query( $dbc, $query );
	$row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
	//$row = $result->fetch_assoc();
	//echo "<pre>";
	//print_r($row);
	//echo "</pre>";
	if ( mysqli_num_rows( $result ) == 0) 
		echo "<br>Validate Failure - $query"; 
	 else 
	 	header("Location: home.html");
		//echo "<br>Validate Success - $query";
	
}

/*
function checklogin($email, $password){
	$encoded1 = sha1($password);
	$query = "SELECT * FROM signup WHERE email='$email' and password1='$encoded1'";
	$dbc = connect_to_db("diradoor");
	$result = perform_query($dbc, $query);
	//$row =mysqli_fetch_array( $result, MYSQLI_ASSOC );
	$matches = mysqli_num_rows($result);
	mysqli_free_result($result);
	return($matches != 0);
*/
	
	/*
	if ( mysqli_num_rows( $result ) == 0) {
		echo "<br>Validate Failure - $query";
	} else {
		header("Location: home.html");
		//echo "<br>Validate Success - $query";
	}  
*/
