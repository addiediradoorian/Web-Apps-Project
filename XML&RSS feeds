<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title id="title">News and Weather</title>
	<h1 class="title">News and Weather</h1>
	
	<style>
		* {
			font-family: avenir;}	
		h1 {
			color: rgb(180, 229, 224);}
		h1.title {
			text-align: center;}
		fieldset.newsfeed {
			overflow: auto;
			height: 300px;
			color: rgb(84, 78, 79);}
		fieldset.laweather {
			color: rgb(84, 78, 79);}
	</style>
</head>
<body>

<h1>Weather</h1>
<fieldset class="laweather">
<?php

	
	$url = 'http://w1.weather.gov/xml/current_obs/KCQT.xml' ;
	$options = array(
	  'http'=>array(
		'method'=>"GET",
		'header'=>"Accept-language: en\r\n" .
				  "User-Agent: CSCI1154/v10.0 (http://cscilab.bc.edu/; contact.diradoor@bc.edu)"
	  )
	);
	
	$context = stream_context_create($options);
	$data_from_gov = file_get_contents($url, false, $context);
	$xml = new SimpleXMLElement($data_from_gov);
	$location = $xml->location;
	$last_updated = $xml->observation_time;
	$temperature_string =  $xml->temperature_string;
	$wind_string  = $xml->wind_string;
	$weather = $xml->weather;
	echo "Location: $location <br>
		  Last updated: $last_updated <br>
		  Weather: $weather <br>
		  Temperature: $temperature_string <br>
		  Wind : $wind_string";
	//echo "<pre>"; print_r($xml); echo "</pre>"; 
  
  ?>
</fieldset>  

<h1>International News</h1>
<fieldset class="newsfeed">  
	<?php
		$feeds = array('http://rss.nytimes.com/services/xml/rss/nyt/Europe.xml',
						'http://www.theguardian.com/world/rss',
				  		'http://feeds.bbci.co.uk/news/world/rss.xml'
						);
  	
		create_form($feeds, "feed");
			if ( isset( $_GET['getfeed'] ) ) {
			handle_form( $_GET['feed'] );	
  			}

	
	function handle_form( $myfeed ) {
		  $rss = simplexml_load_file( $myfeed );
	  
		  $title =  $rss->channel->title;
		  echo "<h1>$title</h1>";
		  # I would like to do this:
		  #     foreach ($rss->channel->item as $item) {
		  # or this:
		  #     foreach ($rss->item as $item) {
		  # but which one depends on the rss version in use.
		  $items = $rss->channel->item; # try, works some versions
		  if (!$items)
			$items = $rss->item; # works other versions
		  foreach ( $items as $item ) {
			echo "<div class='news'>
					<h2>$item->title<h2>\n";
			echo '<a href="' . $item->link . '">' . $item->title . '</a><br>';
			echo $item->description . "<br><br>\n";
			echo "</div>";
		  }
	}
	function create_form( $farray, $menuname ){
	?>

	<form method="get">
		<?php create_menu( $farray, $menuname ); ?>
		<input type="submit" name="getfeed" value="Get Feed!!">
	</form>
	<?php
	}
	function create_menu($farray, $menuname){
		$current_feed = isset( $_GET['feed'] ) ?  $_GET['feed'] : "";
		echo "<select name='$menuname'>";
		foreach ( $farray as $f ) {
			if ( $current_feed == $f )  {
				echo "<option value='$f' selected>$f</option>";
			} else {
				echo "<option value='$f'>$f</option>";
			}
		}
		echo '</select>';
	} 
	
	?>
  
</fieldset>	

  
  
</body>
</html>



</body>
