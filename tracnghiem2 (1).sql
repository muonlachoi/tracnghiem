-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2021 at 09:21 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracnghiem2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user` varchar(16) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` text NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `password`, `email`, `name`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'quantrivien003@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cauhoi`
--

CREATE TABLE `cauhoi` (
  `maND` int(11) NOT NULL,
  `noidungcauhoi` text CHARACTER SET utf8 NOT NULL,
  `dapanA` text CHARACTER SET utf8 NOT NULL,
  `dapanB` text CHARACTER SET utf8 NOT NULL,
  `dapanC` text CHARACTER SET utf8 NOT NULL,
  `dapanD` text CHARACTER SET utf8 NOT NULL,
  `ketqua` varchar(200) CHARACTER SET utf8 NOT NULL,
  `maDe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cauhoi`
--

INSERT INTO `cauhoi` (`maND`, `noidungcauhoi`, `dapanA`, `dapanB`, `dapanC`, `dapanD`, `ketqua`, `maDe`) VALUES
(1, 'Trên nhấp dưới giật là đang làm gì', 'Chơi bóng bàn', 'Trộm cắp', 'Câu cá', 'Đang học', 'Câu cá', 1),
(2, 'Con gà có mấy cái chân', 'Một', 'Hai', 'Ba', 'Bốn', 'Hai', 1),
(6, 'Quốc gia nào sau đây có 10.000 bãi biển', 'úc', 'nga', 'anh', 'pháp', 'úc', 1),
(7, 'Nơi nào con trai có thể sinh con', 'Dưới nước', 'Rừng rậm', 'Trong nhà', 'Đáp án khác', 'Dưới nước', 1),
(8, 'Bệnh gì bác sĩ bó tay', 'Đau đầu', 'Đau khớp', 'Gãy tay', 'Đáp án khác', 'Gãy tay', 1),
(9, 'Con trai và đàn ong có điểm gì khác nhau', 'Số tuổi', 'Chiều cao', 'Địa vị', 'Nơi ở', 'Nơi ở', 1),
(10, 'Con đường dài nhất là đường nào', 'Đường đi', 'Đường đời', 'Đường đèo', 'Đường đi nước ngoài', 'Đường đi', 1),
(11, 'Con gì đầu dê mình ốc', 'Con ốc', 'Con mương', 'Con đường', 'Con dốc', 'Con dốc', 1),
(12, 'Bỏ ngoài nướng  trong, ăn ngoài bỏ trong là gì', 'Khoai', 'Cà rốt', 'Bắp ngô', 'Trứng', 'Bắp ngô', 1),
(13, 'Cái gì luôn đi đến mà không bao giờ đến nơi', 'Cơn gió', 'Tình yêu', 'Ngày mai', 'Không biết cái gì', 'Ngày mai', 1),
(17, 'PHP tượng trưng cho cái gì?', 'Preprocessed Hypertext Page', 'Hypertext Transfer Protocol', 'PHP: Hypertext Preprocessor', 'Hypertext Markup Language', 'PHP: Hypertext Preprocessor', 6),
(18, 'Mặc định của một biến không có giá trị được thể hiện với từ khóa?', 'none', 'null', 'undef', 'Không có khái niệm như vậy trong PHP', 'null', 6),
(19, ' Ký hiệu nào được dùng khi sử dụng biến trong PHP?', '$$', '$', '@', '#', '$', 6),
(20, 'Đâu không phải là phép toán được dùng so sánh trong PHP?', '===', '>=', '!=', '<=>', '<=>', 6),
(21, 'Đáp án nào sau đây không được xác định trước bởi PHP (Magic constants)?', ' __LINE__', '__FILE__', '__DATE__', '__METHOD__', '__DATE__', 6),
(22, 'Hàm nào sau đây dùng để khai báo hằng số?', 'const', 'constants', 'define', 'def', 'define', 6),
(23, 'Cho: a.=\"a\"; a .= \"b\";  a.=\"c\"; Giá trị a là:', '\"c\"', '\"a\"', '\"abc\"', 'Lỗi', '\"abc\"', 6),
(24, ' a=4;for(b = 0; b<=a; b++)$c++; Giá trị của c ?', '0', '4', '5', 'Lỗi', '5', 6),
(25, ' PHP dựa vào Syntax của ngôn ngữ nào?', 'C', 'Java', 'HTML', 'Ruby', 'C', 6),
(26, 'ký hiệu nào dùng để kết thúc câu lệnh trong PHP?', 'Dấu hai chấm (:)', 'Dấu chấm phẩy (;)', 'Dấu hỏi (?)', 'Dấu chấm (.)', 'Dấu chấm phẩy (;)', 6);

-- --------------------------------------------------------

--
-- Table structure for table `de`
--

CREATE TABLE `de` (
  `maDe` int(11) NOT NULL,
  `maMon` varchar(50) NOT NULL,
  `soluongcauhoi` int(11) NOT NULL,
  `thoigian` int(11) NOT NULL,
  `kichhoat` tinyint(1) NOT NULL,
  `maGV` int(11) NOT NULL,
  `maLop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `de`
--

INSERT INTO `de` (`maDe`, `maMon`, `soluongcauhoi`, `thoigian`, `kichhoat`, `maGV`, `maLop`) VALUES
(1, 'HQTCSDL', 10, 20, 2, 123456789, 3),
(6, 'PHP', 10, 20, 1, 987654321, 4);

-- --------------------------------------------------------

--
-- Table structure for table `giaovien`
--

CREATE TABLE `giaovien` (
  `maGV` int(11) NOT NULL,
  `tenGV` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giaovien`
--

INSERT INTO `giaovien` (`maGV`, `tenGV`, `user`, `pass`, `role`) VALUES
(123456789, 'Sư Phụ Dưa Hấu', 'duahauchuyvuong', '52954906f4d21ecc1503ff6bbfe141f1', 2),
(501200102, 'Giáo Sư Dừa', 'duasongkiem', '52954906f4d21ecc1503ff6bbfe141f1', 1),
(501200129, 'Duy Bác Học', 'duybachoc', '52954906f4d21ecc1503ff6bbfe141f1', 1),
(501200333, 'An Triết Lí', 'antrietli', '52954906f4d21ecc1503ff6bbfe141f1', 1),
(987654321, 'Sư Phụ Chuối', 'chuoiphapsu', '52954906f4d21ecc1503ff6bbfe141f1', 1),
(987654322, 'Sư Phụ Mận', 'manninja', '52954906f4d21ecc1503ff6bbfe141f1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hocky`
--

CREATE TABLE `hocky` (
  `id_hocky` int(5) NOT NULL,
  `hocky` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hocky`
--

INSERT INTO `hocky` (`id_hocky`, `hocky`) VALUES
(1, 'học kỳ 1'),
(2, 'học kỳ 2');

-- --------------------------------------------------------

--
-- Table structure for table `hocsinh`
--

CREATE TABLE `hocsinh` (
  `maHS` varchar(15) NOT NULL,
  `tenHS` varchar(70) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` text NOT NULL,
  `maLop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hocsinh`
--

INSERT INTO `hocsinh` (`maHS`, `tenHS`, `diachi`, `email`, `user`, `pass`, `maLop`) VALUES
('123456777', 'Thơm Lùns', 'Học viện trái cây', 'ambacongs3@gmail.com', 'thomgiacdau', '52954906f4d21ecc1503ff6bbfe141f1', 2),
('123456788', 'Quýt Ú', 'Học viện trái Dưa Leo', 'quytkiemsi@gmail.com', 'quytkiemsi', '52954906f4d21ecc1503ff6bbfe141f1', 4),
('123456789', 'Thơm Lùn', 'Học viện trái cây', 'levoduyan02@gmail.com', 'thomgiacdau', '52954906f4d21ecc1503ff6bbfe141f1', 2),
('501200102', 'Táo Ngố', 'Học viện trái Cây', 'taoxanh@gmail.com', 'taothienxa', '69400560fbce276bded0f569c4796bab', 3),
('501200120', 'Ngô Văn Dũng', 'Việt Nam', 'ngovandung@gmail.com', 'vandung', '52954906f4d21ecc1503ff6bbfe141f1', 4),
('501200121', 'Kim Trọng', 'Việt Nam', 'kimtrong@gmail.com', 'thanhtra', '52954906f4d21ecc1503ff6bbfe141f1', 4),
('501200129', 'Khánh Duy', 'Việt Nam', 'khanhduy@gmail.com', 'khanhduy', '52954906f4d21ecc1503ff6bbfe141f1', 2),
('501200192', 'Nguyễn Khánh Duy', 'Việt Nam', 'nguyenkhanhduy@gmail.com', 'khanhduy', '52954906f4d21ecc1503ff6bbfe141f1', 4),
('501200249', 'Lê Võ Duy An', 'Việt Nam', 'levoduyan05@gmail.com', 'duyan', 'e84de5c05c4bcc607cac237e3233ba57', 4),
('501200294', 'Duy An', 'Việt Nam', 'levoduyan03@gmail.com', 'duyan', 'e84de5c05c4bcc607cac237e3233ba57', 2),
('501200321', 'Hữu Phú', 'Việt Nam', 'huuphu@gmail.com', 'duyphuong', '52954906f4d21ecc1503ff6bbfe141f1', 4),
('501200370', 'Diễm Kiều', 'Việt Nam', 'diemkieu@gmail.com', 'diemkieu', '52954906f4d21ecc1503ff6bbfe141f1', 2),
('501200446', 'Thanh Trà', 'Việt Nam', 'thanhtra@gmail.com', 'thanhtra', '52954906f4d21ecc1503ff6bbfe141f1', 2),
('501200453', 'Kiều Kiều', 'Việt Nam', 'kieukieu@gmail.com', 'phuonglinh', '52954906f4d21ecc1503ff6bbfe141f1', 4),
('501200664', 'Thanh Nhã', 'Việt Nam', 'thanhnha@gmail.com', 'thanhnga', '52954906f4d21ecc1503ff6bbfe141f1', 4),
('501200670', 'Thanh Duy', 'Việt Nam', 'thanhduy@gmail.com', 'diemkieu', '52954906f4d21ecc1503ff6bbfe141f1', 4),
('501200789', 'Thành Công', 'Việt Nam', 'thanhcong@gmail.com', 'kimngan', '52954906f4d21ecc1503ff6bbfe141f1', 4),
('501200813', 'Phương Linh', 'Việt Nam', 'phuonglinh@gmail.com', 'phuonglinh', '52954906f4d21ecc1503ff6bbfe141f1', 2),
('501200851', 'Thái Bảo', 'Việt Nam', 'thaibao@gmail.com', 'thaibao', '52954906f4d21ecc1503ff6bbfe141f1', 2),
('501200889', 'Kim Ngân', 'Việt Nam', 'kimngan@gmail.com', 'kimngan', '52954906f4d21ecc1503ff6bbfe141f1', 2),
('501200965', 'Thanh Nga', 'Việt Nam', 'thanhnga@gmail.com', 'thanhnga', '52954906f4d21ecc1503ff6bbfe141f1', 2),
('501200989', 'Thiên Di', 'Việt Nam', 'thiendi@gmail.com', 'thaibao', '52954906f4d21ecc1503ff6bbfe141f1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ketqua`
--

CREATE TABLE `ketqua` (
  `maHS` varchar(15) NOT NULL,
  `maMon` varchar(50) NOT NULL,
  `maDe` int(11) NOT NULL,
  `maGV` int(11) NOT NULL,
  `socaudung` int(11) NOT NULL,
  `diem` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ketqua`
--

INSERT INTO `ketqua` (`maHS`, `maMon`, `maDe`, `maGV`, `socaudung`, `diem`) VALUES
('123456788', 'PHP', 6, 987654321, 4, 4),
('501200102', 'HQTCSDL', 1, 123456789, 7, 7),
('501200192', 'PHP', 6, 987654321, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `maLop` int(11) NOT NULL,
  `tenLop` varchar(12) NOT NULL,
  `siso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`maLop`, `tenLop`, `siso`) VALUES
(2, 'CD20CT2', 30),
(3, 'CD20CT3', 30),
(4, 'CD20CT4', 30),
(5, 'CD20CT5', 30),
(6, 'CD20CT6', 30),
(7, 'CD20CT7', 30);

-- --------------------------------------------------------

--
-- Table structure for table `mon`
--

CREATE TABLE `mon` (
  `maMon` varchar(50) NOT NULL,
  `tenMon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mon`
--

INSERT INTO `mon` (`maMon`, `tenMon`) VALUES
('HQTCSDL', 'Hệ Quản Trị Cơ Sở Dữ Liệu'),
('LTHDT', 'Lập Trình Hướng Đối Tượng'),
('PHP', 'PHP'),
('WEB2', 'Lap trinh web 2');

-- --------------------------------------------------------

--
-- Table structure for table `namhoc`
--

CREATE TABLE `namhoc` (
  `id_namhoc` int(5) NOT NULL,
  `namhoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `namhoc`
--

INSERT INTO `namhoc` (`id_namhoc`, `namhoc`) VALUES
(1, '2021-2022'),
(2, '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `phancong`
--

CREATE TABLE `phancong` (
  `maGV` int(11) NOT NULL,
  `maMon` varchar(50) NOT NULL,
  `maLop` int(11) NOT NULL,
  `id_hocky` int(5) NOT NULL,
  `id_namhoc` int(5) NOT NULL,
  `id_pc` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phancong`
--

INSERT INTO `phancong` (`maGV`, `maMon`, `maLop`, `id_hocky`, `id_namhoc`, `id_pc`) VALUES
(987654321, 'LTHDT', 2, 1, 1, 2),
(987654321, 'LTHDT', 3, 1, 1, 3),
(987654321, 'PHP', 4, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `hour` int(50) NOT NULL,
  `minutes` int(50) NOT NULL,
  `seconds` int(50) NOT NULL,
  `maDe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`id`, `date`, `hour`, `minutes`, `seconds`, `maDe`) VALUES
(19, '2021-11-14', 21, 10, 0, 1),
(20, '2021-11-17', 5, 6, 0, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`maND`),
  ADD KEY `maDe` (`maDe`);

--
-- Indexes for table `de`
--
ALTER TABLE `de`
  ADD PRIMARY KEY (`maDe`),
  ADD KEY `maMon` (`maMon`),
  ADD KEY `maGV` (`maGV`),
  ADD KEY `maLop` (`maLop`);

--
-- Indexes for table `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`maGV`);

--
-- Indexes for table `hocky`
--
ALTER TABLE `hocky`
  ADD PRIMARY KEY (`id_hocky`);

--
-- Indexes for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`maHS`),
  ADD KEY `maLop` (`maLop`);

--
-- Indexes for table `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`maHS`,`maMon`,`maDe`,`maGV`),
  ADD KEY `maMon` (`maMon`),
  ADD KEY `maDe` (`maDe`),
  ADD KEY `maGV` (`maGV`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`maLop`);

--
-- Indexes for table `mon`
--
ALTER TABLE `mon`
  ADD PRIMARY KEY (`maMon`);

--
-- Indexes for table `namhoc`
--
ALTER TABLE `namhoc`
  ADD PRIMARY KEY (`id_namhoc`);

--
-- Indexes for table `phancong`
--
ALTER TABLE `phancong`
  ADD PRIMARY KEY (`id_pc`),
  ADD KEY `phancong_fk1` (`maGV`),
  ADD KEY `phancong_fk2` (`maLop`),
  ADD KEY `phancong_fk3` (`maMon`),
  ADD KEY `phancong_fk4` (`id_hocky`),
  ADD KEY `phancong_fk5` (`id_namhoc`);

--
-- Indexes for table `timer`
--
ALTER TABLE `timer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timer_ibfk_1` (`maDe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cauhoi`
--
ALTER TABLE `cauhoi`
  MODIFY `maND` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `phancong`
--
ALTER TABLE `phancong`
  MODIFY `id_pc` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `timer`
--
ALTER TABLE `timer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD CONSTRAINT `cauhoi_ibfk_1` FOREIGN KEY (`maDe`) REFERENCES `de` (`maDe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `de`
--
ALTER TABLE `de`
  ADD CONSTRAINT `de_ibfk_1` FOREIGN KEY (`maMon`) REFERENCES `mon` (`maMon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `de_ibfk_2` FOREIGN KEY (`maGV`) REFERENCES `giaovien` (`maGV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `de_ibfk_3` FOREIGN KEY (`maLop`) REFERENCES `lop` (`maLop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `hocsinh_ibfk_1` FOREIGN KEY (`maLop`) REFERENCES `lop` (`maLop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ketqua`
--
ALTER TABLE `ketqua`
  ADD CONSTRAINT `ketqua_ibfk_1` FOREIGN KEY (`maHS`) REFERENCES `hocsinh` (`maHS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ketqua_ibfk_2` FOREIGN KEY (`maMon`) REFERENCES `mon` (`maMon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ketqua_ibfk_3` FOREIGN KEY (`maDe`) REFERENCES `de` (`maDe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ketqua_ibfk_4` FOREIGN KEY (`maGV`) REFERENCES `giaovien` (`maGV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phancong`
--
ALTER TABLE `phancong`
  ADD CONSTRAINT `phancong_fk1` FOREIGN KEY (`maGV`) REFERENCES `giaovien` (`maGV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phancong_fk2` FOREIGN KEY (`maLop`) REFERENCES `lop` (`maLop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phancong_fk3` FOREIGN KEY (`maMon`) REFERENCES `mon` (`maMon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phancong_fk4` FOREIGN KEY (`id_hocky`) REFERENCES `hocky` (`id_hocky`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phancong_fk5` FOREIGN KEY (`id_namhoc`) REFERENCES `namhoc` (`id_namhoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timer`
--
ALTER TABLE `timer`
  ADD CONSTRAINT `timer_ibfk_1` FOREIGN KEY (`maDe`) REFERENCES `de` (`maDe`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
