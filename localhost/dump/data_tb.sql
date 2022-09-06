-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3333
-- Время создания: Сен 06 2022 г., 09:39
-- Версия сервера: 8.0.29
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `data_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `data_tb`
--

CREATE TABLE `data_tb` (
  `UID` int NOT NULL,
  `Name` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `Age` int DEFAULT NULL,
  `Email` varchar(100) CHARACTER SET ucs2 COLLATE ucs2_general_ci DEFAULT NULL,
  `Phone` varchar(16) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `Gender` set('male','female') CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `data_tb`
--

INSERT INTO `data_tb` (`UID`, `Name`, `Age`, `Email`, `Phone`, `Gender`) VALUES
(1, 'Alex', 22, 'alex@textmail.com', '01243453425', 'male'),
(2, 'Helen', 17, 'helen@textmail.com', '06457634543', 'female'),
(3, 'Max', 45, 'Max-1@textmail.com', '07657324322', 'male'),
(4, 'John', 12, 'j@textmail.com', '09345723467', 'male'),
(5, 'Ivan', 77, 'Ivan-777@textmail.com', '02345324543', 'male'),
(6, 'Peter', 35, 'pp@textmail.com', '07456342343', 'male'),
(7, 'Ann', 53, 'annie@textmail.com', '08563445233', 'female'),
(8, 'Matt', 33, 'mett@textmail.com', '06435433452', 'male'),
(9, 'Kate', 21, 'katerina@textmail.com', '02453546444', 'female'),
(10, 'Jack', 43, 'jj@textmail.com', '08967443234', 'male');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `data_tb`
--
ALTER TABLE `data_tb`
  ADD PRIMARY KEY (`UID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
