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
 echo "<br>";
 
 
$sql = "SELECT * FROM `sensor`  \n"

    . " ORDER BY `id` DESC LIMIT 10";
    
$result = mysqli_query($connect,$sql);

// Numeric array
$row = mysqli_fetch_array($result, MYSQLI_NUM);
printf ("%s %s\n", $row[0], $row[0]);



echo "<br>";
// Associative array
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

echo "hhhhhhhhhhh".$row["temperature"];
echo "yyyyyyy";
echo "<br>";

printf ("id: %s temperatura: %s\n", $row["id"], $row["temperature"]);
echo "<br>";

$cont = 4;

$sql = "SELECT * FROM `sensor`  \n"

    . " ORDER BY `id` DESC LIMIT $cont";



if ($result = mysqli_query($connect, $sql)) {
  // Fetch one and one row
  while ($row = mysqli_fetch_row($result)) {
    printf ("%s\n",$row[0]);
    printf ("%s\n",$row[1]);
    echo "<br>";
  }
  mysqli_free_result($result);
}

// Free result set
mysqli_free_result();

printf ("%s (%s)\n", $r[0]);
	
mysqli_close($connect);
	
}
?>