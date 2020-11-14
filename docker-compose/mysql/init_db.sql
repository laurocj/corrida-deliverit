/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para corrida-deliverit
DROP DATABASE IF EXISTS `corrida-deliverit`;
CREATE DATABASE IF NOT EXISTS `corrida-deliverit` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `corrida-deliverit`;

-- Copiando estrutura para tabela corrida-deliverit.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela corrida-deliverit.migrations: ~3 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2020_11_11_212049_create_partcipants_table', 1),
	(2, '2020_11_11_212740_create_racings_table', 1),
	(3, '2020_11_11_212901_create_race_participants_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela corrida-deliverit.participants
DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela corrida-deliverit.participants: ~0 rows (aproximadamente)
DELETE FROM `participants`;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` (`id`, `name`, `cpf`, `birth`, `created_at`, `updated_at`) VALUES
	(1, 'Allison Ramos Bittencourt', '095.758.192-09', '1966-11-14', '2020-11-14 15:50:51', '2020-11-14 15:50:51'),
	(2, 'Dr. Alexandre Salazar Matias', '167.399.979-42', '1980-11-14', '2020-11-14 15:50:51', '2020-11-14 15:50:51'),
	(3, 'Suzana Correia', '736.604.786-44', '1976-11-14', '2020-11-14 15:50:51', '2020-11-14 15:50:51'),
	(4, 'Sr. Felipe Daniel Valdez', '740.852.976-43', '1977-11-14', '2020-11-14 15:50:51', '2020-11-14 15:50:51'),
	(5, 'Giovane Ávila Filho', '454.958.048-80', '1983-11-14', '2020-11-14 15:50:51', '2020-11-14 15:50:51'),
	(6, 'Sra. Sofia Bianca Padrão', '027.692.774-56', '1977-11-14', '2020-11-14 15:50:51', '2020-11-14 15:50:51'),
	(7, 'Srta. Irene Sabrina Torres Sobrinho', '401.855.356-07', '1998-11-14', '2020-11-14 15:50:51', '2020-11-14 15:50:51'),
	(8, 'Sr. Ricardo Camacho', '263.085.381-08', '2002-11-14', '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(9, 'Srta. Madalena Pereira Abreu Jr.', '980.244.999-75', '1970-11-14', '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(10, 'Jácomo Verdara Furtado Filho', '653.520.415-49', '1969-11-14', '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(11, 'Dr. Emílio Furtado Neto', '411.096.239-09', '1970-11-14', '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(12, 'Sérgio Pereira Leon', '237.079.202-75', '1973-11-14', '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(13, 'Srta. Helena Gonçalves da Rosa', '119.318.816-42', '1966-11-14', '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(14, 'Srta. Nicole Amanda Ferreira Sobrinho', '686.572.791-69', '1962-11-14', '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(15, 'Hortência Abreu', '587.149.933-33', '2000-11-14', '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(16, 'Dr. Paulo Reis Jr.', '421.885.727-00', '1989-11-14', '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(17, 'Dr. Abril Verdugo Verdugo Filho', '305.654.000-37', '1969-11-14', '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(18, 'Dr. Everton Cervantes Vila Jr.', '275.865.159-99', '1968-11-14', '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(19, 'Santiago Valdez', '919.660.969-92', '1994-11-14', '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(20, 'Christian Luis Mascarenhas Jr.', '688.082.325-49', '1962-11-14', '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(21, 'Sr. Hernani Colaço Toledo', '374.262.342-74', '1978-11-14', '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(22, 'Srta. Abril Torres Quintana', '584.432.079-49', '1997-11-14', '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(23, 'Srta. Joana Tessália Ferreira', '097.469.991-84', '1993-11-14', '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(24, 'Bianca Abgail Saraiva', '875.779.903-29', '1990-11-14', '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(25, 'Dr. Felipe Ortega Zaragoça Filho', '071.232.141-10', '1962-11-14', '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(26, 'Isaac Noel Toledo', '687.587.140-81', '1972-11-14', '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(27, 'Alexandre Bruno Fidalgo Neto', '791.735.585-32', '1962-11-14', '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(28, 'Amélia Escobar', '785.476.121-30', '1996-11-14', '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(29, 'Sr. Emanuel Martinho Barreto', '357.249.443-59', '1973-11-14', '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(30, 'Sr. Valentin Martines', '083.842.435-06', '1983-11-14', '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(31, 'Dr. Agostinho Dominato', '968.720.094-46', '1977-11-14', '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(32, 'Giovane Correia Queirós Neto', '344.356.171-37', '1973-11-14', '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(33, 'Diego Gustavo Queirós Jr.', '350.992.212-38', '1974-11-14', '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(34, 'Srta. Natália Bonilha Ramos Sobrinho', '829.205.837-00', '1980-11-14', '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(35, 'Sr. Mário Sepúlveda Sobrinho', '989.881.934-07', '1966-11-14', '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(36, 'Giovana Alexa Pena Sobrinho', '544.147.092-53', '1980-11-14', '2020-11-14 15:50:54', '2020-11-14 15:50:54');
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;

-- Copiando estrutura para tabela corrida-deliverit.race_participants
DROP TABLE IF EXISTS `race_participants`;
CREATE TABLE IF NOT EXISTS `race_participants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `start` time DEFAULT NULL,
  `finish` time DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `participant_id` bigint(20) unsigned NOT NULL,
  `racing_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `race_participants_participant_id_foreign` (`participant_id`),
  KEY `race_participants_racing_id_foreign` (`racing_id`),
  CONSTRAINT `race_participants_participant_id_foreign` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`),
  CONSTRAINT `race_participants_racing_id_foreign` FOREIGN KEY (`racing_id`) REFERENCES `racings` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela corrida-deliverit.race_participants: ~0 rows (aproximadamente)
