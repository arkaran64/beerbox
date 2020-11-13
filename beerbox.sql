-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 13 nov. 2020 à 17:21
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

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

-- --------------------------------------------------------

--
-- Structure de la table `beers`
--

CREATE TABLE `beers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alchoolpercent` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `author_article` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `beers`
--

INSERT INTO `beers` (`id`, `name`, `alchoolpercent`, `country`, `description`, `author_article`, `img`) VALUES
(1, 'Cuvée des Trolls', '7,0%', 'Belgique', 'Bière brumeuse jaune paille à la mousse blanche consistante. Full body aux arômes fruités d’agrumes et de fruits jaunes. Grande douceur et petite touche acide rafraîchissante.', 3, 'cuvee-des-trolls.png'),
(2, 'Affligem Blond', '6,8%', 'Belgique', 'Bière blonde d’abbaye avec une mousse blanche délicate. Rafraîchissante et gorgée de saveurs fruitées avec des notes d’agrumes et de fruits tropicaux. La fin de bouche présente une agréable amertume.  ', 1, 'affligem-blond.png'),
(4, 'Leffe Blonde', '6,6%', 'Belgique', 'La robe oscille entre le jaune-doré foncé limpide et l’ambre, avec une mousse blanche généreuse et dense. C’est une bière blonde accessible et fruitée avec une légère note d’amertume. La Leffe Blonde est une bière d’abbaye reconnue. ', 3, 'leffe-blond.png'),
(5, 'Vedett Extra Blond', '5,2%', 'Belgique', 'Bière jaune clair à la mousse blanche ferme. Arômes frais d’agrumes. Le goût est frais, avec le citron et le citron vert. Saveur acide fraîche et une légère amertume déterminent l’arrière-goût.', 3, 'vedett-extra-blond.png'),
(6, 'Maredsous Blonde', '6,0%', 'Belgique', 'La Maredsous est une bière d\'abbaye au caractère calme et agréable pour une robe dorée et légèrement orange avec une belle mousse blanche.En bouche, on y retrouve des saveurs douces et amères de fruits, d\'épices, de houblon et de malt.\r\n', 3, 'maredsous-blonde.png'),
(7, 'Piraat 10,5', '10,5%', 'Belgique', 'Dorée avec une mousse énorme. Les arômes sont épicés, doux et alcoolisés. Cette Pirate vous réchauffe à l’intérieur.', 1, 'piraat.png'),
(8, 'Barbar Blonde', '8,0%', 'Belgique', 'Au nez et en bouche, le premier parfum qui se dégage est celui du miel, qui donne de la rondeur et un caractère sucré à cette bière. Parfaite en accompagnement de plats très variés. ', 3, 'barbar-blond.png'),
(9, 'Gasconha Blonde', '5,5%', 'France', 'Vêtue de sa robe dorée et portée par une amertume discrète, la Gasconha Blonde est une bière ronde et généreuse au caractère malté affirmé.', 1, 'gasconha_blonde.png');

-- --------------------------------------------------------

--
-- Structure de la table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_beer` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_beer` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `id_user`, `id_beer`, `type`) VALUES
(3, 3, 4, 'Blonde');

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
(3, 'Corvus', 'Corax', 'corax@gw.com', 'Raven Nest, 00100 Delivrance', '$2y$10$x3n7OQ7jNOZL7jt5pojv9.D2k62ElxLvvaK0LQiPcOvk/CEQq5Ic6', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `beers`
--
ALTER TABLE `beers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_beer` (`id_beer`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`id_beer`) REFERENCES `beers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
