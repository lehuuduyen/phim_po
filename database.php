<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie2";
// $servername = "web-mysql";
// $username = "root";
// $password = "admin";
// $dbname = "phim";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>
