-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 08 fév. 2024 à 15:53
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jeu de donnees`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `ID_entreprise` int NOT NULL,
  `Numéro_de_siret_entreprise` bigint NOT NULL,
  `Ville_de_l_entreprise` varchar(50) DEFAULT NULL,
  `Nom_de_l_entreprise` varchar(50) NOT NULL,
  `Mot_de_passe_email_entreprise` varchar(255) NOT NULL,
  `Email_entreprise` varchar(50) NOT NULL,
  `Adresse_de_l_entreprise` varchar(50) NOT NULL,
  `Code_postal_de_l_entreprise` int NOT NULL,
  `Image_de_l_entreprise` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`ID_entreprise`, `Numéro_de_siret_entreprise`, `Ville_de_l_entreprise`, `Nom_de_l_entreprise`, `Mot_de_passe_email_entreprise`, `Email_entreprise`, `Adresse_de_l_entreprise`, `Code_postal_de_l_entreprise`, `Image_de_l_entreprise`) VALUES
(1, 54896723589456, 'Vernon', 'Nati-V', 'NativPassword', 'nativcompany@gmail.com', '17 rue Albufera', 27200, ''),
(2, 98765432100002, 'Vernon', 'SportStore', 'SportStorePassword', 'sportstore@gmail.com', '18 rue Albufera', 27200, ''),
(45, 14151614151746, 'Rouen', 'stann', '$2y$10$SkiNmU/gp1x.2CM4xlNN7..031zwJkcBb/E59EOg6BPf61JF/SrM6', 'stann@gmail.com', '2 rue de la briqueterie', 27200, 'defaut.jpg'),
(46, 14785236914785, 'Vernon', 'homeless', '$2y$10$Y6oUMTlzBAFCXTC6WDpmgul2szfhmBUzr8/k0SuuwhnmZCorB8b96', 'homeless-shoes@gmail.com', '5 rue de la gourgandine ', 74585, 'defaut.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `ID_evenement` int NOT NULL,
  `Nom_de_l_evenement` varchar(50) NOT NULL,
  `Date_de_debut` datetime NOT NULL,
  `Date_de_fin_de_l_evenement` datetime NOT NULL,
  `Description_de_l_evenement` varchar(250) NOT NULL,
  `Image_de_l_evenement` varchar(50) DEFAULT NULL,
  `ID_entreprise` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`ID_evenement`, `Nom_de_l_evenement`, `Date_de_debut`, `Date_de_fin_de_l_evenement`, `Description_de_l_evenement`, `Image_de_l_evenement`, `ID_entreprise`) VALUES
(1, 'Cross Week', '2024-01-01 10:00:00', '2024-03-01 10:00:00', 'Un événement pour promouvoir la santé et le bien-être à travers la marche et le vélo.', NULL, 2),
(2, 'Health month', '2024-01-01 10:00:00', '2024-01-01 10:00:00', 'Un événement pour promouvoir la santé et le bien-être à travers la marche et le vélo.', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `moderateur`
--

CREATE TABLE `moderateur` (
  `ID_moderateur` int NOT NULL,
  `Email_moderateur` varchar(50) NOT NULL,
  `Mot_de_passe_moderateur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `moderateur`
--

INSERT INTO `moderateur` (`ID_moderateur`, `Email_moderateur`, `Mot_de_passe_moderateur`) VALUES
(1, 'ricardo.remond.dev@gmail.com', 'Ricardo27');

-- --------------------------------------------------------

--
-- Structure de la table `trajets_de_l_utilisateur`
--

