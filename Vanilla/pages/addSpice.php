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
<link rel="stylesheet" type="text/css" href="../css/addSpice.css">
<script> 
$(function(){
  $("#header").load("header.php");
});
</script>
</head>

<body>
	
<div id="header"></div>
	<br><br><br>
<div class="body-text">
  <div class="title" align="center"><strong>ADD ITEM</strong></div>
  <div class="sub-title"></div>
<form action="addSpice.php" method="post" enctype="multipart/form-data">	
<table width="800" height="503" border="0" style="padding-left: 600px;">
  <tbody>
    <tr>
      <td width="500" style="padding: 15px;"><strong> Item name</strong></td>
      <td width="314"><input type="text" name="txtItemName" id="txtItemName"></td>
    </tr>
	  <tr>
      <td width="500" style="padding: 15px;"><strong>Description</strong></td>
      <td width="314"> <input type="text" name="txtDescription" id="txtDescription"> </td>
    </tr>
    <tr>
       <td width="500" style="padding: 15px;"><strong> Image </strong></td>
      <td width="314" style="padding-left: 100px;"> <input type="file" name="fileImage" id="fileImage" /></td>
    </tr>
    <tr>
      <td width="500" style="padding: 15px;"><strong> City </strong></td>
      <td width="314"><input type="text" name="txtCity" id="txtCity"></td>
    </tr>

	      <tr>
	        <td height="85" style="padding: 15px;"><strong>status</strong></td>
	        <td><label class="container">
	          <input type="checkbox" name="chkPublish" id="chkPublish">
            Publish this <span class="checkmark"></span> </label></td>
      </tr>
	  
	  		   <br>
			  			  <?php
			  if(isset($_POST["btnSubmit"]))
			  {
				  $title = $_POST["txtItemName"];
				  $itemName = $_POST["txtDescription"];
				  $city = $_POST["txtCity"];
				  if(isset($_POST["chkPublish"]))
				  {$status = 1; }
				  else
				  { $status = 0; }
				  
				  
				  $image = "uploads/".basename($_FILES["fileImage"] ["name"]);
			move_uploaded_file($_FILES["fileImage"] ["tmp_name"],$image);
				  //rest of the code
				  
				  		$con = 
			mysqli_connect("localhost","root","","vanilladb");
		   if(!$con)
		    {
			die("sorry,we are facing a technical issue");
		     }
				  
				 $sql = "INSERT INTO `itemtb` (`email`, `topic`, `itemName`, `image`, `city`, `status`, `itemID`) VALUES ('".$_SESSION["email"]."', '".$title."', '".$itemName."', '".$image."','".$city."', '".$status."', NULL);";
				  
				 if( mysqli_query($con,$sql))
				 {
					 echo "Item upload successfully";
				 }
				  else
					  echo "Opps something is wrong, please select the file again";
				  
				  //rest of the DB code
				  	
	                
			  }
			  ?>
	
            <br />
	  
	  
	      <tr>
	      <td height="122" colspan="2" style="padding: 15px;"> <button name="btnSubmit" type="submit" class="button" id="btnSubmit">Add Item</button></td>
        </tr>
	  

  </tbody>
</table>
	</form>
</div>

</body>
</html>