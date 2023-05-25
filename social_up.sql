-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 25, 2023 at 02:20 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_up`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `tag`, `content`, `date`, `image`, `user_id`) VALUES
(65, 'evenements', 'Premier Post', '2023-05-25 01:24:42', NULL, 12),
(66, 'sport', 'J\'aime le tennis', '2023-05-25 01:25:52', 'images/img_646eb9206f01d.jpeg', 12),
(67, 'france', 'Bientôt les jo', '2023-05-25 01:30:56', 'images/img_646eba50b1ba3.jpg', 12),
(68, 'sport', 'J\'aime le PSG', '2023-05-25 01:32:51', 'images/img_646ebac344942.jpg', 13),
(69, 'animaux', 'J\'aime les chats', '2023-05-25 01:36:05', 'images/img_646ebb85b90c3.jpg', 14),
(71, 'evenements', 'J\'adore ce site', '2023-05-25 01:37:36', NULL, 14),
(72, 'evenements', 'Coucou', '2023-05-25 01:40:41', NULL, 15),
(73, 'art', 'Magnifique peinture', '2023-05-25 01:42:49', 'images/img_646ebd1987175.jpg', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `image_profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pseudo`, `email`, `password`, `image_profil`) VALUES
(12, 'Zindovic', 'Dimitri', 'DZI', 'dimitri.zindovic@gmail.com', '$2y$10$zQrBt7f2LxdBJWZKrK5t3.mkUyUUJApUIWc1DKiL/d70V7ISeahdO', 'images/img_646eb8c12033c.jpeg'),
(13, 'Allio', 'Lilian', 'Le L', 'lilian.allio@gmail.com', '$2y$10$v4.uksYifJmXpxOzkb/bMOg81vAp198TbqNkErSlRTYDOqysbMTea', 'images/img_646eba9dd0510.jpg'),
(14, 'Daumas', 'Basile', 'BDSE', 'basile.daumas@gmail.com', '$2y$10$cPkFQ4zMAS8Tvr7H0zKcL.K0BrTSKhKQTPhF46Kmbri4fh.I/Wy5G', 'images/img_646ebb5903c62.jpg'),
(15, 'Proutière', 'Chris', 'CPR', 'chris.proutiere@gmail.com', '$2y$10$VP487lJcvspAUgeKd/f/m.DNVDilFkirdaqucac.yHuZJVd/yh8ba', 'images/img_646ebc5f50cfa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
