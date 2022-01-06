-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 06, 2022 lúc 01:41 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ignite_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `FkCustomer_Id` int(11) NOT NULL,
  `AccountRole` tinyint(1) NOT NULL COMMENT '0 là User,\r\n1 là Admin',
  `AccountPassword` varchar(32) NOT NULL,
  `AccountDate` date NOT NULL,
  `AccountStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`FkCustomer_Id`, `AccountRole`, `AccountPassword`, `AccountDate`, `AccountStatus`) VALUES
(1, 1, '931675', '2021-12-08', 1),
(3, 1, '931675', '2021-12-08', 1),
(7, 1, '6c989c1ccafb55da4d48ff0255920b6f', '2021-12-08', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `PkCustomer_Id` int(11) NOT NULL,
  `CustomerPhone` varchar(11) NOT NULL,
  `CustomerName` varchar(80) NOT NULL,
  `CustomerDate` date DEFAULT NULL,
  `CustomerEmail` varchar(80) NOT NULL,
  `CustomerAvatar` varchar(32) DEFAULT NULL,
  `CustomerSex` tinyint(1) DEFAULT NULL COMMENT '0: là nữ\r\n1: là nam\r\n2: Khác'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`PkCustomer_Id`, `CustomerPhone`, `CustomerName`, `CustomerDate`, `CustomerEmail`, `CustomerAvatar`, `CustomerSex`) VALUES
(1, '0332345012', 'tran cao minh', '2021-12-08', 'minh@gmail.com', '', 0),
(3, '0937232135', 'Nguyen pham dang thanh', NULL, 'm@gmail.com', NULL, 0),
(7, '0937232133', 'min dep', NULL, 'trancaominh932016@gmail.com', 'a.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `PkOrder_Id` int(11) NOT NULL,
  `FkCustomer_Id` int(11) NOT NULL,
  `OrderDate` date DEFAULT NULL,
  `OrderPayment` varchar(32) DEFAULT NULL,
  `OrderShipping` varchar(32) DEFAULT NULL,
  `OrderNote` varchar(80) DEFAULT NULL,
  `FkOrderStatus_Id` tinyint(1) NOT NULL COMMENT '0 là đang xử lý\r\n1 là đang giao hàng\r\n2 là hoàn tất\r\n3 là bị hủy\r\n4 là đang tạo đơn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`PkOrder_Id`, `FkCustomer_Id`, `OrderDate`, `OrderPayment`, `OrderShipping`, `OrderNote`, `FkOrderStatus_Id`) VALUES
(1, 3, '2021-12-07', 'Truyen thong', 'GiaoHangTietKiem', '.asdfsadf', 1),
(2, 7, '2021-12-07', 'Truyen thong', 'GiaoHangTietKiem', '.', 3),
(5, 7, NULL, NULL, NULL, '', 1),
(6, 7, '2021-12-13', 'Truyền thống', 'Viettel Post', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `FkVariant_Id` int(11) NOT NULL,
  `FkOrder_Id` int(11) NOT NULL,
  `OrderQuantity` int(11) NOT NULL,
  `ProductPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`FkVariant_Id`, `FkOrder_Id`, `OrderQuantity`, `ProductPrice`) VALUES
