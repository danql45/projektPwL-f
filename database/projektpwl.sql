-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Czas generowania: 12 Cze 2020, 10:51
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projektpwl`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_okazja` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `comment`
--

INSERT INTO `comment` (`id_comment`, `id_okazja`, `name`, `comment`) VALUES
(1, 36, 'Your Name', 'Enter A Comment'),
(2, 36, 'stachu', 'asdasdasd'),
(3, 36, 'sdas', '1234'),
(6, 38, 'inne', 'no'),
(7, 38, 'no', 'ta'),
(9, 38, 'Jaś', 'Interpolacja jest to metoda numeryczna, która polega na wyznaczaniu przybliżonych wartości tzw. funkcji interpolacyjnej w danym przedziale, która przyjmuje z góry zadane wartości, w ustalonych punktach nazywanych węzłami. Stwierdzono, że funkcja ta jest zadaniem odwrotnym do tablicowania funkcji. Głównym zastosowanie tej funkcji uproszczenie skomplikowanych funkcji, np. całkowanie numeryczne lub w naukach doświadczalnych, gdy mamy skończoną liczbę danych a chcemy określić zależności między nimi.\r\n\r\nWęzeł funkcji - argument funkcji, dla którego znana nam jest wartość funkcji. W praktyce skończony zbiór węzłów jest zbiorem argumentów, dla których wyznaczono wartości nieznanej funkcji (będącej np. funkcją zależności mocy silnika, od wartości wychylenia wirnika). (Fortuna Z., Macukow B., Wąsowski J., 2017, str. 24 - 25)'),
(10, 39, 'Gienio', 'Super Pendrive'),
(12, 39, 'Henio', 'Polecam');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `nazwa` varchar(255) NOT NULL,
  `image_dir` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `images`
--

