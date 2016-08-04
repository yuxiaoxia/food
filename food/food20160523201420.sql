-- MySQL dump 10.13  Distrib 5.5.40, for Win32 (x86)
--
-- Host: localhost    Database: food
-- ------------------------------------------------------
-- Server version	5.5.40

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
-- Table structure for table `food_caipu`
--

DROP TABLE IF EXISTS `food_caipu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_caipu` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(200) NOT NULL,
  `Cname` varchar(60) NOT NULL,
  `newprice` int(30) NOT NULL DEFAULT '10',
  `oldprice` int(30) DEFAULT '0',
  `sold` int(30) NOT NULL DEFAULT '0',
  `Cstatus` int(1) NOT NULL DEFAULT '1',
  `title` varchar(100) NOT NULL DEFAULT '华夏餐厅',
  `desc` varchar(300) DEFAULT NULL,
  `kouwei` varchar(100) DEFAULT NULL,
  `prtime` varchar(100) DEFAULT NULL,
  `zhuliao` varchar(100) DEFAULT NULL,
  `gongxiao` varchar(100) DEFAULT NULL,
  `simg` varchar(600) DEFAULT NULL,
  `bimg` varchar(600) DEFAULT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_caipu`
--

LOCK TABLES `food_caipu` WRITE;
/*!40000 ALTER TABLE `food_caipu` DISABLE KEYS */;
INSERT INTO `food_caipu` VALUES (5,10,'宫爆鸡丁',20,20,40,0,'宫爆鸡丁宫爆鸡丁宫爆鸡丁宫爆鸡丁   ','宫保鸡丁色泽赤红诱人，酸辣口，鸡肉滑嫩，花生米爽脆，大葱也好吃。是一道超级下饭菜，很多饭店都有宫保鸡丁盖浇饭，和宫保鸡丁面。可见它多么随和，怎么打发都可以哈！','干，香，甜，辣','10分钟','鸡肉，辣椒，花生','无','http://www.wlx.com/food/Public/Static/images/food/18-140313133524362.jpg','http://www.wlx.com/food/Public/Static/images/food/18-140313133524362.jpg',1),(6,10,'红烧肉',15,20,12,1,'肥瘦相间，香甜松软，入口即化。','红烧肉是热菜菜谱之一。是（陈府）名正松很热爱吃的一道菜，以五花肉为制作主料，最好选用肥瘦相间的三层肉（五花肉）来做。红烧肉的烹饪技巧以砂锅为主，肥瘦相间，香甜松软，入口即化。红烧肉在我国各地流传甚广，是一道著名的大众菜肴。','香甜、肥而不腻','10分钟','带皮五花肉，白糖，生抽，调料酒，八角，葱段，蒜，生姜','补肾、滋阴、益气','http://www.wlx.com/food/Public/Static/images/food/9864a231b7f1afe45fdf0e7b.jpg','http://www.wlx.com/food/Public/Static/images/food/9864a231b7f1afe45fdf0e7b.jpg',1),(24,10,'水煮鱼',50,50,7,0,'年年有余：水煮鱼','团圆的日子里，桌上摆这么一盆麻辣鲜香极其诱惑的水煮鱼，满目的辣椒红亮养眼。“鱼”跟“余”字音相同，有年年有余之寓意，家中粮食、财富有剩余，红红火火、家财兴旺。\r\n          ','热菜、 麻辣','30分钟','主料：草鱼、黄豆芽 调味：鸡蛋清、姜、蒜、郫县豆瓣酱、辣椒若干、花椒适量、盐、淀粉、料酒。','无','http://www.wlx.com/food/Public/Static/images/food/4439c452bb3a1585bd1f16.jpg','http://www.wlx.com/food/Public/Static/images/food/4439c452bb3a1585bd1f16.jpg',1),(25,9,'白灼虾',53,53,2,1,'清淡可口白灼虾','“白灼”是粤菜的一种烹调技法，就是用滚水或汤将食物烫熟。 多数的北方人都对“白灼”有一种概念上的混淆，认为白灼就是用白水煮一下捞出，其实不然，那是对字面上的一个误解,真正的白灼虾还是有几道工序的，经过一个朋友的指点，才得以顿悟。 白灼虾其实是最简单的，无需过多调料，没有繁杂的过程，也不必耗费大量的时间，甚至不用考虑食用时的温度，不用过多思忖摆盘的装饰，搭配一个同样简约的酸咸小味碟，就可以上桌了。 特别是想吃虾又懒得太操劳的人，可以选择做这道菜，简单又新鲜。也是我最钟爱的一道保留菜谱。 作为一只基围虾，衣衫齐整的出场体面面完整，无疑是对它的最高奖赏，绅士而优雅地被人类享用当然是最好的结局。\r\n ','清淡、可口','30分钟','主料： 基围虾 (500克) 辅料： 葱 (适量) 姜 (适量)','无','http://www.wlx.com/food/Public/Static/images/food/faa4bd24a85411e49d2be0db5512b208.jpg','http://www.wlx.com/food/Public/Static/images/food/faa4bd24a85411e49d2be0db5512b208.jpg',1),(26,7,'佛跳墙',100,110,2,1,'闽菜著名菜品','佛跳墙，又名满坛香、福寿全，是福建福州的当地名菜，属闽菜系。相传，它是在清道光年间由福州聚春园菜馆老板郑春发研制出来的。佛跳墙富含营养，可促进发育，美容，延缓衰老，增强免疫力，乃进补佳品。1965年和1980年分别在广州南园和香港，以烹制佛跳墙为主的福州菜引起轰动，在世界各地掀起了佛跳墙热。各地华侨开设的餐馆，多用自称正宗的佛跳墙菜，招徕顾客。佛跳墙还接待过西哈努克亲王、美国总统里根、英国女王伊丽莎白等国家元首。\r\n          ','荤香可口、不油不腻','30分钟','海参，鲍鱼，鱼翅，鱼唇，干贝，蛏子','补虚养生调理营养不良','http://www.wlx.com/food/Public/Static/images/food/Cgqg2lUVCayADjsWAAOHYj_xTTo178.jpg','http://www.wlx.com/food/Public/Static/images/food/Cgqg2lUVCayADjsWAAOHYj_xTTo178.jpg',1),(27,11,'剁椒鱼头',40,60,6,1,'一道色香味俱全的湖南菜--剁椒鱼头','剁椒鱼头这道饭馆的热卖菜却是没有任何高难技术，只要将鱼头洗干净破开，腌制底味，调料蒸制，浇油即可，非常的简单，即便是零厨艺也能做出这道饭店的美味热销菜~~\r\n          ','热菜 微辣 蒸 ','十分钟','鱼头一个、剁椒200克 、小红川椒	2~3个 、小葱1把 、大蒜8瓣、 生姜	30克 、料酒	2勺 醋	','补虚养生调理营养不良','http://www.wlx.com/food/Public/Static/images/food/u=3536495842,1117546723&fm=21&gp=0.jpg','http://www.wlx.com/food/Public/Static/images/food/u=3536495842,1117546723&fm=21&gp=0.jpg',1),(28,9,'广州文昌鸡',60,70,4,1,'广州文昌鸡，广州八大名鸡之一','广东文昌鸡是广东省传统的汉族名菜，属于粤菜系。以海南岛文昌鸡为主料，配以火腿 、鸡肝、郊菜，经煮、蒸、炒而成。此菜造型美观，芡汁明亮，肉质滑嫩，香味甚浓，肥而不腻。三样配料颜色不同，滋味各异，为广州八大名鸡之一。\r\n          ','皮薄骨酥，香味甚浓，肥而不腻','30分钟','肥嫩鸡，鸡肝，火腿 、鸡肝、郊菜','温中益气，补虚填精，健脾胃','http://www.wlx.com/food/Public/Static/images/food/5OIS5DSN0BNL0086.jpg','http://www.wlx.com/food/Public/Static/images/food/5OIS5DSN0BNL0086.jpg',1),(30,9,'烤乳猪',60,80,3,1,'广州名菜烤乳猪','烤乳猪是广州最著名的特色菜，并且是“满汉全席”中的主打菜肴之一。[1]  早在西周时此菜已被列为“八珍”之一，那时称为“炮豚”。\r\n在南北朝时，贾思勰已把烤乳猪作为一项重要的烹饪技术成果而记载在《齐民要术》中了。他写道：“色同琥珀，又类真金，入口则消，壮若凌雪，含浆膏润，特异凡常也。\r\n          ','色泽红润，形态完整，皮酥肉嫩，肥而不腻，又鲜又嫩，入口奇香','30分钟','小乳猪一只（3000克），精盐200克，白糖100克，八角粉5克，五香粉10克，南乳25克，芝麻酱25克，白糖50克，蒜5克，生粉25克，汾酒7克，糖水适量。','温中益气，补虚填精，健脾胃','http://www.wlx.com/food/Public/Static/images/food/20120416115914.jpg','http://www.wlx.com/food/Public/Static/images/food/20120416115914.jpg',1),(37,1126,'橙汁',10,10,9,1,'就是橙汁没啥特别','\r\n        ','','','','','http://www.wlx.com/food/Public//Static/images/food/1463363444_1471457680.jpg','http://www.wlx.com/food/Public//Static/images/food/1463363452_255066432.jpg',4),(38,1126,'可乐',10,10,6,1,'就是可乐没啥特别','\r\n        ','','','','','http://www.wlx.com/food/Public//Static/images/food/1463363478_648455046.jpg','http://www.wlx.com/food/Public//Static/images/food/1463363484_2006133904.jpg',4),(39,1133,'奶香玉米烙',20,10,7,1,'奶香玉米烙是一道美味的菜肴','1、把玉米粒放锅内加水煮熟，沥干水份备用\r\n2、沥干水份的玉米粒加适量白糖拌匀\r\n3、将生粉倒在玉米粒上，拌匀。要让玉米粒均匀裹上一层生粉\r\n4、将色拉油加热至8成热，倒出\r\n5、将玉米粒倒入锅内并摊平，将倒出的热油倒在玉米粒上，\r\n6、小火煎至表面金黄即可\r\n        ','香甜','10分钟','甜玉米粒 ，生粉 、  料 糖 色拉油 炼奶','营养丰富','http://www.wlx.com/food/Public//Static/images/food/1463363772_2085069450.jpg','http://www.wlx.com/food/Public//Static/images/food/1463363779_213258847.jpg',3),(41,1133,'手拍黄瓜',14,10,9,0,'手拍黄瓜、凉拌黄瓜','手拍黄瓜是一道大众菜，取黄瓜一条，把黄瓜拍碎（拍的时候由黄瓜的头往尾拍）.将拍碎的黄瓜切块（8—10㎝即可），放入调料适当搅拌，拌匀取香菜，切碎，放在黄瓜块上。\r\n        ','酸爽','10分钟','黄瓜2根，大蒜半个，香菜适量，味精半勺，盐半勺，糖半勺，醋半勺','黄瓜味甘、性凉、苦、无毒，入脾、胃、大肠经具有除热，利水，解毒，清热利尿的功效。主治烦渴，咽喉肿痛，火眼，烫伤。减肥和预防冠心病的发生。','http://www.wlx.com/food/Public//Static/images/food/1463364199_1647906313.jpg','http://www.wlx.com/food/Public//Static/images/food/1463364204_792140471.jpg',3),(44,1132,'意式鲜虾肉丸披萨',40,0,17,0,'意式鲜虾肉丸披萨','意式鲜虾肉丸披萨意式鲜虾肉丸披萨意式鲜虾肉丸披萨意式鲜虾肉丸披萨意式鲜虾肉丸披萨\r\n        ','意式鲜虾肉丸披萨','30分钟','高粉100g、水50g、糖1小匙、盐1/8小匙、酵母1/4小匙、黄油10g','意式鲜虾肉丸披萨','http://www.wlx.com/food/Public//Static/images/food/1463365291_1575968403.jpg','http://www.wlx.com/food/Public//Static/images/food/1463365296_1824129303.jpg',2);
/*!40000 ALTER TABLE `food_caipu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_cat`
--

DROP TABLE IF EXISTS `food_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_cat` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `pid` int(5) unsigned NOT NULL,
  `ppid` int(30) NOT NULL DEFAULT '0',
  `path` varchar(20) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=1134 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_cat`
