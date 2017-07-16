/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100122
Source Host           : localhost:3306
Source Database       : ace

Target Server Type    : MYSQL
Target Server Version : 100122
File Encoding         : 65001

Date: 2017-07-17 00:50:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for handle_log
-- ----------------------------
DROP TABLE IF EXISTS `handle_log`;
CREATE TABLE `handle_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `handle_log_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of handle_log
-- ----------------------------
INSERT INTO `handle_log` VALUES ('1', '1', 'asdas', '192.168.33.110', '2017-07-16 19:00:12', null);
INSERT INTO `handle_log` VALUES ('2', '2', 'das', '127.0.0.1', '2017-07-16 11:03:11', '2017-07-16 11:03:11');
INSERT INTO `handle_log` VALUES ('3', '2', 'das', '127.0.0.1', '2017-07-16 11:03:28', '2017-07-16 11:03:28');
INSERT INTO `handle_log` VALUES ('4', '2', 'das', '127.0.0.1', '2017-07-16 11:03:42', '2017-07-16 11:03:42');
INSERT INTO `handle_log` VALUES ('5', '2', 'das', '127.0.0.1', '2017-07-16 11:03:43', '2017-07-16 11:03:43');
INSERT INTO `handle_log` VALUES ('6', '2', 'das', '127.0.0.1', '2017-07-16 11:03:45', '2017-07-16 11:03:45');
INSERT INTO `handle_log` VALUES ('7', '2', 'das', '127.0.0.1', '2017-07-16 11:03:46', '2017-07-16 11:03:46');
INSERT INTO `handle_log` VALUES ('8', '2', 'das', '127.0.0.1', '2017-07-16 11:03:47', '2017-07-16 11:03:47');
INSERT INTO `handle_log` VALUES ('9', '2', 'das', '127.0.0.1', '2017-07-16 11:03:48', '2017-07-16 11:03:48');
INSERT INTO `handle_log` VALUES ('10', '2', 'das', '127.0.0.1', '2017-07-16 11:03:48', '2017-07-16 11:03:48');
INSERT INTO `handle_log` VALUES ('11', '2', 'das', '127.0.0.1', '2017-07-16 11:03:49', '2017-07-16 11:03:49');
INSERT INTO `handle_log` VALUES ('12', '2', 'das', '127.0.0.1', '2017-07-16 11:03:49', '2017-07-16 11:03:49');
INSERT INTO `handle_log` VALUES ('13', '2', 'das', '127.0.0.1', '2017-07-16 11:03:50', '2017-07-16 11:03:50');
INSERT INTO `handle_log` VALUES ('14', '2', 'das', '127.0.0.1', '2017-07-16 11:03:50', '2017-07-16 11:03:50');
INSERT INTO `handle_log` VALUES ('15', '2', 'das', '127.0.0.1', '2017-07-16 11:03:51', '2017-07-16 11:03:51');
INSERT INTO `handle_log` VALUES ('16', '2', 'das', '127.0.0.1', '2017-07-16 11:03:52', '2017-07-16 11:03:52');
INSERT INTO `handle_log` VALUES ('17', '2', 'das', '127.0.0.1', '2017-07-16 11:04:12', '2017-07-16 11:04:12');
INSERT INTO `handle_log` VALUES ('18', '1', '用户登录', '127.0.0.1', '2017-07-16 16:13:35', '2017-07-16 16:13:35');
INSERT INTO `handle_log` VALUES ('19', '1', '用户登录', '127.0.0.1', '2017-07-16 16:20:02', '2017-07-16 16:20:02');
INSERT INTO `handle_log` VALUES ('20', '1', '用户登录', '127.0.0.1', '2017-07-16 16:20:04', '2017-07-16 16:20:04');
INSERT INTO `handle_log` VALUES ('21', '1', '用户登录', '127.0.0.1', '2017-07-16 16:31:09', '2017-07-16 16:31:09');
INSERT INTO `handle_log` VALUES ('22', '1', '用户登录', '127.0.0.1', '2017-07-16 16:31:10', '2017-07-16 16:31:10');
INSERT INTO `handle_log` VALUES ('23', '1', '用户登录', '127.0.0.1', '2017-07-16 16:38:32', '2017-07-16 16:38:32');
INSERT INTO `handle_log` VALUES ('24', '1', '用户登录', '127.0.0.1', '2017-07-16 16:38:34', '2017-07-16 16:38:34');
INSERT INTO `handle_log` VALUES ('25', '1', '用户登录', '127.0.0.1', '2017-07-16 16:39:02', '2017-07-16 16:39:02');
INSERT INTO `handle_log` VALUES ('26', '1', '用户登录', '127.0.0.1', '2017-07-16 16:39:03', '2017-07-16 16:39:03');
INSERT INTO `handle_log` VALUES ('27', '1', '用户登录', '127.0.0.1', '2017-07-16 16:46:22', '2017-07-16 16:46:22');
INSERT INTO `handle_log` VALUES ('28', '1', '用户退出系统', '127.0.0.1', '2017-07-16 16:46:44', '2017-07-16 16:46:44');
INSERT INTO `handle_log` VALUES ('29', '1', '用户登录', '127.0.0.1', '2017-07-16 16:46:45', '2017-07-16 16:46:45');

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '选中的url',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission_id` smallint(6) NOT NULL,
  `is_system` tinyint(4) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('1', '用户-权限管理', '#', 'admin*', '', '0', '1', '0', '2017-05-22 16:38:56', '2017-05-23 08:25:57');
INSERT INTO `menus` VALUES ('2', '菜单管理', 'admin/menu/index', 'admin/menu*', null, '6', '1', '1', '2017-05-23 06:35:43', '2017-05-23 06:35:43');
INSERT INTO `menus` VALUES ('3', '角色管理', 'admin/role/index', 'admin/role*', null, '4', '1', '1', '2017-05-23 08:13:57', '2017-05-23 08:13:57');
INSERT INTO `menus` VALUES ('4', '权限管理', 'admin/permission/index', 'admin/permission*', '', '3', '1', '1', '2017-05-23 08:15:05', '2017-05-23 08:56:37');
INSERT INTO `menus` VALUES ('5', '会员管理', 'admin/user/index', 'admin/user*', null, '5', '1', '1', '2017-05-23 08:17:08', '2017-05-23 08:17:08');
INSERT INTO `menus` VALUES ('7', '系统设置', '#', 'system/*', null, '0', '1', '0', '2017-05-24 14:39:29', '2017-05-24 14:39:29');
INSERT INTO `menus` VALUES ('8', '网站设置', 'system/setting/index', 'system/setting/index', null, '0', '1', '7', '2017-05-24 14:40:14', '2017-05-24 14:40:14');
INSERT INTO `menus` VALUES ('9', '组件库', 'system/component/index', 'system/component', null, '0', '0', '7', '2017-05-26 16:11:56', '2017-05-26 16:11:56');
INSERT INTO `menus` VALUES ('10', '插件管理', 'system/plugins/index', 'system/plugins/index', null, '0', '1', '7', '2017-05-28 15:58:19', '2017-05-28 15:58:19');
INSERT INTO `menus` VALUES ('20', '查看系统日志', 'log-viewer/logs', 'log-viewer/logs', null, '0', '0', '24', '2017-07-11 14:43:01', '2017-07-15 14:06:35');
INSERT INTO `menus` VALUES ('21', '问卷管理', '#', 'questionnaire*', null, '8', '0', '0', '2017-07-11 14:59:24', '2017-07-11 15:01:41');
INSERT INTO `menus` VALUES ('22', '问卷管理', 'questionnaire', 'questionnaire', null, '0', '0', '21', '2017-07-11 14:59:50', '2017-07-11 15:01:33');
INSERT INTO `menus` VALUES ('23', '编辑env文件', 'system/env/index', 'system/env/index', null, '7', '0', '7', '2017-07-12 13:15:43', '2017-07-12 13:15:43');
INSERT INTO `menus` VALUES ('24', '查看日志', '#', 'log-viewer/*', null, '0', '0', '0', '2017-07-15 14:05:48', '2017-07-16 10:53:56');
INSERT INTO `menus` VALUES ('26', '查看操作日志', 'log-viewer/behavior', 'log-viewer/behavior', null, '7', '0', '24', '2017-07-16 11:12:45', '2017-07-16 11:12:45');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2017_05_22_032536_laratrust_setup_tables', '2');
INSERT INTO `migrations` VALUES ('4', '2016_08_03_092224_create_menus_table', '3');
INSERT INTO `migrations` VALUES ('6', '2017_05_24_145950_creat_table_setting', '4');
INSERT INTO `migrations` VALUES ('7', '2017_06_26_140816_create_table_for_questionnaire', '5');
INSERT INTO `migrations` VALUES ('8', '2017_06_27_153621_update_question', '6');
INSERT INTO `migrations` VALUES ('9', '2017_07_16_103411_create_handle_log', '7');

-- ----------------------------
-- Table structure for options
-- ----------------------------
DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(255) NOT NULL,
  `option_value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of options
