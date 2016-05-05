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
	<h1>Eat Sleep See</h1>
	<style type = "text/css">		  
			body {font-family: Avenir;}
	</style>
</head>
<body>
<?php
display_form();
if (isset($_GET['submit']))
	handle_form();

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
