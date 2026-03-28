<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
	include 'connection.php';
	showTemperature();
}

function showTemperature()
{
	global $connect;
	
		$query = "SELECT * FROM `sensor`  \n"

    . " ORDER BY `id` DESC LIMIT 1";
    
    
	
	$result = array (mysqli_query($connect, $query));
	
//	$number_of_rows = mysqli_num_rows($result);
	
	$row = mysqli_fetch_assoc($result);
	
	echo json_encode($row);
	
	
	

//	if($number_of_rows > 0) {
//		while ($row = mysqli_fetch_assoc($result)) {
//				}
//	}
	
//	header('Content-Type: application/json');
//	echo json_encode(array("temperature"=>$temp_array));

	mysqli_close($connect);
	
}







?>