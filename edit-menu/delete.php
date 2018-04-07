<?php
	session_start();
	if ((!isset($_SESSION["uid"]))||($_SESSION['messman']==0)||$_SESSION['rurl']!=1)
	{
		header("location:../dashboard");		
	}
	else
	{
		unset($_SESSION['rurl']);
		$fid = $_GET['fid'];
		$wk=(date('W')+1)%date('W', strtotime('December 28th'));
		if($wk==0)
		{
			$wk=date('W', strtotime('December 28th'));
		}
		$data=mysqli_connect("localhost","root","","mess") or die();
		$ab=mysqli_query($data,"SELECT `menuid` FROM `menu` WHERE `week`='$wk' AND `foodid`='$fid'");
		if(mysqli_num_rows($ab)==0)
		{
			$db=mysqli_query($data,"DELETE FROM `food` WHERE `foodid`='$fid'");
			if(!$db)
			{
				$al=mysqli_error($data);	
				echo $al;
				echo $fid;				
			}
			else			
				header("location:../edit-menu/");
		}	
		else
		{	
			$mid=$ab['menuid'];
			$lol=mysqli_query($data,"UPDATE `menu` SET `deleted` = 1 WHERE `menuid`='$mid'");
			if(!$lol)
			{
				$al=mysqli_error($data);	
				echo $al;
			}
		}
	}
  ?>