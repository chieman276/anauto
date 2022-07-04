-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 10:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `quantity`, `price`, `code`) VALUES
(1, 1, '', 223450000, ''),
(2, 1, '', 223450000, '1656729614'),
(3, 1, '', 223450000, ''),
(4, 1, '', 223450000, '1656908387');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Car'),
(2, 'Motorcycle');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `password`, `email`) VALUES
(1, 'Mai Chiếm An', '123456', 'an@gmail.com'),
(2, 'Võ Văn Tuấn', '123456', 'tuan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `description`, `image`, `price`, `category_id`) VALUES
(1, 'VinFat SUV Lux SA 2.0', '34', ' Sau khi tính cả thuế VAT, phí trước bạ và các loại phí khác, giá lăn bánh 3 chiếc xe ô tô của Vinfast là Fadil, sedan Lux A 2.0 và SUV Lux SA 2.0 cao nhất lần lượt là 436 triệu, 1,007 tỷ và 1,421 tỷ đồng tính theo giá đã ưu đãi.', 'https://vietnambiz.mediacdn.vn/stores/news_dataimages/administrator/112018/21/00/3920_lux_sa2.0.jpg', 223450000, 1),
(2, 'VinFast Fadil', '50', 'Có 5 tùy chọn cho phiên bản VinFast Fadil gồm ngoại thất nâng cấp, nội thất nâng cấp, giải trí, tiện lợi và an toàn.', 'https://imgthumb-cdn.thethao247.vn/thumbamp/upload/hiep95/2019/06/24/bang-gia-xe-vinfast-fadil-thang-6-2019-cap-nhat-moi-nhat1561372242.jpg', 407000000, 1),
(3, ' Air Blade 125/160', '50', 'Xứng danh mẫu xe tay ga thể thao tầm trung hàng đầu trong suốt hơn một thập kỷ qua, AIR BLADE hoàn toàn mới nay được nâng cấp động cơ eSP+ 4 van độc quyền, tiên tiến nhất giúp mang trong mình mãnh lực tiên phong', 'https://cdn.honda.com.vn/motorbikes/May2022/yXVDCgQDZJcYqcCZPzyQ.png', 42090000, 2),
(4, 'CB150R The Streetster', '50', 'CB150R là sự pha trộn hoàn hảo giữa cổ điển và đương đại, nam tính và đầy bản lĩnh với màu sắc mới tinh tế từ khung, phuộc và tem xe, cùng thiết kế tân cổ điển kế thừa phong cách Neo Sport Café đình đám.', 'https://cdn.honda.com.vn/motorbike-versions/May2022/x8ZCNtM5g2QRGQl4udo8.png', 105500000, 2),
(5, 'Honda Civic 2023', '43', 'Ở ngoại hình, Honda Civic e:HEV có trục cơ sở tăng thêm 35 mm, bề ngang phía sau rộng hơn, hệ thống treo mới, thân vỏ được gia cường. Ngoài ra, phần thân xe cũng có một số thay đổi như hạ thấp nắp ca-pô xuống 25 mm, kéo giãn kính chắn gió trước để tăng lượng ánh sáng đi vào xe.', 'https://image.thanhnien.vn/w2048/Uploaded/2022/kpqkcwvo/2022_03_25/honda-civic-e-hev-3-3017.jpg', 6234987000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `birthday`, `phone`, `password`, `email`) VALUES
(1, 'Mai Chiếm An', '2003-07-06', '0916663237', '123456', 'an@gmail.com'),
(2, 'Võ Văn Tuấn', '2022-07-06', '0916663237', '123456', 'tuan@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
