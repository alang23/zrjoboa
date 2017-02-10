/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Version : 50144
 Source Host           : localhost
 Source Database       : zrjoboa

 Target Server Version : 50144
 File Encoding         : utf-8

 Date: 02/10/2017 12:34:38 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `zroa_account`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_account`;
CREATE TABLE `zroa_account` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `pawd` varchar(200) NOT NULL,
  `realname` varchar(200) NOT NULL,
  `gender` tinyint(2) NOT NULL DEFAULT '0',
  `jobs` varchar(100) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `zroa_ad_file`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_ad_file`;
CREATE TABLE `zroa_ad_file` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `bussiness_id` int(8) NOT NULL COMMENT '客户ID',
  `bid` int(8) NOT NULL,
  `title` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `file_finsh` varchar(200) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `s_uid` int(8) NOT NULL,
  `s_time` int(4) NOT NULL,
  `addtime` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_ad_file`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_ad_file` VALUES ('1', '1', '5', '20170125131020.jpg', '20170125131020.jpg', '', '0', '0', '0', '1485349820'), ('2', '1', '8', '20170126030034.jpg', '20170126030034.jpg', '', '0', '0', '0', '1485399634'), ('3', '1', '9', '20170126030154.jpg', '20170126030154.jpg', '', '0', '0', '0', '1485399714'), ('4', '1', '10', '20170126030248.jpg', '20170126030248.jpg', '', '0', '0', '0', '1485399768'), ('5', '1', '11', '20170126030449.jpg', '20170126030449.jpg', '', '0', '0', '0', '1485399889'), ('6', '1', '12', '20170126030938.jpg', '20170126030938.jpg', '', '0', '0', '0', '1485400178'), ('7', '1', '13', '20170126031116.jpg', '20170126031116.jpg', '', '0', '0', '0', '1485400276'), ('8', '1', '14', '20170126031651.jpg', '20170126031651.jpg', '', '0', '0', '0', '1485400611'), ('9', '1', '15', '20170126032213.jpg', '20170126032213.jpg', '', '0', '0', '0', '1485400933'), ('10', '3', '16', '20170202195959.png', '20170202195959.png', '', '0', '0', '0', '1486036799');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_ad_type`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_ad_type`;
CREATE TABLE `zroa_ad_type` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `company_id` int(8) NOT NULL,
  `ad_name` varchar(200) NOT NULL,
  `rank` int(4) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_ad_type`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_ad_type` VALUES ('1', '4', 'MX3', '0', '000', '0'), ('2', '4', 'MX4', '0', '', '0'), ('3', '4', '测试广告', '0', '', '0');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_admin`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_admin`;
