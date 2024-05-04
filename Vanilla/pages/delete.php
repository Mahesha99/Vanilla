<?php
session_start(); 
if (!isset($_SESSION["email"]))
{
	 header('Location:loginFarmer.php');

}
$con = mysqli_connect("localhost","root","","vanilladb");
			if(!$con)
			{	
				die("Cannot upload the file, Please choose another file");		
			}
			$sql = "DELETE FROM `itemtb` WHERE `itemtb`.`itemID` = ".$_GET["id"]; 
	   
	  	mysqli_query($con,$sql);	
		header('Location:myprofile.php');
	

	?>