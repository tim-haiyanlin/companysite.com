# 
# MySQL database dump
# Created by MySQL_Backup class for PHP5, ver. 1.1.0
# 
# Zen Cart v1.5 database
# 
# Host: 68.178.143.156
# Generated: Aug 4, 2015 at 08:30
# MySQL version: 5.5.43-37.2-log
# PHP version: 5.3.24
# 
# Database: `firstwholesale`
# 


# 
# Table structure for table `address_book`
# 

DROP TABLE IF EXISTS `address_book`;
CREATE TABLE `address_book` (
  `address_book_id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `entry_gender` char(1) NOT NULL DEFAULT '',
  `entry_company` varchar(64) DEFAULT NULL,
  `entry_firstname` varchar(32) NOT NULL DEFAULT '',
  `entry_lastname` varchar(32) NOT NULL DEFAULT '',
  `entry_street_address` varchar(64) NOT NULL DEFAULT '',
  `entry_suburb` varchar(32) DEFAULT NULL,
  `entry_postcode` varchar(10) NOT NULL DEFAULT '',
  `entry_city` varchar(32) NOT NULL DEFAULT '',
  `entry_state` varchar(32) DEFAULT NULL,
  `entry_country_id` int(11) NOT NULL DEFAULT '0',
  `entry_zone_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`address_book_id`),
  KEY `idx_address_book_customers_id_zen` (`customers_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

# 
# Dumping data for table `address_book`
# 

INSERT INTO `address_book` (`address_book_id`,`customers_id`,`entry_gender`,`entry_company`,`entry_firstname`,`entry_lastname`,`entry_street_address`,`entry_suburb`,`entry_postcode`,`entry_city`,`entry_state`,`entry_country_id`,`entry_zone_id`) VALUES ('1','1','m','JustaDemo','Bill','Smith','123 Any Avenue','','12345','Here','','223','12'),('2','2','',NULL,'tim','lin','flushing','flushing','11355','flushing','','223','43'),('3','3','m',NULL,'magic','magic','flushing','','11355','flushing','','223','43'),('4','4','',NULL,'tiffany','chou','493 griffin St','','11572','oceanside','','223','43'),('5','5','m',NULL,'tim2','tim2','flushing','','11355','flushing','','223','43');


# 
# Table structure for table `address_format`
# 

DROP TABLE IF EXISTS `address_format`;
CREATE TABLE `address_format` (
  `address_format_id` int(11) NOT NULL AUTO_INCREMENT,
  `address_format` varchar(128) NOT NULL DEFAULT '',
  `address_summary` varchar(48) NOT NULL DEFAULT '',
  PRIMARY KEY (`address_format_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

# 
# Dumping data for table `address_format`
# 

INSERT INTO `address_format` (`address_format_id`,`address_format`,`address_summary`) VALUES ('1','$firstname $lastname$cr$streets$cr$city, $postcode$cr$statecomma$country','$city / $country'),('2','$firstname $lastname$cr$streets$cr$city, $state    $postcode$cr$country','$city, $state / $country'),('3','$firstname $lastname$cr$streets$cr$city$cr$postcode - $statecomma$country','$state / $country'),('4','$firstname $lastname$cr$streets$cr$city ($postcode)$cr$country','$postcode / $country'),('5','$firstname $lastname$cr$streets$cr$postcode $city$cr$country','$city / $country'),('6','$firstname $lastname$cr$streets$cr$city$cr$state$cr$postcode$cr$country','$postcode / $country'),('7','$firstname $lastname$cr$streets$cr$city $state $postcode$cr$country','$city $state / $country');


# 
# Table structure for table `admin`
# 

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(32) NOT NULL DEFAULT '',
  `admin_email` varchar(96) NOT NULL DEFAULT '',
  `admin_profile` int(11) NOT NULL DEFAULT '0',
  `admin_pass` varchar(255) NOT NULL DEFAULT '',
  `prev_pass1` varchar(255) NOT NULL DEFAULT '',
  `prev_pass2` varchar(255) NOT NULL DEFAULT '',
  `prev_pass3` varchar(255) NOT NULL DEFAULT '',
  `pwd_last_change_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reset_token` varchar(255) NOT NULL DEFAULT '',
  `last_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login_ip` varchar(45) NOT NULL DEFAULT '',
  `failed_logins` smallint(4) unsigned NOT NULL DEFAULT '0',
  `lockout_expires` int(11) NOT NULL DEFAULT '0',
  `last_failed_attempt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_failed_ip` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`admin_id`),
  KEY `idx_admin_name_zen` (`admin_name`),
  KEY `idx_admin_email_zen` (`admin_email`),
  KEY `idx_admin_profile_zen` (`admin_profile`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

# 
# Dumping data for table `admin`
# 

INSERT INTO `admin` (`admin_id`,`admin_name`,`admin_email`,`admin_profile`,`admin_pass`,`prev_pass1`,`prev_pass2`,`prev_pass3`,`pwd_last_change_date`,`reset_token`,`last_modified`,`last_login_date`,`last_login_ip`,`failed_logins`,`lockout_expires`,`last_failed_attempt`,`last_failed_ip`) VALUES ('1','firstwholesale','nyfashion1280@gmail.com','1','$2y$10$z1WL5MUPb3M1fE8q/yveeue2fXTT4BesDc6rz9p9UpFIDufqiASVW','$2y$10$DSjyxrcFmdu3WX7r4EhMvOzMWqDTF6Xz8kRtLEWuhjjbe8YwG1MGy','','','2015-07-10 10:01:07','','2015-07-10 09:53:18','2015-08-04 08:27:04','24.228.167.96','0','0','2015-07-24 08:33:57','24.228.167.96');


# 
# Table structure for table `admin_activity_log`
# 

DROP TABLE IF EXISTS `admin_activity_log`;
CREATE TABLE `admin_activity_log` (
  `log_id` bigint(15) NOT NULL AUTO_INCREMENT,
  `access_date` datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  `admin_id` int(11) NOT NULL DEFAULT '0',
  `page_accessed` varchar(80) NOT NULL DEFAULT '',
  `page_parameters` text,
  `ip_address` varchar(45) NOT NULL DEFAULT '',
  `flagged` tinyint(4) NOT NULL DEFAULT '0',
  `attention` varchar(255) NOT NULL DEFAULT '',
  `gzpost` mediumblob,
  `logmessage` mediumtext NOT NULL,
  `severity` varchar(9) NOT NULL DEFAULT 'info',
  PRIMARY KEY (`log_id`),
  KEY `idx_page_accessed_zen` (`page_accessed`),
  KEY `idx_access_date_zen` (`access_date`),
  KEY `idx_flagged_zen` (`flagged`),
  KEY `idx_ip_zen` (`ip_address`),
  KEY `idx_severity_zen` (`severity`)
) ENGINE=MyISAM AUTO_INCREMENT=3605 DEFAULT CHARSET=latin1;

# 
# Dumping data for table `admin_activity_log`
# 

INSERT INTO `admin_activity_log` (`log_id`,`access_date`,`admin_id`,`page_accessed`,`page_parameters`,`ip_address`,`flagged`,`attention`,`gzpost`,`logmessage`,`severity`) VALUES ('1','2015-07-10 10:00:37','0','Log found to be empty. Logging started.','','24.228.167.96','0','','','Log found to be empty. Logging started.','notice'),('2','2015-07-10 10:00:37','0','',NULL,'24.228.167.96','1','','','Updated database schema to allow for tracking [severity] in logs. NOTE: Severity levels before this date did not draw extra attention to add/remove of admin users or payment modules (CRUD operations), so old occurrences will have severity of INFO; new occurrences will have the severity of WARNING.','notice'),('3','2015-07-10 10:00:38','0','login.php ','camefrom=index.php','24.228.167.96','0','','��\0','Accessed page [login.php]','info'),('4','2015-07-10 10:00:40','0','login.php firstwholesale','camefrom=index.php','24.228.167.96','0','','
�~','Accessed page [login.php] with action=do2af679186dd66b60a9b6bc5a878689d7. Review page_parameters and postdata for details.','info'),('581','2015-07-13 19:26:23','1','shopfast.php','','96.250.78.88','0','','��\0','Accessed page [shopfast.php]','info'),('582','2015-07-13 19:31:49','1','layout_controller.php','','96.250.78.88','0','','��\0','Accessed page [layout_controller.php]','info'),('583','2015-07-13 19:32:05','1','layout_controller.php','cID=76&action=edit','96.250.78.88','0','','��\0','Accessed page [layout_controller.php] with action=edit. Review page_parameters and postdata for details.','info'),('584','2015-07-13 19:32:24','1','layout_controller.php','cID=76&action=save&layout_box_name=banner_box_all.php','96.250.78.88','0','','�V�I��/-�Oʯ�/.I,)-V�R2T�A��ON,���Ô)�/*��/JI-�ᔌ/��K�I�1@S�Y�\0','Accessed page [layout_controller.php] with action=save. Review page_parameters and postdata for details.','info'),('585','2015-07-13 19:32:27','1','layout_controller.php','cID=76','96.250.78.88','0','','��\0','Accessed page [layout_controller.php]','info'),('586','2015-07-13 19:36:13','1','ezpages.php','','96.250.78.88','0','','��\0','Accessed page [ezpages.php]','info'),('587','2015-07-13 19:36:38','1','option_name.php','','96.250.78.88','0','','��\0','Accessed page [option_name.php]','info'),('588','2015-07-13 19:38:12','1','options_name_manager.php','','96.250.78.88','0','','��\0','Accessed page [options_name_manager.php]','info'),('589','2015-07-13 19:38:39','1','option_name.php','','96.250.78.88','0','','��\0','Accessed page [option_name.php]','info'),('590','2015-07-13 19:39:41','1','option_values.php','','96.250.78.88','0','','��\0','Accessed page [option_values.php]','info'),('591','2015-07-13 19:41:00','1','option_values.php','action=update_categories_attributes','96.250.78.88','0','','�VJN,IM�/�L-�/-Hr�3S���LM�j','Accessed page [option_values.php] with action=update_categories_attributes. Review page_parameters and postdata for details.','info'),('592','2015-07-13 19:41:03','1','option_values.php','','96.250.78.88','0','','��\0','Accessed page [option_values.php]','info'),('593','2015-07-13 19:43:45','1','option_values.php','action=update_product','96.250.78.88','0','','�V*(�O)M.)�/-HI,I��LQ�R25P�\0','Accessed page [option_values.php] with action=update_product. Review page_parameters and postdata for details.','info'),('594','2015-07-13 19:43:48','1','option_values.php','','96.250.78.88','0','','��\0','Accessed page [option_values.php]','info'),('595','2015-07-13 19:43:53','1','option_values.php','action=update_product','96.250.78.88','0','','�V*(�O)M.)�/-HI,I��LQ�R25P�\0','Accessed page [option_values.php] with action=update_product. Review page_parameters and postdata for details.','info'),('596','2015-07-13 19:43:56','1','option_values.php','','96.250.78.88','0','','��\0','Accessed page [option_values.php]','info'),('597','2015-07-13 19:47:57','1','configuration.php','gID=19','96.250.78.88','0','','��\0','Accessed page [configuration.php]','info'),('598','2015-07-13 19:48:46','1','categories.php','','96.250.78.88','0','','��\0','Accessed page [categories.php]','info'),('599','2015-07-13 19:50:58','1','store_manager.php','','96.250.78.88','0','','��\0','Accessed page [store_manager.php]','info'),('600','2015-07-13 19:51:25','1','attributes_controller.php','','96.250.78.88','0','','��\0','Accessed page [attributes_controller.php]','info'),('601','2015-07-13 19:52:30','1','configuration.php','gID=32','96.250.78.88','0','','��\0','Accessed page [configuration.php]','info'),('602','2015-07-13 19:52:49','1','configuration.php','gID=33','96.250.78.88','0','','��\0','Accessed page [configuration.php]','info'),('603','2015-07-13 19:53:03','1','configuration.php','gID=34','96.250.78.88','0','','��\0','Accessed page [configuration.php]','info'),('604','2015-07-13 19:53:25','1','configuration.php','gID=34&cID=594&action=edit','96.250.78.88','0','','��\0','Accessed page [configuration.php] with action=edit. Review page_parameters and postdata for details.','info'),('605','2015-07-13 19:53:53','1','configuration.php','gID=34&cID=593&action=edit','96.250.78.88','0','','��\0','Accessed page [configuration.php] with action=edit. Review page_parameters and postdata for details.','info'),('606','2015-07-13 19:54:13','1','configuration.php','gID=34&cID=599&action=edit','96.250.78.88','0','','��\0','Accessed page [configuration.php] with action=edit. Review page_parameters and postdata for details.','info'),('607','2015-07-13 19:54:36','1','configuration.php','gID=34&cID=601&action=edit','96.250.78.88','0','','��\0','Accessed page [configuration.php] with action=edit. Review page_parameters and postdata for details.','info'),('608','2015-07-13 19:54:40','1','configuration.php','gID=34&cID=601&action=edit','96.250.78.88','0','','��\0','Accessed page [configuration.php] with action=edit. Review page_parameters and postdata for details.','info'),('609','2015-07-13 19:55:14','1','configuration.php','gID=34&cID=594&action=edit','96.250.78.88','0','','��\0','Accessed page [configuration.php] with action=edit. Review page_parameters and postdata for details.','info'),('610','2015-07-13 19:55:17','1','configuration.php','gID=34&cID=594&action=edit','96.250.78.88','0','','��\0','Accessed page [configuration.php] with action=edit. Review page_parameters and postdata for details.','info'),('611','2015-07-13 19:55:17','1','configuration.php','gID=34&cID=594&action=edit','96.250.78.88','0','','��\0','Accessed page [configuration.php] with action=edit. Review page_parameters and postdata for details.','info'),('612','2015-07-13 19:55:19','1','configuration.php','gID=34&cID=594&action=edit','96.250.78.88','0','','��\0','Accessed page [configuration.php] with action=edit. Review page_parameters and postdata for details.','info'),('613','2015-07-13 19:55:20','1','configuration.php','gID=34&cID=594','96.250.78.88','0','','��\0','Accessed page [configuration.php]','info'),('614','2015-07-13 19:55:33','1','configuration.php','gID=34&cID=594&action=edit','96.250.78.88','0','','��\0','Accessed page [configuration.php] with action=edit. Review page_parameters and postdata for details.','info'),('615','2015-07-13 19:55:39','1','configuration.php','gID=34&cID=594&action=save','96.250.78.88','0','','�VJ��K�L/-J,��ϋ/K�)MU�R\nN.���Q�Q*.M��,q��	q
�k�@��=�����X�t镨1�P�iPe3\n���x�l��[X}��bn�0BӄN��,[n�>Q�����aAZ7�{�5+�U8(��I6N���o��F#��c�@(�зf���`ņ��d|��7/Q@��⊔�RyO����~�Y�{�u�+��-���˚�z�Iei����Cf��=���ōƓ����:��g�tz1�Ͳ�t:�]�e�~M�Qы��?g��A�B:\\b���\'������<i0�����{��n>��|�oʬWn隇=�+�K_�)O�Tx֔�t2��','Accessed page [shopfast.php]','info'),('841','2015-07-15 12:12:03','1','shopfast.php','','24.228.167.96','0','','��\0','Accessed page [shopfast.php]','info'),('842','2015-07-15 12:13:05','1','shopfast.php','','24.228.167.96','0','','�Wo�6�*�;l�X��Ď��Y�v�tY�t(��(�l�H���xþ�)Yq����&-����;��+��4�R�����8|���4�7o&���=��A��V��$� y��$Ӄ�NJf^�*|�$gu��aQ|X��K�JQ�-�:�y�V��;_R*���������c���3�t�w�S*��H@�70�1T\0�h��1L\'�x���	~%���崡��!k���٘��.3�rEs3W?�o�F
INSERT INTO `admin_activity_log` (`log_id`,`access_date`,`admin_id`,`page_accessed`,`page_parameters`,`ip_address`,`flagged`,`attention`,`gzpost`,`logmessage`,`severity`) VALUES ('2748','2015-07-28 11:44:55','1','categories.php','','24.228.167.96','0','','��\0','Accessed page [categories.php]','info'),('2749','2015-07-28 11:44:57','1','categories.php','cPath=1','24.228.167.96','0','','��\0','Accessed page [categories.php]','info'),('2750','2015-07-28 11:45:03','1','categories.php','cPath=1&cID=17&action=edit_category','24.228.167.96','0','','��\0','Accessed page [categories.php] with action=edit_category. Review page_parameters and postdata for details.','info'),('2751','2015-07-28 11:45:07','1','categories.php','action=update_category&cPath=1','24.228.167.96','0','','U��\n�0DE��=	��k���!,4I٬����	A��y�f\'g!��4�x��?L6��������c���o:N�GqrN?���,-�t�6�D�^v�e\'+�FE%��,m?T (*���g���','Accessed page [categories.php] with action=update_category. Review page_parameters and postdata for details.','info'),('2752','2015-07-28 11:45:07','1','categories.php','cPath=1&cID=17','24.228.167.96','0','','��\0','Accessed page [categories.php]','info'),('2753','2015-07-28 11:45:10','1','categories.php','cPath=1&cID=17&action=edit_category','24.228.167.96','0','','��\0','Accessed page [categories.php] with action=edit_category. Review page_parameters and postdata for details.','info'),('2754','2015-07-28 11:46:18','1','categories.php','action=update_category&cPath=1','24.228.167.96','0','','U��\n�0��W��=ؓ������҄XۑDA��}-Sp���d��R&��0����?��	�\\�n��q?��oRXI��l\\�Ow�9yd�ׁs�|��}��D����%�b�\n�|���p4o��#�','Accessed page [categories.php] with action=update_category. Review page_parameters and postdata for details.','info'),('2755','2015-07-28 11:46:18','1','categories.php','action=update_category&cPath=1','24.228.167.96','1','','U��\n�0��W��=ؓ������҄XۑDA��}-Sp���d��R&��0����?��	�\\�n��q?��oRXI��l\\�Ow�9yd�ׁs�|��}��D����%�b�\n�|���p4o��#�','Success: File upload saved successfully 58featured848x255.jpg','notice'),('2756','2015-07-28 11:46:18','1','categories.php','cPath=1&cID=17','24.228.167.96','0','','��\0','Accessed page [categories.php]','info'),('2757','2015-07-28 11:48:44','1','categories.php','','24.228.167.96','0','','��\0','Accessed page [categories.php]','info'),('2758','2015-07-28 11:48:49','1','categories.php','cID=65&action=edit_category','24.228.167.96','0','','��\0','Accessed page [categories.php] with action=edit_category. Review page_parameters and postdata for details.','info'),('2759','2015-07-28 11:51:03','1','categories.php','cPath=1&cID=17&action=edit_category','24.228.167.96','0','','��\0','Accessed page [categories.php] with action=edit_category. Review page_parameters and postdata for details.','info'),('2760','2015-07-28 11:51:27','1','categories.php','action=update_category&cPath=1','24.228.167.96','0','','U�A\n�0E�f��)H�[����q�I�dJ��M���Y��>pV0d&,�<��;8��d#B����ux�oj`zc���y,�i��g˓��g%XD��>��S�e�R�W�G�4Ѧ��p\'G��	4��b2{�/�:����<m���','Accessed page [categories.php] with action=update_category. Review page_parameters and postdata for details.','info'),('2761','2015-07-28 11:51:28','1','categories.php','cPath=1&cID=17','24.228.167.96','0','','��\0','Accessed page [categories.php]','info'),('2762','2015-07-28 11:51:33','1','categories.php','cPath=1&cID=17&action=edit_category','24.228.167.96','0','','��\0','Accessed page [categories.php] with action=edit_category. Review page_parameters and postdata for details.','info'),('2763','2015-07-28 12:03:52','1','categories.php','','24.228.167.96','0','','��\0','Accessed page [categories.php]','info'),('2764','2015-07-28 12:03:54','1','categories.php','cPath=3','24.228.167.96','0','','��\0','Accessed page [categories.php]','info'),('2765','2015-07-28 12:03:56','1','categories.php','','24.228.167.96','0','','��\0','Accessed page [categories.php]','info'),('2766','2015-07-28 12:04:01','1','categories.php','cID=3&action=edit_category','24.228.167.96','0','','��\0','Accessed page [categories.php] with action=edit_category. Review page_parameters and postdata for details.','info'),('2767','2015-07-28 12:05:44','0','login.php ','camefrom=index.php','24.228.167.96','0','','��\0','Accessed page [login.php]','info'),('2768','2015-07-28 12:05:59','0','login.php firstwholesale','camefrom=index.php','24.228.167.96','0','','


# 
# Table structure for table `admin_menus`
# 

DROP TABLE IF EXISTS `admin_menus`;
CREATE TABLE `admin_menus` (
  `menu_key` varchar(255) NOT NULL DEFAULT '',

# 
# 



