-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: tavern
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Current Database: `tavern`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `tavern` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tavern`;

--
-- Table structure for table `character_arts`
--

DROP TABLE IF EXISTS `character_arts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `character_arts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `character_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `character_arts_character_id_foreign` (`character_id`),
  CONSTRAINT `character_arts_character_id_foreign` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `character_arts`
--

LOCK TABLES `character_arts` WRITE;
/*!40000 ALTER TABLE `character_arts` DISABLE KEYS */;
INSERT INTO `character_arts` VALUES (1,'Dameon Champlin Jr.','3c5c7c8b8a407ea23f57a5fbef86b601','2014-11-22 12:35:52','2014-11-22 12:35:52',10),(2,'Dawn Stark','4f0e095460c5332b3ad7bc9705429d3c','2014-11-22 12:35:52','2014-11-22 12:35:52',8),(3,'Dr. Melany Legros II','6d17a1094a56e13291a2c94fea95ed15','2014-11-22 12:35:53','2014-11-22 12:35:53',5),(4,'Casimir Graham','ba0ab39ab7062bf14b62fb9b1390ba30','2014-11-22 12:35:53','2014-11-22 12:35:53',4),(5,'Prof. Griffin Rath','73e129e8c191b1da50090c7c33c025df','2014-11-22 12:35:53','2014-11-22 12:35:53',1),(6,'Adolfo Connelly','767f5b6798b529045e39a77d8c27fdf5','2014-11-22 12:35:53','2014-11-22 12:35:53',6),(7,'Rudolph Rath MD','8984c7078840d5024c9ce0623be57885','2014-11-22 12:35:53','2014-11-22 12:35:53',7),(8,'Tito Denesik','5f6881d499c2a5c1e8500f8dae40d45b','2014-11-22 12:35:53','2014-11-22 12:35:53',2),(9,'Daryl Padberg','2dcf9412d70081720af72f6e410c9c40','2014-11-22 12:35:53','2014-11-22 12:35:53',10),(10,'Liza Terry','bb299955cd2c9692e35bc801fd0bdb65','2014-11-22 12:35:53','2014-11-22 12:35:53',9);
/*!40000 ALTER TABLE `character_arts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `character_sheets`
--

DROP TABLE IF EXISTS `character_sheets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `character_sheets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `character_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `character_sheets_character_id_foreign` (`character_id`),
  CONSTRAINT `character_sheets_character_id_foreign` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `character_sheets`
--

LOCK TABLES `character_sheets` WRITE;
/*!40000 ALTER TABLE `character_sheets` DISABLE KEYS */;
INSERT INTO `character_sheets` VALUES (1,'Alejandra Wisozk DDS','6c2243485f85572b2a6c0d9938a99075','Culpa molestias dolor fugiat libero similique quia id. Blanditiis officiis dicta consectetur facilis quod aperiam sapiente. Voluptate aliquid placeat iste sed.','2014-11-22 12:35:53','2014-11-22 12:35:53',6),(2,'Mr. Joesph Kertzmann','2a6b17c83db717bcba7310ad5d1eaa76','Distinctio repellat totam sed natus vel dolorem. Laborum unde nostrum dolore quis aut. Sit ex minus at qui.','2014-11-22 12:35:53','2014-11-22 12:35:53',9),(3,'Loraine Leannon','8658097a07b833b352414364b53b9bc1','Minima labore hic tempora quia quas dolorum. Ipsum necessitatibus quaerat enim. Est quas veniam perferendis sit voluptatem cum.','2014-11-22 12:35:53','2014-11-22 12:35:53',5),(4,'Dr. Gunner Stokes MD','fa516b2c3faab70f6417c1f4f0bdb9b9','Quaerat pariatur consequatur qui necessitatibus aliquid. Vero vel quo impedit quis. Maiores sapiente est omnis voluptatem id aut velit iure. Et aut modi a quam.','2014-11-22 12:35:53','2014-11-22 12:35:53',7),(5,'Otho Kuvalis','5643195880819eb6ad9379413eccb516','Dolores aperiam voluptas omnis consequatur. Harum modi facilis sed architecto aliquid. Molestiae aut ut est minima in.','2014-11-22 12:35:53','2014-11-22 12:35:53',7),(6,'Emmy Franecki','88b03ab8f200ee7eb3a0e67ffe50bc0f','Occaecati laborum id iste id ut et. Non quo repudiandae optio non harum voluptates temporibus. Eum ipsam excepturi sunt eveniet.','2014-11-22 12:35:53','2014-11-22 12:35:53',9),(7,'Rosalind Kulas','eeb127afed98bdb47986bab66726e936','Ea magnam tempore nihil ipsum minima ut molestias. Quasi non est itaque. Sit eligendi praesentium minima quae accusamus culpa. Consequuntur minus et dolorem dolorem sit qui.','2014-11-22 12:35:53','2014-11-22 12:35:53',5),(8,'Isabell Ullrich V','8eeb2c44c020efb89cb8f0efafc06619','Optio et placeat et eos. Amet velit praesentium enim voluptatem. Aut ut non aut earum cum adipisci sit. Consectetur vitae vero temporibus magni.','2014-11-22 12:35:54','2014-11-22 12:35:54',5),(9,'Muriel Wiegand','7dc8de4f2cf13e043a94436054235ec4','Ut dignissimos et quas. Ut voluptatibus ut sed et at rem. Et quia fugiat nesciunt. Voluptatem ut eum eaque ut sunt sed.','2014-11-22 12:35:54','2014-11-22 12:35:54',4),(10,'Gillian West','592f1cb916245c2c0d13df9b304aeb41','Ex culpa vitae beatae fuga ut. Accusantium est quia est et. Eius assumenda debitis officia harum vero consequatur quos. Rerum enim debitis et molestiae accusantium molestiae.','2014-11-22 12:35:54','2014-11-22 12:35:54',5);
/*!40000 ALTER TABLE `character_sheets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `characters`
--

DROP TABLE IF EXISTS `characters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `characters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL,
  `rules` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_character_art` int(10) unsigned DEFAULT NULL,
  `biography` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `characters_display_character_art_foreign` (`display_character_art`),
  KEY `characters_user_id_foreign` (`user_id`),
  CONSTRAINT `characters_display_character_art_foreign` FOREIGN KEY (`display_character_art`) REFERENCES `character_arts` (`id`),
  CONSTRAINT `characters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `characters`
--

LOCK TABLES `characters` WRITE;
/*!40000 ALTER TABLE `characters` DISABLE KEYS */;
INSERT INTO `characters` VALUES (1,'Montana Schinner','Rogue',36,'Mutants & Masterminds',NULL,'I shall never get to the table to measure herself by it, and then sat upon it.) \'I\'m glad they don\'t give birthday presents like that!\' By this time it all is! I\'ll.','2014-11-22 12:35:51','2014-11-22 12:35:51',8),(2,'Mr. Felipe Lind','Ranger',49,'Call of Cthulhu',NULL,'It\'s by far the most important piece of evidence we\'ve heard yet,\' said Alice; \'I must be really offended. \'We won\'t talk about trouble!\' said the youth, \'and your jaws are too weak For.','2014-11-22 12:35:52','2014-11-22 12:35:52',2),(3,'Erica Koelpin','Druid',39,'GURPS',NULL,'Alice, timidly; \'some of the jury had a bone in his note-book, cackled out \'Silence!\' and read as follows:-- \'The Queen of Hearts, and I had our Dinah here, I know is, it.','2014-11-22 12:35:52','2014-11-22 12:35:52',10),(4,'Mac Leannon Sr.','Druid',9,'Mutants & Masterminds',NULL,'Mouse in the book,\' said the Cat. \'I\'d nearly forgotten to ask.\' \'It turned into a line along the passage into the court, arm-in-arm with the Mouse to tell its age, there was.','2014-11-22 12:35:52','2014-11-22 12:35:52',3),(5,'Erika Zemlak','Paladin',32,'Savage Worlds',NULL,'Bill!\' then the other, and making quite a chorus of voices asked. \'Why, SHE, of course,\' said the Caterpillar contemptuously. \'Who are YOU?\' said the Gryphon: \'I.','2014-11-22 12:35:52','2014-11-22 12:35:52',6),(6,'Amber Strosin','Bard',4,'GURPS',NULL,'Said his father; \'don\'t give yourself airs! Do you think, at your age, it is I hate cats and dogs.\' It was the King; \'and don\'t look at it!\' This speech caused a.','2014-11-22 12:35:52','2014-11-22 12:35:52',9),(7,'Dr. Luis Klein PhD','Barbarian',40,'Pathfinder',NULL,'Alice. \'Now we shall have some fun now!\' thought Alice. \'I\'m glad they don\'t seem to be\"--or if you\'d rather not.\' \'We indeed!\' cried the Mock Turtle, \'they--you\'ve seen them, of course?\' \'Yes,\'.','2014-11-22 12:35:52','2014-11-22 12:35:52',5),(8,'Jamar Bode','Cleric',1,'Rifts',NULL,'There was a table in the act of crawling away: besides all this, there was silence for some time after the others. \'We must burn the house before she gave her.','2014-11-22 12:35:52','2014-11-22 12:35:52',5),(9,'Garnett Kohler','Cleric',42,'Savage Worlds',NULL,'First, however, she waited for a minute, while Alice thought decidedly uncivil. \'But perhaps he can\'t help it,\' said Alice, (she had grown so large in the prisoner\'s handwriting?\' asked.','2014-11-22 12:35:52','2014-11-22 12:35:52',1),(10,'Marcel Kunze','Cleric',39,'Apocalyse World',NULL,'She went on so long that they could not even room for this, and she went on talking: \'Dear, dear! How queer everything is queer to-day.\' Just then her head made her look up in.','2014-11-22 12:35:52','2014-11-22 12:35:52',4),(11,'Jacholas','Dizard',1,'None',NULL,'','2014-12-15 03:21:54','2014-12-15 03:21:54',13);
/*!40000 ALTER TABLE `characters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fbf_comments`
--

DROP TABLE IF EXISTS `fbf_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fbf_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `commentable_id` int(11) NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fbf_comments`
--

LOCK TABLES `fbf_comments` WRITE;
/*!40000 ALTER TABLE `fbf_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `fbf_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_character`
--

DROP TABLE IF EXISTS `game_character`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_character` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(10) unsigned NOT NULL,
  `character_id` int(10) unsigned NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `game_character_game_id_foreign` (`game_id`),
  KEY `game_character_character_id_foreign` (`character_id`),
  CONSTRAINT `game_character_character_id_foreign` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`) ON DELETE CASCADE,
  CONSTRAINT `game_character_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_character`
--

LOCK TABLES `game_character` WRITE;
/*!40000 ALTER TABLE `game_character` DISABLE KEYS */;
INSERT INTO `game_character` VALUES (1,9,3,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,3,5,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,1,6,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,1,6,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,3,7,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,3,2,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,5,7,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,2,2,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,4,11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,4,11,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `game_character` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game_master` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `game_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rules_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `curr_players` int(11) NOT NULL,
  `max_players` int(11) DEFAULT NULL,
  `starting_level` int(11) DEFAULT NULL,
  `next_game` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `games_location_id_foreign` (`location_id`),
  KEY `games_game_master_foreign` (`game_master`),
  CONSTRAINT `games_game_master_foreign` FOREIGN KEY (`game_master`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `games_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` VALUES (1,2,5,'How the Owl and.','Rifts','Modern','Mock Turtle. \'Seals, turtles, salmon, and so on; then, when you\'ve cleared all the things get used up.\' \'But what did the archbishop find?\' The Mouse looked at poor Alice,.',0,5,10,'2013-03-12 04:00:00','2014-11-22 12:35:50','2014-11-22 12:35:50'),(2,4,1,'No, no!.','World of Darkness','Modern','Then turn not pale, beloved snail, but come and join the dance? \"You can really have no idea what you\'re doing!\' cried Alice, jumping up and saying, \'Thank you, sir, for your walk!\".',0,0,2,'1977-08-26 04:00:00','2014-11-22 12:35:50','2014-11-22 12:35:50'),(3,1,1,'Alice whispered,.','Pathfinder','Modern','White Rabbit interrupted: \'UNimportant, your Majesty means, of course,\' the Gryphon replied rather crossly: \'of course you know why it\'s called a whiting?\'.',1,5,16,'1976-04-02 05:00:00','2014-11-22 12:35:50','2014-11-22 12:35:50'),(4,9,8,'Alice very.','Call of Cthulhu','Anime','Queen jumped up and repeat \"\'TIS THE VOICE OF THE SLUGGARD,\"\' said the Caterpillar. \'Well, perhaps you haven\'t found it made Alice quite hungry to look about her any more questions about it,.',0,1,2,'1994-08-16 04:00:00','2014-11-22 12:35:50','2014-11-22 12:35:50'),(5,7,10,'Hatter:.','HackMaster','Anime','Off--\' \'Nonsense!\' said Alice, looking down with wonder at the window.\' \'THAT you won\'t\' thought Alice, and, after glaring at her with large eyes full of tears, \'I do wish I hadn\'t quite.',3,8,14,'2008-12-28 05:00:00','2014-11-22 12:35:50','2014-11-22 12:35:50'),(6,6,2,'IT. It\'s HIM.\' \'I.','GURPS','Fantasy','By the time they had a bone in his sleep, \'that \"I breathe when I get it home?\' when it grunted again, so she set the little door, so she set off at once: one.',2,15,1,'1987-06-04 04:00:00','2014-11-22 12:35:50','2014-11-22 12:35:50'),(7,7,10,'DOTH THE LITTLE.','Savage Worlds','Parody','I am very tired of swimming about here, O Mouse!\' (Alice thought this must be on the end of trials, \"There was some attempts at applause, which was full of soup. \'There\'s certainly too much.',4,19,7,'1972-03-31 05:00:00','2014-11-22 12:35:50','2014-11-22 12:35:50'),(8,1,2,'VERY tired of.','Call of Cthulhu','Cyberpunk','CHAPTER VI. Pig and Pepper For a minute or two, they began moving about again, and put it into his cup of tea, and looked into its face to see if there are, nobody.',2,5,1,'1975-09-15 04:00:00','2014-11-22 12:35:51','2014-11-22 12:35:51'),(9,4,3,'ONE respectable.','Rifts','Modern','I\'m sure I can\'t be Mabel, for I know THAT well enough; and what does it matter to me whether you\'re nervous or not.\' \'I\'m a poor man, your Majesty,\' he.',3,11,19,'2013-07-11 04:00:00','2014-11-22 12:35:51','2014-11-22 12:35:51'),(10,4,5,'Why,.','HackMaster','Fantasy','I could show you our cat Dinah: I think you\'d better finish the story for yourself.\' \'No, please go on!\' Alice said to the fifth bend, I think?\' he said to the heads of the jurors were all crowded.',3,13,13,'1987-08-30 04:00:00','2014-11-22 12:35:51','2014-11-22 12:35:51'),(11,13,1,'Johnny Boy','Dungeons and Dragons 3.5e','Cyberpunk','Welcome to redline, the hottest. best, greatest race in the world!',0,3,10,'0000-00-00 00:00:00','2014-11-24 00:19:16','2014-11-24 09:05:41');
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `locations_user_id_foreign` (`user_id`),
  CONSTRAINT `locations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,NULL,'41410 Cary Crescent Apt. 963','North Joaquin','New York',66207,'Falkland Islands (Malvinas)','2014-11-22 12:35:27','2014-11-22 12:35:49'),(2,10,'578 Grace Loaf Apt. 536','Littleton','Colorado',87353,'San Marino','2014-11-22 12:35:27','2014-11-22 12:35:49'),(3,2,'06385 Ritchie Ferry','Boehmville','Hawaii',608,'Barbados','2014-11-22 12:35:27','2014-11-22 12:35:48'),(4,9,'39203 Carmelo Extensions','South Tate','Louisiana',34339,'Tunisia','2014-11-22 12:35:27','2014-11-22 12:35:49'),(5,8,'9882 Torp Oval','Darlenechester','Alaska',34194,'Belarus','2014-11-22 12:35:27','2014-11-22 12:35:49'),(6,NULL,'6478 Dickinson Extensions','Shakirashire','Hawaii',25195,'Italy','2014-11-22 12:35:27','2014-11-22 12:35:27'),(7,8,'648 Elijah Branch Suite 898','Hollieville','New Hampshire',25884,'Wallis and Futuna','2014-11-22 12:35:27','2014-11-22 12:35:49'),(8,13,'575 Spencer Mission Apt. 273','Schinnerfurt','Mississippi',14549,'Austria','2014-11-22 12:35:27','2014-11-22 12:35:48'),(9,4,'1573 Roel Street Suite 738','Sipeshaven','Oregon',67255,'Colombia','2014-11-22 12:35:28','2014-11-22 12:35:49'),(10,NULL,'973 Waters Shores','New Selmer','Arizona',99906,'Tonga','2014-11-22 12:35:28','2014-11-22 12:35:28'),(11,NULL,'0000','Online','Internet',0,'United States','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
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
INSERT INTO `migrations` VALUES ('2014_10_25_065838_create_users_games_characters_character-extras_tables',1),('2014_10_25_192932_create_foreign_keys_and_pivot_tables',1),('2014_03_28_110439_create_comments_table',2),('2014_12_13_205728_add_game_approval_to_game_character',3),('2014_12_15_011856_add_basic_user_prefs',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reminders`
--

DROP TABLE IF EXISTS `password_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reminders`
--

LOCK TABLES `password_reminders` WRITE;
/*!40000 ALTER TABLE `password_reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dob` date NOT NULL,
  `favorite_game` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brain_hex_primary` enum('None','Seeker','Survivor','Daredevil','Mastermind','Conqueror','Socialiser','Achiever') COLLATE utf8_unicode_ci DEFAULT NULL,
  `brain_hex_secondary` enum('None','Seeker','Survivor','Daredevil','Mastermind','Conqueror','Socialiser','Achiever') COLLATE utf8_unicode_ci DEFAULT NULL,
  `brain_hex_exceptions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `biography` text COLLATE utf8_unicode_ci,
  `min_party_match` int(11) NOT NULL,
  `sorting_option` enum('aa','ad','pa','pd','na','nd') COLLATE utf8_unicode_ci NOT NULL,
  `in_person` tinyint(1) NOT NULL,
  `online` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_location_id_foreign` (`location_id`),
  CONSTRAINT `users_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'raymundo15','nia.swift@yahoo.com','$2y$10$88a4rL4Ehoccg0FyhkZosee0ik6EtDrZNOW0AGpAeWbxiDUsIPQaS',9,'1a4bb14c06e206c697e1db2badbd330b',NULL,0,'2014-11-22 12:35:28','2014-11-22 12:35:28','1996-08-18','GURPS','Mastermind','Conqueror','41','I was thinking I should be like then?\' And she began nibbling at the proposal. \'Then the words \'DRINK ME,\' but nevertheless she.',0,'aa',0,0),(2,'tsatterfield','josianne66@gmail.com','$2y$10$QfhkDmT6ThUIoU6tSOBHnezzGAMB5CoO0XyFMFiKeYCyA.5C9jinW',3,'d9629acbcb14a79b0cb64d6f47aafe56',NULL,0,'2014-11-22 12:35:31','2014-11-22 12:35:31','1998-03-12','Savage Worlds','Seeker','Survivor','','Alice, \'or perhaps they won\'t walk the way down one side and up I goes like a thunderstorm. \'A fine day, your Majesty!\' the.',0,'aa',0,0),(3,'jshanahan','lonny.mraz@schaefer.info','$2y$10$LnPBKiLaTUBWCvUe5RyjjONbfuUadczMd8x9CDFOlJRawglOWLdFe',1,'7fd180fd52d75ab1911bb7cfaf1e9f6a',NULL,0,'2014-11-22 12:35:34','2014-11-22 12:35:34','1980-05-19','Call of Cthulhu','Seeker','Daredevil','0','Long Tale They were indeed a queer-looking party that assembled on the floor, and a crash of broken glass. \'What a curious.',0,'aa',0,0),(4,'logan32','agreen@yahoo.com','$2y$10$3cCniZfXX.ukvM98ieNGbO5JHFdKw4Yu8uFTy9o9oKt1rNhSqmmfS',1,'ed3d3b52390f10899f620602b834f23a',NULL,0,'2014-11-22 12:35:36','2014-11-22 12:35:36','1977-10-31','Rifts','Conqueror','Mastermind','','This time there could be NO mistake about it: it was all very well as if he thought it would like the three gardeners instantly jumped up, and there stood the Queen ordering off.',0,'aa',0,0),(5,'ufarrell','shannon13@gmail.com','$2y$10$5zdUcBEmUyMJUZ0x/q0OpOSDxVkevdKuQm6i4tqPVC/R7hNuL2FAq',5,'77881ceea14daea5db5fbb7d111c4899',NULL,0,'2014-11-22 12:35:40','2014-11-22 12:35:40','1981-09-27','Apocalyse World','None','Daredevil','22','Alice thought the whole party at once crowded round her, about four inches deep and reaching half down the chimney close above her: then,.',0,'aa',0,0),(6,'fdaugherty','xwolf@senger.net','$2y$10$TmopzFEpQyjYNdErLd1v6uKMI0vbhhllnL7nXDMHVl0Sbhp3qIauW',4,'f665c0e8071d26a40312fe7997825495',NULL,0,'2014-11-22 12:35:43','2014-11-22 12:35:43','1970-11-04','Mutants & Masterminds','Survivor','Daredevil','26','How the Owl and the others looked round also, and all would change to tinkling sheep-bells, and the whole thing very absurd, but they.',0,'aa',0,0),(7,'meaghan00','kozey.ernest@yahoo.com','$2y$10$Em3WE4TAuJyJ445kj0O1dO7T7mJFPBiOcFtvGRp.03NrlQrDCANwS',8,'cfc137a16bb040254a07fdd3b5d3cfa7',NULL,0,'2014-11-22 12:35:45','2014-11-22 12:35:45','1995-06-09','Traveller','Conqueror','Socialiser','52','Forty-two. ALL PERSONS MORE THAN A MILE HIGH TO LEAVE THE COURT.\' Everybody looked at the Footman\'s head: it just now.\'.',0,'aa',0,0),(8,'rubye98','mayer.dereck@gmail.com','$2y$10$2pmLfpZbV9zUh.cfcivMz./3RiDzgb4gksFvWx1MODwfMVxnW0GCG',1,'0cc7c861b541964b13affb5dd818290a',NULL,0,'2014-11-22 12:35:46','2014-11-22 12:35:46','2003-03-22','Call of Cthulhu','Conqueror','None','','Why, I do so like that curious song about the right words,\' said poor Alice, that she wasn\'t a really good school,\' said the Gryphon, half.',0,'aa',0,0),(9,'xblick','giovani10@hotmail.com','$2y$10$A8NWV1n3imBu4cYCqo4tNO0xkWiOddZsmSUEiOlcUDUEVsgdrsKBK',3,'3edea78d7f0f72de2ac771eef6ae215f',NULL,0,'2014-11-22 12:35:47','2014-11-22 12:35:47','1996-10-12','Call of Cthulhu','Survivor','Mastermind','2','Alice. \'You must be,\' said the Gryphon: \'I went to school in the sea. But they HAVE their tails in their paws. \'And how did you do lessons?\' said Alice, swallowing down her anger.',0,'aa',0,0),(10,'jveum','clabadie@hotmail.com','$2y$10$mtrYA655JmvUghd1Ybamkem.rPW2T.dnkxGJFzgak9tSBxPF1Gl0G',4,'c92c5f6f233016c3686a89e7b20e3007',NULL,0,'2014-11-22 12:35:48','2014-11-22 12:35:48','1973-08-31','Mutants & Masterminds','Mastermind','None','','How the Owl had the dish as its share of the jury asked. \'That I can\'t tell you my adventures--beginning from this side of the jury asked. \'That I can\'t.',0,'aa',0,0),(13,'Minthee','kinostl@gmail.com','$2y$10$8JvBZKknl7lDE2LENnDTcepD87xKBFi/DW9LF.OULpZcyEP51Y3Fi',1,'7a992bbcad7c6b7e6c9ca215f3b4e56c','rm2TvGZEPh3eTwY8LcNqQzSEMOEmZ8IzgNS2CrHzpD8i66GZAXBypPYnUzRe',0,'2014-11-22 12:46:13','2014-12-15 08:12:17','1993-01-09','',NULL,NULL,NULL,'',87,'na',0,1),(14,'asdf','asdf@asdf.edu','$2y$10$LRjmd2/ZrGR7q6e9e6Po0uGp1vhZwc33/JBD3bJ0ElwxxiDukLVV2',1,'55d1857999d79d02cfc9a8b694ba6411',NULL,0,'2014-12-06 04:09:39','2014-12-06 04:09:39','1111-01-01','',NULL,NULL,NULL,'',0,'aa',0,0),(15,'guest','guest@guest.guest','$2y$10$KTK.mHIW9vB.f/O10zEFpeyq6yY/Z10zveHdAMVu9AYtXfOKU8Zxe',1,'8481cbbc7f3e786ced7a4453d1ecfe63',NULL,0,'2014-12-15 08:12:42','2014-12-15 08:12:42','2020-10-10','',NULL,NULL,NULL,'',0,'aa',0,0);
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

-- Dump completed on 2014-12-14 22:19:36
