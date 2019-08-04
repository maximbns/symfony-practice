-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 04 août 2019 à 16:44
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exo_sf_maximbns`
--
CREATE DATABASE IF NOT EXISTS `exo_sf_maximbns` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `exo_sf_maximbns`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`) VALUES
(1, 'Mon premier article', 'Etiam ac rhoncus ante. Ut nibh odio, ullamcorper sed nisl at, porttitor mollis massa. Suspendisse eget eleifend mauris. Sed in fringilla dolor. Integer non tortor nulla. Nam nec egestas nulla, condimentum mattis lorem. Donec ac pellentesque est. Suspendisse sodales feugiat enim. Phasellus sit amet rhoncus est. Duis cursus iaculis quam, et porttitor nulla ullamcorper posuere. Ut auctor vel elit a faucibus. Duis faucibus nibh dolor, eget cursus dolor gravida et. Mauris pulvinar elementum neque, ut sodales enim dictum sodales. Phasellus dignissim dui id fringilla tempus. Aliquam erat volutpat. Curabitur mauris ligula, consectetur consequat ultricies imperdiet, malesuada sit amet est. '),
(2, 'Et de deux !', 'Quisque vitae felis blandit, dapibus sem in, fermentum ipsum. Sed id quam et lorem elementum lobortis. Integer et nibh eu massa sollicitudin malesuada. Nulla feugiat dolor a pharetra pharetra. Etiam nec accumsan risus. Praesent convallis nisi sit amet ornare porta. Nunc nec venenatis purus. Etiam pharetra sodales nisl, id laoreet ipsum volutpat sed. Maecenas porttitor vehicula congue. Phasellus sagittis facilisis pharetra. Pellentesque vitae augue sed mauris scelerisque gravida sit amet ultrices lacus. Maecenas et consequat arcu, eget facilisis tellus. Ut ut metus sit amet dolor fringilla varius sed et risus. ');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
