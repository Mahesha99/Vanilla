<?php
session_start(); // Resume existing session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
header('Location: loginFarmer.php'); // Redirect to login page
exit(); // Stop further execution
?>
