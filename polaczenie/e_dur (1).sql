-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Sty 2019, 00:20
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `e_dur`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `id_koszyka` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `suma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_polish_ci;

--
-- Zrzut danych tabeli `koszyk`
--

INSERT INTO `koszyk` (`id_koszyka`, `id_uzytkownika`, `suma`) VALUES
(1, 25, 900),
(2, 23, 300);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produktu` int(11) NOT NULL,
  `kategoria` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `podkategoria` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwa_produktu` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `producent` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `obrazki` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_polish_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `kategoria`, `podkategoria`, `nazwa_produktu`, `producent`, `cena`, `obrazki`) VALUES
(1, '\0i\0n\0s\0t\0r\0u\0m\0e\0n\0t', '\0g\0i\0t\0a\0r\0y', '\0g\0i\0t\0a\0r\0a\0 \0e\0l\0e\0k\0t\0r\0y\0c\0z\0n\0a\0,\0 \0 \0E\0R\0G\01', '\0Y\0a\0m\0a\0h\0a', 85000, ''),
(2, '\0i\0n\0s\0t\0r\0u\0m\0e\0n\0t', '\0g\0i\0t\0a\0r\0y', '\0g\0i\0t\0a\0r\0a\0 \0b\0a\0s\0o\0w\0a\0 \0E\0p\0i\0p\0h\0o\0n\0e\0 \0T\0o', '\0E\0p\0i\0p\0h\0o\0n\0e', 1050, ''),
(3, '\0i\0n\0s\0t\0r\0u\0m\0e\0n\0t', '\0g\0i\0t\0a\0r\0y', '\0g\0i\0t\0a\0r\0a\0 \0a\0k\0u\0s\0t\0y\0c\0z\0n\0a\0 \0F\0G\0 \07\05\00\0S', '\0Y\0A\0M\0A\0H\0A', 1900, ''),
(5, '\0i\0n\0s\0t\0r\0u\0m\0e\0n\0t', '\0g\0i\0t\0a\0r\0y', '\0g\0i\0t\0a\0r\0a\0 \0a\0k\0u\0s\0t\0y\0c\0z\0n\0a\0 \0W\0R\0S', '\0T\0.\0B\0r\0u\0t\0o\0n', 730, ''),
(6, '\0i\0n\0s\0t\0r\0u\0m\0e\0n\0t', '\0g\0i\0t\0a\0r\0y', '\0g\0i\0t\0a\0r\0a\0 \0e\0l\0e\0k\0t\0r\0y\0c\0z\0n\0a\0 \0R', '\0V\0G\0S', 800, ''),
(8, '\0i\0n\0s\0t\0r\0u\0m\0e\0n\0t', '\0g\0i\0t\0a\0r\0y', '\0g\0i\0t\0a\0r\0a\0 \0k\0l\0a\0s\0y\0c\0z\0n\0a\0 \0W\02\0R\05', '\0I\0b\0a\0n\0e\0z', 300, ''),
(10, '\0e\0l\0e\0k\0t\0r\0o\0n\0i\0k', '\0w\0z\0m\0a\0c\0n\0i\0a\0c\0z\0e', '\0V\0y\0p\0y\0r\0 \0V\0I\0P\0 \02', '\0P\0E\0A\0V\0E\0Y', 989, ''),
(11, '\0e\0l\0e\0k\0t\0r\0o\0n\0i\0k', '\0w\0z\0m\0a\0c\0n\0i\0a\0c\0z\0e', '\0M\0I\0G\0H\0T\0Y\0 \08\0S\0E', '\0N\0U\0X', 440, ''),
(12, '\0e\0l\0e\0k\0t\0r\0o\0n\0i\0k', '\0w\0z\0m\0a\0c\0n\0i\0a\0c\0z\0e', '\0F\0R\0O\0N\0T\0L\0I\0N\0E\0 \05\00', '\0N\0U\0X', 699, ''),
(13, '\0e\0l\0e\0k\0t\0r\0o\0n\0i\0k', '\0w\0z\0m\0a\0c\0n\0i\0a\0c\0z\0e', '\0 \0V\05\0 \0I\0N\0F\0I\0N\0I\0U\0M\0 \0-\0 \0C\0o\0m\0b\0o\0 \0g\0i\0t\0a', '\0B\0u\0g\0e\0r\0a', 900, ''),
(14, '\0e\0l\0e\0k\0t\0r\0o\0n\0i\0k', '\0s\0y\0n\0t\0e\0z\0a\0t\0o\0r\0y\0 \0g\0i\0t\0a\0r\0o\0w\0e', '\0R\0o\0l\0a\0n\0d\0 \0U\0S\0-\02\00\0,\0 \0u\0n\0i\0t\0 \0s\0e\0l\0e\0c\0t', '\0R\0o\0l\0a\0n\0d', 1000, ''),
(15, '\0e\0l\0e\0k\0t\0r\0o\0n\0i\0k', '\0s\0y\0n\0t\0e\0z\0a\0t\0o\0r\0y\0 \0g\0i\0t\0a\0r\0o\0w\0e', '\0R\0o\0l\0a\0n\0d\0 \0G\0K\0-\03\0B\0,\0p\0r\0z\0y\0s\0t\0a\0w\0k\0a\0 \0b', '\0R\0o\0l\0a\0n\0d', 600, ''),
(16, '\0e\0l\0e\0k\0t\0r\0o\0n\0i\0k', '\0s\0y\0n\0t\0e\0z\0a\0t\0o\0r\0y\0 \0g\0i\0t\0a\0r\0o\0w\0e', '\0R\0o\0l\0a\0n\0d\0 \0G\0K\0-\03\0,\0 \0p\0r\0z\0y\0s\0t\0a\0w\0k\0a\0 \0g', '\0R\0o\0l\0a\0n\0d', 800, ''),
(17, '\0a\0k\0c\0e\0s\0o\0r\0i\0a', '\0k\0a\0b\0l\0e', '\0S\0c\0h\0u\0l\0z\0 \0R\0K\06\0 \06\0m\0,\0 \0k\0a\0b\0e\0l\0 \0i\0n\0s\0t', '\0S\0c\0h\0u\0l\0z', 20, ''),
(18, '\0a\0k\0c\0e\0s\0o\0r\0i\0a', '\0k\0a\0b\0l\0e', '\0S\0c\0h\0u\0l\0z\0 \0K\0a\0b\0e\0l\0 \0D\0I\0N\03\0 \06\0m\0,\0 \0p\0r\0z', '\0S\0c\0h\0u\0l\0z', 40, ''),
(19, '\0a\0k\0c\0e\0s\0o\0r\0i\0a', '\0k\0a\0b\0l\0e', '\0S\0c\0h\0u\0l\0z\0 \0G\0W\0A\0S\0-\03\0,\0 \0k\0a\0b\0e\0l\0 \0j\0a\0c\0k', '\0S\0c\0h\0u\0l\0z', 50, ''),
(20, '\0e\0l\0e\0k\0t\0r\0o\0n\0i\0k', '\0k\0o\0s\0t\0k\0i\0 \0e\0f\0e\0k\0t\0o\0w\0e', '\0N\0U\0X\0 \0K\0O\0M\0P\0 \0C\0O\0R\0E\0 \0D\0E\0L\0U\0X\0E', '\0N\0U\0X', 300, ''),
(21, '\0e\0l\0e\0k\0t\0r\0o\0n\0i\0k', '\0k\0o\0s\0t\0k\0i\0 \0e\0f\0e\0k\0t\0o\0w\0e', '\0N\0U\0X\0 \0N\0S\0S\0-\05\0 \0S\0O\0L\0I\0D\0 \0S\0T\0U\0D\0I\0O', '\0N\0U\0X', 730, ''),
(22, '\0e\0l\0e\0k\0t\0r\0o\0n\0i\0k', '\0k\0o\0s\0t\0k\0i\0 \0e\0f\0e\0k\0t\0o\0w\0e', '\0T\0C\0 \0E\0l\0e\0c\0t\0r\0o\0n\0i\0c\0 \0P\0o\0l\0y\0T\0u\0n\0e\0 \02\0,', '\0T\0C\0 \0E\0l\0e\0c\0t\0r\0o\0n\0i\0c', 490, ''),
(23, '\0e\0l\0e\0k\0t\0r\0o\0n\0i\0k', '\0k\0o\0s\0t\0k\0i\0 \0e\0f\0e\0k\0t\0o\0w\0e', '\0T\0C\0 \0E\0l\0e\0c\0t\0r\0o\0n\0i\0c\0 \0N\0o\0v\0a\0 \0S\0y\0s\0t\0e\0m', '\0T\0C\0 \0E\0l\0e\0c\0t\0r\0o\0n\0i\0c\0 \0N\0o\0v\0a\0 \0S\0y\0s\0t\0e\0m', 1600, ''),
(24, 'elektronika', 'wzmacniacze', 'MIGHTY 8SE', 'NUX', 440, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(11) NOT NULL,
  `login` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `nazwisko` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `adres` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_uzytkownika`, `login`, `haslo`, `imie`, `nazwisko`, `email`, `adres`) VALUES
