-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2023 a las 05:53:48
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegiocarlossoublette`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ano_academico`
--

CREATE TABLE `ano_academico` (
  `id` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_cierr` date NOT NULL,
  `evento` varchar(50) NOT NULL,
  `ano_academico` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ano_academico`
--

INSERT INTO `ano_academico` (`id`, `fecha_ini`, `fecha_cierr`, `evento`, `ano_academico`, `estado`) VALUES
(1, '0000-00-00', '0000-00-00', '', '2023-2024', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ano_estudiantes`
--

CREATE TABLE `ano_estudiantes` (
  `id` int(11) NOT NULL,
  `id_ano` int(11) NOT NULL,
  `id_estudiantes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ano_estudiantes`
--

INSERT INTO `ano_estudiantes` (`id`, `id_ano`, `id_estudiantes`) VALUES
(18, 1, '11111111'),
(19, 1, '22222222'),
(20, 1, '33333333');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ano_horario`
--

CREATE TABLE `ano_horario` (
  `id` int(11) NOT NULL,
  `id_ano` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ano_secciones`
--

CREATE TABLE `ano_secciones` (
  `id` int(11) NOT NULL,
  `id_anos` int(11) NOT NULL,
  `id_secciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ano_secciones`
--

INSERT INTO `ano_secciones` (`id`, `id_anos`, `id_secciones`) VALUES
(1, 1, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `años`
--

CREATE TABLE `años` (
  `id` int(11) NOT NULL,
  `anos` varchar(50) NOT NULL,
  `turnos` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `años`
--

INSERT INTO `años` (`id`, `anos`, `turnos`, `estado`) VALUES
(1, '1', 'tarde', 0),
(2, '2', 'mañana', 0),
(3, '5', 'tarde', 0),
(4, '3', 'tarde', 1),
(5, '4', 'tarde', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `años_materias`
--

CREATE TABLE `años_materias` (
  `id` int(11) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `id_anos` int(11) NOT NULL,
  `id_materias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `años_materias`
--

INSERT INTO `años_materias` (`id`, `cantidad`, `id_anos`, `id_materias`) VALUES
(1, 0, 1, 13),
(2, 0, 3, 14),
(3, 0, 4, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `accion` text NOT NULL,
  `modulo` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `fecha`, `accion`, `modulo`, `id_usuario`) VALUES
(1000, '2023-10-05', 'se elimino un representante', 'representantes', 27),
(1001, '2023-10-05', 'se elimino un usuario', 'usuarios', 27),
(1003, '2023-10-10', 'se registro un pago', 'docentes', 27),
(1004, '2023-10-10', 'se elimino un pago', 'docentes', 27),
(1005, '2023-10-10', 'se inscribio un estudiante', 'inscripciones', 27),
(1006, '2023-10-10', 'se registro un pago', 'docentes', 27),
(1007, '2023-10-11', 'se registro un pago', 'docentes', 27),
(1008, '2023-10-11', 'se registro un pago', 'docentes', 27),
(1009, '2023-10-14', 'se registro un pago', 'docentes', 27),
(1010, '2023-10-14', 'se registro un pago', 'docentes', 27),
(1011, '2023-10-14', 'se elimino un pago', 'docentes', 27),
(1012, '2023-10-14', 'se modifico un pago', 'docentes', 27),
(1013, '2023-10-14', 'se modifico un pago', 'docentes', 27),
(1014, '2023-10-17', 'se elimino un estudiante', 'inscripciones', 27),
(1015, '2023-10-19', 'se inscribio un estudiante', 'inscripciones', 27),
(1016, '2023-10-19', 'se inscribio un estudiante', 'inscripciones', 27),
(1017, '2023-10-19', 'se inscribio un estudiante', 'inscripciones', 27),
(1018, '2023-10-19', 'se inscribio un estudiante', 'inscripciones', 27),
(1019, '2023-10-19', 'se registraron permisos', 'seguridad', 27),
(1020, '2023-10-19', 'se inscribio un estudiante', 'inscripciones', 27),
(1021, '2023-10-19', 'se inscribio un estudiante', 'inscripciones', 27),
(1022, '2023-10-19', 'se registro un pago', 'docentes', 27),
(1023, '2023-10-19', 'se registro un representante', 'representantes', 27),
(1024, '2023-10-19', 'se elimino un usuario', 'usuarios', 27),
(1026, '2023-10-30', 'se registro un representante', 'representantes', 27),
(1027, '2023-10-30', 'se registro un representante', 'representantes', 27),
(1028, '2023-10-30', 'se inscribio un estudiante', 'inscripciones', 27),
(1029, '2023-10-30', 'se inscribio un estudiante', 'inscripciones', 27),
(1030, '2023-10-30', 'se inscribio un estudiante', 'inscripciones', 27),
(1031, '2023-10-30', 'se registro un pago', 'docentes', 32),
(1032, '2023-10-30', 'se registro un pago', 'docentes', 32),
(1033, '2023-10-30', 'se registro un pago', 'docentes', 33),
(1034, '2023-10-30', 'se modifico un pago', 'docentes', 27),
(1035, '2023-10-30', 'se registro un pago', 'docentes', 33),
(1036, '2023-10-30', 'se registro un pago', 'docentes', 32),
(1037, '2023-10-31', 'se modifico un pago', 'docentes', 27),
(1038, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1039, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1040, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1041, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1042, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1043, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1044, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1045, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1046, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1047, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1048, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1049, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1050, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1051, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1052, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1053, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1054, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1055, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1056, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1057, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1058, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1059, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1060, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1061, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1062, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1063, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1064, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1065, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1066, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1067, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1068, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1069, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1070, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1071, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1072, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1073, '2023-10-31', 'se modifico un pago', 'docentes', 27),
(1074, '2023-10-31', 'se modifico un pago', 'docentes', 27),
(1075, '2023-10-31', 'se modifico un pago', 'docentes', 27),
(1076, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1077, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1078, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1079, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1080, '2023-10-31', 'se registro un pago', 'docentes', 32),
(1081, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1082, '2023-10-31', 'se registro un pago', 'docentes', 27),
(1083, '2023-10-31', 'se modifico un pago', 'docentes', 27),
(1084, '2023-11-01', 'se registro un pago', 'docentes', 27),
(1085, '2023-11-02', 'se registro un pago', 'docentes', 27),
(1086, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1087, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1088, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1089, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1090, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1091, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1092, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1093, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1094, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1095, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1096, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1097, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1098, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1099, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1100, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1101, '2023-11-03', 'se registro un pago', 'docentes', 27),
(1102, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1103, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1104, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1105, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1106, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1107, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1108, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1109, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1110, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1111, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1112, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1113, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1114, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1115, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1116, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1117, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1118, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1119, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1120, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1121, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1122, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1123, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1124, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1125, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1126, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1127, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1128, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1129, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1130, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1131, '2023-11-04', 'se registro un pago', 'docentes', 33),
(1132, '2023-11-04', 'se registro un pago', 'docentes', 27),
(1133, '2023-11-04', 'se modifico un pago', 'docentes', 27),
(1134, '2023-11-05', 'se registro un pago', 'docentes', 32),
(1135, '2023-11-05', 'se registro un pago', 'docentes', 32),
(1136, '2023-11-05', 'se registro un pago', 'docentes', 32),
(1137, '2023-11-05', 'se registro un pago', 'docentes', 32),
(1138, '2023-11-05', 'se registro un pago', 'docentes', 32),
(1139, '2023-11-05', 'se registro un pago', 'docentes', 32),
(1140, '2023-11-05', 'se registro un pago', 'docentes', 32),
(1141, '2023-11-05', 'se registro un pago', 'docentes', 27),
(1142, '2023-11-05', 'se registro un pago', 'docentes', 27),
(1143, '2023-11-05', 'se registro un pago', 'docentes', 27),
(1144, '2023-11-05', 'se registro un pago', 'docentes', 27),
(1145, '2023-11-05', 'se registro un pago', 'docentes', 27),
(1146, '2023-11-05', 'se registro un pago', 'docentes', 27),
(1147, '2023-11-05', 'se registro un pago', 'docentes', 27),
(1148, '2023-11-05', 'se registro un pago', 'docentes', 27),
(1149, '2023-11-05', 'se registro un pago', 'docentes', 27),
(1150, '2023-11-05', 'se registro un pago', 'docentes', 27),
(1151, '2023-11-05', 'se registro un pago', 'docentes', 27),
(1152, '2023-11-05', 'se registro un pago', 'docentes', 27),
(1153, '2023-11-05', 'se registro un pago', 'docentes', 27),
(1154, '2023-11-05', 'se registro un pago', 'docentes', 27),
(1155, '2023-11-05', 'se modifico un pago', 'docentes', 27),
(1156, '2023-11-05', 'se registro un pago', 'docentes', 33),
(1157, '2023-11-05', 'se registro un pago', 'docentes', 33),
(1158, '2023-11-05', 'se registro un pago', 'docentes', 33),
(1159, '2023-11-05', 'se registro un pago', 'docentes', 32),
(1160, '2023-11-05', 'se registro un pago', 'docentes', 32),
(1161, '2023-11-05', 'se modifico un pago', 'docentes', 27),
(1162, '2023-11-05', 'se modifico un pago', 'docentes', 27),
(1163, '2023-11-05', 'se modifico un pago', 'docentes', 27),
(1164, '2023-11-05', 'se modifico un pago', 'docentes', 27),
(1165, '2023-11-05', 'se modifico un pago', 'docentes', 27),
(1166, '2023-11-05', 'se registró una materia', 'materias', 27),
(1167, '2023-11-05', 'se registró una materia', 'materias', 27),
(1168, '2023-11-05', 'se elimino una materia', 'materias', 27),
(1169, '2023-11-05', 'se registró una materia', 'materias', 27),
(1170, '2023-11-05', 'se registro una seccion', 'secciones', 27),
(1171, '2023-11-05', 'se modifico datos adicionales de una seccion', 'secciones', 27),
(1172, '2023-11-05', 'se elimino una seccion', 'seccion', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudas`
--

CREATE TABLE `deudas` (
  `id` int(11) NOT NULL,
  `id_estudiante` varchar(100) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `estado` int(10) NOT NULL,
  `estado_deudas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `deudas`
--

INSERT INTO `deudas` (`id`, `id_estudiante`, `concepto`, `fecha`, `estado`, `estado_deudas`) VALUES
(51, '11111111', 'inscripcion', '2023-10-30', 1, 0),
(52, '22222222', 'mensualidad', '2023-11-29', 1, 0),
(53, '33333333', 'inscripcion', '2023-08-30', 1, 1),
(54, '11111111', 'mensualidad', '2023-11-30', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

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
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`cedula`, `nombre`, `apellido`, `categoria`, `fecha_nacimiento`, `especializacion`, `profecion`, `edad`, `anos_trabajo`, `correo`, `direccion`, `estado`) VALUES
('000033', 'qweqwe', 'qweqwe', 'qweqwe', '2023-07-20', 'qweqwe', 'qweqwe', '12', '12', 'dejesus2018@gmail.com', 'ElCercado', 0),
('000101', 'María', 'Rodríguez', 'Docente', '1981-06-12', 'Historia', 'Licenciada', '41', '19', 'maria.rodriguez@example.com', 'Calle 101', 1),
('000102', 'Pedro', 'García', 'Docente', '1974-09-25', 'Geografía', 'Licenciado', '48', '21', 'pedro.garcia@example.com', 'Calle 102', 1),
('000103', 'Laura', 'Martínez', 'Docente', '1987-02-18', 'Biología', 'Licenciada', '35', '13', 'laura.martinez@example.com', 'Calle 103', 1),
('000104', 'Carlos', 'Fernández', 'Docente', '1978-12-05', 'Química', 'Licenciado', '44', '17', 'carlos.fernandez@example.com', 'Calle 104', 1),
('000105', 'Sofía', 'Hernández', 'Docente', '1983-04-30', 'Arte', 'Licenciada', '39', '16', 'sofia.hernandez@example.com', 'Calle 105', 1),
('000106', 'Antonio', 'Gómez', 'Docente', '1979-10-15', 'Educación Física', 'Licenciado', '43', '18', 'antonio.gomez@example.com', 'Calle 106', 1),
('300190123', 'santiago', 'casamayor', 'docente', '2023-09-13', 'programacion', 'docevec', '23', '3', 'santiagocasamayor@gmail.com', 'sdaddas', 0),
('30019081', 'Luis', 'Perez', 'matematicas', '2002', 'fisica', 'programador', '21', '2', 'santiagocasamayor14@gmail.com', 'calle51a entre 18 y 19', 1),
('30019082', 'santiago', 'casamayor', 'docente', '2023-09-13', 'programacion', 'docevec', '23', '3', 'santiagocasamayor@gmail.com', 'sdaddas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_guia`
--

CREATE TABLE `docente_guia` (
  `id` int(11) NOT NULL,
  `id_docente` varchar(50) NOT NULL,
  `id_ano_seccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docente_guia`
--

INSERT INTO `docente_guia` (`id`, `id_docente`, `id_ano_seccion`) VALUES
(1, '000033', 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_horario`
--

CREATE TABLE `docente_horario` (
  `id` int(11) NOT NULL,
  `id_docente` varchar(50) NOT NULL,
  `id_horario_docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docente_horario`
--

INSERT INTO `docente_horario` (`id`, `id_docente`, `id_horario_docente`) VALUES
(1, '000033', 1),
(2, '000033', 2),
(3, '000033', 3),
(4, '000033', 4),
(5, '000033', 5),
(6, '000033', 6),
(7, '30019081', 7),
(8, '30019081', 8),
(9, '30019081', 9),
(10, '000033', 10),
(11, '000033', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_horario_secciones`
--

CREATE TABLE `docente_horario_secciones` (
  `id` int(11) NOT NULL,
  `id_docente` varchar(50) NOT NULL,
  `id_horario_secciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `cedula` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(50) NOT NULL,
  `observaciones` varchar(250) NOT NULL,
  `materias_pendientes` varchar(250) NOT NULL,
  `id_anos_secciones` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`cedula`, `nombre`, `apellido`, `edad`, `observaciones`, `materias_pendientes`, `id_anos_secciones`, `estado`) VALUES
('11111111', 'hijomanuel', 'hijomanuel', 22, 'hijomanuel', 'aprobado', 1, 1),
('22222222', 'hijojesus', 'hijojesus', 11, 'hijojesus', 'aprobado', 23, 1),
('33333333', 'otromanuel', 'otromanuel', 23, 'otromanuel', 'aprobado', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes_tutor`
--

CREATE TABLE `estudiantes_tutor` (
  `id` int(11) NOT NULL,
  `id_estudiantes` varchar(50) NOT NULL,
  `id_tutor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes_tutor`
--

INSERT INTO `estudiantes_tutor` (`id`, `id_estudiantes`, `id_tutor`) VALUES
(5, '11111111', '28621409'),
(6, '22222222', '28621408'),
(7, '33333333', '28621409');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_ficha`
--

CREATE TABLE `estudiante_ficha` (
  `id` int(11) NOT NULL,
  `id_estudiantes` varchar(50) NOT NULL,
  `id_ficha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante_ficha`
--

INSERT INTO `estudiante_ficha` (`id`, `id_estudiantes`, `id_ficha`) VALUES
(6, '11111111', 6),
(7, '22222222', 7),
(8, '33333333', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_medica`
--

CREATE TABLE `ficha_medica` (
  `id` int(11) NOT NULL,
  `tratamientos` varchar(250) NOT NULL,
  `alergias` varchar(250) NOT NULL,
  `medicamentos` varchar(250) NOT NULL,
  `enfermedades` varchar(250) NOT NULL,
  `operaciones` varchar(250) NOT NULL,
  `vacunas` varchar(250) NOT NULL,
  `tipo_de_sangre` varchar(250) NOT NULL,
  `condicion_medica` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ficha_medica`
--

INSERT INTO `ficha_medica` (`id`, `tratamientos`, `alergias`, `medicamentos`, `enfermedades`, `operaciones`, `vacunas`, `tipo_de_sangre`, `condicion_medica`) VALUES
(1, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'aprobado', 'N/A', 'N/A'),
(2, 'fsdfsdfsd', 'fsdfsdfsdf', 'sdfsdfsdf', 'fsdfsdfsdf', 'fsadfsdf', 'fasdasdasd', 'dasdasdasd', 'fsdfsdf'),
(3, 'ninguno', 'polvo', 'ninguno', 'ninguna', 'ninguna', 'aprobado', 'o', 'ninguna'),
(4, 'fsdfsdfsd', 'fsdfsdfsdf', 'sdfsdfsdf', 'fsdfsdfsdf', 'fsadfsdf', 'fasdasdasd', 'dasdasdasd', 'fsdfsdf'),
(5, 'aaaaaaaaaaaaaaaaaaaaaaaaaa', 'ssssssssssssssssssssssssss', 'ssssssssssssssssssssssssss', 'ssssssssssssssssssssssssss', 'asdasd', 'asdasdasd', 'asdasdasd', 'ssssssssssssssssssssssssss'),
(6, 'hijomanuel', 'hijomanuel', 'hijomanuel', 'hijomanuel', 'hijomanuel', 'hijomanuel', 'hijomanuel', 'hijomanuel'),
(7, 'hijojesus', 'hijojesus', 'hijojesus', 'hijojesus', 'hijojesus', 'hijojesus', 'hijojesus', 'hijojesus'),
(8, 'otromanuel', 'otromanuel', 'otromanuel', 'otromanuel', 'asdasd', 'otromanuel', 'otromanuel', 'otromanuel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_docente`
--

CREATE TABLE `horario_docente` (
  `id` int(11) NOT NULL,
  `clase_inicia` time NOT NULL,
  `clase_termina` time NOT NULL,
  `dia` int(1) NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `id_ano_seccion` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario_docente`
--

INSERT INTO `horario_docente` (`id`, `clase_inicia`, `clase_termina`, `dia`, `inicio`, `fin`, `id_ano_seccion`, `estado`) VALUES
(1, '20:18:00', '22:18:00', 1, '2023-09-01', '2023-09-30', 5, 0),
(2, '21:33:00', '12:33:00', 3, '2023-09-01', '2023-09-30', 6, 0),
(3, '19:51:00', '20:50:00', 3, '2023-09-01', '2023-09-30', 6, 0),
(4, '21:00:00', '22:01:00', 2, '2023-09-01', '2023-09-30', 5, 0),
(5, '21:44:00', '21:44:00', 4, '2023-09-01', '2023-09-30', 6, 0),
(6, '22:01:00', '23:01:00', 1, '2023-09-01', '2023-09-30', 5, 0),
(7, '11:21:00', '13:22:00', 5, '2023-09-01', '2023-09-30', 7, 0),
(8, '01:55:00', '04:55:00', 5, '2023-09-01', '2023-09-30', 5, 0),
(9, '10:33:00', '00:33:00', 3, '2023-09-01', '2023-09-30', 7, 0),
(10, '15:47:00', '17:47:00', 4, '2023-09-21', '2023-09-27', 1, 0),
(11, '13:50:00', '17:50:00', 4, '2023-09-06', '2023-09-28', 6, 1),
(12, '12:53:00', '17:50:00', 3, '2023-09-05', '2023-10-05', 7, 1),
(13, '12:55:00', '16:56:00', 4, '2023-09-06', '2023-09-29', 1, 1),
(14, '14:53:00', '18:53:00', 4, '2023-09-13', '2023-09-30', 15, 1),
(15, '13:54:00', '17:54:00', 5, '2023-09-14', '2023-10-07', 8, 1),
(16, '13:55:00', '15:55:00', 4, '2023-09-14', '2023-09-28', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_secciones`
--

CREATE TABLE `horario_secciones` (
  `id` int(11) NOT NULL,
  `hora_inicio` varchar(100) NOT NULL,
  `hora_cierre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `id_ano_seccion` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`, `estado`) VALUES
(1, 'ddddddddddddddddddd', 0),
(2, 'historia', 0),
(3, 'aaaaaaaaaaaa', 1),
(4, 'soberania', 0),
(5, 'asdasdddaaaaaaaaa', 1),
(6, 'asdasdasd', 0),
(7, 'asdasdasdddd', 0),
(8, 'xxxxxxxxxxxx', 0),
(9, 'ddddddddddddd', 0),
(10, 'ssssssss', 0),
(11, 'xzxzxzxzxzx', 0),
(12, 'asdasddd', 0),
(13, 'MATEMATICA', 1),
(14, 'INGLES', 0),
(15, 'INGLES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_docentes`
--

CREATE TABLE `materias_docentes` (
  `id` int(11) NOT NULL,
  `estado` int(2) NOT NULL,
  `id_materias` int(11) NOT NULL,
  `id_docente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias_docentes`
--

INSERT INTO `materias_docentes` (`id`, `estado`, `id_materias`, `id_docente`) VALUES
(1, 1, 13, '30019082'),
(2, 1, 14, '000102'),
(3, 1, 14, '000104'),
(4, 0, 14, '30019081'),
(5, 1, 15, '000104'),
(6, 1, 15, '000105'),
(7, 1, 15, '30019081'),
(8, 1, 15, '30019082');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_horario_docente`
--

CREATE TABLE `materia_horario_docente` (
  `id` int(11) NOT NULL,
  `id_materias` int(11) NOT NULL,
  `id_horario_docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia_horario_docente`
--

INSERT INTO `materia_horario_docente` (`id`, `id_materias`, `id_horario_docente`) VALUES
(1, 3, 1),
(2, 2, 2),
(3, 1, 3),
(4, 2, 4),
(5, 3, 5),
(6, 1, 6),
(7, 4, 7),
(8, 2, 8),
(9, 3, 9),
(10, 1, 10),
(11, 2, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materi_horario_secciones`
--

CREATE TABLE `materi_horario_secciones` (
  `id` int(11) NOT NULL,
  `id_materias` int(11) NOT NULL,
  `id_horario_secciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `mensaje`, `estado`, `titulo`, `created_at`) VALUES
(47, 'hay una deuda pendiente con concepto de: inscripcion que corresponde al estudiante: sssssssss, 30019081', 1, 'pago de deuda', '2023-10-18 22:32:28'),
(48, 'hay una deuda pendiente con concepto de: mensualidad que corresponde al estudiante: sssssssss, 30019081', 1, 'pago de deuda', '2023-10-18 22:32:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `id_deudas` int(11) NOT NULL,
  `identificador` int(100) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `concepto` varchar(50) NOT NULL,
  `forma` varchar(20) NOT NULL,
  `monto` int(11) NOT NULL,
  `meses` int(2) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `estado_pagos` int(11) NOT NULL,
  `estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `id_deudas`, `identificador`, `fecha`, `concepto`, `forma`, `monto`, `meses`, `estado`, `estado_pagos`, `estatus`) VALUES
(3440, 51, 1112, '2023-10-30', 'inscripcion', 'Transferencia', 1111, 1, 'RETORNADO', 1, 0),
(3443, 54, 2222, '2023-06-30', 'mensualidad', 'Pago Movil', 2222, 2, 'CONFIRMADO', 1, 0),
(3444, 51, 1111, '2023-10-30', 'inscripcion', 'Transferencia', 1111, 1, 'RETORNADO', 1, 0),
(3445, 54, 2222, '2023-06-30', 'mensualidad', 'Efectivo', 2222, 12, 'CONFIRMADO', 1, 0),
(3446, 54, 3333, '2023-06-30', 'mensualidad', 'Transferencia', 22221, 2, 'CONFIRMADO', 1, 0),
(3447, 54, 2222, '2023-06-30', 'mensualidad', 'Transferencia', 2222, 2, 'CONFIRMADO', 1, 0),
(3448, 54, 2222, '2023-11-05', 'mensualidad', 'Transferencia', 2222, 2, 'CONFIRMADO', 1, 0),
(3449, 51, 1111, '2023-11-05', 'inscripcion', 'Transferencia', 1111, 1, 'RETORNADO', 1, 0),
(3450, 54, 3333, '2023-11-05', 'mensualidad', 'Efectivo', 3333, 3, 'CONFIRMADO', 0, 0),
(3451, 52, 1111, '2023-11-05', 'mensualidad', 'Pago Movil', 11111, 2, 'CONFIRMADO', 0, 1),
(3452, 52, 2222, '2023-11-05', 'mensualidad', 'Pago Movil', 2222, 3, 'CONFIRMADO', 0, 1),
(3453, 52, 3333, '2023-11-05', 'mensualidad', 'Transferencia', 3333, 1, 'CONFIRMADO', 0, 1),
(3454, 51, 4444, '2023-11-05', 'inscripcion', 'Efectivo', 4444, 1, 'CONFIRMADO', 0, 1),
(3455, 54, 5555, '2023-11-05', 'mensualidad', 'Efectivo', 5555, 5, 'CONFIRMADO', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`, `estado`) VALUES
(62, 'registrar usuario', '1'),
(63, 'modificar usuario', '1'),
(64, 'eliminar usuario', '1'),
(65, 'consultar usuario', '1'),
(66, 'registrar docente', '1'),
(67, 'modificar docente', '1'),
(68, 'eliminar docente', '1'),
(69, 'consultar docente', '1'),
(70, 'registrar representante', '1'),
(71, 'modificar representante', '1'),
(72, 'eliminar representante', '1'),
(73, 'consultar representante', '1'),
(74, 'registrar pagos', '1'),
(75, 'modificar pagos', '1'),
(76, 'eliminar pagos', '1'),
(77, 'consultar pagos', '1'),
(78, 'registrar materias', '1'),
(79, 'modificar materias', '1'),
(80, 'eliminar materias', '1'),
(81, 'consultar materias', '1'),
(82, 'registrar anos', '1'),
(83, 'modificar anos', '1'),
(84, 'eliminar anos', '1'),
(85, 'consultar anos', '1'),
(86, 'registrar secciones', '1'),
(87, 'modificar secciones', '1'),
(88, 'eliminar secciones', '1'),
(89, 'consultar secciones', '1'),
(90, 'registrar horario_docente', '1'),
(91, 'modificar horario_docente', '1'),
(92, 'eliminar horario_docente', '1'),
(93, 'consultar horario_docente', '1'),
(94, 'registrar horario_seccion', '1'),
(95, 'modificar horario_seccion', '1'),
(96, 'eliminar horario_seccion', '1'),
(97, 'consultar horario_seccion', '1'),
(98, 'registrar inscipcion', '1'),
(99, 'modificar inscipcion', '1'),
(100, 'eliminar inscipcion', '1'),
(101, 'consultar inscipcion', '1'),
(102, 'registrar ano_academico', '1'),
(103, 'modificar ano_academico', '1'),
(104, 'eliminar ano_academico', '1'),
(105, 'consultar ano_academico', '1'),
(106, 'registrar seguridad', '1'),
(107, 'modificar seguridad', '1'),
(108, 'eliminar seguridad', '1'),
(109, 'consultar seguridad', '1'),
(110, 'permisos seguridad', '1'),
(111, 'registrar pagos_tutor', '1'),
(112, 'consultar pagos_tutor', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'tutor', 'tutor legal', '1'),
(3, 'superusuario', 'tiene todos los permisos', '1'),
(19, 'distribuidor', 'paolasssss', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_permiso`
--

CREATE TABLE `rol_permiso` (
  `id` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `rol_permiso`
--

INSERT INTO `rol_permiso` (`id`, `id_rol`, `id_permiso`) VALUES
(2354, 3, 62),
(2355, 3, 63),
(2356, 3, 64),
(2357, 3, 65),
(2358, 3, 66),
(2359, 3, 67),
(2360, 3, 68),
(2361, 3, 69),
(2362, 3, 70),
(2363, 3, 71),
(2364, 3, 72),
(2365, 3, 73),
(2366, 3, 74),
(2368, 3, 75),
(2369, 3, 76),
(2370, 3, 77),
(2371, 3, 78),
(2372, 3, 79),
(2373, 3, 80),
(2374, 3, 81),
(2375, 3, 82),
(2376, 3, 83),
(2377, 3, 84),
(2378, 3, 85),
(2379, 3, 86),
(2380, 3, 87),
(2381, 3, 88),
(2382, 3, 89),
(2383, 3, 90),
(2384, 3, 91),
(2385, 3, 92),
(2386, 3, 93),
(2387, 3, 94),
(2388, 3, 95),
(2389, 3, 96),
(2390, 3, 97),
(2391, 3, 98),
(2392, 3, 99),
(2393, 3, 100),
(2394, 3, 101),
(2395, 3, 102),
(2396, 3, 103),
(2397, 3, 104),
(2398, 3, 105),
(2399, 3, 106),
(2400, 3, 107),
(2401, 3, 108),
(2402, 3, 109),
(2403, 3, 110),
(2456, 19, 101),
(2457, 1, 111),
(2458, 1, 75),
(2459, 1, 76),
(2461, 1, 112);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `secciones` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `secciones`, `estado`) VALUES
(1, 'a', 1),
(2, 'b', 1),
(3, 'c', 1),
(4, 'd', 1),
(5, 'e', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones_años`
--

CREATE TABLE `secciones_años` (
  `id` int(11) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `id_secciones` int(11) NOT NULL,
  `id_anos` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `secciones_años`
--

INSERT INTO `secciones_años` (`id`, `cantidad`, `id_secciones`, `id_anos`, `estado`) VALUES
(1, 20, 1, 1, 0),
(5, 23, 1, 2, 0),
(6, 0, 1, 3, 0),
(7, 23, 2, 1, 0),
(8, 12, 2, 2, 0),
(9, 12, 2, 3, 0),
(10, 20, 1, 4, 0),
(11, 20, 1, 5, 0),
(12, 20, 2, 4, 0),
(13, 20, 2, 5, 0),
(14, 20, 3, 1, 0),
(15, 20, 3, 2, 0),
(16, 20, 3, 4, 0),
(17, 20, 3, 5, 0),
(18, 20, 3, 3, 0),
(19, 20, 4, 1, 0),
(20, 20, 4, 2, 0),
(21, 20, 4, 4, 0),
(22, 20, 4, 5, 0),
(23, 20, 4, 3, 0),
(24, 20, 5, 1, 0),
(25, 20, 5, 2, 0),
(26, 20, 5, 3, 0),
(27, 20, 5, 5, 0),
(28, 20, 5, 4, 0),
(29, 19, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor_legal`
--

CREATE TABLE `tutor_legal` (
  `cedula` varchar(50) NOT NULL,
  `nombre1` varchar(100) NOT NULL,
  `nombre2` varchar(100) NOT NULL,
  `apellido1` varchar(100) NOT NULL,
  `apellido2` varchar(100) NOT NULL,
  `contacto_emer` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tutor_legal`
--

INSERT INTO `tutor_legal` (`cedula`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `contacto_emer`, `telefono`, `correo`, `estado`) VALUES
('28621408', 'jesus', 'jesus', 'jesus', 'jesus', '33333333333', '33333333333', 'jesus@gmail.com', 1),
('28621409', 'manuel', 'manuel', 'manuel', 'manuel', '22222222222', '22222222222', 'manuel@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `clave`, `estado`, `id_rol`) VALUES
(27, 'admin', 'jesusfob2021@gmail.com', '$2y$10$psNZjqnhFQ8X/cBymADfhOpcHzvrzgwn213EOHkWzj8j/pUpSOu1a', '1', 3),
(32, 'manuel', 'manuel@gmail.com', '$2y$10$nguGHrrSdlbPX.ugrZrCGOkgz3BHKk.3y1nzmJ40FTdEV3CUAz.gS', '1', 1),
(33, 'jesus', 'jesus@gmail.com', '$2y$10$NXT9XMJ6c/vR1Aby6Cf1r.3Ja9h6mq/mOy6otcFtayNnkgI./hUgq', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tutor`
--

CREATE TABLE `usuarios_tutor` (
  `id` int(11) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `id_tutor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_tutor`
--

INSERT INTO `usuarios_tutor` (`id`, `id_usuarios`, `id_tutor`) VALUES
(6, 32, '28621409'),
(7, 33, '28621408');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ano_academico`
--
ALTER TABLE `ano_academico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ano_estudiantes`
--
ALTER TABLE `ano_estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ano_2` (`id_ano`),
  ADD KEY `id_estudiantes_2` (`id_estudiantes`);

--
-- Indices de la tabla `ano_horario`
--
ALTER TABLE `ano_horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ano_2` (`id_ano`),
  ADD KEY `id_horario_2` (`id_horario`);

--
-- Indices de la tabla `ano_secciones`
--
ALTER TABLE `ano_secciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anos_2` (`id_anos`),
  ADD KEY `id_secciones_2` (`id_secciones`);

--
-- Indices de la tabla `años`
--
ALTER TABLE `años`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `años_materias`
--
ALTER TABLE `años_materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anos` (`id_anos`),
  ADD KEY `id_materias_2` (`id_materias`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario_2` (`id_usuario`);

--
-- Indices de la tabla `deudas`
--
ALTER TABLE `deudas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `docente_guia`
--
ALTER TABLE `docente_guia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_docente_2` (`id_docente`),
  ADD KEY `id_ano_seccion_2` (`id_ano_seccion`);

--
-- Indices de la tabla `docente_horario`
--
ALTER TABLE `docente_horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_docente_2` (`id_docente`),
  ADD KEY `id_horio_docente_2` (`id_horario_docente`);

--
-- Indices de la tabla `docente_horario_secciones`
--
ALTER TABLE `docente_horario_secciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_docente_2` (`id_docente`),
  ADD KEY `id_horario_secciones_2` (`id_horario_secciones`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `id_anos_secciones_2` (`id_anos_secciones`);

--
-- Indices de la tabla `estudiantes_tutor`
--
ALTER TABLE `estudiantes_tutor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiantes` (`id_estudiantes`),
  ADD KEY `id_tutor_2` (`id_tutor`);

--
-- Indices de la tabla `estudiante_ficha`
--
ALTER TABLE `estudiante_ficha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiantes_2` (`id_estudiantes`),
  ADD KEY `id_ficha_2` (`id_ficha`);

--
-- Indices de la tabla `ficha_medica`
--
ALTER TABLE `ficha_medica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario_docente`
--
ALTER TABLE `horario_docente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ano_seccion_2` (`id_ano_seccion`);

--
-- Indices de la tabla `horario_secciones`
--
ALTER TABLE `horario_secciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ano_seccion_2` (`id_ano_seccion`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias_docentes`
--
ALTER TABLE `materias_docentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_materias_2` (`id_materias`),
  ADD KEY `id_docente_2` (`id_docente`);

--
-- Indices de la tabla `materia_horario_docente`
--
ALTER TABLE `materia_horario_docente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_materias_2` (`id_materias`),
  ADD KEY `id_horario_docente_2` (`id_horario_docente`);

--
-- Indices de la tabla `materi_horario_secciones`
--
ALTER TABLE `materi_horario_secciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_materias_2` (`id_materias`),
  ADD KEY `id_horario_secciones_2` (`id_horario_secciones`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_deudas` (`id_deudas`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_permiso` (`id_permiso`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones_años`
--
ALTER TABLE `secciones_años`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_secciones_2` (`id_secciones`),
  ADD KEY `id_anos` (`id_anos`);

--
-- Indices de la tabla `tutor_legal`
--
ALTER TABLE `tutor_legal`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `usuarios_tutor`
--
ALTER TABLE `usuarios_tutor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`),
  ADD KEY `id_tutor` (`id_tutor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ano_academico`
--
ALTER TABLE `ano_academico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ano_estudiantes`
--
ALTER TABLE `ano_estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `ano_horario`
--
ALTER TABLE `ano_horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ano_secciones`
--
ALTER TABLE `ano_secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `años`
--
ALTER TABLE `años`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `años_materias`
--
ALTER TABLE `años_materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1173;

--
-- AUTO_INCREMENT de la tabla `deudas`
--
ALTER TABLE `deudas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `docente_guia`
--
ALTER TABLE `docente_guia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `docente_horario`
--
ALTER TABLE `docente_horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `docente_horario_secciones`
--
ALTER TABLE `docente_horario_secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiantes_tutor`
--
ALTER TABLE `estudiantes_tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estudiante_ficha`
--
ALTER TABLE `estudiante_ficha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ficha_medica`
--
ALTER TABLE `ficha_medica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `horario_docente`
--
ALTER TABLE `horario_docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `horario_secciones`
--
ALTER TABLE `horario_secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `materias_docentes`
--
ALTER TABLE `materias_docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `materia_horario_docente`
--
ALTER TABLE `materia_horario_docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `materi_horario_secciones`
--
ALTER TABLE `materi_horario_secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3456;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2462;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `secciones_años`
--
ALTER TABLE `secciones_años`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuarios_tutor`
--
ALTER TABLE `usuarios_tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ano_estudiantes`
--
ALTER TABLE `ano_estudiantes`
  ADD CONSTRAINT `ano_estudiantes_ibfk_1` FOREIGN KEY (`id_estudiantes`) REFERENCES `estudiantes` (`cedula`),
  ADD CONSTRAINT `ano_estudiantes_ibfk_2` FOREIGN KEY (`id_ano`) REFERENCES `ano_academico` (`id`);

--
-- Filtros para la tabla `ano_horario`
--
ALTER TABLE `ano_horario`
  ADD CONSTRAINT `ano_horario_ibfk_1` FOREIGN KEY (`id_ano`) REFERENCES `ano_academico` (`id`),
  ADD CONSTRAINT `ano_horario_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `horario_secciones` (`id`);

--
-- Filtros para la tabla `ano_secciones`
--
ALTER TABLE `ano_secciones`
  ADD CONSTRAINT `ano_secciones_ibfk_1` FOREIGN KEY (`id_anos`) REFERENCES `ano_academico` (`id`),
  ADD CONSTRAINT `ano_secciones_ibfk_2` FOREIGN KEY (`id_secciones`) REFERENCES `secciones_años` (`id`);

--
-- Filtros para la tabla `años_materias`
--
ALTER TABLE `años_materias`
  ADD CONSTRAINT `años_materias_ibfk_1` FOREIGN KEY (`id_anos`) REFERENCES `años` (`id`),
  ADD CONSTRAINT `años_materias_ibfk_2` FOREIGN KEY (`id_materias`) REFERENCES `materias` (`id`);

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `deudas`
--
ALTER TABLE `deudas`
  ADD CONSTRAINT `deudas_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`cedula`);

--
-- Filtros para la tabla `docente_guia`
--
ALTER TABLE `docente_guia`
  ADD CONSTRAINT `docente_guia_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`cedula`),
  ADD CONSTRAINT `docente_guia_ibfk_2` FOREIGN KEY (`id_ano_seccion`) REFERENCES `secciones_años` (`id`);

--
-- Filtros para la tabla `docente_horario`
--
ALTER TABLE `docente_horario`
  ADD CONSTRAINT `docente_horario_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`cedula`),
  ADD CONSTRAINT `docente_horario_ibfk_2` FOREIGN KEY (`id_horario_docente`) REFERENCES `horario_docente` (`id`);

--
-- Filtros para la tabla `docente_horario_secciones`
--
ALTER TABLE `docente_horario_secciones`
  ADD CONSTRAINT `docente_horario_secciones_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`cedula`),
  ADD CONSTRAINT `docente_horario_secciones_ibfk_2` FOREIGN KEY (`id_horario_secciones`) REFERENCES `horario_secciones` (`id`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`id_anos_secciones`) REFERENCES `secciones_años` (`id`);

--
-- Filtros para la tabla `estudiantes_tutor`
--
ALTER TABLE `estudiantes_tutor`
  ADD CONSTRAINT `estudiantes_tutor_ibfk_1` FOREIGN KEY (`id_estudiantes`) REFERENCES `estudiantes` (`cedula`),
  ADD CONSTRAINT `estudiantes_tutor_ibfk_2` FOREIGN KEY (`id_tutor`) REFERENCES `tutor_legal` (`cedula`);

--
-- Filtros para la tabla `estudiante_ficha`
--
ALTER TABLE `estudiante_ficha`
  ADD CONSTRAINT `estudiante_ficha_ibfk_1` FOREIGN KEY (`id_ficha`) REFERENCES `ficha_medica` (`id`),
  ADD CONSTRAINT `estudiante_ficha_ibfk_2` FOREIGN KEY (`id_estudiantes`) REFERENCES `estudiantes` (`cedula`);

--
-- Filtros para la tabla `horario_docente`
--
ALTER TABLE `horario_docente`
  ADD CONSTRAINT `horario_docente_ibfk_1` FOREIGN KEY (`id_ano_seccion`) REFERENCES `secciones_años` (`id`);

--
-- Filtros para la tabla `materias_docentes`
--
ALTER TABLE `materias_docentes`
  ADD CONSTRAINT `materias_docentes_ibfk_1` FOREIGN KEY (`id_materias`) REFERENCES `materias` (`id`),
  ADD CONSTRAINT `materias_docentes_ibfk_2` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`cedula`);

--
-- Filtros para la tabla `materia_horario_docente`
--
ALTER TABLE `materia_horario_docente`
  ADD CONSTRAINT `materia_horario_docente_ibfk_1` FOREIGN KEY (`id_horario_docente`) REFERENCES `horario_docente` (`id`),
  ADD CONSTRAINT `materia_horario_docente_ibfk_2` FOREIGN KEY (`id_materias`) REFERENCES `materias` (`id`);

--
-- Filtros para la tabla `materi_horario_secciones`
--
ALTER TABLE `materi_horario_secciones`
  ADD CONSTRAINT `materi_horario_secciones_ibfk_1` FOREIGN KEY (`id_horario_secciones`) REFERENCES `horario_secciones` (`id`),
  ADD CONSTRAINT `materi_horario_secciones_ibfk_2` FOREIGN KEY (`id_materias`) REFERENCES `materias` (`id`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_deudas`) REFERENCES `deudas` (`id`);

--
-- Filtros para la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD CONSTRAINT `rol_permiso_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rol_permiso_ibfk_2` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `secciones_años`
--
ALTER TABLE `secciones_años`
  ADD CONSTRAINT `secciones_años_ibfk_1` FOREIGN KEY (`id_secciones`) REFERENCES `secciones` (`id`),
  ADD CONSTRAINT `secciones_años_ibfk_2` FOREIGN KEY (`id_anos`) REFERENCES `años` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_tutor`
--
ALTER TABLE `usuarios_tutor`
  ADD CONSTRAINT `usuarios_tutor_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `usuarios_tutor_ibfk_2` FOREIGN KEY (`id_tutor`) REFERENCES `tutor_legal` (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
