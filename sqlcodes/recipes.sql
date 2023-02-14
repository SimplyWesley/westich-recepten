-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 02 feb 2023 om 13:11
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipes`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ingrec`
--

DROP DATABASE IF EXISTS `recipes`;

CREATE DATABASE `recipes`;

USE `recipes`;

DROP TABLE IF EXISTS `ingrec`;
CREATE TABLE `ingrec` (
  `id` mediumint(9) NOT NULL,
  `recept_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `hoeveelheid` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `ingrec`
--

INSERT INTO `ingrec` (`id`, `recept_id`, `ingredient_id`, `hoeveelheid`) VALUES
(1, 1, 1, 75),
(2, 1, 2, 100),
(3, 1, 3, 0.25),
(4, 1, 4, 62.5),
(5, 1, 5, 62.5),
(6, 1, 6, 2.5),
(7, 1, 7, 15),
(8, 1, 8, 15),
(9, 2, 9, 7.5),
(10, 2, 10, 62.5),
(11, 2, 11, 5),
(12, 2, 6, 2.5),
(13, 2, 12, 62.5),
(14, 2, 13, 125),
(15, 2, 14, 18.75),
(16, 2, 15, 62.5),
(17, 2, 16, 2.5),
(18, 2, 3, 0.25),
(19, 2, 17, 0.25),
(20, 2, 18, 25),
(21, 2, 19, 62.5),
(22, 2, 20, 25),
(23, 3, 21, 26),
(24, 3, 22, 9),
(25, 3, 23, 0.1),
(26, 3, 24, 0.3),
(27, 3, 25, 25),
(28, 3, 26, 0.1),
(29, 3, 27, 0.1),
(30, 3, 28, 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE `ingredients` (
  `id` mediumint(9) NOT NULL,
  `eenheid` varchar(10) DEFAULT NULL,
  `ingredient` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `ingredients`
--

INSERT INTO `ingredients` (`id`, `eenheid`, `ingredient`) VALUES
(1, 'gr', 'pasta'),
(2, 'gr', 'kip'),
(3, '', 'ui'),
(4, 'ml', 'room'),
(5, 'gr', 'cherry tomaatjes'),
(6, 'ml', 'olijfolie'),
(7, 'gr', 'pijnboompitten'),
(8, 'gr', 'pesto'),
(9, 'gr', 'bloem'),
(10, 'ml', 'melk'),
(11, 'gr', 'boter'),
(12, 'gr', 'tomaten'),
(13, 'gr', 'rundergehakt'),
(14, 'ml', 'wijn'),
(15, 'ml', 'bouillon'),
(16, 'gr', 'selderij'),
(17, '', 'wortel'),
(18, 'gr', 'gran gusto'),
(19, 'gr', 'lasangebladen'),
(20, 'gr', 'mozzarella'),
(21, 'gr', 'Bastogne koeken'),
(22, 'gr', 'boter (gesmolten)'),
(23, 'blikje', 'gecondenseerde melk'),
(24, 'grote', 'bananen'),
(25, 'ml', 'slagroom'),
(26, 'zakje', 'slagroomversteviger'),
(27, 'blokje', 'pure chocolade'),
(28, 'ml', 'citroensap');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `method`
--

DROP TABLE IF EXISTS `method`;
CREATE TABLE `method` (
  `id` mediumint(9) NOT NULL,
  `bereidingswijze` text DEFAULT NULL,
  `recept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `method`
--

INSERT INTO `method` (`id`, `bereidingswijze`, `recept_id`) VALUES
(1, 'Snipper het uitje en fruit even aan in een scheutje olijfolie. Voeg de blokjes kip toe en bak ongeveer 5 minuten. Kook ondertussen de pasta gaar. Voeg de (zelfgemaakte) pesto en room toe aan de kip en roer goed door. Proef nog even of er nog peper of zout bij moet. Laat de pestosaus een paar minuutjes zachtjes pruttelen. Voeg dan de gekookte pasta toe en schep er doorheen. Halveer de tomaatjes en roer ook door de pasta pesto en verwarm nog een minuutje mee. Serveer de pasta pesto in de pan of op een bord met een handje rucola en de geroosterde pijnboompitten.<br><br>Tip: deze pasta pesto is ook lekker met geraspte kaas. Gebruik ook eens stukjes vegetarische kip voor een vegetarische variant op de kip pesto.', 1),
(2, 'Maak de tomatensaus in een grote pan.<br><br>\r\n\r\nHak daarvoor een ui heel fijn en fruit deze met enkele druppels olijfolie. Voeg de in vieren gesneden tomaten hieraan toe die je vooraf hebt gewassen en gepeld, en voeg een beetje peper en zout toe. Laat het ongeveer 2 uur sudderen op zacht vuur met het deksel half op de pan. Vergeet niet van tijd tot tijd te roeren en gaandeweg bouillon toe te voegen.<br><br>\r\n\r\nHak in de tussentijd de ui, de wortel en de selderij. Doe je gehakte groenten in een koekenpan om ze met een beetje olijfolie te bakken.<br><br>\r\n\r\nVoeg het rundergehakt en het varkensgehakt toe in de koekenpan met een teentje knoflook.<br><br>\r\n\r\nVoeg vervolgens de rode wijn toe en laat deze verdampen door de inhoud van de pan op hoog vuur te verwarmen. Zet apart.<br><br>\r\n\r\nMaak je bechamelsaus.<br><br>\r\n\r\nNeem de gesneden boter en laat deze gedurende 1 minuut in je magnetron smelten.<br><br>\r\n\r\nDoe in een andere kom de gesmolten boter met de bloem en meng het geheel. Doe er vervolgens de goed warme melk bij, roer het geheel goed en doe het opnieuw in de magnetron gedurende 1 minuut om de saus dik te laten worden. Breng je saus op smaak met enkele snufjes nootmuskaat en een beetje peper en zout.<br><br>\r\n\r\nVerwarm je oven voor en dompel de bladen lasagne in kokendheet water. Maak de Bolognesesaus af door de tomatensaus toe te voegen aan je mengsel van gehakt.<br><br>\r\n\r\nBedek de bodem van de lasagneschaal met een laag bakpapier.<br><br>\r\n\r\nBegin je gratinschaal te vullen met achtereenvolgens een laagje béchamel, de linten lasagne, de Bolognesesaus en kleine stukjes Mozzarella, enzovoort. Eindig met een laag Mozzarella en bestrooi het geheel met Gran Gusto van Galbani of een andere Italiaanse geraspte kaas zoals de Parmigiano Reggiano D.O.P. van Galbani, alsmede kleine stukjes boter.<br><br>\r\n\r\nDoe je schaal gedurende 40 minuten in de oven op 200°C.<br><br>\r\n\r\nEet de lasagne vergezeld van een groene salade. Eet smakelijk!', 2),
(3, 'Begin 3 uur van tevoren met het maken van de dulce de leche. Leg het blikje gecondenseerde melk in een pannetje met zacht kokend water. Kook dit ca. 3 uur. De melk wordt dan karamelachtig en bruin, ook wel dulce de leche genoemd. Let er op dat je de gecondenseerde melk mét suiker gebruikt. Heb je een andere? Lees dan de tip onderaan dit recept. <br>\r\nMaal de bastognekoeken helemaal fijn in de keukenmachine. Doe in een kom en voeg de gesmolten boter toe en meng door elkaar. Verdeel het bakpapier over de bodem van de taartvorm. Vet de randen in met wat extra boter. Verdeel de bastognekruimels erover en druk met de bolle kant van een lepel goed aan. Duw ook de randen iets omhoog. Zet de vorm in de koelkast. <br>\r\nAls je het blikje met de dulce de leche uit het water hebt gehaald laat je deze staan zodat je je niet verbrand als je hem openmaakt. Maak het blikje voorzichtig open en roer de dulce de leche even door. Als er klontjes in zitten kun je deze in een kom eruit mixen of kloppen met een garde. <br>\r\nVerdeel het karamelmengsel over de Bastognebodem (bewaar eventueel 1 à 2 eetlepels voor de garnering). Snijd de bananen in plakjes en besprenkel met een beetje citroensap tegen het verkleuren. Verdeel de bananen over de taart. Klop de slagroom stijf met de slagroomversteviger en verdeel over de taart. Laat de randen een beetje vrij zodat je de banaan goed ziet. <br>\r\nVerdeel op het laatst eventueel een beetje extra dulce de leche over de slagroom en rasp er wat pure chocolade over. Serveer direct of bewaar in de koelkast. <br>\r\nJe kunt deze banoffee taart maximaal 2 à 3 dagen bewaren in de koelkast. <br>\r\n<br>\r\nTip: De dulce de leche moet vloeibaar genoeg zijn om het te schenken. Heb je het idee dat het veel te vloeibaar is, probeer dan het volgende. Kook de dulce de leche volgens de bereiding en giet het daarna over in een pan met dikke bodem met 1 eetlepel (poeder)suiker. Blijf roeren tot het indikt tot een dikte waarbij het nog net mogelijk is om het te schenken. Dit kan een paar minuten duren.\r\n', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE `recipes` (
  `id` mediumint(9) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `land` varchar(100) DEFAULT NULL,
  `soort` varchar(100) NOT NULL,
  `bereidingstijd_minuten` int(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `recipes`
--

INSERT INTO `recipes` (`id`, `naam`, `land`, `soort`, `bereidingstijd_minuten`, `image_url`) VALUES
(1, 'Pasta pesto met kip', 'Italië', 'Hoofdgerecht', 25, 'https://www.leukerecepten.nl/wp-content/uploads/2022/07/Pasta-met-kip-pesto-recept.jpg'),
(2, 'De echte lasagne', 'Italië', 'Hoofdgerecht', 170, 'https://www.galbani.be/wp-content/uploads/2020/06/shutterstock_142426168-scaled-1-1024x500.jpg'),
(3, 'Banoffee taart', 'Engeland', 'Gebak', 210, 'https://www.leukerecepten.nl/wp-content/uploads/2021/10/banoffee-taart.jpg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `ingrec`
--
ALTER TABLE `ingrec`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `ingrec`
--
ALTER TABLE `ingrec`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT voor een tabel `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT voor een tabel `method`
--
ALTER TABLE `method`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
