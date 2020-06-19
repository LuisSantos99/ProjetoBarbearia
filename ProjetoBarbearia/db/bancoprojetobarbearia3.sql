-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jun-2020 às 23:04
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
(1, NULL, 7, '2020-06-17 20:13:00', '2020-06-17 20:13:00', '#00FF7F'),
(2, NULL, 2, '2020-06-17 20:13:00', '2020-06-17 20:20:00', '#00FF7F'),
(3, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(4, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(5, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(6, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(7, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(8, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(9, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(10, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(11, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(12, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(13, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(14, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(15, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(16, 0, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(17, 0, 1, '2020-06-20 09:00:00', '2020-06-20 11:00:00', '#00FF7F'),
(18, 0, 1, '2020-06-20 09:00:00', '2020-06-20 11:00:00', '#00FF7F'),
(19, 14, 2, '2020-06-21 07:00:00', '2020-06-21 08:00:00', '#00FF7F');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`IDAGENDA`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `IDAGENDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jun-2020 às 23:04
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
(1, NULL, 7, '2020-06-17 20:13:00', '2020-06-17 20:13:00', '#00FF7F'),
(2, NULL, 2, '2020-06-17 20:13:00', '2020-06-17 20:20:00', '#00FF7F'),
(3, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(4, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(5, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(6, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(7, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(8, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(9, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(10, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(11, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(12, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(13, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(14, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(15, NULL, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(16, 0, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00FF7F'),
(17, 0, 1, '2020-06-20 09:00:00', '2020-06-20 11:00:00', '#00FF7F'),
(18, 0, 1, '2020-06-20 09:00:00', '2020-06-20 11:00:00', '#00FF7F'),
(19, 14, 2, '2020-06-21 07:00:00', '2020-06-21 08:00:00', '#00FF7F');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`IDAGENDA`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `IDAGENDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
