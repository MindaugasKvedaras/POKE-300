-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 06:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `poke_history`
--

CREATE TABLE `poke_history` (
  `id` int(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `recipient_email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poke_history`
--

INSERT INTO `poke_history` (`id`, `sender_email`, `recipient_email`, `message`, `date`) VALUES
(206, 'kvedaras.mindaugas@gmail.com', 'kevin12@example.org', 'Mindaugas  siunčia tau poke', '2023-02-26 21:30:51'),
(207, 'eva@gmail.com', 'eva@gmail.com', 'Eva siunčia tau poke', '2023-02-26 21:31:29'),
(208, 'eva@gmail.com', 'kvedaras.mindaugas@gmail.com', 'Eva siunčia tau poke', '2023-02-26 21:31:36'),
(209, 'kvedaras.mindaugas@gmail.com', 'pwehner@example.com', 'Mindaugas  siunčia tau poke', '2023-02-27 07:00:46'),
(210, 'kvedaras.mindaugas@gmail.com', 'pwehner@example.com', 'Mindaugas  siunčia tau poke', '2023-02-27 07:01:33'),
(211, 'kvedaras.mindaugas@gmail.com', 'edd96@example.org', 'Mindaugas  siunčia tau poke', '2023-02-27 07:01:43'),
(212, 'kvedaras.mindaugas@gmail.com', 'pwehner@example.com', 'Mindaugas  siunčia tau poke', '2023-02-27 07:05:20'),
(213, 'kvedaras.mindaugas@gmail.com', 'kamren42@example.org', 'Mindaugas  siunčia tau poke', '2023-02-27 07:05:23'),
(214, 'eva@gmail.com', 'leanna38@example.org', 'Eva siunčia tau poke', '2023-02-27 07:05:35'),
(215, 'kvedaras.mindaugas@gmail.com', 'gina91@example.net', 'Mindaugas  siunčia tau poke', '2023-02-27 07:09:54'),
(216, 'kvedaras.juozas@gmail.com', 'jhuel@example.org', 'Juozas siunčia tau poke', '2023-02-27 07:11:53'),
(217, 'kvedaras.juozas@gmail.com', 'eva@gmail.com', 'Juozas siunčia tau poke', '2023-02-27 07:11:59'),
(218, 'kvedaras.juozas@gmail.com', 'kvedaras.mindaugas@gmail.com', 'Juozas siunčia tau poke', '2023-02-27 07:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`user_id`, `name`, `surname`, `email`, `password`) VALUES
(1, 'Saige', 'Gorczany', 'pwehner@example.com', '606a9a6918f82f5bf21087d5b36d38e7b8b5ff5d'),
(2, 'Waylon', 'Langosh', 'kamren42@example.org', '9db0e03501e4ac08c409503321c9b9c67da44ded'),
(3, 'Arturo', 'Conroy', 'federico89@example.net', 'a9a74c766c7e32f66f39ae5f3a23522b27b319ac'),
(4, 'Zachery', 'Ward', 'gina91@example.net', 'b53d7ffc546063e5ec6f2fd322cce1812f2ba995'),
(5, 'Diego', 'Gleason', 'adrienne.watsica@example.com', '8cb02e694abb0aa714cb749db4d0f37fac890501'),
(6, 'Mekhi', 'Koepp', 'leanna38@example.org', 'c0afa6e856eb70325e2f42853fd0368866eb9724'),
(7, 'Korey', 'Fritsch', 'jhuel@example.org', 'dcea26e89a95ebb16ff95f07cd757cc8dc5ee952'),
(8, 'Keith', 'Kerluke', 'sleffler@example.com', '2f5941075fc4af33e32fd66b3f0fa1508beb80d0'),
(9, 'Curt', 'Ryan', 'edd96@example.org', '2664d9b3f0a58cd5624e4c68f27c250391b0d3d9'),
(10, 'Khalil', 'Walter', 'kevin12@example.org', 'ed6900fc558a9f8aee88e41a10589caeeec8d14f'),
(11, 'Emiliano', 'Pollich', 'joe32@example.com', 'a9848b94ef20e7364917bb0c8fa7d74a7f3d7a27'),
(12, 'Paxton', 'Schowalter', 'lucinda75@example.com', '29d987d5973cd7cc6dfc2d2a1b0f0525c2ee7f6a'),
(13, 'Franco', 'Hoeger', 'rossie.predovic@example.net', '374308c3435d7876e874d8b53773573567b2fdc2'),
(14, 'Vladimir', 'Wisozk', 'erdman.sim@example.net', 'f558ac4537d62dcbbd953aa40b1ef836a608e20f'),
(15, 'Toy', 'Crona', 'graham.orn@example.org', '4eab3545ac67ab548e9f16c42fb9a4a8390f492e'),
(16, 'Keagan', 'Wilderman', 'qkrajcik@example.org', 'bfd1350b6e2c472479aba2bcb8b4a77611c5e147'),
(17, 'Lukas', 'Beer', 'hyman21@example.com', 'ab7d8aeb960c58e547a12ef6b1518750bb85df7e'),
(18, 'Charley', 'Prohaska', 'thartmann@example.com', '08f841e005b6f927b9262bfad15b1f870979f483'),
(19, 'Rafael', 'Hodkiewicz', 'pacocha.sandrine@example.net', '60895952b647f87949677b67aba8b74a4e7ffb91'),
(20, 'Horacio', 'Ratke', 'libbie.bernier@example.com', '3a15c40c36c8abeef456e4b8f52828f8440676f1'),
(21, 'Devante', 'Barrows', 'lueilwitz.coralie@example.net', 'c6ad25b922d6f4543aeec95cde8b63d971a7c2ee'),
(22, 'Nicholaus', 'Russel', 'mosciski.melba@example.net', '393abfc0255cd2f297f87fe230f0b55b64cad242'),
(23, 'Greyson', 'Dickens', 'eunice73@example.net', '1f59e2ad24718805a351891507e72102e7b49236'),
(24, 'Daryl', 'Wuckert', 'libby.stoltenberg@example.net', '3858cf98ebc7a2c09e08bd05f78e8ddfe091a65f'),
(25, 'Rhett', 'Kiehn', 'keegan61@example.com', '08867f29b26dc39e3da420dfa65e0acc2441e2b0'),
(26, 'Nathan', 'DuBuque', 'tara.wilderman@example.com', '8e348eed79ce9e8be029d0641e67cdcfe3c0bdd9'),
(27, 'Terrance', 'Barton', 'albina14@example.net', 'ce3fbcf6c2f43c9c08acf8ada5c04108af406f16'),
(28, 'Jalen', 'Beahan', 'archibald98@example.org', '3af8a75904099f03ae5e0b2b7f4972b15761a63d'),
(29, 'Jerel', 'VonRueden', 'norma64@example.net', 'af366087452bd711fd17656177d4425c51c810f7'),
(30, 'Glennie', 'Kautzer', 'swaniawski.melvina@example.org', '6775351be041eb3888042b560b617fe306fed5f9'),
(31, 'Trent', 'Keeling', 'frankie.nienow@example.net', '6ca4aac9c739f31c36755e492009c5d768c63937'),
(32, 'Elwin', 'Hayes', 'reid40@example.org', '3de8eb8527cfee8c948accc70f9f9143bee5d8d7'),
(33, 'Enrico', 'Pacocha', 'koss.raven@example.org', '453edde1041f6c409028c59da2395097f11e0e5e'),
(34, 'Sylvester', 'Hackett', 'yasmeen62@example.com', '60f48faf91ef60262fce6b66e566fe23fd3c35e9'),
(35, 'Albert', 'Green', 'heller.william@example.net', 'a635663436ffba356bec48a792ce8b88e73198f9'),
(36, 'Zechariah', 'Dickinson', 'roxane.luettgen@example.org', '16f5d2718fb7e09582a5e47aa994538154ca5f6c'),
(37, 'Presley', 'Bednar', 'llemke@example.com', '4d000f76ca4962fccdd4da896968a13643586f36'),
(38, 'Haleigh', 'Halvorson', 'blick.norris@example.net', '5e7c8fd90c548e03e18fbf0b92b2b3f236b43f8b'),
(39, 'Henry', 'Luettgen', 'schowalter.montana@example.org', '404804d5e7f9c9dacba18249432310dc6a702c18'),
(40, 'Otis', 'Schmitt', 'anibal.wiegand@example.com', '62b9cb2ce59cc9293873b80cf702585f5bfc520a'),
(41, 'Estevan', 'Rogahn', 'olaf.brakus@example.net', '14c13906056a667c1b2dd6020b58715680b04dd3'),
(42, 'Derrick', 'Kovacek', 'geovany43@example.net', '0bbc471bdf8f7111eb4943afbd13022576a14293'),
(43, 'Terrell', 'Hansen', 'schimmel.reynold@example.net', 'd954b7a2dd4ab14dc106bda36eca9cf8ee1b6355'),
(44, 'Jessie', 'Krajcik', 'torp.enrique@example.com', 'bf9b2dec3b35a0a039066ca08a73149d3f296ee5'),
(45, 'Gerald', 'Feest', 'gussie64@example.com', '936e55bd0a09b25a231ed633b162dc8142391258'),
(46, 'Dangelo', 'Hayes', 'conrad50@example.com', '6b95db4af5aaaca6fcfb794f738d49ce8d4768f4'),
(47, 'Javier', 'Cruickshank', 'elta18@example.org', '8596721b2d551592f31c91be26ff348a0e63702b'),
(48, 'Elian', 'Effertz', 'botsford.micaela@example.org', '92ce311a58c7b139b94fe5f7b7c9e84709b2f961'),
(49, 'Hollis', 'Gerhold', 'slittel@example.org', '20e72159790e3c34e814bd4859017ad176fc59ca'),
(50, 'Kelton', 'Weber', 'fritsch.sylvia@example.net', '5ba13915c4947ddd679a8414c169d26f556a27cb'),
(51, 'Garrick', 'Trantow', 'rconsidine@example.com', '82414e777c4f04cf363a2e356a35cbac878dbd14'),
(52, 'King', 'D\'Amore', 'clifford22@example.com', 'c1bca6a0a0633490a2b084c84d1c22852cb3dd67'),
(53, 'Gust', 'Green', 'rowland.kessler@example.com', 'efbe4eb5c907bca545169a3b2146238cd900d4d3'),
(54, 'Jarrett', 'Champlin', 'rath.hassie@example.com', '584b756987d33ba9f3b33fa53e36d7ab577b77b9'),
(55, 'Philip', 'Hills', 'prudence.marvin@example.org', 'e8328fcc9e4373581b05da98416f79df1f70f607'),
(56, 'Tate', 'Balistreri', 'ptorphy@example.com', 'ae4f18d3627389a7d8a315bba7fa612fe04ab3d9'),
(57, 'Webster', 'Lakin', 'hadley.effertz@example.com', '6dea3313c5510ffdeb472ccd928b08504bf03025'),
(58, 'Llewellyn', 'Crooks', 'colby89@example.com', '3fafb6c5ad37ed766c98ecc4f3beed80d3808ff4'),
(59, 'Gino', 'Gerhold', 'abigale07@example.org', 'b09241eacf9054ac2af8bf35326258eec3f61099'),
(60, 'Warren', 'Hand', 'xromaguera@example.com', '8a2f851135355c7232b99a149f2dbbdc9dca22c7'),
(61, 'Winston', 'Walter', 'brenner@example.com', '61700b8031744f014f2f716440ecdd271245363d'),
(62, 'Jonathan', 'Hand', 'bgulgowski@example.com', 'c2dd0940602f0ac33283e26f4b535bf048efdf51'),
(63, 'Levi', 'Johnson', 'reva.grady@example.org', '66b5d9e150032bcc87449651a08bb61b70ec30da'),
(64, 'Daryl', 'Langworth', 'iva49@example.com', '83a0070d9fc12a46643950b513da3ed4da4b879b'),
(65, 'Timmy', 'Lueilwitz', 'hegmann.hettie@example.net', '2fc720c6fc1944145557ccedbbc01cf97301e5ea'),
(66, 'Philip', 'Larkin', 'shanahan.adah@example.org', 'd2163e34435a7882c374da27c0c24f1174a24ce9'),
(67, 'Nils', 'Kling', 'earnest.green@example.net', 'c1faf91fa6b9c2dd6d086c608ba46a027940a87b'),
(68, 'Ibrahim', 'Wiza', 'nkuhn@example.net', '038dff4f5c48611a6fea44920f0206e4888903b5'),
(69, 'Dwight', 'Shields', 'audrey40@example.com', '7e74db5772779f1e13e0eb9e6a9795fef2a0da85'),
(70, 'Bennie', 'Crooks', 'felipa.schaefer@example.net', 'febf1bcbc117c5d8f3e3583b7861f13597e3f1b3'),
(71, 'Alexandre', 'Hessel', 'hahn.judy@example.net', '74831b77ef6125a38166a1fb072c7cd2b8cd82e2'),
(72, 'Mckenna', 'Senger', 'schmitt.stefan@example.com', '2ff0703334cb7e4452ac990efff795c32ff80257'),
(73, 'Eddie', 'Schaefer', 'harber.mauricio@example.org', 'cd44f524f9399352f554eff0325380b6c4bba525'),
(74, 'Mavis', 'Robel', 'donnelly.cornell@example.org', '1f89cb6423154c212a1306c905cb23d323cfbf99'),
(75, 'Charley', 'Mills', 'grippin@example.com', '7552946e9a16935475ca114c64965202a012ae25'),
(76, 'Bertha', 'Rohan', 'gfadel@example.com', 'b82e02b0f1821378d00ff898c91ec87169909c44'),
(77, 'Prince', 'Walker', 'marquise.hettinger@example.org', '9cf666ec8ea768b9a5693f89a72e08067f2a4abb'),
(78, 'Rashawn', 'Gusikowski', 'kaylah.mcdermott@example.com', '41ff6e44fea94f533e87f9a01746b4c3ad02bfe3'),
(79, 'Dejuan', 'Lindgren', 'bmarquardt@example.org', '924ab67c80f74e468c482dbcda0b2cbbd66206b4'),
(80, 'Casimir', 'Conroy', 'sofia.weimann@example.net', '92ec3e1c48ed98e0b5b51155fe746e029e2538ba'),
(81, 'D\'angelo', 'Effertz', 'clyde.wunsch@example.org', 'd369e003278a91ec0225e550213c77c8c5319e37'),
(82, 'Harvey', 'Hintz', 'houston43@example.net', '23fe0a1d17bc73e88c1ae7508d568c8515fb23f3'),
(83, 'Ned', 'Schumm', 'bernier.adolf@example.net', 'f067e5b93969f6d05e2f052cdd3ba95a794d4d2b'),
(84, 'Ronaldo', 'Kshlerin', 'boehm.maci@example.net', '5ddda61c21d183cedb4d8be3214aa1c4aedc52d0'),
(85, 'Uriah', 'Jacobs', 'bo.hodkiewicz@example.com', '4cc342a5c07e98a8f98316d13183b3e7d595dcf0'),
(86, 'Waldo', 'Skiles', 'vnienow@example.net', 'b25124a7c51a5662abb0a8e3ef0c8fc539d58171'),
(87, 'Dorian', 'Beer', 'reilly.ethel@example.org', '0df8412fc59b7db876122d8e1f145c18fbcb4b2a'),
(88, 'Skylar', 'Langosh', 'lprohaska@example.net', '47bfab0f9921504f07327a5799aa3b10d7b3bccb'),
(89, 'Kyleigh', 'Nicolas', 'lindgren.claudine@example.org', '0eff0faa6e640c10f51e6de714f5c624d38b4207'),
(90, 'Tevin', 'Schmitt', 'bcrist@example.net', '75a016e8bf7464e1f298af73cffac5cc7811a098'),
(91, 'Freddie', 'Jones', 'rubie.king@example.net', 'dc0a265d09fe615d237b5f6a002d6909887267b0'),
(92, 'Guillermo', 'Leannon', 'ethelyn24@example.com', 'dccb28f13d940b10fdcf5091ff82c86443682d7a'),
(93, 'Linwood', 'Sanford', 'mdoyle@example.com', '38eaa44b3a715182fed8c3f3cd3f29958410e8e6'),
(94, 'Jamey', 'Grant', 'obrown@example.net', '3acb053ba65db222e1c4e01e30698dd4dbc7140b'),
(95, 'Lucas', 'Jacobs', 'clotilde.ryan@example.net', '6ac8646d5a2323ab2e7d58d3b095d87358043778'),
(96, 'Jarvis', 'Schuppe', 'kub.ferne@example.com', '5df417ff7b7bc36ba58da89f82c7c907ad06812c'),
(97, 'Pedro', 'Sporer', 'morris41@example.org', '5d6dea0b21fb6f9eebd76ed1249e8e37e4466a45'),
(98, 'Mitchel', 'Rippin', 'hilpert.lilian@example.org', 'b6db4e9e32613c49e19f2ec18b5d51410cfc69f0'),
(99, 'Edwin', 'Tremblay', 'jschaefer@example.net', 'f91928e9048b33b2231121cfb46996e28f51b35f'),
(100, 'Kelton', 'Schultz', 'omueller@example.org', '29c2c16765430cd2ceace240bfc1aac01704ca84'),
(101, 'Mindaugas ', 'Kvedaras', 'kvedaras.mindaugas@gmail.com', '492e696b0d9a8137a2bd50fba6fea539'),
(102, 'Eva', 'Kvedaraitė', 'eva@gmail.com', 'e3246aa958df008b21c47f87715f8f7c'),
(103, 'Juozas', 'Kvedaras', 'kvedaras.juozas@gmail.com', 'e3246aa958df008b21c47f87715f8f7c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poke_history`
--
ALTER TABLE `poke_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poke_history`
--
ALTER TABLE `poke_history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
