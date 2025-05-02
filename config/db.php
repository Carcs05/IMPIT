<?php
$servername = "localhost";
$username = "root";   // or whatever your PHPMyAdmin username
$password = "";       // or your PHPMyAdmin password
$dbname = "wellmeadows_db"; // our database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
