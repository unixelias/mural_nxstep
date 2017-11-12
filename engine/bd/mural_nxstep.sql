/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50137
Source Host           : localhost:3306
Source Database       : mural_nxstep

Target Server Type    : MYSQL
Target Server Version : 50137
File Encoding         : 65001

Date: 2016-07-25 15:32:03
*/
CREATE DATABASE IF NOT EXISTS mural_nxstep DEFAULT CHARSET=utf8;

USE mural_nxstep;

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `mensagem`
-- ----------------------------
DROP TABLE IF EXISTS `mensagem`;
CREATE TABLE `mensagem` (
  `id_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `destinatario_mensagem` int(11) NOT NULL,
  `assunto_mensagem` varchar(70) NOT NULL,
  `conteudo_mensagem` varchar(1024) NOT NULL,
  `hora_mensagem` time NOT NULL,
  `data_mensagem` date NOT NULL,
  PRIMARY KEY (`id_mensagem`),
  KEY `FK_usuario` (`id_usuario`),
  CONSTRAINT `FK_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mensagem
-- ----------------------------
INSERT INTO `mensagem` VALUES ('1', '1', '-1', 'Teste', 'teste', '00:04:47', '2016-07-21');
INSERT INTO `mensagem` VALUES ('2', '5', '-1', 'Teste', 'teste', '11:54:26', '2016-07-21');
INSERT INTO `mensagem` VALUES ('3', '2', '-1', 'Assunto da mensagem', 'jkhdkjahdkjashdkjahsdkjashdhsakjdhkajshdkahsdhjashdjhsakjdhakjsdjahskjsdkajhdkjahsdkjhaskdljhsalkdjhsalkdhaskljdhsakjhdakjshdhakjhdklajshdljsahdkjahsdlkjashd', '12:27:04', '2016-07-21');
INSERT INTO `mensagem` VALUES ('4', '4', '1', 'Teste', 'Natan', '15:23:02', '2016-07-21');
INSERT INTO `mensagem` VALUES ('5', '4', '4', 'Teste', 'Natan1', '15:41:39', '2016-07-21');
INSERT INTO `mensagem` VALUES ('6', '4', '4', 'todos', 'todos', '15:42:19', '2016-07-21');
INSERT INTO `mensagem` VALUES ('7', '4', '4', 'anyone', 'este2', '15:42:45', '2016-07-21');
INSERT INTO `mensagem` VALUES ('8', '5', '4', 'Teste', 'c', '19:03:55', '2016-07-21');
INSERT INTO `mensagem` VALUES ('9', '2', '4', 'Teste', 'Teste', '00:00:00', '0000-00-00');
INSERT INTO `mensagem` VALUES ('10', '7', '-1', 'Teste Status', 'Mussum Ipsum, cacilds vidis litro abertis. Ta deprimidis, eu conheÃ§o uma cachacis que pode alegrar sua vidis.â€ Nec orci ornare consequat. Praesent lacinia ultrices consectetur. Sed non ipsum felis. Casamentiss faiz malandris se pirulitÃ¡. Per aumento de cachacis, eu reclamis.', '22:11:27', '2016-07-22');
INSERT INTO `mensagem` VALUES ('11', '7', '-1', 'Teste de Status', '2 Mussum Ipsum, cacilds vidis litro abertis. Ta deprimidis, eu conheÃ§o uma cachacis que pode alegrar sua vidis.â€ Nec orci ornare consequat. Praesent lacinia ultrices consectetur. Sed non ipsum felis. Casamentiss faiz malandris se pirulitÃ¡. Per aumento de cachacis, eu reclamis.', '22:14:47', '2016-07-22');
INSERT INTO `mensagem` VALUES ('42', '7', '-1', 'Teste', 'tesuysgkjsdn', '23:10:55', '2016-07-22');
INSERT INTO `mensagem` VALUES ('43', '7', '-1', 'Teste', 'tesuysgkjsdn', '23:10:55', '2016-07-22');
INSERT INTO `mensagem` VALUES ('44', '7', '-1', 'Teste', 'tesuysgkjsdn', '23:10:55', '2016-07-22');
INSERT INTO `mensagem` VALUES ('45', '7', '-1', 'Teste', 'tesuysgkjsdn', '23:10:55', '2016-07-22');
INSERT INTO `mensagem` VALUES ('46', '7', '-1', 'Teste', 'tesuysgkjsdn', '23:10:55', '2016-07-22');
INSERT INTO `mensagem` VALUES ('47', '7', '-1', 'assunto', 'aiush', '23:34:02', '2016-07-22');
INSERT INTO `mensagem` VALUES ('48', '7', '-1', 'Teste de mensagem', 'teseidejk', '23:34:55', '2016-07-22');
INSERT INTO `mensagem` VALUES ('49', '7', '-1', 'Teste de mensagem', 'teseidejk', '23:34:55', '2016-07-22');
INSERT INTO `mensagem` VALUES ('50', '7', '-1', 'Teste de mensagem', 'teseidejk', '23:34:55', '2016-07-22');
INSERT INTO `mensagem` VALUES ('51', '7', '7', 'teste ', 'teste', '23:39:30', '2016-07-22');
INSERT INTO `mensagem` VALUES ('52', '8', '7', 'jose', 'teste', '23:41:43', '2016-07-22');
INSERT INTO `mensagem` VALUES ('53', '7', '-1', 'Status de teste', 'teste de status', '23:43:05', '2016-07-22');
INSERT INTO `mensagem` VALUES ('54', '8', '-1', 'teste2', 'teste4', '23:54:03', '2016-07-22');

-- ----------------------------
-- Table structure for `status`
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `id_mensagem` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `status_mensagem` int(1) NOT NULL,
  PRIMARY KEY (`id_status`),
  KEY `FK_mensagem` (`id_mensagem`),
  KEY `FK_destinatario` (`id_usuario`),
  CONSTRAINT `FK_mensagem` FOREIGN KEY (`id_mensagem`) REFERENCES `mensagem` (`id_mensagem`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_destinatario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=346 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES ('29', '6', '4', '0');
INSERT INTO `status` VALUES ('30', '7', '4', '0');
INSERT INTO `status` VALUES ('31', '8', '4', '0');
INSERT INTO `status` VALUES ('32', '9', '4', '0');
INSERT INTO `status` VALUES ('33', '9', '4', '0');
INSERT INTO `status` VALUES ('34', '1', '4', '0');
INSERT INTO `status` VALUES ('35', '2', '4', '0');
INSERT INTO `status` VALUES ('36', '3', '4', '0');
INSERT INTO `status` VALUES ('38', '3', '7', '1');
INSERT INTO `status` VALUES ('39', '2', '7', '1');
INSERT INTO `status` VALUES ('40', '1', '7', '1');
INSERT INTO `status` VALUES ('41', '2', '7', '1');
INSERT INTO `status` VALUES ('42', '1', '7', '0');
INSERT INTO `status` VALUES ('79', '45', '7', '0');
INSERT INTO `status` VALUES ('80', '46', '7', '0');
INSERT INTO `status` VALUES ('81', '11', '7', '0');
INSERT INTO `status` VALUES ('82', '10', '7', '0');
INSERT INTO `status` VALUES ('83', '3', '7', '0');
INSERT INTO `status` VALUES ('84', '2', '7', '0');
INSERT INTO `status` VALUES ('85', '1', '7', '0');
INSERT INTO `status` VALUES ('99', '48', '7', '3');
INSERT INTO `status` VALUES ('100', '49', '7', '3');
INSERT INTO `status` VALUES ('101', '48', '8', '1');
INSERT INTO `status` VALUES ('102', '49', '8', '0');
INSERT INTO `status` VALUES ('103', '50', '8', '0');
INSERT INTO `status` VALUES ('104', '47', '8', '0');
INSERT INTO `status` VALUES ('105', '42', '8', '0');
INSERT INTO `status` VALUES ('106', '43', '8', '0');
INSERT INTO `status` VALUES ('107', '44', '8', '0');
INSERT INTO `status` VALUES ('108', '45', '8', '0');
INSERT INTO `status` VALUES ('109', '46', '8', '0');
INSERT INTO `status` VALUES ('110', '11', '8', '0');
INSERT INTO `status` VALUES ('111', '10', '8', '0');
INSERT INTO `status` VALUES ('112', '3', '8', '0');
INSERT INTO `status` VALUES ('113', '2', '8', '0');
INSERT INTO `status` VALUES ('114', '1', '8', '0');
INSERT INTO `status` VALUES ('115', '52', '7', '0');
INSERT INTO `status` VALUES ('116', '51', '7', '1');
INSERT INTO `status` VALUES ('117', '53', '7', '3');
INSERT INTO `status` VALUES ('118', '53', '8', '1');
INSERT INTO `status` VALUES ('119', '54', '8', '3');
INSERT INTO `status` VALUES ('120', '54', '7', '1');
INSERT INTO `status` VALUES ('217', '54', '9', '0');
INSERT INTO `status` VALUES ('218', '53', '9', '0');
INSERT INTO `status` VALUES ('219', '48', '9', '0');
INSERT INTO `status` VALUES ('220', '49', '9', '0');
INSERT INTO `status` VALUES ('221', '50', '9', '0');
INSERT INTO `status` VALUES ('222', '47', '9', '0');
INSERT INTO `status` VALUES ('223', '42', '9', '0');
INSERT INTO `status` VALUES ('224', '43', '9', '0');
INSERT INTO `status` VALUES ('225', '44', '9', '0');
INSERT INTO `status` VALUES ('226', '45', '9', '0');
INSERT INTO `status` VALUES ('227', '46', '9', '0');
INSERT INTO `status` VALUES ('228', '11', '9', '0');
INSERT INTO `status` VALUES ('229', '10', '9', '0');
INSERT INTO `status` VALUES ('230', '3', '9', '0');
INSERT INTO `status` VALUES ('231', '2', '9', '0');
INSERT INTO `status` VALUES ('232', '1', '9', '0');
INSERT INTO `status` VALUES ('265', '54', '10', '0');
INSERT INTO `status` VALUES ('266', '53', '10', '0');
INSERT INTO `status` VALUES ('267', '48', '10', '0');
INSERT INTO `status` VALUES ('268', '49', '10', '0');
INSERT INTO `status` VALUES ('269', '50', '10', '0');
INSERT INTO `status` VALUES ('270', '47', '10', '0');
INSERT INTO `status` VALUES ('271', '42', '10', '0');
INSERT INTO `status` VALUES ('272', '43', '10', '0');
INSERT INTO `status` VALUES ('273', '44', '10', '0');
INSERT INTO `status` VALUES ('274', '45', '10', '0');
INSERT INTO `status` VALUES ('275', '46', '10', '0');
INSERT INTO `status` VALUES ('276', '11', '10', '0');
INSERT INTO `status` VALUES ('277', '10', '10', '0');
INSERT INTO `status` VALUES ('278', '3', '10', '0');
INSERT INTO `status` VALUES ('279', '2', '10', '0');
INSERT INTO `status` VALUES ('280', '1', '10', '0');

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(50) NOT NULL,
  `senha_usuario` varchar(40) NOT NULL,
  `matricula_usuario` varchar(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'Natan1', 'natan@teste.com', '97fcc7c4f1df18696b23ef9a44efc36482e9e51a', '20142016002');
INSERT INTO `usuario` VALUES ('2', 'Natan Macedo', 'teste@teste.com', '97fcc7c4f1df18696b23ef9a44efc36482e9e51a', '201301203');
INSERT INTO `usuario` VALUES ('3', 'teste1', 'teste1@teste.com', '3957e302fd7d2a05ef69ba18b6d34ed4d1f4713e', '9081982');
INSERT INTO `usuario` VALUES ('4', 'Natan', 't@t.com', '2e6f9b0d5885b6010f9167787445617f553a735f', '1234');
INSERT INTO `usuario` VALUES ('5', 'Elias', 'elias@gmail.com', '2e6f9b0d5885b6010f9167787445617f553a735f', '201402130');
INSERT INTO `usuario` VALUES ('6', 'Natan123', 't@t.com', '2e6f9b0d5885b6010f9167787445617f553a735f', '1234');
INSERT INTO `usuario` VALUES ('7', 'Elias Alves', 'elias@mail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'elias');
INSERT INTO `usuario` VALUES ('8', 'JosÃ©', 'jose@mail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');
INSERT INTO `usuario` VALUES ('9', 'JosuÃ©', 'josue@mail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'qqcoisa');
INSERT INTO `usuario` VALUES ('10', 'Cardoso', 'cardoso@mail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'unixelias@g');

-- ----------------------------
-- Procedure structure for `status`
-- ----------------------------
DROP PROCEDURE IF EXISTS `status`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `status`(IN `id` int)
BEGIN
	DECLARE id_mens INT(11);
	SELECT DISTINCT MAX(id_mensagem) INTO id_mens FROM mensagem;

	INSERT INTO status (
			id_mensagem,
			id_usuario
		)
		VALUES (
			id_mens,
			id
		);


END
;;
DELIMITER ;
