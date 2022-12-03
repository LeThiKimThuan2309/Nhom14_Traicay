-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 03:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_ban_hoa_qua`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hoa Qủa Miền Bắc', '2022-10-01 21:43:36', '2022-11-30 16:40:20'),
(2, 'Hoa Qủa Miền Trung', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(3, 'Hoa Qủa Miền Nam', '2022-10-01 21:43:36', '2022-10-01 21:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gioitinh` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `username`, `email`, `password`, `gioitinh`) VALUES
(3, 'Lơ Thị Kim Thựn', 'thuan.ltk.61cntt@ntu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nguoimua`
--

CREATE TABLE `nguoimua` (
  `id` int(11) NOT NULL,
  `ten_kh` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gioitinh` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoimua`
--

INSERT INTO `nguoimua` (`id`, `ten_kh`, `email`, `password`, `gioitinh`) VALUES
(5, 'Lê Thị Kim Thuận', 'lethikimthuan9@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `thumbnail`, `content`, `id_category`, `created_at`, `updated_at`, `amount`) VALUES
(1, 'Vải Thiều', 150000, 'vaithieu.png', ' Vải thiều tuy nhỏ bé nhưng lại chứa rất nhiều chất dinh dưỡng, các vitamin và khoáng chất cần thiết cho sự phát triển của cơ thể.                                                                                                                                                                                                            ', 1, '2022-10-01 21:43:36', '2022-12-03 05:35:06', 1),
(2, 'mận bắc', 100000, 'manbac.jpg', '  Là loại trái cây miền bắc rất phổ biến và được ưa chuộng nhất ở Hà Nội và các địa phương phía bắc. Quả to, mã đẹp, ăn ngọt, giòn… là những đặc trưng của giống mận tam hoa trồng tại Bắc Hà. Mận tam hoa trồng đến năm thứ ba sẽ cho thu hoạch. Cây ra hoa vào nửa cuối tháng 2 và chín vào cuối tháng 5.                                                                                                                                                                                                       ', 1, '2022-10-26 15:16:54', '2022-12-03 05:41:08', 3),
(3, 'Táo mèo Tú Lệ Yên Bái', 150000, 'taomeo.jpg', 'Táo mèo Tú Lệ Yên Bái hay còn gọi là quả Sơn Tra là một loại quả thường được dùng như một vị thuốc đông y. Hoa quả miền bắc này có tác dụng tiêu hóa thức ăn tích trệ, tán ứ huyết, sát trùng, tăng cường miễn dịch, chống oxy hóa, hạ huyết áp, giảm cholesterol, kháng khuẩn tốt, bảo vệ gan, chống ung thư…                        ', 1, '2022-10-01 21:43:36', '2022-12-03 05:51:08', 0),
(11, 'Nhãn Lồng Hưng Yên', 50000, 'nhanlong.jpg', 'Cùi nhãn lồng  dày và khô, đặc biệt là có hai dẻ xếp rất khít nhau – đây là đặc điểm mà chỉ riêng nhãn lồng Hưng Yên mới có. Nhãn lồng Hưng Yên là loại nhãn ngon được nhiều người ưa thích. Tuy nhiên, trên thị trường cũng xuất hiện nhiều nhãn Trung Quốc khiến người dùng hoang mang, khó phân biệt. Dưới đây là cách giúp bạn nhận biết được nhãn Trung Quốc và nhãn Hưng Yên. \r\n\r\n                       ', 1, '2022-12-02 11:04:18', '2022-12-03 05:02:09', 0),
(12, 'Cam Cao Phong Hòa Bình', 150000, 'cam-cao-phong.jpg', 'Cam có nguồn gốc từ huyện Cao Phong của tỉnh Hòa Bình. Không hề nói quá lời khi nói đây là một vựa cam lớn nhất của cả Miền Bắc. Nơi đây nổi tiếng với nhiều giống cam nổi tiếng như cam Canh, cam Xã Đoài, cam ruột đỏ vv.                       ', 1, '2022-12-02 11:16:20', '2022-12-03 05:12:09', 4),
(13, 'Xoài cát Hoà Lộc Tiền Giang', 50000, 'xoai-cat-hoa-loc.jpg', 'Loại xoài đặc sản của mảnh đất phù sa màu mỡ Tiền Giang này chỉ cần ngửi thôi cũng đã thấy ngon lắm rồi. Khi được thưởng thức thì du khách nào cũng phải khen ngợi hết lời. Để phân biệt xoài cát Hoà Lộc chuẩn, bạn cần nhìn phía dưới bụng xoài xem có khe rãnh nhỏ thẳng từ cuống đến chóp quả hay không. Nếu có, thì đó là xoài cát Hoà Lộc chính hiệu, rất đáng để bạn mua về thưởng thức ngay.                      ', 3, '2022-12-02 11:04:21', '2022-12-03 05:22:09', 0),
(14, 'Vú sữa Lò Rèn Tiền Giang', 120000, 'Vu-sua-Lo-Ren.jpg', 'Trong những loại trái cây đặc sản miền nam thì không thể không kể đến quả vú sữa. Quả vú sữa tròn trịa, mỏng vỏ nhỏ hột và dày ruột. Khi chín thoang thoảng hương thơm, xẻ ra có ruột màu trắng sữa, ngọt thanh và mát dịu. Quả vú sữa luôn khiến ta gợi nhớ đến câu chuyện cổ tích về tình mẫu tử thiêng liêng. Vị ngọt ngào và mát lịm của nó giống như dòng sữa mẹ.                      ', 3, '2022-12-02 11:05:22', '2022-12-03 05:33:09', 0),
(15, 'Sầu riêng Vĩnh Long', 200000, 'sau-rieng.png', ' Sầu riêng là loại trái cây đặc sản miền Tây Nam Bộ được mệnh danh là vua của các ông vua trái cây nhiệt đới. Sầu riêng Ri6 rất dễ trồng, dễ chăm sóc, dễ đậu trái, mà lại cho thu hoạch sớm hơn các loại khác. Khi chín, loại trái cây này cho cơm vàng, hạt lép, ít sượng – đạt ưu thế cả về chất lượng và năng suất hơn nhiều giống sầu riêng khác.                    ', 3, '2022-12-02 11:53:22', '2022-12-03 05:53:09', 0),
(16, 'Dừa sáp Trà Vinh', 500000, 'dua-sap.jpg', 'Dừa sáp được biết đến là loại trái cây đặc sản nổi tiếng bởi hương vị đặc trưng, lớp cơm dày và mềm xốp. Tuy nhiên, dừa sáp và dừa thường về hình thức bên ngoài gần như giống nhau nên nhiều khách hàng chưa.                       ', 3, '2022-12-02 11:00:24', '2022-12-03 05:04:10', 2),
(17, 'Xoài tượng Bình Định', 60000, 'xoai-tuong.jpg', '  Xoài tượng  khá lớn, mỗi trái chừng nửa ký, vỏ màu xanh tươi, khi bắt đầu chín trái ửng vàng. Đây là lúc vừa hái. Hái xong người ta đem xếp vào giỏ có lót rạ, cứ một lớp trái một lớp rơm. Muốn xoài mau chín người ta lót bằng lá sầu đông. Xoài bắt đầu bói quả từ 3 năm trở lên.                       ', 2, '2022-12-02 11:59:24', '2022-12-03 05:29:10', 0),
(18, 'Nho Ninh Thuận', 40000, 'nho-ninh-thuan.jpg', 'Nho là trái cây miền trung nổi tiếng với vị ngọt thanh khiết và giá cả hợp với xu hướng người tiêu dùng. Nho Ninh Thuận được nhiều người ưa chuộng như vậy là nhờ có các tính chất, chất lượng đặc thù, khác biệt so với các loại nho khác. Đặc trưng của nho Ninh thuận là vỏ dày, vị rôn rốt (hơi chua) và có hạt.                        ', 2, '2022-12-02 11:45:25', '2022-12-03 05:44:10', 0),
(19, 'Thanh long ruột đỏ Quảng Trị', 80000, 'thanh-long.jpg', 'Thanh long có chứa vitamin C, B1, B2 và B3, và khoáng chất thiết yếu bao gồm phốt pho, sắt và canxi. Một trái thanh long có chứa khoảng 60 calo.    ', 2, '2022-12-02 11:47:26', '2022-12-03 05:53:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `khachhang` varchar(50) NOT NULL,
  `code_cart` varchar(20) NOT NULL,
  `cart_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `khachhang`, `code_cart`, `cart_status`) VALUES
(39, 'Lê Thị Kim Thuận', '2523', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_details`
--

CREATE TABLE `tbl_cart_details` (
  `id_cart_details` int(11) NOT NULL,
  `code_cart` varchar(20) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_cart_details`, `code_cart`, `id_sanpham`, `soluong`) VALUES
(56, '2523', 17, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `nguoimua`
--
ALTER TABLE `nguoimua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`id_cart_details`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nguoimua`
--
ALTER TABLE `nguoimua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `id_cart_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD CONSTRAINT `tbl_cart_details_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
