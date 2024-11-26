-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 11:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumnikvks`
--

-- --------------------------------------------------------

--
-- Table structure for table `bekerja`
--

CREATE TABLE `bekerja` (
  `ID` int(255) NOT NULL,
  `pfp` varchar(255) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `noIc` varchar(20) NOT NULL,
  `jantina` varchar(10) NOT NULL,
  `kursus` varchar(255) NOT NULL,
  `kohort` int(4) NOT NULL,
  `kerja` varchar(1000) NOT NULL,
  `gaji` int(8) NOT NULL,
  `notel` varchar(20) NOT NULL,
  `alamatrumah` varchar(200) NOT NULL,
  `alamatkerja` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bekerja`
--

INSERT INTO `bekerja` (`ID`, `pfp`, `nama`, `noIc`, `jantina`, `kursus`, `kohort`, `kerja`, `gaji`, `notel`, `alamatrumah`, `alamatkerja`) VALUES
(3, '1701078453-pic.png', 'Xin Foo Quen', '890324031234', 'Lelaki', 'Pemasaran (BPM)', 2020, 'Marketing Boss', 7000, '012229', 'KVKS', 'Rawang Walk'),
(4, '1701133121-WIN_20220930_10_10_38_Pro.jpg', 'Jufri Firdaus bin Ab Latip', '040623100275', 'Lelaki', 'Teknologi Animasi 3D (KMK)', 2020, 'CEO', 7000, '0122299494994', 'KVKS', 'Rawang Walk'),
(5, '1701135084-WIN_20221101_07_27_08_Pro.jpg', 'Luqmanul Hakim bin Yunizam', '041030080963', 'Perempuan', 'Pemasaran (BPM)', 2018, 'Marketing Boss MANAGER', 7000, '01343344343', 'Selangor', 'Johor'),
(6, '1701135322-WIN_20230706_10_08_14_Pro.jpg', 'Muhammad Ammar Arief bin Azman', '040830100921', 'Lelaki', 'Perakaunan (BAK)', 2018, 'CEO', 200000, '01345859595', 'Selangor', 'KVKS'),
(8, '1701136151-WIN_20211119_09_44_07_Pro.jpg', 'Syahful Hakim bin Sunarto', '040401100229', 'Lelaki', 'Bakeri dan Pastri (HBP)', 2018, 'Assistant Manager ', 200000, '0122299494994', 'Selangor', 'Johor'),
(9, '1701136342-WIN_20220201_16_34_11_Pro.jpg', 'Nia binti Irwan', '991210016542', 'Perempuan', 'Seni Kulinari (HSK)', 2012, 'Marketing Boss MANAGER', 50000, '01345859595', 'KVKS', 'KVKS'),
(10, '1701136529-WIN_20220111_15_40_34_Pro.jpg', 'Lila binti Irwan', '921209014578', 'Perempuan', 'SLDN Perabot (OPP)', 2018, 'Marketing Boss MANAGER', 50000, '0193827072', 'Arab Saudi', 'KVKS'),
(12, '1703579444-pic.png', 'Kanye West Im on Griind', '910204678891', 'Lelaki', 'Teknologi Sistem Pengurusan Pangkalan Data dan Aplikasi Web (KPD)', 2020, 'Marketing Boss', 300000, '0122299494994', 'Gombak', 'Johor');

-- --------------------------------------------------------

--
-- Table structure for table `sambungbelajar`
--

