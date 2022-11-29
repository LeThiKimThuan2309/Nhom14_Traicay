-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2022 lúc 04:22 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_ban_hoa_qua`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hoa Qủa Miền Bắc', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(2, 'Hoa Qủa Miền Trung', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(5, 'Hoa Qủa Miền Bắc', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(6, 'Hoa Qủa Miền Trung', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(7, 'Hoa Qủa Miền Bắc', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(8, 'Hoa Qủa Miền Trung', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(9, 'Hoa Qủa Miền Bắc', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(10, 'Hoa Qủa Miền Trung', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(11, 'Hoa Qủa Miền Bắc', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(12, 'Hoa Qủa Miền Trung', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(13, 'Hoa Qủa Miền Bắc', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(14, 'Hoa Qủa Miền Trung', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(15, 'Hoa Qủa Miền Bắc', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(16, 'Hoa Qủa Miền Trung', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(17, 'Hoa Qủa Miền Bắc', '2022-10-01 21:43:36', '2022-10-01 21:43:36'),
(18, 'Hoa Qủa Miền Trung', '2022-10-01 21:43:36', '2022-10-01 21:43:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `thumbnail`, `content`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'vãi thiều', 150000, 'https://caythuoc.org/wp-content/uploads/2019/06/qua-vai-tuoi.jpg', '<h3 style=\"margin: 0px 0px 12px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 19px; line-height: 1.3; font-family: Tahoma, Geneva, sans-serif; vertical-align: baseline; color: rgb(255, 103, 2);\"><span id=\"Dac_diem\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">??c ?i?m</span>Â </h3><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Tahoma, Geneva, sans-serif; vertical-align: baseline; color: rgb(74, 72, 72);\">Cï¿½y v?i (tï¿½n khoa h?c:Â <em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Litchi chinensis</em>, h? Sapindaceae) (<a href=\"https://vi.wikipedia.org/wiki/V%E1%BA%A3i_(th%E1%BB%B1c_v%E1%BA%ADt)\" class=\"external\" rel=\"nofollow\" target=\"_blank\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(73, 168, 35); transition: color 0.25s ease-in 0s;\">2</a>) hay cï¿½n g?i lï¿½ l? chi, phi t? ti?u (n? c??i c?a D??ng Quï¿½ Phi, ng??i r?t thï¿½ch ?n v?i). ?ï¿½y lï¿½ lo?i cï¿½y ?n qu?, thï¿½n g?, cï¿½ th? cao ??n 20 m. Lï¿½ v?i hï¿½nh lï¿½ng chim, m?c so le v?i cï¿½c lï¿½ chï¿½t dai vï¿½ c?ng. Hoa v?i nh?, m?c thï¿½nh chï¿½m mï¿½u tr?ng xanh ho?c tr?ng vï¿½ng. Qu? v?i hï¿½nh tr?ng, v? ngoï¿½i s?n sï¿½i, khi chï¿½n cï¿½ mï¿½u ?? h?ng v?i l?p th?t qu? khï¿½ dï¿½y, mï¿½u tr?ng ??c, r?t ng?t, th?m vï¿½ nhi?u n??c. H?t v?i mï¿½u nï¿½u, thuï¿½n dï¿½i.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Tahoma, Geneva, sans-serif; vertical-align: baseline; color: rgb(74, 72, 72);\">Qu? v?i lï¿½ trï¿½i cï¿½y ngon, quï¿½ giï¿½, khï¿½ng ch? ???c bï¿½y bï¿½n ? d?ng chï¿½n t??i mï¿½ cï¿½n ???c ph?i khï¿½, lï¿½m r??uï¿½ Trong ?ï¿½, v?i thi?u lï¿½ lo?i ???c ?a chu?ng b?i ?? dï¿½y c?m, nh? h?t, v? ng?t vï¿½ th?m, lï¿½m nï¿½n cï¿½c th??ng hi?u nh? v?i thi?u Thanh Hï¿½ (H?i D??ng), v?i thi?u L?c Ng?n (B?c Giang)ï¿½ Khï¿½ng ch? th?, qu? vï¿½ h?t v?i cï¿½n ???c dï¿½ng lï¿½m thu?c.</p><h2 style=\"margin: 0px 0px 12px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 24px; line-height: 1.2; font-family: Tahoma, Geneva, sans-serif; vertical-align: baseline; color: rgb(255, 103, 2);\"><span id=\"Cong_dung_cua_qua_vai\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">Cï¿½ng d?ng c?a qu? v?i</span></h2><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Tahoma, Geneva, sans-serif; vertical-align: baseline; color: rgb(74, 72, 72);\">Cï¿½i v?i (th?t qu?, l? chi nh?c) ch?a nhi?u n??c, ï¿½t ch?t x?, ??m vï¿½ ch?t bï¿½o. Ngoï¿½i ra, cï¿½i v?i cï¿½n ch?a cï¿½c vitamin nh? C, B1, B2, B3, B6, B9 vï¿½ khoï¿½ng ch?t nh? Can xi, Ma giï¿½, Phot pho, Ka li, Na tri, K?mï¿½ (<a href=\"https://en.m.wikipedia.org/wiki/Lychee\" class=\"external\" rel=\"nofollow\" target=\"_blank\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(73, 168, 35); transition: color 0.25s ease-in 0s;\">3</a>).</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Tahoma, Geneva, sans-serif; vertical-align: baseline; color: rgb(74, 72, 72);\">Theo y h?c c? truy?n cï¿½ng d?ng c?a qu? v?i nh? sau: cï¿½i v?i cï¿½ tï¿½c d?ng ï¿½ch khï¿½, b? huy?t, sinh tï¿½n, ch? khï¿½t. Do ?ï¿½, long v?i (cï¿½i v?i s?y khï¿½) th??ng ???c dï¿½ng ?? d??ng huy?t, ?i?u tr? suy nh??c c? th?, tiï¿½u ch?y, b?ng huy?t, n?c, khï¿½t n??c, cï¿½ h?ch ? c? (5).</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Tahoma, Geneva, sans-serif; vertical-align: baseline; color: rgb(74, 72, 72);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Li?u dï¿½ng</span>: 3 ï¿½ 6 g m?i ngï¿½y d??i d?ng thu?c s?c, cï¿½ th? dï¿½ng ??c v? ho?c k?t h?p cï¿½c v? thu?c khï¿½c nh? tr?n bï¿½, m?c h??ng.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Tahoma, Geneva, sans-serif; vertical-align: baseline; color: rgb(74, 72, 72);\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">H?i th??ng y tï¿½ng tï¿½m l?nhÂ </em>c?a Lï¿½ H?u Trï¿½c c?ng cï¿½ bï¿½i ca v? cï¿½ng d?ng c?a qu? v?i nh? sau:</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Tahoma, Geneva, sans-serif; vertical-align: baseline; color: rgb(74, 72, 72); text-align: center;\">ï¿½<em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">L? Chi t?c g?i lï¿½ qu? V?i</em></p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Tahoma, Geneva, sans-serif; vertical-align: baseline; color: rgb(74, 72, 72); text-align: center;\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">V? ng?t, khï¿½ hï¿½n, khï¿½ng ??c h?i</em></p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Tahoma, Geneva, sans-serif; vertical-align: baseline; color: rgb(74, 72, 72); text-align: center;\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">?i?u khï¿½, thï¿½ng th?n, kh?i n?ng ??u</em></p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Tahoma, Geneva, sans-serif; vertical-align: baseline; color: rgb(74, 72, 72); text-align: center;\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Ch?a lï¿½nh S?i, ??u, lï¿½m thï¿½ng khoï¿½i.</em>ï¿½ (4)</p>', 1, '2022-10-01 21:43:36', '2022-11-25 13:50:38'),
(7, 'mận bắc', 100000, 'https://traicaycaonghe.vn/wp-content/uploads/2021/07/man-gia-re.jpg', '                            <p>                                                                                    helloo sdbhfshad</p><p><br></p><h3>sadnfhsdfks</h3><p>                                                                                                               </p>                        ', 1, '2022-10-26 15:16:54', '2022-10-26 16:04:52');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
