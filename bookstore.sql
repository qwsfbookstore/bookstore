/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : bookstore

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2019-12-11 13:28:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for author_book_relationship
-- ----------------------------
DROP TABLE IF EXISTS `author_book_relationship`;
CREATE TABLE `author_book_relationship` (
  `author_id` char(8) NOT NULL,
  `book_id` char(13) NOT NULL,
  PRIMARY KEY (`author_id`,`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of author_book_relationship
-- ----------------------------
INSERT INTO `author_book_relationship` VALUES ('10051919', '9787121197888');
INSERT INTO `author_book_relationship` VALUES ('10150814', '9787550611238');
INSERT INTO `author_book_relationship` VALUES ('11011205', '9787208061644');
INSERT INTO `author_book_relationship` VALUES ('12090308', '9787540485696');
INSERT INTO `author_book_relationship` VALUES ('12090821', '9787521703504');
INSERT INTO `author_book_relationship` VALUES ('12092509', '9787559614636');
INSERT INTO `author_book_relationship` VALUES ('12092510', '9787530219782');
INSERT INTO `author_book_relationship` VALUES ('13010518', '9787552017502');
INSERT INTO `author_book_relationship` VALUES ('17090114', '9787221091857');
INSERT INTO `author_book_relationship` VALUES ('17092305', '9787301053973');
INSERT INTO `author_book_relationship` VALUES ('19011908', '9787040406641');
INSERT INTO `author_book_relationship` VALUES ('19082605', '9787540485696');
INSERT INTO `author_book_relationship` VALUES ('19200522', '9787111354116');
INSERT INTO `author_book_relationship` VALUES ('20010801', '9787302224464');
INSERT INTO `author_book_relationship` VALUES ('20011205', '9787515508610');
INSERT INTO `author_book_relationship` VALUES ('20012601', '9787506380263');
INSERT INTO `author_book_relationship` VALUES ('23010518', '9787121197888');
INSERT INTO `author_book_relationship` VALUES ('23011908', '9787040406641');
INSERT INTO `author_book_relationship` VALUES ('25010401', '9787508036083');
INSERT INTO `author_book_relationship` VALUES ('25010705', '9787201138558');
INSERT INTO `author_book_relationship` VALUES ('25152301', '9787508647357');
INSERT INTO `author_book_relationship` VALUES ('25210821', '9787506365437');
INSERT INTO `author_book_relationship` VALUES ('26082409', '9787503959912');
INSERT INTO `author_book_relationship` VALUES ('3080421', '9787201048611');
INSERT INTO `author_book_relationship` VALUES ('3080421', '9787563334421');
INSERT INTO `author_book_relationship` VALUES ('5042325', '9787111354116');
INSERT INTO `author_book_relationship` VALUES ('5131301', '9787513910521');
INSERT INTO `author_book_relationship` VALUES ('7011921', '9787515508610');
INSERT INTO `author_book_relationship` VALUES ('7211920', '9787502847371');

-- ----------------------------
-- Table structure for author_info
-- ----------------------------
DROP TABLE IF EXISTS `author_info`;
CREATE TABLE `author_info` (
  `author_id` char(8) NOT NULL,
  `author_name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of author_info
-- ----------------------------
INSERT INTO `author_info` VALUES ('10051919', '杰西·利弗莫尔');
INSERT INTO `author_info` VALUES ('10150814', '约翰·克里斯多夫');
INSERT INTO `author_info` VALUES ('11011205', '卡勒德·胡塞尼');
INSERT INTO `author_info` VALUES ('12090308', '梁超');
INSERT INTO `author_info` VALUES ('12090821', '刘飞');
INSERT INTO `author_info` VALUES ('12092509', '林奕含');
INSERT INTO `author_info` VALUES ('12092510', '李银河');
INSERT INTO `author_info` VALUES ('13010518', '马尔文');
INSERT INTO `author_info` VALUES ('17090114', '乔安娜柯尔');
INSERT INTO `author_info` VALUES ('17092305', '丘维声');
INSERT INTO `author_info` VALUES ('19011908', '萨师煊');
INSERT INTO `author_info` VALUES ('19082605', '杉泽');
INSERT INTO `author_info` VALUES ('19200522', '史蒂夫·尼森');
INSERT INTO `author_info` VALUES ('20010801', '谭浩强');
INSERT INTO `author_info` VALUES ('20011205', '塔勒布');
INSERT INTO `author_info` VALUES ('20012601', '太宰治');
INSERT INTO `author_info` VALUES ('23010518', '王尔德');
INSERT INTO `author_info` VALUES ('23011908', '王珊');
INSERT INTO `author_info` VALUES ('25010401', '亚当·斯密');
INSERT INTO `author_info` VALUES ('25010705', '严歌苓');
INSERT INTO `author_info` VALUES ('25152301', '尤瓦尔·赫拉利');
INSERT INTO `author_info` VALUES ('25210821', '余华');
INSERT INTO `author_info` VALUES ('26082409', '周星');
INSERT INTO `author_info` VALUES ('3080421', '川端康成');
INSERT INTO `author_info` VALUES ('4152505', '东野圭吾');
INSERT INTO `author_info` VALUES ('5042325', '埃德温·勒菲弗');
INSERT INTO `author_info` VALUES ('5131301', '艾玛·斯密斯');
INSERT INTO `author_info` VALUES ('7011921', '高苏联');
INSERT INTO `author_info` VALUES ('7211920', '古斯塔夫·勒庞');

-- ----------------------------
-- Table structure for book_index
-- ----------------------------
DROP TABLE IF EXISTS `book_index`;
CREATE TABLE `book_index` (
  `word` varchar(20) DEFAULT NULL,
  `book_id` char(13) DEFAULT NULL,
  `freq` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of book_index
-- ----------------------------
INSERT INTO `book_index` VALUES ('WRITTEN', '9787540485696', '1');
INSERT INTO `book_index` VALUES ('WRITING', '9787302224464', '2');
INSERT INTO `book_index` VALUES ('WRITING', '9787502847371', '1');
INSERT INTO `book_index` VALUES ('WRITING', '9787503959912', '1');
INSERT INTO `book_index` VALUES ('WORLD', '9787121197888', '2');
INSERT INTO `book_index` VALUES ('WORLD', '9787201048611', '1');
INSERT INTO `book_index` VALUES ('WORLD', '9787506380263', '1');
INSERT INTO `book_index` VALUES ('WORLD', '9787515508610', '4');
INSERT INTO `book_index` VALUES ('WORLD', '9787530219782', '1');
INSERT INTO `book_index` VALUES ('WORLD', '9787563334421', '1');
INSERT INTO `book_index` VALUES ('WORKS', '9787503959912', '1');
INSERT INTO `book_index` VALUES ('WORKS', '9787515508610', '1');
INSERT INTO `book_index` VALUES ('WORK', '9787506380263', '1');
INSERT INTO `book_index` VALUES ('WORK', '9787508647357', '1');
INSERT INTO `book_index` VALUES ('WORK', '9787513910521', '1');
INSERT INTO `book_index` VALUES ('WORK', '9787515508610', '1');
INSERT INTO `book_index` VALUES ('WORK', '9787521703504', '1');
INSERT INTO `book_index` VALUES ('WORDS', '9787502847371', '1');
INSERT INTO `book_index` VALUES ('WITNESS', '9787559614636', '1');
INSERT INTO `book_index` VALUES ('WITHSTAND', '9787513910521', '1');
INSERT INTO `book_index` VALUES ('WITHOUT', '9787521703504', '1');
INSERT INTO `book_index` VALUES ('WITH', '9787111354116', '1');
INSERT INTO `book_index` VALUES ('WITH', '9787121197888', '1');
INSERT INTO `book_index` VALUES ('WITH', '9787201048611', '2');
INSERT INTO `book_index` VALUES ('WITH', '9787208061644', '1');
INSERT INTO `book_index` VALUES ('WITH', '9787301053973', '1');
INSERT INTO `book_index` VALUES ('WITH', '9787302224464', '3');
INSERT INTO `book_index` VALUES ('WITH', '9787506365437', '1');
INSERT INTO `book_index` VALUES ('WITH', '9787506380263', '1');
INSERT INTO `book_index` VALUES ('WITH', '9787513910521', '1');
INSERT INTO `book_index` VALUES ('WITH', '9787540485696', '5');
INSERT INTO `book_index` VALUES ('WITH', '9787550611238', '2');
INSERT INTO `book_index` VALUES ('WITH', '9787559614636', '1');
INSERT INTO `book_index` VALUES ('WINGS', '9787540485696', '1');
INSERT INTO `book_index` VALUES ('WILL', '9787121197888', '1');
INSERT INTO `book_index` VALUES ('WILL', '9787221091857', '3');
INSERT INTO `book_index` VALUES ('WILL', '9787506380263', '1');
INSERT INTO `book_index` VALUES ('WILL', '9787508647357', '1');
INSERT INTO `book_index` VALUES ('WILL', '9787552017502', '2');
INSERT INTO `book_index` VALUES ('WIFE', '9787506365437', '2');
INSERT INTO `book_index` VALUES ('WIDELY', '9787508647357', '1');
INSERT INTO `book_index` VALUES ('WIDE', '9787515508610', '1');
INSERT INTO `book_index` VALUES ('WHY', '9787508647357', '5');
INSERT INTO `book_index` VALUES ('WHY', '9787513910521', '3');
INSERT INTO `book_index` VALUES ('WHOLE', '9787301053973', '1');
INSERT INTO `book_index` VALUES ('WHOLE', '9787559614636', '1');
INSERT INTO `book_index` VALUES ('WHO', '9787201048611', '1');
INSERT INTO `book_index` VALUES ('WHO', '9787221091857', '1');
INSERT INTO `book_index` VALUES ('WHO', '9787540485696', '1');
INSERT INTO `book_index` VALUES ('WHILE', '9787301053973', '1');
INSERT INTO `book_index` VALUES ('WHILE', '9787508036083', '1');
INSERT INTO `book_index` VALUES ('WHICH', '9787020127894', '1');
INSERT INTO `book_index` VALUES ('WHICH', '9787111354116', '2');
INSERT INTO `book_index` VALUES ('WHICH', '9787201138558', '1');
INSERT INTO `book_index` VALUES ('WHICH', '9787221091857', '1');
INSERT INTO `book_index` VALUES ('WHICH', '9787301053973', '2');
INSERT INTO `book_index` VALUES ('WHICH', '9787503959912', '1');
INSERT INTO `book_index` VALUES ('WHICH', '9787508036083', '1');
INSERT INTO `book_index` VALUES ('WHICH', '9787513910521', '1');
INSERT INTO `book_index` VALUES ('WHICH', '9787550611238', '1');
INSERT INTO `book_index` VALUES ('WHICH', '9787552017502', '1');
INSERT INTO `book_index` VALUES ('WHICH', '9787559614636', '1');
INSERT INTO `book_index` VALUES ('WHERE', '9787508647357', '1');
INSERT INTO `book_index` VALUES ('WHEN', '9787506365437', '1');
INSERT INTO `book_index` VALUES ('WHAT', '9787121197888', '1');
INSERT INTO `book_index` VALUES ('WHAT', '9787502847371', '1');
INSERT INTO `book_index` VALUES ('WHAT', '9787552017502', '1');
INSERT INTO `book_index` VALUES ('WESTERN', '9787111354116', '2');
INSERT INTO `book_index` VALUES ('WERE', '9787508036083', '1');
INSERT INTO `book_index` VALUES ('WERE', '9787508647357', '2');
INSERT INTO `book_index` VALUES ('WENZI', '9787201048611', '1');
INSERT INTO `book_index` VALUES ('WENT', '9787506365437', '1');
INSERT INTO `book_index` VALUES ('WELL', '9787301053973', '2');
INSERT INTO `book_index` VALUES ('WELL', '9787515508610', '1');
INSERT INTO `book_index` VALUES ('WELL', '9787530219782', '1');
INSERT INTO `book_index` VALUES ('WEEK', '9787301053973', '4');
INSERT INTO `book_index` VALUES ('WEALTH', '9787508036083', '2');
INSERT INTO `book_index` VALUES ('WE', '9787121197888', '2');
INSERT INTO `book_index` VALUES ('WE', '9787502847371', '1');
INSERT INTO `book_index` VALUES ('WE', '9787508647357', '7');
INSERT INTO `book_index` VALUES ('WAY', '9787506365437', '1');
INSERT INTO `book_index` VALUES ('WAY', '9787513910521', '1');
INSERT INTO `book_index` VALUES ('WAY', '9787521703504', '2');
INSERT INTO `book_index` VALUES ('WATCHED', '9787559614636', '1');
INSERT INTO `book_index` VALUES ('WAS', '9787040406641', '2');
INSERT INTO `book_index` VALUES ('WAS', '9787301053973', '1');
INSERT INTO `book_index` VALUES ('WAS', '9787506365437', '5');
INSERT INTO `book_index` VALUES ('WAS', '9787506380263', '1');
INSERT INTO `book_index` VALUES ('WAS', '9787508036083', '2');
INSERT INTO `book_index` VALUES ('WAS', '9787515508610', '2');
INSERT INTO `book_index` VALUES ('WAS', '9787540485696', '1');
INSERT INTO `book_index` VALUES ('WARM', '9787208061644', '1');
INSERT INTO `book_index` VALUES ('WAREHOUSE', '9787040406641', '1');
INSERT INTO `book_index` VALUES ('WAR', '9787502847371', '1');
INSERT INTO `book_index` VALUES ('WAR', '9787515508610', '3');
INSERT INTO `book_index` VALUES ('WALL', '9787502847371', '1');
INSERT INTO `book_index` VALUES ('WALKING', '9787552017502', '1');
INSERT INTO `book_index` VALUES ('VOLUME', '9787506380263', '1');
INSERT INTO `book_index` VALUES ('VIVIDLY', '9787540485696', '1');
INSERT INTO `book_index` VALUES ('VIEW', '9787540485696', '1');

-- ----------------------------
-- Table structure for book_info
-- ----------------------------
DROP TABLE IF EXISTS `book_info`;
CREATE TABLE `book_info` (
  `book_id` char(13) NOT NULL,
  `book_name` varchar(40) DEFAULT NULL,
  `book_picture` varchar(20) DEFAULT NULL,
  `book_publisher` varchar(40) DEFAULT NULL,
  `book_type` varchar(20) DEFAULT NULL,
  `book_purchase_price` decimal(9,2) DEFAULT NULL,
  `book_sale_price` decimal(9,2) DEFAULT NULL,
  `CH_intro` text,
  `ENG_intro` text,
  `book_grade` float DEFAULT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of book_info
-- ----------------------------
INSERT INTO `book_info` VALUES ('9787040406641', '数据库系统概论', 'images/数据库系统概论.jpg', '高等教育出版社', '计算机', '30.00', '39.60', '《数据库系统概论（第5版）“十二五”普通高等教育本科国家级规划教材》第1版于1983年出版，至今已修订至第5版。第5版被列入“十二五”普通高等教育本科国家级规划教材。相应课程于2004年被评为北京市精品课程，2005年被评为国家精品课程，2014年被批准为国家级精品资源共享课。\r\n\r\n《数据库系统概论（第5版）“十二五”普通高等教育本科国家级规划教材》系统全面地阐述了数据库系统的基础理论、基本技术和基本方法。全书分为4篇16章。第一篇基础篇，包括绪论、关系数据库、关系数据库标准语言SQL、数据库安全性和数据库完整性，共5章；第二篇设计与应用开发篇，包括关系数据理论、数据库设计和数据库编程，共3章；第三篇系统篇，包括关系查询处理和查询优化、数据库恢复技术、并发控制和数据库管理系统，共4章；第四篇新技术篇，包括数据库技术发展概述、大数据管理、内存数据库系统和数据仓库与联机分析处理技术，共4章。\r\n\r\n《数据库系统概论（第5版）“十二五”普通高等教育本科国家级规划教材》可以作为高等学校计算机类专业、信息管理与信息系统等相关专业数据库课程的教材。也可供从事数据库系统研究、开发和应用的研究人员和工程技术人员参考。\r\n《数据库系统概论（第5版）“十二五”普通高等教育本科国家级规划教材》第1版于1983年出版，至今已修订至第5版。第5版被列入“十二五”普通高等教育本科国家级规划教材。相应课程于2004年被评为北京市精品课程，2005年被评为国家精品课程，2014年被批准为国家级精品资源共享课。\r\n\r\n《数据库系统概论（第5版）“十二五”普通高等教育本科国家级规划教材》系统全面地阐述了数据库系统的基础理论、基本技术和基本方法。全书分为4篇16章。第一篇基础篇，包括绪论、关系数据库、关系数据库标准语言SQL、数据库安全性和数据库完整性，共5章；第二篇设计与应用开发篇，包括关系数据理论、数据库设计和数据库编程，共3章；第三篇系统篇，包括关系查询处理和查询优化、数据库恢复技术、并发控制和数据库管理系统，共4章；第四篇新技术篇，包括数据库技术发展概述、大数据管理、内存数据库系统和数据仓库与联机分析处理技术，共4章。\r\n\r\n《数据库系统概论（第5版）“十二五”普通高等教育本科国家级规划教材》可以作为高等学校计算机类专业、信息管理与信息系统等相关专业数据库课程的教材。也可供从事数据库系统研究、开发和应用的研究人员和工程技术人员参考。\r\n\"', 'The first edition of the 12th five-year Plan textbook for undergraduate students in General higher Education was published in 1983 and has been revised to the fifth edition. The fifth edition is included in the National Planning textbook of General higher Education in the 12th five-year Plan. The corresponding course was appraised as Beijing excellent course in 2004, national excellent course in 2005 and national excellent resource sharing course in 2014. Introduction to Database system (5th Edition) the basic Theory, basic Technology and basic methods of Database system are systematically and comprehensively expounded in the 12th five-year Plan textbook for undergraduate students in General higher Education. The book is divided into 4 articles and 16 chapters. The first basic part, including introduction, relational database standard language SQL, database security and database integrity, a total of five chapters; the second part of design and application development, including relational data theory, database design and database programming, a total of three chapters, the third part of the system, including relational query processing and query optimization, database recovery technology, concurrency control and database management system, a total of 4 chapters. The fourth part of new technology, including database technology development overview, big data management, memory database system and data warehouse and online analytical processing technology, a total of four chapters. Introduction to Database system (5th Edition) the textbook of National Planning for undergraduate students in General higher Education in the 12th five-year Plan can be used as a textbook for database courses of computer major, information management and information system in colleges and universities. It can also be used as a reference for researchers and engineers engaged in database system research, development and application.', '9.9');
INSERT INTO `book_info` VALUES ('9787111354116', '日本蜡烛图技术', 'images/日本蜡烛图技术.jpg', '机械工业出版社', '投资', '20.00', '35.00', '在1990年，史蒂夫·尼森将古老的日本蜡烛图技术系统地介绍给了西方投资界，这一举动震惊了传统的技术分析方法，史蒂夫·尼森因此被誉为现代蜡烛图技术之父。\r\n今天，史蒂夫·尼森又为我们带来全新力作《日本蜡烛图技术新解》，在本书中，尼森又带来了以下内容：\r\n·融入十几年交易实践，对蜡烛图技术的更深入理解。\r\n·第一次向读者介绍蜡烛图技术的四套独门绝技：卡吉图、连呼图、三线破顶图以及差异指标，这些技术在当今市场的实际应用中都有着卓越表现。\r\n·200份图表说明，几十个实操案例，并明确向读者介绍了这些技术方法的适用范围\r\n·讨论了各种技术在股票证券市场、商品期货市场、外汇市场和海外资本市场的不同作用\r\n·介绍了如何将这些方法与传统交易法则以及西方技术理念相融合，以取得更优市场水平', ' In 1990, Steve nissen systematically introduced the ancient Japanese candle chart technology to the western investment community, which shocked the traditional technical analysis method. Steve nissen is regarded as the father of modern candle chart technology.\r\nToday, Steve nissen brings us his latest book, \"a new understanding of candle graphics in Japan.\"\r\n· More than ten years of trading practice, more in-depth understanding of candle chart technology.\r\n· Introduced to readers for the first time four sets of unique skills of candle chart technology: kaji chart, continuous call chart, three-line broken top chart and differential index, which all have excellent performance in practical application in today\'s market.\r\n· 200 charts, dozens of practice cases, and a clear introduction to the scope of application of these techniques.\r\n· Different roles of various technologies in stock and stock markets, commodity futures markets, foreign exchange markets and overseas capital markets are discussed\r\n· how to integrate these methods with traditional trading rules and western technical concepts to achieve a better market level.', '8.2');
INSERT INTO `book_info` VALUES ('9787121197888', '黑天鹅', 'images/黑天鹅.jpg', '中信出版社', '经济', '13.00', '26.00', '《黑天鹅:如何应对不可预知的未来》深入介绍了黑天鹅事件的本质和规律，发掘出我们所不知道的事情背后的真正价值，教会我们如何认识这个社会的运行方式，如何避免小概率事件带来的重大损失，如何在不确定的世界中占得先机。 由纳西姆·尼古拉斯·塔勒布编著的《黑天鹅》出版后，震惊世界的黑天鹅事件——金融危机随即爆发。在出版3年后，作者经过3年沉淀与思考，增加全新后记，深刻分析黑天鹅理论在现代社会的应用，以及我们如何真正地评估并利用黑天鹅带来的机会，以从中受益。《黑天鹅》必将颠覆我们惯常的思维，让你重新把握自己的命运。', '\"The black swan: how to deal with unpredictable future deeply introduced the nature and law of black swans, discovered what we don\'t know the true value of things behind, teach us how to understand the operation mode of the society, how to avoid the small probability event will bring great losses, how in the world of uncertainty. The financial crisis, the black swan that shocked the world, broke out after the publication of nassim Nicholas taleb\'s black swan. Three years after publication, the author, after three years of accumulation and reflection, added a new postscript to profoundly analyze the application of black swan theory in modern society, and how we can truly evaluate and take advantage of the opportunities brought by black swan to benefit from it. \"Black swan\" is sure to overturn our usual thinking, let you take control of your own destiny.', '5.6');
INSERT INTO `book_info` VALUES ('9787201048611', '雪国', 'images/雪国.jpg', '天津人民出版社', '文学', '19.00', '25.00', '这本书收集了诺贝尔文学奖得主川端康成的几种代表作。《雪国》以有钱有闲的舞蹈研究者岛村与一位艺妓和一位纯情少女之间的感情纠葛，为读者展现了一种哀怨和冷艳的世界。《古都》描写一对在贫富悬殊的家境中生长的孪生姐妹之间感人的悲欢离合的故事。《千只鹤》描写富家子弟菊治在不经意间与父亲生前的性人太田夫人发生肉体关系，而这段孽情最终导致了他所真正钟情的姑娘文子——太田夫人的女儿——自杀的悲剧。', 'The book is a collection of several masterpieces by Nobel laureate yasunari kawabata.\"Snow kingdom\"presents readers with a world of pathos and coolness, through the relationship between shimamura,a dancer with money and leisure, and a geisha and an innocent girl.\"Ancient capital\"describes a pair of twin sisters who grow up in the family situation of the gap between the rich and the poor.\"A thousand cranes\"describes the rich children chrysanthemum to inadvertenty and his father before death of the sex too tian lady physical relationship, and this section of evil feelings eventually led to his true love girl wenzi-too tian lady\'s daughter-suicide tragedy.', '7.1');
INSERT INTO `book_info` VALUES ('9787201138558', '天浴', 'images/天浴.jpg', '天津人民出版社', '文学', '28.00', '36.00', '《天浴》是严歌苓经典中短篇小说自选定本中的其中一本，主要讲述了发生在特殊年代的各种故事。篇目包括《天浴》《倒淌河》《扮演者》《审丑》《少尉之死》《老囚》《爱犬颗韧》等7部中短篇小说。', 'Heaven Bath is one of the selected books of Yan Geling\'s classic novels, which mainly tells all kinds of stories that occurred in special times. The title includes seven short and medium novels, such as \"Heaven Bath\", \"inverted River \", \"judging ugliness\", \"the death of second Lieutenant\", \"Old prisoners\", \"Dog toughness\" and so on.', '9.3');
INSERT INTO `book_info` VALUES ('9787208061644', '追风筝的人', 'images/追风筝的人.jpg', '上海人民出版社', '文学', '30.00', '36.00', '12岁的阿富汗富家少爷阿米尔与仆人哈桑情同手足。然而，在一场风筝比赛后，发生了一件悲惨不堪的事，阿米尔为自己的懦弱感到自责和痛苦，逼走了哈桑，不久，自己也跟随父亲逃往美国。\r\n成年后的阿米尔始终无法原谅自己当年对哈桑的背叛。为了赎罪，阿米尔再度踏上暌违二十多年的故乡，希望能为不幸的好友尽最后一点心力，却发现一个惊天谎言，儿时的噩梦再度重演，阿米尔该如何抉择？\r\n故事如此残忍而又美丽，作者以温暖细腻的笔法勾勒人性的本质与救赎，读来令人荡气回肠。', 'Amir, a 12-year-old Afghan rich young master, and his servant hassan are brothers. However, after a kite race, a tragic thing happened. Amir felt remorse and pain for his cowardice and forced hassan away. Soon after, he also fled to America with his father.As an adult, amir could never forgive himself for his betrayal to hassan. In order to redeem himself, amir sets foot on the hometown of 20 years ago again, hoping to be able to do the last bit of effort for his unfortunate friend, only to find a shocking lie, childhood nightmare again, amir how to choose?The story is both cruel and beautiful, and the author\'s warm and delicate depiction of human nature and salvation is breathtaking.', '6.6');
INSERT INTO `book_info` VALUES ('9787221091857', '神奇校车', 'images/神奇校车.jpg', '贵州人民出版社', '儿童', '80.00', '100.00', '神奇校车迷们，快来一起加入卷毛老师和同学们的新冒险吧！在《神奇校车桥梁书版》中，你将跟随他们进入太空、气象、海洋、生物、身体等各种神奇的领域，踏上全新的科学旅程！\r\n延续《神奇校车》的幽默故事，为小“神校迷”们提供全新的科学知识以及有趣的社会研究课题，全套20本，一次过足“校车瘾！”\r\n编辑过程中，对书中的知识点全部重新查阅核对，保证知识的清晰和准确性，同时注重人物对白的趣味性， 让小朋友在快乐阅读中获取知识。\r\n《神奇校车桥梁书版》的文图设计符合4-8岁自主阅读期孩子的需求，可以让孩子独立完成阅读。小读者将在自主阅读中获取新的科学知识，大大提升他们阅读和学习的兴趣。', 'Fantastic school bike fans, join curly and his classmates in their new adventure! In the magic school bus bridge book, you will follow them into space, meteorology, ocean, biology, body and other magical fields, embark on a brand new scientific journey!Continue the humorous story of \"magic school bus\", provide new scientific knowledge and interesting social research topics for the little \"magic school fans\", the complete set of 20 books, once enough \"school car addiction!\"During the editing process, the knowledge points in the book should be reviewed and checked again to ensure the clarity and accuracy of the knowledge. At the same time, the characters and dialogues should be interesting so that the children can acquire knowledge in the happy reading.The text design of the magic school bus bridge book meets the needs of children aged 4-8 who are in the autonomous reading period, and allows children to finish reading independently. Young readers will acquire new scientific knowledge through independent reading, which will greatly enhance their interest in reading and learning.', '6.4');
INSERT INTO `book_info` VALUES ('9787301053973', '简明线性代数', 'images/简明线性代数.jpg', '北京大学出版社', '数学', '22.00', '28.00', '《简明线性代数》2004年被评为“北京高等教育精品教材”。《简明线性代数》是高等学校数学基础课“线性代数”课程的教材。全书共分九章。内容包括：线性方程组，行列式，n元有序数组的向量空间，矩阵的运算，矩阵的相抵与相似，二次型与矩阵的合同，线性空间，线性映射，欧几里得空间和酉空间。《简明线性代数》按节配置适量习题，书末附有习题答案与提示，供教师和学生参考。\r\n《简明线性代数》既科学地阐述了线性代数的基本内容，又深入浅出、简明易懂。《简明线性代数》精选了线性代数的内容，由具体到抽象地安排讲授体系，这使综合大学和师范院校的理科学生能由浅入深地学完全书；同时又使工科大学，经济类高校，以及大专院校学生只要学习《简明线性代数》前六章或前四章就可了解线性代数的概貌，掌握其最基本的内容。\r\n《简明线性代数》在讲授知识的同时，注重培养学生数学的思维方式。《简明线性代数》内容按照数学的思维方式组织和编写，既使学生容易学到知识，又使学生从中受到数学思维方式的熏陶，把今后肩负的工作做好，使学生终身受益。\r\n《简明线性代数》可作为综合大学、师范院校、工科大学、经济类高校、大专院校以及自学考试的线性代数课程的教材。教师可根据周学时数选用：周学时4可讲授全书各章；周学时3可讲授前六章；周学时2可讲授前四章。', 'Concise linear algebra was awarded as \"excellent textbook for Beijing higher education\"in 2004.\"Concise linear algebra\"is the teaching material of \"linear algebra\",a basic course of mathematics in colleges and universities. The book is divided into nine chapters. The contents include: linear equations, determinant, vector space of n-tuple ordered array, operation of matrix, correspondence and similarity of matrix, contract of quadratic form and matrix, linear space, linear mapping, Euclidean space and unitary space.\"Concise linear algebra\"by section configuration proper exercise, the end of the book with exercise answers and tips, for teachers and students reference.\r\n\"Concise linear algebra\"not only explains the basic content of linear algebra scientifically, but also makes it easy to understand.\"Concise linear algebra\"\r\nselected the content of linear algebra, from the concrete to the abstract arrangement of teaching system, which enables the comprehensive university and normal university science students to learn from the simple to the deep complete book; At the same time, students in engineering universities, economic colleges and universities, as well as colleges and universities, need only learn the first six or four chapters of \"concise linear algebra\"to understand the general picture of linear algebra and grasp its most basic content.\r\n\"Concise linear algebra\"focuses on cultivating students\' thinking mode of mathematics while teaching knowledge. The content of concise linear algebra is organized and compiled according to the thinking mode of mathematics, which not only enables students to learn knowledge easily, but also enables students to be edified by the thinking mode of mathematics, so as to do a good job in the future and benefit students for life.\r\n\"Concise linear algebra\"can be used as a teaching material for linear algebra courses in comprehensive universities, normal universities, engineering universities, economic universities, colleges and universities as well as self-taught examinations.Teachers can choose according to the number of school hours per week; 4 school hours per week can teach all chapters in the whole book; Week 3 can teach the first six chapters; The first four chapters can be taught in week 2.', '8.5');
INSERT INTO `book_info` VALUES ('9787302224464', 'C程序设计', 'images/C程序设计.jpg', '清华大学出版社', '计算机', '25.00', '33.00', '由谭浩强教授著、清华大学出版社出版的《C程序设计》是一本公认的学习C语言程序设计的经典教材。根据C语言的发展和计算机教学的需要，作者在《C程序设计(第三版)》的基础上进行了修订。\r\n《C程序设计(第4版)》按照C语言的新标准C99进行介绍，所有程序都符合C99的规定，使编写程序更加规范；对C语言和程序设计的基本概念和要点讲解透彻，全面而深入；按照作者提出的“提出问题―解决问题―归纳分析”三部曲进行教学、组织教材；《C程序设计(第4版)》的每个例题都按以下几个步骤展开：提出任务―解题思路―编写程序―运行程序―程序分析―有关说明。符合读者认知规律，容易入门与提高。\r\n本书内容先进，体系合理，概念清晰，讲解详尽，降低台阶，分散难点，例题丰富，深入浅出，文字流畅，通俗易懂，是初学者学习C程序设计的理想教材，可作为高等学校各专业的正式教材，也是一本自学的好教材。本书还配有辅助教材《C程序设计(第四版)学习辅导》。', 'C programming, written by professor tan haoqiang and published by tsinghuauniversity press, is a recognized classic textbook for learning C language programming. According to the development of C language and the need of computer teaching, the author revised it on the basis of C programming(third edition).\r\n\"C programming (the fourth edition)\"in accordance with the C language of the new standard C99 is introduced, all procedures are in line with the provisions of C99, make the programming more standardized; Explain the basic concepts and key points of C language and program design thoroughly, comprehensively anddeeply; Teaching and organizing teaching materials according to the trilogy of \"raising problems -solving problems-inductive analysis\"proposed by the author,\"C program design (the fourth edition)\"each example by the following steps: proposed task-problem solving ideas-writing program-running program-program analysis-related description. In line with the reader\'s cognitive rules, easy to get started and improve.\r\nThis book is advanced in content, reasonable in system, clear in concept, detailed in explanation, low in step, scattered difficult points, rich in examples, easy to understand, fluent in writing, easy to understand, is an ideal textbook forbeginners to learn C program design, can be used as a formal textbook for colleges and universities, is also a good textbook for self-study. This book also has an auxiliary textbook \"C program design (fourth edition) study guidance\".', '8.9');
INSERT INTO `book_info` VALUES ('9787502847371', '股票大作手操盘术', 'images/股票大作手操盘术.jpg', '人民邮电出版社', '投资', '20.00', '49.00', '本书是美国投资领域的经典著作，首次出版于1940年。杰西·利弗莫尔是一位华尔街传奇人物，本书详细讲解了他所身体力行的交易技巧和方法。正因为他是一位数十年征战于证券市场的实践者，写的又完全是自己的实践经验和教训，既讲解了他的实用理论，又介绍了具体做法，因此，本书具有完全不同于理论书籍的独特价值。投资是一门艺术，最好有师傅手把手地领我们入门。虽然我们已经无缘得到这位投机大师的言传身教，但是毫无疑问，本书是利弗莫尔传道授业的肺腑之言，好好读一读，领会其中新意，仅次于受他本人耳提面命。', 'The book is a classic of American investment, first published in 1940. Jesse livermore, a Wall Street legend, details the trading techniques and methods he practiced. Just because he is a single-digit decade war in the securities market practitioner, writing and completely is his own practical experience and lessons, not only explained his practical theory, and introduced the specific practice, therefore, this book has completely different from the theory of the book\'s unique value. Investment is an art, and it is better to have a master to guide us to get started. Though we have lost sight of the words and deeds of this master speculator, there can be no doubt that this book is second only to what livermore himself had told us.', '9.1');
INSERT INTO `book_info` VALUES ('9787503959912', '中国电影艺术史', 'images/中国电影艺术史.jpg', '北京大学出版社', '艺术', '40.00', '48.00', '《中国电影艺术史》为作者多年讲授中国电影艺术史的内容呈现。在体例上基本沿袭中国电影史的分期阶段，但更多强调对重要艺术潮流和现象的概要论述；在历史分期描述上也有别于一般意义的编年史分期，而着重于重要历史阶段变迁的块状划分（前45年、中30年、后25年等）；在阐述时间下限上，开放一般“历史”需要沉积的界限，适应电影艺术的当下文化现状，尽可能逼近写作之时的现实创作状况，成为可能是较少见及的容纳即时创作现象的电影史述教材；因此，一书不是一般意义的电影史，而颇含电影史论与当下创作现象的现状描述教科书，尤其是作者描述了大量的电影作品，分析细致深入，引人入胜，试图实现对百年电影的全面描述。', 'The History of Chinese Film Art presents the content of the author\'s teaching of the history of Chinese film art for many years. In style, it basically follows the phased stage of Chinese film history, but more emphasis is placed on the summary discussion of important artistic trends and phenomena, which is also different from the chronological stages of general significance in the description of historical stages, but focuses on the block division of the changes of important historical stages (the first 45 years, the middle 30 years, the latter 25 years, etc.). In expounding the lower limit of time, opening the boundary of general \"history\" needs to deposit, adapt to the present cultural situation of film art, approach the realistic creation situation as much as possible at the time of writing, and become a rare film history teaching material to accommodate the phenomenon of immediate creation. Therefore, a book is not a general film history, but quite contains the film history theory and the current creation phenomenon present situation description textbook, especially the author has described a large number of film works, the analysis is meticulous and fascinating, trying to realize the comprehensive description of the century-old film.', '9.2');
INSERT INTO `book_info` VALUES ('9787506365437', '活着', 'images/活着.jpg', '作家出版社', '文学', '20.00', '28.00', '《活着》讲述了农村人福贵悲惨的人生遭遇。福贵本是个阔少爷，可他嗜赌如命，终于赌光了家业，一贫如洗。他的父亲被他活活气死，母亲则在穷困中患了重病，福贵前去求药，却在途中被国民党抓去当壮丁。经过几番波折回到家里，才知道母亲早已去世，妻子家珍含辛茹苦地养大两个儿女。此后更加悲惨的命运一次又一次降临到福贵身上，他的妻子、儿女和孙子相继死去，最后只剩福贵和一头老牛相依为命，但老人依旧活着，仿佛比往日更加洒脱与坚强。', '\"To live\" tells the story of the rural people fugui tragic life experience. Fu guiben is a rich young master, but he was addicted to gambling such as life, finally gambled away the family, penniless. His father was he died of anger, his mother was in poverty in a serious illness, fu GUI went to ask for medicine, but on the way was arrested by the kuomintang when the young man. After several twists and turns back home, only to know that the mother had died, his wife Jane put up with all kinds to raise two children. Since then, more tragic fate came to fugui again and again. His wife, children and grandchildren died one after another, leaving fugui and an old ox to live together, but the old man was still alive, as if more free and easy and strong than in the past.', '8.5');
INSERT INTO `book_info` VALUES ('9787506380263', '人间失格', 'images/人间失格.jpg', '作家出版社', '文学', '15.00', '25.00', '《人间失格》是日本著名小说家太宰治最具影响力的小说作品，同时也是糸色望（注：动漫《再见！绝望先生》的主角）老师日常生活必备的读物之一。另外在日本轻小说《文学少女》第一卷中被大量提及。《人间失格》（又名《丧失为人的资格》）发表于1948年，是一部自传体的小说，纤细的自传体中透露出极致的颓废，毁灭式的绝笔之作。太宰治巧妙地将自己的人生与思想，隐藏于主角叶藏的人生遭遇，藉由叶藏的独白，窥探太宰治的内心世界，一个“充满了可耻的一生”。在发表这部作品的同年，太宰治就自杀身亡。', 'This book is one of the most influential novels written by the famous Japanese novelist taijai ji. It is also one of the necessary reading materials for the teacher\'s daily life. In addition, it is mentioned a lot in the first volume of the Japanese light novel literature girl. \"Disqualification\" (also known as \"disqualification\") is an autobiographical novel published in 1948. It is a slender autobiographical novel with the ultimate decadence and destruction. Taicaizhi skillfully will own life and thought, hidden in the protagonist ye zang\'s life experience, through the monologue of ye zang, peep taicaizhi\'s inner world, a \"full of shame life\". In the same year that his work was published, tae-jae committed suicide.', '7.6');
INSERT INTO `book_info` VALUES ('9787508036083', '国富论', 'images/国富论.jpg', '华夏出版社', '经济', '50.00', '69.00', '亚当·斯密并不是经济学说的最早开拓者，他最著名的思想中有许多也并非新颖独特，但是他首次提出了全面系统的经济学说，为该领域的发展打下了良好的基础。因此完全可以说《国富论》是现代政治经济学研究的起点。\r\n《国富论》远远不是一部通常所认为的学术论文。虽然斯密也劝说放任自由，但他的论证却更多地是反对政府干预和反对垄断；虽然他赞扬贪欲的结果，却又几乎总是鄙视商人的行为和策略。他也不认为商业制度本身是完全值得赞美的。', 'Adam Smith was not the earliest pioneer of economic theory, and many of his most famous thoughts were not new and unique, but he first put forward a comprehensive and systematic economic theory, which laid a good foundation for the development of this field. Therefore, it can be said that the wealth of nations is the starting point of modern political economy research.\r\n\"The wealth of nations\"is far from being the academic paper you might think.Although Smith also advocated laissez-faire, his argument was more against government intervention and monopoly; While he praises the results of greed, he almost always despises the actions and tactics of businessmen. Nor does he find the business system itself entirely admirable.', '8.4');
INSERT INTO `book_info` VALUES ('9787508647357', '人类简史', 'images/人类简史.jpg', '中信出版社', '历史', '52.00', '68.00', '《人类简史：从动物到上帝》是以色列新锐历史学家的一部重磅作品。从十万年前有生命迹象开始到21世纪资本、科技交织的人类发展史。十万年前，地球上至少有六个人种，为何今天却只剩下了我们自己？我们曾经只是非洲角落一个毫不起眼的族群，对地球上生态的影响力和萤火虫、猩猩或者水母相差无几。为何我们能登上生物链的顶端，最终成为地球的主宰？\r\n从认知革命、农业革命到科学革命，我们真的了解自己吗？我们过得更加快乐吗？我们知道金钱和宗教从何而来，为何产生吗？人类创建的帝国为何一个个衰亡又兴起？为什么地球上几乎每一个社会都有男尊女卑的观念？为何一神教成为最为广泛接受的宗教？科学和资本主义如何成为现代社会最重要的信条？理清影响人类发展的重大脉络，挖掘人类文化、宗教、法律、国家、信贷等产生的根源。这是一部宏大的人类简史，更见微知著、以小写大，让人类重新审视自己。', '\"A brief history of man: from animal to god\"is a major work of the new Israeli historian. From the beginning of life signs 100,000 years ago to the 21st century capital, science and technology interwoven human history.A hundred thousand years ago, there were at least six species of humans on earth. Why are we the only ones left today? We were once an unremarkable group of people in a corner of Africa, as influential on the planet\'s ecology as fireflies, orangutans or jellyfish. How did we get to the top of the food chain and eventually become the ruler of the earth?\r\nFrom the cognitive revolution to the agricultural revolution to the scientific revolution, do we really know ourselves? Are we happier? Do we know where and why money and religion come from? Why do empires created by human beings fall and rise? Why does almost every society on earth have an idea of male superiority? Why is monotheism the most widely accepted religion? How did science and capitalism become the most important credo of modern society? We will clarify the major threads that affect human development, and explore the root causes of human culture, religion, law, state and credit. This is a grand brief history of mankind, even more subtle, in small letters, allowing mankind to re-examine itself.', '9.1');
INSERT INTO `book_info` VALUES ('9787513910521', '乌合之众', 'images/乌合之众.jpg', '民主与建设出版社', '心理学', '35.00', '60.00', '《乌合之众:大众心理研究》为社会心理学领域的经典著作，至今已被翻译成近20种语言出版。在书中，作者以十分简约的方式，考察了群体的特殊心理与思维方式，尤其对个人与群体的迥异心理进行了精辟分析。经典之为经典，就在于其永远不会过时。为什么博学鸿儒在群体中却只会鹦鹉学舌？为什么谦谦君子在群体的支持下会变得粗野不堪、肆无忌惮？为什么打动群体的观念总是经不起严密的推理？作者百年前在书中讨论的这些问题，今天依然困扰着许多人。', 'The mob: a study of mass psychology is a classic work in the field of social psychology, which has been translated into nearly 20 languages. In the book, the author examines the special psychology and thinking mode of the group in a very simple way, and analyzes the different psychology of the individual and the group in particular. Classics are classics because they never go out of style. Why do learned intellectuals parrot in groups? Why do modest gentlemen become uncouth and unscrupulous with the support of the group? Why do ideas that move groups often fail to withstand rigorous reasoning? The questions the author discussed in his book a hundred years ago still trouble many people today.', '9.4');
INSERT INTO `book_info` VALUES ('9787515508610', '心理学统治世界', 'images/心理学统治世界.jpg', '民主与建设出版社', '心理学', '15.00', '35.00', '《心理学统治世界》阐述了疯狂民意背后的理性操控，还客观分析了大众心理学与政治、经济、战争、民族、宗教、神权、犯罪、法律、教育之间的神秘关联，举例解析了党派专政、社会骚乱、宗教虐待、社会斗争、群众盲从等一系列社会现象背后的深层原因，它触动了当时法国当权派的神经，也促使这本书当时在法国被80多个党政图书馆绝密珍藏。\r\n\r\n《心理学统治世界》系列是对勒庞所有作品最全的一次结集出版，收录了《乌合之众》、《各民族进化的心理学规律》、《法国大革命和革命心理学》、《第一次世界大战和它的起源》、《战争心理学》等经典作品。\r\n\r\n《心理学统治世界》作为大众读物引进出版。这部作品在法国三度被禁，七次限级阅读，解禁后被翻译成24种语言，畅销136个国家，至今仍在国际学术界有广泛影响。\r\n\r\n\r\n《心理学统治世界》阐述了疯狂民意背后的理性操控，还客观分析了大众心理学与政治、经济、战争、民族、宗教、神权、犯罪、法律、教育之间的神秘关联，举例解析了党派专政、社会骚乱、宗教虐待、社会斗争、群众盲从等一系列社会现象背后的深层原因，它触动了当时法国当权派的神经，也促使这本书当时在法国被80多个党政图书馆绝密珍藏。\r\n\r\n《心理学统治世界》系列是对勒庞所有作品最全的一次结集出版，收录了《乌合之众》、《各民族进化的心理学规律》、《法国大革命和革命心理学》、《第一次世界大战和它的起源》、《战争心理学》等经典作品。\r\n\r\n《心理学统治世界》作为大众读物引进出版。这部作品在法国三度被禁，七次限级阅读，解禁后被翻译成24种语言，畅销136个国家，至今仍在国际学术界有广泛影响。', 'Psychology rules the world, expounds the rational manipulation behind the mad public opinion, and also objectively analyzes the mysterious relationship between popular psychology and politics, economy, war, nationality, religion, theocratic power, crime, law, and education.\r\n\r\nThe deep reasons behind a series of social phenomena, such as mass blindness, touched the nerves of the French power at that time and prompted the book to be the secret collection of more than 80 party and government libraries in France at that time.\r\n\r\nThe \"Psychology Ruled The World\" series is the most comprehensive collection of all Le Pen\'s works, including \"The People of the Uher,\" \"The Psychological Law of the Evolution of Nations,\" \"The French Revolution and Revolutionary Psychology,\" \"World War I and Its Origins,\" and \"The Psychology of War.\" Psychology ruled the world was introduced and published as a popular reading.\r\nThe work was banned three times in France, seven times for limited reading, translated into 24 languages after the ban, sold well in 136 countries, and still has wide influence in international academia.', '8.7');
INSERT INTO `book_info` VALUES ('9787521703504', '产品思维', 'images/产品思维.jpg', '中信出版社', '管理', '30.00', '40.00', '产品思维，是每一个产品人的底层能力，也是帮助他们从新手进阶到资深产品人的核心能力。\r\n实战派产品经理、滴滴出行司机方向前产品负责人刘飞，将产品经理工作中必须要面对的认知盲点和实践痛点掰开揉碎进行讲解，毫无保留地分享了产品新人迫切需要却很难在公开渠道获取的知识。\r\n《产品思维》共分三个部分，第一部分“认知用户”讲述如何建立用户模型，即深度了解用户，洞察用户核心需求；第二部分“创造价值”核心讲述在了解用户模型的基础上，如何做出高质量的决策，实现产品和用户的价值；第三部分“产品落地”则讲述了一些通过迭代快速验证产品决策有效性的方法。\r\n本书既对产品经理相关理论进行了深入浅出的阐释，也对案例进行了多维度的分析，读者能够从实际应用的角度理解经典的产品思维，实现个人能力的精进与跃迁。', 'Product thinking is the basic competence of every product person and the core competence that helps them to advance from the novice to the senior product person.The actual product manager and didi chuxing driver explained to liu fei, the former product manager, the cognitive blind spots and practical pain points that must be faced in the work of the product manager, and Shared without any reservations the knowledge that the new product members urgently need but it is difficult to obtain in public channels.\"Product thinking\" is divided into three parts. The first part \"cognitive user\" tells how to build user model, that is, to deeply understand users and gain insight into their core needs. In the second part, the core of \"creating value\" tells how to make high-quality decisions and realize the value of products and users on the basis of understanding the user model. The third part, \"product landing\", describes some methods to quickly verify the effectiveness of product decisions through iteration.This book not only explains the relevant theories of product manager in a simple way, but also analyzes the cases in a multi-dimensional way. Readers can understand the classic product thinking from the perspective of practical application and realize the refinement and leap of personal ability.', '8.3');
INSERT INTO `book_info` VALUES ('9787530219782', '李银河说爱情', 'images/李银河说爱情.jpg', '北京十月文艺出版社', '文学', '30.00', '45.00', '书中透彻地探讨了爱情与性、择偶标准、婚外情、性少数群体、生育观念、性教育、女性独立等话题。从柏拉图之恋到更加多元化的性取向，从个人愿望与习俗规范之间的冲突，到感情的流动性和婚姻的固定性之间的紧张关系，作者通过讲述中外婚姻制度、爱情观念、性观念变迁的来龙去脉和变化趋势，一窥世界上不同文化的情爱方式，拓宽了看待两性关系的视野，并且对于当今中国人所面临的婚姻、爱情与性的现实困境，以及相关的社会热点问题，做了极为详细的观察和解读。', 'The book thoroughly discusses such topics as love and sex, mate selection criteria, extramarital affairs, sexual minorities, reproductive attitudes, sex education and female independence. From Plato\'s love to more diversified sexual orientation, from the conflict between personal desire and custom specifications, to the feelings of tension between the liquidity and marital stability, the author by telling the Chinese and foreign marriage system, the concept of love, the context and the change trend of change of sexual mores, a look at the affection of different cultures in the world, broaden their horizons of thinking about relationships, and for today\'s Chinese face the reality of marriage, love and sex, as well as relevant social hot issues, made a very detailed observation and interpretation.', '7.9');
INSERT INTO `book_info` VALUES ('9787540485696', '观山海', 'images/观山海.jpg', '湖南文艺出版社', '艺术', '144.00', '168.00', '《观山海》是一部内容丰富、图文并茂的《山海经》通俗读本，主要呈现异兽部分。\r\n绘者杉泽以《山海经》作为灵感来源，结合当代审美品位及其特有的中式绘画风格进行了绘画创作。将上古传说中的几百种神奇异兽形象，进行了生动、瑰丽的全新演绎，并配以精练的原文及趣味的解读， 为华夏上 古志怪传奇插上另一 种想象的翅膀。\r\n杉泽在创作过程中，前后耗费三年时间构思，结合多种文献资料，使得每一种异兽形象的塑造不是凭空想象，而是有着深厚的文化原由。\r\n译注部分由撰者梁超编写，他以郝懿行《山海经笺疏》为底本的基础，并参考了郭璞、袁珂等人的校译版本，最终用通俗易懂的白话文进行注解，同时进行了部分故事的延伸，并补充了许多新奇有趣的知识。\r\n此外，本书还对于原文中出现的大量生僻字，进行了汉音标注等工作，力求给读者带来更好的阅读体验。', '\"View of mountains and seas\"is a popular book of \"mountains and seas classics\"\r\nwith rich contents and illustrated pictures, mainly presenting exotic animals.\r\nThe painter shan ze took the classic of mountains and seas as the source of inspiration, combined with the contemporary aesthetic taste and its unique Chinese painting style. Hundreds of mysterious and exotic animals in the ancient legends are vividly and magnificently interpreted, together with concise original texts and interesting interpretation, so as to add another kind of imagination wings to the legend of ancient Chinese strange and strange.\r\nIn the process of creation, sugize spent three years to conceive, combined with a variety of documents, so that the creation of each strange animal image is not imaginary, but has a profound cultural reason.\r\nThe new edition was written by liang chao, who took hao yixing\'s classic of mountains and seas on the basis of jian shu, and referred to the proofread versions of guo pu and yuan ke, etc., and finally annotated it in plain Chinese, extending part of the story and adding a lot of new and interesting knowledge.\r\nIn addition,a large number of rare characters in the original text are annotated with Chinese sound, so as to bring readers a better reading experience.', '9.2');
INSERT INTO `book_info` VALUES ('9787550611238', '股票大作手回忆录', 'images/股票大作手回忆录.jpg', '中华工商联合出版社', '投资', '25.00', '50.00', '股票大作手回忆录》是一本精彩的人物传记，记述了一位几百年一遇的金融市场交易与投资天才——杰西·利弗莫尔（Jesse Lauriston Livermore，1877-1940年）的人生、梦想、事业和财富的故事，情节起伏跌宕、激动人心。\r\n当事人回忆往事的年岁在45、46岁（1922-1923）。他从14岁开始从股票经纪行营业部的小伙计做起。很快便专门从事交易。他的一生既以交易为事业而追求事业成功，又以交易为依托而满足远超过温饱水平的生活需求，股票、商品的交易和投资是他人生的全部基础。45、46岁年华，正是事业兴旺、思想成熟、年富力强的好时候。', 'Memoirs of a stock trader is a fascinating biography of the life, dreams, career and fortune of Jesse Lauriston Livermore (1877-1940), a once-in-a-century trading and investing genius.\r\nThe parties recall the past in the age of 45, 46 (1922-1923). He started as a clerk in the sales department of a stock brokerage at the age of 14. He soon specialized in trading. His life not only pursues the career success with the trade as the career, but also satisfies the living demand which far exceeds the standard of food and clothing with the trade as the support, the stock, the commodity trade and the investment is his life entire foundation. 45, 46 years of age, is the cause of prosperity, mature, a good time to be in the prime of life.', '8.1');
INSERT INTO `book_info` VALUES ('9787552017502', '欧洲哲学史', 'images/欧洲哲学史.jpg', '上海社会科学院出版社', '哲学', '130.00', '154.00', '哲学的本质是什么？要从它的目的出发去看，而不是简单的纠结于它的方法论。对某些哲学家的评论，不能简单的用资本主义的哲学家来划分，这容易又给其扣上资本主义走狗的名义，而哲学跟资本主义走狗又有什么关系呢？它本身不管在那一种社会阶段都是会存在的，并且保持其最初的对本质的目的性的探究。', 'What is the essence of philosophy? It should be seen from its purpose, rather than simply entangled in its methodology. Comments on some philosophers cannot be simply divided by capitalist philosophers, which can easily be tied to the name of the capitalist dog, and philosophy and capitalism dog-walking? It itself will exist at that social stage, and it will maintain its initial exploration of the essence of purpose.', '7.1');
INSERT INTO `book_info` VALUES ('9787559614636', '房思琪的初恋乐园', 'images/房思琪的初恋乐园.jpg', '北京联合出版公司', '文学', '30.00', '45.00', '这是一部惊人而特别的小说，小说作者既具有高度敏锐的感受力、又是一个近距离目击者，使这整件事像一个“幸存的标本”那样地被保留下来。整本书反覆地、用极度贴近被侵害者的视角，直直逼视那种“别人夺去你某个珍贵之物”的痛苦──且掠夺之人是以此为乐。', 'It is an amazing and extraordinary novel, the author of which is both highly sensitive and a close witness, keeping the whole thing as a \"specimen of survival \". Throughout the book, with an extremely close eye to the victim, the pain of \"someone else taking something precious from you\" is being watched -- and enjoyed by the looters. ', '8.8');
INSERT INTO `book_info` VALUES ('9787563334421', '伊豆的舞女', 'images/伊豆的舞女.jpg', '广西师范大学出版社', '文学', '15.00', '23.80', '《伊豆的舞女》是川端康成早期的代表作和成名作，也是一篇杰出的中篇小说。1926年1月至2月间由“文艺时代”发表。《伊豆的舞女》曾先后6次被搬上银幕。影片表现了少男少女之间初恋的那种朦胧、纯真的情感。给了读者一份清新之感，也净化了读者的心灵，把人们带入一个空灵美好的唯美世界。', 'The dancing girl of izu is a masterpiece of yasunari kawabata and a famous novella. Published by \"the literary age\"between January and February 1926. The dancing girl of izu has been adapted for six times. The film shows the hazy and pure emotion of the first love between young men and girls. It gives readers a sense of freshness and purifies their minds, bringing them into an ethereal and beautiful world.', '9.2');

-- ----------------------------
-- Table structure for book_stock
-- ----------------------------
DROP TABLE IF EXISTS `book_stock`;
CREATE TABLE `book_stock` (
  `book_id` char(13) NOT NULL,
  `store_id` tinyint(4) NOT NULL,
  `stock_number` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`book_id`,`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of book_stock
-- ----------------------------
INSERT INTO `book_stock` VALUES ('9787040406641', '1', '15');
INSERT INTO `book_stock` VALUES ('9787040406641', '3', '18');
INSERT INTO `book_stock` VALUES ('9787111354116', '4', '33');
INSERT INTO `book_stock` VALUES ('9787121197888', '4', '91');
INSERT INTO `book_stock` VALUES ('9787201048611', '1', '14');
INSERT INTO `book_stock` VALUES ('9787201138558', '3', '12');
INSERT INTO `book_stock` VALUES ('9787208061644', '2', '17');
INSERT INTO `book_stock` VALUES ('9787221091857', '2', '12');
INSERT INTO `book_stock` VALUES ('9787301053973', '1', '40');
INSERT INTO `book_stock` VALUES ('9787301053973', '3', '44');
INSERT INTO `book_stock` VALUES ('9787302224464', '1', '20');
INSERT INTO `book_stock` VALUES ('9787502847371', '4', '62');
INSERT INTO `book_stock` VALUES ('9787506365437', '2', '20');
INSERT INTO `book_stock` VALUES ('9787506380263', '2', '15');
INSERT INTO `book_stock` VALUES ('9787508036083', '1', '24');
INSERT INTO `book_stock` VALUES ('9787508647357', '1', '5');
INSERT INTO `book_stock` VALUES ('9787513910521', '4', '28');
INSERT INTO `book_stock` VALUES ('9787515508610', '4', '24');
INSERT INTO `book_stock` VALUES ('9787521703504', '2', '19');
INSERT INTO `book_stock` VALUES ('9787530219782', '2', '50');
INSERT INTO `book_stock` VALUES ('9787540485696', '1', '40');
INSERT INTO `book_stock` VALUES ('9787550611238', '4', '13');
INSERT INTO `book_stock` VALUES ('9787552017502', '1', '0');
INSERT INTO `book_stock` VALUES ('9787559614636', '1', '33');
INSERT INTO `book_stock` VALUES ('9787559614636', '3', '24');
INSERT INTO `book_stock` VALUES ('9787563334421', '1', '23');

-- ----------------------------
-- Table structure for cart_record
-- ----------------------------
DROP TABLE IF EXISTS `cart_record`;
CREATE TABLE `cart_record` (
  `user_id` char(6) DEFAULT NULL,
  `book_id` char(13) DEFAULT NULL,
  `book_num` int(11) DEFAULT NULL,
  KEY `book_id` (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cart_record
-- ----------------------------
INSERT INTO `cart_record` VALUES ('200001', '9787515508610', '1');
INSERT INTO `cart_record` VALUES ('200001', '9787513910521', '2');

-- ----------------------------
-- Table structure for guest_book
-- ----------------------------
DROP TABLE IF EXISTS `guest_book`;
CREATE TABLE `guest_book` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(6) NOT NULL,
  `nickname` char(16) NOT NULL,
  `face` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `content` text NOT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `staff_id` char(6) DEFAULT NULL,
  `reply` text,
  `reply_time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of guest_book
-- ----------------------------
INSERT INTO `guest_book` VALUES ('1', '200001', '叮当猫', '3', '吹爆员工董七，应该加鸡腿！小姐姐态度好好～下次还来这里买书', '1574930190', null, null, null);
INSERT INTO `guest_book` VALUES ('2', '200014', '人间水蜜桃', '10', '《数据库系统概论》这本教材太好了！', '1574930472', null, null, null);
INSERT INTO `guest_book` VALUES ('3', '200007', '黄景瑜', '1', '表白秦总！我想请秦总吃饭！我想和秦总一起看电影！求求秦总答应我吧！秦总和我在一起吧！', '1574930807', '100001', '秦总答应了', '1574934081');
INSERT INTO `guest_book` VALUES ('4', '200006', '大帅哥', '4', '方总太迷人太可爱了！真是人间水蜜桃', '1574930904', '100001', '', null);
INSERT INTO `guest_book` VALUES ('5', '200009', '沙奈朵', '8', '表白陈总', '1574931023', '', '', null);
INSERT INTO `guest_book` VALUES ('6', '200007', '绿茶小仙女', '13', '有人想一起交流川端康成的小说吗~', '1574935051', '100003', '《雪国》推荐购买哦~', '1574941488');

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `order_id` char(6) NOT NULL,
  `book_id` char(13) NOT NULL,
  `book_num` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES ('300001', '9787201048611', '3');
INSERT INTO `order_details` VALUES ('300001', '9787508647357', '2');
INSERT INTO `order_details` VALUES ('300002', '9787201048611', '1');
INSERT INTO `order_details` VALUES ('300003', '9787552017502', '1');
INSERT INTO `order_details` VALUES ('300004', '9787508036083', '1');
INSERT INTO `order_details` VALUES ('300005', '9787301053973', '1');
INSERT INTO `order_details` VALUES ('300006', '9787208061644', '1');
INSERT INTO `order_details` VALUES ('300007', '9787221091857', '1');
INSERT INTO `order_details` VALUES ('300007', '9787521703504', '1');
INSERT INTO `order_details` VALUES ('300008', '9787506380263', '2');
INSERT INTO `order_details` VALUES ('300009', '9787530219782', '1');
INSERT INTO `order_details` VALUES ('300010', '9787221091857', '1');
INSERT INTO `order_details` VALUES ('300010', '9787506380263', '1');
INSERT INTO `order_details` VALUES ('300010', '9787530219782', '1');
INSERT INTO `order_details` VALUES ('300011', '9787503959912', '2');
INSERT INTO `order_details` VALUES ('300012', '9787040406641', '2');
INSERT INTO `order_details` VALUES ('300013', '9787201138558', '1');
INSERT INTO `order_details` VALUES ('300014', '9787201138558', '2');
INSERT INTO `order_details` VALUES ('300015', '9787301053973', '3');
INSERT INTO `order_details` VALUES ('300016', '9787559614636', '1');
INSERT INTO `order_details` VALUES ('300017', '9787040406641', '2');
INSERT INTO `order_details` VALUES ('300018', '9787111354116', '8');
INSERT INTO `order_details` VALUES ('300019', '9787513910521', '10');
INSERT INTO `order_details` VALUES ('300020', '9787515508610', '17');
INSERT INTO `order_details` VALUES ('300021', '9787502847371', '12');
INSERT INTO `order_details` VALUES ('300022', '9787121197888', '6');
INSERT INTO `order_details` VALUES ('300023', '9787550611238', '12');
INSERT INTO `order_details` VALUES ('300024', '9787040406641', '1');
INSERT INTO `order_details` VALUES ('300024', '9787302224464', '1');
INSERT INTO `order_details` VALUES ('300025', '9787508647357', '1');

-- ----------------------------
-- Table structure for order_info
-- ----------------------------
DROP TABLE IF EXISTS `order_info`;
CREATE TABLE `order_info` (
  `order_id` char(6) NOT NULL,
  `user_id` char(6) DEFAULT NULL,
  `staff_id` char(6) DEFAULT NULL,
  `order_time` date DEFAULT NULL,
  `order_status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of order_info
-- ----------------------------
INSERT INTO `order_info` VALUES ('300001', '200010', '100002', '2019-03-16', '已发货');
INSERT INTO `order_info` VALUES ('300002', '200006', '100004', '2019-03-17', '已发货');
INSERT INTO `order_info` VALUES ('300003', '200009', '100004', '2019-03-17', '已发货');
INSERT INTO `order_info` VALUES ('300004', '200005', '100003', '2019-04-05', '已发货');
INSERT INTO `order_info` VALUES ('300005', '200010', '100001', '2019-09-03', '已发货');
INSERT INTO `order_info` VALUES ('300006', '200002', '100014', '2019-01-23', '已发货');
INSERT INTO `order_info` VALUES ('300007', '200003', '100016', '2019-04-03', '已发货');
INSERT INTO `order_info` VALUES ('300008', '200002', '100009', '2019-06-17', '已发货');
INSERT INTO `order_info` VALUES ('300009', '200005', '100008', '2019-08-28', '已发货');
INSERT INTO `order_info` VALUES ('300010', '200004', '100018', '2019-09-21', '已发货');
INSERT INTO `order_info` VALUES ('300011', '200012', '100020', '2019-09-11', '已发货');
INSERT INTO `order_info` VALUES ('300012', '200020', '100007', '2019-09-11', '已发货');
INSERT INTO `order_info` VALUES ('300013', '200005', '100006', '2019-09-12', '已发货');
INSERT INTO `order_info` VALUES ('300014', '200008', '100015', '2019-09-13', '已发货');
INSERT INTO `order_info` VALUES ('300015', '200009', '100016', '2019-09-13', '已发货');
INSERT INTO `order_info` VALUES ('300016', '200004', '100022', '2019-09-17', '已发货');
INSERT INTO `order_info` VALUES ('300017', '200010', '100010', '2019-10-19', '已发货');
INSERT INTO `order_info` VALUES ('300018', '200003', '100012', '2019-09-11', '已发货');
INSERT INTO `order_info` VALUES ('300019', '200014', '100014', '2019-09-06', '已发货');
INSERT INTO `order_info` VALUES ('300020', '200009', '100023', '2019-09-07', '已发货');
INSERT INTO `order_info` VALUES ('300021', '200011', '100013', '2019-09-04', '已发货');
INSERT INTO `order_info` VALUES ('300022', '200001', '100005', '2019-09-20', '已发货');
INSERT INTO `order_info` VALUES ('300023', '200020', '100021', '2019-09-04', '已发货');
INSERT INTO `order_info` VALUES ('300024', '200001', null, '2019-12-10', '未发货');
INSERT INTO `order_info` VALUES ('300025', '200004', null, '2019-12-10', '未发货');

-- ----------------------------
-- Table structure for search_record
-- ----------------------------
DROP TABLE IF EXISTS `search_record`;
CREATE TABLE `search_record` (
  `user_id` char(6) DEFAULT NULL,
  `book_name` varchar(40) DEFAULT NULL,
  `author_name` varchar(40) DEFAULT NULL,
  `book_type` varchar(20) DEFAULT NULL,
  `CH_intro` varchar(20) DEFAULT NULL,
  `ENG_intro` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of search_record
-- ----------------------------
INSERT INTO `search_record` VALUES ('200001', '活着', '', '', '', '');
INSERT INTO `search_record` VALUES ('200001', '数据库系统', '', '', '', '');
INSERT INTO `search_record` VALUES ('200001', '', '', '', '', 'math');
INSERT INTO `search_record` VALUES ('200001', '', '', '', '', 'math');
INSERT INTO `search_record` VALUES ('200001', '', '', '', '', 'textbook');
INSERT INTO `search_record` VALUES ('200001', '', '丘维声', '', '', '');
INSERT INTO `search_record` VALUES ('200001', '', '丘维声', '', '', '');
INSERT INTO `search_record` VALUES ('200001', '', '王珊', '', '', '');
INSERT INTO `search_record` VALUES ('200001', '', '', '', '', 'snow');
INSERT INTO `search_record` VALUES ('200001', '', '', '', '', 'snow');
INSERT INTO `search_record` VALUES ('200001', '雪国', '', '', '', '');

-- ----------------------------
-- Table structure for staff_info
-- ----------------------------
DROP TABLE IF EXISTS `staff_info`;
CREATE TABLE `staff_info` (
  `staff_id` char(6) NOT NULL,
  `staff_name` varchar(20) DEFAULT NULL,
  `staff_sex` varchar(2) DEFAULT NULL,
  `staff_age` tinyint(4) DEFAULT NULL,
  `staff_tel` char(11) DEFAULT NULL,
  `staff_password` varchar(14) DEFAULT NULL,
  `staff_store` char(6) DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of staff_info
-- ----------------------------
INSERT INTO `staff_info` VALUES ('100001', '张永杰', '男', '33', '15152048776', '000000', '1');
INSERT INTO `staff_info` VALUES ('100002', '徐兆军', '男', '29', '15895250541', '292467', '1');
INSERT INTO `staff_info` VALUES ('100003', '叶文君', '女', '26', '13905220028', '761996', '1');
INSERT INTO `staff_info` VALUES ('100004', '邱志飞', '男', '25', '13905221522', '400902', '1');
INSERT INTO `staff_info` VALUES ('100005', '梁洁', '女', '24', '15152044688', '128705', '1');
INSERT INTO `staff_info` VALUES ('100006', '黄晶晶', '女', '25', '13905225979', '856797', '2');
INSERT INTO `staff_info` VALUES ('100007', '蒋敏', '女', '20', '13905222032', '227735', '2');
INSERT INTO `staff_info` VALUES ('100008', '刘勇', '男', '30', '15895257031', '774537', '2');
INSERT INTO `staff_info` VALUES ('100009', '张可达', '男', '35', '15152048875', '264268', '2');
INSERT INTO `staff_info` VALUES ('100010', '吴燕', '女', '33', '15895251766', '791959', '2');
INSERT INTO `staff_info` VALUES ('100011', '杨洋', '男', '32', '13905222352', '346044', '3');
INSERT INTO `staff_info` VALUES ('100012', '张三', '男', '40', '13905223574', '149849', '3');
INSERT INTO `staff_info` VALUES ('100013', '李四', '女', '35', '15895256090', '556777', '3');
INSERT INTO `staff_info` VALUES ('100014', '陈五', '男', '21', '15152047883', '715105', '3');
INSERT INTO `staff_info` VALUES ('100015', '方六', '女', '30', '13905220038', '828523', '3');
INSERT INTO `staff_info` VALUES ('100016', '董七', '女', '24', '15895254514', '118660', '3');
INSERT INTO `staff_info` VALUES ('100017', '秦八', '女', '21', '13905221010', '777971', '3');
INSERT INTO `staff_info` VALUES ('100018', '李现', '男', '28', '13905226880', '150398', '4');
INSERT INTO `staff_info` VALUES ('100019', '宋祖儿', '女', '20', '15895255353', '224169', '4');
INSERT INTO `staff_info` VALUES ('100020', '金瀚', '男', '31', '15152048284', '144503', '4');
INSERT INTO `staff_info` VALUES ('100021', '欧阳娜娜', '女', '21', '15895252593', '447712', '4');
INSERT INTO `staff_info` VALUES ('100022', '宋妍霏', '女', '26', '13905222480', '356518', '4');
INSERT INTO `staff_info` VALUES ('100023', '金苗苗', '女', '20', '17723459809', '223456', '4');

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `user_id` char(6) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_sex` varchar(2) DEFAULT NULL,
  `user_tel` char(11) DEFAULT NULL,
  `user_password` varchar(14) DEFAULT NULL,
  `user_address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES ('200001', '邓小琪 ', '女', '15895251894', '000000', '北京市海淀区北京大学40号楼');
INSERT INTO `user_info` VALUES ('200002', '方小明', '男', '13905222798', '310728', '北京市海淀区北京大学29号楼');
INSERT INTO `user_info` VALUES ('200003', '方一凡 ', '男', '13905226101', '223183', '北京市海淀区北京大学30号楼');
INSERT INTO `user_info` VALUES ('200004', '韩商言', '男', '13905222617', '194681', '北京市海淀区北京大学31号楼');
INSERT INTO `user_info` VALUES ('200005', '胡老半', '男', '13905225809', '544874', '北京市海淀区北京大学32号楼');
INSERT INTO `user_info` VALUES ('200006', '江天昊 ', '男', '15895259698', '579022', '北京市海淀区北京大学33号楼');
INSERT INTO `user_info` VALUES ('200007', '李英俊', '男', '15152042598', '517479', '北京市海淀区北京大学34A号楼');
INSERT INTO `user_info` VALUES ('200008', '林磊儿', '男', '15152049275', '823170', '北京市海淀区北京大学34B号楼');
INSERT INTO `user_info` VALUES ('200009', '林妙妙 ', '女', '13905223254', '128056', '北京市海淀区北京大学35号楼');
INSERT INTO `user_info` VALUES ('200010', '钱三一 ', '男', '15895259877', '193572', '北京市海淀区北京大学36号楼');
INSERT INTO `user_info` VALUES ('200011', '秦大华', '女', '13905221630', '922252', '北京市海淀区北京大学37号楼');
INSERT INTO `user_info` VALUES ('200012', '沈竹人', '男', '15895258758', '346783', '北京市海淀区北京大学38号楼');
INSERT INTO `user_info` VALUES ('200013', '孙亚亚', '女', '15152045071', '614517', '北京市海淀区北京大学39号楼');
INSERT INTO `user_info` VALUES ('200014', '唐依', '女', '15152049970', '970002', '北京市海淀区北京大学40号楼');
INSERT INTO `user_info` VALUES ('200015', '佟年', '女', '15152041534', '576521', '北京市海淀区北京大学41号楼');
INSERT INTO `user_info` VALUES ('200016', '王浩', '男', '15895255176', '449575', '北京市海淀区北京大学42号楼');
INSERT INTO `user_info` VALUES ('200017', '王可', '女', '15895254968', '760762', '北京市海淀区北京大学43号楼');
INSERT INTO `user_info` VALUES ('200018', '吴白', '男', '13905224622', '410451', '北京市海淀区北京大学44号楼');
INSERT INTO `user_info` VALUES ('200019', '张三疯', '男', '15895258449', '905895', '北京市海淀区北京大学45甲号楼');
INSERT INTO `user_info` VALUES ('200020', '张圆章', '男', '13905228665', '392138', '北京市海淀区北京大学45乙号楼');
INSERT INTO `user_info` VALUES ('200021', '王思聪', '男', '18288888888', '374025', '北京市海淀区清华大学紫荆公寓');
INSERT INTO `user_info` VALUES ('200022', '何洛洛', '男', '18399982845', '940257', null);
INSERT INTO `user_info` VALUES ('200023', '黄宁静', '女', '15299937923', '897493', null);

-- ----------------------------
-- View structure for authors_name
-- ----------------------------
DROP VIEW IF EXISTS `authors_name`;
CREATE ALGORITHM=UNDEFINED DEFINER=`skip-grants user`@`skip-grants host` SQL SECURITY INVOKER VIEW `authors_name` AS select `author_book_relationship`.`book_id` AS `book_id`,group_concat(`author_info`.`author_name` separator ',') AS `names` from (`author_book_relationship` join `author_info` on((`author_book_relationship`.`author_id` = `author_info`.`author_id`))) group by `author_book_relationship`.`book_id` ;

-- ----------------------------
-- View structure for book_top
-- ----------------------------
DROP VIEW IF EXISTS `book_top`;
CREATE ALGORITHM=UNDEFINED DEFINER=`skip-grants user`@`skip-grants host` SQL SECURITY INVOKER VIEW `book_top` AS select `book_info`.`book_id` AS `book_id`,`order_details`.`book_num` AS `book_sale_num`,`book_info`.`book_grade` AS `book_grade`,`book_info`.`book_name` AS `book_name`,`book_info`.`book_picture` AS `book_picture`,`book_info`.`book_publisher` AS `book_publisher`,`book_info`.`book_type` AS `book_type`,`book_info`.`book_purchase_price` AS `book_purchase_price`,`book_info`.`book_sale_price` AS `book_sale_price`,`book_info`.`CH_intro` AS `CH_intro`,`book_info`.`ENG_intro` AS `ENG_intro` from (`book_info` join `order_details`) where (`book_info`.`book_id` = `order_details`.`book_id`) group by `book_info`.`book_id` ;

-- ----------------------------
-- View structure for cart_info
-- ----------------------------
DROP VIEW IF EXISTS `cart_info`;
CREATE ALGORITHM=UNDEFINED DEFINER=`skip-grants user`@`skip-grants host` SQL SECURITY INVOKER VIEW `cart_info` AS select `cart_record`.`user_id` AS `user_id`,`cart_record`.`book_id` AS `book_id`,`cart_record`.`book_num` AS `book_num`,round(((`cart_record`.`book_num` * `book_info`.`book_sale_price`) * `user_class`.`user_discount`),2) AS `book_sumprice`,`user_class`.`user_discount` AS `user_discount`,`book_info`.`book_name` AS `book_name`,`book_info`.`book_picture` AS `book_picture`,`book_info`.`book_publisher` AS `book_publisher`,`book_info`.`book_type` AS `book_type`,`book_info`.`book_purchase_price` AS `book_purchase_price`,`book_info`.`book_sale_price` AS `book_sale_price`,`book_info`.`CH_intro` AS `CH_intro`,`book_info`.`ENG_intro` AS `ENG_intro`,`book_info`.`book_grade` AS `book_grade` from ((`cart_record` join `book_info`) join `user_class`) where ((convert(`cart_record`.`user_id` using utf8mb4) = convert(`user_class`.`user_id` using utf8mb4)) and (convert(`cart_record`.`book_id` using utf8mb4) = `book_info`.`book_id`)) group by `cart_record`.`book_id` ;

-- ----------------------------
-- View structure for order_sum
-- ----------------------------
DROP VIEW IF EXISTS `order_sum`;
CREATE ALGORITHM=UNDEFINED DEFINER=`skip-grants user`@`skip-grants host` SQL SECURITY INVOKER VIEW `order_sum` AS select `order_info`.`order_id` AS `order_id`,`order_info`.`user_id` AS `user_id`,`order_info`.`staff_id` AS `staff_id`,`order_info`.`order_time` AS `order_time`,round(sum((`book_info`.`book_sale_price` * `order_details`.`book_num`)),2) AS `total_sales`,`order_info`.`order_status` AS `order_status` from (`order_info` join (`book_info` join `order_details` on((`book_info`.`book_id` = `order_details`.`book_id`))) on((`order_info`.`order_id` = `order_details`.`order_id`))) group by `order_info`.`order_id`,`order_info`.`staff_id`,`order_info`.`order_time` ;

-- ----------------------------
-- View structure for user_class
-- ----------------------------
DROP VIEW IF EXISTS `user_class`;
CREATE ALGORITHM=UNDEFINED DEFINER=`skip-grants user`@`skip-grants host` SQL SECURITY INVOKER VIEW `user_class` AS select `user_consumption`.`user_id` AS `user_id`,`user_consumption`.`user_name` AS `user_name`,`user_consumption`.`total_consumption` AS `total_consumption`,`user_consumption`.`user_points` AS `user_points`,(case when (`user_consumption`.`user_points` = 0) then '普通会员' when (`user_consumption`.`user_points` < 1000) then '白金会员' when (`user_consumption`.`user_points` < 5000) then '黄金会员' when (`user_consumption`.`user_points` < 10000) then '铂金会员' else '钻石会员' end) AS `user_class`,(case when (`user_consumption`.`user_points` = 0) then 1 when (`user_consumption`.`user_points` < 1000) then 0.95 when (`user_consumption`.`user_points` < 5000) then 0.9 when (`user_consumption`.`user_points` < 10000) then 0.85 else 0.8 end) AS `user_discount` from `user_consumption` ;

-- ----------------------------
-- View structure for user_consumption
-- ----------------------------
DROP VIEW IF EXISTS `user_consumption`;
CREATE ALGORITHM=UNDEFINED DEFINER=`skip-grants user`@`skip-grants host` SQL SECURITY INVOKER VIEW `user_consumption` AS select `user_info`.`user_id` AS `user_id`,`user_info`.`user_name` AS `user_name`,ifnull(round(sum(`order_sum`.`total_sales`),2),0) AS `total_consumption`,(ifnull(round(sum(`order_sum`.`total_sales`),0),0) * 10) AS `user_points` from (`user_info` left join (`order_sum` join `order_info` on((`order_sum`.`order_id` = `order_info`.`order_id`))) on((`user_info`.`user_id` = `order_info`.`user_id`))) group by `user_info`.`user_id` order by sum(`order_sum`.`total_sales`) desc ;
