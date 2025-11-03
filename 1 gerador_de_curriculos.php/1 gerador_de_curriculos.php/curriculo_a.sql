-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/11/2025 às 12:59
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `curriculo_a`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `curriculo`
--

CREATE TABLE `curriculo` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `objetivo_proficional` varchar(255) NOT NULL,
  `data_de_nascimento` date NOT NULL,
  `idade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `curriculo`
--

INSERT INTO `curriculo` (`id`, `nome`, `email`, `senha`, `telefone`, `endereco`, `objetivo_proficional`, `data_de_nascimento`, `idade`) VALUES
(1, 'otavio fernando', 'otavio.konig.santos@escola.pr.gov.br', '546373645', '45098586994', 'rua 1', 'motrar a apo feita', '2006-10-02', '19 anos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `experiencia`
--

CREATE TABLE `experiencia` (
  `id` int(11) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `data_de_inicio` date NOT NULL,
  `descricao` text DEFAULT NULL,
  `data_de_enceramento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `experiencia`
--

INSERT INTO `experiencia` (`id`, `empresa`, `cargo`, `data_de_inicio`, `descricao`, `data_de_enceramento`) VALUES
(2, 'ecosentauro', 'progamador', '2025-10-30', NULL, '2028-11-30'),
(3, 'ecosentauro', 'progamador', '2025-10-30', NULL, '2028-11-30');

-- --------------------------------------------------------

--
-- Estrutura para tabela `formacao`
--

CREATE TABLE `formacao` (
  `id` int(11) NOT NULL,
  `instituicao` varchar(100) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `grau` varchar(50) DEFAULT NULL,
  `data_de_inicio` date DEFAULT NULL,
  `data_de_encerramento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `formacao`
--

INSERT INTO `formacao` (`id`, `instituicao`, `curso`, `grau`, `data_de_inicio`, `data_de_encerramento`) VALUES
(1, 'unipar pr', 'progamação', 'ensino superior em andamento ', '2025-02-05', '2027-06-05'),
(2, 'unipar pr', 'robotica', 'ensino superior completo', '2023-01-30', '2027-01-30'),
(3, 'unipar pr', 'progamação', 'ensino superior completo', '2023-01-30', '2027-01-30'),
(4, 'unipar pr', 'progamação', 'ensino superior completo', '2023-01-30', '2027-01-30');

-- --------------------------------------------------------

--
-- Estrutura para tabela `habilidades`
--

CREATE TABLE `habilidades` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `habilidade` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `habilidades`
--

INSERT INTO `habilidades` (`id`, `usuario_id`, `habilidade`) VALUES
(2, NULL, 'sou bom em edição de imagens'),
(3, NULL, 'linguagens de progamação'),
(4, NULL, 'css'),
(5, NULL, 'htm'),
(6, NULL, 'php'),
(7, NULL, 'sou bom em edição de imagens'),
(8, NULL, 'linguagens de progamação'),
(9, NULL, 'css'),
(10, NULL, 'htm'),
(11, NULL, 'php');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `curriculo`
--
ALTER TABLE `curriculo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `formacao`
--
ALTER TABLE `formacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `curriculo`
--
ALTER TABLE `curriculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `formacao`
--
ALTER TABLE `formacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
