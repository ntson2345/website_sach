<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select_users) > 0) {
        $message[] = 'Người dùng đã tồn tại!';
    } else {
        if ($pass != $cpass) {
            $message[] = 'Xác thực mật khẩu không chính xác!';
        } else {
            mysqli_query($conn, "INSERT INTO `users`(name,email,tel,address,password,user_type) 
            VALUES('$name','$email','$tel','$address','$cpass','$user_type')") or die('query failed');
            $message[] = 'Đăng ký thành công!';
            // header('location:login.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đăng Kí</title>

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

        <form action="" method="post">
            <h3>Đăng ký ngay</h3>
            <input type="text" name="name" placeholder="Nhập tên tài khoản" required class="box">
            <input type="email" name="email" placeholder="Nhập địa chỉ email" required class="box">
            <input type="tel" name="tel" placeholder="Nhập số điện thoại" pattern="[0-9]{10}" title="Số điện thoại phải là số và có 10 chữ số" required class="box">
            <input type="text" name="address" placeholder="Nhập địa chỉ" pattern="[A-Za-z ]{1,}" title="Chỉ được nhập chữ" required class="box">
            <input type="password" name="password" placeholder="Nhập mật khẩu" required class="box">
            <input type="password" name="cpassword" placeholder="Xác thực mật khẩu của bạn" required class="box">
            <select name="user_type" class="box">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="btn">
            <p>Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
        </form>
    </div>
</body>

</html>