/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : yii

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-12-21 15:22:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for session
-- ----------------------------
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `id` char(40) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of session
-- ----------------------------
INSERT INTO `session` VALUES ('118uuk7hc6dvr2m7c4q0n64do2', '1481795665', 0x5F5F666C6173687C613A303A7B7D757365727C613A373A7B733A323A226964223B733A313A2232223B733A383A22757365726E616D65223B733A353A2261646D696E223B733A333A22707764223B733A33323A223162326465323439396535663933653030613561393065373961396461346231223B733A373A22726F6C655F6964223B733A333A22323535223B733A363A22737461747573223B733A313A2231223B733A31333A2270617373776F72645F68617368223B733A343A2231323331223B733A383A227265616C6E616D65223B733A393A22E7AEA1E79086E59198223B7D);
INSERT INTO `session` VALUES ('21te1qf5mjs503ssk9iovev2j3', '1482030579', 0x5F5F666C6173687C613A303A7B7D);
INSERT INTO `session` VALUES ('3kmd08bfr5lea4i4uakvn54rp3', '1482030282', 0x5F5F666C6173687C613A303A7B7D);
INSERT INTO `session` VALUES ('3natnrjf5uac4neujucjjh7gv5', '1481794349', 0x5F5F666C6173687C613A303A7B7D757365727C613A373A7B733A323A226964223B733A313A2231223B733A383A22757365726E616D65223B733A373A227869616F67756F223B733A333A22707764223B733A33323A223938396430313730613361653731363638376638373338363639613236376264223B733A373A22726F6C655F6964223B733A313A2230223B733A363A22737461747573223B733A313A2231223B733A31333A2270617373776F72645F68617368223B733A343A2235363139223B733A383A227265616C6E616D65223B733A363A22E5B08FE983AD223B7D);
INSERT INTO `session` VALUES ('a3q33mgpf3lmrol6jdj2mlsc42', '1482030219', 0x5F5F666C6173687C613A303A7B7D);
INSERT INTO `session` VALUES ('an3tp2b3ebu1uivi5rndp2occ4', '1482030193', 0x5F5F666C6173687C613A303A7B7D757365727C613A373A7B733A323A226964223B733A313A2232223B733A383A22757365726E616D65223B733A353A2261646D696E223B733A333A22707764223B733A33323A223162326465323439396535663933653030613561393065373961396461346231223B733A373A22726F6C655F6964223B733A333A22323535223B733A363A22737461747573223B733A313A2231223B733A31333A2270617373776F72645F68617368223B733A343A2231323331223B733A383A227265616C6E616D65223B733A393A22E7AEA1E79086E59198223B7D);
INSERT INTO `session` VALUES ('bn3bdod9n7hg1u868g6q9a2gp3', '1482026225', 0x5F5F666C6173687C613A303A7B7D);
INSERT INTO `session` VALUES ('eub6ps0me7dmmaoa0qmbn66ls0', '1481795991', 0x5F5F666C6173687C613A303A7B7D6D656D626572496E666F7C613A32353A7B733A323A226964223B733A313A2232223B733A353A22756E616D65223B733A353A2264656D6F6E223B733A333A22707764223B733A363A22313233343536223B733A393A22706172656E745F6964223B733A313A2231223B733A343A2272616E6B223B733A313A2232223B733A383A227265616C6E616D65223B733A333A22E69687223B733A31323A226964656E746974795F6E756D223B733A303A22223B733A353A22656D61696C223B733A303A22223B733A31313A226E6174696F6E616C697479223B733A363A22E4B8ADE59BBD223B733A383A2270726F76696E6365223B733A303A22223B733A343A2263697479223B733A393A22E5B9BFE5B79EE5B882223B733A333A22736578223B733A313A2231223B733A383A226E69636B6E616D65223B4E3B733A363A226D6F62696C65223B733A31313A223138383235303430363038223B733A31323A227061795F70617373776F7264223B733A363A22313131313131223B733A31313A226372656174655F64617465223B733A31303A2231343738363538393339223B733A31393A2270726F6D6F74655F616368696576656D656E74223B733A31303A22323035303030302E3030223B733A31373A22616368696576656D656E745F6D6F6E7468223B733A31303A22323031362D30312D3330223B733A31373A22746F74616C5F616368696576656D656E74223B733A31303A22313436303030302E3030223B733A31323A2269735F7072655F6167656E74223B733A313A2231223B733A363A2277616C6C6574223B733A393A223234303437302E3030223B733A31323A226578616D696E655F64617465223B4E3B733A32323A227570746F5F6D6F6E74685F616368696576656D656E74223B733A343A22302E3030223B733A32303A22706572736F6E616C5F616368696576656D656E74223B733A343A22302E3030223B733A363A22737461747573223B733A313A2231223B7D);
INSERT INTO `session` VALUES ('f4o96nsdloic8h9bfce7v1tke4', '1482030601', 0x5F5F666C6173687C613A303A7B7D);
INSERT INTO `session` VALUES ('orffmfdjkhh6voe95nhg723d96', '1482026275', 0x5F5F666C6173687C613A303A7B7D757365727C613A373A7B733A323A226964223B733A313A2232223B733A383A22757365726E616D65223B733A353A2261646D696E223B733A333A22707764223B733A33323A223162326465323439396535663933653030613561393065373961396461346231223B733A373A22726F6C655F6964223B733A333A22323535223B733A363A22737461747573223B733A313A2231223B733A31333A2270617373776F72645F68617368223B733A343A2231323331223B733A383A227265616C6E616D65223B733A393A22E7AEA1E79086E59198223B7D);

