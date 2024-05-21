-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 22 Mai 2024 à 08:03
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `uniluk_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(255) NOT NULL,
  `titre` text NOT NULL,
  `contenu` text NOT NULL,
  `photo` text NOT NULL,
  `date_pub` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `auteur`, `titre`, `contenu`, `photo`, `date_pub`) VALUES
(1, 'ExaucÃ© Vagheni', 'Rupture du pont de greatz', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem earum fugiat ipsa architecto! Assumenda ducimus facere sequi unde molestiae! Maxime quasi pariatur cupiditate deserunt odit placeat id atque molestias nulla!', 'b98702715e4af5acf62891fd7a656cc3a5a9f201.png', '2023-08-07'),
(2, 'ExaucÃ© Gregoire', 'Collation des grades ', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem earum fugiat ipsa architecto! Assumenda ducimus facere sequi unde molestiae! Maxime quasi pariatur cupiditate deserunt odit placeat id atque molestias nulla!', '564c75ecf87bc25e3da112f2fada04091f2fb2ed.png', '2023-08-07');

-- --------------------------------------------------------

--
-- Structure de la table `categories_livres_fridi`
--

CREATE TABLE IF NOT EXISTS `categories_livres_fridi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categories_livres_fridi`
--

INSERT INTO `categories_livres_fridi` (`id`, `nom`) VALUES
(1, 'Sciences'),
(2, 'kkkkkk'),
(3, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh'),
(4, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `commentaire` text NOT NULL,
  `img` text NOT NULL,
  `fonction` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `nom`, `commentaire`, `img`, `fonction`) VALUES
(1, 'Chadrack Kalumbi', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem earum fugiat ipsa architecto! Assumenda ducimus facere sequi unde molestiae! Maxime quasi pariatur cupiditate deserunt odit placeat id atque molestias nulla!', 'bkiaulh acardmCK.png', 'Etudiant'),
(3, 'ExaucÃ©', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem earum fugiat ipsa architecto! Assumenda ducimus facere sequi unde molestiae! Maxime quasi pariatur cupiditate deserunt odit placeat id atque molestias nulla!', 'cc3b712ba08436b2872bbf54e96a934a0deae561.png', 'Etudiant');

-- --------------------------------------------------------

--
-- Structure de la table `facultes`
--

CREATE TABLE IF NOT EXISTS `facultes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fac` text NOT NULL,
  `description_fac` text NOT NULL,
  `image_fac` text NOT NULL,
  `f_academiques` text NOT NULL,
  `f_description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `facultes`
--

