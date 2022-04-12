-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Kwi 2022, 15:49
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `test`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `xyzzyrp_chart`
--

CREATE TABLE `xyzzyrp_chart` (
  `id` int(255) NOT NULL,
  `players` int(255) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Zrzut danych tabeli `xyzzyrp_chart`
--

INSERT INTO `xyzzyrp_chart` (`id`, `players`, `date`) VALUES
(1, 0, 'Brak danych'),
(2, 0, 'Brak danych'),
(3, 0, 'Brak danych'),
(4, 0, 'Brak danych'),
(5, 0, 'Brak danych'),
(6, 0, 'Brak danych'),
(7, 0, 'Brak danych'),
(8, 0, 'Brak danych'),
(9, 0, 'Brak danych'),
(10, 0, 'Brak danych'),
(11, 0, 'Brak danych'),
(12, 0, 'Brak danych'),
(13, 0, 'Brak danych'),
(14, 0, 'Brak danych');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `xyzzyrp_logs`
--

CREATE TABLE `xyzzyrp_logs` (
  `id` int(255) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `xyzzyrp_users`
--

CREATE TABLE `xyzzyrp_users` (
  `id` int(255) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Zrzut danych tabeli `xyzzyrp_users`
--

INSERT INTO `xyzzyrp_users` (`id`, `user`, `pass`) VALUES
(1, 'admin', '$2y$10$qorXWrm3L1WT9qWjLTwNLuHvmLwHlfAvEDpiQCUzndj0QknK/Qg9S');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `xyzzyrp_chart`
--
ALTER TABLE `xyzzyrp_chart`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `xyzzyrp_logs`
--
ALTER TABLE `xyzzyrp_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `xyzzyrp_users`
--
ALTER TABLE `xyzzyrp_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `xyzzyrp_chart`
--
ALTER TABLE `xyzzyrp_chart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `xyzzyrp_logs`
--
ALTER TABLE `xyzzyrp_logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `xyzzyrp_users`
--
ALTER TABLE `xyzzyrp_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
