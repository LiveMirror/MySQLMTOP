/*
Navicat MySQL Data Transfer

Source Server         : 10.0.2.47
Source Server Version : 50518
Source Host           : 10.0.2.47:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50518
File Encoding         : 65001

Date: 2013-12-27 20:25:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `login_count` int(11) DEFAULT '0',
  `last_login_ip` varchar(100) DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for alarm
-- ----------------------------
DROP TABLE IF EXISTS `alarm`;
CREATE TABLE `alarm` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `application` varchar(100) DEFAULT NULL,
  `server_id` smallint(4) DEFAULT NULL,
  `host` varchar(50) DEFAULT NULL,
  `port` varchar(10) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `db_type` varchar(30) DEFAULT NULL,
  `alarm_type` varchar(50) DEFAULT NULL,
  `alarm_value` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `send_mail` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1866 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for alarm_history
-- ----------------------------
DROP TABLE IF EXISTS `alarm_history`;
CREATE TABLE `alarm_history` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `application` varchar(100) DEFAULT NULL,
  `server_id` smallint(4) DEFAULT NULL,
  `host` varchar(50) DEFAULT NULL,
  `port` varchar(10) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `db_type` varchar(30) DEFAULT NULL,
  `alarm_type` varchar(50) DEFAULT NULL,
  `alarm_value` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `send_mail` tinyint(2) DEFAULT NULL,
  `send_mail_status` tinyint(2) DEFAULT NULL,
  `send_mail_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3313 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for application
-- ----------------------------
DROP TABLE IF EXISTS `application`;
CREATE TABLE `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `is_delete` tinyint(2) DEFAULT '0',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for linux_resource
-- ----------------------------
DROP TABLE IF EXISTS `linux_resource`;
CREATE TABLE `linux_resource` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) DEFAULT NULL,
  `hostname` varchar(50) DEFAULT NULL,
  `kernel` varchar(20) DEFAULT NULL,
  `digit` varchar(20) DEFAULT NULL,
  `load1` varchar(10) DEFAULT NULL,
  `load5` varchar(10) DEFAULT NULL,
  `load15` varchar(10) DEFAULT NULL,
  `disk_use_root` varchar(50) DEFAULT NULL,
  `disk_use_home` varchar(50) DEFAULT NULL,
  `disk_use_data` varchar(50) DEFAULT NULL,
  `mem_total` varchar(20) DEFAULT NULL,
  `mem_use` varchar(20) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=609 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mysql_performance
-- ----------------------------
DROP TABLE IF EXISTS `mysql_performance`;
CREATE TABLE `mysql_performance` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `server_id` smallint(4) DEFAULT NULL,
  `application` varchar(100) DEFAULT NULL,
  `host` varchar(100) DEFAULT NULL,
  `port` varchar(20) DEFAULT NULL,
  `Query_cache_hits` varchar(100) DEFAULT NULL,
  `Key_buffer_read_hits` varchar(100) DEFAULT NULL,
  `Key_buffer_write_hits` varchar(100) DEFAULT NULL,
  `Thread_cache_hits` varchar(100) DEFAULT NULL,
  `Key_blocks_used_rate` varchar(100) DEFAULT NULL,
  `Created_tmp_disk_tables_rate` varchar(100) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=368 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mysql_replication
-- ----------------------------
DROP TABLE IF EXISTS `mysql_replication`;
CREATE TABLE `mysql_replication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` smallint(4) DEFAULT NULL,
  `application` varchar(30) DEFAULT NULL,
  `host` varchar(30) DEFAULT NULL,
  `port` varchar(20) DEFAULT NULL,
  `master` tinyint(2) DEFAULT '0',
  `slave` tinyint(2) DEFAULT '0',
  `read_only` varchar(10) DEFAULT NULL,
  `master_server` varchar(30) DEFAULT NULL,
  `master_port` varchar(20) DEFAULT NULL,
  `slave_io_run` varchar(20) DEFAULT NULL,
  `slave_sql_run` varchar(20) DEFAULT NULL,
  `delay` varchar(20) DEFAULT NULL,
  `current_binlog_file` varchar(30) DEFAULT NULL,
  `current_binlog_pos` varchar(30) DEFAULT NULL,
  `master_binlog_file` varchar(30) DEFAULT NULL,
  `master_binlog_pos` varchar(30) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4363706 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mysql_replication_history
-- ----------------------------
DROP TABLE IF EXISTS `mysql_replication_history`;
CREATE TABLE `mysql_replication_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` tinyint(4) DEFAULT NULL,
  `application` varchar(30) DEFAULT NULL,
  `host` varchar(30) DEFAULT NULL,
  `port` varchar(20) DEFAULT NULL,
  `master` tinyint(2) DEFAULT '0',
  `slave` tinyint(2) DEFAULT '0',
  `read_only` varchar(10) DEFAULT NULL,
  `master_server` varchar(30) DEFAULT NULL,
  `master_port` varchar(20) DEFAULT NULL,
  `slave_io_run` varchar(20) DEFAULT NULL,
  `slave_sql_run` varchar(20) DEFAULT NULL,
  `delay` varchar(20) DEFAULT NULL,
  `current_binlog_file` varchar(30) DEFAULT NULL,
  `current_binlog_pos` varchar(30) DEFAULT NULL,
  `master_binlog_file` varchar(30) DEFAULT NULL,
  `master_binlog_pos` varchar(30) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `YmdHi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4280391 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mysql_slow_query
-- ----------------------------
DROP TABLE IF EXISTS `mysql_slow_query`;
CREATE TABLE `mysql_slow_query` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` smallint(4) DEFAULT NULL,
  `application` varchar(30) DEFAULT NULL,
  `host` varchar(30) DEFAULT NULL,
  `port` varchar(10) DEFAULT NULL,
  `query_id` int(10) DEFAULT NULL,
  `query_user` varchar(50) DEFAULT NULL,
  `query_host` varchar(50) DEFAULT NULL,
  `query_db` varchar(30) DEFAULT NULL,
  `query_command` varchar(30) DEFAULT NULL,
  `query_time` smallint(4) NOT NULL DEFAULT '0',
  `query_status` varchar(50) DEFAULT NULL,
  `query_sql` text,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_create_time` (`create_time`) USING BTREE,
  KEY `idx_query_time` (`query_time`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5962443 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mysql_status
-- ----------------------------
DROP TABLE IF EXISTS `mysql_status`;
CREATE TABLE `mysql_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` tinyint(4) DEFAULT NULL,
  `application` varchar(30) DEFAULT NULL,
  `host` varchar(30) DEFAULT NULL,
  `port` varchar(20) DEFAULT NULL,
  `connect` varchar(20) DEFAULT NULL,
  `uptime` int(11) NOT NULL DEFAULT '0',
  `version` varchar(20) DEFAULT NULL,
  `connections` varchar(20) DEFAULT NULL,
  `active` varchar(20) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_connections` (`connections`) USING BTREE,
  KEY `idx_active` (`active`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2235080 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mysql_status_ext
-- ----------------------------
DROP TABLE IF EXISTS `mysql_status_ext`;
CREATE TABLE `mysql_status_ext` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` smallint(4) DEFAULT NULL,
  `QPS` int(10) DEFAULT NULL,
  `TPS` int(10) DEFAULT NULL,
  `Bytes_received` int(10) DEFAULT NULL,
  `Bytes_sent` int(10) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2108172 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mysql_status_ext_history
-- ----------------------------
DROP TABLE IF EXISTS `mysql_status_ext_history`;
CREATE TABLE `mysql_status_ext_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` smallint(4) DEFAULT NULL,
  `QPS` int(10) DEFAULT NULL,
  `TPS` int(10) DEFAULT NULL,
  `Bytes_received` int(10) DEFAULT NULL,
  `Bytes_sent` int(10) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `YmdHi` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `index_ymdhi` (`YmdHi`) USING BTREE,
  KEY `index_qps_ymdhi` (`QPS`,`YmdHi`) USING BTREE,
  KEY `index_tps_ymdhi` (`TPS`,`YmdHi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3819945 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mysql_status_history
-- ----------------------------
DROP TABLE IF EXISTS `mysql_status_history`;
CREATE TABLE `mysql_status_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` smallint(4) DEFAULT NULL,
  `application` varchar(30) DEFAULT NULL,
  `host` varchar(30) DEFAULT NULL,
  `port` varchar(20) DEFAULT NULL,
  `connect` varchar(20) DEFAULT NULL,
  `uptime` int(11) NOT NULL DEFAULT '0',
  `version` varchar(20) DEFAULT NULL,
  `connections` varchar(20) DEFAULT NULL,
  `active` varchar(20) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `YmdHi` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `index_ymdhi_active` (`active`,`YmdHi`) USING BTREE,
  KEY `index_ymdhi_connections` (`connections`,`YmdHi`) USING BTREE,
  KEY `index_ymdhi` (`YmdHi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4405585 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for mysql_widget_bigtable
-- ----------------------------
DROP TABLE IF EXISTS `mysql_widget_bigtable`;
CREATE TABLE `mysql_widget_bigtable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` smallint(4) DEFAULT NULL,
  `db_name` varchar(50) DEFAULT NULL,
  `table_name` varchar(100) DEFAULT NULL,
  `table_size` decimal(6,2) DEFAULT NULL,
  `table_comment` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for options
-- ----------------------------
DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `name` varchar(50) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `group` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for servers
-- ----------------------------
DROP TABLE IF EXISTS `servers`;
CREATE TABLE `servers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `host` varchar(30) DEFAULT NULL,
  `port` varchar(10) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1' COMMENT '1:监控 0：不监控',
  `application` varchar(50) DEFAULT NULL,
  `send_mail` tinyint(2) DEFAULT '1',
  `alarm_connections` tinyint(2) DEFAULT '1',
  `alarm_active` tinyint(2) DEFAULT '1',
  `alarm_repl_status` tinyint(2) DEFAULT NULL,
  `alarm_repl_delay` tinyint(2) DEFAULT '1',
  `threshold_connections` varchar(20) DEFAULT NULL,
  `threshold_active` varchar(20) DEFAULT NULL,
  `threshold_repl_delay` varchar(20) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `display_order` smallint(4) DEFAULT '0',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
