-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 15 mrt 2016 om 08:52
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `eindwerk`
--
CREATE DATABASE IF NOT EXISTS `eindwerk` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eindwerk`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `berichten`
--

CREATE TABLE IF NOT EXISTS `berichten` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naam` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `onderwerp` varchar(50) NOT NULL,
  `bericht` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden uitgevoerd voor tabel `berichten`
--

INSERT INTO `berichten` (`id`, `naam`, `email`, `onderwerp`, `bericht`) VALUES
(4, 'Michiel', 'test@test.be', 'problemen', 'Test probleem'),
(5, 'geert', 'geert@test.be', 'klachten', 'test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `start` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Gegevens worden uitgevoerd voor tabel `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start`) VALUES
(4, 'karaoke avond 3', 'We organiseren een derde karaokeavond', '2015-12-13 19:30:00'),
(5, 'karaoke avond 1', '                                we organiseren een karaoke avond          voor god en ', '2018-01-01 19:00:00'),
(6, 'karaoke avond joepie', '                we organiseren een karaoke avond     joepi       ', '2018-01-02 19:00:20'),
(7, 'karaoke avond 1', 'we organiseren een karaoke avond', '2018-01-03 19:00:00'),
(8, 'karaoke avond 1', 'we organiseren een karaoke avond', '2018-01-04 19:00:00'),
(9, 'karaoke avond 1', 'we organiseren een karaoke avond', '2018-01-05 19:00:00'),
(10, 'karaoke', '                we organiseren een karaoke avond            ', '2018-01-06 19:00:00'),
(11, 'karaoke avond 1', 'we organiseren een karaoke avond', '2018-01-07 19:00:00'),
(13, 'test titel', '\r\n            test description', '1982-01-04 19:00:00'),
(14, 'test titel', '\r\n            test description', '1982-01-04 19:00:00'),
(15, 'woopwoop', '                een event voor in de lijst om te blijten                    ', '2016-04-04 19:00:00'),
(19, 'event', 'mijn eventje\r\n            ', '2018-01-01 20:00:25');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE IF NOT EXISTS `gebruiker` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gebruikersnaam` varchar(20) NOT NULL,
  `wachtwoord` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`id`, `gebruikersnaam`, `wachtwoord`) VALUES
(1, 'michiel', 'michielpeters'),
(2, 'geert put', 'geertput');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
