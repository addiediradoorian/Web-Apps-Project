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
	<title>Forgot Password</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<form action="change.php" method="POST">
	Email Address: <input type="text" name="email" size="20"/> <input type="submit" 
	name=:ForgotPassword" value=" Request Reset " />
	</form>
</body>
</html>
