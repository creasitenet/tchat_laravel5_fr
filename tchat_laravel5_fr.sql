-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 14 Mai 2015 à 17:19
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `tchat_laravel5_fr`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `texte` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `texte`, `created_at`, `updated_at`) VALUES
(1, 1, 'La directive ng-app permet de dire à AngularJs qu’il doit être actif sur cette section de la page. Dans notre cas, il s’agit de toute la page puisqu’elle est située sur la balise <html>, mais on pourrait très bien la mettre sur un <div> par exemple.\r\n', '2015-05-04 00:00:00', '2014-12-15 14:15:40'),
(2, 1, 'La directive ng-controller permet d''indiquer que la section de la page est gérée par le contrôleur. Les variables et fonctions déclarées dans le scope de ce contrôleur sont accessibles dans cette zone du html, et pas en dehors.', '2015-05-04 02:00:00', '2014-12-15 14:16:13'),
(3, 1, 'Les directives ng-show et ng-hide permet de dire à AngularJs qu''il doit monter ou cacher la div correspondante.', '2015-05-04 03:00:00', '2014-12-15 14:16:32'),
(4, 1, 'Le two-way data binding. Si les données sont mises à jour dans le contrôleur, les changements seront répercutés dans la vue, et si les données sont mises à jour dans la vue, les changements seront répercutés dans le contrôleur! Dans l’exemple ci-dessus, l’utilisateur tape du texte dans l’input, ce qui met à jour la variable $scope.name du contrôleur, et le changement est instantanement répércuté côté vue dans {{name}}.', '2015-05-04 04:00:00', '2014-12-15 14:24:42'),
(5, 1, 'Le scope est ce qui fait le lien entre le contrôleur et la vue. Techniquement c’est un objet javascript, et les propriétés qu’on lui ajoute (variables et fonctions) sont accessibles dans la vue, elles sont en quelque sorte publiques. Mais il est également possible de créer des variables et des fonctions privées (pas accessibles dans la vue).', '2015-05-04 05:00:00', '2014-12-15 14:16:49'),
(7, 1, 'test', '2015-05-06 11:59:49', '2015-05-06 11:59:49'),
(8, 1, 're test', '2015-05-14 16:20:25', '2015-05-14 16:20:25'),
(9, 1, 're re test', '2015-05-14 16:20:58', '2015-05-14 16:20:58'),
(10, 1, 're re re test', '2015-05-14 16:22:35', '2015-05-14 16:22:35'),
(11, 1, 're re re re test', '2015-05-14 16:22:45', '2015-05-14 16:22:45'),
(12, 1, 're test', '2015-05-14 16:23:17', '2015-05-14 16:23:17'),
(13, 1, 're test', '2015-05-14 16:48:28', '2015-05-14 16:48:28'),
(14, 1, 're re test', '2015-05-14 16:48:42', '2015-05-14 16:48:42'),
(15, 1, 're re re test', '2015-05-14 17:00:30', '2015-05-14 17:00:30'),
(16, 1, 're test', '2015-05-14 17:01:07', '2015-05-14 17:01:07'),
(17, 1, 're re test', '2015-05-14 17:02:25', '2015-05-14 17:02:25');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `password_temp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `ip` varchar(45) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `password_temp`, `email`, `token`, `active`, `role`, `remember_token`, `ip`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'creasitenet', '$2y$10$41fWfo/zA9aaG201yuobL.WTtntMUiLgpfNFdhs8ijh0AE/883ELK', '', 'creasitenet.com@gmail.com', '123', 1, 100, 'xbEr7tgNHWTA7xchKlnrWptUpU3SZQVOBnNZV7UKl0OHOegpoDEEROLZH40D', '127.0.0.1', '2015-05-14 16:20:10', '2014-10-28 10:41:17', '2015-05-14 16:20:10'),
(2, 'boissel13', '$2y$10$xXVJxk4E4midkfJ74RIdCuM/pA4bGchL6Dl.y16IWnQUxm9A2kJHu', '', 'edouardboissel@gmail.com', 'Kd61BKXbgeRj7pqr1fcjO9Y1vToc5Mkp3WGJDA8zFhLRNaQZYgbC9gmx9Wpq', 0, 1, 'E4DKoL355ayO1vdAWqWddgOvSTt8alaCkthZwVWVn0IolCB05b8hWrfhHSo0', '', NULL, '2014-10-20 09:40:56', '2014-10-20 20:36:43');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
