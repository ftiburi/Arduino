<!DOCTYPE html>
<html lang="en">
    
   <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://modernistic-discrep.000webhostapp.com/style.css">
    
       
    <title> Temperatura</title>


</head>

<body>
    
     
    <div class="relogio">
         <div>
           <span id="horas">00</span>
           <span class="tempo">Horas</span>
         </div>
         <div>
           <span id="minutos">00</span>
           <span class="tempo">Minutos</span>
        </div> 
        <div>
           <span id="segundos">00</span>
           <span class="tempo">Segundos</span>
        </div> 
    </div> 
    
    
    
    <script src="https://modernistic-discrep.000webhostapp.com/script.js"></script>
    
    </body>
    
 </html>



<?php
$dbname = "id19912156_sensor";
$dbuser = "id19912156_iot_tiburi";  
$dbpass = "@p8/y!_K8U?ue/q6"; 
$dbhost = "localhost";
$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("erro");

$sql = "INSERT INTO `sensor`(`temperature`) VALUES ('$temp')";
$rs = mysqli_query($con, $sql);


?>

