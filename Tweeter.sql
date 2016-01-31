-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: Tweeter
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `Comments`
--

DROP TABLE IF EXISTS `Comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tweet_id` int(11) NOT NULL,
  `text` varchar(60) COLLATE utf8_polish_ci DEFAULT NULL,
  `dataDodania` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `tweet_id` (`tweet_id`),
  CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`),
  CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`tweet_id`) REFERENCES `Tweets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comments`
--

LOCK TABLES `Comments` WRITE;
/*!40000 ALTER TABLE `Comments` DISABLE KEYS */;
INSERT INTO `Comments` VALUES (9,20,14,'ergrtgtrg','2016-01-31 11:36:25'),(10,20,14,'dfgergt4hh','2016-01-31 11:36:32'),(11,20,14,'dfgdfgdfg','2016-01-31 11:37:39'),(12,20,14,'dfgdfgd','2016-01-31 11:37:44'),(13,20,14,'ertert','2016-01-31 11:38:44'),(14,20,14,'sdfsdf','2016-01-31 11:39:29'),(15,20,14,'Najnowszy komentarz','2016-01-31 11:39:38'),(16,20,14,'asdf','2016-01-31 11:43:10'),(17,20,9,'KOmentarz 1','2016-01-31 11:43:39'),(18,20,15,'Komentarz do tresci dfgsfdf','2016-01-31 11:44:16'),(19,20,2,'ble ble ble','2016-01-31 11:50:13'),(20,22,2,'ble ble 2','2016-01-31 11:51:38'),(21,22,14,'Komentujê','2016-01-31 11:54:05'),(22,22,14,'Komentarz kolejny','2016-01-31 11:56:48'),(23,22,14,'Moj najnowszy testowy komentarz :)','2016-01-31 12:13:06'),(24,22,18,'FiuFIu','2016-01-31 13:02:42'),(25,22,14,'We¼ na luz, dasz radê','2016-01-31 13:06:45'),(26,22,14,':)','2016-01-31 13:06:54'),(27,20,19,'Nie jest tak ¼le ;)','2016-01-31 17:38:00'),(28,20,19,'Bêdzie dobrze :D','2016-01-31 17:40:00');
/*!40000 ALTER TABLE `Comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Messages`
--

DROP TABLE IF EXISTS `Messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `send_id` int(11) NOT NULL,
  `receive_id` int(11) NOT NULL,
  `text` varchar(500) COLLATE utf8_polish_ci DEFAULT NULL,
  `dataWyslania` datetime DEFAULT NULL,
  `przeczytana` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `send_id` (`send_id`),
  KEY `receive_id` (`receive_id`),
  CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`send_id`) REFERENCES `Users` (`id`),
  CONSTRAINT `Messages_ibfk_2` FOREIGN KEY (`receive_id`) REFERENCES `Users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Messages`
--

