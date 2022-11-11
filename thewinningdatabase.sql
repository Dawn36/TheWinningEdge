/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.33 : Database - the_winning_edge
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`the_winning_edge` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `the_winning_edge`;

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `companies` */

insert  into `companies`(`id`,`user_id`,`company_name`,`street_address`,`city`,`state`,`zip_code`,`country`,`created_at`,`created_by`,`updated_at`,`updated_by`,`website`) values (1,1,'Charlotte Metro Credit Union','718 Central Ave','Charlotte','North Carolina','28204','United States','2022-11-08 05:41:45',1,'2022-11-08 17:41:45',NULL,'www.cmcu.org'),(2,1,'Grandbridge Real Estate Capital','214 N Tryon St Fl 201','Charlotte','North Carolina','28202','United States','2022-11-08 05:41:45',1,'2022-11-09 04:38:22',1,'www.grandbridge.com');

/*Table structure for table `contact_history` */

DROP TABLE IF EXISTS `contact_history`;

CREATE TABLE `contact_history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `contacts_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `status` enum('phone_call','live_conversation','voice_mail','email','meeting') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `contact_history` */

insert  into `contact_history`(`id`,`contacts_id`,`user_id`,`status`,`created_at`) values (1,125,1,'email','2022-11-09 06:10:12'),(2,126,1,'email','2022-11-09 06:10:12'),(3,125,1,'email','2022-11-09 06:11:24'),(4,126,1,'email','2022-11-09 06:11:24'),(5,125,1,'email','2022-11-09 06:11:58'),(6,126,1,'email','2022-11-09 06:11:58'),(7,125,1,'email','2022-11-09 06:13:20'),(8,126,1,'email','2022-11-09 06:13:20'),(9,126,1,'email','2022-11-10 05:49:49'),(10,126,1,'email','2022-11-10 05:56:02'),(11,126,1,'email','2022-11-10 05:58:16');

/*Table structure for table `contact_note` */

DROP TABLE IF EXISTS `contact_note`;

