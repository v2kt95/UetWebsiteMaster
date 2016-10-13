CREATE DATABASE  IF NOT EXISTS `bookstore` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bookstore`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bookstore
-- ------------------------------------------------------
-- Server version	5.7.13-log

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
-- Table structure for table `bookmarks`
--

DROP TABLE IF EXISTS `bookmarks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(10) NOT NULL,
  `newsId` int(10) NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookmarks`
--

LOCK TABLES `bookmarks` WRITE;
/*!40000 ALTER TABLE `bookmarks` DISABLE KEYS */;
INSERT INTO `bookmarks` VALUES (245,1,1,0,'2016-10-01 04:03:14','2016-10-01 04:03:14');
/*!40000 ALTER TABLE `bookmarks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cateId` int(10) NOT NULL,
  `authId` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `shortDescription` varchar(1000) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `ratingPoint` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,1,1,'Sách giáo khoa toán 1','Sách giáo khoa toán dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(2,1,1,'Tiếng Việt tập 1 lớp 1','Sách giáo khoa Tiếng Việt dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(3,1,1,'Bài tập Tiếng Việt tập 1 lớp 1','Bài tập Tiếng Việt tập 1 dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(4,1,1,'Tự nhiên và xã hội lớp 1','Sách giáo khoa tự nhiên và xã hội dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(5,1,1,'Tiếng Việt tập 2 lớp 1','Sách giáo khoa Tiếng Việt tập 2 dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(6,1,1,'Bài tập Tiếng Việt tập 2 lớp 1','Bài tập Tiếng Việt tập 2 lớp 1 dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(7,1,1,'Đạo đức lớp 1','Sách giáo khoa Đạo đức dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(8,1,1,'Tập vẽ 1','Sách tập vẽ dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(9,1,1,'Bài tập đạo đức lớp 1','Sách Bài tập đạo đức lớp 1 dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(10,1,1,'Toán tập 2 lớp 1','Sách giáo khoa Toán tập 2 lớp 1 dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(11,1,1,'Bài tập toán 1 lớp 1','Bài tập toán 1 lớp 1 dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(12,1,1,'Bài tập toán 2  lớp 1','Bài tập toán 1 lớp 1 dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(13,3,2,'Tiếng Việt lớp 1','Sách giáo khoa toán dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(14,3,2,'Tiếng Việt lớp 1','Sách giáo khoa toán dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(15,3,2,'Tiếng Việt lớp 1','Sách giáo khoa toán dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(16,3,2,'Tiếng Việt lớp 1','Sách giáo khoa toán dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(17,3,2,'Tiếng Việt lớp 1','Sách giáo khoa toán dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(18,3,2,'Tiếng Việt lớp 1','Sách giáo khoa toán dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(19,3,2,'Tiếng Việt lớp 1','Sách giáo khoa toán dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0),(20,3,2,'Tiếng Việt lớp 1','Sách giáo khoa toán dành cho học sinh lớp 1 do nhà xuất bản giáo dục phát hành trên toàn quốc',1,5,'2016-10-01 03:09:18','2016-10-01 03:09:18',0);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Sách giáo khoa','2016-10-01 03:02:56','2016-10-01 03:02:56'),(2,'Truyện cổ tích','2016-10-01 03:02:56','2016-10-01 03:02:56'),(3,'Chuyên ngành khoa học máy tính','2016-10-01 03:02:56','2016-10-01 03:02:56'),(4,'Tin học cơ bản','2016-10-01 03:02:56','2016-10-01 03:02:56'),(5,'Tiểu thuyết','2016-10-01 03:02:56','2016-10-01 03:02:56'),(6,'Chuyên ngành điện tử viễn thông','2016-10-01 03:05:52','2016-10-01 03:05:52'),(7,'Ẩm thực','2016-10-01 03:05:52','2016-10-01 03:05:52'),(8,'Tạp chí','2016-10-01 03:05:52','2016-10-01 03:05:52'),(9,'Ngoại ngữ','2016-10-01 03:05:52','2016-10-01 03:05:52'),(10,'Truyện tranh','2016-10-01 03:05:52','2016-10-01 03:05:52'),(11,'Khoa học và đời sống','2016-10-01 03:05:52','2016-10-01 03:05:52'),(12,'Khác...','2016-10-01 03:05:52','2016-10-01 03:05:52');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fileentries`
