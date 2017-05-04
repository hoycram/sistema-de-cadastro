-- phpMyAdmin SQL Dump
-- version 4.6.5
-- https://www.phpmyadmin.net/
--
-- Host: sistemas.fundacaostickel.org
-- Tempo de geração: 04/05/2017 às 12:57
-- Versão do servidor: 5.6.34-log
-- Versão do PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_alunos`
--

CREATE TABLE `tab_alunos` (
  `idAluno` int(11) NOT NULL,
  `nomeAluno` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `sexoAluno` varchar(20) DEFAULT NULL,
  `data_Aluno` date DEFAULT NULL,
  `enderecoAluno` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `rgAluno` varchar(20) DEFAULT NULL,
  `cpfAluno` varchar(20) DEFAULT NULL,
  `estadoCivil` varchar(20) DEFAULT NULL,
  `qtdeFilhos` varchar(20) DEFAULT NULL,
  `idadeFilhos` varchar(20) DEFAULT NULL,
  `telAluno` varchar(20) DEFAULT NULL,
  `celAluno` varchar(20) DEFAULT NULL,
  `emailAluno` varchar(255) DEFAULT NULL,
  `cursoAluno` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `local_insc` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_cursos`
--

CREATE TABLE `tab_cursos` (
  `idCurso` int(11) NOT NULL,
  `nomeCurso` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `nomeArtista` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `razaoParceiro` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_parceiros`
--

CREATE TABLE `tab_parceiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `endereco` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `responsavel` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `cargo` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `emailcontato` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_professor`
--

CREATE TABLE `tab_professor` (
  `idProfessor` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nomeartistico` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `endereco` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `categoria` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `_nom_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `_pass_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `status` enum('Alta','Baja') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarioss`
--

CREATE TABLE `usuarioss` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fone` varchar(255) DEFAULT NULL,
  `curso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tab_alunos`
--
ALTER TABLE `tab_alunos`
  ADD PRIMARY KEY (`idAluno`);

--
-- Índices de tabela `tab_cursos`
--
ALTER TABLE `tab_cursos`
  ADD PRIMARY KEY (`idCurso`);

--
-- Índices de tabela `tab_parceiros`
--
ALTER TABLE `tab_parceiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tab_professor`
--
ALTER TABLE `tab_professor`
  ADD PRIMARY KEY (`idProfessor`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- Índices de tabela `usuarioss`
--
ALTER TABLE `usuarioss`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tab_alunos`
--
ALTER TABLE `tab_alunos`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tab_cursos`
--
ALTER TABLE `tab_cursos`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tab_parceiros`
--
ALTER TABLE `tab_parceiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tab_professor`
--
ALTER TABLE `tab_professor`
  MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `usuarioss`
--
ALTER TABLE `usuarioss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
