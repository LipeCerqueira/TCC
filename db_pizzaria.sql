-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/07/2023 às 20:28
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_pizzaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL COMMENT 'Nome do administrador',
  `email` varchar(300) NOT NULL COMMENT 'E-mail do administrador',
  `senha` varchar(300) NOT NULL COMMENT 'senha em sha256',
  `datahora` datetime NOT NULL COMMENT 'data e hora do registro',
  `poder` int(1) NOT NULL COMMENT 'Abrangência do usuário no sistema',
  `status` int(1) NOT NULL COMMENT '1-ativo; 0- inativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `email`, `senha`, `datahora`, `poder`, `status`) VALUES
(1, 'Felipe Cerqueira', 'felipe@pizza.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2023-07-04 11:23:40', 9, 1),
(2, 'Astrubol Flores', 'astrubol@pizza.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2023-07-05 15:42:19', 5, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `folder` varchar(1) NOT NULL COMMENT 'pasta onde se encontra a página',
  `nome` varchar(300) NOT NULL COMMENT 'Nome do menu/link',
  `url` varchar(300) NOT NULL COMMENT 'Url dstino do LInk',
  `datahora` datetime NOT NULL COMMENT 'Data e hora do registro',
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `menu`
--

INSERT INTO `menu` (`id`, `folder`, `nome`, `url`, `datahora`, `status`) VALUES
(1, 'v', 'Pizzas', 'pizzas.php', '2023-07-12 15:42:15', 1),
(2, 'r', 'Pizzas', 'view/pizzas.php', '2023-07-12 15:42:16', 1),
(3, 'v', 'Bebidas', 'bebidas.php', '2023-07-12 15:42:44', 1),
(4, 'r', 'Bebidas', 'view/bebidas.php', '2023-07-12 15:42:44', 1),
(7, 'v', 'Produtos', 'produtos.php', '2023-07-12 15:44:50', 1),
(8, 'r', 'Produtos', 'view/produtos.php', '2023-07-12 15:44:50', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pizzas`
--

CREATE TABLE `pizzas` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL COMMENT 'Nome da Pizza',
  `ingredientes` varchar(600) NOT NULL COMMENT 'Ingredientes',
  `preco_med` decimal(10,2) NOT NULL COMMENT 'Pre?o da pizza media',
  `preco_gra` decimal(10,2) NOT NULL COMMENT 'Pre?o da pizza grande',
  `doce_salgado` int(1) NOT NULL COMMENT 'Salgado: 0; Doce: 1',
  `promocao` int(1) NOT NULL COMMENT 'padr?o: 0; promo??o: 1',
  `desc_promocao` int(2) NOT NULL COMMENT 'Desconto de promo??o em %',
  `novidade` int(1) NOT NULL COMMENT 'padr?o n?o: 0; novidade: 1',
  `img_peq` varchar(80) NOT NULL COMMENT 'Imagem pequena',
  `img_med` varchar(80) NOT NULL COMMENT 'Imagem media',
  `img_gra` varchar(80) NOT NULL COMMENT 'Imagem grande',
  `carousel` int(1) NOT NULL COMMENT 'padr?o n?o: 0; sim: 1',
  `datahora` datetime NOT NULL COMMENT 'data e hora do registro YYYY-MM-DD HH:MM:SS',
  `status` int(1) NOT NULL COMMENT '1 - ativo; 0 - inativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `submenu`
--

CREATE TABLE `submenu` (
  `id` int(11) NOT NULL,
  `folder` varchar(1) NOT NULL COMMENT 'pasta onde se encontra a página',
  `idmenu` int(3) NOT NULL COMMENT 'id da tabela menu',
  `nomesub` varchar(300) NOT NULL COMMENT 'nome do link',
  `url` varchar(300) NOT NULL COMMENT 'Url do LInk',
  `datahora` datetime NOT NULL COMMENT 'Data e hora do registro',
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `submenu`
--

INSERT INTO `submenu` (`id`, `folder`, `idmenu`, `nomesub`, `url`, `datahora`, `status`) VALUES
(1, 'v', 1, 'Promoção', 'promocao.php?prod=pizzas', '2023-07-12 15:42:33', 0),
(2, 'r', 2, 'Promoção', 'view/promocao.php?prod=pizzas', '2023-07-12 15:42:33', 1),
(3, 'v', 3, 'Promoção', 'promocao.php?prod=bebidas', '2023-07-12 15:43:02', 1),
(4, 'r', 4, 'Promoção', 'view/promocao.php?prod=bebidas', '2023-07-12 15:43:02', 1),
(7, 'v', 7, 'Promoção', 'promocao.php?prod=produtos', '2023-07-12 15:45:06', 1),
(8, 'r', 8, 'Promoção', 'view/promocao.php?prod=produtos', '2023-07-12 15:45:06', 1),
(9, 'v', 1, 'Novidades', 'novidades.php?prod=pizzas', '2023-07-12 17:12:32', 1),
(10, 'r', 2, 'Novidades', 'view/novidades.php?prod=pizzas', '2023-07-12 17:12:32', 1),
(11, 'v', 3, 'Novidades', 'novidades.php?prod=bebidas', '2023-07-12 17:13:26', 1),
(12, 'r', 4, 'Novidades', 'view/novidades.php?prod=bebidas', '2023-07-12 17:13:26', 1),
(13, 'v', 7, 'Novidades', 'novidades.php?prod=produtos', '2023-07-12 17:13:50', 1),
(14, 'r', 8, 'Novidades', 'view/novidades.php?prod=produtos', '2023-07-12 17:13:50', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmenu` (`idmenu`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `submenu_ibfk_1` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
