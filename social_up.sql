-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 24, 2023 at 08:31 PM
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
  `image` text,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `tag`, `content`, `date`, `image`, `user_id`) VALUES
(27, 'film', 'efaffeef', '2023-04-14 15:26:20', NULL, 5),
(28, 'culture', 'efezfzef', '2023-04-14 15:39:21', 'images/img_643973a95a1ef.jpeg', 6),
(29, 'film', 'vvrerbv', '2023-04-14 15:41:20', NULL, 7),
(30, 'sport', 'vvrerbv', '2023-04-14 15:41:38', NULL, 7),
(31, 'social', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut debitis beatae nemo nostrum modi ad quo necessitatibus! Corporis ad neque nemo asperiores doloremque ex laboriosam animi sequi, dolorum accusamus quasi.', '2023-04-14 16:20:03', NULL, 6),
(32, 'sport', 'vjrfjrbjbhbvjksdq', '2023-04-17 13:06:36', NULL, 6),
(33, 'evenements', 'frtethethbet', '2023-05-11 11:51:35', NULL, 6),
(34, 'sport', 'zvsdvsdv', '2023-05-17 15:28:47', NULL, 6),
(36, 'evenements', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id corrupti, aperiam at ea maiores soluta hic nihil natus sed modi quae. Officiis facilis, unde repellendus nostrum eum enim magni atque.', '2023-05-22 14:54:09', 'images/img_646b821194710.jpeg', 6),
(42, 'film', 'Contenu du post prédéfini', '2023-05-22 12:00:00', '', 1);

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
  `image_profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pseudo`, `email`, `password`, `image_profil`) VALUES
(1, 'Computer', 'Computer', 'COMPUTER', 'efzefe@gmail.com', '$2y$10$CpwTYt.Wtm6p3fkFF1gxjuHTTZmLUgeUJ9MtmCc63fgdD74J.lfQ6', 'https://media.istockphoto.com/id/1183337149/fr/photo/affichage-dordinateur-avec-l%C3%A9cran-blanc-blanc-moniteur-de-nordinateur-isol%C3%A9-sur-le-fond.jpg?b=1&s=612x612&w=0&k=20&c=uE91wT7K_jSsPqTS4Raw1VuhLo6qEfbClgSmayvvdds='),
(5, 'frzrz', 'fzazrfr', 'RGE', 'test@gmail.com', '$2y$10$Q0rh4PqjoFgodNvqhRn9FuI0O9GWaCLnD8vlWXs0amhOKvzjTWZVO', 'https://images.pexels.com/photos/16357548/pexels-photo-16357548.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'),
(6, 'Zindovic', 'Dimitri', 'DZI', 'dimitri.zindovic@gmail.com', '$2y$10$NGOKkE/9ntE6mmOWPv5ZWOMXoSZge6MBssYb/BCbhuqeRwJ1EKOo2', 'https://images.pexels.com/photos/12996230/pexels-photo-12996230.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'),
(7, 'Daumas', 'Basile', 'BDA', 'basile.daumas@gmail.com', '$2y$10$G8FlcgWjFRJnQLNsIoTOTuJ17HgUxHIFXdd4a7lowovjBjlH.2xne', 'https://images.pexels.com/photos/15989106/pexels-photo-15989106.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');

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
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