-- ----------------------------
INSERT INTO `options` VALUES ('3', 'plugins_enabled', '[\"edit-env\",\"log-behavior\"]');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('3', 'admin/permission/index', '权限管理', '权限管理', '2017-05-22 16:06:26', '2017-05-22 16:06:26');
INSERT INTO `permissions` VALUES ('4', 'admin/role/index', '角色管理', '角色管理', '2017-05-22 16:06:52', '2017-05-22 16:06:52');
INSERT INTO `permissions` VALUES ('5', 'admin/user/index', '用户管理', '用户管理', '2017-05-22 16:07:10', '2017-05-22 16:07:10');
INSERT INTO `permissions` VALUES ('6', 'admin/menu/index', '菜单管理', '菜单管理', '2017-05-22 16:07:34', '2017-05-22 16:07:34');
INSERT INTO `permissions` VALUES ('7', 'view-backend', '浏览后台', '浏览后台', '2017-05-24 06:27:26', '2017-05-24 06:28:12');
INSERT INTO `permissions` VALUES ('8', 'questionnaire', '问卷模块', '问卷模块', '2017-07-11 14:58:21', '2017-07-11 15:01:03');

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('3', '1');
INSERT INTO `permission_role` VALUES ('3', '16');
INSERT INTO `permission_role` VALUES ('4', '1');
INSERT INTO `permission_role` VALUES ('5', '1');
INSERT INTO `permission_role` VALUES ('6', '1');
INSERT INTO `permission_role` VALUES ('7', '1');