(1, 'admin1', '$2y$10$k6.JI3a5GbDTAaLa2GV5j.pvX3il.Bu0N.4zmu.LoGlf/H7jpFEBy', 'a', 's', 'as@gmail.com', 'admin nie musi miec adresu xd'),
(23, 'tosia15', '$2y$10$KhjmKu3.rWdInt2PNSgvNuQn8gsJgYX.FzuK7JQzrpOkB5kTqfOxm', 'T', 'osowska', 'osowskata@wp.pl', 'Poznan, Swietojanska 32'),
(24, 'zen45', '$2y$10$S117eQflkeU1jj7yy9S2Iu3O5RTjmMZ0I56dsiLFHyRHjcxW59ZZq', 'Zenon', 'Ekierka', 'zekierka@onet.pl', 'Gdansk, Dluga 12'),
(25, 'basian', '$2y$10$JWa7IIa9CAM6dvXLtENXe.9Ph6Q8gTk2bVLwP30Zv/Bh3c1ZE7dbS', 'Barbara', 'Nowakowska', 'barnowak@gmail.com', 'Gniezno, Polna 5'),
(26, 'amial1', '$2y$10$wTL/gJL4.QmVf3OrWhm.9eF6U066VNZxytOPlZLe9TM96pZc526Wm', 'adam', 'mialczynski', 'mialadam@onet.pl', 'Elblag, 3 maja 65'),
(27, 'nola33', '$2y$10$U0pSCCsijq3BXCNXYU7BRens8QelpHf4auyfb.41ZpjA6h/06KlSa', 'Aleksandra', 'Kowalska', 'kowalaleksandra@gmail.com', 'Krakow, Urzednicza 9'),
(29, 'kala88', '$2y$10$RA0ZOA.fJtSsgtddj3HTEOruCl/z8UIW9WoY9Lvtd2RMZPqzfd3mq', 'karolina', 'L', 'k@onet.pl', NULL),
(30, 'bartek33', '$2y$10$x6wTb4uEohXAePi0Ux1qUeg2KHRv/HQbfgnQ13h/hmriWktQwcR2m', 'Bartosz', 'W', 'bart@wp.pl', 'Gniezno, Dworska 13'),
(32, 'ola99', '$2y$10$nV5ywwJe9gZlSbAj492kUeIHjtiAqE54W.3TjjngNhPSDmcwQMmMi', 'ola', 'pak', 'pola9@wp.pl', 'Olsztyn, Mieszka I 13'),
(34, 'basia15', '$2y$10$vK1eyvnIi0osIwMPbTLmHus.qhAp8AyO0PtKJT22Bn66BXhc341DG', 'basia', 'nowak', 'bnowa@onet.pl', 'Poznan, Krotka 1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_polish_ci;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`id_zamowienia`, `id_uzytkownika`, `id_produktu`, `data`) VALUES
(1, 23, 8, '2019-01-03'),
(4, 25, 13, '2018-12-31');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`id_koszyka`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `id_produktu` (`id_produktu`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `id_koszyka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id_produktu`),
  ADD CONSTRAINT `zamowienia_ibfk_2` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
