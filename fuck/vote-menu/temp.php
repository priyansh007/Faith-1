<?php
	session_start();
	if ((!isset($_SESSION["uid"]))||($_SESSION['messman']==1)||$_SESSION['rurl']!=2)
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
				$ab=mysqli_query($data,"SELECT `menuid` FROM `menu` WHERE `week`='$wk' AND `day`='$i' AND `foodid`='$fid'");
				if(mysqli_num_rows($ab)==0)
				{
					$lol=mysqli_query($data,"INSERT INTO `menu`(week,day,foodid) VALUES('$wk','$i','$fid')");
					if(!$lol)
					{
						$al=mysqli_error($data);	
						echo $al;
					}
				}
				else
				{
					$ab=mysqli_fetch_assoc($ab);
					$mid=$ab['menuid'];
					$lol=mysqli_query($data,"UPDATE `menu` SET `count` = `count` + 1 WHERE `menuid`='$mid'");
					if(!$lol)
					{
						$al=mysqli_error($data);	
						echo $al;
					}
				}						
			}
		}
		$uid=$_SESSION['uid'];	
		$lol=mysqli_query($data,"INSERT INTO `vote`(week,colid) VALUES('$wk','$uid')");
		if(!$lol)
		{
			$al=mysqli_error($data);	
			echo $al;
		}
		header("location:../vote-menu/");
	}
?>