-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Kwi 2022, 14:58
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pkn`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stats`
--

CREATE TABLE `stats` (
  `id` int(6) NOT NULL,
  `data` varchar(255) NOT NULL,
  `cmp` int(11) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `stats`
--

INSERT INTO `stats` (`id`, `data`, `cmp`, `user`) VALUES
(3, '1646043757', 1, 'admin'),
(4, '1646043792', 1, 'admin'),
(5, '1646043800', 1, 'admin'),
(6, '1646043807', 0, 'admin'),
(7, '1646043811', 0, 'admin'),
(8, '1646043815', 0, 'admin'),
(9, '1646119006', 0, 'admin'),
(10, '1646120791', 1, 'admin'),
(11, '1646122092', 1, 'admin'),
(12, '1646122115', 1, 'admin'),
(13, '1646122124', 1, 'admin'),
(14, '1646122199', 1, 'admin'),
(15, '1646122218', 1, 'admin'),
(16, '1646122564', 1, 'admin'),
(17, '1646122579', 1, 'admin'),
(18, '1646122595', 0, 'admin'),
(19, '1649226034', 1, 'admin'),
(20, '1649227973', 1, 'admin'),
(21, '1649227985', 0, 'admin'),
(22, '1649227994', 1, 'admin'),
(23, '1649239725', 0, 'admin'),
(24, '1649239742', 0, 'admin'),
(25, '1649239750', 1, 'admin'),
(26, '1649239839', 1, 'admin'),
(27, '1649239945', 0, 'admin'),
(28, '1649242009', 0, 'admin'),
(29, '1649242148', 1, 'admin'),
(30, '1649242757', 1, 'admin'),
(31, '1649242912', 0, 'admin'),
(32, '1649242964', 1, 'admin'),
(33, '1649243048', 0, 'admin'),
(34, '1649243115', 0, 'admin'),
(35, '1649243332', 0, 'admin'),
(36, '1649243467', 0, 'admin'),
(37, '1649243524', 0, 'admin'),
(38, '1649243879', 1, 'admin'),
(39, '1649244331', 1, 'admin'),
(40, '1649244799', 1, 'admin'),
(41, '1649244810', 1, 'admin'),
(42, '1649244981', 1, 'admin'),
(43, '1649245033', 1, 'admin'),
(44, '1649246794', 1, 'admin'),
(45, '1649246801', 0, 'admin'),
(46, '1649247632', 0, 'admin'),
(47, '1649249260', 0, 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(1, 'admin', '$2y$10$Y1U9pwLzteMGAwvMHMXGGe.h3zMiTR2lKqYAzBKSQtytThGHZJASW');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `stats`
--
ALTER TABLE `stats`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
