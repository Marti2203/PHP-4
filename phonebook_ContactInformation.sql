-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: phonebook
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Table structure for table `ContactInformation`
--

DROP TABLE IF EXISTS `ContactInformation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ContactInformation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `FamilyName` varchar(45) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `PhoneNumber` varchar(13) NOT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Gender` varchar(45) DEFAULT NULL,
  `Note` varchar(200) DEFAULT NULL,
  `PictureName` varchar(45) DEFAULT NULL,
  `DateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `PhoneNumber_UNIQUE` (`PhoneNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ContactInformation`
--

LOCK TABLES `ContactInformation` WRITE;
/*!40000 ALTER TABLE `ContactInformation` DISABLE KEYS */;
INSERT INTO `ContactInformation` VALUES (1,'Martin','Mirchev','Burgas','+356884766666','marti_2203@abv.bg','Male',' 222','3ZDhxja.jpg','2017-05-21 19:10:59'),(2,'John','Sofiev','Sofia','+123456789101','john@abv.bg','Male',NULL,'3wzU1M0.jpg','2017-05-21 19:13:28'),(5,'John','Kirov','Burgas','+123456789102','Jonkata@abv.bg','Male','22222','53CpOcS.png','2017-05-21 19:26:34'),(7,'Test','Ksa','Kirgistan','+123456789104','Test@abv.gg','Male','2231 ','2RQh1Rd.jpg','2017-05-21 21:15:49'),(8,'Tast','Kisss','Plovdiv','+356884766633','Test@abv.gf','Male',' 123131','5VB2OOu.jpg','2017-05-21 21:19:57'),(9,'Pesho','Peshev','Plovdiv','+123456789133','pesho@abv.bg','Male',' KIRO','4D4M1VL.jpg','2017-05-22 12:07:24'),(10,'Ivo','Peshev','Plovdiv','+123456789144','ivo@abv.bg','Male','IVAILOS','3ZDhxja.jpg','2017-05-22 12:07:44');
/*!40000 ALTER TABLE `ContactInformation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-22 19:34:55
