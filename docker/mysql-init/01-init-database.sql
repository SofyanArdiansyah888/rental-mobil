-- Create database if not exists
CREATE DATABASE IF NOT EXISTS simpati_trans CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Use the database
USE simpati_trans;

-- Import production database structure and data
-- This will be loaded from konj4576_rental.sql

-- Create chat_messages table for chat system
CREATE TABLE IF NOT EXISTS `chat_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `timestamp` (`timestamp`),
  KEY `is_admin` (`is_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample chat data
INSERT INTO `chat_messages` (`name`, `message`, `timestamp`, `is_admin`) VALUES
('Admin', 'Selamat datang di chat support Simpati Trans! Ada yang bisa kami bantu?', NOW(), 1),
('Admin', 'Kami siap membantu Anda dengan informasi rental mobil terbaik.', NOW(), 1);
