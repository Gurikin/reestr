-- MySQL dump 10.13  Distrib 5.6.22, for Win64 (x86_64)
--
-- Host: localhost    Database: yii-reestr
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
-- Table structure for table `input_post`
--

DROP TABLE IF EXISTS `input_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `input_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(5) DEFAULT NULL,
  `receipt_date` datetime DEFAULT NULL,
  `theme` varchar(255) NOT NULL DEFAULT 'Без темы',
  `content` text,
  `bind_files` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `input_post`
--

LOCK TABLES `input_post` WRITE;
/*!40000 ALTER TABLE `input_post` DISABLE KEYS */;
/*!40000 ALTER TABLE `input_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `output_post`
--

DROP TABLE IF EXISTS `output_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `output_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(5) DEFAULT NULL,
  `receipt_date` datetime DEFAULT NULL,
  `theme` varchar(255) NOT NULL DEFAULT 'Без темы',
  `content` text,
  `bind_files` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `output_post`
--

LOCK TABLES `output_post` WRITE;
/*!40000 ALTER TABLE `output_post` DISABLE KEYS */;
/*!40000 ALTER TABLE `output_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_bind`
--

DROP TABLE IF EXISTS `post_bind`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_bind` (
  `bind_id` int(11) NOT NULL AUTO_INCREMENT,
  `input_id` int(11) NOT NULL,
  `output_id` int(11) NOT NULL,
  PRIMARY KEY (`bind_id`),
  KEY `input_id` (`input_id`),
  KEY `output_id` (`output_id`),
  CONSTRAINT `post_bind_ibfk_1` FOREIGN KEY (`input_id`) REFERENCES `input_post` (`id`),
  CONSTRAINT `post_bind_ibfk_2` FOREIGN KEY (`output_id`) REFERENCES `output_post` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_bind`
--

LOCK TABLES `post_bind` WRITE;
/*!40000 ALTER TABLE `post_bind` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_bind` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-20 22:35:51
