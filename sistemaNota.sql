-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 11-Nov-2014 às 10:53
-- Versão do servidor: 5.5.37
-- versão do PHP: 5.4.6-1ubuntu1.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `sistemaNota`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `empId` int(11) NOT NULL AUTO_INCREMENT,
  `empNome` varchar(255) NOT NULL,
  `empNomeFantasia` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `empAtivo` enum('Ativo','Inativo') NOT NULL DEFAULT 'Ativo',
  PRIMARY KEY (`empId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`empId`, `empNome`, `empNomeFantasia`, `login`, `cnpj`, `empAtivo`) VALUES
(8, 'Empresa teste', 'Empresa teste', 'teste', '07.727.694/0001-02', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cUF` varchar(100) DEFAULT NULL,
  `cNF` varchar(100) DEFAULT NULL,
  `natOp` varchar(100) DEFAULT NULL,
  `indPag` varchar(100) DEFAULT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `nNF` varchar(100) DEFAULT NULL,
  `dEmi` varchar(100) DEFAULT NULL,
  `tpNF` varchar(100) DEFAULT NULL,
  `cMunFG` varchar(100) DEFAULT NULL,
  `tpImp` varchar(100) DEFAULT NULL,
  `tpEmis` varchar(100) DEFAULT NULL,
  `cDV` varchar(100) DEFAULT NULL,
  `tpAmb` varchar(100) DEFAULT NULL,
  `finNFe` varchar(100) DEFAULT NULL,
  `procEmi` varchar(100) DEFAULT NULL,
  `verProc` varchar(100) DEFAULT NULL,
  `CNPJ` varchar(100) DEFAULT NULL,
  `xNomeCliente` varchar(100) DEFAULT NULL,
  `enderEmit` varchar(100) DEFAULT NULL,
  `IE` varchar(100) DEFAULT NULL,
  `IM` varchar(100) DEFAULT NULL,
  `CNAE` varchar(100) DEFAULT NULL,
  `CRT` varchar(100) DEFAULT NULL,
  `CPF` varchar(100) DEFAULT NULL,
  `xNome` varchar(100) DEFAULT NULL,
  `enderDest` varchar(100) DEFAULT NULL,
  `IE2` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `prod` varchar(100) DEFAULT NULL,
  `imposto` varchar(100) DEFAULT NULL,
  `ICMSTot` varchar(100) DEFAULT NULL,
  `modFrete` varchar(100) DEFAULT NULL,
  `transporta` varchar(100) DEFAULT NULL,
  `vol` varchar(100) DEFAULT NULL,
  `infCpl` varchar(100) DEFAULT NULL,
  `modInfo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `nota`
--

INSERT INTO `nota` (`id_nota`, `nome`, `file`, `data`, `cUF`, `cNF`, `natOp`, `indPag`, `serie`, `nNF`, `dEmi`, `tpNF`, `cMunFG`, `tpImp`, `tpEmis`, `cDV`, `tpAmb`, `finNFe`, `procEmi`, `verProc`, `CNPJ`, `xNomeCliente`, `enderEmit`, `IE`, `IM`, `CNAE`, `CRT`, `CPF`, `xNome`, `enderDest`, `IE2`, `email`, `prod`, `imposto`, `ICMSTot`, `modFrete`, `transporta`, `vol`, `infCpl`, `modInfo`) VALUES
(1, 'teste', NULL, '2014-11-08 20:35:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'teste', '35140602009721000198550010000523051136272364-nfe.xml', '2014-11-09 19:56:20', '35', '00094306', 'Venda', '0', '1', '4472', '2014-06-02', '1', '3550308', '1', '1', '6', '1', '1', '3', '2.2.24', '68417542000106', 'ONLINE COMERCIO E SERVI?OS DE PERSIANAS E BRINQUEDOS LTDA.', '', 'ISENTO', '20940840', '0475899', '1', '41454081287', 'Celio Barbosa de Almeida', '', '113528950115', 'brassendako@hotmail.com', '', '', '', '0', '', '', 'Pedido N? 9654 - "Documento emitido por EPP ou ME, optante pelo simples nacional, n?o gera direito a', '55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

CREATE TABLE IF NOT EXISTS `permissao` (
  `permissao_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `grupo` varchar(30) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`permissao_id`),
  KEY `ativo` (`ativo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `permissao`
--

INSERT INTO `permissao` (`permissao_id`, `nome`, `url`, `grupo`, `ativo`) VALUES
(1, 'Administradores', 'usuario', 'Administradores', 1),
(3, 'Categoria', 'categoria', 'Catalogo', 1),
(4, 'Atributo', 'atributo', 'Catalogo', 1),
(7, 'Fornecedor', 'fornecedor', 'Fornecedor', 1),
(8, 'Lote', 'lote', 'Lote', 1),
(9, 'Produto', 'produtos', 'Catalogo', 1),
(10, 'Cliente', 'cliente', 'Cliente', 1),
(11, 'Relatório de Vendas por Categoria', 'relatorio_vendas_categoria', 'Relatório', 1),
(12, 'Vendas', 'relatorio_vendas_basico', 'Vendas', 1),
(13, 'Relatório de Custo de Lote', 'relatorio_custo_produto', 'Relatório', 1),
(14, 'Relatório de Situação dos Produtos', 'relatorio_situacao_produto', 'Relatório', 1),
(15, 'Relatório de Situacao do Estoque', 'relatorio_situacao_estoque', 'Relatório', 1),
(16, 'Parâmetros', 'parametros', 'Configurações', 1),
(17, 'Relatório de Pedidos por Cliente', 'relatorio_pedidos_cliente', 'Relatório', 1),
(18, 'Relatório de Estoque Baixo de Peças', 'relatorio_estoque_baixo', 'Relatório', 1),
(19, 'Relatório de Ticket Diário', 'relatorio_ticket_diario', 'Relatório', 1),
(20, 'Relatório de Pedidos por Atributo', 'relatorio_pedido_atributo', 'Relatório', 1),
(21, 'Cupom', 'cupom', 'Cupom', 1),
(22, 'Banner', 'banner', 'Configurações', 1),
(23, 'Produtos Sugeridos', 'produto_sugestao', 'Configurações', 1),
(24, 'Status do Pedido', 'status_pedido', 'Configurações', 1),
(25, 'Formas de Pagamento', 'pagamentos', 'Configurações', 1),
(26, 'Abas', 'abas', 'Configurações', 1),
(27, 'Páginas Legais', 'paginas', 'Configurações', 1),
(28, 'Grupos', 'grupos', 'Administradores', 1),
(29, 'Revendas', 'revendas', 'Revendas', 1),
(30, 'Dicas', 'dicas', 'Dicas', 1),
(31, 'Consultoras', 'consultoras', 'Consultoras', 1),
(32, 'Comunicados', 'comunicados', 'Consultoras', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('319c6fb3671892b251e8354896a03d9f', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36', 1415620129, ''),
('bb44dbe0ab34516d5ceb580b5d69f405', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36', 1415710370, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `senha` varchar(150) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT '0',
  `usuario_grupo_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `usuario_id_UNIQUE` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `nome`, `email`, `login`, `senha`, `ativo`, `usuario_grupo_id`) VALUES
