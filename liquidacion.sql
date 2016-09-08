/*
SQLyog Community v12.2.5 (64 bit)
MySQL - 10.1.16-MariaDB : Database - liquidacion
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`liquidacion` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;

USE `liquidacion`;

/*Table structure for table `certificacion` */

DROP TABLE IF EXISTS `certificacion`;

CREATE TABLE `certificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:',
  `id_empleado` int(11) NOT NULL COMMENT 'Empleado Id:',
  `id_estado` int(11) NOT NULL COMMENT 'estado Id:',
  PRIMARY KEY (`id`),
  KEY `FK_certificacion_empleado` (`id_empleado`),
  KEY `FK_certificacion_estado` (`id_estado`),
  CONSTRAINT `FK_certificacion_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `certificacion_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `certificacion` */

insert  into `certificacion`(`id`,`id_empleado`,`id_estado`) values 

(2,1,1);

/*Table structure for table `departamento` */

DROP TABLE IF EXISTS `departamento`;

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:',
  `nombre_dept` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Nombre del departamento:',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `departamento` */

insert  into `departamento`(`id`,`nombre_dept`) values 

(1,'lol');

/*Table structure for table `empleado` */

DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id:',
  `id_certificacion` int(11) NOT NULL COMMENT 'Id de certificacion:',
  `nombre` varchar(56) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre:',
  `apellido_m` varchar(128) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido Materno:',
  `apellido_p` varchar(128) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido Paterno:',
  `seguro_social` int(11) NOT NULL COMMENT 'Seguro Social:',
  `nombramiento` varchar(128) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombramiento:',
  `puesto` varchar(56) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Puesto que ocupa:',
  `oficina_division` varchar(56) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Oficina o división:',
  `fecha_empleado` int(11) DEFAULT NULL COMMENT 'Fecha del cese o cambio:',
  `razon_cese` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Razón de cese:',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_empleado_cert` (`id_certificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `empleado` */

insert  into `empleado`(`id`,`id_certificacion`,`nombre`,`apellido_m`,`apellido_p`,`seguro_social`,`nombramiento`,`puesto`,`oficina_division`,`fecha_empleado`,`razon_cese`,`created_at`,`updated_at`) values 

(1,1,'lol','tu','no',2147483647,'ayre','mago','izq',978676,'muerte',NULL,NULL);

/*Table structure for table `empleado_supervisor` */

DROP TABLE IF EXISTS `empleado_supervisor`;

CREATE TABLE `empleado_supervisor` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:',
  `empleado_id` int(11) DEFAULT NULL COMMENT 'Empleado Id:',
  `supervisor_id` int(11) DEFAULT NULL COMMENT 'Supervisor Id:',
  PRIMARY KEY (`id`),
  KEY `empleado_id` (`empleado_id`),
  KEY `supervisor_id` (`supervisor_id`),
  CONSTRAINT `empleado_supervisor_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `empleado_supervisor_ibfk_2` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `empleado_supervisor` */

/*Table structure for table `estado` */

DROP TABLE IF EXISTS `estado`;

CREATE TABLE `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:',
  `estado` varchar(56) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Estado:',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `estado` */

insert  into `estado`(`id`,`estado`) values 

(1,'Forma Sometida');

/*Table structure for table `firmas` */

DROP TABLE IF EXISTS `firmas`;

CREATE TABLE `firmas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:',
  `id_supervisor` int(11) NOT NULL COMMENT 'Supervisor Id:',
  `id_certificacion` int(11) NOT NULL COMMENT 'Certificacion Id:',
  `firma` tinyint(1) NOT NULL COMMENT 'Firma:',
  `fecha_firma` int(11) DEFAULT NULL COMMENT 'Fecha:',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_firmas_cert` (`id_certificacion`),
  KEY `FK_firmas_super` (`id_supervisor`),
  CONSTRAINT `FK_firmas_super` FOREIGN KEY (`id_supervisor`) REFERENCES `supervisor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `firmas_ibfk_1` FOREIGN KEY (`id_certificacion`) REFERENCES `certificacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `firmas` */

/*Table structure for table `preguntas` */

DROP TABLE IF EXISTS `preguntas`;

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:',
  `id_dept` int(11) NOT NULL COMMENT 'Departamento Id:',
  `pregunta` mediumtext COLLATE utf8_spanish_ci NOT NULL COMMENT 'Pregunta:',
  `no_bool` int(1) DEFAULT NULL COMMENT 'No',
  `si_bool` int(1) DEFAULT NULL COMMENT 'Sí',
  `na_bool` int(1) DEFAULT NULL COMMENT 'N/A',
  PRIMARY KEY (`id`),
  KEY `FK_preguntas_dept` (`id_dept`),
  CONSTRAINT `FK_preguntas_dept` FOREIGN KEY (`id_dept`) REFERENCES `departamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `preguntas` */

insert  into `preguntas`(`id`,`id_dept`,`pregunta`,`no_bool`,`si_bool`,`na_bool`) values 

(1,1,'Pregunta 111111 Dept 1',NULL,NULL,NULL),

(2,1,'Preunta 22222 Dept 1',NULL,NULL,NULL);

/*Table structure for table `resultado` */

DROP TABLE IF EXISTS `resultado`;

CREATE TABLE `resultado` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:',
  `id_supervisor` int(11) NOT NULL COMMENT 'Supervisor Id:',
  `id_certificacion` int(11) NOT NULL COMMENT 'Certidicación Id:',
  `resultado` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Resultado:',
  `comentario` mediumtext COLLATE utf8_spanish_ci COMMENT 'Explicación:',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_resultado_super` (`id_supervisor`),
  KEY `FK_resultado_cert` (`id_certificacion`),
  CONSTRAINT `FK_resultado_cert` FOREIGN KEY (`id_certificacion`) REFERENCES `certificacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_resultado_super` FOREIGN KEY (`id_supervisor`) REFERENCES `supervisor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `resultado` */

insert  into `resultado`(`id`,`id_supervisor`,`id_certificacion`,`resultado`,`comentario`,`created_at`,`updated_at`) values 

(4,1,2,'si','fxgvgx',1473288966,1473288966),

(5,1,2,'si','fgszg',1473288966,1473288966),

(6,1,2,'si','fxgvgx',1473289213,1473289213),

(7,1,2,'si','fgszg',1473289213,1473289213);

/*Table structure for table `supervisor` */

DROP TABLE IF EXISTS `supervisor`;

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:',
  `id_dept` int(11) NOT NULL COMMENT 'Departamento Id:',
  `nombre_sup` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Nombre del supervisor:',
  `apellido_m_sup` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Apellido materno del superrvisor:',
  `apellido_p_sup` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Apellido paterno del supervisor',
  PRIMARY KEY (`id`),
  KEY `FK_supervisor_dept` (`id_dept`),
  CONSTRAINT `FK_supervisor_dept` FOREIGN KEY (`id_dept`) REFERENCES `departamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `supervisor` */

insert  into `supervisor`(`id`,`id_dept`,`nombre_sup`,`apellido_m_sup`,`apellido_p_sup`) values 

(1,1,'Sup1',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;