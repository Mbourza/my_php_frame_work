-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 24 Mai 2017 à 00:21
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `reunion`
--

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE `rapport` (
  `id` int(11) NOT NULL,
  `id_reunion` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `rapport`
--

INSERT INTO `rapport` (`id`, `id_reunion`, `title`, `description`, `date`) VALUES
(2, 1, 'success and failure', '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Le&nbsp;</span><strong style="margin: 0px; padding: 0px; font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem Ipsum</strong><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">&nbsp;est simplement du faux texte employ&eacute; dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les ann&eacute;es 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour r&eacute;aliser un livre sp&eacute;cimen de polices de texte. Il n''a pas fait que survivre cinq si&egrave;cles, mais s''est aussi adapt&eacute; &agrave; la bureautique informatique, sans que son contenu n''en soit modifi&eacute;. Il a &eacute;t&eacute; popularis&eacute; dans les ann&eacute;es 1960 gr&acirc;ce &agrave; la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus r&eacute;cemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker</span></p>', '2017-05-23');

-- --------------------------------------------------------

--
-- Structure de la table `reunions`
--

CREATE TABLE `reunions` (
  `id` int(11) NOT NULL,
  `sujet` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `local` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `organiser` int(11) NOT NULL,
  `ddb` date NOT NULL,
  `hdb` time NOT NULL,
  `ddf` date NOT NULL,
  `hdf` time NOT NULL,
  `participants` text COLLATE utf8_unicode_ci NOT NULL,
  `invited` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `reunions`
--

INSERT INTO `reunions` (`id`, `sujet`, `local`, `organiser`, `ddb`, `hdb`, `ddf`, `hdf`, `participants`, `invited`) VALUES
(1, 'Success is harder than failure for many things in this world', 'Ecole Tabount', 1, '2017-05-02', '16:00:00', '2017-05-02', '19:00:00', '0', ''),
(2, 'tabaco', 'ouarzazate', 1, '2017-05-01', '08:00:00', '2017-05-01', '08:00:00', '', ''),
(3, 'about allen boughaza', 'fpo', 2, '2017-05-03', '22:00:00', '2017-05-03', '00:00:00', '', ''),
(4, 'here wetry this shit out', 'japan', 1, '2017-05-18', '23:00:00', '2017-05-18', '00:00:00', '', '4,5,2');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `chef` int(11) NOT NULL,
  `date` date NOT NULL,
  `nbemps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `services`
--

INSERT INTO `services` (`id`, `nom`, `chef`, `date`, `nbemps`) VALUES
(1, 'reba', 2, '2017-05-02', 0),
(2, 'kefa', 4, '2017-05-04', 0);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `hash`) VALUES
(2, 1, '1399299c483fb646465ca49fb116dacd'),
(3, 1, '20f31520cc6b3462050accd0b5c80a4c'),
(4, 1, 'e01990eb86c21648dbf51650066356bf'),
(6, 1, 'c95609910fad30c6da836adc72ce1e63'),
(7, 1, 'd30f9f0c36b7ea806a853df0025b3e07'),
(8, 1, 'e08e12edb2e69267489197e7bf62ca7d'),
(9, 1, '9275f982ebfbc42e2d71b09fdbd752f1'),
(10, 5, 'c9102825fedd510976d40a5f980f34de'),
(11, 1, '2179fa788729a2dbd44c65efb180514f'),
(12, 5, '991288635503edbad9484f3505a860b3'),
(13, 1, 'ab6d4fb15d7fef5b4fe5e5243eb3e53c'),
(14, 5, 'c0c4b38bcba25082adf11e3d3d8fcd21'),
(15, 1, '74b11b7808b3f866f55b33cb749fd3b6'),
(16, 1, 'e3420097981ec09e722593f5c01e6391'),
(17, 1, '2e562235bd13e5df01039406af325986'),
(18, 1, '790f4c385d5405fb0a57c03991dd0bca'),
(19, 1, 'cc73830068754aa6e73fca2d849210c8'),
(20, 1, 'e742504b164958bf1875c7c298a6eaf1'),
(21, 1, '478d523b057a073207a8070c0475172d'),
(22, 1, 'df041c3f2afd66941927439323b654cf');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tele` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `groups` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `tele`, `groups`, `service`, `password`, `date`, `note`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '0678189639', 3, 0, 'admin', '2017-05-01', ''),
(2, 'rachid', 'elfe', 'rachidelfe@gmail.com', '0654535350', 2, 0, 'bouhazakdn', '2017-05-02', 'a:3:{s:2:"id";s:1:"2";s:7:"reunion";s:1:"4";s:4:"sent";s:1:"1";}'),
(4, 'allen', 'boughaza', 'allenboughaza@gmail.com', '0678189639', 2, 1, 'boughazaa ;;', '2017-05-03', 'a:3:{s:2:"id";s:1:"4";s:7:"reunion";s:1:"4";s:4:"sent";s:1:"1";}'),
(5, 'fatima', 'heri', 'fatima@gmail.com', '0654535350', 1, 1, 'boughazaa ;;', '2017-05-03', 'a:3:{s:2:"id";s:1:"5";s:7:"reunion";s:1:"4";s:4:"sent";s:1:"1";}');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reunions`
--
ALTER TABLE `reunions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `rapport`
--
ALTER TABLE `rapport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `reunions`
--
ALTER TABLE `reunions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