-- ----------------------------
-- Table structure for tsk_admin
-- ----------------------------
DROP TABLE IF EXISTS `tsk_admin`;
CREATE TABLE `tsk_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `salt` varchar(10) DEFAULT NULL COMMENT '密码安全字段',
  `pwd` char(32) NOT NULL,
  `realname` varchar(20) NOT NULL COMMENT '真实姓名',
  `logo` varchar(255) DEFAULT NULL COMMENT 'logo',
  `role_id` tinyint(2) unsigned DEFAULT '0' COMMENT '角色ID',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '用户状态',
  `create_date` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of tsk_admin
-- ----------------------------
INSERT INTO `tsk_admin` VALUES ('1', 'xiaoguo', '5619', '989d0170a3ae716687f8738669a267bd', '小郭', '123123', '0', '1', '0000-00-00 00:00:00');
INSERT INTO `tsk_admin` VALUES ('2', 'admin', '1231', '1b2de2499e5f93e00a5a90e79a9da4b1', '管理员', '123123', '255', '1', '2016-11-12 11:46:53');

-- ----------------------------
-- Table structure for tsk_menu
-- ----------------------------
DROP TABLE IF EXISTS `tsk_menu`;
CREATE TABLE `tsk_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '菜单名',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父类Id  顶级菜单默认0',
  `url` varchar(100) DEFAULT NULL COMMENT 'url',
  `params` varchar(50) DEFAULT NULL,
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `icon` varchar(50) DEFAULT NULL COMMENT '图标',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 0 禁用 1启用',
  `create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='后台菜单管理';

-- ----------------------------
-- Records of tsk_menu
-- ----------------------------
INSERT INTO `tsk_menu` VALUES ('1', '首页', '0', 'index/main', '', '0', 'fa fa-diamond', '0', '2016-11-24 17:24:16');
INSERT INTO `tsk_menu` VALUES ('2', '业绩报表', '0', 'achievement/index', '', '4', 'fa fa-table', '1', '2016-11-24 17:24:16');
INSERT INTO `tsk_menu` VALUES ('3', '用户代理', '0', 'agent/index', 'a=1&b=2', '0', 'fa fa-user', '1', '2016-11-24 17:24:16');
INSERT INTO `tsk_menu` VALUES ('4', '系统管理', '0', '#', '', '99', 'fa fa-cogs', '1', '2016-11-24 17:33:47');
INSERT INTO `tsk_menu` VALUES ('5', '用户管理', '4', 'user/index', '', '1', '', '1', '2016-11-24 17:36:09');
INSERT INTO `tsk_menu` VALUES ('6', '菜单管理', '4', 'menu/index', '', '3', '', '1', '2016-11-24 17:36:38');
INSERT INTO `tsk_menu` VALUES ('7', '角色管理', '4', 'role/index', '', '2', '', '1', '2016-11-24 17:37:06');
INSERT INTO `tsk_menu` VALUES ('8', '代理审核', '0', 'apply/index', '', '2', 'fa fa-table', '1', '2016-11-24 17:38:23');
INSERT INTO `tsk_menu` VALUES ('9', '提现审核', '0', 'cash/index', '', '3', 'fa fa-table', '1', '2016-11-24 17:38:56');
INSERT INTO `tsk_menu` VALUES ('10', '账户流水', '0', 'account/index', '', '5', 'fa fa-rmb', '1', '2016-12-08 10:35:35');
INSERT INTO `tsk_menu` VALUES ('18', '短信管理', '0', '#', '', '6', 'fa fa-send', '1', '2016-12-09 06:59:26');
INSERT INTO `tsk_menu` VALUES ('19', '消息模板', '18', 'template/index', '', '7', '', '1', '2016-12-09 07:07:00');

-- ----------------------------
-- Table structure for tsk_role
-- ----------------------------
DROP TABLE IF EXISTS `tsk_role`;
CREATE TABLE `tsk_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '角色名',
  `auth` varchar(255) NOT NULL COMMENT '权限',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_date` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tsk_role
-- ----------------------------
INSERT INTO `tsk_role` VALUES ('7', '技术员', '[\"role\\/del\",\"role\\/post\"]', '0', '2016-11-26 11:58:34');
INSERT INTO `tsk_role` VALUES ('8', 'test', '[\"role\\/index\",\"role\\/add\",\"role\\/get\"]', '1', '2016-12-14 10:08:29');
INSERT INTO `tsk_role` VALUES ('10', '123123', '[\"role\\/index\",\"role\\/export\"]', '1', '2016-12-14 14:54:56');

-- ----------------------------
-- Table structure for tsk_user
-- ----------------------------
DROP TABLE IF EXISTS `tsk_user`;
CREATE TABLE `tsk_user` (
  `id` int(10) unsigned NOT NULL,
  `uname` varchar(20) NOT NULL COMMENT '用户名',
  `pwd` char(32) NOT NULL COMMENT '密码',
  `parent_id` int(10) unsigned DEFAULT '0' COMMENT '上级ID',
  `rank` tinyint(1) unsigned DEFAULT '0' COMMENT '代理等级（0：会员，1：代理，2：经理，3：区域经理）',
  `realname` varchar(30) DEFAULT NULL COMMENT '真实姓名',
  `identity_num` varchar(30) NOT NULL DEFAULT '' COMMENT '身份证号',
  `email` varchar(40) NOT NULL DEFAULT '' COMMENT '邮箱',
  `nationality` varchar(30) NOT NULL DEFAULT '中国' COMMENT '国籍,如：中国',
  `province` varchar(30) NOT NULL DEFAULT '' COMMENT '省份',
  `city` varchar(30) NOT NULL DEFAULT '' COMMENT 'city',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '性别，1.女，2.男',
  `nickname` varchar(20) DEFAULT NULL COMMENT '昵称',
  `mobile` char(11) DEFAULT NULL COMMENT '手机号码',
  `pay_password` char(32) DEFAULT NULL COMMENT '支付密码',
  `create_date` int(10) unsigned NOT NULL COMMENT '创建时间',
  `promote_achievement` decimal(18,2) unsigned DEFAULT '0.00' COMMENT '晋升业绩',
  `achievement_month` char(10) DEFAULT NULL COMMENT '晋升业绩开始统计月份',
  `total_achievement` decimal(18,2) unsigned DEFAULT '0.00' COMMENT '总业绩',
  `is_pre_agent` tinyint(1) unsigned DEFAULT '0' COMMENT '是否预代理（0：否，1：是）',
  `wallet` decimal(18,2) unsigned DEFAULT '0.00' COMMENT '钱包余额',
  `examine_date` int(11) unsigned DEFAULT NULL COMMENT '成为代理时间【后台审核通过时间】',
  `upto_month_achievement` decimal(18,2) unsigned DEFAULT '0.00' COMMENT '截至上月的业绩',
  `personal_achievement` decimal(18,2) unsigned DEFAULT '0.00' COMMENT '个人业绩',
  `status` tinyint(3) unsigned DEFAULT '1' COMMENT '用户状态：0：禁用，1：启用',
  PRIMARY KEY (`id`),
  KEY `mobile` (`mobile`) USING BTREE,
  KEY `uname` (`uname`) USING BTREE,
  KEY `id` (`id`) USING BTREE,
  KEY `parent_id` (`parent_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of tsk_user
