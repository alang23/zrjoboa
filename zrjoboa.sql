/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : zrjoboa

 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 03/21/2017 18:05:44 PM
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
  `type_id` int(4) NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `file_finsh` varchar(200) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `s_uid` int(8) NOT NULL,
  `s_time` int(4) NOT NULL,
  `addtime` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_ad_file`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_ad_file` VALUES ('28', '9', '54', '1', '20170310152330.png', '20170310152330.png', '', '0', '0', '0', '1489130610'), ('29', '9', '54', '1', '20170310152438.png', '20170310152438.png', '', '0', '0', '0', '1489130678'), ('30', '9', '54', '1', '20170310152655.png', '20170310152655.png', '', '0', '0', '0', '1489130815'), ('31', '9', '53', '1', '20170310152846.png', '20170310152846.png', '', '0', '0', '0', '1489130926'), ('32', '9', '57', '1', '20170321103753.png', '20170321103753.png', '', '0', '0', '0', '1490063873'), ('33', '9', '58', '1', '20170321103828.png', '20170321103828.png', '', '0', '0', '0', '1490063908');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_ad_type`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_ad_type`;
CREATE TABLE `zroa_ad_type` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `company_id` int(8) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `ad_name` varchar(200) NOT NULL,
  `rank` int(4) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_ad_type`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_ad_type` VALUES ('1', '4', '', 'MX3', '0', '000', '0'), ('2', '4', '', 'MX4', '0', '', '0'), ('3', '4', '', '测试广告', '0', '', '0'), ('6', '0', '', '网易首页', '0', '', '0'), ('7', '10', '', '测试广告', '0', '', '0'), ('8', '0', '', 'A4', '0', '', '0'), ('9', '10', '深圳宏泰创展信息科技有限公司', 'A4', '0', '', '0'), ('10', '12', '深圳指点科技有限公司', 'A4', '0', '', '0'), ('11', '10', '深圳宏泰创展信息科技有限公司', 'A4', '0', '', '0');
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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_admin`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_admin` VALUES ('4', 'admin', 'c33367701511b4f6020ec61ded352059', '兰总1', '1', '经理', '15814073940', 'lanlibin23@163.com', '0', 'beizhu', '0', '0', '0', '1484898960'), ('18', 'admin4', 'e10adc3949ba59abbe56e057f20f883e', '流量公司8', '1', '经理2', '15814073940', 'lanlibin23@163.com', '10', '', '2', '0', '0', '1487049626'), ('19', 'admin5', 'e10adc3949ba59abbe56e057f20f883e', '南康分公司', '1', '经理', '13800138002', 'admin@163.com', '10', '', '3', '0', '0', '1487050060'), ('20', 'admin6', 'e10adc3949ba59abbe56e057f20f883e', '流量公司', '1', '经理', '82873259', 'admin@163.com', '10', '已经分配', '2', '0', '0', '1487050108'), ('15', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', '赵总', '1', '经理', '13800138000', 'admin@163.com', '10', '', '1', '0', '0', '1486798150'), ('16', 'admin3', 'e10adc3949ba59abbe56e057f20f883e', '流量公司', '1', '经理', '13800138002', 'admin@163.com', '10', '', '2', '0', '0', '1486798735'), ('17', 'nankang1', 'e10adc3949ba59abbe56e057f20f883e', '老总', '1', '经理', '13800138000', 'lanlibin23@163.com', '11', '', '1', '0', '0', '1487038800'), ('21', 'admin8', 'e10adc3949ba59abbe56e057f20f883e', '  你好', '1', '老板', '13800138000', '822561700@qq.com', '17', '', '1', '0', '0', '1487475108'), ('22', 'wang', 'e10adc3949ba59abbe56e057f20f883e', '王经理', '1', 'p40', '13800138000', 'test@163.com', '10', '', '7', '0', '0', '1488874764');
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
  `pay_project` int(4) NOT NULL DEFAULT '1',
  `phone` varchar(20) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `addtime` int(4) NOT NULL,
  `s_uid` int(8) NOT NULL,
  `s_time` int(4) NOT NULL,
  `is_upload` tinyint(2) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_bussiness_ad`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_bussiness_ad` VALUES ('29', '9', '赵总', '15', '0', '深圳科技有限公司', '1489075200', '2', 'E10', '1', '1', '3', '0.00', '0.00', '1489075200', '1489075200', '', '2', '', '', '1489112380', '0', '0', '0', '0', '0'), ('30', '9', '', '15', '0', '深圳科技有限公司', '1489075200', '2', 'oa24', '0', '0', '1', '100.00', '200.00', '1489075200', '1489075200', '主任', '2', '13800138000', '', '1489112445', '0', '0', '1', '1', '0'), ('31', '9', '赵总', '15', '0', '深圳科技有限公司', '1489334400', '2', 'E10', '0', '0', '1', '0.00', '0.00', '1489334400', '1489334400', '主任', '3', '13800138000', '', '1489397264', '0', '0', '0', '0', '0'), ('32', '9', '赵总', '15', '0', '深圳科技有限公司', '1489334400', '2', 'E10', '0', '0', '4', '0.00', '0.00', '1489334400', '1489507200', '主任', '4', '13800138000', '', '1489397879', '0', '0', '0', '0', '0'), ('33', '9', '赵总', '15', '0', '深圳科技有限公司', '1489334400', '2', 'oa24', '0', '0', '0', '0.00', '0.00', '1489334400', '1489507200', '主任', '5', '13800138000', '', '1489398071', '0', '0', '0', '0', '0');
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
  `is_vip` tinyint(2) NOT NULL DEFAULT '0',
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
  `is_upload` tinyint(2) NOT NULL DEFAULT '0',
  `content` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_bussiness_exhibition`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_bussiness_exhibition` VALUES ('44', '9', '赵总', '15', '深圳科技有限公司', '1489075200', '0', '02', '0', '0', '0', '0', '1', '0.00', '0.00', '1', '1', '1', '', '', '', '1', '1489111405', '0', '0', '0', '', '0', '0', ''), ('45', '9', '赵总', '15', '深圳科技有限公司', '1489075200', '0', 'a10', '1', '1', '1', '1', '4', '0.00', '0.00', '1', '0', '1', '', '', '', '0', '1489111613', '0', '0', '15', '赵总', '1490059812', '0', ''), ('46', '9', '赵总', '15', '深圳科技有限公司', '1489075200', '0', 'A8', '0', '0', '0', '0', '1', '0.00', '0.00', '1', '1', '1', '', '', '', '0', '1489111750', '0', '0', '0', '', '0', '0', ''), ('47', '9', '赵总', '15', '深圳科技有限公司', '1489075200', '0', '', '1', '1', '1', '0', '1', '0.00', '0.00', '1', '1', '1', '', '', '', '0', '1489111778', '0', '0', '0', '', '0', '0', ''), ('48', '9', '赵总', '15', '深圳科技有限公司', '1489075200', '0', 'a10', '0', '0', '0', '0', '1', '0.00', '0.00', '1', '1', '1', '', '', '', '0', '1489111868', '0', '0', '0', '', '0', '0', ''), ('49', '9', '赵总', '15', '深圳科技有限公司', '1489075200', '0', 'a10', '0', '0', '0', '0', '1', '0.00', '0.00', '1', '1', '1', '', '', '', '0', '1489111987', '0', '0', '0', '', '0', '0', ''), ('50', '9', '赵总', '15', '深圳科技有限公司', '1489075200', '0', '', '0', '0', '0', '0', '1', '0.00', '0.00', '1', '1', '1', '', '', '', '0', '1489112007', '0', '0', '0', '', '0', '0', ''), ('51', '9', '赵总', '15', '深圳科技有限公司', '1489075200', '0', 'a10', '0', '0', '0', '0', '1', '0.00', '0.00', '1', '1', '1', '', '', '', '0', '1489112032', '0', '0', '4', '兰总1', '1489990272', '0', ''), ('52', '9', '赵总', '15', '深圳科技有限公司', '1489075200', '0', '', '0', '0', '0', '0', '1', '0.00', '0.00', '1', '1', '1', '', '', '', '0', '1489112129', '0', '0', '0', '', '0', '0', ''), ('53', '9', '赵总', '15', '深圳科技有限公司', '1489075200', '0', '02', '1', '1', '0', '0', '1', '0.00', '0.00', '0', '1', '1', '', '', '', '0', '1489112160', '0', '0', '0', '', '0', '1', ''), ('54', '9', '赵总', '15', '深圳科技有限公司', '1489075200', '0', 'a10', '0', '0', '1', '1', '3', '1.00', '0.00', '0', '0', '1', '蒋总', '13800138000', 'fssdf', '0', '1489118582', '0', '0', '0', '', '0', '1', ''), ('55', '9', '赵总', '15', '深圳科技有限公司', '1489420800', '0', 'a10', '0', '0', '0', '0', '1', '0.00', '0.00', '1', '0', '0', '主任', '13800138000', '', '0', '1489456519', '0', '0', '0', '', '0', '0', ''), ('56', '9', '赵总', '15', '深圳科技有限公司', '1490025600', '0', 'a10', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '主任', '15814073940', '', '0', '1490059752', '0', '0', '0', '', '0', '0', ''), ('57', '9', '赵总', '15', '深圳科技有限公司', '1490025600', '0', 'a10', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '主任', '15814073940', '', '0', '1490063873', '0', '0', '0', '', '0', '0', ''), ('58', '9', '赵总', '15', '深圳科技有限公司', '1490025600', '0', 'a10', '0', '0', '0', '0', '1', '0', '0', '1', '0', '0', '主任', '15814073940', '', '0', '1490063908', '0', '0', '0', '', '0', '1', '');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_category`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_category`;
CREATE TABLE `zroa_category` (
  `c_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_parentid` int(10) unsigned NOT NULL,
  `c_alias` char(30) NOT NULL,
  `c_name` char(30) NOT NULL,
  `c_order` int(10) NOT NULL,
  `c_index` char(1) NOT NULL,
  `c_note` char(60) NOT NULL,
  `stat_jobs` char(15) NOT NULL,
  `stat_resume` char(15) NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `c_alias` (`c_alias`)
) ENGINE=MyISAM AUTO_INCREMENT=294 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Records of `zroa_category`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_category` VALUES ('1', '0', 'WRZC_trade', '计算机软件/硬件', '0', '', '', '', ''), ('2', '0', 'WRZC_trade', '计算机系统/维修', '0', '', '', '', ''), ('3', '0', 'WRZC_trade', '通信(设备/运营/服务)', '0', '', '', '', ''), ('4', '0', 'WRZC_trade', '互联网/电子商务', '0', '', '', '(156)', ''), ('5', '0', 'WRZC_trade', '网络游戏', '0', '', '', '(1)', ''), ('6', '0', 'WRZC_trade', '电子/半导体/集成电路', '0', '', '', '(2)', ''), ('7', '0', 'WRZC_trade', '仪器仪表/工业自动化', '0', '', '', '', ''), ('8', '0', 'WRZC_trade', '会计/审计', '0', '', '', '', ''), ('9', '0', 'WRZC_trade', '金融(投资/证券', '0', '', '', '(1)', ''), ('10', '0', 'WRZC_trade', '金融(银行/保险)', '0', '', '', '(23)', ''), ('11', '0', 'WRZC_trade', '贸易/进出口', '0', '', '', '', ''), ('12', '0', 'WRZC_trade', '批发/零售', '0', '', '', '(12)', ''), ('13', '0', 'WRZC_trade', '消费品(食/饮/烟酒)', '0', '', '', '(13)', ''), ('14', '0', 'WRZC_trade', '服装/纺织/皮革', '0', '', '', '(7)', ''), ('15', '0', 'WRZC_trade', '家具/家电/工艺品/玩具', '0', '', '', '(1)', ''), ('16', '0', 'WRZC_trade', '办公用品及设备', '0', '', '', '', ''), ('17', '0', 'WRZC_trade', '机械/设备/重工', '0', '', '', '', ''), ('18', '0', 'WRZC_trade', '汽车/摩托车/零配件', '0', '', '', '(9)', ''), ('19', '0', 'WRZC_trade', '制药/生物工程', '0', '', '', '(1)', ''), ('20', '0', 'WRZC_trade', '医疗/美容/保健/卫生', '0', '', '', '(20)', ''), ('21', '0', 'WRZC_trade', '医疗设备/器械', '0', '', '', '', ''), ('22', '0', 'WRZC_trade', '广告/市场推广', '0', '', '', '(2)', ''), ('23', '0', 'WRZC_trade', '会展/博览', '0', '', '', '', ''), ('24', '0', 'WRZC_trade', '影视/媒体/艺术/出版', '0', '', '', '', ''), ('25', '0', 'WRZC_trade', '印刷/包装/造纸', '0', '', '', '', ''), ('26', '0', 'WRZC_trade', '房地产开发', '0', '', '', '', ''), ('27', '0', 'WRZC_trade', '建筑与工程', '0', '', '', '(1)', ''), ('28', '0', 'WRZC_trade', '家居/室内设计/装潢', '0', '', '', '(20)', ''), ('29', '0', 'WRZC_trade', '物业管理/商业中心', '0', '', '', '', ''), ('30', '0', 'WRZC_trade', '中介服务/家政服务', '0', '', '', '', ''), ('31', '0', 'WRZC_trade', '专业服务/财会/法律', '0', '', '', '', ''), ('32', '0', 'WRZC_trade', '检测/认证', '0', '', '', '', ''), ('33', '0', 'WRZC_trade', '教育/培训', '0', '', '', '(35)', ''), ('34', '0', 'WRZC_trade', '学术/科研', '0', '', '', '', ''), ('35', '0', 'WRZC_trade', '餐饮/娱乐/休闲', '0', '', '', '', ''), ('36', '0', 'WRZC_trade', '酒店/旅游', '0', '', '', '', ''), ('37', '0', 'WRZC_trade', '交通/运输/物流', '0', '', '', '(67)', ''), ('38', '0', 'WRZC_trade', '航天/航空', '0', '', '', '', ''), ('39', '0', 'WRZC_trade', '能源(石油/化工/矿产)', '0', '', '', '(1)', ''), ('40', '0', 'WRZC_trade', '能源(采掘/冶炼/原材料)', '0', '', '', '', ''), ('41', '0', 'WRZC_trade', '电力/水利/新能源', '0', '', '', '', ''), ('42', '0', 'WRZC_trade', '政府部门/事业单位', '0', '', '', '', ''), ('43', '0', 'WRZC_trade', '非盈利机构/行业协会', '0', '', '', '', ''), ('44', '0', 'WRZC_trade', '农业/渔业/林业/牧业', '0', '', '', '(2)', ''), ('45', '0', 'WRZC_trade', '其他行业', '0', '', '', '(828)', ''), ('46', '0', 'WRZC_company_type', '国企', '0', '', '', '', ''), ('47', '0', 'WRZC_company_type', '民营', '0', '', '', '', ''), ('48', '0', 'WRZC_company_type', '合资', '0', '', '', '', ''), ('49', '0', 'WRZC_company_type', '外商独资', '0', '', '', '', ''), ('50', '0', 'WRZC_company_type', '股份制企业', '0', '', '', '', ''), ('51', '0', 'WRZC_company_type', '上市公司', '0', '', '', '', ''), ('52', '0', 'WRZC_company_type', '国家机关', '0', '', '', '', ''), ('53', '0', 'WRZC_company_type', '事业单位', '0', '', '', '', ''), ('54', '0', 'WRZC_company_type', '其它', '0', '', '', '', ''), ('56', '0', 'WRZC_wage', '1000~1500元/月', '0', '', '', '(107)', ''), ('57', '0', 'WRZC_wage', '1500~2000元/月', '0', '', '', '(164)', ''), ('58', '0', 'WRZC_wage', '2000~3000元/月', '0', '', '', '(504)', ''), ('59', '0', 'WRZC_wage', '3000~5000元/月', '0', '', '', '(69)', ''), ('60', '0', 'WRZC_wage', '5000~10000元/月', '0', '', '', '(139)', ''), ('61', '0', 'WRZC_wage', '1万以上/月', '0', '', '', '', ''), ('62', '0', 'WRZC_jobs_nature', '全职', '0', '', '', '(1202)', ''), ('63', '0', 'WRZC_jobs_nature', '兼职', '0', '', '', '', ''), ('64', '0', 'WRZC_jobs_nature', '实习', '0', '', '', '', ''), ('65', '0', 'WRZC_education', '初中', '0', '', '', '', ''), ('66', '0', 'WRZC_education', '高中', '0', '', '', '', ''), ('67', '0', 'WRZC_education', '中技', '0', '', '', '', ''), ('68', '0', 'WRZC_education', '中专', '0', '', '', '', ''), ('69', '0', 'WRZC_education', '大专', '0', '', '', '', ''), ('70', '0', 'WRZC_education', '本科', '0', '', '', '', ''), ('71', '0', 'WRZC_education', '硕士', '0', '', '', '', ''), ('72', '0', 'WRZC_education', '博士', '0', '', '', '', ''), ('73', '0', 'WRZC_education', '博后', '0', '', '', '', ''), ('74', '0', 'WRZC_experience', '无经验', '0', '', '', '', ''), ('75', '0', 'WRZC_experience', '1年以下', '0', '', '', '', ''), ('76', '0', 'WRZC_experience', '1-3年', '0', '', '', '', ''), ('77', '0', 'WRZC_experience', '3-5年', '0', '', '', '', ''), ('78', '0', 'WRZC_experience', '5-10年', '0', '', '', '', ''), ('79', '0', 'WRZC_experience', '10年以上', '0', '', '', '', ''), ('80', '0', 'WRZC_scale', '20人以下', '0', '', '', '', ''), ('81', '0', 'WRZC_scale', '20-99人', '0', '', '', '', ''), ('82', '0', 'WRZC_scale', '100-499人', '0', '', '', '', ''), ('83', '0', 'WRZC_scale', '500-999人', '0', '', '', '', ''), ('84', '0', 'WRZC_scale', '1000-9999人', '0', '', '', '', ''), ('85', '0', 'WRZC_scale', '10000人以上', '0', '', '', '', ''), ('86', '0', 'WRZC_train_type', '自主办学', '0', '', '', '', ''), ('88', '0', 'WRZC_train_type', '教学机构', '0', '', '', '', ''), ('240', '0', 'WRZC_train_classtype', '其他班', '0', 'q', '', '', ''), ('239', '0', 'WRZC_train_classtype', '全日制', '0', 'q', '', '', ''), ('238', '0', 'WRZC_train_classtype', '周末班', '0', 'z', '', '', ''), ('237', '0', 'WRZC_train_classtype', '晚班', '0', 'w', '', '', ''), ('236', '0', 'WRZC_train_classtype', '白天班', '0', 'b', '', '', ''), ('235', '0', 'WRZC_train_classtype', '随到随学', '0', 's', '', '', ''), ('127', '0', 'WRZC_street', '建设南路', '0', 'j', '0', '', ''), ('128', '0', 'WRZC_street', '西羊市街', '0', 'x', '0', '', ''), ('129', '0', 'WRZC_street', '杏花岭街', '0', 'x', '0', '', ''), ('130', '0', 'WRZC_street', '长治路', '0', 'c', '0', '', ''), ('131', '0', 'WRZC_street', '解放路', '0', 'j', '0', '', ''), ('132', '0', 'WRZC_street', '太榆路', '0', 't', '0', '', ''), ('133', '0', 'WRZC_street', '晋祠路', '0', 'j', '0', '', ''), ('134', '0', 'WRZC_street', '桃园北路', '0', 't', '0', '', ''), ('135', '0', 'WRZC_street', '府西街', '0', 'f', '0', '', ''), ('136', '0', 'WRZC_street', '迎泽大街', '0', 'y', '0', '', ''), ('137', '0', 'WRZC_street', '水西关街', '0', 's', '0', '', ''), ('138', '0', 'WRZC_street', '柳巷', '0', 'l', '0', '', ''), ('139', '0', 'WRZC_street', '柳巷南路', '0', 'l', '0', '', ''), ('140', '0', 'WRZC_street', '东辑虎营', '0', 'd', '0', '', ''), ('141', '0', 'WRZC_street', '旱西关街', '0', 'h', '0', '', ''), ('142', '0', 'WRZC_street', '纯阳宫', '0', 'c', '0', '', ''), ('143', '0', 'WRZC_street', '并州南路', '0', 'b', '0', '', ''), ('144', '0', 'WRZC_street', '长风街', '0', 'c', '0', '', ''), ('145', '0', 'WRZC_jobtag', '环境好', '0', 'h', '0', '', ''), ('146', '0', 'WRZC_jobtag', '年终奖', '0', 'n', '0', '', ''), ('147', '0', 'WRZC_jobtag', '双休', '0', 's', '0', '', ''), ('148', '0', 'WRZC_jobtag', '五险一金', '0', 'w', '0', '', ''), ('149', '0', 'WRZC_jobtag', '加班费', '0', 'j', '0', '', ''), ('150', '0', 'WRZC_jobtag', '朝九晚五', '0', 'c', '0', '', ''), ('151', '0', 'WRZC_jobtag', '交通方便', '0', 'm', '0', '', ''), ('152', '0', 'WRZC_jobtag', '加班补助', '0', 's', '0', '', ''), ('153', '0', 'WRZC_jobtag', '包食宿', '0', 'b', '0', '', ''), ('154', '0', 'WRZC_jobtag', '管理规范', '0', 'g', '0', '', ''), ('155', '0', 'WRZC_jobtag', '有提成', '0', 'y', '0', '', ''), ('156', '0', 'WRZC_jobtag', '全勤奖', '0', 'q', '0', '', ''), ('157', '0', 'WRZC_jobtag', '有年假', '0', 'y', '0', '', ''), ('158', '0', 'WRZC_jobtag', '专车接送', '0', 'z', '0', '', ''), ('159', '0', 'WRZC_jobtag', '有补助', '0', 'y', '0', '', ''), ('160', '0', 'WRZC_jobtag', '晋升快', '0', 'j', '0', '', ''), ('161', '0', 'WRZC_jobtag', '车贴', '0', 'c', '0', '', ''), ('162', '0', 'WRZC_jobtag', '房贴', '0', 'f', '0', '', ''), ('163', '0', 'WRZC_jobtag', '压力小', '0', 'y', '0', '', ''), ('164', '0', 'WRZC_jobtag', '技术培训', '0', 'j', '0', '', ''), ('165', '0', 'WRZC_jobtag', '旅游', '0', 'l', '0', '', ''), ('166', '0', 'WRZC_resumetag', '形象好', '0', 'x', '0', '', ''), ('167', '0', 'WRZC_resumetag', '气质佳', '0', 'q', '0', '', ''), ('168', '0', 'WRZC_resumetag', '能出差', '0', 'n', '0', '', ''), ('169', '0', 'WRZC_resumetag', '很幽默', '0', 'h', '0', '', ''), ('170', '0', 'WRZC_resumetag', '技术精悍', '0', 'j', '0', '', ''), ('171', '0', 'WRZC_resumetag', '有亲和力', '0', 'y', '0', '', ''), ('172', '0', 'WRZC_resumetag', '高学历', '0', 's', '0', '', ''), ('173', '0', 'WRZC_resumetag', '经验丰富', '0', 'j', '0', '', ''), ('174', '0', 'WRZC_resumetag', '能加班', '0', 'n', '0', '', ''), ('175', '0', 'WRZC_resumetag', '海归', '0', 'h', '0', '', ''), ('176', '0', 'WRZC_resumetag', '会开车', '0', 'h', '0', '', ''), ('177', '0', 'WRZC_resumetag', '口才好', '0', 'k', '0', '', ''), ('178', '0', 'WRZC_resumetag', '声音甜美', '0', 's', '0', '', ''), ('179', '0', 'WRZC_resumetag', '会应酬', '0', 'h', '0', '', ''), ('180', '0', 'WRZC_resumetag', '诚实守信', '0', 'c', '0', '', ''), ('181', '0', 'WRZC_resumetag', '外语好', '0', 'w', '0', '', ''), ('182', '0', 'WRZC_resumetag', '性格开朗', '0', 'x', '0', '', ''), ('183', '0', 'WRZC_resumetag', '有上进心', '0', 'y', '0', '', ''), ('184', '0', 'WRZC_resumetag', '人脉广', '0', 'r', '0', '', ''), ('185', '0', 'WRZC_resumetag', '知识丰富', '0', 'z', '0', '', ''), ('186', '0', 'WRZC_resumetag', '才艺多', '0', 'c', '0', '', ''), ('187', '0', 'WRZC_train_category', '电脑', '0', '', '0', '', ''), ('188', '0', 'WRZC_train_category', '英语', '0', '', '0', '', ''), ('189', '0', 'WRZC_train_category', '文艺体育', '0', '', '0', '', ''), ('190', '0', 'WRZC_train_category', '就业技能', '0', '', '0', '', ''), ('191', '0', 'WRZC_train_category', '职业资格', '0', '', '0', '', ''), ('192', '0', 'WRZC_train_category', '企业管理', '0', '', '0', '', ''), ('193', '0', 'WRZC_train_category', '财会金融', '0', '', '0', '', ''), ('194', '0', 'WRZC_train_category', '学历教育', '0', '', '0', '', ''), ('195', '0', 'WRZC_train_category', '出国留学', '0', '', '0', '', ''), ('196', '0', 'WRZC_hunter_wage', '面议', '0', '', '0', '', ''), ('197', '0', 'WRZC_hunter_wage', '10-20万', '0', '', '0', '', ''), ('198', '0', 'WRZC_hunter_wage', '20-30万', '0', '', '0', '', ''), ('199', '0', 'WRZC_hunter_wage', '30-50万', '0', '', '0', '', ''), ('200', '0', 'WRZC_hunter_wage', '50-80万', '0', '', '0', '', ''), ('201', '0', 'WRZC_hunter_wage', '80-100万', '0', '', '0', '', ''), ('202', '0', 'WRZC_hunter_wage', '100万以上', '0', '', '0', '', ''), ('203', '0', 'WRZC_hunter_age', '18-25岁', '0', '', '0', '', ''), ('204', '0', 'WRZC_hunter_age', '25-30岁', '0', '', '0', '', ''), ('205', '0', 'WRZC_hunter_age', '30-40岁', '0', '', '0', '', ''), ('206', '0', 'WRZC_hunter_age', '40-50岁', '0', '', '0', '', ''), ('207', '0', 'WRZC_hunter_age', '50-60岁', '0', '', '0', '', ''), ('208', '0', 'WRZC_language', '普通话', '0', '', '0', '', ''), ('209', '0', 'WRZC_language', '粤语', '0', '', '0', '', ''), ('210', '0', 'WRZC_language', '英语', '0', '', '0', '', ''), ('211', '0', 'WRZC_language', '法语', '0', '', '0', '', ''), ('212', '0', 'WRZC_language', '日语', '0', '', '0', '', ''), ('213', '0', 'WRZC_language', '其他', '0', '', '0', '', ''), ('214', '0', 'WRZC_hunter_wage_structure', '基本薪资', '0', '', '0', '', ''), ('215', '0', 'WRZC_hunter_wage_structure', '奖金/提成', '0', '', '0', '', ''), ('216', '0', 'WRZC_hunter_wage_structure', '期权', '0', '', '0', '', ''), ('217', '0', 'WRZC_hunter_wage_structure', '其他', '0', '', '0', '', ''), ('218', '0', 'WRZC_hunter_socialbenefits', '国家标准', '0', '', '0', '', ''), ('219', '0', 'WRZC_hunter_socialbenefits', '商业保险', '0', '', '0', '', ''), ('220', '0', 'WRZC_hunter_socialbenefits', '其他', '0', '', '0', '', ''), ('221', '0', 'WRZC_hunter_livebenefits', '住房补贴', '0', '', '0', '', ''), ('222', '0', 'WRZC_hunter_livebenefits', '公司安排', '0', '', '0', '', ''), ('223', '0', 'WRZC_hunter_livebenefits', '公积金', '0', '', '0', '', ''), ('224', '0', 'WRZC_hunter_livebenefits', '其他', '0', '', '0', '', ''), ('225', '0', 'WRZC_hunter_annualleave', '国家标准', '0', '', '0', '', ''), ('226', '0', 'WRZC_hunter_annualleave', '其他', '0', '', '0', '', ''), ('227', '0', 'WRZC_hunter_rank', '寻访员(R)', '0', '', '0', '', ''), ('228', '0', 'WRZC_hunter_rank', '助理顾问(AC)', '0', '', '0', '', ''), ('229', '0', 'WRZC_hunter_rank', '顾问(C)', '0', '', '0', '', ''), ('230', '0', 'WRZC_hunter_rank', '资深顾问(SC)', '0', '', '0', '', ''), ('231', '0', 'WRZC_hunter_rank', '合伙人', '0', '', '0', '', ''), ('232', '0', 'WRZC_hunter_rank', '兼职猎头', '0', '', '0', '', ''), ('233', '0', 'WRZC_hunter_rank', '其他', '0', '', '0', '', ''), ('241', '0', 'WRZC_current', '我目前已离职，可快速到岗', '0', '', '', '', ''), ('242', '0', 'WRZC_current', '我目前在职，但考虑换个新环境', '0', '', '', '', ''), ('243', '0', 'WRZC_current', '观望有好的机会再考虑', '0', '', '', '', ''), ('244', '0', 'WRZC_current', '目前暂无跳槽打算', '0', '', '', '', ''), ('246', '0', 'WRZC_major', '计算机软件/硬件相关', '0', 'j', '', '', ''), ('247', '0', 'WRZC_major', '计算机系统/维修相关', '0', 'j', '', '', ''), ('248', '0', 'WRZC_major', '通信(设备/运营/服务)相关', '0', 't', '', '', ''), ('249', '0', 'WRZC_major', '互联网/电子商务相关', '0', 'h', '', '', ''), ('250', '0', 'WRZC_major', '网络游戏相关', '0', 'w', '', '', ''), ('251', '0', 'WRZC_major', '电子/半导体/集成电路相关', '0', 'd', '', '', ''), ('252', '0', 'WRZC_major', '仪器仪表/工业自动化相关', '0', 'y', '', '', ''), ('253', '0', 'WRZC_major', '会计/审计相关', '0', 'h', '', '', ''), ('254', '0', 'WRZC_major', '金融(投资/证券相关', '0', 'j', '', '', ''), ('255', '0', 'WRZC_major', '金融(银行/保险)相关', '0', 'j', '', '', ''), ('256', '0', 'WRZC_major', '贸易/进出口相关', '0', 'm', '', '', ''), ('257', '0', 'WRZC_major', '批发/零售相关', '0', 'p', '', '', ''), ('258', '0', 'WRZC_major', '消费品(食/饮/烟酒)相关', '0', 'x', '', '', ''), ('259', '0', 'WRZC_major', '服装/纺织/皮革相关', '0', 'f', '', '', ''), ('260', '0', 'WRZC_major', '家具/家电/工艺品/玩具相关', '0', 'j', '', '', ''), ('261', '0', 'WRZC_major', '办公用品及设备相关', '0', 'b', '', '', ''), ('262', '0', 'WRZC_major', '机械/设备/重工相关', '0', 'j', '', '', ''), ('263', '0', 'WRZC_major', '汽车/摩托车/零配件相关', '0', 'q', '', '', ''), ('264', '0', 'WRZC_major', '制药/生物工程相关', '0', 'z', '', '', ''), ('265', '0', 'WRZC_major', '医疗/美容/保健/卫生相关', '0', 'y', '', '', ''), ('266', '0', 'WRZC_major', '医疗设备/器械相关', '0', 'y', '', '', ''), ('267', '0', 'WRZC_major', '广告/市场推广相关', '0', 'g', '', '', ''), ('268', '0', 'WRZC_major', '会展/博览相关', '0', 'h', '', '', ''), ('269', '0', 'WRZC_major', '影视/媒体/艺术/出版相关', '0', 'y', '', '', ''), ('270', '0', 'WRZC_major', '印刷/包装/造纸相关', '0', 'y', '', '', ''), ('271', '0', 'WRZC_major', '房地产开发相关', '0', 'f', '', '', ''), ('272', '0', 'WRZC_major', '建筑与工程相关', '0', 'j', '', '', ''), ('273', '0', 'WRZC_major', '家居/室内设计/装潢相关', '0', 'j', '', '', ''), ('274', '0', 'WRZC_major', '物业管理/商业中心相关', '0', 'w', '', '', ''), ('275', '0', 'WRZC_major', '中介服务/家政服务相关', '0', 'z', '', '', ''), ('276', '0', 'WRZC_major', '专业服务/财会/法律相关', '0', 'z', '', '', ''), ('277', '0', 'WRZC_major', '检测/认证相关', '0', 'j', '', '', ''), ('278', '0', 'WRZC_major', '教育/培训相关', '0', 'j', '', '', ''), ('279', '0', 'WRZC_major', '学术/科研相关', '0', 'x', '', '', ''), ('280', '0', 'WRZC_major', '餐饮/娱乐/休闲相关', '0', 'c', '', '', ''), ('281', '0', 'WRZC_major', '酒店/旅游相关', '0', 'j', '', '', ''), ('282', '0', 'WRZC_major', '交通/运输/物流相关', '0', 'j', '', '', ''), ('283', '0', 'WRZC_major', '航天/航空相关', '0', 'h', '', '', ''), ('284', '0', 'WRZC_major', '能源(石油/化工/矿产)相关', '0', 'n', '', '', ''), ('285', '0', 'WRZC_major', '能源(采掘/冶炼/原材料)相关', '0', 'n', '', '', ''), ('286', '0', 'WRZC_major', '电力/水利/新能源相关', '0', 'd', '', '', ''), ('287', '0', 'WRZC_major', '政府部门/事业单位相关', '0', 'z', '', '', ''), ('288', '0', 'WRZC_major', '非盈利机构/行业协会相关', '0', 'f', '', '', ''), ('289', '0', 'WRZC_major', '农业/渔业/林业/牧业相关', '0', 'n', '', '', ''), ('290', '0', 'WRZC_major', '其他专业', '0', 'q', '', '', ''), ('291', '0', 'WRZC_language_level', '入门', '0', 'r', '', '', ''), ('292', '0', 'WRZC_language_level', '熟练', '0', 's', '', '', ''), ('293', '0', 'WRZC_language_level', '精通', '0', 'j', '', '', '');
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_company`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_company` VALUES ('10', '深圳宏泰创展信息科技有限公司', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '何先生', '13800138000', 'admin@163.com', '', '0', '0', '1486798119'), ('11', '江西南康人力有限公司', '高埗镇草墩村', '测试', '15814073940', 'admin@163.com', '', '0', '0', '1487038764'), ('12', '深圳指点科技有限公司', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '何先生', '13800138002', 'zrjobtest@163.com', '', '0', '0', '1487039720'), ('13', '飞利浦电动牙刷', '深圳福田区深南大道1006号', '测试', '13800138002', 'zrjobtest@163.com', '', '0', '0', '1487039820'), ('14', '成都分公司', '深圳福田区深南大道1006号', '肖', '13800138002', 'admin@163.com', '', '0', '0', '1487039875'), ('15', '重庆分公司', '重庆', '江先生', '13800138002', 'lanlibin23@163.com', '', '0', '0', '1487039904'), ('16', '东莞人力资源服务部', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '何先生', '15814073940', 'admin@163.com', '', '0', '0', '1487040056'), ('17', '佛山分公司', '深圳福田区深南大道1006号', '测试', '15814073940', 'admin@163.com', '', '0', '0', '1487040148'), ('18', '1', '1', '1', '1', '1', '1', '0', '1', '1488855667');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_contacts`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_contacts`;
CREATE TABLE `zroa_contacts` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `company_id` int(8) NOT NULL,
  `realname` varchar(60) NOT NULL,
  `sex` varchar(20) DEFAULT '0',
  `birthday` varchar(60) DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `qq` varchar(30) DEFAULT NULL,
  `webchat` varchar(30) DEFAULT NULL,
  `department` varchar(60) DEFAULT NULL,
  `job` varchar(60) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  `addtime` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_contacts`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_contacts` VALUES ('14', '16', '屈总', '男', '', '13800138000', '138001380001', null, '822561700@qq.com', '00000000', '90909090', null, '客服', null, '已经成交', '0', '0'), ('12', '16', '李总', '男', '', '13800138000', '88888888', null, '822561700@qq.com', '3636201360', 'wx888888', null, '客服', null, 'OK', '0', '0'), ('13', '16', '张总', '男', '', '13800138000', '13800138000', null, 'test@163.com', '999999', '99999', null, '经理', null, '放弃', '0', '0'), ('16', '16', '老江', '男', '', '13800138000', '13800138000', null, '822561700@qq.com', '888888', '1483021396', null, '老板', null, '能拍板', '0', '0'), ('17', '11', '你好', '男', '', '13800138000', '13800138000', null, 'test@163.com', '666666', '456456456456', null, '人', null, '456456456', '0', '0'), ('18', '17', '李元标', '男', '', '13800138000', '82368956', null, '822561700@qq.com', '349490156', 'webchat007', null, '经理', null, '直接联系人', '0', '0'), ('19', '17', '小李', '男', '2017-02-28', '13800138000', '13800138000', null, '822561700@qq.com', '89898989', '999999', null, '经理', null, '直接负责人', '0', '0'), ('20', '17', '王经理', '男', '2017-02-27', '13800138000', '13800138000', null, 'test@163.com', '00000000', '99999998', null, '经理', null, '客服部经理', '0', '0'), ('21', '17', 'd', '男', '2017-02-28', '13800138000', '13800138000', null, 'test@163.com', '99999', '9999', null, 'jjj', null, 'sfasdfasdf', '0', '0');
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
  `fax` varchar(60) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `qq` varchar(30) NOT NULL,
  `webchat` varchar(100) NOT NULL,
  `birday` varchar(60) NOT NULL,
  `province` int(8) NOT NULL,
  `province_cn` varchar(60) NOT NULL,
  `city` int(8) NOT NULL,
  `city_cn` varchar(60) NOT NULL,
  `address` varchar(255) NOT NULL,
  `industry` int(8) NOT NULL DEFAULT '0',
  `industry_cn` varchar(100) NOT NULL,
  `nature` int(8) NOT NULL DEFAULT '0',
  `nature_cn` varchar(200) NOT NULL,
  `scale` varchar(8) NOT NULL,
  `scale_cn` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  `examine` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否审核',
  `addtime` int(4) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态，1-审核通过，2-审核不通过',
  `content` varchar(200) NOT NULL COMMENT '审核说明',
  `s_uid` int(8) NOT NULL COMMENT '审核人',
  `s_time` int(4) NOT NULL COMMENT '审核时间',
  `c_type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '客户类型,1-新客户，2-重点客户,3-潜在客户，4-成交客户，5-无意向客户，6-黑名单客户',
  `xieyi` varchar(100) DEFAULT NULL,
  `zhizhao` varchar(100) DEFAULT NULL,
  `num_ex` int(8) NOT NULL DEFAULT '0' COMMENT '到场次数',
  `bus_line` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `type_id` int(4) NOT NULL DEFAULT '0',
  `n_v_time` int(4) NOT NULL,
  `l_v_time` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_customer`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_customer` VALUES ('9', '15', '10', '赵总', '深圳科技有限公司', '江先生', '13800138000', '', '', '', '', '', '20', '广东省', '328', '深圳市', '深圳福田区深南大道1006号', '1', '计算机软件/硬件', '47', '民营', '81', '20-99人', '深圳科技有限公司', '0', '0', '1488160548', '0', '', '0', '0', '1', '', null, '6', '', '', '0', '0', '0'), ('10', '16', '10', '流量公司', '深圳华高科技有限公司', '谢总', '88888999', '', '', '', '', '', '0', '', '0', '', '高埗镇草墩村', '0', '', '0', '', '', '', '后', '0', '0', '1486798759', '0', '', '0', '0', '2', '', null, '1', '', '', '0', '0', '0'), ('11', '15', '0', '赵总', '深圳前景在线广告有限公司', '何先生', '13800138000', '', '', '', '', '', '1', '北京市', '38', '宣武区', '深圳福田区深南大道1006号', '2', '计算机系统/维修', '47', '民营', '81', '20-99人', '', '0', '0', '1488861987', '0', '', '0', '0', '1', '', null, '0', '', '', '0', '0', '0'), ('12', '18', '10', '流量公司8', '众人', '测试', '88888999', '', '', '', '', '', '1', '北京市', '36', '西城区', '深圳福田区深南大道1006号', '1', '计算机软件/硬件', '47', '民营', '80', '20人以下', '', '0', '0', '1487905932', '0', '', '0', '0', '1', '', null, '0', '', '', '0', '0', '0'), ('13', '18', '0', '流量公司8', '深圳科技有限公司', '谢总', '13800138000', '', '', '', '', '', '0', '', '0', '', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '16', '办公用品及设备', '46', '国企', '', '', 'nature', '0', '0', '1487225520', '0', '', '0', '0', '1', '', null, '0', '', '', '0', '0', '0'), ('14', '19', '0', '南康分公司', '华高', '测试', '13800138000', '', '', '', '', '', '0', '', '0', '', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '18', '汽车/摩托车/零配件', '47', '民营', '82', '100', 'scale', '0', '0', '1487228402', '0', '', '0', '0', '1', '', null, '0', '', '', '0', '0', '0'), ('15', '19', '10', '南康分公司', '深圳科技有限公司9', '测试', '13800138000', '', '', '', '', '', '15', '江西省', '256', '赣州市', '广东省东莞市大岭山镇教育路1号“文化广场旁”', '19', '制药/生物工程', '47', '民营', '81', '20', '', '0', '0', '1487906066', '0', '', '0', '0', '1', '', null, '0', '', '', '0', '0', '0'), ('16', '15', '10', '赵总', '东莞家具有限公司', '测试', '88888999', '', '', '', '', '', '20', '广东省', '342', '东莞市', '深圳福田区深南大道1006号', '15', '家具/家电/工艺品/玩具', '47', '民营', '82', '100', '', '0', '0', '1487302933', '0', '', '0', '0', '2', '', null, '0', '', '', '0', '0', '0'), ('17', '15', '10', '赵总', '东莞人力资源服务部', '主任', '13800138000', '', '', '', '', '', '20', '广东省', '328', '深圳市', '东莞大岭山', '3', '通信(设备/运营/服务)', '47', '民营', '83', '500', '东莞人力资源服务部', '0', '0', '1488158878', '0', '', '0', '0', '2', '', null, '1', '', '', '0', '0', '0'), ('18', '18', '10', '流量公司8', '东莞人力资源服务部2', '主任', '13800138000', '', '', '', '', '', '1', '北京市', '37', '崇文区', '东莞大岭山', '3', '通信(设备/运营/服务)', '47', '民营', '82', '100-499人', '东莞人力资源服务部2', '0', '0', '1488160202', '0', '', '0', '0', '3', '', null, '0', '', '', '0', '0', '0'), ('19', '18', '10', '流量公司8', '东莞人力资源服务部24', '主任', '13800138000', '', '', '', '', '', '18', '湖北省', '310', '天门市', '东莞大岭山', '18', '汽车/摩托车/零配件', '53', '事业单位', '81', '20-99人', '重点企业', '0', '0', '1488266765', '0', '', '0', '0', '3', '', null, '0', '', '', '0', '0', '0'), ('20', '15', '10', '赵总', '1', '1', '1', '', '', '', '', '', '6', '山西省', '143', '阳泉市', '东莞大岭山', '17', '机械/设备/重工', '53', '事业单位', '83', '500-999人', '1111', '1', '0', '1488251715', '0', '', '0', '0', '4', '', null, '0', '', '', '0', '0', '0'), ('21', '15', '10', '赵总', '东莞人力资源服务部22', '主任', '13800138000', '', '', '', '', '', '16', '山东省', '263', '淄博市', '东莞大岭山', '14', '服装/纺织/皮革', '47', '民营', '82', '100-499人', 'ceshi', '0', '0', '1488271259', '0', '', '0', '0', '6', null, null, '0', '', '', '0', '1489334400', '1489334400'), ('22', '18', '10', '流量公司8', '华高d', '主任', '13800138000', '', '', '', '', '', '18', '湖北省', '309', '潜江市', '东莞大岭山', '15', '家具/家电/工艺品/玩具', '47', '民营', '82', '100-499人', 'asfsadf', '0', '0', '1488271345', '0', '', '0', '0', '3', null, null, '0', '', '', '0', '0', '0'), ('23', '18', '10', '流量公司8', '东莞人力资源服务部444', '蒋总', '13800138000', '', '', '', '', '', '18', '湖北省', '310', '天门市', '东莞大岭山', '0', '无', '54', '其它', '85', '10000人以上', '', '0', '0', '1489117387', '0', '', '0', '0', '1', '20170228164502.jpg', '20170228164502.jpg', '1', '1000', 'http://zr.51cnb.xin/weixin', '0', '0', '0'), ('24', '19', '10', '南康分公司', '东莞', '主任', '13800138000', '', '', '', '', '', '1', '北京市', '35', '东城区', '东莞大岭山', '17', '机械/设备/重工', '47', '民营', '81', '20-99人', '', '0', '0', '1489117846', '0', '', '0', '0', '0', '20170310115046.png', '20170310115046.png', '0', '1000', 'http://zr.51cnb.xin/weixin', '0', '0', '0'), ('25', '15', '10', '赵总', '东莞人力资源服务部23', '主任', '13800138000', '123456', '13924338594', '88888888', '565656', '2017-08-09', '18', '湖北省', '296', '黄石市', '东莞大岭山', '18', '汽车/摩托车/零配件', '46', '国企', '80', '20人以下', 'sdfsdfsdfsdfsdfsdfsdf', '0', '0', '1489379553', '0', '', '0', '0', '0', '20170313123044.png', '20170313123044.png', '0', '1000', 'http://zr.51cnb.xin/weixin', '0', '0', '0'), ('26', '15', '10', '赵总', '东莞2', '主任', '13800138000', '18038328593', '15814073940', '88888888', '808080', '2017-03-21', '20', '广东省', '342', '东莞市', '东莞大岭山', '18', '汽车/摩托车/零配件', '47', '民营', '82', '100-499人', '东莞大岭山东莞大岭山东莞大岭山东莞大岭山东莞大岭山', '0', '0', '1490059677', '0', '', '0', '0', '0', null, null, '0', '201', 'http://zr.51cnb.xin/weixin', '0', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_district`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_district`;
CREATE TABLE `zroa_district` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `categoryname` varchar(30) NOT NULL,
  `category_order` smallint(5) unsigned NOT NULL DEFAULT '0',
  `stat_jobs` varchar(15) NOT NULL,
  `stat_resume` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=538 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Records of `zroa_district`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_district` VALUES ('1', '0', '北京市', '0', '', ''), ('2', '0', '上海市', '0', '', ''), ('3', '0', '天津市', '0', '', ''), ('4', '0', '重庆市', '0', '', ''), ('5', '0', '河北省', '0', '', ''), ('6', '0', '山西省', '0', '', ''), ('7', '0', '内蒙古', '0', '', ''), ('8', '0', '辽宁省', '0', '', ''), ('9', '0', '吉林省', '0', '', ''), ('10', '0', '黑龙江省', '0', '', ''), ('11', '0', '江苏省', '0', '', ''), ('12', '0', '浙江省', '0', '', ''), ('13', '0', '安徽省', '0', '', ''), ('14', '0', '福建省', '0', '', ''), ('15', '0', '江西省', '0', '', ''), ('16', '0', '山东省', '0', '', ''), ('17', '0', '河南省', '0', '', ''), ('18', '0', '湖北省', '0', '', ''), ('19', '0', '湖南省', '0', '', ''), ('20', '0', '广东省', '0', '', ''), ('21', '0', '广西', '0', '', ''), ('22', '0', '海南省', '0', '', ''), ('23', '0', '四川省', '0', '', ''), ('24', '0', '贵州省', '0', '', ''), ('25', '0', '云南省', '0', '', ''), ('26', '0', '西藏', '0', '', ''), ('27', '0', '陕西省', '0', '', ''), ('28', '0', '甘肃省', '0', '', ''), ('29', '0', '青海省', '0', '', ''), ('30', '0', '宁夏', '0', '', ''), ('31', '0', '新疆', '0', '', ''), ('32', '0', '台湾省', '0', '', ''), ('33', '0', '香港', '0', '', ''), ('34', '0', '澳门', '0', '', ''), ('35', '1', '东城区', '0', '', ''), ('36', '1', '西城区', '0', '', ''), ('37', '1', '崇文区', '0', '', ''), ('38', '1', '宣武区', '0', '', ''), ('39', '1', '朝阳区', '0', '', ''), ('40', '1', '丰台区', '0', '', ''), ('41', '1', '石景山区', '0', '', ''), ('42', '1', '海淀区', '0', '', ''), ('43', '1', '门头沟区', '0', '', ''), ('44', '1', '房山区', '0', '', ''), ('45', '1', '通州区', '0', '', ''), ('46', '1', '顺义区', '0', '', ''), ('47', '1', '昌平区', '0', '', ''), ('48', '1', '大兴区', '0', '', ''), ('49', '1', '怀柔区', '0', '', ''), ('50', '1', '平谷区', '0', '', ''), ('51', '1', '密云县', '0', '', ''), ('52', '1', '延庆县', '0', '', ''), ('53', '2', '黄浦区', '0', '', ''), ('54', '2', '卢湾区', '0', '', ''), ('55', '2', '徐汇区', '0', '', ''), ('56', '2', '长宁区', '0', '', ''), ('57', '2', '静安区', '0', '', ''), ('58', '2', '普陀区', '0', '', ''), ('59', '2', '闸北区', '0', '', ''), ('60', '2', '虹口区', '0', '', ''), ('61', '2', '杨浦区', '0', '', ''), ('62', '2', '闵行区', '0', '', ''), ('63', '2', '宝山区', '0', '', ''), ('64', '2', '嘉定区', '0', '', ''), ('65', '2', '浦东新区', '0', '', ''), ('66', '2', '金山区', '0', '', ''), ('67', '2', '松江区', '0', '', ''), ('68', '2', '青浦区', '0', '', ''), ('69', '2', '南汇区', '0', '', ''), ('70', '2', '奉贤区', '0', '', ''), ('71', '2', '崇明县', '0', '', ''), ('72', '3', '和平区', '0', '', ''), ('73', '3', '河东区', '0', '', ''), ('74', '3', '河西区', '0', '', ''), ('75', '3', '南开区', '0', '', ''), ('76', '3', '河北区', '0', '', ''), ('77', '3', '红桥区', '0', '', ''), ('78', '3', '塘沽区', '0', '', ''), ('79', '3', '汉沽区', '0', '', ''), ('80', '3', '大港区', '0', '', ''), ('81', '3', '东丽区', '0', '', ''), ('82', '3', '西青区', '0', '', ''), ('83', '3', '津南区', '0', '', ''), ('84', '3', '北辰区', '0', '', ''), ('85', '3', '武清区', '0', '', ''), ('86', '3', '宝坻区', '0', '', ''), ('87', '3', '宁河县', '0', '', ''), ('88', '3', '静海县', '0', '', ''), ('89', '3', '蓟县', '0', '', ''), ('90', '4', '万州区', '0', '', ''), ('91', '4', '涪陵区', '0', '', ''), ('92', '4', '渝中区', '0', '', ''), ('93', '4', '大渡口区', '0', '', ''), ('94', '4', '江北区', '0', '', ''), ('95', '4', '沙坪坝区', '0', '', ''), ('96', '4', '九龙坡区', '0', '', ''), ('97', '4', '南岸区', '0', '', ''), ('98', '4', '北碚区', '0', '', ''), ('99', '4', '万盛区', '0', '', ''), ('100', '4', '双桥区', '0', '', ''), ('101', '4', '渝北区', '0', '', ''), ('102', '4', '巴南区', '0', '', ''), ('103', '4', '黔江区', '0', '', ''), ('104', '4', '长寿区', '0', '', ''), ('105', '4', '綦江县', '0', '', ''), ('106', '4', '潼南县', '0', '', ''), ('107', '4', '铜梁县', '0', '', ''), ('108', '4', '大足县', '0', '', ''), ('109', '4', '荣昌县', '0', '', ''), ('110', '4', '璧山县', '0', '', ''), ('111', '4', '梁平县', '0', '', ''), ('112', '4', '城口县', '0', '', ''), ('113', '4', '丰都县', '0', '', ''), ('114', '4', '垫江县', '0', '', ''), ('115', '4', '武隆县', '0', '', ''), ('116', '4', '忠县', '0', '', ''), ('117', '4', '开县', '0', '', ''), ('118', '4', '云阳县', '0', '', ''), ('119', '4', '奉节县', '0', '', ''), ('120', '4', '巫山县', '0', '', ''), ('121', '4', '巫溪县', '0', '', ''), ('122', '4', '石柱', '0', '', ''), ('123', '4', '秀山', '0', '', ''), ('124', '4', '酉阳', '0', '', ''), ('125', '4', '彭水', '0', '', ''), ('126', '4', '江津市', '0', '', ''), ('127', '4', '合川市', '0', '', ''), ('128', '4', '永川市', '0', '', ''), ('129', '4', '南川市', '0', '', ''), ('130', '5', '石家庄市', '0', '', ''), ('131', '5', '唐山市', '0', '', ''), ('132', '5', '秦皇岛市', '0', '', ''), ('133', '5', '邯郸市', '0', '', ''), ('134', '5', '邢台市', '0', '', ''), ('135', '5', '保定市', '0', '', ''), ('136', '5', '张家口市', '0', '', ''), ('137', '5', '承德市', '0', '', ''), ('138', '5', '沧州市', '0', '', ''), ('139', '5', '廊坊市', '0', '', ''), ('140', '5', '衡水市', '0', '', ''), ('141', '6', '太原市', '0', '', ''), ('142', '6', '大同市', '0', '', ''), ('143', '6', '阳泉市', '0', '', ''), ('144', '6', '长治市', '0', '', ''), ('145', '6', '晋城市', '0', '', ''), ('146', '6', '朔州市', '0', '', ''), ('147', '6', '晋中市', '0', '', ''), ('148', '6', '运城市', '0', '', ''), ('149', '6', '忻州市', '0', '', ''), ('150', '6', '临汾市', '0', '', ''), ('151', '6', '吕梁市', '0', '', ''), ('152', '7', '呼和浩特市', '0', '', ''), ('153', '7', '包头市', '0', '', ''), ('154', '7', '乌海市', '0', '', ''), ('155', '7', '赤峰市', '0', '', ''), ('156', '7', '通辽市', '0', '', ''), ('157', '7', '鄂尔多斯市', '0', '', ''), ('158', '7', '呼伦贝尔市', '0', '', ''), ('159', '7', '巴彦淖尔市', '0', '', ''), ('160', '7', '乌兰察布市', '0', '', ''), ('161', '7', '兴安盟', '0', '', ''), ('162', '7', '锡林郭勒盟', '0', '', ''), ('163', '7', '阿拉善盟', '0', '', ''), ('164', '8', '沈阳市', '0', '', ''), ('165', '8', '大连市', '0', '', ''), ('166', '8', '鞍山市', '0', '', ''), ('167', '8', '抚顺市', '0', '', ''), ('168', '8', '本溪市', '0', '', ''), ('169', '8', '丹东市', '0', '', ''), ('170', '8', '锦州市', '0', '', ''), ('171', '8', '营口市', '0', '', ''), ('172', '8', '阜新市', '0', '', ''), ('173', '8', '辽阳市', '0', '', ''), ('174', '8', '盘锦市', '0', '', ''), ('175', '8', '铁岭市', '0', '', ''), ('176', '8', '朝阳市', '0', '', ''), ('177', '8', '葫芦岛市', '0', '', ''), ('178', '9', '长春市', '0', '', ''), ('179', '9', '吉林市', '0', '', ''), ('180', '9', '四平市', '0', '', ''), ('181', '9', '辽源市', '0', '', ''), ('182', '9', '通化市', '0', '', ''), ('183', '9', '白山市', '0', '', ''), ('184', '9', '松原市', '0', '', ''), ('185', '9', '白城市', '0', '', ''), ('186', '9', '延边市', '0', '', ''), ('187', '10', '哈尔滨市', '0', '', ''), ('188', '10', '齐齐哈尔市', '0', '', ''), ('189', '10', '鸡西市', '0', '', ''), ('190', '10', '鹤岗市', '0', '', ''), ('191', '10', '双鸭山市', '0', '', ''), ('192', '10', '大庆市', '0', '', ''), ('193', '10', '伊春市', '0', '', ''), ('194', '10', '佳木斯市', '0', '', ''), ('195', '10', '七台河市', '0', '', ''), ('196', '10', '牡丹江市', '0', '', ''), ('197', '10', '黑河市', '0', '', ''), ('198', '10', '绥化市', '0', '', ''), ('199', '10', '大兴安岭', '0', '', ''), ('200', '11', '南京市', '0', '', ''), ('201', '11', '无锡市', '0', '', ''), ('202', '11', '徐州市', '0', '', ''), ('203', '11', '常州市', '0', '', ''), ('204', '11', '苏州市', '0', '', ''), ('205', '11', '南通市', '0', '', ''), ('206', '11', '连云港市', '0', '', ''), ('207', '11', '淮安市', '0', '', ''), ('208', '11', '盐城市', '0', '', ''), ('209', '11', '扬州市', '0', '', ''), ('210', '11', '镇江市', '0', '', ''), ('211', '11', '泰州市', '0', '', ''), ('212', '11', '宿迁市', '0', '', ''), ('213', '12', '杭州市', '0', '', ''), ('214', '12', '宁波市', '0', '', ''), ('215', '12', '温州市', '0', '', ''), ('216', '12', '嘉兴市', '0', '', ''), ('217', '12', '湖州市', '0', '', ''), ('218', '12', '绍兴市', '0', '', ''), ('219', '12', '金华市', '0', '', ''), ('220', '12', '衢州市', '0', '', ''), ('221', '12', '舟山市', '0', '', ''), ('222', '12', '台州市', '0', '', ''), ('223', '12', '丽水市', '0', '', ''), ('224', '13', '合肥市', '0', '', ''), ('225', '13', '芜湖市', '0', '', ''), ('226', '13', '蚌埠市', '0', '', ''), ('227', '13', '淮南市', '0', '', ''), ('228', '13', '马鞍山市', '0', '', ''), ('229', '13', '淮北市', '0', '', ''), ('230', '13', '铜陵市', '0', '', ''), ('231', '13', '安庆市', '0', '', ''), ('232', '13', '黄山市', '0', '', ''), ('233', '13', '滁州市', '0', '', ''), ('234', '13', '阜阳市', '0', '', ''), ('235', '13', '宿州市', '0', '', ''), ('236', '13', '巢湖市', '0', '', ''), ('237', '13', '六安市', '0', '', ''), ('238', '13', '亳州市', '0', '', ''), ('239', '13', '池州市', '0', '', ''), ('240', '13', '宣城市', '0', '', ''), ('241', '14', '福州市', '0', '', ''), ('242', '14', '厦门市', '0', '', ''), ('243', '14', '莆田市', '0', '', ''), ('244', '14', '三明市', '0', '', ''), ('245', '14', '泉州市', '0', '', ''), ('246', '14', '漳州市', '0', '', ''), ('247', '14', '南平市', '0', '', ''), ('248', '14', '龙岩市', '0', '', ''), ('249', '14', '宁德市', '0', '', ''), ('250', '15', '南昌市', '0', '', ''), ('251', '15', '景德镇市', '0', '', ''), ('252', '15', '萍乡市', '0', '', ''), ('253', '15', '九江市', '0', '', ''), ('254', '15', '新余市', '0', '', ''), ('255', '15', '鹰潭市', '0', '', ''), ('256', '15', '赣州市', '0', '', ''), ('257', '15', '吉安市', '0', '', ''), ('258', '15', '宜春市', '0', '', ''), ('259', '15', '抚州市', '0', '', ''), ('260', '15', '上饶市', '0', '', ''), ('261', '16', '济南市', '0', '', ''), ('262', '16', '青岛市', '0', '', ''), ('263', '16', '淄博市', '0', '', ''), ('264', '16', '枣庄市', '0', '', ''), ('265', '16', '东营市', '0', '', ''), ('266', '16', '烟台市', '0', '', ''), ('267', '16', '潍坊市', '0', '', ''), ('268', '16', '济宁市', '0', '', ''), ('269', '16', '泰安市', '0', '', ''), ('270', '16', '威海市', '0', '', ''), ('271', '16', '日照市', '0', '', ''), ('272', '16', '莱芜市', '0', '', ''), ('273', '16', '临沂市', '0', '', ''), ('274', '16', '德州市', '0', '', ''), ('275', '16', '聊城市', '0', '', ''), ('276', '16', '滨州市', '0', '', ''), ('277', '16', '荷泽市', '0', '', ''), ('278', '17', '郑州市', '0', '', ''), ('279', '17', '开封市', '0', '', ''), ('280', '17', '洛阳市', '0', '', ''), ('281', '17', '平顶山市', '0', '', ''), ('282', '17', '安阳市', '0', '', ''), ('283', '17', '鹤壁市', '0', '', ''), ('284', '17', '新乡市', '0', '', ''), ('285', '17', '焦作市', '0', '', ''), ('286', '17', '濮阳市', '0', '', ''), ('287', '17', '许昌市', '0', '', ''), ('288', '17', '漯河市', '0', '', ''), ('289', '17', '三门峡市', '0', '', ''), ('290', '17', '南阳市', '0', '', ''), ('291', '17', '商丘市', '0', '', ''), ('292', '17', '信阳市', '0', '', ''), ('293', '17', '周口市', '0', '', ''), ('294', '17', '驻马店市', '0', '', ''), ('295', '18', '武汉市', '0', '', ''), ('296', '18', '黄石市', '0', '', ''), ('297', '18', '十堰市', '0', '', ''), ('298', '18', '宜昌市', '0', '', ''), ('299', '18', '襄樊市', '0', '', ''), ('300', '18', '鄂州市', '0', '', ''), ('301', '18', '荆门市', '0', '', ''), ('302', '18', '孝感市', '0', '', ''), ('303', '18', '荆州市', '0', '', ''), ('304', '18', '黄冈市', '0', '', ''), ('305', '18', '咸宁市', '0', '', ''), ('306', '18', '随州市', '0', '', ''), ('307', '18', '恩施市', '0', '', ''), ('308', '18', '仙桃市', '0', '', ''), ('309', '18', '潜江市', '0', '', ''), ('310', '18', '天门市', '0', '', ''), ('311', '18', '神农架林区', '0', '', ''), ('312', '19', '长沙市', '0', '', ''), ('313', '19', '株洲市', '0', '', ''), ('314', '19', '湘潭市', '0', '', ''), ('315', '19', '衡阳市', '0', '', ''), ('316', '19', '邵阳市', '0', '', ''), ('317', '19', '岳阳市', '0', '', ''), ('318', '19', '常德市', '0', '', ''), ('319', '19', '张家界市', '0', '', ''), ('320', '19', '益阳市', '0', '', ''), ('321', '19', '郴州市', '0', '', ''), ('322', '19', '永州市', '0', '', ''), ('323', '19', '怀化市', '0', '', ''), ('324', '19', '娄底市', '0', '', ''), ('325', '19', '湘西', '0', '', ''), ('326', '20', '广州市', '0', '', ''), ('327', '20', '韶关市', '0', '', ''), ('328', '20', '深圳市', '0', '', ''), ('329', '20', '珠海市', '0', '', ''), ('330', '20', '汕头市', '0', '', ''), ('331', '20', '佛山市', '0', '', ''), ('332', '20', '江门市', '0', '', ''), ('333', '20', '湛江市', '0', '', ''), ('334', '20', '茂名市', '0', '', ''), ('335', '20', '肇庆市', '0', '', ''), ('336', '20', '惠州市', '0', '', ''), ('337', '20', '梅州市', '0', '', ''), ('338', '20', '汕尾市', '0', '', ''), ('339', '20', '河源市', '0', '', ''), ('340', '20', '阳江市', '0', '', ''), ('341', '20', '清远市', '0', '', ''), ('342', '20', '东莞市', '0', '', ''), ('343', '20', '中山市', '0', '', ''), ('344', '20', '潮州市', '0', '', ''), ('345', '20', '揭阳市', '0', '', ''), ('346', '20', '云浮市', '0', '', ''), ('347', '21', '南宁市', '0', '', ''), ('348', '21', '柳州市', '0', '', ''), ('349', '21', '桂林市', '0', '', ''), ('350', '21', '梧州市', '0', '', ''), ('351', '21', '北海市', '0', '', ''), ('352', '21', '防城港市', '0', '', ''), ('353', '21', '钦州市', '0', '', ''), ('354', '21', '贵港市', '0', '', ''), ('355', '21', '玉林市', '0', '', ''), ('356', '21', '百色市', '0', '', ''), ('357', '21', '贺州市', '0', '', ''), ('358', '21', '河池市', '0', '', ''), ('359', '21', '来宾市', '0', '', ''), ('360', '21', '崇左市', '0', '', ''), ('361', '22', '海口市', '0', '', ''), ('362', '22', '三亚市', '0', '', ''), ('363', '22', '五指山市', '0', '', ''), ('364', '22', '琼海市', '0', '', ''), ('365', '22', '儋州市', '0', '', ''), ('366', '22', '文昌市', '0', '', ''), ('367', '22', '万宁市', '0', '', ''), ('368', '22', '东方市', '0', '', ''), ('369', '22', '定安县', '0', '', ''), ('370', '22', '屯昌县', '0', '', ''), ('371', '22', '澄迈县', '0', '', ''), ('372', '22', '临高县', '0', '', ''), ('373', '22', '白沙', '0', '', ''), ('374', '22', '昌江', '0', '', ''), ('375', '22', '乐东', '0', '', ''), ('376', '22', '陵水', '0', '', ''), ('377', '22', '保亭', '0', '', ''), ('378', '22', '琼中', '0', '', ''), ('379', '22', '西沙群岛', '0', '', ''), ('380', '22', '南沙群岛', '0', '', ''), ('381', '22', '中沙群岛', '0', '', ''), ('382', '23', '成都市', '0', '', ''), ('383', '23', '自贡市', '0', '', ''), ('384', '23', '攀枝花市', '0', '', ''), ('385', '23', '泸州市', '0', '', ''), ('386', '23', '德阳市', '0', '', ''), ('387', '23', '绵阳市', '0', '', ''), ('388', '23', '广元市', '0', '', ''), ('389', '23', '遂宁市', '0', '', ''), ('390', '23', '内江市', '0', '', ''), ('391', '23', '乐山市', '0', '', ''), ('392', '23', '南充市', '0', '', ''), ('393', '23', '眉山市', '0', '', ''), ('394', '23', '宜宾市', '0', '', ''), ('395', '23', '广安市', '0', '', ''), ('396', '23', '达州市', '0', '', ''), ('397', '23', '雅安市', '0', '', ''), ('398', '23', '巴中市', '0', '', ''), ('399', '23', '资阳市', '0', '', ''), ('400', '23', '阿坝', '0', '', ''), ('401', '23', '甘孜', '0', '', ''), ('402', '23', '凉山', '0', '', ''), ('403', '24', '贵阳市', '0', '', ''), ('404', '24', '六盘水市', '0', '', ''), ('405', '24', '遵义市', '0', '', ''), ('406', '24', '安顺市', '0', '', ''), ('407', '24', '铜仁地区', '0', '', ''), ('408', '24', '黔西南州', '0', '', ''), ('409', '24', '毕节地区', '0', '', ''), ('410', '24', '黔东南州', '0', '', ''), ('411', '24', '黔南州', '0', '', ''), ('412', '25', '昆明市', '0', '', ''), ('413', '25', '曲靖市', '0', '', ''), ('414', '25', '玉溪市', '0', '', ''), ('415', '25', '保山市', '0', '', ''), ('416', '25', '昭通市', '0', '', ''), ('417', '25', '丽江市', '0', '', ''), ('418', '25', '思茅市', '0', '', ''), ('419', '25', '临沧市', '0', '', ''), ('420', '25', '楚雄', '0', '', ''), ('421', '25', '红河州', '0', '', ''), ('422', '25', '文山州', '0', '', ''), ('423', '25', '西双版纳州', '0', '', ''), ('424', '25', '大理州', '0', '', ''), ('425', '25', '德宏州', '0', '', ''), ('426', '25', '怒江州', '0', '', ''), ('427', '25', '迪庆州', '0', '', ''), ('428', '26', '拉萨市', '0', '', ''), ('429', '26', '昌都地区', '0', '', ''), ('430', '26', '山南地区', '0', '', ''), ('431', '26', '日喀则地区', '0', '', ''), ('432', '26', '那曲地区', '0', '', ''), ('433', '26', '阿里地区', '0', '', ''), ('434', '26', '林芝地区', '0', '', ''), ('435', '27', '西安市', '0', '', ''), ('436', '27', '铜川市', '0', '', ''), ('437', '27', '宝鸡市', '0', '', ''), ('438', '27', '咸阳市', '0', '', ''), ('439', '27', '渭南市', '0', '', ''), ('440', '27', '延安市', '0', '', ''), ('441', '27', '汉中市', '0', '', ''), ('442', '27', '榆林市', '0', '', ''), ('443', '27', '安康市', '0', '', ''), ('444', '27', '商洛市', '0', '', ''), ('445', '28', '兰州市', '0', '', ''), ('446', '28', '嘉峪关市', '0', '', ''), ('447', '28', '金昌市', '0', '', ''), ('448', '28', '白银市', '0', '', ''), ('449', '28', '天水市', '0', '', ''), ('450', '28', '武威市', '0', '', ''), ('451', '28', '张掖市', '0', '', ''), ('452', '28', '平凉市', '0', '', ''), ('453', '28', '酒泉市', '0', '', ''), ('454', '28', '庆阳市', '0', '', ''), ('455', '28', '定西市', '0', '', ''), ('456', '28', '陇南市', '0', '', ''), ('457', '28', '临夏', '0', '', ''), ('458', '28', '甘南', '0', '', ''), ('459', '29', '西宁市', '0', '', ''), ('460', '29', '海东地区', '0', '', ''), ('461', '29', '海北州', '0', '', ''), ('462', '29', '黄南州', '0', '', ''), ('463', '29', '海南州', '0', '', ''), ('464', '29', '果洛州', '0', '', ''), ('465', '29', '玉树州', '0', '', ''), ('466', '29', '海西州', '0', '', ''), ('467', '30', '银川市', '0', '', ''), ('468', '30', '石嘴山市', '0', '', ''), ('469', '30', '吴忠市', '0', '', ''), ('470', '30', '固原市', '0', '', ''), ('471', '30', '中卫市', '0', '', ''), ('472', '31', '乌鲁木齐市', '0', '', ''), ('473', '31', '克拉玛依市', '0', '', ''), ('474', '31', '吐鲁番地区', '0', '', ''), ('475', '31', '哈密地区', '0', '', ''), ('476', '31', '昌吉州', '0', '', ''), ('477', '31', '博州', '0', '', ''), ('478', '31', '巴州', '0', '', ''), ('479', '31', '阿克苏地区', '0', '', ''), ('480', '31', '克州', '0', '', ''), ('481', '31', '喀什地区', '0', '', ''), ('482', '31', '和田地区', '0', '', ''), ('483', '31', '伊犁州', '0', '', ''), ('484', '31', '塔城地区', '0', '', ''), ('485', '31', '阿勒泰地区', '0', '', ''), ('486', '31', '石河子市', '0', '', ''), ('487', '31', '阿拉尔市', '0', '', ''), ('488', '31', '图木舒克市', '0', '', ''), ('489', '31', '五家渠市', '0', '', ''), ('490', '32', '台北市', '0', '', ''), ('491', '32', '高雄市', '0', '', ''), ('492', '32', '基隆市', '0', '', ''), ('493', '32', '新竹市', '0', '', ''), ('494', '32', '台中市', '0', '', ''), ('495', '32', '嘉义市', '0', '', ''), ('496', '32', '台南市', '0', '', ''), ('497', '32', '台北县', '0', '', ''), ('498', '32', '桃园县', '0', '', ''), ('499', '32', '新竹县', '0', '', ''), ('500', '32', '苗栗县', '0', '', ''), ('501', '32', '台中县', '0', '', ''), ('502', '32', '彰化县', '0', '', ''), ('503', '32', '南投县', '0', '', ''), ('504', '32', '云林县', '0', '', ''), ('505', '32', '嘉义县', '0', '', ''), ('506', '32', '台南县', '0', '', ''), ('507', '32', '高雄县', '0', '', ''), ('508', '32', '屏东县', '0', '', ''), ('509', '32', '宜兰县', '0', '', ''), ('510', '32', '花莲县', '0', '', ''), ('511', '32', '台东县', '0', '', ''), ('512', '32', '澎湖县', '0', '', ''), ('513', '32', '金门县', '0', '', ''), ('514', '32', '连江县', '0', '', ''), ('515', '33', '中西区', '0', '', ''), ('516', '33', '东区', '0', '', ''), ('517', '33', '南区', '0', '', ''), ('518', '33', '湾仔区', '0', '', ''), ('519', '33', '九龙城区', '0', '', ''), ('520', '33', '观塘区', '0', '', ''), ('521', '33', '深水埗区', '0', '', ''), ('522', '33', '黄大仙区', '0', '', ''), ('523', '33', '油尖旺区', '0', '', ''), ('524', '33', '离岛区', '0', '', ''), ('525', '33', '葵青区', '0', '', ''), ('526', '33', '北区', '0', '', ''), ('527', '33', '西贡区', '0', '', ''), ('528', '33', '沙田区', '0', '', ''), ('529', '33', '大埔区', '0', '', ''), ('530', '33', '荃湾区', '0', '', ''), ('531', '33', '屯门区', '0', '', ''), ('532', '33', '元朗区', '0', '', ''), ('533', '34', '花地玛堂区', '0', '', ''), ('534', '34', '圣安多尼堂区', '0', '', ''), ('535', '34', '大堂区', '0', '', ''), ('536', '34', '望德堂区', '0', '', ''), ('537', '34', '风顺堂区', '0', '', '');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_exhibition`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_exhibition`;
CREATE TABLE `zroa_exhibition` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `company_id` int(8) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `ex_name` varchar(200) NOT NULL,
  `rank` int(4) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_exhibition`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_exhibition` VALUES ('7', '10', '深圳宏泰创展信息科技有限公司', 'D-6', '0', '', '0'), ('8', '10', '深圳宏泰创展信息科技有限公司', 'D-60', '0', 'D-60', '0'), ('9', '10', '深圳宏泰创展信息科技有限公司', 'D-60', '0', 'D-60', '0');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_jobs`;
CREATE TABLE `zroa_jobs` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `company_id` int(8) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `jobs_name` varchar(100) NOT NULL,
  `sex` int(2) NOT NULL DEFAULT '0',
  `sex_cn` varchar(10) NOT NULL,
  `nature` int(8) NOT NULL DEFAULT '0',
  `nature_cn` varchar(40) NOT NULL,
  `education` int(8) NOT NULL DEFAULT '0',
  `education_cn` varchar(60) NOT NULL,
  `age` int(8) NOT NULL,
  `age_cn` varchar(60) NOT NULL,
  `experience` int(8) NOT NULL DEFAULT '0',
  `experience_cn` varchar(100) NOT NULL,
  `province` int(8) NOT NULL,
  `province_cn` varchar(60) NOT NULL,
  `city` int(8) NOT NULL,
  `city_cn` varchar(60) NOT NULL,
  `wage` int(8) NOT NULL,
  `wage_cn` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `contacts` varchar(60) NOT NULL,
  `tel` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `content` text NOT NULL,
  `addtime` int(4) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_jobs`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_jobs` VALUES ('6', '10', '深圳宏泰创展信息科技有限公司', '技术总监', '3', '不限', '0', '', '65', '初中', '203', '18-25岁', '75', '1年以下', '20', '广东省', '326', '广州市', '57', '1500~2000元/月', '', '主任', '13800138000', '822561700@qq.com', '13800138000', '1487648899', '0'), ('7', '10', '深圳宏泰创展信息科技有限公司', '木工', '1', '男', '0', '', '69', '大专', '205', '30-40岁', '77', '3-5年', '20', '广东省', '327', '韶关市', '60', '5000~10000元/月', '', '主任', '13800138000', '822561700@qq.com', '822561700@qq.com', '1487649157', '0'), ('8', '10', '深圳宏泰创展信息科技有限公司', '技术总监4', '3', '不限', '0', '', '65', '初中', '203', '18-25岁', '78', '5-10年', '20', '广东省', '328', '深圳市', '60', '5000~10000元/月', '', '主任', '13800138000', '822561700@qq.com', '能吃苦耐劳', '1487760410', '0'), ('9', '16', '东莞家具有限公司', '木工', '3', '不限', '0', '', '71', '硕士', '204', '25-30岁', '78', '5-10年', '4', '重庆市', '90', '万州区', '60', '5000~10000元/月', '', '主任', '13800138000', '822561700@qq.com', '职位描述职位描述职位描述职位描述dsfgsdgsd', '1487816399', '0'), ('10', '15', '深圳科技有限公司9', '技术总监', '3', '不限', '0', '', '70', '本科', '205', '30-40岁', '77', '3-5年', '20', '广东省', '328', '深圳市', '58', '2000~3000元/月', '', '主任', '13800138000', '822561700@qq.com', '职位描述职位描述职位描述职位描述职位描述职位描述职位描述职位描述职位描述职位描述职位描述', '1487816620', '0'), ('11', '16', '东莞家具有限公司', '技术总监', '3', '不限', '0', '', '0', '不限', '0', '不限', '0', '不限', '20', '广东省', '326', '广州市', '0', '不限', '', '主任', '13800138000', '822561700@qq.com', '$data[\'company_id\']$data[\'company_id\']$data[\'company_id\']$data[\'company_id\']$data[\'company_id\']', '1487820807', '0'), ('12', '16', '东莞家具有限公司', '技术总监7', '3', '不限', '0', '', '0', '不限', '0', '不限', '0', '不限', '3', '天津市', '76', '河北区', '0', '不限', '', '主任', '13800138000', '822561700@qq.com', 'dgdgdsgsdgfsdgsdgsdgdfg', '1487821049', '0'), ('13', '16', '东莞家具有限公司', '技术总监4', '3', '不限', '0', '', '66', '高中', '0', '不限', '0', '不限', '4', '重庆市', '95', '沙坪坝区', '0', '不限', '', '主任', '13800138000', '822561700@qq.com', '我哦IPIPIP熊皮哦 ', '1487821162', '0'), ('14', '16', '东莞家具有限公司', '技术总监49', '3', '不限', '0', '', '0', '不限', '0', '不限', '0', '不限', '2', '上海市', '56', '长宁区', '0', '不限', '', '主任', '13800138000', 'test@163.com', '99999999', '1487821287', '0'), ('15', '16', '东莞家具有限公司', '技术总监70', '3', '不限', '0', '', '66', '高中', '204', '25-30岁', '76', '1-3年', '7', '内蒙古', '154', '乌海市', '58', '2000~3000元/月', '', '主任', '13800138000', 'test@163.com', '90090909', '1487821359', '0'), ('16', '16', '东莞家具有限公司', '木工2', '3', '不限', '0', '', '66', '高中', '203', '18-25岁', '77', '3-5年', '2', '上海市', '53', '', '57', '1500~2000元/月', '', '主任', '13800138000', 'test@163.com', '一一一一一i', '1487821710', '0'), ('17', '10', '深圳华高科技有限公司', '技术总监4', '3', '不限', '0', '', '67', '中技', '205', '30-40岁', '76', '1-3年', '2', '上海市', '55', '徐汇区', '59', '3000~5000元/月', '', '主任', '13800138000', '822561700@qq.com', '', '1488165131', '0'), ('18', '9', '深圳科技有限公司', '技术总监', '3', '不限', '0', '', '66', '高中', '204', '25-30岁', '76', '1-3年', '8', '辽宁省', '164', '沈阳市', '58', '2000~3000元/月', '', '主任', '13800138000', '822561700@qq.com', '444', '1488261410', '0');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_login_log`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_login_log`;
CREATE TABLE `zroa_login_log` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) NOT NULL,
  `username` varchar(60) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `company_id` int(11) NOT NULL,
  `addtime` int(4) NOT NULL,
  `ip` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=171 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_login_log`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_login_log` VALUES ('82', '4', 'admin', '登陆系统', '0', '1487046684', '127.0.0.1'), ('83', '15', 'admin2', '登陆系统', '10', '1487048221', '127.0.0.1'), ('84', '4', 'admin', '登陆系统', '0', '1487048333', '127.0.0.1'), ('85', '15', 'admin2', '登陆系统', '10', '1487048664', '127.0.0.1'), ('86', '15', 'admin2', '登陆系统', '10', '1487061958', '127.0.0.1'), ('87', '15', 'admin2', '登陆系统', '10', '1487066931', '127.0.0.1'), ('88', '15', 'admin2', '登陆系统', '10', '1487077394', '127.0.0.1'), ('89', '15', 'admin2', '登陆系统', '10', '1487137431', '127.0.0.1'), ('90', '4', 'admin', '登陆系统', '0', '1487137558', '127.0.0.1'), ('91', '4', 'admin', '登陆系统', '0', '1487138578', '127.0.0.1'), ('92', '4', 'admin', '登陆系统', '0', '1487139388', '127.0.0.1'), ('93', '4', 'admin', '登陆系统', '0', '1487139776', '127.0.0.1'), ('94', '4', 'admin', '登陆系统', '0', '1487148361', '127.0.0.1'), ('95', '4', 'admin', '登陆系统', '0', '1487149144', '127.0.0.1'), ('96', '4', 'admin', '登陆系统', '0', '1487165029', '127.0.0.1'), ('97', '4', 'admin', '登陆系统', '0', '1487212257', '127.0.0.1'), ('98', '15', 'admin2', '登陆系统', '10', '1487216095', '127.0.0.1'), ('99', '4', 'admin', '登陆系统', '0', '1487224506', '127.0.0.1'), ('100', '15', 'admin2', '登陆系统', '10', '1487228812', '127.0.0.1'), ('101', '15', 'admin2', '登陆系统', '10', '1487252246', '127.0.0.1'), ('102', '4', 'admin', '登陆系统', '0', '1487298541', '127.0.0.1'), ('103', '15', 'admin2', '登陆系统', '10', '1487300803', '127.0.0.1'), ('104', '15', 'admin2', '登陆系统', '10', '1487303017', '127.0.0.1'), ('105', '15', 'admin2', '登陆系统', '10', '1487395047', '127.0.0.1'), ('106', '4', 'admin', '登陆系统', '0', '1487474344', '127.0.0.1'), ('107', '15', 'admin2', '登陆系统', '10', '1487474992', '127.0.0.1'), ('108', '4', 'admin', '登陆系统', '0', '1487475009', '127.0.0.1'), ('109', '15', 'admin2', '登陆系统', '10', '1487476473', '127.0.0.1'), ('110', '4', 'admin', '登陆系统', '0', '1487477053', '127.0.0.1'), ('111', '15', 'admin2', '登陆系统', '10', '1487479711', '127.0.0.1'), ('112', '4', 'admin', '登陆系统', '0', '1487480036', '127.0.0.1'), ('113', '15', 'admin2', '登陆系统', '10', '1487480074', '127.0.0.1'), ('114', '4', 'admin', '登陆系统', '0', '1487580927', '127.0.0.1'), ('115', '4', 'admin', '登陆系统', '0', '1487583916', '127.0.0.1'), ('116', '15', 'admin2', '登陆系统', '10', '1487593630', '127.0.0.1'), ('117', '15', 'admin2', '登陆系统', '10', '1487601258', '127.0.0.1'), ('118', '15', 'admin2', '登陆系统', '10', '1487602005', '127.0.0.1'), ('119', '15', 'admin2', '登陆系统', '10', '1487649412', '127.0.0.1'), ('120', '15', 'admin2', '登陆系统', '10', '1487729363', '127.0.0.1'), ('121', '15', 'admin2', '登陆系统', '10', '1487732166', '127.0.0.1'), ('122', '15', 'admin2', '登陆系统', '10', '1487755332', '127.0.0.1'), ('123', '15', 'admin2', '登陆系统', '10', '1487756158', '127.0.0.1'), ('124', '15', 'admin2', '登陆系统', '10', '1487759582', '127.0.0.1'), ('125', '15', 'admin2', '登陆系统', '10', '1487814029', '127.0.0.1'), ('126', '15', 'admin2', '登陆系统', '10', '1487901893', '127.0.0.1'), ('127', '15', 'admin2', '登陆系统', '10', '1488158120', '127.0.0.1'), ('128', '4', 'admin', '登陆系统', '0', '1488182391', '127.0.0.1'), ('129', '15', 'admin2', '登陆系统', '10', '1488242207', '127.0.0.1'), ('130', '15', 'admin2', '登陆系统', '10', '1488242971', '127.0.0.1'), ('131', '15', 'admin2', '登陆系统', '10', '1488250066', '127.0.0.1'), ('132', '15', 'admin2', '登陆系统', '10', '1488261271', '127.0.0.1'), ('133', '15', 'admin2', '登陆系统', '10', '1488353581', '127.0.0.1'), ('134', '15', 'admin2', '登陆系统', '10', '1488419555', '127.0.0.1'), ('135', '4', 'admin', '登陆系统', '0', '1488515765', '127.0.0.1'), ('136', '4', 'admin', '登陆系统', '0', '1488788923', '127.0.0.1'), ('137', '15', 'admin2', '登陆系统', '10', '1488792676', '127.0.0.1'), ('138', '4', 'admin', '登陆系统', '0', '1488855656', '127.0.0.1'), ('139', '4', 'admin', '登陆系统', '0', '1488870176', '127.0.0.1'), ('140', '15', 'admin2', '登陆系统', '10', '1488870373', '127.0.0.1'), ('141', '4', 'admin', '登陆系统', '0', '1488870442', '127.0.0.1'), ('142', '4', 'admin', '登陆系统', '0', '1488870612', '127.0.0.1'), ('143', '4', 'admin', '登陆系统', '0', '1488872116', '127.0.0.1'), ('144', '4', 'admin', '登陆系统', '0', '1488958119', '127.0.0.1'), ('145', '4', 'admin', '登陆系统', '0', '1489022066', '127.0.0.1'), ('146', '15', 'admin2', '登陆系统', '10', '1489029506', '127.0.0.1'), ('147', '15', 'admin2', '登陆系统', '10', '1489046320', '127.0.0.1'), ('148', '15', 'admin2', '登陆系统', '10', '1489047597', '127.0.0.1'), ('149', '15', 'admin2', '登陆系统', '10', '1489110424', '127.0.0.1'), ('150', '15', 'admin2', '登陆系统', '10', '1489110945', '127.0.0.1'), ('151', '4', 'admin', '登陆系统', '0', '1489129111', '127.0.0.1'), ('152', '4', 'admin', '登陆系统', '0', '1489130147', '127.0.0.1'), ('153', '4', 'admin', '登陆系统', '0', '1489130519', '127.0.0.1'), ('154', '15', 'admin2', '登陆系统', '10', '1489133985', '127.0.0.1'), ('155', '4', 'admin', '登陆系统', '0', '1489134737', '127.0.0.1'), ('156', '15', 'admin2', '登陆系统', '10', '1489372546', '127.0.0.1'), ('157', '15', 'admin2', '登陆系统', '10', '1489372988', '127.0.0.1'), ('158', '15', 'admin2', '登陆系统', '10', '1489374009', '127.0.0.1'), ('159', '15', 'admin2', '登陆系统', '10', '1489379395', '127.0.0.1'), ('160', '15', 'admin2', '登陆系统', '10', '1489395205', '127.0.0.1'), ('161', '15', 'admin2', '登陆系统', '10', '1489456418', '127.0.0.1'), ('162', '4', 'admin', '登陆系统', '0', '1489721850', '127.0.0.1'), ('163', '4', 'admin', '登陆系统', '0', '1489882733', '127.0.0.1'), ('164', '4', 'admin', '登陆系统', '0', '1489883778', '127.0.0.1'), ('165', '4', 'admin', '登陆系统', '0', '1489990101', '127.0.0.1'), ('166', '15', 'admin2', '登陆系统', '10', '1489992597', '127.0.0.1'), ('167', '15', 'admin2', '登陆系统', '10', '1490059607', '127.0.0.1'), ('168', '15', 'admin2', '登陆系统', '10', '1490063433', '127.0.0.1'), ('169', '15', 'admin2', '登陆系统', '10', '1490065802', '127.0.0.1'), ('170', '15', 'admin2', '登陆系统', '10', '1490083878', '127.0.0.1');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_meetting`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_meetting`;
CREATE TABLE `zroa_meetting` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `company_id` int(8) NOT NULL,
  `uid` int(8) NOT NULL,
  `m_type` int(4) NOT NULL COMMENT '会议重要级别，0-普通，1-重要，2-紧急，3-例会',
  `title` varchar(200) NOT NULL,
  `presenter` varchar(100) NOT NULL COMMENT '主持人',
  `members` varchar(200) NOT NULL,
  `day` int(4) NOT NULL,
  `address` varchar(60) NOT NULL,
  `content` text NOT NULL,
  `addtime` int(4) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_meetting`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_meetting` VALUES ('1', '0', '4', '0', '周一例会', '张总', '张霞姐,李忠', '1488988800', '江西南康', '习近平：在陕北插队的七年，给我留下的东西几乎带有一种很神秘也很神圣的感觉，我们在后来每有一种挑战，一种考验，或者要去做一个新的工作的时候，我们脑海里翻腾的都是陕北高原上耕牛的父老兄弟的信天游。下雨刮风我是在窑洞里跟他们铡草，晚上跟着看牲口，然后跟他们去放羊，什么活都干，因为我那时候扛200斤麦子，十里山路我不换肩的。\r\n\r\n解说：出身于革命家庭的习近平15岁的时候去陕北农村插队，在7年的摸爬滚打中，实现了他从格格不入到和老百姓融为一体的转变。用他自己的话说，这是很彻底的过程。\r\n\r\n习近平：我很自豪，自己能够出生在一个革命家庭里，家庭有很严格的革命传统教育，总是讲孩子们不要放在温室里，要经受大风大浪。习近平：在陕北插队的七年，给我留下的东西几乎带有一种很神秘也很神圣的感觉，我们在后来每有一种挑战，一种考验，或者要去做一个新的工作的时候，我们脑海里翻腾的都是陕北高原上耕牛的父老兄弟的信天游。下雨刮风我是在窑洞里跟他们铡草，晚上跟着看牲口，然后跟他们去放羊，什么活都干，因为我那时候扛200斤麦子，十里山路我不换肩的。\r\n\r\n解说：出身于革命家庭的习近平15岁的时候去陕北农村插队，在7年的摸爬滚打中，实现了他从格格不入到和老百姓融为一体的转变。用他自己的话说，这是很彻底的过程。\r\n\r\n习近平：我很自豪，自己能够出生在一个革命家庭里，家庭有很严格的革命传统教育，总是讲孩子们不要放在温室里，要经受大风大浪。习近平：在陕北插队的七年，给我留下的东西几乎带有一种很神秘也很神圣的感觉，我们在后来每有一种挑战，一种考验，或者要去做一个新的工作的时候，我们脑海里翻腾的都是陕北高原上耕牛的父老兄弟的信天游。下雨刮风我是在窑洞里跟他们铡草，晚上跟着看牲口，然后跟他们去放羊，什么活都干，因为我那时候扛200斤麦子，十里山路我不换肩的。\r\n\r\n解说：出身于革命家庭的习近平15岁的时候去陕北农村插队，在7年的摸爬滚打中，实现了他从格格不入到和老百姓融为一体的转变。用他自己的话说，这是很彻底的过程。\r\n\r\n习近平：我很自豪，自己能够出生在一个革命家庭里，家庭有很严格的革命传统教育，总是讲孩子们不要放在温室里，要经受大风大浪。习近平：在陕北插队的七年，给我留下的东西几乎带有一种很神秘也很神圣的感觉，我们在后来每有一种挑战，一种考验，或者要去做一个新的工作的时候，我们脑海里翻腾的都是陕北高原上耕牛的父老兄弟的信天游。下雨刮风我是在窑洞里跟他们铡草，晚上跟着看牲口，然后跟他们去放羊，什么活都干，因为我那时候扛200斤麦子，十里山路我不换肩的。\r\n\r\n解说：出身于革命家庭的习近平15岁的时候去陕北农村插队，在7年的摸爬滚打中，实现了他从格格不入到和老百姓融为一体的转变。用他自己的话说，这是很彻底的过程。\r\n\r\n习近平：我很自豪，自己能够出生在一个革命家庭里，家庭有很严格的革命传统教育，总是讲孩子们不要放在温室里，要经受大风大浪。习近平：在陕北插队的七年，给我留下的东西几乎带有一种很神秘也很神圣的感觉，我们在后来每有一种挑战，一种考验，或者要去做一个新的工作的时候，我们脑海里翻腾的都是陕北高原上耕牛的父老兄弟的信天游。下雨刮风我是在窑洞里跟他们铡草，晚上跟着看牲口，然后跟他们去放羊，什么活都干，因为我那时候扛200斤麦子，十里山路我不换肩的。\r\n\r\n解说：出身于革命家庭的习近平15岁的时候去陕北农村插队，在7年的摸爬滚打中，实现了他从格格不入到和老百姓融为一体的转变。用他自己的话说，这是很彻底的过程。\r\n\r\n习近平：我很自豪，自己能够出生在一个革命家庭里，家庭有很严格的革命传统教育，总是讲孩子们不要放在温室里，要经受大风大浪。习近平：在陕北插队的七年，给我留下的东西几乎带有一种很神秘也很神圣的感觉，我们在后来每有一种挑战，一种考验，或者要去做一个新的工作的时候，我们脑海里翻腾的都是陕北高原上耕牛的父老兄弟的信天游。下雨刮风我是在窑洞里跟他们铡草，晚上跟着看牲口，然后跟他们去放羊，什么活都干，因为我那时候扛200斤麦子，十里山路我不换肩的。\r\n\r\n解说：出身于革命家庭的习近平15岁的时候去陕北农村插队，在7年的摸爬滚打中，实现了他从格格不入到和老百姓融为一体的转变。用他自己的话说，这是很彻底的过程。\r\n\r\n习近平：我很自豪，自己能够出生在一个革命家庭里，家庭有很严格的革命传统教育，总是讲孩子们不要放在温室里，要经受大风大浪。习近平：在陕北插队的七年，给我留下的东西几乎带有一种很神秘也很神圣的感觉，我们在后来每有一种挑战，一种考验，或者要去做一个新的工作的时候，我们脑海里翻腾的都是陕北高原上耕牛的父老兄弟的信天游。下雨刮风我是在窑洞里跟他们铡草，晚上跟着看牲口，然后跟他们去放羊，什么活都干，因为我那时候扛200斤麦子，十里山路我不换肩的。\r\n\r\n解说：出身于革命家庭的习近平15岁的时候去陕北农村插队，在7年的摸爬滚打中，实现了他从格格不入到和老百姓融为一体的转变。用他自己的话说，这是很彻底的过程。\r\n\r\n习近平：我很自豪，自己能够出生在一个革命家庭里，家庭有很严格的革命传统教育，总是讲孩子们不要放在温室里，要经受大风大浪。', '1489889609', '0'), ('2', '0', '4', '1', '周一例会2', '张总', '张霞姐,李忠', '1488988800', '江西南康', '周一例会', '1489890231', '0'), ('3', '0', '4', '2', '周一例会', '张总', '张霞姐,李忠', '1488988800', '大会议室', '大会议室大会议室大会议室', '1489890383', '1');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_member`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_member`;
CREATE TABLE `zroa_member` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `header` varchar(200) NOT NULL,
  `realname` varchar(200) NOT NULL,
  `sex` tinyint(2) NOT NULL DEFAULT '0',
  `province` int(8) NOT NULL DEFAULT '0',
  `province_name` varchar(200) NOT NULL,
  `city` int(8) NOT NULL,
  `city_name` varchar(200) NOT NULL,
  `household` varchar(200) NOT NULL,
  `age` varchar(20) NOT NULL,
  `education` varchar(60) NOT NULL,
  `education_cn` varchar(60) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `webchat` varchar(60) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `id_card` varchar(40) NOT NULL,
  `company_id` int(8) NOT NULL,
  `intention` varchar(200) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  `types` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0-手动录入，1-刷身份证，2-微信',
  `addtime` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_member`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_member` VALUES ('1', '', '流量公司', '2', '4', '重庆市', '0', '渝中区', '', '20', '1', '', '', '88888888', null, '888899999999999', '0', '9999999', '0', '0', '1487068382'), ('2', '', '流量公司', '1', '3', '天津市', '0', '河西区', '', '20', '1', '', '', '88888888', null, '888899999999999', '0', '9999999', '0', '0', '1487068518'), ('3', '', '老总', '1', '2', '上海市', '0', '徐汇区', '广东', '20', '0', '', '', '88888888', null, '888899999999999', '10', '木工', '0', '0', '1487083116'), ('4', '', '刘总', '1', '20', '广东省', '331', '佛山市', '广东', '20', '67', '中技', '13800138000', '88888888', null, '888899999999999', '10', '工程师', '0', '0', '1487087367'), ('5', '', '林海旺', '1', '20', '广东省', '329', '珠海市', '广西', '26', '0', '', '13800138000', '565656', null, '452201198309190018', '0', '木工', '0', '0', '1489990866'), ('6', '', '林海旺', '1', '3', '天津市', '72', '和平区', '广西', '26', '0', '', '15814073940', '565656', null, '452201198309190018', '0', 'CEO', '0', '0', '1489991084'), ('7', '', '林海旺', '1', '5', '河北省', '130', '石家庄市', '广东', '26', '0', '', '15814073940', '565656', null, '452201198309190018', '10', '测试工种', '1', '0', '1489992627'), ('8', '', '林海旺', '2', '2', '上海市', '55', '徐汇区', '广西', '26', '67', '中技', '15814073940', '565656', null, '452201198309190018', '10', '木工', '1', '0', '1490086956');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_messagemodel`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_messagemodel`;
CREATE TABLE `zroa_messagemodel` (
  `id` int(8) NOT NULL,
  `sign` varchar(60) NOT NULL,
  `content` varchar(200) NOT NULL,
  `company_id` int(8) NOT NULL,
  `addtime` int(4) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `zroa_role`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_role`;
CREATE TABLE `zroa_role` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(200) NOT NULL,
  `role_tag` varchar(200) NOT NULL,
  `addtime` int(4) NOT NULL,
  `enabled` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_role`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_role` VALUES ('1', '系统管理员', 'root', '0', '0'), ('2', '客户经理', 'c_manager', '0', '0'), ('3', '客服', 'c_service', '0', '0'), ('4', '财务', 'finance', '0', '0'), ('5', '平台管理员', 'system_root', '0', '1'), ('6', '广告', 'ad', '0', '0'), ('7', '派遣', 'paiqian', '0', '0'), ('8', '前台', 'qiantai', '0', '0'), ('9', '信息部', 'xinxi', '0', '0'), ('10', '客服组长', 'kfzz', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_role_tag`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_role_tag`;
CREATE TABLE `zroa_role_tag` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `role_id` int(8) NOT NULL,
  `tag` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_role_tag`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_role_tag` VALUES ('1', '5', 'company_list'), ('2', '5', 'company_edit'), ('3', '5', 'company_del'), ('4', '5', 'company_add'), ('5', '5', 'access_list'), ('6', '5', 'access_add'), ('7', '5', 'access_edit'), ('8', '5', 'access_del'), ('9', '1', 'access_list'), ('10', '1', 'access_add'), ('11', '1', 'access_edit'), ('12', '1', 'access_del'), ('13', '1', 'log_login'), ('14', '5', 'log_login'), ('15', '6', 'company_list'), ('16', '6', 'company_add'), ('17', '0', 'company_list'), ('18', '0', 'company_edit'), ('19', '0', 'company_del'), ('20', '0', 'company_del'), ('21', '0', 'access_list'), ('22', '0', 'access_del'), ('23', '0', 'access_edit'), ('24', '0', 'access_add'), ('25', '0', 'log_login');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_setting`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_setting`;
CREATE TABLE `zroa_setting` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `tags` varchar(200) NOT NULL,
  `tag_v` varchar(200) NOT NULL,
  `company_id` int(8) NOT NULL,
  `content` varchar(200) NOT NULL,
  `addtime` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_setting`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_setting` VALUES ('1', 'canpiao', 'print2', '0', '餐票打印', '0'), ('2', 'pingju', 'print1', '0', '凭据打印', '0'), ('6', 'canpiao', 'canpiao', '10', '', '1487049333'), ('5', 'pingju', 'pingju', '10', '', '1487049333'), ('7', 'works', 'works', '10', '', '1488792683');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_visit_log`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_visit_log`;
CREATE TABLE `zroa_visit_log` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) NOT NULL,
  `realname` varchar(60) NOT NULL,
  `company_id` int(8) NOT NULL,
  `result` tinyint(2) NOT NULL DEFAULT '0' COMMENT '跟进进度',
  `c_type` int(4) NOT NULL DEFAULT '0' COMMENT '客户类型',
  `v_type` int(4) NOT NULL DEFAULT '0' COMMENT '回访方式',
  `contacts` varchar(60) NOT NULL COMMENT '联系人',
  `v_value` varchar(30) NOT NULL COMMENT '联系号码',
  `v_time` int(4) NOT NULL,
  `n_v_time` int(4) NOT NULL,
  `content` varchar(255) NOT NULL,
  `addtime` int(4) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0',
  `verify` varchar(100) NOT NULL COMMENT '审核人',
  `ver_content` varchar(200) NOT NULL,
  `ver_time` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_visit_log`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_visit_log` VALUES ('3', '15', '赵总', '16', '2', '3', '1', '主任', '13800138001', '1487692800', '1488297600', '主任', '1487731560', '0', '', '', '0'), ('5', '15', '赵总', '16', '2', '3', '1', '主任', '13800138000', '1487692800', '1487692800', '主任', '1487734892', '0', '', '', '0'), ('7', '15', '赵总', '16', '2', '3', '1', '主任', '13800138002', '1487692800', '1487692800', 'ddddddddddd', '1487745630', '0', '', '', '0'), ('8', '15', '赵总', '16', '2', '3', '1', '主任', '13800138002', '1487692800', '1488297600', 'iiiiiiiii', '1487745686', '0', '', '', '0'), ('9', '15', '赵总', '16', '2', '3', '1', '主任', '13800138004', '1487692800', '1487692800', '454554554554545454', '1487745764', '0', '', '', '0'), ('10', '15', '赵总', '16', '1', '4', '1', '习近平', '15814073946', '1487692800', '1488297600', '深圳车展,海灵车展,提供惠民超值汽车团购,新车全城低价,钜惠展销!2017深圳车展,各路品牌俱全,深圳汽车团购价格空前钜惠,签到礼+订车礼送不停,你还在等什么?', '1487748339', '0', '', '', '0'), ('11', '15', '赵总', '17', '2', '1', '1', '李元彪', '13800138000', '1488124800', '1488211200', '用户有意向', '1488159550', '0', '', '', '0'), ('12', '15', '赵总', '21', '2', '3', '1', '主任', '13800138000', '1489334400', '1489334400', 'ceshi', '1489376880', '0', '', '', '0'), ('13', '15', '赵总', '21', '2', '3', '1', 'sadfsadf', '13800138000', '1489334400', '1489334400', 'asfdasdfsafdsadf', '1489377512', '0', '', '', '0'), ('14', '15', '赵总', '21', '2', '3', '1', '主任', '13800138000', '1489334400', '1489334400', '45545444554', '1489378185', '0', '', '', '0');
COMMIT;

-- ----------------------------
--  Table structure for `zroa_wx_search`
-- ----------------------------
DROP TABLE IF EXISTS `zroa_wx_search`;
CREATE TABLE `zroa_wx_search` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `fromusername` varchar(200) NOT NULL,
  `msgtype` varchar(60) NOT NULL,
  `content` varchar(200) NOT NULL,
  `msgid` varchar(40) NOT NULL,
  `addtime` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `zroa_wx_search`
-- ----------------------------
BEGIN;
INSERT INTO `zroa_wx_search` VALUES ('1', 'fromUser', 'text', 'this is a test', '1234567890123456', '1487919533'), ('2', 'fromUser', 'text', 'this is a test', '1234567890123456', '1487919913'), ('3', 'fromUser', 'text', 'this is a test', '1234567890123456', '1487919940');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
