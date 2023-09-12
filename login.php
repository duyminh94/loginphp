<?php 
session_start();
include 'db_connect.php';
if(isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

   $user = validate($_POST['username']);
   $pass = validate($_POST['password']); 

    if(empty($user)) {
        header("Location: index.php?error=Username is required");
        exit();
    }else if(empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM sys_users WHERE user_name='$user' AND passwords='$pass'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $user && $row['passwords'] === $pass) {
                $_SESSION['password'] = $row['passwords'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['id'] = $row['id'];
                header('Location: home.php');
                exit();
               
            } else {
                header("Location: index.php?error=Incorect User name or password");
                exit();
            }
        } else {
            header("Location: index.php?error=Incorect User name or password");
            exit();
        }
    }

}else {
    header("Location: index.php");
    exit(); 
} 