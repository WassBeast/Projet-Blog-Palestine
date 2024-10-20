-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 25 avr. 2024 à 18:57
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db1`
--

-- --------------------------------------------------------

--
-- Structure de la table `table2`
--

CREATE TABLE `table2` (
  `email` varchar(30) NOT NULL,
  `password1` varchar(30) NOT NULL,
  `full_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `table2`
--

INSERT INTO `table2` (`email`, `password1`, `full_name`) VALUES
('salemwassim88@gmail.com', 'salemwassim88', 'wassim salem '),
('aaaa@gmail.com', '1111', 'cherif'),
('khalil@gmail.com', 'khalil123', 'khalil'),
('aziz@gmail.com', 'aziz123', 'aziz'),
('cherif@gmail.com', 'cherif123', 'cherif');

-- --------------------------------------------------------

--
-- Structure de la table `table3`
--

CREATE TABLE `table3` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `comment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `table3`
--

INSERT INTO `table3` (`id`, `name`, `comment`) VALUES
(0, 'wassim', 'c genial !! MERCI POUR VOUS'),
(0, 'Amine', 'mais ce n\'est pas possible'),
(0, 'Yassmine', 'dfghfghfghfg'),
(0, 'Mr.wily', 'c genial ce que vous faites:');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