--

LOCK TABLES `food_cat` WRITE;
/*!40000 ALTER TABLE `food_cat` DISABLE KEYS */;
INSERT INTO `food_cat` VALUES (1,'中餐',0,0,'0,','1'),(2,'异国风味',0,0,'0,','1'),(3,'小吃',0,0,'0,','1'),(4,'饮品',0,0,'0,','1'),(10,'川菜',1,0,'0,1,','1'),(7,'闽菜',1,0,'0,1','1'),(9,'粤菜',1,0,'0,1,','1'),(11,'湘菜',1,0,'0,1,','1'),(1132,'披萨类',2,0,'0,2,','1'),(1133,'北京小吃',3,0,'0,3,','1'),(1126,'果汁',4,0,'0,4,','1');
/*!40000 ALTER TABLE `food_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_img`
--

DROP TABLE IF EXISTS `food_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_img`
--

LOCK TABLES `food_img` WRITE;
/*!40000 ALTER TABLE `food_img` DISABLE KEYS */;
/*!40000 ALTER TABLE `food_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_order`
--

DROP TABLE IF EXISTS `food_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_order` (
  `oid` int(100) NOT NULL AUTO_INCREMENT,
  `orderseatid` int(30) NOT NULL,
  `num` int(11) NOT NULL DEFAULT '0',
  `money` int(100) NOT NULL DEFAULT '0',
  `ordertime` datetime NOT NULL,
  `finishtime` datetime DEFAULT NULL,
  `ostatus` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_order`
--

LOCK TABLES `food_order` WRITE;
/*!40000 ALTER TABLE `food_order` DISABLE KEYS */;
INSERT INTO `food_order` VALUES (7,7,7,135,'2016-05-17 16:05:41','2016-05-17 16:08:32',2),(6,6,5,180,'2016-05-17 16:03:36','2016-05-19 16:55:30',2),(5,5,5,135,'2016-05-17 16:02:47','2016-05-19 16:55:42',2),(4,4,3,85,'2016-05-16 21:22:08','2016-05-17 16:00:16',2),(8,8,3,120,'2016-05-17 16:14:08','2016-05-17 16:15:42',2),(9,9,4,160,'2016-05-17 16:16:49','2016-05-17 16:18:38',2),(10,10,4,60,'2016-05-17 21:17:50','2016-05-17 21:25:33',2),(11,11,5,100,'2016-05-18 10:50:37','2016-05-18 14:17:22',2),(12,14,2,40,'2016-05-18 14:25:13','2016-05-18 14:28:24',2),(13,15,6,164,'2016-05-18 17:21:30','2016-05-18 17:29:29',2),(14,16,3,74,'2016-05-18 17:51:17','2016-05-18 17:51:26',2),(15,17,3,94,'2016-05-18 17:52:04','2016-05-18 17:52:13',2),(16,18,3,94,'2016-05-18 17:53:04','2016-05-18 17:53:13',2),(17,19,4,60,'2016-05-18 19:46:05','2016-05-19 16:55:28',2),(18,20,4,70,'2016-05-19 23:29:23','2016-05-19 23:30:34',2),(19,21,4,84,'2016-05-21 16:11:22','2016-05-21 16:11:46',2);
/*!40000 ALTER TABLE `food_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_orderfood`
--

DROP TABLE IF EXISTS `food_orderfood`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_orderfood` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderseatid` int(30) NOT NULL,
  `foodid` int(30) NOT NULL,
  `foodname` varchar(20) NOT NULL,
  `foodnum` int(30) NOT NULL,
  `foodprice` int(30) NOT NULL,
  `foodtotalmoney` int(30) NOT NULL,
  `foodbz` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_orderfood`
--

LOCK TABLES `food_orderfood` WRITE;
/*!40000 ALTER TABLE `food_orderfood` DISABLE KEYS */;
INSERT INTO `food_orderfood` VALUES (19,6,5,'宫爆鸡丁',1,20,20,NULL),(20,6,30,'烤乳猪',1,60,60,NULL),(21,6,39,'奶香玉米烙',1,20,20,NULL),(18,5,37,'橙汁',1,10,10,NULL),(17,5,27,'剁椒鱼头',1,40,40,NULL),(16,5,24,'水煮鱼',1,50,50,NULL),(15,5,6,'红烧肉',1,15,15,NULL),(14,5,5,'宫爆鸡丁',1,20,20,NULL),(11,4,5,'宫爆鸡丁',1,20,20,NULL),(12,4,6,'红烧肉',1,15,15,NULL),(13,4,24,'水煮鱼',1,50,50,NULL),(22,6,44,'意式鲜虾肉丸披萨',1,40,40,NULL),(23,6,27,'剁椒鱼头',1,40,40,NULL),(24,7,5,'宫爆鸡丁',6,20,120,NULL),(25,7,6,'红烧肉',1,15,15,NULL),(26,8,44,'意式鲜虾肉丸披萨',3,40,120,NULL),(27,9,44,'意式鲜虾肉丸披萨',2,40,80,NULL),(28,9,42,'糖醋排骨',2,40,80,NULL),(29,10,5,'宫爆鸡丁',2,20,40,''),(30,10,37,'橙汁',2,10,20,''),(31,11,5,'宫爆鸡丁',4,20,80,'加辣'),(32,11,39,'奶香玉米烙',1,20,20,''),(33,14,5,'宫爆鸡丁',2,20,40,''),(34,15,44,'意式鲜虾肉丸披萨',3,40,120,NULL),(35,15,41,'手拍黄瓜',1,14,14,NULL),(36,15,39,'奶香玉米烙',1,20,20,NULL),(37,15,38,'可乐',1,10,10,NULL),(38,16,44,'意式鲜虾肉丸披萨',1,40,40,NULL),(39,16,41,'手拍黄瓜',1,14,14,NULL),(40,16,39,'奶香玉米烙',1,20,20,NULL),(41,17,44,'意式鲜虾肉丸披萨',2,40,80,NULL),(42,17,41,'手拍黄瓜',1,14,14,NULL),(43,18,44,'意式鲜虾肉丸披萨',2,40,80,NULL),(44,18,41,'手拍黄瓜',1,14,14,NULL),(45,19,5,'宫爆鸡丁',2,20,40,'加辣'),(46,19,37,'橙汁',2,10,20,'加冰'),(47,20,6,'红烧肉',2,15,30,''),(48,20,5,'宫爆鸡丁',2,20,40,''),(49,21,41,'手拍黄瓜',1,14,14,NULL),(50,21,44,'意式鲜虾肉丸披萨',1,40,40,NULL),(51,21,39,'奶香玉米烙',1,20,20,NULL),(52,21,38,'可乐',1,10,10,NULL);
/*!40000 ALTER TABLE `food_orderfood` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_orderseat`
--

DROP TABLE IF EXISTS `food_orderseat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_orderseat` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `seatid` int(20) NOT NULL,
  `gkname` varchar(30) NOT NULL,
  `gkphone` varchar(30) NOT NULL,
  `gkbz` varchar(300) NOT NULL,
  `orderid` int(20) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `ordertime` datetime NOT NULL,
  `finishtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_orderseat`
--

LOCK TABLES `food_orderseat` WRITE;
/*!40000 ALTER TABLE `food_orderseat` DISABLE KEYS */;
INSERT INTO `food_orderseat` VALUES (7,29,'weilixia','15677301109','yyyyyyyyyyyyyy',1,2,'2016-05-17 16:05:30','2016-05-17 16:08:32'),(6,31,'韦利霞','15677301109','哈哈哈哈哈哈哈哈啊',1,2,'2016-05-17 16:03:23','2016-05-19 16:55:30'),(5,30,'韦李霞','15677301109','哈哈哈哈哈',1,2,'2016-05-17 16:02:11','2016-05-19 16:55:42'),(4,31,'wei ','15677301109','hhahaha',1,2,'2016-05-16 21:22:03','2016-05-17 16:00:16'),(8,2,'hahha ','15677301109','我',1,2,'2016-05-17 16:13:54','2016-05-17 16:15:42'),(9,20,'测试','15677301109','测试',1,2,'2016-05-17 16:16:38','2016-05-17 16:18:38'),(10,29,'weilixia来着点菜系统的哦','15677301109','哈哈哈哈哈',1,2,'2016-05-17 21:17:48','2016-05-17 21:25:33'),(11,5,'魏丽霞','15677301109','哈哈哈哈',1,2,'2016-05-18 10:50:34','2016-05-18 14:17:22'),(12,28,'韦利霞','15677301109','哈哈哈哈',1,0,'2016-05-18 14:18:02',NULL),(13,29,'韦利霞','15677301109','贾莎莎',1,0,'2016-05-18 14:22:46',NULL),(14,20,'魏丽霞','15677301109','哈哈哈哈',1,2,'2016-05-18 14:25:11','2016-05-18 14:28:24'),(15,20,'韦利霞','15677301109','预定座位测试',1,2,'2016-05-18 17:12:37','2016-05-18 17:29:29'),(16,9,'韦利霞杀菌哈','15677301109','哈哈哈哈',1,2,'2016-05-18 17:51:08','2016-05-18 17:51:26'),(17,9,'哈哈哈','15677301109','加开多看看撒',1,2,'2016-05-18 17:51:52','2016-05-18 17:52:13'),(18,8,'我问问','15677301109','多大点事',1,2,'2016-05-18 17:52:54','2016-05-18 17:53:13'),(19,3,'韦利霞','15677301109','手机端测试啦',1,2,'2016-05-18 19:46:02','2016-05-19 16:55:28'),(20,30,'hahha ','15677301109','shad  dsa',1,2,'2016-05-19 23:29:21','2016-05-19 23:30:34'),(21,9,'韦利霞','15677301109','及送达回好的撒',1,2,'2016-05-21 16:11:11','2016-05-21 16:11:46');
/*!40000 ALTER TABLE `food_orderseat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_rest`
--

DROP TABLE IF EXISTS `food_rest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_rest` (
  `name` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `time` date NOT NULL,
  `founders` varchar(30) NOT NULL,
  `type` varchar(60) NOT NULL,
  `brief` varchar(400) NOT NULL,
  `feature` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_rest`
--

LOCK TABLES `food_rest` WRITE;
/*!40000 ALTER TABLE `food_rest` DISABLE KEYS */;
INSERT INTO `food_rest` VALUES ('华夏餐厅',0,'2016-04-01','韦利霞','适宜商务宴请、大型宴会、休闲小憩、随便吃吃、情侣约会、家庭聚会、朋友聚餐','                                                                                                                                                                                                                                                                                                                                                            当隽永精美的中式美食，遇到前卫浪漫的时尚情怀，将会演绎出一段怎样的醉人风情？ 娃哈哈旗下江南赋醉爱时尚餐','可以刷卡，有包厢，有停车位，提供在线菜单，有下午茶，有夜宵，有无烟区，有wifi。 ');
/*!40000 ALTER TABLE `food_rest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_seat`
--

DROP TABLE IF EXISTS `food_seat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_seat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `seatnum` int(10) NOT NULL,
  `pos` int(50) NOT NULL,
  `bjf` int(50) NOT NULL DEFAULT '0',
  `desc` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `bjf` (`bjf`),
  KEY `bjf_2` (`bjf`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_seat`
--

LOCK TABLES `food_seat` WRITE;
/*!40000 ALTER TABLE `food_seat` DISABLE KEYS */;
INSERT INTO `food_seat` VALUES (4,20,1,10,'二楼204包间，预定成功，提供免费果盘一份',0),(20,4,0,0,'大厅A区100位置，适合家庭小聚',1),(3,15,1,10,'二楼203包间，预定成功，提供免费果盘一份',0),(5,20,1,10,'二楼205包间，预定成功，提供免费果盘一份',0),(6,20,1,10,'二楼206包间，预定成功，提供免费果盘一份',0),(2,15,1,10,'二楼202包间，预定成功，提供免费果盘一份',0),(7,30,1,10,'三楼301包间，预定成功，提供免费果盘一份',0),(8,30,1,10,'三楼302包间，预定成功，提供免费果盘一份',0),(9,40,1,10,'三楼303包间，预定成功，提供免费果盘一份',0),(28,4,0,0,'大厅A区102位置，适合家庭小聚',1),(29,4,0,0,'大厅A区104位置，适合家庭小聚',1),(30,4,0,0,'大厅A区105位置，适合家庭小聚',0),(31,4,0,0,'大厅B区105位置，适合家庭小聚',0);
/*!40000 ALTER TABLE `food_seat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_tips`
--

DROP TABLE IF EXISTS `food_tips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_tips` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `con` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_tips`
--

LOCK TABLES `food_tips` WRITE;
/*!40000 ALTER TABLE `food_tips` DISABLE KEYS */;
INSERT INTO `food_tips` VALUES (2,'今日特价：中式西芝糖裹，前100名可申请',1),(4,'听说下雨天来华夏餐厅会打折哦',1);
/*!40000 ALTER TABLE `food_tips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_user`
--

DROP TABLE IF EXISTS `food_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_user` (
  `userid` int(40) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `address` varchar(60) NOT NULL,
  `root` tinyint(1) NOT NULL DEFAULT '0',
  `logintime` datetime DEFAULT NULL,
  `loginnum` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `name_2` (`name`,`phone`),
  KEY `name` (`name`),
  KEY `phone` (`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_user`
--

LOCK TABLES `food_user` WRITE;
/*!40000 ALTER TABLE `food_user` DISABLE KEYS */;
INSERT INTO `food_user` VALUES (14,'123','韦利霞','男','15677301109','桂林',0,'0000-00-00 00:00:00',0),(1,'admin','admin','男','15677301109','桂林',1,'0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `food_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-23 20:14:22
