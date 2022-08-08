-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 21 août 2021 à 10:46
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydatabase_groupe1`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(3) NOT NULL,
  `id_membre` int(3) NOT NULL,
  `montant` int(3) NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_membre`, `montant`, `date_enregistrement`, `etat`) VALUES
(16, 7, 85000, '2021-08-18 13:34:22', 'en cours de traitement');

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE `details_commande` (
  `id_details_commande` int(3) NOT NULL,
  `id_commande` int(3) NOT NULL,
  `id_produit` int(3) NOT NULL,
  `quantite` int(3) NOT NULL,
  `prix` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `details_commande`
--

INSERT INTO `details_commande` (`id_details_commande`, `id_commande`, `id_produit`, `quantite`, `prix`) VALUES
(16, 16, 43, 17, 5000);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(3) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `civilite` enum('m','f') NOT NULL,
  `ville` varchar(20) NOT NULL,
  `code_postal` int(5) UNSIGNED ZEROFILL NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `statut`) VALUES
(1, 'Administrateur', 'admin', 'Admin', 'admin', 'admin@admin.com', 'm', 'KARA', 04301, 'Kara-Agnaram', 1),
(6, 'cesarcesar', 'benediction', 'gANTIN', 'cesar', 'sebastianogantin@gmail.com', 'm', 'kara-togo', 22668, 'Lama-TOGO', 0),
(7, 'gerbo', '1234', 'akarim', 'aguere', 'akarimgerbo11@gmail.com', 'm', 'kara-togo', 22811, 'kara-lama', 0),
(8, 'jean', '1234', 'BODJONA', 'jean-christ', 'jeanchristbodjona@gmail.com', 'm', 'kara-togo', 22811, 'kara-lama', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(3) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `taille` varchar(5) NOT NULL,
  `public` enum('m','f','mixte') NOT NULL,
  `photo` varchar(250) NOT NULL,
  `prix` int(3) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `public`, `photo`, `prix`, `stock`) VALUES
