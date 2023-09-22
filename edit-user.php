<?php
session_start();

include 'db_connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM sys_users WHERE id='$id'";

$result = mysqli_query($conn, $sql);
$user_row = mysqli_fetch_array($result, MYSQLI_ASSOC);


if (empty($user_row)) {
    echo 'Giá trị id: $id không tồn tại. Vui Lòng Kiểm tra';
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">
</head>

<body>


    <form action="" method="POST">
        <div class="form-group">
            <label>ID</label>
            <input type="text" name="id"  value="<?php echo $user_row['id'] ?>">
        </div>

        <div class="form-group">
            <label>Người Dùng</label>
            <input type="text" name="new_user_name" value="<?php echo $user_row['user_name'] ?>">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" id="myInput" name="new_password" value="<?php echo $user_row['passwords'] ?>">

        </div>
        <!-- <input type="checkbox" onclick="myFunction()">Show Password -->
        <button type="submit" name="btnSave" class="btn btn-success">Save</button>
        <!-- <a class="btn btn-primary" href="logout.php">logout</a> -->
    </form>
    <?php
    if(isset($_POST['btnSave'])) {
        $user_name = $_POST['new_user_name'];
        $password = $_POST['new_password'];

        // Câu lệnh update
        $sql = "UPDATE sys_users SET user_name = '$user_name', passwords='$password' WHERE id='$id'";

        mysqli_query($conn, $sql);

        mysqli_close($conn);

        header('location: home.php');
        exit();
    } 
    
    ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


</body>

</html>