INSERT INTO `images` (`id_image`, `nazwa`, `image_dir`) VALUES
(1, 'brak_zdjecia', 'https://sina.salek.ws/sites/default/files/imagefield_default_images/nophoto.jpg'),
(2, 'foto', 'https://pl.wiktionary.org/wiki/banan%C4%83#/media/Plik:Banana-Single.jpg'),
(3, 'foto', 'https://pl.wiktionary.org/wiki/banan%C4%83#/media/Plik:Banana-Single.jpg'),
(4, 'foto', 'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80'),
(5, 'foto', 'https://a.allegroimg.com/s400/114785/d392ae0749e4a4b54e109e5d4174/Xiaomi-Redmi-8-EU-4-64GB-Dual-SIM-Onyx-Black'),
(6, 'foto', '11'),
(7, 'foto', '11'),
(8, 'foto', '11'),
(9, 'foto', '11'),
(10, 'foto', '11'),
(11, 'foto', '99'),
(12, 'foto', '99'),
(13, 'foto', '99'),
(14, 'foto', '99'),
(15, 'foto', '55'),
(16, 'foto', 'https://static.pepper.pl/live_pl/threads/thread_full_screen/default/270232_1.jpg'),
(17, 'foto', 'https://static.pepper.pl/live_pl/threads/thread_large/default/270099_1.jpg'),
(18, 'foto', 'https://sina.salek.ws/sites/default/files/imagefield_default_images/nophoto.jpg'),
(19, 'foto', 'https://static.pepper.pl/live_pl/threads/thread_large/default/263047_1.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_okazja` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `likes`
--

INSERT INTO `likes` (`id`, `id_okazja`) VALUES
(1, 34);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `okazja`
--

CREATE TABLE `okazja` (
  `id_okazja` int(11) NOT NULL,
  `id_uzytkownik` int(11) NOT NULL,
  `id_image` int(11) NOT NULL,
  `cena_okazja` decimal(11,2) DEFAULT NULL,
  `tytul_okazja` varchar(45) DEFAULT NULL,
  `opis_okazja` varchar(1000) DEFAULT NULL,
  `link_okazja` varchar(45) DEFAULT NULL,
  `data_dodania` datetime NOT NULL,
  `ile_like` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `okazja`
--

INSERT INTO `okazja` (`id_okazja`, `id_uzytkownik`, `id_image`, `cena_okazja`, `tytul_okazja`, `opis_okazja`, `link_okazja`, `data_dodania`, `ile_like`) VALUES
(34, 1, 5, '1543.00', 'Xiaomi redmi note 3', 'Redmi 8 zaprojektowany zgodnie z filozofią Aura robi krok naprzód dzięki nowemu wzorowi fali z tyłu telefonu. Obudowa smartfona wygląda stylowo, zapewniając jednocześnie doskonałą przyczepność i ochronę przed odciskami palców. Ponadto telefon jest wyposażony w nanopowłokę P2i, dzięki czemu urządzenie jest bryzgoszczelne, co chroni go przed przypadkowym rozlaniem. Ekran Xiaomi Redmi 8a o nienagannej konstrukcji Dot Notch to 6,2 calowy wyświetlacz 720p+ chroniony szkłem Corning Gorilla Glass 5 z niewielkim wcięciem, w którym ulokowano 8.0Mpix aparat do selfie.', 'https://archiwum.allegro.pl/oferta/xiaomi-red', '2020-06-05 22:07:36', 9),
(36, 1, 16, '1099.00', 'Telewizor 50\" Thomson 50UD6306, 4K UltraHD', 'W Carrefour od 9.06 do 20.06 dostÄ™pny bÄ™dzie telewizor Thomson 50\" za 1099zÅ‚. PrzekÄ…tna ekranu: 50\'\' LED RozdzielczoÅ›Ä‡ obrazu: 4K UHD 3840 x 2160 Klasa efektywnoÅ›ci energetycznej: A+ ZÅ‚Ä…cza: 3xHDMI, 2xUSB OdÅ›wieÅ¼anie: Picture Performance Index (PPI) 1200 Procesor: Pure Image Ultra HD HDR: tak JasnoÅ›Ä‡ (cd/m2): 310 Cechy obrazu: Skalowanie obrazu do UHD, UHD Color Extender, Cyfrowa redukcja szumÃ³w, Tryb filmowy, Micro Dimming Funkcje Smart TV: Netflix, YouTube, Aplikacje, Media spoÅ‚ecznoÅ›ciowe, PrzeglÄ…darka internetowa Tuner DVB: DVB-T2, DVB-C, DVB-S2, Analogowy Dodatkowe funkcje: WyÅ›wietlane na ekranie, Funkcja pilota - smartfon; tablet, WielojÄ™zyczne menu, USB multimedia, Napisy, Tryb Gry, Tryb Sport PobÃ³r mocy w trybie wÅ‚Ä…czenia (W): 71 Roczne zuÅ¼ycie energii (kWh): 104 Gwarancja: 2 lata', 'https://www.pepper.pl/promocje/carrefour.pl', '2020-06-06 08:50:32', 8),
(37, 1, 17, '2174.00', 'KFA2 GeForce RTX 2070 SUPER EX (1-Click OC)', 'SzukajÄ…c karty graficznej trafiÅ‚em na tÄ… ofertÄ™. RozwaÅ¼aÅ‚em wziÄ™cie MSI RX 5700 Gaming X z innej oferty ale ta wydajÄ™ mi siÄ™ atrakcyjniejsza w kontekÅ›cie ceny do jakoÅ›ci. Z recenzji wynika, Å¼e to caÅ‚kiem dobra karta i nie ma siÄ™ czego wstydziÄ‡ wzglÄ™dem topowych konstrukcji od MSI czy Gigabyte. Cena regularna wziÄ™ta z drugiej najniÅ¼szej oferty na ceneo - ta z okazji jest pierwsza. Sklep potwierdziÅ‚ moje zamÃ³wienie takÅ¼e mieli przynajmniej jednÄ… na stanie.', 'https://www.krsystem.pl/kfa2_geforce_rtx_2070', '2020-06-06 09:37:18', 6),
(38, 1, 18, '55.00', 'czy działa?', 'nie wiem', 'http://google.pl', '2020-06-06 09:57:33', 9),
(39, 1, 19, '129.99', 'Kingston DataTraveler 106 256GB USB 3.1', 'Pendrive z dobrymi opiniami w sklepie RTV euro AGD. Darmowa dostawa.', 'https://www.euro.com.pl/pendrive-pamieci-usb/', '2020-06-11 21:47:58', 10),
(40, 1, 1, '33.00', 'Testszer', 'Test szerokosci', 'https://www.google.pl/', '2020-06-11 23:39:47', 26);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id_uzytkownik` int(11) NOT NULL,
  `typ_uzytkownik` int(11) DEFAULT NULL,
  `imie` varchar(45) DEFAULT NULL,
  `nazwisko` varchar(45) DEFAULT NULL,
  `e_mail` varchar(45) NOT NULL,
  `loginn` varchar(45) DEFAULT NULL,
  `pass_SHA512` char(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id_uzytkownik`, `typ_uzytkownik`, `imie`, `nazwisko`, `e_mail`, `loginn`, `pass_SHA512`) VALUES
(1, 1, 'Daniel', 'Dmitruk', 'danql1996@gmail.com', 'admin', 'admin'),
(2, 2, 'Jan', 'Kowalski', 'kowalski@kowalski.pl', 'test', 'test'),
(4, 2, 'Jaś', 'Fasola', 'jas@fasola.pl', '0000', '0000');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `fk_comment_Okazja1_idx` (`id_okazja`);

--
-- Indeksy dla tabeli `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`),
  ADD UNIQUE KEY `id_image_UNIQUE` (`id_image`);

--
-- Indeksy dla tabeli `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_like_Okazja1_idx` (`id_okazja`);

--
-- Indeksy dla tabeli `okazja`
--
ALTER TABLE `okazja`
  ADD PRIMARY KEY (`id_okazja`),
  ADD UNIQUE KEY `id_okazja_UNIQUE` (`id_okazja`),
  ADD KEY `fk_Okazja_Uzytkownik_idx` (`id_uzytkownik`),
  ADD KEY `fk_Okazja_images1_idx` (`id_image`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id_uzytkownik`),
  ADD UNIQUE KEY `id_uzytkownik_UNIQUE` (`id_uzytkownik`),
  ADD UNIQUE KEY `e_mail_UNIQUE` (`e_mail`),
  ADD UNIQUE KEY `login_UNIQUE` (`loginn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `okazja`
--
ALTER TABLE `okazja`
  MODIFY `id_okazja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id_uzytkownik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
