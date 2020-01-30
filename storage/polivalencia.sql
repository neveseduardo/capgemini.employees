-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 30-Jan-2020 às 15:32
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `data_nascimento`, `cidade`, `telefone`) VALUES
(1, 'Hermina Morissette', '23/12/1990', 'Belém', '(91) 98888-8888'),
(2, 'Dr. Isom Considine IV', '23/12/1990', 'Belém', '(91) 98888-8888'),
(3, 'Ellen Lindgren', '23/12/1990', 'Belém', '(91) 98888-8888'),
(4, 'Donnell West', '23/12/1990', 'Belém', '(91) 98888-8888'),
(5, 'Joanie Greenholt', '23/12/1990', 'Belém', '(91) 98888-8888'),
(6, 'Prof. Alford Bogan', '23/12/1990', 'Belém', '(91) 98888-8888'),
(7, 'Landen Kerluke Sr.', '23/12/1990', 'Belém', '(91) 98888-8888'),
(8, 'Israel Kuphal', '23/12/1990', 'Belém', '(91) 98888-8888');

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
  PRIMARY KEY (`id`),
  KEY `funcionarios_id` (`funcionarios_id`),
  KEY `postos_de_trabalho_id` (`postos_de_trabalho_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `lotacao`
--

INSERT INTO `lotacao` (`id`, `funcionarios_id`, `postos_de_trabalho_id`, `tempo_de_alocacao`) VALUES
(1, 1, 1, '2019-12-29 17:10:51'),
(2, 2, 1, '2019-12-25 12:48:22'),
(3, 3, 1, '2020-01-30 12:48:22'),
(4, 4, 2, '2020-01-30 12:48:22'),
(5, 5, 2, '2019-12-17 12:48:22'),
(6, 6, 2, '2020-01-30 12:48:22'),
(7, 7, 2, '2020-01-30 12:48:22'),
(8, 8, 2, '2020-01-30 12:48:22');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `postos_de_trabalho`
--

INSERT INTO `postos_de_trabalho` (`id`, `setor`, `nome`) VALUES
(1, 'São Paulo', 'Alverta Krajcik'),
(2, 'Belo Horizonte', 'Abigayle Ratke');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
