/*
Navicat MySQL Data Transfer

Source Server         : nxstep
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mural_nxstep

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-07-22 00:35:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mensagem
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
  CONSTRAINT `FK_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mensagem
-- ----------------------------
INSERT INTO `mensagem` VALUES ('1', '1', '-1', 'Teste', 'teste', '00:04:47', '2016-07-21');
INSERT INTO `mensagem` VALUES ('2', '5', '-1', 'Teste', 'teste', '11:54:26', '2016-07-21');
INSERT INTO `mensagem` VALUES ('3', '2', '-1', 'Assunto da mensagem', 'jkhdkjahdkjashdkjahsdkjashdhsakjdhkajshdkahsdhjashdjhsakjdhakjsdjahskjsdkajhdkjahsdkjhaskdljhsalkdjhsalkdhaskljdhsakjhdakjshdhakjhdklajshdljsahdkjahsdlkjashd', '12:27:04', '2016-07-21');
INSERT INTO `mensagem` VALUES ('4', '4', '1', 'Teste', 'Natan', '15:23:02', '2016-07-21');
INSERT INTO `mensagem` VALUES ('5', '4', '5', 'Teste', 'Natan1', '15:41:39', '2016-07-21');
INSERT INTO `mensagem` VALUES ('6', '4', '5', 'todos', 'todos', '15:42:19', '2016-07-21');
INSERT INTO `mensagem` VALUES ('7', '4', '5', 'anyone', 'este2', '15:42:45', '2016-07-21');
INSERT INTO `mensagem` VALUES ('8', '5', '5', 'Teste', 'c', '19:03:55', '2016-07-21');
INSERT INTO `mensagem` VALUES ('9', '2', '5', 'Teste', 'Teste', '00:00:00', '0000-00-00');

-- ----------------------------
-- Table structure for status
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
  CONSTRAINT `FK_destinatario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE,
  CONSTRAINT `FK_mensagem` FOREIGN KEY (`id_mensagem`) REFERENCES `mensagem` (`id_mensagem`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES ('26', '1', '4', '1');
INSERT INTO `status` VALUES ('27', '2', '4', '0');
INSERT INTO `status` VALUES ('28', '3', '4', '0');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(50) NOT NULL,
  `senha_usuario` varchar(40) NOT NULL,
  `matricula_usuario` varchar(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'Natan1', 'natan@teste.com', '97fcc7c4f1df18696b23ef9a44efc36482e9e51a', '20142016002');
INSERT INTO `usuario` VALUES ('2', 'Natan Macedo', 'teste@teste.com', '97fcc7c4f1df18696b23ef9a44efc36482e9e51a', '201301203');
INSERT INTO `usuario` VALUES ('3', 'teste1', 'teste1@teste.com', '3957e302fd7d2a05ef69ba18b6d34ed4d1f4713e', '9081982');
INSERT INTO `usuario` VALUES ('4', 'Natan', 't@t.com', '2e6f9b0d5885b6010f9167787445617f553a735f', '1234');
INSERT INTO `usuario` VALUES ('5', 'Elias', 'elias@gmail.com', '2e6f9b0d5885b6010f9167787445617f553a735f', '201402130');
INSERT INTO `usuario` VALUES ('6', 'Natan123', 't@t.com', '2e6f9b0d5885b6010f9167787445617f553a735f', '1234');
