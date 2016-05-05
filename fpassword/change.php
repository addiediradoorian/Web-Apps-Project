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

// Was the form submitted?
	if (isset($_POST["ForgotPassword"])) {

	//Harvest submitted email address
	if (filter_var($_Post["Email"], FILTER_VALIDATE_EMAIL)) {
		$email = $POST["Email"];

	}else{
		echo "Email is not valid";
		exit; 
	}
	
	//check to see if a user exists with this email
	$query = $dbc->prepare('SELECT Email FROM SIGNUP WHERE Email = :Email');
	$query->bindParam(':Email', $Email);
	$query->execute();
	$emailExists = $query->fetch(PDO::FETCH_ASSOC);
	$dbc = null;
	
	if ($emailExists = ["Email"])
	{
		//Create a unique salt. This will never leave PHP Unencrypted.
		$salt = "498#2D83B631%3800EBD!801600D*7E3CC13"
		
		//Create the unique user password reset key
		$password = hash('sha512', $salt.$emailExists["Email"]);
		
		//Create a url which we will direct them to reset their password
		$pwrurl = "http://cscilab.bc.edu/~diradoor/final/fpassword/reset_password.php".$password;
		
		//Mail them their key
		$mailbody = "Dear user, /n/nIf this email does not apply to you please
					ignore it. It appears that you have requested a password reset at our 
					website http://cscilab.bc.edu/~diradoor/final/home.html\n\nTo reset 
					your password, please click the link below. If you cannot click it, 
					please paste it into your web browser's address bar.\n\n" . $pwrurl . 
					"\n\nThanks,\nThe Administration";
					mail($emailExists["Email"], "http://cscilab.bc.edu/~diradoor/final/home.html",
	$mailbody);
			echo "Your password recovery key has been sent to your email address.";
		
		}
		else 
			echo "No user with that email address exists.";
}
?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

	
	
