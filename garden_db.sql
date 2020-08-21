-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21-Ago-2020 às 22:41
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `garden_db`
--
CREATE DATABASE IF NOT EXISTS `garden_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `garden_db`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `tipo` varchar(150) NOT NULL,
  `uri` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` text NOT NULL,
  `tamanhos` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `tipo`, `uri`, `preco`, `imagem`, `tamanhos`, `created`, `modified`) VALUES
(1, 'ALUMINUM', 'Moletom', 'moletom/aluminium', '199.99', 'moletom-cinza.png', 'PP, P, M, G, GG', '2020-07-31 14:52:31', '2020-08-21 21:59:54'),
(2, 'AZURITA', 'Moletom', 'moletom/azurita', '199.99', 'moletom-azul.png', 'P, M, G', '2020-07-31 16:59:50', '2020-08-21 21:59:54'),
(3, 'AMETISTA', 'Moletom', 'moletom/ametista', '199.99', 'moletom-roxo.png', 'PP, P, M, GG', '2020-07-31 16:59:50', '2020-08-21 21:59:54'),
(4, 'Super Noias', 'Camiseta', 'camiseta/super-noias', '99.99', 'camiseta-supernoia.png, camiseta-supernoia-costas.png, slogan-supernoias.png, slogan-costas-supernoias.png, tamanhos-supernoias.png', 'PP, M, GG', '2020-08-21 16:27:04', '2020-08-21 22:21:15'),
(5, 'Um Ano', 'Camiseta', 'camiseta/um-ano', '99.99', 'camiseta-umano.png, camiseta-umano-costas.png, tamanhos-umano.png', 'PP, P, GG', '2020-08-21 16:28:11', '2020-08-21 22:15:01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
