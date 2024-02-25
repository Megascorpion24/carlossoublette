-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: colegiocarlossoublette
-- ------------------------------------------------------
-- Server version 	10.4.28-MariaDB
-- Date: Thu, 01 Feb 2024 23:14:31 +0100

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
INSERT INTO `años` VALUES (1,'1','mañana',1),(2,'2','mañana',1),(3,'3','mañana',1),(4,'4','tarde',1),(5,'5','tarde',1);
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
  `cantidad` int(50) NOT NULL,
  `id_anos` int(11) NOT NULL,
  `id_materias` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_anos` (`id_anos`),
  KEY `id_materias_2` (`id_materias`),
  CONSTRAINT `años_materias_ibfk_1` FOREIGN KEY (`id_anos`) REFERENCES `años` (`id`),
  CONSTRAINT `años_materias_ibfk_2` FOREIGN KEY (`id_materias`) REFERENCES `materias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `estatus` varchar(15) NOT NULL,
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
INSERT INTO `ano_academico` VALUES (1,'2024-01-01','2024-01-31','2023-2024','',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ano_estudiantes`
--

LOCK TABLES `ano_estudiantes` WRITE;
/*!40000 ALTER TABLE `ano_estudiantes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `ano_estudiantes` VALUES (21,1,'11111111'),(23,1,'22222222'),(24,1,'30019081'),(25,1,'12312312'),(26,1,'12312323'),(27,1,'23232323'),(28,1,'23232323'),(29,1,'33333333');
/*!40000 ALTER TABLE `ano_estudiantes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `ano_estudiantes` with 8 row(s)
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
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `accion` text NOT NULL,
  `modulo` varchar(100) NOT NULL,
  `id_usuario` varchar(50) NOT NULL,
  UNIQUE KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bitacora` VALUES (0,'2024-01-08','se registro un usuario','usuarios','2827479'),(0,'2024-01-18','se registro un pago','docentes','28621408');
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bitacora` with 2 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deudas`
--

LOCK TABLES `deudas` WRITE;
/*!40000 ALTER TABLE `deudas` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `deudas` VALUES (57,'11111111','inscripcion','2023-10-30',0,1,1),(58,'11111111','mensualidad','2023-11-30',0,1,1),(61,'22222222','inscripcion','2023-08-30',0,1,1),(62,'22222222','mensualidad','2023-08-30',0,1,1),(63,'30019081','inscripcion','2024-01-24',0,1,1),(64,'12312312','inscripcion','2024-01-25',0,1,1),(65,'11111111','mensualidad','2024-01-30',20,1,1),(66,'12312323','inscripcion','2024-02-01',0,1,1),(67,'12312323','mensualidad','2024-02-01',0,1,1),(68,'23232323','inscripcion','2024-02-01',0,1,1),(69,'23232323','mensualidad','2024-02-01',0,1,1),(70,'23232323','inscripcion','2024-02-01',20,1,1),(71,'33333333','inscripcion','2024-02-01',0,0,0),(72,'33333333','mensualidad','2024-02-01',0,0,0);
/*!40000 ALTER TABLE `deudas` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `deudas` with 14 row(s)
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
  KEY `id_horio_docente_2` (`id_horario_docente`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente_horario`
--

LOCK TABLES `docente_horario` WRITE;
/*!40000 ALTER TABLE `docente_horario` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `docente_horario` VALUES (1,'000033',1),(2,'000033',2),(3,'000033',3),(4,'000033',4),(5,'000033',5),(6,'000033',6),(7,'30019081',7),(8,'30019081',8),(9,'30019081',9),(10,'000033',10),(11,'000033',16),(12,'000102',17),(13,'000102',18),(14,'000102',19);
/*!40000 ALTER TABLE `docente_horario` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `docente_horario` with 14 row(s)
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
  KEY `id_anos_secciones_2` (`id_anos_secciones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes`
--

LOCK TABLES `estudiantes` WRITE;
/*!40000 ALTER TABLE `estudiantes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `estudiantes` VALUES ('11111111','Hijomanuel','Hijomanuel',15,'Ninguna','aprobado',29,1),('12312312','asdasdasd','asdasd',12,'asdasdasd','aprobado',1,1),('12312323','asdasdsssssssss','asdasd',12,'ddddddddd','aprobado',1,1),('22222222','Hijojesus','Hijojesus',14,'Ninguna','aprobado',19,0),('23232323','asdasdasd','asdasd',12,'asdasdasd','aprobado',25,1),('30019081','santiago','casamayor',15,'nain','aprobado',6,0),('33333333','sssssssssssss','ssssssssssss',22,'sssssssss','reprovado',24,0);
/*!40000 ALTER TABLE `estudiantes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `estudiantes` with 7 row(s)
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
  KEY `id_tutor_2` (`id_tutor`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes_tutor`
--

LOCK TABLES `estudiantes_tutor` WRITE;
/*!40000 ALTER TABLE `estudiantes_tutor` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `estudiantes_tutor` VALUES (8,'11111111','28621408'),(10,'22222222','28621409'),(11,'30019081','28621408'),(12,'12312312','28621408'),(13,'12312323','28621408'),(14,'23232323','28621408'),(15,'33333333','28621408');
/*!40000 ALTER TABLE `estudiantes_tutor` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `estudiantes_tutor` with 7 row(s)
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
  KEY `id_ficha_2` (`id_ficha`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante_ficha`
--

LOCK TABLES `estudiante_ficha` WRITE;
/*!40000 ALTER TABLE `estudiante_ficha` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `estudiante_ficha` VALUES (9,'11111111',9),(11,'22222222',11),(12,'30019081',12),(13,'12312312',13),(14,'12312323',14),(15,'23232323',15),(16,'33333333',16);
/*!40000 ALTER TABLE `estudiante_ficha` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `estudiante_ficha` with 7 row(s)
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `eventos` VALUES (1,'2023-12-02','2023-12-31','PrimerLapso',0,1),(2,'2024-01-01','2024-01-31','asdawd',1,1);
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `eventos` with 2 row(s)
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
  KEY `eventos_ano_ibfk_2` (`id_evento`)
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
  KEY `eventos_docente_ibfk_2` (`id_docente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos_docente`
--

LOCK TABLES `eventos_docente` WRITE;
/*!40000 ALTER TABLE `eventos_docente` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `eventos_docente` VALUES (1,2,'000103');
/*!40000 ALTER TABLE `eventos_docente` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `eventos_docente` with 1 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha_medica`
--

LOCK TABLES `ficha_medica` WRITE;
/*!40000 ALTER TABLE `ficha_medica` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `ficha_medica` VALUES (1,'N/A','N/A','N/A','N/A','N/A','aprobado','N/A','N/A'),(2,'fsdfsdfsd','fsdfsdfsdf','sdfsdfsdf','fsdfsdfsdf','fsadfsdf','fasdasdasd','dasdasdasd','fsdfsdf'),(3,'ninguno','polvo','ninguno','ninguna','ninguna','aprobado','o','ninguna'),(4,'fsdfsdfsd','fsdfsdfsdf','sdfsdfsdf','fsdfsdfsdf','fsadfsdf','fasdasdasd','dasdasdasd','fsdfsdf'),(5,'aaaaaaaaaaaaaaaaaaaaaaaaaa','ssssssssssssssssssssssssss','ssssssssssssssssssssssssss','ssssssssssssssssssssssssss','asdasd','asdasdasd','asdasdasd','ssssssssssssssssssssssssss'),(6,'hijomanuel','hijomanuel','hijomanuel','hijomanuel','hijomanuel','hijomanuel','hijomanuel','hijomanuel'),(7,'hijojesus','hijojesus','hijojesus','hijojesus','hijojesus','hijojesus','hijojesus','hijojesus'),(8,'otromanuel','otromanuel','otromanuel','otromanuel','asdasd','otromanuel','otromanuel','otromanuel'),(9,'Ninguna','Ninguna','Ninguna','Ninguna','Ninguna','seleccionar,hepatitis b,BCG','a+','Ninguna'),(10,'Ninguna','Ninguna','Ninguna','Ninguna','Ninguna','seleccionar,BCG','a+','Ninguna'),(11,'Ninguna','Ninguna','Ninguna','Ninguna','Ninguna','hepatitis b,rotavirus','a+','Ninguna'),(12,'ninguno','polvo','ninguno','ninguna','ningunal','seleccionar,hepatitis b,BCG,rotavirus,pentavalente,neumo 13 valente,influencia estacional','ab+','ninguna'),(13,'asdasd','asdasd','asdasd','asdasd','dasdasdasd','seleccionar,hepatitis b,BCG,pentavalente','ab-','asdasd'),(14,'sssssssssssssssssssssssss','ssssssssssssssssssssssss','ssssssssssssssssssssssssss','sdddddddddddddddddddddaaaa','ssssssssss','seleccionar,hepatitis b','ab+','sssssssssssssssss'),(15,'asdasdasd','asdasdasd','asdasdasd','asdasd','asdasd','seleccionar,hepatitis b','a+','asdasdasd'),(16,'ssssssssssss','sssssssss','sssssssssssss','sssssssssss','sssssss','seleccionar,hepatitis b,BCG','a+','sssssssssssssss');
/*!40000 ALTER TABLE `ficha_medica` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `ficha_medica` with 16 row(s)
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
  KEY `id_horario` (`id_horario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario_ano`
--

LOCK TABLES `horario_ano` WRITE;
/*!40000 ALTER TABLE `horario_ano` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `horario_ano` VALUES (1,1,17),(2,1,18),(3,1,19);
/*!40000 ALTER TABLE `horario_ano` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `horario_ano` with 3 row(s)
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
  KEY `id_ano_seccion_2` (`id_ano_seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario_docente`
--

LOCK TABLES `horario_docente` WRITE;
/*!40000 ALTER TABLE `horario_docente` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `horario_docente` VALUES (17,'16:24:00','17:24:00',3,'2024-01-01','2024-01-31',30,1),(18,'15:39:00','17:39:00',2,'2024-01-01','2024-01-31',30,1),(19,'12:22:00','14:30:00',1,'2024-01-01','2024-01-31',30,1);
/*!40000 ALTER TABLE `horario_docente` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `horario_docente` with 3 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `materias` VALUES (1,'ddddddddddddddddddd',0),(2,'historia',0),(3,'aaaaaaaaaaaa',1),(4,'soberania',0),(5,'asdasdddaaaaaaaaa',1),(6,'asdasdasd',0),(7,'asdasdasdddd',0),(8,'xxxxxxxxxxxx',0),(9,'ddddddddddddd',0),(10,'ssssssss',0),(11,'xzxzxzxzxzx',0),(12,'asdasddd',0),(13,'MATEMATICA',1),(14,'INGLES',0),(15,'INGLES',1);
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `materias` with 15 row(s)
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
  KEY `id_docente_2` (`id_docente`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias_docentes`
--

LOCK TABLES `materias_docentes` WRITE;
/*!40000 ALTER TABLE `materias_docentes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `materias_docentes` VALUES (1,1,13,'30019082'),(2,1,14,'000102'),(3,1,14,'000104'),(4,0,14,'30019081'),(5,1,15,'000104'),(6,1,15,'000105'),(7,1,15,'30019081'),(8,1,15,'30019082');
/*!40000 ALTER TABLE `materias_docentes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `materias_docentes` with 8 row(s)
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
  KEY `id_horario_docente_2` (`id_horario_docente`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia_horario_docente`
--

LOCK TABLES `materia_horario_docente` WRITE;
/*!40000 ALTER TABLE `materia_horario_docente` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `materia_horario_docente` VALUES (1,3,1),(2,2,2),(3,1,3),(4,2,4),(5,3,5),(6,1,6),(7,4,7),(8,2,8),(9,3,9),(10,1,10),(11,2,16),(12,15,17),(13,5,18),(14,15,19);
/*!40000 ALTER TABLE `materia_horario_docente` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `materia_horario_docente` with 14 row(s)
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
  KEY `id_horario_secciones_2` (`id_horario_secciones`)
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
INSERT INTO `montos` VALUES (1,'inscripcion',2160,60),(2,'mensualidad',1440,40);
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
  KEY `id_deudas` (`id_deudas`)
) ENGINE=InnoDB AUTO_INCREMENT=3466 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `pagos` VALUES (3464,58,'1231','2024-01-18','2023-10-30','mensualidad','Pago Movil',1500,'1','Confirmado',0,1),(3465,58,'1231','2024-01-18','2023-11-30','mensualidad','Pago Movil',1500,'1','Pendiente',0,1);
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `pagos` with 2 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `permisos` VALUES (62,'registrar usuario','1'),(63,'modificar usuario','1'),(64,'eliminar usuario','1'),(65,'consultar usuario','1'),(66,'registrar docente','1'),(67,'modificar docente','1'),(68,'eliminar docente','1'),(69,'consultar docente','1'),(70,'registrar representante','1'),(71,'modificar representante','1'),(72,'eliminar representante','1'),(73,'consultar representante','1'),(74,'registrar pagos','1'),(75,'modificar pagos','1'),(76,'eliminar pagos','1'),(77,'consultar pagos','1'),(78,'registrar materias','1'),(79,'modificar materias','1'),(80,'eliminar materias','1'),(81,'consultar materias','1'),(82,'registrar anos','1'),(83,'modificar anos','1'),(84,'eliminar anos','1'),(85,'consultar anos','1'),(86,'registrar secciones','1'),(87,'modificar secciones','1'),(88,'eliminar secciones','1'),(89,'consultar secciones','1'),(90,'registrar horario_docente','1'),(91,'modificar horario_docente','1'),(92,'eliminar horario_docente','1'),(93,'consultar horario_docente','1'),(94,'registrar horario_seccion','1'),(95,'modificar horario_seccion','1'),(96,'eliminar horario_seccion','1'),(97,'consultar horario_seccion','1'),(98,'registrar inscipcion','1'),(99,'modificar inscipcion','1'),(100,'eliminar inscipcion','1'),(101,'consultar inscipcion','1'),(102,'registrar ano_academico','1'),(103,'modificar ano_academico','1'),(104,'eliminar ano_academico','1'),(105,'consultar ano_academico','1'),(106,'registrar seguridad','1'),(107,'modificar seguridad','1'),(108,'eliminar seguridad','1'),(109,'consultar seguridad','1'),(110,'permisos seguridad','1'),(111,'registrar pagos_tutor','1'),(112,'consultar pagos_tutor','1'),(113,'generar_reporte_ingresos','1'),(114,'consultar_reporte_egresos','1'),(115,'generar_reporte_egresos','1'),(116,'consultar_reporte_ingresos','1'),(117,'agregar_evento','1'),(118,'modificar_evento','1'),(119,'eliminar_evento','1'),(120,'consultar_evento','1'),(121,'consultarmontos','1'),(122,'modificarmontos','1'),(123,'respaldar','1'),(124,'restaurar','1'),(125,'pagos_reportes','1');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `permisos` with 64 row(s)
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
  KEY `id_permiso` (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=3522 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_permiso`
--

LOCK TABLES `rol_permiso` WRITE;
/*!40000 ALTER TABLE `rol_permiso` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `rol_permiso` VALUES (2456,19,101),(2457,1,111),(2458,1,75),(2459,1,76),(2461,1,112),(3136,1,121),(3466,3,62),(3467,3,63),(3468,3,64),(3469,3,65),(3470,3,66),(3471,3,67),(3472,3,68),(3473,3,69),(3474,3,70),(3475,3,71),(3476,3,72),(3477,3,73),(3478,3,74),(3479,3,75),(3480,3,76),(3481,3,77),(3482,3,78),(3483,3,79),(3484,3,80),(3485,3,81),(3486,3,82),(3487,3,83),(3488,3,84),(3489,3,85),(3490,3,86),(3491,3,87),(3492,3,88),(3493,3,89),(3494,3,90),(3495,3,91),(3496,3,92),(3497,3,93),(3498,3,98),(3499,3,99),(3500,3,100),(3501,3,101),(3502,3,102),(3503,3,103),(3504,3,104),(3505,3,105),(3506,3,106),(3507,3,107),(3508,3,108),(3509,3,109),(3510,3,110),(3511,3,116),(3512,3,114),(3513,3,113),(3514,3,115),(3515,3,125),(3516,3,117),(3517,3,118),(3518,3,119),(3519,3,120),(3520,3,123),(3521,3,124);
/*!40000 ALTER TABLE `rol_permiso` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `rol_permiso` with 62 row(s)
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
INSERT INTO `secciones` VALUES (0,'vacia',1),(1,'A',1),(2,'B',1),(3,'C',1),(4,'D',1),(5,'E',1),(6,'F',1),(7,'G',0),(8,'H',1),(9,'I',1),(10,'J',1),(11,'K',1),(12,'L',0),(13,'M',0),(14,'N',0),(15,'O',0),(16,'P',0),(17,'R',1),(18,'S',1),(19,'T',0),(20,'U',0),(21,'V',0);
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
  KEY `id_anos` (`id_anos`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secciones_años`
--

LOCK TABLES `secciones_años` WRITE;
/*!40000 ALTER TABLE `secciones_años` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `secciones_años` VALUES (1,19,1,1,0),(5,23,1,2,0),(6,0,1,3,0),(7,23,2,1,0),(8,12,2,2,0),(9,12,2,3,0),(10,20,1,4,0),(11,20,1,5,0),(12,20,2,4,0),(13,19,2,5,0),(14,20,3,1,0),(15,20,3,2,0),(16,20,3,4,0),(17,20,3,5,0),(18,20,3,3,0),(19,20,4,1,0),(20,20,4,2,0),(21,20,4,4,0),(22,20,4,5,0),(23,20,4,3,0),(24,18,5,1,0),(25,19,5,2,0),(26,20,5,3,0),(27,20,5,5,0),(28,20,5,4,0),(29,19,1,1,0),(30,25,3,4,1),(31,0,0,1,1),(32,0,0,2,1),(33,0,0,5,1),(34,0,0,3,1),(35,0,0,3,1);
/*!40000 ALTER TABLE `secciones_años` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `secciones_años` with 32 row(s)
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
  PRIMARY KEY (`id`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `usuarios` VALUES ('2827479','admin','jesusfob2021@gmail.com','$2y$10$psNZjqnhFQ8X/cBymADfhOpcHzvrzgwn213EOHkWzj8j/pUpSOu1a','1',3),('28276731','asdasddd','jesusfob2021@gmail.com','$2y$10$sGOAx2JIvBjaSoAlCdzPguPuXZQWd.TEsMc81m.RwFHuwatTTUrTG','1',3),('28621408','Manuel','asdada@gmail.com','$2y$10$lsb/q90vet6LifVqdUBOneMTK9BNZTZKuguczAMVSagTkZu/ViidW','1',1),('28621409','Jesus','asdasda@gmail.com','$2y$10$3vHV.p2WAVG.WiO2r1QrRO7J7NK8OVdqtK7FajzTZ8btyCSVieCuO','1',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `usuarios` with 4 row(s)
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
  KEY `id_tutor` (`id_tutor`)
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

-- Dump completed on: Thu, 01 Feb 2024 23:14:31 +0100
