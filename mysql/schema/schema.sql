-- Behaviour properties
SET time_zone = "+10:00";

-- Create database
CREATE DATABASE IF NOT EXISTS `ifb102`;

-- Use created database
USE `ifb102`;

-- Create tables
-- API key store
CREATE TABLE IF NOT EXISTS `__api__keys` (
	`api_key` varchar(16) NOT NULL,
	`generated_at` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- more tables idk?
