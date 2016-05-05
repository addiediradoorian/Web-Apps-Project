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

//Was the form submitted?
if (isset($_POST["ResetPasswordForm"]))
{
	//Gather the post data
	$email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $hash = $_POST["q"];

	//Use the same salt from the change.php file
	$salt = "498#2D83B631%3800EBD!801600D*7E3CC13"
	
	//Generate the reset key
	$resetkey = hash('sha512', $salt.$email);

    // Does the new reset key match the old one?
	if ($resetkey == $hash)
	{
        if ($password == $confirmpassword)
        {
            //has and secure the password
            $password = hash('sha512', $salt.$password);
            
            //Update the user's password
            	$query = $dbc->prepare('UPDATE SIGNUP SET password = :Password WHERE Email = "Email');
            	$query->bindParam(':password', $password);
                $query->bindParam(':Email', $Email);
                $query->execute();
                $dbc = null;
			echo "Your password has been successfully reset.";
		}
		else
			echo "Your password's do not match.";
    }
	else
		echo "Your password reset key is invalid.";
}




