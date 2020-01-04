-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 03 jan. 2020 à 19:15
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `p5`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_auteur` int(11) NOT NULL,
  `id_sujet` int(11) NOT NULL,
  `alert` int(11) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `chapter_comments` (`id_sujet`),
  KEY `membre_comments` (`id_auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_auteur`, `id_sujet`, `alert`, `comment`) VALUES
(30, 17, 16, 30, 'une moto volante ?? :D'),
(32, 18, 10, 14, '@andre ca se voit que tu n\'y connais rien !!!!'),
(33, 18, 7, 15, 'elle est ou la suite ?'),
(34, 23, 16, 16, 'wouaaa je une voiture volante'),
(36, 25, 16, 18, 'hainnneeuuuxxxxx'),
(38, 26, 8, 19, 'C\'est dommage mais quelqu\'un sait pourquoi ils ont abandonnés le projet?'),
(52, 30, 1, 0, 'a'),
(55, 30, 2, 0, 'zezezea'),
(56, 30, 2, 0, 'ezezezez'),
(57, 30, 2, 0, 'ezezezaeae'),
(58, 30, 2, 0, 'ezezezeze'),
(59, 30, 2, 0, 'aaaaaaaa'),
(60, 30, 2, 0, 'bbbbbb'),
(61, 30, 2, 0, 'cccccc'),
(62, 30, 2, 0, 'zzzzzz'),
(63, 30, 2, 0, 'vvvvvvvv'),
(64, 30, 2, 0, 'yyyyyyy'),
(65, 30, 2, 0, 'iiiiiii'),
(66, 30, 2, 0, 'ooooooo'),
(67, 30, 2, 0, 'sdddddsds'),
(68, 30, 2, 0, 'sdddddsds');

-- --------------------------------------------------------

--
-- Structure de la table `rubrics`
--

DROP TABLE IF EXISTS `rubrics`;
CREATE TABLE IF NOT EXISTS `rubrics` (
  `id_rubric` int(11) NOT NULL AUTO_INCREMENT,
  `title_rubric` varchar(255) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id_rubric`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rubrics`
--

INSERT INTO `rubrics` (`id_rubric`, `title_rubric`, `image`) VALUES
(24, 'java', 'App/public/img/5e0ca86b741be4.29770937.png'),
(25, 'phpt', 'App/public/img/5e0ca8a5476d49.42396100.jpg'),
(26, 'la', 'App/public/img/5e0dfc2ddda583.07940256.jpg'),
(27, 'ph', 'App/public/img/5e0dfc08e55d36.76522048.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

DROP TABLE IF EXISTS `sujets`;
CREATE TABLE IF NOT EXISTS `sujets` (
  `id_sujet` int(11) NOT NULL AUTO_INCREMENT,
  `title_sujet` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `id_rubrique` int(11) NOT NULL,
  PRIMARY KEY (`id_sujet`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sujets`
--

