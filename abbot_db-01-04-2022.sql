-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: abbot_db
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agent_disputes`
--

DROP TABLE IF EXISTS `agent_disputes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agent_disputes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_id` int DEFAULT NULL,
  `audit_reference` varchar(255) DEFAULT NULL,
  `audit_collectiondate` varchar(255) DEFAULT NULL,
  `audit_processdate` varchar(255) DEFAULT NULL,
  `week` varchar(255) DEFAULT NULL,
  `audit_date` varchar(255) DEFAULT NULL,
  `overall_score` varchar(255) DEFAULT NULL,
  `rebuttal_reason` varchar(255) DEFAULT NULL,
  `new_score` varchar(255) DEFAULT NULL,
  `dispute_summary` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `adispute_emp_id_idx` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent_disputes`
--

LOCK TABLES `agent_disputes` WRITE;
/*!40000 ALTER TABLE `agent_disputes` DISABLE KEYS */;
INSERT INTO `agent_disputes` VALUES (2,13,'42asdad','10/29/2021','10/29/2021','2','10/29/2021','100','test','test','test','2021-10-08','2021-10-08');
/*!40000 ALTER TABLE `agent_disputes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bat_audits`
--

DROP TABLE IF EXISTS `bat_audits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bat_audits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_id` int DEFAULT NULL,
  `auditor` varchar(255) DEFAULT NULL,
  `audit_reference` varchar(255) DEFAULT NULL,
  `audit_collectiondate` varchar(255) DEFAULT NULL,
  `audit_processdate` varchar(255) DEFAULT NULL,
  `week` varchar(255) DEFAULT NULL,
  `tenureship` varchar(255) DEFAULT NULL,
  `audit_date` varchar(255) DEFAULT NULL,
  `audit_time` varchar(255) DEFAULT NULL,
  `audit_count` varchar(255) DEFAULT NULL,
  `fatal_score` varchar(255) DEFAULT NULL,
  `nonfatal_score` varchar(255) DEFAULT NULL,
  `overall_score` varchar(255) DEFAULT NULL,
  `rft` varchar(255) DEFAULT NULL,
  `fatal_clientinfo` varchar(255) DEFAULT NULL,
  `fatal_donorssn` varchar(255) DEFAULT NULL,
  `fatal_testinfo` varchar(255) DEFAULT NULL,
  `fatal_routing` varchar(255) DEFAULT NULL,
  `nonfatal_testnum` varchar(255) DEFAULT NULL,
  `nonfatal_doc` varchar(255) DEFAULT NULL,
  `nonfatal_donorinfo` varchar(255) DEFAULT NULL,
  `call_summary` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `baudit_emp_id_idx` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bat_audits`
--

LOCK TABLES `bat_audits` WRITE;
/*!40000 ALTER TABLE `bat_audits` DISABLE KEYS */;
INSERT INTO `bat_audits` VALUES (1,15,'19','1','11/10/2021','11/10/2021','Week 2','Tenured','11/10/2021','7:15 AM','1','100','100','99','Yes','Pass','Pass','Pass','Pass','50','20','30','','2021-11-09 23:18:53','2021-11-09 23:18:53'),(4,25,'19','2','11/10/2021','11/10/2021','Week 2','Tenured','11/10/2021','8:15 AM','1','100','100','99','Yes','Pass','Pass','Pass','Pass','50','20','30','','2021-11-10 00:15:28','2021-11-10 00:15:28'),(5,25,'19','3','11/10/2021','11/10/2021','Week 2','Tenured','11/10/2021','8:15 AM','1','100','0','99','Yes','Pass','Pass','Pass','Pass','0','0','0','','2021-11-10 00:16:25','2021-11-10 00:16:25'),(6,25,'19','4','11/10/2021','11/10/2021','Week 2','Tenured','11/10/2021','8:30 AM','1','100','90','99','Yes','Pass','Pass','Pass','Pass','50','20','20','','2021-11-10 00:27:16','2021-11-10 00:27:16'),(9,25,'19','5','11/10/2021','11/10/2021','Week 2','Tenured','11/10/2021','9:00 AM','1','0','100','-1','Yes','Fail','Pass','Fail','Pass','50','20','30','','2021-11-10 00:51:47','2021-11-10 00:51:47');
/*!40000 ALTER TABLE `bat_audits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donor_audits`
--

DROP TABLE IF EXISTS `donor_audits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donor_audits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_id` int DEFAULT NULL,
  `auditor` varchar(255) DEFAULT NULL,
  `audit_reference` varchar(255) DEFAULT NULL,
  `audit_collectiondate` varchar(255) DEFAULT NULL,
  `audit_processdate` varchar(255) DEFAULT NULL,
  `week` varchar(255) DEFAULT NULL,
  `tenureship` varchar(255) DEFAULT NULL,
  `audit_date` varchar(255) DEFAULT NULL,
  `audit_time` varchar(255) DEFAULT NULL,
  `audit_count` varchar(255) DEFAULT NULL,
  `fatal_score` varchar(255) DEFAULT NULL,
  `nonfatal_score` varchar(255) DEFAULT NULL,
  `overall_score` varchar(255) DEFAULT NULL,
  `rft` varchar(255) DEFAULT NULL,
  `fatal_hipaa` varchar(255) DEFAULT NULL,
  `nonfatal_greeting` varchar(255) DEFAULT NULL,
  `nonfatal_purpose` varchar(255) DEFAULT NULL,
  `nonfatal_callproper` varchar(255) DEFAULT NULL,
  `nonfatal_updateacc` varchar(255) DEFAULT NULL,
  `nonfatal_doc` varchar(255) DEFAULT NULL,
  `nonfatal_log` varchar(255) DEFAULT NULL,
  `nonfatal_handling` varchar(255) DEFAULT NULL,
  `call_summary` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `daudit_emp_id_idx` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donor_audits`
--

LOCK TABLES `donor_audits` WRITE;
/*!40000 ALTER TABLE `donor_audits` DISABLE KEYS */;
/*!40000 ALTER TABLE `donor_audits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `error_coachings`
--

DROP TABLE IF EXISTS `error_coachings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `error_coachings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_id` int DEFAULT NULL,
  `audit_reference` varchar(255) DEFAULT NULL,
  `audit_collectiondate` varchar(255) DEFAULT NULL,
  `audit_processdate` varchar(255) DEFAULT NULL,
  `week` varchar(255) DEFAULT NULL,
  `audit_date` varchar(255) DEFAULT NULL,
  `overall_score` varchar(255) DEFAULT NULL,
  `call_summary` varchar(255) DEFAULT NULL,
  `why_one` varchar(255) DEFAULT NULL,
  `why_two` varchar(255) DEFAULT NULL,
  `why_three` varchar(255) DEFAULT NULL,
  `why_four` varchar(255) DEFAULT NULL,
  `why_five` varchar(255) DEFAULT NULL,
  `coaching_summary` varchar(255) DEFAULT NULL,
  `action_plan` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ecoaching_emp_id_idx` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `error_coachings`
--

LOCK TABLES `error_coachings` WRITE;
/*!40000 ALTER TABLE `error_coachings` DISABLE KEYS */;
INSERT INTO `error_coachings` VALUES (2,13,'42asdad','10/29/2021','10/29/2021','2','10/29/2021','100','test','test','test','test','test','test','test','test','2021-10-08 07:31:44','2021-10-08 07:46:36');
/*!40000 ALTER TABLE `error_coachings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qa_coachings`
--

DROP TABLE IF EXISTS `qa_coachings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qa_coachings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_id` int DEFAULT NULL,
  `coaching_month` varchar(255) DEFAULT NULL,
  `coaching_connect` varchar(255) DEFAULT NULL,
  `coaching_engage` varchar(255) DEFAULT NULL,
  `coaching_check` varchar(255) DEFAULT NULL,
  `coaching_notes` mediumtext,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_id_idx` (`emp_id`),
  KEY `coaching_emp_id_idx` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qa_coachings`
--

LOCK TABLES `qa_coachings` WRITE;
/*!40000 ALTER TABLE `qa_coachings` DISABLE KEYS */;
INSERT INTO `qa_coachings` VALUES (5,13,'February','test connect','test engage','adasd','notes','2021-10-08 08:06:00','2021-10-08 08:06:00');
/*!40000 ALTER TABLE `qa_coachings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qa_goals`
--

DROP TABLE IF EXISTS `qa_goals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qa_goals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_id` int DEFAULT NULL,
  `goal_title` varchar(255) DEFAULT NULL,
  `goal_details` varchar(255) DEFAULT NULL,
  `goal_progress` varchar(255) DEFAULT NULL,
  `goal_deadline` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_id_idx` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qa_goals`
--

LOCK TABLES `qa_goals` WRITE;
/*!40000 ALTER TABLE `qa_goals` DISABLE KEYS */;
INSERT INTO `qa_goals` VALUES (4,13,'Provide Test Goal','Goal Details','50%','10/08/2021','2021-10-08 07:00:21','2021-10-27 03:59:24');
/*!40000 ALTER TABLE `qa_goals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) DEFAULT NULL,
  `emp_hiredate` date DEFAULT NULL,
  `emp_firstname` varchar(255) DEFAULT NULL,
  `emp_lastname` varchar(255) DEFAULT NULL,
  `emp_fullname` varchar(255) DEFAULT NULL,
  `emp_email` varchar(255) DEFAULT NULL,
  `emp_position` varchar(255) DEFAULT NULL,
  `emp_team` varchar(255) DEFAULT NULL,
  `emp_manager` varchar(255) DEFAULT NULL,
  `emp_supervisor` varchar(255) DEFAULT NULL,
  `emp_username` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_dir` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `temp_password` varchar(255) DEFAULT NULL,
  `createdby_id` int DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (13,'TEST-001','2021-04-22','Denny','Martinez','Denny Martinez','denny.itdwebdev@gmail.com','QA Manager','Donor Contact','13','','denny.itdwebdev@gmail.com','1628592219751.jpg','10bb25a3-ddaf-4fb7-9952-f7fbb5f91bd9','$2y$10$4FOajhVL3AQpEBHoeMxc4ePmX8AMV4EEwzb.IW4C/.kgkEXE8zLKu','Ps487K9a',10,'2021-10-04 08:10:14','2021-11-09 00:27:19'),(14,'TEST-002','2021-10-01','Jane','Doe','Jane Doe','hotmarycorleone@gmail.com','Supervisor/MSE','Donor Contact','13','','hotmarycorleone@gmail.com',NULL,NULL,'$2y$10$hisLwpWdE5k2GoWjcA3XeeUihqTA902h7HX0.1kb/uNrXLnOfAdxG','2AyWANhL',13,'2003-12-31 16:14:03','2021-10-28 07:06:11'),(15,'TEST-003','2016-11-16','Luckylyn','Voz','Luckylyn Voz','lucklylyn@test.com','Agents/Employees','Breathe Alcohol','14','','TEST-003',NULL,NULL,'$2y$10$6uRCY6ud3hgOoeiiT9UJJ.ZZG9boaMonI5z0A49qd.eM2fHajtJ8u',NULL,14,'2021-10-20 05:49:56','2021-10-20 05:49:56'),(17,'TEST-005','2021-10-27','Roderick','Bonifacio','Roderick Bonifacio','pinoyprogrammerph@gmail.com','Administrator','Breathe Alcohol','15','16','TEST-005',NULL,NULL,'$2y$10$kMJeS/g0vk16VvVtxMe.Ru0yA5dwI80YSW466OW86bAJ8FxMisjda',NULL,15,'2021-10-27 04:43:59','2021-11-09 00:44:49'),(18,'EMP001','2021-10-06','Jericho','Aguilon','Jericho Aguilon','jericho.aguilon@gmail.com','Administrator','Donor Contact','13','17','EMP001',NULL,NULL,'$2y$10$3dLUszcYtn7wcznfmhudIO2W3Qny388uIrkcwiDLRXytDgNrz0Nbe','jEOGUFQD',NULL,'2021-11-09 00:48:51','2021-11-10 01:35:29'),(19,'EMP002','2021-11-10','JP','Aguilon','JP Aguilon','jericho.aguilon@gmail.com','QA Analysts','Breathe Alcohol','15','15','EMP002',NULL,NULL,'$2y$10$a65rMrsCA0aAzY3/OuYkMuOVOECpZzxcm0/B0xjHR5IPECzCLnR4u',NULL,NULL,'2021-11-09 23:13:16','2021-11-10 01:35:06'),(20,'EMP003','2021-11-10','Jelay','Nangan','Jelay Nangan','jelay@gmail.com','QA Manager','Breathe Alcohol','','','EMP003',NULL,NULL,'$2y$10$tBaEKudC0wEUP6/F723/gec9P.kYpmzmkeSSha.yA8h.l9.m4jgy.',NULL,NULL,'2021-11-09 23:31:38','2021-11-09 23:31:38'),(21,'EMP004','2021-11-10','Ben','Man','Ben Man','ben@gmail.com','Supervisor/MSE','Breathe Alcohol','22','','EMP004',NULL,NULL,'$2y$10$Tt9u1s/zKrosBdX7jTe3POpzi/gjAlvpuC4/70Cj4L0fnzzDclTWi',NULL,NULL,'2021-11-09 23:39:29','2021-11-09 23:45:29'),(22,'EMP005','2021-11-10','Maxwell','A','Maxwell A','maxwell@gmail.com','Operations Manager','Breathe Alcohol','','','EMP005',NULL,NULL,'$2y$10$wj0xJxXidKKEwZUvhfiWTu2HSsvCAn9WGXFBAMcJgnu.BENe6fneC',NULL,NULL,'2021-11-09 23:45:09','2021-11-09 23:45:09'),(23,'EMP006','2021-11-11','Paul','Albano','Paul Albano','paul@gmail.com','QA Analysts','Donor Contact','20','','EMP006',NULL,NULL,'$2y$10$sVpNqEpNh2wazwL7rOC8SO1d7ezEKaSwDvpqWsDa9grysNi8W6sA2',NULL,NULL,'2021-11-09 23:54:06','2021-11-09 23:54:06'),(24,'EMP007','2021-11-10','Jeric','Aban','Jeric Aban','jeric@gmail.com','Agents/Employees','Donor Contact','22','21','EMP007',NULL,NULL,'$2y$10$m3HIeL0aClsHrdjtIlg.Du8LW/aLrctAfL9UrypZwD75NqxBGl4Pu',NULL,NULL,'2021-11-10 00:07:34','2021-11-10 00:07:34'),(25,'EMP008','2021-11-10','Pat','Nicolas','Pat Nicolas','pat@gmail.com','Agents/Employees','Breathe Alcohol','22','21','EMP008',NULL,NULL,'$2y$10$srmKHxulaOvWQg7/7piUX.7Q6In6QeSAXJRAYNHAV6Bpzvv6BFHcO',NULL,NULL,'2021-11-10 00:14:35','2021-11-10 00:14:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-04 19:01:58
