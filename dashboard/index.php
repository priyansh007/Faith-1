<?php
	session_start();
	unset($_SESSION['rurl']);
	if (!isset($_SESSION["uid"]))
	{
		$loggedin=0;
		$user='Not logged in';
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
	}
	$wk=date('W');
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
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="material.min.css">
    <link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="../getmdl-select/getmdl-select.min.css">
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
			}
		  ?>		  
		  <div class="mdl-layout-spacer"></div>
		  <a class="mdl-navigation__link" href="../contact-us/"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Contact Us</a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="mdl-layout__content">
            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <h2 class="mdl-card__title-text">This Week's Menu</h2>
              </div>			  </div>
				<?php
					$data=mysqli_connect("localhost","root","","mess") or die();
					$dd=mysqli_query($data,"SELECT `week` FROM `menu` WHERE `approve`=1 AND `week`=$wk GROUP BY `week`");
					if(mysqli_num_rows($dd)!=0){
              echo"<table class='mdl-data-table mdl-js-data-table mdl-shadow--2dp' style=' width: 100%;'>
				<thead>
					<tr>
						<th class='mdl-data-table__cell--non-numeric'>Week: $wk</th>
						<th class='mdl-data-table__cell--non-numeric'>Monday</th>
						<th class='mdl-data-table__cell--non-numeric'>Tuesday</th>
						<th class='mdl-data-table__cell--non-numeric'>Wednesday</th>
						<th class='mdl-data-table__cell--non-numeric'>Thursday</th>
						<th class='mdl-data-table__cell--non-numeric'>Friday</th>
						<th class='mdl-data-table__cell--non-numeric'>Saturday</th>
						<th class='mdl-data-table__cell--non-numeric'>Sunday</th>
					</tr>	
				</thead>
				<tbody>
    
					<tr>
						<td class='mdl-data-table__cell--non-numeric'><b>Breakfast</b></td>";
							$data=mysqli_connect("localhost","root","","mess") or die();
							$a=mysqli_query($data,"SELECT `food`.`foodname` FROM `menu`,`food` WHERE `approve`=1 AND `week`='$wk' AND `menu`.`foodid`=`food`.`foodid` AND `food`.`foodtype`=1");
							foreach($a as $ab)
							{
								$fn=$ab['foodname'];
								echo "<td class='mdl-data-table__cell--non-numeric'>$fn</td>";
							}
					echo"</tr>	
    
					<tr>
						<td class='mdl-data-table__cell--non-numeric'><b>Lunch</b></td>";
						
							$a=mysqli_query($data,"SELECT `food`.`foodname` FROM `menu`,`food` WHERE `approve`=1 AND `week`='$wk' AND `menu`.`foodid`=`food`.`foodid` AND `food`.`foodtype`=2");
							foreach($a as $ab)
							{
								$fn=$ab['foodname'];
								echo "<td class='mdl-data-table__cell--non-numeric'>$fn</td>";
							}
					echo"</tr>
    
					<tr>
						<td class='mdl-data-table__cell--non-numeric'><b>Dinner</b></td>";						
							$a=mysqli_query($data,"SELECT `food`.`foodname` FROM `menu`,`food` WHERE `approve`=1 AND `week`='$wk' AND `menu`.`foodid`=`food`.`foodid` AND `food`.`foodtype`=3");
							foreach($a as $ab)
							{
								$fn=$ab['foodname'];
								echo "<td class='mdl-data-table__cell--non-numeric'>$fn</td>";
							}
					echo "</tr>
    
				</tbody>
			  </table>";}
			  else
				  echo"<h3 style='text-align:center;'>This Week's menu is not decided yet.(There maybe some error!)</h3>";
			  echo"<br>
			  <div>";			
					$cd=mysqli_query($data,"SELECT `week` FROM `menu` WHERE `approve`=1 AND `week`<>$wk GROUP BY `week`");
					if(mysqli_num_rows($cd)!=0)
					{						
						echo "<h4>Review Previous Menus</h4>
						<form method='post' action=''>
								<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select'>
									<input class='mdl-textfield__input' type='text' name='wtab' id='ntab' required='required' readonly tabIndex='-1'>
									<label for='ntab'>
										<i class='mdl-icon-toggle__label material-icons'>keyboard_arrow_down</i>
									</label>
									<label for='ntab' class='mdl-textfield__label'>Week</label>
									<ul for='ntab' class='mdl-menu mdl-menu--bottom-left mdl-js-menu'>";
									foreach($cd as $bb)
									{
										$fitem=$bb['week'];
										echo "<li class='mdl-menu__item'>$fitem</li>";
									}
									echo "</ul></div>
										<div class='mdl-layout-spacer'></div><button class='mdl-button mdl-color--accent mdl-color-text--accent-contrast mdl-button--raised mdl-js-button mdl-js-ripple-effect' type='submit' name='wkchk'>Review</button></form><br>";
						if(isset($_POST['wkchk']))
						{
							$k=$_POST['wtab'];
							$_POST['wtab']=NULL;
						echo"<table class='mdl-data-table mdl-js-data-table mdl-shadow--2dp' style=' width: 100%;'>
				<thead>
					<tr>
						<th class='mdl-data-table__cell--non-numeric'>Week: $k</th>
						<th class='mdl-data-table__cell--non-numeric'>Monday</th>
						<th class='mdl-data-table__cell--non-numeric'>Tuesday</th>
						<th class='mdl-data-table__cell--non-numeric'>Wednesday</th>
						<th class='mdl-data-table__cell--non-numeric'>Thursday</th>
						<th class='mdl-data-table__cell--non-numeric'>Friday</th>
						<th class='mdl-data-table__cell--non-numeric'>Saturday</th>
						<th class='mdl-data-table__cell--non-numeric'>Sunday</th>
					</tr>	
				</thead>
				<tbody>
    
					<tr>
						<td class='mdl-data-table__cell--non-numeric'><b>Breakfast</b></td>";
							$data=mysqli_connect("localhost","root","","mess") or die();
							$a=mysqli_query($data,"SELECT `food`.`foodname` FROM `menu`,`food` WHERE `approve`=1 AND `week`='$k' AND `menu`.`foodid`=`food`.`foodid` AND `food`.`foodtype`=1");
							foreach($a as $ab)
							{
								$fn=$ab['foodname'];
								echo "<td class='mdl-data-table__cell--non-numeric'>$fn</td>";
							}
					echo"</tr>	
    
					<tr>
						<td class='mdl-data-table__cell--non-numeric'><b>Lunch</b></td>";
						
							$a=mysqli_query($data,"SELECT `food`.`foodname` FROM `menu`,`food` WHERE `approve`=1 AND `week`='$k' AND `menu`.`foodid`=`food`.`foodid` AND `food`.`foodtype`=2");
							foreach($a as $ab)
							{
								$fn=$ab['foodname'];
								echo "<td class='mdl-data-table__cell--non-numeric'>$fn</td>";
							}
					echo"</tr>
    
					<tr>
						<td class='mdl-data-table__cell--non-numeric'><b>Dinner</b></td>";						
							$a=mysqli_query($data,"SELECT `food`.`foodname` FROM `menu`,`food` WHERE `approve`=1 AND `week`='$k' AND `menu`.`foodid`=`food`.`foodid` AND `food`.`foodtype`=3");
							foreach($a as $ab)
							{
								$fn=$ab['foodname'];
								echo "<td class='mdl-data-table__cell--non-numeric'>$fn</td>";
							}
					echo "</tr>
    
				</tbody>
			  </table><br>";}
					}
				?>
				</div>
            </div>
        </div>
      </main>
    </div>
    <script src="../material.min.js"></script>
	<script defer src="../getmdl-select/getmdl-select.min.js"></script>
  </body>
</html>
