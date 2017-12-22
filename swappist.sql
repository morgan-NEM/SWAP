-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 20 Décembre 2017 à 10:39
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `swappist`
--

-- --------------------------------------------------------

--
-- Structure de la table `forum_categorie`
--

CREATE TABLE `forum_categorie` (
  `cat_id` int(11) NOT NULL,
  `cat_nom` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cat_ordre` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forum_categorie`
--

INSERT INTO `forum_categorie` (`cat_id`, `cat_nom`, `cat_ordre`) VALUES
(1, 'Général', 30),
(2, 'Jeux-Vidéos', 20),
(3, 'Autre', 10);

-- --------------------------------------------------------

--
-- Structure de la table `forum_forum`
--

CREATE TABLE `forum_forum` (
  `forum_id` int(11) NOT NULL,
  `forum_cat_id` mediumint(8) NOT NULL,
  `forum_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `forum_desc` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `forum_ordre` mediumint(8) NOT NULL,
  `forum_last_post_id` int(11) NOT NULL,
  `forum_topic` mediumint(8) NOT NULL,
  `forum_post` mediumint(8) NOT NULL,
  `auth_view` tinyint(4) NOT NULL,
  `auth_post` tinyint(4) NOT NULL,
  `auth_topic` tinyint(4) NOT NULL,
  `auth_annonce` tinyint(4) NOT NULL,
  `auth_modo` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forum_forum`
--

INSERT INTO `forum_forum` (`forum_id`, `forum_cat_id`, `forum_name`, `forum_desc`, `forum_ordre`, `forum_last_post_id`, `forum_topic`, `forum_post`, `auth_view`, `auth_post`, `auth_topic`, `auth_annonce`, `auth_modo`) VALUES
(1, 1, 'Présentation', 'Nouveau sur le forum? Venez vous présenter ici !', 60, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 'Les News', 'Les news du site sont ici', 50, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 1, 'Discussions générales', 'Ici on peut parler de tout sur tous les sujets', 40, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2, 'MMORPG', 'Parlez ici des MMORPG', 60, 8, 1, 1, 0, 0, 0, 0, 0),
(5, 2, 'Autres jeux', 'Forum sur les autres jeux', 50, 9, 1, 1, 0, 0, 0, 0, 0),
(6, 3, 'Loisir', 'Vos loisirs', 60, 7, 3, 7, 0, 0, 0, 0, 0),
(7, 3, 'Délires', 'Décrivez ici tous vos délires les plus fous', 50, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `forum_membres`
--

CREATE TABLE `forum_membres` (
  `membre_id` int(11) NOT NULL,
  `membre_pseudo` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_mdp` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_email` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_facebook` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `membre_siteweb` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `membre_avatar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `membre_signature` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `membre_localisation` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `membre_inscrit` int(11) DEFAULT NULL,
  `membre_derniere_visite` int(11) DEFAULT NULL,
  `membre_rang` tinyint(4) DEFAULT NULL,
  `membre_post` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forum_membres`
--

INSERT INTO `forum_membres` (`membre_id`, `membre_pseudo`, `membre_mdp`, `membre_email`, `membre_facebook`, `membre_siteweb`, `membre_avatar`, `membre_signature`, `membre_localisation`, `membre_inscrit`, `membre_derniere_visite`, `membre_rang`, `membre_post`) VALUES
(3, 'caca', 'd2104a400c7f629a197f33bb33fe80c0', 'caca@gmail.com', '', '', '', '        ', '', 1513755984, 1513755984, NULL, NULL),
(2, 'test2', 'ad0234829205b9033196ba818f7a872b', 'bla@bla.fr', '', '', '1513164791.png', 'La signature est limitÃ©e Ã  200 caractÃ¨res', '', 1513164791, 1513164791, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `forum_post`
--

CREATE TABLE `forum_post` (
  `post_id` int(11) NOT NULL,
  `post_createur` int(11) NOT NULL,
  `post_texte` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `post_time` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_forum_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forum_post`
--

INSERT INTO `forum_post` (`post_id`, `post_createur`, `post_texte`, `post_time`, `topic_id`, `post_forum_id`) VALUES
(1, 1, '[s]coucou[/s]', 1512990836, 0, 6),
(2, 1, '[s]test[/s]', 1512991118, 1, 6),
(3, 1, 'rÃ©ponse test', 1513158804, 1, 6),
(4, 1, 'reponse test2', 1513159628, 1, 6),
(5, 1, 'reponse test2', 1513159649, 1, 6),
(6, 1, 'reponse test2', 1513159670, 1, 6),
(7, 3, 'yo sujet num 2!', 1513756036, 2, 6),
(8, 3, 'BOUH!', 1513756658, 3, 4),
(9, 3, '1er msg', 1513756822, 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `forum_topic`
--

CREATE TABLE `forum_topic` (
  `topic_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `topic_titre` char(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `topic_createur` int(11) DEFAULT NULL,
  `topic_vu` mediumint(8) DEFAULT NULL,
  `topic_time` int(11) DEFAULT NULL,
  `topic_genre` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `topic_last_post` int(11) DEFAULT NULL,
  `topic_first_post` int(11) DEFAULT NULL,
  `topic_post` mediumint(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forum_topic`
--

INSERT INTO `forum_topic` (`topic_id`, `forum_id`, `topic_titre`, `topic_createur`, `topic_vu`, `topic_time`, `topic_genre`, `topic_last_post`, `topic_first_post`, `topic_post`) VALUES
(1, 6, 'coucou', 1, 13, 1512991118, 'Message', 6, 2, NULL),
(2, 6, 'test de caca', 3, 4, 1513756036, 'Message', 7, 7, NULL),
(3, 4, 'test MMO', 3, 5, 1513756658, 'Annonce', 8, 8, NULL),
(4, 5, 'jeux topic', 3, 3, 1513756822, 'Message', 9, 9, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `messages_forum`
--

CREATE TABLE `messages_forum` (
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `categorie` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

CREATE TABLE `objet` (
  `ID` int(11) NOT NULL,
  `nom_objet` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL,
  `date_ajout` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `ID` int(11) NOT NULL,
  `nom_fichier` int(11) NOT NULL,
  `URL` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `forum_categorie`
--
ALTER TABLE `forum_categorie`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_ordre` (`cat_ordre`);

--
-- Index pour la table `forum_forum`
--
ALTER TABLE `forum_forum`
  ADD PRIMARY KEY (`forum_id`);

--
-- Index pour la table `forum_membres`
--
ALTER TABLE `forum_membres`
  ADD PRIMARY KEY (`membre_id`);

--
-- Index pour la table `forum_post`
--
ALTER TABLE `forum_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Index pour la table `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD PRIMARY KEY (`topic_id`),
  ADD UNIQUE KEY `topic_last_post` (`topic_last_post`);

--
-- Index pour la table `objet`
--
ALTER TABLE `objet`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `forum_categorie`
--
ALTER TABLE `forum_categorie`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `forum_forum`
--
ALTER TABLE `forum_forum`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `forum_membres`
--
ALTER TABLE `forum_membres`
  MODIFY `membre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `forum_post`
--
ALTER TABLE `forum_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `objet`
--
ALTER TABLE `objet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
