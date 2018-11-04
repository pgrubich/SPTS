-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Lis 2018, 11:51
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza_trenerow`
--

DELIMITER $$
--
-- Procedury
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `search` (`input` VARCHAR(49))  BEGIN

( SELECT t.id, t.name, t.surname, t.gender, t.phone, t.email, t.description, t.rating FROM trainers t
WHERE 	t.gender LIKE Concat(Concat('%',input),'%')
		OR t.description LIKE Concat(Concat('%',input),'%')
GROUP BY t.id )
UNION
( SELECT t.id, t.name, t.surname, t.gender, t.phone, t.email, t.description, t.rating FROM (SELECT td.trainer_id, td.discipline_url_name FROM trainers_disciplines td ) tdis
INNER JOIN trainers t ON tdis.trainer_id = t.id
WHERE tdis.discipline_url_name LIKE Concat(Concat('%',input),'%')
GROUP BY t.id )
UNION
( SELECT t.id, t.name, t.surname, t.gender, t.phone, t.email, t.description, t.rating from trainers_location tl INNER JOIN trainers t ON tl.trainer_id = t.id
WHERE tl.city LIKE Concat(Concat('%',input),'%')
GROUP BY t.id )
UNION
( SELECT t.id, t.name, t.surname, t.gender, t.phone, t.email, t.description, t.rating FROM trainers_places tp INNER JOIN trainers t ON tp.trainer_id = t.id
WHERE tp.place LIKE Concat(Concat('%',input),'%')
GROUP BY t.id );
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `term_orders`
--

CREATE TABLE `term_orders` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `training_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `surname` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `gender` enum('K','M') COLLATE utf8_polish_ci DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `facebook` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `instagram` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `description` varchar(512) COLLATE utf8_polish_ci DEFAULT NULL,
  `rating` double NOT NULL DEFAULT '0',
  `avatar` varchar(250) COLLATE utf8_polish_ci DEFAULT NULL,
  `registerDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `profile_picture_id` int(11) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `surname`, `password`, `gender`, `bdate`, `phone`, `email`, `facebook`, `instagram`, `description`, `rating`, `avatar`, `registerDate`, `remember_token`) VALUES
(1, 'Anna', 'Kowalska', 'annakowalska', 'K', NULL, 567567567, 'akowalska@gmail.com', NULL, NULL, 'Jestem trenerka fitness.', 0, NULL, '2018-05-01 22:03:52', NULL),
(2, 'Jakub', 'Kowal', 'jakubkowal', 'M', NULL, 123123123, 'jakubkowal@wp.pl', NULL, NULL, 'Jestem trenerem personalnym', 0, NULL, '2018-05-01 22:03:52', NULL),
(3, 'Adam', 'Micniewicz', 'adammicniewicz', 'M', NULL, 457234098, 'adammicniewicz@wp.pl', NULL, NULL, 'Zapraszam.', 0, NULL, '2018-05-01 22:03:52', NULL),
(4, 'Karolina', 'Wożniak', 'karolinawozniak', 'K', NULL, 439394024, 'karolinawozniak', NULL, NULL, 'Jestem instruktorka jogi.', 0, NULL, '2018-05-01 22:03:52', NULL),
(5, 'Marcin', 'Wiern', 'marcinwiern', 'M', NULL, 676676676, 'marcinwiern@gmail.com', NULL, NULL, 'Trener piłki nożnej.', 0, NULL, '2018-05-01 22:03:52', NULL),
(6, 'Damian', 'Szymula', '$2y$10$Lhj/1NRzkoCtj4yJZUunIOeTvWQTT1tDehtbk.6Wsk8Wh1kc8DGr2', 'M', '1996-03-10', 881291088, 'lookszym@gmail.com', 'iamlike', 'iamlike', 'Przykładowy opis trenera.', 0, NULL, '2018-05-22 10:17:30', 'F7UwGbn0xg70WYknzGFL82qtF7EqwrPyTISN689S4AWCy0E1GrFbBPeLNESr'),
(7, NULL, NULL, '$2y$10$hDPf4Owd17Mtof0jwspQuOVJngqmcXSbUWn/8nTaMLBGKzW4JN5r2', NULL, NULL, NULL, 'email1@mail.com', NULL, NULL, NULL, 0, NULL, '2018-06-28 11:20:07', 'O2ZLm4iPAInXzJFlHp0D919ESPScxZ1t5JFSaWG7OQPR4H3nW400yVdhXFeM');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trainers_certificates`
--

