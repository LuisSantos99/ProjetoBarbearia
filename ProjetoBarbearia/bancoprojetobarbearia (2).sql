-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Nov-2020 às 01:25
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancoprojetobarbearia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `IDAGENDA` int(11) NOT NULL,
  `IDCLIENTE` int(11) DEFAULT NULL,
  `IDBARBEIRO` int(11) DEFAULT NULL,
  `DATAHORA` datetime DEFAULT NULL,
  `DATAHORAFIM` datetime DEFAULT NULL,
  `COLOR` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`IDAGENDA`, `IDCLIENTE`, `IDBARBEIRO`, `DATAHORA`, `DATAHORAFIM`, `COLOR`) VALUES
(1, 6, 2, '2020-01-06 10:00:00', '2020-01-06 11:00:00', '#00CED1'),
(2, 3, 2, '2020-02-20 15:00:00', '2020-02-20 14:00:00', '#00CED1'),
(3, 2, 1, '2020-05-10 06:00:00', '2020-05-10 07:00:00', '#32CD32'),
(4, 5, 1, '2020-03-04 14:00:00', '2020-03-04 14:30:00', '#00CED1'),
(5, 1, 2, '2020-02-10 16:30:00', '2020-02-10 17:00:00', '#00CED1'),
(6, 3, 1, '2020-04-18 15:00:00', '2020-04-18 16:00:00', '#32CD32'),
(7, 6, 1, '2020-03-19 19:00:00', '2020-03-19 20:00:00', '#00CED1'),
(8, 1, 2, '2020-03-17 12:00:00', '2020-03-17 12:20:00', '#00CED1'),
(9, 2, 1, '2020-03-25 15:20:00', '2020-03-25 15:40:00', '#32CD32'),
(10, 1, 1, '2020-03-25 18:00:00', '2020-03-25 18:30:00', '#00CED1'),
(11, 5, 2, '2020-04-22 09:30:00', '2020-04-22 10:30:00', '#32CD32'),
(12, 3, 1, '2020-04-24 08:00:00', '2020-04-24 09:00:00', '#00CED1'),
(13, 2, 2, '2020-04-22 11:00:00', '2020-04-22 12:00:00', '#00CED1'),
(14, 3, 1, '2020-04-26 13:00:00', '2020-04-26 14:00:00', '#00CED1'),
(15, 2, 2, '2020-04-29 17:00:00', '2020-04-29 18:00:00', '#00CED1'),
(16, 6, 1, '2020-05-06 08:00:00', '2020-05-06 09:00:00', '#00CED1'),
(17, 3, 2, '2020-05-05 15:30:00', '2020-05-05 16:00:00', '#00CED1'),
(18, 5, 1, '2020-05-10 16:00:00', '2020-05-10 16:00:00', '#00CED1'),
(19, 3, 2, '2020-05-10 16:30:00', '2020-05-10 17:00:00', '#00CED1'),
(20, 5, 2, '2020-05-28 09:00:00', '2020-05-28 10:10:00', '#00CED1'),
(21, 2, 2, '2020-05-30 18:00:00', '2020-05-30 19:00:00', '#00CED1'),
(22, 6, 2, '2020-05-19 14:00:00', '2020-05-19 15:00:00', '#00CED1'),
(23, 5, 2, '2020-06-01 18:00:00', '2020-06-01 19:00:00', '#00CED1'),
(24, 2, 1, '2020-06-02 16:00:00', '2020-06-02 16:30:00', '#00CED1'),
(25, 2, 2, '2020-06-05 15:00:00', '2020-06-05 15:40:00', '#00CED1'),
(26, 5, 2, '2020-06-02 17:00:00', '2020-06-02 17:30:00', '#00CED1'),
(27, 2, 1, '2020-06-09 14:00:00', '2020-06-09 14:30:00', '#00CED1'),
(28, 6, 1, '2020-06-10 18:00:00', '2020-06-10 18:30:00', '#32CD32'),
(29, 5, 1, '2020-06-10 18:30:00', '2020-06-10 19:30:00', '#00CED1'),
(30, 2, 2, '2020-06-11 09:30:00', '2020-06-11 10:00:00', '#00CED1'),
(31, 3, 1, '2020-06-15 15:00:00', '2020-06-15 16:30:00', '#00CED1'),
(32, 1, 1, '2020-06-23 18:00:00', '2020-06-23 19:00:00', '#00CED1'),
(33, 6, 1, '2020-02-20 15:00:00', '2020-02-20 15:30:00', '#00CED1'),
(34, 6, 2, '2020-06-20 11:59:00', '2020-06-20 12:00:00', '#00CED1'),
(35, 5, 1, '2020-06-30 16:00:00', '2020-06-30 16:30:00', '#32CD32'),
(36, 1, 1, '2020-06-30 15:00:00', '2020-06-30 16:00:00', '#32CD32'),
(37, 2, 2, '2020-06-01 09:30:00', '2020-06-01 10:30:00', '#00CED1'),
(38, 1, 1, '2020-07-01 09:00:00', '2020-07-01 10:00:00', '#32CD32'),
(39, 3, 1, '2020-07-03 12:00:00', '2020-07-03 13:00:00', '#32CD32'),
(40, 1, 2, '2020-06-30 18:00:00', '2020-06-30 18:30:00', '#00CED1'),
(41, 6, 2, '2020-10-27 20:41:00', '2020-10-27 20:47:00', '#32CD32'),
(42, 1, 2, '2020-11-03 13:00:00', '2020-11-03 13:30:00', '#32CD32'),
(43, 8, 1, '2020-11-01 18:00:00', '2020-11-01 19:00:00', '#00CED1'),
(44, 1, 1, '2020-09-10 15:00:00', '2020-09-10 16:00:00', '#00CED1'),
(45, 3, 2, '2020-10-25 10:00:00', '2020-10-25 11:00:00', '#00CED1'),
(46, 6, 2, '2020-11-03 15:00:00', '2020-11-03 15:30:00', '#32CD32'),
(47, 7, 1, '2020-11-04 12:00:00', '2020-11-04 13:00:00', '#32CD32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `IDATENDIMENTO` int(11) NOT NULL,
  `IDBARBEIRO` int(11) NOT NULL,
  `IDCLIENTE` int(11) NOT NULL,
  `DT_HR_SALVOU` datetime NOT NULL,
  `VALORTOTAL` double NOT NULL,
  `IDAGENDA` int(11) NOT NULL,
  `STATUS` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atendimento`
--

INSERT INTO `atendimento` (`IDATENDIMENTO`, `IDBARBEIRO`, `IDCLIENTE`, `DT_HR_SALVOU`, `VALORTOTAL`, `IDAGENDA`, `STATUS`) VALUES
(1, 2, 6, '0000-00-00 00:00:00', 10, 1, 'F'),
(2, 2, 3, '0000-00-00 00:00:00', 20, 2, 'F'),
(3, 1, 2, '0000-00-00 00:00:00', 0, 3, 'A'),
(4, 1, 5, '0000-00-00 00:00:00', 10, 4, 'F'),
(5, 2, 1, '0000-00-00 00:00:00', 15, 5, 'F'),
(6, 1, 3, '0000-00-00 00:00:00', 0, 6, 'A'),
(7, 1, 6, '0000-00-00 00:00:00', 9, 7, 'F'),
(8, 2, 1, '0000-00-00 00:00:00', 16, 8, 'F'),
(9, 1, 2, '0000-00-00 00:00:00', 0, 9, 'A'),
(10, 1, 1, '0000-00-00 00:00:00', 30, 10, 'F'),
(11, 2, 5, '0000-00-00 00:00:00', 0, 11, 'A'),
(12, 1, 3, '0000-00-00 00:00:00', 15, 12, 'F'),
(13, 2, 2, '0000-00-00 00:00:00', 19, 13, 'F'),
(14, 1, 3, '0000-00-00 00:00:00', 20, 14, 'F'),
(15, 2, 2, '0000-00-00 00:00:00', 15, 15, 'F'),
(16, 1, 6, '0000-00-00 00:00:00', 19, 16, 'F'),
(17, 2, 3, '0000-00-00 00:00:00', 32, 17, 'F'),
(18, 1, 5, '0000-00-00 00:00:00', 14, 18, 'F'),
(19, 2, 3, '0000-00-00 00:00:00', 15, 19, 'F'),
(20, 2, 5, '0000-00-00 00:00:00', 20, 20, 'F'),
(21, 2, 2, '0000-00-00 00:00:00', 30, 21, 'F'),
(22, 2, 6, '0000-00-00 00:00:00', 6, 22, 'F'),
(23, 2, 5, '0000-00-00 00:00:00', 18, 23, 'F'),
(24, 1, 2, '0000-00-00 00:00:00', 30, 24, 'F'),
(25, 2, 2, '0000-00-00 00:00:00', 50, 25, 'F'),
(26, 2, 5, '0000-00-00 00:00:00', 15, 26, 'F'),
(27, 1, 2, '0000-00-00 00:00:00', 16, 27, 'F'),
(28, 1, 6, '0000-00-00 00:00:00', 0, 28, 'A'),
(29, 1, 5, '0000-00-00 00:00:00', 10, 29, 'F'),
(30, 2, 2, '0000-00-00 00:00:00', 16, 30, 'F'),
(31, 1, 3, '0000-00-00 00:00:00', 0, 31, 'A'),
(32, 1, 1, '0000-00-00 00:00:00', 15, 32, 'F'),
(33, 1, 6, '0000-00-00 00:00:00', 31, 33, 'F'),
(34, 2, 6, '0000-00-00 00:00:00', 20, 34, 'F'),
(35, 1, 5, '0000-00-00 00:00:00', 0, 35, 'A'),
(36, 1, 1, '0000-00-00 00:00:00', 0, 36, 'A'),
(37, 2, 2, '0000-00-00 00:00:00', 14, 37, 'F'),
(38, 1, 1, '0000-00-00 00:00:00', 0, 38, 'A'),
(39, 1, 3, '0000-00-00 00:00:00', 0, 39, 'A'),
(40, 2, 1, '0000-00-00 00:00:00', 10, 40, 'F'),
(41, 2, 6, '0000-00-00 00:00:00', 0, 41, 'A'),
(42, 2, 1, '0000-00-00 00:00:00', 0, 42, 'A'),
(43, 1, 8, '0000-00-00 00:00:00', 40, 43, 'F'),
(44, 1, 1, '0000-00-00 00:00:00', 24, 44, 'F'),
(45, 2, 3, '0000-00-00 00:00:00', 50, 45, 'F'),
(46, 2, 6, '0000-00-00 00:00:00', 0, 46, 'A'),
(47, 1, 7, '0000-00-00 00:00:00', 0, 47, 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendi_itens`
--

CREATE TABLE `atendi_itens` (
  `IDATENDIMENTO_ITENS` int(11) NOT NULL,
  `IDATENDIMENTO` int(11) NOT NULL,
  `SERVICO` varchar(200) NOT NULL,
  `VALOR` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atendi_itens`
--

INSERT INTO `atendi_itens` (`IDATENDIMENTO_ITENS`, `IDATENDIMENTO`, `SERVICO`, `VALOR`) VALUES
(1, 1, 'Corte Adulto', 10),
(2, 39, 'Corte Adulto', 15),
(3, 39, 'Corte Infantil', 20),
(4, 39, 'Corte Adulto', 16),
(5, 39, 'Corte Adulto', 15),
(6, 39, 'Corte Infantil', 10),
(7, 39, 'Corte Adulto', 16),
(8, 39, 'Corte Adulto', 30),
(9, 39, 'Corte Infantil', 9),
(10, 39, 'Corte Infantil', 14),
(11, 39, 'Corte Infantil', 14),
(12, 39, 'Corte Adulto', 15),
(13, 39, 'Corte Adulto', 6),
(14, 39, 'Corte Infantil', 16),
(15, 39, 'Corte Adulto', 16),
(16, 39, 'Corte Infantil', 19),
(17, 39, 'Corte Infantil', 15),
(18, 39, 'Corte Infantil', 20),
(19, 39, 'Corte Infantil', 30),
(20, 39, 'Corte Infantil', 14),
(21, 39, 'Corte Infantil', 15),
(22, 39, 'Corte Adulto', 18),
(23, 39, 'Corte Infantil', 19),
(24, 39, 'Corte Infantil', 16),
(25, 39, 'Corte Adulto', 30),
(26, 39, 'Corte Adulto', 20.2),
(27, 39, 'Corte Adulto', 30),
(28, 39, 'Corte Adulto', 10),
(29, 39, 'Corte Infantil', 15),
(30, 39, 'Corte Infantil', 16),
(31, 39, 'Corte Adulto', 20),
(32, 39, 'Corte Infantil', 15),
(33, 39, 'Corte Adulto', 20),
(34, 40, 'Corte Adulto', 10),
(35, 43, 'Corte Adulto', 20),
(36, 43, 'Corte Infantil', 10),
(37, 44, 'Corte Adulto', 9),
(38, 44, 'Corte Adulto', 15),
(39, 45, 'Corte Adulto', 20),
(40, 45, 'Corte Infantil', 10),
(41, 45, 'Corte Adulto', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `barbeiro`
--

CREATE TABLE `barbeiro` (
  `IDBARBEIRO` int(11) NOT NULL,
  `NOME` varchar(200) NOT NULL,
  `ESPECIALIZACAO` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `barbeiro`
--

INSERT INTO `barbeiro` (`IDBARBEIRO`, `NOME`, `ESPECIALIZACAO`, `CPF`) VALUES
(1, 'Wesler de Paula Palhares', '', '457.878.787-82'),
(2, 'Marcelo Pereira Souza', '', '775.426.853-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `IDCLIENTE` int(11) NOT NULL,
  `NOME` varchar(150) NOT NULL,
  `CPF` varchar(15) NOT NULL,
  `RG` varchar(12) NOT NULL,
  `TELEFONE` varchar(19) NOT NULL,
  `ATIVO` varchar(3) NOT NULL,
  `DATANASC` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`IDCLIENTE`, `NOME`, `CPF`, `RG`, `TELEFONE`, `ATIVO`, `DATANASC`) VALUES
(1, 'Marcos Antônio Oliveira', '457.848.264-89', '58.632.985-x', '+55 (16) 95656-5565', 'on', '1997-02-01'),
(2, 'Paulo Lemes', '785.457.548-7', '45.124.878-7', '+55 (16) 94578-1424', 'on', '1985-03-15'),
(3, 'Mateus Places', '145.653.658-98', '56.325.486-8', '+55 (16) 98545-9853', 'on', '1992-04-15'),
(5, 'João Paulo Marques', '656.565.056-56', '02.154.454-f', '+55 (85) 56565-6652', 'on', '1975-06-05'),
(6, 'Pietro Afonso de Souza', '154.878.787-87', '23.656.565-6', '+55 (87) 54624-4641', 'on', '2000-11-06'),
(7, 'Cliente Teste', '999.999.999-99', '99.999.999-9', '+55 (99) 99999-9999', 'on', '2001-08-09'),
(8, 'Thalia Arcanjo Silva', '416.118.159-80', '', '+55 (16) 98821-7730', 'on', '2001-08-15'),
(9, 'Leandro Oliveira', '', '', '', 'off', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `IDUSUARIO` int(11) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `SENHA` varchar(250) NOT NULL,
  `IDBARBEIRO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`IDUSUARIO`, `LOGIN`, `SENHA`, `IDBARBEIRO`) VALUES
(1, 'wesler.paula', '$2y$10$mBspYnfvRk5Qx2tr74enJOa8IOSYKT0Z4ynvB1aNdDZVnxTMnWGFq', 1),
(2, 'marcelo.souza', '$2y$10$xeBYDft/15o7ou32lY0VR.oo2q0Hozh.7rouFhiDtDfWCy/FqvKzC', 2),
(3, 'admin', '$2y$10$0uqDxM4XieF9M3lPxyVx0OsRfmM1pj04ttR42l9LC9DqwAI3q4/8C', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`IDAGENDA`);

--
-- Índices para tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`IDATENDIMENTO`);

--
-- Índices para tabela `atendi_itens`
--
ALTER TABLE `atendi_itens`
  ADD PRIMARY KEY (`IDATENDIMENTO_ITENS`);

--
-- Índices para tabela `barbeiro`
--
ALTER TABLE `barbeiro`
  ADD PRIMARY KEY (`IDBARBEIRO`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IDCLIENTE`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDUSUARIO`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `IDAGENDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `IDATENDIMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `atendi_itens`
--
ALTER TABLE `atendi_itens`
  MODIFY `IDATENDIMENTO_ITENS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `barbeiro`
--
ALTER TABLE `barbeiro`
  MODIFY `IDBARBEIRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IDCLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUSUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
