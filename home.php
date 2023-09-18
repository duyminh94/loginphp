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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>

        </style>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="container-fluid">
                        <div class="d-flex align-items-stretch justify-content-between">
                            <h1>Test</h1>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['user_name']; ?>
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Mật Khẩu <?php echo $_SESSION['password']; ?></a>
                                    <a class="dropdown-item" href="edit-user.php">Chỉnh Sửa</a>
                                    <a class="dropdown-item" href="/login.php">Đăng Xuất</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <h2>Danh sách Thông tin</h2>
                        <?php

                        include 'db_connect.php';

                        $sql = "SELECT * FROM sys_users";

                        $result = mysqli_query($conn, $sql);

                        $data = [];

                        $rowNum = 1;
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $data[] = array(
                                'rowNum' => $rowNum,
                                'id' => $row['id'],
                                'user_name' => $row['user_name'],
                                'passwords' => $row['passwords'],
                            );
                            $rowNum++;
                        }
                        ?>
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>User Name</th>
                                    <th>PassWord</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $row) : ?>

                                    <tr>
                                        <td><?php echo $row['rowNum']; ?></td>
                                        <!-- <td><?php echo $row['id']; ?></td> -->
                                        <td><?php echo $row['user_name']; ?></td>
                                        <td><?php echo $row['passwords']; ?></td>
                                        <td>
                                            <!-- Button Sửa -->
                                            <a href="/edit-user.php?id=<?php echo $row['id']; ?>" id="btnUpdate" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Button Xóa -->
                                            <a href="/detele.php?id=<?php echo $row['id']; ?>" id="btnDelete" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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