-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/11/2023 às 11:15
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `despesa`
--

CREATE TABLE `despesa` (
  `cod` int(11) NOT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descri` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `despesa`
--

INSERT INTO `despesa` (`cod`, `cod_usuario`, `valor`, `descri`, `data`, `categoria`) VALUES
(26, 9, 1000.00, 'Mercado', '2023-10-17', 'Outros'),
(27, 9, 150.00, 'Conta de Luz', '2023-10-18', 'Outros'),
(28, 9, 40.00, 'Lanche', '2023-10-08', 'Comida'),
(29, 9, 175.00, 'Atualização Conta INTERNET + TV', '2023-10-10', 'Outros'),
(33, 10, 15000.00, 'Comida', '2023-10-20', 'Viagem'),
(34, 6, 20.00, '232131', '2023-10-05', 'Compras'),
(35, 6, 5000.00, '312', '2023-10-06', 'Compras'),
(39, 6, 2000.00, 'anão colombiano', '2023-01-24', 'Compras'),
(40, 6, 2500.00, 'anão argentino', '2023-02-01', 'Comida'),
(41, 6, 500000.00, 'Mulheres', '2023-03-24', 'Comida'),
(42, 11, 1000.00, 'Gasolina/Mes', '2023-10-12', 'Combustível'),
(43, 11, 2550.20, 'Mercado', '2023-10-07', 'Compras'),
(44, 11, 500.00, 'Compras na net', '2023-10-12', 'Compras'),
(45, 11, 150.00, 'Conta de Luz', '2023-10-19', 'Outros'),
(46, 11, 390.00, 'Pix', '2023-10-20', 'Outros'),
(47, 11, 1600.00, 'Viagem santa catarina', '2023-10-11', 'Viagem'),
(48, 11, 15.00, 'Sorvete MC Donalds', '2023-09-13', 'Outros'),
(49, 11, 50.00, 'Mouse Office', '2023-08-23', 'Compras'),
(50, 11, 200.00, 'Hospital', '2023-06-16', 'Emergência'),
(51, 11, 150.00, 'Renner', '2023-10-27', 'Roupas'),
(52, 11, 150.00, 'Ifood', '2023-06-09', 'Comida'),
(53, 11, 200.00, 'Terno', '2023-06-15', 'Roupas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `receita`
--

CREATE TABLE `receita` (
  `cod` int(11) NOT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descri` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `receita`
--

INSERT INTO `receita` (`cod`, `cod_usuario`, `valor`, `descri`, `data`, `categoria`) VALUES
(4, 6, 39393.00, 'Comida', '2023-10-13', 'Viagem'),
(5, 6, 7000.00, 'comida', '2023-10-25', 'Retorno Investimentos'),
(9, 9, 2550.75, 'Salário 5DIA UTIL', '2023-10-06', 'Salário'),
(10, 9, 15.75, 'Retorno de Aplicação CDB', '2023-10-04', 'Retorno Investimentos'),
(11, 9, 150.00, 'Freelancer', '2023-10-26', 'Renda Extra'),
(14, 10, 10000.00, 'Salário Jovem aprendiz', '2023-10-20', 'Roupas'),
(16, 10, 20000.00, 'Salario', '2023-10-27', 'Salário'),
(17, 10, 20000.00, 'Carro', '2023-10-10', 'Renda Extra'),
(18, 6, 2000.00, 'Carro', '2023-10-13', 'Outros'),
(20, 6, 1000000.00, 'Lanche', '2023-10-17', 'Salário'),
(21, 6, 2550.50, 'roubo à banco', '2023-05-12', 'Renda Extra'),
(22, 6, 2550.50, 'roubo à banco', '2023-05-12', 'Renda Extra'),
(23, 11, 7000.00, 'Sálario', '2023-10-05', 'Salário'),
(24, 11, 50.00, 'Renda Fixa', '2023-09-06', 'Retorno Investimentos'),
(25, 11, 40.00, 'Renda Fixa CDB', '2023-06-16', 'Retorno Investimentos'),
(26, 11, 500.00, 'Torneiro Prêmio', '2023-07-14', 'Renda Extra'),
(27, 11, 250.00, 'Aposta no jogo do bixo', '2023-08-19', 'Outros');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod` int(3) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `tel` varchar(250) DEFAULT NULL,
  `sexo` varchar(100) DEFAULT NULL,
  `nasc` date DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `senha` varchar(250) DEFAULT NULL,
  `saldo` decimal(10,2) DEFAULT 0.00,
  `despesa` decimal(10,2) DEFAULT 0.00,
  `receita` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`cod`, `nome`, `tel`, `sexo`, `nasc`, `email`, `senha`, `saldo`, `despesa`, `receita`) VALUES
(5, 'ADM', '4390187414', 'masculino', '2023-09-13', 'adm@adm.com', '123', 0.00, 0.00, 0.00),
(6, 'João Vitor Rodrigues Santos', '51 997278160', 'masculino', '2004-01-05', 'joaovitorrodriguessantos8@gmail.com', '12345', 543974.00, 509520.00, 1053494.00),
(9, 'João Vitor Rodrigues Santos', '51997278160', 'masculino', '2004-01-05', 'joaovitor@email.com', '123', 1351.50, 1365.00, 2716.50),
(10, 'rogerio', '51997278160', 'masculino', '2023-10-11', 'test@test.com', '12345', 35000.00, 15000.00, 50000.00),
(11, 'Carlos Puyo', '923783923', 'masculino', '1980-02-01', 'CarlosProfessor@gmail.com', '12345', 884.80, 6955.20, 7840.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `despesa`
--
ALTER TABLE `despesa`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Índices de tabela `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `despesa`
--
ALTER TABLE `despesa`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `receita`
--
ALTER TABLE `receita`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `despesa`
--
ALTER TABLE `despesa`
  ADD CONSTRAINT `despesa_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod`);

--
-- Restrições para tabelas `receita`
--
ALTER TABLE `receita`
  ADD CONSTRAINT `receita_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
