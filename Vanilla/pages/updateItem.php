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
  <div class="title" align="center"><strong>Update ITEM</strong></div>
  <div class="sub-title"></div>
 <?php
				$con = mysqli_connect("localhost","root","","vanilladb");
				
				if(!$con)
				{
					die("Cannot connect to DB server");
				}
				$sql ="SELECT * FROM `itemtb` WHERE `itemID`='".$_GET['id']."'";
				
				$image ="";
					$results=mysqli_query($con,$sql);
					if(mysqli_num_rows($results)>0)
					{
			$row = mysqli_fetch_assoc($results);
			$image =$row['image'];
					
				
				?>
<form action="updateItem.php?id=<?php echo $_GET['id'];?>" method="post" enctype="multipart/form-data">	
<table width="800" height="503" border="0" style="padding-left: 600px;">
  <tbody>
    <tr>
      <td width="500" style="padding: 15px;"><strong> Item name</strong></td>
      <td width="314"><input type="text" name="txtItemName" id="txtItemName" value="<?php echo $row['topic'];?>"></td>
    </tr>
	  <tr>
      <td width="500" style="padding: 15px;"><strong>Description</strong></td>
      <td width="314"> <input type="text" name="txtDescription" id="txtDescription" value="<?php echo $row['itemName'];?>"> </td>
    </tr>
    <tr>
       <td width="500" style="padding: 15px;"><strong> Image </strong></td>
      <td width="314" style="padding-left: 100px;"> <input type="file" name="fileImage" id="fileImage"/></td>
    </tr>
    <tr>
      <td width="500" style="padding: 15px;"><strong> City </strong></td>
      <td width="314"><input type="text" name="txtCity" id="txtCity" value="<?php echo $row['city'];?>"></td>
    </tr>

	      <tr>
	        <td height="85" style="padding: 15px;"><strong>status</strong></td>
	        <td><label class="container">
	          <input type="checkbox" name="chkPublish" id="chkPublish" <?php if($row['status']==1)
			{
				echo "checked";
			} 
			?> >
            Publish this <span class="checkmark"></span> </label></td>
      </tr>
	  
	  		   <br>
			  		
			  			  			<?php
				if(isset($_POST["btnSubmit"]))
			{
				if(is_uploaded_file($_FILES['fileImage']['tmp_name']))
				{
   				$image = "uploads/".basename($_FILES["fileImage"]["name"]);
				move_uploaded_file($_FILES["fileImage"]["tmp_name"],$image);
				}  
					
				$topic= $_POST["txtItemName"];
				$itemName = $_POST["txtDescription"];
				$city =  $_POST["txtCity"];
				
				if(isset($_POST["chkPublish"]))
				{
					$status = 1;
				}
				else
				{
					$status = 0; 
				}
			
			$con = mysqli_connect("localhost","root","","vanilladb");
			if(!$con)
			{	
				die("Cannot upload the file, Please choose another file");		
			}
			
	 $sql = "UPDATE `itemtb` SET `topic` = '".$topic."', `itemName` = '".$itemName."', `image` = '".$image."', `city` = '".$city."' WHERE `itemtb`.`itemID` = ".$_GET['id'].";";
					
					
	if(  mysqli_query($con,$sql))
	{
		echo " Update Successfully";
		
	}
	else
		echo "Opps something is wrong, Please select the file again";
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
		  <?php 
					}
			  ?>
</body>
</html>