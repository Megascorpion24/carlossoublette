-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: colegiocarlossoublette
-- ------------------------------------------------------
-- Server version 	10.4.28-MariaDB
-- Date: Tue, 16 Jan 2024 19:18:58 +0100

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40101 SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `años`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `años` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anos` varchar(50) NOT NULL,
  `turnos` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `años`
--

LOCK TABLES `años` WRITE;
/*!40000 ALTER TABLE `años` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `años` VALUES (1,'1','tarde',1),(2,'2','mañana',1),(3,'5','tarde',1),(4,'3','tarde',1),(5,'4','tarde',1),(16,'6','tarde',1);
/*!40000 ALTER TABLE `años` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `años` with 6 row(s)
--

--
-- Table structure for table `años_materias`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `años_materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(50) NOT NULL,
  `id_anos` int(11) NOT NULL,
  `id_materias` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_anos` (`id_anos`),
  KEY `id_materias_2` (`id_materias`),
  CONSTRAINT `años_materias_ibfk_1` FOREIGN KEY (`id_anos`) REFERENCES `años` (`id`),
  CONSTRAINT `años_materias_ibfk_2` FOREIGN KEY (`id_materias`) REFERENCES `materias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `años_materias`
--

LOCK TABLES `años_materias` WRITE;
/*!40000 ALTER TABLE `años_materias` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `años_materias` VALUES (1,0,1,13),(2,0,3,14),(3,0,4,15);
/*!40000 ALTER TABLE `años_materias` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `años_materias` with 3 row(s)
--

--
-- Table structure for table `ano_academico`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ano_academico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_ini` date NOT NULL,
  `fecha_cierr` date NOT NULL,
  `ano_academico` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ano_academico`
--

LOCK TABLES `ano_academico` WRITE;
/*!40000 ALTER TABLE `ano_academico` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `ano_academico` VALUES (1,'2024-01-01','2024-01-31','2023-2024',1);
/*!40000 ALTER TABLE `ano_academico` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `ano_academico` with 1 row(s)
--

--
-- Table structure for table `ano_estudiantes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ano_estudiantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ano` int(11) NOT NULL,
  `id_estudiantes` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ano_2` (`id_ano`),
  KEY `id_estudiantes_2` (`id_estudiantes`),
  CONSTRAINT `ano_estudiantes_ibfk_1` FOREIGN KEY (`id_estudiantes`) REFERENCES `estudiantes` (`cedula`),
  CONSTRAINT `ano_estudiantes_ibfk_2` FOREIGN KEY (`id_ano`) REFERENCES `ano_academico` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ano_estudiantes`
--

LOCK TABLES `ano_estudiantes` WRITE;
/*!40000 ALTER TABLE `ano_estudiantes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `ano_estudiantes` VALUES (18,1,'11111111'),(19,1,'22222222'),(20,1,'33333333');
/*!40000 ALTER TABLE `ano_estudiantes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `ano_estudiantes` with 3 row(s)
--

--
-- Table structure for table `ano_horario`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ano_horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ano` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ano_2` (`id_ano`),
  KEY `id_horario_2` (`id_horario`),
  CONSTRAINT `ano_horario_ibfk_1` FOREIGN KEY (`id_ano`) REFERENCES `ano_academico` (`id`),
  CONSTRAINT `ano_horario_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `horario_secciones` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ano_horario`
--

LOCK TABLES `ano_horario` WRITE;
/*!40000 ALTER TABLE `ano_horario` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `ano_horario` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `ano_horario` with 0 row(s)
--

--
-- Table structure for table `ano_secciones`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ano_secciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anos` int(11) NOT NULL,
  `id_secciones` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_anos_2` (`id_anos`),
  KEY `id_secciones_2` (`id_secciones`),
  CONSTRAINT `ano_secciones_ibfk_1` FOREIGN KEY (`id_anos`) REFERENCES `ano_academico` (`id`),
  CONSTRAINT `ano_secciones_ibfk_2` FOREIGN KEY (`id_secciones`) REFERENCES `secciones_años` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ano_secciones`
--

LOCK TABLES `ano_secciones` WRITE;
/*!40000 ALTER TABLE `ano_secciones` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `ano_secciones` VALUES (1,1,29),(2,1,30);
/*!40000 ALTER TABLE `ano_secciones` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `ano_secciones` with 2 row(s)
--

--
-- Table structure for table `bitacora`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `accion` text NOT NULL,
  `modulo` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario_2` (`id_usuario`),
  CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1179 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bitacora` VALUES (1000,'2023-10-05','se elimino un representante','representantes',27),(1001,'2023-10-05','se elimino un usuario','usuarios',27),(1003,'2023-10-10','se registro un pago','docentes',27),(1004,'2023-10-10','se elimino un pago','docentes',27),(1005,'2023-10-10','se inscribio un estudiante','inscripciones',27),(1006,'2023-10-10','se registro un pago','docentes',27),(1007,'2023-10-11','se registro un pago','docentes',27),(1008,'2023-10-11','se registro un pago','docentes',27),(1009,'2023-10-14','se registro un pago','docentes',27),(1010,'2023-10-14','se registro un pago','docentes',27),(1011,'2023-10-14','se elimino un pago','docentes',27),(1012,'2023-10-14','se modifico un pago','docentes',27),(1013,'2023-10-14','se modifico un pago','docentes',27),(1014,'2023-10-17','se elimino un estudiante','inscripciones',27),(1015,'2023-10-19','se inscribio un estudiante','inscripciones',27),(1016,'2023-10-19','se inscribio un estudiante','inscripciones',27),(1017,'2023-10-19','se inscribio un estudiante','inscripciones',27),(1018,'2023-10-19','se inscribio un estudiante','inscripciones',27),(1019,'2023-10-19','se registraron permisos','seguridad',27),(1020,'2023-10-19','se inscribio un estudiante','inscripciones',27),(1021,'2023-10-19','se inscribio un estudiante','inscripciones',27),(1022,'2023-10-19','se registro un pago','docentes',27),(1023,'2023-10-19','se registro un representante','representantes',27),(1024,'2023-10-19','se elimino un usuario','usuarios',27),(1026,'2023-10-30','se registro un representante','representantes',27),(1027,'2023-10-30','se registro un representante','representantes',27),(1028,'2023-10-30','se inscribio un estudiante','inscripciones',27),(1029,'2023-10-30','se inscribio un estudiante','inscripciones',27),(1030,'2023-10-30','se inscribio un estudiante','inscripciones',27),(1031,'2023-10-30','se registro un pago','docentes',32),(1032,'2023-10-30','se registro un pago','docentes',32),(1033,'2023-10-30','se registro un pago','docentes',33),(1034,'2023-10-30','se modifico un pago','docentes',27),(1035,'2023-10-30','se registro un pago','docentes',33),(1036,'2023-10-30','se registro un pago','docentes',32),(1037,'2023-10-31','se modifico un pago','docentes',27),(1038,'2023-10-31','se registro un pago','docentes',27),(1039,'2023-10-31','se registro un pago','docentes',27),(1040,'2023-10-31','se registro un pago','docentes',27),(1041,'2023-10-31','se registro un pago','docentes',27),(1042,'2023-10-31','se registro un pago','docentes',27),(1043,'2023-10-31','se registro un pago','docentes',27),(1044,'2023-10-31','se registro un pago','docentes',27),(1045,'2023-10-31','se registro un pago','docentes',27),(1046,'2023-10-31','se registro un pago','docentes',27),(1047,'2023-10-31','se registro un pago','docentes',27),(1048,'2023-10-31','se registro un pago','docentes',27),(1049,'2023-10-31','se registro un pago','docentes',27),(1050,'2023-10-31','se registro un pago','docentes',27),(1051,'2023-10-31','se registro un pago','docentes',27),(1052,'2023-10-31','se registro un pago','docentes',27),(1053,'2023-10-31','se registro un pago','docentes',27),(1054,'2023-10-31','se registro un pago','docentes',27),(1055,'2023-10-31','se registro un pago','docentes',27),(1056,'2023-10-31','se registro un pago','docentes',27),(1057,'2023-10-31','se registro un pago','docentes',27),(1058,'2023-10-31','se registro un pago','docentes',27),(1059,'2023-10-31','se registro un pago','docentes',27),(1060,'2023-10-31','se registro un pago','docentes',27),(1061,'2023-10-31','se registro un pago','docentes',27),(1062,'2023-10-31','se registro un pago','docentes',27),(1063,'2023-10-31','se registro un pago','docentes',27),(1064,'2023-10-31','se registro un pago','docentes',27),(1065,'2023-10-31','se registro un pago','docentes',27),(1066,'2023-10-31','se registro un pago','docentes',27),(1067,'2023-10-31','se registro un pago','docentes',27),(1068,'2023-10-31','se registro un pago','docentes',27),(1069,'2023-10-31','se registro un pago','docentes',27),(1070,'2023-10-31','se registro un pago','docentes',27),(1071,'2023-10-31','se registro un pago','docentes',27),(1072,'2023-10-31','se registro un pago','docentes',27),(1073,'2023-10-31','se modifico un pago','docentes',27),(1074,'2023-10-31','se modifico un pago','docentes',27),(1075,'2023-10-31','se modifico un pago','docentes',27),(1076,'2023-10-31','se registro un pago','docentes',27),(1077,'2023-10-31','se registro un pago','docentes',27),(1078,'2023-10-31','se registro un pago','docentes',27),(1079,'2023-10-31','se registro un pago','docentes',27),(1080,'2023-10-31','se registro un pago','docentes',32),(1081,'2023-10-31','se registro un pago','docentes',27),(1082,'2023-10-31','se registro un pago','docentes',27),(1083,'2023-10-31','se modifico un pago','docentes',27),(1084,'2023-11-01','se registro un pago','docentes',27),(1085,'2023-11-02','se registro un pago','docentes',27),(1086,'2023-11-03','se registro un pago','docentes',27),(1087,'2023-11-03','se registro un pago','docentes',27),(1088,'2023-11-03','se registro un pago','docentes',27),(1089,'2023-11-03','se registro un pago','docentes',27),(1090,'2023-11-03','se registro un pago','docentes',27),(1091,'2023-11-03','se registro un pago','docentes',27),(1092,'2023-11-03','se registro un pago','docentes',27),(1093,'2023-11-03','se registro un pago','docentes',27),(1094,'2023-11-03','se registro un pago','docentes',27),(1095,'2023-11-03','se registro un pago','docentes',27),(1096,'2023-11-03','se registro un pago','docentes',27),(1097,'2023-11-03','se registro un pago','docentes',27),(1098,'2023-11-03','se registro un pago','docentes',27),(1099,'2023-11-03','se registro un pago','docentes',27),(1100,'2023-11-03','se registro un pago','docentes',27),(1101,'2023-11-03','se registro un pago','docentes',27),(1102,'2023-11-04','se registro un pago','docentes',27),(1103,'2023-11-04','se registro un pago','docentes',27),(1104,'2023-11-04','se registro un pago','docentes',27),(1105,'2023-11-04','se registro un pago','docentes',27),(1106,'2023-11-04','se registro un pago','docentes',27),(1107,'2023-11-04','se registro un pago','docentes',27),(1108,'2023-11-04','se registro un pago','docentes',27),(1109,'2023-11-04','se registro un pago','docentes',27),(1110,'2023-11-04','se registro un pago','docentes',27),(1111,'2023-11-04','se registro un pago','docentes',27),(1112,'2023-11-04','se registro un pago','docentes',27),(1113,'2023-11-04','se registro un pago','docentes',27),(1114,'2023-11-04','se registro un pago','docentes',27),(1115,'2023-11-04','se registro un pago','docentes',27),(1116,'2023-11-04','se registro un pago','docentes',27),(1117,'2023-11-04','se registro un pago','docentes',27),(1118,'2023-11-04','se registro un pago','docentes',27),(1119,'2023-11-04','se registro un pago','docentes',27),(1120,'2023-11-04','se registro un pago','docentes',27),(1121,'2023-11-04','se registro un pago','docentes',27),(1122,'2023-11-04','se registro un pago','docentes',27),(1123,'2023-11-04','se registro un pago','docentes',27),(1124,'2023-11-04','se registro un pago','docentes',27),(1125,'2023-11-04','se registro un pago','docentes',27),(1126,'2023-11-04','se registro un pago','docentes',27),(1127,'2023-11-04','se registro un pago','docentes',27),(1128,'2023-11-04','se registro un pago','docentes',27),(1129,'2023-11-04','se registro un pago','docentes',27),(1130,'2023-11-04','se registro un pago','docentes',27),(1131,'2023-11-04','se registro un pago','docentes',33),(1132,'2023-11-04','se registro un pago','docentes',27),(1133,'2023-11-04','se modifico un pago','docentes',27),(1134,'2023-11-05','se registro un pago','docentes',32),(1135,'2023-11-05','se registro un pago','docentes',32),(1136,'2023-11-05','se registro un pago','docentes',32),(1137,'2023-11-05','se registro un pago','docentes',32),(1138,'2023-11-05','se registro un pago','docentes',32),(1139,'2023-11-05','se registro un pago','docentes',32),(1140,'2023-11-05','se registro un pago','docentes',32),(1141,'2023-11-05','se registro un pago','docentes',27),(1142,'2023-11-05','se registro un pago','docentes',27),(1143,'2023-11-05','se registro un pago','docentes',27),(1144,'2023-11-05','se registro un pago','docentes',27),(1145,'2023-11-05','se registro un pago','docentes',27),(1146,'2023-11-05','se registro un pago','docentes',27),(1147,'2023-11-05','se registro un pago','docentes',27),(1148,'2023-11-05','se registro un pago','docentes',27),(1149,'2023-11-05','se registro un pago','docentes',27),(1150,'2023-11-05','se registro un pago','docentes',27),(1151,'2023-11-05','se registro un pago','docentes',27),(1152,'2023-11-05','se registro un pago','docentes',27),(1153,'2023-11-05','se registro un pago','docentes',27),(1154,'2023-11-05','se registro un pago','docentes',27),(1155,'2023-11-05','se modifico un pago','docentes',27),(1156,'2023-11-05','se registro un pago','docentes',33),(1157,'2023-11-05','se registro un pago','docentes',33),(1158,'2023-11-05','se registro un pago','docentes',33),(1159,'2023-11-05','se registro un pago','docentes',32),(1160,'2023-11-05','se registro un pago','docentes',32),(1161,'2023-11-05','se modifico un pago','docentes',27),(1162,'2023-11-05','se modifico un pago','docentes',27),(1163,'2023-11-05','se modifico un pago','docentes',27),(1164,'2023-11-05','se modifico un pago','docentes',27),(1165,'2023-11-05','se modifico un pago','docentes',27),(1166,'2023-11-05','se registró una materia','materias',27),(1167,'2023-11-05','se registró una materia','materias',27),(1168,'2023-11-05','se elimino una materia','materias',27),(1169,'2023-11-05','se registró una materia','materias',27),(1170,'2023-11-05','se registro una seccion','secciones',27),(1171,'2023-11-05','se modifico datos adicionales de una seccion','secciones',27),(1172,'2023-11-05','se elimino una seccion','seccion',27),(1173,'2024-01-06','se registro una seccion','secciones',27),(1174,'2024-01-06','se registro un horario','horario_docente',27),(1175,'2024-01-06','se registro un pago','docentes',27),(1176,'2024-01-06','se registro un horario','horario_docente',27),(1177,'2024-01-12','se registró una materia','materias',27),(1178,'2024-01-12','se modificó Docente de una materia','materias',27);
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bitacora` with 177 row(s)
--

--
-- Table structure for table `deudas`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deudas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante` varchar(100) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `monto` int(10) NOT NULL,
  `estado` int(10) NOT NULL,
  `estado_deudas` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estudiante` (`id_estudiante`),
  CONSTRAINT `deudas_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deudas`
--

LOCK TABLES `deudas` WRITE;
/*!40000 ALTER TABLE `deudas` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `deudas` VALUES (51,'11111111','inscripcion','2023-10-30',2229,1,0),(52,'22222222','mensualidad','2023-11-29',0,1,0),(53,'33333333','inscripcion','2023-08-30',2250,1,0),(54,'11111111','mensualidad','2023-11-30',1000,1,0);
/*!40000 ALTER TABLE `deudas` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `deudas` with 4 row(s)
--

--
-- Table structure for table `docentes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docentes` (
  `cedula` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `categoria` varchar(250) NOT NULL,
  `fecha_nacimiento` varchar(20) NOT NULL,
  `especializacion` varchar(250) NOT NULL,
  `profecion` varchar(250) NOT NULL,
  `edad` varchar(20) NOT NULL,
  `anos_trabajo` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docentes`
--

LOCK TABLES `docentes` WRITE;
/*!40000 ALTER TABLE `docentes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `docentes` VALUES ('000033','qweqwe','qweqwe','qweqwe','2023-07-20','qweqwe','qweqwe','12','12','dejesus2018@gmail.com','ElCercado',0),('000101','María','Rodríguez','Docente','1981-06-12','Historia','Licenciada','41','19','maria.rodriguez@example.com','Calle 101',1),('000102','Pedro','García','Docente','1974-09-25','Geografía','Licenciado','48','21','pedro.garcia@example.com','Calle 102',1),('000103','Laura','Martínez','Docente','1987-02-18','Biología','Licenciada','35','13','laura.martinez@example.com','Calle 103',1),('000104','Carlos','Fernández','Docente','1978-12-05','Química','Licenciado','44','17','carlos.fernandez@example.com','Calle 104',1),('000105','Sofía','Hernández','Docente','1983-04-30','Arte','Licenciada','39','16','sofia.hernandez@example.com','Calle 105',1),('000106','Antonio','Gómez','Docente','1979-10-15','Educación Física','Licenciado','43','18','antonio.gomez@example.com','Calle 106',1),('300190123','santiago','casamayor','docente','2023-09-13','programacion','docevec','23','3','santiagocasamayor@gmail.com','sdaddas',0),('30019081','Luis','Perez','matematicas','2002','fisica','programador','21','2','santiagocasamayor14@gmail.com','calle51a entre 18 y 19',1),('30019082','santiago','casamayor','docente','2023-09-13','programacion','docevec','23','3','santiagocasamayor@gmail.com','sdaddas',1);
/*!40000 ALTER TABLE `docentes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `docentes` with 10 row(s)
--

--
-- Table structure for table `docente_guia`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docente_guia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_docente` varchar(50) NOT NULL,
  `id_ano_seccion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_docente_2` (`id_docente`),
  KEY `id_ano_seccion_2` (`id_ano_seccion`),
  CONSTRAINT `docente_guia_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`cedula`),
  CONSTRAINT `docente_guia_ibfk_2` FOREIGN KEY (`id_ano_seccion`) REFERENCES `secciones_años` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente_guia`
--

LOCK TABLES `docente_guia` WRITE;
/*!40000 ALTER TABLE `docente_guia` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `docente_guia` VALUES (1,'000033',29),(2,'000103',30);
/*!40000 ALTER TABLE `docente_guia` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `docente_guia` with 2 row(s)
--

--
-- Table structure for table `docente_horario`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docente_horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_docente` varchar(50) NOT NULL,
  `id_horario_docente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_docente_2` (`id_docente`),
  KEY `id_horio_docente_2` (`id_horario_docente`),
  CONSTRAINT `docente_horario_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`cedula`),
  CONSTRAINT `docente_horario_ibfk_2` FOREIGN KEY (`id_horario_docente`) REFERENCES `horario_docente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente_horario`
--

LOCK TABLES `docente_horario` WRITE;
/*!40000 ALTER TABLE `docente_horario` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `docente_horario` VALUES (1,'000033',1),(2,'000033',2),(3,'000033',3),(4,'000033',4),(5,'000033',5),(6,'000033',6),(7,'30019081',7),(8,'30019081',8),(9,'30019081',9),(10,'000033',10),(11,'000033',16),(12,'000102',17),(13,'000102',18);
/*!40000 ALTER TABLE `docente_horario` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `docente_horario` with 13 row(s)
--

--
-- Table structure for table `docente_horario_secciones`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docente_horario_secciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_docente` varchar(50) NOT NULL,
  `id_horario_secciones` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_docente_2` (`id_docente`),
  KEY `id_horario_secciones_2` (`id_horario_secciones`),
  CONSTRAINT `docente_horario_secciones_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`cedula`),
  CONSTRAINT `docente_horario_secciones_ibfk_2` FOREIGN KEY (`id_horario_secciones`) REFERENCES `horario_secciones` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente_horario_secciones`
--

LOCK TABLES `docente_horario_secciones` WRITE;
/*!40000 ALTER TABLE `docente_horario_secciones` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `docente_horario_secciones` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `docente_horario_secciones` with 0 row(s)
--

--
-- Table structure for table `dolar_venezuela`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dolar_venezuela` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dolar_venezuela`
--

LOCK TABLES `dolar_venezuela` WRITE;
/*!40000 ALTER TABLE `dolar_venezuela` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `dolar_venezuela` VALUES (1,37.5);
/*!40000 ALTER TABLE `dolar_venezuela` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `dolar_venezuela` with 1 row(s)
--

--
-- Table structure for table `estudiantes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiantes` (
  `cedula` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(50) NOT NULL,
  `observaciones` varchar(250) NOT NULL,
  `materias_pendientes` varchar(250) NOT NULL,
  `id_anos_secciones` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`cedula`),
  KEY `id_anos_secciones_2` (`id_anos_secciones`),
  CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`id_anos_secciones`) REFERENCES `secciones_años` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes`
--

LOCK TABLES `estudiantes` WRITE;
/*!40000 ALTER TABLE `estudiantes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `estudiantes` VALUES ('11111111','hijomanuel','hijomanuel',22,'hijomanuel','aprobado',1,1),('22222222','hijojesus','hijojesus',11,'hijojesus','aprobado',23,1),('33333333','otromanuel','otromanuel',23,'otromanuel','aprobado',1,1);
/*!40000 ALTER TABLE `estudiantes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `estudiantes` with 3 row(s)
--

--
-- Table structure for table `estudiantes_tutor`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiantes_tutor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiantes` varchar(50) NOT NULL,
  `id_tutor` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estudiantes` (`id_estudiantes`),
  KEY `id_tutor_2` (`id_tutor`),
  CONSTRAINT `estudiantes_tutor_ibfk_1` FOREIGN KEY (`id_estudiantes`) REFERENCES `estudiantes` (`cedula`),
  CONSTRAINT `estudiantes_tutor_ibfk_2` FOREIGN KEY (`id_tutor`) REFERENCES `tutor_legal` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes_tutor`
--

LOCK TABLES `estudiantes_tutor` WRITE;
/*!40000 ALTER TABLE `estudiantes_tutor` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `estudiantes_tutor` VALUES (5,'11111111','28621409'),(6,'22222222','28621408'),(7,'33333333','28621409');
/*!40000 ALTER TABLE `estudiantes_tutor` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `estudiantes_tutor` with 3 row(s)
--

--
-- Table structure for table `estudiante_ficha`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante_ficha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiantes` varchar(50) NOT NULL,
  `id_ficha` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estudiantes_2` (`id_estudiantes`),
  KEY `id_ficha_2` (`id_ficha`),
  CONSTRAINT `estudiante_ficha_ibfk_1` FOREIGN KEY (`id_ficha`) REFERENCES `ficha_medica` (`id`),
  CONSTRAINT `estudiante_ficha_ibfk_2` FOREIGN KEY (`id_estudiantes`) REFERENCES `estudiantes` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante_ficha`
--

LOCK TABLES `estudiante_ficha` WRITE;
/*!40000 ALTER TABLE `estudiante_ficha` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `estudiante_ficha` VALUES (6,'11111111',6),(7,'22222222',7),(8,'33333333',8);
/*!40000 ALTER TABLE `estudiante_ficha` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `estudiante_ficha` with 3 row(s)
--

--
-- Table structure for table `eventos`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_ini` date NOT NULL,
  `fecha_cierr` date NOT NULL,
  `evento` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `eventos` VALUES (1,'2023-12-02','2023-12-31','PrimerLapso',1);
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `eventos` with 1 row(s)
--

--
-- Table structure for table `eventos_ano`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos_ano` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(11) NOT NULL,
  `id_anos` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eventos_ano_ibfk_1` (`id_anos`),
  KEY `eventos_ano_ibfk_2` (`id_evento`),
  CONSTRAINT `eventos_ano_ibfk_1` FOREIGN KEY (`id_anos`) REFERENCES `ano_academico` (`id`),
  CONSTRAINT `eventos_ano_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos_ano`
--

LOCK TABLES `eventos_ano` WRITE;
/*!40000 ALTER TABLE `eventos_ano` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `eventos_ano` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `eventos_ano` with 0 row(s)
--

--
-- Table structure for table `ficha_medica`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficha_medica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tratamientos` varchar(250) NOT NULL,
  `alergias` varchar(250) NOT NULL,
  `medicamentos` varchar(250) NOT NULL,
  `enfermedades` varchar(250) NOT NULL,
  `operaciones` varchar(250) NOT NULL,
  `vacunas` varchar(250) NOT NULL,
  `tipo_de_sangre` varchar(250) NOT NULL,
  `condicion_medica` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha_medica`
--

LOCK TABLES `ficha_medica` WRITE;
/*!40000 ALTER TABLE `ficha_medica` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `ficha_medica` VALUES (1,'N/A','N/A','N/A','N/A','N/A','aprobado','N/A','N/A'),(2,'fsdfsdfsd','fsdfsdfsdf','sdfsdfsdf','fsdfsdfsdf','fsadfsdf','fasdasdasd','dasdasdasd','fsdfsdf'),(3,'ninguno','polvo','ninguno','ninguna','ninguna','aprobado','o','ninguna'),(4,'fsdfsdfsd','fsdfsdfsdf','sdfsdfsdf','fsdfsdfsdf','fsadfsdf','fasdasdasd','dasdasdasd','fsdfsdf'),(5,'aaaaaaaaaaaaaaaaaaaaaaaaaa','ssssssssssssssssssssssssss','ssssssssssssssssssssssssss','ssssssssssssssssssssssssss','asdasd','asdasdasd','asdasdasd','ssssssssssssssssssssssssss'),(6,'hijomanuel','hijomanuel','hijomanuel','hijomanuel','hijomanuel','hijomanuel','hijomanuel','hijomanuel'),(7,'hijojesus','hijojesus','hijojesus','hijojesus','hijojesus','hijojesus','hijojesus','hijojesus'),(8,'otromanuel','otromanuel','otromanuel','otromanuel','asdasd','otromanuel','otromanuel','otromanuel');
/*!40000 ALTER TABLE `ficha_medica` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `ficha_medica` with 8 row(s)
--

--
-- Table structure for table `horario_ano`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario_ano` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ano` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ano` (`id_ano`,`id_horario`),
  KEY `id_horario` (`id_horario`),
  CONSTRAINT `horario_ano_ibfk_1` FOREIGN KEY (`id_ano`) REFERENCES `ano_academico` (`id`),
  CONSTRAINT `horario_ano_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `horario_docente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario_ano`
--

LOCK TABLES `horario_ano` WRITE;
/*!40000 ALTER TABLE `horario_ano` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `horario_ano` VALUES (1,1,17),(2,1,18);
/*!40000 ALTER TABLE `horario_ano` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `horario_ano` with 2 row(s)
--

--
-- Table structure for table `horario_docente`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario_docente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clase_inicia` time NOT NULL,
  `clase_termina` time NOT NULL,
  `dia` int(1) NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `id_ano_seccion` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ano_seccion_2` (`id_ano_seccion`),
  CONSTRAINT `horario_docente_ibfk_1` FOREIGN KEY (`id_ano_seccion`) REFERENCES `secciones_años` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario_docente`
--

LOCK TABLES `horario_docente` WRITE;
/*!40000 ALTER TABLE `horario_docente` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `horario_docente` VALUES (1,'20:18:00','22:18:00',1,'2023-09-01','2023-09-30',5,0),(2,'21:33:00','12:33:00',3,'2023-09-01','2023-09-30',6,0),(3,'19:51:00','20:50:00',3,'2023-09-01','2023-09-30',6,0),(4,'21:00:00','22:01:00',2,'2023-09-01','2023-09-30',5,0),(5,'21:44:00','21:44:00',4,'2023-09-01','2023-09-30',6,0),(6,'22:01:00','23:01:00',1,'2023-09-01','2023-09-30',5,0),(7,'11:21:00','13:22:00',5,'2023-09-01','2023-09-30',7,0),(8,'01:55:00','04:55:00',5,'2023-09-01','2023-09-30',5,0),(9,'10:33:00','00:33:00',3,'2023-09-01','2023-09-30',7,0),(10,'15:47:00','17:47:00',4,'2023-09-21','2023-09-27',1,0),(11,'13:50:00','17:50:00',4,'2023-09-06','2023-09-28',6,1),(12,'12:53:00','17:50:00',3,'2023-09-05','2023-10-05',7,1),(13,'12:55:00','16:56:00',4,'2023-09-06','2023-09-29',1,1),(14,'14:53:00','18:53:00',4,'2023-09-13','2023-09-30',15,1),(15,'13:54:00','17:54:00',5,'2023-09-14','2023-10-07',8,1),(16,'13:55:00','15:55:00',4,'2023-09-14','2023-09-28',1,0),(17,'16:24:00','17:24:00',3,'2024-01-01','2024-01-31',30,1),(18,'15:39:00','17:39:00',2,'2024-01-01','2024-01-31',30,1);
/*!40000 ALTER TABLE `horario_docente` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `horario_docente` with 18 row(s)
--

--
-- Table structure for table `horario_secciones`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario_secciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora_inicio` varchar(100) NOT NULL,
  `hora_cierre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `id_ano_seccion` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ano_seccion_2` (`id_ano_seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario_secciones`
--

LOCK TABLES `horario_secciones` WRITE;
/*!40000 ALTER TABLE `horario_secciones` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `horario_secciones` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `horario_secciones` with 0 row(s)
--

--
-- Table structure for table `materias`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `materias` VALUES (5,'asdasdddaaaaaaaaa',1),(6,'asdasdasd',0),(7,'asdasdasdddd',0),(8,'xxxxxxxxxxxx',0),(9,'ddddddddddddd',0),(10,'ssssssss',0),(11,'xzxzxzxzxzx',0),(12,'asdasddd',0),(13,'MATEMATICA',1),(14,'INGLES',0),(15,'INGLES',1),(16,'BIOGRAFIA',1);
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `materias` with 12 row(s)
--

--
-- Table structure for table `materias_docentes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materias_docentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` int(2) NOT NULL,
  `id_materias` int(11) NOT NULL,
  `id_docente` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_materias_2` (`id_materias`),
  KEY `id_docente_2` (`id_docente`),
  CONSTRAINT `materias_docentes_ibfk_1` FOREIGN KEY (`id_materias`) REFERENCES `materias` (`id`),
  CONSTRAINT `materias_docentes_ibfk_2` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias_docentes`
--

LOCK TABLES `materias_docentes` WRITE;
/*!40000 ALTER TABLE `materias_docentes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `materias_docentes` VALUES (1,1,13,'30019082'),(2,1,14,'000102'),(3,1,14,'000104'),(4,0,14,'30019081'),(5,1,15,'000104'),(6,1,15,'000105'),(7,1,15,'30019081'),(8,1,15,'30019082'),(9,0,16,'000102'),(10,0,16,'000103');
/*!40000 ALTER TABLE `materias_docentes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `materias_docentes` with 10 row(s)
--

--
-- Table structure for table `materia_horario_docente`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia_horario_docente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_materias` int(11) NOT NULL,
  `id_horario_docente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_materias_2` (`id_materias`),
  KEY `id_horario_docente_2` (`id_horario_docente`),
  CONSTRAINT `materia_horario_docente_ibfk_1` FOREIGN KEY (`id_horario_docente`) REFERENCES `horario_docente` (`id`),
  CONSTRAINT `materia_horario_docente_ibfk_2` FOREIGN KEY (`id_materias`) REFERENCES `materias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia_horario_docente`
--

LOCK TABLES `materia_horario_docente` WRITE;
/*!40000 ALTER TABLE `materia_horario_docente` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `materia_horario_docente` VALUES (1,3,1),(2,2,2),(3,1,3),(4,2,4),(5,3,5),(6,1,6),(7,4,7),(8,2,8),(9,3,9),(10,1,10),(11,2,16),(12,15,17),(13,5,18);
/*!40000 ALTER TABLE `materia_horario_docente` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `materia_horario_docente` with 13 row(s)
--

--
-- Table structure for table `materi_horario_secciones`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materi_horario_secciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_materias` int(11) NOT NULL,
  `id_horario_secciones` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_materias_2` (`id_materias`),
  KEY `id_horario_secciones_2` (`id_horario_secciones`),
  CONSTRAINT `materi_horario_secciones_ibfk_1` FOREIGN KEY (`id_horario_secciones`) REFERENCES `horario_secciones` (`id`),
  CONSTRAINT `materi_horario_secciones_ibfk_2` FOREIGN KEY (`id_materias`) REFERENCES `materias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materi_horario_secciones`
--

LOCK TABLES `materi_horario_secciones` WRITE;
/*!40000 ALTER TABLE `materi_horario_secciones` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `materi_horario_secciones` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `materi_horario_secciones` with 0 row(s)
--

--
-- Table structure for table `montos`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `montos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `m_montos` int(11) NOT NULL,
  `d_montos` int(20) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `montos`
--

LOCK TABLES `montos` WRITE;
/*!40000 ALTER TABLE `montos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `montos` VALUES (1,'inscripcion',2250,60),(2,'mensualidad',1500,40);
/*!40000 ALTER TABLE `montos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `montos` with 2 row(s)
--

--
-- Table structure for table `notificaciones`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaciones`
--

LOCK TABLES `notificaciones` WRITE;
/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `notificaciones` VALUES (47,'hay una deuda pendiente con concepto de: inscripcion que corresponde al estudiante: sssssssss, 30019081',1,'pago de deuda','2023-10-18 22:32:28'),(48,'hay una deuda pendiente con concepto de: mensualidad que corresponde al estudiante: sssssssss, 30019081',1,'pago de deuda','2023-10-18 22:32:28');
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `notificaciones` with 2 row(s)
--

--
-- Table structure for table `pagos`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_deudas` int(11) NOT NULL,
  `identificador` int(100) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `fechad` date DEFAULT NULL,
  `concepto` varchar(50) NOT NULL,
  `forma` varchar(20) NOT NULL,
  `monto` int(11) NOT NULL,
  `meses` int(2) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `estado_pagos` int(11) NOT NULL,
  `estatus` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_deudas` (`id_deudas`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_deudas`) REFERENCES `deudas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3457 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `pagos` VALUES (3440,51,1112,'2023-10-30','2023-08-30','inscripcion','Transferencia',1111,1,'RETORNADO',1,0),(3443,54,2222,'2023-06-30','2023-05-30','mensualidad','Pago Movil',2222,2,'CONFIRMADO',1,0),(3456,53,1234,'2024-01-06','2023-08-30','inscripcion','Transf',2250,1,'Confirmado',1,1);
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `pagos` with 3 row(s)
--

--
-- Table structure for table `permisos`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `estado` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `permisos` VALUES (62,'registrar usuario','1'),(63,'modificar usuario','1'),(64,'eliminar usuario','1'),(65,'consultar usuario','1'),(66,'registrar docente','1'),(67,'modificar docente','1'),(68,'eliminar docente','1'),(69,'consultar docente','1'),(70,'registrar representante','1'),(71,'modificar representante','1'),(72,'eliminar representante','1'),(73,'consultar representante','1'),(74,'registrar pagos','1'),(75,'modificar pagos','1'),(76,'eliminar pagos','1'),(77,'consultar pagos','1'),(78,'registrar materias','1'),(79,'modificar materias','1'),(80,'eliminar materias','1'),(81,'consultar materias','1'),(82,'registrar anos','1'),(83,'modificar anos','1'),(84,'eliminar anos','1'),(85,'consultar anos','1'),(86,'registrar secciones','1'),(87,'modificar secciones','1'),(88,'eliminar secciones','1'),(89,'consultar secciones','1'),(90,'registrar horario_docente','1'),(91,'modificar horario_docente','1'),(92,'eliminar horario_docente','1'),(93,'consultar horario_docente','1'),(94,'registrar horario_seccion','1'),(95,'modificar horario_seccion','1'),(96,'eliminar horario_seccion','1'),(97,'consultar horario_seccion','1'),(98,'registrar inscipcion','1'),(99,'modificar inscipcion','1'),(100,'eliminar inscipcion','1'),(101,'consultar inscipcion','1'),(102,'registrar ano_academico','1'),(103,'modificar ano_academico','1'),(104,'eliminar ano_academico','1'),(105,'consultar ano_academico','1'),(106,'registrar seguridad','1'),(107,'modificar seguridad','1'),(108,'eliminar seguridad','1'),(109,'consultar seguridad','1'),(110,'permisos seguridad','1'),(111,'registrar pagos_tutor','1'),(112,'consultar pagos_tutor','1');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `permisos` with 51 row(s)
--

--
-- Table structure for table `rol`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `rol` VALUES (1,'tutor','tutor legal','1'),(3,'superusuario','tiene todos los permisos','1'),(19,'distribuidor','paolasssss','1');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `rol` with 3 row(s)
--

--
-- Table structure for table `rol_permiso`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol_permiso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rol` (`id_rol`),
  KEY `id_permiso` (`id_permiso`),
  CONSTRAINT `rol_permiso_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rol_permiso_ibfk_2` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2462 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_permiso`
--

LOCK TABLES `rol_permiso` WRITE;
/*!40000 ALTER TABLE `rol_permiso` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `rol_permiso` VALUES (2354,3,62),(2355,3,63),(2356,3,64),(2357,3,65),(2358,3,66),(2359,3,67),(2360,3,68),(2361,3,69),(2362,3,70),(2363,3,71),(2364,3,72),(2365,3,73),(2366,3,74),(2368,3,75),(2369,3,76),(2370,3,77),(2371,3,78),(2372,3,79),(2373,3,80),(2374,3,81),(2375,3,82),(2376,3,83),(2377,3,84),(2378,3,85),(2379,3,86),(2380,3,87),(2381,3,88),(2382,3,89),(2383,3,90),(2384,3,91),(2385,3,92),(2386,3,93),(2387,3,94),(2388,3,95),(2389,3,96),(2390,3,97),(2391,3,98),(2392,3,99),(2393,3,100),(2394,3,101),(2395,3,102),(2396,3,103),(2397,3,104),(2398,3,105),(2399,3,106),(2400,3,107),(2401,3,108),(2402,3,109),(2403,3,110),(2456,19,101),(2457,1,111),(2458,1,75),(2459,1,76),(2461,1,112);
/*!40000 ALTER TABLE `rol_permiso` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `rol_permiso` with 54 row(s)
--

--
-- Table structure for table `secciones`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secciones` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secciones`
--

LOCK TABLES `secciones` WRITE;
/*!40000 ALTER TABLE `secciones` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `secciones` VALUES (1,'a',1),(2,'b',1),(3,'c',1),(4,'d',1),(5,'e',1);
/*!40000 ALTER TABLE `secciones` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `secciones` with 5 row(s)
--

--
-- Table structure for table `secciones_años`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secciones_años` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(50) NOT NULL,
  `id_secciones` int(11) NOT NULL,
  `id_anos` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_secciones_2` (`id_secciones`),
  KEY `id_anos` (`id_anos`),
  CONSTRAINT `secciones_años_ibfk_1` FOREIGN KEY (`id_secciones`) REFERENCES `secciones` (`id`),
  CONSTRAINT `secciones_años_ibfk_2` FOREIGN KEY (`id_anos`) REFERENCES `años` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secciones_años`
--

LOCK TABLES `secciones_años` WRITE;
/*!40000 ALTER TABLE `secciones_años` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `secciones_años` VALUES (1,20,1,1,0),(5,23,1,2,0),(6,0,1,3,0),(7,23,2,1,0),(8,12,2,2,0),(9,12,2,3,0),(10,20,1,4,0),(11,20,1,5,0),(12,20,2,4,0),(13,20,2,5,0),(14,20,3,1,0),(15,20,3,2,0),(16,20,3,4,0),(17,20,3,5,0),(18,20,3,3,0),(19,20,4,1,0),(20,20,4,2,0),(21,20,4,4,0),(22,20,4,5,0),(23,20,4,3,0),(24,20,5,1,0),(25,20,5,2,0),(26,20,5,3,0),(27,20,5,5,0),(28,20,5,4,0),(29,19,1,1,0),(30,25,3,4,1);
/*!40000 ALTER TABLE `secciones_años` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `secciones_años` with 27 row(s)
--

--
-- Table structure for table `tutor_legal`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutor_legal` (
  `cedula` varchar(50) NOT NULL,
  `nombre1` varchar(100) NOT NULL,
  `nombre2` varchar(100) NOT NULL,
  `apellido1` varchar(100) NOT NULL,
  `apellido2` varchar(100) NOT NULL,
  `contacto_emer` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutor_legal`
--

LOCK TABLES `tutor_legal` WRITE;
/*!40000 ALTER TABLE `tutor_legal` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `tutor_legal` VALUES ('28621408','jesus','jesus','jesus','jesus','33333333333','33333333333','jesus@gmail.com',1),('28621409','manuel','manuel','manuel','manuel','22222222222','22222222222','manuel@gmail.com',1);
/*!40000 ALTER TABLE `tutor_legal` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `tutor_legal` with 2 row(s)
--

--
-- Table structure for table `usuarios`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `usuarios` VALUES (27,'admin','jesusfob2021@gmail.com','$2y$10$psNZjqnhFQ8X/cBymADfhOpcHzvrzgwn213EOHkWzj8j/pUpSOu1a','1',3),(32,'manuel','manuel@gmail.com','$2y$10$nguGHrrSdlbPX.ugrZrCGOkgz3BHKk.3y1nzmJ40FTdEV3CUAz.gS','1',1),(33,'jesus','jesus@gmail.com','$2y$10$NXT9XMJ6c/vR1Aby6Cf1r.3Ja9h6mq/mOy6otcFtayNnkgI./hUgq','1',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `usuarios` with 3 row(s)
--

--
-- Table structure for table `usuarios_tutor`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_tutor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuarios` int(11) NOT NULL,
  `id_tutor` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuarios` (`id_usuarios`),
  KEY `id_tutor` (`id_tutor`),
  CONSTRAINT `usuarios_tutor_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `usuarios_tutor_ibfk_2` FOREIGN KEY (`id_tutor`) REFERENCES `tutor_legal` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_tutor`
--

LOCK TABLES `usuarios_tutor` WRITE;
/*!40000 ALTER TABLE `usuarios_tutor` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `usuarios_tutor` VALUES (6,32,'28621409'),(7,33,'28621408');
/*!40000 ALTER TABLE `usuarios_tutor` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `usuarios_tutor` with 2 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET AUTOCOMMIT=@OLD_AUTOCOMMIT */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Tue, 16 Jan 2024 19:18:59 +0100