CREATE TABLE `sambungbelajar` (
  `ID` int(255) NOT NULL,
  `pfp` varchar(1000) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `noIc` varchar(20) NOT NULL,
  `jantina` varchar(10) NOT NULL,
  `kursus` varchar(1000) NOT NULL,
  `kohort` int(5) NOT NULL,
  `kursussemasa` varchar(1000) NOT NULL,
  `tahunmasuk` int(5) NOT NULL,
  `tahuntamat` int(5) NOT NULL,
  `notel` varchar(20) NOT NULL,
  `alamatkerja` varchar(2000) NOT NULL,
  `alamatrumah` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sambungbelajar`
--

INSERT INTO `sambungbelajar` (`ID`, `pfp`, `nama`, `noIc`, `jantina`, `kursus`, `kohort`, `kursussemasa`, `tahunmasuk`, `tahuntamat`, `notel`, `alamatkerja`, `alamatrumah`) VALUES
(1, '1701081393-pic.png', 'Muhammad', '890324031234', 'Lelaki', 'Perakaunan (BAK)', 2018, 'Science Computer', 2022, 2024, '0118882984', 'Rawang Walk', 'Selangor'),
(2, '1701090407-pic.png', 'Ahmad Mujahid bin Amer Saifude', '041030080913', 'Lelaki', 'Teknologi Sistem Pengurusan Pangkalan Data dan Aplikasi Web (KPD)', 2018, 'Science Computer', 2022, 2024, '0118882984', 'Johor', 'Gombak'),
(3, '1701133175-WIN_20220930_10_10_38_Pro.jpg', 'Jufri Firdaus bin Ab Latip', '040623100275', 'Lelaki', 'Teknologi Animasi 3D (KMK)', 2019, 'Science Computer', 2022, 2024, '01345859595', 'Johor', 'KVKS'),
(4, '1701135128-WIN_20221101_07_27_08_Pro.jpg', 'Luqmanul Hakim bin Yunizam', '041030080963', 'Perempuan', 'Pemasaran (BPM)', 2020, '   Science Computer', 2022, 2024, '012229', 'Johor', 'Gombak'),
(5, '1701135372-WIN_20230706_10_08_14_Pro.jpg', 'Muhammad Ammar Arief bin Azman', '040830100921', 'Lelaki', 'Perakaunan (BAK)', 2018, ' Science Computer', 2022, 2024, '0118882984', 'Johor', 'Selangor'),
(6, '1701136044-WIN_20211119_10_08_13_Pro.jpg', 'Mohamad Kamarul Bahrin bin Beheran', '040422100375', 'Lelaki', 'Perbankan', 2018, 'Science Computer', 2022, 2024, '0118882984', 'Rawang Walk', 'Arab Saudi'),
(7, '1701136185-WIN_20211119_09_44_07_Pro.jpg', 'Syahful Hakim bin Sunarto', '040401100229', 'Lelaki', 'Bakeri dan Pastri (HBP)', 2019, 'Science Computer', 2022, 2024, '01343344343', 'Johor', 'Gombak'),
(8, '1701136376-WIN_20220201_16_34_14_Pro.jpg', 'Nia binti Irwan', '991210016542', 'Perempuan', 'Seni Kulinari (HSK)', 2018, 'Science Computer', 2022, 2024, '0118882984', 'Johor', 'Gombak'),
(9, '1701136574-WIN_20211119_10_15_30_Pro.jpg', 'Lila binti Irwan', '921209014578', 'Perempuan', 'SLDN Perabot (OPP)', 2012, 'Science Computer', 2022, 2024, '0122299494994', 'Johor', 'Arab Saudi'),
(10, '1701136691-pic.png', 'Ahmad Mujahid bin Amer Saifude', '040512870015', 'Lelaki', 'Teknologi Sistem Pengurusan Pangkalan Data dan Aplikasi Web (KPD)', 2018, 'Science Computer', 2022, 2024, '01343344343', 'Johor', 'Sendayu');

-- --------------------------------------------------------

--
-- Table structure for table `usahawan`
--

CREATE TABLE `usahawan` (
  `ID` int(255) NOT NULL,
  `pfp` varchar(255) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `noIc` varchar(20) NOT NULL,
  `jantina` varchar(10) NOT NULL,
  `kursus` varchar(1000) NOT NULL,
  `kohort` int(5) NOT NULL,
  `gaji` int(8) NOT NULL,
  `notel` varchar(20) NOT NULL,
  `alamatkerja` varchar(10000) NOT NULL,
  `alamatrumah` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usahawan`
--

INSERT INTO `usahawan` (`ID`, `pfp`, `nama`, `noIc`, `jantina`, `kursus`, `kohort`, `gaji`, `notel`, `alamatkerja`, `alamatrumah`) VALUES
(1, '1701081424-pic.png', 'Luqmanul Osman', '040512870015', 'Lelaki', 'Teknologi Sistem Pengurusan Pangkalan Data dan Aplikasi Web (KPD)', 2020, 300000, '012229', 'Johor', 'Selangor'),
(2, '1701133221-WIN_20220930_10_10_38_Pro.jpg', 'Jufri Firdaus bin Ab Latip', '040623100275', 'Lelaki', 'Teknologi Animasi 3D (KMK)', 2019, 300000, '0193827072', 'Johor', 'Gombak'),
(3, '1701135172-WIN_20221101_07_27_08_Pro.jpg', 'Luqmanul Hakim bin Yunizam', '041030080963', 'Perempuan', 'Pemasaran (BPM)', 2012, 300000, '01343344343', 'Johor', 'Arab Saudi'),
(4, '1701135916-WIN_20230706_10_08_14_Pro.jpg', 'Muhammad Ammar Arief bin Azman', '040830100921', 'Lelaki', 'Perakaunan (BAK)', 2012, 200000, '012229', 'Johor', 'KVKS'),
(5, '1701136078-WIN_20211119_10_08_13_Pro.jpg', 'Mohamad Kamarul Bahrin bin Beheran', '040422100375', 'Lelaki', 'Perbankan', 2018, 300000, '0122299494994', 'KVKS', 'KVKS'),
(6, '1701136222-WIN_20211119_09_44_07_Pro.jpg', 'Syahful Hakim bin Sunarto', '040401100229', 'Lelaki', 'Bakeri dan Pastri (HBP)', 2019, 200000, '012229', 'Johor', 'Selangor'),
(7, '1701136479-WIN_20220201_16_34_18_Pro.jpg', 'Nia', '991210016542', 'Perempuan', 'Seni Kulinari (HSK)', 2018, 10000, '01345859595', 'Johor', 'Selangor'),
(8, '1701136625-RobloxScreenShot20230204_001359811.png', 'Lila binti Irwan', '921209014578', 'Perempuan', 'SLDN Perabot (OPP)', 2020, 300000, '012229', 'Johor', 'KVKS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(255) NOT NULL,
  `noIc` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `pass` varchar(1000) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `noIc`, `email`, `pass`, `role`) VALUES
(3, '981702087654', 'amoi@gmail.com', '123', 'user'),
(4, '890324031234', 'jugerunkind@gmail.com', '123', 'user'),
(5, '000', 'admin@gmail.com', 'kvs3lang0r', 'admin'),
(6, '040623100275', 'antoromochi@gmail.com', '123', 'user'),
(7, '041030080963', 'juger_unkind@gmail.com', '123', 'user'),
(8, '040830100921', 'kacangammar@gmail.com', '123', 'user'),
(10, '040401100229', 'capuldalili@gmail.com', '123', 'user'),
(11, '991210016542', 'nia.irwan@gmail.com', '123', 'user'),
(12, '921209014578', 'lila.irwan@gmail.com', '123', 'user'),
(13, '0001', 'admin@gmail.com', '$2y$10$b.USL0cMGbRS77z7r5AkhuFTTSnuPApHjHbcQXs7O4fZvoTRJwWcu', 'admin'),
(14, '0002', 'admin1@gmail.com', '123', 'admin'),
(15, '0004', 'admin123@gmail.com', '$2y$10$JL09Ep8hcSTVWUumx2RrwOsBBxWGKzIzEXtRAItrcXJY7B6TgWQXS', 'admin'),
(16, '003', 'adminbruh@gmail.com', '$2y$10$31xC/ugX7aiLKEW2RV9FPuU0qkTbpTYgc4D9gG.BU6OI2JcZeuFnS', 'admin'),
(17, '004', 'adminbruv@gmail.com', '$2y$10$E6dD4bI7ZMqAIVPRlepBG.dMnFB2./yyI3uFP7d...eoJwxuGxYy6', 'admin'),
(18, '008', 'adminman@gmail.com', '$2y$10$Om9ZdPhar.fXekxNKAWHb.v0eWWO0uBfgghzS1i6KSxef1jsLwr8.', 'admin'),
(19, '10', 'pepe@gmail.com', '$2y$10$t7HyeSsTtpr2oSWZMdDX6OSJ.u0EaPYXoiPzQeJX1ygwMWY1osZ66', 'admin'),
(20, '999', 'adminnigga@gmail.com', '123', 'admin'),
(21, '888', 'ong@gmail.com', '$2y$10$uJ7Y8Gjv6nDc4TzGbx99YO0tFLzLWdGjkBJdFvcF5GkeXUH.e.Mli', 'admin'),
(22, '777', 'nigga@gmail.com', '123', 'admin'),
(23, '123', 'nigga12@gmail.com', '123', 'admin'),
(25, '040512820015', 'ahmujahid07@gmail.com', '123', 'user'),
(26, '040512890015', 'whyamitalkinglikethis@gmail.com', '123', 'user'),
(27, '040803010111', 'admmuller9@gmail.com', 'tupaikapla', 'user'),
(28, '040302109984', 'testwebsite@gmail.com', '1231', 'admin'),
(29, '910204678891', 'kanyewest@gmail.com', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bekerja`
--
ALTER TABLE `bekerja`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sambungbelajar`
--
ALTER TABLE `sambungbelajar`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usahawan`
--
ALTER TABLE `usahawan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bekerja`
--
ALTER TABLE `bekerja`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sambungbelajar`
--
ALTER TABLE `sambungbelajar`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usahawan`
--
ALTER TABLE `usahawan`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
