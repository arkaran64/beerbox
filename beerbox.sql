-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 15 nov. 2020 à 02:09
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `beerbox`
--
CREATE DATABASE IF NOT EXISTS `beerbox` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `beerbox`;

-- --------------------------------------------------------

--
-- Structure de la table `beers`
--

CREATE TABLE `beers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alchoolpercent` varchar(255) NOT NULL,
  `id_country` int(255) NOT NULL,
  `description` text NOT NULL,
  `author_article` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_color` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `beers`
--

INSERT INTO `beers` (`id`, `name`, `alchoolpercent`, `id_country`, `description`, `author_article`, `img`, `id_color`) VALUES
(1, 'Cuvée des Trolls', '7,0%', 2, 'Bière brumeuse jaune paille à la mousse blanche consistante. Full body aux arômes fruités d’agrumes et de fruits jaunes. Grande douceur et petite touche acide rafraîchissante.', 3, 'cuvee-des-trolls.png', 1),
(2, 'Affligem Blond', '6,8%', 2, 'Bière blonde d’abbaye avec une mousse blanche délicate. Rafraîchissante et gorgée de saveurs fruitées avec des notes d’agrumes et de fruits tropicaux. La fin de bouche présente une agréable amertume.  ', 1, 'affligem-blond.png', 1),
(4, 'Leffe Blonde', '6,6%', 2, 'La robe oscille entre le jaune-doré foncé limpide et l’ambre, avec une mousse blanche généreuse et dense. C’est une bière blonde accessible et fruitée avec une légère note d’amertume. La Leffe Blonde est une bière d’abbaye reconnue. ', 3, 'leffe-blond.png', 1),
(5, 'Vedett Extra Blond', '5,2%', 2, 'Bière jaune clair à la mousse blanche ferme. Arômes frais d’agrumes. Le goût est frais, avec le citron et le citron vert. Saveur acide fraîche et une légère amertume déterminent l’arrière-goût.', 3, 'vedett-extra-blond.png', 1),
(6, 'Maredsous Blonde', '6,0%', 2, 'La Maredsous est une bière d\'abbaye au caractère calme et agréable pour une robe dorée et légèrement orange avec une belle mousse blanche.En bouche, on y retrouve des saveurs douces et amères de fruits, d\'épices, de houblon et de malt.\r\n', 3, 'maredsous-blonde.png', 1),
(7, 'Piraat 10,5', '10,5%', 2, 'Dorée avec une mousse énorme. Les arômes sont épicés, doux et alcoolisés. Cette Pirate vous réchauffe à l’intérieur.', 1, 'piraat.png', 2),
(8, 'Barbar Blonde', '8,0%', 2, 'Au nez et en bouche, le premier parfum qui se dégage est celui du miel, qui donne de la rondeur et un caractère sucré à cette bière. Parfaite en accompagnement de plats très variés. ', 3, 'barbar-blond.png', 1),
(9, 'Gasconha Blonde', '5,5%', 1, 'Vêtue de sa robe dorée et portée par une amertume discrète, la Gasconha Blonde est une bière ronde et généreuse au caractère malté affirmé.', 1, 'gasconha_blonde.png', 1),
(15, 'New one', '5959595', 2, 'beaucoup tro for', 6, '5fb07b88befc2_maredsous-blonde.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`color_id`, `color_name`) VALUES
(1, 'Blonde'),
(2, 'Blanche'),
(3, 'Rousse'),
(4, 'Brune'),
(5, 'IPA');

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'Allemagne'),
(2, 'Belgique'),
(3, 'Espagne'),
(4, 'Etats-Unis'),
(5, 'France'),
(6, 'Irlande'),
(7, 'Mexique'),
(8, 'Pays-Bas'),
(9, 'Japon'),
(10, 'Royaume-Uni');

-- --------------------------------------------------------

--
-- Structure de la table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_beer` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `user_address`, `password`, `rank`) VALUES
(1, 'Horus', 'Lupercal', 'horus@gw.com', '001 War Master Palace, Chtonia', '$2y$10$HqaShxhxy4.0T3CTBCgG8evzcgTaju3jfFHEu.NNcZwNdsle9O1/O', 1),
(3, 'Corvus', 'Corax', 'corax@gw.com', 'Raven Nest, 00100 Delivrance', '$2y$10$x3n7OQ7jNOZL7jt5pojv9.D2k62ElxLvvaK0LQiPcOvk/CEQq5Ic6', 0),
(6, 'Salut', 'Cémoi', 'test@test.com', 'Change l\'adresse', '$2y$10$L77tsHwi.3I/SDpNuycQzu4rqo1b4JX98qXj2SF06.uGTtS5dYun6', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `beers`
--
ALTER TABLE `beers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_fk` (`id_color`),
  ADD KEY `country_fk` (`id_country`),
  ADD KEY `users_fk` (`author_article`);

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Index pour la table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_beer` (`id_beer`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `beers`
--
ALTER TABLE `beers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `beers`
--
ALTER TABLE `beers`
  ADD CONSTRAINT `color_fk` FOREIGN KEY (`id_color`) REFERENCES `color` (`color_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `country_fk` FOREIGN KEY (`id_country`) REFERENCES `country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_fk` FOREIGN KEY (`author_article`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`id_beer`) REFERENCES `beers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
