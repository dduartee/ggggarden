-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25-Set-2020 às 12:02
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
CREATE DATABASE IF NOT EXISTS `garden_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `garden_db`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `conteudo` longtext COLLATE utf8_unicode_ci,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id`, `nome`, `email`, `user_id`, `conteudo`, `created`, `modified`) VALUES
(2, 'gabrielkduarte', 'gabriel@gmail.com', 23, 'camiseta1, moletom1, boné, meia', '2020-09-23 01:52:23', '2020-09-23 01:52:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `tamanhos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `tipo`, `uri`, `preco`, `imagem`, `tamanhos`, `created`, `modified`) VALUES
(7, 'Peita de Dar Role', 'Camiseta', 'produtos/camiseta/peita-de-dar-role', '99.99', 'PeitaDeDarRoleFrente.png, PeitaDeDarRoleCostas.png, PeitaDeDarRoleFrenteEscura.png, PeitaDeDarRoleCostasEscura.png, PeitaDeDarRoleMedidas.png', 'P, M, G, GG', '2020-09-18 00:51:25', '2020-09-18 00:51:25'),
(4, 'Super Noias', 'Camiseta', 'produtos/camiseta/super-noias', '99.99', 'camiseta-supernoia.png, camiseta-supernoia-costas.png, slogan-supernoias.png, slogan-costas-supernoias.png, tamanhos-supernoias.png', 'PP, M, GG', '2020-08-21 16:27:04', '2020-08-23 16:50:04'),
(6, 'RESPIRADA', 'Meia', 'produtos/meia/meia-respirada', '11.99', 'RESPIRADA.png', 'Tamanho unico', '2020-09-18 00:51:25', '2020-09-18 00:51:25'),
(5, 'Boné de firma', 'Boné', 'produtos/bone/bone-de-firma', '22.99', 'BoneDeFirma.png', 'Tamanho unico', '2020-09-18 00:51:25', '2020-09-18 00:51:25');

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
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `numero`, `endereco`, `bairro`, `cep`, `estado`, `cpf`, `token_id`, `token`, `created`, `modified`) VALUES
(11, 'gabriel', 'gabriel@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 'end tal', 'bairro tal ', 9903903, 'sc', '097788', '1a08922574dabd1399be05dabc654562', '38aff942512ac4a166b30b4cc2f707a960e5855b', '2020-08-31 00:41:00', '2020-09-23 02:18:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
