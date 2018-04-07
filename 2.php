<!DOCTYPE html>
<html>
<head>
	<title>charts</title>
	<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
</head>
<body>
	
		<?php
		include("fusioncharts.php");
		$columnChart = new FusionCharts("column2d", "ex1" , "100%", 400, "chart-1", "json", '{
      "chart": {
        "caption": "Harry\'s SuperMart - Top 5 Stores\' Revenue",
        "subCaption": "Last Quarter",
        "numberPrefix": "$",
        "rotatevalues": "0",
        "plotToolText": "<div><b>$label</b><br/>Sales : <b>$$value</b></div>",
        "theme": "fint"
      },
      "data": [{
        "label": "Bakersfield Central",
        "value": "880000"
      }, {
        "label": "Garden Groove harbour",
        "value": "730000"
      }, {
        "label": "Los Angeles Topanga",
        "value": "590000"
      }, {
        "label": "Compton-Rancho Dom",
        "value": "520000"
      }, {
        "label": "Daly City Serramonte",
        "value": "330000"
      }]
    }');
// Render the chart
$columnChart->render();
		?>
		<div id="chart-1">
	</div>

</body>
</html>