-- ----------------------------
-- Table structure for permission_user
-- ----------------------------
DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE `permission_user` (
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`,`user_id`,`user_type`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_user
-- ----------------------------

-- ----------------------------
-- Table structure for questionnaire
-- ----------------------------
DROP TABLE IF EXISTS `questionnaire`;
CREATE TABLE `questionnaire` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '多语言标志字段',
  PRIMARY KEY (`id`),
  KEY `questionnaire_author_id_index` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of questionnaire
-- ----------------------------
INSERT INTO `questionnaire` VALUES ('6', 'asd', 'asasddas', '1', '2017-07-11 15:23:39', '2017-07-11 15:23:43', '[\"zh\",\"en\"]');

-- ----------------------------
-- Table structure for questionnaire_question
-- ----------------------------
DROP TABLE IF EXISTS `questionnaire_question`;
CREATE TABLE `questionnaire_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `questionnaire_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1单选题，2多选题，3填空题',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '多语言标志字段',
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  KEY `questionnaire_question_questionnaire_id_index` (`questionnaire_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of questionnaire_question
-- ----------------------------
INSERT INTO `questionnaire_question` VALUES ('5', '6', 'sdfss', 'sdf s', '0', '1', '2017-07-11 15:33:56', '2017-07-15 14:50:36', '5a35e358-664e-11e7-af68-080027c30a85', 'zh');
INSERT INTO `questionnaire_question` VALUES ('6', '6', 'xcv', 'xcv', '0', '1', '2017-07-11 15:33:56', '2017-07-11 15:33:56', '5a35e358-664e-11e7-af68-080027c30a85', 'en');

-- ----------------------------
-- Table structure for questionnaire_question_item
-- ----------------------------
DROP TABLE IF EXISTS `questionnaire_question_item`;
CREATE TABLE `questionnaire_question_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ABCD等标识',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '选项标题',
  `right_key` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否是正确答案，1是正确答案',
  `addition` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '附加条件',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '多语言标志字段',
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '语言',
  PRIMARY KEY (`id`),
  KEY `questionnaire_question_item_question_id_index` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of questionnaire_question_item
-- ----------------------------
INSERT INTO `questionnaire_question_item` VALUES ('31', '5', 'sdfs', 'sdf', '0', '', '2017-07-15 14:50:36', '2017-07-15 14:50:36', '5a35e358-664e-11e7-af68-080027c30a85', 'zh');
INSERT INTO `questionnaire_question_item` VALUES ('32', '6', 'dxc', 'xcv', '0', '', '2017-07-15 14:50:36', '2017-07-15 14:50:36', '5a35e358-664e-11e7-af68-080027c30a85', 'en');
INSERT INTO `questionnaire_question_item` VALUES ('33', '6', 'dxc', 'xcv', '0', '', '2017-07-15 14:50:36', '2017-07-15 14:50:36', '5a35e358-664e-11e7-af68-080027c30a85', 'en');
INSERT INTO `questionnaire_question_item` VALUES ('34', '6', 'dxc', 'xcv', '0', '', '2017-07-15 14:50:36', '2017-07-15 14:50:36', '5a35e358-664e-11e7-af68-080027c30a85', 'en');

-- ----------------------------
-- Table structure for questionnaire_user_answer
-- ----------------------------
DROP TABLE IF EXISTS `questionnaire_user_answer`;
CREATE TABLE `questionnaire_user_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `questionnaire_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questionnaire_user_answer_questionnaire_id_index` (`questionnaire_id`),
  KEY `questionnaire_user_answer_question_id_index` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of questionnaire_user_answer
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', '管理员', '管理员', '2017-05-22 09:12:01', '2017-05-22 16:09:35');
INSERT INTO `roles` VALUES ('16', 'test', '测试角色', '测试角色', '2017-05-22 16:09:16', '2017-05-22 16:09:16');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1', 'App\\User');
INSERT INTO `role_user` VALUES ('1', '16', 'App\\User');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('1', 'titile', '网站标题', 'qwe', 'text', '2017-06-01 06:18:42', '2017-06-01 06:18:42');
INSERT INTO `setting` VALUES ('2', 'site_logo', '网站LOGO', '/uploads/2017-06-01/WIN_20170515_16_38_33_Pro.jpg', 'file', '2017-06-01 06:18:42', '2017-06-01 06:18:42');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_info` text COLLATE utf8_unicode_ci,
  `login_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'rufo', '123456@qq.com', '$2y$10$2rq7E0aZvfAsovV2wT0N/uZHtP9vQjaFl8GZgv4bv.1XbyQqrxKSG', 'kd1f1RpDcKKraws35s8DlrExBfu5Fyz914rEKLuQ0mUvLJMGfPy8PVpiSj6X', '2017-05-21 18:29:32', '2017-05-21 18:29:32', null, null, null, null, null);
