<?php session_start();
if (!isset($_SESSION["email"]))
{
    header('Location:loginCompany.php');
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../css/suitable.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script> 
$(function(){
  $("#header").load("headerCompany.php");
});
</script>
</head>

<body>
<div id="header"></div>
<br><br>

<?php
$con = mysqli_connect("localhost","root","","vanilladb");
if(!$con)
{
    die("Cannot connect to DB server");
}
$sql ="SELECT * FROM `companytb` WHERE `email`='".$_SESSION['email']."'";


$results=mysqli_query($con,$sql);
if(mysqli_num_rows($results)>0)
{
    $row = mysqli_fetch_assoc($results);
?>
    <table width="82%" height="142%" border="0" align="center">
        <tbody>
            <tr>
                <td width="290" height="271"> <img class="img1" src="<?php echo $row['image'];?>" alt="" width="234" height="229"></td>
                <td width="804">
                    <h2> <?php echo $row['spice'];?> Company </h2>
                    <h3> Company's email: <?php echo $row['email'];?> </h3>
                    <h3> City/ Address : <?php echo $row['city'];?></h3>
                </td>
            </tr>
            <tr>
                <td height="176" colspan="2" align="center" ><h1><strong>Suitable <?php echo $row['spice'];?> wholesale Farmers </strong></h1></td>
            </tr>

<?php
$con = mysqli_connect("localhost", "root", "", "vanilladb");
if (!$con) {
    die("Cannot connect to DB server");
}

$sql = "SELECT farmertb.*
        FROM farmertb
        WHERE farmertb.spices = '{$row['spice']}'";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
?>
            <tr>
                <td><img class="img2" src="<?php echo $row['image']; ?>" alt="" width="193" height="195"></td>
                <td>
                    <h3>Farmer : <?php echo $row['email']; ?> <br>
                        Business Type : Exporter <br>
                        Main Markets : <?php echo $row['city']; ?><br>
                        Spice type : <?php echo $row['spices']; ?><br>
						Contact Details : <?php echo $row['detail']; ?><br>
                    </h3>
                </td>
                <td><a href="mailto:<?php echo $row['email']; ?>"><button class="button button3">To Contact</button></a></td>
            </tr>
<?php
    }
}

mysqli_close($con);
?>
        </tbody>
    </table>
	 
<?php 
}
?>
</body>
</html>
