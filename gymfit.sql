-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jun-2020 às 02:47
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gymfit`
--
CREATE DATABASE `gymfit`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--
CREATE TABLE `usuario` (
  `pk_id_usuario` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_aula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `especialidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`pk_id_usuario`, `nome`, `cargo`, `email`, `senha`, `tipo_aula`, `especialidade`, `rg`, `cpf`) VALUES
(1, 'Rodrigo Takassugui Gomes', 'atendente', 'rodrigo@t18.com.br', 'senha', '', '', '', ''),
(2, 'Fernanda Gomes', 'instrutor', 'fefa@gmail.com', 'gorducha', 'crossfit', '', '36', '1818'),
(7, 'rodrigo gomes', 'instrutor', '', '', 'Corrida', '', '1', '1'),
(9, 'Nilton Petroni Vilardi Júnior', 'fisioterapeuta', 'file@gmail.com', 'password', '', 'fortalecimento muscular', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`pk_id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `pk_id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



CREATE TABLE `cliente` (
  `pk_matricula` int(11) NOT NULL,
  `fk_id_plano` int(11) NOT NULL,
  `fk_id_forma_pgt` int(11) NOT NULL,
  `fk_id_biometria` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `rg` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`pk_matricula`, `fk_id_plano`, `fk_id_forma_pgt`, `fk_id_biometria`, `nome`, `cpf`, `rg`, `email`, `bairro`, `cep`, `estado`, `cidade`) VALUES
(1, 1, 1, 1, 'Marilson dos Santos', '12345678912', '9876543-2', 'cliente1@gmail.com', 'Saúde', '04294-000', 'MG', 'Uberlândia'),
(2, 1, 2, 2, 'José do Pulo', '12345678914', '3876543-2', 'cliente2@gmail.com', 'Centro', '04294-000', 'MG', 'Uberlândia'),
(3, 1, 1, 1, 'Edson Arantas do Nascimento', '12345678912', '9876543-2', 'cliente1@gmail.com', 'Saúde', '04294-000', 'MG', 'Uberlândia');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`pk_matricula`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `pk_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE `avaliacao` (
  `pk_id_avaliacao` int(11) NOT NULL,
  `fk_id_usuario` int(11) NOT NULL,
  `fk_matricula` int(11) NOT NULL,
  `analise` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cutanea` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exame_ergometrico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_avaliacao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `arquivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`pk_id_avaliacao`, `fk_id_usuario`, `fk_matricula`, `analise`, `cutanea`, `exame_ergometrico`, `data_avaliacao`, `arquivo`) VALUES
(12, 2, 0, 'ótimo saltador', 'excelente', 'boa', '11/6/2020', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`pk_id_avaliacao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `pk_id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

