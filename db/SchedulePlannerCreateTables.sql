-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema scheduleplanner
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema scheduleplanner
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `scheduleplanner` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `scheduleplanner` ;

-- -----------------------------------------------------
-- Table `scheduleplanner`.`course_prerequisites`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleplanner`.`course_prerequisites` (
  `PrerequisiteId` INT(11) NOT NULL,
  `CourseId` INT(11) NULL DEFAULT NULL,
  `PrerequisiteCourseId` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`PrerequisiteId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `scheduleplanner`.`course_sections`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleplanner`.`course_sections` (
  `CourseSectionId` INT(11) NOT NULL AUTO_INCREMENT,
  `CourseId` INT(11) NULL DEFAULT NULL,
  `Section` VARCHAR(45) NULL DEFAULT NULL,
  `Type` VARCHAR(45) NULL DEFAULT NULL,
  `DaysOffered` VARCHAR(45) NULL DEFAULT NULL,
  `StartTime` VARCHAR(45) NULL DEFAULT NULL,
  `EndTime` VARCHAR(45) NULL DEFAULT NULL,
  `Room` VARCHAR(45) NULL DEFAULT NULL,
  `Intructor` VARCHAR(45) NULL DEFAULT NULL,
  `Semester` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`CourseSectionId`))
ENGINE = InnoDB
AUTO_INCREMENT = 56
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `scheduleplanner`.`courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleplanner`.`courses` (
  `CourseId` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL DEFAULT NULL,
  `Credits` INT(11) NULL DEFAULT NULL,
  `Title` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`CourseId`))
ENGINE = InnoDB
AUTO_INCREMENT = 48
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `scheduleplanner`.`program_courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleplanner`.`program_courses` (
  `ProgramCourseId` INT(11) NOT NULL AUTO_INCREMENT,
  `ProgramId` INT(11) NULL DEFAULT NULL,
  `CourseId` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`ProgramCourseId`))
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `scheduleplanner`.`programs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scheduleplanner`.`programs` (
  `ProgramId` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL DEFAULT NULL,
  `DegreeType` VARCHAR(45) NULL DEFAULT NULL,
  `Concentration` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`ProgramId`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
