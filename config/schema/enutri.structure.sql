-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 16-Jan-2017 às 16:52
-- Versão do servidor: 5.5.53-0+deb8u1
-- PHP Version: 5.6.29-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `enutri`
--
CREATE DATABASE IF NOT EXISTS `enutri` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `enutri`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alimentos`
--

CREATE TABLE IF NOT EXISTS `alimentos` (
`id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `consumo_medida_id` int(11) NOT NULL,
  `compra_medida_id` int(11) NOT NULL,
  `fator` float NOT NULL DEFAULT '1000',
  `kcal` float DEFAULT '0',
  `cho` float DEFAULT '0',
  `ptn` float DEFAULT '0',
  `lip` float DEFAULT '0',
  `ca` float DEFAULT '0',
  `fe` float DEFAULT '0',
  `mg` float DEFAULT '0',
  `zn` float DEFAULT '0',
  `vita` float DEFAULT '0',
  `vitc` float DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=674 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimentos`
--

CREATE TABLE IF NOT EXISTS `atendimentos` (
`id` int(11) NOT NULL,
  `cardapio_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapios`
--

CREATE TABLE IF NOT EXISTS `cardapios` (
`id` int(11) NOT NULL,
  `processo_id` int(11) NOT NULL,
  `cardapio_tipo_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `observacoes` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio_tipos`
--

CREATE TABLE IF NOT EXISTS `cardapio_tipos` (
`id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `centralizacao_processos`
--

