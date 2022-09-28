<?php
require_once './connection/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>QLSP</title>
</head>

<body>
    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = "SELECT * FROM user where user_name = '$username' and user_pass = '$password'";
        $rs = mysqli_query($connect, $login);
        if (mysqli_num_rows($rs) > 0) {
            header("location:main.php");
        } else {
            header("location:index.php");
        }
    }
    ?>
    <div class="container">
        <form method="POST">
            <fieldset>
                <legend>Đăng nhập</legend>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Nhập tên đăng nhập">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" placeholder="Nhập mật khẩu">
                </div>
                <button type="submit" name="login">Đăng nhập</button>
            </fieldset>
        </form>
    </div>
    Username: trantrunghieu
    Matkhau:24112001
</body>

</html>