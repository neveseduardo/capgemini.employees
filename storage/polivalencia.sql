-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 30-Jan-2020 às 16:48
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polivalencia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lotacao`
--

DROP TABLE IF EXISTS `lotacao`;
CREATE TABLE IF NOT EXISTS `lotacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funcionarios_id` int(11) NOT NULL,
  `postos_de_trabalho_id` int(11) NOT NULL,
  `tempo_de_alocacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `validade_de_alocacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `funcionarios_id` (`funcionarios_id`),
  KEY `postos_de_trabalho_id` (`postos_de_trabalho_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Acionadores `lotacao`
--
DROP TRIGGER IF EXISTS `validadeAlocacao`;
DELIMITER $$
CREATE TRIGGER `validadeAlocacao` BEFORE INSERT ON `lotacao` FOR EACH ROW SET NEW.validade_de_alocacao = NEW.validade_de_alocacao + INTERVAL 6 MONTH
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postos_de_trabalho`
--

DROP TABLE IF EXISTS `postos_de_trabalho`;
CREATE TABLE IF NOT EXISTS `postos_de_trabalho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
