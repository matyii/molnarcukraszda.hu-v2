-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Már 08. 22:00
-- Kiszolgáló verziója: 5.7.17
-- PHP verzió: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `molnarcukraszda`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `items` text CHARACTER SET utf8mb4,
  `price` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tábla szerkezet ehhez a táblához `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permission_level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `permission_level`) VALUES
(1, 'Regular user', 0),
(2, 'Order moderator', 1),
(3, 'Admin', 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ingredients` text COLLATE utf8mb4_unicode_ci,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allergens` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `ingredients`, `size`, `price`, `allergens`, `type`) VALUES
(1, 'Csokoládétorta', 'assets/img/products/cakes/1.jpg', 'Csokoládé, Tojás, Cukor, Liszt', 'Átmérő 24 cm', '20€', 'Tojás, Glutén', 'cakes'),
(2, 'Fekete-erdő torta', 'assets/img/products/cakes/2.jpg', 'Meggy, Tejszín, Tojás, Cukor, Liszt', 'Átmérő 20 cm', '20€', 'Meggy, Tojás, Glutén', 'cakes'),
(3, 'Gyümölcstorta', 'assets/img/products/cakes/3.jpg', 'Gyümölcsök (Eper, Málna, Szeder, Áfonya), Tojás, Cukor, Liszt', 'Átmérő 26 cm', '30€', 'Eper, Áfonya, Szeder, Málna, Tojás, Glutén', 'cakes'),
(4, 'Mogyorós-karamelltorta', 'assets/img/products/cakes/4.jpg', 'Mogyoró, Karamell, Tojás, Cukor, Liszt', 'Átmérő 22 cm', '32€', 'Mogyoró, Tojás, Glutén', 'cakes'),
(5, 'Málnás tiramisu torta', 'assets/img/products/cakes/5.jpg', 'Kávé, Málna, Tejszín, Tojás, Cukor, Liszt', 'Átmérő 24 cm', '25€', 'Málna, Tej, Tojás, Glutén', 'cakes'),
(6, 'Diótorta', 'assets/img/products/cakes/6.jpg', 'Dió, Tojás, Cukor, Liszt', 'Átmérő 20 cm', '20€', 'Dió, Tojás, Glutén', 'cakes'),
(7, 'Citromos máktorta', 'assets/img/products/cakes/7.jpg', 'Mák, Citrom, Tojás, Cukor, Liszt', 'Átmérő 26 cm', '30€', 'Mák, Citrom, Tojás, Glutén', 'cakes'),
(8, 'Málnás-csokis torta', 'assets/img/products/cakes/8.jpg', 'Málna, Csokoládé, Tojás, Cukor, Liszt', 'Átmérő 22 cm', '25€', 'Málna, Tojás, Glutén', 'cakes'),
(9, 'Ferrero Rocher torta', 'assets/img/products/cakes/9.jpg', 'Mogyoró, Csokoládé, Tojás, Cukor, Liszt', 'Átmérő 24 cm', '32€', 'Mogyoró, Tojás, Glutén', 'cakes'),
(10, 'Vörös bársony torta', 'assets/img/products/cakes/10.jpg', 'Kakaó, Vanília kivonat, Tejföl,Tojás, Cukor, Liszt', 'Átmérő 26 cm', '35€', 'Vanília, Tej,Tojás, Glutén', 'cakes'),
(11, 'Epertorta', 'assets/img/products/cakes/11.jpg', 'Eper, Tejszín, Tojás, Cukor, Liszt', 'Átmérő 26 cm', '35€', 'Eper, Tej, Tojás, Glutén', 'cakes'),
(12, 'Fehércsokoládés sajttorta', 'assets/img/products/cakes/12.jpg', 'Fehércsokoládé, Krémsajt, Tejszín, Tojás, Cukor, Liszt', 'Átmérő 26 cm', '35€', 'Tej, Tojás, Glutén', 'cakes'),
(13, 'Jegeskávé', 'assets/img/products/coffees/1.jpg', 'Kávé, Jég, Tej', '250 ml', '4.5€', 'Tej', 'coffee'),
(14, 'Espresso', 'assets/img/products/coffees/2.jpg', 'Kávé', '20 ml', '3.5€', 'Nincs', 'coffee'),
(15, 'Karamellás kávé', 'assets/img/products/coffees/3.jpg', 'Kávé, Karamell, Tej', '350 ml', '5€', 'Tej', 'coffee'),
(16, 'Cappuccino', 'assets/img/products/coffees/4.jpg', 'Cappuccino por, Tej', '250 ml', '4€', 'Tej', 'coffee'),
(17, 'Karamellás macchiato', 'assets/img/products/coffees/5.jpg', 'Kávé, Karamell, Tej', '200 ml', '5€', 'Tej', 'coffee'),
(18, 'Vaníliás latte macchiato', 'assets/img/products/coffees/6.jpg', 'Kávé, Vanília, Tej', '200 ml', '5€', 'Vanília, Tej', 'coffee'),
(19, 'Mogyorós kávé', 'assets/img/products/coffees/7.jpg', 'Kávé, Mogyoró, Tej', '250 ml', '5.5€', 'Mogyoró, Tej', 'coffee'),
(20, 'Kókuszos kávé', 'assets/img/products/coffees/8.jpg', 'Kávé, Kókusz, Tej', '250 ml', '5€', 'Kókusz, Tej', 'coffee'),
(21, 'Fahéjas kávé', 'assets/img/products/coffees/9.jpg', 'Kávé, Fahéj, Tej', '100 ml', '3.5€', 'Tej', 'coffee'),
(22, 'Csokoládés kávé', 'assets/img/products/coffees/10.jpg', 'Kávé, Csokoládé, Tej', '250 ml', '5€', 'Tej', 'coffee'),
(23, 'Narancsos jegeskávé', 'assets/img/products/coffees/11.jpg', 'Kávé, Narancs, Jég, Tej', '300 ml', '5.5€', 'Narancs, Tej', 'coffee'),
(24, 'Matcha latte', 'assets/img/products/coffees/12.jpg', 'Kávé, Matcha por, Tej', '300 ml', '5€', 'Tej', 'coffee'),
(25, 'Csokis brownie', 'assets/img/products/desserts/1.jpg', 'Csokoládé, Vaj, Cukor, Liszt', '50 g', '3€', 'Tej, Glutén', 'dessert'),
(26, 'Mákos tekercs', 'assets/img/products/desserts/2.jpg', 'Mák, Cukor, Tojás, Liszt', '60 g', '3.5€', 'Mák, Tojás, Glutén', 'dessert'),
(27, 'Krémes szelet', 'assets/img/products/desserts/3.jpg', 'Tejszín, Cukor, Tojás, Liszt', '55 g', '3€', 'Tej, Tojás, Glutén', 'dessert'),
(28, 'Diós kocka', 'assets/img/products/desserts/4.jpg', 'Dió, Vaj, Cukor, Liszt', '45 g', '2.5€', 'Dió, Tej, Glutén', 'dessert'),
(29, 'Mákos guba', 'assets/img/products/desserts/5.jpg', 'Mák, Tej, Cukor, Kenyér', '70 g', '3.5€', 'Mák, Tej, Glutén', 'dessert'),
(30, 'Csokoládés-málnás muffin', 'assets/img/products/desserts/6.jpg', 'Csokoládé, Málna, Cukor, Vaj, Liszt', '65 g', '3€', 'Tej, Glutén', 'dessert'),
(31, 'Almás pite', 'assets/img/products/desserts/7.jpg', 'Alma, Cukor, Vaj, Liszt', '60 g', '3€', 'Tej, Glutén', 'dessert'),
(32, 'Fahéjas csiga', 'assets/img/products/desserts/8.jpg', 'Fahéj, Cukor, Tojás, Liszt', '55 g', '3.5€', 'Tej, Tojás, Glutén', 'dessert'),
(33, 'Meggyes pite', 'assets/img/products/desserts/9.jpg', 'Meggy, Cukor, Vaj, Liszt', '50 g', '3€', 'Tej, Glutén', 'dessert'),
(34, 'Csokis rolád', 'assets/img/products/desserts/10.jpg', 'Csokoládé, Tojás, Cukor, Liszt', '65 g', '3.5€', 'Tojás, Glutén', 'dessert'),
(35, 'Tiramisu', 'assets/img/products/desserts/11.jpg', 'Kávé, Rum, Mascarpone, Tojás, Cukor, Liszt', '65 g', '3.5€', 'Tej, Tojás, Glutén', 'dessert'),
(36, 'Csokoládészuflé', 'assets/img/products/desserts/12.jpg', 'Csokoládé, Tojás, Cukor, Liszt', '65 g', '3.5€', 'Tojás, Glutén', 'dessert'),
(37, 'Áfonyás smoothie', 'assets/img/products/drinks/1.jpg', 'Áfonya, Banán, Méz, Tejföl', '300 ml', '5€', 'Áfonya, Banán, Tej', 'drink'),
(38, 'Citromos limonádé', 'assets/img/products/drinks/2.jpg', 'Citrom, Víz, Cukor', '250 ml', '4€', 'Citrom', 'drink'),
(39, 'Cseresznyés fröccs', 'assets/img/products/drinks/3.jpg', 'Cseresznye szörp, Szénsavas víz', '200 ml', '3€', 'Cseresznye', 'drink'),
(40, 'Málnás smoothie', 'assets/img/products/drinks/4.jpg', 'Málna, Alma, Tejföl', '300 ml', '5€', 'Málna, Tej', 'drink'),
(41, 'Forrócsokoládé', 'assets/img/products/drinks/5.jpg', 'Csokoládé, Tej, Cukor', '250 ml', '4€', 'Tej', 'drink'),
(42, 'Epres limonádé', 'assets/img/products/drinks/6.jpg', 'Eper, Citrom, Víz, Cukor', '250 ml', '4€', 'Eper, Citrom', 'drink'),
(43, 'Szőlős fröccs', 'assets/img/products/drinks/7.jpg', 'Szőlő szörp, Szénsavas víz', '200 ml', '3€', 'Nincs', 'drink'),
(44, 'Banános smoothie', 'assets/img/products/drinks/8.jpg', 'Banán, Alma, Tejföl', '300 ml', '5€', 'Banán, Tej', 'drink'),
(45, 'Licsis limonádé', 'assets/img/products/drinks/9.jpg', 'Licsi, Víz, Cukor', '250 ml', '4€', 'Licsi', 'drink'),
(46, 'Áfonyás limonádé', 'assets/img/products/drinks/10.jpg', 'Áfonya, Citrom, Víz, Cukor', '250 ml', '4€', 'Áfonya, Citrom', 'drink'),
(47, 'Epres smoothie', 'assets/img/products/drinks/11.jpg', 'Eper, Alma, Tejföl', '250 ml', '4€', 'Eper, Tej', 'drink'),
(48, 'Görögdinnyés limonádé', 'assets/img/products/drinks/12.jpg', 'Görögdinnye, Citrom, Víz, Cukor', '250 ml', '4€', 'Görögdinnye, Citrom', 'drink'),
(49, 'Gyömbéres tea', 'assets/img/products/drinks/13.jpg', 'Gyömbér, Citrom, Víz, Cukor', '150 ml', '4€', 'Gyömbér, Citrom', 'drink'),
(50, 'Citromos tea', 'assets/img/products/drinks/14.jpg', 'Citrom, Víz, Cukor', '150 ml', '4€', 'Citrom', 'drink'),
(51, 'Kamillatea', 'assets/img/products/drinks/15.jpg', 'Kamilla, Citrom, Víz, Cukor', '150 ml', '4€', 'Citrom', 'drink'),
(52, 'Epres fagylalt', 'assets/img/products/ice_creams/1.jpg', 'Eper, Tejszín, Tej, Cukor', '120 g', '5€', 'Eper, Tej', 'ice_creams'),
(53, 'Karamellás fagylalt', 'assets/img/products/ice_creams/2.jpg', 'Karamella, Tejszín, Tej, Cukor', '125 g', '5.5€', 'Tej', 'ice_creams'),
(54, 'Görögdinnyés fagylalt', 'assets/img/products/ice_creams/3.jpg', 'Görögdinnye, Tejszín, Tej, Cukor', '120 g', '5€', 'Görögdinnye, Tej', 'ice_creams'),
(55, 'Mogyorós fagylalt', 'assets/img/products/ice_creams/4.jpg', 'Mogyoró, Tejszín, Tej, Cukor', '130 g', '5€', 'Mogyoró, Tej', 'ice_creams'),
(56, 'Tutti-frutti fagylalt', 'assets/img/products/ice_creams/5.jpg', 'Csokoládé, Gyümölcs (Eper, áfonya), Citromlé, Tejszín, Tej, Cukor', '115 g', '4.5€', 'Eper, Áfonya, Citrom, Tej', 'ice_creams'),
(57, 'Pekándiós fagylalt', 'assets/img/products/ice_creams/6.jpg', 'Pekándió, Tejszín, Tej, Cukor', '130 g', '5€', 'Pekándió, Tej', 'ice_creams'),
(58, 'Csokoládés fagylalt', 'assets/img/products/ice_creams/7.jpg', 'Csokoládé, Tejszín, Tej, Cukor', '125 g', '5.5€', 'Tej', 'ice_creams'),
(59, 'Almás fagylalt', 'assets/img/products/ice_creams/8.jpg', 'Alma, Tejszín, Tej, Cukor', '120 g', '4.5€', 'Tej', 'ice_creams'),
(60, 'Citromos fagylalt', 'assets/img/products/ice_creams/9.jpg', 'Citrom, Tejszín, Tej, Cukor', '135 g', '5€', 'Citrom, Tej', 'ice_creams'),
(61, 'Vaníliás fagylalt', 'assets/img/products/ice_creams/10.jpg', 'Vanília, Tejszín, Tej, Cukor', '125 g', '5€', 'Vanília, Tej', 'ice_creams'),
(62, 'Oreós fagylalt', 'assets/img/products/ice_creams/11.jpg', 'Oreo, Tejszín, Tej, Cukor', '130 g', '5.5€', 'Tej', 'ice_creams'),
(63, 'Pisztáciás fagylalt', 'assets/img/products/ice_creams/12.jpg', 'Pisztácia, Tejszín, Tej, Cukor', '120 g', '4.5€', 'Pisztácia, Tej', 'ice_creams');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `permission_level` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT a táblához `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
