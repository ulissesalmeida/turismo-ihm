-- MySQL dump 10.13  Distrib 5.1.54, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: tourism
-- ------------------------------------------------------
-- Server version	5.1.54-1ubuntu4

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
-- Current Database: `tourism`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `tourism` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `tourism`;

--
-- Table structure for table `hostel`
--

DROP TABLE IF EXISTS `hostel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hostel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_h_local` (`local_id`),
  CONSTRAINT `fk_h_local` FOREIGN KEY (`local_id`) REFERENCES `local` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hostel`
--

LOCK TABLES `hostel` WRITE;
/*!40000 ALTER TABLE `hostel` DISABLE KEYS */;
INSERT INTO `hostel` VALUES (1,1,'Hotel Xuxu',NULL),(2,2,'Brows Hotel',NULL),(3,4,'Rioston Hotel',NULL);
/*!40000 ALTER TABLE `hostel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hostel_room`
--

DROP TABLE IF EXISTS `hostel_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hostel_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hostel_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `single_beds` tinyint(4) NOT NULL,
  `double_beds` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hr_hostel` (`hostel_id`),
  CONSTRAINT `fk_hr_hostel` FOREIGN KEY (`hostel_id`) REFERENCES `hostel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hostel_room`
--

LOCK TABLES `hostel_room` WRITE;
/*!40000 ALTER TABLE `hostel_room` DISABLE KEYS */;
INSERT INTO `hostel_room` VALUES (1,1,'Para os recém casados se divirterem','150.00',0,1),(2,2,'Quarto ideal para um casal e duas crianças','300.00',2,1),(4,2,'Quarto perfeito para recém casados.','350.00',0,1),(5,3,'Quarto para solteiros que querem aproveitar a vida.','500.00',1,0);
/*!40000 ALTER TABLE `hostel_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `local`
--

DROP TABLE IF EXISTS `local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `local` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(80) NOT NULL,
  `state` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local`
