-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 02:53 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--
CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loai` tinyint(4) NOT NULL DEFAULT 3,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `nguoidung` (`id`, `email`, `sodienthoai`, `matkhau`, `hoten`, `loai`, `trangthai`, `hinhanh`) VALUES
(1, '1@gmail.com', '0976636511', 'c4ca4238a0b923820dcc509a6f75849b', 'Quản trị PNT', 1, 1, 'images/icon/941029690.png'),
(2, '2@gmail.com', '0123456789', 'c81e728d9d4c2f636f067f89cc14862c', 'Phan Ngọc Tuấn', 2, 1,'images/icon/user.jpg'),
(3, '3@gmail.com', '0987654321', 'c81e728d9d4c2f636f067f89cc14862c', 'Nguyễn Văn Tèo', 3, 1,'images/icon/hinhdaidien.jpg'),
(4, '4@gmail.com', '0111111111', 'c81e728d9d4c2f636f067f89cc14862c', 'Tèo đẹp trai', 3, 1,'images/icon/hinhdaidien2.jpg'),
(5, '5@gmail.com', '0222222222', 'c81e728d9d4c2f636f067f89cc14862c', 'Bé thích trà sữa', 3, 1,'images/icon/hinhdaidien3.jpg');

-- -------------------------------------------------------------------------------------------------------------------------

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES
(1, 'Chuột'),
(2, 'Bàn phím');

-- -------------------------------------------------------------------------------------------------------------------------


CREATE TABLE `hang` (
  `id` int(11) NOT NULL,
  `tenhang` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `hang` (`id`, `tenhang`) VALUES
(1, 'CORSAIR'),
(2, 'RAZER'),
(3, 'LOGITECH');




-- ------------------------------------------
CREATE TABLE `danhgia` (
  `id` int(11) NOT NULL,
  `sosao` int(1) NOT NULL,
  `noidung` varchar(255) COLLATE utf8_unicode_ci,
  `mathang_id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `danhgia` (`id`, `sosao`,`noidung`,`mathang_id`,`nguoidung_id`) VALUES
(1, 5, 'Sản phẩm phù hợp với túi tiền!', 1, 3),
(2, 4, 'Sản phẩm tốt nhưng giá hơi khó tiếp cận', 1, 2),
(3, 5, 'Sản phẩm bền có nhiều chế độ sử dụng', 1, 2),
(10, 3, 'Sản phẩm phù hợp với sinh viên thiết kế đẹp', 2, 3),
(11, 4, 'Sản phẩm có nhiều chức năng và chế độ sử dụng. Nhưng giá hơi cao', 2, 3),
(12, 4, 'Sản phẩm tốt', 5, 3),
(13, 5, 'Fan Razer', 6, 3),
(14, 5, 'Sản phẩm độc đáo', 3, 3),
(15, 5, 'Sau khi dùng sản phẩm này tôi thấy tôi đẹp trai hơn ', 1, 4),
(16, 3, 'Đẹp mà không có tiền mua', 3, 4),
(17, 4, 'Nhịn biết nhiêu ly mới được con chuột này !!', 1, 5),
(18, 5, 'Wao pikachu', 3, 5);


-- -------------------------------------------------------------------------------------------------------------------------