CREATE TABLE `trainers_certificates` (
  `id` int(11) NOT NULL,
  `name_of_institution` varchar(70) COLLATE utf8_polish_ci NOT NULL,
  `name_of_course` varchar(70) COLLATE utf8_polish_ci NOT NULL,
  `begin_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `trainer_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trainers_certificates`
--

INSERT INTO `trainers_certificates` (`id`, `name_of_institution`, `name_of_course`, `begin_date`, `end_date`, `trainer_id`, `updated_at`, `created_at`) VALUES
(1, 'Akademia Trenerow Fitness', 'Instruktor Fitness', '2007-10-07', '2007-12-05', 1, '2018-05-28 23:35:42', '2018-05-28 23:35:42'),
(2, 'Akademia Trenerow Personalnych', 'Trener personalnyc', '2015-08-01', '2016-03-10', 2, '2018-05-28 23:35:42', '2018-05-28 23:35:42'),
(3, 'Akademia Dietetykow ', 'Dietetyka', '2014-08-04', '2014-08-30', 2, '2018-05-28 23:35:42', '2018-05-28 23:35:42'),
(4, 'Akademia Trenerow Personalnych', 'Trener personalnyc', '2015-08-01', '2016-03-10', 3, '2018-05-28 23:35:42', '2018-05-28 23:35:42'),
(5, 'Akademia Jogi', 'Instruktor Jogi', '2017-10-01', '2018-03-01', 4, '2018-05-28 23:35:42', '2018-05-28 23:35:42'),
(6, 'Akademia Pilki Nożnej', 'Trener Piłki Nożnej', '2018-01-15', '2018-03-05', 5, '2018-05-28 23:35:42', '2018-05-28 23:35:42'),
(7, 'UAM Poznan', 'Tennis', '2018-06-12', '2018-06-14', 6, '2018-06-27 20:43:59', '2018-05-28 21:36:46'),
(8, 'AWF', 'Tennis stołowy', '2018-05-07', '2018-05-28', 6, '2018-06-27 20:44:43', '2018-05-31 20:42:12');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trainers_disciplines`
--

CREATE TABLE `trainers_disciplines` (
  `id` int(11) NOT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `discipline_name` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `discipline_url_name` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trainers_disciplines`
--

INSERT INTO `trainers_disciplines` (`id`, `trainer_id`, `discipline_name`, `discipline_url_name`, `updated_at`, `created_at`) VALUES
(1, 2, 'Trener personalny', 'trener_personalny', '2018-06-28 00:43:41', '2018-06-28 00:44:08'),
(2, 3, 'Trener personalny', 'trener_personalny', '2018-06-28 00:43:41', '2018-06-28 00:44:08'),
(3, 4, 'Joga', 'joga', '2018-06-28 00:43:41', '2018-06-28 00:44:08'),
(4, 5, 'Piłka nożna', 'piłka_nożna', '2018-06-28 00:43:41', '2018-06-28 00:44:08'),
(24, 7, 'Joga', 'joga', '2018-06-28 09:24:37', '2018-06-28 09:24:37'),
(25, 6, 'Joga', 'joga', '2018-06-28 09:26:18', '2018-06-28 09:26:18'),
(26, 6, 'Koszykówka', 'koszykówka', '2018-06-28 09:26:18', '2018-06-28 09:26:18'),
(27, 6, 'Piłka nożna', 'piłka_nożna', '2018-06-28 09:26:18', '2018-06-28 09:26:18');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trainers_location`
--

CREATE TABLE `trainers_location` (
  `id` int(11) NOT NULL,
  `city` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `voivodeship` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trainers_location`
--

INSERT INTO `trainers_location` (`id`, `city`, `voivodeship`, `trainer_id`, `updated_at`, `created_at`) VALUES
(1, 'Poznań', 'Wielkopolskie', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Poznań', 'Wielkopolskie', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Poznań', 'Wielkopolskie', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Poznań', 'Wielkopolskie', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Poznań', 'Wielkopolskie', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Poznań', 'Wielkopolskie', 6, '2018-05-29 08:04:04', '2018-05-29 08:04:04');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trainers_offers`
--

CREATE TABLE `trainers_offers` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `price` float DEFAULT NULL,
  `max_no_of_clients` int(11) NOT NULL DEFAULT '1',
  `trainer_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trainers_offers`
--

INSERT INTO `trainers_offers` (`id`, `name`, `price`, `max_no_of_clients`, `trainer_id`, `updated_at`, `created_at`) VALUES
(1, 'Trening indywidualny', 50, 1, 3, '2018-05-29 00:35:20', '2018-05-29 00:35:20'),
(2, 'Trening grupowy', 15, 4, 3, '2018-05-29 00:35:20', '2018-05-29 00:35:20'),
(3, 'Trening indywidualny', 100, 1, 1, '2018-05-29 00:35:20', '2018-05-29 00:35:20'),
(4, 'Trening indywidualny', 50, 1, 4, '2018-05-29 00:35:20', '2018-05-29 00:35:20'),
(5, 'indywidualne', 120, 1, 6, '2018-06-27 20:56:23', '2018-05-28 22:36:27');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trainers_opinions`
--

CREATE TABLE `trainers_opinions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(512) COLLATE utf8_polish_ci DEFAULT NULL,
  `rating` double NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trainers_opinions`
--

INSERT INTO `trainers_opinions` (`id`, `name`, `surname`, `email`, `description`, `rating`, `trainer_id`, `updated_at`, `created_at`) VALUES
(1, 'Łukasz', 'Szymula', 'lookszym@gmail.com', 'Super', 4, 5, '2018-05-23 22:19:30', '2018-05-23 22:19:30'),
(2, 'kkk', 'kkk', 'kkk@k.k', 'kkkkkkkkkk', 3, 5, '2018-05-24 08:48:28', '2018-05-24 08:48:28'),
(3, 'Adam', 'Kowalski', 'Kowalski@wp.pl', 'l', 2, 5, '2018-05-24 08:55:37', '2018-05-24 08:55:37'),
(4, 'Damian', 'Kawka', 'kawka@wp.pl', 'Polecam zajęcia.', 5, 6, '2018-05-28 22:22:28', '2018-05-28 22:22:28'),
(5, 'Łukasz', 'Szymula', 'lookszym@gmail.com', 'Super', 3, 4, '2018-05-29 07:48:39', '2018-05-29 07:48:39'),
(6, 'Anna', 'Groch', 'agroch@wp.pl', 'Super.', 5, 6, '2018-05-29 08:07:46', '2018-05-29 08:07:46'),
(7, 'Damian', 'Kawka', 'kaka@wp.pl', 'okokok', 4, 4, '2018-05-29 08:20:33', '2018-05-29 08:20:33'),
(8, 'Łukasz Szymula', 'Szymula', 'lukasz.szymula@icloud.com', 'ugkjgjjjjjjjjjjjjjjj', 5, 4, '2018-08-30 17:37:37', '2018-08-30 17:37:37'),
(9, 'Łukasz Szymula', 'Szymula', 'lukasz.szymula@icloud.com', 'fudjfufyfy77777', 5, 4, '2018-08-30 17:37:52', '2018-08-30 17:37:52');


-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trainers_photos`
--

CREATE TABLE `trainers_photos` (
  `id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `photo_name` varchar(250) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trainers_places`
--

CREATE TABLE `trainers_places` (
  `id` int(10) UNSIGNED NOT NULL,
  `place` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trainers_places`
--

INSERT INTO `trainers_places` (`id`, `place`, `trainer_id`) VALUES
(1, 'FITzone', 1),
(2, 'McFit', 2),
(3, 'Fabryka Formy', 3),
(4, 'Vintaya', 4),
(5, 'INEA Stadion', 5),
(6, 'Slodkiewicz Gym', 3),
(7, 'Fabryka Formy', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trainers_trainings_dates`
--

CREATE TABLE `trainers_trainings_dates` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `begin_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` varchar(10) COLLATE utf8_polish_ci NOT NULL DEFAULT 'wolne',
  `place` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trainers_trainings_dates`
--

INSERT INTO `trainers_trainings_dates` (`id`, `date`, `begin_time`, `end_time`, `status`, `place`, `trainer_id`) VALUES
(1, '2018-10-24', '10:00:00', '11:30:00', 'zajęte', 'McFit Poznań', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trainers_universities`
--

CREATE TABLE `trainers_universities` (
  `id` int(11) NOT NULL,
  `university` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `course` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `degree` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `begin_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `trainer_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trainers_universities`
--

INSERT INTO `trainers_universities` (`id`, `university`, `course`, `degree`, `begin_date`, `end_date`, `trainer_id`, `updated_at`, `created_at`) VALUES
(1, 'AWF Poznań', 'Sport', 'magister', '2010-10-01', '2015-06-30', 1, '2018-05-29 00:15:30', '2018-05-29 00:15:30'),
(2, 'AWF Poznan', 'Sport', 'licencjat', '2013-10-01', '2016-06-30', 2, '2018-05-29 00:15:30', '2018-05-29 00:15:30'),
(3, 'AWF Poznań', 'Fizjoterapia', 'magister', '2009-10-01', '2014-06-30', 4, '2018-05-29 00:15:30', '2018-05-29 00:15:30'),
(4, 'AWF Poznan', 'Turystyka', 'licencjat', '2015-10-01', '2018-05-31', 6, '2018-06-27 20:48:03', '2018-05-28 22:19:11');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `term_orders`
--
ALTER TABLE `term_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `training_id_idx` (`training_id`);

--
-- Indeksy dla tabeli `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indeksy dla tabeli `trainers_certificates`
--
ALTER TABLE `trainers_certificates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `trainer_id_idx` (`trainer_id`);

--
-- Indeksy dla tabeli `trainers_disciplines`
--
ALTER TABLE `trainers_disciplines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `trainer_id_idx` (`trainer_id`);

--
-- Indeksy dla tabeli `trainers_location`
--
ALTER TABLE `trainers_location`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `trainer_id_idx` (`trainer_id`);

--
-- Indeksy dla tabeli `trainers_offers`
--
ALTER TABLE `trainers_offers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `trainer_id_idx` (`trainer_id`);

--
-- Indeksy dla tabeli `trainers_opinions`
--
ALTER TABLE `trainers_opinions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainer_id_idx` (`trainer_id`);

--
-- Indeksy dla tabeli `trainers_photos`
--
ALTER TABLE `trainers_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainer_id` (`trainer_id`);

--
-- Indeksy dla tabeli `trainers_places`
--
ALTER TABLE `trainers_places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainer_id_idx` (`trainer_id`);

--
-- Indeksy dla tabeli `trainers_trainings_dates`
--
ALTER TABLE `trainers_trainings_dates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `trainer_id_idx` (`trainer_id`);

--
-- Indeksy dla tabeli `trainers_universities`
--
ALTER TABLE `trainers_universities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `trainer_id_idx` (`trainer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `term_orders`
--
ALTER TABLE `term_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `trainers_certificates`
--
ALTER TABLE `trainers_certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `trainers_disciplines`
--
ALTER TABLE `trainers_disciplines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `trainers_location`
--
ALTER TABLE `trainers_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `trainers_offers`
--
ALTER TABLE `trainers_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `trainers_opinions`
--
ALTER TABLE `trainers_opinions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `trainers_places`
--
ALTER TABLE `trainers_places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `trainers_trainings_dates`
--
ALTER TABLE `trainers_trainings_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `trainers_universities`
--
ALTER TABLE `trainers_universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `term_orders`
--
ALTER TABLE `term_orders`
  ADD CONSTRAINT `to_training_id` FOREIGN KEY (`training_id`) REFERENCES `trainers_trainings_dates` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `trainers_certificates`
--
ALTER TABLE `trainers_certificates`
  ADD CONSTRAINT `c_trainer_id` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `trainers_disciplines`
--
ALTER TABLE `trainers_disciplines`
  ADD CONSTRAINT `d_trainer_id` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `trainers_location`
--
ALTER TABLE `trainers_location`
  ADD CONSTRAINT `l_trainer_id` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `trainers_offers`
--
ALTER TABLE `trainers_offers`
  ADD CONSTRAINT `o_trainer_id` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `trainers_opinions`
--
ALTER TABLE `trainers_opinions`
  ADD CONSTRAINT `op_trainer_id` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `trainers_photos`
--
ALTER TABLE `trainers_photos`
  ADD CONSTRAINT `trainers_photos_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`);

--
-- Ograniczenia dla tabeli `trainers_places`
--
ALTER TABLE `trainers_places`
  ADD CONSTRAINT `p_trainer_id` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `trainers_trainings_dates`
--
ALTER TABLE `trainers_trainings_dates`
  ADD CONSTRAINT `ttd_trainer_id` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `trainers_universities`
--
ALTER TABLE `trainers_universities`
  ADD CONSTRAINT `u_trainer_id` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
