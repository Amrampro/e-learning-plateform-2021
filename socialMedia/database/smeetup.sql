-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 06 oct. 2021 à 09:59
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `smeetup`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `full_course` text NOT NULL,
  `file_location` varchar(100) DEFAULT NULL,
  `video_file` varchar(100) DEFAULT NULL,
  `course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `name`, `description`, `full_course`, `file_location`, `video_file`, `course`) VALUES
(34, 'Chapter I', 'Hello! in this course i\'m going to show you how to cut this delicious fruit part 1', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'marie.vigneron_rapportstage1.pdf', NULL, 12),
(35, 'Chapter II', 'Hello! in this course i\'m going to show you how to cut this delicious fruit', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '538c447d9b9d8.pdf', NULL, 12),
(36, 'Introduction', 'Hypertext Markup Language, here you have the skeleton of your page', 'Remarks. HtmlDocument provides a managed wrapper around Internet Explorer\'s document object, also known as the HTML Document Object Model (DOM). You obtain an instance of HtmlDocument through the Document property of the WebBrowser control. HTML tags inside of an HTML document can be nested inside one another.', '86-rdc-fip-set-aside-fr-1.pdf', NULL, 11),
(37, 'Chapter I', 'Hello! in this course i\'m going to show you how to cut this delicious fruit', 'HTML Introduction\r\n1. If you\'re new to Web development, be sure to read our HTML Basicsarticle to learn what HTML is and how to use it.\r\nHTML Tutorials\r\n1. For articles about how to use HTML, as well as tutorials and complete examples, check out our HTML Learning Area.\r\nHTML Reference\r\n1. In our extensive HTML referencesection, you\'ll find the details about every element and attribute in HTML.', 'cahier des Charges GL2 et SR2  LMD validé.pdf', NULL, 11);

-- --------------------------------------------------------

--
-- Structure de la table `cloud`
--

CREATE TABLE `cloud` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `uploaded_file` text NOT NULL,
  `file_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cloud`
--

INSERT INTO `cloud` (`id`, `id_user`, `uploaded_file`, `file_type`) VALUES
(8, 7, 'IMG-20210814-WA0050.jpg', 'jpg'),
(9, 7, 'Rapport Goulmemei.pdf', 'pdf'),
(11, 7, '12351121_inspiring-cinematic-trailer_by_ironhorse_production_preview.mp3', 'mp3'),
(12, 7, 'Video Background 55  Grungy Smoke.mp4', 'mp4'),
(13, 7, 'pexels-joshua-mcknight-1139317.jpg', 'jpg'),
(14, 7, 'yt1s.com - Cinematic Background Music For Movie Trailers and Videos.mp3', 'mp3'),
(15, 7, 'marie.vigneron_rapportstage.pdf', 'pdf');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `id_prof`, `name`, `description`, `image`) VALUES
(11, 11, 'HTML', 'Hypertext Markup Language, here you have the skeleton of your page', 'html5-1633464613.png'),
(12, 12, 'Papayes', 'Hello! in this course i\'m going to show you how to cut this delicious fruit', 'papaye-1633469686.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_pub` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_pub`, `id_user`) VALUES
(361, 25, 11),
(365, 25, 12),
(363, 26, 11),
(366, 27, 12),
(367, 30, 7);

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pub_commentary` varchar(1000) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `video` varchar(100) DEFAULT NULL,
  `file` varchar(100) DEFAULT '0',
  `commentaries` blob DEFAULT NULL,
  `pub_date` date NOT NULL DEFAULT current_timestamp(),
  `likes` varchar(2000) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id`, `id_user`, `pub_commentary`, `picture`, `video`, `file`, `commentaries`, `pub_date`, `likes`) VALUES
(25, 10, 'Hello je suis administrateur', 'pexels-sanaan-mazhar-3075993.jpg', '0', '0', NULL, '2021-10-05', '0'),
(26, 11, 'See how photoshop is good', 'Noname.jpg', '0', '0', NULL, '2021-10-06', '0'),
(27, 11, 'Another new big in photoshop', 'Amram.jpg', '0', '0', NULL, '2021-10-06', '0'),
(28, 12, 'I love fruits ;)', 'papaye-1633469686.jpg', '0', '0', NULL, '2021-10-06', '0'),
(29, 12, 'Our agency is here to satisfy you in all your ICT problems', '4.jpg', '0', '0', NULL, '2021-10-06', '0'),
(30, 7, 'Happy :)', '4d9af6a826d74c6d842977ad625716a6[1].jpg', '0', '0', NULL, '2021-10-06', '0');

-- --------------------------------------------------------

--
-- Structure de la table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `id_publication` int(11) NOT NULL,
  `id_replyer` int(11) NOT NULL,
  `reply_message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `replies`
