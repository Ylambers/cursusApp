-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 24 jan 2016 om 17:18
-- Serverversie: 10.0.17-MariaDB
-- PHP-versie: 5.6.14

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

CREATE TABLE `cursus` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `start_time` varchar(13) NOT NULL,
  `end_time` varchar(13) NOT NULL,
  `event_date` varchar(25) NOT NULL,
  `description` varchar(999) NOT NULL,
  `places` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `cursus`
--

INSERT INTO `cursus` (`id`, `event_name`, `place`, `start_time`, `end_time`, `event_date`, `description`, `places`) VALUES
(44, 'Fietsen', 'berlijn', '00:00', '00:00', '1-januari-2016', 'fietsen ', 23),
(45, 'Fietsen', 'berlij', '00:00', '00:00', '1-januari-2016', 'fietsen', 23),
(46, 'fdfsdfsdf', 'sdfsdfsdfsd', '00:00', '04:00', '1-januari-2016', 'sdfsdfsdf', 34),
(47, 'fdfsdfsdf', 'sdfsdfsdfsd', '00:00', '04:00', '1-januari-2016', 'sdfsdfsdf', 34),
(48, 'sdasdasd', 'asdasdasdas', '00:00', '00:00', '1-januari-2016', 'sdasdasd', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cursus_registratie`
--

CREATE TABLE `cursus_registratie` (
  `id` int(11) NOT NULL,
  `id_user` int(12) NOT NULL,
  `id_cursus` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `cursus_registratie`
--

INSERT INTO `cursus_registratie` (`id`, `id_user`, `id_cursus`) VALUES
(36, 4, 44),
(37, 5, 44),
(38, 4, 46);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(9) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user_level` int(3) NOT NULL DEFAULT '1',
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `password`, `user_level`, `firstname`, `lastname`, `phone`, `email`) VALUES
(4, '21232f297a57a5a743894a0e4a801fc3', 2, 'yaron', 'lambers', '0620923399', 'y.lambers@outlook.com'),
(5, '21232f297a57a5a743894a0e4a801fc3', 2, 'Bruce', 'Waynee', '0620923399', 'badman@hotmail.com'),
(6, '21232f297a57a5a743894a0e4a801fc3', 1, 'yaron', 'lambers', '6209233990', 'fietsje@hotmail.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT voor een tabel `cursus_registratie`
--
ALTER TABLE `cursus_registratie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
