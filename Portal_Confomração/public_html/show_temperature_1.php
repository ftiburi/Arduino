<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
	include 'connection.php';
	showTemperature();
}

function showTemperature()
{
	global $connect;
	
	//$query = "SELECT * FROM `sensor` WHERE 1";
	$query = "SELECT * FROM `sensor` ORDER BY `id` DESC LIMIT 1";
    
	$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	
	$temp_array  = array();
	
	if($number_of_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$temp_array[] = $row;
		
		}
	}
//		header('Content-Type: application/json');
//print $temp_array[];

echo json_encode(array("temperature"=>$temp_array[0]));
	
	mysqli_close($connect);
	
}

?>