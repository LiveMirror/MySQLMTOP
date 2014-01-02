/*
Navicat MySQL Data Transfer

Source Server         : 10.0.2.47
Source Server Version : 50518
Source Host           : 10.0.2.47:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50518
File Encoding         : 65001

Date: 2013-12-27 20:26:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '7', '127.0.0.1', '2013-12-26 09:30:06', '1', '2013-12-25 15:58:34');

-- ----------------------------
-- Records of options
-- ----------------------------
INSERT INTO `options` VALUES ('monitor', '1', '开启全局监控', 'mysql');
INSERT INTO `options` VALUES ('monitor_status', '1', '开启状态监控', 'mysql');
INSERT INTO `options` VALUES ('monitor_replication', '1', '开启复制监控', 'mysql');
INSERT INTO `options` VALUES ('monitor_slow_query', '1', '开启慢查询监控', 'mysql');
INSERT INTO `options` VALUES ('alarm', '1', '开启报警', 'mysql');
INSERT INTO `options` VALUES ('send_alarm_mail', '1', '发生报警邮件', 'mysql');
INSERT INTO `options` VALUES ('frequency_monitor', '30', '监控频率', 'mysql');
INSERT INTO `options` VALUES ('frequency_alarm', '300', '报警通知频率', 'mysql');
INSERT INTO `options` VALUES ('slow_query_time', '5', '慢查询记录时间', 'mysql');
INSERT INTO `options` VALUES ('mail_to_list', 'ruzuojun@139.com;ruzuojun@yihaodian.com', '报警邮件通知人员', 'mysql');
