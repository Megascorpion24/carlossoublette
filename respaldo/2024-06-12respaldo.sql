-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: colegiocarlossoublette
-- ------------------------------------------------------
-- Server version 	10.4.28-MariaDB
-- Date: Wed, 12 Jun 2024 21:50:43 +0200

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `años`
--

LOCK TABLES `años` WRITE;
/*!40000 ALTER TABLE `años` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `años` VALUES (1,'1','tarde',1),(2,'2','mañana',1),(3,'3','mañana',1),(4,'4','tarde',1),(5,'5','tarde',1);
/*!40000 ALTER TABLE `años` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `años` with 5 row(s)
--

--
-- Table structure for table `años_materias`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `años_materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anos` int(11) NOT NULL,
  `id_materias` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_anos` (`id_anos`),
  KEY `id_materias_2` (`id_materias`),
  CONSTRAINT `años_materias_ibfk_1` FOREIGN KEY (`id_anos`) REFERENCES `años` (`id`),
  CONSTRAINT `años_materias_ibfk_2` FOREIGN KEY (`id_materias`) REFERENCES `materias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `años_materias`
--

LOCK TABLES `años_materias` WRITE;
/*!40000 ALTER TABLE `años_materias` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `años_materias` VALUES (2,3,14),(3,4,15),(4,2,16),(5,2,17);
/*!40000 ALTER TABLE `años_materias` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `años_materias` with 4 row(s)
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
  `estatus` varchar(15) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ano_academico`
--

LOCK TABLES `ano_academico` WRITE;
/*!40000 ALTER TABLE `ano_academico` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `ano_academico` VALUES (1,'2024-01-01','2024-01-31','2023-2024','',1),(2,'2024-01-01','2024-01-31','2023-2025','0',0);
/*!40000 ALTER TABLE `ano_academico` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `ano_academico` with 2 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ano_estudiantes`
--

LOCK TABLES `ano_estudiantes` WRITE;
/*!40000 ALTER TABLE `ano_estudiantes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `ano_estudiantes` VALUES (21,1,'11111111'),(23,2,'22222222'),(24,1,'13123123');
/*!40000 ALTER TABLE `ano_estudiantes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `ano_estudiantes` with 3 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ano_secciones`
--

LOCK TABLES `ano_secciones` WRITE;
/*!40000 ALTER TABLE `ano_secciones` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `ano_secciones` VALUES (1,1,29),(2,1,30),(3,1,36),(4,1,37);
/*!40000 ALTER TABLE `ano_secciones` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `ano_secciones` with 4 row(s)
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
  `id_usuario` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bitacora` VALUES (3,'2024-02-01','se registro un pago','docentes','2827479'),(4,'2024-02-01','se modifico un pago','docentes','2827479'),(5,'2024-02-01','se registraron permisos','seguridad','2827479'),(6,'2024-02-01','se modifico un pago','docentes','2827479'),(7,'2024-02-01','Se Actualizo el Abecedario de Secciones','secciones','2827479'),(8,'2024-02-01','Se Actualizo el Abecedario de Secciones','secciones','2827479'),(9,'2024-02-01','Se Actualizo el Abecedario de Secciones','secciones','2827479'),(10,'2024-02-01','se elimino una seccion','seccion','2827479'),(11,'2024-02-01','Se Actualizo el Abecedario de Secciones','secciones','2827479'),(12,'2024-02-01','se modifico un pago','docentes','2827479'),(13,'2024-02-01','se modifico un pago','docentes','2827479'),(14,'2024-02-03','se registro un horario','horario_docente','2827479'),(15,'2024-02-03','se registro un pago','docentes','2827479'),(16,'2024-02-04','se registro una clase','Horario','2827479'),(17,'2024-02-04','se modifico una clase','Horario','2827479'),(18,'2024-02-04','se modifico una clase','Horario','2827479'),(19,'2024-02-04','se modifico una clase','Horario','2827479'),(20,'2024-02-04','se modifico una clase','Horario','2827479'),(21,'2024-02-04','se registro una clase','Horario','2827479'),(22,'2024-02-04','se elimino una clase','horario','2827479'),(23,'2024-02-04','se elimino una seccion','seccion','2827479'),(24,'2024-02-04','se elimino un usuario','usuarios','2827479'),(25,'2024-02-04','se modifico una clase','Horario','2827479'),(26,'2024-02-04','se registro un pago','docentes','2827479'),(27,'2024-02-05','se intento ingresar al sistema','login','0000'),(28,'2024-02-05','se intento ingresar al sistema','login','0000'),(29,'2024-02-05','se inscribio un estudiante','inscripciones','2827479'),(30,'2024-02-05','se modifico un estudiante','inscripciones','2827479'),(31,'2024-02-05','se modifico un estudiante','inscripciones','2827479'),(32,'2024-02-05','se modifico un estudiante','inscripciones','2827479'),(33,'2024-02-05','se modifico un estudiante','inscripciones','2827479'),(34,'2024-02-06','se genero una deuda','principal','2827479'),(35,'2024-02-08','se registro un docente','docentes','2827479'),(36,'2024-03-31','se intento ingresar al sistema','login','0000'),(37,'2024-04-28','se registraron permisos','seguridad','2827479'),(38,'2024-04-28','se intento ingresar al sistema','login','0000'),(39,'2024-04-28','se registraron permisos','seguridad','2827479'),(40,'2024-04-28','se registraron permisos','seguridad','2827479'),(41,'2024-04-28','se registraron permisos','seguridad','2827479'),(42,'2024-04-28','se registraron permisos','seguridad','2827479'),(43,'2024-04-28','se registraron permisos','seguridad','2827479'),(44,'2024-04-28','se registraron permisos','seguridad','2827479'),(45,'2024-04-28','se intento ingresar al sistema','login','0000'),(46,'2024-04-28','se registro un usuario','usuarios','2827479'),(47,'2024-06-04','se elimino una clase','Horario','30019081'),(48,'2024-06-04','se elimino una clase','Horario','30019081'),(49,'2024-06-06','se modifico una clase','Horario','2827479'),(50,'2024-06-06','se modifico una clase','Horario','2827479'),(51,'2024-06-06','se registro una clase','Horario','2827479'),(52,'2024-06-08','se registro una clase','Horario','2827479'),(53,'2024-06-08','se elimino una clase','Horario','2827479'),(54,'2024-06-08','se registro una clase','Horario','2827479'),(55,'2024-06-08','se elimino una clase','Horario','2827479'),(56,'2024-06-08','se registro una clase','Horario','2827479'),(57,'2024-06-08','se intento ingresar al sistema','login','0000'),(58,'2024-06-08','se intento ingresar al sistema','login','0000'),(59,'2024-06-08','se intento ingresar al sistema','login','0000'),(60,'2024-06-08','se intento ingresar al sistema','login','0000'),(61,'2024-06-09','se modifico una clase','Horario','30019081'),(62,'2024-06-12','se intento ingresar al sistema','login','0000'),(63,'2024-06-12','se intento ingresar al sistema','login','0000'),(64,'2024-06-12','se intento ingresar al sistema','login','0000');
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bitacora` with 62 row(s)
--

--
-- Table structure for table `deudas`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deudas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante` varchar(100) NOT NULL,
  `concepto` varchar(25) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `monto` int(10) NOT NULL,
  `estado` int(10) NOT NULL,
  `estado_deudas` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estudiante` (`id_estudiante`),
  CONSTRAINT `deudas_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deudas`
--

LOCK TABLES `deudas` WRITE;
/*!40000 ALTER TABLE `deudas` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `deudas` VALUES (57,'11111111','inscripcion','2023-10-30',2160,1,0),(58,'11111111','mensualidad','2023-10-30',0,1,1),(61,'22222222','inscripcion','2023-08-30',2160,1,0),(62,'22222222','mensualidad','2023-09-30',0,1,1),(63,'13123123','inscripcion','2024-02-06',0,1,1),(64,'13123123','mensualidad','2024-02-06',0,1,1),(65,'22222222','mensualidad','2024-02-06',20,1,1);
/*!40000 ALTER TABLE `deudas` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `deudas` with 7 row(s)
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
INSERT INTO `docentes` VALUES ('000033','qweqwe','qweqwe','qweqwe','2023-07-20','qweqwe','qweqwe','12','12','dejesus2018@gmail.com','ElCercado',0),('000101','María','Rodríguez','Docente','1981-06-12','Historia','Licenciada','41','19','maria.rodriguez@example.com','Calle 101',1),('000102','Pedro','García','Docente','1974-09-25','Geografía','Licenciado','48','21','pedro.garcia@example.com','Calle 102',1),('000103','Laura','Martínez','Docente','1987-02-18','Biología','Licenciada','35','13','laura.martinez@example.com','Calle 103',1),('000104','Carlos','Fernández','Docente','1978-12-05','Química','Licenciado','44','17','carlos.fernandez@example.com','Calle 104',1),('000105','Sofía','Hernández','Docente','1983-04-30','Arte','Licenciada','39','16','sofia.hernandez@example.com','Calle 105',1),('000106','Antonio','Gómez','Docente','1979-10-15','Educación Física','Licenciado','43','18','antonio.gomez@example.com','Calle 106',1),('28276731','asdasddd','dasddasd','asdasdasd','2024-02-08','asdasd','asdasd','12','12','jesusfob2021@gmail.com','asdasdasd',1),('300190123','santiago','casamayor','docente','2023-09-13','programacion','docevec','23','3','santiagocasamayor@gmail.com','sdaddas',0),('30019081','Luis','Perez','matematicas','2002','fisica','programador','21','2','santiagocasamayor14@gmail.com','calle51a entre 18 y 19',1),('30019082','santiago','casamayor','docente','2023-09-13','programacion','docevec','23','3','santiagocasamayor@gmail.com','sdaddas',1);
/*!40000 ALTER TABLE `docentes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `docentes` with 11 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente_guia`
--

LOCK TABLES `docente_guia` WRITE;
/*!40000 ALTER TABLE `docente_guia` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `docente_guia` VALUES (1,'000033',29),(2,'000103',30),(3,'000103',36),(4,'000101',37);
/*!40000 ALTER TABLE `docente_guia` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `docente_guia` with 4 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente_horario`
--

LOCK TABLES `docente_horario` WRITE;
/*!40000 ALTER TABLE `docente_horario` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `docente_horario` VALUES (1,'000033',1),(2,'000033',2),(3,'000033',3),(4,'000033',4),(5,'000033',5),(6,'000033',6),(7,'30019081',7),(8,'30019081',8),(9,'30019081',9),(10,'000033',10),(11,'000033',16),(12,'000102',17),(13,'000102',18),(14,'000103',19),(15,'000102',20),(16,'000103',21),(17,'000104',22),(18,'000104',24),(19,'000104',25),(20,'000104',26),(21,'000103',27),(22,'000104',28),(24,'30019082',29),(26,'30019082',30),(27,'28276731',31),(28,'000102',32),(29,'30019082',33);
/*!40000 ALTER TABLE `docente_horario` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `docente_horario` with 27 row(s)
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
INSERT INTO `dolar_venezuela` VALUES (1,36);
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
INSERT INTO `estudiantes` VALUES ('11111111','Hijomanuel','Hijomanuel',14,'Ninguna','aprobado',30,1),('13123123','sdsdsdsdsdsdsss','asdasd',12,'asdasdasd','aprobado',30,1),('22222222','dddddddddddd','Hijojesus',14,'Ninguna','aprobado',30,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes_tutor`
--

LOCK TABLES `estudiantes_tutor` WRITE;
/*!40000 ALTER TABLE `estudiantes_tutor` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `estudiantes_tutor` VALUES (8,'11111111','28621408'),(10,'22222222','28621409'),(11,'13123123','28621408');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante_ficha`
--

LOCK TABLES `estudiante_ficha` WRITE;
/*!40000 ALTER TABLE `estudiante_ficha` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `estudiante_ficha` VALUES (9,'11111111',9),(11,'22222222',11),(12,'13123123',12);
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
  `id_ano_academico` int(5) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ano_academico` (`id_ano_academico`),
  CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_ano_academico`) REFERENCES `ano_academico` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `eventos` with 0 row(s)
--

--
-- Table structure for table `eventos_docente`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos_docente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(11) NOT NULL,
  `id_docente` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eventos_docente_ibfk_1` (`id_evento`),
  KEY `eventos_docente_ibfk_2` (`id_docente`),
  CONSTRAINT `eventos_docente_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id`),
  CONSTRAINT `eventos_docente_ibfk_2` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos_docente`
--

LOCK TABLES `eventos_docente` WRITE;
/*!40000 ALTER TABLE `eventos_docente` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `eventos_docente` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `eventos_docente` with 0 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha_medica`
--

LOCK TABLES `ficha_medica` WRITE;
/*!40000 ALTER TABLE `ficha_medica` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `ficha_medica` VALUES (1,'asdasd','N/A','N/A','N/A','N/A','aprobado','N/A','N/A'),(2,'fsdfsdfsd','fsdfsdfsdf','sdfsdfsdf','fsdfsdfsdf','fsadfsdf','fasdasdasd','dasdasdasd','fsdfsdf'),(3,'ninguno','polvo','ninguno','ninguna','ninguna','aprobado','o','ninguna'),(4,'fsdfsdfsd','fsdfsdfsdf','sdfsdfsdf','fsdfsdfsdf','fsadfsdf','fasdasdasd','dasdasdasd','fsdfsdf'),(5,'aaaaaaaaaaaaaaaaaaaaaaaaaa','ssssssssssssssssssssssssss','ssssssssssssssssssssssssss','ssssssssssssssssssssssssss','asdasd','asdasdasd','asdasdasd','ssssssssssssssssssssssssss'),(6,'hijomanuel','hijomanuel','hijomanuel','hijomanuel','hijomanuel','hijomanuel','hijomanuel','hijomanuel'),(7,'hijojesus','hijojesus','hijojesus','hijojesus','hijojesus','hijojesus','hijojesus','hijojesus'),(8,'otromanuel','otromanuel','otromanuel','otromanuel','asdasd','otromanuel','otromanuel','otromanuel'),(9,'Ninguna','Ninguna','Ninguna','Ninguna','Ninguna','seleccionar,hepatitis b,BCG','a+','Ninguna'),(10,'Ninguna','Ninguna','Ninguna','Ninguna','Ninguna','seleccionar,BCG','a+','Ninguna'),(11,'Ninguna','Ninguna','Ninguna','Ninguna','Ninguna','hepatitis b,rotavirus','a+','Ninguna'),(12,'asdasds','dasdasd','asdasdas','asdasd','asdasdad','seleccionar,pentavalente','ab-','asdasd');
/*!40000 ALTER TABLE `ficha_medica` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `ficha_medica` with 12 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario_ano`
--

LOCK TABLES `horario_ano` WRITE;
/*!40000 ALTER TABLE `horario_ano` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `horario_ano` VALUES (1,1,17),(2,1,18),(3,1,19),(4,1,20),(5,1,21),(6,1,22),(7,1,25),(8,1,26),(10,1,28),(9,2,27),(11,2,29),(12,2,30),(13,2,31),(14,2,32),(15,2,33);
/*!40000 ALTER TABLE `horario_ano` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `horario_ano` with 15 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario_docente`
--

LOCK TABLES `horario_docente` WRITE;
/*!40000 ALTER TABLE `horario_docente` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `horario_docente` VALUES (1,'20:18:00','22:18:00',2,'2023-09-01','2023-09-30',5,0),(2,'21:33:00','12:33:00',3,'2023-09-01','2023-09-30',6,0),(3,'19:51:00','20:50:00',3,'2023-09-01','2023-09-30',6,0),(4,'21:00:00','22:01:00',2,'2023-09-01','2023-09-30',5,0),(5,'21:44:00','21:44:00',4,'2023-09-01','2023-09-30',6,0),(6,'22:01:00','23:01:00',1,'2023-09-01','2023-09-30',5,0),(7,'11:21:00','13:22:00',5,'2023-09-01','2023-09-30',7,0),(8,'01:55:00','04:55:00',5,'2023-09-01','2023-09-30',5,0),(9,'10:33:00','00:33:00',3,'2023-09-01','2023-09-30',7,0),(10,'15:47:00','17:47:00',4,'2023-09-21','2023-09-27',1,0),(11,'13:50:00','17:50:00',4,'2023-09-06','2023-09-28',6,0),(12,'12:53:00','17:50:00',3,'2023-09-05','2023-10-05',7,0),(13,'12:55:00','16:56:00',4,'2023-09-06','2023-09-29',1,0),(14,'14:53:00','18:53:00',4,'2023-09-13','2023-09-30',15,0),(15,'13:54:00','17:54:00',5,'2023-09-14','2023-10-07',8,0),(16,'13:55:00','15:55:00',4,'2023-09-14','2023-09-28',1,0),(17,'16:24:00','17:24:00',5,'2024-01-01','2024-01-31',30,0),(18,'11:03:00','11:15:00',5,'2024-01-01','2024-01-31',30,1),(19,'11:03:00','11:25:00',1,'2024-01-01','2024-01-31',30,1),(20,'12:24:00','13:24:00',1,'2024-01-01','2024-01-31',36,1),(21,'11:03:00','11:23:00',1,'2024-01-01','2024-01-31',36,0),(22,'17:00:00','17:30:00',5,'2024-01-01','2024-01-31',30,1),(23,'10:00:00','11:00:00',2,'2024-01-01','2024-01-31',30,1),(24,'10:00:00','11:00:00',2,'2024-01-01','2024-01-31',30,1),(25,'10:00:00','11:00:00',2,'2024-01-01','2024-01-31',30,1),(26,'10:00:00','11:00:00',2,'2024-01-01','2024-01-31',30,1),(27,'15:09:00','16:09:00',2,'2024-01-01','2024-01-31',30,1),(28,'10:00:00','11:00:00',2,'2024-01-01','2024-01-31',30,1),(29,'16:56:00','17:56:00',3,'2024-01-01','2024-01-31',30,0),(30,'06:03:00','07:03:00',5,'2024-01-01','2024-01-31',30,1),(31,'09:04:00','10:04:00',5,'2024-01-01','2024-01-31',30,1),(32,'12:06:00','14:06:00',5,'2024-01-01','2024-01-31',30,0),(33,'13:02:00','14:17:00',5,'2024-01-01','2024-01-31',30,1);
/*!40000 ALTER TABLE `horario_docente` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `horario_docente` with 33 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `materias` VALUES (1,'ddddddddddddddddddd',0),(2,'historia',0),(3,'aaaaaaaaaaaa',0),(4,'soberania',0),(5,'asdasdddaaaaaaaaa',0),(6,'asdasdasd',0),(7,'asdasdasdddd',0),(8,'xxxxxxxxxxxx',0),(9,'ddddddddddddd',0),(10,'ssssssss',0),(11,'xzxzxzxzxzx',0),(12,'asdasddd',0),(14,'INGLES',0),(15,'INGLES',1),(16,'GAGAGA',0),(17,'HISTO RIA',0),(18,'aritmetica',1),(19,'aritmetica',1),(20,'aritmetica',1),(21,'aritmetica',1),(22,'21',1),(23,'aritmetica',1),(24,'aritmetica',1),(25,'aritmetica',1),(26,'aritmetica',1),(27,'26',1),(28,'aritmetica',1),(29,'aritmetica',1),(30,'29',1),(31,'aritmetica',1),(32,'31',1),(33,'LICA',1),(34,'33',1),(35,'LICA',1),(36,'35',1);
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `materias` with 35 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias_docentes`
--

LOCK TABLES `materias_docentes` WRITE;
/*!40000 ALTER TABLE `materias_docentes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `materias_docentes` VALUES (2,1,14,'000102'),(3,1,14,'000104'),(4,0,14,'30019081'),(5,1,15,'000104'),(6,1,15,'000105'),(7,1,15,'30019081'),(8,1,15,'30019082'),(9,0,16,'000103'),(10,0,16,'000104'),(16,0,15,'000101'),(17,1,17,'000101'),(18,1,17,'000102'),(20,1,17,'000103');
/*!40000 ALTER TABLE `materias_docentes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `materias_docentes` with 13 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia_horario_docente`
--

LOCK TABLES `materia_horario_docente` WRITE;
/*!40000 ALTER TABLE `materia_horario_docente` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `materia_horario_docente` VALUES (1,3,1),(2,2,2),(3,1,3),(4,2,4),(5,3,5),(6,1,6),(7,4,7),(8,2,8),(9,3,9),(10,1,10),(11,2,16),(12,15,17),(13,5,18),(14,17,19),(15,17,20),(16,15,21),(17,15,22),(18,15,25),(19,15,26),(20,15,27),(21,15,28),(22,15,29),(23,15,30),(24,15,31),(25,15,32),(26,15,33);
/*!40000 ALTER TABLE `materia_horario_docente` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `materia_horario_docente` with 26 row(s)
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
INSERT INTO `montos` VALUES (1,'inscripcion',2160,60),(2,'mensualidad',2160,60);
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
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_deudas` int(10) NOT NULL,
  `identificador` varchar(11) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `fechad` varchar(22) DEFAULT NULL,
  `concepto` varchar(20) NOT NULL,
  `forma` varchar(25) NOT NULL,
  `monto` int(11) NOT NULL,
  `meses` varchar(22) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `estado_pagos` int(11) NOT NULL,
  `estatus` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_deudas` (`id_deudas`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_deudas`) REFERENCES `deudas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3472 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `pagos` VALUES (3469,61,'2335','2024-02-02','2023-08-30','inscripcion','Efectivo',2160,'1','ELIMINADO',0,0),(3470,57,'12314','2024-02-03','2023-10-30','inscripcion','Transf',2160,'1','ELIMINADO',1,0),(3471,62,'1234','2024-02-04','2023-08-30','mensualidad','Transf',1440,'1','Confirmado',0,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `permisos` VALUES (62,'registrar usuario','1'),(63,'modificar usuario','1'),(64,'eliminar usuario','1'),(65,'consultar usuario','1'),(66,'registrar docente','1'),(67,'modificar docente','1'),(68,'eliminar docente','1'),(69,'consultar docente','1'),(70,'registrar representante','1'),(71,'modificar representante','1'),(72,'eliminar representante','1'),(73,'consultar representante','1'),(74,'registrar pagos','1'),(75,'modificar pagos','1'),(76,'eliminar pagos','1'),(77,'consultar pagos','1'),(78,'registrar materias','1'),(79,'modificar materias','1'),(80,'eliminar materias','1'),(81,'consultar materias','1'),(82,'registrar anos','1'),(83,'modificar anos','1'),(84,'eliminar anos','1'),(85,'consultar anos','1'),(86,'registrar secciones','1'),(87,'modificar secciones','1'),(88,'eliminar secciones','1'),(89,'consultar secciones','1'),(90,'registrar horario_docente','1'),(91,'modificar horario_docente','1'),(92,'eliminar horario_docente','1'),(93,'consultar horario_docente','1'),(94,'registrar horario_seccion','1'),(95,'modificar horario_seccion','1'),(96,'eliminar horario_seccion','1'),(97,'consultar horario_seccion','1'),(98,'registrar inscipcion','1'),(99,'modificar inscipcion','1'),(100,'eliminar inscipcion','1'),(101,'consultar inscipcion','1'),(102,'registrar ano_academico','1'),(103,'modificar ano_academico','1'),(104,'eliminar ano_academico','1'),(105,'consultar ano_academico','1'),(106,'registrar seguridad','1'),(107,'modificar seguridad','1'),(108,'eliminar seguridad','1'),(109,'consultar seguridad','1'),(110,'permisos seguridad','1'),(111,'registrar pagos_tutor','1'),(112,'consultar pagos_tutor','1'),(113,'generar_reporte_ingresos','1'),(114,'consultar_reporte_egresos','1'),(115,'generar_reporte_egresos','1'),(116,'consultar_reporte_ingresos','1'),(117,'agregar_evento','1'),(118,'modificar_evento','1'),(119,'eliminar_evento','1'),(120,'consultar_evento','1'),(121,'consultarmontos','1'),(122,'modificarmontos','1'),(123,'respaldar','1'),(124,'restaurar','1'),(125,'pagos_reportes','1'),(126,'Consultar Bitacora','1');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `permisos` with 65 row(s)
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
INSERT INTO `rol` VALUES (1,'tutor','tutor legal','1'),(3,'superusuario','tiene todos los permisos','1'),(19,'docente','paolasssss','1');
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
) ENGINE=InnoDB AUTO_INCREMENT=3590 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_permiso`
--

LOCK TABLES `rol_permiso` WRITE;
/*!40000 ALTER TABLE `rol_permiso` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `rol_permiso` VALUES (2456,19,101),(2457,1,111),(2458,1,75),(2459,1,76),(2461,1,112),(3136,1,121),(3533,3,62),(3534,3,63),(3535,3,64),(3536,3,65),(3537,3,66),(3538,3,67),(3539,3,68),(3540,3,69),(3541,3,70),(3542,3,71),(3543,3,72),(3544,3,73),(3545,3,74),(3546,3,75),(3547,3,76),(3548,3,77),(3549,3,78),(3550,3,79),(3551,3,80),(3552,3,81),(3553,3,82),(3554,3,83),(3555,3,84),(3556,3,85),(3557,3,86),(3558,3,87),(3559,3,88),(3560,3,89),(3561,3,90),(3562,3,91),(3563,3,92),(3564,3,93),(3565,3,98),(3566,3,99),(3567,3,100),(3568,3,101),(3569,3,102),(3570,3,103),(3571,3,104),(3572,3,105),(3573,3,106),(3574,3,107),(3575,3,108),(3576,3,109),(3577,3,110),(3578,3,116),(3579,3,114),(3580,3,113),(3581,3,115),(3582,3,125),(3583,3,117),(3584,3,118),(3585,3,119),(3586,3,120),(3587,3,123),(3588,3,124),(3589,3,126);
/*!40000 ALTER TABLE `rol_permiso` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `rol_permiso` with 63 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secciones`
--

LOCK TABLES `secciones` WRITE;
/*!40000 ALTER TABLE `secciones` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `secciones` VALUES (0,'vacia',0),(1,'A',1),(2,'B',1),(3,'C',1),(4,'D',1),(5,'E',1),(6,'F',1),(7,'G',1),(8,'H',1),(9,'I',1),(10,'J',1),(11,'K',1),(12,'L',0),(13,'M',0),(14,'N',1),(15,'O',1),(16,'P',1),(17,'R',1),(18,'S',1),(19,'T',1),(20,'U',0),(21,'V',0);
/*!40000 ALTER TABLE `secciones` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `secciones` with 22 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secciones_años`
--

LOCK TABLES `secciones_años` WRITE;
/*!40000 ALTER TABLE `secciones_años` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `secciones_años` VALUES (1,20,1,1,0),(5,23,1,2,0),(6,0,1,3,0),(7,23,2,1,0),(8,12,2,2,0),(9,12,2,3,0),(10,20,1,4,0),(11,20,1,5,0),(12,20,2,4,0),(13,20,2,5,0),(14,20,3,1,0),(15,20,3,2,0),(16,20,3,4,0),(17,20,3,5,0),(18,20,3,3,0),(19,20,4,1,0),(20,20,4,2,0),(21,20,4,4,0),(22,20,4,5,0),(23,20,4,3,0),(24,20,5,1,0),(25,20,5,2,0),(26,20,5,3,0),(27,20,5,5,0),(28,20,5,4,0),(29,19,1,1,0),(30,24,3,4,1),(31,0,0,1,1),(32,0,0,2,1),(33,0,0,5,1),(34,0,0,3,1),(35,0,0,3,1),(36,25,5,2,0),(37,25,9,5,0);
/*!40000 ALTER TABLE `secciones_años` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `secciones_años` with 34 row(s)
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
  `direccion` varchar(100) NOT NULL,
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
INSERT INTO `tutor_legal` VALUES ('28621408','Manuel','Manuel','Petit','Petit','12313131231','21653549816','asdada@gmail.com','',1),('28621409','Jesus','Jesus','Jesus','Jesus','53453453453','53453453453','asdasda@gmail.com','',1);
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
  `id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `token` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `usuarios` VALUES ('2827479','admin','jesusfob2021@gmail.com','$2y$10$psNZjqnhFQ8X/cBymADfhOpcHzvrzgwn213EOHkWzj8j/pUpSOu1a','1',3,'edd995f219846ed98542f8a274eadf335a71cff75ce2069cc5016c0e79c41541'),('28276731','asdasddd','jesusfob2021@gmail.com','$2y$10$sGOAx2JIvBjaSoAlCdzPguPuXZQWd.TEsMc81m.RwFHuwatTTUrTG','1',3,''),('28621408','Manuel','asdada@gmail.com','$2y$10$lsb/q90vet6LifVqdUBOneMTK9BNZTZKuguczAMVSagTkZu/ViidW','1',1,''),('28621409','Jesus','asdasda@gmail.com','$2y$10$3vHV.p2WAVG.WiO2r1QrRO7J7NK8OVdqtK7FajzTZ8btyCSVieCuO','0',1,''),('30019081','santiago','santiagocasamayor14@gmail.com','$2y$10$eJOTd34gIhT2aQxs76q68OGzuR3NJQPZyU2yVEhEHjzdgWjw.uHvq','1',3,'92ffb1218e80973bb2a461ed3e856747cc1bd79f88a5a898a8f0685880155afe');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `usuarios` with 5 row(s)
--

--
-- Table structure for table `usuarios_tutor`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_tutor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuarios` varchar(50) NOT NULL,
  `id_tutor` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuarios` (`id_usuarios`),
  KEY `id_tutor` (`id_tutor`),
  CONSTRAINT `usuarios_tutor_ibfk_2` FOREIGN KEY (`id_tutor`) REFERENCES `tutor_legal` (`cedula`),
  CONSTRAINT `usuarios_tutor_ibfk_3` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_tutor`
--

LOCK TABLES `usuarios_tutor` WRITE;
/*!40000 ALTER TABLE `usuarios_tutor` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `usuarios_tutor` VALUES (9,'28621408','28621408'),(10,'28621409','28621409');
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

-- Dump completed on: Wed, 12 Jun 2024 21:50:44 +0200
