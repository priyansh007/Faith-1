<?php
 
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database

     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
   
	$data=mysqli_connect("localhost","root","","mess") or die();
   
	$i=0;
	$ram=array("1000","2000");	
    while($i<2){ 
        array_push($dataPoints, array(
           				    "label" => $ram[$i],
         				   "y" => $ram[$i]
           					 )
   						     );
        $i++;
    }
	$link = null;

	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "PHP Column Chart from Database"
	},
	data: [{
		type: "line", //change type to bar, line, area, pie, etc  
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>      