CREATE DATABASE  IF NOT EXISTS `inv_lab` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `inv_lab`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: inv_lab
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.13-MariaDB

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
-- Table structure for table `circuito`
--

DROP TABLE IF EXISTS `circuito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `circuito` (
  `COD_CIR` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_CIR` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `DIR_CIR` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `EST_CIR` varchar(1) CHARACTER SET utf8 DEFAULT 'H' COMMENT 'H: HABILITADO\nD: DESHABILITADO',
  PRIMARY KEY (`COD_CIR`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `circuito`
--

LOCK TABLES `circuito` WRITE;
/*!40000 ALTER TABLE `circuito` DISABLE KEYS */;
INSERT INTO `circuito` VALUES (42,'LOS ROSALES','AV ABRAHAM CALAZACON','H'),(43,'NUEVA AURORA','VIA QUEVEDO KM 7','H'),(44,'15 DE SEPTIEMBRE','VIA QUEVEDO KM 4','H'),(45,'PUERTO LIMON','PARROQUIA PUERTO LIMON','H'),(46,'NUEVO ISRAEL','KM 21 VIA CHONE','H'),(47,'LAS DELICIAS','KM 28 VIA CHONE','H'),(48,'SAN JACINTO','PARROQUIA SAN JACINTO DEL BUA','H'),(49,'JUAN EULOGIO','COOPERATIVA JUAN EULOGIO','H'),(50,'MONTONEROS','VIA CHONE KM 5','H'),(51,'PLAN DE VIVIENDA','COOPERATIVA PLAN DE VIVIENDA MUNICIPAL','H'),(52,'LA MODELO','BY PASS CHONE - QUEVEDO','H'),(53,'VALLE HERMOSO ','PARROQUIA VALLE HERMOSO','H'),(54,'CIUDAD NUEVA','COOPERATIVA CIUDAD NUEVA SECTOR 2','H');
/*!40000 ALTER TABLE `circuito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_orden`
--

DROP TABLE IF EXISTS `detalle_orden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_orden` (
  `DET_ORD` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ORD` int(11) NOT NULL,
  `COD_PRO` int(11) NOT NULL,
  `NRB_PRO` int(11) DEFAULT '0',
  `NRS_PRO` int(11) DEFAULT '0',
  `NRM_PRO` int(11) DEFAULT '0',
  `NRN_PRO` int(11) DEFAULT '0',
  `CAN_PRO` int(11) DEFAULT '0',
  PRIMARY KEY (`DET_ORD`),
  KEY `fk_detalle_orden_orden1` (`ID_ORD`),
  KEY `fk_detalle_orden_producto1_idx` (`COD_PRO`),
  CONSTRAINT `fk_detalle_orden_orden1` FOREIGN KEY (`ID_ORD`) REFERENCES `orden` (`ID_ORD`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_orden_producto1` FOREIGN KEY (`COD_PRO`) REFERENCES `producto` (`COD_PRO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_orden`
--

LOCK TABLES `detalle_orden` WRITE;
/*!40000 ALTER TABLE `detalle_orden` DISABLE KEYS */;
INSERT INTO `detalle_orden` VALUES (4,28,70,1,0,0,0,1),(5,28,71,0,0,0,0,0),(6,28,72,1,0,0,0,1),(7,29,90,1,0,0,0,1),(8,29,91,0,0,0,0,0),(9,29,115,0,0,0,0,1),(10,30,94,0,0,0,0,0),(11,30,95,0,0,0,0,0),(12,30,96,0,0,0,0,0),(13,30,97,0,0,0,0,0),(14,30,117,0,0,0,0,5);
/*!40000 ALTER TABLE `detalle_orden` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `inv_lab`.`detalle_orden_BEFORE_UPDATE` BEFORE UPDATE ON `detalle_orden` FOR EACH ROW
BEGIN
DECLARE TIPO VARCHAR(1);
SELECT CAT_PRO INTO TIPO FROM PRODUCTO WHERE COD_PRO =NEW.COD_PRO;

IF( TIPO = 'E') THEN
SET NEW.CAN_PRO =IFNULL(NEW.NRB_PRO,0) + IFNULL(NEW.NRS_PRO,0) + IFNULL(NEW.NRM_PRO,0) + IFNULL(NEW.NRN_PRO,0);
END IF;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `e_x_contabilizar`
--

DROP TABLE IF EXISTS `e_x_contabilizar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `e_x_contabilizar` (
  `COD_SER` int(11) unsigned NOT NULL,
  `CANT_SER` int(11) DEFAULT NULL,
  PRIMARY KEY (`COD_SER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `e_x_contabilizar`
--

LOCK TABLES `e_x_contabilizar` WRITE;
/*!40000 ALTER TABLE `e_x_contabilizar` DISABLE KEYS */;
INSERT INTO `e_x_contabilizar` VALUES (70,3),(72,3),(90,3);
/*!40000 ALTER TABLE `e_x_contabilizar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `COD_EMP` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_EMP` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `RAZ_EMP` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `RUC_EMP` int(11) DEFAULT NULL,
  `DIR_EMP` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`COD_EMP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equivalencia`
--

DROP TABLE IF EXISTS `equivalencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equivalencia` (
  `COD_EQUI` int(11) NOT NULL AUTO_INCREMENT,
  `COD_EXA` int(11) DEFAULT NULL,
  `CODREF_PRO` varchar(15) DEFAULT NULL,
  `CAN_SER` int(11) DEFAULT NULL,
  PRIMARY KEY (`COD_EQUI`),
  UNIQUE KEY `COD_SER_UNIQUE` (`COD_EXA`),
  UNIQUE KEY `COD_PROD_UNIQUE` (`CODREF_PRO`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equivalencia`
--

LOCK TABLES `equivalencia` WRITE;
/*!40000 ALTER TABLE `equivalencia` DISABLE KEYS */;
INSERT INTO `equivalencia` VALUES (2,81,'R001',40),(3,80,'R002',40),(4,73,'R003',30),(5,72,'R004',60),(6,90,'R005',40),(7,56,'R006',25),(8,57,'R007',25),(9,86,'R008',50),(10,87,'R009',45),(11,70,'R010',45),(12,76,'R011',25),(13,93,'R012',35);
/*!40000 ALTER TABLE `equivalencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kardex_producto`
--

DROP TABLE IF EXISTS `kardex_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kardex_producto` (
  `COD_KARPRO` int(11) NOT NULL AUTO_INCREMENT,
  `COD_PROD` int(11) NOT NULL,
  `EST_KARPRO` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'ESTADO INGRESO(I) EGRESO(E)',
  `FECORD_KARPRO` date DEFAULT NULL COMMENT 'FECHA DE MOVIMIENTO PRODUCTOS',
  `FECCAD_KARPRO` date DEFAULT NULL COMMENT 'FECHA CADUCIDAD',
  `SAL_KARPRO` int(11) NOT NULL,
  `CAN_KARPRO` int(11) DEFAULT NULL COMMENT 'CANTIDAD POR PEDIDO DE ORDEN',
  `DES_KARPRO` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'DESCRIPCION',
  `FECCRE_KARPRO` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`COD_KARPRO`),
  KEY `fk_kardex_producto1` (`COD_PROD`),
  CONSTRAINT `fk_kardex_producto1` FOREIGN KEY (`COD_PROD`) REFERENCES `producto` (`COD_PRO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kardex_producto`
--

LOCK TABLES `kardex_producto` WRITE;
/*!40000 ALTER TABLE `kardex_producto` DISABLE KEYS */;
INSERT INTO `kardex_producto` VALUES (19,48,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:25:32'),(20,49,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:25:38'),(21,50,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:25:45'),(22,51,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:26:18'),(23,52,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:26:29'),(24,53,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:26:40'),(25,54,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:26:53'),(26,55,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:27:45'),(27,56,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:28:01'),(28,57,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:28:23'),(29,58,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:29:02'),(30,59,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:29:11'),(31,60,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:29:21'),(32,61,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:29:28'),(33,62,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:29:52'),(34,63,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:29:59'),(35,64,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:30:05'),(36,65,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:30:23'),(37,66,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:30:33'),(38,67,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:30:40'),(39,68,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:30:53'),(40,69,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:31:03'),(41,70,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:31:55'),(42,71,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:32:24'),(43,72,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:32:29'),(44,73,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:32:37'),(45,74,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:32:44'),(46,75,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:33:55'),(47,76,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:34:04'),(48,77,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:34:11'),(49,78,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:34:20'),(50,79,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:34:33'),(51,80,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:35:58'),(52,81,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:36:14'),(53,82,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:36:29'),(54,83,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:36:40'),(55,84,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:36:53'),(56,85,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:37:09'),(57,86,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:37:21'),(58,87,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:37:30'),(59,88,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:37:38'),(60,89,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:37:45'),(61,90,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:38:03'),(62,91,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:38:17'),(63,92,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:38:23'),(64,93,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:38:29'),(65,94,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:38:44'),(66,95,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:38:59'),(67,96,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:39:11'),(68,97,'I','2016-06-27','2016-06-27',0,0,'SALDO INICIAL','2016-06-27 20:39:29'),(69,98,'I','2016-07-01','2016-07-01',1,0,'SALDO INICIAL','2016-07-01 18:16:45'),(70,99,'I','2016-07-01','2016-07-01',1,0,'SALDO INICIAL','2016-07-01 18:17:24'),(71,100,'I','2016-07-01','2016-07-01',2,0,'SALDO INICIAL','2016-07-01 18:21:37'),(72,101,'I','2016-07-01','2016-07-01',2,0,'SALDO INICIAL','2016-07-01 18:22:11'),(73,102,'I','2016-07-01','2016-07-01',3,0,'SALDO INICIAL','2016-07-01 18:29:34'),(74,103,'I','2016-07-01','2016-07-01',3,0,'SALDO INICIAL','2016-07-01 18:30:25'),(75,104,'I','2016-07-01','2016-07-01',3,0,'SALDO INICIAL','2016-07-01 18:31:02'),(76,105,'I','2016-07-01','2016-07-01',4,0,'SALDO INICIAL','2016-07-01 18:32:39'),(77,106,'I','2016-07-01','2016-07-01',4,0,'SALDO INICIAL','2016-07-01 18:33:14'),(78,107,'I','2016-07-01','2016-07-01',4,0,'SALDO INICIAL','2016-07-01 18:34:12'),(79,108,'I','2016-07-01','2016-07-01',3,0,'SALDO INICIAL','2016-07-01 18:35:01'),(80,109,'I','2016-07-01','2016-07-01',4,0,'SALDO INICIAL','2016-07-01 18:36:03'),(81,110,'I','2016-07-01','2016-07-01',100,0,'SALDO INICIAL','2016-07-01 18:38:30'),(82,111,'I','2016-07-01','2016-07-01',100,0,'SALDO INICIAL','2016-07-01 18:39:02'),(83,112,'I','2016-07-01','2016-07-01',300,0,'SALDO INICIAL','2016-07-01 18:39:26'),(84,113,'I','2016-07-01','2016-07-01',200,0,'SALDO INICIAL','2016-07-01 18:39:54'),(85,114,'I','2016-07-01','2016-07-01',200,0,'SALDO INICIAL','2016-07-01 18:40:45'),(86,115,'I','2016-07-01','2016-07-01',2000,0,'SALDO INICIAL','2016-07-01 18:41:22'),(87,116,'I','2016-07-01','2016-07-01',1000,0,'SALDO INICIAL','2016-07-01 18:41:51'),(88,117,'I','2016-07-01','2016-07-01',1000,0,'SALDO INICIAL','2016-07-01 18:42:21'),(89,118,'I','2016-07-01','2016-07-01',1000,0,'SALDO INICIAL','2016-07-01 18:42:50'),(90,119,'I','2016-07-01','2016-07-01',1000,0,'SALDO INICIAL','2016-07-01 18:43:12'),(91,115,'E','2016-07-12',NULL,1999,1,'SEGÚN EXAMEN NRO: ','2016-07-12 02:19:02'),(92,104,'I','2016-08-17','2016-08-31',13,10,'COMPRA INSUMOS','2016-08-10 18:54:44'),(93,107,'I','2016-08-10','2016-08-19',9,5,'DFSDSF','2016-08-10 19:24:32'),(94,117,'E','2016-08-10',NULL,995,5,'SEGÚN EXAMEN NRO: ','2016-08-10 19:27:46');
/*!40000 ALTER TABLE `kardex_producto` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `inv_lab`.`kardex_producto_BEFORE_INSERT` BEFORE INSERT ON `kardex_producto` FOR EACH ROW
BEGIN
DECLARE SALDO INT;
DECLARE EXAMEN INT;
DECLARE CANTEXA INT;
DECLARE SALEXA INT;
DECLARE XCONT INT;


SELECT CAN_PRO INTO SALDO FROM PRODUCTO WHERE COD_PRO=NEW.COD_PROD ;
IF(NEW.EST_KARPRO = 'I') THEN 
SET NEW.SAL_KARPRO = SALDO + NEW.CAN_KARPRO;
ELSEIF(NEW.EST_KARPRO = 'E') THEN 
SET NEW.SAL_KARPRO = SALDO - NEW.CAN_KARPRO;
END IF;
IF(NEW.DES_KARPRO != 'SALDO INICIAL') THEN
UPDATE PRODUCTO SET CAN_PRO = NEW.SAL_KARPRO WHERE COD_PRO= NEW.COD_PROD;


SET XCONT=0;
SELECT CANT_SER INTO XCONT 
FROM E_X_CONTABILIZAR WHERE COD_SER = EXAMEN; 

SELECT E.CAN_SER,E.COD_EXA INTO CANTEXA,EXAMEN 
FROM EQUIVALENCIA E , PRODUCTO P WHERE E.CODREF_PRO= P.CODREF_PRO AND P.COD_PRO = NEW.COD_PROD; 
SET SALEXA = (CANTEXA * NEW.SAL_KARPRO)-XCONT;



UPDATE PRODUCTO SET CAN_PRO = SALEXA WHERE COD_PRO= EXAMEN;
END IF;


END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `orden`
--

DROP TABLE IF EXISTS `orden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden` (
  `ID_ORD` int(11) NOT NULL AUTO_INCREMENT,
  `COD_ORD` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `COD_CIR` int(11) DEFAULT NULL,
  `COD_PER` int(11) NOT NULL,
  `EST_ORD` varchar(1) COLLATE utf8_spanish_ci DEFAULT 'P' COMMENT 'ATENDIDA(A)\nANULADA(N)\nPENDIENTE(P)" GENERADAS PERO AUN NO HAN SIDO ATENDIDAS."',
  `OBS_ORD` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'OBSERVACION',
  `FECMUE_ORD` datetime DEFAULT NULL,
  `FECCRE_ORD` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'FECHA DE TOMA DE MUESTRA\n',
  `FECRES_ORD` datetime DEFAULT NULL,
  `COD_USUCRE` int(11) DEFAULT NULL,
  `COD_USURES` int(11) DEFAULT NULL,
  `RES_ORD` varchar(3000) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`ID_ORD`),
  KEY `fk_orden_persona1` (`COD_PER`),
  CONSTRAINT `fk_orden_persona1` FOREIGN KEY (`COD_PER`) REFERENCES `persona` (`COD_PER`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden`
--

LOCK TABLES `orden` WRITE;
/*!40000 ALTER TABLE `orden` DISABLE KEYS */;
INSERT INTO `orden` VALUES (24,'1',42,14,'P','','2016-07-23 00:00:00','2016-07-05 01:39:49',NULL,NULL,NULL,NULL),(25,'2',42,14,'P','NINGUNA','2016-07-23 00:00:00','2016-07-09 16:51:57',NULL,1723578702,NULL,NULL),(26,'3',42,14,'P','NINGUNA','2016-07-23 00:00:00','2016-07-09 16:52:23',NULL,1723578702,NULL,NULL),(27,'4',42,14,'P','NINGUNA01','2016-07-23 00:00:00','2016-07-09 16:54:20',NULL,1723578702,NULL,NULL),(28,'5',42,14,'A','NINGUNA01','2016-07-23 00:00:00','2016-07-09 16:59:34',NULL,1723578702,NULL,'{\"res1\":\"\",\"res2\":\"\",\"res3\":\"\",\"res4\":\"\",\"res5\":\"\",\"res6\":\"\",\"res7\":\"\",\"res8\":\"\",\"res9\":\"\",\"res10\":\"\",\"res11\":\"\",\"res12\":\"\",\"res13\":\"\",\"res14\":\"\",\"res15\":\"\",\"res16\":\"\",\"res17\":\"\",\"res18\":\"\",\"res19\":\"\",\"res20\":\"\",\"res21\":\"\",\"res22\":\"\",\"res23\":\"\",\"res24\":\"\",\"res25\":\"\",\"res26\":\"\",\"res27\":\"\",\"res28\":\"\",\"res29\":\"df\",\"res30\":\"fsf\",\"res31\":\"dfd\",\"res32\":\"fs\",\"res33\":\"f\",\"res34\":\"df\",\"res35\":\"\",\"res36\":\"\",\"res37\":\"\",\"res38\":\"\",\"res39\":\"\",\"res40\":\"\",\"res41\":\"\",\"res42\":\"\",\"res43\":\"\",\"res44\":\"\",\"res45\":\"\",\"res46\":\"\",\"res47\":\"\",\"res48\":\"\",\"res49\":\"\",\"res50\":\"\",\"res51\":\"\",\"res52\":\"\",\"res53\":\"\",\"res54\":\"\",\"res55\":\"\",\"res56\":\"\",\"res57\":\"\",\"res58\":\"\",\"res59\":\"\",\"res60\":\"\",\"res61\":\"\",\"res62\":\"\",\"res63\":\"\",\"res64\":\"\",\"res65\":\"\",\"res66\":\"\",\"res67\":\"\",\"res68\":\"\",\"res69\":\"\",\"res70\":\"\",\"res71\":\"\",\"res72\":\"\",\"res73\":\"\",\"res74\":\"\",\"res75\":\"\",\"res76\":\"\",\"res77\":\"\",\"res78\":\"\",\"res79\":\"\",\"res80\":\"\",\"res81\":\"\",\"res82\":\"\",\"res83\":\"\",\"res84\":\"\",\"res85\":\"\",\"res86\":\"\",\"res87\":\"\",\"res88\":\"\",\"res89\":\"\",\"res90\":\"\",\"res91\":\"\",\"res92\":\"\",\"res93\":\"\",\"res94\":\"\",\"res95\":\"\",\"res96\":\"\",\"res97\":\"\",\"res98\":\"\",\"res99\":\"\",\"res100\":\"\",\"res101\":\"\",\"res102\":\"\",\"res103\":\"\",\"res104\":\"\",\"res105\":\"\",\"res106\":\"\",\"res107\":\"\",\"res108\":\"\",\"res109\":\"\",\"res110\":\"\",\"res111\":\"\",\"res112\":\"\",\"res113\":\"\",\"res114\":\"\",\"res115\":\"\",\"res116\":\"\",\"res117\":\"\",\"res118\":\"\",\"res119\":\"\",\"res120\":\"\",\"res121\":\"\",\"res122\":\"\",\"res123\":\"\",\"res124\":\"\",\"res125\":\"\",\"res126\":\"\",\"res127\":\"\",\"res128\":\"\",\"res129\":\"\",\"res130\":\"\",\"res131\":\"\",\"res131\":\"\",\"res132\":\"\",\"res133\":\"\",\"res134\":\"\",\"res135\":\"\",\"res136\":\"\",\"res137\":\"\",\"res138\":\"\",\"res139\":\"\",\"res140\":\"\",\"res141\":\"\",\"res142\":\"\",\"res143\":\"\",\"res144\":\"\",\"res145\":\"\",\"res146\":\"\",\"res147\":\"\",\"res148\":\"\",\"res149\":\"\",\"res150\":\"\",\"res151\":\"\",\"res152\":\"\",\"res153\":\"\",\"res154\":\"\",\"res155\":\"\",\"res156\":\"\",\"res157\":\"\",\"res158\":\"\",\"res159\":\"\",\"res160\":\"\",\"res161\":\"\",\"res162\":\"\",\"res163\":\"\",\"res164\":\"\",\"res165\":\"\",\"res166\":\"\",\"E\":\"T\" }'),(29,'6',42,14,'A','','2016-07-30 00:00:00','2016-07-12 02:16:31','2016-07-20 01:44:43',1723578702,1723578702,'{\"res1\":\"122 \",\"res2\":\"31\",\"res3\":\" 3221E\",\"res4\":\"1321\",\"res5\":\"221\",\"res6\":\"12131221\",\"res7\":\"3211321123\",\"res8\":\"\",\"res9\":\"321\",\"res10\":\"31221211\",\"res11\":\"2\",\"res12\":\"\",\"res13\":\"\",\"res14\":\"\",\"res15\":\"\",\"res16\":\"\",\"res17\":\"\",\"res18\":\"\",\"res19\":\"\",\"res20\":\"\",\"res21\":\"\",\"res22\":\"\",\"res23\":\"\",\"res24\":\"\",\"res25\":\"\",\"res26\":\"\",\"res27\":\"\",\"res28\":\"\",\"res29\":\"\",\"res30\":\"\",\"res31\":\"\",\"res32\":\"\",\"res33\":\"\",\"res34\":\"\",\"res35\":\"\",\"res36\":\"\",\"res37\":\"\",\"res38\":\"\",\"res39\":\"\",\"res40\":\"\",\"res41\":\"\",\"res42\":\"\",\"res43\":\"\",\"res44\":\"\",\"res45\":\"\",\"res46\":\"\",\"res47\":\"\",\"res48\":\"\",\"res49\":\"\",\"res50\":\"\",\"res51\":\"\",\"res52\":\"\",\"res53\":\"\",\"res54\":\"\",\"res55\":\"\",\"res56\":\"\",\"res57\":\"\",\"res58\":\"\",\"res59\":\"\",\"res60\":\"\",\"res61\":\"\",\"res62\":\"\",\"res63\":\"\",\"res64\":\"\",\"res65\":\"\",\"res66\":\"\",\"res67\":\"\",\"res68\":\"\",\"res69\":\"\",\"res70\":\"\",\"res71\":\"\",\"res72\":\"\",\"res73\":\"\",\"res74\":\"\",\"res75\":\"\",\"res76\":\"\",\"res77\":\"\",\"res78\":\"\",\"res79\":\"\",\"res80\":\"\",\"res81\":\"\",\"res82\":\"\",\"res83\":\"\",\"res84\":\"\",\"res85\":\"\",\"res86\":\"\",\"res87\":\"\",\"res88\":\"\",\"res89\":\"\",\"res90\":\"\",\"res91\":\"\",\"res92\":\"\",\"res93\":\"\",\"res94\":\"\",\"res95\":\"\",\"res96\":\"\",\"res97\":\"\",\"res98\":\"\",\"res99\":\"\",\"res100\":\"\",\"res101\":\"\",\"res102\":\"\",\"res103\":\"\",\"res104\":\"\",\"res105\":\"\",\"res106\":\"\",\"res107\":\"\",\"res108\":\"\",\"res109\":\"\",\"res110\":\"\",\"res111\":\"\",\"res112\":\"\",\"res113\":\"\",\"res114\":\"\",\"res115\":\"\",\"res116\":\"\",\"res117\":\"\",\"res118\":\"\",\"res119\":\"\",\"res120\":\"\",\"res121\":\"\",\"res122\":\"\",\"res123\":\"\",\"res124\":\"\",\"res125\":\"\",\"res126\":\"\",\"res127\":\"\",\"res128\":\"\",\"res129\":\"\",\"res130\":\"\",\"res131\":\"\",\"res131\":\"\",\"res132\":\"\",\"res133\":\"\",\"res134\":\"\",\"res135\":\"\",\"res136\":\"\",\"res137\":\"\",\"res138\":\"\",\"res139\":\"\",\"res140\":\"\",\"res141\":\"\",\"res142\":\"\",\"res143\":\"\",\"res144\":\"\",\"res145\":\"\",\"res146\":\"\",\"res147\":\"\",\"res148\":\"\",\"res149\":\"\",\"res150\":\"\",\"res151\":\"\",\"res152\":\"\",\"res153\":\"\",\"res154\":\"\",\"res155\":\"\",\"res156\":\"\",\"res157\":\"\",\"res158\":\"\",\"res159\":\"\",\"res160\":\"\",\"res161\":\"\",\"res162\":\"\",\"res163\":\"\",\"res164\":\"\",\"res165\":\"\",\"res166\":\"\",\"E\":\"T\" }'),(30,'7',42,14,'A','NINGUNA','2016-08-10 00:00:00','2016-08-10 19:25:25','2016-08-10 19:27:46',1723578702,1723578702,'{\"res1\":\"\",\"res2\":\"\",\"res3\":\"\",\"res4\":\"\",\"res5\":\"\",\"res6\":\"\",\"res7\":\"\",\"res8\":\"\",\"res9\":\"\",\"res10\":\"\",\"res11\":\"\",\"res12\":\"\",\"res13\":\"\",\"res14\":\"\",\"res15\":\"\",\"res16\":\"\",\"res17\":\"\",\"res18\":\"\",\"res19\":\"\",\"res20\":\"\",\"res21\":\"\",\"res22\":\"\",\"res23\":\"\",\"res24\":\"\",\"res25\":\"\",\"res26\":\"\",\"res27\":\"\",\"res28\":\"\",\"res29\":\"\",\"res30\":\"\",\"res31\":\"\",\"res32\":\"\",\"res33\":\"\",\"res34\":\"\",\"res35\":\"\",\"res36\":\"\",\"res37\":\"\",\"res38\":\"\",\"res39\":\"\",\"res40\":\"\",\"res41\":\"\",\"res42\":\"\",\"res43\":\"\",\"res44\":\"\",\"res45\":\"\",\"res46\":\"\",\"res47\":\"\",\"res48\":\"\",\"res49\":\"\",\"res50\":\"\",\"res51\":\"\",\"res52\":\"\",\"res53\":\"\",\"res54\":\"\",\"res55\":\"\",\"res56\":\"\",\"res57\":\"\",\"res58\":\"\",\"res59\":\"\",\"res60\":\"\",\"res61\":\"\",\"res62\":\"\",\"res63\":\"\",\"res64\":\"\",\"res65\":\"\",\"res66\":\"\",\"res67\":\"\",\"res68\":\"\",\"res69\":\"\",\"res70\":\"\",\"res71\":\"\",\"res72\":\"\",\"res73\":\"\",\"res74\":\"\",\"res75\":\"\",\"res76\":\"\",\"res77\":\"\",\"res78\":\"\",\"res79\":\"\",\"res80\":\"\",\"res81\":\"\",\"res82\":\"\",\"res83\":\"\",\"res84\":\"\",\"res85\":\"\",\"res86\":\"\",\"res87\":\"\",\"res88\":\"\",\"res89\":\"\",\"res90\":\"\",\"res91\":\"\",\"res92\":\"\",\"res93\":\"\",\"res94\":\"\",\"res95\":\"\",\"res96\":\"\",\"res97\":\"\",\"res98\":\"\",\"res99\":\"\",\"res100\":\"\",\"res101\":\"\",\"res102\":\"\",\"res103\":\"\",\"res104\":\"\",\"res105\":\"\",\"res106\":\"\",\"res107\":\"\",\"res108\":\"\",\"res109\":\"\",\"res110\":\"\",\"res111\":\"\",\"res112\":\"\",\"res113\":\"\",\"res114\":\"\",\"res115\":\"\",\"res116\":\"\",\"res117\":\"\",\"res118\":\"\",\"res119\":\"\",\"res120\":\"\",\"res121\":\"\",\"res122\":\"\",\"res123\":\"\",\"res124\":\"\",\"res125\":\"\",\"res126\":\"\",\"res127\":\"\",\"res128\":\"\",\"res129\":\"\",\"res130\":\"\",\"res131\":\"\",\"res131\":\"\",\"res132\":\"\",\"res133\":\"\",\"res134\":\"\",\"res135\":\"\",\"res136\":\"\",\"res137\":\"\",\"res138\":\"\",\"res139\":\"\",\"res140\":\"\",\"res141\":\"\",\"res142\":\"\",\"res143\":\"\",\"res144\":\"\",\"res145\":\"\",\"res146\":\"\",\"res147\":\"ASDAS\",\"res148\":\"DAS\",\"res149\":\"\",\"res150\":\"\",\"res151\":\"ASD\",\"res152\":\"DSAD\",\"res153\":\"ASDASD\",\"res154\":\"ASD\",\"res155\":\"ASDASD\",\"res156\":\"\",\"res157\":\"\",\"res158\":\"\",\"res159\":\"\",\"res160\":\"\",\"res161\":\"\",\"res162\":\"\",\"res163\":\"ASD\",\"res164\":\"\",\"res165\":\"\",\"res166\":\"\",\"E\":\"T\" }');
/*!40000 ALTER TABLE `orden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `COD_PER` int(11) NOT NULL AUTO_INCREMENT,
  `CED_PER` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `HIS_PER` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `PRINOM_PER` varchar(50) CHARACTER SET utf8 NOT NULL,
  `SEGNOM_PER` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `PRIAPE_PER` varchar(50) CHARACTER SET utf8 NOT NULL,
  `SEGAPE_PER` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FECNAC_PER` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'FECHA DE NACIMIENTO',
  `DIR_PER` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `TEL_PER` varchar(15) CHARACTER SET utf8 NOT NULL COMMENT 'NUMERO DE TELEFONO',
  `CEL_PER` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'NUMERO CELULAR',
  `COD_CIR` int(11) NOT NULL COMMENT 'CIRCUITO PERTENECIENTE',
  `SEX_PER` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'H : HOMBRE\nM : MUJER',
  `ESTDIS_PER` varchar(45) COLLATE utf8_spanish_ci DEFAULT 'N' COMMENT 'ESTADO DE DISCAPACIDAD\n\nS : SI\nN : NO',
  `EST_PER` varchar(1) COLLATE utf8_spanish_ci DEFAULT 'H' COMMENT 'H: HABILITADO\nD: DESHABILITADO',
  `FECCRE_PER` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`COD_PER`),
  UNIQUE KEY `COD_PER_UNIQUE` (`COD_PER`),
  UNIQUE KEY `CED_PER_UNIQUE` (`CED_PER`),
  KEY `fk_persona_circuito1` (`COD_CIR`),
  CONSTRAINT `fk_persona_circuito1` FOREIGN KEY (`COD_CIR`) REFERENCES `circuito` (`COD_CIR`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (14,'1723578702','000','JORDY','','PIEDRA','','2015-05-31','SADASD','000','0000',42,'H','N','H','2016-07-05 01:33:14'),(15,'0000000000','002201','SDFFSDN','NBMN','NBMNB','NBMNB','1990-08-17','NMBMNB','210505','050545',42,'H','N','H','2016-07-09 15:36:20'),(16,'1111111111','0000000000','AAAAAAAAAAAAAAA','AAAAAAAAAA','AAAAAAAAA','A','1990-04-12','AAAAAAAAAAA','0000000000','0000000000',42,'H','N','H','2016-07-20 01:22:01'),(20,'2222222222','2222222222','AAAAAAAAA','','AAAAAAAA','','2000-08-05','AAAAAAAAAAA','2222222222','2222222222',45,'M','S','H','2016-07-20 01:28:57'),(23,'9999999999','8888888888','ASDASDASD','ASDASDASD','ASASDASD','ASDADASD','2016-09-01','ASDASDASD','8888888','8888888',42,'H','N','H','2016-08-10 18:49:02');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `COD_PRO` int(11) NOT NULL AUTO_INCREMENT,
  `CODREF_PRO` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'CODIGO DE REFERENCIA',
  `NOM_PRO` varchar(50) CHARACTER SET utf8 NOT NULL,
  `CAN_PRO` int(11) DEFAULT NULL COMMENT 'CANTIDAD',
  `DES_PRO` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'DESCRIPCION',
  `CAT_PRO` varchar(1) COLLATE utf8_spanish_ci NOT NULL COMMENT 'I: INSUMO\nR: REACTIVO',
  `TIP_PRO` varchar(1) COLLATE utf8_spanish_ci NOT NULL COMMENT 'H: HERMATOLOGICO\nU: UROANÀLISI\nC: COPROLOGICO\nQ: QUIMICO SANGUINEO\nS: SEROLOGIA\nB: BACTEROLOGIA\nO: OTROS',
  `EST_PRO` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'H' COMMENT 'H: HABILITADO\nD: DESHABILITADO',
  `FECCRE_PRO` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`COD_PRO`),
  UNIQUE KEY `CODREF_PRO_UNIQUE` (`CODREF_PRO`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (48,'EH-001','BIOMETRIA HEMATICA',0,'EXAMEN','E','H','H','2016-06-27 20:25:32'),(49,'EH-002','PLAQUETAS',0,'EXAMEN','E','H','H','2016-06-27 20:25:38'),(50,'EH-003','GRUPO SANGUINEO',0,'EXAMEN','E','H','H','2016-06-27 20:25:45'),(51,'EH-004','RETICULOCITOS',0,'EXAMEN','E','H','H','2016-06-27 20:26:18'),(52,'EH-005','HEMATOZOARIO',0,'EXAMEN','E','H','H','2016-06-27 20:26:29'),(53,'EH-006','CELULA L E',0,'EXAMEN','E','H','H','2016-06-27 20:26:40'),(54,'EH-007','TIEMPO DE COAGULACION',0,'EXAMEN','E','H','H','2016-06-27 20:26:53'),(55,'EH-008','INDICES HEMATICOS',0,'EXAMEN','E','H','H','2016-06-27 20:27:45'),(56,'EH-009','TIEMPO DE PROTOMEINA TP',0,'EXAMEN','E','H','H','2016-06-27 20:28:01'),(57,'EH-010','T TROMBOPPLASTINA PARCIAL TTP',325,'EXAMEN','E','H','H','2016-06-27 20:28:23'),(58,'EH-011','DREPANOCITOS',0,'EXAMEN','E','H','H','2016-06-27 20:29:02'),(59,'EH-012','COOMBS DIRECTO',0,'EXAMEN','E','H','H','2016-06-27 20:29:11'),(60,'EH-013','COOMBS INDIRECTO',0,'EXAMEN','E','H','H','2016-06-27 20:29:21'),(61,'EH-014','TIEMPO SANGRIA',0,'EXAMEN','E','H','H','2016-06-27 20:29:28'),(62,'EU-001','ELEMENTAL Y MICROSCOPICO',0,'EXAMEN','E','U','H','2016-06-27 20:29:52'),(63,'EU-002','GOTA FRESCA',0,'EXAMEN','E','U','H','2016-06-27 20:29:59'),(64,'EU-003','PRUEBA DE EMBARAZO',0,'EXAMEN','E','U','H','2016-06-27 20:30:05'),(65,'EC-001','COPROPARASITARIO',0,'EXAMEN','E','C','H','2016-06-27 20:30:23'),(66,'EC-002','COPRO SERIADO',0,'EXAMEN','E','C','H','2016-06-27 20:30:33'),(67,'EC-003','SANGRE OCULTA',0,'EXAMEN','E','C','H','2016-06-27 20:30:40'),(68,'EC-004','INVESTIGACION DE POLIMORFOS',0,'EXAMEN','E','C','H','2016-06-27 20:30:53'),(69,'EC-005','INVESTIGACION DE ROTAVIRUS',0,'EXAMEN','E','C','H','2016-06-27 20:31:03'),(70,'EQ-001','GLUCOSA EN AYUNAS',405,'EXAMEN','E','Q','H','2016-06-27 20:31:55'),(71,'EQ-002','GLUCOSA POST PRANDIAL DOS HORAS',0,'EXAMEN','E','Q','H','2016-06-27 20:32:24'),(72,'EQ-003','UREA',0,'EXAMEN','E','Q','H','2016-06-27 20:32:29'),(73,'EQ-004','CREATININA',0,'EXAMEN','E','Q','H','2016-06-27 20:32:37'),(74,'EQ-005','BILIRRUBINA TOTAL',0,'EXAMEN','E','Q','H','2016-06-27 20:32:44'),(75,'EQ-006','BILIRRUBINA DIRECTA',0,'EXAMEN','E','Q','H','2016-06-27 20:33:55'),(76,'EQ-007','ACIDO URICO',0,'EXAMEN','E','Q','H','2016-06-27 20:34:04'),(77,'EQ-008','PROTEINA TOTAL',0,'EXAMEN','E','Q','H','2016-06-27 20:34:11'),(78,'EQ-009','ALBUMINA',0,'EXAMEN','E','Q','H','2016-06-27 20:34:20'),(79,'EQ-010','GLOBULINA',0,'EXAMEN','E','Q','H','2016-06-27 20:34:33'),(80,'EQ-011','TRANSAMINASA PIRUVICA ALT',0,'EXAMEN','E','Q','H','2016-06-27 20:35:58'),(81,'EQ-012','TRANSAMINASA OXALACETICA AST',0,'EXAMEN','E','Q','H','2016-06-27 20:36:14'),(82,'EQ-013','FOSFATA ALCALINA',0,'EXAMEN','E','Q','H','2016-06-27 20:36:29'),(83,'EQ-014','FOSFATA ACIDA',0,'EXAMEN','E','Q','H','2016-06-27 20:36:40'),(84,'EQ-015','COLESTEROL TOTAL',0,'EXAMEN','E','Q','H','2016-06-27 20:36:53'),(85,'EQ-016','BICOLESTEROL HDL',0,'EXAMEN','E','Q','H','2016-06-27 20:37:09'),(86,'EQ-017','COLESTEROL LDL',0,'EXAMEN','E','Q','H','2016-06-27 20:37:21'),(87,'EQ-018','TRIGLICERIDOS',0,'EXAMEN','E','Q','H','2016-06-27 20:37:30'),(88,'EQ-019','HIERRO SERICO',0,'EXAMEN','E','Q','H','2016-06-27 20:37:38'),(89,'EQ-020','AMILASA',0,'EXAMEN','E','Q','H','2016-06-27 20:37:45'),(90,'ES-001','VDRL',0,'EXAMEN','E','S','H','2016-06-27 20:38:03'),(91,'ES-002','AGRUTINACIONES FEBRILES',0,'EXAMEN','E','S','H','2016-06-27 20:38:17'),(92,'ES-003','LATEX',0,'EXAMEN','E','S','H','2016-06-27 20:38:23'),(93,'ES-004','ASTO',0,'EXAMEN','E','S','H','2016-06-27 20:38:29'),(94,'EB-001','GRAM',0,'EXAMEN','E','B','H','2016-06-27 20:38:44'),(95,'EB-002','HONGOS',0,'EXAMEN','E','B','H','2016-06-27 20:38:59'),(96,'EB-004','FRESCO',0,'EXAMEN','E','B','H','2016-06-27 20:39:11'),(97,'EB-005','CULTIVO ANTIBIOGRAMA',0,'EXAMEN','E','B','H','2016-06-27 20:39:29'),(98,'R001','TGO X 10 M',1,'TGO X 10 ML TRANSAMINASA OXALACETICA','R','Q','H','2016-07-01 18:16:45'),(99,'R002','TGP X 10 ML',1,'TGP X 10 ML TRANSAMINASA PIRUVICA','R','Q','H','2016-07-01 18:17:24'),(100,'R003','CREATININA 100 ML',2,'CREATININA 2 X 100 ML','R','Q','H','2016-07-01 18:21:37'),(101,'R004','UREA 100 ML',2,'UREA 2 X 100 ML','R','Q','H','2016-07-01 18:22:11'),(102,'R005','VDRL 10 ML',3,'VDRL X 10 ML SIFILIS','R','S','H','2016-07-01 18:29:34'),(103,'R006','TP 10ML',3,'TP 10 X 10ML TIEMPO DE PROTROMBINA','R','H','H','2016-07-01 18:30:25'),(104,'R007','TTP 10 ML ',13,'TTP 10 X 10 ML TIEMPO DE TROMBOPLASTINA 100 LAMDAS','R','H','H','2016-07-01 18:31:02'),(105,'R008','COLESTEROL 100 ML',4,'COLESTEROL 4 X 100 ML','R','Q','H','2016-07-01 18:32:39'),(106,'R009','TRIGLICERIDOS 100 ML',4,'TRIGLICERIDOS 4 X 100 ML','R','Q','H','2016-07-01 18:33:14'),(107,'R010','GLUCOSA 100 ML',9,'GLUCOSA 4 X100 ML','R','Q','H','2016-07-01 18:34:12'),(108,'R011','ACIDO URICO',3,'ACIDO URICO','R','Q','H','2016-07-01 18:35:01'),(109,'R012','ASTO LATEX',4,'ASTO LATEX','R','S','H','2016-07-01 18:36:03'),(110,'I001','PLACA GRUPO SANGUINEO',100,'PLACA GRUPO SANGUINEO','I','O','H','2016-07-01 18:38:30'),(111,'I002','PLACA DE AGLUTINACIONES',100,'PLACA DE AGLUTINACIONES','I','O','H','2016-07-01 18:39:02'),(112,'I003','TORNIQUETES',300,'TORNIQUETES','I','O','H','2016-07-01 18:39:26'),(113,'I004','AGUJA VACUTAINER ',200,'AGUJA VACUTAINER  X 100','I','O','H','2016-07-01 18:39:54'),(114,'I005','TUBO TAPA ROJA',200,'TUBO TAPA ROJA X 100 UNID DE VIDRIO','I','O','H','2016-07-01 18:40:45'),(115,'I006','FUNDAS PUNTAS BLANCAS ',1999,'FUNDAS PUNTAS BLANCAS X 1000 UNID','I','O','H','2016-07-01 18:41:22'),(116,'I007','FUNDAS PUNTAS AMARILLAS ',1000,'FUNDAS PUNTAS AMARILLAS X 1000 UNID','I','O','H','2016-07-01 18:41:51'),(117,'I008','FUNDAS PUNTAS AZULES ',995,'FUNDAS PUNTAS AZULES X 1000 UNID','I','O','H','2016-07-01 18:42:21'),(118,'I009','TUBOS TAPA LILA',1000,'TUBOS TAPA LILA','I','O','H','2016-07-01 18:42:50'),(119,'I010','TUBOS TAPA CELESTE',1000,'TUBOS TAPA CELESTE','I','O','H','2016-07-01 18:43:12');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `inv_lab`.`producto_AFTER_INSERT` AFTER INSERT ON `producto` FOR EACH ROW
BEGIN
INSERT INTO KARDEX_PRODUCTO (COD_PROD,EST_KARPRO,FECORD_KARPRO,FECCAD_KARPRO,CAN_KARPRO,DES_KARPRO)
VALUES (NEW.COD_PRO,'I',NOW(),NOW(),0,'SALDO INICIAL');
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `COD_USU` int(11) NOT NULL AUTO_INCREMENT,
  `CED_USU` varchar(15) NOT NULL,
  `PRINOM_USU` varchar(50) DEFAULT NULL,
  `SEGNOM_USU` varchar(50) DEFAULT NULL,
  `PRIAPE_USU` varchar(50) DEFAULT NULL,
  `SEGAPE_USU` varchar(50) DEFAULT NULL,
  `PAS_USU` varchar(150) DEFAULT NULL,
  `TIP_USU` varchar(1) NOT NULL COMMENT 'E: ESTADISTICO\nM: MEDICO\nA: ADMINISTRADOR\nL: LABORATORISTA',
  `ESTA_USU` varchar(1) DEFAULT NULL COMMENT 'H: HABILITADO\nD: DESHABILITADO',
  `FECCRE_USU` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`COD_USU`),
  UNIQUE KEY `CED_USU_UNIQUE` (`CED_USU`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (4,'1723578702','JORDY','MIGUELSW','PIEDRA','LÓPEZ','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','A','H','2016-06-28 01:13:41'),(5,'9999999999','asdad','as','sada','','de04d58dc5ccc4b9671c3627fb8d626fe4a15810bc1fe3e724feea761965fb71','A','H','2016-08-28 21:51:19');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'inv_lab'
--

--
-- Dumping routines for database 'inv_lab'
--
/*!50003 DROP FUNCTION IF EXISTS `cant_examen` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `cant_examen`(COD_EXA_ INT) RETURNS int(11)
BEGIN
DECLARE CANT_SER_ INT;
DECLARE PROD VARCHAR(15);
DECLARE CANTIDAD INT;
SELECT CAN_SER,CODREF_PRO INTO CANT_SER_,PROD FROM EQUIVALENCIA WHERE COD_EXA= COD_EXA_;
SELECT CAN_PRO INTO CANTIDAD FROM PRODUCTO WHERE CODREF_PRO=PROD;

RETURN IFNULL(CANTIDAD*CANT_SER_,0);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-28 22:19:57
