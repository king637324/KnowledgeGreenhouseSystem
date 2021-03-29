-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-03-29 10:21:24
-- 伺服器版本： 10.4.13-MariaDB
-- PHP 版本： 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `costtest`
--

-- --------------------------------------------------------

--
-- 資料表結構 `simplecirculararchdistances`
--

CREATE TABLE `simplecirculararchdistances` (
  `id` int(111) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `simplecirculararchdistances`
--

INSERT INTO `simplecirculararchdistances` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '1M-1\"', '1.00', '1.00', '1.00'),
(2, 'System', '1M-1-1/4\"', '1.20', '1.10', '1.00'),
(3, 'System', '1M-1-1/2\"', '1.30', '1.20', '1.00'),
(4, 'System', '1.5M-1-1/2\"', '1.20', '0.95', '1.00'),
(5, 'System', '2M-2\"', '1.00', '0.90', '1.00'),
(6, 'System', '0.5M-1\"', '1.80', '0.60', '1.00'),
(7, 'System', '0.5-3/4\"', '1.50', '0.70', '1.00'),
(8, 'System', '0.5-1/2\"', '1.20', '0.80', '1.00'),
(9, '123', '1M-1\"', '40', '41', '42'),
(10, '123', '1M-1-1/4\"', '43', '44', '45'),
(11, '123', '1M-1-1/2\"', '46', '47', '48'),
(12, '123', '1.5M-1-1/2\"', '49', '50', '51'),
(13, '123', '2M-2\"', '52', '53', '54'),
(14, '123', '0.5M-1\"', '55', '56', '57'),
(15, '123', '0.5-3/4\"', '58', '59', '60'),
(16, '123', '0.5-1/2\"', '61', '62', '63');

-- --------------------------------------------------------

--
-- 資料表結構 `simplecoatingfilms`
--

CREATE TABLE `simplecoatingfilms` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(2256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `simplecoatingfilms`
--

INSERT INTO `simplecoatingfilms` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', 'PE', '1', '1.00', '1.00'),
(2, 'System', 'PO', '2', '0.95', '1.00'),
(3, 'System', '硬質塑材', '3', '0.90', '0.90'),
(4, 'System', 'ETFE', '10', '0.60', '0.70'),
(5, 'System', '玻璃', '5', '0.80', '0.80'),
(6, '123', 'PE', '121', '122', '123'),
(7, '123', 'PO', '124', '125', '126'),
(8, '123', '硬質塑材', '127', '128', '129'),
(9, '123', 'ETFE', '130', '131', '132'),
(10, '123', '玻璃', '133', '134', '135');

-- --------------------------------------------------------

--
-- 資料表結構 `simplecontinuities`
--

CREATE TABLE `simplecontinuities` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `simplecontinuities`
--

INSERT INTO `simplecontinuities` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '獨棟', '1.00', '1.00', '1.00'),
(2, 'System', '二連棟', '0.95', '0.95', '0.95'),
(3, 'System', '三連棟', '0.90', '0.90', '0.93'),
(4, 'System', '四連棟', '0.88', '0.88', '0.92'),
(5, '123', '獨棟', '136', '137', '138'),
(6, '123', '二連棟', '139', '140', '141'),
(7, '123', '三連棟', '142', '143', '144'),
(8, '123', '四連棟', '145', '146', '147');

-- --------------------------------------------------------

--
-- 資料表結構 `simplecostratios`
--

CREATE TABLE `simplecostratios` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `simplecostratios`
--

INSERT INTO `simplecostratios` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '溫室管材', '20', '15', '10'),
(2, 'System', '圓頂形式', '10', '15', '10'),
(3, 'System', '圓拱距', '10', '10', '10'),
(4, 'System', '基礎', '10', '10', '10'),
(5, 'System', '跨距', '10', '15', '15'),
(6, 'System', '肩高', '10', '10', '15'),
(7, 'System', '長度', '10', '5', '10'),
(8, 'System', '連續性', '10', '10', '10'),
(9, 'System', '披覆膜', '10', '10', '10'),
(10, '123', '溫室管材', '15', '15', '15'),
(11, '123', '圓頂形式', '15', '15', '15'),
(12, '123', '圓拱距', '10', '10', '10'),
(13, '123', '基礎', '10', '10', '10'),
(14, '123', '跨距', '10', '10', '10'),
(15, '123', '肩高', '10', '10', '10'),
(16, '123', '長度', '10', '10', '10'),
(17, '123', '連續性', '10', '10', '10'),
(18, '123', '披覆膜', '10', '10', '10');

