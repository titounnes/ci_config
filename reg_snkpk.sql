-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.04.1

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
-- Table structure for table `biodata`
--

DROP TABLE IF EXISTS `biodata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biodata` (
  `id` int(11) NOT NULL DEFAULT '0',
  `pre_name` varchar(50) DEFAULT NULL,
  `post_name` varchar(50) DEFAULT NULL,
  `affiliation` text,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `full_name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biodata`
--

LOCK TABLES `biodata` WRITE;
/*!40000 ALTER TABLE `biodata` DISABLE KEYS */;
INSERT INTO `biodata` VALUES (3,'Drs','S.H','Unnes','085','Gu','Harjitp'),(4,'Drs.','S.H','Unnes','085640776086','Gunungpati','Mizano'),(5,'Ir.','S.Pd','Unnes','012345678','Semarang','Trisna');
/*!40000 ALTER TABLE `biodata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('22k3pqpqphqlq0e0ec7690l8h4i9rvsh','127.0.0.1',1493080475,'__ci_last_regenerate|i:1493080460;login|s:0:\"\";user_id|s:1:\"4\";roles|a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}identity|s:14:\"anu@email.com5\";logedIn|b:1;biodata|s:1:\"4\";payment|s:1:\"4\";'),('57ntt5h6kelksuohoesn6q7sbcg9djkq','127.0.0.1',1492686137,'__ci_last_regenerate|i:1492686075;login|s:0:\"\";user_id|s:1:\"4\";roles|a:1:{i:0;s:1:\"3\";}identity|s:14:\"anu@email.com5\";logedIn|b:1;biodata|i:0;abstract|s:1:\"4\";fullpapper|s:1:\"4\";struct|s:1:\"4\";payment|s:1:\"4\";'),('bfdc3nevams0aifp6brpa3qbs0hhius6','127.0.0.1',1492830736,'__ci_last_regenerate|i:1492830721;login|s:0:\"\";user_id|s:1:\"4\";roles|a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}identity|s:14:\"anu@email.com5\";logedIn|b:1;'),('cvil601p55428fam447jbqocmpa9t3tf','127.0.0.1',1492569746,'__ci_last_regenerate|i:1492569466;login|s:0:\"\";user_id|s:1:\"3\";roles|a:1:{i:0;s:1:\"3\";}identity|s:14:\"anu@email.com7\";logedIn|b:1;biodata|s:1:\"3\";payment|s:1:\"3\";'),('d711i85ljlfsn1l3kbg3i9dk73tsmlk0','127.0.0.1',1492693448,'__ci_last_regenerate|i:1492693448;'),('ddfh9j0bfc45i8fglqqv65rfkcnk4mh6','127.0.0.1',1492600713,'__ci_last_regenerate|i:1492600532;signup|s:0:\"\";login|s:0:\"\";'),('dgkm3jhiqjj56mu2ari0hs8hu607e687','127.0.0.1',1492446756,'__ci_last_regenerate|i:1492446606;signup|s:0:\"\";login|s:0:\"\";user_id|s:1:\"1\";roles|a:1:{i:0;s:1:\"3\";}identity|s:14:\"anu@email.com7\";logedIn|b:1;biodata|s:1:\"1\";'),('f103778f4vkmjqbf55df1uachvdp9u6b','127.0.0.1',1493014717,'__ci_last_regenerate|i:1493014714;login|s:0:\"\";forgot|s:0:\"\";expired|N;signup|s:0:\"\";|i:7;'),('fftqs2pkv880i81ae2vuod19if6j5h5i','127.0.0.1',1492703850,'__ci_last_regenerate|i:1492703816;login|s:0:\"\";user_id|s:1:\"4\";roles|a:1:{i:0;s:1:\"3\";}identity|s:14:\"anu@email.com5\";logedIn|b:1;fullpapper|s:1:\"4\";abstract|s:1:\"4\";biodata|s:1:\"4\";payment|s:1:\"4\";struct|s:1:\"4\";'),('gj6mkgc6sui9o0gm779hjk4nai5hm212','127.0.0.1',1493100048,'__ci_last_regenerate|i:1493100048;abstract|s:19:\"2017-08-15 23:59:59\";event|s:19:\"2017-10-14 07:00:00\";fullpapper|s:19:\"2017-09-04 23:59:59\";payment_listener|s:19:\"2017-10-07 23:59:59\";payment_writer|s:19:\"2017-09-04 23:59:59\";'),('h49p4kslkdmc5ktqdkd70mpaa6o7509j','127.0.0.1',1492783442,'__ci_last_regenerate|i:1492783293;login|s:0:\"\";user_id|s:1:\"4\";roles|a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}identity|s:14:\"anu@email.com5\";logedIn|b:1;struct|s:1:\"4\";abstract|s:1:\"4\";membership|s:1:\"4\";payment|s:1:\"4\";biodata|s:1:\"4\";fullpapper|s:1:\"4\";'),('h4ohprpcofcengdlbp3u1v8mbrrk06r5','127.0.0.1',1492586016,'__ci_last_regenerate|i:1492585789;login|s:0:\"\";signup|s:0:\"\";user_id|s:1:\"4\";roles|a:1:{i:0;s:1:\"3\";}identity|s:14:\"anu@email.com5\";logedIn|b:1;biodata|s:1:\"4\";membership|s:1:\"4\";payment|s:1:\"4\";struct|s:1:\"4\";'),('inf9fhiu6itufturu2cnq2vc60ulrb4p','127.0.0.1',1492539618,'__ci_last_regenerate|i:1492539515;login|s:0:\"\";signup|s:0:\"\";user_id|s:1:\"3\";roles|a:1:{i:0;s:1:\"3\";}identity|s:14:\"anu@email.com7\";logedIn|b:1;membership|s:1:\"3\";biodata|s:1:\"3\";payment|s:1:\"3\";abstract|s:1:\"3\";fullpapper|s:1:\"3\";struct|s:1:\"3\";status|s:1:\"3\";'),('jchom0lavl5m152u9d6umm5osf2coi17','127.0.0.1',1493091434,'__ci_last_regenerate|i:1493091434;abstract|s:19:\"2017-08-15 23:59:59\";event|s:19:\"2017-10-14 07:00:00\";fullpapper|s:19:\"2017-09-04 23:59:59\";payment_listener|s:19:\"2017-10-07 23:59:59\";payment_writer|s:19:\"2017-09-04 23:59:59\";login|s:0:\"\";user_id|s:1:\"4\";roles|a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}identity|s:14:\"anu@email.com5\";logedIn|b:1;biodata|s:1:\"4\";membership|s:1:\"4\";'),('kf1n8m935kt409n2kk4ffotc872c19t5','127.0.0.1',1493095948,'__ci_last_regenerate|i:1493095729;abstract|s:19:\"2017-08-15 23:59:59\";event|s:19:\"2017-10-14 07:00:00\";fullpapper|s:19:\"2017-09-04 23:59:59\";payment_listener|s:19:\"2017-10-07 23:59:59\";payment_writer|s:19:\"2017-09-04 23:59:59\";'),('lh6gnvpr2anmta5avj31lli4ricmuqqt','127.0.0.1',1493088956,'__ci_last_regenerate|i:1493088956;'),('m3i718lapq87bv30lpfi4pgikj0a3m1t','127.0.0.1',1492823036,'__ci_last_regenerate|i:1492822800;login|s:0:\"\";user_id|s:1:\"4\";roles|a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}identity|s:14:\"anu@email.com5\";logedIn|b:1;biodata|s:1:\"4\";membership|s:1:\"4\";payment|s:1:\"4\";struct|s:1:\"4\";abstract|s:1:\"4\";fullpapper|s:1:\"4\";'),('m66rf9lsbr0vutktu8m0lmrv276qghn7','127.0.0.1',1492582444,'__ci_last_regenerate|i:1492582224;signup|s:0:\"\";|i:4;login|s:0:\"\";user_id|s:1:\"4\";roles|a:1:{i:0;s:1:\"3\";}identity|s:14:\"anu@email.com5\";logedIn|b:1;biodata|s:1:\"4\";'),('nujbnbcajca5p48bi6rna4324d8cf7q8','127.0.0.1',1492708846,'__ci_last_regenerate|i:1492708725;bash|s:0:\"\";login|s:0:\"\";user_id|s:1:\"4\";roles|a:1:{i:0;s:1:\"3\";}identity|s:14:\"anu@email.com5\";logedIn|b:1;membership|s:1:\"4\";biodata|s:1:\"4\";payment|s:1:\"4\";'),('ofv1jn3jcr9c60tdfifbk3fd2avggqjs','127.0.0.1',1492562630,'__ci_last_regenerate|i:1492562543;signup|s:0:\"\";'),('ovnufrb2o7v1big83ko72dc9hk29jgf2','127.0.0.1',1492747452,'__ci_last_regenerate|i:1492747291;login|s:0:\"\";user_id|s:1:\"4\";roles|a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}identity|s:14:\"anu@email.com5\";logedIn|b:1;biodata|s:1:\"4\";payment|s:1:\"4\";membership|s:1:\"4\";struct|s:1:\"4\";abstract|s:1:\"4\";list|s:1:\"4\";awaitingMember|s:1:\"4\";'),('pa6rlgm7orvoifevbqd6nt6h0iajnilj','127.0.0.1',1493024906,'__ci_last_regenerate|i:1493024765;login|s:0:\"\";forgot|s:0:\"\";'),('plj7jdiikhjc5tr3qej1eoi7du0lh7e6','127.0.0.1',1492594071,'__ci_last_regenerate|i:1492594069;'),('q8oisbp7u9l3q7smneuivtl7tgos0a93','127.0.0.1',1492417292,'__ci_last_regenerate|i:1492417292;signup|s:0:\"\";|i:1;validation_errors|s:75:\"<p>The Email field is required.</p>\n<p>The passwrod field is required.</p>\n\";'),('re82rku1igpd409b9u2rvpq5mgse94lq','127.0.0.1',1492529497,'__ci_last_regenerate|i:1492529375;login|s:0:\"\";user_id|s:1:\"3\";roles|a:1:{i:0;s:1:\"3\";}identity|s:14:\"anu@email.com7\";logedIn|b:1;membership|s:1:\"3\";payment|s:1:\"3\";abstract|s:1:\"3\";fullpapper|s:1:\"3\";'),('rige1f6n6fiaqga07lrtsaf5t8tgvlds','127.0.0.1',1493053567,'__ci_last_regenerate|i:1493053567;login|s:0:\"\";user_id|s:1:\"4\";roles|a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}identity|s:14:\"anu@email.com5\";logedIn|b:1;biodata|s:1:\"4\";membership|s:1:\"4\";payment|s:1:\"4\";struct|s:1:\"4\";fullpapper|s:1:\"4\";abstract|s:1:\"4\";factur|s:1:\"4\";'),('tp7jj5br0upunpohk6m5pdu3vihj92oi','127.0.0.1',1492592047,'__ci_last_regenerate|i:1492591958;signup|s:0:\"\";login|s:0:\"\";'),('vseen80dvdj1akopbajjaomfv5tcp4me','127.0.0.1',1492601377,'__ci_last_regenerate|i:1492601108;login|s:0:\"\";user_id|s:1:\"4\";roles|a:1:{i:0;s:1:\"3\";}identity|s:14:\"anu@email.com5\";logedIn|b:1;biodata|s:1:\"4\";membership|i:0;payment|s:1:\"4\";payment/full|s:1:\"4\";');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `limiter`
--

DROP TABLE IF EXISTS `limiter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `limiter` (
  `section` varchar(50) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`section`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `limiter`
--

LOCK TABLES `limiter` WRITE;
/*!40000 ALTER TABLE `limiter` DISABLE KEYS */;
INSERT INTO `limiter` VALUES ('abstract','2017-08-15 23:59:59'),('event','2017-10-14 07:00:00'),('fullpapper','2017-09-04 23:59:59'),('payment_listener','2017-10-07 23:59:59'),('payment_writer','2017-09-04 23:59:59');
/*!40000 ALTER TABLE `limiter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `fee` decimal(8,0) DEFAULT NULL,
  `money` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'Peserta Pendengar',150000,'seratus limapuluh ribu rupiah'),(2,'Pemakalah Industri',300000,'tiga ratus ribu rupiah'),(3,'Pemakalah Guru/Dosen',250000,'dua ratus lima puluh ribu rupiah'),(4,'Pemakalah Mahasiswa',200000,'dua ratus ribu rupiah');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin'),(2,'bendahara'),(3,'peserta');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `original_name` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` datetime DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `midle_name` varchar(100) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `pict_profile` text NOT NULL,
  `soft_delete` timestamp NULL DEFAULT NULL,
  `gender` int(1) NOT NULL,
  `old_password` text,
  `user_id` varchar(40) DEFAULT NULL,
  `token_user` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'','','$2y$12$KUa2UdJm5sPcQLKTW04BmeEU6FYoI8cggzsRv1j9glJWDash7TEnC',NULL,'anu@email.com7',NULL,'$2y$12$MnN6tNqgzpb1343X9AfkE.0wB6HmtqtO/','2017-04-24 13:42:05',NULL,0,NULL,NULL,NULL,'',NULL,NULL,NULL,'',NULL,0,NULL,NULL,NULL),(4,'','','$2y$12$O8bYjwoFdZ9mCJqT/.xnpOrWRrmLYeRp3tYZSO2aYjnHmDmLUWsPy',NULL,'anu@email.com5',NULL,'$2y$12$mZBunsTRp09sGoBEAVzYX.TOFqMIOt2SJ','2017-04-24 12:51:18',NULL,0,NULL,NULL,NULL,'',NULL,NULL,NULL,'',NULL,0,NULL,NULL,NULL),(5,'','','$2y$12$BYXGJneiLJeQq3EhWxpcV.SWaMosMGQpo/rlYx52KVPeuwokGCNYO',NULL,'anu@email.co.id',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'',NULL,NULL,NULL,'',NULL,0,NULL,NULL,NULL),(7,'','','$2y$12$.m2AW.N8db4Hc5ySO46o1.oQ8ebM8gK2EAdD8UFX4xMYrU7hT4VtS',NULL,'zano.amrhakim@gmail.com',NULL,'$2y$12$U8eHVV9e1NLPG6Tt/N0JI.4f2SUM0IQrG','2017-04-24 17:06:17',NULL,0,NULL,NULL,NULL,'',NULL,NULL,NULL,'',NULL,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_member`
--

DROP TABLE IF EXISTS `user_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_member` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `member_id` int(5) NOT NULL DEFAULT '0',
  `notif` text,
  `confirm` tinyint(1) NOT NULL DEFAULT '0',
  `print` tinyint(1) DEFAULT NULL,
  `struct` tinyint(1) DEFAULT NULL,
  `abstract` tinyint(1) DEFAULT NULL,
  `full_papper` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_member`
--

LOCK TABLES `user_member` WRITE;
/*!40000 ALTER TABLE `user_member` DISABLE KEYS */;
INSERT INTO `user_member` VALUES (1,1,NULL,0,NULL,NULL,NULL,NULL),(2,1,'0',0,0,0,NULL,NULL),(3,1,'aa#123#harjito#123-aku#2017/04/17#24:00',0,NULL,NULL,NULL,NULL),(4,3,'BNI#01234567#Harjito#12345#2017/04/17#20:00',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `role_id` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (3,2),(3,3),(4,2),(4,3),(5,3),(6,3),(7,3);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-25 13:57:47