CREATE TABLE `zroa_admin` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `pawd` varchar(200) DEFAULT NULL,
  `realname` varchar(200) NOT NULL,
  `gender` tinyint(2) NOT NULL DEFAULT '0',
  `works` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `company_id` int(8) NOT NULL DEFAULT '0',
  `remark` varchar(200) NOT NULL,
  `role` int(8) NOT NULL DEFAULT '0',
  `lastlogin` int(4) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  `addtime` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_admin`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_admin` VALUES ('4', 'admin', 'c33367701511b4f6020ec61ded352059', '兰总', '1', '经理', '15814073940', 'lanlibin23@163.com', '0', 'beizhu', '1', '0', '0', '1484898960'), ('2', 'nktiantianyouyuan001', '123456', '李总', '1', '经理', '13800138000', 'test@163.com', '4', '南康分公司', '4', '0', '0', '1484815525'), ('3', '13418837528', 'e10adc3949ba59abbe56e057f20f883e', '测试', '2', '经理', '13800138000', 'lanlibin23@163.com', '4', 'lanlibin23@163.com', '3', '0', '0', '1484887040'), ('5', 'nktiantianyouyuan002', 'e10adc3949ba59abbe56e057f20f883e', '刘总', '1', '经理', '13800138000', 'admin@163.com', '4', '', '3', '0', '0', '1484921227'), ('6', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', '南康分公司', '1', '经理', '15814073940', 'admin@163.com', '4', 'ceshi', '1', '0', '0', '1485947730'), ('7', 'admin3', 'e10adc3949ba59abbe56e057f20f883e', 'test', '1', '经理', '13800138000', 'admin@163.com', '4', 'ceshi', '2', '0', '0', '1485950017'), ('8', 'admin4', 'e10adc3949ba59abbe56e057f20f883e', '周总', '1', '经理', '13800138000', 'admin@163.com', '4', '', '2', '0', '1', '1485966293'), ('9', 'admin5', 'e10adc3949ba59abbe56e057f20f883e', '谢总', '1', '经理', '13800138000', 'lanlibin23@163.com', '4', '', '4', '0', '0', '1485972641'), ('10', 'admin6', 'e10adc3949ba59abbe56e057f20f883e', '孙总', '1', '经理', '13800138000', 'admin@163.com', '4', '', '4', '0', '0', '1485972679'), ('11', 'admin7', 'e10adc3949ba59abbe56e057f20f883e', '李总', '1', '经理', '13800138000', 'admin@163.com', '7', '系统管理员', '1', '0', '0', '1486036338'), ('12', 'nankang2', 'e10adc3949ba59abbe56e057f20f883e', '南康分公司3', '1', '经理', '15814073940', 'lanlibin23@163.com', '4', 'nankang', '2', '0', '0', '1486048683'), ('13', 'admin8', 'e10adc3949ba59abbe56e057f20f883e', '南康分公司', '1', '经理', '13800138000', 'lanlibin23@163.com', '5', '', '2', '0', '0', '1486193163');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_booth`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_booth`;
CREATE TABLE `zroa_booth` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `company_id` int(8) NOT NULL,
  `booth_no` varchar(100) NOT NULL,
  `booth_name` varchar(100) NOT NULL,
  `rank` int(4) NOT NULL DEFAULT '0',
  `addtime` int(4) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_booth`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_booth` VALUES ('1', '2', 'A1', 'A1', '0', '0', '0'), ('2', '2', 'A2', 'A2', '0', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_bussiness_ad`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_bussiness_ad`;
CREATE TABLE `zroa_bussiness_ad` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `bussiness_id` int(8) NOT NULL,
  `realname` varchar(200) NOT NULL,
  `uid` int(8) NOT NULL,
  `is_member` tinyint(2) NOT NULL DEFAULT '0',
  `c_name` varchar(200) NOT NULL,
  `bussiness_time` int(4) NOT NULL,
  `ad_type` int(8) NOT NULL,
  `ad_type_name` varchar(200) NOT NULL,
  `payment` tinyint(2) NOT NULL DEFAULT '0',
  `invoice` tinyint(2) NOT NULL,
  `pay_type` int(4) NOT NULL,
  `y_amount` varchar(35) NOT NULL,
  `s_amount` varchar(35) NOT NULL,
  `show_time` int(4) NOT NULL,
  `end_time` int(4) NOT NULL,
  `contacts` varchar(100) NOT NULL,
  `pay_project` int(4) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `addtime` int(4) NOT NULL,
  `s_uid` int(8) NOT NULL,
  `s_time` int(4) NOT NULL,
  `is_upload` tinyint(2) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_bussiness_ad`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_bussiness_ad` VALUES ('16', '3', '蒋总', '2', '0', '深圳xx科技有限公司', '1486569600', '1', 'MX6', '1', '1', '0', '20.00', '20.00', '1486051200', '1486483200', '何先生', '1', '13800138000', '', '1486036799', '0', '0', '0', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_bussiness_exhibition`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_bussiness_exhibition`;
CREATE TABLE `zroa_bussiness_exhibition` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `bussiness_id` int(8) NOT NULL,
  `realname` varchar(200) NOT NULL,
  `uid` int(8) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `show_time` int(4) NOT NULL,
  `no_id` int(8) NOT NULL DEFAULT '0' COMMENT '展位号',
  `no_name` varchar(200) NOT NULL,
  `is_member` tinyint(2) NOT NULL DEFAULT '1' COMMENT '是否是会员',
  `payment` tinyint(2) NOT NULL DEFAULT '1' COMMENT '是否已经缴费',
  `invoice` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否要发票',
  `pay_type` int(4) NOT NULL DEFAULT '0' COMMENT '支付方式',
  `y_amount` varchar(30) NOT NULL COMMENT '应收金额',
  `s_amount` varchar(30) NOT NULL COMMENT '实收金额',
  `pay_project` int(4) NOT NULL DEFAULT '0' COMMENT '收费项目',
  `c_food` varchar(20) NOT NULL COMMENT '中餐',
  `e_food` varchar(20) NOT NULL COMMENT '西餐',
  `contacts` varchar(60) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  `addtime` int(4) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '审核状态',
  `s_ticket` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否已经出票',
  `s_uid` int(8) NOT NULL COMMENT '确认用户',
  `s_name` varchar(200) NOT NULL,
  `s_time` int(4) NOT NULL COMMENT '确认时间',
  `content` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_bussiness_exhibition`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_bussiness_exhibition` VALUES ('2', '3', '李总', '0', '深圳前景在线广告有限公司', '1485360000', '2', 'A2', '1', '1', '0', '0', '200', '200', '1', '1', '1', '何先生', '13800138000', '', '0', '1485436520', '1', '0', '6', '南康分公司', '1486096764', ''), ('4', '1', '何总', '0', '东莞众人人力劳务派遣服务部', '1485446400', '1', 'A1', '1', '1', '0', '2', '200', '200', '2', '1', '1', '何先生', '15814073945', '', '0', '1485442989', '0', '0', '6', '南康分公司', '1486096565', ''), ('5', '2', '蒋总', '2', '深圳科技有限公司', '1485273600', '1', 'A1', '1', '1', '0', '0', '20.00', '20.00', '1', '30.00', '30.00', '江先生', '15814073945', '', '0', '1485444145', '1', '0', '4', '兰总', '1486450457', '');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_charge_type`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_charge_type`;
CREATE TABLE `zroa_charge_type` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `rank` int(4) NOT NULL DEFAULT '0',
  `remarks` varchar(200) NOT NULL,
  `tag` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_charge_type`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_charge_type` VALUES ('1', '招聘站位费', '0', 'zw', ''), ('2', '广告宣传费', '0', 'ad', '');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_company`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_company`;
CREATE TABLE `zroa_company` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contacts` varchar(200) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `enabled` tinyint(2) NOT NULL DEFAULT '0',
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  `addtime` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_company`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_company` VALUES ('3', '爱奇艺会员黄金月卡', '深圳福田区深南大道1006号', '何先生', '15814073945', 'zrjobtest@163.com', '深圳福田区深南大道1006号', '0', '1', '1484803345'), ('2', '大岭山胜和汽修', '深圳福田区深南大道1006号', '何先生', '15814073940', 'zrjobtest@163.com', '深圳福田区深南大道1006号', '0', '1', '1484802997'), ('4', '爱奇艺会员黄金月卡', '深圳福田区深南大道1006号', '何先生1', '15814073940', 'zrjobtest@163.com', '深圳福田区深南大道1006号', '0', '0', '1484804879'), ('5', '大岭山胜和汽修2', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '江先生', '13800138000', 'lanlibin23@163.com', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '0', '0', '1484811743'), ('6', 'hootoo1226@126.com', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '何先生', '13800138000', 'lanlibin23@163.com', '', '0', '0', '1484922723'), ('7', '深圳宏泰创展信息科技有限公司', '深圳福田区深南大道1006号', '谢总', '13800138000', 'lanlibin23@163.com', '新加入的账号', '0', '0', '1485919106'), ('8', '深圳指点科技有限公司', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '肖先生', '13800138002', 'admin@163.com', '深圳指点科技', '0', '0', '1486049287');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_customer`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_customer`;
CREATE TABLE `zroa_customer` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) NOT NULL,
  `company_id` int(8) NOT NULL,
  `realname` varchar(200) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `contacts` varchar(200) NOT NULL,
  `tel` varchar(60) NOT NULL,
  `address` varchar(255) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  `examine` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否审核',
  `addtime` int(4) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态，1-审核通过，2-审核不通过',
  `content` varchar(200) NOT NULL COMMENT '审核说明',
  `s_uid` int(8) NOT NULL COMMENT '审核人',
  `s_time` int(4) NOT NULL COMMENT '审核时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_customer`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_customer` VALUES ('1', '4', '4', '何总', '东莞众人人力劳务派遣服务部', '李总', '13800138000', '广东东莞大岭山', '招聘', '0', '0', '1485263476', '0', '', '0', '0'), ('2', '5', '4', '刘总', '深圳科技有限公司', '何先生', '13800138000', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '0', '0', '1485263476', '0', '', '0', '0'), ('3', '2', '4', '蒋总', '深圳前景在线广告有限公司', '测试', '88888999', '深圳福田区深南大道1006号', '重点客户', '0', '0', '1485324284', '0', '', '0', '0'), ('4', '4', '5', '蒋总', '深圳华高科技有限公司', '何先生', '13800138000', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '0', '0', '1485400052', '0', '', '0', '0'), ('5', '2', '5', '李总', '深圳科技有限公司', '何先生', '13800138000', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '0', '0', '1485412599', '0', '', '0', '0'), ('6', '2', '4', '李总', '深圳科技有限公司', '谢总', '13800138000', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '', '0', '0', '1486054578', '0', '', '0', '0'), ('7', '2', '4', '李总', '深圳科技有限公司2', '何先生', '88888999', '深圳福田区深南大道1006号', '深圳福田区深南大道', '0', '0', '1486056210', '0', '', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_exhibition`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_exhibition`;
CREATE TABLE `zroa_exhibition` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `company_id` int(8) NOT NULL,
  `ex_name` varchar(200) NOT NULL,
  `rank` int(4) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_exhibition`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_exhibition` VALUES ('1', '4', 'MX3', '0', '000', '0'), ('2', '4', 'MX4', '0', '', '0'), ('3', '4', '测试广告', '0', '', '0'), ('4', '4', '东1', '0', '', '0');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_login_log`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_login_log`;
CREATE TABLE `zroa_login_log` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) NOT NULL,
  `addtime` int(4) NOT NULL,
  `ip` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_login_log`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_login_log` VALUES ('1', '4', '1484922460', '127.0.0.1'), ('2', '4', '1484926939', '127.0.0.1'), ('3', '4', '1484982436', '127.0.0.1'), ('4', '4', '1484996064', '127.0.0.1'), ('5', '4', '1485001874', '127.0.0.1'), ('6', '4', '1485005770', '127.0.0.1'), ('7', '4', '1485016864', '127.0.0.1'), ('8', '4', '1485067544', '127.0.0.1'), ('9', '4', '1485091621', '127.0.0.1'), ('10', '4', '1485259157', '127.0.0.1'), ('11', '4', '1485263074', '127.0.0.1'), ('12', '4', '1485312212', '127.0.0.1'), ('13', '4', '1485338621', '127.0.0.1'), ('14', '4', '1485396654', '127.0.0.1'), ('15', '4', '1485411924', '127.0.0.1'), ('16', '4', '1485433263', '127.0.0.1'), ('17', '4', '1485492657', '127.0.0.1'), ('18', '4', '1485916240', '127.0.0.1'), ('19', '4', '1485919477', '127.0.0.1'), ('20', '4', '1485919700', '127.0.0.1'), ('21', '4', '1485922642', '127.0.0.1'), ('22', '3', '1485923164', '127.0.0.1'), ('23', '4', '1485923224', '127.0.0.1'), ('24', '4', '1485946785', '127.0.0.1'), ('25', '6', '1485947750', '127.0.0.1'), ('26', '6', '1485949155', '127.0.0.1'), ('27', '4', '1485949451', '127.0.0.1'), ('28', '6', '1485949482', '127.0.0.1'), ('29', '7', '1485950028', '127.0.0.1'), ('30', '6', '1485950109', '127.0.0.1'), ('31', '8', '1485966498', '127.0.0.1'), ('32', '6', '1485966519', '127.0.0.1'), ('33', '6', '1485966613', '127.0.0.1'), ('34', '4', '1486010158', '127.0.0.1'), ('35', '4', '1486022768', '127.0.0.1'), ('36', '4', '1486036263', '127.0.0.1'), ('37', '6', '1486036875', '127.0.0.1'), ('38', '6', '1486047365', '127.0.0.1'), ('39', '6', '1486050094', '127.0.0.1'), ('40', '6', '1486055099', '127.0.0.1'), ('41', '4', '1486087415', '127.0.0.1'), ('42', '4', '1486088044', '127.0.0.1'), ('43', '4', '1486088886', '127.0.0.1'), ('44', '6', '1486096549', '127.0.0.1'), ('45', '6', '1486112021', '127.0.0.1'), ('46', '6', '1486172621', '127.0.0.1'), ('47', '4', '1486190906', '127.0.0.1'), ('48', '4', '1486201183', '127.0.0.1'), ('49', '4', '1486351257', '127.0.0.1'), ('50', '4', '1486397665', '127.0.0.1'), ('51', '4', '1486407037', '127.0.0.1'), ('52', '4', '1486448172', '127.0.0.1'), ('53', '4', '1486450393', '127.0.0.1'), ('54', '4', '1486454073', '127.0.0.1'), ('55', '4', '1486454515', '127.0.0.1'), ('56', '4', '1486553367', '127.0.0.1'), ('57', '4', '1486553377', '127.0.0.1'), ('58', '4', '1486553392', '127.0.0.1');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_role`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_role`;
CREATE TABLE `zroa_role` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(200) NOT NULL,
  `role_tag` varchar(200) NOT NULL,
  `addtime` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_role`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_role` VALUES ('1', '系统管理员', 'root', '0'), ('2', '客户经理', 'c_manager', '0'), ('3', '客服', 'c_service', '0'), ('4', '财务', 'finance', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
