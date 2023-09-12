<?php
$servername = "mysql";
$username = "root";
$password = "root";
$db_name = 'db_login';

$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if (!$conn) {
  // die("Connection failed: " . $conn->connect_error);
  echo "Connection failed: " ;
}
// echo "Connected successfully";
?>