(1, 'V', 'Vêtements', 'VesteRouge', 'Idéale pour vos sortis.', 'rouge', 'L', 'm', '/SITE/img/vestRouge.jpg', 50000, 50),
(3, 'S', 'Vêtements', 'CostumeBlanc', 'Parfait pour des balades de soirées.', 'Vert', 'L', 'm', '/SITE/img/costume2.jpg', 3000, 20),
(28, 'C', 'Vêtements', 'Costume', 'Ce costume, est presque comme ceux sportif\r\nvous pouvez le porter aussi pour des randonnes.', 'Blanche', 'L', 'mixte', '/SITE/img/costume1.jpg', 4000, 40),
(40, 'P', 'Vêtements', 'CostumeNoir', 'Peut être utilisé a des fins sportifs', 'Noir', 'M', 'f', '/SITE/img/images9.jpg', 2000, 30),
(41, 'R', 'Vêtements', 'robefille', 'Une jolie robe pou votre petite fille.', 'Rouge', 's', 'f', '/SITE/img/robefille.jpg', 4000, 40),
(42, 'T', 'Vêtements', 'pull-over', 'Mettez ceci pour vous protéger un peu du froid', 'Noir', 'L', 'f', '/SITE/img/images8.jpg', 4000, 0),
(43, 'H', 'Chaussures', 'Melvin-buezo', 'Tres cool et assortis pour tout vos type d\'exercices sportifs', 'Jaune', 'M', 'mixte', '/SITE/img/melvin-buezo.jpg', 5000, 50),
(44, 'A', 'Chaussures', 'chaussure2', 'Des pairs excitant, avec ses chaussures vous pouvez faire tout.', 'Café', 'L', 'm', '/SITE/img/chaussure2.jpg', 5000, 30),
(45, 'L', 'Chaussures', 'shoe1', 'Cette pair est nouvellement arrivé dans notre boutique', 'Bleu', 'L', 'm', '/SITE/img/shoes.png', 4500, 40),
(46, 'U', 'Chaussures', 'haut-talons', 'Rien de plus intéressant! les femmes', 'Noir', 'M', 'f', '/SITE/img/Sh-f.jpg', 8500, 20),
(47, 'M', 'Chaussures', 'haut-talons2', 'Eh oui, venez découvrir ces beaux pairs de hauts talons, rayonner vos pieds avec.', 'Jaune', 'L', 'f', '/SITE/img/ht.jpg', 6500, 55),
(48, 'E', 'Chaussures', 'shoe1', 'Tres bon pour les courses', 'Blanc-noir', 'M', 'm', '/SITE/img/sh1.jpg', 7000, 20),
(49, '', 'Mobiles', 'apple', 'La dernière version de l\'Android apple. Amusez vous avec des selfies palpitants', 'Noir', '', 'mixte', '/SITE/img/apple.jpg', 88000, 45),
(50, 'HI', 'Mobiles', 'Galaxy', 'L\'Android marque Galaxy a votre porté ne le raté pas!', 'Blanc', '', 'mixte', '/SITE/img/honor.jpg', 65000, 40),
(51, 'IH', 'Mobiles', 'INFINIX', 'Nouveauté!! Nouvellement disponible dans notre gamme de mobiles android.', 'Orange', '', 'mixte', '/SITE/img/por2.jpg', 98000, 50),
(52, 'IT', 'Mobiles', 'TECNO_POP', 'Nouvelle version de la marque tecno.', 'Vert', '', 'mixte', '/SITE/img/por0.jpg', 78000, 25),
(53, 'TI', 'Mobiles', 'ITEL_P', 'La marque nouvellle d\'ITEL pour vous!', 'bleue', '', 'mixte', '/SITE/img/por3.jpg', 70000, 34),
(54, 'THI', 'Mobiles', 'SMARTPHONE', 'Les nouveaux smartphones. Venez et tester', 'Blanc', '', 'mixte', '/SITE/img/smartphone.png', 85000, 20),
(55, 'NI', 'Mobiles', 'NIKE', 'Le model des androids de marque Nike', 'Blanche', '', 'mixte', '/SITE/img/por5.jpg', 60000, 19),
(56, 'Tm', 'Montres', 'Closeup_Watch', 'Une montre haute gamme', 'or', '', 'f', '/SITE/img/closeup.jpg', 25000, 38),
(57, 'Sc', 'Sacs', 'Sac de main', 'Ce sac peut vous aider en tant que prte monaie si vous le souhaiter.', 'Noir', '', 'f', '/SITE/img/Bag_sa4.jpg', 20000, 48),
(58, 'Mt', 'Montres', 'Montre1', 'Une montre assez simple de manipulation', 'doree', '', 'm', '/SITE/img/montre1.jpg', 15000, 31),
(59, 'Sd', 'Sacs', 'Sac avec son complet', 'CE complet, vous aurez tout en un', 'Blanche', '', 'f', '/SITE/img/BG-W_sa6.jpg', 18000, 37),
(64, 'To', 'Montres', 'Montre2', 'Cette gamme de montre est featured', 'rouge', '', 'm', '/SITE/img/mt8.jpg', 10000, 61),
(65, 'CA', 'Sacs', 'Sac9', 'Un bon petit sac pour vos petits sortis', 'Rose', '', 'f', '/SITE/img/sa9.jpg', 12000, 32),
(66, 'MON', 'Montres', 'Montre3', 'Une montre assez bonne pour votre poigné monsieur!', 'doree', '', 'm', '/SITE/img/mt2.jpg', 9500, 50),
(67, 'cs', 'Sacs', 'Sac 7', 'Assez simple a tenir pour vos chopping', 'café', '', 'f', '/SITE/img/sa7.jpg', 5500, 25),
(68, 'Se', 'Montres', 'Smartwatch', 'un tout petit montre mais qui contient des fonctionnalités pas possible.', 'Noir', '', 'mixte', '/SITE/img/smartwatch.jpg', 35000, 30),
(69, 'Ac', 'Sacs', 'Sac 8', 'Assez commode', 'Noir', '', 'f', '/SITE/img/sa8.jpg', 4000, 34),
(70, 'Rs', 'Montres', 'Smartwatch2', 'Ce petit model de montre fait des merveilles', 'Noir', '', 'mixte', '/SITE/img/smartwatch.jpg', 35000, 40),
(71, 'As', 'Sacs', 'Sac 3', 'Des sacs pour vous aider!', 'Noir-Rouge', '', 'f', '/SITE/img/sa3.jpg', 18000, 37);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`id_details_commande`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`),
  ADD UNIQUE KEY `reference` (`reference`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `id_details_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