INSERT INTO `users` VALUES ('4', '775397252@qq.com', '775397252@qq.com', '$2y$10$EDEEnMqgR18xrWjJzLBb5uF8wU6zV2ncWzCckL.6BOTcwdgqRYbpm', 'oJCXInCcVFKJQIZMlfevDSoStNZZs2doPYZKYREGGYKmmGbJm0QypCOwgOvT', '2017-05-26 15:39:41', '2017-05-26 15:39:41', 'https://avatars0.githubusercontent.com/u/7972945?v=3', '775397252', '7972945', '{\"token\":\"fd86f9377a7f79444a9112c1523de08f0344a64a\",\"refreshToken\":null,\"expiresIn\":null,\"id\":7972945,\"nickname\":\"775397252\",\"name\":null,\"email\":\"775397252@qq.com\",\"avatar\":\"https:\\/\\/avatars0.githubusercontent.com\\/u\\/7972945?v=3\",\"user\":{\"login\":\"775397252\",\"id\":7972945,\"avatar_url\":\"https:\\/\\/avatars0.githubusercontent.com\\/u\\/7972945?v=3\",\"gravatar_id\":\"\",\"url\":\"https:\\/\\/api.github.com\\/users\\/775397252\",\"html_url\":\"https:\\/\\/github.com\\/775397252\",\"followers_url\":\"https:\\/\\/api.github.com\\/users\\/775397252\\/followers\",\"following_url\":\"https:\\/\\/api.github.com\\/users\\/775397252\\/following{\\/other_user}\",\"gists_url\":\"https:\\/\\/api.github.com\\/users\\/775397252\\/gists{\\/gist_id}\",\"starred_url\":\"https:\\/\\/api.github.com\\/users\\/775397252\\/starred{\\/owner}{\\/repo}\",\"subscriptions_url\":\"https:\\/\\/api.github.com\\/users\\/775397252\\/subscriptions\",\"organizations_url\":\"https:\\/\\/api.github.com\\/users\\/775397252\\/orgs\",\"repos_url\":\"https:\\/\\/api.github.com\\/users\\/775397252\\/repos\",\"events_url\":\"https:\\/\\/api.github.com\\/users\\/775397252\\/events{\\/privacy}\",\"received_events_url\":\"https:\\/\\/api.github.com\\/users\\/775397252\\/received_events\",\"type\":\"User\",\"site_admin\":false,\"name\":null,\"company\":null,\"blog\":\"\",\"location\":null,\"email\":\"775397252@qq.com\",\"hireable\":null,\"bio\":null,\"public_repos\":9,\"public_gists\":0,\"followers\":0,\"following\":1,\"created_at\":\"2014-06-24T07:48:44Z\",\"updated_at\":\"2017-05-19T11:54:35Z\"}}', null);
