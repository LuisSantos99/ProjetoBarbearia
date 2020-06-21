-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2020 a las 23:14:39
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bancoprojetobarbearia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
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
-- Volcado de datos para la tabla `agenda`
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
(16, 0, 2, '2020-06-24 10:00:00', '2020-06-24 10:30:00', '#00CED1'),
(17, 0, 1, '2020-06-20 09:00:00', '2020-06-20 11:00:00', '#00FF7F'),
(18, 0, 1, '2020-06-20 09:00:00', '2020-06-20 11:00:00', '#00FF7F'),
(19, 14, 2, '2020-06-21 07:00:00', '2020-06-21 08:00:00', '#00CED1'),
(20, 16, 7, '2020-06-18 13:00:00', '2020-06-18 13:30:00', '#00CED1'),
(21, 15, 4, '2020-06-25 12:50:00', '2020-06-25 13:00:00', '#00CED1'),
(22, 15, 2, '2020-06-26 22:59:00', '2020-06-26 23:00:00', '#32CD32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atendimento`
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
-- Volcado de datos para la tabla `atendimento`
--

INSERT INTO `atendimento` (`IDATENDIMENTO`, `IDBARBEIRO`, `IDCLIENTE`, `DT_HR_SALVOU`, `VALORTOTAL`, `IDAGENDA`, `STATUS`) VALUES
(50, 1, 13, '0000-00-00 00:00:00', 42, 0, ''),
(51, 1, 13, '0000-00-00 00:00:00', 20, 0, ''),
(52, 1, 13, '0000-00-00 00:00:00', 20, 0, ''),
(53, 1, 15, '0000-00-00 00:00:00', 16, 0, ''),
(54, 1, 15, '0000-00-00 00:00:00', 16, 0, ''),
(55, 1, 15, '0000-00-00 00:00:00', 374, 0, ''),
(56, 1, 16, '0000-00-00 00:00:00', 16, 0, ''),
(57, 2, 0, '0000-00-00 00:00:00', 0, 16, ''),
(58, 1, 0, '0000-00-00 00:00:00', 0, 17, ''),
(59, 1, 0, '0000-00-00 00:00:00', 0, 18, ''),
(60, 2, 14, '0000-00-00 00:00:00', 6, 19, 'F'),
(61, 7, 16, '0000-00-00 00:00:00', 30, 20, 'F'),
(62, 4, 15, '0000-00-00 00:00:00', 0, 21, 'F'),
(63, 2, 15, '0000-00-00 00:00:00', 0, 22, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atendi_itens`
--

CREATE TABLE `atendi_itens` (
  `IDATENDIMENTO_ITENS` int(11) NOT NULL,
  `IDATENDIMENTO` int(11) NOT NULL,
  `SERVICO` varchar(200) NOT NULL,
  `VALOR` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `atendi_itens`
--

INSERT INTO `atendi_itens` (`IDATENDIMENTO_ITENS`, `IDATENDIMENTO`, `SERVICO`, `VALOR`) VALUES
(10, 50, 'Corte Infantil', 12),
(11, 50, 'Corte Adulto', 30),
(12, 51, 'Corte Infantil', 12),
(13, 51, 'Corte Adulto', 8),
(14, 52, 'Corte Infantil', 8),
(15, 52, 'Corte Adulto', 12),
(16, 53, 'Corte Infantil', 6),
(17, 53, 'Corte Adulto', 10),
(18, 54, 'Corte Infantil', 6),
(19, 54, 'Corte Adulto', 10),
(20, 55, 'Corte Infantil', 374),
(21, 56, 'Corte Infantil', 6),
(22, 56, 'Corte Adulto', 10),
(23, 60, 'Corte Infantil', 10),
(24, 60, 'Corte Adulto', 20),
(25, 60, 'Corte Infantil', 10),
(26, 60, 'Corte Adulto', 20),
(27, 60, 'Corte Infantil', 6),
(28, 60, 'Corte Adulto', 10),
(29, 60, 'Corte Infantil', 10),
(30, 60, 'Corte Infantil', 10),
(31, 60, 'Corte Infantil', 10),
(32, 60, 'Corte Infantil', 6),
(33, 61, 'Corte Infantil', 173),
(34, 62, 'Corte Infantil', 15),
(35, 62, 'Corte Adulto', 15),
(36, 62, 'Corte Adulto', 20),
(37, 62, 'Corte Infantil', 15),
(38, 62, 'Corte Infantil', 15),
(39, 62, 'Corte Infantil', 15),
(40, 62, 'Corte Infantil', 15),
(41, 62, 'Corte Infantil', 15),
(42, 62, 'Corte Adulto', 15),
(43, 62, 'Corte Infantil', 15),
(44, 62, 'Corte Adulto', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barbeiro`
--

CREATE TABLE `barbeiro` (
  `IDBARBEIRO` int(11) NOT NULL,
  `NOME` varchar(200) NOT NULL,
  `ESPECIALIZACAO` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `barbeiro`
--

INSERT INTO `barbeiro` (`IDBARBEIRO`, `NOME`, `ESPECIALIZACAO`, `CPF`) VALUES
(1, 'teste', 'infantil', '98765439992-99'),
(2, 'opaaa', 'oooooi', '87544434534'),
(3, 'thaaa', '', '987654'),
(4, 'thaaa', '', '987654'),
(5, 'thalia', '', '1234'),
(6, 'thalia', '', '1234'),
(7, 'lucas', '', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IDCLIENTE` int(11) NOT NULL,
  `NOME` varchar(150) NOT NULL,
  `CPF` varchar(15) NOT NULL,
  `RG` varchar(12) NOT NULL,
  `TELEFONE` varchar(10) NOT NULL,
  `DDD` varchar(2) NOT NULL,
  `ATIVO` varchar(3) NOT NULL,
  `DATANASC` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IDCLIENTE`, `NOME`, `CPF`, `RG`, `TELEFONE`, `DDD`, `ATIVO`, `DATANASC`) VALUES
(13, 'Thalia Arcanjo Silva', '887.777.777-77', '99.983.890-3', '988217730', '01', 'on', '2001-08-15'),
(14, 'lucas santos', '876540328765', '098765432', '988005544', '16', '0', '09082001'),
(15, 'Thalia Arcanjo Pereira', '', '', '', '', 'on', ''),
(16, 'Laiane de Paula Palhares', '999.999.999-99', '77.777.777-7', '988776-655', '16', '0', '2001-09-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IDUSUARIO` int(11) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `SENHA` varchar(20) NOT NULL,
  `IDBARBEIRO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`IDAGENDA`);

--
-- Indices de la tabla `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`IDATENDIMENTO`);

--
-- Indices de la tabla `atendi_itens`
--
ALTER TABLE `atendi_itens`
  ADD PRIMARY KEY (`IDATENDIMENTO_ITENS`);

--
-- Indices de la tabla `barbeiro`
--
ALTER TABLE `barbeiro`
  ADD PRIMARY KEY (`IDBARBEIRO`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IDCLIENTE`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDUSUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `IDAGENDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `IDATENDIMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `atendi_itens`
--
ALTER TABLE `atendi_itens`
  MODIFY `IDATENDIMENTO_ITENS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `barbeiro`
--
ALTER TABLE `barbeiro`
  MODIFY `IDBARBEIRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IDCLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUSUARIO` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
