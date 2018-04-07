<?php
	session_start();
	if ((!isset($_SESSION["uid"]))||($_SESSION['messman']==0)||$_SESSION['rurl']!=1)
	{
		header("location:../dashboard");
	}
	else
	{
		if(isset($_POST["addbf"]))
		{
			$bf=$_POST["bf"];
			$data=mysqli_connect("localhost","root","","mess") or die();
			$s=mysqli_query($data,"SELECT `foodid` from `food` WHERE `foodname`='$bf'");
			if(mysqli_num_rows($s)==0)
				$db=mysqli_query($data,"INSERT INTO food(foodname,foodtype) VALUES('$bf','1')");
			}
		elseif(isset($_POST["addlunch"]))
		{
			$lunch=$_POST["lunch"];
			$data=mysqli_connect("localhost","root","","mess") or die();
			$s=mysqli_query($data,"SELECT `foodid` from `food` WHERE `foodname`='$lunch'");
			if(mysqli_num_rows($s)==0)
				$db=mysqli_query($data,"INSERT INTO food(foodname,foodtype) VALUES('$lunch','2')");
		}
		elseif(isset($_POST["adddinner"]))
		{
			$dinner=$_POST["dinner"];
			$data=mysqli_connect("localhost","root","","mess") or die();
			$s=mysqli_query($data,"SELECT `foodid` from `food` WHERE `foodname`='$dinner'");
			if(mysqli_num_rows($s)==0)
				$db=mysqli_query($data,"INSERT INTO food(foodname,foodtype) VALUES('$dinner','3')");
		}
		header("location:../edit-menu/");
	}
  ?>