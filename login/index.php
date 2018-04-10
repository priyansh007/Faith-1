    <?php
	session_start();
	if (isset($_SESSION["uid"]))
    {		
		header("location:../dashboard");
    }
		
	if (isset($_SESSION['result']))
		$result=$_SESSION['result'];
	else
		$result="";
	//unset($_SESSION['result']);
    if(isset($_POST["login"]))
    {		
       $ids=$_POST["lemail"];
	   $psswd=hash('sha512', $_POST["lpass"]);   
       if($psswd==NULL||$ids==NULL)
       {
          $result="Please fill all details!!!";
       }
	   else
	   {
			$flag=0;			
			$data=mysqli_connect("localhost","root","","mess") or die();
			$db=mysqli_query($data,"SELECT `colid` FROM login");
			foreach ($db as $id) 
			{
				if($id['colid']==$ids)
				{
					$flag=1;
					break;
				}
			}	
			if($flag==1)
			{
				$db=mysqli_query($data,"SELECT `pass` FROM login WHERE `colid`='$ids'");
				$db=mysqli_fetch_assoc($db);										
				if($db["pass"]==$psswd)
				{
					echo "<script type='text/javascript'>alert('Launda approved hai');</script>";
					$dc=mysqli_query($data,"SELECT `messman` FROM login WHERE `colid`='$ids'");
					$dc=mysqli_fetch_assoc($dc);
					$_SESSION["uid"] = $ids;
					$_SESSION["messman"] = $dc["messman"];
					if($dc["messman"]==1)
					{						
						echo "<script type='text/javascript'>alert('Launda admin hai');</script>";						
						header("location:../dashboard");
					}
					else
					{
						echo "<script type='text/javascript'>alert('Launda chodu hai');</script>";						
						header("location:../dashboard");
					}
				}
				else
				{
					$result="Password incorrect try again";
				}
			}
			else
			{
				$result="Email or Password Incorrect!";
			}
		}
	}
    ?>




<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css?version=1001">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/style.css">  
</head>

<body>
  
<!-- Mixins-->
<!-- Blog Title-->
<div class="pen-title">
  <h1>Mess Login</h1>
</div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form method="post">
      <div class="input-container">
        <input type="text" name="lemail" required="required"/>
        <label for="#{label}">College ID</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="lpass" required="required"/>
        <label for="#{label}">Password</label>
        <div class="bar"></div>
      </div>
	  <!--<div class="input-container">	  
	  <input type="hidden" id="txtCaptcha" />
	  <input type="text" name="txtInput" id="txtInput" size="15" />
	  <label>Enter Code <span id="txtCaptchaDiv" style="background-color:#ed2553;color:#fff;padding:5px"></span></label>
	  <div class="bar"></div>
	  </div>-->
      <div class="button-container" name="login" value="login">
        <button type="submit" name="login">Login</button>
      </div>
	  <div class="footer"><?php echo $result; ?></div>
    </form>
  </div>
  <div class="card alt">
    <div class="toggle" value="Register"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form method="post" action="new.php">
      <div class="input-container">
        <input type="text" name="remail" required="required"/>
        <label>College ID</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="rpass" required="required"/>
        <label>Password</label>
        <div class="bar"></div>
      </div>
	  <div class="input-container">
        <input type="text" name="fname" required="required"/>
        <label>First Name</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" name="lname" required="required"/>
        <label>Last Name</label>
        <div class="bar"></div>
      </div>
	  <div class="input-container">
        <input type="text" name="state" required="required"/>
        <label>State</label>
        <div class="bar"></div>
      </div>
	  <!--<div class="input-container">	  
	  <input type="hidden" id="txtCaptcha" />
	  <input type="text" name="txtInput" id="txtInput" size="15" />
	  <label>Enter Code <span id="txtCaptchaDiv" style="background-color:#FFFFFF;color:#000;padding:5px"></span></label>
	  <div class="bar"></div>
	  </div>-->	  
      <div class="button-container" name="signup" value="login">
        <button type="submit" name="signup">Register</button>
      </div>
    </form>
  </div>
</div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
<!--Captcha script
<script type="text/javascript">
function checkform(theform){
var why = ""+theform.value;

if(theform.txtInput.value == ""){
why += "- Security code should not be empty.\n";
}
if(theform.txtInput.value != ""){
if(ValidCaptcha(theform.txtInput.value) == false){
why += "- Security code did not match.\n";
}
}
if(why != ""){
alert(why);
return false;
}
}

//Generates the captcha function
var a = Math.ceil(Math.random() * 9)+ '';
var b = Math.ceil(Math.random() * 9)+ '';
var c = Math.ceil(Math.random() * 9)+ '';
var d = Math.ceil(Math.random() * 9)+ '';
var e = Math.ceil(Math.random() * 9)+ '';

var code = a + b + c + d + e;
document.getElementById("txtCaptcha").value = code;
document.getElementById("txtCaptchaDiv").innerHTML = code;

// Validate the Entered input aganist the generated security code function
function ValidCaptcha(){
var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
var str2 = removeSpaces(document.getElementById('txtInput').value);
if (str1 == str2){
return true;
}else{
return false;
}
}

// Remove the spaces from the entered and generated code
function removeSpaces(string){
return string.split(' ').join('');
}
</script>

-->	
</body>
</html>