INSERT INTO `facultes` (`id`, `nom_fac`, `description_fac`, `image_fac`, `f_academiques`, `f_description`) VALUES
(1, 'Sciences informatiques', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem earum fugiat ipsa architecto! Assumenda ducimus facere sequi unde molestiae! Maxime quasi pariatur cupiditate deserunt odit placeat id atque molestias nulla!', 'eieifnuicaoetmcnssqSr .png', '400', 'TP STAT.pdf'),
(2, 'ISTA LUKANGA            ', 'Une faculte purement technologique', ' S      ALKUA T  I AN  G.png', '500', 'UTILISATION DE LA MONNAIE ET DU SYSTEME DE PAIEMENT ELECTRONIQUE EN AFRIQUE.pdf'),
(3, 'Agronomie', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem earum fugiat ipsa architecto! Assumenda ducimus facere sequi unde molestiae! Maxime quasi pariatur cupiditate deserunt odit placeat id atque molestias nulla!', 'noemogiAr.png', '600', 'tp recherche.docx'),
(4, 'Education', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem earum fugiat ipsa architecto! Assumenda ducimus facere sequi unde molestiae! Maxime quasi pariatur cupiditate deserunt odit placeat id atque molestias nulla!', 'Eidcoanut.png', '430', 'TP FRANCAIS.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `fichiers_valve_horaire`
--

CREATE TABLE IF NOT EXISTS `fichiers_valve_horaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fac` int(11) NOT NULL,
  `fichier` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE IF NOT EXISTS `groupes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_groupe` text NOT NULL,
  `description_groupe` text NOT NULL,
  `image_groupe` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `groupes`
--

INSERT INTO `groupes` (`id`, `nom_groupe`, `description_groupe`, `image_groupe`) VALUES
(1, 'GACI', 'Le groupe a pour but d''innover dans la tech au sein de l''universitÃ© adventiste de lukanga', '87c7382f31aa9e687c2a3a89ec4f37ce343612e5.jpg'),
(2, 'GACI', 'Le groupe a pour but d''innover dans la tech au sein de l''universitÃ© adventiste de lukanga', '211d12cabdada85ebb7b335c3512ac9b49504be3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `infos_eglise`
--

CREATE TABLE IF NOT EXISTS `infos_eglise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(255) NOT NULL,
  `titre` text NOT NULL,
  `contenu` text NOT NULL,
  `photo` text NOT NULL,
  `date_pub` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `infos_eglise`
--

INSERT INTO `infos_eglise` (`id`, `auteur`, `titre`, `contenu`, `photo`, `date_pub`) VALUES
(1, 'ps mulwa', 'Aloe conflit', 'kpqzjlepf pzaoehrf pzoefh pozhef oÃ®zehf ^pzeif hzpeif ', 'nAoectloi fl.png', '2023-07-30');

-- --------------------------------------------------------

--
-- Structure de la table `infos_valve`
--

CREATE TABLE IF NOT EXISTS `infos_valve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `contenu` text NOT NULL,
  `date_pub` date NOT NULL,
  `fichier` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `infos_valve`
--

INSERT INTO `infos_valve` (`id`, `titre`, `contenu`, `date_pub`, `fichier`) VALUES
(1, 'Tricherie aux examens', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem earum fugiat ipsa architecto! Assumenda ducimus facere sequi unde molestiae! Maxime quasi pariatur cupiditate deserunt odit placeat id atque molestias nulla!', '2023-08-07', 'TP STAT.pdf.pdf'),
(2, 'match prevu pour le dimanche', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem earum fugiat ipsa architecto! Assumenda ducimus facere sequi unde molestiae! Maxime quasi pariatur cupiditate deserunt odit placeat id atque molestias nulla!', '2023-08-07', 'TP STAT.pdf.pdf'),
(3, 'Renvoi des deux etudiants voleurs', 'Deux etudiants se sont permis de voler dans leur auditoire un portable appartenant Ã  un eleve', '2023-08-08', 'TP STAT.pdf.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions_online`
--

CREATE TABLE IF NOT EXISTS `inscriptions_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `fac` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `fichier` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `inscriptions_online`
--

INSERT INTO `inscriptions_online` (`id`, `nom`, `telephone`, `email`, `fac`, `photo`, `fichier`, `description`) VALUES
(1, 'ExaucÃ©', 'Vagheni', 'exauce.vagheni@gmail.com', '2', 'Capture d''Ã©cran_20230624_191103.png.png', 'UTILISATION DE LA MONNAIE ET DU SYSTEME DE PAIEMENT ELECTRONIQUE EN AFRIQUE.pdf.pdf', '');

-- --------------------------------------------------------

--
-- Structure de la table `livres_fridi`
--

CREATE TABLE IF NOT EXISTS `livres_fridi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `intro` text NOT NULL,
  `date_pub` date NOT NULL,
  `fichier` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='publications_livres_fridi' AUTO_INCREMENT=4 ;

--
-- Contenu de la table `livres_fridi`
--

INSERT INTO `livres_fridi` (`id`, `titre`, `auteur`, `id_categorie`, `intro`, `date_pub`, `fichier`) VALUES
(1, 'ejejje', 'jje', 1, 'jejeje jenfjikbnzer fjzfnerjfnje jzefjnejnf zjrfknzirnf ', '2023-07-20', 'jejeje.pdf'),
(2, 'ejejje', 'jje', 1, 'jejeje jenfjikbnzer fjzfnerjfnje jzefjnejnf zjrfknzirnf ', '2023-07-20', 'jeeejj.pdf'),
(3, 'djdjd', 'djjdjd', 1, 'dhdjjjd', '2023-07-21', 'UTILISATION DE LA MONNAIE ET DU SYSTEME DE PAIEMENT ELECTRONIQUE EN AFRIQUE.pdf.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `memoires`
--

CREATE TABLE IF NOT EXISTS `memoires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etudiant` varchar(255) NOT NULL,
  `titre` text NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `date_pub` date NOT NULL,
  `intro` text NOT NULL,
  `fac` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `memoires`
--

INSERT INTO `memoires` (`id`, `etudiant`, `titre`, `fichier`, `date_pub`, `intro`, `fac`) VALUES
(1, 'Dalton Fichimida', 'Les ponts et chausses ', 'UTILISATION DE LA MONNAIE ET DU SYSTEME DE PAIEMENT ELECTRONIQUE EN AFRIQUE.pdf.pdf', '2023-08-07', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem earum fugiat ipsa architecto! Assumenda ducimus facere sequi unde molestiae! Maxime quasi pariatur cupiditate deserunt odit placeat id atque molestias nulla!', '2'),
(2, 'James', 'Les technologies en Afrique', 'tp recherche.docx.docx', '2023-08-07', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem earum fugiat ipsa architecto! Assumenda ducimus facere sequi unde molestiae! Maxime quasi pariatur cupiditate deserunt odit placeat id atque molestias nulla!', '1');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_src` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `photos`
--

INSERT INTO `photos` (`id`, `img_src`) VALUES
(1, 'Capture d''Ã©cran_20230615_195426.png'),
(2, 'Capture d''Ã©cran_20230226_032404.png'),
(3, '6c31dbf57347d95fad34d42478c87fefce47ad94'),
(4, '7f6a2c88dc42c7860bb5f975892bb055133aa779'),
(5, 'f0d852ce8002aeed589c511b7f9f597e04a8e8d9'),
(6, '6c4d31c076d4ac8ac1bf2c739ed7a5f720088cc2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `qualites_univ`
--

CREATE TABLE IF NOT EXISTS `qualites_univ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
