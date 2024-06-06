<?php 
// Start the session 
session_start(); 
 
// Destroy the session 
session_destroy(); 
 
// Redirect to the LogIn.php page 
header('location:login.html'); 
?>