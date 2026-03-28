<?php


$dbname = "id19912156_sensor";
$dbuser = "id19912156_iot_tiburi";  
$dbpass = "@p8/y!_K8U?ue/q6"; 
$dbhost = "localhost";
$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("erro");

$temp = $_GET['temperature'];
echo $_GET['temperature'];

$sql = "INSERT INTO `sensor`(`temperature`) VALUES ('$temp')";


$rs = mysqli_query($con, $sql);



?>

<html>
	<body>
        <h1>Temperatura!</h1>
      
	</body>
	  <?php echo $temp; ?>
</html>