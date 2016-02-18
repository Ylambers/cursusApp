-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 18 feb 2016 om 16:09
-- Serverversie: 5.6.25
-- PHP-versie: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cursus`
--

CREATE TABLE IF NOT EXISTS `cursus` (
  `id` int(11) NOT NULL,
  `id_soort_cursus` int(10) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `start_time` varchar(13) NOT NULL,
  `end_time` varchar(13) NOT NULL,
  `event_date` varchar(25) NOT NULL,
  `description` varchar(999) NOT NULL,
  `places` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cursus_registratie`
--

CREATE TABLE IF NOT EXISTS `cursus_registratie` (
  `id` int(11) NOT NULL,
  `id_user` int(12) NOT NULL,
  `id_cursus` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cursus_soort`
--

CREATE TABLE IF NOT EXISTS `cursus_soort` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(9) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user_level` int(3) NOT NULL DEFAULT '1',
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `interleaving_couple` varchar(255) DEFAULT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cursus`
--
ALTER TABLE `cursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `cursus_registratie`
--
ALTER TABLE `cursus_registratie`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `cursus_soort`
--
ALTER TABLE `cursus_soort`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cursus`
--
ALTER TABLE `cursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `cursus_registratie`
--
ALTER TABLE `cursus_registratie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `cursus_soort`
--
ALTER TABLE `cursus_soort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