--

INSERT INTO `replies` (`id`, `id_publication`, `id_replyer`, `reply_message`) VALUES
(23, 25, 10, 'HAHAHA');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL DEFAULT 0,
  `gender` varchar(4) NOT NULL,
  `birth_date` date NOT NULL,
  `school_level` varchar(30) NOT NULL,
  `school_option` varchar(30) NOT NULL,
  `profile_image` varchar(500) NOT NULL DEFAULT 'default.jpg',
  `background_image` varchar(500) NOT NULL DEFAULT 'default.jpg',
  `suspended` int(11) NOT NULL DEFAULT 0,
  `account_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `country`, `state`, `phone`, `gender`, `birth_date`, `school_level`, `school_option`, `profile_image`, `background_image`, `suspended`, `account_type`) VALUES
(7, 'amigo', 'amizal', 'blika', 'gouliben@gmail.com', '$2y$10$s9VzIMmqJdvIiADeHRmq4.hkwI5CnBGIHqdlLfVQYDmIpc6N.Df7i', 'Cameroon', 'yaoun', 0, 'm', '2021-06-24', 'Doctorate +', 'info', 'night.jpg', 'background.jpg', 1, 'Student'),
(10, 'admin', 'admina', 'Adminatrator', 'admin@gmail.com', '$2y$10$g/UKt8PH1d1fQlUBmQ5a1eHXE/SQ9KylsLpmxcSSZP5v7RhZKaqfW', 'Cameroon', 'Yaounde', 696547852, 'M', '2021-07-21', 'Doctorate', 'Software engineer degree', 'default-1633442376.jpg', 'pexels-joshua-mcknight-1139317-1633441142.jpg', 0, 'admin'),
(11, 'teacher', 'teacher', 'Teacher', 'teacher@gmail.com', '$2y$10$8PNbjIXDET/66igtqOVGv.dGi.efWhj.atlxS3LKvwcdD3HOVTE9O', 'Cameroon', 'Yaounde', 0, 'm', '2021-10-07', 'Doctorate +', 'Social engineer', 'img3-1633502997.jpg', 'pexels-sanaan-mazhar-3075993-1633502921.jpg', 0, 'Teacher'),
(12, 'Luc', 'Papaye', 'Luc Papaye', 'lucpapaye@gmail.com', '$2y$10$UrW6Lw6uApP9UNqr5FsMSe/ZCBddKJGoVRHxJq.8lkGB4ZfrVPz02', 'Cameroon', 'Bafoussam', 0, 'm', '2021-09-10', 'Master 2', 'Software engineer', 'DSC_0158-1633504020.JPG', 'default.jpg', 0, 'Teacher'),
(13, 'Raissa', 'Lovane', 'Missipa', 'missipa@gmail.com', '$2y$10$QCVC6WzZTT47C/9OMZgJqOmkGPNx8RqLqBKElaMossOlEo4COdvui', 'Cameroon', 'Baham', 0, 'm', '2021-06-18', 'Master 2', 'Front-end developper engineer', 'default.jpg', 'default.jpg', 0, 'Student');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course` (`course`);

--
-- Index pour la table `cloud`
--
ALTER TABLE `cloud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prof` (`id_prof`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pub` (`id_pub`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_replyer` (`id_replyer`),
  ADD KEY `id_publication` (`id_publication`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `cloud`
--
ALTER TABLE `cloud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_ibfk_1` FOREIGN KEY (`course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cloud`
--
ALTER TABLE `cloud`
  ADD CONSTRAINT `cloud_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_pub`) REFERENCES `publication` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`id_replyer`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
