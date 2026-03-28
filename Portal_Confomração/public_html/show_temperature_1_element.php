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

    . " ORDER BY `id` DESC LIMIT 10";
    
    
    
	$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	$number_of_lenght = mysqli_fetch_lengths($result);

	echo "<br>Numero de linhas   " . $number_of_rows;

	
	$row = mysqli_fetch_assoc($result);
	
 echo "<br>Número do registro:   ". $row["id"];
 echo "<br>Valor da temperatura:    ". $row["temperature"];
 echo "<br>Horário do registro:    ". $row["time"];
 
 

	
//	$temp_array  = array();
	
	//if($number_of_rows > 0) {
//		while ($row = mysqli_fetch_assoc($result)) {
//			$temp_array[] = $row;
//		}
//	}
	

//	header('Content-Type: application/json');
//	echo json_encode(array("t"=>$temp_array));
//	echo json_encode(array($temp_array));
    //echo json_encode(array($row));

//	echo json_encode($row);
	
	mysqli_close($connect);
	
}







?>