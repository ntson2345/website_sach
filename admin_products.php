<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('locantion:login.php');
}

if (isset($_POST['add_product'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'assets/uploaded_img/' . $image;

    $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

    if (mysqli_num_rows($select_product_name) > 0) {
        $message[] = 'Sản phẩm đã có sẵn';
    } else {
        $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$name', '$price', '$image')") or die('query failed');

        if ($add_product_query) {
            if ($image_size > 2000000) {
                $message[] = 'Kích thước ảnh quá lớn';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Thêm sản phẩm thành công!';
            }
        } else {
            $message[] = 'Thêm sản phẩm không thành công!';
        }
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    unlink('assets/uploaded_img/' . $fetch_delete_image['image']);
    mysqli_query($conn, "DELETE FROM `products` WHERE id ='$delete_id'") or die('query failded');
    header('location:admin_products.php');
}

if (isset($_POST['update_product'])) {
    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];

    mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price'
    WHERE id = '$update_p_id'") or die('query failded');

    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_folder = 'assets/uploaded_img/' . $update_image;
    $update_old_image = $_POST['update_old_image'];

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'Kích thước ảnh quá lớn';
        } else {
            mysqli_query($conn, "UPDATE `products` SET image = '$update_image'
            WHERE id = '$update_p_id'") or die('query failded');
            move_uploaded_file($update_image_tmp_name, $update_folder);
            unlink('assets/uploaded_img/' . $update_old_image);
        }
    }
    header('location:admin_products.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản lý sản phẩm</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <link rel="stylesheet" href="assets/css/admin_style.css">

</head>

<body>
    <?php include 'admin_header.php'; ?>

    <section class="add-products">

        <h1 class="title">Product list</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <h3>Thêm sản phẩm</h3>
            <input type="text" name="name" class="box" placeholder="Nhập tên sản phẩm" required>
            <input type="number" min="20000" step="1000" name="price" class="box" placeholder="Nhập giá sản phẩm"
                required>
            <input type="file" name="image" accept="image/ipg image/jpeg image/png" class="box" required>
            <input type="submit" value="add product" name="add_product" class="btn">
        </form>
    </section>

    <section class="show-products">
        <div class="box-container">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
            ?>
            <div class="box">
                <img src="assets/uploaded_img/<?php echo $fetch_products['image']; ?>" alt="Bìa sách truyện tranh">
                <div class="name"><?php echo $fetch_products['name']; ?></div>
                <div class="price"><?php echo $fetch_products['price']; ?>₫/-</div>
                <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
                <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn"
                    onclick="return confirm('Xóa sản phẩm này?');">delete</a>
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
    </section>


    <section class="edit-product-form">
        <?php
        if (isset($_GET['update'])) {
            $update_id = $_GET['update'];
            $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id='$update_id'") or die('query failed');
            if (mysqli_num_rows($update_query) > 0) {
                while ($fetch_update = mysqli_fetch_assoc($update_query)) {
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
            <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
            <img src="assets/uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
            <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required
                placeholder="Nhập mới tên sản phẩm">
            <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" class="box" required
                placeholder="Nhập mới giá sản phẩm">
            <input type="file" class="box" name="update_image" accept="image/ipg image/jpeg image/png">
            <input type="submit" value="Update" name="update_product" class="option-btn">
            <input type="reset" value="Cancel" id="close-update" class="delete-btn">
        </form>
        <?php
                }
            }
        } else {
            echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
        }
        ?>
    </section>




    <script src="assets/js/admin_page.js"></script>
</body>

</html>