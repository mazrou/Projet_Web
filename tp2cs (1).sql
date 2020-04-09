-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2020 at 04:09 AM
-- Server version: 10.3.18-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp2cs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `etat` int(11) NOT NULL,
  `titre` text NOT NULL,
  `auteur` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `contenu`, `etat`, `titre`, `auteur`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 'Some example text some example text.John Doe is an architect and engineer', 'John Doe'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 'Some example text some example text.John Doe is an architect and engineer', 'John Doe'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 'Some example text some example text.John Doe is an architect and engineer', 'John Doe');

-- --------------------------------------------------------

--
-- Table structure for table `demende`
--

CREATE TABLE `demende` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `e_mail` text NOT NULL,
  `tel` text NOT NULL,
  `adresse` text NOT NULL,
  `langue_ourigine` text NOT NULL,
  `langue_source` text NOT NULL,
  `type_traduction` text NOT NULL,
  `assurmente` text DEFAULT NULL,
  `fichier` text DEFAULT NULL,
  `commentaire` text NOT NULL,
  `id_traducteur` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `etat` varchar(20) NOT NULL DEFAULT 'non-traite',
  `prix` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `demende`
--

INSERT INTO `demende` (`id`, `id_client`, `nom`, `prenom`, `e_mail`, `tel`, `adresse`, `langue_ourigine`, `langue_source`, `type_traduction`, `assurmente`, `fichier`, `commentaire`, `id_traducteur`, `note`, `date`, `etat`, `prix`) VALUES
(54, 4, 'ourdjini', 'aymen', 'ga_ourdjini@esi.dz', '0555555', '05 Rue des martyrs', '1', '3', 'site web', 'oui', NULL, 'Comentaires/ demandes spÃ©cifiques', 26, NULL, NULL, 'accepte-par-admin', 200),
(53, 4, 'ourdjini', 'aymen', 'ga_ourdjini@esi.dz', '0555555', '05 Rue des martyrs', '1', '3', 'site web', 'oui', NULL, 'Comentaires/ demandes spÃ©cifiques', 26, NULL, NULL, 'payant', 500),
(52, 4, 'ourdjini', 'aymen', 'ga_ourdjini@esi.dz', '0555555', '05 Rue des martyrs', '1', '3', 'site web', 'oui', NULL, 'Comentaires/ demandes spÃ©cifiques', 26, 0, NULL, 'non-traite', 0);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `id_demande` int(11) NOT NULL,
  `nom` text NOT NULL,
  `type` text NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_traducteur` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `id_demande`, `nom`, `type`, `id_client`, `id_traducteur`, `date`) VALUES
(42, 54, 'PrÃ©sentation cours AFC.pdf', 'bon-recu', 4, 26, '2020-02-04'),
(41, 54, 'PrÃ©sentation cours ACP.pdf', 'site web', 4, 26, '2020-02-04'),
(40, 53, 'recu', 'bon-recu', 4, 26, '2020-02-04'),
(39, 53, 'recu', 'bon-recu', 4, 26, '2020-02-04'),
(38, 53, 'Anad_Td_AD.pdf', 'site web', 4, 26, '2020-02-04'),
(37, 52, 'PrÃ©sentation cours ACP.pdf', 'fichier-traduise', 4, 26, '2020-02-04'),
(36, 52, 'cours ACP.pdf', 'bon-recu', 4, 26, '2020-02-04'),
(35, 52, 'cours ACP.pdf', 'site web', 4, 26, '2020-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `langues`
--

CREATE TABLE `langues` (
  `id` varchar(30) NOT NULL,
  `langue` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `langues`
--

INSERT INTO `langues` (`id`, `langue`) VALUES
('1', 'Arabe'),
('2', 'Francais'),
('3', 'Anglais'),
('4', 'Turque'),
('5', 'Espagnol'),
('6', 'chinois');

-- --------------------------------------------------------

--
-- Table structure for table `signaler`
--

CREATE TABLE `signaler` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type_user` text NOT NULL,
  `contenu` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signaler`
--

INSERT INTO `signaler` (`id`, `id_user`, `type_user`, `contenu`) VALUES
(2, 1, 'client', 'Ecrire ici'),
(3, 1, 'client', 'Ecrire ici'),
(4, 1, 'client', 'aymen'),
(5, 4, 'client', 'probleme dans la traduction');

-- --------------------------------------------------------

--
-- Table structure for table `traducteur`
--

CREATE TABLE `traducteur` (
  `id` int(30) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` text NOT NULL,
  `wilaya` text NOT NULL,
  `commune` text NOT NULL,
  `adresse` text NOT NULL,
  `telephone` text NOT NULL,
  `fax` text NOT NULL,
  `nb_doc` int(11) NOT NULL DEFAULT 0,
  `note` int(11) NOT NULL DEFAULT 0,
  `type_traduction` text NOT NULL,
  `asserment` text NOT NULL,
  `password` text NOT NULL,
  `bloquer` int(11) NOT NULL DEFAULT 0,
  `suppr` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `traducteur`
