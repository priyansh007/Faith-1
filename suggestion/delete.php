<?php
	session_start();
	if ((!isset($_SESSION["uid"]))||($_SESSION['messman']==0))
	{
		header("location:../dashboard");
	}
	else
	{	
		if($_GET['food'] && $_GET['type'])
		{
			$food = $_GET['food'];
			$type = $_GET['type'];
			echo $food;
			$data=mysqli_connect("localhost","root","","mess") or die();
			$s=mysqli_query($data,"SELECT `foodid` from `food` WHERE `foodname`='$food' AND `foodtype`='$type'");
			if(mysqli_num_rows($s)==0)
				$db=mysqli_query($data,"INSERT INTO food(foodname,foodtype) VALUES('$food','$type')");
			$s=mysqli_query($data,"DELETE from `suggestion` WHERE `suggfoodname`='$food' AND `suggfoodtype`='$type'");
		}
		//echo "bahi bahi";
		header("location:../suggestion/");
	}
?>