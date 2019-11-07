-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2019 年 11 月 07 日 15:19
-- サーバのバージョン： 10.4.6-MariaDB
-- PHP のバージョン: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacfd04_05`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `board_table`
--

CREATE TABLE `board_table` (
  `id` int(12) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `board_table`
--

INSERT INTO `board_table` (`id`, `name`, `comment`, `image`, `indate`) VALUES
(1, 'daisuke', 'アップロードできるかな？', 'upload/20191105160820d41d8cd98f00b204e9800998ecf8427e.png', '2019-11-06 00:08:20'),
(2, 'daisuke', 'アップロードできたね', 'upload/20191106115857d41d8cd98f00b204e9800998ecf8427e.png', '2019-11-06 19:58:57'),
(3, 'daisuke', 'でも画像の表示ができないね', 'upload/20191106115954d41d8cd98f00b204e9800998ecf8427e.png', '2019-11-06 19:59:54'),
(4, 'daisuke', 'nameにログインIDを入れることに成功', 'upload/20191107141544d41d8cd98f00b204e9800998ecf8427e.png', '2019-11-07 22:15:44'),
(5, 'daisuke', '画像の表示ができた！', 'upload/20191107142851d41d8cd98f00b204e9800998ecf8427e.png', '2019-11-07 22:28:51'),
(6, 'daisuke', '画像なしだと...', NULL, '2019-11-07 22:34:50'),
(7, 'daisukechan', '違う名前でもログイン', 'upload/20191107151650d41d8cd98f00b204e9800998ecf8427e.png', '2019-11-07 23:16:50');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `board_table`
--
ALTER TABLE `board_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `board_table`
--
ALTER TABLE `board_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
