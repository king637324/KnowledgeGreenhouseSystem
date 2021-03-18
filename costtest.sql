-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-03-11 09:21:55
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
(1, 'System', '1M-1\"', '1.0', '1.00', '1'),
(2, 'System', '1M-1-1/4\"', '1.2', '1.10', '1'),
(3, 'System', '1M-1-1/2\"', '1.3', '1.20', '1'),
(4, 'System', '1.5M-1-1/2\"', '1.2', '0.95', '1'),
(5, 'System', '2M-2\"', '1.0', '0.90', '1'),
(6, 'System', '0.5M-1\"', '1.8', '0.60', '1'),
(7, 'System', '0.5-3/4\"', '1.5', '0.70', '1'),
(8, 'System', '0.5-1/2\"', '1.2', '0.80', '1');

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
(1, 'System', 'PE', '1', '1.00', '1.0'),
(2, 'System', 'PO', '2', '0.95', '1.0'),
(3, 'System', '硬質塑材', '3', '0.90', '0.9'),
(4, 'System', 'ETFE', '10', '0.60', '0.7'),
(5, 'System', '玻璃', '5', '0.80', '0.8');

-- --------------------------------------------------------

--
-- 資料表結構 `simplecontinuitys`
--

CREATE TABLE `simplecontinuitys` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `simplecontinuitys`
--

INSERT INTO `simplecontinuitys` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '獨棟', '1.00', '1.00', '1.00'),
(2, 'System', '二連棟', '0.95', '0.95', '0.95'),
(3, 'System', '三連棟', '0.90', '0.90', '0.93'),
(4, 'System', '四連棟', '0.88', '0.88', '0.92');

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
(1, 'System', '溫室管材', '20%', '15%', '10%'),
(2, 'System', '圓頂形式', '10%', '15%', '10%'),
(3, 'System', '圓拱距', '10%', '10%', '10%'),
(4, 'System', '基礎', '10%', '10%', '10%'),
(5, 'System', '跨距', '10%', '15%', '15%'),
(6, 'System', '肩高', '10%', '10%', '15%'),
(7, 'System', '長度', '10%', '5%', '10%'),
(8, 'System', '連續性', '10%', '10%', '10%'),
(9, 'System', '披覆膜', '10%', '10%', '10%');

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
(9, 'System', 'W型樑', '1.20', '0.88', '0.95');

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
(1, 'System', '直插40cm', '1.0', '1.00', '1'),
(2, 'System', '直插50cm', '1.1', '0.90', '1'),
(3, 'System', '直插30cm', '0.9', '1.10', '1'),
(4, 'System', '直插40cm+地錨', '1.2', '0.80', '1'),
(5, 'System', '直插50cm+地錨', '1.3', '0.70', '1'),
(6, 'System', '直插30cm+地錨', '1.1', '0.85', '1');

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
(4, 'System', '高強高耐蝕管材', '1.15', '0.80', '0.90');

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
(4, 'System', '120m', '0.90', '0.97', '0.94');

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
(5, 'System', '4m', '1.23', '1.30', '0.88');

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
(1, 'System', '5.4m', '1.00', '1.0', '1.00'),
(2, 'System', '6m', '1.10', '1.1', '0.95'),
(3, 'System', '7.2m', '1.20', '1.2', '0.90'),
(4, 'System', '8m', '1.25', '1.3', '0.85');

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
(1, 'System', 'PE', '1', '1.00', '1.0'),
(2, 'System', 'PO', '2', '0.95', '1.0'),
(3, 'System', '硬質塑材', '3', '0.90', '0.9'),
(4, 'System', 'ETFE', '10', '0.60', '0.7'),
(5, 'System', '玻璃', '5', '0.80', '0.8');

-- --------------------------------------------------------

--
-- 資料表結構 `strongcontinuitys`
--

