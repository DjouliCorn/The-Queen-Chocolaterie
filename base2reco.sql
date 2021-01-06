-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 06 jan. 2021 à 10:28
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chocolaterie`
--

-- --------------------------------------------------------

--
-- Structure de la table `Categories`
--

CREATE TABLE `Categories` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` char(50) DEFAULT NULL,
  `descriptionProd` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Categories`
--

INSERT INTO `Categories` (`idCategorie`, `nomCategorie`, `descriptionProd`) VALUES
(1, 'Chocolat noir', 'Contient un minimum de 43% de cacao'),
(2, 'Chocolat au lait', 'Contient un minimum de 25% de cacao sec dégraissé, 14% de lait en poudre et 25% de matières grasses'),
(3, 'Chocolat blanc', 'Contient au moins 20% de beurre de cacao et 14% de produits lactiques secs, dont 3,5% de matière grasse lactique.'),
(4, 'Chocolat blond', 'Destiné à enrober des fourrages pour confectionner des pâtisseries ou des bonbons au chocolat'),
(5, 'Chocolat de couverture', 'Destiné à enrober des fourrages pour confectionner des bonbons chocolat');

-- --------------------------------------------------------

--
-- Structure de la table `Produits`
--

CREATE TABLE `Produits` (
  `idProd` int(11) NOT NULL,
  `nomProd` char(50) DEFAULT NULL,
  `descriptionProd` text DEFAULT NULL,
  `prodEquitable` tinyint(1) DEFAULT NULL,
  `idCategorie` int(11) NOT NULL,
  `prix` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `promotion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Produits`
--

INSERT INTO `Produits` (`idProd`, `nomProd`, `descriptionProd`, `prodEquitable`, `idCategorie`, `prix`, `stock`, `promotion`) VALUES
(1, 'Truffe', 'Confiserie inventée par Louis Dufour', 1, 1, 0.5, 500, 0),
(2, 'Mon chéri', 'Confiserie à la liqueur de cerise', 0, 1, 1.5, 700, 1),
(3, 'Praliné croquant', 'Chocolat à base de pralin', 0, 2, 0.7, 300, 0),
(4, 'Mendiant noix', 'Confiserie avec une noix au-dessu', 1, 1, 0.3, 250, 0),
(5, 'Mendiant noisette', 'Confiserie avec une noisette au-dessus', 1, 2, 1.3, 250, 1),
(6, 'Mendiant zeste d’orange', 'Confiserie à l’orange avec un zeste d’orange au sommet', 0, 3, 0.4, 250, 1),
(7, 'Gianduja', 'Confiserie à base de chocolat et noisettes finement broyées', 1, 2, 2.5, 421, 0),
(8, 'Ferrero Rocher', 'Confiserie à base de chocolat, de nutella et noisettes finement broyée', 0, 2, 6.8, 340, 0),
(9, 'Oeufs en chocolat noir', 'Confiserie au chocolat noir', 0, 1, 3.99, 110, 0),
(10, 'Papillote Révillon', 'Bonbons au chocolat pour les fêtes', 0, 3, 3.4, 645, 0),
(11, 'Lindt Lindor', 'Coque chocolat au lait et garniture chocolat blanc crémeux', 0, 2, 7.89, 130, 1),
(12, 'Fèves cacao', 'Fèves pour l’enrobage en provenance du Guatemala', 1, 5, 7.2, 145, 0),
(13, 'Oeufs en chocolat', 'Confiserie au chocolat au lait', 0, 2, 3.99, 105, 0),
(14, 'Fèves cacao', 'Fèves pour l’enrobage en provenance de Madagascar', 1, 5, 7.9, 658, 0),
(15, 'Oeufs en chocolat blanc', 'Confiserie au chocolat noir', 0, 3, 3.99, 140, 0),
(16, 'Lapin en chocolat garni', 'Garni de 100g de bonbon de chocolat et de friture en chocolat assorti noir', 0, 1, 13.5, 89, 0),
(17, 'Tablette de chocolat', 'Tablette de chocolat à partager', 0, 4, 1.2, 453, 0),
(18, 'Orangettes', 'Confiserie à l’orange', 0, 1, 3, 30, 1),
(19, 'Bonbon Dulcey', 'Bonbon au chocolat avec un coeur de mandarine et une base en feuilletine', 0, 4, 6.25, 654, 1),
(20, 'Tablette de chocolat blond NESTLE', 'Tablette de chocolat blond aux noisettes et amandes entières', 0, 4, 2.89, 110, 0),
(21, 'Galak', 'Tablette avec un dauphin dessus', 0, 3, 1.23, 358, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `Produits`
--
ALTER TABLE `Produits`
  ADD PRIMARY KEY (`idProd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
