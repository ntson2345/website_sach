<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select_users) > 0) {

        $row = mysqli_fetch_assoc($select_users);

        if ($row['user_type'] == 'admin') {

            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_tel'] = $row['tel'];
            $_SESSION['admin_address'] = $row['address'];
            $_SESSION['admin_id'] = $row['id'];

            header('location:admin_page.php');
        } elseif ($row['user_type'] == 'user') {

            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_tel'] = $row['tel'];
            $_SESSION['user_address'] = $row['address'];
            $_SESSION['user_id'] = $row['id'];

            header('location:home.php');
        }
    } else {
        $message[] = 'Email hoặc mật khẩu chưa chính xác!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '    
            <div class="message">
                <span>' . $message . '</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>';
        }
    }
    ?>

    <div class="form-container">

        <form class="login" action="" method="post">
            <h3>Đăng nhập</h3>
            <input type="email" name="email" placeholder="Nhập địa chỉ email" required class="box">
            <input type="password" name="password" placeholder="Nhập mật khẩu" required class="box">
            <input type="submit" name="submit" value="login now" class="btn">
            <p>Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>
        </form>
    </div>
</body>

</html>