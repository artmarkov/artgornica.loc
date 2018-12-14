-- MySQL dump 10.13  Distrib 5.7.20, for Win64 (x86_64)
--
-- Host: localhost    Database: yee3_loc
-- ------------------------------------------------------
-- Server version	5.7.20

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
-- Table structure for table `auth`
--

DROP TABLE IF EXISTS `auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `source_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_auth_user` (`user_id`),
  CONSTRAINT `fk_auth_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth`
--

/*!40000 ALTER TABLE `auth` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth` ENABLE KEYS */;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `fk_user_id_auth_assignment_table` (`user_id`),
  CONSTRAINT `fk_item_name_auth_assignment_table` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_user_id_auth_assignment_table` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `group_code` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `auth_item_type` (`type`),
  KEY `fk_auth_item_table_rule_name` (`rule_name`),
  KEY `fk_auth_item_table_group_code` (`group_code`),
  CONSTRAINT `fk_auth_item_table_group_code` FOREIGN KEY (`group_code`) REFERENCES `auth_item_group` (`code`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_auth_item_table_rule_name` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('/admin',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/#mediafile',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/comment/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/comment/default/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/comment/default/bulk-activate',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/comment/default/bulk-deactivate',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/comment/default/bulk-delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/comment/default/bulk-spam',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/comment/default/bulk-trash',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/comment/default/create',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/comment/default/delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/comment/default/grid-page-size',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/comment/default/grid-sort',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/comment/default/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/comment/default/toggle-attribute',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/comment/default/update',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/comment/default/view',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/default/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/eav/*',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-option/*',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-option/bulk-delete',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-option/create',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-option/delete',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-option/grid-page-size',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-option/grid-sort',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-option/index',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-option/toggle-attribute',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-option/update',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-type/*',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-type/bulk-delete',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-type/create',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-type/delete',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-type/grid-page-size',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-type/grid-sort',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-type/index',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-type/toggle-attribute',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute-type/update',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute/*',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute/bulk-delete',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute/create',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute/delete',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute/grid-page-size',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute/grid-sort',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute/index',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute/toggle-attribute',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/attribute/update',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/default/*',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/default/get-attributes',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/default/get-categories',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/default/index',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/default/set-attributes',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/entity-model/*',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/entity-model/bulk-delete',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/entity-model/create',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/entity-model/delete',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/entity-model/grid-page-size',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/entity-model/grid-sort',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/entity-model/index',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/entity-model/toggle-attribute',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/eav/entity-model/update',3,NULL,NULL,NULL,NULL,1440180000,1440180000),('/admin/media/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/album/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/album/bulk-delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/album/create',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/album/delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/album/grid-page-size',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/album/grid-sort',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/album/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/album/toggle-attribute',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/album/update',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/category/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/category/bulk-delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/category/create',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/category/delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/category/grid-page-size',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/category/grid-sort',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/category/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/category/toggle-attribute',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/category/update',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/default/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/default/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/default/settings',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/manage/delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/manage/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/manage/info',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/manage/resize',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/manage/update',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/manage/upload',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/media/manage/uploader',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/default/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/default/bulk-delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/default/create',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/default/delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/default/grid-page-size',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/default/grid-sort',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/default/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/default/update',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/default/view',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/link/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/link/bulk-delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/link/create',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/link/delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/link/grid-page-size',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/link/grid-sort',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/link/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/link/update',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/menu/link/view',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/page/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/page/default/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/page/default/bulk-activate',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/page/default/bulk-deactivate',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/page/default/bulk-delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/page/default/create',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/page/default/delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/page/default/grid-page-size',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/page/default/grid-sort',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/page/default/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/page/default/toggle-attribute',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/page/default/update',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/page/default/view',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/category/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/category/bulk-delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/category/create',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/category/delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/category/grid-page-size',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/category/grid-sort',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/category/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/category/toggle-attribute',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/category/update',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/default/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/default/bulk-activate',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/default/bulk-deactivate',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/default/bulk-delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/default/create',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/default/delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/default/grid-page-size',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/default/grid-sort',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/default/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/default/toggle-attribute',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/default/update',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/default/view',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/tag/bulk-delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/tag/create',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/tag/delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/tag/grid-page-size',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/tag/grid-sort',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/tag/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/tag/toggle-attribute',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/post/tag/update',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/settings/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/settings/cache/flush',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/settings/default/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/settings/default/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/settings/reading/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/site/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/translation/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/translation/default/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/translation/default/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/translation/source/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/translation/source/create',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/translation/source/delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/translation/source/update',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/default/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/default/bulk-activate',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/default/bulk-deactivate',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/default/bulk-delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/default/change-password',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/default/create',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/default/delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/default/grid-page-size',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/default/grid-sort',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/default/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/default/toggle-attribute',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/default/update',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission-groups/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission-groups/bulk-delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission-groups/create',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission-groups/delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission-groups/grid-page-size',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission-groups/grid-sort',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission-groups/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission-groups/update',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission/bulk-delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission/create',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission/delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission/grid-page-size',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission/grid-sort',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission/refresh-routes',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission/set-child-permissions',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission/set-child-routes',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission/update',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/permission/view',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/role/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/role/bulk-delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/role/create',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/role/delete',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/role/grid-page-size',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/role/grid-sort',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/role/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/role/set-child-permissions',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/role/set-child-roles',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/role/update',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/role/view',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/user-permission/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/user-permission/set',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/user-permission/set-roles',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/visit-log/*',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/visit-log/grid-page-size',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/visit-log/grid-sort',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/visit-log/index',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('/admin/user/visit-log/view',3,NULL,NULL,NULL,NULL,1538934054,1538934054),('administrator',1,'Administrator',NULL,NULL,NULL,1538934054,1538934054),('assignRolesToUsers',2,'Assign Roles To Users',NULL,'userManagement',NULL,1538934054,1538934054),('author',1,'Author',NULL,NULL,NULL,1538934054,1538934054),('bindUserToIp',2,'Bind User To IP',NULL,'userManagement',NULL,1538934054,1538934054),('changeGeneralSettings',2,'Change General Settings',NULL,'settings',NULL,1538934054,1538934054),('changeOwnPassword',2,'Change Own Password',NULL,'userCommonPermissions',NULL,1538934054,1538934054),('changeReadingSettings',2,'Change Reading Settings',NULL,'settings',NULL,1538934054,1538934054),('changeUserPassword',2,'Change User Password',NULL,'userManagement',NULL,1538934054,1538934054),('commonPermission',2,'Common Permission',NULL,'userCommonPermissions',NULL,1538934054,1538934054),('createComments',2,'Create Comments',NULL,'commentManagement',NULL,1538934054,1538934054),('createEavRecords',2,'Create EAV records',NULL,'eavManagement',NULL,1440180000,1440180000),('createMediaAlbums',2,'Create Media Albums',NULL,'mediaManagement',NULL,1538934054,1538934054),('createMediaCategories',2,'Create Media Categories',NULL,'mediaManagement',NULL,1538934054,1538934054),('createMenuLinks',2,'Create Menu Links',NULL,'menuManagement',NULL,1538934054,1538934054),('createMenus',2,'Create Menus',NULL,'menuManagement',NULL,1538934054,1538934054),('createPages',2,'Create Pages',NULL,'pageManagement',NULL,1538934054,1538934054),('createPostCategories',2,'Create Post Categories',NULL,'postManagement',NULL,1538934054,1538934054),('createPosts',2,'Create Posts',NULL,'postManagement',NULL,1538934054,1538934054),('createPostTags',2,'Create Post Tags',NULL,'postManagement',NULL,1538934054,1538934054),('createSourceMessages',2,'Create Source Messages',NULL,'translations',NULL,1538934054,1538934054),('createUsers',2,'Create Users',NULL,'userManagement',NULL,1538934054,1538934054),('deleteComments',2,'Delete Comments',NULL,'commentManagement',NULL,1538934054,1538934054),('deleteEavRecords',2,'Delete EAV records',NULL,'eavManagement',NULL,1440180000,1440180000),('deleteMedia',2,'Delete Media',NULL,'mediaManagement',NULL,1538934054,1538934054),('deleteMediaAlbums',2,'Delete Media Albums',NULL,'mediaManagement',NULL,1538934054,1538934054),('deleteMediaCategories',2,'Delete Media Categories',NULL,'mediaManagement',NULL,1538934054,1538934054),('deleteMenuLinks',2,'Delete Menu Links',NULL,'menuManagement',NULL,1538934054,1538934054),('deleteMenus',2,'Delete Menus',NULL,'menuManagement',NULL,1538934054,1538934054),('deletePages',2,'Delete Pages',NULL,'pageManagement',NULL,1538934054,1538934054),('deletePostCategories',2,'Delete Post Categories',NULL,'postManagement',NULL,1538934054,1538934054),('deletePosts',2,'Delete Posts',NULL,'postManagement',NULL,1538934054,1538934054),('deletePostTags',2,'Delete Post Tags',NULL,'postManagement',NULL,1538934054,1538934054),('deleteSourceMessages',2,'Delete Source Messages',NULL,'translations',NULL,1538934054,1538934054),('deleteUsers',2,'Delete Users',NULL,'userManagement',NULL,1538934054,1538934054),('editComments',2,'Edit Comments',NULL,'commentManagement',NULL,1538934054,1538934054),('editEavRecords',2,'Edit EAV records',NULL,'eavManagement',NULL,1440180000,1440180000),('editMedia',2,'Edit Media',NULL,'mediaManagement',NULL,1538934054,1538934054),('editMediaAlbums',2,'Edit Media Albums',NULL,'mediaManagement',NULL,1538934054,1538934054),('editMediaCategories',2,'Edit Media Categories',NULL,'mediaManagement',NULL,1538934054,1538934054),('editMediaSettings',2,'Edit Media Settings',NULL,'mediaManagement',NULL,1538934054,1538934054),('editMenuLinks',2,'Edit Menu Links',NULL,'menuManagement',NULL,1538934054,1538934054),('editMenus',2,'Edit Menus',NULL,'menuManagement',NULL,1538934054,1538934054),('editPages',2,'Edit Pages',NULL,'pageManagement',NULL,1538934054,1538934054),('editPostCategories',2,'Edit Post Categories',NULL,'postManagement',NULL,1538934054,1538934054),('editPosts',2,'Edit Posts',NULL,'postManagement',NULL,1538934054,1538934054),('editPostTags',2,'Edit Post Tags',NULL,'postManagement',NULL,1538934054,1538934054),('editUserEmail',2,'Edit User Email',NULL,'userManagement',NULL,1538934054,1538934054),('editUsers',2,'Edit Users',NULL,'userManagement',NULL,1538934054,1538934054),('flushCache',2,'Flush Cache',NULL,'settings',NULL,1538934054,1538934054),('fullMediaAccess',2,'Full Media Access',NULL,'mediaManagement',NULL,1538934054,1538934054),('fullMediaAlbumAccess',2,'Full Media Albums Access',NULL,'mediaManagement',NULL,1538934054,1538934054),('fullMediaCategoryAccess',2,'Full Media Categories Access',NULL,'mediaManagement',NULL,1538934054,1538934054),('fullMenuAccess',2,'Full Menu Access',NULL,'menuManagement',NULL,1538934054,1538934054),('fullMenuLinkAccess',2,'Full Menu Links Access',NULL,'menuManagement',NULL,1538934054,1538934054),('fullPageAccess',2,'Full Page Access',NULL,'pageManagement',NULL,1538934054,1538934054),('fullPostAccess',2,'Full Post Access',NULL,'postManagement',NULL,1538934054,1538934054),('fullPostCategoryAccess',2,'Full Post Categories Access',NULL,'postManagement',NULL,1538934054,1538934054),('fullPostTagAccess',2,'Full Post Tags Access',NULL,'postManagement',NULL,1538934054,1538934054),('manageRolesAndPermissions',2,'Manage Roles And Permissions',NULL,'userManagement',NULL,1538934054,1538934054),('moderator',1,'Moderator',NULL,NULL,NULL,1538934054,1538934054),('updateImmutableSourceMessages',2,'Update Immutable Source Messages',NULL,'translations',NULL,1538934054,1538934054),('updateSourceMessages',2,'Update Source Messages',NULL,'translations',NULL,1538934054,1538934054),('updateTranslations',2,'Update Message Translations',NULL,'translations',NULL,1538934054,1538934054),('uploadMedia',2,'Upload Media',NULL,'mediaManagement',NULL,1538934054,1538934054),('user',1,'User',NULL,NULL,NULL,1538934054,1538934054),('viewComments',2,'View Comments',NULL,'commentManagement',NULL,1538934054,1538934054),('viewDashboard',2,'View Dashboard',NULL,'dashboard',NULL,1538934054,1538934054),('viewEavRecords',2,'View EAV records',NULL,'eavManagement',NULL,1440180000,1440180000),('viewMedia',2,'View Media',NULL,'mediaManagement',NULL,1538934054,1538934054),('viewMediaAlbums',2,'View Media Albums',NULL,'mediaManagement',NULL,1538934054,1538934054),('viewMediaCategories',2,'View Media Categories',NULL,'mediaManagement',NULL,1538934054,1538934054),('viewMenuLinks',2,'View Menu Links',NULL,'menuManagement',NULL,1538934054,1538934054),('viewMenus',2,'View Menus',NULL,'menuManagement',NULL,1538934054,1538934054),('viewPages',2,'View Pages',NULL,'pageManagement',NULL,1538934054,1538934054),('viewPostCategories',2,'View Posts',NULL,'postManagement',NULL,1538934054,1538934054),('viewPosts',2,'View Posts',NULL,'postManagement',NULL,1538934054,1538934054),('viewPostTags',2,'View Tags',NULL,'postManagement',NULL,1538934054,1538934054),('viewRegistrationIp',2,'View Registration IP',NULL,'userManagement',NULL,1538934054,1538934054),('viewRolesAndPermissions',2,'View Roles And Permissions',NULL,'userManagement',NULL,1538934054,1538934054),('viewTranslations',2,'View Message Translations',NULL,'translations',NULL,1538934054,1538934054),('viewUserEmail',2,'View User Email',NULL,'userManagement',NULL,1538934054,1538934054),('viewUserRoles',2,'View User Roles',NULL,'userManagement',NULL,1538934054,1538934054),('viewUsers',2,'View Users',NULL,'userManagement',NULL,1538934054,1538934054),('viewVisitLog',2,'View Visit Logs',NULL,'userManagement',NULL,1538934054,1538934054);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `fk_child_auth_item_child_table` (`child`),
  CONSTRAINT `fk_child_auth_item_child_table` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_parent_auth_item_child_table` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES ('viewDashboard','/admin'),('viewMedia','/admin/#mediafile'),('editComments','/admin/comment/default/bulk-activate'),('editComments','/admin/comment/default/bulk-deactivate'),('deleteComments','/admin/comment/default/bulk-delete'),('editComments','/admin/comment/default/bulk-spam'),('editComments','/admin/comment/default/bulk-trash'),('createComments','/admin/comment/default/create'),('deleteComments','/admin/comment/default/delete'),('viewComments','/admin/comment/default/grid-page-size'),('viewComments','/admin/comment/default/grid-sort'),('viewComments','/admin/comment/default/index'),('editComments','/admin/comment/default/toggle-attribute'),('editComments','/admin/comment/default/update'),('viewComments','/admin/comment/default/view'),('deleteEavRecords','/admin/eav/attribute-option/bulk-delete'),('createEavRecords','/admin/eav/attribute-option/create'),('deleteEavRecords','/admin/eav/attribute-option/delete'),('viewEavRecords','/admin/eav/attribute-option/grid-page-size'),('viewEavRecords','/admin/eav/attribute-option/grid-sort'),('viewEavRecords','/admin/eav/attribute-option/index'),('editEavRecords','/admin/eav/attribute-option/toggle-attribute'),('editEavRecords','/admin/eav/attribute-option/update'),('deleteEavRecords','/admin/eav/attribute-type/bulk-delete'),('createEavRecords','/admin/eav/attribute-type/create'),('deleteEavRecords','/admin/eav/attribute-type/delete'),('viewEavRecords','/admin/eav/attribute-type/grid-page-size'),('viewEavRecords','/admin/eav/attribute-type/grid-sort'),('viewEavRecords','/admin/eav/attribute-type/index'),('editEavRecords','/admin/eav/attribute-type/toggle-attribute'),('editEavRecords','/admin/eav/attribute-type/update'),('deleteEavRecords','/admin/eav/attribute/bulk-delete'),('createEavRecords','/admin/eav/attribute/create'),('deleteEavRecords','/admin/eav/attribute/delete'),('viewEavRecords','/admin/eav/attribute/grid-page-size'),('viewEavRecords','/admin/eav/attribute/grid-sort'),('viewEavRecords','/admin/eav/attribute/index'),('editEavRecords','/admin/eav/attribute/toggle-attribute'),('editEavRecords','/admin/eav/attribute/update'),('viewEavRecords','/admin/eav/default/get-attributes'),('viewEavRecords','/admin/eav/default/get-categories'),('viewEavRecords','/admin/eav/default/index'),('editEavRecords','/admin/eav/default/set-attributes'),('deleteEavRecords','/admin/eav/entity-model/bulk-delete'),('createEavRecords','/admin/eav/entity-model/create'),('deleteEavRecords','/admin/eav/entity-model/delete'),('viewEavRecords','/admin/eav/entity-model/grid-page-size'),('viewEavRecords','/admin/eav/entity-model/grid-sort'),('viewEavRecords','/admin/eav/entity-model/index'),('editEavRecords','/admin/eav/entity-model/toggle-attribute'),('editEavRecords','/admin/eav/entity-model/update'),('deleteMediaAlbums','/admin/media/album/bulk-delete'),('createMediaAlbums','/admin/media/album/create'),('deleteMediaAlbums','/admin/media/album/delete'),('viewMediaAlbums','/admin/media/album/grid-page-size'),('viewMediaAlbums','/admin/media/album/grid-sort'),('viewMediaAlbums','/admin/media/album/index'),('editMediaAlbums','/admin/media/album/toggle-attribute'),('editMediaAlbums','/admin/media/album/update'),('deleteMediaCategories','/admin/media/category/bulk-delete'),('createMediaCategories','/admin/media/category/create'),('deleteMediaCategories','/admin/media/category/delete'),('viewMediaCategories','/admin/media/category/grid-page-size'),('viewMediaCategories','/admin/media/category/grid-sort'),('viewMediaCategories','/admin/media/category/index'),('editMediaCategories','/admin/media/category/toggle-attribute'),('editMediaCategories','/admin/media/category/update'),('viewMedia','/admin/media/default/index'),('editMediaSettings','/admin/media/default/settings'),('deleteMedia','/admin/media/manage/delete'),('viewMedia','/admin/media/manage/index'),('viewMedia','/admin/media/manage/info'),('editMediaSettings','/admin/media/manage/resize'),('editMedia','/admin/media/manage/update'),('uploadMedia','/admin/media/manage/upload'),('uploadMedia','/admin/media/manage/uploader'),('deleteMenus','/admin/menu/default/bulk-delete'),('createMenus','/admin/menu/default/create'),('deleteMenus','/admin/menu/default/delete'),('viewMenus','/admin/menu/default/grid-page-size'),('viewMenus','/admin/menu/default/grid-sort'),('viewMenus','/admin/menu/default/index'),('editMenus','/admin/menu/default/update'),('viewMenus','/admin/menu/default/view'),('deleteMenuLinks','/admin/menu/link/bulk-delete'),('createMenuLinks','/admin/menu/link/create'),('deleteMenuLinks','/admin/menu/link/delete'),('viewMenuLinks','/admin/menu/link/grid-page-size'),('viewMenuLinks','/admin/menu/link/grid-sort'),('viewMenuLinks','/admin/menu/link/index'),('editMenuLinks','/admin/menu/link/update'),('viewMenuLinks','/admin/menu/link/view'),('editPages','/admin/page/default/bulk-activate'),('editPages','/admin/page/default/bulk-deactivate'),('deletePages','/admin/page/default/bulk-delete'),('createPages','/admin/page/default/create'),('deletePages','/admin/page/default/delete'),('viewPages','/admin/page/default/grid-page-size'),('viewPages','/admin/page/default/grid-sort'),('viewPages','/admin/page/default/index'),('editPages','/admin/page/default/toggle-attribute'),('editPages','/admin/page/default/update'),('viewPages','/admin/page/default/view'),('deletePostCategories','/admin/post/category/bulk-delete'),('createPostCategories','/admin/post/category/create'),('deletePostCategories','/admin/post/category/delete'),('viewPostCategories','/admin/post/category/grid-page-size'),('viewPostCategories','/admin/post/category/grid-sort'),('viewPostCategories','/admin/post/category/index'),('editPostCategories','/admin/post/category/toggle-attribute'),('editPostCategories','/admin/post/category/update'),('editPosts','/admin/post/default/bulk-activate'),('editPosts','/admin/post/default/bulk-deactivate'),('deletePosts','/admin/post/default/bulk-delete'),('createPosts','/admin/post/default/create'),('deletePosts','/admin/post/default/delete'),('viewPosts','/admin/post/default/grid-page-size'),('viewPosts','/admin/post/default/grid-sort'),('viewPosts','/admin/post/default/index'),('editPosts','/admin/post/default/toggle-attribute'),('editPosts','/admin/post/default/update'),('viewPosts','/admin/post/default/view'),('deletePostTags','/admin/post/tag/bulk-delete'),('createPostTags','/admin/post/tag/create'),('deletePostTags','/admin/post/tag/delete'),('viewPostTags','/admin/post/tag/grid-page-size'),('viewPostTags','/admin/post/tag/grid-sort'),('viewPostTags','/admin/post/tag/index'),('editPostTags','/admin/post/tag/toggle-attribute'),('editPostTags','/admin/post/tag/update'),('flushCache','/admin/settings/cache/flush'),('changeGeneralSettings','/admin/settings/default/index'),('changeReadingSettings','/admin/settings/reading/index'),('viewDashboard','/admin/site/index'),('viewTranslations','/admin/translation/default/index'),('createSourceMessages','/admin/translation/source/create'),('deleteSourceMessages','/admin/translation/source/delete'),('updateSourceMessages','/admin/translation/source/update'),('editUsers','/admin/user/default/bulk-activate'),('editUsers','/admin/user/default/bulk-deactivate'),('deleteUsers','/admin/user/default/bulk-delete'),('changeUserPassword','/admin/user/default/change-password'),('createUsers','/admin/user/default/create'),('deleteUsers','/admin/user/default/delete'),('viewUsers','/admin/user/default/grid-page-size'),('viewUsers','/admin/user/default/grid-sort'),('viewUsers','/admin/user/default/index'),('editUsers','/admin/user/default/toggle-attribute'),('editUsers','/admin/user/default/update'),('manageRolesAndPermissions','/admin/user/permission-groups/bulk-delete'),('manageRolesAndPermissions','/admin/user/permission-groups/create'),('manageRolesAndPermissions','/admin/user/permission-groups/delete'),('viewRolesAndPermissions','/admin/user/permission-groups/grid-page-size'),('viewRolesAndPermissions','/admin/user/permission-groups/grid-sort'),('viewRolesAndPermissions','/admin/user/permission-groups/index'),('manageRolesAndPermissions','/admin/user/permission-groups/update'),('manageRolesAndPermissions','/admin/user/permission/bulk-delete'),('manageRolesAndPermissions','/admin/user/permission/create'),('manageRolesAndPermissions','/admin/user/permission/delete'),('viewRolesAndPermissions','/admin/user/permission/grid-page-size'),('viewRolesAndPermissions','/admin/user/permission/grid-sort'),('viewRolesAndPermissions','/admin/user/permission/index'),('manageRolesAndPermissions','/admin/user/permission/refresh-routes'),('manageRolesAndPermissions','/admin/user/permission/set-child-permissions'),('manageRolesAndPermissions','/admin/user/permission/set-child-routes'),('manageRolesAndPermissions','/admin/user/permission/update'),('manageRolesAndPermissions','/admin/user/permission/view'),('manageRolesAndPermissions','/admin/user/role/bulk-delete'),('manageRolesAndPermissions','/admin/user/role/create'),('manageRolesAndPermissions','/admin/user/role/delete'),('viewRolesAndPermissions','/admin/user/role/grid-page-size'),('viewRolesAndPermissions','/admin/user/role/grid-sort'),('viewRolesAndPermissions','/admin/user/role/index'),('manageRolesAndPermissions','/admin/user/role/set-child-permissions'),('manageRolesAndPermissions','/admin/user/role/set-child-roles'),('manageRolesAndPermissions','/admin/user/role/update'),('manageRolesAndPermissions','/admin/user/role/view'),('assignRolesToUsers','/admin/user/user-permission/set'),('assignRolesToUsers','/admin/user/user-permission/set-roles'),('viewVisitLog','/admin/user/visit-log/grid-page-size'),('viewVisitLog','/admin/user/visit-log/grid-sort'),('viewVisitLog','/admin/user/visit-log/index'),('viewVisitLog','/admin/user/visit-log/view'),('administrator','assignRolesToUsers'),('administrator','author'),('moderator','author'),('administrator','bindUserToIp'),('administrator','changeGeneralSettings'),('user','changeOwnPassword'),('administrator','changeReadingSettings'),('administrator','changeUserPassword'),('user','commonPermission'),('moderator','createComments'),('administrator','createEavRecords'),('author','createMediaAlbums'),('moderator','createMediaCategories'),('administrator','createMenuLinks'),('administrator','createMenus'),('administrator','createPages'),('moderator','createPostCategories'),('author','createPosts'),('moderator','createPostTags'),('administrator','createSourceMessages'),('administrator','createUsers'),('moderator','deleteComments'),('administrator','deleteEavRecords'),('administrator','deleteMedia'),('administrator','deleteMediaAlbums'),('administrator','deleteMediaCategories'),('administrator','deleteMenuLinks'),('administrator','deleteMenus'),('administrator','deletePages'),('administrator','deletePostCategories'),('moderator','deletePosts'),('administrator','deletePostTags'),('administrator','deleteSourceMessages'),('administrator','deleteUsers'),('moderator','editComments'),('administrator','editEavRecords'),('uploadMedia','editMedia'),('moderator','editMediaAlbums'),('moderator','editMediaCategories'),('administrator','editMenuLinks'),('administrator','editMenus'),('administrator','editPages'),('moderator','editPostCategories'),('author','editPosts'),('moderator','editPostTags'),('administrator','editUserEmail'),('administrator','editUsers'),('manageRolesAndPermissions','editUsers'),('administrator','flushCache'),('moderator','fullMediaAccess'),('moderator','fullMediaAlbumAccess'),('moderator','fullMediaCategoryAccess'),('administrator','fullMenuAccess'),('administrator','fullMenuLinkAccess'),('administrator','fullPageAccess'),('moderator','fullPostAccess'),('moderator','fullPostCategoryAccess'),('moderator','fullPostTagAccess'),('administrator','manageRolesAndPermissions'),('administrator','moderator'),('administrator','updateSourceMessages'),('createSourceMessages','updateSourceMessages'),('deleteSourceMessages','updateSourceMessages'),('updateImmutableSourceMessages','updateSourceMessages'),('administrator','updateTranslations'),('updateSourceMessages','updateTranslations'),('author','uploadMedia'),('administrator','user'),('author','user'),('moderator','user'),('createComments','viewComments'),('deleteComments','viewComments'),('editComments','viewComments'),('moderator','viewComments'),('author','viewDashboard'),('administrator','viewEavRecords'),('createEavRecords','viewEavRecords'),('deleteEavRecords','viewEavRecords'),('editEavRecords','viewEavRecords'),('deleteMedia','viewMedia'),('editMedia','viewMedia'),('editMediaSettings','viewMedia'),('fullMediaAccess','viewMedia'),('uploadMedia','viewMedia'),('createMediaAlbums','viewMediaAlbums'),('deleteMediaAlbums','viewMediaAlbums'),('editMediaAlbums','viewMediaAlbums'),('createMediaCategories','viewMediaCategories'),('deleteMediaCategories','viewMediaCategories'),('editMediaCategories','viewMediaCategories'),('administrator','viewMenuLinks'),('createMenuLinks','viewMenuLinks'),('deleteMenuLinks','viewMenuLinks'),('editMenuLinks','viewMenuLinks'),('fullMenuLinkAccess','viewMenuLinks'),('administrator','viewMenus'),('createMenus','viewMenus'),('deleteMenus','viewMenus'),('editMenus','viewMenus'),('fullMenuAccess','viewMenus'),('viewMenuLinks','viewMenus'),('administrator','viewPages'),('createPages','viewPages'),('deletePages','viewPages'),('editPages','viewPages'),('author','viewPostCategories'),('author','viewPosts'),('createPostCategories','viewPosts'),('createPosts','viewPosts'),('deletePostCategories','viewPosts'),('deletePosts','viewPosts'),('editPostCategories','viewPosts'),('editPosts','viewPosts'),('viewPostCategories','viewPosts'),('viewPostTags','viewPosts'),('author','viewPostTags'),('createPostTags','viewPostTags'),('deletePostTags','viewPostTags'),('editPostTags','viewPostTags'),('administrator','viewRegistrationIp'),('administrator','viewRolesAndPermissions'),('manageRolesAndPermissions','viewRolesAndPermissions'),('administrator','viewTranslations'),('createSourceMessages','viewTranslations'),('deleteSourceMessages','viewTranslations'),('updateImmutableSourceMessages','viewTranslations'),('updateSourceMessages','viewTranslations'),('updateTranslations','viewTranslations'),('editUserEmail','viewUserEmail'),('moderator','viewUserEmail'),('administrator','viewUserRoles'),('assignRolesToUsers','viewUserRoles'),('viewRolesAndPermissions','viewUserRoles'),('assignRolesToUsers','viewUsers'),('changeUserPassword','viewUsers'),('createUsers','viewUsers'),('deleteUsers','viewUsers'),('editUsers','viewUsers'),('manageRolesAndPermissions','viewUsers'),('moderator','viewUsers'),('viewRolesAndPermissions','viewUsers'),('viewVisitLog','viewUsers'),('administrator','viewVisitLog');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;

--
-- Table structure for table `auth_item_group`
--

DROP TABLE IF EXISTS `auth_item_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_group` (
  `code` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_group`
--

/*!40000 ALTER TABLE `auth_item_group` DISABLE KEYS */;
INSERT INTO `auth_item_group` VALUES ('commentManagement','Comment Management',1538934054,1538934054),('dashboard','Dashboard',1538934054,1538934054),('eavManagement','EAV Management',1440180000,1440180000),('mediaManagement','Media Management',1538934054,1538934054),('menuManagement','Menu Management',1538934054,1538934054),('pageManagement','Page Management',1538934054,1538934054),('postManagement','Post Management',1538934054,1538934054),('settings','Settings',1538934054,1538934054),('translations','Translations',1538934054,1538934054),('userCommonPermissions','Common Permissions',1538934054,1538934054),('userManagement','User Management',1538934054,1538934054);
/*!40000 ALTER TABLE `auth_item_group` ENABLE KEYS */;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(64) NOT NULL DEFAULT '',
  `model_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL COMMENT 'null-is not a reply, int-replied comment id',
  `content` text,
  `status` int(1) unsigned NOT NULL DEFAULT '1' COMMENT '0-pending,1-published,2-spam,3-deleted',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `user_ip` varchar(15) DEFAULT NULL,
  `super_parent_id` int(11) DEFAULT NULL COMMENT 'null-has no parent, int-1st level parent id',
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_model` (`model`),
  KEY `comment_model_id` (`model`,`model_id`),
  KEY `comment_status` (`status`),
  KEY `comment_reply` (`parent_id`),
  KEY `comment_super_parent_id` (`super_parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,'yeesoft\\post\\models\\Post',2,1,NULL,NULL,NULL,'111111',1,1538934373,1538934373,1,'::1',NULL,'/proin-eget-ullamcorper-elit');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(127) DEFAULT NULL,
  `url` text,
  `size` varchar(127) DEFAULT NULL,
  `thumbs` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_media_album` (`album_id`),
  KEY `fk_media_created_by` (`created_by`),
  KEY `fk_media_updated_by` (`updated_by`),
  CONSTRAINT `fk_media_album` FOREIGN KEY (`album_id`) REFERENCES `media_album` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_media_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_media_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

--
-- Table structure for table `media_album`
--

DROP TABLE IF EXISTS `media_album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `visible` int(11) NOT NULL DEFAULT '1' COMMENT '0-hidden,1-visible',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_album_slug` (`slug`),
  KEY `media_album_visible` (`visible`),
  KEY `fk_album_category` (`category_id`),
  KEY `fk_media_album_created_by` (`created_by`),
  KEY `fk_media_album_updated_by` (`updated_by`),
  CONSTRAINT `fk_album_category` FOREIGN KEY (`category_id`) REFERENCES `media_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_media_album_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_media_album_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_album`
--

/*!40000 ALTER TABLE `media_album` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_album` ENABLE KEYS */;

--
-- Table structure for table `media_album_lang`
--

DROP TABLE IF EXISTS `media_album_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_album_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_album_id` int(11) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `media_album_lang_language` (`language`),
  KEY `fk_media_album_lang` (`media_album_id`),
  CONSTRAINT `fk_media_album_lang` FOREIGN KEY (`media_album_id`) REFERENCES `media_album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_album_lang`
--

/*!40000 ALTER TABLE `media_album_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_album_lang` ENABLE KEYS */;

--
-- Table structure for table `media_category`
--

DROP TABLE IF EXISTS `media_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `visible` int(11) NOT NULL DEFAULT '1' COMMENT '0-hidden,1-visible',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_category_slug` (`slug`),
  KEY `media_category_visible` (`visible`),
  KEY `fk_media_category_created_by` (`created_by`),
  KEY `fk_media_category_updated_by` (`updated_by`),
  CONSTRAINT `fk_media_category_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_media_category_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_category`
--

/*!40000 ALTER TABLE `media_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_category` ENABLE KEYS */;

--
-- Table structure for table `media_category_lang`
--

DROP TABLE IF EXISTS `media_category_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_category_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_category_id` int(11) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `media_category_lang_language` (`language`),
  KEY `fk_media_category_lang` (`media_category_id`),
  CONSTRAINT `fk_media_category_lang` FOREIGN KEY (`media_category_id`) REFERENCES `media_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_category_lang`
--

/*!40000 ALTER TABLE `media_category_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_category_lang` ENABLE KEYS */;

--
-- Table structure for table `media_lang`
--

DROP TABLE IF EXISTS `media_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_id` int(11) DEFAULT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `media_lang_language` (`language`),
  KEY `fk_media_lang` (`media_id`),
  CONSTRAINT `fk_media_lang` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_lang`
--

/*!40000 ALTER TABLE `media_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_lang` ENABLE KEYS */;

--
-- Table structure for table `media_upload`
--

DROP TABLE IF EXISTS `media_upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_id` int(11) NOT NULL,
  `owner_class` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `media_upload_owner_class` (`owner_class`),
  KEY `media_upload_owner_id` (`owner_id`),
  KEY `fk_media_upload_media_id` (`media_id`),
  CONSTRAINT `fk_media_upload_media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_upload`
--

/*!40000 ALTER TABLE `media_upload` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_upload` ENABLE KEYS */;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menu_created_by` (`created_by`),
  KEY `fk_menu_updated_by` (`updated_by`),
  CONSTRAINT `fk_menu_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_menu_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES ('admin-menu',NULL,NULL,1,NULL),('main-menu',NULL,NULL,1,NULL),('social-menu',1544693418,1544693418,1,1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

--
-- Table structure for table `menu_lang`
--

DROP TABLE IF EXISTS `menu_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` varchar(64) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` text,
  PRIMARY KEY (`id`),
  KEY `menu_lang_post_id` (`menu_id`),
  KEY `menu_lang_language` (`language`),
  CONSTRAINT `fk_menu_lang` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_lang`
--

/*!40000 ALTER TABLE `menu_lang` DISABLE KEYS */;
INSERT INTO `menu_lang` VALUES (1,'admin-menu','en-US','Control Panel Menu'),(2,'main-menu','en-US','Main Menu'),(3,'main-menu','ru','Главное Меню'),(4,'admin-menu','ru','Меню Панели Управления'),(5,'social-menu','ru','Социальные кнопки');
/*!40000 ALTER TABLE `menu_lang` ENABLE KEYS */;

--
-- Table structure for table `menu_link`
--

DROP TABLE IF EXISTS `menu_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_link` (
  `id` varchar(64) NOT NULL,
  `menu_id` varchar(64) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `parent_id` varchar(64) DEFAULT '',
  `image` varchar(24) DEFAULT NULL,
  `alwaysVisible` int(1) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `link_menu_id` (`menu_id`),
  KEY `link_parent_id` (`parent_id`),
  KEY `fk_menu_link_created_by` (`created_by`),
  KEY `fk_menu_link_updated_by` (`updated_by`),
  CONSTRAINT `fk_menu_link` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_menu_link_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_menu_link_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_link`
--

/*!40000 ALTER TABLE `menu_link` DISABLE KEYS */;
INSERT INTO `menu_link` VALUES ('about','main-menu','/site/about','','',1,1,NULL,1544698568,1,1),('bd','admin-menu','/db','settings','',0,24,1544790630,1544790676,1,1),('blog','main-menu','/site/blog','','',0,3,1544699051,1544699051,1,1),('comment','admin-menu','/comment/default/index','','comment',0,10,NULL,NULL,1,NULL),('contact','main-menu','/site/contact','',NULL,1,5,NULL,NULL,1,NULL),('dashboard','admin-menu','/','','th',0,0,NULL,NULL,1,NULL),('eav-attribute','admin-menu','/eav/attribute/index','eav',NULL,0,18,NULL,NULL,1,NULL),('eav-eav','admin-menu','/eav/default/index','eav',NULL,0,17,NULL,NULL,1,NULL),('eav-model','admin-menu','/eav/entity-model/index','eav',NULL,0,20,NULL,NULL,1,NULL),('eav-option','admin-menu','/eav/attribute-option/index','eav',NULL,0,19,NULL,NULL,1,NULL),('eav-type','admin-menu','/eav/attribute-type/index','eav',NULL,0,21,NULL,NULL,1,NULL),('face','social-menu','','','facebook-square',0,999,1544693578,1544693578,1,1),('home','main-menu','/site/index','',NULL,1,0,NULL,NULL,1,NULL),('image-settings','admin-menu','/media/default/settings','settings',NULL,0,22,NULL,NULL,1,NULL),('media','admin-menu',NULL,'','image',0,6,NULL,NULL,1,NULL),('media-album','admin-menu','/media/album/index','media',NULL,0,8,NULL,NULL,1,NULL),('media-category','admin-menu','/media/category/index','media',NULL,0,9,NULL,NULL,1,NULL),('media-media','admin-menu','/media/default/index','media',NULL,0,7,NULL,NULL,1,NULL),('menu','admin-menu','/menu/default/index','','align-justify',0,11,NULL,NULL,1,NULL),('page','admin-menu','/page/default/index','','file',0,1,NULL,NULL,1,NULL),('post','admin-menu',NULL,'','pencil',0,2,NULL,NULL,1,NULL),('post-category','admin-menu','/post/category/index','post',NULL,0,5,NULL,NULL,1,NULL),('post-post','admin-menu','/post/default/index','post',NULL,0,3,NULL,NULL,1,NULL),('post-tag','admin-menu','/post/tag/index','post','',0,4,NULL,1544638544,1,1),('seo','admin-menu','/seo/default/index','','line-chart',0,18,NULL,NULL,1,NULL),('settings','admin-menu',NULL,'','cog',0,19,NULL,NULL,1,NULL),('settings-cache','admin-menu','/settings/cache/flush','settings',NULL,0,25,NULL,NULL,1,NULL),('settings-general','admin-menu','/settings/default/index','settings',NULL,0,20,NULL,NULL,1,NULL),('settings-reading','admin-menu','/settings/reading/index','settings',NULL,0,21,NULL,NULL,1,NULL),('settings-translations','admin-menu','/translation/default/index','settings',NULL,0,23,NULL,NULL,1,NULL),('test-page','main-menu','/site/test','','',1,2,NULL,1544699083,1,1),('user','admin-menu',NULL,'','user',0,12,NULL,NULL,1,NULL),('user-groups','admin-menu','/user/permission-groups/index','user',NULL,0,16,NULL,NULL,1,NULL),('user-log','admin-menu','/user/visit-log/index','user',NULL,0,17,NULL,NULL,1,NULL),('user-permission','admin-menu','/user/permission/index','user',NULL,0,15,NULL,NULL,1,NULL),('user-role','admin-menu','/user/role/index','user',NULL,0,14,NULL,NULL,1,NULL),('user-user','admin-menu','/user/default/index','user',NULL,0,13,NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `menu_link` ENABLE KEYS */;

--
-- Table structure for table `menu_link_lang`
--

DROP TABLE IF EXISTS `menu_link_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_link_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_id` varchar(64) NOT NULL,
  `language` varchar(6) NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_link_lang_link_id` (`link_id`),
  KEY `menu_link_lang_language` (`language`),
  CONSTRAINT `fk_menu_link_lang` FOREIGN KEY (`link_id`) REFERENCES `menu_link` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_link_lang`
--

/*!40000 ALTER TABLE `menu_link_lang` DISABLE KEYS */;
INSERT INTO `menu_link_lang` VALUES (1,'dashboard','en-US','Dashboard'),(2,'settings','en-US','Settings'),(3,'settings-general','en-US','General Settings'),(4,'settings-reading','en-US','Reading Settings'),(5,'settings-cache','en-US','Flush Cache'),(6,'menu','en-US','Menus'),(7,'comment','en-US','Comments'),(8,'user','en-US','Users'),(9,'user-groups','en-US','Permission groups'),(10,'user-log','en-US','Visit log'),(11,'user-permission','en-US','Permissions'),(12,'user-role','en-US','Roles'),(13,'user-user','en-US','Users'),(14,'post','en-US','Posts'),(15,'post-post','en-US','Posts'),(16,'post-category','en-US','Categories'),(17,'media','en-US','Media'),(18,'media-media','en-US','Media'),(19,'media-album','en-US','Albums'),(20,'media-category','en-US','Categories'),(21,'image-settings','en-US','Image Settings'),(22,'page','en-US','Pages'),(23,'settings-translations','en-US','Message Translation'),(24,'seo','en-US','SEO'),(25,'post-tag','en-US','Tags'),(26,'home','en-US','Home'),(27,'about','en-US','About'),(28,'test-page','en-US','Test Page'),(29,'contact','en-US','Contact'),(31,'eav-eav','en-US','Fields'),(32,'eav-attribute','en-US','Attributes'),(33,'eav-option','en-US','Options'),(34,'eav-model','en-US','Models'),(35,'eav-type','en-US','Types'),(36,'home','ru','Главная'),(37,'about','ru','Обо мне'),(38,'test-page','ru','Консультации'),(39,'contact','ru','Контакты'),(40,'comment','ru','Комментарии'),(41,'dashboard','ru','Главная'),(42,'media','ru','Медиа'),(43,'media-media','ru','Медиа'),(44,'media-album','ru','Альбомы'),(45,'media-category','ru','Категории'),(46,'image-settings','ru','Настройки Изображений'),(47,'menu','ru','Меню'),(48,'page','ru','Страницы'),(49,'post','ru','Записи'),(50,'post-post','ru','Записи'),(51,'post-category','ru','Категории'),(52,'settings','ru','Настройки'),(53,'settings-general','ru','Общие Настройки'),(54,'settings-reading','ru','Настройки Чтения'),(55,'settings-cache','ru','Очистить Кэш'),(56,'settings-translations','ru','Перевод Сообщений'),(57,'user','ru','Пользователи'),(58,'user-groups','ru','Группы Прав Доступа'),(59,'user-log','ru','Лог Посещений'),(60,'user-permission','ru','Права Доступа'),(61,'user-role','ru','Роли Пользователей'),(62,'user-user','ru','Пользователи'),(63,'seo','ru','SEO'),(64,'post-tag','ru','Тэги'),(65,'face','ru','Face'),(68,'blog','ru','Блог'),(70,'bd','ru','База данных');
/*!40000 ALTER TABLE `menu_link_lang` ENABLE KEYS */;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_id` int(11) DEFAULT NULL,
  `language` varchar(16) NOT NULL,
  `translation` text,
  PRIMARY KEY (`id`),
  KEY `message_index` (`source_id`,`language`),
  CONSTRAINT `fk_message_source_message` FOREIGN KEY (`source_id`) REFERENCES `message_source` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=460 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (130,253,'ru','Вы уверены, что желаете удалить изображение Вашего профиля?'),(131,254,'ru','Вы уверены, что хотите отключить эту авторизацию?'),(132,255,'ru','Ошибка авторизации.'),(133,256,'ru','Авторизация'),(134,257,'ru','Сервис авторизации.'),(135,258,'ru','Captcha'),(136,259,'ru','Изменить изображение профиля'),(137,260,'ru','Проверьте ваш e-mail для дальнейших инструкций'),(138,261,'ru','Проверьте ваш e-mail {email} для получения инструкций по активации аккаунта'),(139,262,'ru','Нажмите, чтобы подключиться к службе '),(140,263,'ru','Нажмите, чтобы отменить связь с сервисом '),(141,264,'ru','Подтвердить E-mail '),(142,265,'ru','Подтвердить '),(143,266,'ru','Не удалось отправить подтверждение по электронной почте '),(144,267,'ru','Текущий пароль'),(145,268,'ru','Подтверждение по электронной почте для'),(146,269,'ru','E-mail {email} подтвержден'),(147,270,'ru','Неверный адрес электронной почты '),(148,271,'ru','Письмо со ссылкой активации отправлено на {email}. Срок действия этой ссылки истекает через {минут} мин. '),(149,272,'ru','E-mail'),(150,273,'ru','Забыли пароль?'),(151,274,'ru','Неверное имя пользователя или пароль'),(152,275,'ru','Логин занят'),(153,276,'ru','Логин'),(154,277,'ru','Выход'),(155,278,'ru','Авторизация не доступна'),(156,279,'ru','Пароль обновлен'),(157,280,'ru','Восстановление пароля '),(158,281,'ru','Сброс пароля для'),(159,282,'ru','Пароль'),(160,283,'ru','Регистрация - подтвердите ваш e-mail'),(161,284,'ru','Регистрация'),(162,285,'ru','Запомнить меня'),(163,286,'ru','Удалить изображение профиля '),(164,287,'ru','Повторите пароль'),(165,288,'ru','Сбросить пароль'),(166,289,'ru','Сбросить'),(167,290,'ru','Сохранить профиль '),(168,291,'ru','Сохранить изображение профиля '),(169,292,'ru','Установить пароль '),(170,293,'ru','Задать Имя Пользователя'),(171,294,'ru','Регистрация'),(172,295,'ru','Этот адрес электронной почты уже существует '),(173,296,'ru','Токен не найден. Он может быть просрочен '),(174,297,'ru','Токен не найден. Он может быть просрочен. Попробуйте сбросить пароль еще раз'),(175,298,'ru','Слишком много попыток '),(176,299,'ru','Не удается отправить сообщение по электронной почте'),(177,300,'ru','Изменить пароль'),(178,301,'ru','Профиль'),(179,302,'ru','Пользователь с тем же адресом электронной почты, что и в учетной записи {client}, уже существует, но не связан с ним. Войдите, используя электронную почту, чтобы связать его.'),(180,303,'ru','Логин должен содержать только латинские буквы, цифры и следующие символы: \"-\" и \"_\". '),(181,304,'ru','Username содержит недопустимые символы или слова.'),(182,305,'ru','Неверный пароль '),(183,306,'ru','Вы не можете войти с этого IP'),(201,1,'ru','--- С выбранным ---'),(202,2,'ru','Активировать'),(203,3,'ru','Активные'),(204,4,'ru','Добавить'),(205,5,'ru','Все'),(206,6,'ru','Всегда Видимый'),(207,7,'ru','Произошла неизвестная ошибка.'),(208,8,'ru','Подтверждено'),(209,9,'ru','Автор'),(210,10,'ru','Заблокирован'),(211,11,'ru','Привязка к IP'),(212,12,'ru','Выбрать'),(213,13,'ru','Браузер'),(214,14,'ru','Отменить'),(215,15,'ru','Категория'),(216,16,'ru','Очистить Фильтры'),(217,17,'ru','Закрыто'),(218,18,'ru','Код'),(219,19,'ru','Статус Комментариев'),(220,20,'ru','Активность Комментариев'),(221,21,'ru','Подтвердить'),(222,22,'ru','Код Подтверждения'),(223,23,'ru','Содержание'),(224,24,'ru','Панель Управления'),(225,25,'ru','Создать {item}'),(226,26,'ru','Создать'),(227,27,'ru','Создал'),(228,28,'ru','Создано'),(229,29,'ru','Панель Управления'),(230,30,'ru','Данные'),(231,31,'ru','Деактивировать'),(232,32,'ru','Язык по умолчанию'),(233,33,'ru','Значение по умолчанию'),(234,34,'ru','Удалить'),(235,35,'ru','Описание'),(236,36,'ru','E-mail подтвержден'),(237,37,'ru','E-mail'),(238,38,'ru','Редактировать'),(239,39,'ru','Ошибка'),(240,40,'ru','Например'),(241,41,'ru','Группа'),(242,42,'ru','ID'),(243,43,'ru','IP'),(244,44,'ru','Иконка'),(245,45,'ru','Неактивные'),(246,46,'ru','Вставить'),(247,47,'ru','Неверные настройки для виджетов панели управления'),(248,48,'ru','Ключ'),(249,49,'ru','Надпись'),(250,50,'ru','Язык'),(251,51,'ru','ID ссылки может содержать только строчные буквы, цифры, подчеркивание и тире.'),(252,52,'ru','Ссылка'),(253,53,'ru','Войти'),(254,54,'ru','Выйти {username}'),(255,55,'ru','ID меню может содержать только строчные буквы, цифры, подчеркивание и тире.'),(256,56,'ru','Меню'),(257,57,'ru','Название'),(258,58,'ru','Нет Родительского Элемента'),(259,59,'ru','Комментарии не найдены.'),(260,60,'ru','Не Выбрано'),(261,61,'ru','OK'),(262,62,'ru','ОС'),(263,63,'ru','Открыто'),(264,64,'ru','Порядок'),(265,65,'ru','Версия PHP'),(266,66,'ru','Родительская Ссылка'),(267,67,'ru','Пароль'),(268,68,'ru','Не опубликовано'),(269,69,'ru','Обработка данных'),(270,70,'ru','Опубликовать'),(271,71,'ru','Опубликовано'),(272,72,'ru','Читать дальше'),(273,73,'ru','Записей на странице'),(274,74,'ru','IP Регистрации'),(275,75,'ru','Повторите пароль'),(276,76,'ru','Обязательный'),(277,77,'ru','Ревизия'),(278,78,'ru','Роль'),(279,79,'ru','Роли'),(280,80,'ru','Правило'),(281,81,'ru','Сохранить Все'),(282,82,'ru','Сохранить'),(283,83,'ru','Сохранено'),(284,84,'ru','Настройки'),(285,85,'ru','Размер'),(286,86,'ru','Ссылка'),(287,87,'ru','Спам'),(288,88,'ru','Старт'),(289,89,'ru','Статус'),(290,90,'ru','Суперадмин'),(291,91,'ru','Подробности Системы'),(292,92,'ru','Изменения были успешно сохранены.'),(293,93,'ru','Этот e-mail уже занят'),(294,94,'ru','Заголовок'),(295,95,'ru','Токен'),(296,96,'ru','Мусор'),(297,97,'ru','Тип'),(298,98,'ru','URL'),(299,99,'ru','Отменить Публикацию'),(300,100,'ru','Обновить \"{item}\"'),(301,101,'ru','Обновить'),(302,102,'ru','Обновил'),(303,103,'ru','Обновлено'),(304,104,'ru','Загружено'),(305,105,'ru','Данные Устройства'),(306,106,'ru','Пользователь'),(307,107,'ru','Имя пользователя'),(308,108,'ru','Значение'),(309,109,'ru','Просмотр'),(310,110,'ru','Видимый'),(311,111,'ru','Время Посещения'),(312,112,'ru','Неправильный формат. Введите действительные IP-адреса через запятую'),(313,113,'ru','Версия Yee CMS'),(314,114,'ru','Версия Ядра Yee'),(315,115,'ru','Версия Yii Framework'),(316,116,'ru','Запись успешно обновлена.'),(317,117,'ru','Запись успешно создана.'),(318,118,'ru','Запись успешно удалена.'),(319,119,'ru','Мужчина'),(320,120,'ru','Женщина'),(321,121,'ru','Имя'),(322,122,'ru','Фамилия'),(323,123,'ru','Skype'),(324,124,'ru','Телефон'),(325,125,'ru','Пол'),(326,126,'ru','День рождения'),(327,127,'ru','Месяц рождения'),(328,128,'ru','Год рождения'),(329,129,'ru','Краткая информация'),(330,130,'ru','Добавить Источник Сообщения'),(331,131,'ru','Категория'),(332,132,'ru','Создать Сообщение'),(333,133,'ru','Создать Новую Категори'),(334,134,'ru','Неизменный'),(335,135,'ru','Перевод Сообщений'),(336,136,'ru','Название Новой Категории'),(337,137,'ru','Выберите группу сообщений и язык для отображения переводов...'),(338,138,'ru','Сообщение'),(339,139,'ru','Обновить Сообщение'),(340,140,'ru','{n, plural, =1{1 запись} other{# записей}}'),(341,141,'ru','Добавить файлы'),(342,142,'ru','Альбом'),(343,143,'ru','Альбомы'),(344,144,'ru','Все Медиа Файлы'),(345,145,'ru','Alt Текст'),(346,146,'ru','Вернуться к файловому менеджеру'),(347,147,'ru','Отменить загрузку'),(348,148,'ru','Категории'),(349,149,'ru','Категория'),(350,150,'ru','Изменения были сохранены.'),(351,151,'ru','Изменения не были сохранены.'),(352,152,'ru','Создать Категорию'),(353,153,'ru','Текущие размеры миниатюр'),(354,154,'ru','Размер'),(355,155,'ru','Перестроить изображения'),(356,156,'ru','Размер файла'),(357,157,'ru','Название файла'),(358,158,'ru','Если вы измените размеры миниатюр, настоятельно рекомендуется перестроить их.'),(359,159,'ru','Настройка изображений'),(360,160,'ru','Большой размер'),(361,161,'ru','Управление альбомами'),(362,162,'ru','Управление Категориями'),(363,163,'ru','Активность Медиа'),(364,164,'ru','Детали'),(365,165,'ru','Медиа'),(366,166,'ru','Средний размер'),(367,167,'ru','Изображения не найдены.'),(368,168,'ru','Оригинал'),(369,169,'ru','Пожалуйста, выберите файл для просмотра деталей.'),(370,170,'ru','Выберите размер файла'),(371,171,'ru','Малый размер'),(372,173,'ru','Начать загрузку'),(373,174,'ru','Настройка миниатюр'),(374,175,'ru','Миниатюры успешно сохранены'),(375,176,'ru','Миниатюры'),(376,177,'ru','Обновить Категорию'),(377,178,'ru','Обновил'),(378,179,'ru','Загрузить файл'),(379,180,'ru','Загрузил'),(380,181,'ru','Меню'),(381,182,'ru','Меню'),(382,183,'ru','ID ссылки может содержать только строчные буквы, цифры, подчеркивание и тире.'),(383,184,'ru','Родительская Ссылка'),(384,185,'ru','Всегда Видимый'),(385,186,'ru','Нет Родительской Ссылка'),(386,187,'ru','Создать Ссылку'),(387,188,'ru','Обновить Ссылка'),(388,189,'ru','Ссылки'),(389,190,'ru','Добавить Меню'),(390,191,'ru','Добавить Ссылку'),(391,192,'ru','Ошибка при сохранении меню!'),(392,193,'ru','Изменения были успешно сохранены.'),(393,194,'ru','Пожалуйста, выберите меню для просмотра списка ссылок...'),(394,195,'ru','Выбранное меню не содержит ни одной ссылки. Нажмите кнопку \"Добавить Ссылку\", чтобы создать новую ссылку для этого меню.'),(395,196,'ru','Страница'),(396,197,'ru','Страницы'),(397,198,'ru','Cоздать Страницу'),(398,202,'ru','Запись'),(399,203,'ru','Опубликировано в категории'),(400,204,'ru','Активность Записей'),(401,205,'ru','Записи'),(402,208,'ru','Эскиз'),(403,307,'ru','Создать SEO запись'),(404,308,'ru','Следовать ссылке'),(405,309,'ru','Индексировать'),(406,310,'ru','Ключевые слова'),(407,311,'ru','SEO'),(408,312,'ru','Поисковая оптимизаци'),(409,313,'ru','Обновить SEO запись'),(410,209,'ru','Общие Настройки'),(411,210,'ru','Настройки Чтения'),(412,211,'ru','Название Сайт'),(413,212,'ru','Описание Сайта'),(414,213,'ru','E-mail Администратора'),(415,214,'ru','Часовой Пояс'),(416,215,'ru','Формат Даты'),(417,216,'ru','Формат Времени'),(418,217,'ru','Записей на странице'),(419,218,'ru','Включенные права доступа'),(420,219,'ru','Включенные роли'),(421,220,'ru','Создать Группу Прав Доступа'),(422,221,'ru','Создать Право Доступа'),(423,222,'ru','Создать Роль'),(424,223,'ru','Создать Пользователя'),(425,224,'ru','Посещение №{id}'),(426,225,'ru','Пользователей не найдено.'),(427,226,'ru','Пароль'),(428,227,'ru','Группы Прав Доступа'),(429,228,'ru','Прав Доступа'),(430,229,'ru','Права доступа для роли \"{role}\"'),(431,230,'ru','Права доступа'),(432,231,'ru','Обновить пути'),(433,232,'ru','Дата регистрации'),(434,233,'ru','Роль'),(435,234,'ru','Роли и Права доступа для \"{user}\"'),(436,235,'ru','Роли'),(437,236,'ru','Маршруты'),(438,237,'ru','Поиск маршрутов'),(439,238,'ru','Показать все'),(440,239,'ru','Показать только избранные'),(441,240,'ru','Обновить Группу прав доступа'),(442,241,'ru','Обновить право доступа'),(443,242,'ru','Обновить Роль'),(444,243,'ru','Обновить Пароль пользователя'),(445,244,'ru','Обновить пользователя'),(446,245,'ru','Пользователь не найден'),(447,246,'ru','Пользователь'),(448,247,'ru','Пользователи'),(449,248,'ru','Лог Посещения'),(450,249,'ru','Вы не можете изменить собственные права доступа'),(451,250,'ru','Вы не можете изменить собственные права доступа!'),(452,251,'ru','Настройки прав доступа \"{permission}\"'),(453,252,'ru','Настройки роли \"{permission}\"'),(454,172,'ru',''),(455,199,'ru','Создать тэг'),(456,200,'ru','Изменить тэг'),(457,201,'ru','Постов не найдено'),(458,206,'ru','Тэг'),(459,207,'ru','Тэги');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

--
-- Table structure for table `message_source`
--

DROP TABLE IF EXISTS `message_source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message_source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(32) NOT NULL,
  `message` text,
  `immutable` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=314 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_source`
--

/*!40000 ALTER TABLE `message_source` DISABLE KEYS */;
INSERT INTO `message_source` VALUES (1,'yee','--- With selected ---',1),(2,'yee','Activate',1),(3,'yee','Active',1),(4,'yee','Add New',1),(5,'yee','All',1),(6,'yee','Always Visible',1),(7,'yee','An unknown error occurred.',1),(8,'yee','Approved',1),(9,'yee','Author',1),(10,'yee','Banned',1),(11,'yee','Bind to IP',1),(12,'yee','Browse',1),(13,'yee','Browser',1),(14,'yee','Cancel',1),(15,'yee','Category',1),(16,'yee','Clear filters',1),(17,'yee','Closed',1),(18,'yee','Code',1),(19,'yee','Comment Status',1),(20,'yee','Comments Activity',1),(21,'yee','Confirm',1),(22,'yee','Confirmation Token',1),(23,'yee','Content',1),(24,'yee','Control Panel',1),(25,'yee','Create {item}',1),(26,'yee','Create',1),(27,'yee','Created By',1),(28,'yee','Created',1),(29,'yee','Dashboard',1),(30,'yee','Data',1),(31,'yee','Deactivate',1),(32,'yee','Default Language',1),(33,'yee','Default Value',1),(34,'yee','Delete',1),(35,'yee','Description',1),(36,'yee','E-mail confirmed',1),(37,'yee','E-mail',1),(38,'yee','Edit',1),(39,'yee','Error',1),(40,'yee','For example',1),(41,'yee','Group',1),(42,'yee','ID',1),(43,'yee','IP',1),(44,'yee','Icon',1),(45,'yee','Inactive',1),(46,'yee','Insert',1),(47,'yee','Invalid settings for dashboard widgets',1),(48,'yee','Key',1),(49,'yee','Label',1),(50,'yee','Language',1),(51,'yee','Link ID can only contain lowercase alphanumeric characters, underscores and dashes.',1),(52,'yee','Link',1),(53,'yee','Login',1),(54,'yee','Logout {username}',1),(55,'yee','Menu ID can only contain lowercase alphanumeric characters, underscores and dashes.',1),(56,'yee','Menu',1),(57,'yee','Name',1),(58,'yee','No Parent',1),(59,'yee','No comments found.',1),(60,'yee','Not Selected',1),(61,'yee','OK',1),(62,'yee','OS',1),(63,'yee','Open',1),(64,'yee','Order',1),(65,'yee','PHP Version',1),(66,'yee','Parent Link',1),(67,'yee','Password',1),(68,'yee','Pending',1),(69,'yee','Processing',1),(70,'yee','Publish',1),(71,'yee','Published',1),(72,'yee','Read more',1),(73,'yee','Records per page',1),(74,'yee','Registration IP',1),(75,'yee','Repeat password',1),(76,'yee','Required',1),(77,'yee','Revision',1),(78,'yee','Role',1),(79,'yee','Roles',1),(80,'yee','Rule',1),(81,'yee','Save All',1),(82,'yee','Save',1),(83,'yee','Saved',1),(84,'yee','Settings',1),(85,'yee','Size',1),(86,'yee','Slug',1),(87,'yee','Spam',1),(88,'yee','Start',1),(89,'yee','Status',1),(90,'yee','Superadmin',1),(91,'yee','System Info',1),(92,'yee','The changes have been saved.',1),(93,'yee','This e-mail already exists',1),(94,'yee','Title',1),(95,'yee','Token',1),(96,'yee','Trash',1),(97,'yee','Type',1),(98,'yee','URL',1),(99,'yee','Unpublish',1),(100,'yee','Update \"{item}\"',1),(101,'yee','Update',1),(102,'yee','Updated By',1),(103,'yee','Updated',1),(104,'yee','Uploaded',1),(105,'yee','User agent',1),(106,'yee','User',1),(107,'yee','Username',1),(108,'yee','Value',1),(109,'yee','View',1),(110,'yee','Visible',1),(111,'yee','Visit Time',1),(112,'yee','Wrong format. Enter valid IPs separated by comma',1),(113,'yee','Yee CMS Version',1),(114,'yee','Yee Core Version',1),(115,'yee','Yii Framework Version',1),(116,'yee','Your item has been updated.',1),(117,'yee','Your item has been created.',1),(118,'yee','Your item has been deleted.',1),(119,'yee','Male',1),(120,'yee','Female',1),(121,'yee','First Name',1),(122,'yee','Last Name',1),(123,'yee','Skype',1),(124,'yee','Phone',1),(125,'yee','Gender',1),(126,'yee','Birthday',1),(127,'yee','Birth month',1),(128,'yee','Birth year',1),(129,'yee','Short Info',1),(130,'yee/translation','Add New Source Message',1),(131,'yee/translation','Category',1),(132,'yee/translation','Create Message Source',1),(133,'yee/translation','Create New Category',1),(134,'yee/translation','Immutable',1),(135,'yee/translation','Message Translation',1),(136,'yee/translation','New Category Name',1),(137,'yee/translation','Please, select message group and language to view translations...',1),(138,'yee/translation','Source Message',1),(139,'yee/translation','Update Message Source',1),(140,'yee/translation','{n, plural, =1{1 message} other{# messages}}',1),(141,'yee/media','Add files',1),(142,'yee/media','Album',1),(143,'yee/media','Albums',1),(144,'yee/media','All Media Items',1),(145,'yee/media','Alt Text',1),(146,'yee/media','Back to file manager',1),(147,'yee/media','Cancel upload',1),(148,'yee/media','Categories',1),(149,'yee/media','Category',1),(150,'yee/media','Changes have been saved.',1),(151,'yee/media','Changes haven\'t been saved.',1),(152,'yee/media','Create Category',1),(153,'yee/media','Current thumbnail sizes',1),(154,'yee/media','Dimensions',1),(155,'yee/media','Do resize thumbnails',1),(156,'yee/media','File Size',1),(157,'yee/media','Filename',1),(158,'yee/media','If you change the thumbnails sizes, it is strongly recommended resize image thumbnails.',1),(159,'yee/media','Image Settings',1),(160,'yee/media','Large size',1),(161,'yee/media','Manage Albums',1),(162,'yee/media','Manage Categories',1),(163,'yee/media','Media Activity',1),(164,'yee/media','Media Details',1),(165,'yee/media','Media',1),(166,'yee/media','Medium size',1),(167,'yee/media','No images found.',1),(168,'yee/media','Original',1),(169,'yee/media','Please, select file to view details.',1),(170,'yee/media','Select image size',1),(171,'yee/media','Small size',1),(172,'yee/media','Sorry, [{filetype}] file type is not permitted!',1),(173,'yee/media','Start upload',1),(174,'yee/media','Thumbnails settings',1),(175,'yee/media','Thumbnails sizes has been resized successfully!',1),(176,'yee/media','Thumbnails',1),(177,'yee/media','Update Category',1),(178,'yee/media','Updated By',1),(179,'yee/media','Upload New File',1),(180,'yee/media','Uploaded By',1),(181,'yee/menu','Menu',1),(182,'yee/menu','Menus',1),(183,'yee/menu','Link ID can only contain lowercase alphanumeric characters, underscores and dashes.',1),(184,'yee/menu','Parent Link',1),(185,'yee/menu','Always Visible',1),(186,'yee/menu','No Parent',1),(187,'yee/menu','Create Menu Link',1),(188,'yee/menu','Update Menu Link',1),(189,'yee/menu','Menu Links',1),(190,'yee/menu','Add New Menu',1),(191,'yee/menu','Add New Link',1),(192,'yee/menu','An error occurred during saving menu!',1),(193,'yee/menu','The changes have been saved.',1),(194,'yee/menu','Please, select menu to view menu links...',1),(195,'yee/menu','Selected menu doesn\'t contain any link. Click \"Add New Link\" to create a link for this menu.',1),(196,'yee/page','Page',1),(197,'yee/page','Pages',1),(198,'yee/page','Create Page',1),(199,'yee/post','Create Tag',1),(200,'yee/post','Update Tag',1),(201,'yee/post','No posts found.',1),(202,'yee/post','Post',1),(203,'yee/post','Posted in',1),(204,'yee/post','Posts Activity',1),(205,'yee/post','Posts',1),(206,'yee/post','Tag',1),(207,'yee/post','Tags',1),(208,'yee/post','Thumbnail',1),(209,'yee/settings','General Settings',1),(210,'yee/settings','Reading Settings',1),(211,'yee/settings','Site Title',1),(212,'yee/settings','Site Description',1),(213,'yee/settings','Admin Email',1),(214,'yee/settings','Timezone',1),(215,'yee/settings','Date Format',1),(216,'yee/settings','Time Format',1),(217,'yee/settings','Page Size',1),(218,'yee/user','Child permissions',1),(219,'yee/user','Child roles',1),(220,'yee/user','Create Permission Group',1),(221,'yee/user','Create Permission',1),(222,'yee/user','Create Role',1),(223,'yee/user','Create User',1),(224,'yee/user','Log №{id}',1),(225,'yee/user','No users found.',1),(226,'yee/user','Password',1),(227,'yee/user','Permission Groups',1),(228,'yee/user','Permission',1),(229,'yee/user','Permissions for \"{role}\" role',1),(230,'yee/user','Permissions',1),(231,'yee/user','Refresh routes',1),(232,'yee/user','Registration date',1),(233,'yee/user','Role',1),(234,'yee/user','Roles and Permissions for \"{user}\"',1),(235,'yee/user','Roles',1),(236,'yee/user','Routes',1),(237,'yee/user','Search route',1),(238,'yee/user','Show all',1),(239,'yee/user','Show only selected',1),(240,'yee/user','Update Permission Group',1),(241,'yee/user','Update Permission',1),(242,'yee/user','Update Role',1),(243,'yee/user','Update User Password',1),(244,'yee/user','Update User',1),(245,'yee/user','User not found',1),(246,'yee/user','User',1),(247,'yee/user','Users',1),(248,'yee/user','Visit Log',1),(249,'yee/user','You can not change own permissions',1),(250,'yee/user','You can\'t update own permissions!',1),(251,'yee/user','{permission} Permission Settings',1),(252,'yee/user','{permission} Role Settings',1),(253,'yee/auth','Are you sure you want to delete your profile picture?',1),(254,'yee/auth','Are you sure you want to unlink this authorization?',1),(255,'yee/auth','Authentication error occurred.',1),(256,'yee/auth','Authorization',1),(257,'yee/auth','Authorized Services',1),(258,'yee/auth','Captcha',1),(259,'yee/auth','Change profile picture',1),(260,'yee/auth','Check your E-mail for further instructions',1),(261,'yee/auth','Check your e-mail {email} for instructions to activate account',1),(262,'yee/auth','Click to connect with service',1),(263,'yee/auth','Click to unlink service',1),(264,'yee/auth','Confirm E-mail',1),(265,'yee/auth','Confirm',1),(266,'yee/auth','Could not send confirmation email',1),(267,'yee/auth','Current password',1),(268,'yee/auth','E-mail confirmation for',1),(269,'yee/auth','E-mail confirmed',1),(270,'yee/auth','E-mail is invalid',1),(271,'yee/auth','E-mail with activation link has been sent to <b>{email}</b>. This link will expire in {minutes} min.',1),(272,'yee/auth','E-mail',1),(273,'yee/auth','Forgot password?',1),(274,'yee/auth','Incorrect username or password',1),(275,'yee/auth','Login has been taken',1),(276,'yee/auth','Login',1),(277,'yee/auth','Logout',1),(278,'yee/auth','Non Authorized Services',1),(279,'yee/auth','Password has been updated',1),(280,'yee/auth','Password recovery',1),(281,'yee/auth','Password reset for',1),(282,'yee/auth','Password',1),(283,'yee/auth','Registration - confirm your e-mail',1),(284,'yee/auth','Registration',1),(285,'yee/auth','Remember me',1),(286,'yee/auth','Remove profile picture',1),(287,'yee/auth','Repeat password',1),(288,'yee/auth','Reset Password',1),(289,'yee/auth','Reset',1),(290,'yee/auth','Save Profile',1),(291,'yee/auth','Save profile picture',1),(292,'yee/auth','Set Password',1),(293,'yee/auth','Set Username',1),(294,'yee/auth','Signup',1),(295,'yee/auth','This E-mail already exists',1),(296,'yee/auth','Token not found. It may be expired',1),(297,'yee/auth','Token not found. It may be expired. Try reset password once more',1),(298,'yee/auth','Too many attempts',1),(299,'yee/auth','Unable to send message for email provided',1),(300,'yee/auth','Update Password',1),(301,'yee/auth','User Profile',1),(302,'yee/auth','User with the same email as in {client} account already exists but isn\'t linked to it. Login using email first to link it.',1),(303,'yee/auth','The username should contain only Latin letters, numbers and the following characters: \"-\" and \"_\".',1),(304,'yee/auth','Username contains not allowed characters or words.',1),(305,'yee/auth','Wrong password',1),(306,'yee/auth','You could not login from this IP',1),(307,'yee/seo','Create SEO Record',1),(308,'yee/seo','Follow',1),(309,'yee/seo','Index',1),(310,'yee/seo','Keywords',1),(311,'yee/seo','SEO',1),(312,'yee/seo','Search Engine Optimization',1),(313,'yee/seo','Update SEO Record',1);
/*!40000 ALTER TABLE `message_source` ENABLE KEYS */;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `alias` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base','@app/migrations',1538934042),('m130524_201442_init','@app/migrations',1538934050),('m150319_150657_alter_user_table','@yeesoft/yii2-yee-core/migrations/',1538934051),('m150319_155941_init_yee_core','@yeesoft/yii2-yee-core/migrations/',1538934051),('m150319_184824_init_settings','@yeesoft/yii2-yee-core/migrations/',1538934051),('m150319_194321_init_menus','@yeesoft/yii2-yee-core/migrations/',1538934052),('m150320_102452_init_translations','@yeesoft/yii2-yee-translation/migrations/',1538934052),('m150628_124401_create_media_table','@yeesoft/yii2-yee-media/migrations/',1538934053),('m150630_121101_create_post_table','@yeesoft/yii2-yee-post/migrations/',1538934053),('m150703_182055_create_auth_table','@yeesoft/yii2-yee-auth/migrations/',1538934054),('m150706_175101_create_comment_table','@yeesoft/yii2-comments/migrations/',1538934054),('m150719_154955_add_setting_menu_links','@yeesoft/yii2-yee-settings/migrations/',1538934054),('m150719_182533_add_menu_and_links','@yeesoft/yii2-yee-menu/migrations/',1538934054),('m150727_175300_add_comments_menu_links','@yeesoft/yii2-yee-comment/migrations/',1538934054),('m150729_121634_add_user_menu_links','@yeesoft/yii2-yee-user/migrations/',1538934054),('m150729_122614_add_post_menu_links','@yeesoft/yii2-yee-post/migrations/',1538934054),('m150729_131014_add_media_menu_links','@yeesoft/yii2-yee-media/migrations/',1538934054),('m150731_150101_create_page_table','@yeesoft/yii2-yee-page/migrations/',1538934054),('m150731_150644_add_page_menu_links','@yeesoft/yii2-yee-page/migrations/',1538934054),('m150821_140141_add_core_permissions','@yeesoft/yii2-yee-core/migrations/',1538934054),('m150825_202231_add_post_permissions','@yeesoft/yii2-yee-post/migrations/',1538934054),('m150825_205531_add_user_permissions','@yeesoft/yii2-yee-user/migrations/',1538934054),('m150825_211322_add_menu_permissions','@yeesoft/yii2-yee-menu/migrations/',1538934054),('m150825_212310_add_settings_permissions','@yeesoft/yii2-yee-settings/migrations/',1538934054),('m150825_212941_add_comments_permissions','@yeesoft/yii2-yee-comment/migrations/',1538934054),('m150825_213610_add_media_permissions','@yeesoft/yii2-yee-media/migrations/',1538934054),('m150825_220620_add_page_permissions','@yeesoft/yii2-yee-page/migrations/',1538934054),('m151116_212614_add_translations_menu_links','@yeesoft/yii2-yee-translation/migrations/',1538934054),('m151121_091144_i18n_yee_source','@yeesoft/yii2-yee-core/migrations/',1538934054),('m151121_131210_add_translation_permissions','@yeesoft/yii2-yee-translation/migrations/',1538934054),('m151121_184634_i18n_yee_translation_source','@yeesoft/yii2-yee-translation/migrations/',1538934054),('m151121_225504_i18n_yee_media_source','@yeesoft/yii2-yee-media/migrations/',1538934054),('m151121_232115_i18n_yee_menu_source','@yeesoft/yii2-yee-menu/migrations/',1538934054),('m151121_233615_i18n_yee_page_source','@yeesoft/yii2-yee-page/migrations/',1538934054),('m151121_233715_i18n_yee_post_source','@yeesoft/yii2-yee-post/migrations/',1538934054),('m151121_235015_i18n_yee_settings_source','@yeesoft/yii2-yee-settings/migrations/',1538934054),('m151121_235512_i18n_yee_user_source','@yeesoft/yii2-yee-user/migrations/',1538934054),('m151126_061233_i18n_yee_auth_source','@yeesoft/yii2-yee-auth/migrations/',1538934054),('m151226_230101_create_seo_table','@yeesoft/yii2-yee-seo/migrations/',1538934055),('m151226_231101_add_seo_menu_links','@yeesoft/yii2-yee-seo/migrations/',1538934055),('m151226_233401_add_seo_permissions','@yeesoft/yii2-yee-seo/migrations/',1538934055),('m151226_234401_i18n_yee_seo_source','@yeesoft/yii2-yee-seo/migrations/',1538934055),('m160207_123123_add_super_parent_id','@yeesoft/yii2-comments/migrations/',1538934055),('m160325_140543_init_eav','@vendor/yeesoft/yii2-yee-eav/migrations/',1539282725),('m160325_142311_add_eav_menu_links','@vendor/yeesoft/yii2-yee-eav/migrations/',1539282725),('m160325_143610_add_eav_permissions','@vendor/yeesoft/yii2-yee-eav/migrations/',1539282725),('m160325_144849_i18n_yee_eav_source','@vendor/yeesoft/yii2-yee-eav/migrations/',1539282725),('m160414_212551_add_view_page','@yeesoft/yii2-yee-page/migrations/',1538934055),('m160414_212558_add_view_post','@yeesoft/yii2-yee-post/migrations/',1538934055),('m160419_092310_i18n_ru_yee','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_122314_i18n_ru_init_demo','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_143242_i18n_ru_menu_comments','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_143310_i18n_ru_menu_core','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_143742_i18n_ru_menu_media','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_143915_i18n_ru_menu_menu','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_144310_i18n_ru_menu_page','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_144654_i18n_ru_menu_post','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_144710_i18n_ru_menu_setting','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_145050_i18n_ru_menu_translations','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_145301_i18n_ru_menu_user','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_210059_i18n_ru_yee_translation','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_225904_i18n_ru_yee_media','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_232223_i18n_ru_yee_menu','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_233713_i18n_ru_yee_page','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_233813_i18n_ru_yee_post','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_234401_i18n_ru_yee_seo','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_235120_i18n_ru_yee_settings','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_235601_i18n_ru_menu_seo','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160419_235643_i18n_ru_yee_user','@vendor/yeesoft/yee-i18n/ru/',1544637337),('m160426_122854_create_uploader_images_table','@yeesoft/yii2-yee-media/migrations/',1538934055),('m160530_224510_add_url_field','@yeesoft/yii2-comments/migrations/',1538934055),('m160605_214907_create_tag_table','@yeesoft/yii2-yee-post/migrations/',1538934056),('m160605_215105_init_tag_settings','@yeesoft/yii2-yee-post/migrations/',1538934056),('m160610_120101_init_demo','@app/migrations',1538934056),('m160831_224932_alter_user_table','@yeesoft/yii2-yee-core/migrations/',1538934056),('m160903_113810_update_auth_foreign_key','@yeesoft/yii2-yee-auth/migrations/',1538934056);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0-pending,1-published',
  `comment_status` int(1) NOT NULL DEFAULT '1' COMMENT '0-closed,1-open',
  `published_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `revision` int(1) NOT NULL DEFAULT '1',
  `view` varchar(255) NOT NULL DEFAULT 'page',
  `layout` varchar(255) NOT NULL DEFAULT 'main',
  PRIMARY KEY (`id`),
  KEY `page_slug` (`slug`),
  KEY `page_status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (1,'test',1,0,1440720000,1440763228,1440771930,1,1,1,'page','main');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;

--
-- Table structure for table `page_lang`
--

DROP TABLE IF EXISTS `page_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` text,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `page_lang_post_id` (`page_id`),
  KEY `page_lang_language` (`language`),
  CONSTRAINT `fk_page_lang` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_lang`
--

/*!40000 ALTER TABLE `page_lang` DISABLE KEYS */;
INSERT INTO `page_lang` VALUES (1,1,'en-US','Test Page','<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ullamcorper nibh, id blandit ante. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p><p style=\"text-align: justify;\">Proin eget ullamcorper elit, ac luctus ex. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),(2,1,'ru','Тестовая Страница','<p style=\"text-align: justify;\">Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ullamcorper nibh, id blandit ante. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p><p style=\"text-align: justify;\">Proin eget ullamcorper elit, ac luctus ex. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>');
/*!40000 ALTER TABLE `page_lang` ENABLE KEYS */;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0-pending,1-published',
  `comment_status` int(1) NOT NULL DEFAULT '1' COMMENT '0-closed,1-open',
  `thumbnail` varchar(255) DEFAULT NULL,
  `published_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `revision` int(1) NOT NULL DEFAULT '1',
  `view` varchar(255) NOT NULL DEFAULT 'post',
  `layout` varchar(255) NOT NULL DEFAULT 'main',
  PRIMARY KEY (`id`),
  KEY `post_slug` (`slug`),
  KEY `post_category_id` (`category_id`),
  KEY `post_status` (`status`),
  KEY `fk_page_created_by` (`created_by`),
  KEY `fk_page_updated_by` (`updated_by`),
  CONSTRAINT `fk_page_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_page_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_post_category_id` FOREIGN KEY (`category_id`) REFERENCES `post_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'integer-id-ullamcorper-nibh',2,1,1,NULL,1440720000,1440763228,1440771930,1,1,1,'post','main'),(2,'proin-eget-ullamcorper-elit',2,1,1,NULL,1440720000,1440763228,1440771930,1,1,1,'post','main');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

--
-- Table structure for table `post_category`
--

DROP TABLE IF EXISTS `post_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(200) NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '1' COMMENT '0-hidden,1-visible',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `left_border` int(11) NOT NULL,
  `right_border` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_category_slug` (`slug`),
  KEY `post_category_visible` (`visible`),
  KEY `left_border` (`left_border`,`right_border`),
  KEY `right_border` (`right_border`),
  KEY `fk_post_category_created_by` (`created_by`),
  KEY `fk_post_category_updated_by` (`updated_by`),
  CONSTRAINT `fk_post_category_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_post_category_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_category`
--

/*!40000 ALTER TABLE `post_category` DISABLE KEYS */;
INSERT INTO `post_category` VALUES (1,'root',0,1538934053,NULL,NULL,NULL,1,6,0),(2,'first-category',1,1538934056,1544781516,1,1,2,3,1),(3,'second',1,1544781484,1544781484,1,1,4,5,1);
/*!40000 ALTER TABLE `post_category` ENABLE KEYS */;

--
-- Table structure for table `post_category_lang`
--

DROP TABLE IF EXISTS `post_category_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_category_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_category_id` int(11) DEFAULT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `post_category_lang_id` (`post_category_id`),
  KEY `post_category_lang_language` (`language`),
  CONSTRAINT `fk_post_category_lang` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_category_lang`
--

/*!40000 ALTER TABLE `post_category_lang` DISABLE KEYS */;
INSERT INTO `post_category_lang` VALUES (2,2,'ru','Первая категория',''),(3,3,'ru','Вторая категория','');
/*!40000 ALTER TABLE `post_category_lang` ENABLE KEYS */;

--
-- Table structure for table `post_lang`
--

DROP TABLE IF EXISTS `post_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` text,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `post_lang_post_id` (`post_id`),
  KEY `post_lang_language` (`language`),
  CONSTRAINT `fk_post_lang` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_lang`
--

/*!40000 ALTER TABLE `post_lang` DISABLE KEYS */;
INSERT INTO `post_lang` VALUES (3,1,'ru','Lorem ipsum dolor sit nibh','<p style=\"text-align: justify;\">Consectetur adipiscing elit. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p><p style=\"text-align: justify;\">Integer id ullamcorper nibh, id blandit ante. Lorem ipsum dolor sit amet, Proin eget ullamcorper elit, ac luctus ex. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>'),(4,2,'ru','Suspendisse non ante commodo','<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id ullamcorper nibh, id blandit ante. Aliquam interdum eros eget tempor porta. Quisque viverra velit magna, ac eleifend mi vehicula nec. Curabitur sollicitudin metus eget odio posuere pulvinar. Nullam vestibulum massa ac dolor mattis pharetra. Vestibulum finibus non massa ut cursus.</p><p style=\"text-align: justify;\">Proin eget ullamcorper elit, ac luctus ex. Suspendisse non ante commodo, finibus nibh at, sollicitudin felis. Pellentesque mattis nibh nec nunc fermentum lobortis. Cras malesuada ipsum eget massa pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque, tortor in efficitur semper, tellus lorem blandit augue, sed euismod purus velit nec libero. Pellentesque dictum faucibus augue, ac rutrum velit. Quisque tristique neque sit amet turpis consectetur rutrum. Aliquam ac vulputate mauris.</p>');
/*!40000 ALTER TABLE `post_lang` ENABLE KEYS */;

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(200) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_tag_slug` (`slug`),
  KEY `fk_post_tag_created_by` (`created_by`),
  KEY `fk_post_tag_updated_by` (`updated_by`),
  CONSTRAINT `fk_post_tag_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_post_tag_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
INSERT INTO `post_tag` VALUES (1,'yee-cms',1538934056,1538934056,1,1),(2,'yii2',1538934056,1538934056,1,1);
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;

--
-- Table structure for table `post_tag_lang`
--

DROP TABLE IF EXISTS `post_tag_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_tag_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_tag_id` int(11) DEFAULT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_tag_lang_id` (`post_tag_id`),
  KEY `post_tag_lang_language` (`language`),
  CONSTRAINT `fk_post_tag_lang` FOREIGN KEY (`post_tag_id`) REFERENCES `post_tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag_lang`
--

/*!40000 ALTER TABLE `post_tag_lang` DISABLE KEYS */;
INSERT INTO `post_tag_lang` VALUES (3,2,'ru','yii2'),(4,1,'ru','yee-cms');
/*!40000 ALTER TABLE `post_tag_lang` ENABLE KEYS */;

--
-- Table structure for table `post_tag_post`
--

DROP TABLE IF EXISTS `post_tag_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_tag_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_post_tag_post_id` (`post_id`),
  KEY `fk_post_tag_tag_id` (`tag_id`),
  CONSTRAINT `fk_post_tag_post_id` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_post_tag_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `post_tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag_post`
--

/*!40000 ALTER TABLE `post_tag_post` DISABLE KEYS */;
INSERT INTO `post_tag_post` VALUES (1,1,1),(2,1,2),(3,2,1);
/*!40000 ALTER TABLE `post_tag_post` ENABLE KEYS */;

--
-- Table structure for table `seo`
--

DROP TABLE IF EXISTS `seo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `author` varchar(127) NOT NULL DEFAULT '',
  `keywords` text,
  `description` text,
  `index` smallint(6) NOT NULL DEFAULT '1',
  `follow` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  UNIQUE KEY `seo_url` (`url`),
  KEY `seo_created_by` (`created_by`),
  KEY `seo_author` (`created_by`),
  KEY `fk_seo_updated_by` (`updated_by`),
  CONSTRAINT `fk_seo_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_seo_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seo`
--

/*!40000 ALTER TABLE `seo` DISABLE KEYS */;
INSERT INTO `seo` VALUES (1,'/','30 шагов к успеху','Елена Ишанова','арттерапия, психологическоеконсультирование, поисксебя, веритьвчудеса, радоватьсяжизни, счастьеесть','Студия Елены Ишановой Арт-Горница',1,1,1452544164,1544695070,1,1);
/*!40000 ALTER TABLE `seo` ENABLE KEYS */;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(64) DEFAULT 'general',
  `key` varchar(64) NOT NULL,
  `language` varchar(6) DEFAULT NULL,
  `value` text,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `setting_group_lang` (`group`,`key`,`language`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'general','title','en-US','artgornica.ru',NULL),(2,'general','description','en-US','',NULL),(3,'general','email',NULL,'artmarkov@mail.ru',NULL),(4,'general','timezone',NULL,'Europe/Moscow',NULL),(5,'general','dateformat',NULL,'dd.MM.yyyy',NULL),(6,'general','timeformat',NULL,'HH:mm',NULL),(7,'general','title','ru','Artgornica.ru',NULL),(8,'general','description','ru','',NULL);
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `superadmin` int(6) DEFAULT '0',
  `registration_ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bind_to_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_confirmed` int(1) DEFAULT '0',
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci,
  `first_name` varchar(124) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(124) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_day` int(2) DEFAULT NULL,
  `birth_month` int(2) DEFAULT NULL,
  `birth_year` int(4) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `phone` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','','$2y$13$wcW.QP1/o32QF45xIaYre./1fm9YtkYH7CGSigDqDbYgA9jEyxcRK',NULL,'artmarkov@mail.ru',10,0,0,1,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

--
-- Table structure for table `user_setting`
--

DROP TABLE IF EXISTS `user_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(64) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `user_setting_user_key` (`user_id`,`key`),
  CONSTRAINT `fk_user_id_user_setting_table` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_setting`
--

/*!40000 ALTER TABLE `user_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_setting` ENABLE KEYS */;

--
-- Table structure for table `user_visit_log`
--

DROP TABLE IF EXISTS `user_visit_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_visit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `language` varchar(5) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `browser` varchar(30) NOT NULL,
  `os` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `visit_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `visit_log_user_id` (`user_id`),
  CONSTRAINT `fk_user_id_user_visit_log_table` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_visit_log`
--

/*!40000 ALTER TABLE `user_visit_log` DISABLE KEYS */;
INSERT INTO `user_visit_log` VALUES (1,'5bba45e624bc3','::1','ru','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36','Chrome','mac',1,1538934246),(2,'5bba5cea77ec9','::1','ru','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36','Chrome','mac',1,1538940138),(3,'5bbf9584045e8','::1','ru','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36','Chrome','mac',1,1539282308),(4,'5bc26d6c9872d','::1','ru','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36','Chrome','mac',1,1539468652),(5,'5c0d1cf8d2967','::1','ru','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36','Chrome','mac',1,1544363256),(6,'5c11469fe4e94','::1','ru','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36','Chrome','mac',1,1544636063),(7,'5c1183fe7978a','::1','ru','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36','Chrome','mac',1,1544651774),(8,'5c118527a3e52','::1','ru','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36','Chrome','mac',1,1544652071),(9,'5c12265704e3c','127.0.0.1','ru','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36','Chrome','Windows',1,1544693335),(10,'5c1272c431024','127.0.0.1','ru','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36','Chrome','Windows',1,1544712900),(11,'5c136467666c7','127.0.0.1','ru','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36','Chrome','Windows',1,1544774759),(12,'5c13711e710b5','127.0.0.1','ru','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36','Chrome','Windows',1,1544778014),(13,'5c13a4f5bad7f','127.0.0.1','ru','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36','Chrome','Windows',1,1544791285),(14,'5c13be043eb7b','127.0.0.1','ru','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36','Chrome','Windows',1,1544797700);
/*!40000 ALTER TABLE `user_visit_log` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-14 17:28:30
