<?php
	session_start();
	unset($_SESSION['rurl']);
	if (!isset($_SESSION["uid"]))
	{
		header("location:../dashboard");
	}
	else
	{
		$loggedin=1;
		$us=$_SESSION["uid"];
		$data=mysqli_connect("localhost","root","","mess") or die();
		$db=mysqli_query($data,"SELECT `fname`,`lname`,`state` FROM login WHERE `colid`='$us'");
		$db=mysqli_fetch_assoc($db);
		$fname=$db["fname"];
		$lname=$db["lname"];
		$state=$db["state"];
		$user=$fname.' '.$lname;
	}
    ?>
<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mess Management</title>

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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="material.min.css">
    <link rel="stylesheet" href="styles.css">
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
	.checked {
		color: orange;
	} 
	.unchecked{
		color: white;
	}
	
    .rating_vote{
    	color:orange;
    }
    .ratings_over {
    color:black;
}
}
</style>
    </style>

    <script src="../material.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	

  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header" >
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600" >
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Contact Us</span>          
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
					echo "<a class='mdl-navigation__link' href='../analytics/'><i class='mdl-color-text--blue-grey-400 material-icons' role='presentation'>mode_edit</i>Edit Menu</a>
						<a class='mdl-navigation__link' href='../stats/'><i class='mdl-color-text--blue-grey-400 material-icons' role='presentation'>timeline</i>Stats</a>
					<a class='mdl-navigation__link' href='../approve-menu/'><i class='mdl-color-text--blue-grey-400 material-icons' role='presentation'>check_circle</i>Approve Menu</a>";
				}				
			}		  
		  ?>	
		  <div class="mdl-layout-spacer"></div>
		  <a class="mdl-navigation__link" href="../contact-us/"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Contact Us</a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="mdl-layout__content">
            <div class="demo-options mdl-card mdl-color--red-700 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50">               			  
				<ul>
					<div id='1w'>
						<input type="hidden" name="rating" id="rating" value="5"/>
						Rate: Raiders of the Lost Ark
						<a id='1' class="fa fa-star unchecked"></a>
						<a id='2' class="fa fa-star unchecked" ></a>
						<a id='3' class="fa fa-star unchecked" ></a>
						<a id='4' class="fa fa-star unchecked" ></a>
						<a id='5' class="fa fa-star unchecked"></a>
					</div>
               	</ul>			
              </div>
            </div>
          </div>
        </div>		
      </main>
    </div>
    
  </body>
</html>
<script>
	
	
	$(document).ready(function(){
    $("#2").hover(function(){
        $(this).prevAll().andSelf().addClass('ratings_over');
        $(this).nextAll().removeClass('ratings_vote'); 
    });
	
	

	/*$('#1').hover(
            // Handles the mouseover
            function() {
                $(this).prevAll().andSelf().addClass('checked');
                $(this).nextAll().removeClass('unchecked'); 
            },
            // Handles the mouseout
            function() {
                $(this).prevAll().andSelf().removeClass('unchecked');
                set_votes($(this).parent());
            }
        );
		$("#1w").on('click',function(){
			
			alert(1);

		});
		
		function highlightStar(obj,id) {
			removeHighlight(id);		
			$('.demo-table #tutorial-'+id+' li').each(function(index) {
				$(this).addClass('highlight');
				if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
					return false;	
				}
			});
		}

		function removeHighlight(id) {
			$('.demo-table #tutorial-'+id+' li').removeClass('selected');
			$('.demo-table #tutorial-'+id+' li').removeClass('highlight');
		}

		function addRating(obj,id) {
			$('.demo-table #tutorial-'+id+' li').each(function(index) {
				$(this).addClass('selected');
				$('#tutorial-'+id+' #rating').val((index+1));
				if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
					return false;	
				}
			});
		}

		function resetRating(id) {
			if($('#id')) {
				$('span').each(function(index) {
					$(this).addClass('selected');
					if((index+1) == $('#id').val()) {
						return false;	
					}
				});
			}
		} */
	</script>