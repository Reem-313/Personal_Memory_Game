<?php
session_start();
$servername = "localhost";
$username = "k7qdcxk_Reem";
$password = "313Rsek313";
$dbname = "k7qdcxk_MemoGame";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
