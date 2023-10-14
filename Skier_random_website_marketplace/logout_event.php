<?php 
session_destroy(); // Destroying the session ...
header("location: login_page.php"); // ... and redirectring the user to the login page
?>