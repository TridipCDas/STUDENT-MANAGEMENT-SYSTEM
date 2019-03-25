<?php
	$host="localhost";
	$username="root";
	$password="pavillion";
	
	$link=@mysqli_connect($host,$username,$password,"sms");
	if(!$link)
		echo "cannot connect to the database";
?>