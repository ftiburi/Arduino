<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){

require 'connection.php';

createTemperature();	
	
}



function createTemperature()
{
	global $connect;
	$temp = $_GET['temperature'];
	if ($temp != null)
	{
     //$query = " Insert IGNORE into `sensor`(`temperature`) values ('$temp');";
    $query = " Insert  into `sensor`(`temperature`) values ('$temp');";
	
	mysqli_query($connect, $query) or die (mysqli_error($connect));
	
	mysqli_close($connect);
	}
	
	
}

?>