CREATE TABLE IF NOT EXISTS `centralizacao_processos` (
`id` int(11) NOT NULL,
  `centralizacao_id` int(11) NOT NULL,
  `processo_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `centralizacoes`
--

CREATE TABLE IF NOT EXISTS `centralizacoes` (
`id` int(11) NOT NULL,
  `exercicio_id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `observacoes` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicios`
--

CREATE TABLE IF NOT EXISTS `exercicios` (
`id` int(11) NOT NULL,
  `ano` year(4) NOT NULL,
  `responsavel_nome` varchar(100) DEFAULT NULL,
  `responsavel_funcao` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `exercicioscol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
`id` int(11) NOT NULL,
  `alias` varchar(30) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `descricao` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingredientes`
--

CREATE TABLE IF NOT EXISTS `ingredientes` (
`id` int(11) NOT NULL,
  `cardapio_id` int(11) NOT NULL,
  `alimento_id` int(11) NOT NULL,
  `quantidade` float NOT NULL DEFAULT '0',
  `observacoes` varchar(60) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lotacoes`
--

CREATE TABLE IF NOT EXISTS `lotacoes` (
`id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `uex_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medidas`
--

CREATE TABLE IF NOT EXISTS `medidas` (
`id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidades`
--

CREATE TABLE IF NOT EXISTS `modalidades` (
`id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `nome_reduzido` varchar(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `participantes`
--

CREATE TABLE IF NOT EXISTS `participantes` (
`id` int(11) NOT NULL,
  `uex_id` int(11) NOT NULL,
  `exercicio_id` int(11) NOT NULL,
  `responsavel_nome` varchar(100) DEFAULT NULL,
  `responsavel_funcao` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `processos`
--

CREATE TABLE IF NOT EXISTS `processos` (
`id` int(11) NOT NULL,
  `participante_id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `observacoes` varchar(200) DEFAULT NULL,
  `aprovado` tinyint(1) NOT NULL DEFAULT '0',
  `aprovador_usuario_id` int(11) DEFAULT NULL,
  `aprovacao_data` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo_modalidades`
--

CREATE TABLE IF NOT EXISTS `processo_modalidades` (
`id` int(11) NOT NULL,
  `processo_id` int(11) NOT NULL,
  `modalidade_id` int(11) NOT NULL,
  `publico` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `uexs`
--

CREATE TABLE IF NOT EXISTS `uexs` (
`id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `nome_reduzido` varchar(60) NOT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `uf_id` int(11) NOT NULL,
  `municipio` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefone1` varchar(20) DEFAULT NULL,
  `telefone2` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ufs`
--

CREATE TABLE IF NOT EXISTS `ufs` (
`id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `sigla` varchar(2) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `crn` varchar(20) DEFAULT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `uf_id` int(11) NOT NULL,
  `municipio` varchar(100) DEFAULT NULL,
  `telefone1` varchar(20) DEFAULT NULL,
  `telefone2` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alimentos`
--
ALTER TABLE `alimentos`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_alimento_consumo_medida_idx` (`consumo_medida_id`), ADD KEY `fk_alimento_compra_medida_idx` (`compra_medida_id`);

--
-- Indexes for table `atendimentos`
--
ALTER TABLE `atendimentos`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_data_cardapio_idx` (`cardapio_id`);

--
-- Indexes for table `cardapios`
--
ALTER TABLE `cardapios`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_cardapio_processo_idx` (`processo_id`), ADD KEY `fk_cardapio_cardapio_tipo_idx` (`cardapio_tipo_id`);

--
-- Indexes for table `cardapio_tipos`
--
ALTER TABLE `cardapio_tipos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centralizacao_processos`
--
ALTER TABLE `centralizacao_processos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_centralizacao_processo` (`centralizacao_id`,`processo_id`), ADD KEY `fk_centralizacao_processo_centralizacao_idx` (`centralizacao_id`), ADD KEY `fk_centralizacao_processo_processo_idx` (`processo_id`);

--
-- Indexes for table `centralizacoes`
--
ALTER TABLE `centralizacoes`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_centralizacao_exercicio_idx` (`exercicio_id`);

--
-- Indexes for table `exercicios`
--
ALTER TABLE `exercicios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `ano_UNIQUE` (`ano`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredientes`
--
ALTER TABLE `ingredientes`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_ingrediente_cardapio_idx` (`cardapio_id`), ADD KEY `fk_ingrediente_alimento_idx` (`alimento_id`);

--
-- Indexes for table `lotacoes`
--
ALTER TABLE `lotacoes`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_usuaro_uex` (`usuario_id`,`uex_id`), ADD KEY `fk_lotacao_usuario_idx` (`usuario_id`), ADD KEY `fk_lotacao_uex_idx` (`uex_id`);

--
-- Indexes for table `medidas`
--
ALTER TABLE `medidas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modalidades`
--
ALTER TABLE `modalidades`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participantes`
--
ALTER TABLE `participantes`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_participante_uex_idx` (`uex_id`), ADD KEY `fk_participante_exercicio_idx` (`exercicio_id`);

--
-- Indexes for table `processos`
--
ALTER TABLE `processos`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_processo_participante_idx` (`participante_id`), ADD KEY `fk_processo_aprovador_usuario_idx` (`aprovador_usuario_id`);

--
-- Indexes for table `processo_modalidades`
--
ALTER TABLE `processo_modalidades`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_processo_modalidade` (`processo_id`,`modalidade_id`), ADD KEY `fk_processo_modalidade_processo_idx` (`processo_id`), ADD KEY `fk_processo_modalidade_modalidade_idx` (`modalidade_id`);

--
-- Indexes for table `uexs`
--
ALTER TABLE `uexs`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_uex_uf_idx` (`uf_id`);

--
-- Indexes for table `ufs`
--
ALTER TABLE `ufs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_usuario_grupo_idx` (`grupo_id`), ADD KEY `fk_usuario_uf_idx` (`uf_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alimentos`
--
ALTER TABLE `alimentos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=674;
--
-- AUTO_INCREMENT for table `atendimentos`
--
ALTER TABLE `atendimentos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `cardapios`
--
ALTER TABLE `cardapios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `cardapio_tipos`
--
ALTER TABLE `cardapio_tipos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `centralizacao_processos`
--
ALTER TABLE `centralizacao_processos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `centralizacoes`
--
ALTER TABLE `centralizacoes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `exercicios`
--
ALTER TABLE `exercicios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ingredientes`
--
ALTER TABLE `ingredientes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `lotacoes`
--
ALTER TABLE `lotacoes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `medidas`
--
ALTER TABLE `medidas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `modalidades`
--
ALTER TABLE `modalidades`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `participantes`
--
ALTER TABLE `participantes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `processos`
--
ALTER TABLE `processos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `processo_modalidades`
--
ALTER TABLE `processo_modalidades`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `uexs`
--
ALTER TABLE `uexs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ufs`
--
ALTER TABLE `ufs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alimentos`
--
ALTER TABLE `alimentos`
ADD CONSTRAINT `fk_alimento_compra_medida` FOREIGN KEY (`compra_medida_id`) REFERENCES `medidas` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_alimento_consumo_medida` FOREIGN KEY (`consumo_medida_id`) REFERENCES `medidas` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `atendimentos`
--
ALTER TABLE `atendimentos`
ADD CONSTRAINT `fk_data_cardapio` FOREIGN KEY (`cardapio_id`) REFERENCES `cardapios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `cardapios`
--
ALTER TABLE `cardapios`
ADD CONSTRAINT `fk_cardapio_cardapio_tipo` FOREIGN KEY (`cardapio_tipo_id`) REFERENCES `cardapio_tipos` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_cardapio_processo` FOREIGN KEY (`processo_id`) REFERENCES `processos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `centralizacao_processos`
--
ALTER TABLE `centralizacao_processos`
ADD CONSTRAINT `fk_centralizacao_processo_centralizacao` FOREIGN KEY (`centralizacao_id`) REFERENCES `centralizacoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_centralizacao_processo_processo` FOREIGN KEY (`processo_id`) REFERENCES `processos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `centralizacoes`
--
ALTER TABLE `centralizacoes`
ADD CONSTRAINT `fk_centralizacao_exercicio` FOREIGN KEY (`exercicio_id`) REFERENCES `exercicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `ingredientes`
--
ALTER TABLE `ingredientes`
ADD CONSTRAINT `fk_ingrediente_alimento` FOREIGN KEY (`alimento_id`) REFERENCES `alimentos` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_ingrediente_cardapio` FOREIGN KEY (`cardapio_id`) REFERENCES `cardapios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `lotacoes`
--
ALTER TABLE `lotacoes`
ADD CONSTRAINT `fk_lotacao_uex` FOREIGN KEY (`uex_id`) REFERENCES `uexs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_lotacao_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `participantes`
--
ALTER TABLE `participantes`
ADD CONSTRAINT `fk_participante_exercicio` FOREIGN KEY (`exercicio_id`) REFERENCES `exercicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_participante_uex` FOREIGN KEY (`uex_id`) REFERENCES `uexs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `processos`
--
ALTER TABLE `processos`
ADD CONSTRAINT `fk_processo_aprovador_usuario` FOREIGN KEY (`aprovador_usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `fk_processo_participante` FOREIGN KEY (`participante_id`) REFERENCES `participantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `processo_modalidades`
--
ALTER TABLE `processo_modalidades`
ADD CONSTRAINT `fk_processo_modalidade_modalidade` FOREIGN KEY (`modalidade_id`) REFERENCES `modalidades` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_processo_modalidade_processo` FOREIGN KEY (`processo_id`) REFERENCES `processos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `uexs`
--
ALTER TABLE `uexs`
ADD CONSTRAINT `fk_uex_uf` FOREIGN KEY (`uf_id`) REFERENCES `ufs` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `fk_usuario_grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_usuario_uf` FOREIGN KEY (`uf_id`) REFERENCES `ufs` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
