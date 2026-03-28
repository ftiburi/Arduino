<!DOCTYPE html>
<html lang="en">

    
    
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    
<!--  Horizontal Tool Bar -->   
    <style>
        body {
            margin: 0;
        }
        
        ul.topnav {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }
        
        ul.topnav li {
            float: left;
        }
        
        ul.topnav li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        
        ul.topnav li a:hover:not(.active) {
            background-color: #111;
        }
        
        ul.topnav li a.active {
            background-color: #2304aa;
        }
        
        ul.topnav li.right {
            float: right;
        }
        
        @media screen and (max-width: 600px) {
            ul.topnav li.right,
            ul.topnav li {
                float: none;
            }
        }
        
       

    </style>
    
 
    <title> Universal Metal Forming 4.0 Portal </title>
</head>

<body>
    
<!-- ENVIA DADOS DO ESP PARA O BANCO DE DADOS MYSQL-->        
<?php

include 'create_temperature.php';

?>


    
<!--  Horizontal Tool Bar --> 
    <ul class="topnav">
        <li><a class="active" href="index.html">Home</a></li>
        <li><a href="setup.html">Setup</a></li>
        <li><a href="readme.html">Readme</a></li>
        <li class="right"><a href="#about">About</a></li>
    </ul>
    


<!--  MAIN TILE -->
    <h1> Universal Metal Forming 4.0 Portal </h1>


<!-- Equipement & microcontroller selected  -->
    
  <p id="box_1" style="top:0px;right:0px;">
        
  <b> Monitored equipment: </b> 
   <?php
   $valor = $_GET["equipment"];
   echo "$valor ";
   ?><br><br>

  <b> Microcontroler used </b>: 
   <?php
   $valor2 = $_GET["microcontroler"];
   echo "$valor2 ";
   ?><br><br>

 <b> First variable monitored: </b> 
   <?php
   $var1 = $_GET["var1"];
   echo "$var1 ";
   ?><br><br>
   
 <b> Second variable monitored: </b> 
   <?php
   $var2 = $_GET["var2"];
   echo "$var2";
   ?><br><br>
   
 <b> Third variable monitored: </b> 
   <?php
   $var3 = $_GET["var3"];
   echo "$var3 ";
   ?><br><br>
 </a></p> 
 
 <!--  Board -Last conection  -->

<p id="box_1" style="top:-250px;left:410px">
<b> Last Connection </b>

<?php
date_default_timezone_set("America/Sao_Paulo");
include 'connection.php';
$query = "SELECT * FROM `sensor` ORDER BY `id` DESC LIMIT 1";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
// echo "<br>Número do registro:   ". $row["id"];
// echo "<br>Valor da temperatura:    ". $row["temperature"];

 
echo "<style=font-size:'80px'> <br>". $row["time"];
// echo "<br>";
?>

</a></p>
 
 
 
<!-- - First variable selected line chart  --> 

<?php
     include 'connection.php';
	global $connect;
	$query = "SELECT id, temperature FROM `sensor` ORDER BY `id` DESC LIMIT 10";
	$result = mysqli_query($connect, $query);
	
	foreach($result as $data)
	{
	$dadosx[] = $data['id'];
	$dadosy[] = $data['temperature'];
	}
  mysqli_close($connect);
?>



