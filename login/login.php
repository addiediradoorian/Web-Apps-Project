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
<html>
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
display_login_form();
/*if (isset( $_POST['op'] ))
	handleForm( $_POST['op'] );
	display_login_form();
*/
?> 
</body>
</html>
<?php
/*
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
*/

function display_login_form(){
?>
	<fieldset>
	<form method="post" name="loginform" action="logincookie.php">
		Email: <input type="text" name="name">
		<br>
		Password: <input type="password" name="pass">
		<br>
		<input type="hidden" name="op" value="validate" />
		<input type="submit" name="validate" value="Log in!">
		<br>
		<a href="http://cscilab.bc.edu/~diradoor/final/fpassword/forgot_password.php">Forgot password?</a>
	</form>
	</fieldset>

<?php
}

/*
function validate_user( $name, $pw ){
	$encode = sha1( $pw );
	$query = "SELECT * from signup WHERE email='diradoor@bc.edu' 
	AND password1='608e2b444cbcf327a3cd000571cec2'";
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
	 	//header("Location: home.html");
		echo "<br>Validate Success - $query";
	
}
*/
