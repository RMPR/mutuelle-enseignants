-- MySQL Script generated by MySQL Workbench
-- Fri Dec 21 11:49:21 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mutuelle
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mutuelle
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mutuelle` DEFAULT CHARACTER SET utf8 ;
USE `mutuelle` ;

-- -----------------------------------------------------
-- Table `enseignant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mutuelle`.`enseignant` ;

CREATE TABLE IF NOT EXISTS `mutuelle`.`enseignant` (
  `idenseignant` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  `prenom` VARCHAR(50) NULL,
  `telephone` VARCHAR(25) NULL,
  `email` VARCHAR(45) NULL,
  `adresse` VARCHAR(45) NULL,
  `photo` VARCHAR(45) NULL,
  `dateinscription` VARCHAR(30) NULL,
  `pass` VARCHAR(45) NULL,
  PRIMARY KEY (`idenseignant`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `epargne`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mutuelle`.`epargne` ;

CREATE TABLE IF NOT EXISTS `mutuelle`.`epargne` (
  `idepargne` INT NOT NULL AUTO_INCREMENT,
  `montant` DECIMAL(10,2) NOT NULL,
  `session` VARCHAR(30) NULL,
  `enseignant_idenseignant` INT NOT NULL,
  PRIMARY KEY (`idepargne`, `enseignant_idenseignant`),
  INDEX `fk_epargne_enseignant_idx` (`enseignant_idenseignant` ASC),
  CONSTRAINT `fk_epargne_enseignant`
    FOREIGN KEY (`enseignant_idenseignant`)
    REFERENCES `mutuelle`.`enseignant` (`idenseignant`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fondsocial`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mutuelle`.`fondsocial` ;

CREATE TABLE IF NOT EXISTS `mutuelle`.`fondsocial` (
  `idfondsocial` INT NOT NULL AUTO_INCREMENT,
  `montant` VARCHAR(45) NOT NULL,
  `occasion` VARCHAR(100),
  `session` VARCHAR(30) NULL,
  `enseignant_idenseignant` INT NOT NULL,
  PRIMARY KEY (`idfondsocial`, `enseignant_idenseignant`),
  INDEX `fk_fondsocial_enseignant1_idx` (`enseignant_idenseignant` ASC),
  CONSTRAINT `fk_fondsocial_enseignant1`
    FOREIGN KEY (`enseignant_idenseignant`)
    REFERENCES `mutuelle`.`enseignant` (`idenseignant`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `emprunt`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mutuelle`.`emprunt` ;

CREATE TABLE IF NOT EXISTS `mutuelle`.`emprunt` (
  `idemprunt` INT NOT NULL AUTO_INCREMENT,
  `montant` DECIMAL(10,2) NOT NULL,
  `session` VARCHAR(30) NULL,
  `interet` DECIMAL(2,2) NULL,
  `databutoir` DATE NULL,
  `enseignant_idenseignant` INT NOT NULL,
  PRIMARY KEY (`idemprunt`, `enseignant_idenseignant`),
  INDEX `fk_emprunt_enseignant1_idx` (`enseignant_idenseignant` ASC),
  CONSTRAINT `fk_emprunt_enseignant1`
    FOREIGN KEY (`enseignant_idenseignant`)
    REFERENCES `mutuelle`.`enseignant` (`idenseignant`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `remboursement`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mutuelle`.`remboursement` ;

CREATE TABLE IF NOT EXISTS `mutuelle`.`remboursement` (
  `idremboursement` INT NOT NULL AUTO_INCREMENT,
  `session` VARCHAR(30) NOT NULL,
  `montant` DECIMAL(10,2) NOT NULL,
  `reste` DECIMAL(10,2) NULL,
  `enseignant_idenseignant` INT NOT NULL,
  `emprunt_idemprunt` INT NOT NULL,
  `emprunt_enseignant_idenseignant` INT NOT NULL,
  PRIMARY KEY (`idremboursement`, `enseignant_idenseignant`, `emprunt_idemprunt`, `emprunt_enseignant_idenseignant`),
  INDEX `fk_remboursement_enseignant1_idx` (`enseignant_idenseignant` ASC),
  INDEX `fk_remboursement_emprunt1_idx` (`emprunt_idemprunt` ASC, `emprunt_enseignant_idenseignant` ASC),
  CONSTRAINT `fk_remboursement_enseignant1`
    FOREIGN KEY (`enseignant_idenseignant`)
    REFERENCES `mutuelle`.`enseignant` (`idenseignant`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_remboursement_emprunt1`
    FOREIGN KEY (`emprunt_idemprunt` , `emprunt_enseignant_idenseignant`)
    REFERENCES `mutuelle`.`emprunt` (`idemprunt` , `enseignant_idenseignant`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
