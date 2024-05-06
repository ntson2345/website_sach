-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 05, 2023 lúc 03:48 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `book_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(94, 10, 'Thỏ bảy màu', 46000, 1, 'Screenshot 2023-02-26 170021.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `tel`, `message`) VALUES
(4, 10, 'LÊ ANH ĐỨC', 'leduc7112002@gmail.com', '0813250204', '3123123123'),
(5, 10, 'LÊ ANH ĐỨC', 'leduc7112002@gmail.com', '0813250204', 'hello');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(255) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `tel`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(6, 10, 'LÊ ANH ĐỨC', '0123456789', 'leduc7112002@gmail.com', 'Ngân hàng điện tử', 'Số nhà 13, Ngõ 52 Tổ 18, Yên Bái, Vietnam - 320000', ', One-Punch Man (3) , Cuộc chiến tỏ tình (5) , Dr.Stone (3) , Nhà có 5 nàng dâu7 (3) , Nhà có 5 nàng dâu4 (4) , Date a Live (4) ', 1532000, '03-May-2023', 'completed'),
(7, 10, 'LÊ ANH ĐỨC', '0123456789', 'leduc7112002@gmail.com', 'Ví điện tử MoMo', 'Số nhà 123123, Ngõ 52 Tổ 18, Yên Bái, Vietnam - 320000', ', 7 viên ngọc rồng (1) , Thỏ bảy màu (2) , Shin cậu bé bút chì 1 (1) ', 154000, '03-May-2023', 'pending');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(20, 'Thỏ bảy màu', 46000, 'Screenshot 2023-02-26 170021.png'),
(21, 'Shin cậu bé bút chì 1', 36000, 'Screenshot 2023-02-26 182617.png'),
(22, 'Ô long viện 1', 36000, 'Screenshot 2023-02-26 182830.png'),
(23, 'Tý quậy 2', 45000, 'Screenshot 2023-02-26 182541.png'),
(30, 'Conan 1', 25000, 'Screenshot 2023-02-26 182854.png'),
(31, 'Naruto', 34000, 'Screenshot 2023-02-26 182939.png'),
(32, 'Tý Quậy 1', 25000, 'Screenshot 2023-02-26 182552.png'),
(33, 'Siêu nhân mỳ ăn liền', 46000, 'Screenshot 2023-02-26 182739.png'),
(34, 'Cậu bé đầu bự 1', 27000, 'Screenshot 2023-02-26 182720.png'),
(35, '7 viên ngọc rồng', 26000, 'Screenshot 2023-02-26 183137.png'),
(36, 'FUUFU IJOU', 35000, 'z4192626054867_094059be1299c3c58205a9fe444c8f67.jpg'),
(37, 'Shin cậu bé bút chì 2', 46000, 'Screenshot 2023-02-26 182628.png'),
(38, 'Siêu nhân mì ăn liên', 46000, 'Screenshot 2023-02-26 182802.png'),
(39, 'Thần đồng đất việt', 23000, 'Screenshot 2023-02-26 183030.png'),
(40, 'Đội quân nhí nhố', 27000, 'Screenshot 2023-02-26 183305.png'),
(42, 'One Piece', 38000, 'z4192651120466_b9f3cedfa4a84a3d44ead95b19ab3bd7.jpg'),
(43, 'Bí mật đảo lớn', 22000, 'cover_vn.jpg'),
(45, 'Chú thuật hồi chiến', 55000, 'sub10jpg_2021-06-11-02-11-44.jpg'),
(46, 'Sơn Goal!', 34000, 'Son-Goal---Tap-1---O-01.jpg'),
(48, 'One-Punch Man', 66000, 'Screenshot 2023-03-18 193212.png'),
(49, 'Cuộc chiến tỏ tình', 67000, '13_4ace4c370b24407a873aeda7fa007d47_large.jpg'),
(50, 'Dr.Stone', 65000, '1_6753aceb0e924cfab81c07b91fcc562a_master.jpg'),
(51, 'Lớp học rùng rợn', 41000, '11_f9f941f6cd77428e9eb453afc427dfdf_large.jpg'),
(52, 'Komi', 56000, '19_53344efadb624577b9d98da2a6b8585e_large.jpg'),
(53, 'Tanaka', 46000, 'Screenshot 2023-03-18 193829.png'),
(54, 'Siêu anh hùng', 36000, 'hoc_vien_sieu_anh_hung___tap_1_1_2018_10_06_10_33_02.jpg'),
(55, 'Ben10', 23000, 'ben-10-muoi-sieu-nhan-xuat-hien-800-21335.jpg'),
(56, 'SpyxFamily', 70000, 'spy_x_family_tap_2.jpg'),
(57, 'Tớ Crush cậu', 47000, 'z4192709909879_1f31550cdda5fc8eaa5642a376c273fc.jpg'),
(59, 'BlueLock', 70000, 'Screenshot 2023-03-18 194951.png'),
(60, 'Nhà có 5 nàng dâu7', 76000, 'Screenshot 2023-03-19 192822.png'),
(61, 'Naruto 30', 57000, 'Screenshot 2023-03-19 192836.png'),
(62, 'Conan 83', 23000, 'Screenshot 2023-03-19 192855.png'),
(63, 'Demon Slayer 10', 35000, 'Screenshot 2023-03-19 192921.png'),
(64, 'Demon Slayer 11', 58000, 'Screenshot 2023-03-19 192939.png'),
(65, 'T4 là lời nói dối', 36000, 'Screenshot 2023-03-19 193020.png'),
(66, 'Nhà có 5 nàng dâu4', 68000, 'Screenshot 2023-03-19 193044.png'),
(67, 'Sếp tôi là tên...', 37000, 'Screenshot 2023-03-19 193253.png'),
(68, 'Conan đặc biệt', 45000, 'Screenshot 2023-03-19 193305.png'),
(69, 'Nhóc miko', 34000, 'Screenshot 2023-03-19 193349.png'),
(70, 'Ragnarok', 46000, 'Screenshot 2023-03-19 193429.png'),
(71, 'Ta đợi chàng đến...', 56000, 'Screenshot 2023-03-19 193525.png'),
(72, 'Bức tranh tuổi học...', 57000, 'Screenshot 2023-03-19 193548.png'),
(73, 'Bleach', 47000, 'Screenshot 2023-03-19 193801.png'),
(74, 'Date a Live', 76000, 'Screenshot 2023-03-19 193907.png'),
(75, 'Thiên sứ nhà bên', 56000, 'Screenshot 2023-03-19 194018.png'),
(76, 'Idol nổi tiếng ngoài...', 69000, 'Screenshot 2023-03-19 194117.png'),
(77, 'Hành trình của Elaina', 68000, 'Screenshot 2023-03-19 194135.png'),
(78, 'Your name', 79000, 'Screenshot 2023-03-19 194157.png'),
(79, 'Thế giới otome thậ...', 57000, 'Screenshot 2023-03-19 194214.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tel`, `address`, `password`, `user_type`) VALUES
(10, 'Kinhcong711', 'az01@gmail.com', '0813250204', 'yenbai', '123', 'user'),
(12, 'Kinhcong0101', 'eqweqwe@gmail.com', '0323232333', 'hanoi', '1234', 'user'),
(15, 'leanhduc', 'leduc7112002@gmail.com', '0813250204', 'yenbai', 'duccute69', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT cho bảng `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
