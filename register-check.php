<?php 
session_start();
include 'db_connect.php';

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['re_password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $user = validate($_POST['username']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);


    $user_data = 'username: '.$user;
    

    if(empty($user)) {
        header("Location: signup.php?error=Username is required&$user_data");
        exit();
    } elseif(empty($pass)) {
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    } elseif(empty($re_pass)) {
        header("Location: signup.php?error=Re Password is required&$user_data");
        exit();
    } elseif ($pass !== $re_pass) {
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
        exit();
    } else {
        // hashing password
        // $pass = md5($pass);

        $sql = "SELECT * FROM sys_users WHERE user_name='$user'";

        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=The username is taken try another&$user_data");
            exit();
        } else {
            $sql2 = "INSERT INTO sys_users(user_name, passwords) VALUES('$user', '$pass')";
            $result2 = mysqli_query($conn, $sql2);
            if($result2) {
                header("Location: signup.php?success=Your account has been created successfully"); 
                exit();
            } else {
                header("Location: signup.php?error=unkown error occurred&$user_data");
                exit();
            }
        }
    }

} else {
    header("Location: signup.php");
    exit();
}