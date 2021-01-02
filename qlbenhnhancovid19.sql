-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 02, 2021 lúc 04:55 PM
-- Phiên bản máy phục vụ: 5.6.43
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbenhnhancovid19`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benhnhan`
--

CREATE TABLE `benhnhan` (
  `id` int(11) NOT NULL,
  `tenBN` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioiTinh` int(11) DEFAULT NULL,
  `tuoi` int(11) DEFAULT NULL,
  `diaDiem` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinhTrang` int(11) DEFAULT NULL,
  `quocTich` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `thongTinDichTe` text COLLATE utf8mb4_unicode_ci,
  `ngaySinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `benhnhan`
--

INSERT INTO `benhnhan` (`id`, `tenBN`, `gioiTinh`, `tuoi`, `diaDiem`, `tinhTrang`, `quocTich`, `avatar`, `thongTinDichTe`, `ngaySinh`) VALUES
(1, 'Hồ Duy Ngọc', 1, 21, 'Hà Nội', 3, 'my,vietnam,hanquoc,', 'img/02012021105654avt.jpg', '                                                                                CA BỆNH 1465 (BN1465) ghi nhận tại Hà Nội: nữ, 61 tuổi, quốc tịch Việt Nam, có địa chỉ ở TP. Vũng Tàu, tỉnh Bà Rịa - Vũng Tàu.                                                                                ', '2021-01-04'),
(8, 'Ngô Bảo Châu', 1, 13, 'Quảng Nam', 2, 'hanquoc,', 'img/02012021105844dn.png', '                                                            kaka                                                            ', '0000-00-00'),
(9, 'Võ Văn Thắng', 1, 21, 'Đà Nẵng', 1, 'vietnam,', 'img/02012021155310NHAN0692.JPG', 'Nghi ngờ', '2000-01-06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
