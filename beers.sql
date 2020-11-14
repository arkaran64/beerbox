-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 14 nov. 2020 à 19:14
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
  `alchoolpercent` int(11) NOT NULL,
  `description` text NOT NULL,
  `author_article` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_country` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `beers`
--

INSERT INTO `beers` (`id`, `name`, `alchoolpercent`, `description`, `author_article`, `id_color`, `id_country`, `img`) VALUES
(1, 'Cuvée des Trolls', 7, 'Bière brumeuse jaune paille à la mousse blanche consistante. Full body aux arômes fruités d’agrumes et de fruits jaunes. Grande douceur et petite touche acide rafraîchissante.', 3, 1, 2, 'cuvee-des-trolls.png'),
(2, 'Affligem Blond', 6, 'Bière blonde d’abbaye avec une mousse blanche délicate. Rafraîchissante et gorgée de saveurs fruitées avec des notes d’agrumes et de fruits tropicaux. La fin de bouche présente une agréable amertume.  ', 1, 1, 2, 'affligem-blond.png'),
(4, 'Leffe Blonde', 6, 'La robe oscille entre le jaune-doré foncé limpide et l’ambre, avec une mousse blanche généreuse et dense. C’est une bière blonde accessible et fruitée avec une légère note d’amertume. La Leffe Blonde est une bière d’abbaye reconnue. ', 3, 1, 2, 'leffe-blond.png'),
(5, 'Vedett Extra Blond', 5, 'Bière jaune clair à la mousse blanche ferme. Arômes frais d’agrumes. Le goût est frais, avec le citron et le citron vert. Saveur acide fraîche et une légère amertume déterminent l’arrière-goût.', 3, 1, 2, 'vedett-extra-blond.png'),
(6, 'Maredsous Blonde', 6, 'La Maredsous est une bière d\'abbaye au caractère calme et agréable pour une robe dorée et légèrement orange avec une belle mousse blanche.En bouche, on y retrouve des saveurs douces et amères de fruits, d\'épices, de houblon et de malt.\r\n', 3, 1, 2, 'maredsous-blonde.png'),
(7, 'Piraat 10,5', 10, 'Dorée avec une mousse énorme. Les arômes sont épicés, doux et alcoolisés. Cette Pirate vous réchauffe à l’intérieur.', 1, 1, 2, 'piraat.png'),
(8, 'Barbar Blonde', 8, 'Au nez et en bouche, le premier parfum qui se dégage est celui du miel, qui donne de la rondeur et un caractère sucré à cette bière. Parfaite en accompagnement de plats très variés. ', 3, 1, 2, 'barbar-blond.png'),
(9, 'Gasconha Blonde', 5, 'Vêtue de sa robe dorée et portée par une amertume discrète, la Gasconha Blonde est une bière ronde et généreuse au caractère malté affirmé.', 1, 1, 5, 'gasconha_blonde.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `beers`
--
ALTER TABLE `beers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_country` (`id_country`),
  ADD KEY `author_article` (`author_article`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `beers`
--
ALTER TABLE `beers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `beers`
--
ALTER TABLE `beers`
  ADD CONSTRAINT `beers_ibfk_1` FOREIGN KEY (`id_color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `beers_ibfk_2` FOREIGN KEY (`id_country`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `beers_ibfk_3` FOREIGN KEY (`author_article`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
