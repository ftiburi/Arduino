<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
	include 'connection.php';
	showTemperature();
}

function showTemperature()
{
	global $connect;
	
	//$query = "SELECT * FROM `sensor` WHERE 1";
	$query = "SELECT * FROM `sensor`  \n"

    . " ORDER BY `id` DESC";
    
    
	
	$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	
	$temp_array  = array();
	
	if($number_of_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$temp_array[] = $row;
		}
	}
	
	$ggg = $temp_array[0];
	
	echo $ggg;
	
	header('Content-Type: application/json');
	echo json_encode(array(""=>$temp_array));
	mysqli_close($connect);
	
}







?>