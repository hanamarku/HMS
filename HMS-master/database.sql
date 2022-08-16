-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306:2521
-- Generation Time: May 08, 2022 at 01:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_departament`
--

CREATE TABLE `db_departament` (
  `dep_id` int(11) NOT NULL,
  `emri` varchar(50) NOT NULL,
  `info` text DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_departament`
--

INSERT INTO `db_departament` (`dep_id`, `emri`, `info`, `image`) VALUES
(126, 'Kardiologji', 'I ngritur në një kohë që pacientët kardiakë linin vendin për t’u diagnostikuar dhe trajtuar jashtë, kardiologjia e Spitalit Heal & Health çeli një epoke të re në mjekësinë moderne shqiptare. Ekipi i kardiologëve të talentuar ka trajtuar në vite mijëra pacientë të problematikave të ndryshme kardiake, përfshirë edhe rastet më ekstreme të infarkteve akute të miokardit dhe shokut kardiogjen. Me ekipin e gjerë të trajnuar në disiplinat përkatëse dhe me aparaturat më moderne, Departamenti i Kardiologjisë mbulon me shërbim 24 orë në 7 ditë të javës çdo kërkesë të poliklinikës dhe urgjencave kardiake duke i trajtuar në mënyrë medikale, me koronaroangiografi, stentime në rast nevoje, studim elektrofiziologjik, ablacion, pacemaker, defibrilatorë, mbyllje defektesh të lindura e deri trajtimi me shumë suksese me rrugë perkutane i disekimeve të aortes.  Përveç trajtimit medikal dhe metodave invazive, Departamenti i Kardiologjisë i ka kushtuar një vëmendje të veçantë edhe edukimit të pacientit lidhur me parandalimin dhe trajtimin në kohë të sëmundjeve kardiake duke organizuar pothuaj në mënyrë të përhershme fushata check up kardiak me paketa kardiologjie shumë ekonomike dhe promovimin e tyre në masën e gjerë të popullatës.', '770220681.jpg'),
(127, 'Dermatologji', 'Sëmundjet e lëkurës janë të shumta, por vetëm disa prej tyre detyrojnë pacientët që të paraqiten te mjeku për vizitë. Kjo ndodh edhe për faktin se duke u nënvlerësuar, ato ose mjekohen keq duke krijuar rezistenca ndaj medikamenteve, ose nuk trajtohen dhe evoluojnë deri në gjeneralizim të tyre,ose janë shenjat më të dukshme të sëmundjeve sistemike (të brendshme të organizmit).  Në spitalin tonë ne diagnostikojmë dhe ndjekim në vazhdimësi trajtimet e kartelizuara të pacientëve për patologjitë dermatologjike të moshës pediatrike, sëmundjet kronike, diagnostikimin e patologjive malinje, trajtimin e patologjive të thonjve, flokëve, mukozës të gojës dhe infeksioneve gjenitale. Praktika klinike bashkëvepron tërësisht me ekzaminimet laboratorike të një niveli të lartë dhe konsultat e mjekëve të specialiteteve të tjera për të arritur ne diagnostikimin dhe trajtimin e duhur.', '564046425.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dhurimi`
--

CREATE TABLE `dhurimi` (
  `id` int(11) NOT NULL,
  `nr_llog_dhuruesit` varchar(26) NOT NULL,
  `nr_llog_pacientit` varchar(26) NOT NULL,
  `data` datetime NOT NULL,
  `shuma` varchar(26) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pacient_ne_nevoje`
--

CREATE TABLE `pacient_ne_nevoje` (
  `id` int(11) NOT NULL,
  `nr_llogarise_bankare` varchar(100) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `pershkrimi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pacient_ne_nevoje`
--

INSERT INTO `pacient_ne_nevoje` (`id`, `nr_llogarise_bankare`, `image`, `pershkrimi`) VALUES
(128, '232894', 'client2.jpg', 'Teuta, që në moshën 1 vjeçare shfaqi probleme me mëlçinë. (Fibrozë Hepatike Kongenitale).Ajo është në limitet e rikuperimit nga mëlçia.');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `role_name`) VALUES
(0, 'pacient'),
(1, 'doktor'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `emri` varchar(50) DEFAULT NULL,
  `mbiemri` varchar(50) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `nr_telit` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `datelindja` date DEFAULT NULL,
  `fjalekalimi` varchar(300) NOT NULL,
  `gjinia` enum('Femer','Mashkull') DEFAULT NULL,
  `roleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emri`, `mbiemri`, `username`, `nr_telit`, `email`, `datelindja`, `fjalekalimi`, `gjinia`, `roleId`) VALUES
(123, NULL, NULL, 'Eva123', NULL, NULL, NULL, '8f8a11f3e3f8a7676f3d05e8ae3f35b7', NULL, 2),
(125, 'Jona ', 'Sako', 'Jona123', '0686854123', 'jona@gmail.com', '2003-06-08', 'ac61a967d1ebf5748fd61946208557be', 'Femer', 1),
(126, 'Emanuel', 'Male', 'mano123', '0686854123', 'mano@gmail.com', '2000-06-02', 'ac61a967d1ebf5748fd61946208557be', 'Femer', 1),
(128, 'Teuta', 'Sako', 'teuta1', '0686854123', 'teuta@gmail.com', '1965-06-08', 'ac61a967d1ebf5748fd61946208557be', 'Femer', 0),
(129, 'Violeta', 'Sako', 'Violeta123', '0686854123', 'violeta@gmail.com', '1972-12-08', 'ac61a967d1ebf5748fd61946208557be', 'Femer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_doc_spec`
--

CREATE TABLE `users_doc_spec` (
  `id` int(11) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `specializimi` varchar(50) NOT NULL,
  `status` enum('Pergjegjes','Staf') DEFAULT NULL,
  `dep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_doc_spec`
--

INSERT INTO `users_doc_spec` (`id`, `image`, `specializimi`, `status`, `dep_id`) VALUES
(125, 'carolin.jpg', 'Kardiologe', 'Staf', 126),
(126, 'cristiano.jpg', 'Dermatolog', 'Pergjegjes', 127);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_departament`
--
ALTER TABLE `db_departament`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `dhurimi`
--
ALTER TABLE `dhurimi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacient_ne_nevoje`
--
ALTER TABLE `pacient_ne_nevoje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `roleId` (`roleId`);

--
-- Indexes for table `users_doc_spec`
--
ALTER TABLE `users_doc_spec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DEPARTAMENT_CONSTRAINT` (`dep_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_departament`
--
ALTER TABLE `db_departament`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dhurimi`
--
ALTER TABLE `dhurimi`
  ADD CONSTRAINT `dhurimi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pacient_ne_nevoje`
--
ALTER TABLE `pacient_ne_nevoje`
  ADD CONSTRAINT `pacient_ne_nevoje_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `roles` (`roleId`);

--
-- Constraints for table `users_doc_spec`
--
ALTER TABLE `users_doc_spec`
  ADD CONSTRAINT `DEPARTAMENT_CONSTRAINT` FOREIGN KEY (`dep_id`) REFERENCES `db_departament` (`dep_id`),
  ADD CONSTRAINT `users_doc_spec_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