INSERT INTO `sujets` (`id_sujet`, `title_sujet`, `id_user`, `content`, `id_rubrique`) VALUES
(1, 'Les enfants du secret', 30, '<p><strong>Les yeux &eacute;carquill&eacute;s</strong> par la stupeur, Lara fixe <strong>l&rsquo;homme</strong> qui<strong> vient</strong> de se<strong> lever,</strong> non loin d&rsquo;elle, dans le restaurant o&ugrave; elle est en train de d&icirc;ner. Cette d&eacute;marche assur&eacute;e, ce port de t&ecirc;te altier, elle les reconna&icirc;trait entre mille : il s&rsquo;agit de Reid, l&rsquo;amant passionn&eacute; avec qui elle a partag&eacute; une folle nuit deux ans plus t&ocirc;t et qui est mort quelques jours plus tard dans un incendie&hellip; Reprenant ses esprits, Lara se rue &agrave; la poursuite de celui qui, pour une raison qu&rsquo;elle ignore, a manifestement mis en sc&egrave;ne sa disparition et l&rsquo;a abandonn&eacute;e, sans savoir qu&rsquo;elle donnerait naissance peu apr&egrave;s &agrave; deux adorables b&eacute;b&eacute;s&hellip;</p>', 26),
(2, 'Troublante négociation', 30, '<p>Serena est venue &agrave; Londres pour acqu&eacute;rir Rosa, un tableau d&rsquo;une valeur <strong>inestimable</strong> pour son patron. Mais, lors des ench&egrave;res, le chef-d&rsquo;&oelig;uvre lui &eacute;chappe et revient au milliardaire Ethan Galbraith. Un homme que Serena doit d&eacute;sormais convaincre de lui revendre la toile. Quel qu&rsquo;en soit le prix&hellip;</p>', 27),
(5, 'Chapitre 5 : À l\'aventure !', 0, 'Le voyage de l’Abraham-Lincoln, pendant quelque temps, ne fut marqué par aucun incident. Cependant une circonstance se présenta, qui mit en relief la merveilleuse habileté de Ned Land, et montra quelle confiance on devait avoir en lui.Au large des Malouines, le 30 juin, la frégate communiqua avec des baleiniers américains', 26),
(7, 'Chapitre 6 : À toute vapeur !', 0, 'A ce cri, l’équipage entier se précipita vers le harponneur, commandant, officiers, maîtres, matelots, mousses, jusqu’aux ingénieurs qui quittèrent leur machine, jusqu’aux chauffeurs qui abandonnèrent leurs fourneaux. L’ordre de stopper avait été donné, et la frégate ne courait plus que sur son erre.', 25),
(8, 'Apple abandonne sa voiture autonome', 0, 'Ce n’est plus un secret : Apple s’intéresse depuis plusieurs années à la voiture autonome. Pourtant, le géant américain vient d’annoncer que le nombre de collaborateurs impliqués dans ce projet avait été réduit.', 26),
(10, 'Chapitre 7, le septième album de MC Solaar', 0, 'il constitue une suite logique du pr&eacute;c&eacute;dent opus d&eacute;j&agrave; inspir&eacute; de ses voyages, cette fois &agrave; New York. Cet album est sorti le 18 juin 2007.\r\nLe premier single est&nbsp;Da Vinci Claude&nbsp;suivi par&nbsp;Clic Clic&nbsp;et&nbsp;Carpe Diem. 59 000 ventes pour les six premi&egrave;res semaines de classement et 150 000 exemplaires en cinq mois (double disque d\'or).\r\nCet album a &eacute;t&eacute; r&eacute;compens&eacute; aux&nbsp;Victoires de la musique&nbsp;2008 dans la cat&eacute;gorie album de musiques urbaines de l\'ann&eacute;e parmi&nbsp;T\'as vu&nbsp;(Fatal Bazooka),&nbsp;Place 54&nbsp;(Hocus Pocus),&nbsp;Saison 5&nbsp;(IAM).\r\nTitres', 24),
(16, 'Moto française et ....volante', 0, 'Quelques 470 chevaux, quatre turbines fonctionnant à 96 000 tours / minute et des roues rétractables: les mensurationsdu prototype de moto volante mis au point par Lazareth, une entreprise d\'Annecy , font rêver.\r\n\r\nCette moto électrique, baptisée LVM 496 et disponible en fin d\'année, pourra rouler sur la route et se transformer en drone. Pour la piloter, il faudra disposer d\'un permis moto gros cube, d\'une licence ULM et...d\'un chèque de 496 000 euros.', 24),
(18, 'echo111', 30, '<p><strong>comment</strong></p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -11px; top: 38.6px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 26),
(19, 'Les enfants du secret', 30, '<p><strong>Les yeux &eacute;carquill&eacute;s</strong> par la stupeur, Lara fixe <strong>l&rsquo;homme</strong> qui <strong>vient</strong> de se lever, non loin d&rsquo;elle, dans le restaurant o&ugrave; elle est en train de d&icirc;ner. Cette d&eacute;marche assur&eacute;e, ce port de t&ecirc;te altier, elle les reconna&icirc;trait entre mille : il s&rsquo;agit de Reid, l&rsquo;amant passionn&eacute; avec qui elle a partag&eacute; une folle nuit deux ans plus t&ocirc;t et qui est mort quelques jours plus tard dans un incendie&hellip; Reprenant ses esprits, Lara se rue &agrave; la poursuite de celui qui, pour une raison qu&rsquo;elle ignore, a manifestement mis en sc&egrave;ne sa disparition et l&rsquo;a abandonn&eacute;e, sans savoir qu&rsquo;elle donnerait naissance peu apr&egrave;s &agrave; deux adorables b&eacute;b&eacute;s&hellip;</p>', 27),
(20, 'Les enfants du secret', 30, '<p><strong>Les yeux &eacute;carquill&eacute;s</strong> par la stupeur, Lara fixe <strong>l&rsquo;homme</strong> qui <strong>vient</strong> de se<strong> lever,</strong> non loin d&rsquo;elle, dans le restaurant o&ugrave; elle est en train de d&icirc;ner. Cette d&eacute;marche assur&eacute;e, ce port de t&ecirc;te altier, elle les reconna&icirc;trait entre mille : il s&rsquo;agit de Reid, l&rsquo;amant passionn&eacute; avec qui elle a partag&eacute; une folle nuit deux ans plus t&ocirc;t et qui est mort quelques jours plus tard dans un incendie&hellip; Reprenant ses esprits, Lara se rue &agrave; la poursuite de celui qui, pour une raison qu&rsquo;elle ignore, a manifestement mis en sc&egrave;ne sa disparition et l&rsquo;a abandonn&eacute;e, sans savoir qu&rsquo;elle donnerait naissance peu apr&egrave;s &agrave; deux adorables b&eacute;b&eacute;s&hellip;</p>', 26);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `droitUser` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `pass`, `mail`, `droitUser`) VALUES
(14, 'JOHN', '$2y$10$7B5pU/FiBhqT0avqTViP.e.tPNPchZWI9AzlLcG.AdHFEAA/1TFuy', 'Wick@gmail.com', 2),
(15, 'Dr.House', '$2y$10$T/aihqJjf6rezxliU.YhAulsp94bmoxLvLxfx9O/0SV/Zp4PqxUea', 'Dr.House@msn.com', 0),
(17, 'andre', '$2y$10$TSjih1pRblKxJrCZg.XnL.lPf5nuTspaBSAbA/ISZkwYTSTlIkGiy', 'andre@msn.com', 0),
(18, 'dany', '$2y$10$HHmfSzYqOJEFL1rBlslsreswksB2nk8QSNKcYRRwlclHom/9dtq9O', 'dany@msn.com', 0),
(19, 'bernard', '$2y$10$uXYHM2A.jSMiypLnyo/Zw.qecM2v7eFa9IRRZrV8ltEBqCR.nBA7e', 'bernard@gmail.com', 0),
(21, 'cynthia', '$2y$10$stsxolWtHr4xfXTokRURp.Hwsw.t/b5TxMIVjIDenzbkY9DH07c4K', 'cynthia.@gmail.com', 0),
(22, 'david', '$2y$10$IimIr5cliS5gg8Ds7yDkLuC9Z0wYpzDzuEz3ekd6xV63.dhA18Z8W', 'david@yaooh.fr', 0),
(23, 'azure', '$2y$10$8KC8Eof22cgzMtu3NzNDmuzLaigsEOb2/V.6srA4uTvUy6moUjPuq', 'azure@hotmail.com', 0),
(25, 'Moris', '$2y$10$916OBOsMo.5dOtkKDbf/8.MVyKoQA9Ym2AAFnO5D207QpCwSbvWOe', 'Moris@yaooh.fr', 0),
(26, 'claire', '$2y$10$FW1VfUrCOnr2OnB9O7U0Ne9Drf0i4Gzs1ACxZbc5LAO3cEqvUJILm', 'Claire@hotmail.fr', 0),
(27, 'cedric', '$2y$10$eR/maT11W9sfiSP.d6vKv.11MERzw7bsu29xFRstYWvZF4Tvr6Mxm', 'cedric@gmail.com', 0),
(28, 'moderateur', '$2y$10$XMnlfqt.VJFSJiPwEv7bDuhMYvvt9WV1/oB.rYIoxEVLnwg8UpjiK', 'Wick@gmail.com', 1),
(29, 'redacteur', '$2y$10$SAeUERxL8Tc.rhoA/Jxu7.M5xCq/yrIIbAFhqXkbdNtUJRwqNoPsu', 'Wick@gmail.com', 2),
(30, 'admin', '$2y$10$V/70pbAw/a5VfS9OwDmNX.RIqmvG8hijcHf.yOltU75AGNSgrO2ZG', 'Wick@gmail.com', 3),
(32, 'aaaa', '$2y$10$kK4b4rh7CncGjdw.doMt2eOfIRHYpRg087jdmTqBU1V3cL/enzKUS', 'aaa@monblog.com', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `chapter_comments` FOREIGN KEY (`id_sujet`) REFERENCES `sujets` (`id_sujet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `membre_comments` FOREIGN KEY (`id_auteur`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
