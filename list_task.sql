-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 17 2020 г., 07:59
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `list_task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `ID` int(11) NOT NULL,
  `Name_task` text NOT NULL,
  `Date_begin_task` date NOT NULL,
  `Date_end_task` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`ID`, `Name_task`, `Date_begin_task`, `Date_end_task`) VALUES
(62, 'Работа', '2020-12-16', '2020-12-17'),
(63, 'Выполнение работы', '2020-12-29', '2020-12-31');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