-- --------------------------------------------------------

--
-- 資料表結構 `simpledomeforms`
--

CREATE TABLE `simpledomeforms` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `simpledomeforms`
--

INSERT INTO `simpledomeforms` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '單一圓拱', '1.00', '1.00', '1.00'),
(2, 'System', '下橫樑', '1.10', '0.98', '0.95'),
(3, 'System', '上1/3橫梁', '1.05', '0.95', '0.95'),
(4, 'System', '上二橫梁', '1.10', '0.90', '0.95'),
(5, 'System', 'T型樑', '1.15', '0.98', '0.95'),
(6, 'System', '三支集中樑', '1.20', '0.95', '0.95'),
(7, 'System', '三支垂支梁', '1.20', '0.99', '0.95'),
(8, 'System', 'V型樑', '1.10', '0.93', '0.95'),
(9, 'System', 'W型樑', '1.20', '0.88', '0.95'),
(10, '123', '單一圓拱', '13', '14', '15'),
(11, '123', '下橫樑', '16', '17', '18'),
(12, '123', '上1/3橫梁', '19', '20', '21'),
(13, '123', '上二橫梁', '22', '23', '24'),
(14, '123', 'T型樑', '25', '26', '27'),
(15, '123', '三支集中樑', '28', '29', '30'),
(16, '123', '三支集中樑', '31', '32', '33'),
(17, '123', 'V型樑', '34', '35', '36'),
(18, '123', 'W型樑', '37', '38', '39');

-- --------------------------------------------------------

--
-- 資料表結構 `simplefoundations`
--

CREATE TABLE `simplefoundations` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `simplefoundations`
--

INSERT INTO `simplefoundations` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '直插40cm', '1.00', '1.00', '1.00'),
(2, 'System', '直插50cm', '1.10', '0.90', '1.00'),
(3, 'System', '直插30cm', '0.90', '1.10', '1.00'),
(4, 'System', '直插40cm+地錨', '1.20', '0.80', '1.00'),
(5, 'System', '直插50cm+地錨', '1.30', '0.70', '1.00'),
(6, 'System', '直插30cm+地錨', '1.10', '0.85', '1.00'),
(7, '123', '直插30cm', '91', '92', '93'),
(8, '123', '直插40cm', '94', '95', '96'),
(9, '123', '直插50cm', '97', '98', '99'),
(10, '123', '直插30cm+地錨', '100', '101', '102'),
(11, '123', '直插40cm+地錨', '103', '104', '105'),
(12, '123', '直插50cm+地錨', '106', '107', '108');

-- --------------------------------------------------------

--
-- 資料表結構 `simplegreenhousepipes`
--

CREATE TABLE `simplegreenhousepipes` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `simplegreenhousepipes`
--

INSERT INTO `simplegreenhousepipes` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '標準管材', '1.00', '1.00', '1.00'),
(2, 'System', '高強管材', '1.10', '0.90', '0.95'),
(3, 'System', '耐蝕管材', '1.05', '0.95', '0.95'),
(4, 'System', '高強高耐蝕管材', '1.15', '0.80', '0.90'),
(5, '123', '標準管材', '1', '2', '3'),
(6, '123', '高強管材', '4', '5', '6'),
(7, '123', '耐蝕管材', '7', '8', '9'),
(8, '123', '高強高耐蝕管材', '10', '11', '12');

-- --------------------------------------------------------

--
-- 資料表結構 `simplelengths`
--

CREATE TABLE `simplelengths` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `simplelengths`
--

INSERT INTO `simplelengths` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '30m', '1.00', '1.00', '1.00'),
(2, 'System', '60m', '0.96', '0.99', '0.98'),
(3, 'System', '90m', '0.93', '0.98', '0.96'),
(4, 'System', '120m', '0.90', '0.97', '0.94'),
(5, '123', '30m', '109', '110', '111'),
(6, '123', '60m', '112', '113', '114'),
(7, '123', '90m', '115', '116', '117'),
(8, '123', '120m', '118', '119', '120');

