<?php
	session_start();
	unset($_SESSION['rurl']);
	if ((!isset($_SESSION["uid"]))||($_SESSION['messman']==0))
	{
		header("location:../dashboard");
	}
	else
	{
		$loggedin=1;
		$us=$_SESSION["uid"];
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
	}
  ?>
<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mess Food Management</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="../images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="../images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="../images/favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../material.min.css">
    <link rel="stylesheet" href="../styles.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
    <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Home</span>          
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <i class="material-icons" style="font-size:60px;color:white;" role="presentation"><?php if($loggedin && $_SESSION['messman']==1){echo"account_box";}else{echo"account_circle";}?></i><br>
          <div class="demo-avatar-dropdown">
            <span>
			<?php
				if($loggedin)
					echo "<i class='material-icons' style='font-size:16px;'>verified_user</i>&nbsp;";
				echo $user;?></span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation">arrow_drop_down</i>
              <span class="visuallyhidden">Accounts</span>
            </button>
			<ul type="submit" class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
			<?php
				if($loggedin)
				{
					echo "<a style='text-decoration: none;' href='../your-info/'><li type='submit' class='mdl-menu__item'><i class='material-icons'>info_outline</i>&ensp;Account</li></a>
					<a style='text-decoration: none;' href='../login/logout.php'><li type='submit' class='mdl-menu__item'><i class='material-icons'>delete</i>&ensp;Logout</li></a>";
				}
				else
				{
					echo "<a style='text-decoration: none;' href='../login/'><li type='submit' class='mdl-menu__item'><i class='material-icons'>move_to_inbox</i>&ensp;Login</li></a>";
				}
			?>
            </ul>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" href="../dashboard/"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>
          <?php
			if($loggedin)
			{
				if($_SESSION['messman']==0)
				{
					echo "<a class='mdl-navigation__link' href='../vote-menu/'><i class='mdl-color-text--blue-grey-400 material-icons' role='presentation'>shopping_basket</i>Vote Menu</a>";
				}
				else
				{
					echo "<a class='mdl-navigation__link' href='../edit-menu/'><i class='mdl-color-text--blue-grey-400 material-icons' role='presentation'>mode_edit</i>Edit Menu</a>
						  <a class='mdl-navigation__link' href='../stats/'><i class='mdl-color-text--blue-grey-400 material-icons' role='presentation'>timeline</i>Stats</a>
					      <a class='mdl-navigation__link' href='../approve-menu/'><i class='mdl-color-text--blue-grey-400 material-icons' role='presentation'>check_circle</i>Approve Menu</a>";
				}
				echo "<a class='mdl-navigation__link' href='../suggestion/'><i class='mdl-color-text--blue-grey-400 material-icons' role='presentation'>playlist_add</i>Suggestion</a>";
				echo "<a class='mdl-navigation__link' href='../graph/'><i class='mdl-color-text--blue-grey-400 material-icons' role='presentation'>gesture</i>Review Graph</a>";
			}
		  ?>		  
		  <div class="mdl-layout-spacer"></div>
		  <a class="mdl-navigation__link" href="../contact-us/"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Contact Us</a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="mdl-layout__content" style="text-align: center;">			  
				<?php
		include("fusioncharts.php");
		$loggedin=1;
		
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
              "caption" => "Top 7 most voted Lunch",
              "paletteColors" => "#00acc1",
              "bgColor" => "#ffffff",
              "borderAlpha"=> "20",
              "canvasBorderAlpha"=> "0",
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
        $arrData1["data"] = array();
       
       

				
						$cn=0;
						$data=mysqli_connect("localhost","root","","mess") or die();
						$a=mysqli_query($data,"SELECT count(`menu`.`menuid`)as`sum`,`menu`.`foodid`,`food`.`foodname` FROM `menu`,`food` WHERE `menu`.`foodid`=`food`.`foodid` AND `food`.`foodtype`=2 AND `menu`.`week`='$wk' GROUP BY `menu`.`foodid` ORDER BY `sum` DESC;");
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
		      $columnChart = new FusionCharts("column2D", "myFirstChart" , 900, 300, "chart-1", "json", $jsonEncodedData);
        // Render the chart
        $columnChart->render();
       


		 $arrData = array(
            "chart" => array(
              "caption" => "Top 7 most voted Breakfast",
              "paletteColors" => "#00acc1",
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
						
						$a=mysqli_query($data,"SELECT count(`menu`.`menuid`)as`sum`,`menu`.`foodid`,`food`.`foodname` FROM `menu`,`food` WHERE `menu`.`foodid`=`food`.`foodid` AND `food`.`foodtype`=1 AND `menu`.`week`='$wk' GROUP BY `menu`.`foodid` ORDER BY `sum` DESC;");

						


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
		      $columnChart = new FusionCharts("column2D", "myFirstChart2" , 900, 300, "chart-2", "json", $jsonEncodedData);
        // Render the chart
        $columnChart->render();


        $arrData3 = array(
            "chart" => array(
              "caption" => "Top 7 most voted Dinner",
              "paletteColors" => "#00acc1",
              "bgColor" => "#ffffff",
              "borderAlpha"=> "20",
              "canvasBorderAlpha"=> "0",
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
						$a=mysqli_query($data,"SELECT count(`menu`.`menuid`)as`sum`,`menu`.`foodid`,`food`.`foodname` FROM `menu`,`food` WHERE `menu`.`foodid`=`food`.`foodid` AND `food`.`foodtype`=3 AND `menu`.`week`='$wk' GROUP BY `menu`.`foodid` ORDER BY `sum` DESC;");
						if(mysqli_num_rows($a)!=0){
						foreach($a as $ab)
						{
							if($cn==8)
							{
								break;
							}
							$cn++;
							array_push($arrData3["data"], array(
           				    "label" => $ab["foodname"],
         				   "value" => $ab["sum"]
           					 )
   						     );
						}
					}
				
			$jsonEncodedData = json_encode($arrData3);
		      $columnChart = new FusionCharts("column2D", "myFirstChart3" , 900, 300, "chart-3", "json", $jsonEncodedData);
        // Render the chart
        $columnChart->render();
       
		?>
		<div id="chart-2">
	</div ><br><div id=chart-1></div><br>
	<div id="chart-3"></div>
            </div>
        </div>
      </main>
    </div>
    <script src="../material.min.js"></script>
  </body>
</html>
