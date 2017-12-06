-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 06 Décembre 2017 à 19:01
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
(4, 2, 'MMORPG', 'Parlez ici des MMORPG', 60, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2, 'Autres jeux', 'Forum sur les autres jeux', 50, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 3, 'Loisir', 'Vos loisirs', 60, 0, 0, 0, 0, 0, 0, 0, 0),
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
  `membre_msn` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_siteweb` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_avatar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_signature` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_localisation` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_inscrit` int(11) NOT NULL,
  `membre_derniere_visite` int(11) NOT NULL,
  `membre_rang` tinyint(4) DEFAULT '2',
  `membre_post` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Structure de la table `forum_topic`
--

CREATE TABLE `forum_topic` (
  `topic_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `topic_titre` char(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `topic_createur` int(11) NOT NULL,
  `topic_vu` mediumint(8) NOT NULL,
  `topic_time` int(11) NOT NULL,
  `topic_genre` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `topic_last_post` int(11) NOT NULL,
  `topic_first_post` int(11) NOT NULL,
  `topic_post` mediumint(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  MODIFY `membre_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forum_post`
--
ALTER TABLE `forum_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT;
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
