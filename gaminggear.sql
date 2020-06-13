-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2020 at 11:37 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaminggear`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `rrp` decimal(7,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'Dualshock 4 Red', '<p>Unique watch made with stainless steel, ideal for those that prefer interative watches.</p>\r\n<h3>Features</h3>\r\n<ul>\r\n<li>Powered by Android with built-in apps.</li>\r\n<li>Adjustable to fit most.</li>\r\n<li>Long battery life, continuous wear for up to 2 days.</li>\r\n<li>Lightweight design, comfort on your wrist.</li>\r\n</ul>', '1300000.00', '0.00', 10, 'dualshock4red.jpg', '2019-03-13 17:55:22'),
(2, 'Xbox One S Blue', '', '1200000.00', '19.99', 34, 'xboxone_s_blue.jpg', '2019-03-13 18:52:49'),
(3, 'Xbox One S White Sport', '', '1400000.00', '0.00', 23, 'xboxone_s_white.jpg', '2019-03-13 18:47:56'),
(4, 'Xbox One S Gray Green', '', '1300000.00', '0.00', 7, 'xboxone_s_graygreen.jpg', '2019-03-13 17:42:04'),
(5, 'Dualshock 4 White', '', '1400000.00', '0.00', 1, 'dualshock4white.jpg', '2020-06-11 22:32:57'),
(6, 'Game Pad Mocute', '', '271000.00', '0.00', 5, 'gamepad_MOCUTE_050.jpg', '2020-06-11 23:04:19'),
(7, 'RGB Gaming Mouse HXSJ S500 ', '✅ Chế độ ánh sáng: hiệu ứng RGB marquee, dưới cùng của con chuột với một nút chuyển đổi ánh sáng.\r\n✅ DPI 12 cấp có thể điều chỉnh, Tối đa 4.800 DPI\r\n✅ Điện áp / dòng điện: DC 5V / 100mA\r\n✅ 20 triệu click\r\n✅ Chiều dài cáp: 150cm\r\n✅ Dễ dàng sử dụng ', '255000.00', '0.00', 4, 'HXSJ_S500.jpeg', '2020-06-11 23:08:17'),
(8, 'Headphone Gaming Bosston HS300 LED', 'Kiểu dáng cá tính, nổi bật\r\nThiết kế lớp đệm chụp tai êm ái, thoải mái\r\nHệ thống đèn LED tự chuyển màu ấn tượng\r\nChất lượng âm thanh sống động, trung thực\r\nKết nối qua jack cắm 3.5mm hoặc cổng USB tiện lợi', '450000.00', '0.00', 5, 'hs300.jpg', '2020-06-11 23:12:26'),
(9, 'Game Pad Pubg 60x30cm', '', '95000.00', '0.00', 3, 'lot-chuot-pubg-60x30cm.jpg', '2020-06-12 11:21:32'),
(10, 'IPEGA PG-9017S', '', '220000.00', '0.00', 4, 'ipega9017s.jpg', '2020-06-12 11:22:33'),
(11, 'Joysticks mini', '', '25000.00', '0.00', 10, 'joystick-mini.jpg', '2020-06-12 11:24:09'),
(12, 'Game Pad Pubg 70x30cm', '', '105000.00', '0.00', 2, 'lot-chuot-pubg-70x30cm.jpg', '2020-06-12 11:24:55'),
(13, 'Bán phím cơ Corsair K95', '', '5005000.00', '0.00', 0, 'corsairk95rgb.jpg', '2020-06-13 08:01:55'),
(14, 'Bàn phím cơ SteelSeries APEX 5 RGB', '', '2800000.00', '0.00', 0, 'steelseriesapex5rgb.jpg', '2020-06-13 08:01:55'),
(15, 'Tai Nghe Dareu VH350SE', '', '290000.00', '0.00', 0, 'dareuvh.jpg', '2020-06-13 08:14:09'),
(16, 'Tai nghe Logitech G431', '', '1499000.00', '0.00', 0, 'logitechg431.jpg', '2020-06-13 08:14:09'),
(17, 'Máy chơi game Playstation PS4 Pro', '', '9999999.99', '0.00', 0, 'ps4pro.jpg', '2020-06-13 08:16:41'),
(18, 'Bộ kính thực tế ảo Oculus Quest', '', '9999999.99', '0.00', 0, 'thucteao.jpg', '2020-06-13 08:20:37'),
(19, 'Ghế gamer E-Dra Hercules EGC203', '', '3289000.00', '0.00', 0, 'ghe1.jpg', '2020-06-13 08:23:58'),
(20, 'Ghế Gamer E-Dra Citizen Black/Red', '', '1889000.00', '0.00', 0, 'ghe2.jpg', '2020-06-13 08:23:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
