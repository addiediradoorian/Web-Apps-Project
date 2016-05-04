<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Login</title>
	<h1>Eat Sleep See</h1>
	<style type = "text/css">		  
			body {font-family: Avenir;}
	</style>
</head>
<body>

<?php
$email = isset( $_POST['email'] ) ? $_POST['email'] : "";
$password = isset( $_POST['password'] ) ? $_POST['password'] : "";
display_login_form($email, $password);


function display_login_form(){
?>
	<form method=POST action="logincookie.php">
		Email: <input type="text" name="email">
		<br>
		Password: <input type="password" name="password">
		<br>
		<input type="submit" name="submit" value="Log in!">
		<input type="hidden" name="submitted" value="true">
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
