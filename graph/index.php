<?php
	session_start();
	unset($_SESSION['rurl']);
	if ((!isset($_SESSION["uid"])))
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
 $link = null;
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database

     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
   
  $data=mysqli_connect("localhost","root","","mess") or die();
   $a=mysqli_query($data,"SELECT `usid`,`star` FROM review");
  
  
    foreach ($a as $ram) {
    
        array_push($dataPoints, array(
                      "label" => $ram['usid'],
                   "y" => $ram['star']
                     )
                   );
        
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
    <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  exportEnabled: true,
  theme: "light1", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Ratings Chart"
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
					echo "<a class='mdl-navigation__link' href='../feedback/'><i class='mdl-color-text--blue-grey-400 material-icons' role='presentation'>feedback</i>Feedback</a>";
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
				
		

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



        </div>
      </main>
    </div>
    <script src="../material.min.js"></script>
  </body>
</html>
