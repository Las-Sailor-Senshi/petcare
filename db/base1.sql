-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema petcare_db
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `petcare_db` ;

-- -----------------------------------------------------
-- Schema petcare_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `petcare_db` ;
USE `petcare_db` ;

-- -----------------------------------------------------
-- Table `petcare_db`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petcare_db`.`Usuarios` (
  `usr_idUsuario` INT UNSIGNED NOT NULL,
  `usr_nickname` VARCHAR(45) NOT NULL,
  `usr_nomUsuario` VARCHAR(45) NOT NULL,
  `usr_apUsuario` VARCHAR(45) NOT NULL,
  `usr_amUsuario` VARCHAR(45) NOT NULL,
  `usr_tipoUsuario` INT(1) UNSIGNED NOT NULL,
  `usr_correo` VARCHAR(45) NOT NULL,
  `usr_contraseña` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`usr_idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `petcare_db`.`Categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petcare_db`.`Categorias` (
  `cat_idCategoria` INT UNSIGNED NOT NULL,
  `cat_nomCategoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cat_idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `petcare_db`.`Productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petcare_db`.`Productos` (
  `prod_idProducto` INT(10) UNSIGNED NOT NULL,
  `prod_idcategoria` INT UNSIGNED NOT NULL,
  `prod_nomProducto` VARCHAR(100) NOT NULL,
  `prod_precioProducto` FLOAT UNSIGNED NOT NULL,
  `prod_stock` INT UNSIGNED NOT NULL,
  `prod_descripcion` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`prod_idProducto`),
  INDEX `categoria` (`prod_idcategoria` ASC),
  CONSTRAINT `categoria`
    FOREIGN KEY (`prod_idcategoria`)
    REFERENCES `petcare_db`.`Categorias` (`cat_idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `petcare_db`.`Carritos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petcare_db`.`Carritos` (
  `carr_idCarrito` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `carr_idUsuario` INT UNSIGNED NOT NULL,
  `carr_idProducto` INT(10) UNSIGNED NOT NULL,
  `carr_Cantidad` INT(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`carr_idCarrito`),
  INDEX `idUsuario_idx` (`carr_idUsuario` ASC),
  INDEX `idProducto_idx` (`carr_idProducto` ASC),
  CONSTRAINT `idUsuario`
    FOREIGN KEY (`carr_idUsuario`)
    REFERENCES `petcare_db`.`Usuarios` (`usr_idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idProducto`
    FOREIGN KEY (`carr_idProducto`)
    REFERENCES `petcare_db`.`Productos` (`prod_idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `petcare_db`.`Direcciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petcare_db`.`Direcciones` (
  `dir_idDireccion` INT UNSIGNED NOT NULL,
  `dir_idUsuario` INT UNSIGNED NOT NULL,
  `dir_calleNum` VARCHAR(100) NOT NULL,
  `dir_colonia` VARCHAR(100) NOT NULL,
  `dir_delMpio` VARCHAR(100) NOT NULL COMMENT 'Delegación o municipio',
  `dir_ciudad` VARCHAR(100) NOT NULL,
  `dir_estado` VARCHAR(100) NOT NULL,
  `dir_codigoPostal` INT(5) UNSIGNED NOT NULL,
  `dir_telefono_1` VARCHAR(15) NOT NULL,
  `dir_telefono_2` VARCHAR(15) NULL,
  PRIMARY KEY (`dir_idDireccion`),
  INDEX `fk_Direcciones_Usuarios1_idx` (`dir_idUsuario` ASC),
  CONSTRAINT `idUsuarios`
    FOREIGN KEY (`dir_idUsuario`)
    REFERENCES `petcare_db`.`Usuarios` (`usr_idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'en dirección no pongo país, va a ser siempre méxico xd\n';


-- -----------------------------------------------------
-- Table `petcare_db`.`Ordenes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petcare_db`.`Ordenes` (
  `ord_idOrden` INT UNSIGNED NOT NULL,
  `ord_idDireccion` INT UNSIGNED NOT NULL,
  `ord_fecha` DATETIME NOT NULL,
  `ord_estatus` ENUM('Por pagar', 'Pagado', 'Procesando', 'En Camino', 'Entregado') NOT NULL DEFAULT 'Por pagar',
  `ord_numGuia` VARCHAR(30) NULL,
  `ord_montoTotal` FLOAT UNSIGNED NOT NULL,
  PRIMARY KEY (`ord_idOrden`),
  INDEX `idDireccion_idx` (`ord_idDireccion` ASC),
  CONSTRAINT `idDireccion`
    FOREIGN KEY (`ord_idDireccion`)
    REFERENCES `petcare_db`.`Direcciones` (`dir_idDireccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Borro idUsuario aquí porque ya está en direcciones.';


-- -----------------------------------------------------
-- Table `petcare_db`.`Envio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petcare_db`.`Envio` (
  `idEnvio` INT UNSIGNED NOT NULL,
  `numGuia` VARCHAR(30) NULL,
  `estatus` ENUM('Por pagar', 'Pagado', 'Procesando', 'En Camino', 'Entregado') NOT NULL DEFAULT 'Por pagar',
  PRIMARY KEY (`idEnvio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `petcare_db`.`DetallesOrden`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petcare_db`.`DetallesOrden` (
  `det_idDetalleOrden` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `det_idOrden` INT UNSIGNED NOT NULL,
  `det_idProducto` INT(10) UNSIGNED NOT NULL,
  `det_cantidad` INT UNSIGNED NOT NULL,
  `det_monto` FLOAT UNSIGNED NOT NULL,
  PRIMARY KEY (`det_idDetalleOrden`),
  UNIQUE INDEX `idDetalleOrden_UNIQUE` (`det_idDetalleOrden` ASC),
  INDEX `fk_DetallesOrden_Productos1_idx` (`det_idProducto` ASC),
  CONSTRAINT `idOrden`
    FOREIGN KEY (`det_idOrden`)
    REFERENCES `petcare_db`.`Ordenes` (`ord_idOrden`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idProductos`
    FOREIGN KEY (`det_idProducto`)
    REFERENCES `petcare_db`.`Productos` (`prod_idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