DELETE FROM `race_participants`;
/*!40000 ALTER TABLE `race_participants` DISABLE KEYS */;
INSERT INTO `race_participants` (`id`, `start`, `finish`, `duration`, `participant_id`, `racing_id`, `created_at`, `updated_at`) VALUES
	(1, '08:00:00', '09:36:00', '01:36:00', 1, 1, '2020-11-14 15:50:51', '2020-11-14 15:50:51'),
	(2, '08:00:00', '09:56:00', '01:56:00', 2, 1, '2020-11-14 15:50:51', '2020-11-14 15:50:51'),
	(3, '08:00:00', '09:58:00', '01:58:00', 3, 1, '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(4, '08:00:00', '09:10:00', '01:10:00', 4, 1, '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(5, '08:00:00', '09:19:00', '01:19:00', 5, 1, '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(6, '08:00:00', '09:30:00', '01:30:00', 6, 1, '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(7, '08:00:00', '09:15:00', '01:15:00', 7, 1, '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(8, '08:00:00', '09:42:00', '01:42:00', 8, 2, '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(9, '08:00:00', '09:34:00', '01:34:00', 9, 2, '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(10, '08:00:00', '09:43:00', '01:43:00', 10, 2, '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(11, '08:00:00', '09:46:00', '01:46:00', 11, 2, '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(12, '08:00:00', '09:59:00', '01:59:00', 12, 2, '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(13, '08:00:00', '09:56:00', '01:56:00', 13, 2, '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(14, '08:00:00', '09:41:00', '01:41:00', 14, 2, '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(15, '08:00:00', '09:09:00', '01:09:00', 15, 3, '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(16, '08:00:00', '09:39:00', '01:39:00', 16, 3, '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(17, '08:00:00', '09:09:00', '01:09:00', 17, 3, '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(18, '08:00:00', '09:25:00', '01:25:00', 18, 3, '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(19, '08:00:00', '09:09:00', '01:09:00', 19, 3, '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(20, '08:00:00', '09:21:00', '01:21:00', 20, 3, '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(21, '08:00:00', '09:17:00', '01:17:00', 21, 3, '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(22, '08:00:00', '09:31:00', '01:31:00', 22, 4, '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(23, '08:00:00', '09:43:00', '01:43:00', 23, 4, '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(24, '08:00:00', '09:15:00', '01:15:00', 24, 4, '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(25, '08:00:00', '09:37:00', '01:37:00', 25, 4, '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(26, '08:00:00', '09:03:00', '01:03:00', 26, 4, '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(27, '08:00:00', '09:49:00', '01:49:00', 27, 4, '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(28, '08:00:00', '09:56:00', '01:56:00', 28, 4, '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(29, '08:00:00', '09:37:00', '01:37:00', 29, 5, '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(30, '08:00:00', '09:27:00', '01:27:00', 30, 5, '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(31, '08:00:00', '09:13:00', '01:13:00', 31, 5, '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(32, '08:00:00', '09:27:00', '01:27:00', 32, 5, '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(33, '08:00:00', '09:50:00', '01:50:00', 33, 5, '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(34, '08:00:00', '09:43:00', '01:43:00', 34, 5, '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(35, '08:00:00', '09:44:00', '01:44:00', 35, 5, '2020-11-14 15:50:54', '2020-11-14 15:50:54'),
	(36, '08:00:00', '09:18:00', '01:18:00', 36, 5, '2020-11-14 15:50:55', '2020-11-14 15:50:55');
/*!40000 ALTER TABLE `race_participants` ENABLE KEYS */;

-- Copiando estrutura para tabela corrida-deliverit.racings
DROP TABLE IF EXISTS `racings`;
CREATE TABLE IF NOT EXISTS `racings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `distance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela corrida-deliverit.racings: ~0 rows (aproximadamente)
DELETE FROM `racings`;
/*!40000 ALTER TABLE `racings` DISABLE KEYS */;
INSERT INTO `racings` (`id`, `distance`, `date`, `created_at`, `updated_at`) VALUES
	(1, '5', '2020-11-20', '2020-11-14 15:50:51', '2020-11-14 15:50:51'),
	(2, '2', '2020-12-07', '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(3, '1', '2020-11-18', '2020-11-14 15:50:52', '2020-11-14 15:50:52'),
	(4, '5', '2020-12-10', '2020-11-14 15:50:53', '2020-11-14 15:50:53'),
	(5, '3', '2020-12-06', '2020-11-14 15:50:54', '2020-11-14 15:50:54');
/*!40000 ALTER TABLE `racings` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
