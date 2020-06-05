-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Maio-2020 às 06:55
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
-- Banco de dados: `barbearia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `login` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `barbeiros`
--

CREATE TABLE `barbeiros` (
  `nome` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `especializacao` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientecadastra`
--

CREATE TABLE `clientecadastra` (
  `nome` varchar(200) NOT NULL,
  `idade` varchar(32) NOT NULL,
  `cpf` varchar(32) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientecadastro`
--

CREATE TABLE `clientecadastro` (
  `nome` varchar(200) NOT NULL,
  `idade` varchar(32) NOT NULL,
  `cpf` varchar(32) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientefreq`
--

CREATE TABLE `clientefreq` (
  `nome` varchar(200) NOT NULL,
  `valor_gasto` int(200) NOT NULL,
  `data_frequentou` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_cortes`
--

CREATE TABLE `tipo_cortes` (
  `nome_cliente` varchar(200) NOT NULL,
  `data_corte` date NOT NULL,
  `valor_corte` int(200) NOT NULL,
  `tipo_corte` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `barbeiros`
--
ALTER TABLE `barbeiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientecadastra`
--
ALTER TABLE `clientecadastra`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientecadastro`
--
ALTER TABLE `clientecadastro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientefreq`
--
ALTER TABLE `clientefreq`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipo_cortes`
--
ALTER TABLE `tipo_cortes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `barbeiros`
--
ALTER TABLE `barbeiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientecadastra`
--
ALTER TABLE `clientecadastra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientecadastro`
--
ALTER TABLE `clientecadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientefreq`
--
ALTER TABLE `clientefreq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_cortes`
--
ALTER TABLE `tipo_cortes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
