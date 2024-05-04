<?php session_start();
if (!isset($_SESSION["email"]))
{
    header('Location:loginCompany.php');
}

?>
<!doctype html>

<html>
<head>
	 <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Profile</title>
       <link rel="stylesheet" type="text/css" href=""/>
    
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

</head>
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}</style>

<body>
<div class="header">
  <a href="#default" class="logo">CompanyLogo</a>
  <div class="header-right">
    <a class="active" href="myCompanyprofile.php">View suitable Farmer</a>
    <a href="viewCapturedImages.php">View real time photos</a>
    <a href="logoutCompany.php">Logout</a>
  </div>
</div>
			  
</body>
</html>