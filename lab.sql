CREATE DATABASE  IF NOT EXISTS `inv_lab` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `inv_lab`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: inv_lab
-- ------------------------------------------------------
-- Server version	5.7.10-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cartera_servicio`
--

DROP TABLE IF EXISTS `cartera_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cartera_servicio` (
  `COD_SER` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_SER` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESC_SER` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_servicio_COD_TIP` int(11) NOT NULL,
  PRIMARY KEY (`COD_SER`),
  KEY `fk_cartera_servicio_tipo_servicio1` (`tipo_servicio_COD_TIP`),
  CONSTRAINT `fk_cartera_servicio_tipo_servicio1` FOREIGN KEY (`tipo_servicio_COD_TIP`) REFERENCES `tipo_servicio` (`COD_TIP`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartera_servicio`
--

LOCK TABLES `cartera_servicio` WRITE;
/*!40000 ALTER TABLE `cartera_servicio` DISABLE KEYS */;
INSERT INTO `cartera_servicio` VALUES (3,'ORIASOIAS','DAOISAOIJ',3);
/*!40000 ALTER TABLE `cartera_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `COD_CAT` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_CAT` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESC_CAT` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `EST_CAT` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`COD_CAT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `circuito`
--

DROP TABLE IF EXISTS `circuito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `circuito` (
  `COD_CIR` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_CIR` varchar(50) CHARACTER SET utf8 NOT NULL,
  `DIR_CIR` varchar(100) CHARACTER SET utf8 NOT NULL,
  `EST_CIR` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`COD_CIR`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `circuito`
--

LOCK TABLES `circuito` WRITE;
/*!40000 ALTER TABLE `circuito` DISABLE KEYS */;
INSERT INTO `circuito` VALUES (1,'ROSAS','ROSS',1),(2,'ROSALES','ROSALES Y ANILLO VIAL',1),(3,'ASDSAD','ASD',1),(4,'SDFFDS','SDFSDF',1),(5,'SDADA','ASDA',1),(6,'SDADA','ASDA',1),(7,'ERE','RERE',1),(8,'SADSA','ASD',1),(9,'QUITO','SSSSSSSSSS',1),(10,'ASDS','OOO',1);
/*!40000 ALTER TABLE `circuito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kardex`
--

DROP TABLE IF EXISTS `kardex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kardex` (
  `DET_MAT` int(11) NOT NULL AUTO_INCREMENT,
  `EST_KAR` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'ESTADO INGRESO(I) EGRESO(E)',
  `FEC_ORD` date DEFAULT NULL COMMENT 'FECHA DE MOVIMIENTO PRODUCTOS',
  `CANTIDAD_PROD` int(11) DEFAULT NULL COMMENT 'CANTIDAD POR PEDIDO DE ORDEN',
  `DESC_ORD` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `COD_PROD` int(11) NOT NULL,
  PRIMARY KEY (`DET_MAT`),
  KEY `fk_kardex_producto1` (`COD_PROD`),
  CONSTRAINT `fk_kardex_producto1` FOREIGN KEY (`COD_PROD`) REFERENCES `producto` (`COD_PROD`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kardex`
--

LOCK TABLES `kardex` WRITE;
/*!40000 ALTER TABLE `kardex` DISABLE KEYS */;
/*!40000 ALTER TABLE `kardex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `COD_PER` int(11) NOT NULL AUTO_INCREMENT,
  `CED_PER` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NOM_PER` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `APE_PER` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DIR_PER` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `TEL_PER` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `COD_CIR` int(11) NOT NULL,
  `EST_PER` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`COD_PER`),
  UNIQUE KEY `COD_PER_UNIQUE` (`COD_PER`),
  UNIQUE KEY `CED_PER_UNIQUE` (`CED_PER`),
  KEY `fk_persona_circuito1` (`COD_CIR`),
  CONSTRAINT `fk_persona_circuito1` FOREIGN KEY (`COD_CIR`) REFERENCES `circuito` (`COD_CIR`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `COD_PROD` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_PROD` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CANT_PROD` int(11) DEFAULT NULL,
  `DESC_PROD` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FEC_CAD` date DEFAULT NULL,
  `COD_CAT` int(11) NOT NULL,
  PRIMARY KEY (`COD_PROD`),
  KEY `fk_producto_categoria1` (`COD_CAT`),
  CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`COD_CAT`) REFERENCES `categoria` (`COD_CAT`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_servicio`
--

DROP TABLE IF EXISTS `tipo_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_servicio` (
  `COD_TIP` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_TIP` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESC_TIP` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`COD_TIP`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_servicio`
--

LOCK TABLES `tipo_servicio` WRITE;
/*!40000 ALTER TABLE `tipo_servicio` DISABLE KEYS */;
INSERT INTO `tipo_servicio` VALUES (3,'EMATOLOGIA','SAJSOI');
/*!40000 ALTER TABLE `tipo_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'inv_lab'
--

--
-- Dumping routines for database 'inv_lab'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-26  7:33:02
