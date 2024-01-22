/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - prueba_tecnica_hotel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`prueba_tecnica_hotel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `prueba_tecnica_hotel`;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id_cliente` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_apellido` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `clientes` */

insert  into `clientes`(`id_cliente`,`nombre_apellido`,`telefono`,`correo`,`estado`) values 
(2,'esteban russo','234234234','Nasdasd@asdasd.com',0),
(3,'cesar peres','234234234','cesar@asd.com',0),
(17,'feliciano lopec','12345','feliciano@lopez.com',0),
(18,'feliciano lopec','12345','feliciano@lopez.com',0),
(19,'feliciano lopec','12345','feliciano@lopez.com',0),
(20,'feliciano lopec','12345','feliciano@lopez.com',0),
(21,'asdasd','asdasd','asdasd@asdasd',0),
(22,'asdasd','asdasd','asdasd@asdasd',0),
(23,'asdasd','asdasd','asdasd@asdasd',0),
(24,'asdasd','asdasd','asdasd@asdasd',0),
(25,'parce otero','123123','parce@otero.com',0),
(26,'parce otero','123123','parce@otero.com',0),
(27,'oscar benito','34567890','oscar@benito.com',0);

/*Table structure for table `habitaciones` */

DROP TABLE IF EXISTS `habitaciones`;

CREATE TABLE `habitaciones` (
  `id_habitacion` int(10) NOT NULL AUTO_INCREMENT,
  `numero_cuarto` decimal(10,0) NOT NULL,
  `precio` float NOT NULL,
  `disponibilidad` int(1) NOT NULL,
  PRIMARY KEY (`id_habitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `habitaciones` */

insert  into `habitaciones`(`id_habitacion`,`numero_cuarto`,`precio`,`disponibilidad`) values 
(1,1,100,0),
(2,2,200,0),
(3,3,300,1),
(4,4,400,0),
(5,5,500,0);

/*Table structure for table `reservas` */

DROP TABLE IF EXISTS `reservas`;

CREATE TABLE `reservas` (
  `id_reserva` int(10) NOT NULL AUTO_INCREMENT,
  `habitacion_id` int(10) NOT NULL,
  `cliente_id` int(10) NOT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `fk_reserva_habitaciones` (`habitacion_id`),
  KEY `fk_reserva_cliente` (`cliente_id`),
  CONSTRAINT `fk_reserva_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`),
  CONSTRAINT `fk_reserva_habitaciones` FOREIGN KEY (`habitacion_id`) REFERENCES `habitaciones` (`id_habitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `reservas` */

insert  into `reservas`(`id_reserva`,`habitacion_id`,`cliente_id`,`check_in`,`check_out`) values 
(5,2,2,'2024-02-15','2024-02-20'),
(7,4,3,'2024-01-25','2024-01-30'),
(14,1,17,'2024-01-01','2024-01-01'),
(15,1,18,'2024-01-01','2024-01-01'),
(16,1,19,'2024-01-01','2024-01-01'),
(17,1,20,'2024-01-01','2024-01-01'),
(18,5,21,'2024-01-20','2024-01-23'),
(19,5,22,'2024-01-20','2024-01-23'),
(20,5,24,'2024-01-20','2024-01-23'),
(21,2,26,'2024-02-21','2024-02-28'),
(22,5,27,'2024-03-01','2024-01-05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
