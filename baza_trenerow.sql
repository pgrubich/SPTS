-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Lis 2018, 14:51
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
  `remember_token` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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
-- Struktura tabeli dla tabeli `trainers_opinions`
--

CREATE TABLE `trainers_opinions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(512) COLLATE utf8_polish_ci DEFAULT NULL,
  `rating` double NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT dla tabeli `trainers_location`
--
ALTER TABLE `trainers_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `trainers_offers`
--
ALTER TABLE `trainers_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `trainers_opinions`
--
ALTER TABLE `trainers_opinions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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