CREATE TABLE `mathang` (
  `id` int(11) NOT NULL,
  `tenmathang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaban` float NOT NULL DEFAULT 0,
  `soluongton` int(11) NOT NULL DEFAULT 0,
  `nsx` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tinhtrang` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `baohanh` int(11) NOT NULL DEFAULT 0,
  `hinhanh1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhanh2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhanh3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `hang_id` int(11) NOT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `luotmua` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `mathang` (`id`, `tenmathang`, `mota`, `giaban`, `soluongton`,`baohanh`,`nsx`,`tinhtrang`, `hinhanh1`,`hinhanh2`,`hinhanh3`, `danhmuc_id`, `hang_id`,`luotxem`, `luotmua`) VALUES

(1, 'Chuột Corsair NightSword RGB', 'Chuột Gaming Corsair Nightsword RGB Tunable FBS/MOBA có một thiết kế vô cùng hầm hố và có nhiều chi tiết cắt sẻ tinh tế và góc cạnh. Phía trước chuột Gaming Corsair Nightsword RGB Tunable FBS/MOBA có hai cụm đèn RGB hai bên với dạng thanh như những chiếc siêu xe mini. Bên trên chuột là những đường cắt mạnh mẽ và dạng hoa văn chống mồ tay kèm theo LOGO Corsair RGB. Phía bên cạnh trái là phần kê ngón cái với các vân như trên lưng chuột. Bên dưới hai cạnh có thêm 2 cụm đèn led nhỏ tương tự như phía trước tại sự hài hòa về ánh sáng trong mọi góc nhìn. Gaming Corsair Nightsword RGB Tunable FBS/MOBA được trang bị tổng công 11 phím chức năng bao gồm các phím chính như: Chuột trái, chuột phải, con lăn, phím con lăn, next, previous.Ngoài những phím trên thì Chuột Gaming Corsair Nightsword RGB Tunable FBS/MOBA còn có 3 phím chức năng riêng bên cạnh phải và thêm 2 phím chức năng cạnh phím chuột trái. Các phím này các bạn có thể tùy chỉnh chức năng bằng phần mềm riêng của hãng hoặc được gán trực tiếp khi chơi các game có hỗ trợ.', 1990000, 10,24,'Corsair','Mới', 'images/c/cs_c1_1.png','images/c/cs_c1_2.png','images/c/cs_c1_3.png', 1, 1, 7,0),
(2, 'Chuột Corsair M55 RGB Pro', NULL, 790000, 10, 24,'Corsair','Mới','images/c/cs_c2_1.png','images/c/cs_c2_2.png','images/c/cs_c2_3.png', 1, 1, 4,0),
(3, 'Combo Razer DeathAdder Essential + Goliathus Speed Pikachu Limited Edition', NULL, 1590000, 10, 24,'Razer','Mới','images/c/rz_c1_1.jpg','images/c/rz_c1_2.jpg','images/c/rz_c1_3.jpg', 1, 2, 11,0),
(4, 'Chuột Razer Deathadder Essential', NULL, 690000, 10, 24,'Razer','Mới','images/c/rz_c2_1.jpg','images/c/rz_c2_2.jpg','images/c/rz_c2_2.jpg', 1, 2, 13,0),
(5, 'Razer Blackwidow V3 Pro', NULL, 4999000, 10,24,'Razer','Mới', 'images/bp/rz_bp2_1.jpg','images/bp/rz_bp2_2.jpg','images/bp/rz_bp2_3.jpg', 2, 2, 24,0),
(6, 'Razer Blackwidow Green Switch', NULL, 2690000, 10, 24,'Razer','Mới','images/bp/rz_bp1_1.jpg','images/bp/rz_bp1_2.jpg','images/bp/rz_bp1_3.jpg', 2, 2, 15,0),
(7, 'Corsair K100 RGB', NULL, 5290000, 10, 24,'Corsair','Mới','images/bp/cs_bp3_1.png','images/bp/cs_bp3_2.png','images/bp/cs_bp3_3.png', 2, 1, 31,0),
(8, 'Bàn phím Corsair K63 Wireless', NULL, 2590000, 10, 24,'Corsair','Mới','images/bp/cs_bp1_1.png','images/bp/cs_bp1_2.png','images/bp/cs_bp1_3.png', 2, 1, 21,0),
(9, 'Corsair K68 RGB', NULL, 2750000, 10, 24,'Corsair','Mới','images/bp/cs_bp2_1.png','images/bp/cs_bp2_1.png','images/bp/cs_bp2_1.png', 2, 1, 9,0),
(10, 'Chuột Logitech G Pro X Superlight Wireless Black', NULL, 2990000, 10, 24,'Logitech','Mới','images/c/lg_c1_1.jpg','images/c/lg_c1_2.jpg','images/c/lg_c1_3.jpg', 1, 3, 56,0),
(11, 'Chuột Logitech G102 Lightsync RGB Black', NULL, 400000, 10, 24,'Logitech','Mới','images/c/lg_c2_1.jpg','images/c/lg_c2_2.jpg','images/c/lg_c2_3.jpg', 1, 3, 11,0),
(12, 'Chuột Logitech G903 Hero Lightspeed Wireless', NULL, 2990000, 10, 24,'Logitech','Mới','images/c/lg_c3_1.jpg','images/c/lg_c3_2.jpg','images/c/lg_c3_3.jpg', 1, 3, 62,0),
(13, 'Bàn phím Logitech G813 RGB', NULL, 3090000, 10, 24,'Logitech','Mới','images/bp/lg_bp1_1.jpg','images/bp/lg_bp1_2.jpg','images/bp/lg_bp1_3.jpg', 2, 3, 88,0),
(14, 'Bàn phím Logitech G Pro X', NULL, 2590000, 10, 24,'Logitech','Mới','images/bp/lg_bp2_1.jpg','images/bp/lg_bp2_2.jpg','images/bp/lg_bp2_3.jpg', 2, 3, 25,0);

-- -------------------------------------------------------------------------------------------------------------------------

CREATE TABLE `diachi` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `macdinh` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;






CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `diachi_id` int(11) DEFAULT NULL,
  `ngay` datetime NOT NULL DEFAULT current_timestamp(),
  `tongtien` float NOT NULL DEFAULT 0,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;








CREATE TABLE `donhangct` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `mathang_id` int(11) NOT NULL,
  `dongia` float NOT NULL DEFAULT 0,
  `soluong` int(11) NOT NULL DEFAULT 1,
  `thanhtien` float NOT NULL DEFAULT 0,
  `trangthai` int NOT NULL DEFAULT 0,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





ALTER TABLE `diachi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`);


ALTER TABLE `diachi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;



ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`),
  ADD KEY `diachi_id` (`diachi_id`);

ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;



ALTER TABLE `donhangct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_id` (`donhang_id`),
  ADD KEY `mathang_id` (`mathang_id`);

ALTER TABLE `donhangct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;



-- Key-------------------------------------------------------------

ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `hang`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mathang_id` (`mathang_id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`);

ALTER TABLE `mathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`),
  ADD KEY `hang_id` (`hang_id`);

ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `danhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `mathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`mathang_id`) REFERENCES `mathang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`) ON UPDATE CASCADE;


ALTER TABLE `mathang`
  ADD CONSTRAINT `mathang_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mathang_ibfk_2` FOREIGN KEY (`hang_id`) REFERENCES `hang` (`id`) ON UPDATE CASCADE;


ALTER TABLE `diachi`
  ADD CONSTRAINT `diachi_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`) ON UPDATE CASCADE;

ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`) ON UPDATE CASCADE;

ALTER TABLE `donhangct`
  ADD CONSTRAINT `donhangct_ibfk_1` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donhangct_ibfk_2` FOREIGN KEY (`mathang_id`) REFERENCES `mathang` (`id`) ON UPDATE CASCADE;
COMMIT;


