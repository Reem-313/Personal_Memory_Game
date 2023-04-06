<?php
require 'dbconnection.php';
$_SESSION =[];
// Unset all of the session variables
session_unset();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>