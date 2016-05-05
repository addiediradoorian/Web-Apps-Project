<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>New Entry</title>
	<h1>Eat Sleep See</h1>
	<style type = "text/css">		  
			body {font-family: Avenir;}
	</style>
</head>
<body>
<?php

if (isset($_GET['submit']) && isset($_GET['typeofentry']) && isset($_GET['entryloc'])
&& isset($_GET['estname']) && isset($_GET['stars']) && isset($_GET['comments'])) {
handle_entry_form();
} else {
	echo "Fill out all of the fields!";}
display_entry_form();

?>
</body>
</html>
<?php

function display_entry_form(){
?>
	<form>
	Select a type: <br>
		<select name="typeofentry">
			<option disabled selected>Select Eat, Sleep or See</option>
			<option id="typeeat" value="Eat">Eat</option>
			<option id="typesleep" value="Sleep">Sleep</option>
			<option id="typesee" value="See">See</option>
		</select>
	<br> <br>
	Location: <br>
		<select name="entryloc">
			<option disabled selected>Select a City</option>
			<option id="loclondon" value="London">London</option>
			<option id="locparis" value="Paris">Paris</option>
			<option id="locrome" value="Rome">Rome</option>
			<option id="locsydney" value="Sydney">Sydney</option>
			<option id="loctokyo" value="Tokyo">Tokyo</option>
		</select>
	<br> <br>
	Name of establishment: <br>
		<input type="text" name="estname">
	<br> <br>
	How many stars do you rate it? <br>	
		<input type="radio" name="stars" value="1"> 1 <br>
		<input type="radio" name="stars" value="2"> 2 <br>
		<input type="radio" name="stars" value="3"> 3 <br>
		<input type="radio" name="stars" value="4"> 4 <br>
		<input type="radio" name="stars" value="5"> 5 <br>
	<br> <br>
	Any additional comments? <br>
		<textarea rows="5" cols="50" name="comments" value="comments"></textarea>
	<br>
	<br>
	<input type="submit" name="submit" value="Submit Entry!" />
	</form>	
<?php	
}

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

function handle_entry_form(){
	$dbc = connect_to_db( "diradoor" );	
	$type = isset($_GET['typeofentry']) ? $_GET['typeofentry'] : "";
	$location = isset($_GET['entryloc']) ? $_GET['entryloc'] : "";
	$estname = isset($_GET['estname']) ? $_GET['estname'] : "";
	$stars = isset($_GET['stars']) ? $_GET['stars'] : "";
	$comments = isset($_GET['comments']) ? $_GET['comments'] : "";
	$query = "insert into entries (EatSleeporSee, City, EstName, Stars, Comments) 
		values ('$type', '$location', '$estname', '$stars', '$comments')"; 
	$result = perform_query( $dbc, $query );


	if ($dbc->query($query) === TRUE) {
			echo "Thank you for your entry!";
			//header("Location: londoneat.php");
	} else {
		echo "Error: " . $query . "<br>" . $dbc->error;
	}
	//disconnect_from_db( $dbc, $result );
}


	
