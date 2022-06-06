-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Jun-2022 às 18:47
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vagas_emprego`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

DROP TABLE IF EXISTS `vagas`;
CREATE TABLE IF NOT EXISTS `vagas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `active` enum('y','n') NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id`, `title`, `description`, `active`, `date`) VALUES
(7, 'Programador Fullstack', 'Linguagens TypeScript e PHP. Frameworks Laravel e Angular.', 'y', '2022-06-06 21:46:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
