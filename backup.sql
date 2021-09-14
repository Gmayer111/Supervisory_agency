-- MySQL dump 10.13  Distrib 5.7.32, for osx10.12 (x86_64)
--
-- Host: localhost    Database: intelligence_agency
-- ------------------------------------------------------
-- Server version	5.7.32

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
-- Table structure for table `Admins`
--

DROP TABLE IF EXISTS `Admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Admins` (
  `id` int(36) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `codeName` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codeName` (`codeName`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Admins`
--

LOCK TABLES `Admins` WRITE;
/*!40000 ALTER TABLE `Admins` DISABLE KEYS */;
INSERT INTO `Admins` VALUES (1,'Gael','Mayer','p4$$w0rd','HUNT'),(9,'ADMIN1','Jean','$2y$10$sDOQlq0WKtk7ys/EQkQR7.T6naZw87hdsF8emFqH4S.cUauEMuIR6','Valjean'),(10,'BUNDI','Jeana','$2y$10$PipuJz8hrs67pTQOTdGiFecGm8NZENKi7rC917xAtLDloAjp/l6Si','admin');
/*!40000 ALTER TABLE `Admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Agents`
--

DROP TABLE IF EXISTS `Agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Agents` (
  `codeName` varchar(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `nationality` varchar(60) NOT NULL,
  `competenceOne` varchar(100) NOT NULL,
  `competenceTwo` varchar(100) DEFAULT NULL,
  `competenceThree` varchar(100) DEFAULT NULL,
  `dateOfBirth` datetime NOT NULL,
  `agent_Mission` varchar(200) NOT NULL,
  `id` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`codeName`),
  UNIQUE KEY `id` (`id`),
  KEY `agent_Mission` (`agent_Mission`),
  KEY `codeName` (`codeName`),
  CONSTRAINT `agent_Mission` FOREIGN KEY (`agent_Mission`) REFERENCES `Missions` (`codeName`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Agents`
--

LOCK TABLES `Agents` WRITE;
/*!40000 ALTER TABLE `Agents` DISABLE KEYS */;
INSERT INTO `Agents` VALUES ('AGENT 1','John','Doe','Serbe','Traducteur de conversation','Traducteur de conversation','Traducteur de conversation','2022-09-26 00:00:00','MISSION 1',40);
/*!40000 ALTER TABLE `Agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Contacts`
--

DROP TABLE IF EXISTS `Contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contacts` (
  `codeName` varchar(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `nationality` varchar(60) NOT NULL,
  `dateOfBirth` datetime NOT NULL,
  `contact_Mission` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`codeName`),
  KEY `contact_Mission` (`contact_Mission`),
  CONSTRAINT `contact_Mission` FOREIGN KEY (`contact_Mission`) REFERENCES `Missions` (`codeName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contacts`
--

LOCK TABLES `Contacts` WRITE;
/*!40000 ALTER TABLE `Contacts` DISABLE KEYS */;
INSERT INTO `Contacts` VALUES ('CONTACT 1','Jean','Valjean','France','2022-09-26 00:00:00','MISSION 1'),('CONTACT 4','Vlazi','Brada','Japon','2022-09-28 00:00:00','MISSION 4');
/*!40000 ALTER TABLE `Contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Missions`
--

DROP TABLE IF EXISTS `Missions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Missions` (
  `codeName` varchar(200) NOT NULL,
  `idun` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `country` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `competence` varchar(50) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  PRIMARY KEY (`codeName`),
  UNIQUE KEY `idun` (`idun`),
  KEY `codeName` (`codeName`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Missions`
--

LOCK TABLES `Missions` WRITE;
/*!40000 ALTER TABLE `Missions` DISABLE KEYS */;
INSERT INTO `Missions` VALUES ('MISSION 1',1,'Mission Test n°1','Très ciblées et sophistiquées, les attaques utilisées pour l\'espionnage à des fins économiques ou scientifiques sont souvent le fait de groupes structurés ...','France','Surveillance','En préparation','Ninja','2021-08-25 00:00:00','2021-08-26 00:00:00'),('MISSION 2',2,'Mission Test n°2','Les activités et le domaine du renseignement sont aussi souvent assimilées à l\'« espionnage », qui désigne plus spécifiquement des activités de surveillance (ou ...','Italie','Surveillance','Echec','Ninja breton','2022-09-26 00:00:00','2022-09-26 00:00:00'),('MISSION 3',3,'Mission Test n°3','Les activités et le domaine du renseignement sont aussi souvent assimilées à l\'« espionnage », qui désigne plus spécifiquement des activités de surveillance (ou ...','France','Surveillance','Terminée','Ninja','2022-09-26 00:00:00','2022-09-26 00:00:00'),('MISSION 4',4,'Mission Test n°4','Infiltrez vous dans un bunker de l\'armée et désarmocez une bombe comme un véritable agent dans nos salles d\'Escape Game Team Break.','Japon','Surveillance','Terminée','Ninja expert','2022-09-28 00:00:00','2022-09-28 00:00:00'),('MISSION 5',5,'Mission Test n°5','De très nombreux exemples de phrases traduites contenant &quot;mission de repérage&quot; – Dictionnaire anglais-français et moteur de recherche de traductions ...','France','Surveillance','Echec','Ninja','2022-10-03 00:00:00','2022-10-03 00:00:00');
/*!40000 ALTER TABLE `Missions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Safe_houses`
--

DROP TABLE IF EXISTS `Safe_houses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Safe_houses` (
  `code` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` varchar(60) NOT NULL,
  `type` varchar(60) NOT NULL,
  `sf_Mission` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `sf_Mission` (`sf_Mission`),
  CONSTRAINT `sf_Mission` FOREIGN KEY (`sf_Mission`) REFERENCES `Missions` (`codeName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Safe_houses`
--

LOCK TABLES `Safe_houses` WRITE;
/*!40000 ALTER TABLE `Safe_houses` DISABLE KEYS */;
INSERT INTO `Safe_houses` VALUES ('PLANQUE 1','4 rue Dunois, 75013 PARIS','France','house','MISSION 1'),('PLANQUE 3','4 rue Dunois, 75013 PARIS','France','apartment','MISSION 3'),('PLANQUE 5','4 rue Dunois, 75013 PARIS','Japon','factory','MISSION 4');
/*!40000 ALTER TABLE `Safe_houses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Targets`
--

DROP TABLE IF EXISTS `Targets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Targets` (
  `codeName` varchar(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dateOfBirth` datetime NOT NULL,
  `nationality` varchar(60) NOT NULL,
  `localisation` varchar(100) NOT NULL,
  `target_Mission` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`codeName`),
  KEY `target_Mission` (`target_Mission`),
  CONSTRAINT `target_Mission` FOREIGN KEY (`target_Mission`) REFERENCES `Missions` (`codeName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Targets`
--

LOCK TABLES `Targets` WRITE;
/*!40000 ALTER TABLE `Targets` DISABLE KEYS */;
INSERT INTO `Targets` VALUES ('TARGET 1','Jeana','Brada','2022-09-26 00:00:00','Canadienne','Vannes','MISSION 1'),('TARGET 3','Jeana','Brada','2022-09-26 00:00:00','Canadienne','Vannes','MISSION 3'),('TARGET 4','Jean','Valjean','2022-09-28 00:00:00','Italienne','St Avé','MISSION 4');
/*!40000 ALTER TABLE `Targets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-14 16:52:29
