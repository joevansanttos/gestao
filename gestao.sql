-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Set-2017 às 21:46
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aplicacoes`
--

CREATE TABLE `aplicacoes` (
  `id_aplicacao` int(11) NOT NULL,
  `cod_pi` int(11) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacoes`
--

CREATE TABLE `classificacoes` (
  `id_classificacao` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`) VALUES
(4, 'Gevan'),
(5, 'Petrobras'),
(6, 'Pimenta Advogados'),
(7, 'Pimenta Advogados');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_img`
--

CREATE TABLE `cliente_img` (
  `id_cliente_img` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `image` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `definicoes`
--

CREATE TABLE `definicoes` (
  `id_definicao` int(11) NOT NULL,
  `cod_pi` varchar(11) DEFAULT NULL,
  `descricao` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamento` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `id_cliente`, `nome`) VALUES
(1, 4, 'Folha de Pagamento'),
(2, 7, 'Financeiro'),
(3, 4, 'Compras'),
(4, 4, 'Compras');

-- --------------------------------------------------------

--
-- Estrutura da tabela `diretores`
--

CREATE TABLE `diretores` (
  `id_diretor` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestor_dep`
--

CREATE TABLE `gestor_dep` (
  `id_gestor_dep` int(11) NOT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestor_macro`
--

CREATE TABLE `gestor_macro` (
  `id_gestor_macro` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `tel` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `id_macroprocesso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gestor_macro`
--

INSERT INTO `gestor_macro` (`id_gestor_macro`, `nome`, `tel`, `email`, `cargo`, `id_macroprocesso`) VALUES
(2, 'Fábio Dias', '(71) 22222-2222', 'fabiodias@gevan.com', 'Gestor', 10),
(3, '', '', '', '', 10),
(4, 'José da Silva', '(71) 98344-4444', 'jose@hotmail.com', 'Contador', 10),
(5, 'Leandro Rosário', '(71) 99959-5669', 'leandro@pimenta.com.br', 'Financeiro', 13),
(6, 'Joevan', '(71) 22222-2222', 'fabio@projek.com', 'Gestor', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestor_sub`
--

CREATE TABLE `gestor_sub` (
  `id_gestor_sub` int(11) NOT NULL,
  `id_subprocesso` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(25) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacoes`
--

CREATE TABLE `informacoes` (
  `id_informacao` int(11) NOT NULL,
  `cod_pi` varchar(11) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `macroprocessos`
--

CREATE TABLE `macroprocessos` (
  `id_macroprocesso` int(11) NOT NULL,
  `cod_pi` varchar(11) DEFAULT NULL,
  `data_ultima` varchar(25) DEFAULT NULL,
  `data_proxima` varchar(25) DEFAULT NULL,
  `id_classificao` int(11) DEFAULT NULL,
  `t_processo` varchar(255) DEFAULT NULL,
  `n_processo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `macroprocessos`
--

INSERT INTO `macroprocessos` (`id_macroprocesso`, `cod_pi`, `data_ultima`, `data_proxima`, `id_classificao`, `t_processo`, `n_processo`) VALUES
(10, 'FOL01', NULL, NULL, NULL, 'Adiantamento Salarial', '5.1.'),
(12, 'FOL01', NULL, NULL, NULL, 'Faturamento de Benefícios', '5.2.'),
(13, 'FIN00', NULL, NULL, NULL, 'Contas a pagar', '5.1.'),
(14, 'FIN00', NULL, NULL, NULL, 'Faturamento de Benefícios', '5.2.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `objetivos`
--

CREATE TABLE `objetivos` (
  `id_objetivo` int(11) NOT NULL,
  `cod_pi` varchar(11) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pis`
--

CREATE TABLE `pis` (
  `id_departamento` int(11) DEFAULT NULL,
  `cod_pi` varchar(20) NOT NULL,
  `data_revisado` varchar(255) DEFAULT NULL,
  `id_consultor` int(11) DEFAULT NULL,
  `id_gestor_pi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pis`
--

INSERT INTO `pis` (`id_departamento`, `cod_pi`, `data_revisado`, `id_consultor`, `id_gestor_pi`) VALUES
(2, 'FIN00', NULL, NULL, NULL),
(1, 'FOL01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `subprocessos`
--

CREATE TABLE `subprocessos` (
  `id_subprocesso` int(11) NOT NULL,
  `id_macroprocesso` int(11) DEFAULT NULL,
  `descricao` varchar(10000) DEFAULT NULL,
  `n_subprocesso` varchar(10) DEFAULT NULL,
  `t_subprocesso` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `subprocessos`
--

INSERT INTO `subprocessos` (`id_subprocesso`, `id_macroprocesso`, `descricao`, `n_subprocesso`, `t_subprocesso`) VALUES
(3, 10, 'dsdsdsdsds', '5.1.1.', 'Verificar Gastos do funcionário do mês anterior'),
(4, 10, 'Se após a verificação foi percebido que o funcionário gastou nos benefícios mais que 40 % do valor integral do salário então é enviada a ele uma carta de anuência', '5.1.2', 'Gasto Inferior a 40%'),
(5, 12, 'O arquivo de texto em geral é um arquivo em que consta de cada funcionário', '5.2.1.', 'Importar arquivo de texto de cada benefício para f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplicacoes`
--
ALTER TABLE `aplicacoes`
  ADD PRIMARY KEY (`id_aplicacao`);

--
-- Indexes for table `classificacoes`
--
ALTER TABLE `classificacoes`
  ADD PRIMARY KEY (`id_classificacao`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `cliente_img`
--
ALTER TABLE `cliente_img`
  ADD PRIMARY KEY (`id_cliente_img`);

--
-- Indexes for table `definicoes`
--
ALTER TABLE `definicoes`
  ADD PRIMARY KEY (`id_definicao`);

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indexes for table `diretores`
--
ALTER TABLE `diretores`
  ADD PRIMARY KEY (`id_diretor`);

--
-- Indexes for table `gestor_dep`
--
ALTER TABLE `gestor_dep`
  ADD PRIMARY KEY (`id_gestor_dep`);

--
-- Indexes for table `gestor_macro`
--
ALTER TABLE `gestor_macro`
  ADD PRIMARY KEY (`id_gestor_macro`);

--
-- Indexes for table `gestor_sub`
--
ALTER TABLE `gestor_sub`
  ADD PRIMARY KEY (`id_gestor_sub`);

--
-- Indexes for table `informacoes`
--
ALTER TABLE `informacoes`
  ADD PRIMARY KEY (`id_informacao`);

--
-- Indexes for table `macroprocessos`
--
ALTER TABLE `macroprocessos`
  ADD PRIMARY KEY (`id_macroprocesso`);

--
-- Indexes for table `objetivos`
--
ALTER TABLE `objetivos`
  ADD PRIMARY KEY (`id_objetivo`);

--
-- Indexes for table `pis`
--
ALTER TABLE `pis`
  ADD PRIMARY KEY (`cod_pi`);

--
-- Indexes for table `subprocessos`
--
ALTER TABLE `subprocessos`
  ADD PRIMARY KEY (`id_subprocesso`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplicacoes`
--
ALTER TABLE `aplicacoes`
  MODIFY `id_aplicacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classificacoes`
--
ALTER TABLE `classificacoes`
  MODIFY `id_classificacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cliente_img`
--
ALTER TABLE `cliente_img`
  MODIFY `id_cliente_img` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `definicoes`
--
ALTER TABLE `definicoes`
  MODIFY `id_definicao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `diretores`
--
ALTER TABLE `diretores`
  MODIFY `id_diretor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gestor_dep`
--
ALTER TABLE `gestor_dep`
  MODIFY `id_gestor_dep` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gestor_macro`
--
ALTER TABLE `gestor_macro`
  MODIFY `id_gestor_macro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gestor_sub`
--
ALTER TABLE `gestor_sub`
  MODIFY `id_gestor_sub` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `informacoes`
--
ALTER TABLE `informacoes`
  MODIFY `id_informacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `macroprocessos`
--
ALTER TABLE `macroprocessos`
  MODIFY `id_macroprocesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `objetivos`
--
ALTER TABLE `objetivos`
  MODIFY `id_objetivo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subprocessos`
--
ALTER TABLE `subprocessos`
  MODIFY `id_subprocesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