--

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;
INSERT INTO `local` VALUES (1,'Brasil','São Paulo','Diadema'),(2,'Estados Unidos','Nova Iorque','Nova Iorque'),(3,'França','Île-de-France','Paris'),(4,'Brasil','Rio de Janeiro','Rio de Janeiro');
/*!40000 ALTER TABLE `local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_day`
--

DROP TABLE IF EXISTS `package_day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tour_package` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pd_tour_package` (`tour_package`),
  CONSTRAINT `fk_pd_tour_package` FOREIGN KEY (`tour_package`) REFERENCES `tour_package` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_day`
--

LOCK TABLES `package_day` WRITE;
/*!40000 ALTER TABLE `package_day` DISABLE KEYS */;
INSERT INTO `package_day` VALUES (1,1,'2011-10-26'),(2,1,'2011-10-27'),(3,1,'2011-10-28'),(4,1,'2011-10-29'),(5,2,'2011-12-23'),(6,2,'2011-12-24'),(7,2,'2011-12-25'),(8,2,'2012-12-26'),(9,2,'2012-12-27'),(10,3,'2011-10-15'),(11,3,'2011-10-16'),(12,3,'2011-10-17'),(13,4,'2011-11-01'),(14,4,'2011-11-02');
/*!40000 ALTER TABLE `package_day` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_day_room`
--

DROP TABLE IF EXISTS `package_day_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package_day_room` (
  `package_day_id` int(11) NOT NULL,
  `hostel_room_id` int(11) NOT NULL,
  PRIMARY KEY (`package_day_id`,`hostel_room_id`),
  KEY `fk_pdr_package_day` (`package_day_id`),
  KEY `fk_pdr_hostel_room` (`hostel_room_id`),
  CONSTRAINT `fk_pdr_hostel_room` FOREIGN KEY (`hostel_room_id`) REFERENCES `hostel_room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pdr_package_day` FOREIGN KEY (`package_day_id`) REFERENCES `package_day` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_day_room`
--

LOCK TABLES `package_day_room` WRITE;
/*!40000 ALTER TABLE `package_day_room` DISABLE KEYS */;
INSERT INTO `package_day_room` VALUES (1,1),(2,1),(3,1),(4,1),(5,2),(6,2),(7,2),(8,2),(9,2),(10,5),(11,5),(12,5),(13,5),(14,5);
/*!40000 ALTER TABLE `package_day_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_day_sale_tour`
--

DROP TABLE IF EXISTS `package_day_sale_tour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package_day_sale_tour` (
  `tour_package_sale_id` int(11) NOT NULL,
  `package_day_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  PRIMARY KEY (`tour_package_sale_id`,`package_day_id`,`tour_id`),
  KEY `fk_pdst_tour_package_sale` (`tour_package_sale_id`),
  KEY `fk_pdst_package_day` (`package_day_id`),
  KEY `fk_pdst_tour` (`tour_id`),
  CONSTRAINT `fk_pdst_package_day` FOREIGN KEY (`package_day_id`) REFERENCES `package_day` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pdst_tour` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pdst_tour_package_sale` FOREIGN KEY (`tour_package_sale_id`) REFERENCES `tour_package_sale` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_day_sale_tour`
--

LOCK TABLES `package_day_sale_tour` WRITE;
/*!40000 ALTER TABLE `package_day_sale_tour` DISABLE KEYS */;
INSERT INTO `package_day_sale_tour` VALUES (3,1,4),(3,2,4),(3,3,4),(3,4,4),(4,1,4),(4,2,4),(4,3,4),(4,4,4),(5,1,4),(5,2,1),(5,3,4),(5,4,1);
/*!40000 ALTER TABLE `package_day_sale_tour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `package_detail`
--

DROP TABLE IF EXISTS `package_detail`;
/*!50001 DROP VIEW IF EXISTS `package_detail`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `package_detail` (
  `id` int(11),
  `transport_type` tinyint(4),
  `passage_price_adult` decimal(6,2),
  `passage_price_children` decimal(6,2),
  `estimated_adult` tinyint(4),
  `estimated_children` tinyint(4),
  `local_id` int(11),
  `country` varchar(80),
  `state` varchar(80),
  `city` varchar(80),
  `begin_date` date,
  `end_date` date,
  `days` bigint(21),
  `min_price` decimal(27,2)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `tour`
--

DROP TABLE IF EXISTS `tour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `price_adult` decimal(6,4) NOT NULL,
  `price_children` decimal(6,4) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_t_local` (`local_id`),
  CONSTRAINT `fk_t_local` FOREIGN KEY (`local_id`) REFERENCES `local` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour`
--

LOCK TABLES `tour` WRITE;
/*!40000 ALTER TABLE `tour` DISABLE KEYS */;
INSERT INTO `tour` VALUES (1,1,'Parque do Paço','15.0000','5.0000','Passeio muito legal no parque do paço de Diadema. Tem quadras e floresta.'),(2,2,'Estatua da Liberdade','50.0000','25.0000','Um tour na maravilhosa estatua da liberdade e bla bla'),(3,4,'Praia de Copacabana','20.0000','10.0000','Um tour na praia mais quente do Brasil.'),(4,1,'Passeio na coca','25.0000','10.0000','Passeio muito legal na favela mais perigosa de diadema');
/*!40000 ALTER TABLE `tour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour_package`
--

DROP TABLE IF EXISTS `tour_package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tour_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination_id` int(11) NOT NULL,
  `transport_type` tinyint(4) NOT NULL,
  `passage_price_adult` decimal(6,2) NOT NULL,
  `passage_price_children` decimal(6,2) NOT NULL,
  `estimated_adult` tinyint(4) NOT NULL,
  `estimated_children` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tp_local` (`destination_id`),
  CONSTRAINT `fk_tp_local` FOREIGN KEY (`destination_id`) REFERENCES `local` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour_package`
--

LOCK TABLES `tour_package` WRITE;
/*!40000 ALTER TABLE `tour_package` DISABLE KEYS */;
INSERT INTO `tour_package` VALUES (1,1,2,'100.00','60.00',2,0),(2,2,1,'2500.00','2000.00',2,2),(3,4,1,'300.00','300.00',1,0),(4,4,2,'100.00','80.00',1,0);
/*!40000 ALTER TABLE `tour_package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour_package_sale`
--

DROP TABLE IF EXISTS `tour_package_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tour_package_sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tour_package_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `adults` tinyint(4) NOT NULL,
  `childrens` tinyint(4) NOT NULL,
  `price_total` decimal(10,2) NOT NULL,
  `payment_status` tinyint(4) NOT NULL,
  `sale_code` varchar(40) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tps_tourpackage` (`tour_package_id`),
  CONSTRAINT `fk_tps_tourpackage` FOREIGN KEY (`tour_package_id`) REFERENCES `tour_package` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour_package_sale`
--

LOCK TABLES `tour_package_sale` WRITE;
/*!40000 ALTER TABLE `tour_package_sale` DISABLE KEYS */;
INSERT INTO `tour_package_sale` VALUES (3,1,'anizark@gmail.com',2,0,'0.00',1,'58faa0ce5004c49cf21d526f571c87e305194194','2011-09-21 14:54:50'),(4,1,'teste@mail.com',2,0,'1000.00',1,'5da612a4e8024d575656695d21cfcbb7d878e15b','2011-09-21 15:12:16'),(5,1,'teste@mail.com',2,0,'960.00',1,'952473df81d6569eb3bff74d58e2276bed933e7e','2011-09-21 15:46:28');
/*!40000 ALTER TABLE `tour_package_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `tourism`
--

USE `tourism`;

--
-- Final view structure for view `package_detail`
--

/*!50001 DROP TABLE IF EXISTS `package_detail`*/;
/*!50001 DROP VIEW IF EXISTS `package_detail`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `package_detail` AS select `tp`.`id` AS `id`,`tp`.`transport_type` AS `transport_type`,`tp`.`passage_price_adult` AS `passage_price_adult`,`tp`.`passage_price_children` AS `passage_price_children`,`tp`.`estimated_adult` AS `estimated_adult`,`tp`.`estimated_children` AS `estimated_children`,`l`.`id` AS `local_id`,`l`.`country` AS `country`,`l`.`state` AS `state`,`l`.`city` AS `city`,min(`pd`.`date`) AS `begin_date`,max(`pd`.`date`) AS `end_date`,count(`pd`.`id`) AS `days`,(((`tp`.`estimated_adult` * `tp`.`passage_price_adult`) + (`tp`.`passage_price_children` * `tp`.`estimated_children`)) + (count(`pd`.`id`) * max(`hr`.`price`))) AS `min_price` from ((((`tour_package` `tp` join `local` `l` on((`l`.`id` = `tp`.`destination_id`))) join `package_day` `pd` on((`tp`.`id` = `pd`.`tour_package`))) join `package_day_room` `pdr` on((`pd`.`id` = `pdr`.`package_day_id`))) join `hostel_room` `hr` on((`pdr`.`hostel_room_id` = `hr`.`id`))) group by `tp`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-09-22 10:41:10
