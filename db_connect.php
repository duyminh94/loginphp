<?php
$servername = "mysql";
$username = "root";
$password = "root";
$db_name = 'db_login';

$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>