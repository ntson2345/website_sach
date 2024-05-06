<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['send'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $tel = $_POST['tel'];
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND tel = '$tel' AND message = '$msg'") or die('query failed');

    if (mysqli_num_rows($select_message) > 0) {
        $message[] = 'Phản hồi đã tồn tại!';
    } else {
        mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, tel, message) VALUES('$user_id', '$name', '$email', '$tel', '$msg')") or die('query failed');
        $message[] = 'Cảm ơn bạn đã phản hồi!';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact GamerBook</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">


</head>

<body>
    <?php include 'header.php'; ?>

    <div class="heading-head">
        <h3>Contact us</h3>
        <p>GamerBook Store</p>
    </div>

    <section class="contact">
        <form action="" method="post">
            <h3 class="title">Nhận xét về chúng tôi</h3>
            <input type="text" name="name" required placeholder="Điền tên của bạn" class="box">
            <input type="email" name="email" required placeholder="Điền email của bạn" class="box">
            <input type="tel" name="tel" required placeholder="Điền số điện thoại của bạn" class="box">
            <textarea name="message" class="box" placeholder="Góp ý của bạn" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="Gửi" name="send" class="white-btn box-shadow">
        </form>
    </section>




    <?php include 'footer.php'; ?>
    <script src="assets/js/script.js"></script>
</body>

</html>