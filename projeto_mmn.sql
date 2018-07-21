-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Jul-2018 às 03:23
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto_mmn`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_pai` int(11) DEFAULT NULL,
  `patente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_pai`, `patente`, `nome`, `email`, `senha`) VALUES
(1, NULL, 1, 'Sistema', 'sistema@gmail.com', 'e99a18c428cb38d5f260853678922e03'),
(2, 1, 1, 'Fulano', 'fulano@gmail.com', 'fbad19c19e9c4baff8b963e8fc6f794b'),
(3, 1, 1, 'Cicrano', 'cicrano@gmail.com', 'b7f267b6c483a81d77427378c470ca82'),
(4, 3, 1, 'Paulo', 'paulo@gmail.com', '6ee236e4d0ab7380bb1bee87b8f0dce5'),
(5, 3, 1, 'Pedro', 'pedro@gmail.com', 'c3b7f393410fe6185ba5d966a213a38f'),
(6, 4, 1, 'JoÃ£o', 'joao@gmail.com', 'e52d270281261b738fcd413c72d8ad4c'),
(7, 6, 1, 'Pedrinho', 'pedrinho@gmail.com', 'a9d0cf0bd640913b43b0b2d3b917765f'),
(8, 7, 1, 'Roberto', 'roberto@gmail.com', '5f177272b67a69c573dc1de61c853157');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
