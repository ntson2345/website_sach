<?php
include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('locantion:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About GamerBook</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">


</head>

<body>
    <?php include 'header.php'; ?>

    <div class="heading-head">
        <h3>about us</h3>
        <p>GamerBook Store</p>
    </div>

    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="assets/img/about.png" alt="about">
            </div>
            <div class="content">
                <h3>Cửa hàng sách dành cho gamer</h3>
                <p>Chúng tôi bán sách cho gamer Chúng tôi bán sách cho gamer Chúng tôi bán sách cho gamer Chúng tôi bán
                    sách cho gamer </p>
                <p>Chúng tôi bán sách cho Chúng tôi bán sách Chúng tôi bán sách Chúng tôi bán sách Chúng tôi bán sách
                    Chúng tôi bán sách Chúng tôi bán sách </p>
                <a href="contact.php" class="white-btn box-shadow">Liên hệ với chúng tôi</a>
            </div>
        </div>
    </section>

    <section class="reviews">
        <h1 class="title">Đánh giá người dùng</h1>
        <div class="box-container">
            <div class="box">
                <img src="assets/img/photo/Screenshot 2023-03-19 170640.png" alt="">
                <p>em yêu gamerbook em yêu gamerbook em yêu gamerbook em yêu gamerbook em yêu gamerbook</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h3>Thùy linh 2k4</h3>
            </div>
            <div class="box">
                <img src="assets/img/photo/Screenshot 2023-03-19 170726.png" alt="">
                <p>em yêu gamerbook em yêu gamerbook em yêu gamerbook em yêu gamerbook em yêu gamerbook</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h3>Huyền trang 2k3</h3>
            </div>
            <div class="box">
                <img src="assets/img/photo/Screenshot 2023-03-19 170753.png" alt="">
                <p>em yêu gamerbook em yêu gamerbook em yêu gamerbook em yêu gamerbook em yêu gamerbook</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Bảo ngân 2k2</h3>
            </div>
            <div class="box">
                <img src="assets/img/photo/Screenshot 2023-03-19 170804.png" alt="">
                <p>em yêu gamerbook em yêu gamerbook em yêu gamerbook em yêu gamerbook em yêu gamerbook</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Vũ chi 2k3</h3>
            </div>
            <div class="box">
                <img src="assets/img/photo/Screenshot 2023-03-19 170916.png" alt="">
                <p>em yêu gamerbook em yêu gamerbook em yêu gamerbook em yêu gamerbook em yêu gamerbook</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h3>Thanh trà 2k5</h3>
            </div>
            <div class="box">
                <img src="assets/img/photo/Screenshot 2023-03-19 171010.png" alt="">
                <p>em yêu gamerbook em yêu gamerbook em yêu gamerbook em yêu gamerbook em yêu gamerbook</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Ngọc huyền 2k1</h3>
            </div>
        </div>
    </section>

    <section class="top-user">
        <h1 class="title">Top người dùng</h1>

        <div class="box-container">

            <div class="box">
                <img src="assets/img/photo/Screenshot 2023-03-19 170640.png" alt="">
                <div class="share">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                </div>
                <h3>Thùy linh 2k4</h3>
            </div>
            <div class="box">
                <img src="assets/img/photo/Screenshot 2023-03-19 170726.png" alt="">
                <div class="share">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                </div>
                <h3>Huyền trang 2k3</h3>
            </div>
            <div class="box">
                <img src="assets/img/photo/Screenshot 2023-03-19 170916.png" alt="">
                <div class="share">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                </div>
                <h3>Thanh trà 2k5</h3>
            </div>
        </div>
    </section>



    <?php include 'footer.php'; ?>
    <script src="assets/js/script.js"></script>
</body>

</html>