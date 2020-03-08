-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20191228111038','2019-12-28 11:10:49'),('20191230004455','2019-12-30 00:45:21'),('20191230022315','2019-12-30 02:23:36');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`),
  UNIQUE KEY `UNIQ_1483A5E9DD206A7B` (`bio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'anxhina.gjoni@fti.edu','$argon2id$v=19$m=65536,t=4,p=1$bKUsvB+0QcC3POqd1IWjHg$KLDuJPHKnJ1I8VA8UkohMweuSNKFQm7mHj1B9k9GQ2c','[]','',''),(2,'anxhina@yahoo.com','$argon2id$v=19$m=65536,t=4,p=1$OLELPwk32hopFvSFmniv+g$nIGMkTtRrqGbrq71MriYhWq13Cp93xZTr2dbZqkZUwU','[]','anxhina','wefrgthtgf'),(3,'anxhinoni@fti.edu','$argon2id$v=19$m=65536,t=4,p=1$5Ub0pS5h0j5wmpIRqEbTfA$TsBW0nNxdF7ppj3e0h0mtCDOEbmvMeee8mL0t5TzL6E','[]','anxhina','xcdvc'),(5,'gjoni@fti.edu','$argon2id$v=19$m=65536,t=4,p=1$pKj+FUJXdODT8AmFGT6hfQ$ewqIJVpAWu67cT2T7TvuKm/ZDLTUZWH67xys/o6ieLU','[]','anxhina','wefrgthtgfnm');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_list`
--

DROP TABLE IF EXISTS `users_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name_of_list` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8B41B616A76ED395` (`user_id`),
  CONSTRAINT `FK_8B41B616A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_list`
--

LOCK TABLES `users_list` WRITE;
/*!40000 ALTER TABLE `users_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-30 10:59:53
