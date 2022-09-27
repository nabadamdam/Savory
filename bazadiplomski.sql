-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 03:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazadiplomski`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivnosti`
--

CREATE TABLE `aktivnosti` (
  `idAktivnosti` int(255) NOT NULL,
  `EmailKorisnika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Operacija` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DatumOperacije` date NOT NULL DEFAULT current_timestamp(),
  `VremeOperacije` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aktivnosti`
--

INSERT INTO `aktivnosti` (`idAktivnosti`, `EmailKorisnika`, `Operacija`, `DatumOperacije`, `VremeOperacije`) VALUES
(264, 'danijelbiukovic98@gmail.com', 'Logout user', '2022-07-02', '19:51:12'),
(265, 'nikolariorovic@hotmail.com', 'Login user', '2022-07-02', '19:51:17'),
(266, 'nikolariorovic@hotmail.com', 'Logout user', '2022-07-02', '20:59:09'),
(267, 'danijelbiukovic98@gmail.com', 'Login user', '2022-07-02', '20:59:15'),
(268, 'danijelbiukovic98@gmail.com', 'Logout user', '2022-07-02', '21:00:34'),
(269, 'danijelbiukovic98@gmail.com', 'Login user', '2022-07-03', '13:09:48'),
(270, 'danijelbiukovic98@gmail.com', 'Logout user', '2022-07-03', '15:24:21'),
(271, 'nikolariorovic@hotmail.com', 'Login user', '2022-07-03', '15:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `started_at` datetime DEFAULT NULL,
  `finished_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `first_name`, `last_name`, `email`, `user_id`, `country`, `address`, `city`, `postal_code`, `phone_number`, `status`, `payment_method`, `order_id`, `error_message`, `store_name`, `transaction_id`, `hash`, `currency`, `price`, `type`, `json`, `started_at`, `finished_at`, `created_at`, `updated_at`) VALUES
(30, 'Danijel', 'Biukovic', 'danijelbiukovic98@gmail.com', NULL, 'serbia', 'sadasdasd', 'sfasfasfasfas', '745637856', '12649545', 'Započeto', 'stripe_payment', NULL, NULL, NULL, NULL, NULL, NULL, 58.55, NULL, NULL, '2022-06-30 21:59:44', NULL, '2022-06-30 19:59:44', '2022-06-30 19:59:44'),
(31, 'Danijel', 'Biukovic', 'danijelbiukovic98@gmail.com', NULL, 'serbia', 'sadasdasd', 'sfasfasfasfas', '745637856', '12649545', 'Delivered', 'stripe_payment', NULL, NULL, NULL, NULL, NULL, NULL, 58.55, NULL, NULL, '2022-06-30 22:00:05', NULL, '2022-06-30 20:00:05', '2022-06-30 20:00:06'),
(32, 'Danijel', 'Biukovic', 'danijelbiukovic98@gmail.com', NULL, 'serbia', 'sadasdasd', 'sfasfasfasfas', '745637856', '12649545', 'Delivered', 'stripe_payment', NULL, NULL, NULL, NULL, NULL, NULL, 160.50, NULL, NULL, '2022-06-30 22:01:21', NULL, '2022-06-30 20:01:21', '2022-06-30 20:01:23'),
(33, 'Danijel', 'Biukovic', 'danijelbiukovic98@gmail.com', NULL, 'serbia', 'sadasdasd', 'sfasfasfasfas', '745637856', '12649545', 'Succeeded', 'stripe_payment', NULL, NULL, NULL, NULL, NULL, NULL, 29.99, NULL, NULL, '2022-07-02 17:35:59', NULL, '2022-07-02 15:35:59', '2022-07-02 15:36:02'),
(34, 'Danijel', 'Biukovic', 'danijelbiukovic98@gmail.com', NULL, 'serbia', 'sadasdasd', 'sfasfasfasfas', '745637856', '12649545', 'Succeeded', 'stripe_payment', NULL, NULL, NULL, NULL, NULL, NULL, 6.85, NULL, NULL, '2022-07-02 19:00:12', NULL, '2022-07-02 17:00:12', '2022-07-02 17:00:15'),
(35, 'Danijel', 'Biukovic', 'danijelbiukovic98@gmail.com', NULL, 'serbia', 'sadasdasd', 'sfasfasfasfas', '745637856', '12649545', 'Succeeded', 'stripe_payment', NULL, NULL, NULL, NULL, NULL, NULL, 21.90, NULL, NULL, '2022-07-03 11:38:13', NULL, '2022-07-03 09:38:13', '2022-07-03 09:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `item_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(38, 30, 23, 27.95, 5, '2022-06-30 19:59:44', '2022-06-30 19:59:44'),
(39, 30, 15, 30.60, 3, '2022-06-30 19:59:44', '2022-06-30 19:59:44'),
(40, 31, 23, 27.95, 5, '2022-06-30 20:00:05', '2022-06-30 20:00:05'),
(41, 31, 15, 30.60, 3, '2022-06-30 20:00:05', '2022-06-30 20:00:05'),
(42, 32, 11, 109.50, 5, '2022-06-30 20:01:21', '2022-06-30 20:01:21'),
(43, 32, 15, 51.00, 5, '2022-06-30 20:01:21', '2022-06-30 20:01:21'),
(44, 33, 108, 29.99, 1, '2022-07-02 15:35:59', '2022-07-02 15:35:59'),
(45, 34, 92, 6.85, 1, '2022-07-02 17:00:12', '2022-07-02 17:00:12'),
(46, 35, 11, 21.90, 1, '2022-07-03 09:38:13', '2022-07-03 09:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `idKategorije` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`idKategorije`, `naziv`) VALUES
(1, 'Pasta'),
(2, 'Meso'),
(3, 'Salata'),
(4, 'Kolac');

-- --------------------------------------------------------

--
-- Table structure for table `kontakt`
--

CREATE TABLE `kontakt` (
  `idPitanja` int(255) NOT NULL,
  `Ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Pitanje` text COLLATE utf8_unicode_ci NOT NULL,
  `Datum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kontakt`
--

INSERT INTO `kontakt` (`idPitanja`, `Ime`, `Email`, `Pitanje`, `Datum`) VALUES
(196, 'Nikola', 'nikolariorovic@hotmail.com', 'Zdravooo!', '2022-06-29 20:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `idKorisnika` int(255) NOT NULL,
  `Ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `broj_telefona` int(11) DEFAULT NULL,
  `adresa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `drzava` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postanski_broj` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idUloga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`idKorisnika`, `Ime`, `Prezime`, `broj_telefona`, `adresa`, `grad`, `drzava`, `postanski_broj`, `Email`, `Username`, `Pass`, `idUloga`) VALUES
(1, 'Nikola', 'Riorovic', 652011246, 'Stevana Supljikca 131/28', 'Pancevo', 'serbia', '11421', 'nikolariorovic@hotmail.com', 'nabadamdam98', '90e889d2d06dd9b7b38d2d16fcab098e', 1),
(24, 'Zikica', 'Zikic', NULL, NULL, NULL, NULL, NULL, 'zika.ziki@gmail.com', 'zika123', '685d80d50ae36db5cedbbecddefbaee8', 1),
(77, 'Petar', 'Petrovic', NULL, NULL, NULL, NULL, NULL, 'pera@gmail.com', 'pera123', 'bf676ed1364b5857fba69b5623c81b64', 2),
(78, 'Milorad', 'Milosavljevic', NULL, NULL, NULL, NULL, NULL, 'milan@gmail.com', 'milan123', '49e34051a5bb3df733080908649b9ad1', 2),
(80, 'Zivke', 'Zivkovic', NULL, NULL, NULL, NULL, NULL, 'zivke@gmail.com', 'zivke123', 'f249bea09a3380a30b65f07b051303a4', 2),
(81, 'Nikola', 'Riorovic', NULL, NULL, NULL, NULL, NULL, 'nikola.riorovic98@gmail.com', 'nabadamdam123', '702f7e8a597f335fc4f61a12eb6e8db2', 2),
(83, 'Marko', 'Milivojevic', 631632894, 'Rudnička', 'Smederevska Palanka', 'serbia', '11420', 'markoczv314@gmail.com', 'Markoczv314', 'abd8c22f74e0f88da90848cc61fbf057', 1),
(86, 'Danijel', 'Biukovic', 12649545, 'sadasdasd', 'sfasfasfasfas', 'serbia', '745637856', 'danijelbiukovic98@gmail.com', 'daki123', '90e889d2d06dd9b7b38d2d16fcab098e', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2022_03_13_180706_create_carts_table', 1),
(4, '2022_03_13_183437_create_cart_items_table', 1),
(5, '2022_03_14_173410_alter_table_korisnici_add_columns_address', 1);

-- --------------------------------------------------------

--
-- Table structure for table `navigacija`
--

CREATE TABLE `navigacija` (
  `idNav` int(50) NOT NULL,
  `naziv` text COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `navigacija`
--

INSERT INTO `navigacija` (`idNav`, `naziv`, `href`) VALUES
(2, 'Menu', '/menu'),
(3, 'Services', '/services'),
(5, 'Contact&Registration', '/contact'),
(6, 'Contact', '/contact'),
(7, 'Author', '/author'),
(8, 'Admin', '/admin'),
(10, 'Cart', '/cart'),
(29, 'Logout', '/logout');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `idProizvoda` int(255) NOT NULL,
  `Naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `SlikaSrc` text COLLATE utf8_unicode_ci NOT NULL,
  `SlikaAlt` text COLLATE utf8_unicode_ci NOT NULL,
  `Opis` text COLLATE utf8_unicode_ci NOT NULL,
  `Kolicina` int(11) DEFAULT NULL,
  `Cena` decimal(60,2) NOT NULL,
  `idKategorije` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`idProizvoda`, `Naziv`, `SlikaSrc`, `SlikaAlt`, `Opis`, `Kolicina`, `Cena`, `idKategorije`) VALUES
(9, 'Fresh Beef with Broccoli', 'images/img_1.jpg', 'Snicla', 'Medium rare beef with griled broccoli and \r\nsauce!', 1, '20.80', 2),
(10, 'Cake with Apples and Plum', 'images/img_2.jpg', 'Kolac', 'Cake with organic fruits and extra creamy. Sweeter if needed!\r\n', 20, '18.30', 4),
(11, 'Grilled Chicken Salad', 'images/img_3.jpg', 'Salata', 'Classic Chicken Salad is the perfect combo of seasoned chicken breast.', 20, '21.90', 3),
(15, 'Meatball with Cheese', 'images/img_4.jpg', 'Cufta', 'Far far away, behind the word mountains, far from the countries Vokalia..', 20, '10.20', 2),
(23, 'Farfalle with Tomatoes', 'images/1581369526img_6.jpg', 'Testenina', 'Far far away, behind the word mountains, far from the countries Vokalia.', 20, '5.59', 1),
(24, 'Veal with Potatoes', 'images/1581376042img_5.jpg', 'Teletina', 'Far far away, behind the word mountains, far from the countries Vokalia..', 20, '17.85', 2),
(91, 'Pizza with Cheese and Pineappl', 'images/img_7.jpg\r\n\r\n\r\n\r\n', 'Pizza', 'The most delicious pizza made by the best chefs!', 20, '9.85', 1),
(92, 'Beef Burger', 'images/img_8.jpg\r\n\r\n\r\n', 'Burger', 'Burger made from the finest beef meat and the most delicious taste!', 19, '6.85', 2),
(93, 'Pancakes with Toppings', 'images/1584582689img_9.jpg', 'Pancakes', 'Pancakes with the finest taste in a very short time!', 20, '4.20', 2),
(108, 'Chocolate cake', 'images/img_10.jpg', 'Torata cokoloada', 'Delicious cake with chocolate and melted chocolate topping.', 19, '29.99', 4),
(109, 'Chocolate muffins', 'images/img_11.jpg', 'Mafini', 'Delicious chocolate-filled muffins.', 20, '3.99', 4),
(110, 'Strawberry Chocolate Pudding', 'images/img_12.jpg', 'Puding', 'The pudding I make according to the best recipe.', 20, '2.50', 4),
(111, 'Natural Orange Juice', 'images/img_13.jpg', 'Sok', 'Freshly squeezed orange juice.', 20, '1.99', 4),
(113, 'Cheese Cake', 'images/img_14.jpg', 'Kolac', 'Delicious cake with a refined taste.', 20, '4.99', 4),
(114, 'Sushie', 'images/img_15.jpg', 'Susi', 'One specialty of Chinese cuisine also in our restaurant.', 20, '7.99', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `idSub` int(255) NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`idSub`, `Email`) VALUES
(63, 'nikolariorovic123@hotmail.com'),
(64, 'nikolariorovic@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `idUloga` int(255) NOT NULL,
  `NazivUloga` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`idUloga`, `NazivUloga`) VALUES
(1, 'Administrator'),
(2, 'AutorizovaniKorisnik');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'marko', 'markoczv314@gmail.com', '2022-04-28 22:00:00', 'marko1234', NULL, '2022-04-28 22:00:00', '2022-04-28 22:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivnosti`
--
ALTER TABLE `aktivnosti`
  ADD PRIMARY KEY (`idAktivnosti`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`idKategorije`);

--
-- Indexes for table `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`idPitanja`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`idKorisnika`),
  ADD UNIQUE KEY `Email` (`Email`,`Username`,`Pass`),
  ADD KEY `idKorisnika` (`idKorisnika`),
  ADD KEY `idUloga` (`idUloga`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigacija`
--
ALTER TABLE `navigacija`
  ADD PRIMARY KEY (`idNav`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`idProizvoda`),
  ADD KEY `idKategorije` (`idKategorije`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`idSub`),
  ADD KEY `idOdgovor` (`idSub`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`idUloga`),
  ADD KEY `idUloga` (`idUloga`),
  ADD KEY `idUloga_2` (`idUloga`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivnosti`
--
ALTER TABLE `aktivnosti`
  MODIFY `idAktivnosti` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `idKategorije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `idPitanja` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `idKorisnika` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `navigacija`
--
ALTER TABLE `navigacija`
  MODIFY `idNav` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `idProizvoda` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `idSub` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `idUloga` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `korisnici_ibfk_1` FOREIGN KEY (`idUloga`) REFERENCES `uloga` (`idUloga`);

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_ibfk_1` FOREIGN KEY (`idKategorije`) REFERENCES `kategorija` (`idKategorije`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
