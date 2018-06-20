-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 20 juin 2018 à 20:02
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `seminaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `usr` varchar(255) NOT NULL,
  `pswd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `usr`, `pswd`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure de la table `atelier`
--

CREATE TABLE `atelier` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `name_atelier` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `desc_atelier` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `atelier`
--

INSERT INTO `atelier` (`id`, `id_event`, `name_atelier`, `desc_atelier`) VALUES
(29, 22, 'Atelier 1', 'Quievere accolas transgressi cassum corporum cassum tardius pro pertulere rumores flexuosas nimia Melanis lucem muro.\r\n'),
(30, 22, 'Atelier 2', 'Quievere accolas transgressi cassum corporum cassum tardius pro pertulere rumores flexuosas nimia Melanis lucem muro.\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name_ev` varchar(255) NOT NULL,
  `desc_ev` varchar(1080) NOT NULL,
  `dej` varchar(3) NOT NULL,
  `din` varchar(3) NOT NULL,
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  `nbr_atelier` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_ev` date NOT NULL,
  `total_note` int(255) NOT NULL,
  `avg` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `name_ev`, `desc_ev`, `dej`, `din`, `lat`, `lon`, `nbr_atelier`, `logo`, `address`, `date_ev`, `total_note`, `avg`) VALUES
(21, 'Seminaire 2', 'Id aperta discessurum: parceretur non malivolus metuens coalitos pro cum coalitos id malivolus discessurum: metuens\r\n', 'oui', 'non', 47.3302, 5.05253, 1, 'src/img/logos/8651.jpg', '2 G Rue Général Delaborde, 21000 Dijon, France', '2018-06-23', 0, 0),
(22, 'Seminaire 1', 'Quievere accolas transgressi cassum corporum cassum tardius pro pertulere rumores flexuosas nimia Melanis lucem muro.\r\n', 'non', 'oui', 47.3125, 5.06985, 2, 'src/img/logos/862277.jpg', '12 Avenue Alain Savary, 21000 Dijon, France', '2018-06-08', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `fonction` varchar(64) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `dej` varchar(8) NOT NULL,
  `din` varchar(8) NOT NULL,
  `particip` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`id`, `id_event`, `name`, `lastname`, `fonction`, `tel`, `mail`, `dej`, `din`, `particip`) VALUES
(14, 21, 'Pheulpin', 'Marceau', 'Devloppeur', '0659986735', 'marceau.pheulpin@gmail.com', 'non', 'non', 'oui'),
(16, 22, 'Zahibi', 'Lazhar', 'Webdesigner', '0659986735', 'lazahibi@gmail.com', 'non', 'non', 'oui'),
(17, 22, 'Pheulpin', 'Marceau', 'Developpeur', '0659986735', 'marceau.pheulpin@gmail.com', 'non', 'oui', 'oui'),
(18, 22, 'Lebihan', 'Anne-Lyse', 'developpeuse', '0658497865', 'annelyse.lebihan@gmail.com', 'non', 'oui', 'oui'),
(19, 21, 'Poitrasson', 'Sebastien', 'Formateur', '0666654889', 'sebastien.poitrasson@gmail.com', 'non', 'non', 'non');

-- --------------------------------------------------------

--
-- Structure de la table `satisfaction`
--

CREATE TABLE `satisfaction` (
  `id` int(11) NOT NULL,
  `id_atelier` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `satisfaction`
--

INSERT INTO `satisfaction` (`id`, `id_atelier`, `id_event`, `note`) VALUES
(1, 0, 0, 2),
(2, 0, 22, 4),
(3, 11, 22, 4),
(4, 12, 22, 5),
(5, 0, 22, 4),
(6, 17, 22, 3),
(7, 18, 22, 4),
(8, 0, 22, 3),
(9, 29, 22, 0),
(10, 30, 22, 3),
(11, 0, 22, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `atelier`
--
ALTER TABLE `atelier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `satisfaction`
--
ALTER TABLE `satisfaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `atelier`
--
ALTER TABLE `atelier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `satisfaction`
--
ALTER TABLE `satisfaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
