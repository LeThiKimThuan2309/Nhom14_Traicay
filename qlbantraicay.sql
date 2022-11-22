-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2022 lúc 09:12 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbantraicay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`) VALUES
(1, 'Giỏ '),
(2, 'Hộp'),
(3, 'Khay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `tenmember` varchar(50) NOT NULL,
  `gioitinh` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `traicay`
--

CREATE TABLE `traicay` (
  `matc` int(11) NOT NULL,
  `tentc` varchar(50) NOT NULL,
  `dongia` int(11) NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `maloai` int(11) NOT NULL,
  `maxs` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xuatsu`
--

CREATE TABLE `xuatsu` (
  `maxs` varchar(11) NOT NULL,
  `tenxs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `xuatsu`
--

INSERT INTO `xuatsu` (`maxs`, `tenxs`) VALUES
('XS01', 'Hàng trái cây nhập khẩu'),
('XS02', 'Hàng trái cây Việt Nam'),
('XS03', 'Hàng trái cây khô'),
('XS04', 'Hàng trái cây cắt sẵn');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `traicay`
--
ALTER TABLE `traicay`
  ADD PRIMARY KEY (`matc`),
  ADD KEY `maloai` (`maloai`,`maxs`),
  ADD KEY `maxs` (`maxs`);

--
-- Chỉ mục cho bảng `xuatsu`
--
ALTER TABLE `xuatsu`
  ADD PRIMARY KEY (`maxs`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `traicay`
--
ALTER TABLE `traicay`
  ADD CONSTRAINT `traicay_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`),
  ADD CONSTRAINT `traicay_ibfk_2` FOREIGN KEY (`maxs`) REFERENCES `xuatsu` (`maxs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
