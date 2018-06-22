-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 21-Jun-2018 às 23:14
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_administradores`
--

DROP TABLE IF EXISTS `tb_administradores`;
CREATE TABLE IF NOT EXISTS `tb_administradores` (
  `ADM_ID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ADM_NOME` varchar(20) DEFAULT NULL,
  `ADM_LOGIN` varchar(30) DEFAULT NULL,
  `ADM_EMAIL` varchar(60) DEFAULT NULL,
  `ADM_SENHA` varchar(20) DEFAULT NULL,
  `ADM_DATA` datetime DEFAULT NULL,
  `ADM_ACESSO` datetime DEFAULT NULL,
  `ADM_STATUS` tinyint(1) DEFAULT NULL,
  `ADM_TIPO` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ADM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_administradores`
--

INSERT INTO `tb_administradores` (`ADM_ID`, `ADM_NOME`, `ADM_LOGIN`, `ADM_EMAIL`, `ADM_SENHA`, `ADM_DATA`, `ADM_ACESSO`, `ADM_STATUS`, `ADM_TIPO`) VALUES
(2, 'Adm', 'site', 'contato@site.com.br', 'info2013', '2013-07-27 14:58:40', '2013-08-17 00:05:05', 1, 1),
(3, 'Jonathan', 'jonathan', 'jonathandavid@site.com.br', 'jonathan', '2013-08-14 09:21:12', '2018-06-21 22:47:23', 1, 1),
(4, 'Fulano de Tal', 'fulano', 'fulano@site.com.br', 'senha', '2013-08-14 20:10:43', '2013-08-14 20:10:43', 0, 0),
(5, 'sicrano', 'sicrano', 'sicrano', 'sicrano', '2018-06-21 22:48:05', '2018-06-21 22:48:05', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_banner`
--

DROP TABLE IF EXISTS `tb_banner`;
CREATE TABLE IF NOT EXISTS `tb_banner` (
  `BAN_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `BAN_ADM_ID` mediumint(8) UNSIGNED NOT NULL,
  `BAN_DATA` datetime DEFAULT NULL,
  `BAN_IMG` text,
  `BAN_DESCRICAO` text,
  `BAN_STATUS` tinyint(1) NOT NULL,
  PRIMARY KEY (`BAN_ID`,`BAN_ADM_ID`),
  KEY `FK_ADM_BAN` (`BAN_ADM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_banner`
--

INSERT INTO `tb_banner` (`BAN_ID`, `BAN_ADM_ID`, `BAN_DATA`, `BAN_IMG`, `BAN_DESCRICAO`, `BAN_STATUS`) VALUES
(4, 3, '2018-06-21 21:50:58', 'background2.jpg', '<p><strong>LEGENDA</strong></p>\r\n', 1),
(5, 3, '2018-06-21 21:14:33', 'coffee.jpg', '<p><strong>LEGENDA</strong></p>\r\n', 1),
(9, 3, '2018-06-21 22:45:22', '7-textura-negra.jpg', '<p>LEGENDA</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categorias`
--

DROP TABLE IF EXISTS `tb_categorias`;
CREATE TABLE IF NOT EXISTS `tb_categorias` (
  `CAT_ID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CAT_NOME` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`CAT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_categorias`
--

INSERT INTO `tb_categorias` (`CAT_ID`, `CAT_NOME`) VALUES
(1, 'PortfÃ³lio'),
(2, 'Novidades'),
(3, 'Eventos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contatos`
--

DROP TABLE IF EXISTS `tb_contatos`;
CREATE TABLE IF NOT EXISTS `tb_contatos` (
  `CON_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CON_NOME` varchar(45) DEFAULT NULL,
  `CON_EMAIL` varchar(60) DEFAULT NULL,
  `CON_ASSUNTO` varchar(45) DEFAULT NULL,
  `CON_MENSAGEM` text,
  `CON_DATA` datetime DEFAULT NULL,
  `CON_STATUS` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`CON_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_contatos`
--

INSERT INTO `tb_contatos` (`CON_ID`, `CON_NOME`, `CON_EMAIL`, `CON_ASSUNTO`, `CON_MENSAGEM`, `CON_DATA`, `CON_STATUS`) VALUES
(16, 'vfvkovkrok', 'okdoekdoek', 'okdoekdoek', 'okdoekdeodkeok', '2013-07-27 19:14:13', 1),
(18, 'IJDIEI', 'IJDEIJIDJIJ', 'IDEIJDIEDJIJ', 'IJDEJDIEJIDJE', '2018-06-21 22:42:17', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_info`
--

DROP TABLE IF EXISTS `tb_info`;
CREATE TABLE IF NOT EXISTS `tb_info` (
  `INF_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `INF_EMAIL` text,
  `INF_EMAIL2` text,
  `INF_TEL1` varchar(20) DEFAULT NULL,
  `INF_TEL2` varchar(20) DEFAULT NULL,
  `INF_LATITUDE` text,
  `INF_LONGITUDE` text,
  `INF_RUA` text,
  `INF_BAIRRO` text,
  `INF_CEP` varchar(10) DEFAULT NULL,
  `INF_CIDADE` text,
  `INF_ESTADO` text,
  `INF_PREVIA` text,
  `INF_DATA` datetime DEFAULT NULL,
  `INF_ADM_ID` int(11) DEFAULT NULL,
  `INF_YOUTUBE` text,
  `INF_TWITTER` text,
  `INF_FACEBOOK` text,
  PRIMARY KEY (`INF_ID`),
  KEY `INF_ADM_ID` (`INF_ADM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_info`
--

INSERT INTO `tb_info` (`INF_ID`, `INF_EMAIL`, `INF_EMAIL2`, `INF_TEL1`, `INF_TEL2`, `INF_LATITUDE`, `INF_LONGITUDE`, `INF_RUA`, `INF_BAIRRO`, `INF_CEP`, `INF_CIDADE`, `INF_ESTADO`, `INF_PREVIA`, `INF_DATA`, `INF_ADM_ID`, `INF_YOUTUBE`, `INF_TWITTER`, `INF_FACEBOOK`) VALUES
(1, 'contato@site.com.br', 'site@gmail.com', '', '', NULL, NULL, 'Av. Senador Salgado Filho, 3000', 'Campus UniversitÃ¡rio, Lagoa Nova', '59000000', 'Natal', 'RN, Brasil', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse lacinia, orci nec pharetra elementum, lectus elit pharetra urna, tincidunt imperdiet orci tortor sed dolor. Cras ac tincidunt massa. Phasellus porta felis sit amet mauris venenatis lobortis. Nam mauris arcu, fermentum sed lacus a, pulvinar porttitor urna. Sed vel pharetra mauris. Donec interdum libero lorem, non venenatis nibh pretium pharetra. Suspendisse ipsum erat, ultricies at adipiscing sed, lobortis fermentum massa. Quisque sed eleifend odio, quis ornare lacus. Vestibulum consequat urna felis, id facilisis neque egestas eu. Vivamus dapibus lobortis tortor sit amet gravida. Praesent viverra condimentum justo eget porttitor.<br />\r\n&nbsp;</p>\r\n', '2018-06-21 22:42:17', 3, 'https://www.youtube.com/user/TVAgecom', 'https://twitter.com/ufrn_agecom', 'https://www.facebook.com/ufrnoficial/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_inscricoes`
--

DROP TABLE IF EXISTS `tb_inscricoes`;
CREATE TABLE IF NOT EXISTS `tb_inscricoes` (
  `IN_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `IN_NOME` text COLLATE utf8_unicode_ci,
  `IN_RG` text COLLATE utf8_unicode_ci,
  `IN_CPF` text COLLATE utf8_unicode_ci,
  `IN_MATRICULA` text COLLATE utf8_unicode_ci,
  `IN_NASCIMENTO` date DEFAULT NULL,
  `IN_SEXO` tinyint(1) DEFAULT NULL,
  `IN_TELEFONE1` text COLLATE utf8_unicode_ci,
  `IN_TELEFONE2` text COLLATE utf8_unicode_ci,
  `IN_EMAIL` text COLLATE utf8_unicode_ci,
  `IN_PORTADOR` tinyint(1) DEFAULT NULL,
  `IN_COMENTARIO` text COLLATE utf8_unicode_ci,
  `IN_DATA` datetime DEFAULT NULL,
  `IN_STATUS` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_paginas`
--

DROP TABLE IF EXISTS `tb_paginas`;
CREATE TABLE IF NOT EXISTS `tb_paginas` (
  `PAG_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PAG_ADM_ID` mediumint(8) UNSIGNED NOT NULL,
  `PAG_TITULO` text,
  `PAG_CONTEUDO` longtext,
  `PAG_DATA` datetime DEFAULT NULL,
  `PAG_STATUS` tinyint(1) DEFAULT NULL,
  `PAG_EDITADO` datetime DEFAULT NULL,
  PRIMARY KEY (`PAG_ID`,`PAG_ADM_ID`),
  KEY `FK_ADM_PAG` (`PAG_ADM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_paginas`
--

INSERT INTO `tb_paginas` (`PAG_ID`, `PAG_ADM_ID`, `PAG_TITULO`, `PAG_CONTEUDO`, `PAG_DATA`, `PAG_STATUS`, `PAG_EDITADO`) VALUES
(1, 3, 'QUEM SOMOS', '<p><img src=\"http://localhost/SITE/imagens/ufrn-brasao.png\" style=\"float:left; height:293px; width:300px\" /></p>\r\n\r\n<h1>A SITE</h1>\r\n\r\n<p><br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse lacinia, orci nec pharetra elementum, lectus elit pharetra urna, tincidunt imperdiet orci tortor sed dolor. Cras ac tincidunt massa. Phasellus porta felis sit amet mauris venenatis lobortis. Nam mauris arcu, fermentum sed lacus a, pulvinar porttitor urna. Sed vel pharetra mauris. Donec interdum libero lorem, non venenatis nibh pretium pharetra. Suspendisse ipsum erat, ultricies at adipiscing sed, lobortis fermentum massa. Quisque sed eleifend odio, quis ornare lacus. Vestibulum consequat urna felis, id facilisis neque egestas eu. Vivamus dapibus lobortis tortor sit amet gravida. Praesent viverra condimentum justo eget porttitor.<br />\r\n<br />\r\nSed malesuada quis nunc nec vulputate. Pellentesque risus justo, cursus nec odio non, dapibus congue tellus. Integer dignissim dignissim dui, quis tincidunt urna vulputate eu. In interdum nisl eu dolor molestie aliquet. Vivamus tempus id lorem sit amet ultrices. Quisque eu nibh orci. Morbi venenatis laoreet erat, vitae cursus tortor. Etiam aliquam odio quis augue iaculis ultricies. Morbi non velit quis velit laoreet iaculis. Phasellus a leo eu velit fringilla suscipit at sed massa. Curabitur et odio id ipsum tempus rutrum.<br />\r\n<br />\r\nSed bibendum justo eu metus placerat ultrices. Duis imperdiet, risus sit amet euismod lobortis, diam tortor condimentum ligula, ut varius turpis est sed ligula. Proin gravida magna non augue lobortis aliquam. Donec ac lectus pharetra, imperdiet nisi sit amet, suscipit enim. Etiam et neque ac quam egestas blandit. Mauris ullamcorper non lacus non viverra. Pellentesque a ipsum ut neque cursus sollicitudin. Suspendisse neque felis, suscipit nec lectus in, ultrices placerat orci. Etiam posuere lorem sed magna dapibus, at elementum dolor iaculis. Donec arcu mauris, commodo in malesuada et, aliquet placerat lacus. Integer sed magna dignissim, semper urna eget, eleifend sapien. Proin lacinia lobortis nibh, a varius elit pretium ut. Mauris vitae ipsum eget tortor porta sodales at vel enim. Phasellus at facilisis ligula. Curabitur ut est sapien.<br />\r\n<br />\r\nDuis dignissim, orci a lacinia condimentum, sem mi ultricies sapien, in condimentum mauris ante eget magna. Phasellus eget accumsan sapien. Aenean quis massa posuere, scelerisque elit ac, mattis elit. Etiam non varius erat, et tincidunt metus. Phasellus et consectetur dui. Praesent ornare, arcu vel faucibus lobortis, arcu nulla venenatis orci, ac dapibus purus nulla ut libero. Aliquam semper nisi quis sapien ultrices, eu pretium nunc viverra.<br />\r\n<br />\r\nPellentesque ultrices augue eget lacus pharetra tempor sit amet in magna. Suspendisse posuere nec arcu ut molestie. Praesent nulla dui, vehicula sed risus id, consequat tincidunt purus. Sed luctus arcu rutrum eros dapibus pharetra ac viverra magna. Pellentesque ornare sit amet arcu a lacinia. Integer imperdiet quis ante sed elementum. Integer in nibh in urna blandit congue. Nullam sit amet ligula in augue dapibus vestibulum.</p>\r\n', '2013-08-11 21:44:20', 1, '2018-06-21 22:41:11'),
(2, 3, 'MEMBROS', '<p><strong>INTEGRANTES DO GRUPO:</strong></p>\r\n\r\n<p>JONATHAN DAVID FREIRE SILVA -&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 20170155588 -&nbsp; &nbsp; &nbsp; &nbsp;david.developer@outlook.com</p>\r\n\r\n<p>JOS&Eacute; ISAIAS DE LUCENA NETO -&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;20160153973 -&nbsp; &nbsp; &nbsp; &nbsp;isaiiaslucena@gmail.com</p>\r\n\r\n<p>LEONARDO DE FREITAS BERNARDO -&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 20180009734 -&nbsp; &nbsp; &nbsp; &nbsp;leonardo_ancora@hotmail.com</p>\r\n\r\n<p>MAXMYLLER FERREIRA DE FREITAS CARVALHO - 20170155748 -&nbsp; &nbsp; &nbsp; &nbsp;maxmyllercarvalho@hotmail.com</p>\r\n\r\n<p>PABLO HENRIQUE UGULINO COSTA&nbsp; -&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2013023113 -&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;pablo_ricke@live.com</p>\r\n\r\n<p>RENAN LUCAS RIBEIRO BERTOLDO -&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;20170155800 -&nbsp; &nbsp; &nbsp;&nbsp;renan.rbertoldo@gmail.com<br />\r\n<br />\r\n&nbsp;</p>\r\n', '2013-08-12 00:58:26', 1, '2018-06-21 18:48:56'),
(4, 3, 'SERVIÃ‡OS', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse lacinia, orci nec pharetra elementum, lectus elit pharetra urna, tincidunt imperdiet orci tortor sed dolor. Cras ac tincidunt massa. Phasellus porta felis sit amet mauris venenatis lobortis. Nam mauris arcu, fermentum sed lacus a, pulvinar porttitor urna. Sed vel pharetra mauris. Donec interdum libero lorem, non venenatis nibh pretium pharetra. Suspendisse ipsum erat, ultricies at adipiscing sed, lobortis fermentum massa. Quisque sed eleifend odio, quis ornare lacus. Vestibulum consequat urna felis, id facilisis neque egestas eu. Vivamus dapibus lobortis tortor sit amet gravida. Praesent viverra condimentum justo eget porttitor.<br />\r\n<br />\r\nSed malesuada quis nunc nec vulputate. Pellentesque risus justo, cursus nec odio non, dapibus congue tellus. Integer dignissim dignissim dui, quis tincidunt urna vulputate eu. In interdum nisl eu dolor molestie aliquet. Vivamus tempus id lorem sit amet ultrices. Quisque eu nibh orci. Morbi venenatis laoreet erat, vitae cursus tortor. Etiam aliquam odio quis augue iaculis ultricies. Morbi non velit quis velit laoreet iaculis. Phasellus a leo eu velit fringilla suscipit at sed massa. Curabitur et odio id ipsum tempus rutrum.<br />\r\n<br />\r\nSed bibendum justo eu metus placerat ultrices. Duis imperdiet, risus sit amet euismod lobortis, diam tortor condimentum ligula, ut varius turpis est sed ligula. Proin gravida magna non augue lobortis aliquam. Donec ac lectus pharetra, imperdiet nisi sit amet, suscipit enim. Etiam et neque ac quam egestas blandit. Mauris ullamcorper non lacus non viverra. Pellentesque a ipsum ut neque cursus sollicitudin. Suspendisse neque felis, suscipit nec lectus in, ultrices placerat orci. Etiam posuere lorem sed magna dapibus, at elementum dolor iaculis. Donec arcu mauris, commodo in malesuada et, aliquet placerat lacus. Integer sed magna dignissim, semper urna eget, eleifend sapien. Proin lacinia lobortis nibh, a varius elit pretium ut. Mauris vitae ipsum eget tortor porta sodales at vel enim. Phasellus at facilisis ligula. Curabitur ut est sapien.<br />\r\n<br />\r\nDuis dignissim, orci a lacinia condimentum, sem mi ultricies sapien, in condimentum mauris ante eget magna. Phasellus eget accumsan sapien. Aenean quis massa posuere, scelerisque elit ac, mattis elit. Etiam non varius erat, et tincidunt metus. Phasellus et consectetur dui. Praesent ornare, arcu vel faucibus lobortis, arcu nulla venenatis orci, ac dapibus purus nulla ut libero. Aliquam semper nisi quis sapien ultrices, eu pretium nunc viverra.<br />\r\n<br />\r\nPellentesque ultrices augue eget lacus pharetra tempor sit amet in magna. Suspendisse posuere nec arcu ut molestie. Praesent nulla dui, vehicula sed risus id, consequat tincidunt purus. Sed luctus arcu rutrum eros dapibus pharetra ac viverra magna. Pellentesque ornare sit amet arcu a lacinia. Integer imperdiet quis ante sed elementum. Integer in nibh in urna blandit congue. Nullam sit amet ligula in augue dapibus vestibulum.</p>\r\n', '2013-08-12 01:00:43', 1, '2018-06-21 21:46:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_parceiros`
--

DROP TABLE IF EXISTS `tb_parceiros`;
CREATE TABLE IF NOT EXISTS `tb_parceiros` (
  `PAR_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PAR_ADM_ID` mediumint(8) UNSIGNED NOT NULL,
  `PAR_NOME` text,
  `PAR_URL` text,
  `PAR_DATA` datetime DEFAULT NULL,
  `PAR_IMG` text,
  `PAR_INFORMACOES` text,
  `PAR_STATUS` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`PAR_ID`,`PAR_ADM_ID`),
  KEY `FK_ADM_PAR` (`PAR_ADM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_parceiros`
--

INSERT INTO `tb_parceiros` (`PAR_ID`, `PAR_ADM_ID`, `PAR_NOME`, `PAR_URL`, `PAR_DATA`, `PAR_IMG`, `PAR_INFORMACOES`, `PAR_STATUS`) VALUES
(1, 3, 'ECT', 'http://www.ect.ufrn.br/', '2018-06-21 22:42:55', 'download.jpg', '', 1),
(2, 3, 'DCA', 'https://www.dca.ufrn.br/', '2018-06-21 21:06:18', 'dca1.gif', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_postagens`
--

DROP TABLE IF EXISTS `tb_postagens`;
CREATE TABLE IF NOT EXISTS `tb_postagens` (
  `POS_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `POS_ADM_ID` mediumint(8) UNSIGNED NOT NULL,
  `POS_CAT_ID` int(10) UNSIGNED NOT NULL,
  `POS_TITULO` text,
  `POS_CONTEUDO` longtext,
  `POS_DATA` datetime DEFAULT NULL,
  `POS_STATUS` tinyint(1) DEFAULT NULL,
  `POS_IMG` text,
  `POS_EDITADO` datetime DEFAULT NULL,
  PRIMARY KEY (`POS_ID`,`POS_ADM_ID`,`POS_CAT_ID`),
  KEY `FK_ADM_POS` (`POS_ADM_ID`),
  KEY `FK_CAT_POS` (`POS_CAT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_postagens`
--

INSERT INTO `tb_postagens` (`POS_ID`, `POS_ADM_ID`, `POS_CAT_ID`, `POS_TITULO`, `POS_CONTEUDO`, `POS_DATA`, `POS_STATUS`, `POS_IMG`, `POS_EDITADO`) VALUES
(17, 3, 1, 'TESTE', '<p>usaushuhausahuhuash</p>\r\n', '2013-08-11 02:25:47', 1, 'trofeu.png', '2018-06-21 22:24:22'),
(23, 3, 2, 'LOREM IPSUM', '<p>Testando</p>\r\n', '2013-08-16 17:19:46', 1, 'ufrn-brasao.png', '2018-06-21 22:37:32'),
(24, 3, 1, 'TESTE 2', '<p>Testando 2</p>\r\n', '2013-08-16 17:20:48', 1, 'port.jpg', '2018-06-21 22:37:02'),
(26, 3, 2, 'DOLOR SIT', '<p>Nossa hora &eacute; agora.</p>\r\n', '2013-08-17 00:34:52', 1, 'chrysanthemum.jpg', '2018-06-21 22:38:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
