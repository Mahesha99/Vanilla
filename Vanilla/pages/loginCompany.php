<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/LoginFarmer.css">

</head>
<body>
<form action="loginCompany.php" method="post">
<div class="row">
  <div class="column1" style="background-color:#aaa;">
   <img src="../images/2.jpg" alt="" width="100%" height="100%">
  </div>
	
  <div class="column2" style="background-color:white;">
<div class="container">
		  	<br><br><br>
 <!-----<div class="brand-title">logo</div>---->
	
		    <p>
			  
						   <?php 
				if( isset($_POST["btnsubmit"])){
				$email = $_POST["txtEmail"];
				$password = $_POST["txtPassword"];
			
				$con = mysqli_connect("localhost","root","","vanilladb");
					if(!$con)
					{
						die("Cannot connect to Db server");
					}
				$sql = "SELECT * FROM `companytb` WHERE `email`='".$email."' AND `password` ='".$password."';";
					$results = mysqli_query($con,$sql) ;
					
				
				if(mysqli_num_rows($results)>0)
				{
					$_SESSION["email"] = $email;
			
					
										?>
				<script> 
				window.location.href='myCompanyprofile.php';
				</script>
				
				<?php
				}
			  else
			  {
				  echo "Please enter a correct username and a password";
			  }
			}
			  ?>
			  
			  
			  </p>

	
  <div class="inputs">
    <label>EMAIL</label>
    <input type="email" name="txtEmail" id="txtEmail" placeholder="example@test.com" />
    <label>PASSWORD</label>
    <input type="password" name="txtPassword" id="txtPassword" placeholder="Min 6 charaters long" />
    <button type="submit" name="btnsubmit">LOGIN</button><br><br> 
	  	  <mark>DON'T HAVE AN ACCOUNT PLEASE REGISTER HERE<a href="companyRegister.php">&nbsp;&nbsp;&nbsp;&nbsp;Register here </a>  </mark>
  </div>
 
</div>

  </div>
</div>
</form>
</body>
</html>