CREATE TABLE `trajets_de_l_utilisateur` (
  `ID_trajet` int NOT NULL,
  `Date_du_trajet` datetime NOT NULL,
  `Distance_parcourue` float NOT NULL,
  `Duree_du_trajet` time NOT NULL,
  `Image_trajet` varchar(50) DEFAULT NULL,
  `ID_vehicule` int NOT NULL,
  `ID_utilisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `trajets_de_l_utilisateur`
--

INSERT INTO `trajets_de_l_utilisateur` (`ID_trajet`, `Date_du_trajet`, `Distance_parcourue`, `Duree_du_trajet`, `Image_trajet`, `ID_vehicule`, `ID_utilisateur`) VALUES
(19, '2024-01-10 08:00:00', 5.2, '00:30:00', 'image_trajet1.jpg', 1, 1),
(20, '2024-01-12 09:30:00', 3.8, '00:20:00', 'image_trajet2.jpg', 2, 2),
(21, '2024-01-11 10:45:00', 6.5, '00:40:00', 'image_trajet3.jpg', 1, 3),
(22, '2024-01-14 12:15:00', 4.2, '00:25:00', 'image_trajet4.jpg', 2, 4),
(23, '2024-01-13 14:00:00', 8, '00:50:00', 'image_trajet5.jpg', 1, 5),
(24, '2024-01-16 15:30:00', 2.5, '00:15:00', 'image_trajet6.jpg', 2, 6),
(25, '2024-01-10 08:00:00', 7.1, '00:45:00', 'image_trajet7.jpg', 1, 1),
(26, '2024-01-12 09:30:00', 4.9, '00:30:00', 'image_trajet8.jpg', 2, 2),
(27, '2024-01-11 10:45:00', 6.8, '00:40:00', 'image_trajet9.jpg', 1, 3),
(28, '2024-01-10 08:00:00', 5.5, '00:32:00', 'image_trajet10.jpg', 1, 4),
(29, '2024-01-11 10:45:00', 4, '00:22:00', 'image_trajet11.jpg', 2, 5),
(30, '2024-01-12 09:30:00', 6.3, '00:38:00', 'image_trajet12.jpg', 1, 6),
(31, '2024-01-14 12:15:00', 3.6, '00:18:00', 'image_trajet13.jpg', 2, 1),
(32, '2024-01-13 14:00:00', 7.5, '00:48:00', 'image_trajet14.jpg', 1, 2),
(33, '2024-01-16 15:30:00', 2, '00:12:00', 'image_trajet15.jpg', 2, 3),
(34, '2024-01-10 08:00:00', 7.8, '00:50:00', 'image_trajet16.jpg', 1, 4),
(35, '2024-01-12 09:30:00', 5.1, '00:28:00', 'image_trajet17.jpg', 2, 5),
(36, '2024-01-11 10:45:00', 6, '00:35:00', 'image_trajet18.jpg', 1, 6),
(37, '2024-01-14 12:15:00', 4.4, '00:25:00', 'image_trajet19.jpg', 2, 1),
(38, '2024-01-13 14:00:00', 6.7, '00:42:00', 'image_trajet20.jpg', 1, 2),
(39, '2024-01-16 15:30:00', 3.3, '00:18:00', 'image_trajet21.jpg', 2, 3),
(63, '2024-02-23 18:06:00', 2.8, '20:06:00', 'image_trajet_par_defaut.jpg', 3, 58),
(64, '2024-02-22 18:33:00', 0.6, '19:33:00', 'image_trajet_par_defaut.jpg', 3, 58),
(65, '2024-02-22 18:33:00', 0.6, '19:33:00', 'image_trajet_par_defaut.jpg', 3, 58),
(66, '2024-02-27 18:38:00', 1.3, '20:39:00', 'image_trajet_par_defaut.jpg', 3, 58),
(67, '2024-02-07 18:40:00', 1.7, '20:40:00', 'image_trajet_par_defaut.jpg', 3, 58),
(68, '2024-02-07 18:40:00', 1.7, '20:40:00', 'image_trajet_par_defaut.jpg', 3, 58),
(69, '2024-02-16 22:00:00', 52.2, '12:09:00', 'image_trajet_par_defaut.jpg', 4, 66),
(70, '2024-02-07 16:22:00', 25, '17:26:00', 'image_trajet_par_defaut.jpg', 1, 69),
(73, '2024-02-05 16:25:00', 152, '12:40:00', 'image_trajet_par_defaut.jpg', 4, 70);

-- --------------------------------------------------------

--
-- Structure de la table `transport_pris_en_compte_par_l_event`
--

CREATE TABLE `transport_pris_en_compte_par_l_event` (
  `ID_relation` int NOT NULL,
  `ID_evenement` int DEFAULT NULL,
  `ID_vehicule` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `transport_pris_en_compte_par_l_event`
--

INSERT INTO `transport_pris_en_compte_par_l_event` (`ID_relation`, `ID_evenement`, `ID_vehicule`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 1),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `type_de_transport`
--

CREATE TABLE `type_de_transport` (
  `ID_vehicule` int NOT NULL,
  `RIDE_TYPE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type_de_transport`
--

INSERT INTO `type_de_transport` (`ID_vehicule`, `RIDE_TYPE`) VALUES
(1, 'Velo'),
(2, 'Trottinette'),
(3, 'Marche'),
(4, 'Rollers'),
(5, 'Skate');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_utilisateur` int NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Date_de_naissance` date NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Mot_de_passe_utilisateur` varchar(255) NOT NULL,
  `Photo_de_profil` varchar(50) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Utilisateur_valide` tinyint(1) NOT NULL,
  `ID_entreprise` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_utilisateur`, `Pseudo`, `Nom`, `Prenom`, `Date_de_naissance`, `Email`, `Mot_de_passe_utilisateur`, `Photo_de_profil`, `Description`, `Utilisateur_valide`, `ID_entreprise`) VALUES