CREATE TABLE `contact_note` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `contact_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` enum('open','in process','complete') DEFAULT 'open',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `contact_note` */

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `status` enum('current_client','active_discussion','not_interested','unsubscribed','prospect','user') DEFAULT 'prospect',
  `tags` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_phone` varchar(255) DEFAULT NULL,
  `companies_id` bigint(20) DEFAULT NULL,
  `linked_in_url` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

/*Data for the table `contacts` */

insert  into `contacts`(`id`,`user_id`,`first_name`,`last_name`,`profile_img`,`job`,`status`,`tags`,`note`,`phone_number`,`email`,`mobile_phone`,`companies_id`,`linked_in_url`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,1,'Frank','Gargano',NULL,'Chief Executive Officer','prospect','2019,2016',NULL,NULL,'fgargano@cmcu.org',NULL,1,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(2,1,'Hedwig','Stevens',NULL,'Manager, Operations','prospect','2019,2016',NULL,NULL,'hstevens@cmcu.org','(704) 860-1770',1,'https://www.linkedin.com/in/hedwig-stevens-300b7616','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(3,1,'Karen','Pellow',NULL,'Chief Financial Officer','prospect','2019,2016',NULL,'(704) 375-0183 ext. 244','kpellow@cmcu.org','(704) 534-5216',1,'https://www.linkedin.com/in/karen-pellow-52740517','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(4,1,'LaKeisha','Ramseur',NULL,'Vice President, Compliance & Product Development','prospect','2019,2016',NULL,'(336) 379-3527','lakeisha.ramseur@cmcu.org','(336) 370-1286',1,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(5,1,'Brett','Fisher',NULL,'Senior VP, Finance','prospect','2019,2016',NULL,'(704) 375-0183 ext. 4460','bfisher@cmcu.org','(803) 577-9436',1,'https://www.linkedin.com/in/brett-fisher-cfa-26531216','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(6,1,'Joe','Clark',NULL,'Chief Administrative Officer & General Counsel','prospect','2019,2016',NULL,'(704) 375-0183 ext. 223','jclark@cmcu.org','(336) 287-6030',1,'https://www.linkedin.com/in/joe-clark-08a85b66','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(7,1,'Malinda','Mertz',NULL,'Managing Partner','prospect','2019,2016',NULL,NULL,'mmertz@cmcu.org',NULL,1,'https://www.linkedin.com/in/melissa-mertz-b8ba3a16a','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(8,1,'Ken','Mellette',NULL,'Vice President, Lending','prospect','2019,2016',NULL,NULL,'kmellette@cmcu.org','(704) 224-7029',1,'https://www.linkedin.com/in/ken-mellette','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(9,1,'Eric','Gelly',NULL,'President & Chief Executive Officer','prospect','2019,2016',NULL,NULL,'egelly@cmcu.org','(336) 337-4385',1,'https://www.linkedin.com/in/eric-gelly-66084b11','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(10,1,'Kim','Walters',NULL,'VP Operations','prospect','2019,2016',NULL,NULL,'kwalters@cmcu.org',NULL,1,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(11,1,'Deane','1',NULL,'Director of Commercial Lending','prospect','2019,2016',NULL,NULL,'dtrue@cmcu.org',NULL,1,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(12,1,'Norman','Whiteside',NULL,'Director of Lending','prospect','2019,2016',NULL,NULL,'nwhiteside@cmcu.org',NULL,1,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(13,1,'Susan','Espinosa',NULL,'VP Member Experience','prospect','2019,2016',NULL,NULL,'sespinosa@cmcu.org','(704) 877-1087',1,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(14,1,'Tiffany','Reece',NULL,'Risk Mitigation Manager','prospect','2019,2016',NULL,NULL,'treece@cmcu.org',NULL,1,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(15,1,'Rafaela','Espinosa',NULL,'Vice President','prospect','2019,2016',NULL,NULL,'respinosa@grandbridge.com',NULL,2,'https://www.linkedin.com/in/rafaela-espinosa-183251a','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(16,1,'Eric','Li',NULL,'Director','prospect','2019,2016',NULL,NULL,'eli@grandbridge.com',NULL,2,'https://www.linkedin.com/in/eric-d-li-791b913a','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(17,1,'Tyler','Paul',NULL,'Deputy Chief Underwriter Senior Vice President - GSE Lending','prospect','2019,2016',NULL,NULL,'tpaul@grandbridge.com',NULL,2,'https://www.linkedin.com/in/tyler-paul-7203b9b0','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(18,1,'Brent','Hansen',NULL,'Senior Vice President, Senior Portfolio Manager','prospect','2019,2016',NULL,NULL,'bhansen@grandbridge.com',NULL,2,'https://www.linkedin.com/in/brentjhansen','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(19,1,'Kimberly','Love',NULL,'Vice President and Portfolio Risk Officer III','prospect','2019,2016',NULL,'(704) 379-6981','klove@grandbridge.com','(704) 560-1917',2,'https://www.linkedin.com/in/kimberly-love-65709a9b','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(20,1,'Kathleen','Lomuscio',NULL,'Vice President','prospect','2019,2016',NULL,'(704) 379-6951','klomuscio@grandbridge.com','(704) 618-0270',2,'https://www.linkedin.com/pub/kathleen-lomuscio/37/178/870','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(21,1,'Manny','Gonzalez',NULL,'Portfolio Manager, Commercial Real Estate','prospect','2019,2016',NULL,NULL,'mgonzalez@grandbridge.com','(786) 459-0841',2,'https://www.linkedin.com/in/manny-gonzalez-162b6a9','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(22,1,'Gordon','White',NULL,'Senior Credit Risk Officer','prospect','2019,2016',NULL,'(704) 379-6986','gwhite@grandbridge.com','(864) 270-8481',2,'https://www.linkedin.com/pub/gordon-white/5/b72/86a','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(23,1,'Brad','Barnett',NULL,'Assistant Vice President & Senior Strategic Associate','prospect','2019,2016',NULL,'(704) 379-6917','bbarnett@grandbridge.com','(704) 560-8587',2,'https://www.linkedin.com/in/bradbarnett','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(24,1,'Matthew','Rocco',NULL,'Grandbridge Real Estate Capital Chairman & Chief Executive Officer','prospect','2019,2016',NULL,'(704) 379-6937','mrocco@grandbridge.com','(239) 290-5737',2,'https://www.linkedin.com/in/matthewrocco1','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(25,1,'Derek','Veen',NULL,'Vice President','prospect','2019,2016',NULL,'(913) 732-5277','derek.vanderveen@grandbridge.com','(712) 330-7708',2,'https://www.linkedin.com/pub/derek-vander-veen/29/1b/289','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(26,1,'Evan','Hom',NULL,'Managing Director','prospect','2019,2016',NULL,'(212) 326-3131','evan.hom@grandbridge.com','(609) 529-0511',2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(27,1,'Kayla','Norris',NULL,'Vice President','prospect','2019,2016',NULL,'(704) 379-6911','knorris@grandbridge.com','(803) 448-4083',2,'https://www.linkedin.com/in/kayla-norris-15208b55','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(28,1,'Lyndell','Elam',NULL,'Vice President - Senior Operations Manager','prospect','2019,2016',NULL,'(704) 379-6921','elam@grandbridge.com','(803) 431-1903',2,'https://www.linkedin.com/in/lyndell-elam-9639562a','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(29,1,'Josh','Crowell',NULL,'Vice President','prospect','2019,2016',NULL,'(919) 687-7228','josh.crowell@grandbridge.com','(336) 407-5938',2,'https://www.linkedin.com/in/joshuahammillcrowell','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(30,1,'Morgan','Olander',NULL,'Vice President','prospect','2019,2016',NULL,'(913) 850-6377','molander@grandbridge.com','(913) 568-7190',2,'https://www.linkedin.com/pub/morgan-olander/18/938/63','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(31,1,'Anne','Doty',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(205) 978-1918','adoty@grandbridge.com','(205) 907-7585',2,'https://www.linkedin.com/in/annedoty','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(32,1,'Chris','Dyson',NULL,'Senor Vice President','prospect','2019,2016',NULL,'(205) 978-1843','cdyson@grandbridge.com','(205) 908-9620',2,'https://www.linkedin.com/in/chris-dyson-27254a43','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(33,1,'Michael','Somerville',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(703) 891-7010','michael.somerville@grandbridge.com','(703) 581-4642',2,'https://www.linkedin.com/in/michaelsomerville','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(34,1,'David','Gahagan',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(954) 389-5145','david.gahagan@grandbridge.com','(305) 778-6474',2,'https://www.linkedin.com/in/david-gahagan-17ab038','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(35,1,'Jin','Lin',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(704) 379-6961','jlin@grandbridge.com','(704) 224-3374',2,'https://www.linkedin.com/in/jin-lin-a3554758','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(36,1,'Kimberly','Dahlhausen',NULL,'HUD Deputy Chief Underwriter','prospect','2019,2016',NULL,NULL,'kim.dahlhausen@grandbridge.com','(216) 225-3491',2,'https://www.linkedin.com/in/kim-dahlhausen-a164606','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(37,1,'Daniel','Puntil',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(412) 394-4098','dpuntil@grandbridge.com','(412) 977-2280',2,'https://www.linkedin.com/in/daniel-puntil-2212a31b','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(38,1,'Jennifer','Shedden',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(704) 379-6966','jshedden@grandbridge.com','(704) 575-2583',2,'https://www.linkedin.com/pub/jennifer-shedden/14/31b/403','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(39,1,'Allen','McMurtry',NULL,'Senior Vice President','prospect','2019,2016',NULL,NULL,'allen.mcmurtry@grandbridge.com','(813) 220-0375',2,'https://www.linkedin.com/in/jasonbjordan','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(40,1,'William','Evans',NULL,'Vice President','prospect','2019,2016',NULL,'(713) 993-1363','wevans@grandbridge.com','(713) 444-5278',2,'https://www.linkedin.com/in/will-evans-851b5b66','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(41,1,'Michael','Ortlip',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(704) 379-6950','mortlip@grandbridge.com','(704) 609-1509',2,'https://www.linkedin.com/in/michael-ortlip-a4288a4','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(42,1,'Ken','Walters',NULL,'CCMS Senior Vice President','prospect','2019,2016',NULL,'(205) 978-1929','kwalters@grandbridge.com','(205) 427-6520',2,'https://www.linkedin.com/in/ken-walters-293905126','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(43,1,'Kenneth','Bowen',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(614) 358-4122','kbowen@grandbridge.com','(614) 570-1051',2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(44,1,'Jamie','Petitt',NULL,'Vice President','prospect','2019,2016',NULL,'(404) 836-6058','jamie.petitt@grandbridge.com','(949) 300-2305',2,'https://www.linkedin.com/in/jamie-petitt-a25bb394','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(45,1,'Donald','Curtis',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(949) 885-4141','dcurtis@grandbridge.com','(949) 697-2878',2,'https://www.linkedin.com/in/donald-curtis-ba509a13','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(46,1,'Robin','Sikes',NULL,'Senior Vice President, Grandbridge Strategy Manager','prospect','2019,2016',NULL,'(704) 379-6985','rsikes@grandbridge.com','(704) 651-4989',2,'https://www.linkedin.com/pub/robin-sikes/5/64/118','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(47,1,'Paul','Harbor',NULL,'Senior Vice President, Loan Originations','prospect','2019,2016',NULL,'(205) 978-1272','pharbor@grandbridge.com','(205) 613-7998',2,'https://www.linkedin.com/in/paul-harbor-16a9a513','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(48,1,'Craig','Kegg',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(614) 358-4105','ckegg@grandbridge.com','(614) 905-2660',2,'https://www.linkedin.com/in/craig-kegg-1399972','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(49,1,'Greg','Young',NULL,'Senior Vice President, Office Co-Manager','prospect','2019,2016',NULL,'(713) 993-1311','gyoung@grandbridge.com','(713) 851-9773',2,'https://www.linkedin.com/in/greg-young-2585697','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(50,1,'Joseph','Platt',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(913) 748-4456','jplatt@grandbridge.com','(913) 980-9085',2,'https://www.linkedin.com/in/joe-platt-1b64797','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(51,1,'Phillip','Cox',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(864) 315-3484','pcox@grandbridge.com','(864) 414-4200',2,'https://www.linkedin.com/in/gbrephillipcox','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(52,1,'Tony','Carlson',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(612) 341-7886','tcarlson@grandbridge.com','(952) 994-7917',2,'https://www.linkedin.com/in/tonyjcarlson','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(53,1,'Robert','LaRue',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(713) 993-1333','rlarue@grandbridge.com','(713) 828-7129',2,'https://www.linkedin.com/in/robert-larue-973b5517','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(54,1,'John','Gordon',NULL,'Vice President','prospect','2019,2016',NULL,'(312) 602-6082','john.gordon@grandbridge.com','(814) 440-9038',2,'https://www.linkedin.com/in/john-gordon-976a545a','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(55,1,'Matt','Halberg',NULL,'Vice President','prospect','2019,2016',NULL,'(612) 341-7887','mhalberg@grandbridge.com','(612) 868-1282',2,'https://www.linkedin.com/in/matthalberg','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(56,1,'Frank','Sciara',NULL,'Vice President','prospect','2019,2016',NULL,NULL,'fsciara@grandbridge.com','(816) 916-7706',2,'https://www.linkedin.com/in/franksciara','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(57,1,'Hal','Worth',NULL,'Vice President','prospect','2019,2016',NULL,'(919) 594-6754','hworth@grandbridge.com','(919) 649-3169',2,'https://www.linkedin.com/pub/hal-worth/6/228/756','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(58,1,'Birgitt','Reynolds',NULL,'Manager, Credit Risk','prospect','2019,2016',NULL,'(469) 403-2124','birgitt.reynolds@grandbridge.com','(972) 658-7417',2,'https://www.linkedin.com/pub/birgitt-reynolds/48/B3B/362','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(59,1,'William','Hasselmann',NULL,'Vice President','prospect','2019,2016',NULL,'(704) 379-6920','whasselmann@grandbridge.com','(980) 229-8866',2,'https://www.linkedin.com/in/william-hasselmann-1341b21a','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(60,1,'Alex','Hilton',NULL,'Vice President','prospect','2019,2016',NULL,'(913) 748-4461','ahilton@grandbridge.com','(913) 568-4927',2,'https://www.linkedin.com/in/alex-hilton-1072a736','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(61,1,'John','Segrest',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(205) 978-1842','jsegrest@grandbridge.com','(205) 807-5258',2,'https://www.linkedin.com/pub/john-segrest/13/586/627','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(62,1,'Richard','Alexander',NULL,'Vice President','prospect','2019,2016',NULL,'(251) 288-6831','ralexander@grandbridge.com','(251) 583-3544',2,'https://www.linkedin.com/in/richard-alexander-jr-13051818','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(63,1,'James','Fowler',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(949) 885-4144','jfowler@grandbridge.com','(949) 677-0480',2,'https://www.linkedin.com/in/james-fowler-5a085a18','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(64,1,'Brett','Mason',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(919) 594-6753','bmason@grandbridge.com','(919) 244-6919',2,'https://www.linkedin.com/pub/brett-mason/8/938/972','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(65,1,'Shasta','Vance',NULL,'Senior Vice President Agency Lending','prospect','2019,2016',NULL,NULL,'shasta.vance@grandbridge.com','(304) 257-6492',2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(66,1,'Ben','Fazendin',NULL,'Vice President','prospect','2019,2016',NULL,'(612) 341-7889','bfazendin@grandbridge.com','(612) 387-3915',2,'https://www.linkedin.com/pub/ben-fazendin/8/408/41','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(67,1,'Keith','Medlin',NULL,'Vice President','prospect','2019,2016',NULL,'(704) 379-6925','kmedlin@grandbridge.com','(704) 501-7632',2,'https://www.linkedin.com/in/keith-medlin-96641b168','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(68,1,'John','Nicola',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(239) 676-3404','jnicola@grandbridge.com','(239) 229-9541',2,'https://www.linkedin.com/in/johnnicola','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(69,1,'Lee','Serah',NULL,'Director','prospect','2019,2016',NULL,'(212) 326-3129','serah.lee@grandbridge.com','(734) 834-2082',2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(70,1,'Ariel','Zucker',NULL,'Vice President','prospect','2019,2016',NULL,NULL,'ariel.zucker@grandbridge.com','(954) 249-8224',2,'https://www.linkedin.com/in/ariel-zucker-3a5273171','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(71,1,'John','Stewart',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(720) 418-8866','jstewart@grandbridge.com','(303) 912-9610',2,'https://www.linkedin.com/in/john-stewart-43b74a100','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(72,1,'Annabelle','Agyeman',NULL,'Vice President','prospect','2019,2016',NULL,'(469) 403-2125','annabelle.agyeman@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(73,1,'Thomas','Marcy',NULL,'Vice President','prospect','2019,2016',NULL,'(404) 602-1382','mthomas@grandbridge.com','(404) 786-5645',2,'https://www.linkedin.com/in/marcy-thomas-ccim-054590124','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(74,1,'Erica','Seipelt',NULL,'Vice President','prospect','2019,2016',NULL,'(360) 949-1414','erica.seipelt@elecivolt.com','(404) 786-5645',2,'https://www.linkedin.com/in/marcy-thomas-ccim-054590124','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(75,1,'Lakisha','Ford',NULL,'Vice President','prospect','2019,2016',NULL,'(205) 978-1273','lford@grandbridge.com','(205) 306-1449',2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(76,1,'Dave','Rasmussen',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(612) 341-7899','drasmussen@grandbridge.com','(612) 655-9857',2,'https://www.linkedin.com/in/realdave','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(77,1,'Matthew','Deal',NULL,'Vice President','prospect','2019,2016',NULL,'(202) 293-8034','mdeal@grandbridge.com','(202) 841-1188',2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(78,1,'Mary','Than',NULL,'Portfolio Manager IV','prospect','2019,2016',NULL,NULL,'mary.than@grandbridge.com','(703) 964-6899',2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(79,1,'Curtis','Hunter',NULL,'Vice President','prospect','2019,2016',NULL,'(949) 885-4142','hcurtis@grandbridge.com','(949) 697-4378',2,'https://www.linkedin.com/in/hunter-curtis-a066563b','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(80,1,'Brian','Zimmerman',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(913) 748-4454','bzimmerman@grandbridge.com','(816) 456-7026',2,'https://www.linkedin.com/in/brian-zimmerman-32b86737','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(81,1,'Daniel','Sullivan',NULL,'Senior Vice President Director of HUD Lending','prospect','2019,2016',NULL,NULL,'daniel.j.sullivan@grandbridge.com','(703) 624-8090',2,'https://www.linkedin.com/in/dan-sullivan-3b8930166','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(82,1,'Joseph','Markech',NULL,'Managing Director','prospect','2019,2016',NULL,'(312) 602-6090','joseph.markech@grandbridge.com','(312) 925-2117',2,'https://www.linkedin.com/in/joseph-markech-05644b13','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(83,1,'Molly','Williams',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(205) 978-1102','mwilliams@grandbridge.com','(205) 478-0197',2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(84,1,'Peter','Rawlings',NULL,'Vice President','prospect','2019,2016',NULL,'(202) 293-8032','prawlings@grandbridge.com','(202) 558-8844',2,'https://www.linkedin.com/in/peter-rawlings-a711a19','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(85,1,'Bradley','Walker',NULL,'Vice President','prospect','2019,2016',NULL,'(404) 602-1440','bwalker@grandbridge.com','(404) 273-5423',2,'https://www.linkedin.com/pub/bradley-a-walker-ccim/10/867/947','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(86,1,'Alan','Tapie',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(404) 602-1383','atapie@grandbridge.com','(770) 402-5392',2,'https://www.linkedin.com/in/alantapie','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(87,1,'Brett','Olson',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(612) 341-7885','bolson@grandbridge.com','(651) 442-9994',2,'https://www.linkedin.com/in/brett-olson-592361122','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(88,1,'Frank','Guzikowski',NULL,'Executive Vice President','prospect','2019,2016',NULL,'(305) 523-1733','fguzikowski@grandbridge.com','(703) 989-1220',2,'https://www.linkedin.com/in/frank-guzikowski-a18160145','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(89,1,'Brett','Blackwood',NULL,'Executive Vice President & Counsel','prospect','2019,2016',NULL,'(205) 978-1271','bblackwood@grandbridge.com','(205) 568-8867',2,'https://www.linkedin.com/in/brett-blackwood-9b84a7110','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(90,1,'Victor','Pickett',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(757) 355-5049','vpickett@grandbridge.com','(757) 434-7957',2,'https://www.linkedin.com/pub/victor-pickett/82/143/128','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(91,1,'Artin','Anvar',NULL,'Managing Director','prospect','2019,2016',NULL,'(202) 823-4391','artin.anvar@grandbridge.com','(602) 400-4023',2,'https://www.linkedin.com/in/artinanvar','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(92,1,'Kevin','Wiedelman',NULL,'Vice President','prospect','2019,2016',NULL,'(248) 282-0086','kevin.wiedelman@grandbridge.com','(248) 520-6165',2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(93,1,'Ana','McBayne',NULL,'Vice President','prospect','2019,2016',NULL,'(703) 891-7009','ana.mcbayne@grandbridge.com','(301) 706-0449',2,'https://www.linkedin.com/in/ana-mcbayne-b7991856','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(94,1,'Rad','Davenport',NULL,'Vice President','prospect','2019,2016',NULL,'(757) 355-5046','rdavenport@grandbridge.com','(757) 630-1980',2,'https://www.linkedin.com/pub/rad-davenport/96/888/942','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(95,1,'Christina','Wagner',NULL,'Senior Vice President','prospect','2019,2016',NULL,'(248) 282-0186','christina.wagner@grandbridge.com','(248) 835-3071',2,'https://www.linkedin.com/in/christinalwagner','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(96,1,'Mitch','Printz',NULL,'Vice President','prospect','2019,2016',NULL,'(617) 316-1329','mprintz@grandbridge.com','(917) 692-4456',2,'https://www.linkedin.com/in/mitchprintz','2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(97,1,'Niki','Perez',NULL,'VP','prospect','2019,2016',NULL,NULL,'nperez@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(98,1,'Donald','Billingsley',NULL,'VP','prospect','2019,2016',NULL,NULL,'dbillingsley@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(99,1,'Patrick','Brown',NULL,'SVP','prospect','2019,2016',NULL,NULL,'pbrown@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(100,1,'John','Hankins',NULL,'VP','prospect','2019,2016',NULL,NULL,'jhankins@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(101,1,'Lucas','Donahue',NULL,'SVP','prospect','2019,2016',NULL,NULL,'ldonahue@grandbridge.com','(602) 751-5453',2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(102,1,'Tyler','D\'Egidio',NULL,'VP','prospect','2019,2016',NULL,NULL,'tdegidio@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(103,1,'Meredith','Davis',NULL,'SVP','prospect','2019,2016',NULL,NULL,'mdavis@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(104,1,'Tom','Ryan',NULL,'VP','prospect','2019,2016',NULL,NULL,'tryan@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(105,1,'Russ','Balderson',NULL,'VP','prospect','2019,2016',NULL,NULL,'rbalderson@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(106,1,'Rob','Vaughn',NULL,'Director, DD','prospect','2019,2016',NULL,'(704) 379-6946','rvaughn@grandbridge.com','(704) 904-8157',2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(107,1,'Sean','Morris',NULL,'Portfolio Manager','prospect','2019,2016',NULL,NULL,'smorris@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(108,1,'Russell','Ballard',NULL,'Deputy Chief Underwriter/Credi Risk SVP','prospect','2019,2016',NULL,'(404) 602-1366','srussell@grandbridge.com','(770) 238-9271',2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(109,1,'Armechia','Scott',NULL,'AVP','prospect','2019,2016',NULL,NULL,'ascott@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(110,1,'Daniel','Swartz',NULL,'Deputy Chief Underwriter','prospect','2019,2016',NULL,NULL,'dswartz@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(111,1,'Velinda','Dismukes',NULL,'VP','prospect','2019,2016',NULL,NULL,'vdismukes@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(112,1,'Richard','Brinson',NULL,'SVP','prospect','2019,2016',NULL,NULL,'rbrinson@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(113,1,'Jack','Bauer',NULL,'SVP','prospect','2019,2016',NULL,NULL,'jbauer@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(114,1,'Joe','Shaffer',NULL,'CFO','prospect','2019,2016',NULL,'(704) 379-6999','jshaffer@grandbridge.com','(704) 904-7612',2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(115,1,'Pat','Dempsey',NULL,'SVP','prospect','2019,2016',NULL,NULL,'pdempsey@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(116,1,'Dennis','Edmiston',NULL,'SVP','prospect','2019,2016',NULL,NULL,'dedmiston@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(117,1,'Ed','Tamer',NULL,'SVP','prospect','2019,2016',NULL,NULL,'etamer@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(118,1,'Lance','Lehman',NULL,'SVP','prospect','2019,2016',NULL,NULL,'llehman@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(119,1,'Hal','Holliday',NULL,'SVP','prospect','2019,2016',NULL,NULL,'hholliday@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(120,1,'Steve','Marshall',NULL,'SVP','prospect','2019,2016',NULL,NULL,'smarshall@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(121,1,'Carl','Olzawski',NULL,'SVP','prospect','2019,2016',NULL,NULL,'colzawski@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(122,1,'Greg','Moulin',NULL,'SVP','prospect','2019,2016',NULL,NULL,'gmoulin@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(123,1,'Jim','Richards',NULL,'SVP','prospect','2019,2016',NULL,NULL,'jrichards@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(124,1,'Michael','Goorvich',NULL,'SVP','prospect','2019,2016',NULL,NULL,'mgoorvich@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(125,1,'William','Silsbee',NULL,'SVP','prospect','2019,2016',NULL,NULL,'wsilsbee@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL),(126,1,'TJ','Ownby',NULL,'SVP','prospect','2019,2016',NULL,NULL,'townby@grandbridge.com',NULL,2,NULL,'2022-11-10 06:29:01',NULL,'2022-11-10 06:29:01',NULL);

/*Table structure for table `email_templates` */

DROP TABLE IF EXISTS `email_templates`;

CREATE TABLE `email_templates` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `template_name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `email_templates` */

