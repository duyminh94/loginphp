<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['password'])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <link rel="stylesheet" href="/css/style.css">
    </head>

    <body>

        <h1 class="text-center text-black">
            Chào Mừng, <?php echo $_SESSION['user_name']; ?>
        </h1>
        <h2 class="text-center text-black">
            <?php echo $_SESSION['password']; ?>
        </h2>
        <br />
        <div class="d-flex">
            <!-- <a class="btn btn-primary" href="logout.php">logout</a> -->
            <a class="btn btn-success ml-3" href="edit-user.php">Chỉnh Sửa</a>
        </div>

        <!-- Jquery -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>