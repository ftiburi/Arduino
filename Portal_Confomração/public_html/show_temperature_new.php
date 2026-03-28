<?php

 echo "a results";

if($_SERVER["REQUEST_METHOD"]=="GET"){
	include 'connection.php';
	showTemperature();
	
	 echo "0 results";
	
function showTemperature(){
global $connect;




// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $connect->connect_error);
}

 echo " 1 results";


$query = "SELECT * FROM `sensor` ORDER BY `id` DESC LIMIT 1";

//$result = mysqli_query($connect, $query);
//$result = mysqli_query($connect, $sql);

 
 echo " 2 results";
 
 echo " 3 results";
 
$connect->close();
}
}

?>