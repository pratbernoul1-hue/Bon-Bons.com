-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 26 juin 2026 à 14:16
-- Version du serveur : 8.4.7
-- Version de PHP : 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bonbon`
--

-- --------------------------------------------------------

--
-- Structure de la table `boutiques`
--

DROP TABLE IF EXISTS `boutiques`;
CREATE TABLE IF NOT EXISTS `boutiques` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur_id` int NOT NULL,
  `numero_rue` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_adresse` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `boutiques`
--

INSERT INTO `boutiques` (`id`, `nom`, `utilisateur_id`, `numero_rue`, `nom_adresse`, `code_postal`, `ville`, `pays`) VALUES
(1, 'Boutique Bon-bons Paris', 3, '10', 'Rue des Bonbons', '75001', 'Paris', 'France'),
(2, 'Boutique Bon-bons Rennes', 3, '15', 'Rue de la Confiserie', '35000', 'Rennes', 'France'),
(3, 'Boutique Bon-bons Lille', 1, '20', 'Avenue des Friandises', '59000', 'Lille', 'France'),
(4, 'Boutique Bon-bons Toulouse', 1, '25', 'Boulevard du Sucre', '31000', 'Toulouse', 'France'),
(5, 'Boutique Bon-bons Bordeaux', 1, '30', 'Place des Gourmandises', '33000', 'Bordeaux', 'France'),
(6, 'Boutique Bon-bons Lyon', 1, '35', 'Rue des Saveurs', '69001', 'Lyon', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `confiseries`
--

DROP TABLE IF EXISTS `confiseries`;
CREATE TABLE IF NOT EXISTS `confiseries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `couleur` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` float NOT NULL,
  `illustration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `confiseries`
--

INSERT INTO `confiseries` (`id`, `nom`, `type`, `couleur`, `prix`, `illustration`, `description`) VALUES
(1, 'Figues', 'Fruits du Verger', 'bleu', 17.99, 'img/vrai_image/figue.png', 'Aux saveurs de fruits locaux, cultivés avec soin.'),
(2, 'Raisin', 'Fruits du Verger', 'bleu', 17.99, 'img/vrai_image/raisin.png', 'Aux saveurs de fruits locaux, cultivés avec soin.'),
(3, 'Abricot', 'Fruits du Verger', 'bleu', 17.99, 'img/vrai_image/abricot.png', 'Aux saveurs de fruits locaux, cultivés avec soin.'),
(4, 'Pêches', 'Fruits du Verger', 'bleu', 17.99, 'img/vrai_image/peche.png', 'Aux saveurs de fruits locaux, cultivés avec soin.'),
(5, 'Goji', 'Fruits Exotiques & Rares', 'rose', 15.99, 'img/vrai_image/goji.png', 'Bonbon fruité aux saveurs originales et naturelles.'),
(6, 'Kaki', 'Fruits Exotiques & Rares', 'rose', 15.99, 'img/vrai_image/kaki.png', 'Bonbon fruité aux saveurs originales et naturelles.'),
(7, 'Grenade', 'Fruits Exotiques & Rares', 'rose', 15.99, 'img/vrai_image/grenade.png', 'Bonbon fruité aux saveurs originales et naturelles.'),
(8, 'Pitaya', 'Fruits Exotiques & Rares', 'rose', 15.99, 'img/vrai_image/pitaya.png', 'Bonbon fruité aux saveurs originales et naturelles.'),
(9, 'L\'orange', 'Agrumes de Provence', 'jaune', 15.99, 'img/vrai_image/orange.png', 'Bonbon aux agrumes, frais et gourmand.'),
(10, 'Citron', 'Agrumes de Provence', 'jaune', 15.99, 'img/vrai_image/citron.png', 'Bonbon aux agrumes, frais et gourmand.'),
(11, 'Mandarine', 'Agrumes de Provence', 'jaune', 15.99, 'img/vrai_image/mandarine.png', 'Bonbon aux agrumes, frais et gourmand.'),
(12, 'Pamplemousse', 'Agrumes de Provence', 'jaune', 15.99, 'img/vrai_image/pamplemousse.png', 'Bonbon aux agrumes, frais et gourmand.'),
(13, 'Berlingots', 'Traditions Gourmandes', 'orange', 14.99, 'img/vrai_image/berlingots.png', 'Confiserie traditionnelle gourmande.'),
(14, 'Sucre d\'orges', 'Traditions Gourmandes', 'orange', 14.99, 'img/vrai_image/sucre_dorge.png', 'Confiserie traditionnelle gourmande.'),
(15, 'Caramels', 'Traditions Gourmandes', 'orange', 14.99, 'img/vrai_image/caramels.png', 'Confiserie traditionnelle gourmande.'),
(16, 'Nougats', 'Traditions Gourmandes', 'orange', 14.99, 'img/vrai_image/nougats.png', 'Confiserie traditionnelle gourmande.'),
(17, 'Olive', 'Nature & Bien-être', 'violet', 17.99, 'img/vrai_image/olive.png', 'Bonbon naturel aux saveurs douces et originales.'),
(18, 'Lavande', 'Nature & Bien-être', 'violet', 17.99, 'img/vrai_image/lavande.png', 'Bonbon naturel aux saveurs douces et originales.'),
(19, 'Miel de Provence', 'Nature & Bien-être', 'violet', 17.99, 'img/vrai_image/miel_de_provence.png', 'Bonbon naturel aux saveurs douces et originales.'),
(20, 'Fleur d\'oranger', 'Nature & Bien-être', 'violet', 17.99, 'img/vrai_image/fleur_doranger.png', 'Bonbon naturel aux saveurs douces et originales.'),
(23, 'Orange', 'Agrumes de Provence', 'jaune', 15.99, 'img/vrai_image/orange', 'Au saveur de fruits locaux, cultivés ...'),
(24, 'figue', 'Fruits du Verger', 'bleu', 17.99, 'img/vrai_image/figue.png', 'Au saveur de fruits locaux, cultivés ...'),
(25, 'figue', 'Traditions Gourmandes', 'orange', 15.55, 'img/vrai_image/figue.png', 'Au saveur de fruits locaux, cultivés ...');

