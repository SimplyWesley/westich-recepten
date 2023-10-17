-- Login database creation

USE `recipes`;

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
	id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(100) NOT NULL,
    Password VARCHAR(100) NOT NULL
);