-- --------------------------------------------------------

--
-- 資料表結構 `simpleshoulderheights`
--

CREATE TABLE `simpleshoulderheights` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `simpleshoulderheights`
--

INSERT INTO `simpleshoulderheights` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '2m', '1.00', '1.00', '1.00'),
(2, 'System', '2.5m', '1.10', '1.05', '0.95'),
(3, 'System', '3m', '1.15', '1.10', '0.92'),
(4, 'System', '3.5m', '1.20', '1.25', '0.90'),
(5, 'System', '4m', '1.23', '1.30', '0.88'),
(6, '123', '2m', '76', '77', '78'),
(7, '123', '2.5m', '79', '80', '81'),
(8, '123', '3m', '82', '83', '84'),
(9, '123', '3.5m', '85', '86', '87'),
(10, '123', '4m', '88', '89', '90');

-- --------------------------------------------------------

--
-- 資料表結構 `simplespans`
--

CREATE TABLE `simplespans` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `simplespans`
--

INSERT INTO `simplespans` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '5.4m', '1.00', '1.00', '1.00'),
(2, 'System', '6m', '1.10', '1.10', '0.95'),
(3, 'System', '7.2m', '1.20', '1.20', '0.90'),
(4, 'System', '8m', '1.25', '1.30', '0.85'),
(5, '123', '5.4m', '64', '65', '66'),
(6, '123', '6m', '67', '68', '69'),
(7, '123', '7.2m', '70', '71', '72'),
(8, '123', '8m', '73', '74', '75');

-- --------------------------------------------------------

--
-- 資料表結構 `strongcoatingfilms`
--

CREATE TABLE `strongcoatingfilms` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `strongcoatingfilms`
--

INSERT INTO `strongcoatingfilms` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', 'PE', '1', '1.00', '1.00'),
(2, 'System', 'PO', '2', '0.95', '1.00'),
(3, 'System', '硬質塑材', '3', '0.90', '0.90'),
(4, 'System', 'ETFE', '10', '0.60', '0.70'),
(5, 'System', '玻璃', '5', '0.80', '0.80'),
(6, '123', 'PE', '91', '92', '93'),
(7, '123', 'PO', '94', '95', '96'),
(8, '123', '硬質塑材', '97', '98', '99'),
(9, '123', 'ETFE', '100', '101', '102'),
(10, '123', '玻璃', '103', '104', '105');

-- --------------------------------------------------------

--
-- 資料表結構 `strongcontinuities`
--

CREATE TABLE `strongcontinuities` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `strongcontinuities`
--

INSERT INTO `strongcontinuities` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '獨棟', '1.00', '1.00', '1.00'),
(2, 'System', '二連棟', '0.95', '0.95', '0.95'),
(3, 'System', '三連棟', '0.90', '0.90', '0.93'),
(4, 'System', '四連棟', '0.88', '0.88', '0.92'),
(5, '123', '獨棟', '106', '107', '108'),
(6, '123', '二連棟', '109', '110', '111'),
(7, '123', '三連棟', '112', '113', '114'),
(8, '123', '四連棟', '115', '116', '117');

-- --------------------------------------------------------

--
-- 資料表結構 `strongcostratios`
--

CREATE TABLE `strongcostratios` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `strongcostratios`
--

INSERT INTO `strongcostratios` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '溫室型材', '20', '15', '10'),
(2, 'System', '屋頂形式', '10', '15', '10'),
(3, 'System', '上拱距', '10', '10', '10'),
(4, 'System', '基礎', '10', '10', '10'),
(5, 'System', '跨距', '10', '15', '15'),
(6, 'System', '肩高', '10', '10', '15'),
(7, 'System', '長度', '10', '5', '10'),
(8, 'System', '連續性', '10', '10', '10'),
(9, 'System', '披覆膜', '10', '10', '10'),
(10, '123', '溫室型材', '15', '15', '15'),
(11, '123', '屋頂形式', '15', '15', '15'),
(12, '123', '上拱距', '10', '10', '10'),
(13, '123', '基礎', '10', '10', '10'),
(14, '123', '跨距', '10', '10', '10'),
(15, '123', '肩高', '10', '10', '10'),
(16, '123', '長度', '10', '10', '10'),
(17, '123', '連續性', '10', '10', '10'),
(18, '123', '披覆膜', '10', '10', '10');

