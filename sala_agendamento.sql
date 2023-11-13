-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.27-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.2.0.6576
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para sistema_agendamento
CREATE DATABASE IF NOT EXISTS `sistema_agendamento` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `sistema_agendamento`;

-- Copiando estrutura para tabela sistema_agendamento.agendamentos
CREATE TABLE IF NOT EXISTS `agendamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sala_id` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `horario_inicio` time DEFAULT NULL,
  `horario_fim` time DEFAULT NULL,
  `setor` varchar(15) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `controle` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `sala_id` (`sala_id`),
  CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`sala_id`) REFERENCES `salas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sistema_agendamento.agendamentos: ~11 rows (aproximadamente)
INSERT INTO `agendamentos` (`id`, `sala_id`, `data`, `horario_inicio`, `horario_fim`, `setor`, `tipo`, `usuario`, `controle`) VALUES
	(1, 1, '2023-07-11', '08:30:00', '10:30:00', 'TI', '', 'Fabio Cezar', '2023-07-10 16:50:39'),
	(2, 1, '2023-07-11', '16:00:00', '17:00:00', 'Fabio Cezar', 'TI', '', '2023-07-10 17:00:20'),
	(3, 1, '2023-07-11', '11:00:00', '12:00:00', 'Fabio Cezar', 'TI', '', '2023-07-10 17:02:43'),
	(4, 1, '2023-07-12', '08:30:00', '09:30:00', 'TI', 'reuniao', 'Fabio Cezar', '2023-07-10 17:05:25'),
	(5, 1, '2023-07-12', '10:00:00', '11:00:00', 'TI', 'Evento', 'Fabio Cezar', '2023-07-10 17:06:25'),
	(6, 1, '2023-07-12', '15:30:00', '16:30:00', 'RH', 'Seleção', 'Aline Macedo', '2023-07-11 08:32:01'),
	(7, 1, '2023-07-13', '10:00:00', '12:00:00', 'RH', 'Seleção', 'Aline Macedo', '2023-07-11 08:33:00'),
	(8, 1, '2023-07-13', '16:00:00', '17:00:00', 'RH', 'Seleção', 'Barbara', '2023-07-11 08:34:02'),
	(9, 1, '2023-07-11', '07:30:00', '08:20:00', 'TI', 'Treinamento', 'Fabio Cezar', '2023-07-11 09:11:32'),
	(10, 1, '2023-07-14', '09:00:00', '11:00:00', 'RH', 'Seleção', 'Aline Macedo', '2023-07-11 10:01:16'),
	(11, 1, '2023-08-12', '08:30:00', '10:30:00', 'Jurídico', 'Treinamento', 'Fabio Cezar', '2023-07-12 08:21:33'),
	(12, 1, '2023-07-14', '11:01:00', '12:00:00', 'RH', 'Seleção', 'Aline Macêdo', '2023-07-12 10:23:55'),
	(13, 1, '2023-07-14', '15:00:00', '16:00:00', 'RH', 'Reunião', 'Aline Macêdo', '2023-07-12 10:24:52'),
	(14, 1, '2023-07-14', '17:30:00', '18:30:00', 'Administrativo', 'Reunião', 'Fabio Cezar', '2023-07-12 10:31:03');

-- Copiando estrutura para tabela sistema_agendamento.salas
CREATE TABLE IF NOT EXISTS `salas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `capacidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sistema_agendamento.salas: ~2 rows (aproximadamente)
INSERT INTO `salas` (`id`, `nome`, `capacidade`) VALUES
	(1, 'Sala Treinamento', 30),
	(2, 'Sala Reunião', 10);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
