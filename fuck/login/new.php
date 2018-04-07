<?php
    $result="";
	if(isset($_POST["signup"]))
	{	
		$flag=0;
		$uid=$_POST["remail"];
		$passwd=$_POST["rpass"];		
		$fnam=$_POST["fname"];
		$lnam=$_POST["lname"];
		$state=$_POST["state"];	
		$data=mysqli_connect("localhost","root","","mess") or die();
		$db=mysqli_query($data,"SELECT `colid` FROM login");
		foreach ($db as $id)
		{
			$a=$id['colid'];
			if($a==$uid)
			{
				$flag=1;
				break;
			}
		}  
		if($flag==1)
		{               
			$result="User Id Is Already Registered!!";
			$_SESSION['result']=$result;
			echo "<h2>$result</h2>
					<a href='../login/'>Go back to Login page..</a>";
		}
		if($flag==0)
		{		
			$passwd=hash('sha512', $passwd);
			$lol=mysqli_query($data,"INSERT INTO login(colid,pass,fname,lname,state) VALUES('$uid','$passwd','$fnam','$lnam','$state')");
			if(!$lol)
			{
				$al=mysqli_error($data);	
				echo $al;
			}
			header("location:index.php");
		}		
	}
?>