/*
Created: 07/06/2018
Modified: 07/06/2018
Model: MySQL 5.7
Database: MySQL 5.7
*/


-- Create tables section -------------------------------------------------

-- Table client

CREATE TABLE `client`
(
  `id` Bigint NOT NULL AUTO_INCREMENT,
  `name` Varchar(50) NOT NULL,
  `email` Varchar(50) NOT NULL,
  `password` Varchar(20) NOT NULL,
  `birth` Date NOT NULL,
  `street` Varchar(20) NOT NULL,
  `number` Varchar(10) NOT NULL,
  `state` Varchar(20) NOT NULL,
  `complement` Varchar(20) NOT NULL,
  `country_id` Bigint NOT NULL,
  PRIMARY KEY (`id`)
)
;

CREATE INDEX `client_country_relationship` ON `client` (`country_id`)
;

ALTER TABLE `client` ADD UNIQUE `email` (`email`)
;

-- Table country

CREATE TABLE `country`
(
  `id` Bigint NOT NULL AUTO_INCREMENT,
  `name` Varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
)
;

-- Table game

CREATE TABLE `game`
(
  `id` Bigint NOT NULL AUTO_INCREMENT,
  `name` Varchar(20) NOT NULL,
  `release_date` Date NOT NULL,
  `recommended_age` Bigint NOT NULL,
  `price` Double NOT NULL,
  `description` Varchar(255) NOT NULL,
  `company_id` Bigint NOT NULL,
  PRIMARY KEY (`id`)
)
;

CREATE INDEX `game_company_relationship` ON `game` (`company_id`)
;

ALTER TABLE `game` ADD UNIQUE `name` (`name`)
;

-- Table company

CREATE TABLE `company`
(
  `id` Bigint NOT NULL AUTO_INCREMENT,
  `name` Varchar(50) NOT NULL,
  `country_id` Bigint NOT NULL,
  PRIMARY KEY (`id`)
)
;

CREATE INDEX `company_country_relationship` ON `company` (`country_id`)
;

-- Table client_game

CREATE TABLE `client_game`
(
  `id` Bigint NOT NULL AUTO_INCREMENT,
  `client_id` Bigint NOT NULL,
  `game_id` Bigint NOT NULL,
  `date` Date NOT NULL,
  `total_price` Double NOT NULL,
  `payment_type` Bigint NOT NULL,
  PRIMARY KEY (`id`)
)
;

-- Create foreign keys (relationships) section ------------------------------------------------- 


ALTER TABLE `company` ADD CONSTRAINT `company_country` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
;


ALTER TABLE `client` ADD CONSTRAINT `client_country` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
;


ALTER TABLE `game` ADD CONSTRAINT `game_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
;


ALTER TABLE `client_game` ADD CONSTRAINT `game_client` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
;


ALTER TABLE `client_game` ADD CONSTRAINT `client_game` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
;


ALTER TABLE `company` ADD `money` DOUBLE NULL DEFAULT '0' AFTER `country_id`;