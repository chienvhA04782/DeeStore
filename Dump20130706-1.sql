CREATE DATABASE  IF NOT EXISTS `deestore` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `deestore`;
-- MySQL dump 10.13  Distrib 5.6.11, for Win64 (x86_64)
--
-- Host: localhost    Database: deestore
-- ------------------------------------------------------
-- Server version	5.6.11

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminAccount` varchar(45) DEFAULT NULL,
  `AdminPassword` varchar(45) DEFAULT NULL,
  `AdminStatus` bit(1) DEFAULT NULL,
  PRIMARY KEY (`AdminID`),
  UNIQUE KEY `AdminID_UNIQUE` (`AdminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `CategoriesID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoriesName` varchar(45) DEFAULT NULL,
  `CategoriesIcon` varchar(45) DEFAULT NULL,
  `CategoriesParentID` varchar(45) DEFAULT NULL,
  `CategoriesBanner` varchar(45) DEFAULT NULL,
  `CategoriesBannerStatus` varchar(45) DEFAULT NULL,
  `CategoriesOrders` int(11) DEFAULT NULL,
  `CategoriesStatus` bit(1) DEFAULT NULL,
  PRIMARY KEY (`CategoriesID`),
  UNIQUE KEY `idCategories_UNIQUE` (`CategoriesID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Áo Khoác',NULL,'0',NULL,NULL,NULL,NULL),(2,'Áo Phông',NULL,'0',NULL,NULL,NULL,NULL),(3,'Áo Khoác Ngắn Tay',NULL,'1',NULL,NULL,NULL,NULL),(4,'Áo Khoác Dài Tay',NULL,'1',NULL,NULL,NULL,NULL),(5,'Áo Phông Ngắn Tay',NULL,'2',NULL,NULL,NULL,NULL),(6,'Áo Phông Dài Tay',NULL,'2',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `joinproductcolor`
--

DROP TABLE IF EXISTS `joinproductcolor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `joinproductcolor` (
  `JoinProductColorID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductColorID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  PRIMARY KEY (`JoinProductColorID`),
  UNIQUE KEY `JoinProductColor_UNIQUE` (`JoinProductColorID`),
  KEY `joinColorProductID_idx` (`ProductID`),
  KEY `joinColorProductColorID_idx` (`ProductColorID`),
  CONSTRAINT `joinColorProductColorID` FOREIGN KEY (`ProductColorID`) REFERENCES `productcolor` (`ProductColorID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `joinColorProductID` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `joinproductcolor`
--

LOCK TABLES `joinproductcolor` WRITE;
/*!40000 ALTER TABLE `joinproductcolor` DISABLE KEYS */;
/*!40000 ALTER TABLE `joinproductcolor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `joinproductsize`
--

DROP TABLE IF EXISTS `joinproductsize`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `joinproductsize` (
  `JoinProductSizeID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductSizeID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  PRIMARY KEY (`JoinProductSizeID`),
  UNIQUE KEY `Joinproductsize_UNIQUE` (`JoinProductSizeID`),
  KEY `JoinProductSizeProductSizeID_idx` (`ProductSizeID`),
  KEY `JoinProductSizeProductID_idx` (`ProductID`),
  CONSTRAINT `ProductIDs` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ProductSizeIDs` FOREIGN KEY (`ProductSizeID`) REFERENCES `productsize` (`ProductSizeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `joinproductsize`
--

LOCK TABLES `joinproductsize` WRITE;
/*!40000 ALTER TABLE `joinproductsize` DISABLE KEYS */;
INSERT INTO `joinproductsize` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,1,2),(8,6,2),(9,4,2);
/*!40000 ALTER TABLE `joinproductsize` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productbrand`
--

DROP TABLE IF EXISTS `productbrand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productbrand` (
  `ProductBrandID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductBrandName` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ProductBrandID`),
  UNIQUE KEY `idProductBrandID_UNIQUE` (`ProductBrandID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productbrand`
--

LOCK TABLES `productbrand` WRITE;
/*!40000 ALTER TABLE `productbrand` DISABLE KEYS */;
INSERT INTO `productbrand` VALUES (1,'ZARA'),(2,'D&G'),(3,'BANA');
/*!40000 ALTER TABLE `productbrand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productcolor`
--

DROP TABLE IF EXISTS `productcolor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productcolor` (
  `ProductColorID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductColorCode` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ProductColorID`),
  UNIQUE KEY `ProductColorID_UNIQUE` (`ProductColorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productcolor`
--

LOCK TABLES `productcolor` WRITE;
/*!40000 ALTER TABLE `productcolor` DISABLE KEYS */;
/*!40000 ALTER TABLE `productcolor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productgallery`
--

DROP TABLE IF EXISTS `productgallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productgallery` (
  `ProductGalleryID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductID` int(11) DEFAULT NULL,
  `ProductGalleryPath` varchar(250) DEFAULT NULL,
  `ProductGalleryTitle` varchar(250) DEFAULT NULL,
  `ProductGalleryLink` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ProductGalleryID`),
  UNIQUE KEY `ProductGalleryID_UNIQUE` (`ProductGalleryID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productgallery`
--

LOCK TABLES `productgallery` WRITE;
/*!40000 ALTER TABLE `productgallery` DISABLE KEYS */;
INSERT INTO `productgallery` VALUES (1,1,'/Media/Upload/Product/natural-project-7386-01857-1-catalog.jpg',NULL,NULL),(2,1,'/Media/Upload/Product/natural-project-7386-01857-1-catalog.jpg',NULL,NULL),(3,1,'/Media/Upload/Product/natural-project-7386-01857-1-catalog.jpg',NULL,NULL),(4,2,'/Media/Upload/Product/natural-project-7386-01857-1-catalog.jpg',NULL,NULL),(5,2,'/Media/Upload/Product/natural-project-7386-01857-1-catalog.jpg',NULL,NULL),(6,2,'/Media/Upload/Product/natural-project-7386-01857-1-catalog.jpg',NULL,NULL),(7,3,'/Media/Upload/Product/natural-project-7386-01857-1-catalog.jpg',NULL,NULL);
/*!40000 ALTER TABLE `productgallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productrangeprice`
--

DROP TABLE IF EXISTS `productrangeprice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productrangeprice` (
  `ProductRangePriceID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductRangePriceData` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ProductRangePriceID`),
  UNIQUE KEY `ProductRangePrice_UNIQUE` (`ProductRangePriceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productrangeprice`
--

LOCK TABLES `productrangeprice` WRITE;
/*!40000 ALTER TABLE `productrangeprice` DISABLE KEYS */;
/*!40000 ALTER TABLE `productrangeprice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductColorID` int(11) DEFAULT NULL,
  `ProductBrandID` int(11) DEFAULT NULL,
  `ProductRangePriceID` int(11) DEFAULT NULL,
  `CategoriesID` int(11) DEFAULT NULL,
  `AdminID` int(11) DEFAULT NULL,
  `ProductName` varchar(250) DEFAULT NULL,
  `ProductPriceCurrent` varchar(45) DEFAULT NULL,
  `ProductPriceOld` varchar(45) DEFAULT NULL,
  `ProductKeyMeta` varchar(300) DEFAULT NULL,
  `ProductDescription` longtext,
  `ProductStatus` bit(1) DEFAULT NULL,
  `ProductPathImage` varchar(250) DEFAULT NULL,
  `ProductDetails` longtext,
  PRIMARY KEY (`ProductID`),
  UNIQUE KEY `ProductID_UNIQUE` (`ProductID`),
  KEY `ProductColorID_idx` (`ProductColorID`),
  KEY `ProductBrandID_idx` (`ProductBrandID`),
  KEY `ProductRangePriceID_idx` (`ProductRangePriceID`),
  KEY `CategoriesID_idx` (`CategoriesID`),
  KEY `AdminID_idx` (`AdminID`),
  CONSTRAINT `AdminID` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CategoriesID` FOREIGN KEY (`CategoriesID`) REFERENCES `categories` (`CategoriesID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ProductBrandID` FOREIGN KEY (`ProductBrandID`) REFERENCES `productbrand` (`ProductBrandID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ProductColorID` FOREIGN KEY (`ProductColorID`) REFERENCES `productcolor` (`ProductColorID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ProductRangePriceID` FOREIGN KEY (`ProductRangePriceID`) REFERENCES `productrangeprice` (`ProductRangePriceID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,NULL,NULL,NULL,3,NULL,'ÁO SƠ MI NAM 1','400000','700000',NULL,'Mô tả áo sơ mi',NULL,'/Media/Upload/Product/rav-9544-60398-1-catalog.jpg','Details Product 1'),(2,NULL,NULL,NULL,3,NULL,'ÁO SƠ MI NAM 2','450000','700000',NULL,'Áo hàng Zara Xịn',NULL,'/Media/Upload/Product/natural-project-7386-01857-1-catalog.jpg','Details Product 2'),(3,NULL,NULL,NULL,3,NULL,'ÁO SƠ MI NAM 3','450000',NULL,NULL,'Áo hàng Zara Xịn',NULL,'/Media/Upload/Product/praise-9281-25879-1-catalog.jpg','Details Product 3'),(4,NULL,NULL,NULL,4,NULL,'ÁO SƠ MI NAM 4','450000','700000',NULL,'Áo hàng Colegen Xịn',NULL,'/Media/Upload/Product/praise-9281-25879-1-catalog.jpg','Details Product 4'),(5,NULL,NULL,NULL,4,NULL,'ÁO SƠ MI NAM 5','500000',NULL,NULL,NULL,NULL,'/Media/Upload/Product/rav-9544-60398-1-catalog.jpg','Details Product 5'),(6,NULL,NULL,NULL,4,NULL,'ÁO SƠ MI NAM 6','200000',NULL,NULL,NULL,NULL,'/Media/Upload/Product/natural-project-7386-01857-1-catalog.jpg','Details Product 6'),(7,NULL,NULL,NULL,6,NULL,'ÁO SƠ MI NAM 7','400000',NULL,NULL,NULL,NULL,'/Media/Upload/Product/natural-project-7386-01857-1-catalog.jpg','Details Product 7'),(8,NULL,NULL,NULL,3,NULL,'ÁO SƠ MI NAM 8','450000',NULL,NULL,NULL,NULL,'/Media/Upload/Product/praise-9281-25879-1-catalog.jpg','Details Product 9'),(9,NULL,NULL,NULL,5,NULL,'ÁO SƠ MI NAM 9','500000',NULL,NULL,NULL,NULL,'/Media/Upload/Product/rav-9544-60398-1-catalog.jpg',NULL),(10,NULL,NULL,NULL,6,NULL,'ÁO SƠ MI NAM 10','350000',NULL,NULL,NULL,NULL,'/Media/Upload/Product/rav-9544-60398-1-catalog.jpg',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productsize`
--

DROP TABLE IF EXISTS `productsize`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productsize` (
  `ProductSizeID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductSizeNumber` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ProductSizeID`),
  UNIQUE KEY `ProductSizeID_UNIQUE` (`ProductSizeID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productsize`
--

LOCK TABLES `productsize` WRITE;
/*!40000 ALTER TABLE `productsize` DISABLE KEYS */;
INSERT INTO `productsize` VALUES (1,'X'),(2,'XL'),(3,'XXL'),(4,'XBS'),(5,'ZM'),(6,'MM');
/*!40000 ALTER TABLE `productsize` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-07-06 11:00:22
