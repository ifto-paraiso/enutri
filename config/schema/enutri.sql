-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 16-Jan-2017 às 17:16
-- Versão do servidor: 5.5.53-0+deb8u1
-- PHP Version: 5.6.29-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `enutri-clear`
--

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

--
-- Extraindo dados da tabela `alimentos`
--

INSERT INTO `alimentos` (`id`, `nome`, `consumo_medida_id`, `compra_medida_id`, `fator`, `kcal`, `cho`, `ptn`, `lip`, `ca`, `fe`, `mg`, `zn`, `vita`, `vitc`, `created`, `modified`, `deleted`) VALUES
(1, '- Teste B', 2, 2, 1000, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, NULL, '2017-01-16 17:33:04', 1),
(2, '- Teste', 1, 2, 1000, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, NULL, '2017-01-16 17:29:25', 1),
(162, 'Macarrão', 1, 2, 1000, 371, 77.9, 10, 1.3, 17, 0.9, 28, 0.8, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(506, 'Farinha de Trigo', 1, 2, 1000, 360, 75.1, 9.8, 1.4, 18, 1, 31, 0.8, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(507, 'Ovo de Galinha Branco', 1, 2, 1000, 143, 1.6, 13, 8.9, 42, 1.6, 13, 1.1, 79, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(508, 'Laranja', 1, 2, 1000, 37, 8.9, 1, 0.1, 0, 0.1, 9, 0.1, 0, 53.7, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(509, 'Fermento em Pó Químico', 1, 2, 1000, 90, 43.9, 0.5, 0.1, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(510, 'Açúcar Cristal', 1, 2, 1000, 387, 99.6, 0, 0, 8, 0.2, 1, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(511, 'Margarina Vegetal com Sal', 1, 2, 1000, 596, 0, 0, 67.4, 6, 0.1, 1, 0, 462, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(512, 'Leite Pasteurizado Tipo C', 4, 3, 1000, 60.6, 4.63, 3.34, 0, 119, 0.14, 13.4, 0.38, 11.63, 0.93, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(513, 'Café Torrado em Pó', 1, 2, 1000, 419, 65.8, 14.7, 11.9, 107, 8.1, 165, 0.5, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(514, 'Polvilho Doce', 1, 2, 1000, 351, 86.8, 0.4, 0, 27, 0.5, 4, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(515, 'Queijo Coalho', 1, 2, 1000, 264, 3.2, 17.4, 20.2, 579, 0.9, 7, 0.3, 161, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(516, 'Óleo de Soja Refinado', 4, 3, 1000, 884, 0, 0, 100, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(517, 'Sal Refinado Iodado', 1, 2, 1000, 0, 0, 0, 0, 0, 0.1, 2.01, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(518, 'Rosquinha de Coco', 1, 2, 1000, 491, 66.1, 7.1, 0, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(519, 'Achocolatado em Pó', 1, 2, 1000, 401, 91.2, 4.2, 2.2, 44, 5.4, 77, 1, 796, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(520, 'Mist. para Mingau à base de Amido de Mil', 1, 2, 1000, 360, 0, 0, 0, 828, 8, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(521, 'Cenoura', 1, 2, 1000, 34, 7.7, 1.3, 0.2, 23, 0.2, 11, 0.2, 2813, 9.3, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(522, 'Arroz Tipo 2', 1, 2, 1000, 358, 78.9, 7.2, 0.3, 5, 0.6, 29, 1.3, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(523, 'Abóbora Kabutiá', 1, 2, 1000, 39, 8.4, 1.7, 0.5, 18, 0.4, 9, 0.3, 0, 5.1, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(525, 'Cebola in Natura', 1, 2, 1000, 39, 8.9, 1.7, 0.1, 14, 0.2, 404, 0.2, 0, 4.7, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(526, 'Alho in Natura', 1, 2, 1000, 113, 23.9, 7, 0.2, 14, 0.8, 21, 0.8, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(528, 'Frango (Coxa e Sobrecoxa)', 1, 2, 1000, 255, 0, 15.5, 20.9, 7, 0.7, 22, 1.3, 7, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(530, 'Tomate', 1, 2, 1000, 15, 3.1, 1.1, 0.2, 7, 0.2, 11, 0.1, 0, 21.2, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(531, 'Repolho Branco', 1, 2, 1000, 17, 3.9, 0.9, 0.1, 35, 0.2, 9, 0.2, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(532, 'Açafrão em Pó', 1, 2, 1000, 354, 64.9, 7.83, 9.88, 183, 41.4, 193, 4.35, 0, 25.9, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(533, 'Chuchu', 1, 2, 1000, 17, 4.1, 0.7, 0.1, 12, 0.2, 7, 0.1, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(534, 'Feijão Carioca', 1, 2, 1000, 329, 61.2, 20, 1.3, 123, 8, 210, 2.9, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(535, 'Mamão', 1, 2, 1000, 45, 11.6, 0.8, 0.1, 25, 0.2, 17, 0.1, 0, 78.5, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(536, 'Melancia', 1, 2, 1000, 33, 8.1, 0.9, 0, 8, 0.2, 10, 0.1, 0, 6.1, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(537, 'Maçã', 1, 2, 1000, 56, 15.2, 0.3, 0, 2, 0.1, 2, 0, 0, 2.4, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(538, 'Iogurte', 4, 3, 1000, 51, 1.9, 4.1, 3, 143, 0, 11, 0.4, 23, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(539, 'Batata Inglesa', 1, 2, 1000, 64, 14.7, 1.8, 0, 4, 0.4, 15, 0.2, 0, 31.1, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(540, 'Mandioca', 1, 2, 1000, 151, 36.2, 1.1, 0.3, 15, 0.3, 44, 0.2, 0, 16.5, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(541, 'Cheiro Verde', 1, 2, 1000, 90.89, 2.18, 12.04, 4.175, 53, 2.55, 35.5, 0.28, 217.65, 29.05, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(542, 'Polpa de Tomate', 1, 2, 1000, 38, 7.7, 1.4, 0.9, 12, 1.6, 17, 0.1, 0, 2.7, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(543, 'Polpa de Maracujá', 1, 2, 1000, 39, 9.6, 0.8, 0.2, 5, 0.3, 10, 0.2, 0, 7.3, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(544, 'Suco Concentrado de Acerola', 1, 2, 1000, 7.5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(545, 'Milho para Canjica', 1, 2, 1000, 358, 78.1, 7.2, 1, 2, 0.3, 12, 0.4, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(546, 'Coco Ralado', 1, 2, 1000, 501, 47.7, 2.89, 0, 15, 1.93, 50, 1.83, 0, 0.7, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(547, 'Banana Prata', 1, 2, 1000, 98, 26, 1.3, 0.1, 8, 0.4, 26, 0.1, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(548, 'Pão Francês', 1, 2, 1000, 300, 58.6, 8, 3.1, 16, 1, 25, 0.8, 3, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(549, 'Proteína Texturizada de Soja', 1, 2, 1000, 342.8, 30.51, 52.4, 0, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(550, 'Suco Concentrado de Caju', 1, 2, 1000, 45, 10.7, 0.4, 0.2, 1, 0.1, 8, 0.1, 0, 138.7, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(551, 'Carne Bovina "de Sol"', 1, 2, 1000, 249, 0, 22.7, 16.8, 15, 1.5, 13, 3.9, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(552, 'Rosca Doce de Panificadora', 1, 2, 1000, 274, 56.3, 7.5, 1.4, 12, 1.2, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(553, 'Fubá de Milho', 1, 2, 1000, 361, 87.1, 0.6, 0, 0, 0.9, 41, 1.1, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(554, 'Flocos de Milho para Cuscuz', 1, 2, 1000, 354, 75, 9, 0, 2.68, 1.7, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(555, 'Farinha de Mandioca', 1, 2, 1000, 354, 86.4, 1.7, 0.3, 61, 3.1, 0, 0, 0, 14, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(556, 'Feijão Preto', 1, 2, 1000, 324, 58.8, 21.3, 1.2, 111, 6.5, 188, 2.9, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(557, 'Vagem', 1, 2, 1000, 31, 7.15, 1.83, 0.12, 37, 1.04, 25, 0.24, 66.8, 16.3, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(558, 'Bolacha "Água e Sal"', 1, 2, 1000, 432, 68.7, 10.1, 14.4, 20, 2.2, 40, 1.1, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(559, 'Suco Concentrado de Goiaba', 1, 2, 1000, 25, 5, 0, 0, 0, 0.9, 0, 0, 0, 75, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(560, 'Suco Concentrado de Manga', 1, 2, 1000, 52, 11.94, 0, 0, 0, 0, 0, 0, 0, 59.7, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(561, 'Chá', 1, 2, 1000, 256, 57, 11.7, 0.4, 55, 4.05, 363, 3.21, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(562, 'Salsicha Resfriada', 1, 2, 1000, 320, 2.56, 11.3, 27.24, 11, 1.16, 10, 1.85, 0, 26, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(563, 'Trigo para Quibe', 1, 2, 1000, 342, 75.9, 12.3, 1.34, 35, 2.47, 164, 1.94, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(564, 'Suco Concentrado de Maracujá', 1, 2, 1000, 42, 9.6, 0.8, 0.2, 4, 0.3, 4, 0.1, 0, 13.7, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(565, 'Pão para Hot Dog', 1, 2, 1000, 180, 33.18, 4.78, 3.19, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(566, 'Polpa de Acerola', 1, 2, 1000, 22, 5.5, 0.6, 0, 8, 0.2, 9, 0.1, 0, 623.2, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(567, 'Rapadura', 1, 2, 1000, 343, 89.24, 0.35, 0, 174, 4.2, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(568, 'Abobrinha Verde', 1, 2, 1000, 31, 7.9, 0.6, 0.1, 19, 0.2, 9, 0.2, 0, 17.5, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(569, 'Suco Concentrado de Abacaxi', 1, 2, 1000, 44, 10, 0, 0, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(570, 'Melão', 1, 2, 1000, 32, 7.19, 0.62, 0, 8, 0.17, 11, 0.07, 36.6, 9.6, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(571, 'Pimentão', 1, 2, 1000, 27, 6.44, 0.89, 0.2, 9, 0.46, 10, 0.12, 63.2, 89.3, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(572, 'Colorau', 1, 2, 1000, 334, 78.2, 6.6, 8.45, 120, 5.6, 0, 0, 60, 7, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(573, 'Alface', 1, 2, 1000, 13, 2.1, 1.02, 0.2, 19, 0.5, 9, 0.22, 0, 3.9, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(574, 'Couve Folha', 1, 2, 1000, 50, 10, 3.31, 0.5, 135, 1.7, 34, 0.44, 890, 120, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(575, 'Frango (Peito)', 1, 2, 1000, 149, 0, 20.8, 6.7, 8, 0.4, 28, 0.6, 4, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(576, 'Beterraba', 1, 2, 1000, 43, 9.57, 1.62, 0.1, 16, 0.8, 23, 0.35, 3.8, 4.9, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(577, 'Biscoito de Polvilho (Peta)', 1, 2, 1000, 292.88, 52.32, 2.8, 9.04, 41.78, 1.17, 0.069, 0.324, 37.584, 0.173, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(578, 'Inhame', 1, 2, 1000, 118, 27.9, 1.54, 0.2, 17, 0.54, 21, 0.24, 0, 17.1, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(579, 'Polpa de Caju', 1, 2, 1000, 37, 9.4, 0.5, 0.2, 1, 0.1, 7, 0.1, 0, 119.7, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(580, 'Flocos de Arroz', 1, 2, 1000, 379, 86.7, 6.7, 0.6, 230, 0, 0, 0, 476, 45, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(581, 'Carne Bovina de 2ª Moída', 1, 2, 1000, 144, 0, 20.8, 6.1, 5, 1.5, 13, 5.2, 2, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(582, 'Carne Bovina de 2ª em Pedaços', 1, 2, 1000, 144, 0, 20.8, 6.1, 5, 1.5, 13, 5.2, 2, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(583, 'Milho Verde in Natura', 1, 2, 1000, 138, 28.6, 6.6, 0.6, 2, 0.4, 33, 0.5, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(584, 'Milho Verde (massa ralada)', 1, 2, 1000, 138, 28.6, 6.6, 0.6, 2, 0.4, 33, 0.5, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(585, 'Macarrão Parafuso', 1, 2, 1000, 371, 77.9, 10, 1.3, 17, 0.9, 28, 0.8, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(586, 'Macarrão Ave Maria', 1, 2, 1000, 371, 77.9, 10, 1.3, 17, 0.9, 28, 0.8, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(587, 'Banana Nanica', 1, 2, 1000, 92, 23.8, 1.4, 0.1, 3, 0.3, 28, 0.2, 0, 5.9, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(588, 'Mistura para Bolo', 1, 2, 1000, 419, 84.7, 6.2, 6.1, 59, 1.2, 28, 0.6, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(589, 'Abacaxi', 1, 2, 1000, 48, 12.3, 0.9, 0.1, 22, 0.3, 18, 0.1, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(590, 'Biscoito Doce Maisena', 1, 2, 1000, 443, 75.2, 8.1, 12, 54, 1.8, 37, 1, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(591, 'Extrato de Tomate', 1, 2, 1000, 72, 16, 2, 0.2, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(592, 'Morango in Natura', 1, 2, 1000, 30, 7.03, 0.61, 0.1, 14, 0.38, 10, 0.13, 3, 56.7, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(593, 'Polpa de Manga', 1, 2, 1000, 48, 12.8, 0.4, 0.2, 7, 0.1, 9, 0.1, 0, 24.9, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(594, 'Carne Bovina Fígado', 1, 2, 1000, 141, 1.1, 20.7, 5.4, 4, 5.6, 12, 3.5, 10718, 22.98, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(595, 'Milho Verde Enlatado', 1, 2, 1000, 109, 18, 3.5, 2.5, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(596, 'Macarrão Espaguete', 1, 2, 1000, 371, 77.9, 10, 1.3, 17, 0.9, 28, 0.8, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(597, 'Queijo Coalho Ralado', 1, 2, 1000, 264, 3.2, 17, 20.2, 579, 0.9, 7, 0.3, 161, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(598, 'Carne Bovina Costela', 1, 2, 1000, 358, 0, 16.7, 31.8, 11, 2.32, 19, 5.25, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(600, 'Carne Bovina Bisteca', 1, 2, 1000, 144, 0, 20.8, 6.1, 5, 1.5, 13, 5.2, 2, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(601, 'Mexerica', 1, 2, 1000, 44, 11.2, 0.63, 9.3, 14, 0.1, 12, 0.42, 92, 30.8, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(602, 'Polpa de Abacaxi', 1, 2, 1000, 48, 12.3, 0.9, 0.1, 7, 0.37, 9.272, 0.235, 1070.5, 5.675, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(603, 'Polpa de Goiaba', 1, 2, 1000, 38, 9.8, 0.6, 0.1, 6, 0.1, 10, 0.1, 0, 10.5, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(604, 'Mandioca (Massa Ralada)', 1, 2, 1000, 151, 36.2, 1.1, 0.3, 15, 0.3, 44, 0.2, 1, 16.5, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(605, 'Amido de Milho', 1, 2, 1000, 381, 91.3, 0.26, 0.05, 2, 0.47, 3, 0.06, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(606, 'Carne Bovina Lagarto', 1, 2, 1000, 135, 0, 20.5, 5.2, 3, 1.3, 20, 2.4, 2, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(607, 'Manga', 1, 2, 1000, 64, 16.7, 0.4, 0.3, 12, 0.1, 8, 0.1, 0, 17.4, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(608, 'Polpa de Cajá', 1, 2, 1000, 33, 7, 0.7, 0.2, 9, 0.3, 0, 0, 77, 0.3, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(609, 'Ovo de Galinha Vermelho', 1, 2, 1000, 143, 1.6, 13, 8.9, 42, 1.6, 13, 1.1, 79, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(610, 'Uva Itália', 1, 2, 1000, 71, 17.8, 0.66, 0.58, 11, 0.26, 6, 0.05, 7.3, 10.8, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(611, 'Polpa de Cupuaçu', 1, 2, 1000, 49, 11.4, 0.8, 0.6, 5, 0.3, 14, 0.2, 30, 33, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(612, 'Ervilha Enlatada', 1, 2, 1000, 110, 21, 6.5, 1, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(613, 'Pão de Forma', 1, 2, 1000, 100, 44.1, 12, 2.7, 156, 5.7, 24, 1.3, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(614, 'Canela em Pó', 1, 2, 1000, 261, 79.8, 3.89, 3.19, 1228, 38.2, 55.6, 1.97, 26, 28.5, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(615, 'Uva Rubi', 1, 2, 1000, 49, 12.7, 0.6, 0.2, 8, 0.2, 6, 0, 7.3, 1.9, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(616, 'Mel de Abelha', 1, 2, 1000, 304, 82.4, 0.3, 0, 6, 0.42, 2, 0.22, 0, 2.3, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(617, 'Carne Bovina de 1ª em Pedaços', 1, 2, 1000, 157, 0, 24, 6, 4, 1.7, 21, 3.2, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(618, 'Massa para Pastel', 1, 2, 1000, 310, 5.4, 6.9, 5.5, 13, 1.1, 14, 0.6, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(619, 'Batata Doce', 1, 2, 1000, 118, 28.2, 1.3, 0.1, 21, 0.4, 17, 0.2, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(620, 'Suco de Limão', 1, 2, 1000, 22, 7.3, 0.6, 0.1, 5, 0.1, 6, 0.1, 2, 46, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(621, 'Polpa de Tamarindo', 1, 2, 1000, 276, 72.5, 3.2, 0.5, 37, 0.6, 59, 0.7, 3, 3.5, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(622, 'Arroz Tipo 1', 1, 2, 1000, 358, 78.8, 7.2, 0.3, 4, 0.7, 30, 1.2, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(623, 'Acelga', 1, 2, 1000, 88, 4.6, 1.4, 0.1, 43, 0.3, 10, 0.3, 330, 22.6, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(624, 'Couve Flor', 1, 2, 1000, 23, 4.5, 1.9, 0.2, 18, 0.5, 12, 0.3, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(626, 'Polpa de Pêssego', 1, 2, 1000, 36, 9.3, 0.8, 0, 3, 0.2, 4, 0.1, 0, 3.3, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(627, 'Polpa de Uva', 1, 2, 1000, 53, 13.6, 0.7, 0.2, 7, 0.1, 5, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(628, 'Pêra', 1, 2, 1000, 53, 14, 0.6, 0.1, 8, 0.1, 6, 0.1, 0, 2.8, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(629, 'Polpa de Morango', 1, 2, 1000, 30, 6.8, 0.9, 0.3, 11, 0.3, 10, 0.2, 0, 63.6, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(630, 'Macarrão Padre Nosso', 1, 2, 1000, 371, 77.9, 10, 1.3, 17, 0.9, 28, 0.8, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(631, 'Ameixa in Natura', 1, 2, 1000, 53, 13.9, 0.8, 0, 6, 0.1, 5, 0.1, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(632, 'Pepino', 1, 2, 1000, 10, 2, 0.9, 0, 10, 0.1, 9, 0.1, 0, 5, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(633, 'Uva Benitaka', 1, 2, 1000, 49, 12.7, 0.6, 0.2, 8, 0.2, 6, 0, 0, 1.9, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(634, 'Berinjela', 1, 2, 1000, 20, 4.4, 1.2, 0.1, 9, 0.2, 13, 0.1, 0, 3, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(635, 'Chocolate em Pó', 1, 2, 1000, 540, 99.5, 0, 0, 4, 1.6, 57, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(636, 'Kiwi in Natura', 1, 2, 1000, 51, 11.5, 1.3, 0.6, 24, 0.3, 11, 0.1, 0, 70.8, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(637, 'Linguiça de Frango', 1, 2, 1000, 218, 0, 14.2, 17.4, 11, 0.5, 19, 0.7, 0, 4.6, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(638, 'Linguiça mista', 1, 2, 1000, 199, 2.1, 6.7, 20, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(639, 'Limão', 1, 2, 1000, 32, 111, 9, 1, 51, 0, 10, 2, 0, 382, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(640, 'Nata de leite', 1, 2, 1000, 39, 73, 54, 3.86, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(641, 'Queijo Mussarela', 1, 2, 1000, 330, 3, 22.6, 25.2, 875, 0.3, 24, 3.5, 109, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(642, 'Fermento biológico', 1, 2, 1000, 120, 20, 9, 2, 21, 4, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(643, 'Farinha de milho', 1, 2, 1000, 351, 79.1, 7.2, 1.5, 1, 2.3, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(644, 'Pão de Batata', 1, 2, 1000, 120.7, 34.8, 4.8, 3.8, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(645, 'Farinha de Trigo com Fermento', 1, 2, 1000, 170, 36, 5.6, 0.5, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(646, 'Azeite de Oliva', 4, 3, 1000, 884, 0, 0, 100, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(647, 'Sardinha enlatada em óleo', 1, 2, 1000, 205.88, 0, 23.53, 10.59, 436.47, 3.06, 0, 0, 223.53, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(648, 'Peixe (Filé)', 1, 2, 1000, 123.12, 0, 28.35, 1.08, 33, 1.06, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(649, 'Aveia', 1, 2, 1000, 104, 17, 4.3, 2.2, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(650, 'Sequilhos', 1, 2, 1000, 122, 25, 0.8, 2, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(651, 'Apresuntado', 1, 2, 1000, 1289, 2.9, 13.5, 1.9, 22.6, 0.9, 15.3, 1.7, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(652, 'Biscoito Integral', 1, 2, 1000, 128, 19, 3.1, 4.3, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(653, 'Bebida Láctea', 1, 2, 1000, 169, 28, 4.4, 4.4, 200, 0, 0, 0, 180, 14, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(654, 'Abacate', 1, 2, 1000, 96, 6, 1.6, 8.4, 8, 0.2, 0, 0, 0, 8.7, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(655, 'Pão Francês Integral', 1, 2, 1000, 127, 25, 4.9, 0.8, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(656, 'Suco concentrado de Tamarindo', 1, 2, 1000, 10, 2, 0, 0, 0, 0, 0, 0, 0, 10, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(657, 'Margarina sem Sal', 1, 2, 1000, 72, 0, 0, 8, 0, 0, 0, 0, 45, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(658, 'Leite Desnatado', 4, 3, 1000, 61, 9.3, 6, 0, 210, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(659, 'Arroz Integral', 1, 2, 1000, 230, 50, 5, 1, 23, 1, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(660, 'Brócolis', 1, 2, 1000, 255, 4, 3.6, 0.4, 85.9, 0.6, 29.6, 0.5, 0, 34.3, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(661, 'Gergelim', 1, 2, 1000, 46.72, 1.73, 1.7, 4.03, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(662, 'Azeite Extra Virgem', 4, 3, 1000, 98.4, 0, 0, 11.04, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(663, 'Hortelã', 1, 2, 1000, 1, 0.2, 0, 0, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(664, 'Gengibre', 1, 2, 1000, 80, 17.77, 1.82, 0.75, 16, 0.6, 43, 0.34, 0, 5, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(665, 'Nozes', 1, 2, 1000, 100, 2, 2.3, 10, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(666, 'Espinafre', 1, 2, 1000, 40, 7, 5, 0, 245, 6.4, 0, 0, 1474, 18, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(667, 'Alecrim', 1, 2, 1000, 16.51, 2.56, 0.2, 0.61, 0, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(668, 'Orégano', 1, 2, 1000, 5, 1, 0, 0, 24, 0.7, 0, 0, 100, 1, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(669, 'Manjericão', 1, 2, 1000, 212, 3.6, 2, 0.4, 210.9, 1, 57.8, 0.5, 0, 2.3, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(670, 'Rúcula', 1, 2, 1000, 13.1, 2.2, 1.8, 0.1, 116.6, 0.9, 17.8, 0.2, 0, 46.3, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(671, 'Leite Zero Lactose', 4, 3, 1000, 82, 90, 6.2, 2.4, 232, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(672, 'Iogurte Zero Lactose', 4, 3, 1000, 39, 5.2, 4.5, 0, 175, 0, 0, 0, 0, 0, '2016-12-27 00:00:00', '2016-12-27 00:00:00', 0),
(673, 'asdfsdfdddd', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-01-16 17:35:33', '2017-01-16 17:35:39', 1);

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

--
-- Extraindo dados da tabela `cardapio_tipos`
--

INSERT INTO `cardapio_tipos` (`id`, `nome`, `deleted`, `created`, `modified`) VALUES
(1, 'Lanche', 0, '2016-12-29 20:55:22', '2016-12-29 20:55:22'),
(2, 'Café da Manhã', 0, '2016-12-29 20:55:22', '2016-12-29 20:55:22'),
(3, 'Almoço', 0, '2016-12-29 20:55:22', '2016-12-29 20:55:22'),
(4, 'Jantar', 0, '2016-12-29 20:55:22', '2016-12-29 20:55:22'),
(5, 'Lanche da Tarde', 0, '2016-12-29 20:55:22', '2016-12-29 20:55:22'),
(6, 'Lanche Especial', 0, '2016-12-29 20:55:22', '2016-12-29 20:55:22'),
(7, 'Outro', 0, '2016-12-29 20:55:22', '2016-12-29 20:55:22');

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

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id`, `alias`, `nome`, `descricao`, `created`, `modified`) VALUES
(1, 'eex_coord', 'Coordenação da Alimentação Escolar', NULL, NULL, NULL),
(2, 'eex_nutri', 'Nutricionista', NULL, NULL, NULL),
(3, 'uex_coord', 'Coordenação de Apoio Escolar', NULL, NULL, NULL),
(4, 'eex_assist', 'Técnico Administrativo', NULL, NULL, NULL),
(5, 'super', 'Super Usuário', NULL, '2017-01-12 14:47:34', '2017-01-12 14:47:34');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Extraindo dados da tabela `medidas`
--

INSERT INTO `medidas` (`id`, `nome`, `sigla`, `created`, `modified`) VALUES
(1, 'Grama', 'g', NULL, NULL),
(2, 'Quilograma', 'kg', NULL, NULL),
(3, 'Litro', 'l', NULL, NULL),
(4, 'Mililitro', 'ml', NULL, NULL);

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

--
-- Extraindo dados da tabela `modalidades`
--

INSERT INTO `modalidades` (`id`, `nome`, `nome_reduzido`, `created`, `modified`) VALUES
(1, 'Ensino Fundamental', 'Ens. Fund.', NULL, NULL),
(2, 'Educação Infantil', 'Educ. Infantil', NULL, NULL),
(3, 'Educação de Jovens e Adultos', 'EJA', NULL, NULL),
(4, 'Mais Educação', 'Mais Educ.', NULL, NULL),
(5, 'Atendimento Educacional Especializado', 'AEE', NULL, NULL),
(6, 'Ensino Médio', 'Ens. Médio', NULL, NULL);

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

--
-- Extraindo dados da tabela `ufs`
--

INSERT INTO `ufs` (`id`, `nome`, `sigla`, `created`, `modified`) VALUES
(1, 'Acre', 'AC', NULL, NULL),
(2, 'Amazonas', 'AM', NULL, NULL),
(3, 'Amapá', 'AP', NULL, NULL),
(4, 'Roraima', 'RR', NULL, NULL),
(5, 'Rondônia', 'RO', NULL, NULL),
(6, 'Pará', 'PA', NULL, NULL),
(7, 'Tocantins', 'TO', NULL, NULL),
(8, 'Maranhão', 'MA', NULL, NULL),
(9, 'Piauí', 'PI', NULL, NULL),
(10, 'Ceará', 'CE', NULL, NULL),
(11, 'Rio Grande do Norte', 'RN', NULL, NULL),
(12, 'Paraíba', 'PB', NULL, NULL),
(13, 'Pernambuco', 'PE', NULL, NULL),
(14, 'Alagoas', 'AL', NULL, NULL),
(15, 'Sergipe', 'SE', NULL, NULL),
(16, 'Bahia', 'BA', NULL, NULL),
(17, 'Espírito Santo', 'ES', NULL, NULL),
(18, 'Rio de Janeiro', 'RJ', NULL, NULL),
(19, 'São Paulo', 'SP', NULL, NULL),
(20, 'Minas Gerais', 'MG', NULL, NULL),
(21, 'Santa Catarina', 'SC', NULL, NULL),
(22, 'Paraná', 'PR', NULL, NULL),
(23, 'Rio Grande do Sul', 'RS', NULL, NULL),
(24, 'Goiás', 'GO', NULL, NULL),
(25, 'Distrito Federal', 'DF', NULL, NULL),
(26, 'Mato Grosso', 'MT', NULL, NULL),
(27, 'Mato Grosso do Sul', 'MS', NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `grupo_id`, `nome`, `email`, `senha`, `crn`, `endereco`, `bairro`, `uf_id`, `municipio`, `telefone1`, `telefone2`, `created`, `modified`) VALUES
(8, 1, 'Administrador', 'admin@admin.com', '$2y$10$pPSoFt/QWyBfF5IjXwl1lecOnDVPwAseKDOPoC0o0PJWirQrIziJq', '', 'N/a', '', 19, 'São Paulo', '', '', '2017-01-16 18:53:46', '2017-01-16 18:53:46');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
