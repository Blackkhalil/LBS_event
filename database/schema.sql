-- MySQL Script for LBS Event Management System
-- Version: 2.0
-- Date: 2024

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`super_admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `super_admin` (
  `idsuper_admin` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `prenom` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `mot_de_passe` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idsuper_admin`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL UNIQUE,
  `mot_de_passe` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idadmin`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`evenement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `evenement` (
  `idevenement` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `partenaire` VARCHAR(100) NOT NULL,
  `admin_idadmin` INT,
  `super_admin_idsuper_admin` INT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idevenement`),
  INDEX `fk_evenement_admin_idx` (`admin_idadmin`),
  INDEX `fk_evenement_super_admin_idx` (`super_admin_idsuper_admin`),
  CONSTRAINT `fk_evenement_admin`
    FOREIGN KEY (`admin_idadmin`)
    REFERENCES `admin` (`idadmin`)
    ON DELETE SET NULL,
  CONSTRAINT `fk_evenement_super_admin`
    FOREIGN KEY (`super_admin_idsuper_admin`)
    REFERENCES `super_admin` (`idsuper_admin`)
    ON DELETE SET NULL
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `categorie` (
  `idcategorie` INT NOT NULL AUTO_INCREMENT,
  `nom_evenement` VARCHAR(100) NOT NULL,
  `evenement_idevenement` INT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcategorie`),
  INDEX `fk_categorie_evenement_idx` (`evenement_idevenement`),
  CONSTRAINT `fk_categorie_evenement`
    FOREIGN KEY (`evenement_idevenement`)
    REFERENCES `evenement` (`idevenement`)
    ON DELETE CASCADE
) ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Insert Default Super Admin (Password: admin123)
-- -----------------------------------------------------
-- Password hash for 'admin123': $2y$10$rIvHh0jmWDdX8KzP6YzF/.kFJ6hZ8KzXx5QJZsQ0v4YwQ8N0bH2JG
INSERT INTO `super_admin` (`nom`, `prenom`, `email`, `mot_de_passe`) 
VALUES ('Admin', 'Super', 'super@admin.com', '$2y$10$rIvHh0jmWDdX8KzP6YzF/.kFJ6hZ8KzXx5QJZsQ0v4YwQ8N0bH2JG')
ON DUPLICATE KEY UPDATE nom=nom;

-- Commit
-- COMMIT;