-- --------------------------------------------------------

--
-- Structure de la table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantite` int DEFAULT NULL,
  `date_de_modification` date DEFAULT NULL,
  `confiserie_id` int NOT NULL,
  `boutique_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `boutique_id` (`boutique_id`),
  KEY `confiserie_id` (`confiserie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=190 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stocks`
--

INSERT INTO `stocks` (`id`, `quantite`, `date_de_modification`, `confiserie_id`, `boutique_id`) VALUES
(68, 3, '2026-06-23', 1, 1),
(69, 3, '2026-06-23', 2, 1),
(70, 3, '2026-06-23', 3, 1),
(71, 3, '2026-06-23', 4, 1),
(72, 2, '2026-06-23', 5, 1),
(73, 2, '2026-06-23', 6, 1),
(74, 2, '2026-06-23', 7, 1),
(75, 2, '2026-06-23', 8, 1),
(76, 1, '2026-06-23', 9, 1),
(77, 1, '2026-06-23', 10, 1),
(78, 1, '2026-06-23', 11, 1),
(79, 1, '2026-06-23', 12, 1),
(80, 3, '2026-06-23', 13, 1),
(81, 3, '2026-06-23', 14, 1),
(82, 3, '2026-06-23', 15, 1),
(83, 3, '2026-06-23', 16, 1),
(84, 4, '2026-06-23', 17, 1),
(85, 4, '2026-06-23', 18, 1),
(86, 4, '2026-06-23', 19, 1),
(87, 4, '2026-06-23', 20, 1),
(88, 3, '2026-06-23', 1, 2),
(89, 3, '2026-06-23', 2, 2),
(90, 3, '2026-06-23', 3, 2),
(91, 3, '2026-06-23', 4, 2),
(92, 3, '2026-06-23', 5, 2),
(93, 3, '2026-06-23', 6, 2),
(94, 2, '2026-06-23', 7, 2),
(95, 2, '2026-06-23', 8, 2),
(96, 1, '2026-06-23', 9, 2),
(97, 1, '2026-06-23', 10, 2),
(98, 1, '2026-06-23', 11, 2),
(99, 1, '2026-06-23', 12, 2),
(100, 3, '2026-06-23', 13, 2),
(101, 3, '2026-06-23', 14, 2),
(102, 3, '2026-06-23', 15, 2),
(103, 3, '2026-06-23', 16, 2),
(104, 4, '2026-06-23', 17, 2),
(105, 4, '2026-06-23', 18, 2),
(106, 4, '2026-06-23', 19, 2),
(107, 4, '2026-06-23', 20, 2),
(108, 3, '2026-06-23', 1, 3),
(109, 3, '2026-06-23', 2, 3),
(110, 3, '2026-06-23', 3, 3),
(111, 3, '2026-06-23', 4, 3),
(112, 2, '2026-06-23', 5, 3),
(113, 2, '2026-06-23', 6, 3),
(114, 2, '2026-06-23', 7, 3),
(115, 2, '2026-06-23', 8, 3),
(116, 1, '2026-06-23', 9, 3),
(117, 1, '2026-06-23', 10, 3),
(118, 1, '2026-06-23', 11, 3),
(119, 1, '2026-06-23', 12, 3),
(120, 3, '2026-06-23', 13, 3),
(121, 3, '2026-06-23', 14, 3),
(122, 3, '2026-06-23', 15, 3),
(123, 3, '2026-06-23', 16, 3),
(124, 4, '2026-06-23', 17, 3),
(125, 4, '2026-06-23', 18, 3),
(126, 4, '2026-06-23', 19, 3),
(127, 4, '2026-06-23', 20, 3),
(128, 3, '2026-06-23', 1, 4),
(129, 3, '2026-06-23', 2, 4),
(130, 3, '2026-06-23', 3, 4),
(131, 3, '2026-06-23', 4, 4),
(132, 2, '2026-06-23', 5, 4),
(133, 2, '2026-06-23', 6, 4),
(134, 2, '2026-06-23', 7, 4),
(135, 2, '2026-06-23', 8, 4),
(136, 1, '2026-06-23', 9, 4),
(137, 1, '2026-06-23', 10, 4),
(138, 1, '2026-06-23', 11, 4),
(139, 1, '2026-06-23', 12, 4),
(140, 3, '2026-06-23', 13, 4),
(141, 3, '2026-06-23', 14, 4),
(142, 3, '2026-06-23', 15, 4),
(143, 3, '2026-06-23', 16, 4),
(144, 4, '2026-06-23', 17, 4),
(145, 4, '2026-06-23', 18, 4),
(146, 4, '2026-06-23', 19, 4),
(147, 4, '2026-06-23', 20, 4),
(148, 3, '2026-06-23', 1, 5),
(149, 3, '2026-06-23', 2, 5),
(150, 3, '2026-06-23', 3, 5),
(151, 3, '2026-06-23', 4, 5),
(152, 2, '2026-06-23', 5, 5),
(153, 2, '2026-06-23', 6, 5),
(154, 2, '2026-06-23', 7, 5),
(155, 2, '2026-06-23', 8, 5),
(156, 1, '2026-06-23', 9, 5),
(157, 1, '2026-06-23', 10, 5),
(158, 1, '2026-06-23', 11, 5),
(159, 1, '2026-06-23', 12, 5),
(160, 3, '2026-06-23', 13, 5),
(161, 3, '2026-06-23', 14, 5),
(162, 3, '2026-06-23', 15, 5),
(163, 3, '2026-06-23', 16, 5),
(164, 4, '2026-06-23', 17, 5),
(165, 4, '2026-06-23', 18, 5),
(166, 4, '2026-06-23', 19, 5),
(167, 4, '2026-06-23', 20, 5),
(168, 3, '2026-06-23', 1, 6),
(169, 3, '2026-06-23', 2, 6),
(170, 3, '2026-06-23', 3, 6),
(171, 3, '2026-06-23', 4, 6),
(172, 2, '2026-06-23', 5, 6),
(173, 2, '2026-06-23', 6, 6),
(174, 2, '2026-06-23', 7, 6),
(175, 2, '2026-06-23', 8, 6),
(176, 1, '2026-06-23', 9, 6),
(177, 1, '2026-06-23', 10, 6),
(178, 1, '2026-06-23', 11, 6),
(179, 1, '2026-06-23', 12, 6),
(180, 3, '2026-06-23', 13, 6),
(181, 3, '2026-06-23', 14, 6),
(182, 3, '2026-06-23', 15, 6),
(183, 3, '2026-06-23', 16, 6),
(184, 4, '2026-06-23', 17, 6),
(185, 4, '2026-06-23', 18, 6),
(186, 4, '2026-06-23', 19, 6),
(187, 4, '2026-06-23', 20, 6);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ddn` date NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `num_tel` (`num_tel`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `password`, `email`, `num_tel`, `role`, `nom`, `prenom`, `ddn`, `adresse`) VALUES
(1, 'alice', '$2y$10$zteFjHOPYoTHdklJ/kV0DuhHYgm.YJy6OFSlcu64mhpIa7DFvo9RK', 'alice@example.com', NULL, 'admin', 'Dumoulin', 'Alice', '1982-11-26', NULL),
(2, 'charlie', '$2y$10$AWbICtMhjcKadTJ5MBoYPOkWgGNQTQANFPGDavWl7HMIO0o5YnkoC', 'charlie@example.com', NULL, 'client', 'Elachocoleterie', 'Charlie', '1997-01-12', NULL),
(3, 'bob', '$2y$10$1MwDuefwzeMmuCIVZ3PP6.fjKJn.jEBUvtS.vFbeOgPYOhQ7xJf.q', 'bob@example.com', NULL, 'gerant', 'Kinsey', 'Robert', '1982-10-12', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
