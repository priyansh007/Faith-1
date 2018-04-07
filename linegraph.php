<!DOCTYPE html>
<html>
<head>
	<title>line graph</title>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
	<?php
$cn=0;
$rows="";
$data=mysqli_connect("localhost","root","","mess") or die();
		$db=mysqli_query($data,"SELECT `fname`,`lname` FROM login WHERE `colid`='u15co050'");
		$db=mysqli_fetch_assoc($db);
		$fname=$db["fname"];
		$lname=$db["lname"];
		$user=$fname.' '.$lname;
		$wk=(date('W')+1)%date('W', strtotime('December 28th'));
		if($wk==0)
		{
			$wk=date('W', strtotime('December 28th'));
		}
		$i=1;

						$data=mysqli_connect("localhost","root","","mess") or die();
						$a=mysqli_query($data,"SELECT `menu`.`foodid`,`food`.`foodname`,sum(`count`) as `sum` FROM `menu`,`food` WHERE `week`='$wk' AND `menu`.`foodid`=`food`.`foodid` AND `food`.`foodtype`='2' GROUP BY `menu`.`foodid` ORDER BY `sum` DESC");
						
						if(mysqli_num_rows($a)!=0){
							$row=mysqli_fetch_assoc($a);
						}
							?>

							<div id="morris-line-chart"></div>
							<script>
 
Morris.Line({
    // ID of the element in which to draw the chart.
    element: 'morris-line-chart',
 
    // Chart data records -- each entry in this array corresponds to a point
    // on the chart.
    data: <?php echo json_encode($rows);?>,
 
    // The name of the data record attribute that contains x-values.
    xkey: 'cron_time',
 
    // A list of names of data record attributes that contain y-values.
    ykeys: ['images_processed'],
 
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Images Processed'],
 
    lineColors: ['#0b62a4'],
    xLabels: 'hour',
 
    // Disables line smoothing
    smooth: true,
    resize: true
});
</script>
</body>
</html>