-- --------------------------------------------------------

--
-- 資料表結構 `strongfoundations`
--

CREATE TABLE `strongfoundations` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(2256) DEFAULT NULL,
  `StructuralRisk` varchar(2256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `strongfoundations`
--

INSERT INTO `strongfoundations` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '獨立基礎', '1.00', '1.00', '1.00'),
(2, 'System', '連續樑', '1.20', '0.90', '1.00'),
(3, 'System', '快速基礎', '0.90', '1.10', '1.00'),
(8, '123', '獨立基礎', '40', '41', '42'),
(9, '123', '連續樑', '43', '44', '45'),
(10, '123', '快速基礎', '46', '47', '48');

-- --------------------------------------------------------

--
-- 資料表結構 `stronggreenhouseprofiles`
--

CREATE TABLE `stronggreenhouseprofiles` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `stronggreenhouseprofiles`
--

INSERT INTO `stronggreenhouseprofiles` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '標準型材', '1.00', '1.00', '1.00'),
(2, 'System', '高強型材', '1.10', '0.90', '0.95'),
(3, 'System', '耐蝕型材', '1.05', '0.95', '0.95'),
(4, 'System', '高強高耐蝕型材', '1.15', '0.80', '0.90'),
(5, '123', '標準型材', '1', '2', '3'),
(6, '123', '高強型材', '4', '5', '6'),
(7, '123', '耐蝕型材', '7', '8', '9'),
(8, '123', '高強高耐蝕型材', '10', '11', '12');

-- --------------------------------------------------------

--
-- 資料表結構 `stronglengths`
--

CREATE TABLE `stronglengths` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `stronglengths`
--

INSERT INTO `stronglengths` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '30m', '1.00', '1.00', '1.00'),
(2, 'System', '60m', '0.96', '0.99', '0.98'),
(3, 'System', '90m', '0.93', '0.98', '0.96'),
(4, 'System', '120m', '0.90', '0.97', '0.94'),
(5, '123', '30m', '79', '80', '81'),
(6, '123', '60m', '82', '83', '84'),
(7, '123', '90m', '85', '86', '87'),
(8, '123', '120m', '88', '89', '90');

-- --------------------------------------------------------

--
-- 資料表結構 `strongroofforms`
--

CREATE TABLE `strongroofforms` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `strongroofforms`
--

INSERT INTO `strongroofforms` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '圓頂UBP', '1.00', '1.00', '1.00'),
(2, 'System', '圓力霸UTP', '1.10', '0.95', '1.00'),
(3, 'System', '山型VBP', '1.10', '0.98', '1.00'),
(4, 'System', '山力霸VTP', '1.20', '0.90', '1.00'),
(5, 'System', 'W型力霸', '1.30', '0.90', '1.00'),
(6, 'System', '單斜SP', '1.00', '0.92', '1.00'),
(7, '123', '圓頂UBP', '13', '14', '15'),
(8, '123', '圓力霸UTP', '16', '17', '18'),
(9, '123', '山型VBP', '19', '20', '21'),
(10, '123', '山力霸VTP', '22', '23', '24'),
(11, '123', 'W型力霸', '25', '26', '27'),
(12, '123', '單斜SP', '28', '29', '30');

-- --------------------------------------------------------

--
-- 資料表結構 `strongshoulderheights`
--

CREATE TABLE `strongshoulderheights` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `strongshoulderheights`
--

INSERT INTO `strongshoulderheights` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '3m', '1.00', '1.00', '1.00'),
(2, 'System', '3.5m', '1.05', '1.05', '0.95'),
(3, 'System', '4m', '1.10', '1.10', '0.92'),
(4, 'System', '4.5m', '1.15', '1.25', '0.90'),
(5, 'System', '5m', '1.20', '1.30', '0.88'),
(6, '123', '3m', '49', '50', '51'),
(7, '123', '3.5m', '52', '53', '54'),
(8, '123', '4m', '55', '56', '57'),
(9, '123', '4.5m', '58', '59', '60'),
(10, '123', '5m', '61', '62', '63');

-- --------------------------------------------------------

--
-- 資料表結構 `strongspans`
--