</h3>
<p id="box_2" style="top:-230px;left:0px">
  <canvas id="myChart" width="400" height="100"></canvas>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>
  const ctx = document.getElementById('myChart');
  const temp = <?php echo json_encode($dadosx)?>;
  const time = <?php echo json_encode($dadosy)?>;
  

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: temp,
     
      datasets: [{
        label: <?php echo json_encode($var1)?>,
        data: time,
        borderColor: '#FF6384',
        backgroundColor: '#FF6384',
        borderWidth: 1
             }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  
   myChart.update('none');
        chart.update();
        chart.refresh();
</script>
</a></p>

<!-- - Second variable selected line chart  --> 

<?php
     include 'connection.php';
	global $connect;
	$query = "SELECT id, temperature FROM `sensor` ORDER BY `id` DESC LIMIT 10";
	$result = mysqli_query($connect, $query);
	
	foreach($result as $data1)
	{
	$dadosx1[] = $data1['id'];
	$dadosy1[] = $data1['temperature'];
	}
  mysqli_close($connect);
?>



</h3>
<p id="box_2"  style="top:-230px;left:0px">
  <canvas id="myChart1" width="400" height="100"></canvas>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>
  const ctx1 = document.getElementById('myChart1');
  const temp1 = <?php echo json_encode($dadosx1)?>;
  const time1 = <?php echo json_encode($dadosy1)?>;
  

  new Chart(ctx1, {
    type: 'line',
        data: {
      labels: temp1,
     
      datasets: [{
        label: <?php echo json_encode($var2)?>,
        borderColor: '#143598',
        backgroundColor: '#143598',
        data: time1,
        borderWidth: 1
        }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  
 </script>
</a></p>

<!--- Third variable selected line chart  --> 

<?php
     include 'connection.php';
	global $connect;
	$query = "SELECT id, temperature FROM `sensor` ORDER BY `id` DESC LIMIT 10";
	$result = mysqli_query($connect, $query);
	
	foreach($result as $data2)
	{
	$dadosx2[] = $data2['id'];
	$dadosy2[] = $data2['temperature'];
	}
  mysqli_close($connect);
?>


  
</h3>
<p id="box_2" style="top:-230px;left:0px">
  <canvas id="myChart2" width="400" height="100"></canvas>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
  const ctx2 = document.getElementById('myChart2');
  const temp2 = <?php echo json_encode($dadosx2)?>;
  const time2 = <?php echo json_encode($dadosy2)?>;
  

  new Chart(ctx2, {
    type: 'line',
    data: {
      labels: temp2,
     
      datasets: [{
        label: <?php echo json_encode($var3)?>,
        borderColor: '#18f137',
        backgroundColor: '#18f137',
        data: time2,
        borderWidth: 1
             }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  
  
</script>
</a></p>

<!--Tool Statistics--->
</h3>
<div id="myPlot3" style="top:-230px;left:410px"></div>

<script>
var xArray = ["Point1", "Point2", "Point3", "Point4", "Point4"];
var yArray = [550, 490, 440, 240, 150];

var data = [{
  x:xArray,
  y:yArray,
  type:"bar",
  borderColor: '#18f187'
}];

var layout = {title:"Tool Temperature"};

Plotly.newPlot("myPlot3", data, layout);
</script>




<br>
<br>

<!--Eficience--->
</h3>
<div id="myPlot1" style="top:-690px;left:0px" ></div>

<script>
var xArray = ["Stoped", "Working", "Emergency", "Feeding", "Broked"];
var yArray = [55, 49, 44, 24, 15];

var layout = {title:"Press Eficiency"};

var data = [{labels:xArray, values:yArray, hole:.4, type:"pie"}];

Plotly.newPlot("myPlot1", data, layout);
</script>

<!--OEE--->
</h3>
<div id="myPlot4" style="top:-690px;left:0px" ></div>

<script>
var xArray = ["Performance", "Quality", "Availability"];
var yArray = [55, 49, 44];

var layout = {title:"OEE"};

var data = [{labels:xArray, values:yArray, hole:.4, type:"pie"}];

Plotly.newPlot("myPlot4", data, layout);
</script>
<br>
<br>

<!-- OEE  -->
    
  <p id="box_3" style="top:-1148px;right:-410px;">
    <br><br>    
  <b> OEE 45% </b> 
  <br><br>


<!--  - Special Graph-->

<?php
    include 'connection.php';
	global $connect;
	$query = "SELECT id, temperature FROM `sensor` ORDER BY `id` DESC LIMIT 1000";
	$result = mysqli_query($connect, $query);
	
	foreach($result as $data3)
	{
	$dadosx3[] = $data3['id'];
	$dadosy3[] = $data3['temperature'];
	}
  mysqli_close($connect);
?>

<!--Detalhed line graph-->
<div id="myPlot2" style="top:-1148px;left:0px" style="width:100%;max-width:800px"></div>


<script>
//const ctx2 = document.getElementById('myChart2');
const temp3 = <?php echo json_encode($dadosx3)?>;
const time3 = <?php echo json_encode($dadosy3)?>;

var xArray = temp3;
var yArray = time3;

// Define Data
var data = [{
  x:xArray,
  y:yArray,
  mode:"line"
}];

// Define Layout
var layout = {
  xaxis: {range: [29000, 30000], title: "Samples"},
  yaxis: {range: [0, 5000], title: "Temperature"},  
  title: "Temperature"
};

// Display using Plotly
Plotly.newPlot("myPlot2", data, layout);
</script>














<?php

//if($_SERVER["REQUEST_METHOD"]=="GET"){
//	include 'connection.php';
//	showTemperature();
//}

//function showTemperature()
//{
//	global $connect;
	
	//$query = "SELECT * FROM `sensor` WHERE 1";
//	$query = "SELECT * FROM `sensor`  \n"

//    . " ORDER BY `id` DESC LIMIT 10";
    
    
    
//	$result = mysqli_query($connect, $query);
//	$number_of_rows = mysqli_num_rows($result);
//	$number_of_lenght = mysqli_fetch_lengths($result);

//	echo "<br>Numero de linhas   " . $number_of_rows;

	
//	$row = mysqli_fetch_assoc($result);

	
// echo "<br>Número do registro:   ". $row["id"];
// echo "<br>Valor da temperatura:    ". $row["temperature"];
// echo "<br>Horário do registro:    ". $row["time"];
// echo "<br>";
 
 
//$sql = "SELECT * FROM `sensor`  \n"

//    . " ORDER BY `id` DESC LIMIT 10";
    
//$result = mysqli_query($connect,$sql);

// Numeric array
//$row = mysqli_fetch_array($result, MYSQLI_NUM);
//printf ("%s %s\n", $row[0], $row[0]);



//echo "<br>";
// Associative array
//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

//echo "Temperature".$row["temperature"];
//echo "CCCCCCCC";

//echo "<br>";
//echo "<br>";
//print json_encode($row);
//echo "<br>";
//echo "<br>";
//echo "<br>";

//printf ("ids: %s temperaturas: %s\n", $row["id"], $row["temperature"]);
//echo "<br>";

//$cont = 40;

//$sql = "SELECT temperature FROM `sensor`  \n"

//    . " ORDER BY `id` DESC LIMIT $cont";

//if ($result = mysqli_query($connect, $sql)) {
  // Fetch one and one row
//  while ($row = mysqli_fetch_array($result)) {
//    printf ("%s\n",$row[0]);
    
 //   echo "<br>";
    
    //ptint json_encode($row[0]);
    //printf ("%s\n",$row[0]);
    //print json_encode($row[0]);
    //echo "<br>";
//  }
//  mysqli_free_result($result);
//}
//echo "<br>";
//echo "<br>";
//echo "<br>";
//$cont=0;
//$sql = "SELECT temperature FROM `sensor` ORDER BY `id` DESC LIMIT 15";
//$result = mysqli_query($connect, $sql);

//while($cont<=4)
//{
//$row = mysqli_fetch_row($result);
//printf ("%s\n",$row[0]);

//$datarray[$cont] = $row[$cont];

//echo "<br>";

//$cont++;
//}
//echo "<br>";
//echo "<br>";
//echo $datarray[0];
//echo $datarray[1];
//echo $datarray[2];
//echo $datarray[3];
//echo $datarray[4];
//echo "<br>";
//echo "<br>";

//echo json_encode($datarray);



// Free result set
//mysqli_free_result($r);

//printf ("%s (%s)\n", $r[0]);
	
//mysqli_close($connect);


	
//}
//
?>


</a></p>

</body>
</html>