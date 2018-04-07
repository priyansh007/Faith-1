<?php
	session_start();
	if ((!isset($_SESSION["uid"]))||($_SESSION['messman']==0)||$_SESSION['rurl']!=3)
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
		for($i=1;$i<8;$i++)
		{
			for($j=1;$j<4;$j++)
			{	
				$tmp=$i.' '.$j;
				$fnm=$_POST['fday'][$i][$j];
				$data=mysqli_connect("localhost","root","","mess") or die();
				$db=mysqli_query($data,"SELECT `foodid` FROM `food` WHERE `foodname`='$fnm'");
				$db=mysqli_fetch_assoc($db);
				$fid=$db['foodid'];							
				$ab=mysqli_query($data,"UPDATE `menu` SET `approve` = 1 WHERE `foodid`='$fid' AND `day`=$i");
				if(!$ab)
				{
					$al=mysqli_error($data);	
					echo $al;
				}
			}
		}
		header("location:../approve-menu/");
	}
?>