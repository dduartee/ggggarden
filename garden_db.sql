-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Set-2020 às 15:59
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
(1, 'ALUMINUM', 'Moletom', 'produtos/moletom/aluminium', '199.99', 'moletom-cinza.png', 'PP, P, M, G, GG', '2020-07-31 14:52:31', '2020-08-23 16:50:03'),
(2, 'AZURITA', 'Moletom', 'produtos/moletom/azurita', '199.99', 'moletom-azul.png', 'P, M, G', '2020-07-31 16:59:50', '2020-08-23 16:50:04'),
(3, 'AMETISTA', 'Moletom', 'produtos/moletom/ametista', '199.99', 'moletom-roxo.png', 'PP, P, M, GG', '2020-07-31 16:59:50', '2020-08-23 16:50:04'),
(4, 'Super Noias', 'Camiseta', 'produtos/camiseta/super-noias', '99.99', 'camiseta-supernoia.png, camiseta-supernoia-costas.png, slogan-supernoias.png, slogan-costas-supernoias.png, tamanhos-supernoias.png', 'PP, M, GG', '2020-08-21 16:27:04', '2020-08-23 16:50:04'),
(5, 'Um Ano', 'Camiseta', 'produtos/camiseta/um-ano', '99.99', 'camiseta-umano.png, camiseta-umano-costas.png, tamanhos-umano.png', 'PP, P, GG', '2020-08-21 16:28:11', '2020-08-23 16:50:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cep` int(8) NOT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `token_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `numero`, `endereco`, `bairro`, `cep`, `estado`, `cpf`, `token_id`, `token`, `criacao`, `modificacao`) VALUES
(11, 'gabriel', 'gabriel@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 'marciano', 'veneza ', 9903903, 'sc', '097788', 'd5f4acc0a8c9f03dfa7ffb4c2ae30110', '9e7740a0fc74aa53930ea793260f532ba66b282f', '2020-08-31 00:41:00', '2020-09-01 12:44:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
