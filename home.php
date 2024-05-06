<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        $message[] = 'Sách đã có sẵn trong giỏ';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'Thêm sách vào giỏ thành công';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamerBook</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">



</head>

<body>
    <?php include 'header.php'; ?>

    <section class="home">
        <div class="content">
            <h3>GamerBook</h3>
            <p>Cửa hàng truyện tranh dành cho Gamer</p>
            <a href="about.php" class="white-btn">Tìm hiểu ngay</a>
        </div>
    </section>

    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-shipping-fast"></i>
            <div class="content">
                <h3>Freeship</h3>
                <p>khi đặt trên 100000₫</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-lock"></i>
            <div class="content">
                <h3>Bảo mật thanh toán</h3>
                <p>cực kì an toàn</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-undo"></i>
            <div class="content">
                <h3>Trả hàng dễ dàng</h3>
                <p>dưới 10 ngày để trả hàng</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-headset"></i>
            <div class="content">
                <h3>Hỗ trợ 24/7</h3>
                <p>Liên lạc với đội ngũ của chúng tôi</p>
            </div>
        </div>

    </section>

    <section class="featured" id="feadtured">
        <h1 class="heading"><span>Sách bán chạy trong tháng</span></h1>

        <div class="swiper featured-slider">
            <div class="swiper-wrapper">
                <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 10") or die('query failed');

                if (mysqli_num_rows($select_products) > 0) {
                    while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                ?>
                        <div class="swiper-slide box">
                            <form action="" method="post">
                                <div class="icons">
                                    <a href="search_page.php" class="fas fa-search"></a>
                                    <a href="#" class="fas fa-heart"></a>
                                    <a href="shop.php" class="fas fa-eye"></a>
                                </div>
                                <img src="assets/uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                                <div class="name"><?php echo $fetch_products['name']; ?></div>
                                <div class="price"><?php echo $fetch_products['price']; ?>₫/-</div>
                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                                <input type="submit" value="Thêm vào giỏ" name="add_to_cart" class="white-btn box-shadow">
                            </form>
                        </div>
                <?php
                    }
                } else {
                    echo '<div class="empty">
                                <i class="fa-solid fa-triangle-exclamation"></i><p>Chưa có sản phẩm nào trong cửa hàng</p>
                            </div>';
                }
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <section class="featured" id="feadtured">
        <h1 class="heading"><span>Sách giảm giá</span></h1>

        <div class="swiper featured-slider">
            <div class="swiper-wrapper">
                <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 10  OFFSET 10") or die('query failed');

                if (mysqli_num_rows($select_products) > 0) {
                    while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                ?>
                        <div class="swiper-slide box">
                            <form action="" method="post">
                                <div class="icons">
                                    <a href="search_page.php" class="fas fa-search"></a>
                                    <a href="#" class="fas fa-heart"></a>
                                    <a href="shop.php" class="fas fa-eye"></a>
                                </div>
                                <img src="assets/uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                                <div class="name"><?php echo $fetch_products['name']; ?></div>
                                <div class="price">
                                    <?php echo $fetch_products['price']; ?>₫/<span><?php echo $fetch_products['price'] + 5000; ?></span>₫
                                </div>
                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                                <input type="submit" value="Thêm vào giỏ" name="add_to_cart" class="white-btn box-shadow">
                            </form>
                        </div>
                <?php
                    }
                } else {
                    echo '<div class="empty">
                                <i class="fa-solid fa-triangle-exclamation"></i><p>Chưa có sản phẩm nào trong cửa hàng</p>
                            </div>';
                }
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <section class="featured" id="feadtured">
        <h1 class="heading"><span>Sách mới về</span></h1>

        <div class="swiper featured-slider">
            <div class="swiper-wrapper">
                <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 10  OFFSET 20") or die('query failed');

                if (mysqli_num_rows($select_products) > 0) {
                    while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                ?>
                        <div class="swiper-slide box">
                            <form action="" method="post">
                                <div class="icons">
                                    <a href="search_page.php" class="fas fa-search"></a>
                                    <a href="#" class="fas fa-heart heart"></a>
                                    <a href="shop.php" class="fas fa-eye"></a>
                                </div>
                                <img src="assets/uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                                <div class="name"><?php echo $fetch_products['name']; ?></div>
                                <div class="price"><?php echo $fetch_products['price']; ?>₫/-</div>
                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                                <input type="submit" value="Thêm vào giỏ" name="add_to_cart" class="white-btn box-shadow">
                            </form>
                        </div>
                <?php
                    }
                } else {
                    echo '<div class="empty">
                                <i class="fa-solid fa-triangle-exclamation"></i><p>Chưa có sản phẩm nào trong cửa hàng</p>
                            </div>';
                }
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <div class="load-more" style="text-align: center">
        <a href="shop.php" class="white-btn box-shadow">Xem thêm</a>
    </div>

    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="assets/img/about.png" alt="about">
            </div>
            <div class="content">
                <h3>about us</h3>
                <p>Chúng tôi bán sách Chúng tôi bán sách Chúng tôi bán sách Chúng tôi bán sách Chúng tôi bán sách Chúng
                    tôi bán sách Chúng tôi bán sách Chúng tôi bán sách Chúng tôi bán sách Chúng tôi bán sách Chúng tôi
                    bán sách Chúng tôi bán sách</p>
                <a href="about.php" class="white-btn box-shadow">Đọc thêm về chúng tôi</a>
            </div>
        </div>
    </section>

    <section class="home-contact">
        <div class="content">
            <h3>Bạn có thắc mắc ?</h3>
            <p>Gửi câu hỏi cho chúng tôi Gửi câu hỏi cho chúng tôi Gửi câu hỏi cho chúng tôi Gửi câu hỏi cho chúng tôi
                Gửi
                câu hỏi cho chúng tôi Gửi câu hỏi cho chúng tôi</p>
            <a href="contact.php" class="white-btn box-shadow">contact us</a>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>