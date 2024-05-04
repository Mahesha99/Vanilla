<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/regFarmer.css">
<style>
</style>
</head>
<body>

<form action="RegFarmer.php" method="post" name = "form" enctype="multipart/form-data">		
<div class="row">
  <div class="column1" style="background-color:#aaa;">
   <img src="../images/3.jpg" alt="" width="100%" height="100%">
  </div>
	
  <div class="column2" style="background-color:white;">
<div class="container">
 <!-----<div class="brand-title">logo</div>---->
  <div class="inputs">
    <label>EMAIL</label>
    <input type="email" name="txtEmail" id="txtEmail" placeholder="example@test.com" required />
	  <label>Upload picture of your spices </label>
	 <input type="file" name="fileImage" id="fileImage" />
	<label>City</label>
    <input type="text" name="txtCity" id="txtCity" placeholder="Where are you live?" />
	 <label>What are the spices you are looking for ?</label>
    <input type="text" name="txtSpice" id="txtSpice" placeholder="Ex: Vanilla, cloves, etc" />
	<label>Contact details</label>
    <input type="text" name="txtDetails" id="txtDetails"/>
    <label>PASSWORD</label>
    <input type="password" name="txtPassword" id="txtPassword" placeholder="Min 6 charaters long" />
	<label>CONFIRM PASSWORD</label>
    <input type="password" name="txtComPassword" id="txtComPassword"  />
    <button type="submit" name="btnSubmit" id="btnSubmit">Register</button><br>
	  <mark>ALREADY HAVE AN ACCOUNT PLEASE LOG <a href="loginFarmer.php">&nbsp;&nbsp;&nbsp;&nbsp;LOGIN</a>  </mark>
  </div>
 
</div>
  </div>
</div>
</form>
			<?php
	if(isset($_POST["btnSubmit"]))
	{
		$email = $_POST["txtEmail"];
		$city = $_POST["txtCity"];
		$spices = $_POST["txtSpice"];
		$details = $_POST["txtDetails"];
		$password = $_POST["txtPassword"];
	
	  $image = "dp/".basename($_FILES["fileImage"] ["name"]);
			move_uploaded_file($_FILES["fileImage"] ["tmp_name"],$image);
		
		$con = 
		mysqli_connect("localhost","root","","vanilladb");
		if(!$con)
		{
			die("sorry,we are facing a technical issue");
		}
		$sql = "INSERT INTO `farmertb` (`email`, `city`, `spices`, `detail`,`password`, `image`) VALUES ('".$email."', '".$city."', '".$spices."','".$details."','".$password."', '".$image."');";
		
	
		mysqli_query($con,$sql) ;
		mysqli_close($con);
		header('Location:loginFarmer.php');
		
	}
	
	?>	
</body>
</html>