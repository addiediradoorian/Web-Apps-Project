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
	echo '
		<form action= "reset.php" method="POST">
		Email Address: <input type="text" name="email" size="20" /><br>
		New Password: <input type="password" name="password" size="20" /><br>
		Confirm Password: <input type="password" name="confirmpassword" size="20" /><br>
		<input type="hidden" name="q" value-""';
	if (isset($_GET["q"])){
		echo $_GET["q"];
}
	echo '" /><input type="submit" name="ResetPasswordForm" value=" Reset Password " />
		</form>';
?>
