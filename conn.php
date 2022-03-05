<?php 
	$conn=mysqli_connect('localhost', 'root', '', 'ncasurvey_');
	
	if(!$conn){
		die("Error: Can't connect to database!");
	}
?>