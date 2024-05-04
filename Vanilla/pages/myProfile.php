<?php session_start();
if (!isset($_SESSION["email"]))
{
    header('Location:loginFarmer.php');
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link rel="stylesheet" type="text/css" href="../css/profile.css"/>
<script> 
$(function(){
  $("#header").load("header.php");
});
</script>
</head>

<body>
<div id="header"></div>
	<br><br><br>
	
         <div class="content" align="center">
<form action="" method="post" enctype="multipart/form-data">
           <table width="50%" height="112%" border="0" align="center">
	  <tbody>
	 
		  <?php
				$con = mysqli_connect("localhost","root","","vanilladb");
				
				if(!$con)
				{
					die("Cannot connect to DB server");
				}
				$sql ="SELECT * FROM `itemtb` WHERE `email`='".$_SESSION['email']."'";
				
				$result = mysqli_query($con,$sql);
				
				if(mysqli_num_rows($result)> 0)
					
				{
					while($row = mysqli_fetch_assoc($result))
					{
						
					
				
				?>
		  
		  
		  <div class = "container mt-2" > 
		  <div class="image">
				  <a href="<?php echo $row['image'];?>"><img src="<?php echo $row['image'];?>" width="195" height="192" alt=""> </a>
					<div class="title"><?php echo $row['topic'];?><br>
					<div class="desc"><?php echo $row['itemName'];?><br>
					<a href="updateItem.php?id=<?php echo $row['itemID']; ?>">Edit</a> | <a href="delete.php?id=<?php echo $row['itemID']; ?>">Delete</a>
				   </div>
				   </div>
		  </div>
		</div>	
		 
		   <?php
						
				}
			}
				mysqli_close($con);
				?>
			  
      </tbody>
		
	  </table>
</form>
         </div>

	
</body>
</html>