<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Style css -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="row" id="conteiner">
        <div class="col-sm-6 boxLogin">
            <form action="/register-check.php" method="post">
                <h1>Register</h1>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="text-danger"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                    <p class="text-success"><?php echo $_GET['success']; ?></p>
                <?php } ?>

                <input type="text" name="username" placeholder="Username" value="<?php echo $_GET['username']; ?>" />
                <input type="password" name="password" placeholder="Password" />
                <input type="password" name="re_password" placeholder="Reply Password">
                <button type="submit" name="register">Register</button>

                <a href="index.php" class="ca">
                    <i class="fa fa-arrow-left"></i>
                    Đã có tài khoản</a>
            </form>
        </div>
        <div class="col-sm-6 boxLogin" id="Cadastre">
            <h1>Welcome My Friend!</h1>
        </div>
    </div>


    <!-- Jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>