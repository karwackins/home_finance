-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Paź 2017, 11:20
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `budzet`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `podkategorie`
--

CREATE TABLE IF NOT EXISTS `podkategorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategorie` int(11) NOT NULL,
  `nazwa` text CHARACTER SET latin2 COLLATE latin2_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Zrzut danych tabeli `podkategorie`
--

INSERT INTO `podkategorie` (`id`, `id_kategorie`, `nazwa`) VALUES
(1, 1, 'Jedzenie dom'),
(2, 1, 'Jedzenie miasto\r\n'),
(3, 1, 'Jedzenie praca\r\n'),
(4, 1, 'Alkohol\r\n'),
(5, 1, 'Jedzenie inne\r\n'),
(6, 2, 'Czynsz\r\n'),
(7, 2, 'Czynsz II\r\n'),
(8, 2, 'Woda i kanalizacja\r\n'),
(9, 2, 'Prąd\r\n'),
(10, 2, 'Gaz\r\n'),
(11, 2, 'Ogrzewanie\r\n'),
(12, 2, 'Wywóz śmieci\r\n'),
(13, 2, 'Konserwacja i naprawy\r\n'),
(14, 2, 'Wyposa?enie\r\n'),
(15, 2, 'Ubezpieczenie nieruchomo?ci\r\n'),
(16, 2, 'Mieszkanie / Dom inne\r\n'),
(17, 3, 'Paliwo do auta Leon\r\n'),
(18, 3, 'Wyposa?enie dodatkowe (opony)\r\n'),
(19, 3, 'Ubezpieczenie auta'),
(20, 3, 'Bilet komunikacji miejskiej\r\n'),
(21, 3, 'Bilet PKP, PKS\r\n'),
(22, 3, 'Taxi\r\n'),
(23, 3, 'Transport / inne\r\n'),
(24, 3, 'Paliwo do Matiza\r\n'),
(25, 4, 'Telekomunikacja	Telefon 1'),
(26, 4, 'Telekomunikacja	Telefon 2'),
(27, 4, 'Telekomunikacja	TV'),
(28, 4, 'Telekomunikacja	Internet'),
(29, 4, 'Telekomunikacja	Telekomunikacja inne'),
(30, 5, 'Opieka zdrowotna	Lekarz'),
(31, 5, 'Opieka zdrowotna	Badania'),
(32, 5, 'Opieka zdrowotna	Lekarstwa'),
(33, 5, 'Opieka zdrowotna	Opieka zdrowotna inne'),
(34, 6, 'Ubranie	Ubranie zwyk?e'),
(35, 6, 'Ubranie	Ubranie sportowe'),
(36, 6, 'Ubranie	Buty'),
(37, 6, 'Ubranie	Dodatki'),
(38, 6, 'Ubranie	Ubranie inne'),
(39, 7, 'Higiena	Kosmetyki'),
(40, 7, 'Higiena	?rodki czysto?ci (chemia)'),
(41, 7, 'Higiena	Fryzjer'),
(42, 7, 'Higiena	Kosmetyczka'),
(43, 7, 'Higiena	Higiena inne'),
(44, 7, 'Higiena	Oriflame - faktury'),
(45, 8, 'Dzieci	Artyku?y szkolne'),
(46, 8, 'Dzieci	Dodatkowe zaj?cia'),
(47, 8, 'Dzieci	Wp?aty na szko?? itp.'),
(48, 8, 'Dzieci	Zabawki / gry'),
(49, 8, 'Dzieci	Opieka nad dzie?mi'),
(50, 8, 'Dzieci	Dzieci inne'),
(51, 9, 'Rozrywka	Si?ownia / Basen'),
(52, 9, 'Rozrywka	Kino / Teatr'),
(53, 9, 'Rozrywka	Koncerty'),
(54, 9, 'Rozrywka	Czasopisma'),
(55, 9, 'Rozrywka	Ksi??ki'),
(56, 9, 'Rozrywka	Hobby'),
(57, 9, 'Rozrywka	Hotel / Turystyka'),
(58, 9, 'Rozrywka	Rozrywka inne'),
(59, 10, 'Inne wydatki	Dobroczynno??'),
(60, 10, 'Inne wydatki	Prezenty'),
(61, 10, 'Inne wydatki	Sprz?t RTV'),
(62, 10, 'Inne wydatki	Oprogramowanie'),
(63, 10, 'Inne wydatki	Edukacja / Szkolenia'),
(64, 10, 'Inne wydatki	Us?ugi inne'),
(65, 10, 'Inne wydatki	Podatki'),
(66, 10, 'Inne wydatki	Inne'),
(67, 10, 'Inne wydatki	Zakupy w sklepach typu Castorama, LM'),
(68, 10, 'Inne wydatki	wakacje'),
(69, 11, 'Sp?ata d?ugów	Kredyt hipoteczny 7/13'),
(70, 11, 'Sp?ata d?ugów	Kredyt konsumpcyjny'),
(71, 11, 'Sp?ata d?ugów	Po?yczka osobista'),
(72, 11, 'Sp?ata d?ugów	Karta kredytowa - Damian'),
(73, 11, 'Sp?ata d?ugów	Karta kredytowa - Paulina'),
(74, 11, 'Sp?ata d?ugów	Kredyt hipoteczny 7/11'),
(75, 12, 'Budowanie oszcz?dno?ci	Fundusz awaryjny'),
(76, 12, 'Budowanie oszcz?dno?ci	Fundusz wydatków nieregularnych'),
(77, 12, 'Budowanie oszcz?dno?ci	Poduszka finansowa'),
(78, 12, 'Budowanie oszcz?dno?ci	Konto emerytalne IKE/IKZE'),
(79, 12, 'Budowanie oszcz?dno?ci	Nadp?ata d?ugów'),
(80, 12, 'Budowanie oszcz?dno?ci	Fundusz: wakacje'),
(81, 12, 'Budowanie oszcz?dno?ci	Fundusz: prezenty ?wi?teczne'),
(82, 12, 'Budowanie oszcz?dno?ci	Chrze?niacy'),
(83, 12, 'Budowanie oszcz?dno?ci	Fundusz 7/11'),
(84, 12, 'Budowanie oszcz?dno?ci	Coders Lab');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