(1, 'Admin', 'admin@admin.com', 'login', 'ylRhpGC0Cc6NMbJPwVTKUdHyrTs5nEX840+vOVV/0YqNv7L8JE0ez9YO80PXeMJq89PvEudNjBikGJrivbCy6Q==', 1, 13),
(3, 'teste', 'teste@teste.com', 'teste', 'g/EdMhl+jaMDtw88Wu0hTYHv2ZfQocsE+2zYPnTIgrP0vx57XFoHcpPp/6QzNzrImLGNzqPLfr5Fg2xg5dl6Og==', 0, 0),
(4, 'chan', 'chanhyuen@gmail.com', 'chan', 'PyT37e1Jv2EjAZst7PDH78woSwDeuS0zUkiPbuuUILUWt6FAB5jh7pDed+5p2wF72qV2Abe8zLFyNNfgGJg4Cg==', 1, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_grupo`
--

CREATE TABLE IF NOT EXISTS `usuario_grupo` (
  `usuario_grupo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) DEFAULT NULL,
  `descricao` text,
  PRIMARY KEY (`usuario_grupo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `usuario_grupo`
--

INSERT INTO `usuario_grupo` (`usuario_grupo_id`, `nome`, `descricao`) VALUES
(13, 'Administrador Geral', 'Tem permissão em todas as áreas do site'),
(14, 'Gerentes', 'Pode apenas ver o que acontece em cada area'),
(15, 'Vendedores', 'vendedores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_permissao`
--

CREATE TABLE IF NOT EXISTS `usuario_permissao` (
  `usuario_permissao_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) unsigned DEFAULT NULL,
  `permissao_id` int(10) unsigned DEFAULT NULL,
  `crud` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`usuario_permissao_id`),
  KEY `fk_usuario_permissao_1` (`usuario_id`),
  KEY `fk_usuario_permissao_2` (`permissao_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=545 ;

--
-- Extraindo dados da tabela `usuario_permissao`
--

INSERT INTO `usuario_permissao` (`usuario_permissao_id`, `usuario_id`, `permissao_id`, `crud`) VALUES
(487, 1, 1, 'crud'),
(488, 1, 3, 'crud'),
(489, 1, 4, 'crud'),
(490, 1, 7, 'crud'),
(491, 1, 8, 'crud'),
(492, 1, 9, 'crud'),
(493, 1, 10, 'crud'),
(494, 1, 11, 'crud'),
(495, 1, 12, 'crud'),
(496, 1, 13, 'crud'),
(497, 1, 14, 'crud'),
(498, 1, 15, 'crud'),
(499, 1, 16, 'crud'),
(500, 1, 17, 'crud'),
(501, 1, 18, 'crud'),
(502, 1, 19, 'crud'),
(503, 1, 20, 'crud'),
(504, 1, 21, 'crud'),
(505, 1, 22, 'crud'),
(506, 1, 23, 'crud'),
(507, 1, 24, 'crud'),
(508, 1, 25, 'crud'),
(509, 1, 26, 'crud'),
(510, 1, 27, 'crud'),
(511, 1, 28, 'crud'),
(512, 1, 29, 'crud'),
(513, 1, 30, 'crud'),
(514, 1, 31, 'crud'),
(515, 1, 32, 'crud'),
(516, 4, 1, 'crud'),
(517, 4, 3, 'crud'),
(518, 4, 4, 'crud'),
(519, 4, 7, 'crud'),
(520, 4, 8, 'crud'),
(521, 4, 9, 'crud'),
(522, 4, 10, 'crud'),
(523, 4, 11, 'crud'),
(524, 4, 12, 'crud'),
(525, 4, 13, 'crud'),
(526, 4, 14, 'crud'),
(527, 4, 15, 'crud'),
(528, 4, 16, 'crud'),
(529, 4, 17, 'crud'),
(530, 4, 18, 'crud'),
(531, 4, 19, 'crud'),
(532, 4, 20, 'crud'),
(533, 4, 21, 'crud'),
(534, 4, 22, 'crud'),
(535, 4, 23, 'crud'),
(536, 4, 24, 'crud'),
(537, 4, 25, 'crud'),
(538, 4, 26, 'crud'),
(539, 4, 27, 'crud'),
(540, 4, 28, 'crud'),
(541, 4, 29, 'crud'),
(542, 4, 30, 'crud'),
(543, 4, 31, 'crud'),
(544, 4, 32, 'crud');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `usuario_permissao`
--
ALTER TABLE `usuario_permissao`
  ADD CONSTRAINT `fk_usuario_permissao_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permissao_2` FOREIGN KEY (`permissao_id`) REFERENCES `permissao` (`permissao_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
