<?php 

session_start();

include 'db_connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM sys_users WHERE id='$id'";

$result = mysqli_query($conn, $sql);

mysqli_close($conn);

header('location: home.php');