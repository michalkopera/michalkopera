-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 14 Paź 2018, 20:47
-- Wersja serwera: 5.5.61-cll-lve
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `miko_weryfikacja`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `proby`
--

CREATE TABLE `proby` (
  `username` varchar(32) COLLATE utf8_polish_ci DEFAULT NULL,
  `dobre` datetime NOT NULL,
  `ostatnie` datetime DEFAULT NULL,
  `liczba` int(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_usera` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `kod` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL,
  `potwierdzenie` bit(1) DEFAULT b'0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_usera`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_usera` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
