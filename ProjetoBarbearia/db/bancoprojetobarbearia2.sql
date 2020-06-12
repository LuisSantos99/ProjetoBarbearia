-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2020 a las 00:41:35
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
-- Estructura de tabla para la tabla `atendimento`
--

CREATE TABLE `atendimento` (
  `IDATENDIMENTO` int(11) NOT NULL,
  `IDBARBEIRO` int(11) NOT NULL,
  `IDCLIENTE` int(11) NOT NULL,
  `DT_HR_SALVOU` datetime NOT NULL,
  `VALORTOTAL` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IDCLIENTE` int(11) NOT NULL,
  `NOME` varchar(150) NOT NULL,
  `CPF` varchar(15) NOT NULL,
  `RG` varchar(12) NOT NULL,
  `TELEFONE` varchar(20) NOT NULL,
  `ATIVO` varchar(3) NOT NULL,
  `DATANASC` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IDCLIENTE`, `NOME`, `CPF`, `RG`, `TELEFONE`, `ATIVO`, `DATANASC`) VALUES
(13, 'Thalia Silva', '887.777.777-77', '99.983.890-3', '988217730', 'on', '2001-08-15'),
(14, 'lucas santos', '876540328765', '098765432', '988005544', '1', '09082001'),
(15, 'Thalia Arcanjo Pereira', '', '', '', '', '');

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
-- Indices de la tabla `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`IDATENDIMENTO`);

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
-- AUTO_INCREMENT de la tabla `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `IDATENDIMENTO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `barbeiro`
--
ALTER TABLE `barbeiro`
  MODIFY `IDBARBEIRO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IDCLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUSUARIO` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
