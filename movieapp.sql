-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Máj 23. 17:32
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `movieapp`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `movies`
--

CREATE TABLE `movies` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Year` int(11) NOT NULL,
  `Director` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `movies`
--

INSERT INTO `movies` (`Id`, `Title`, `Year`, `Director`) VALUES
(9, 'Harry Potter and the Prisoner of Azkaban', 2004, 'Affonso Cuarón'),
(10, 'Harry Potter and the Goblet of Fire', 2005, 'MIke Newell'),
(13, 'Harry Potter and the Chamber of Secrets', 2002, 'Chris Columbus');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `role`) VALUES
(6, 'Teszt4', '$2y$10$xIs7fboqdZSIIo456e1Ol.M3At5GKaa46BiNmMpgsgLe6R7P4HY6u', 'normal'),
(7, 'Sári', '$2y$10$UKwCN/V7Rta2F/WbnFol4.F.y124OSTWLpDD0kLAVGTbJU.QBXvB6', 'admin'),
(8, 'Cica', '$2y$10$AjT7M63tLUCCXkc4vve3realaJXyOuIezKytN5qDYfzpKFUnoIMRK', 'moderator'),
(9, 'Teszt', '$2y$10$W.WBLnXA7Y7/0so7PmlDbOHZocuk4YTfDISSPcYrCTHF6TQWkqhQ6', 'moderator');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`Id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `movies`
--
ALTER TABLE `movies`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
