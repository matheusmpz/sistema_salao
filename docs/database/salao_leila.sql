-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para salao_leila
CREATE DATABASE IF NOT EXISTS `salao_leila` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `salao_leila`;

-- Copiando estrutura para tabela salao_leila.administrador
CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela salao_leila.administrador: ~1 rows (aproximadamente)
INSERT INTO `administrador` (`id`, `nome`, `telefone`, `senha`, `email`, `data_cadastro`, `ativo`) VALUES
	(1, 'Leila Souza', '555555555', 'admin123', 'leila@email.com', '2025-03-14 14:02:08', 0);

-- Copiando estrutura para tabela salao_leila.agendamentos
CREATE TABLE IF NOT EXISTS `agendamentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int DEFAULT NULL,
  `data_agendamento` datetime NOT NULL,
  `STATUS` enum('Pendente','Confirmado','Realizado','Cancelado') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Pendente',
  `data_solicitacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela salao_leila.agendamentos: ~6 rows (aproximadamente)
INSERT INTO `agendamentos` (`id`, `cliente_id`, `data_agendamento`, `STATUS`, `data_solicitacao`) VALUES
	(31, 4, '2025-03-19 00:00:00', 'Pendente', '2025-03-16 14:16:04'),
	(35, 3, '2025-03-25 00:00:00', 'Pendente', '2025-03-16 19:02:09'),
	(36, 3, '2025-03-17 00:00:00', 'Pendente', '2025-03-16 19:12:31'),
	(37, 2, '2025-03-19 00:00:00', 'Pendente', '2025-03-17 16:16:11'),
	(41, 6, '2025-03-28 00:00:00', 'Pendente', '2025-03-17 17:45:48'),
	(42, 6, '2025-04-02 00:00:00', 'Pendente', '2025-03-17 17:46:27');

-- Copiando estrutura para tabela salao_leila.agendamento_servicos
CREATE TABLE IF NOT EXISTS `agendamento_servicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agendamento_id` int DEFAULT NULL,
  `servico_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agendamento_id` (`agendamento_id`),
  KEY `servico_id` (`servico_id`),
  CONSTRAINT `agendamento_servicos_ibfk_1` FOREIGN KEY (`agendamento_id`) REFERENCES `agendamentos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `agendamento_servicos_ibfk_2` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela salao_leila.agendamento_servicos: ~6 rows (aproximadamente)
INSERT INTO `agendamento_servicos` (`id`, `agendamento_id`, `servico_id`) VALUES
	(24, 31, 1),
	(29, 35, 1),
	(30, 36, 3),
	(31, 37, 2),
	(35, 41, 1),
	(36, 42, 4);

-- Copiando estrutura para tabela salao_leila.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela salao_leila.clientes: ~4 rows (aproximadamente)
INSERT INTO `clientes` (`id`, `nome`, `telefone`, `senha`, `email`, `data_cadastro`) VALUES
	(2, 'João Oliveira', '987654321', '3d7fcc75ff6bfcbc40127078aa3760d5', 'joao@email.com', '2025-03-14 14:02:08'),
	(3, 'Matheus', '123456789', 'e7d80ffeefa212b7c5c55700e4f7193e', 'matheus@email.com', '2025-03-14 17:59:03'),
	(4, 'Lucas', '99999-9999', '25d55ad283aa400af464c76d713c07ad', 'lucas@email.com', '2025-03-16 14:44:11'),
	(6, 'Matheus Pereira Soares', '14997906348', 'e7614d62a71b71cb13e8f45d0b7e5713', 'matheus.psoares4@gmail.com', '2025-03-17 17:44:34');

-- Copiando estrutura para tabela salao_leila.servicos
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` varchar(136) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela salao_leila.servicos: ~4 rows (aproximadamente)
INSERT INTO `servicos` (`id`, `nome`, `preco`, `descricao`) VALUES
	(1, 'Corte de Cabelo Feminino', 65.00, 'Corte personalizado para cada tipo de cabelo, garantindo leveza, movimento e elegância.'),
	(2, 'Manicure', 50.00, 'Unhas bem cuidadas com esmaltação perfeita e acabamento impecável para um toque de sofisticação.'),
	(3, 'Corte de Cabelo Masculino', 35.00, 'Do clássico ao degradê, um corte impecável e alinhado às tendências para realçar seu estilo.'),
	(4, 'Hidratação', 120.00, 'Nutrição profunda para cabelos sedosos, brilhantes e saudáveis, restaurando a hidratação essencial dos fios.\n\n');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
