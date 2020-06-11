-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 11, 2020 lúc 07:17 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `gaminggear`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `rrp` decimal(7,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'Dualshock 4 Red', '<p>Unique watch made with stainless steel, ideal for those that prefer interative watches.</p>\r\n<h3>Features</h3>\r\n<ul>\r\n<li>Powered by Android with built-in apps.</li>\r\n<li>Adjustable to fit most.</li>\r\n<li>Long battery life, continuous wear for up to 2 days.</li>\r\n<li>Lightweight design, comfort on your wrist.</li>\r\n</ul>', '29.99', '0.00', 10, 'dualshock4red.jpg', '2019-03-13 17:55:22'),
(2, 'Xbox One S Blue', '', '14.99', '19.99', 34, 'xboxone_s_blue.jpg', '2019-03-13 18:52:49'),
(3, 'Xbox One S White Sport', '', '19.99', '0.00', 23, 'xboxone_s_white.jpg', '2019-03-13 18:47:56'),
(4, 'Xbox One S Gray Green', '', '69.99', '0.00', 7, 'xboxone_s_graygreen.jpg', '2019-03-13 17:42:04'),
(5, 'Dualshock 4 White', '', '60.00', '0.00', 1, 'dualshock4white.jpg', '2020-06-11 22:32:57'),
(6, 'Game Pad Mocute', '', '20.00', '0.00', 5, 'gamepad_MOCUTE_050.jpg', '2020-06-11 23:04:19'),
(7, 'RGB Gaming Mouse HXSJ S500 ', '✅ Chế độ ánh sáng: hiệu ứng RGB marquee, dưới cùng của con chuột với một nút chuyển đổi ánh sáng.\r\n✅ DPI 12 cấp có thể điều chỉnh, Tối đa 4.800 DPI\r\n✅ Điện áp / dòng điện: DC 5V / 100mA\r\n✅ 20 triệu click\r\n✅ Chiều dài cáp: 150cm\r\n✅ Dễ dàng sử dụng ', '10.00', '0.00', 4, 'HXSJ_S500.jpeg', '2020-06-11 23:08:17'),
(8, 'Headphone Gaming Bosston HS300 LED', 'Kiểu dáng cá tính, nổi bật\r\nThiết kế lớp đệm chụp tai êm ái, thoải mái\r\nHệ thống đèn LED tự chuyển màu ấn tượng\r\nChất lượng âm thanh sống động, trung thực\r\nKết nối qua jack cắm 3.5mm hoặc cổng USB tiện lợi', '20.00', '0.00', 5, 'hs300.jpg', '2020-06-11 23:12:26');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