-- ----------------------------
INSERT INTO `tsk_user` VALUES ('1', 'marco111', '123456', '0', '3', '李宏1', '', '', '中国', '', '广州市', '1', 'marco_l', '', '123123123', '1478658939', '50000.00', '2016-11-18', '20200.00', '1', '100851.00', '1478658939', '0.00', '0.00', '1');
INSERT INTO `tsk_user` VALUES ('2', 'demon', '123456', '1', '2', '文', '', '', '中国', '', '广州市', '1', null, '18825040608', '111111', '1478658939', '2050000.00', '2016-01-30', '1460000.00', '1', '240470.00', null, '0.00', '0.00', '1');
INSERT INTO `tsk_user` VALUES ('3', 'xiaoguo', '123456', '1', '3', '小郭', '', '', '中国', '', '广州市', '1', null, '18819125362', '111111', '1478658939', '0.00', '2016-11-20', '10000.00', '1', '2158.00', '1480649009', '0.00', '0.00', '1');
INSERT INTO `tsk_user` VALUES ('4', '', '', '2', '0', '测试用户', '', '', '中国', '', '', '1', null, '18306674319', null, '1480150321', '30000.00', null, '40000.00', '1', '4124.00', null, '0.00', '0.00', '1');
INSERT INTO `tsk_user` VALUES ('25', 'marco', '146630', '2', '3', '李宏users', '123443323221231221', '472636142@qq.com', '中国', '广东', '广州', '2', null, '13431002439', null, '1480649009', '0.00', '2016-12-02', '10000.00', '1', '1000.00', '1480649009', '0.00', '0.00', '1');
INSERT INTO `tsk_user` VALUES ('266', 'marco123', '840676', '25', '0', '', '123456', 'asda@ad.gh', '中国', '', '', '1', null, '13888855555', null, '1480584954', '0.00', '2016-12-01', '10000.00', '1', '6000.00', '1480584954', '0.00', '0.00', '1');
INSERT INTO `tsk_user` VALUES ('565', 'suruiyan123456', '887911', '0', '0', 'su', '123456', '', '中国', '江苏', '常州', '2', null, '18664817225', null, '1480574488', '0.00', '2016-12-01', '10000.00', '1', '91000.00', '1480574488', '0.00', '0.00', '1');
INSERT INTO `tsk_user` VALUES ('888', '', '', '4', '0', 'diaomao', '', '', '中国', '', '', '1', null, null, null, '1481527354', '0.00', null, '0.00', '0', '0.00', null, '0.00', '0.00', '1');
INSERT INTO `tsk_user` VALUES ('942', '', '', '2', '0', '陈秋秋', '', '', '中国', '', '', '1', null, null, null, '1481625693', '0.00', null, '0.00', '0', '0.00', null, '0.00', '0.00', '1');
INSERT INTO `tsk_user` VALUES ('943', '', '', '2', '0', '', '', '', '中国', '', '', '1', null, null, null, '0', '0.00', null, '0.00', '0', '0.00', null, '0.00', '0.00', '1');
