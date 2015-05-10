-- --------------------------------------------------------
-- Servidor:                     djar.com.br
-- Versão do servidor:           5.5.37-0ubuntu0.12.04.1 - (Ubuntu)
-- OS do Servidor:               debian-linux-gnu
-- HeidiSQL Versão:              8.3.0.4766
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para atividade06douglasjam
CREATE DATABASE IF NOT EXISTS `atividade06douglasjam` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `atividade06douglasjam`;


-- Copiando estrutura para tabela atividade06douglasjam.cidades
CREATE TABLE IF NOT EXISTS `cidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `datcad` datetime DEFAULT NULL,
  `datalt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela atividade06douglasjam.cidades: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `cidades` DISABLE KEYS */;
INSERT INTO `cidades` (`id`, `estado_id`, `nome`, `datcad`, `datalt`) VALUES
	(1, 1, 'Itaúna', NULL, NULL),
	(2, 1, 'Divinopolis', NULL, NULL),
	(3, 1, 'Belo Horizonte', NULL, NULL),
	(4, 1, 'Betim', NULL, NULL),
	(5, 1, 'Contagem', NULL, NULL),
	(6, 2, 'São Paulo', NULL, NULL),
	(7, 2, 'Guarulhos', NULL, NULL),
	(8, 3, 'Rio de Janeiro', NULL, NULL),
	(9, 3, 'Paraty', NULL, NULL);
/*!40000 ALTER TABLE `cidades` ENABLE KEYS */;


-- Copiando estrutura para tabela atividade06douglasjam.estados
CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `sigla` varchar(2) DEFAULT NULL,
  `datcad` datetime DEFAULT NULL,
  `datalt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela atividade06douglasjam.estados: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` (`id`, `nome`, `sigla`, `datcad`, `datalt`) VALUES
	(1, 'Minas Gerais', 'MG', NULL, NULL),
	(2, 'São Paulo', 'SP', NULL, NULL),
	(3, 'Rio de Janeiro', 'RJ', NULL, NULL);
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;


-- Copiando estrutura para tabela atividade06douglasjam.participantes
CREATE TABLE IF NOT EXISTS `participantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `email` varchar(1024) DEFAULT NULL,
  `nome` varchar(1024) DEFAULT NULL,
  `foto` varchar(1024) DEFAULT NULL,
  `cidade_id` int(11) DEFAULT NULL,
  `descricao` text,
  `ultimoperfilvisitado_id` int(11) DEFAULT NULL,
  `datcad` datetime DEFAULT NULL,
  `datalt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela atividade06douglasjam.participantes: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `participantes` DISABLE KEYS */;
INSERT INTO `participantes` (`id`, `login`, `senha`, `email`, `nome`, `foto`, `cidade_id`, `descricao`, `ultimoperfilvisitado_id`, `datcad`, `datalt`) VALUES
	(1, 'douglasjam', '123456', 'douglasjam@gmail.com', 'Douglas J.A.M', 'douglasjam.jpg', 1, 'Bacharel em Ciência da Computação', 1, NULL, NULL),
	(2, 'leonardo', '123456', 'leoccuit@gmail.com', 'Leonardo Antônio', 'leonardoantonio.jpg', 3, 'Ajudante de Carpintaria', NULL, NULL, NULL),
	(3, 'jaqueline', '123123', 'jacque2020@hotmail.com', 'Jaqueline Ribeiro', 'patriciamascarenhas.png', 9, 'Modelo', NULL, NULL, NULL),
	(4, 'luizantonio', '123456', 'luis@antonio.net', 'Luis Antonio', '2014052619203700000026743_pablosouza.jpg', 2, 'Bacharel em Sistemas da Informação', NULL, NULL, NULL),
	(7, 'julia', '123456', 'julia@netvirtual.com', 'Julia Almeida', '2014052619491700000050576_rosangelasilva.jpg', 6, 'Surfista', NULL, NULL, NULL),
	(9, 'jadson', '123456', 'jadson@jaksom.com', 'Jadson', '2014052619550900000088371_rafaelteixeira.jpg', 5, 'Cantor Sertanejo', NULL, NULL, NULL),
	(10, 'leo', '123', 'leoccuit@gmail.com', 'Leonardo', '2014052619585800000073592_sdc12910-3x4.jpg', 3, 'fasfsaddfsa', 1, NULL, NULL);
/*!40000 ALTER TABLE `participantes` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