CREATE TABLE `strongspans` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `strongspans`
--

INSERT INTO `strongspans` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '6m', '1.00', '1.00', '1.00'),
(2, 'System', '7m', '1.05', '1.05', '0.95'),
(3, 'System', '8m', '1.10', '1.10', '0.90'),
(4, 'System', '9m', '1.15', '1.15', '0.85'),
(5, 'System', '10m', '1.20', '1.20', '0.80'),
(6, '123', '6m', '64', '65', '66'),
(7, '123', '7m', '67', '68', '69'),
(8, '123', '8m', '70', '71', '72'),
(9, '123', '9m', '73', '74', '75'),
(10, '123', '10m', '76', '77', '78');

-- --------------------------------------------------------

--
-- 資料表結構 `strongupperarchdistances`
--

CREATE TABLE `strongupperarchdistances` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `strongupperarchdistances`
--

INSERT INTO `strongupperarchdistances` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '2M', '1.00', '1.00', '1.00'),
(2, 'System', '1.33M', '1.10', '0.95', '1.00'),
(3, 'System', '1M', '1.20', '0.90', '1.00'),
(8, '123', '2M', '31', '32', '33'),
(9, '123', '1.33M', '34', '35', '36'),
(10, '123', '1M', '37', '38', '39');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `simplecirculararchdistances`
--
ALTER TABLE `simplecirculararchdistances`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `simplecoatingfilms`
--
ALTER TABLE `simplecoatingfilms`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `simplecontinuities`
--
ALTER TABLE `simplecontinuities`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `simplecostratios`
--
ALTER TABLE `simplecostratios`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `simpledomeforms`
--
ALTER TABLE `simpledomeforms`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `simplefoundations`
--
ALTER TABLE `simplefoundations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `simplegreenhousepipes`
--
ALTER TABLE `simplegreenhousepipes`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `simplelengths`
--
ALTER TABLE `simplelengths`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `simpleshoulderheights`
--
ALTER TABLE `simpleshoulderheights`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `simplespans`
--
ALTER TABLE `simplespans`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `strongcoatingfilms`
--
ALTER TABLE `strongcoatingfilms`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `strongcontinuities`
--
ALTER TABLE `strongcontinuities`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `strongcostratios`
--
ALTER TABLE `strongcostratios`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `strongfoundations`
--
ALTER TABLE `strongfoundations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `stronggreenhouseprofiles`
--
ALTER TABLE `stronggreenhouseprofiles`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `stronglengths`
--
ALTER TABLE `stronglengths`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `strongroofforms`
--
ALTER TABLE `strongroofforms`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `strongshoulderheights`
--
ALTER TABLE `strongshoulderheights`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `strongspans`
--
ALTER TABLE `strongspans`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `strongupperarchdistances`
--
ALTER TABLE `strongupperarchdistances`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simplecirculararchdistances`
--
ALTER TABLE `simplecirculararchdistances`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simplecoatingfilms`
--
ALTER TABLE `simplecoatingfilms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simplecontinuities`
--
ALTER TABLE `simplecontinuities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simplecostratios`
--
ALTER TABLE `simplecostratios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simpledomeforms`
--
ALTER TABLE `simpledomeforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simplefoundations`
--
ALTER TABLE `simplefoundations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simplegreenhousepipes`
--
ALTER TABLE `simplegreenhousepipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simplelengths`
--
ALTER TABLE `simplelengths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simpleshoulderheights`
--
ALTER TABLE `simpleshoulderheights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simplespans`
--
ALTER TABLE `simplespans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongcoatingfilms`
--
ALTER TABLE `strongcoatingfilms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongcontinuities`
--
ALTER TABLE `strongcontinuities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongcostratios`
--
ALTER TABLE `strongcostratios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongfoundations`
--
ALTER TABLE `strongfoundations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `stronggreenhouseprofiles`
--
ALTER TABLE `stronggreenhouseprofiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `stronglengths`
--
ALTER TABLE `stronglengths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongroofforms`
--
ALTER TABLE `strongroofforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongshoulderheights`
--
ALTER TABLE `strongshoulderheights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongspans`
--
ALTER TABLE `strongspans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongupperarchdistances`
--
ALTER TABLE `strongupperarchdistances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
