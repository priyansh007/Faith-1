<?php
$usid="u15co050";
?>
<!DOCTYPE html>
<html>
<head>
	<title>library</title>
</head>
<body>
<div>
	<table>
		
	<?php
			$data = mysqli_connect("localhost","root","","dotslash") or die();
			$db=mysqli_query($data,"SELECT `bookid`,`time`,`fine` FROM issue WHERE `userid`='$usid'");
			foreach ($db as $dc) {
				$nm=$dc['bookid'];
				$tm=$dc['time'];
				$fn=$dc['fine'];
				$dj=mysqli_query($data,"SELECT `bookname`,`subject`,`author` FROM book WHERE `bookid`='$nm'");
				foreach($dj as $dk){
					$bn=$dk['bookname'];
					$sb=$dk['subject'];
					$au=$dk['author'];
					echo "<tr>";
					echo "<td>".$nm."</td><td>".$bn."</td><td>".$au."</td><td>".$sb."</td><td>".$tm."</td><td>".$fn."</td><td><form method=post action=home.php><input type=submit name=renew value=renew id=rbtn></form></td><br>";

					echo "</tr>";
				}
				
				
			}
			?>
			
	</table>
</div>
</body>
</html>