/*
Navicat MySQL Data Transfer

Source Server         : treinamento14.05.16
Source Server Version : 50137
Source Host           : localhost:3306
Source Database       : mural_nxstep

Target Server Type    : MYSQL
Target Server Version : 50137
File Encoding         : 65001

Date: 2016-07-14 13:07:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `mensagem`
-- ----------------------------
DROP TABLE IF EXISTS `mensagem`;
CREATE TABLE `mensagem` (
  `id_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `assunto_mensagem` varchar(70) NOT NULL,
  `conteudo_mensagem` varchar(1024) NOT NULL,
  `hora_mensagem` time NOT NULL,
  `data_mensagem` date NOT NULL,
  PRIMARY KEY (`id_mensagem`),
  KEY `FK_usuario` (`id_usuario`),
  CONSTRAINT `FK_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mensagem
-- ----------------------------
INSERT INTO `mensagem` VALUES ('1', '1', '', 'teste', '12:34:00', '2016-07-14');

-- ----------------------------
-- Table structure for `status`
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `id_mensagem` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `status_mensagem` binary(1) NOT NULL,
  PRIMARY KEY (`id_status`),
  KEY `FK_mensagem` (`id_mensagem`),
  KEY `FK_destinatario` (`id_usuario`),
  CONSTRAINT `FK_mensagem` FOREIGN KEY (`id_mensagem`) REFERENCES `mensagem` (`id_mensagem`) ON UPDATE CASCADE,
  CONSTRAINT `FK_destinatario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of status
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'natan', 'natantur7@gmail.com', '1234', '20142016002');