(1, 'Captn Rickson', 'Papy', 'Ricardo', '1999-08-19', 'ricardo.remond.pro@gmail.com', 'ricardo27', 'img-profil-defaut.png', 'Petite description', 1, 1),
(2, 'Mlddb', 'Papy', 'Malado', '1999-08-16', 'malado.djiby@gmail.com', 'mlddb27200', 'img-profil-defaut.png', 'Petite description', 1, 1),
(3, 'Utilisateur3', 'Papy', 'Michel', '2000-03-03', 'user3@example.com', 'MotDePasse3', 'img-profil-defaut.png', 'Petite description', 1, 1),
(4, 'Utilisateur4', 'Papy', 'Paul', '1985-04-04', 'user4@example.com', 'MotDePasse4', 'img-profil-defaut.png', 'Petite description', 1, 2),
(5, 'Utilisateur5', 'Papy', 'Louis', '1993-05-05', 'user5@example.com', 'MotDePasse5', 'img-profil-defaut.png', 'Petite description', 1, 2),
(6, 'Utilisateur6', 'Papy', 'Jean', '1998-06-06', 'user6@example.com', 'MotDePasse6', 'img-profil-defaut.png', 'Petite description', 1, 2),
(58, 'fonfon', 'michou', 'coco', '1997-06-18', 'michoucoco@gmail.com', '$2y$10$/zRpvDAODgJpUqAc.s62Rep2D2Y70SOTxie2f1Vffz436blKbiQ.O', '58_profile_photo.jpg', 'Enchanté Moi c\'est Michou, j\'ai 26 ans et si tu veux en savoir plus je t\'invite a m\'envoyer un message ', 1, 2),
(65, '123456789', 'coco', 'ygfvghju', '2024-01-27', '123456@live.fr', '$2y$10$nZK3v2s0TtR6so1F8.TGy.VBxQl6NGMWVj0KC963jMLPaYBoEsDja', '65_profile_photo.jpg', 'Petite description', 1, 2),
(66, 'samsonite', 'sam', 'sung', '1981-07-31', 'samsonite@gmail.com', '$2y$10$jk4MePNMAE4TMSm307Ny.ejBn.ONMIsoJU60xOzIxf1htECOaCFMa', 'img-profil-defaut.png', NULL, 1, 2),
(67, 'apple', 'aaah', 'ppleee', '2024-02-15', 'apple@live.fr', '$2y$10$Fn33n9My2eGarUP01GVLE.M5P0azyYaslUqeW2v2mBcwS.pMd.C/S', 'img-profil-defaut.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem dolorum ut natus itaque quisquam perspiciatis re.', 1, 2),
(68, 'tata', '&lt;u&gt;BOOOOOOOO&lt;/u&gt;', 'Ken', '2024-01-30', 'ken@mail.fr', '$2y$10$LKzUWPb9vHukwT3K3QB0.ewcdCDrfix4okQ7LIIA19/OCfoAkDbs.', '68_profile_photo.jpg', 'J\'adore me tatane contre Ryu', 1, 2),
(69, 'biz', 'toto', 'titi', '2000-08-01', 'rt@gmail.com', '$2y$10$h1r7OsQlwLZ.OQ2hFlVY.O7R8RrDNL.htjYkwG/3Tl4iEc8Ou721O', 'img-profil-defaut.png', NULL, 1, 2),
(70, 'LNwarrior', 'Poirier-Halley', 'HELENE', '1949-02-08', 'poirier.helene@outlook.fr', '$2y$10$DGznTIuTk7Al6.VLS6kZmu852QXLEmB2Uv1vVxBgLgsw0peL.yAc6', '70_profile_photo.jpg', NULL, 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`ID_entreprise`),
  ADD UNIQUE KEY `Numéro_de_siret_entreprise` (`Numéro_de_siret_entreprise`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`ID_evenement`),
  ADD KEY `ID_entreprise` (`ID_entreprise`);

