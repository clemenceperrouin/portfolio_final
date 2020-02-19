-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 02 fév. 2020 à 19:55
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `recommandation`
--

CREATE TABLE `recommandation` (
  `id` int(11) NOT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `recommandation`
--
ALTER TABLE `recommandation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `recommandation`
--
ALTER TABLE `recommandation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