LOCK TABLES `Messages` WRITE;
/*!40000 ALTER TABLE `Messages` DISABLE KEYS */;
INSERT INTO `Messages` VALUES (1,20,22,'Wiadomo¶æ, próba 1','2016-01-31 14:14:54',1),(2,20,22,'Cze¶æ Rafa³ek, wys³a³em Ci moj± drug± wiadomo¶æ','2016-01-31 15:03:18',1),(3,20,22,'siema siema niez³a ¶ciema ;)','2016-01-31 15:04:45',1),(4,20,22,'siema siema niez³a ¶ciema dzi¶ niedziela ;)','2016-01-31 15:05:13',1),(5,22,20,'Wiadomo¶æ do qwerty','2016-01-31 15:28:42',0),(6,22,12,'Wiadomo¶æ wys³ana do Piotrka przez Rafalka','2016-01-31 15:31:10',1),(7,20,1,'Wys³a³em wiadomosc do u¿ytkownika Rafal','2016-01-31 15:54:39',1),(8,20,10,'wiadomosc do Bogdana','2016-01-31 15:57:00',1),(9,20,1,'Cze¶æ Rafa³!','2016-01-31 16:04:59',1),(10,22,20,' Pierwsza wiadomka do qwerty','2016-01-31 16:15:10',0),(11,20,1,'sdfsdfsdfsdfsdf ','2016-01-31 17:32:26',1),(12,20,1,' Wpsdasd','2016-01-31 17:33:20',1),(13,20,1,'bddbtrbfb','2016-01-31 17:33:46',1),(14,20,1,' Wprowadz tekst swosdasdasdjej wiadomosci ','2016-01-31 17:34:59',1),(15,20,1,'Ble ble ble','2016-01-31 17:35:21',1);
/*!40000 ALTER TABLE `Messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tweets`
--

DROP TABLE IF EXISTS `Tweets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tweets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `text` varchar(140) COLLATE utf8_polish_ci DEFAULT NULL,
  `addDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `Tweets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tweets`
--

LOCK TABLES `Tweets` WRITE;
/*!40000 ALTER TABLE `Tweets` DISABLE KEYS */;
INSERT INTO `Tweets` VALUES (1,7,'dzien dobry',NULL),(2,20,'dzien dobry po raz drugi',NULL),(3,20,'',NULL),(4,20,'',NULL),(5,20,'',NULL),(6,20,'fgdfgdfg',NULL),(7,20,'W³asnie dodaje mojego pierwszego dzialajacego tweeta',NULL),(8,20,'Trudne jest to programowanie',NULL),(9,20,'ale dam radê, bo jest te¿ bardzo ciekawe',NULL),(10,20,'³adny dzi¶ dzieñ by³','2016-01-30 15:02:59'),(11,22,'ble ble ble','2016-01-30 15:07:18'),(12,22,'ura bura','2016-01-30 15:25:58'),(13,22,'szef podwóra','2016-01-30 15:26:09'),(14,22,'ale mam dzi¶ zepsuty dzieñ','2016-01-30 15:27:21'),(15,20,'dfgsfdf','2016-01-30 19:17:45'),(16,20,'sfgergeg','2016-01-30 19:19:14'),(17,20,'adasdasdasdadsasd','2016-01-30 19:26:12'),(18,20,'','2016-01-31 11:02:15'),(19,20,'Dzi¶ niedziela','2016-01-31 16:00:29'),(20,20,'Dzieñ dziecka siê Skoñczy³','2016-01-31 17:40:20');
/*!40000 ALTER TABLE `Tweets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `password` char(60) COLLATE utf8_polish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'Rafal','email@ble.pl','$2y$11$sUuQiVMvFsp4STT76lAD3epLPGuxkBG4y8/4C/zSA7zrZEtSPJImu','Jeszcze nowszy opis'),(7,'Marian','email2@ble.pl','$2y$11$EQQLewzREr4xwl637s66ceFpp/rLvblCI0i2CmToZy40S51PJLFT2','duÅ¼y bialy czlowiek'),(10,'Bogdan','email3@ble.pl','$2y$11$WgHr9AEwZV130ThSuKDnrONKVMlAOox4lOZHVLXJ0PCvBWvpP5Rm6','duÅ¼y bialy czlowiek'),(12,'Piotrek','email4@ble.pl','$2y$11$ME9pQExsQUXWsQ.teOZcveNw/.jRrdEFNa5qqMzBXmtPGnxDGG7bi','duÅ¼y bialy czlowiek'),(15,'Basia','email5@ble.pl','$2y$11$b6V0TxMLCJyuGLsynYVZFe90vHPclEZCatjg/cmKzyzKc/azgz4oK','duÅ¼y bialy czlowiek'),(16,'Basiaa','eemail5@ble.pl','$2y$11$xw2i3KZ..Iej6Um4qKolNu5b/pmy6z3jLODFnqUWOIW8k8ajRovHS','duÅ¼y bialy czlowiek'),(17,'Rerek','rafalek@bleble.pl','$2y$11$PvcDVoWCzOkOoX3W54WItuRIM8lq4Nh/lX8Dnq./97GDSR4YumwY2','Mistrzunio'),(19,'Zenek','Mail@ble.pl','$2y$11$JaGlrh9LNWzbteJ/DMT4fOcolnYtOQqHLaBzEvv0XlBAhNlNCa7Eu','sdfsdfsdfsf'),(20,'qwerty','ja@ja.pl','$2y$11$yeZFOZMrkKgKfyViwkDyS.LKt.7gXls.oQFciJgk7r1y3up9PNwLS','sfggsg'),(21,'Miecio','mietek@wp.pl','$2y$11$uwLJu//rzvXnr.0k.CVBo./JXkxpoeTYsVsMtawTbirfU/7wdcwSi','Bezrobotny'),(22,'rafalek','R@R','$2y$11$AcoVdbmk/w1rkvUhh5jt0ec0YSMY9Mkw14PcaplyCeeaN5pULhlku','Lubi placki');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-31 18:45:49
