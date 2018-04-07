<!DOCTYPE html>
<html>
<head>
	<title>charts</title>
	<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
</head>
<body>
	
		<?php
		include("fusioncharts.php");
		$loggedin=1;
		$us="u15co000";
		$data=mysqli_connect("localhost","root","","mess") or die();
		$db=mysqli_query($data,"SELECT `fname`,`lname` FROM login WHERE `colid`='$us'");
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
					
						
							
		



        $arrData1 = array(
            "chart" => array(
              "caption" => "Top 7 most voted lunch",
              "paletteColors" => "#0075c2",
              "bgColor" => "#ffffff",
              "borderAlpha"=> "20",
              "canvasBorderAlpha"=> "0",
              "usePlotGradientColor"=> "0",
              "plotBorderAlpha"=> "10",
              "showXAxisLine"=> "1",
              "xAxisLineColor" => "#999999",
              "showValues" => "0",
              "divlineColor" => "#999999",
              "divLineIsDashed" => "1",
              "showAlternateHGridColor" => "0"
            )
        );
        $arrData1["data"] = array();
       
       

				
						$cn=0;
						$data=mysqli_connect("localhost","root","","mess") or die();
						$a=mysqli_query($data,"SELECT `menu`.`foodid`,`food`.`foodname`,sum(`count`) as `sum` FROM `menu`,`food` WHERE `week`='$wk' AND `menu`.`foodid`=`food`.`foodid` AND `food`.`foodtype`='2' GROUP BY `menu`.`foodid` ORDER BY `sum` DESC");
						
						if(mysqli_num_rows($a)!=0){
						foreach($a as $ab)
						{
							if($cn==8)
							{
								break;
							}
							$cn++;
							array_push($arrData1["data"], array(
           				    "label" => $ab["foodname"],
         				   "value" => $ab["sum"]
           					 )
   						     );
						}
					}
				
			$jsonEncodedData = json_encode($arrData1);
		      $columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);
        // Render the chart
        $columnChart->render();
       


		 $arrData = array(
            "chart" => array(
              "caption" => "Top 7 most voted breakfast",
              "paletteColors" => "#0075c2",
              "bgColor" => "#ffffff",
              "borderAlpha"=> "20",
              "canvasBorderAlpha"=> "20",
              "usePlotGradientColor"=> "0",
              "plotBorderAlpha"=> "10",
              "showXAxisLine"=> "1",
              "xAxisLineColor" => "#999999",
              "showValues" => "20",
              "divlineColor" => "#999999",
              "divLineIsDashed" => "1",
              "showAlternateHGridColor" => "0"
            )
        );
        $arrData["data"] = array();
      
       

					
						$cn=0;
						$data=mysqli_connect("localhost","root","","mess") or die();
						$a=mysqli_query($data,"SELECT `menu`.`foodid`,`food`.`foodname`,sum(`count`) as `sum` FROM `menu`,`food` WHERE `week`='$wk' AND `menu`.`foodid`=`food`.`foodid` AND `food`.`foodtype`='1' GROUP BY `menu`.`foodid` ORDER BY `sum` DESC");
						
						if(mysqli_num_rows($a)!=0){
						foreach($a as $ab)
						{
							if($cn==8)
							{
								break;
							}
							$cn++;
							array_push($arrData["data"], array(
           				    "label" => $ab["foodname"],
         				   "value" => $ab["sum"]
           					 )
   						     );
						}
					}
				
			$jsonEncodedData = json_encode($arrData);
		      $columnChart = new FusionCharts("column2D", "myFirstChart2" , 600, 300, "chart-2", "json", $jsonEncodedData);
        // Render the chart
        $columnChart->render();


        $arrData3 = array(
            "chart" => array(
              "caption" => "Top 7 most voted Dinner",
              "paletteColors" => "#0075c2",
              "bgColor" => "#ffffff",
              "borderAlpha"=> "20",
              "canvasBorderAlpha"=> "20",
              "usePlotGradientColor"=> "0",
              "plotBorderAlpha"=> "10",
              "showXAxisLine"=> "1",
              "xAxisLineColor" => "#999999",
              "showValues" => "20",
              "divlineColor" => "#999999",
              "divLineIsDashed" => "1",
              "showAlternateHGridColor" => "0"
            )
        );
        $arrData3["data"] = array();
      
       

					
						$cn=0;
						$data=mysqli_connect("localhost","root","","mess") or die();
						$a=mysqli_query($data,"SELECT `menu`.`foodid`,`food`.`foodname`,sum(`count`) as `sum` FROM `menu`,`food` WHERE `week`='$wk' AND `menu`.`foodid`=`food`.`foodid` AND `food`.`foodtype`='3' GROUP BY `menu`.`foodid` ORDER BY `sum` DESC");
						
						if(mysqli_num_rows($a)!=0){
						foreach($a as $ab)
						{
							if($cn==8)
							{
								break;
							}
							$cn++;
							array_push($arrData["data"], array(
           				    "label" => $ab["foodname"],
         				   "value" => $ab["sum"]
           					 )
   						     );
						}
					}
				
			$jsonEncodedData = json_encode($arrData);
		      $columnChart = new FusionCharts("column2D", "myFirstChart3" , 600, 300, "chart-3", "json", $jsonEncodedData);
        // Render the chart
        $columnChart->render();

       
		?>
		<div id="chart-1">
	</div ><div id=chart-3></div><br>
	<div id="chart-2"></div>

</body>
</html>
