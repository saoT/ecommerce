-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 02 juil. 2018 à 14:20
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecommerce2`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

DROP TABLE IF EXISTS `artiste`;
CREATE TABLE IF NOT EXISTS `artiste` (
  `id_artiste` int(11) NOT NULL AUTO_INCREMENT,
  `nom_artiste` varchar(64) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_artiste`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`id_artiste`, `nom_artiste`, `id_categorie`) VALUES
(1, 'Indochine', 1),
(3, 'Mylène Farmer', 3),
(4, 'Noir Désir', 1),
(5, 'Jane Birkin', 3),
(6, 'I AM', 2),
(7, 'Sexion d\'Assaut', 2),
(8, 'Orelsan', 2);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Rock'),
(2, 'Rap'),
(3, 'Pop');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(64) NOT NULL,
  `prenom_client` varchar(64) NOT NULL,
  `adresse_client` varchar(128) NOT NULL,
  `cp_client` int(11) NOT NULL,
  `ville_client` varchar(64) NOT NULL,
  `mail_client` varchar(64) NOT NULL,
  `tel_client` int(11) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `adresse_client`, `cp_client`, `ville_client`, `mail_client`, `tel_client`, `password`) VALUES
(1, 'Nepheline', 'Nepheline', 'Nepheline', 12345, 'Nepheline', 'nepheline@gmail.com', 123456789, '$2a$10$1qAz2wSx3eDc4rFv5tGb5expIJYDr7nZEI9QsATOgrLPe8rEBG/Wi'),
(2, 'LOBGOEIS', 'Tomas', '87 rue du caca', 99875, 'Jouarre', 'cacaprout@gmail.com', 123456789, '$2a$10$1qAz2wSx3eDc4rFv5tGb5ezJZReL9P9Oq6L/Q0aBK7VNBp0tD9UBa'),
(4, 'Pouet', 'Prout', '25 avenue de rebaise', 77640, 'Jouarre', 'lolo@gmail.com', 105040404, '$2a$10$1qAz2wSx3eDc4rFv5tGb5eVXs6SAsPHIksDVv8FSYU2bTPpO0y.4S'),
(5, 'Lob', 'TOm', '25 avenue de rebaisa', 77450, 'Jouaua', 'fe@gmail.com', 160228745, '$2a$10$1qAz2wSx3eDc4rFv5tGb5eHFdOt9SbFga9sgeluhOsCJJgFoujup2'),
(11, 'Emi', 'Emi', '25 Avenue de Rebais', 77640, 'Jouarre', 'emi@gmail.com', 44444, '$2a$10$1qAz2wSx3eDc4rFv5tGb5e7cCeVryvX.fgwPY3vPHP63qzM848wEK'),
(14, 'Lolo', 'Lolo', 'Lolo', 5, 'Lolo', 'lolo2@gmail.com', 160228787, '$2a$10$1qAz2wSx3eDc4rFv5tGb5e7cCeVryvX.fgwPY3vPHP63qzM848wEK'),
(15, 'Lo', 'Lo', 'Lo', 4, 'Lo', 'lo@gmail.com', 154896548, '$2a$10$1qAz2wSx3eDc4rFv5tGb5eeuK5Eje4/K1.HJwfO1X5PcE0uHurPlK'),
(16, 'Lol', 'Lol', 'Lol', 7, 'Lol', 'lol@gmail.com', 7, '$2a$10$1qAz2wSx3eDc4rFv5tGb5eKlOEANnVlwh3jtBPpTebweC9XwTT.m2'),
(17, 'Lololo', 'Lololo', 'Lolo', 4, 'Lolo', 'lololo@gmail.com', 5, '$2a$10$1qAz2wSx3eDc4rFv5tGb5e7cCeVryvX.fgwPY3vPHP63qzM848wEK'),
(18, 'R', 'E', 'Lo', 4, 'Lo', 'r@gmail.com', 4, '$2a$10$1qAz2wSx3eDc4rFv5tGb5eeuK5Eje4/K1.HJwfO1X5PcE0uHurPlK'),
(19, 'V', 'V', 'Lo', 4, 'Lo', 'loa@gmail.com', 4, '$2a$10$1qAz2wSx3eDc4rFv5tGb5eeuK5Eje4/K1.HJwfO1X5PcE0uHurPlK'),
(21, 'Manianga', 'Roy', '25 avenue de roy', 77777, 'Roycity', 'roy@gmail.com', 258965874, '$2a$10$1qAz2wSx3eDc4rFv5tGb5eVwbSn341dlDu5rVs3el2YsEFllDGthe');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `date_commande` date NOT NULL,
  `id_paiement` int(11) NOT NULL,
  `prix_commande` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_client`, `date_commande`, `id_paiement`, `prix_commande`) VALUES
(1, 11, '2018-07-02', 1, 75),
(2, 21, '2018-07-02', 2, 65);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

DROP TABLE IF EXISTS `musique`;
CREATE TABLE IF NOT EXISTS `musique` (
  `id_musique` int(11) NOT NULL AUTO_INCREMENT,
  `id_artiste` int(11) NOT NULL,
  `nom_artiste` varchar(64) NOT NULL,
  `categorie_artiste` varchar(64) NOT NULL,
  `prix_vinyl` int(11) NOT NULL,
  `prix_cassette` int(11) NOT NULL,
  `nom_album` varchar(64) NOT NULL,
  `description_musique` text NOT NULL,
  `pochette` varchar(200) NOT NULL,
  PRIMARY KEY (`id_musique`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `musique`
--

INSERT INTO `musique` (`id_musique`, `id_artiste`, `nom_artiste`, `categorie_artiste`, `prix_vinyl`, `prix_cassette`, `nom_album`, `description_musique`, `pochette`) VALUES
(2, 1, 'Indochine', 'Rock', 20, 20, 'Station 13', '«Station 13» est le 3ème single du nouvel album d’Indochine «13» déjà certifié Triple Disque de Platine.\r\nIndochine est actuellement en tournée dans toute la France !', ''),
(3, 3, 'Mylène Farmer', 'Pop', 20, 20, 'Beyond my control', 'Réédition à l’identique du maxi 45 tours vinyle de Mylène Farmer.\r\nBeyond My control sortie en 1992, tiré du de l’album L’autre.', ''),
(4, 4, 'Noir Desir', 'Rock', 10, 20, 'One trip one nose', 'Réédition vinyle en exclusivité Fnac : En 1998, après avoir enregistré cinq albums en studio, Noir Désir confiait les bandes de ces enregistrements à divers artistes. De cette expérience naitra un album de remixes des titres du groupe revisités par des musiciens inspirés. Retrouvez réédité le Maxi-vinyl de l\'époque !', ''),
(5, 5, 'Jane Birkin', 'Pop', 18, 23, 'Together forever', 'Tel un phénix de l’industrie musicale, le disque vinyle connaît depuis une dizaine d’années un retour en force. Jouez pick-ups, résonnez platines : nos chères galettes noires ont désormais retrouvé leur place chez tous les amateurs de musique. Accessibles, pop et raffinés, les 45 et 33 tours vivent leur seconde jeunesse. Retour sur les avantages de ce support', ''),
(6, 1, 'Indochine', 'Rock', 20, 18, 'L\'Aventurier', 'Stéphane Sirkis, frère jumeau de Nicola, rejoint officiellement le groupe et, en avril 1982, ils assurent les premières parties de Depeche Mode et de la tournée de Taxi Girl. L\'engouement pour Indochine prend de l\'ampleur à chaque passage sur scène, à tel point que le manager de Taxi Girl décide de les déprogrammer de la tournée, craignant qu\'ils ne fassent de l\'ombre à son propre groupe6. Indochine enregistre alors son premier album L\'Aventurier qui sort le 15 novembre. Le single du même nom, référence à l\'univers de Bob Morane de l\'auteur belge Henri Vernes, fait un véritable carton durant l\'été 1983 en s\'écoulant à 500 000 exemplaires7. L\'album s\'écoule quant à lui à plus de 250 000 exemplaires8. La presse s\'enthousiasme et décerne au groupe le Bus d\'Acier 1983, qui récompensait alors les artistes de la scène rock.', ''),
(8, 3, 'Mylène Farmer', 'Pop', 10, 20, 'Ainsi soit je...', 'Ainsi soit je... est le tout premier Disque de diamant (plus d’un million de ventes) obtenu par une femme et frôle aujourd\'hui les 2 millions d\'exemplaires.5 Il est l\'album féminin le plus vendu en France dans les années 1980.6 Ce record ne sera brisé que par Farmer elle-même en 1991 avec son album suivant, L’Autre…, qui dépassera les deux millions d\'exemplaires.', ''),
(9, 4, 'Noir Desir', 'Rock', 15, 17, '666.667 Club', '666.667 Club est le cinquième album studio du groupe de rock français Noir Désir, sorti en 1996. La musique s\'y fait plus calme que sur l\'album précédent et l\'accent est mis sur les textes avec certains morceaux intimistes et d\'autres abordant des thèmes politiques ou sociaux qui donnent à Noir Désir son étiquette de groupe engagé. L\'album est le plus grand succès commercial du groupe jusqu\'alors, obtenant un double disque de platine en France.', ''),
(10, 8, 'Orelsan', 'Rap', 20, 22, 'La fête est finie', 'Premier album produit par Skread (Booba, Diam\'s, Nessbeal...).\r\nDu binge drinking au rap by shooting, le jeune rappeur Orelsan est l\'émanation de cette génération, renfermée sur elle-même, réfugiée dans les addictions, à la recherche répétée du borderline. D\'un point de vue sociologique, on a beaucoup à apprendre des textes d\'Orelsan, guide improbable le temps d\'un album, \" Perdu D\'Avance \".\r\n\" Orelsan, 25 ans, 14 d\'âge mental. Rappeur, craqueur sous pression, amateur de films amateurs, président de ton club d\'échecs \".\r\nSon premier album va faire trembler les bacs bien tranquilles de vos disquaires. Avec des titres déroutants, histoires de fous, histoires floues, ou simplement histoires \" de vous \".\r\nBienvenue dans un univers alambiqué, wifi connecté. Un album entier pour éviter de se mettre une balle dans la tête, ou d\'en mettre dans celles des autres.', ''),
(11, 6, 'I AM', 'Rap', 35, 20, 'L\'école du micro d\'argent', 'L\'album a été enregistré en partie aux États-Unis, avec des influences de RZA, membre du Wu-Tang Clan.\r\n\r\nLes textes de l\'album sont souvent considérés comme d\'une rare finesse par comparaison avec l\'essentiel de la scène du rap français[réf. nécessaire]. Peu de rappeurs sont parvenus à aborder les thèmes sociaux avec autant de justesse. Ce sont des textes sérieux, graves, accompagnés de jeux extrêmement sophistiqués sur les sonorités du langage (par exemple, Chez le mac est un hymne à la poésie déguisé en biographie de proxénète), qui atteignent leur acmé sur la dernière chanson de l\'album, Demain, c\'est loin, portrait de la vie des cités s\'étendant sur près de 9 minutes. Sobre, sans refrain, ce morceau, aujourd\'hui l\'un des plus célèbres du rap français, repose sur un seul échantillon musical d\'une dizaine de secondes répété en boucle. Ce morceau a même été élu par les internautes du site Abcdr du son, meilleur classique du rap français dans un classement établissant les 100 premiers2. Au moins trois chansons de l\'album parlent de prostitution, mais en alliant une touche amusante et ironique à un réalisme sombre et violent.', ''),
(12, 7, 'Sexion d\'Assaut', 'Rap', 25, 10, 'L\'apogée', 'Le groupe le plus vendeur du rap français actuel mais aussi le plus critiqué annonce depuis un an cette fameuse apogée, précédée d\'un album d\'inédits. Avec un tel titre, il faut être à la hauteur. Après les premiers singles ultra-efficaces sur leur parcours, distillés ici et là, « Mets pas celle-là » et « Disque d\'or », l\'album contient encore une série de titres faits pour rester longtemps en tête. Le groupe a donc beaucoup travaillé le son, pour que chaque titre soit un single en puissance. Évidemment autotune et électro font leur apparition (« Africain », « Wati house »).', ''),
(13, 7, 'Sexion d\'Assaut', 'Rap', 15, 15, 'Éternel insatisfait', 'Après 800 000 copies vendues de son album \" Les yeux plus gros que le monde \", Black M revient avec \" Eternel insatisfait \", un album riche aux multiples influences. Cet album marque une belle évolution de sa carrière musicale ! Le rappeur de la Sexion D\'Assaut frappe un grand coup, et lance le compte à rebours de son second album solo avec son single \" Je suis chez moi \". Que trouve-t-on dans cet album ? Tout ce qui a fait le succès de cet artiste inclassable : du flow et de la mélodie. Black M évoque divers sujets, s\'interroge. Il explore de nouveaux territoires musicaux sans perdre son identité. Celle d\'un rappeur issu d\'un des groupes de rap les plus populaire qui sait trouver les mots justes quand il est éloigné de son crew. \" Même avec du monde, je me sens seul \" : Alpha Diallo, alias Black M, prouve avec ce nouvel opus qu\'il est prêt pour une carrière au long cours.', '');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `id_paiement` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(64) NOT NULL,
  `id_client` int(11) NOT NULL,
  `numero_carte` int(11) NOT NULL,
  PRIMARY KEY (`id_paiement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_commande` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_musique` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id_musique` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix_vinyl` int(11) NOT NULL,
  `prix_cassette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
