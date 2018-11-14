-- MySQL dump 10.13  Distrib 5.6.22, for Win64 (x86_64)
--
-- Host: localhost    Database: reestr
-- ------------------------------------------------------
-- Server version	5.6.22-log

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
-- Table structure for table `folder`
--

DROP TABLE IF EXISTS `folder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `folder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT 'Новая папка',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `folder`
--

LOCK TABLES `folder` WRITE;
/*!40000 ALTER TABLE `folder` DISABLE KEYS */;
/*!40000 ALTER TABLE `folder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `number`
--

DROP TABLE IF EXISTS `number`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(5) NOT NULL,
  `year` int(3) NOT NULL,
  `in_out` tinyint(1) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `number_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `number`
--

LOCK TABLES `number` WRITE;
/*!40000 ALTER TABLE `number` DISABLE KEYS */;
INSERT INTO `number` VALUES (1,258,19,0,1),(2,222,18,0,3);
/*!40000 ALTER TABLE `number` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `output_reestr`
--

DROP TABLE IF EXISTS `output_reestr`;
/*!50001 DROP VIEW IF EXISTS `output_reestr`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `output_reestr` AS SELECT 
 1 AS `number`,
 1 AS `year`,
 1 AS `theme`,
 1 AS `receipt_date`,
 1 AS `content`,
 1 AS `bind_files`,
 1 AS `in_out`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_date` datetime DEFAULT NULL,
  `theme` varchar(255) NOT NULL DEFAULT 'Без темы',
  `content` text,
  `bind_files` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ID` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'2018-10-23 00:00:00','Тема письма 222','Содержание 222',NULL),(3,'2018-08-23 12:00:00','Тема письма 2','Содержание письма 2',NULL);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_folder`
--

DROP TABLE IF EXISTS `post_folder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_folder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `folder_id` (`folder_id`),
  CONSTRAINT `post_folder_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  CONSTRAINT `post_folder_ibfk_2` FOREIGN KEY (`folder_id`) REFERENCES `folder` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_folder`
--

LOCK TABLES `post_folder` WRITE;
/*!40000 ALTER TABLE `post_folder` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_folder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `post_reestr_view`
--

DROP TABLE IF EXISTS `post_reestr_view`;
/*!50001 DROP VIEW IF EXISTS `post_reestr_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `post_reestr_view` AS SELECT 
 1 AS `post_reestr_id`,
 1 AS `number`,
 1 AS `year`,
 1 AS `theme`,
 1 AS `receipt_date`,
 1 AS `content`,
 1 AS `bind_files`,
 1 AS `in_out`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `reestr_view`
--

DROP TABLE IF EXISTS `reestr_view`;
/*!50001 DROP VIEW IF EXISTS `reestr_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `reestr_view` AS SELECT 
 1 AS `id`,
 1 AS `number`,
 1 AS `year`,
 1 AS `theme`,
 1 AS `receipt_date`,
 1 AS `content`,
 1 AS `bind_files`,
 1 AS `in_out`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `output_reestr`
--

/*!50001 DROP VIEW IF EXISTS `output_reestr`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`Gurikin`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `output_reestr` AS (select `number`.`number` AS `number`,`number`.`year` AS `year`,`post`.`theme` AS `theme`,`post`.`receipt_date` AS `receipt_date`,`post`.`content` AS `content`,`post`.`bind_files` AS `bind_files`,`number`.`in_out` AS `in_out` from (`post` join `number` on(((`number`.`post_id` = `post`.`id`) and (`number`.`in_out` = 1))))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `post_reestr_view`
--

/*!50001 DROP VIEW IF EXISTS `post_reestr_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`Gurikin`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `post_reestr_view` AS (select `post`.`id` AS `post_reestr_id`,`number`.`number` AS `number`,`number`.`year` AS `year`,`post`.`theme` AS `theme`,`post`.`receipt_date` AS `receipt_date`,`post`.`content` AS `content`,`post`.`bind_files` AS `bind_files`,`number`.`in_out` AS `in_out` from (`post` join `number` on((`number`.`post_id` = `post`.`id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `reestr_view`
--

/*!50001 DROP VIEW IF EXISTS `reestr_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`Gurikin`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `reestr_view` AS (select `post`.`id` AS `id`,`number`.`number` AS `number`,`number`.`year` AS `year`,`post`.`theme` AS `theme`,`post`.`receipt_date` AS `receipt_date`,`post`.`content` AS `content`,`post`.`bind_files` AS `bind_files`,`number`.`in_out` AS `in_out` from (`post` join `number` on(((`number`.`post_id` = `post`.`id`) and (`number`.`in_out` = 0))))) */;
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

-- Dump completed on 2018-11-10 21:38:49