--

INSERT INTO `traducteur` (`id`, `nom`, `prenom`, `email`, `wilaya`, `commune`, `adresse`, `telephone`, `fax`, `nb_doc`, `note`, `type_traduction`, `asserment`, `password`, `bloquer`, `suppr`) VALUES
(29, 'bennaser', 'islam', 'gb_ourdjini@esi.dz', 'Oran', 'Es-Senia', '50 Rue des martyrs', '031 56 25 70', '031 56 30 50', 0, 0, 'site web', 'Oui', '12345', 0, 0),
(26, 'Belhadj', 'Said', 'ga_ourdjini@esi.dz', 'Oran', 'Es-Senia', '50 Rue des martyrs', '031 56 25 70', '031 56 30 50', 0, 0, 'site web', 'Oui', '1234', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `traduire`
--

CREATE TABLE `traduire` (
  `id` int(11) NOT NULL,
  `id_traducteur` int(30) NOT NULL,
  `id_langue` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `traduire`
--

INSERT INTO `traduire` (`id`, `id_traducteur`, `id_langue`) VALUES
(26, 26, '1'),
(25, 25, '2'),
(24, 25, '1'),
(23, 24, '5'),
(22, 24, '3'),
(21, 24, '1'),
(20, 23, '4'),
(19, 23, '1'),
(18, 22, '3'),
(17, 22, '2'),
(16, 22, '1'),
(27, 26, '3'),
(28, 26, '6'),
(29, 27, '1'),
(30, 27, '2'),
(31, 28, '1'),
(32, 28, '3'),
(33, 28, '6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `wilaya` text NOT NULL,
  `commune` text NOT NULL,
  `adresse` text NOT NULL,
  `telephone` text NOT NULL,
  `fax` text NOT NULL,
  `bloquer` int(11) NOT NULL DEFAULT 0,
  `suppr` int(11) NOT NULL DEFAULT 0,
  `nb_demande` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`, `wilaya`, `commune`, `adresse`, `telephone`, `fax`, `bloquer`, `suppr`, `nb_demande`) VALUES
(4, 'Boumaaza', 'Samir', 'ga_ourdjini@esi.dz', '4444', 'Alger', 'Rouiba ', '50 Rue des dunes', '021 56 25 70', '021 56 30 50 / 56 51 54', 0, 0, 38),
(5, 'Bendaoud', 'Fatiha', 'gb_ourdjini@esi.dz', '5555', 'Bechar', 'Saoura ', '50 Rue des oliviers', '021 56 25 70', '021 56 30 50 / 56 51 54 ', 0, 0, 0),
(10, 'ourdjini', 'aymen', 'ga_ourdjini@esi.dz', '11111', 'skikda', 'azzaba', '05 Rue des martyrs', '055555', '021 56 30 50/56 51 54', 0, 0, 0),
(11, 'Ayoub', 'MazROU', 'ga.mazrou@gmail.com', 'nitrou18b_boy', 'TIPAZA', 'BOUSMAIL', 'SRM.,', '0924352', '432095452', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demende`
--
ALTER TABLE `demende`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `fk_demende_traducteur` (`id_traducteur`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signaler`
--
ALTER TABLE `signaler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traducteur`
--
ALTER TABLE `traducteur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traduire`
--
ALTER TABLE `traduire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_traducteur` (`id_traducteur`),
  ADD KEY `fk_id_langue` (`id_langue`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `demende`
--
ALTER TABLE `demende`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `signaler`
--
ALTER TABLE `signaler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `traducteur`
--
ALTER TABLE `traducteur`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `traduire`
--
ALTER TABLE `traduire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