insert  into `email_templates`(`id`,`user_id`,`template_name`,`subject`,`body`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (2,1,'asd','dawm','<p>zc asdsasadsad sd <strong><em><u>ask dkn</u></em></strong><em><u> </u></em><strong><em><u>askdsa</u></em></strong></p>','2022-09-30 07:29:31',1,'2022-11-05 00:00:00',1),(3,1,'dawnn sadas','asdsa dksa dlkaslkd','<p>{{FIRST_NAME}} asd asd </p>','2022-11-05 05:26:45',1,'2022-11-05 17:26:45',NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

insert  into `failed_jobs`(`id`,`uuid`,`connection`,`queue`,`payload`,`exception`,`failed_at`) values (1,'16560fbd-0cae-4320-8f29-7f6ab76cf893','database','default','{\"uuid\":\"16560fbd-0cae-4320-8f29-7f6ab76cf893\",\"displayName\":\"App\\\\Jobs\\\\ContactJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ContactJob\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\ContactJob\\\":13:{s:7:\\\"\\u0000*\\u0000body\\\";s:121:\\\"<p>zc asdsasadsad sd <strong><em><u>ask dkn<\\/u><\\/em><\\/strong><em><u> <\\/u><\\/em><strong><em><u>askdsa<\\/u><\\/em><\\/strong><\\/p>\\\";s:10:\\\"\\u0000*\\u0000subject\\\";s:4:\\\"dawm\\\";s:12:\\\"\\u0000*\\u0000contactId\\\";a:2:{i:0;s:3:\\\"127\\\";i:1;s:3:\\\"126\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}','ErrorException: Attempt to read property \"id\" on null in D:\\dawn\\myproject\\laravel\\TheWinningEdge\\app\\Jobs\\ContactJob.php:50\nStack trace:\n#0 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\app\\Jobs\\ContactJob.php(50): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Attempt to read...\', \'D:\\\\dawn\\\\myproje...\', 50)\n#1 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\ContactJob->handle()\n#2 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#3 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#4 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#5 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#6 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#7 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\ContactJob))\n#8 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ContactJob))\n#9 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#10 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\ContactJob), false)\n#11 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\ContactJob))\n#12 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ContactJob))\n#13 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#14 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\ContactJob))\n#15 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#16 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#17 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#18 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#21 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#22 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#23 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#24 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#25 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#26 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#27 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\symfony\\console\\Application.php(1028): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}','2022-11-08 17:38:30'),(2,'bb1813ff-01f7-484c-8769-d604b3aa1bfa','database','default','{\"uuid\":\"bb1813ff-01f7-484c-8769-d604b3aa1bfa\",\"displayName\":\"App\\\\Jobs\\\\ContactJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ContactJob\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\ContactJob\\\":14:{s:7:\\\"\\u0000*\\u0000body\\\";s:79:\\\"<p><span style=\\\"background-color: rgb(239, 242, 245);\\\">[[FIRSTNAME]]<\\/span><\\/p>\\\";s:10:\\\"\\u0000*\\u0000subject\\\";s:19:\\\"asdsa dksa dlkaslkd\\\";s:12:\\\"\\u0000*\\u0000contactId\\\";a:2:{i:0;s:3:\\\"126\\\";i:1;s:3:\\\"125\\\";}s:9:\\\"\\u0000*\\u0000userId\\\";i:1;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2022-11-09 06:07:03.074564\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:16:\\\"America\\/New_York\\\";}s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}','Swift_TransportException: Cannot send message without a sender address in D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\AbstractSmtpTransport.php:195\nStack trace:\n#0 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Mailer.php(71): Swift_Transport_AbstractSmtpTransport->send(Object(Swift_Message), Array)\n#1 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(521): Swift_Mailer->send(Object(Swift_Message), Array)\n#2 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(288): Illuminate\\Mail\\Mailer->sendSwiftMessage(Object(Swift_Message))\n#3 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(187): Illuminate\\Mail\\Mailer->send(Object(Illuminate\\Support\\HtmlString), Array, Object(Closure))\n#4 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#5 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(188): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#6 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(304): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#7 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(258): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\SendContactMailable))\n#8 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\SendContactMailable))\n#9 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\app\\Jobs\\ContactJob.php(59): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\SendContactMailable))\n#10 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\ContactJob->handle()\n#11 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#12 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#13 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#14 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#15 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#16 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\ContactJob))\n#17 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ContactJob))\n#18 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#19 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\ContactJob), false)\n#20 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\ContactJob))\n#21 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ContactJob))\n#22 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#23 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\ContactJob))\n#24 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#25 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#26 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#27 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#28 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#29 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#30 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#31 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#32 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#33 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#34 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#35 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#36 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#37 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#38 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\symfony\\console\\Application.php(1028): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 {main}','2022-11-09 06:07:06'),(3,'aef49cd8-0ac4-420c-8b20-b9efdcba1867','database','default','{\"uuid\":\"aef49cd8-0ac4-420c-8b20-b9efdcba1867\",\"displayName\":\"App\\\\Jobs\\\\ContactJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ContactJob\",\"command\":\"O:19:\\\"App\\\\Jobs\\\\ContactJob\\\":14:{s:7:\\\"\\u0000*\\u0000body\\\";s:79:\\\"<p><span style=\\\"background-color: rgb(239, 242, 245);\\\">[[FIRSTNAME]]<\\/span><\\/p>\\\";s:10:\\\"\\u0000*\\u0000subject\\\";s:19:\\\"asdsa dksa dlkaslkd\\\";s:12:\\\"\\u0000*\\u0000contactId\\\";s:13:\\\"[\\\"126\\\",\\\"125\\\"]\\\";s:9:\\\"\\u0000*\\u0000userId\\\";i:1;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2022-11-09 06:08:43.428147\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:16:\\\"America\\/New_York\\\";}s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}','TypeError: Illuminate\\Database\\Query\\Builder::cleanBindings(): Argument #1 ($bindings) must be of type array, string given, called in D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php on line 997 and defined in D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php:3369\nStack trace:\n#0 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(997): Illuminate\\Database\\Query\\Builder->cleanBindings(\'[\"126\",\"125\"]\')\n#1 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Query\\Builder->whereIn(\'id\', \'[\"126\",\"125\"]\')\n#2 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1660): Illuminate\\Database\\Eloquent\\Builder->forwardCallTo(Object(Illuminate\\Database\\Query\\Builder), \'whereIn\', Array)\n#3 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->__call(\'whereIn\', Array)\n#4 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2132): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'whereIn\', Array)\n#5 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2144): Illuminate\\Database\\Eloquent\\Model->__call(\'whereIn\', Array)\n#6 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\app\\Jobs\\ContactJob.php(47): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'whereIn\', Array)\n#7 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\ContactJob->handle()\n#8 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#9 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#10 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#11 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#12 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#13 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\ContactJob))\n#14 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ContactJob))\n#15 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#16 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\ContactJob), false)\n#17 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\ContactJob))\n#18 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\ContactJob))\n#19 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#20 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\ContactJob))\n#21 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#22 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#23 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#24 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#25 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#26 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#27 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#28 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#29 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#30 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#31 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#32 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#33 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#34 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#35 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\symfony\\console\\Application.php(1028): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\symfony\\console\\Application.php(299): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 D:\\dawn\\myproject\\laravel\\TheWinningEdge\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 {main}','2022-11-09 06:08:45');

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2022_09_30_174128_laratrust_setup_tables',2),(5,'2022_11_05_105631_create_jobs_table',3);

/*Table structure for table `opportunities` */

DROP TABLE IF EXISTS `opportunities`;

CREATE TABLE `opportunities` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `contract_amount` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `opportunities` */

insert  into `opportunities`(`id`,`user_id`,`name`,`company_name`,`contract_amount`,`duration`,`file_name`,`path`,`note`,`size`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (3,1,'Ignatius Craft','Rios Guthrie LLC','1000','Ea eligendi aliquam','preview-8.jpg','uploads/opportunity/1/202210011208preview-8.jpg',NULL,'14451','2022-10-01 12:08:52',1,'2022-10-01 12:08:52',NULL),(4,1,'Timon Young','Terrell and Silva Traders','63','Et quasi tempor volu','','','sdasd','','2022-11-05 07:51:39',1,'2022-11-05 00:00:00',NULL),(5,1,'Freya Sweeney','Hudson Parrish Trading','93','Sapiente sit quidem','','','In facere ut officia','','2022-11-05 15:12:58',1,'2022-11-05 15:12:58',NULL);

/*Table structure for table `opportunities_target` */

DROP TABLE IF EXISTS `opportunities_target`;

CREATE TABLE `opportunities_target` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `opportunities_target` */

insert  into `opportunities_target`(`id`,`user_id`,`target`,`created_at`) values (1,1,'2000','2022-10-01 00:00:00'),(2,5,'1000','2022-11-06 00:00:00');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`permission_id`,`role_id`) values (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1);

/*Table structure for table `permission_user` */

DROP TABLE IF EXISTS `permission_user`;

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_user` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'users-create','Create Users','Create Users','2022-09-30 17:42:50','2022-09-30 17:42:50'),(2,'users-read','Read Users','Read Users','2022-09-30 17:42:50','2022-09-30 17:42:50'),(3,'users-update','Update Users','Update Users','2022-09-30 17:42:50','2022-09-30 17:42:50'),(4,'users-delete','Delete Users','Delete Users','2022-09-30 17:42:50','2022-09-30 17:42:50'),(5,'payments-create','Create Payments','Create Payments','2022-09-30 17:42:50','2022-09-30 17:42:50'),(6,'payments-read','Read Payments','Read Payments','2022-09-30 17:42:50','2022-09-30 17:42:50'),(7,'payments-update','Update Payments','Update Payments','2022-09-30 17:42:50','2022-09-30 17:42:50'),(8,'payments-delete','Delete Payments','Delete Payments','2022-09-30 17:42:50','2022-09-30 17:42:50'),(9,'profile-read','Read Profile','Read Profile','2022-09-30 17:42:50','2022-09-30 17:42:50'),(10,'profile-update','Update Profile','Update Profile','2022-09-30 17:42:50','2022-09-30 17:42:50');

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`role_id`,`user_id`,`user_type`) values (1,1,'App\\Models\\User'),(1,3,'App\\Models\\User'),(2,4,'App\\Models\\User'),(2,5,'App\\Models\\User');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'admin','Admin','Admin','2022-09-30 17:42:50','2022-09-30 17:42:50'),(2,'user','User','User','2022-11-06 03:42:14','2022-11-06 03:42:17');

/*Table structure for table `rpa_target` */

DROP TABLE IF EXISTS `rpa_target`;

CREATE TABLE `rpa_target` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `phone_call` bigint(20) DEFAULT NULL,
  `live_conversation` bigint(20) DEFAULT NULL,
  `voice_mail` bigint(20) DEFAULT NULL,
  `email` bigint(20) DEFAULT NULL,
  `meeting` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `rpa_target` */

insert  into `rpa_target`(`id`,`user_id`,`phone_call`,`live_conversation`,`voice_mail`,`email`,`meeting`,`created_at`) values (1,1,5,5,5,5,5,'2022-10-01 00:00:00'),(2,1,100,100,100,100,100,'2022-09-14 00:00:00'),(3,1,20,202,20,20,200,'2022-11-05 00:00:00'),(4,5,10,10,10,10,10,'2022-11-06 00:00:00');

/*Table structure for table `talk_tracks` */

DROP TABLE IF EXISTS `talk_tracks`;

CREATE TABLE `talk_tracks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `talk_track_name` varchar(255) DEFAULT NULL,
  `note` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `talk_tracks` */

insert  into `talk_tracks`(`id`,`user_id`,`talk_track_name`,`note`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (2,1,'aaaaaaa','<p>aaaaaaaaanbbbbbbbbbb</p>','2022-09-30 08:12:51',1,'2022-09-30 00:00:00',1),(3,5,'dawn','<p>sad</p>','2022-11-06 03:42:32',5,'2022-11-06 03:42:32',NULL);

/*Table structure for table `tasks` */

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `contact_id` bigint(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `task_date` datetime DEFAULT NULL,
  `task_status` enum('open','in progress','completed') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tasks` */

insert  into `tasks`(`id`,`user_id`,`contact_id`,`description`,`task_date`,`task_status`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (2,1,2,'asad','2022-11-23 00:00:00','open','2022-11-05 08:51:14',1,'2022-11-05 08:51:14',NULL),(3,1,1,'asd asd','2022-11-02 00:00:00','open','2022-11-05 09:05:38',1,'2022-11-05 09:05:38',NULL),(4,1,1,'asdsadsad dawn','2022-11-02 00:00:00','open','2022-11-05 09:06:07',1,'2022-11-05 02:31:08',1),(5,1,1,'hi dawn how are you','2022-11-04 00:00:00','open','2022-11-05 09:06:36',1,'2022-11-05 09:06:36',NULL),(6,1,15,'dawn','2022-11-02 00:00:00','open','2022-11-09 04:39:32',1,'2022-11-09 04:39:32',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` bigint(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_show` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'blank.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`contact_no`,`company_name`,`email`,`user_type`,`email_verified_at`,`password`,`password_show`,`profile_picture`,`remember_token`,`created_at`,`updated_at`,`deleted_at`,`updated_by`,`created_by`,`note`) values (1,'Dawn','Gill','020230300203','asdasd','dawngill08@gmail.com',1,NULL,'$2y$10$.o8YXhFiVpG9vM8yb0XvHeu4tHbkI4y7IPZD9P9qCOyWbG5hqhIBy','aaa','1/202209301840food-beverage-16.jpg',NULL,NULL,'2022-11-05 06:42:35',NULL,1,NULL,'<p>sdda</p><p>sdas<strong> das dxa sads sadas aasd as dawn</strong></p>'),(3,'Colleen','Maldonado','09451531651','Colon and Hale Inc','dulib@mailinator.com',1,NULL,'$2y$10$.o8YXhFiVpG9vM8yb0XvHeu4tHbkI4y7IPZD9P9qCOyWbG5hqhIBy','aaa','blank.png',NULL,'2022-09-30 21:40:05','2022-10-02 10:48:42',NULL,NULL,1,NULL),(4,'Autumna','Knapp','66','Mcgowan Bean Trading','quba@mailinator.com',2,NULL,'$2y$10$XUsmoIRl.ExGU1kkXfgl3OXeSqHUMUX3faQU1D/MgtOP/WXxl6Cu2','Pa$$w0rd!','blank.png',NULL,'2022-11-05 19:06:16','2022-11-05 00:00:00',NULL,1,1,NULL),(5,'Lars','Alexander',NULL,NULL,'vezujocecu@mailinator.com',2,NULL,'$2y$10$MFUTHJ.AhNF2JXKwrV8Wg.Rm7WWrefgQfFIO69FVQ1wee6sCkfWp6','Pa$$w0rd!','blank.png',NULL,'2022-11-06 03:33:32','2022-11-06 03:33:32',NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