CREATE TABLE `strongcontinuitys` (
  `id` int(11) NOT NULL,
  `Expert` varchar(256) DEFAULT NULL,
  `BuildItem` varchar(256) DEFAULT NULL,
  `Cost` varchar(256) DEFAULT NULL,
  `StructuralRisk` varchar(256) DEFAULT NULL,
  `JobDifficulty` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `strongcontinuitys`
--

INSERT INTO `strongcontinuitys` (`id`, `Expert`, `BuildItem`, `Cost`, `StructuralRisk`, `JobDifficulty`) VALUES
(1, 'System', '獨棟', '1.00', '1.00', '1.00'),
(2, 'System', '二連棟', '0.95', '0.95', '0.95'),
(3, 'System', '三連棟', '0.90', '0.90', '0.93'),
(4, 'System', '四連棟', '0.88', '0.88', '0.92');

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
(1, 'System', '溫室型材', '20%', '15%', '10%'),
(2, 'System', '屋頂形式', '10%', '15%', '10%'),
(3, 'System', '上拱距', '10%', '10%', '10%'),
(4, 'System', '基礎', '10%', '10%', '10%'),
(5, 'System', '跨距', '10%', '15%', '15%'),
(6, 'System', '肩高', '10%', '10%', '15%'),
(7, 'System', '長度', '10%', '5%', '10%'),
(8, 'System', '連續性', '10%', '10%', '10%'),
(9, 'System', '披覆膜', '10%', '10%', '10%');

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
(1, 'System', '獨立基礎', '1', '1', '1'),
(2, 'System', '連續樑', '1.', '0.', '1'),
(3, 'System', '快速基礎', '0.', '1.', '1');

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
(4, 'System', '高強高耐蝕型材', '1.15', '0.80', '0.90');

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
(4, 'System', '120m', '0.90', '0.97', '0.94');

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
(1, 'System', '圓頂UBP', '1.0', '1.00', '1'),
(2, 'System', '圓力霸UTP', '1.1', '0.95', '1'),
(3, 'System', '山型VBP', '1.1', '0.98', '1'),
(4, 'System', '山力霸VTP', '1.2', '0.90', '1'),
(5, 'System', 'W型力霸', '1.3', '0.90', '1'),
(6, 'System', '單斜SP', '1.0', '0.92', '1');

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
(5, 'System', '5m', '1.20', '1.30', '0.88');

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
(5, 'System', '10m', '1.20', '1.20', '0.80');

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
(1, 'System', '2M', '1', '1', '1'),
(2, 'System', '1.33M', '1.', '0.9', '1'),
(3, 'System', '1M', '1.', '0.9', '1');

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
-- 資料表索引 `simplecontinuitys`
--
ALTER TABLE `simplecontinuitys`
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
-- 資料表索引 `strongcontinuitys`
--
ALTER TABLE `strongcontinuitys`
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
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simplecoatingfilms`
--
ALTER TABLE `simplecoatingfilms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simplecontinuitys`
--
ALTER TABLE `simplecontinuitys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simplecostratios`
--
ALTER TABLE `simplecostratios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simpledomeforms`
--
ALTER TABLE `simpledomeforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simplefoundations`
--
ALTER TABLE `simplefoundations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simplegreenhousepipes`
--
ALTER TABLE `simplegreenhousepipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simplelengths`
--
ALTER TABLE `simplelengths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simpleshoulderheights`
--
ALTER TABLE `simpleshoulderheights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `simplespans`
--
ALTER TABLE `simplespans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongcoatingfilms`
--
ALTER TABLE `strongcoatingfilms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongcontinuitys`
--
ALTER TABLE `strongcontinuitys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongcostratios`
--
ALTER TABLE `strongcostratios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongfoundations`
--
ALTER TABLE `strongfoundations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `stronggreenhouseprofiles`
--
ALTER TABLE `stronggreenhouseprofiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `stronglengths`
--
ALTER TABLE `stronglengths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongroofforms`
--
ALTER TABLE `strongroofforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongshoulderheights`
--
ALTER TABLE `strongshoulderheights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongspans`
--
ALTER TABLE `strongspans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `strongupperarchdistances`
--
ALTER TABLE `strongupperarchdistances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
