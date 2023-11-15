-- phpMyAdmin SQL Dump

-- version 4.5.4.1deb2ubuntu2

-- http://www.phpmyadmin.net

--

-- Client :  localhost

-- Généré le :  Jeu 26 Octobre 2017 à 13:53

-- Version du serveur :  5.7.19-0ubuntu0.16.04.1

-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Base de données :  `simple-mvc`

--

-- --------------------------------------------------------

--

-- Structure de la table `item`
--


CREATE TABLE
    `item` (
        `id` int(11) UNSIGNED NOT NULL,
        `title` varchar(255) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE
    IF NOT EXISTS `Category` (
        `id` INT NOT NULL,
        `Name` VARCHAR(45) NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;

-- -----------------------------------------------------

-- Table `Article`

-- -----------------------------------------------------

CREATE TABLE
    IF NOT EXISTS `Article` (
        `id` INT NOT NULL,
        `Name` VARCHAR(100) NULL,
        `Image` VARCHAR(200) NULL,
        `Color` VARCHAR(45) NULL,
        `Price` FLOAT NULL,
        `Position` INT NULL,
        `Categories_id` INT NOT NULL,
        PRIMARY KEY (`id`),
        INDEX `fk_Article_Categories1_idx` (`Categories_id` ASC) VISIBLE,
        CONSTRAINT `fk_Article_Categories1` FOREIGN KEY (`Categories_id`) REFERENCES `Category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
    ) ENGINE = InnoDB;

-- -----------------------------------------------------

-- Table `Bouquet`

-- -----------------------------------------------------

CREATE TABLE
    IF NOT EXISTS `Bouquet` (
        `id` INT NOT NULL,
        `Name` VARCHAR(70) NULL,
        `Price` FLOAT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;

-- -----------------------------------------------------

-- Table `Customer`

-- -----------------------------------------------------

CREATE TABLE
    IF NOT EXISTS `Customer` (
        `id` INT NOT NULL,
        `Firstname` VARCHAR(50) NULL,
        `Lastname` VARCHAR(50) NULL,
        `Adress` LONGTEXT NULL,
        `Number` VARCHAR(10) NULL,
        `Mail` VARCHAR(100) NULL,
        `Password` VARCHAR(50) NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;

-- -----------------------------------------------------

-- Table `Customer-Review`

-- -----------------------------------------------------

CREATE TABLE
    IF NOT EXISTS `Customer-Review` (
        `id` INT NOT NULL,
        `Message` LONGTEXT NULL,
        `Note` INT NULL,
        `Customers_id` INT NOT NULL,
        PRIMARY KEY (`id`, `Customers_id`),
        INDEX `fk_Customers Review_Customers1_idx` (`Customers_id` ASC) VISIBLE,
        CONSTRAINT `fk_Customers Review_Customers1` FOREIGN KEY (`Customers_id`) REFERENCES `Customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
    ) ENGINE = InnoDB;

-- -----------------------------------------------------

-- Table `Composition`

-- -----------------------------------------------------

CREATE TABLE
    IF NOT EXISTS `Composition` (
        `Article_id` INT NOT NULL,
        `Bouquet_id` INT NOT NULL,
        PRIMARY KEY (`Article_id`, `Bouquet_id`),
        INDEX `fk_Article_has_Bouquet_Bouquet1_idx` (`Bouquet_id` ASC) VISIBLE,
        INDEX `fk_Article_has_Bouquet_Article_idx` (`Article_id` ASC) VISIBLE,
        CONSTRAINT `fk_Article_has_Bouquet_Article` FOREIGN KEY (`Article_id`) REFERENCES `Article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
        CONSTRAINT `fk_Article_has_Bouquet_Bouquet1` FOREIGN KEY (`Bouquet_id`) REFERENCES `Bouquet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
    ) ENGINE = InnoDB;

-- -----------------------------------------------------

-- Table `Customer-Choice`

-- -----------------------------------------------------

CREATE TABLE
    IF NOT EXISTS `Customer-Choice` (
        `Bouquet_id` INT NOT NULL,
        `Customers_id` INT NOT NULL,
        PRIMARY KEY (`Bouquet_id`, `Customers_id`),
        INDEX `fk_Bouquet_has_Customers_Customers1_idx` (`Customers_id` ASC) VISIBLE,
        INDEX `fk_Bouquet_has_Customers_Bouquet1_idx` (`Bouquet_id` ASC) VISIBLE,
        CONSTRAINT `fk_Bouquet_has_Customers_Bouquet1` FOREIGN KEY (`Bouquet_id`) REFERENCES `Bouquet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
        CONSTRAINT `fk_Bouquet_has_Customers_Customers1` FOREIGN KEY (`Customers_id`) REFERENCES `Customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
    ) ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


--

-- Contenu de la table `item`

--

INSERT INTO
    `item` (`id`, `title`)
VALUES (1, 'Stuff'), (2, 'Doodads');

--

-- Index pour les tables exportées

--

CREATE TABLE IF NOT EXISTS `contact`(
  `id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `text` VARCHAR(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--

-- Index pour la table `item`

--

ALTER TABLE `item` ADD PRIMARY KEY (`id`);

--

-- AUTO_INCREMENT pour les tables exportées

--

--

-- AUTO_INCREMENT pour la table `item`

--


ALTER TABLE
    `item` MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

CREATE TABLE IF NOT EXISTS `sign`(
  `id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `userID` VARCHAR(40) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `firstname` VARCHAR(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` VARCHAR(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;