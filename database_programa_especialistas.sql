-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 06:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `programa_especialistas`
--
DROP DATABASE IF EXISTS `programa_especialistas`;
CREATE DATABASE IF NOT EXISTS `programa_especialistas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `programa_especialistas`;

-- --------------------------------------------------------

--
-- Table structure for table `especialidade`
--

CREATE TABLE `especialidade` (
  `especialidade_id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `especialidade`
--

INSERT INTO `especialidade` (`especialidade_id`, `descricao`) VALUES
(1, 'Gestão de Projetos'),
(3, 'HMTL'),
(4, 'JavaScript'),
(6, 'Métodos Ágeis'),
(2, 'PHP'),
(5, 'Scrum'),
(7, 'SQL');

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `funcionario_id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(320) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `gestor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`funcionario_id`, `nome`, `email`, `telefone`, `gestor_id`) VALUES
(1, 'Cristina Verçosa Perez Barrios de Souza', 'cristina.souza@pucpr.br', '+5541crisxxxx', 1),
(2, 'Eric Ludolf de Almeida Carvalho', 'eric.ludolf@pucpr.edu.br', '+5541ericxxxx', 1),
(3, 'Eduardo Rebelo Eleuterio', 'eduardo.eleuterio@pucpr.edu.br', '+5541eduaxxxx', 1),
(4, 'Rodrigo Sardagna Romer Germel', 'rodrigo.germel@pucpr.edu.br', '+5541rodrxxxx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `funcionario_especialidade`
--

CREATE TABLE `funcionario_especialidade` (
  `funcionario_id` int(11) NOT NULL,
  `especialidade_id` int(11) NOT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funcionario_especialidade`
--

INSERT INTO `funcionario_especialidade` (`funcionario_id`, `especialidade_id`, `nivel`) VALUES
(1, 5, 8),
(2, 1, 8),
(2, 7, 7),
(3, 2, 7),
(4, 3, 7),
(4, 6, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `especialidade`
--
ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`especialidade_id`),
  ADD UNIQUE KEY `idx_descricao` (`descricao`) USING BTREE;

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`funcionario_id`),
  ADD KEY `idx_gestor_id` (`gestor_id`) USING BTREE;

--
-- Indexes for table `funcionario_especialidade`
--
ALTER TABLE `funcionario_especialidade`
  ADD PRIMARY KEY (`funcionario_id`,`especialidade_id`),
  ADD KEY `idx_fk_funcionario_especialidade_especialidade` (`funcionario_id`) USING BTREE,
  ADD KEY `idx_fk_funcionario_especialidade_funcionario` (`funcionario_id`) USING BTREE,
  ADD KEY `fk_funcionario_especialidade_especialidade` (`especialidade_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `especialidade`
--
ALTER TABLE `especialidade`
  MODIFY `especialidade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`gestor_id`) REFERENCES `funcionario` (`funcionario_id`) ON UPDATE CASCADE;

--
-- Constraints for table `funcionario_especialidade`
--
ALTER TABLE `funcionario_especialidade`
  ADD CONSTRAINT `fk_funcionario_especialidade_especialidade` FOREIGN KEY (`especialidade_id`) REFERENCES `especialidade` (`especialidade_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_funcionario_especialidade_funcionario` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`funcionario_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