(17, 1, 2, 25000),
(17, 2, 3, 10000),
(18, 1, 3, 20000),
(67, 5, 1, 800000),
(67, 6, 1, 800000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_info`
--

CREATE TABLE `order_info` (
  `FkOrder_Id` int(11) NOT NULL,
  `CustomerName` varchar(32) NOT NULL,
  `CustomerPhone` int(11) NOT NULL,
  `CustomerAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_info`
--

INSERT INTO `order_info` (`FkOrder_Id`, `CustomerName`, `CustomerPhone`, `CustomerAddress`) VALUES
(1, 'tran cao minh', 332345012, 'gffggf'),
(2, 'tran cao minh', 332345012, '.'),
(5, 'min dep', 937232133, 'sdaf'),
(6, 'min dep', 937232133, 'dsf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_status`
--

CREATE TABLE `order_status` (
  `PkOrderStatus_Id` tinyint(1) NOT NULL,
  `OrderStatusName` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_status`
--

INSERT INTO `order_status` (`PkOrderStatus_Id`, `OrderStatusName`) VALUES
(0, 'Đang xử lý'),
(1, 'Đang giao hàng'),
(2, 'Hoàn tất'),
(3, 'Bị hủy'),
(4, 'Đang tạo đơn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `PkProduct_Id` int(11) NOT NULL,
  `FkType_Id` int(11) NOT NULL,
  `FKBrand_Id` int(11) NOT NULL,
  `ProductName` varchar(80) NOT NULL,
  `ProductPrice` int(11) NOT NULL,
  `ProductView` int(11) NOT NULL DEFAULT 0,
  `ProductDiscount` int(11) NOT NULL,
  `ProductViewStatus` tinyint(1) NOT NULL COMMENT '1 là hiển thị,\r\n0 là không hiển thị'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`PkProduct_Id`, `FkType_Id`, `FKBrand_Id`, `ProductName`, `ProductPrice`, `ProductView`, `ProductDiscount`, `ProductViewStatus`) VALUES
(2, 13, 2, 'Giày Nike Phantom GT Academy', 3759000, 59, 14, 1),
(9, 14, 2, 'Giày Nike Pegasus Trail 3 GORE-TEX', 4700000, 0, 11, 1),
(10, 14, 2, 'Giày Nike ZoomX Vaporfly Next% 2', 6610000, 4, 13, 1),
(11, 14, 2, 'Giày Nike Air Zoom Pegasus 38 FlyEase', 3520000, 0, 13, 1),
(12, 12, 2, 'Dép Nike Victori One', 890000, 18, 12, 1),
(13, 15, 3, 'CA Pro Classic Men Sneakers', 1920000, 0, 19, 1),
(14, 12, 3, 'Dép PUMA x TMC SoftRide Slides', 1020000, 0, 11, 1),
(15, 12, 3, 'Dép Softride Men Slides', 960000, 0, 14, 1),
(16, 15, 3, 'Giày Speedcat OG+ Sparco Men Motorsport Shoes', 2400000, 1, 21, 1),
(17, 13, 1, 'Giày bóng đá sân cỏ nhân tạo X SPEEDFLOW.4', 1500000, 0, 12, 1),
(18, 13, 1, 'Giày bóng đá sân cỏ tự nhiên không dây X SPEEDFLOW.3', 2400000, 1, 14, 1),
(19, 12, 1, 'Dép ADILETTE LITE', 800000, 31, 15, 1),
(20, 12, 1, 'Dép ADILETTE', 900000, 58, 12, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_brand`
--

CREATE TABLE `product_brand` (
  `PkBrand_Id` int(11) NOT NULL,
  `BrandName` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_brand`
--

INSERT INTO `product_brand` (`PkBrand_Id`, `BrandName`) VALUES
(1, 'Adidas'),
(2, 'Nike'),
(3, 'Puma');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_color`
--

CREATE TABLE `product_color` (
  `PkColor_Id` varchar(8) NOT NULL,
  `ColorName` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_color`
--

INSERT INTO `product_color` (`PkColor_Id`, `ColorName`) VALUES
('000000', 'Đen'),
('1f23a8', 'Xanh dương'),
('2e5459', 'Xanh ngọc bích'),
('939843', 'Vàng Test'),
('9d9d9d', 'Xám bạc'),
('b2ea70', 'Xanh lá mạ'),
('ed19f0', 'Trắng'),
('f7e418', 'Vàng'),
('ff0000', 'Đỏ'),
('ffffff', 'Trắng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comment`
--

CREATE TABLE `product_comment` (
  `PkProductComment_Id` int(11) NOT NULL,
  `FkCustomer_Id` int(11) NOT NULL,
  `FkProduct_Id` int(11) NOT NULL,
  `CommentContent` varchar(800) NOT NULL,
  `CommentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_comment`
--

INSERT INTO `product_comment` (`PkProductComment_Id`, `FkCustomer_Id`, `FkProduct_Id`, `CommentContent`, `CommentDate`) VALUES
(2, 7, 2, 'Sản phẩm tốt', '2021-12-08'),
(10, 1, 2, 'nani', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `PkImage_Id` int(11) NOT NULL,
  `FkProduct_Id` int(11) NOT NULL,
  `FkColor_Id` varchar(8) NOT NULL,
  `ImageFileName` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`PkImage_Id`, `FkProduct_Id`, `FkColor_Id`, `ImageFileName`) VALUES
(47, 2, '2e5459', '2_12102021_090746_0.jpeg'),
(125, 2, '2e5459', '2_12102021_090746_1.png'),
(126, 2, '2e5459', '2_12102021_090746_2.png'),
(127, 2, '2e5459', '2_12102021_090746_3.png'),
(128, 2, '2e5459', '2_12102021_090746_4.png'),
(129, 2, '2e5459', '2_12102021_090746_5.png'),
(130, 2, '2e5459', '2_12102021_090746_6.png'),
(131, 2, 'ffffff', '2_12102021_091031_0.jpeg'),
(132, 2, 'ffffff', '2_12102021_091000_1.png'),
(133, 2, 'ffffff', '2_12102021_091000_2.png'),
(134, 2, 'ffffff', '2_12102021_091000_3.png'),
(135, 2, 'ffffff', '2_12102021_091000_4.png'),
(136, 2, 'ffffff', '2_12102021_091000_5.png'),
(137, 2, 'ffffff', '2_12102021_091046_1.png'),
(138, 2, '1f23a8', '2_12102021_091139_0.jpeg'),
(139, 2, '1f23a8', '2_12102021_091139_1.png'),
(140, 2, '1f23a8', '2_12102021_091139_2.png'),
(141, 2, '1f23a8', '2_12102021_091139_3.png'),
(142, 2, '1f23a8', '2_12102021_091139_4.png'),
(143, 2, '1f23a8', '2_12102021_091139_5.png'),
(144, 2, '1f23a8', '2_12102021_091139_6.png'),
(145, 9, '000000', '9_12102021_091702_0.png'),
(146, 9, '000000', '9_12102021_091702_1.png'),
(147, 9, '000000', '9_12102021_091702_2.png'),
(148, 9, '000000', '9_12102021_091702_3.png'),
(149, 9, '000000', '9_12102021_091702_4.png'),
(150, 9, '000000', '9_12102021_091702_5.png'),
(151, 10, '000000', '10_12102021_091849_0.png'),
(152, 10, '000000', '10_12102021_091849_1.png'),
(153, 10, '000000', '10_12102021_091849_2.png'),
(154, 10, '000000', '10_12102021_091849_3.png'),
(155, 10, '000000', '10_12102021_091849_4.png'),
(156, 10, '000000', '10_12102021_091849_5.png'),
(157, 10, 'ffffff', '10_12102021_091940_0.png'),
(158, 10, 'ffffff', '10_12102021_091940_1.png'),
(159, 10, 'ffffff', '10_12102021_091940_2.png'),
(160, 10, 'ffffff', '10_12102021_091940_3.png'),
(161, 10, 'ffffff', '10_12102021_091940_4.png'),
(162, 10, 'ffffff', '10_12102021_091940_5.png'),
(163, 10, 'b2ea70', '10_12102021_092207_0.png'),
(164, 10, 'b2ea70', '10_12102021_092207_1.png'),
(165, 10, 'b2ea70', '10_12102021_092207_2.png'),
(166, 10, 'b2ea70', '10_12102021_092207_3.png'),
(167, 10, 'b2ea70', '10_12102021_092207_4.png'),
(168, 10, 'b2ea70', '10_12102021_092207_5.png'),
(169, 10, 'b2ea70', '10_12102021_092207_6.png'),
(170, 11, 'b2ea70', '11_12102021_092433_0.png'),
(171, 11, 'b2ea70', '11_12102021_092433_1.png'),
(172, 11, 'b2ea70', '11_12102021_092433_2.png'),
(173, 11, 'b2ea70', '11_12102021_092433_3.png'),
(174, 11, 'b2ea70', '11_12102021_092433_4.png'),
(175, 11, 'b2ea70', '11_12102021_092433_5.png'),
(176, 12, '000000', '12_12102021_092813_0.png'),
(177, 12, '000000', '12_12102021_092813_1.png'),
(178, 12, '000000', '12_12102021_092813_2.png'),
(179, 12, '000000', '12_12102021_092813_3.png'),
(180, 12, '000000', '12_12102021_092813_4.png'),
(181, 13, '000000', '13_12102021_093923_0.png'),
(182, 13, '000000', '13_12102021_093923_1.png'),
(183, 13, '000000', '13_12102021_093923_2.png'),
(184, 13, '000000', '13_12102021_093923_3.png'),
(185, 13, '000000', '13_12102021_093923_4.png'),
(186, 13, '000000', '13_12102021_093923_5.png'),
(187, 13, 'ffffff', '13_12102021_094011_0.jpeg'),
(188, 13, 'ffffff', '13_12102021_094011_1.jpeg'),
(189, 13, 'ffffff', '13_12102021_094011_2.jpeg'),
(190, 13, 'ffffff', '13_12102021_094011_3.jpeg'),
(191, 13, 'ffffff', '13_12102021_094011_4.jpeg'),
(192, 13, 'ffffff', '13_12102021_094011_5.jpeg'),
(193, 14, '000000', '14_12102021_094142_0.png'),
(194, 14, '000000', '14_12102021_094142_1.png'),
(195, 14, '000000', '14_12102021_094142_2.png'),
(196, 14, '000000', '14_12102021_094142_3.png'),
(197, 14, '000000', '14_12102021_094142_4.png'),
(198, 14, '000000', '14_12102021_094142_5.png'),
(199, 15, '000000', '15_12102021_094724_0.png'),
(200, 15, '000000', '15_12102021_094724_1.jpeg'),
(201, 15, '000000', '15_12102021_094724_2.jpeg'),
(202, 15, '000000', '15_12102021_094724_3.jpeg'),
(203, 15, '000000', '15_12102021_094724_4.jpeg'),
(204, 15, '000000', '15_12102021_094724_5.png'),
(205, 16, '9d9d9d', '16_12102021_095919_0.png'),
(206, 16, '9d9d9d', '16_12102021_095919_1.png'),
(207, 16, '9d9d9d', '16_12102021_095919_2.png'),
(208, 16, '9d9d9d', '16_12102021_095919_3.png'),
(209, 16, '9d9d9d', '16_12102021_095919_4.png'),
(210, 17, '000000', '17_12102021_100248_0.jpeg'),
(211, 17, '000000', '17_12102021_100248_1.jpeg'),
(212, 17, '000000', '17_12102021_100248_2.jpeg'),
(213, 17, '000000', '17_12102021_100248_3.jpeg'),
(214, 17, '000000', '17_12102021_100248_4.jpeg'),
(215, 17, '000000', '17_12102021_100248_5.jpeg'),
(216, 17, '000000', '17_12102021_100248_6.jpeg'),
(217, 17, '000000', '17_12102021_100248_7.jpeg'),
(218, 18, '000000', '18_12102021_100454_0.jpeg'),
(219, 18, '000000', '18_12102021_100454_1.jpeg'),
(220, 18, '000000', '18_12102021_100454_2.jpeg'),
(221, 18, '000000', '18_12102021_100454_3.jpeg'),
(222, 18, '000000', '18_12102021_100454_4.jpeg'),
(223, 18, '000000', '18_12102021_100454_5.jpeg'),
(224, 18, '000000', '18_12102021_100454_6.jpeg'),
(225, 18, 'ff0000', '18_12102021_100534_0.jpeg'),
(226, 18, 'ff0000', '18_12102021_100534_1.jpeg'),
(227, 18, 'ff0000', '18_12102021_100534_2.jpeg'),
(228, 18, 'ff0000', '18_12102021_100534_3.jpeg'),
(229, 18, 'ff0000', '18_12102021_100534_4.jpeg'),
(230, 18, 'ff0000', '18_12102021_100534_5.jpeg'),
(231, 18, 'ff0000', '18_12102021_100534_6.jpeg'),
(232, 19, '000000', '19_12102021_100724_0.jpeg'),
(233, 19, '000000', '19_12102021_100724_1.jpeg'),
(234, 19, '000000', '19_12102021_100724_2.jpeg'),
(235, 19, '000000', '19_12102021_100724_3.jpeg'),
(236, 19, '000000', '19_12102021_100724_4.jpeg'),
(237, 19, '000000', '19_12102021_100724_5.jpeg'),
(238, 19, '000000', '19_12102021_100724_6.jpeg'),
(239, 19, 'ff0000', '19_12102021_100941_0.jpeg'),
(240, 19, 'ff0000', '19_12102021_100941_1.jpeg'),
(241, 19, 'ff0000', '19_12102021_100941_2.jpeg'),
(242, 19, 'ff0000', '19_12102021_100941_3.jpeg'),
(243, 19, 'ff0000', '19_12102021_100941_4.jpeg'),
(244, 19, 'ff0000', '19_12102021_100941_5.jpeg'),
(245, 19, 'ff0000', '19_12102021_100941_6.jpeg'),
(246, 20, 'ffffff', '20_12102021_101055_0.jpeg'),
(247, 20, 'ffffff', '20_12102021_101055_1.jpeg'),
(248, 20, 'ffffff', '20_12102021_101055_2.jpeg'),
(249, 20, 'ffffff', '20_12102021_101055_3.jpeg'),
(250, 20, 'ffffff', '20_12102021_101055_4.jpeg'),
(251, 20, 'ffffff', '20_12102021_101055_5.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_rating`
--

CREATE TABLE `product_rating` (
  `FkCustomer_Id` int(11) NOT NULL,
  `FkProduct_Id` int(11) NOT NULL,
  `ProductRating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_type`
--

CREATE TABLE `product_type` (
  `PkType_Id` int(11) NOT NULL,
  `TypeName` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_type`
--

INSERT INTO `product_type` (`PkType_Id`, `TypeName`) VALUES
(12, 'Dép tông'),
(13, 'Giày đá bóng'),
(14, 'Giày chạy'),
(15, 'Giày Sneaker cổ điển'),
(16, 'test'),
(18, 'a');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variant`
--

CREATE TABLE `product_variant` (
  `PkVariant_Id` int(11) NOT NULL,
  `FkProduct_Id` int(11) NOT NULL,
  `FkColor_Id` varchar(8) NOT NULL,
  `ProductSize` int(2) NOT NULL,
  `ProductQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_variant`
--

INSERT INTO `product_variant` (`PkVariant_Id`, `FkProduct_Id`, `FkColor_Id`, `ProductSize`, `ProductQuantity`) VALUES
(17, 2, '2e5459', 38, 29),
(18, 2, '2e5459', 39, 14),
(33, 2, '2e5459', 40, 12),
(34, 2, 'ffffff', 35, 12),
(35, 2, 'ffffff', 34, 10),
(36, 2, 'ffffff', 33, 8),
(37, 2, '1f23a8', 37, 22),
(38, 2, '1f23a8', 33, 8),
(39, 9, '000000', 38, 22),
(40, 9, '000000', 37, 11),
(41, 10, '000000', 36, 11),
(42, 10, '000000', 35, 22),
(43, 10, 'ffffff', 38, 22),
(44, 10, 'ffffff', 39, 15),
(45, 10, 'b2ea70', 34, 11),
(46, 10, 'b2ea70', 35, 3),
(47, 11, 'b2ea70', 39, 21),
(48, 11, 'b2ea70', 40, 9),
(49, 12, '000000', 27, 12),
(50, 12, '000000', 26, 13),
(51, 13, '000000', 35, 9),
(52, 13, '000000', 36, 8),
(53, 13, 'ffffff', 33, 5),
(54, 13, 'ffffff', 34, 9),
(55, 14, '000000', 28, 12),
(56, 14, '000000', 29, 13),
(57, 15, '000000', 27, 12),
(58, 15, '000000', 26, 11),
(59, 16, '9d9d9d', 31, 12),
(60, 16, '9d9d9d', 32, 13),
(61, 17, '000000', 36, 12),
(62, 17, '000000', 37, 11),
(63, 18, '000000', 39, 12),
(64, 18, '000000', 40, 10),
(65, 18, 'ff0000', 35, 8),
(66, 18, 'ff0000', 36, 9),
(67, 19, '000000', 24, 12),
(68, 19, '000000', 23, 10),
(69, 19, 'ff0000', 25, 12),
(70, 19, 'ff0000', 26, 13),
(71, 20, 'ffffff', 29, 12),
(72, 20, 'ffffff', 30, 5),
(78, 19, '000000', 22, 12);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`FkCustomer_Id`),
  ADD KEY `FkCustomerPhone` (`FkCustomer_Id`),
  ADD KEY `FkRole_Id` (`AccountRole`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`PkCustomer_Id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`PkOrder_Id`),
  ADD KEY `FkCustomerPhone` (`FkCustomer_Id`),
  ADD KEY `order_ibfk_2` (`FkOrderStatus_Id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`FkVariant_Id`,`FkOrder_Id`),
  ADD KEY `FkVariant_Id` (`FkVariant_Id`),
  ADD KEY `FkOrder_Id` (`FkOrder_Id`);

--
-- Chỉ mục cho bảng `order_info`
--
ALTER TABLE `order_info`
  ADD KEY `FkOrder_Id` (`FkOrder_Id`);

--
-- Chỉ mục cho bảng `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`PkOrderStatus_Id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PkProduct_Id`),
  ADD KEY `FkType_Id` (`FkType_Id`),
  ADD KEY `FKBrand_Id` (`FKBrand_Id`);

--
-- Chỉ mục cho bảng `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`PkBrand_Id`);

--
-- Chỉ mục cho bảng `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`PkColor_Id`);

--
-- Chỉ mục cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`PkProductComment_Id`),
  ADD KEY `FkCustomerPhone` (`FkCustomer_Id`),
  ADD KEY `FkProduct_Id` (`FkProduct_Id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`PkImage_Id`),
  ADD KEY `FkProduct_Id` (`FkProduct_Id`) USING BTREE,
  ADD KEY `product_image_ibfk_2` (`FkColor_Id`);

--
-- Chỉ mục cho bảng `product_rating`
--
ALTER TABLE `product_rating`
  ADD KEY `FkCustomerPhone` (`FkCustomer_Id`),
  ADD KEY `FkProduct_Id` (`FkProduct_Id`);

--
-- Chỉ mục cho bảng `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`PkType_Id`);

--
-- Chỉ mục cho bảng `product_variant`
--
ALTER TABLE `product_variant`
  ADD PRIMARY KEY (`PkVariant_Id`),
  ADD KEY `FkProduct_Id` (`FkProduct_Id`),
  ADD KEY `FkColor_Id` (`FkColor_Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `PkCustomer_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `PkOrder_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `PkProduct_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `PkBrand_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `PkProductComment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `PkImage_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT cho bảng `product_type`
--
ALTER TABLE `product_type`
  MODIFY `PkType_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `product_variant`
--
ALTER TABLE `product_variant`
  MODIFY `PkVariant_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`FkCustomer_Id`) REFERENCES `customer` (`PkCustomer_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`FkCustomer_Id`) REFERENCES `customer` (`PkCustomer_Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`FkOrderStatus_Id`) REFERENCES `order_status` (`PkOrderStatus_Id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`FkOrder_Id`) REFERENCES `order` (`PkOrder_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`FkVariant_Id`) REFERENCES `product_variant` (`PkVariant_Id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_info`
--
ALTER TABLE `order_info`
  ADD CONSTRAINT `order_info_ibfk_1` FOREIGN KEY (`FkOrder_Id`) REFERENCES `order` (`PkOrder_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FKBrand_Id` FOREIGN KEY (`FKBrand_Id`) REFERENCES `product_brand` (`PkBrand_Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FkType_Id` FOREIGN KEY (`FkType_Id`) REFERENCES `product_type` (`PkType_Id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  ADD CONSTRAINT `product_comment_ibfk_1` FOREIGN KEY (`FkProduct_Id`) REFERENCES `product` (`PkProduct_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_comment_ibfk_2` FOREIGN KEY (`FkCustomer_Id`) REFERENCES `customer` (`PkCustomer_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`FkProduct_Id`) REFERENCES `product` (`PkProduct_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_image_ibfk_2` FOREIGN KEY (`FkColor_Id`) REFERENCES `product_color` (`PkColor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_rating`
--
ALTER TABLE `product_rating`
  ADD CONSTRAINT `product_rating_ibfk_1` FOREIGN KEY (`FkProduct_Id`) REFERENCES `product` (`PkProduct_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_rating_ibfk_2` FOREIGN KEY (`FkCustomer_Id`) REFERENCES `customer` (`PkCustomer_Id`);

--
-- Các ràng buộc cho bảng `product_variant`
--
ALTER TABLE `product_variant`
  ADD CONSTRAINT `FkColor_Id` FOREIGN KEY (`FkColor_Id`) REFERENCES `product_color` (`PkColor_Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FkProduct_Id` FOREIGN KEY (`FkProduct_Id`) REFERENCES `product` (`PkProduct_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
