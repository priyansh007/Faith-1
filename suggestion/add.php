<?php
	session_start();
	if ((!isset($_SESSION["uid"]))||($_SESSION['messman']==1))
	{
		header("location:../dashboard");
	}
	else
	{
		$wk=(date('W')+1)%date('W', strtotime('December 28th'));
		if($wk==0)
		{
			$wk=date('W', strtotime('December 28th'));
		}
		$fnm=$_POST['foodtype'];
		$name=$_POST['foodname'];
		if($fnm=='Breakfast')
			$fid=1;
		elseif($fnm=='Lunch')
			$fid=2;
		elseif($fnm=='Dinner')
			$fid=3;
		else
		{
			header("location:../suggestion/");
			return;
		}
		$data=mysqli_connect("localhost","root","","mess") or die();
		$db=mysqli_query($data,"SELECT `suggid` FROM `suggestion` WHERE `suggfoodname`='$name' AND `suggfoodtype`=$fid");
		if(mysqli_num_rows($db)==0)
		{
			$lol=mysqli_query($data,"INSERT INTO `suggestion`(suggfoodtype,suggfoodname) VALUES('$fid','$name')");
			if(!$lol)
			{
				$al=mysqli_error($data);	
				echo $al;
			}
		}
		header("location:../suggestion/");
	}
?>