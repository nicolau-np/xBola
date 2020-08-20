-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jun-2020 às 20:22
-- Versão do servidor: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2019xbola`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `convites`
--

CREATE TABLE `convites` (
  `id_convite` int(11) NOT NULL,
  `nome_jogador1` varchar(60) NOT NULL,
  `nome_jogador2` varchar(60) NOT NULL,
  `objecto1` varchar(2) NOT NULL,
  `objecto2` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `convites`
--

INSERT INTO `convites` (`id_convite`, `nome_jogador1`, `nome_jogador2`, `objecto1`, `objecto2`) VALUES
(33, 'Nicolau', '', 'x', ''),
(34, 'Dede', 'Nicolau', 'x', 'o'),
(35, 'Nelson', '', 'x', ''),
(36, 'Kumpessa', 'Nelson', 'x', 'o'),
(37, 'Filson do Guetho', 'Nicolau Np', 'x', 'o'),
(38, 'Nicolau Np', 'Filson do Guetho', 'x', 'o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogada`
--

CREATE TABLE `jogada` (
  `id_jogada` int(11) NOT NULL,
  `ves` varchar(2) NOT NULL,
  `jogador1` varchar(60) NOT NULL,
  `jogador2` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogada`
--

INSERT INTO `jogada` (`id_jogada`, `ves`, `jogador1`, `jogador2`) VALUES
(3, 'x', 'Dede', 'Nicolau'),
(30, 'x', 'Nicolau Np', 'Filson do Guetho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogadores`
--

CREATE TABLE `jogadores` (
  `id_jogador` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `estado` varchar(60) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `sala` varchar(30) NOT NULL,
  `pontos` varchar(11) NOT NULL,
  `actual` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogadores`
--

INSERT INTO `jogadores` (`id_jogador`, `nome`, `senha`, `estado`, `titulo`, `sala`, `pontos`, `actual`) VALUES
(33, 'Nicolau', 'babaca', 'ON', 'Jogador', 'Sala 1', '', 'on'),
(34, 'Dede', 'olaola', 'ON', 'Jogador', 'Sala 1', '', 'on'),
(35, 'Nelson', '123', 'ON', 'Jogador', 'Sala 2', '', 'on'),
(36, 'Kumpessa', '123', 'ON', 'Jogador', 'Sala 2', '', 'on'),
(37, 'Filson do Guetho', '1234', 'ON', 'Jogador', 'Sala 4', '', 'on'),
(38, 'Nicolau Np', 'ola', 'ON', 'Jogador', 'Sala 4', '', 'of');

-- --------------------------------------------------------

--
-- Estrutura da tabela `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `emissor` varchar(60) NOT NULL,
  `receptor` varchar(60) NOT NULL,
  `descricao` text NOT NULL,
  `resposta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `message`
--

INSERT INTO `message` (`id_message`, `emissor`, `receptor`, `descricao`, `resposta`) VALUES
(2, 'Matias', 'Joana', '2', 'ok'),
(3, 'Dede', 'Nicolau', '3', 'ok'),
(30, 'Nicolau Np', 'Filson do Guetho', '30', 'ok');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sugestoes`
--

CREATE TABLE `sugestoes` (
  `id_suge` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `sugestao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sugestoes`
--

INSERT INTO `sugestoes` (`id_suge`, `nome`, `sugestao`) VALUES
(12, 'Nicolau', 'Um bom jogo gostei e me diver ti,.,. gostaria q colocasses mais funcionalidades como um chat e outra'),
(13, 'Vitoria', 'amei ,., belo jogo  mais adiciona ainda mais funcionalidades vou adorar ainda mais sendo assim nao vou sair do facebook.. aqui sera o meu novo lugar,..'),
(14, 'Bruno minguito', 'Amei good good sempre ao nivel'),
(15, 'Jose Carlos MagalhÃ£es', 'bom jogo,., mas devia ter mais entretenimento,., mais niveis ,como campos novos de batalhas mas gostei,.,.'),
(16, 'Brito', 'Bom jogo'),
(17, 'Fernanda', 'Bim'),
(18, 'Bonifacio Caleia', 'bom jogo'),
(19, 'Candido Manuel', 'Voiuiui'),
(20, 'Manuela', 'Muywu'),
(21, 'Major', 'bhjdhsdjhgjdfhj'),
(22, 'Filson do Guetho', 'Esse jogo Ã© fudido!!!!!!!!!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `estado` varchar(4) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `sala` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nome`, `senha`, `estado`, `titulo`, `sala`) VALUES
(1, 'Alma', 'ola', 'ON', 'admin', ''),
(10, 'Nicolau', 'babaca', 'ON', 'Jogador', ''),
(11, 'Dede', 'olaola', 'ON', 'Jogador', ''),
(12, 'Nelson', '123', 'ON', 'Jogador', ''),
(13, 'Kumpessa', '123', 'ON', 'Jogador', ''),
(14, 'Filson do Guetho', '1234', 'ON', 'Jogador', ''),
(15, 'Nicolau Np', 'ola', 'ON', 'Jogador', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `valores`
--

CREATE TABLE `valores` (
  `id_valor` int(11) NOT NULL,
  `id_jogada` int(11) NOT NULL,
  `b1` varchar(2) NOT NULL,
  `b2` varchar(2) NOT NULL,
  `b3` varchar(2) NOT NULL,
  `b4` varchar(2) NOT NULL,
  `b5` varchar(2) NOT NULL,
  `b6` varchar(2) NOT NULL,
  `b7` varchar(2) NOT NULL,
  `b8` varchar(2) NOT NULL,
  `b9` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `valores`
--

INSERT INTO `valores` (`id_valor`, `id_jogada`, `b1`, `b2`, `b3`, `b4`, `b5`, `b6`, `b7`, `b8`, `b9`) VALUES
(3, 3, 'x', '', '', '', 'o', '', '', '', ''),
(5, 5, '', '', '', '', '', '', '', '', ''),
(20, 20, '', '', '', '', '', '', '', '', ''),
(30, 30, '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `convites`
--
ALTER TABLE `convites`
  ADD PRIMARY KEY (`id_convite`),
  ADD KEY `id_jogador1` (`nome_jogador1`),
  ADD KEY `id_jogador2` (`nome_jogador2`);

--
-- Indexes for table `jogada`
--
ALTER TABLE `jogada`
  ADD PRIMARY KEY (`id_jogada`);

--
-- Indexes for table `jogadores`
--
ALTER TABLE `jogadores`
  ADD PRIMARY KEY (`id_jogador`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `sugestoes`
--
ALTER TABLE `sugestoes`
  ADD PRIMARY KEY (`id_suge`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `valores`
--
ALTER TABLE `valores`
  ADD PRIMARY KEY (`id_valor`),
  ADD KEY `id_jogada` (`id_jogada`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `convites`
--
ALTER TABLE `convites`
  MODIFY `id_convite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `jogada`
--
ALTER TABLE `jogada`
  MODIFY `id_jogada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `jogadores`
--
ALTER TABLE `jogadores`
  MODIFY `id_jogador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `sugestoes`
--
ALTER TABLE `sugestoes`
  MODIFY `id_suge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `valores`
--
ALTER TABLE `valores`
  MODIFY `id_valor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
