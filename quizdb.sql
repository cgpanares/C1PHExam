-- MySQL dump 10.16  Distrib 10.1.44-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: quizdb
-- ------------------------------------------------------
-- Server version	10.1.44-MariaDB-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `user_ID` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `permission` varchar(1000) NOT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'DSadmin','$1$q1DHcPsR$Sns9tOA1RrRachpJlnCgY0','root');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `a_id` int(100) NOT NULL AUTO_INCREMENT,
  `ans` varchar(10000) NOT NULL,
  `ans_id` int(100) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=313 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,'ping 192.168.1.1',1),(2,'ping -t 192.168.1.1',1),(3,'ping -l 192.168.1.1',1),(4,'ping -loop 192.168.1.1',1);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passwordtest`
--

DROP TABLE IF EXISTS `passwordtest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passwordtest` (
  `p_id` int(100) NOT NULL AUTO_INCREMENT,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passwordtest`
--

LOCK TABLES `passwordtest` WRITE;
/*!40000 ALTER TABLE `passwordtest` DISABLE KEYS */;
/*!40000 ALTER TABLE `passwordtest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `percentage`
--

DROP TABLE IF EXISTS `percentage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `percentage` (
  `percent_id` int(100) NOT NULL AUTO_INCREMENT,
  `passed_val` int(100) NOT NULL,
  `failed_val` int(100) NOT NULL,
  PRIMARY KEY (`percent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `percentage`
--

LOCK TABLES `percentage` WRITE;
/*!40000 ALTER TABLE `percentage` DISABLE KEYS */;
INSERT INTO `percentage` VALUES (1,0,9);
/*!40000 ALTER TABLE `percentage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `q_id` int(100) NOT NULL AUTO_INCREMENT,
  `question` varchar(10000) NOT NULL,
  `ans` int(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `fin` int(11) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Which command would you use to ping a system in a loop from a Windows PC?',2,1,0);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usersession`
--

DROP TABLE IF EXISTS `usersession`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usersession` (
  `u_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `u_q_id` int(100) NOT NULL,
  `u_a_id` int(100) NOT NULL,
  `net_sc` int(11) NOT NULL,
  `win_sc` int(11) NOT NULL,
  `lin_sc` int(11) NOT NULL,
  `clo_sc` int(11) NOT NULL,
  `vir_sc` int(11) NOT NULL,
  `dev_sc` int(11) NOT NULL,
  `db_sc` int(11) NOT NULL,
  `ot_sc` int(11) NOT NULL,
  `ess_sc` int(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `month` varchar(10000) NOT NULL,
  `year` varchar(10000) NOT NULL,
  `essay_sc1` varchar(2000) NOT NULL,
  `essay_sc2` varchar(2000) NOT NULL,
  `essay_sc3` varchar(2000) NOT NULL,
  `essay_sc4` varchar(2000) NOT NULL,
  `essay_sc5` varchar(2000) NOT NULL,
  `q_essay_id1` int(100) NOT NULL,
  `q_essay_id2` int(100) NOT NULL,
  `q_essay_id3` int(100) NOT NULL,
  `q_essay_id4` int(100) NOT NULL,
  `q_essay_id5` int(100) NOT NULL,
  `sc1_essay` int(11) NOT NULL,
  `sc2_essay` int(11) NOT NULL,
  `sc3_essay` int(11) NOT NULL,
  `sc4_essay` int(11) NOT NULL,
  `sc5_essay` int(11) NOT NULL,
  `net_sc_array` varchar(1000) NOT NULL,
  `win_sc_array` varchar(1000) NOT NULL,
  `lin_sc_array` varchar(1000) NOT NULL,
  `clo_sc_array` varchar(1000) NOT NULL,
  `vir_sc_array` varchar(1000) NOT NULL,
  `dev_sc_array` varchar(1000) NOT NULL,
  `db_sc_array` varchar(1000) NOT NULL,
  `ot_sc_array` varchar(1000) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usersession`
--

LOCK TABLES `usersession` WRITE;
/*!40000 ALTER TABLE `usersession` DISABLE KEYS */;
INSERT INTO `usersession` VALUES (1,'test name',60,24,6,2,6,5,2,0,1,2,1,'08/12/2019 05:18:01 pm','July','2019','','','','Check the IP address of the server - make sure you are on the same vlan<br />\r\nTry to ping the server\'s IP address<br />\r\nUse another workstation to check id the server is turned on - see if that other workstation can connect to the server<br />\r\nTry to turn off windows firewall on the workstation','',63,64,65,66,67,0,0,0,0,0,'','','','','','','','');
/*!40000 ALTER TABLE `usersession` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-21 19:14:40