--
-- Index pour la table `moderateur`
--
ALTER TABLE `moderateur`
  ADD PRIMARY KEY (`ID_moderateur`),
  ADD UNIQUE KEY `Email_moderateur` (`Email_moderateur`);

--
-- Index pour la table `trajets_de_l_utilisateur`
--
ALTER TABLE `trajets_de_l_utilisateur`
  ADD PRIMARY KEY (`ID_trajet`),
  ADD KEY `ID_vehicule` (`ID_vehicule`),
  ADD KEY `ID_utilisateur` (`ID_utilisateur`);

--
-- Index pour la table `transport_pris_en_compte_par_l_event`
--
ALTER TABLE `transport_pris_en_compte_par_l_event`
  ADD PRIMARY KEY (`ID_relation`),
  ADD KEY `ID_evenement` (`ID_evenement`),
  ADD KEY `ID_vehicule` (`ID_vehicule`);

--
-- Index pour la table `type_de_transport`
--
ALTER TABLE `type_de_transport`
  ADD PRIMARY KEY (`ID_vehicule`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_utilisateur`),
  ADD UNIQUE KEY `Pseudo` (`Pseudo`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `ID_entreprise` (`ID_entreprise`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `ID_entreprise` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `ID_evenement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `moderateur`
--
ALTER TABLE `moderateur`
  MODIFY `ID_moderateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `trajets_de_l_utilisateur`
--
ALTER TABLE `trajets_de_l_utilisateur`
  MODIFY `ID_trajet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `transport_pris_en_compte_par_l_event`
--
ALTER TABLE `transport_pris_en_compte_par_l_event`
  MODIFY `ID_relation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `type_de_transport`
--
ALTER TABLE `type_de_transport`
  MODIFY `ID_vehicule` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_utilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`ID_entreprise`) REFERENCES `entreprise` (`ID_entreprise`);

--
-- Contraintes pour la table `trajets_de_l_utilisateur`
--
ALTER TABLE `trajets_de_l_utilisateur`
  ADD CONSTRAINT `trajets_de_l_utilisateur_ibfk_1` FOREIGN KEY (`ID_vehicule`) REFERENCES `type_de_transport` (`ID_vehicule`),
  ADD CONSTRAINT `trajets_de_l_utilisateur_ibfk_2` FOREIGN KEY (`ID_utilisateur`) REFERENCES `utilisateur` (`ID_utilisateur`);

--
-- Contraintes pour la table `transport_pris_en_compte_par_l_event`
--
ALTER TABLE `transport_pris_en_compte_par_l_event`
  ADD CONSTRAINT `transport_pris_en_compte_par_l_event_ibfk_1` FOREIGN KEY (`ID_evenement`) REFERENCES `evenement` (`ID_evenement`),
  ADD CONSTRAINT `transport_pris_en_compte_par_l_event_ibfk_2` FOREIGN KEY (`ID_vehicule`) REFERENCES `type_de_transport` (`ID_vehicule`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`ID_entreprise`) REFERENCES `entreprise` (`ID_entreprise`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
