-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 22/02/2013 às 21h29min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `intraftr_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE IF NOT EXISTS `arquivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(8) DEFAULT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `exibir` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_sistema`
--

CREATE TABLE IF NOT EXISTS `log_sistema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ocorrido` varchar(300) DEFAULT NULL,
  `dia_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `logo_img` varchar(200) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `perfil` varchar(30) DEFAULT NULL,
  `exibir` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome_usuario`, `logo_img`, `usuario`, `senha`, `perfil`, `exibir`) VALUES
(1, 'Krush Admin', NULL, 'admin', 'admin', 'Administrador', 'sim'),
(2, 'Cliente 1', NULL, 'cliente', 'cliente', 'Cliente', 'sim'),
(3, 'Cliente 2', NULL, 'cliente2', 'cliente2', 'Cliente', 'sim'),
(4, 'Cliente 3', NULL, 'cliente3', 'cliente3', 'Cliente', 'sim'),
(5, 'Cliente 4', NULL, 'cliente4', 'cliente4', 'Cliente', 'sim'),
(6, 'Cliente 5', NULL, 'cliente5', 'cliente5', 'Cliente', 'sim'),
(7, 'Cliente 6', NULL, 'cliente6', 'cliente6', 'Cliente', 'sim');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD CONSTRAINT `arquivo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