--

DROP TABLE IF EXISTS `fileentries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fileentries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `original_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fileentries`
--

LOCK TABLES `fileentries` WRITE;
/*!40000 ALTER TABLE `fileentries` DISABLE KEYS */;
INSERT INTO `fileentries` VALUES (1,'php344B.tmp.jpg','image/jpeg','htc_one_m9_stock-1366x768.jpg','2016-06-28 19:57:09','2016-06-28 19:57:09'),(2,'php609C.tmp.jpg','image/jpeg','love_flower_3-wallpaper-1366x768.jpg','2016-06-28 19:57:21','2016-06-28 19:57:21'),(3,'php96FF.tmp.jpg','image/jpeg','daylight_green_fields-1366x768.jpg','2016-06-28 19:57:35','2016-06-28 19:57:35'),(4,'php5A05.tmp.jpg','image/jpeg','dragon_18-wallpaper-1366x768.jpg','2016-06-29 00:12:55','2016-06-29 00:12:55'),(5,'php29C0.tmp.jpg','image/jpeg','Game_AiLaTrieuPhu.jpg','2016-07-19 08:00:56','2016-07-19 08:00:56'),(6,'phpBC2D.tmp.jpg','image/jpeg','Game_AiLaTrieuPhu.jpg','2016-07-19 08:01:33','2016-07-19 08:01:33'),(7,'php73A7.tmp.jpg','image/jpeg','Game_AiLaTrieuPhu.jpg','2016-07-19 08:02:20','2016-07-19 08:02:20'),(8,'php2852.tmp.jpg','image/jpeg','Game_AiLaTrieuPhu.jpg','2016-07-19 08:03:06','2016-07-19 08:03:06'),(9,'php85AC.tmp.jpg','image/jpeg','logo.jpg','2016-07-19 08:05:41','2016-07-19 08:05:41');
/*!40000 ALTER TABLE `fileentries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) NOT NULL DEFAULT '""',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'2016-10-01 03:10:53','2016-10-01 03:10:53','sgk_toan_1.jpg'),(2,'2016-10-01 04:08:26','2016-10-01 04:08:26','sgk_tiengviet_1.jpg'),(3,'2016-10-01 04:32:29','2016-10-01 04:32:29','bai_tap_tv_1.jpg'),(4,'2016-10-01 04:32:29','2016-10-01 04:32:29','tu_nhien_xa_hoi_1.jpg'),(5,'2016-10-01 04:32:29','2016-10-01 04:32:29','tieng_viet_1_2.jpg'),(6,'2016-10-01 04:32:29','2016-10-01 04:32:29','bai_tap_tv_2.jpg'),(7,'2016-10-01 04:32:29','2016-10-01 04:32:29','dao_duc_1.jpg'),(8,'2016-10-01 04:32:29','2016-10-01 04:32:29','tap_ve_1.jpg'),(9,'2016-10-01 04:32:29','2016-10-01 04:32:29','bai_tap_dao_duc_1.jpg'),(10,'2016-10-01 04:32:29','2016-10-01 04:32:29','sgk_toan_1_2.jpg'),(11,'2016-10-01 04:32:29','2016-10-01 04:32:29','bt_toan_1_1.jpg'),(12,'2016-10-01 04:32:29','2016-10-01 04:32:29','bt_toan_1_2.jpg'),(13,'2016-10-01 04:32:29','2016-10-01 04:32:29','c_p_p.jpg'),(14,'2016-10-01 04:32:29','2016-10-01 04:32:29','tin_4.jpg'),(15,'2016-10-01 04:32:29','2016-10-01 04:32:29','oop.jpg'),(16,'2016-10-01 04:32:29','2016-10-01 04:32:29','soa.jpg'),(17,'2016-10-01 04:32:29','2016-10-01 04:32:29','ooad.jpg'),(18,'2016-10-01 04:32:29','2016-10-01 04:32:29','dip.jpg'),(19,'2016-10-01 04:32:29','2016-10-01 04:32:29','php.jpg'),(20,'2016-10-01 04:32:29','2016-10-01 04:32:29','js.jpg'),(21,'2016-10-02 16:12:47','2016-10-02 16:12:47','default.jpg');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsimages`
--

DROP TABLE IF EXISTS `newsimages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsimages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `newsId` int(10) NOT NULL,
  `imageId` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsimages`
--

LOCK TABLES `newsimages` WRITE;
/*!40000 ALTER TABLE `newsimages` DISABLE KEYS */;
INSERT INTO `newsimages` VALUES (1,1,1,'2016-10-01 03:10:35','2016-10-01 03:10:35'),(2,2,2,'2016-10-01 04:09:20','2016-10-01 04:09:20'),(3,3,3,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(4,4,4,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(5,5,5,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(6,6,6,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(7,7,7,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(8,8,8,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(9,9,9,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(10,10,10,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(11,11,11,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(12,12,12,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(13,13,13,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(14,14,14,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(15,15,15,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(16,16,16,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(17,17,17,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(18,18,18,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(19,19,19,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(20,20,20,'2016-10-01 04:20:50','2016-10-01 04:20:50'),(27,26,21,'2016-10-02 16:31:42','2016-10-02 16:31:42'),(28,27,21,'2016-10-02 16:32:49','2016-10-02 16:32:49'),(29,28,21,'2016-10-02 16:33:34','2016-10-02 16:33:34');
/*!40000 ALTER TABLE `newsimages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `gender` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'nữ',
  `dateOfBirth` varchar(50) COLLATE utf8_unicode_ci DEFAULT '1995-01-01',
  `homeTown` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Ba Vì - Hà Nội',
  `hobbies` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'street workout',
  `sortDescription` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Hello I’m Jenifer Smith, a leading expert in interactive and creative design specializing in the mobile medium.',
  `phone` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0909999999',
  `imageId` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Nhà xuất bản giáo dục','vietnamedu@gmail.com','$2y$10$HFe0DHjoxEpUrLEvzKFXfOs9JMkK45ltQL1ttCqBaRgHdF.AWV5Yu','BrZUT3VBla2ej2sQSu7Im84V4h7nVgGIYkBRfHLDTtzM33NKzuYDOvdGwpaU','2016-06-29 19:40:44','2016-09-07 02:24:06',0,'khác','1995-01-01',' Hà Nội','Xuất bản sách giáo khoa các cấp','Nhà xuất bản giáo dục thuộc bộ giáo dục và đào tạo.','04000000001','3'),(2,'Nhà xuất bản Đại học quốc gia Hà Nội','vnu.edu@gmail.com','$2y$10$RZOjS02nHyIFpP3eVSsK2.wKHaomUAC9t1sfIp6N4CZ1c3xi0aAWW','IcJuv4t2RPJ8rUiZYVUx212TXjD9yi3g7Tgw2ZwCQoT56gZFgflFQ5o7xVZp','2016-06-29 01:17:08','2016-09-08 11:35:24',0,'khác','2016-07-05','Hà Nội','Xuất bản sách về các ngành đào tạo trong đại học','Xuất bản sách về các ngành đào tạo trong đại học','0904999999','1'),(3,'viewer','admin2@gmail.com','$2y$10$JD3L4l8F9KY4M51D.0wKdux4BIMx6nuDJLKVxYj4oVBolLQ4UjKhi','oYIX4pn3DemnZqhamvMWElNjF59mrMUFxcNAiqb7Bo5xJr8zfVYacytmAr1D','2016-06-29 19:40:44','2016-07-19 08:59:51',1,'nữ','1995-01-01','Ba Vì - Hà Nội','street workout','Hello I’m Jenifer Smith, a leading expert in interactive and creative design specializing in the mobile medium.','0909999999','1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bookstore'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-05 23:11:03
