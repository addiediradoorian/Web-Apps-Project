<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Contact Us</title>
	<h1>Contact Us</h1>
	<style type = "text/css">		  
			body {font-family: Avenir;}
	</style>
</head>
<body>
<?php
display_contact_form();
if (isset($_GET['submit'])) 
	handle_contact_form();

?>
</body>

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

