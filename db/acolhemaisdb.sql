CREATE DATABASE IF NOT EXISTS `acolhemaisdb`;
USE `acolhemaisdb`;

CREATE TABLE IF NOT EXISTS `accounts` (
    `name` VARCHAR(50),
    `company` VARCHAR(50) NOT NULL,
	`cnpj` CHAR(14) NOT NULL,
    `address` VARCHAR(50)NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `pass` VARCHAR(12) NOT NULL,
    `telephone` VARCHAR(11) NOT NULL,
	`profile_image` BLOB,
	PRIMARY KEY (`cnpj`)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `chat_messages` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `cnpj` CHAR(14) NOT NULL,
    `message` TEXT NOT NULL,
    `images` LONGBLOB,
    `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`cnpj`) REFERENCES `accounts`(`cnpj`)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `budget` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `cnpj` CHAR(14) NOT NULL,
    `service` VARCHAR(255) NOT NULL,
    `status` CHAR(1) NOT NULL,
    FOREIGN KEY (`cnpj`) REFERENCES `accounts`(`cnpj`)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `financial` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `paymentmethod` CHAR(1) NOT NULL,
    `paymentstatus` CHAR(1) NOT NULL,
    FOREIGN KEY (`id`) REFERENCES `budget`(`id`)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `feedbacks` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `cnpj` CHAR(14) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `message` TEXT NOT NULL,
    FOREIGN KEY (`cnpj`) REFERENCES `accounts`(`cnpj`)
)ENGINE=InnoDB;

INSERT INTO `accounts` (`name`, `company`, `cnpj`, `address`, `email`, `pass`, `telephone`, `profile_image`)
VALUES (NULL, 'bla', '22245678222198', 'rua dali', 'joao@email.com', 'joao1234', '11991160368', NULL);

select * from `accounts`;


