-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2024 a las 03:58:05
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegiocarlossoublette con prueba de capacitacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ano_academico`
--

CREATE TABLE `ano_academico` (
  `id` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_cierr` date NOT NULL,
  `ano_academico` varchar(50) NOT NULL,
  `estatus` varchar(15) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ano_academico`
--

INSERT INTO `ano_academico` (`id`, `fecha_ini`, `fecha_cierr`, `ano_academico`, `estatus`, `estado`) VALUES
(1, '2024-01-01', '2024-01-31', '2023-2024', 'DESHABILITADO', 0),
(2, '2024-01-01', '2024-01-31', '2023-2025', 'HABILITADO', 1);

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
(21, 1, '11111111'),
(23, 1, '22222222'),
(24, 1, '13123123'),
(25, 1, '12312312'),
(26, 1, '12312313'),
(27, 2, '23434343'),
(28, 2, '24345435'),
(29, 2, '23423465'),
(30, 2, '30019081'),
(31, 2, '28276731'),
(32, 2, '12648292');

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
(1, 1, 29),
(2, 1, 30),
(3, 1, 36),
(4, 1, 37),
(5, 2, 38);

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
(1, '1', 'tarde', 1),
(2, '2', 'mañana', 1),
(3, '3', 'mañana', 1),
(4, '4', 'tarde', 1),
(5, '5', 'tarde', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `años_materias`
--

CREATE TABLE `años_materias` (
  `id` int(11) NOT NULL,
  `id_anos` int(11) NOT NULL,
  `id_materias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `años_materias`
--

INSERT INTO `años_materias` (`id`, `id_anos`, `id_materias`) VALUES
(2, 3, 14),
(3, 4, 15),
(4, 2, 16),
(5, 2, 17),
(6, 1, 37),
(7, 5, 38),
(8, 2, 39),
(9, 3, 40),
(10, 3, 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `accion` text NOT NULL,
  `modulo` varchar(100) NOT NULL,
  `id_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `fecha`, `accion`, `modulo`, `id_usuario`) VALUES
(3, '2024-02-01', 'se registro un pago', 'docentes', '2827479'),
(4, '2024-02-01', 'se modifico un pago', 'docentes', '2827479'),
(5, '2024-02-01', 'se registraron permisos', 'seguridad', '2827479'),
(6, '2024-02-01', 'se modifico un pago', 'docentes', '2827479'),
(7, '2024-02-01', 'Se Actualizo el Abecedario de Secciones', 'secciones', '2827479'),
(8, '2024-02-01', 'Se Actualizo el Abecedario de Secciones', 'secciones', '2827479'),
(9, '2024-02-01', 'Se Actualizo el Abecedario de Secciones', 'secciones', '2827479'),
(10, '2024-02-01', 'se elimino una seccion', 'seccion', '2827479'),
(11, '2024-02-01', 'Se Actualizo el Abecedario de Secciones', 'secciones', '2827479'),
(12, '2024-02-01', 'se modifico un pago', 'docentes', '2827479'),
(13, '2024-02-01', 'se modifico un pago', 'docentes', '2827479'),
(14, '2024-02-03', 'se registro un horario', 'horario_docente', '2827479'),
(15, '2024-02-03', 'se registro un pago', 'docentes', '2827479'),
(16, '2024-02-04', 'se registro una clase', 'Horario', '2827479'),
(17, '2024-02-04', 'se modifico una clase', 'Horario', '2827479'),
(18, '2024-02-04', 'se modifico una clase', 'Horario', '2827479'),
(19, '2024-02-04', 'se modifico una clase', 'Horario', '2827479'),
(20, '2024-02-04', 'se modifico una clase', 'Horario', '2827479'),
(21, '2024-02-04', 'se registro una clase', 'Horario', '2827479'),
(22, '2024-02-04', 'se elimino una clase', 'horario', '2827479'),
(23, '2024-02-04', 'se elimino una seccion', 'seccion', '2827479'),
(24, '2024-02-04', 'se elimino un usuario', 'usuarios', '2827479'),
(25, '2024-02-04', 'se modifico una clase', 'Horario', '2827479'),
(26, '2024-02-04', 'se registro un pago', 'docentes', '2827479'),
(27, '2024-02-05', 'se intento ingresar al sistema', 'login', '0000'),
(28, '2024-02-05', 'se intento ingresar al sistema', 'login', '0000'),
(29, '2024-02-05', 'se inscribio un estudiante', 'inscripciones', '2827479'),
(30, '2024-02-05', 'se modifico un estudiante', 'inscripciones', '2827479'),
(31, '2024-02-05', 'se modifico un estudiante', 'inscripciones', '2827479'),
(32, '2024-02-05', 'se modifico un estudiante', 'inscripciones', '2827479'),
(33, '2024-02-05', 'se modifico un estudiante', 'inscripciones', '2827479'),
(34, '2024-02-06', 'se genero una deuda', 'principal', '2827479'),
(35, '2024-02-08', 'se registro un docente', 'docentes', '2827479'),
(36, '2024-03-31', 'se intento ingresar al sistema', 'login', '0000'),
(37, '2024-04-28', 'se registraron permisos', 'seguridad', '2827479'),
(38, '2024-04-28', 'se intento ingresar al sistema', 'login', '0000'),
(39, '2024-04-28', 'se registraron permisos', 'seguridad', '2827479'),
(40, '2024-04-28', 'se registraron permisos', 'seguridad', '2827479'),
(41, '2024-04-28', 'se registraron permisos', 'seguridad', '2827479'),
(42, '2024-04-28', 'se registraron permisos', 'seguridad', '2827479'),
(43, '2024-04-28', 'se registraron permisos', 'seguridad', '2827479'),
(44, '2024-04-28', 'se registraron permisos', 'seguridad', '2827479'),
(45, '2024-04-28', 'se intento ingresar al sistema', 'login', '0000'),
(46, '2024-04-28', 'se registro un usuario', 'usuarios', '2827479'),
(47, '2024-06-04', 'se elimino una clase', 'Horario', '30019081'),
(48, '2024-06-04', 'se elimino una clase', 'Horario', '30019081'),
(49, '2024-06-06', 'se modifico una clase', 'Horario', '2827479'),
(50, '2024-06-06', 'se modifico una clase', 'Horario', '2827479'),
(51, '2024-06-06', 'se registro una clase', 'Horario', '2827479'),
(52, '2024-06-08', 'se registro una clase', 'Horario', '2827479'),
(53, '2024-06-08', 'se elimino una clase', 'Horario', '2827479'),
(54, '2024-06-08', 'se registro una clase', 'Horario', '2827479'),
(55, '2024-06-08', 'se elimino una clase', 'Horario', '2827479'),
(56, '2024-06-08', 'se registro una clase', 'Horario', '2827479'),
(57, '2024-06-08', 'se intento ingresar al sistema', 'login', '0000'),
(58, '2024-06-08', 'se intento ingresar al sistema', 'login', '0000'),
(59, '2024-06-08', 'se intento ingresar al sistema', 'login', '0000'),
(60, '2024-06-08', 'se intento ingresar al sistema', 'login', '0000'),
(61, '2024-06-09', 'se modifico una clase', 'Horario', '30019081'),
(62, '2024-06-09', 'se modifico un rol', 'seguridad', '2827479'),
(63, '2024-06-09', 'se registraron permisos', 'seguridad', '2827479'),
(64, '2024-06-09', 'se registraron permisos', 'seguridad', '2827479'),
(65, '2024-06-09', 'se registraron permisos', 'seguridad', '2827479'),
(66, '2024-06-09', 'se registro un pago', 'Pagos', '28621409'),
(67, '2024-06-09', 'se registro un pago', 'Pagos', '28621409'),
(68, '2024-06-09', 'se registro un pago', 'Pagos', '2827479'),
(69, '2024-06-09', 'se confirmo un pago', 'Pagos', '2827479'),
(70, '2024-06-09', 'se modifico un pago', 'Pagos', '2827479'),
(71, '2024-06-09', 'se modifico un pago', 'Pagos', '2827479'),
(72, '2024-06-09', 'se modifico un pago', 'Pagos', '2827479'),
(73, '2024-06-09', 'se registraron permisos', 'seguridad', '2827479'),
(74, '2024-06-09', 'se registraron permisos', 'seguridad', '28621409'),
(75, '2024-06-09', 'se registraron permisos', 'seguridad', '2827479'),
(76, '2024-06-09', 'se modifico un pago', 'Pagos', '2827479'),
(77, '2024-06-09', 'se registraron permisos', 'seguridad', '2827479'),
(78, '2024-06-09', 'se registraron permisos', 'seguridad', '2827479'),
(79, '2024-06-09', 'se genero una deuda', 'principal', '28621409'),
(80, '2024-06-09', 'se genero una deuda', 'principal', '28621409'),
(81, '2024-06-09', 'se genero una deuda', 'principal', '28621409'),
(82, '2024-06-09', 'se registraron permisos', 'seguridad', '2827479'),
(83, '2024-06-09', 'se registraron permisos', 'seguridad', '2827479'),
(84, '2024-06-09', 'se registraron permisos', 'seguridad', '2827479'),
(85, '2024-06-09', 'se registraron permisos', 'seguridad', '2827479'),
(86, '2024-06-12', 'se registro un evento', 'eventos', '2827479'),
(87, '2024-06-12', 'se registraron permisos', 'seguridad', '2827479'),
(88, '2024-06-12', 'se registraron permisos', 'seguridad', '2827479'),
(89, '2024-06-12', 'se registraron permisos', 'seguridad', '2827479'),
(90, '2024-06-12', 'se registraron permisos', 'seguridad', '2827479'),
(91, '2024-06-12', 'se registraron permisos', 'seguridad', '2827479'),
(92, '2024-06-13', 'se modifico un estudiante', 'inscripciones', '2827479'),
(93, '2024-06-13', 'se modifico un estudiante', 'inscripciones', '2827479'),
(94, '2024-06-13', 'se modifico un estudiante', 'inscripciones', '2827479'),
(95, '2024-06-13', 'se inscribio un estudiante', 'inscripciones', '2827479'),
(96, '2024-06-13', 'se modifico un estudiante', 'inscripciones', '2827479'),
(97, '2024-06-13', 'se modifico un estudiante', 'inscripciones', '2827479'),
(98, '2024-06-13', 'se inscribio un estudiante', 'inscripciones', '2827479'),
(99, '2024-06-13', 'se modifico un estudiante', 'inscripciones', '2827479'),
(100, '2024-06-13', 'se modifico un estudiante', 'inscripciones', '2827479'),
(101, '2024-06-13', 'se modifico un estudiante', 'inscripciones', '2827479'),
(102, '2024-06-13', 'se modifico un estudiante', 'inscripciones', '2827479'),
(103, '2024-06-13', 'se modifico un estudiante', 'inscripciones', '2827479'),
(104, '2024-06-13', 'se modifico un estudiante', 'inscripciones', '2827479'),
(105, '2024-06-13', 'se inscribio un estudiante', 'inscripciones', '2827479'),
(106, '2024-06-13', 'se modifico un estudiante', 'inscripciones', '2827479'),
(107, '2024-06-13', 'se modifico un estudiante', 'inscripciones', '2827479'),
(108, '2024-06-13', 'se modifico un estudiante', 'inscripciones', '2827479'),
(109, '2024-06-14', 'se inscribio un estudiante', 'inscripciones', '2827479'),
(110, '2024-06-14', 'se inscribio un estudiante', 'inscripciones', '2827479'),
(111, '2024-06-24', 'se intento ingresar al sistema', 'login', '0000'),
(112, '2024-06-29', 'se intento ingresar al sistema', 'login', '0000'),
(113, '2024-07-07', 'se intento ingresar al sistema', 'login', '0000'),
(114, '2024-07-07', 'se intento ingresar al sistema', 'login', '0000'),
(115, '2024-07-07', 'se intento ingresar al sistema', 'login', '0000'),
(116, '2024-07-07', 'se intento ingresar al sistema', 'login', '0000'),
(117, '2024-07-07', 'se intento ingresar al sistema', 'login', '0000'),
(118, '2024-07-08', 'se intento ingresar al sistema', 'login', '0000'),
(119, '2024-07-08', 'se intento ingresar al sistema', 'login', '0000'),
(120, '2024-07-08', 'se registro un usuario', 'usuarios', '30019081'),
(121, '2024-07-08', 'se intento ingresar al sistema', 'login', '0000'),
(122, '2024-07-10', 'se modifico un monto', 'Pagos', '30019081'),
(123, '2024-07-11', 'se registro un rol', 'seguridad', '30019081'),
(124, '2024-07-11', 'se registraron permisos', 'seguridad', '30019081'),
(125, '2024-07-11', 'se registraron permisos', 'seguridad', '30019081'),
(126, '2024-07-11', 'se intento ingresar al sistema', 'login', '0000'),
(127, '2024-07-11', 'se intento ingresar al sistema', 'login', '0000'),
(128, '2024-07-11', 'se intento ingresar al sistema', 'login', '0000'),
(129, '2024-07-11', 'se registro un usuario', 'usuarios', '30019081'),
(130, '2024-07-11', 'se modifico un usuario', 'usuarios', '30019081'),
(131, '2024-07-11', 'se modifico un usuario', 'usuarios', '30019081'),
(132, '2024-07-11', 'Se Actualizo el Abecedario de Secciones', 'secciones', '30019081'),
(133, '2024-07-11', 'se registro una seccion', 'secciones', '30019081'),
(134, '2024-07-11', 'se intento ingresar al sistema', 'login', '0000'),
(135, '2024-07-11', 'se intento ingresar al sistema', 'login', '0000'),
(136, '2024-07-11', 'se intento ingresar al sistema', 'login', '0000'),
(137, '2024-07-11', 'se intento ingresar al sistema', 'login', '0000'),
(138, '2024-07-11', 'se intento ingresar al sistema', 'login', '0000'),
(139, '2024-07-13', 'se registro una clase', 'Horario', '30019081'),
(140, '2024-07-13', 'se registro una clase', 'Horario', '30019081'),
(141, '2024-07-14', 'se genero una deuda', 'principal', '30019081'),
(142, '2024-07-14', 'se registro un rol', 'seguridad', '30019081'),
(143, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(144, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(145, '2024-07-14', 'se registraron permisos', 'seguridad', '30019081'),
(146, '2024-07-14', 'se registro un rol', 'seguridad', '30019081'),
(147, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(148, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(149, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(150, '2024-07-14', 'se modifico una clase', 'Horario', '30019081'),
(151, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(152, '2024-07-14', 'se modifico una clase', 'Horario', '30019081'),
(153, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(154, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(155, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(156, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(157, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(158, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(159, '2024-07-14', 'se modifico una clase', 'Horario', '30019081'),
(160, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(161, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(162, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(163, '2024-07-14', 'se elimino un rol', 'seguridad', '30019081'),
(164, '2024-07-14', 'se elimino una clase', 'Horario', '30019081'),
(165, '2024-07-14', 'se intento ingresar al sistema', 'login', '0000'),
(166, '2024-07-15', 'se elimino un rol', 'seguridad', '30019081'),
(167, '2024-07-15', 'se registro un docente', 'docentes', '30019081'),
(168, '2024-07-15', 'se elimino un docente', 'docentes', '30019081'),
(169, '2024-07-15', 'se elimino un docente', 'docentes', '30019081'),
(170, '2024-07-15', 'se modificco un docente', 'docentes', '30019081'),
(171, '2024-07-15', 'se modificco un docente', 'docentes', '30019081'),
(172, '2024-07-15', 'se modifico un monto', 'Pagos', '30019081'),
(173, '2024-07-15', 'se modifico un monto', 'Pagos', '30019081'),
(174, '2024-07-15', 'se modifico un monto', 'Pagos', '30019081'),
(175, '2024-07-15', 'se modifico un monto', 'Pagos', '30019081'),
(176, '2024-07-15', 'se modifico un monto', 'Pagos', '30019081'),
(177, '2024-07-15', 'se modifico un monto', 'Pagos', '30019081'),
(178, '2024-07-15', 'se modifico un pago', 'Pagos', '30019081'),
(179, '2024-07-15', 'se modifico un pago', 'Pagos', '30019081'),
(180, '2024-07-15', 'se modificco un docente', 'docentes', '30019081'),
(181, '2024-07-15', 'se modifico un representante', 'representantes', '30019081'),
(182, '2024-07-15', 'se modifico un estudiante', 'inscripciones', '30019081'),
(183, '2024-07-15', 'se modifico Docente Guia o Cantidad de la Seccion', 'secciones', '30019081'),
(184, '2024-07-15', 'se modifico una clase', 'Horario', '30019081'),
(185, '2024-07-16', 'se modifico un usuario', 'usuarios', '30019081'),
(186, '2024-07-16', 'se modifico un usuario', 'usuarios', '30019081'),
(187, '2024-07-16', 'se registro un usuario', 'usuarios', '30019081'),
(188, '2024-07-16', 'se registro un usuario', 'usuarios', '30019081'),
(189, '2024-07-16', 'se intento ingresar al sistema', 'login', '0000'),
(190, '2024-07-16', 'se registro un usuario', 'usuarios', '30019081'),
(191, '2024-07-16', 'se intento ingresar al sistema', 'login', '0000'),
(192, '2024-07-16', 'se registro un pago', 'Pagos', '30019081'),
(193, '2024-07-16', 'se registraron permisos', 'seguridad', '30019081'),
(194, '2024-07-17', 'se registro un pago', 'Pagos', '30019081'),
(195, '2024-07-17', 'se modifico un monto', 'Pagos', '30019081'),
(196, '2024-07-17', 'se registro un pago', 'Pagos', '30019081'),
(197, '2024-07-17', 'se registro un pago', 'Pagos', '30019081'),
(198, '2024-07-17', 'se inscribio un estudiante', 'inscripciones', '30019081'),
(199, '2024-07-17', 'se registro un pago', 'Pagos', '30019081'),
(200, '2024-07-17', 'se confirmo un pago', 'Pagos', '30019081'),
(201, '2024-07-17', 'se registro un pago', 'Pagos', '30019081'),
(202, '2024-07-17', 'se modifico una clase', 'Horario', '30019081'),
(203, '2024-07-17', 'se registro una clase', 'Horario', '30019081'),
(204, '2024-07-17', 'se elimino una clase', 'Horario', '30019081'),
(205, '2024-07-17', 'se intento ingresar al sistema', 'login', '0000'),
(206, '2024-07-18', 'se intento ingresar al sistema', 'login', '0000'),
(207, '2024-07-20', 'se solicito un cambio de clave', 'recuperar', '0000'),
(208, '2024-07-20', 'se solicito un cambio de clave', 'recuperar', '0000'),
(209, '2024-07-20', 'se solicito un cambio de clave', 'recuperar', '0000'),
(210, '2024-07-20', 'se solicito un cambio de clave', 'recuperar', '0000'),
(211, '2024-07-20', 'se solicito un cambio de clave', 'recuperar', '0000'),
(212, '2024-07-20', 'se solicito un cambio de clave', 'recuperar', '0000'),
(213, '2024-07-20', 'un usuario cambio su clave', 'recuperar', '0000'),
(214, '2024-07-20', 'se intento ingresar al sistema', 'login', '0000'),
(215, '2024-07-20', 'se solicito un cambio de clave', 'recuperar', '0000'),
(216, '2024-07-20', 'un usuario cambio su clave', 'recuperar', '0000'),
(217, '2024-07-20', 'Cambio de contraseña', 'recuperar', '30664129'),
(218, '2024-10-22', 'se solicito un cambio de clave', 'recuperar', '0000'),
(219, '2024-10-22', 'se registro un rol', 'seguridad', '30019081'),
(220, '2024-10-22', 'se registraron permisos', 'seguridad', '30019081'),
(221, '2024-10-22', 'se inscribio un estudiante', 'inscripciones', '30019081'),
(222, '2024-10-22', 'se modifico un estudiante', 'inscripciones', '30019081'),
(223, '2024-10-22', 'se registro un pago', 'Pagos', '30019081'),
(224, '2024-10-22', 'se elimino una clase', 'Horario', '30019081'),
(225, '2024-11-11', 'se registro un usuario', 'usuarios', '30019081'),
(226, '2024-11-11', 'se modifico un usuario', 'usuarios', '30019081'),
(227, '2024-11-11', 'se intento ingresar al sistema', 'login', '0000'),
(228, '2024-11-11', 'se inscribio un estudiante', 'inscripciones', '16641030'),
(229, '2024-11-11', 'se registro un pago', 'Pagos', '16641030'),
(230, '2024-11-11', 'se registro un usuario', 'usuarios', '16641030'),
(231, '2024-11-11', 'se registro un usuario', 'usuarios', '16641030'),
(232, '2024-11-11', 'se registró una materia', 'materias', '7402476'),
(233, '2024-11-11', 'se elimino una clase', 'Horario', '7402476'),
(234, '2024-11-11', 'se elimino una clase', 'Horario', '7402476'),
(235, '2024-11-11', 'se elimino una clase', 'Horario', '7402476'),
(236, '2024-11-11', 'se elimino una clase', 'Horario', '7402476'),
(237, '2024-11-11', 'se registro una clase', 'Horario', '7402476'),
(238, '2024-11-11', 'se intento ingresar al sistema', 'login', '0000'),
(239, '2024-11-14', 'se registró una materia', 'materias', '7402476'),
(240, '2024-11-14', 'se elimino una materia', 'materias', '7402476'),
(241, '2024-11-14', 'se registro un representante', 'representantes', '7402476');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudas`
--

CREATE TABLE `deudas` (
  `id` int(11) NOT NULL,
  `id_estudiante` varchar(100) NOT NULL,
  `concepto` varchar(25) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `monto` int(10) NOT NULL,
  `estado` int(10) NOT NULL,
  `estado_deudas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `deudas`
--

INSERT INTO `deudas` (`id`, `id_estudiante`, `concepto`, `fecha`, `monto`, `estado`, `estado_deudas`) VALUES
(57, '11111111', 'inscripcion', '2023-10-30', 2160, 1, 0),
(58, '11111111', 'mensualidad', '2024-07-29', 0, 1, 1),
(61, '22222222', 'inscripcion', '2023-08-30', 2160, 1, 0),
(62, '22222222', 'mensualidad', '2024-05-29', 0, 1, 1),
(63, '13123123', 'inscripcion', '2024-02-06', 2160, 1, 0),
(64, '13123123', 'mensualidad', '2024-08-06', 2345, 1, 0),
(65, '22222222', 'mensualidad', '2024-08-06', 5654, 1, 0),
(66, '22222222', 'mensualidad', '2024-08-09', 2233, 1, 0),
(67, '22222222', 'mensualidad', '2024-08-09', 4533, 1, 0),
(68, '13123123', 'mensualidad', '2024-08-09', 2222, 1, 0),
(69, '12312312', 'inscripcion', '2024-06-13', 555, 1, 0),
(70, '12312312', 'mensualidad', '2024-08-13', 1231, 1, 0),
(71, '12312313', 'inscripcion', '2024-06-13', 40, 1, 0),
(72, '12312313', 'mensualidad', '2024-08-13', 1234, 1, 0),
(73, '23434343', 'inscripcion', '2024-06-13', 6769, 1, 0),
(74, '23434343', 'mensualidad', '2024-08-13', 12314, 1, 0),
(75, '24345435', 'inscripcion', '2024-06-15', 5000, 1, 1),
(76, '24345435', 'mensualidad', '2024-08-15', 3000, 1, 0),
(77, '23423465', 'inscripcion', '2024-06-15', 4000, 1, 0),
(78, '23423465', 'mensualidad', '2024-08-15', 2500, 1, 0),
(79, '13123123', 'mensualidad', '2024-08-14', 12345, 1, 0),
(80, '30019081', 'inscripcion', '2024-07-18', 0, 1, 1),
(81, '30019081', 'mensualidad', '2024-07-18', 0, 1, 1),
(82, '28276731', 'inscripcion', '2024-10-22', 0, 1, 1),
(83, '28276731', 'mensualidad', '2024-10-22', 0, 1, 1),
(84, '12648292', 'inscripcion', '2024-11-11', 0, 1, 1),
(85, '12648292', 'mensualidad', '2024-11-11', 0, 1, 1);

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
('28276731', 'asdasddd', 'dasddasd', 'asdasdasd', '2024-02-08', 'asdasd', 'asdasd', '12', '12', 'jesusfob2021@gmail.com', 'asdasdasd', 1),
('300190123', 'santiago', 'casamayor', 'docente', '2023-09-13', 'programacion', 'docevec', '23', '3', 'santiagocasamayor@gmail.com', 'sdaddas', 0),
('30019081', 'Luis', 'Perez', 'matematicas', '2002', 'fisica', 'programador', '21', '2', 'santiagocasamayor14@gmail.com', 'calle51a entre 18 y 19', 1),
('30019082', 'santiago', 'casamayor', 'docente', '2023-09-13', 'programacion', 'docevec', '23', '3', 'santiagocasamayor@gmail.com', 'sdaddas', 1),
('30019089', 'santiagos', 'casamayord', 'docentes', '2024-07-15', 'programaciond', 'docevecd', '23', '32', 'santiagocassamayor@gmail.com', 'calle51a', 0);

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
(1, '000033', 29),
(2, '000103', 30),
(3, '000103', 36),
(4, '000101', 37),
(5, '000104', 38);

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
(11, '000033', 16),
(12, '000102', 17),
(13, '000102', 18),
(14, '000103', 19),
(15, '000102', 20),
(16, '000103', 21),
(17, '000104', 22),
(18, '000104', 24),
(19, '000104', 25),
(20, '000104', 26),
(21, '000103', 27),
(22, '000104', 28),
(24, '30019082', 29),
(26, '30019082', 30),
(27, '28276731', 31),
(28, '000102', 32),
(29, '30019082', 33),
(30, '000104', 34),
(31, '000104', 35),
(32, '000104', 36),
(33, '000104', 37),
(34, '000104', 38),
(35, '000104', 39),
(38, '000104', 21),
(40, '000104', 43),
(41, '000104', 44),
(44, '000104', 47),
(45, '000104', 48),
(46, '000104', 49),
(47, '000104', 50),
(54, '000104', 57),
(58, '000104', 61),
(59, '000104', 43),
(60, '000104', 62),
(61, '000104', 63),
(62, '000104', 64),
(67, '000104', 69),
(68, '000104', 70),
(69, '000104', 71),
(70, '000104', 72),
(71, '000104', 73),
(72, '000104', 74),
(73, '000104', 75),
(74, '000104', 76),
(75, '000104', 77),
(76, '000104', 78),
(77, '000104', 79),
(78, '000105', 80),
(79, '000103', 81),
(80, '000102', 82),
(81, '000105', 83);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dolar_venezuela`
--

CREATE TABLE `dolar_venezuela` (
  `id` int(11) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dolar_venezuela`
--

INSERT INTO `dolar_venezuela` (`id`, `valor`) VALUES
(1, 40);

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
('11111111', 'angel', 'Hijomanuel', 14, 'Ninguna', 'aprobado', 30, 1),
('12312312', 'holccomoestas', 'asdasd', 12, 'asdasdasd', 'aprobado', 30, 1),
('12312313', 'floresaaaa', 'qweqw', 12, 'qweqwe', 'aprobado', 30, 1),
('12648292', 'Carlos', 'Marino', 13, 'Ninguna', 'aprobado', 38, 1),
('13123123', 'sdsdsdsdsdsdsss', 'asdasd', 12, 'asdasdasd', 'aprobado', 30, 1),
('22222222', 'dddddddddddd', 'Hijojesus', 14, 'Ninguna', 'aprobado', 30, 1),
('23423465', 'bbbbbbbbbbbbb', 'bbbbbbbbbbb', 34, 'bbbbbbbbbb', 'aprobado', 38, 1),
('23434343', 'asdasd', 'asdasd', 12, 'aasdasd', 'aprobado', 30, 1),
('24345435', 'asdasd', 'asdasdas', 22, 'asdasdas', 'aprobado', 30, 1),
('28276731', 'angel', 'flore', 22, 'na', 'aprobado', 38, 1),
('30019081', 'santiago', 'casamayor', 15, 'nunguna', 'aprobado', 38, 1);

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
(8, '11111111', '28621408'),
(10, '22222222', '28621409'),
(11, '13123123', '28621408'),
(12, '12312312', '28621408'),
(13, '12312313', '28621408'),
(14, '23434343', '28621408'),
(15, '24345435', '28621408'),
(16, '23423465', '28621408'),
(17, '30019081', '28621409'),
(18, '28276731', '28621408'),
(19, '12648292', '28621408');

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
(9, '11111111', 9),
(11, '22222222', 11),
(12, '13123123', 12),
(13, '12312312', 13),
(14, '12312313', 14),
(15, '23434343', 15),
(16, '24345435', 16),
(17, '23423465', 17),
(18, '30019081', 18),
(19, '28276731', 19),
(20, '12648292', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_cierr` date NOT NULL,
  `evento` varchar(50) NOT NULL,
  `id_ano_academico` int(5) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `fecha_ini`, `fecha_cierr`, `evento`, `id_ano_academico`, `estado`) VALUES
(2, '2024-06-19', '2024-06-27', 'wqdasDASDASDAS', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_docente`
--

CREATE TABLE `eventos_docente` (
  `id` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_docente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos_docente`
--

INSERT INTO `eventos_docente` (`id`, `id_evento`, `id_docente`) VALUES
(1, 2, '000101');

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
(1, 'asdasd', 'N/A', 'N/A', 'N/A', 'N/A', 'aprobado', 'N/A', 'N/A'),
(2, 'fsdfsdfsd', 'fsdfsdfsdf', 'sdfsdfsdf', 'fsdfsdfsdf', 'fsadfsdf', 'fasdasdasd', 'dasdasdasd', 'fsdfsdf'),
(3, 'ninguno', 'polvo', 'ninguno', 'ninguna', 'ninguna', 'aprobado', 'o', 'ninguna'),
(4, 'fsdfsdfsd', 'fsdfsdfsdf', 'sdfsdfsdf', 'fsdfsdfsdf', 'fsadfsdf', 'fasdasdasd', 'dasdasdasd', 'fsdfsdf'),
(5, 'aaaaaaaaaaaaaaaaaaaaaaaaaa', 'ssssssssssssssssssssssssss', 'ssssssssssssssssssssssssss', 'ssssssssssssssssssssssssss', 'asdasd', 'asdasdasd', 'asdasdasd', 'ssssssssssssssssssssssssss'),
(6, 'hijomanuel', 'hijomanuel', 'hijomanuel', 'hijomanuel', 'hijomanuel', 'hijomanuel', 'hijomanuel', 'hijomanuel'),
(7, 'hijojesus', 'hijojesus', 'hijojesus', 'hijojesus', 'hijojesus', 'hijojesus', 'hijojesus', 'hijojesus'),
(8, 'otromanuel', 'otromanuel', 'otromanuel', 'otromanuel', 'asdasd', 'otromanuel', 'otromanuel', 'otromanuel'),
(9, 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna', 'seleccionar,hepatitis b,BCG', 'a+', 'Ninguna'),
(10, 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna', 'seleccionar,BCG', 'a+', 'Ninguna'),
(11, 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna', 'hepatitis b,rotavirus', 'a+', 'Ninguna'),
(12, 'asdasds', 'dasdasd', 'asdasdas', 'asdasd', 'asdasdad', 'seleccionar,pentavalente', 'ab-', 'asdasd'),
(13, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasdasd', 'seleccionar,hepatitis b', 'ab-', 'asdasd'),
(14, 'asdasd', 'asdasd', 'sdasdas', 'asdaasd', 'asdasd', 'seleccionar,hepatitis b,BCG', 'a+', 'asdasd'),
(15, 'asdasdasd', 'asdasdasd', 'asdasd', 'asdasd', 'asdasdasd', 'seleccionar,rotavirus', 'b+', 'asdasdasd'),
(16, 'asdasd', 'asdasd', 'asdasdas', 'asdasd', 'asdasdasd', 'seleccionar,hepatitis b', 'ab-', 'asdasd'),
(17, 'bbbbbbbbbbbbbb', 'bbbbbbbbbb', 'bbbbbbbbbbbbbb', 'bbbbbbbbbbbbb', 'bbbbbbbb', 'seleccionar,hepatitis b', 'ab-', 'bbbbbbbbbbbb'),
(18, 'ninguno', 'polvo', 'ninguno', 'ninguna', 'ninguna', 'seleccionar,hepatitis b,BCG,rotavirus,pentavalente,polio inactiva,polio oral,neumo 13 valente,influencia estacional,fiebre amarilla,srp', 'o+', 'ninguna'),
(19, 'NA', 'NA', 'NA', 'na', 'na', '', '', 'NA'),
(20, 'Ninguna', 'Ninguna', 'NInguna', 'Ninguna', 'Ninguna', 'seleccionar,hepatitis b,BCG,rotavirus,pentavalente', 'b+', 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_ano`
--

CREATE TABLE `horario_ano` (
  `id` int(11) NOT NULL,
  `id_ano` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario_ano`
--

INSERT INTO `horario_ano` (`id`, `id_ano`, `id_horario`) VALUES
(1, 1, 17),
(2, 1, 18),
(3, 1, 19),
(4, 1, 20),
(5, 1, 21),
(24, 1, 21),
(6, 1, 22),
(7, 1, 25),
(8, 1, 26),
(10, 1, 28),
(16, 1, 34),
(17, 1, 35),
(18, 1, 36),
(19, 1, 37),
(20, 1, 38),
(21, 1, 39),
(26, 1, 43),
(45, 1, 43),
(27, 1, 44),
(30, 1, 47),
(31, 1, 48),
(32, 1, 49),
(33, 1, 50),
(40, 1, 57),
(44, 1, 61),
(46, 1, 62),
(47, 1, 63),
(48, 1, 64),
(53, 1, 69),
(54, 1, 70),
(55, 1, 71),
(56, 1, 72),
(57, 1, 73),
(58, 1, 74),
(59, 1, 75),
(60, 1, 76),
(61, 1, 77),
(62, 1, 78),
(63, 1, 79),
(9, 2, 27),
(11, 2, 29),
(12, 2, 30),
(13, 2, 31),
(14, 2, 32),
(15, 2, 33),
(64, 2, 80),
(65, 2, 81),
(66, 2, 82),
(67, 2, 83);

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
(20, '12:24:00', '13:24:00', 1, '2024-01-01', '2024-01-31', 36, 1),
(28, '10:00:00', '11:00:00', 3, '2024-01-01', '2024-01-31', 30, 1),
(29, '16:56:00', '17:56:00', 5, '2024-01-01', '2024-01-31', 30, 0),
(30, '06:03:00', '07:03:00', 4, '2024-01-01', '2024-01-31', 30, 0),
(32, '12:06:00', '14:06:00', 5, '2024-01-01', '2024-01-31', 30, 0),
(57, '12:06:00', '17:56:00', 4, '2024-01-01', '2024-01-31', 30, 1),
(62, '10:00:00', '11:00:00', 2, '2024-01-01', '2024-01-31', 30, 1),
(63, '06:00:00', '08:00:00', 5, '2024-01-01', '2024-01-31', 30, 0),
(64, '10:00:00', '11:00:00', 4, '2024-01-01', '2024-01-31', 38, 1),
(69, '10:00:00', '11:00:00', 2, '2024-01-01', '2024-01-31', 30, 1),
(70, '10:00:00', '11:00:00', 2, '2024-01-01', '2024-01-31', 30, 1),
(71, '13:00:00', '16:00:00', 5, '2024-01-01', '2024-01-31', 30, 0),
(72, '10:00:00', '11:00:00', 2, '2024-01-01', '2024-01-31', 30, 1),
(73, '12:00:00', '13:00:00', 2, '2024-01-01', '2024-01-31', 30, 1),
(74, '12:06:00', '17:56:00', 4, '2024-01-01', '2024-01-31', 30, 1),
(78, '10:00:00', '11:00:00', 2, '2024-01-01', '2024-01-31', 30, 1),
(79, '13:00:00', '16:00:00', 1, '2024-01-01', '2024-01-31', 30, 1),
(80, '17:27:00', '17:30:00', 1, '2024-01-01', '2024-01-31', 38, 1),
(81, '16:38:00', '16:40:00', 4, '2024-01-01', '2024-01-31', 38, 1),
(82, '10:25:00', '11:25:00', 4, '2024-01-01', '2024-01-31', 30, 1),
(83, '11:01:00', '11:01:00', 5, '2024-01-01', '2024-01-31', 38, 1);

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
(3, 'aaaaaaaaaaaa', 0),
(4, 'soberania', 0),
(5, 'asdasdddaaaaaaaaa', 0),
(6, 'asdasdasd', 0),
(7, 'asdasdasdddd', 0),
(8, 'xxxxxxxxxxxx', 0),
(9, 'ddddddddddddd', 0),
(10, 'ssssssss', 0),
(11, 'xzxzxzxzxzx', 0),
(12, 'asdasddd', 0),
(14, 'INGLES', 0),
(15, 'INGLES', 1),
(16, 'GAGAGA', 0),
(17, 'HISTO RIA', 0),
(18, 'aritmetica', 1),
(19, 'aritmetica', 1),
(20, 'aritmetica', 1),
(21, 'aritmetica', 1),
(22, '21', 1),
(23, 'aritmetica', 1),
(24, 'aritmetica', 1),
(25, 'aritmetica', 1),
(26, 'aritmetica', 1),
(27, '26', 1),
(28, 'aritmetica', 1),
(29, 'aritmetica', 1),
(30, '29', 1),
(31, 'aritmetica', 1),
(32, '31', 1),
(33, 'LICA', 1),
(34, '33', 1),
(35, 'LICA', 1),
(36, '35', 1),
(37, 'HISTORIIA', 0),
(38, 'MATEMATICA', 1),
(39, 'SOBERANIA', 0),
(40, 'FISICA', 1),
(41, 'HISTORIA', 1);

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
(2, 1, 14, '000102'),
(3, 1, 14, '000104'),
(4, 0, 14, '30019081'),
(5, 1, 15, '000104'),
(6, 1, 15, '000105'),
(7, 1, 15, '30019081'),
(8, 1, 15, '30019082'),
(9, 0, 16, '000103'),
(10, 0, 16, '000104'),
(16, 0, 15, '000101'),
(17, 1, 17, '000101'),
(18, 1, 17, '000102'),
(20, 1, 17, '000103'),
(21, 1, 37, '000104'),
(22, 1, 38, '000102'),
(23, 1, 39, '000102'),
(24, 1, 40, '000105'),
(25, 1, 41, '000101'),
(26, 1, 41, '000104');

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
(2, 2, 2),
(3, 1, 3),
(4, 2, 4),
(5, 3, 5),
(6, 1, 6),
(7, 4, 7),
(8, 2, 8),
(9, 3, 9),
(10, 1, 10),
(11, 2, 16),
(12, 15, 17),
(13, 5, 18),
(14, 17, 19),
(15, 17, 20),
(16, 15, 21),
(17, 15, 22),
(18, 15, 25),
(19, 15, 26),
(20, 15, 27),
(21, 15, 28),
(22, 15, 29),
(23, 15, 30),
(24, 15, 31),
(25, 15, 32),
(26, 15, 33),
(27, 15, 34),
(28, 15, 35),
(29, 15, 36),
(30, 15, 37),
(31, 15, 38),
(32, 15, 39),
(35, 15, 21),
(37, 15, 43),
(38, 15, 44),
(41, 15, 47),
(42, 15, 48),
(43, 15, 49),
(44, 15, 50),
(51, 15, 57),
(55, 15, 61),
(56, 15, 43),
(57, 15, 62),
(58, 15, 63),
(59, 15, 64),
(64, 15, 69),
(65, 15, 70),
(66, 15, 71),
(67, 15, 72),
(68, 15, 73),
(69, 15, 74),
(70, 15, 75),
(71, 15, 76),
(72, 15, 77),
(73, 15, 78),
(74, 15, 79),
(75, 37, 80),
(76, 37, 81),
(77, 38, 82),
(78, 40, 83);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `montos`
--

CREATE TABLE `montos` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `m_montos` int(11) NOT NULL,
  `d_montos` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `montos`
--

INSERT INTO `montos` (`codigo`, `tipo`, `m_montos`, `d_montos`) VALUES
(1, 'inscripcion', 4000, 53),
(2, 'mensualidad', 5000, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  `estados` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `mensaje`, `estados`, `titulo`, `created_at`) VALUES
(47, 'hay una deuda pendiente con concepto de: inscripcion que corresponde al estudiante: sssssssss, 30019081', 1, 'pago de deuda', '2023-10-18 22:32:28'),
(48, 'hay una deuda pendiente con concepto de: mensualidad que corresponde al estudiante: sssssssss, 30019081', 1, 'pago de deuda', '2023-10-18 22:32:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(5) NOT NULL,
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
  `estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `id_deudas`, `identificador`, `fecha`, `fechad`, `concepto`, `forma`, `monto`, `meses`, `estado`, `estado_pagos`, `estatus`) VALUES
(3469, 61, '2335', '2024-02-02', '2023-08-30', 'inscripcion', 'Efectivo', 2160, '1', 'ELIMINADO', 0, 0),
(3470, 57, '12314', '2024-02-03', '2023-10-30', 'inscripcion', 'Transf', 2160, '1', 'ELIMINADO', 1, 0),
(3471, 62, '88889', '2024-02-04', '2023-08-30', 'mensualidad', 'Pago Movil', 1440, '1', 'Confirmado', 0, 1),
(3472, 62, '125215', '2024-06-10', '2023-09-30', 'mensualidad', 'Transf', 2160, '1', 'Confirmado', 0, 1),
(3473, 65, '2342', '2024-06-10', '2024-02-06', 'mensualidad', 'Efectivo', 133, '1', 'Pendiente', 0, 1),
(3474, 63, '65565', '2024-06-10', '2024-02-06', 'inscripcion', 'Transf', 2160, '1', 'Confirmado', 0, 1),
(3475, 69, '45353', '2024-07-17', '2024-06-13', 'inscripcion', 'Transf', 0, '1', 'Confirmado', 1, 1),
(3476, 71, '3422', '2024-07-18', '2024-06-13', 'inscripcion', 'Pago Movil', 40, '1', 'Confirmado', 1, 1),
(3477, 58, '2356', '2024-07-18', '2024-05-29', 'mensualidad', 'Transf', 5000, '1', 'Confirmado', 1, 1),
(3478, 77, '2312', '2024-07-18', '2024-06-15', 'inscripcion', 'Transf', 1444, '1', 'Confirmado', 1, 1),
(3479, 73, '12323', '2024-07-18', '2024-06-13', 'inscripcion', 'Transf', 2769, '1', 'Confirmado', 1, 1),
(3480, 73, '1234555', '2024-07-18', '2024-06-13', 'inscripcion', 'Pago Movil', 2769, '1', 'Confirmado', 1, 1),
(3481, 62, '4444', '2024-10-22', '2024-04-29', 'mensualidad', 'Efectivo', 2498, '1', 'Confirmado', 1, 1),
(3482, 58, '345123', '2024-11-11', '2024-06-29', 'mensualidad', 'Transf', 4500, '1', 'Confirmado', 1, 1);

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
(112, 'consultar pagos_tutor', '1'),
(113, 'generar_reporte_ingresos', '1'),
(114, 'consultar_reporte_egresos', '1'),
(115, 'generar_reporte_egresos', '1'),
(116, 'consultar_reporte_ingresos', '1'),
(117, 'agregar_evento', '1'),
(118, 'modificar_evento', '1'),
(119, 'eliminar_evento', '1'),
(120, 'consultar_evento', '1'),
(121, 'consultarmontos', '1'),
(122, 'modificarmontos', '1'),
(123, 'respaldar', '1'),
(124, 'restaurar', '1'),
(125, 'pagos_reportes', '1'),
(126, 'Consultar Bitacora', '1'),
(127, 'consultar pagos menu', '1'),
(128, 'Confirmar Pago', '1');

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
(19, 'docente', 'paolasssss', '1'),
(24, 'Administrador', 'tiene casi todos los permisos', '1'),
(27, 'auditor', 'reviciones', '1');

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
(3783, 1, 111),
(3784, 1, 112),
(3785, 1, 121),
(3786, 1, 127),
(4274, 24, 62),
(4275, 24, 63),
(4276, 24, 64),
(4277, 24, 65),
(4278, 24, 66),
(4279, 24, 67),
(4280, 24, 68),
(4281, 24, 69),
(4282, 24, 70),
(4283, 24, 71),
(4284, 24, 72),
(4285, 24, 73),
(4286, 24, 74),
(4287, 24, 111),
(4288, 24, 128),
(4289, 24, 75),
(4290, 24, 76),
(4291, 24, 77),
(4292, 24, 112),
(4293, 24, 121),
(4294, 24, 122),
(4295, 24, 127),
(4296, 24, 78),
(4297, 24, 79),
(4298, 24, 80),
(4299, 24, 81),
(4300, 24, 82),
(4301, 24, 83),
(4302, 24, 84),
(4303, 24, 85),
(4304, 24, 86),
(4305, 24, 87),
(4306, 24, 88),
(4307, 24, 89),
(4308, 24, 90),
(4309, 24, 91),
(4310, 24, 92),
(4311, 24, 93),
(4312, 24, 98),
(4313, 24, 99),
(4314, 24, 100),
(4315, 24, 101),
(4316, 24, 102),
(4317, 24, 103),
(4318, 24, 104),
(4319, 24, 105),
(4320, 24, 109),
(4321, 24, 116),
(4322, 24, 114),
(4323, 24, 113),
(4324, 24, 115),
(4325, 24, 125),
(4326, 24, 117),
(4327, 24, 118),
(4328, 24, 119),
(4329, 24, 120),
(4330, 24, 126),
(4331, 19, 81),
(4332, 19, 89),
(4333, 19, 93),
(4334, 19, 101),
(4335, 19, 105),
(4336, 19, 120),
(4337, 25, 62),
(4338, 25, 63),
(4339, 25, 64),
(4340, 25, 65),
(4341, 25, 66),
(4342, 25, 67),
(4343, 25, 68),
(4344, 25, 69),
(4345, 25, 70),
(4346, 25, 71),
(4347, 25, 72),
(4348, 25, 73),
(4349, 25, 74),
(4350, 25, 111),
(4351, 25, 128),
(4352, 25, 75),
(4353, 25, 76),
(4354, 25, 77),
(4355, 25, 112),
(4356, 25, 121),
(4357, 25, 122),
(4358, 25, 127),
(4359, 25, 78),
(4360, 25, 79),
(4361, 25, 80),
(4362, 25, 81),
(4363, 25, 82),
(4364, 25, 83),
(4365, 25, 84),
(4366, 25, 85),
(4367, 25, 86),
(4368, 25, 87),
(4369, 25, 88),
(4370, 25, 89),
(4371, 25, 90),
(4372, 25, 91),
(4373, 25, 92),
(4374, 25, 93),
(4375, 25, 98),
(4376, 25, 99),
(4377, 25, 100),
(4378, 25, 101),
(4379, 25, 102),
(4380, 25, 103),
(4381, 25, 104),
(4382, 25, 105),
(4383, 25, 106),
(4384, 25, 107),
(4385, 25, 108),
(4386, 25, 109),
(4387, 25, 110),
(4388, 25, 116),
(4389, 25, 114),
(4390, 25, 113),
(4391, 25, 115),
(4392, 25, 125),
(4393, 25, 117),
(4394, 25, 118),
(4395, 25, 119),
(4396, 25, 120),
(4397, 25, 123),
(4398, 25, 124),
(4399, 25, 126),
(4400, 3, 62),
(4401, 3, 63),
(4402, 3, 64),
(4403, 3, 65),
(4404, 3, 66),
(4405, 3, 67),
(4406, 3, 68),
(4407, 3, 69),
(4408, 3, 70),
(4409, 3, 71),
(4410, 3, 72),
(4411, 3, 73),
(4412, 3, 74),
(4413, 3, 111),
(4414, 3, 128),
(4415, 3, 75),
(4416, 3, 76),
(4417, 3, 77),
(4418, 3, 112),
(4419, 3, 121),
(4420, 3, 122),
(4421, 3, 127),
(4422, 3, 78),
(4423, 3, 79),
(4424, 3, 80),
(4425, 3, 81),
(4426, 3, 82),
(4427, 3, 83),
(4428, 3, 84),
(4429, 3, 85),
(4430, 3, 86),
(4431, 3, 87),
(4432, 3, 88),
(4433, 3, 89),
(4434, 3, 90),
(4435, 3, 91),
(4436, 3, 92),
(4437, 3, 93),
(4438, 3, 98),
(4439, 3, 99),
(4440, 3, 100),
(4441, 3, 101),
(4442, 3, 102),
(4443, 3, 103),
(4444, 3, 104),
(4445, 3, 105),
(4446, 3, 106),
(4447, 3, 107),
(4448, 3, 108),
(4449, 3, 109),
(4450, 3, 110),
(4451, 3, 116),
(4452, 3, 114),
(4453, 3, 113),
(4454, 3, 115),
(4455, 3, 125),
(4456, 3, 117),
(4457, 3, 118),
(4458, 3, 119),
(4459, 3, 120),
(4460, 3, 123),
(4461, 3, 124),
(4462, 3, 126),
(4463, 27, 66),
(4464, 27, 69);

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
(0, 'vacia', 0),
(1, 'A', 1),
(2, 'B', 1),
(3, 'C', 1),
(4, 'D', 1),
(5, 'E', 1),
(6, 'F', 1),
(7, 'G', 1),
(8, 'H', 1),
(9, 'I', 1),
(10, 'J', 1),
(11, 'K', 1),
(12, 'L', 0),
(13, 'M', 0),
(14, 'N', 1),
(15, 'O', 1),
(16, 'P', 1),
(17, 'R', 1),
(18, 'S', 1),
(19, 'T', 1),
(20, 'U', 0),
(21, 'V', 0);

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
(29, 19, 1, 1, 0),
(30, 19, 3, 4, 1),
(31, 0, 0, 1, 1),
(32, -1, 0, 2, 1),
(33, 0, 0, 5, 1),
(34, 0, 0, 3, 1),
(35, 0, 0, 3, 1),
(36, 25, 5, 2, 0),
(37, 25, 9, 5, 0),
(38, 21, 2, 2, 1);

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
  `direccion` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tutor_legal`
--

INSERT INTO `tutor_legal` (`cedula`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `contacto_emer`, `telefono`, `correo`, `direccion`, `estado`) VALUES
('28621408', 'Manuel', 'Manuel', 'Petit', 'Petit', '12313131231', '21653549816', 'asdada@gmail.com', 'calle21', 1),
('28621409', 'Jesus', 'Jesus', 'Jesus', 'Jesus', '53453453453', '53453453453', 'asdasda@gmail.com', '', 1),
('32765982', 'Maribel', 'Luisa', 'Martinez', 'Perdomo', '04124367820', '04245678321', 'luisa23@gmail.com', 'calle65', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `token` varchar(256) NOT NULL,
  `codigo` int(6) DEFAULT NULL,
  `request_password` int(1) NOT NULL DEFAULT 0,
  `expirar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `clave`, `estado`, `id_rol`, `token`, `codigo`, `request_password`, `expirar`) VALUES
('10773972', 'santiagod', 'santiagocasamayor14@gmail.com', '$2y$10$i7SP87LQIsNTP6edAM4SrejhzqitMT.v4R9Ua155TDtpvk2XPSww6', '1', 19, '', NULL, 0, NULL),
('15067156', 'MariaG', 'correopruebacolegio@gmail.com', '$2y$10$WdP.wjfsjSh0u0iEAz2CPO.Sv/YoctJ2JZ2EYDoFcptIDf7Iw5.Qe', '1', 19, '', NULL, 0, NULL),
('16641030', 'Doris', 'colegio@gmail.com', '$2y$10$/MyqwF5mQ69gkVqQahqMAega.khDmLqp4Sn8ptwPMhxjGLi967Q2S', '1', 3, '', NULL, 0, NULL),
('2827479', 'admin', 'jesusfob2021@gmail.com', '$2y$10$psNZjqnhFQ8X/cBymADfhOpcHzvrzgwn213EOHkWzj8j/pUpSOu1a', '1', 3, '', NULL, 0, NULL),
('28276731', 'asdasddd', 'jesusfob2021@gmail.com', '$2y$10$sGOAx2JIvBjaSoAlCdzPguPuXZQWd.TEsMc81m.RwFHuwatTTUrTG', '1', 3, '', NULL, 0, NULL),
('28621408', 'Manuel', 'asdada@gmail.com', '$2y$10$zC1Rg0u0ZqhCtdDE1gEOwOhF9PMMxjpHAI5M3EgqE659onkRH2Ufm', '1', 1, '', NULL, 0, NULL),
('28621409', 'Jesus', 'asdasda@gmail.com', '$2y$10$u/OtYuikzxLlfQ6fnh.3O.WrJoja0s34AkoWct2HTepOqWR2TTfNO', '1', 1, '', NULL, 0, NULL),
('30019033', 'soberania', 'santiagocasamayor@gmail.com', '$2y$10$ZRByRs6ZQJQkIPh5jnMTROA3oEg4mw1xt.L0oMjtx.aggKOzqzA2e', '1', 24, '', NULL, 0, NULL),
('30019055', 'zxczxczc', 'santiagocasamayor@gmail.com', '$2y$10$JAr.lnl2SVpQzmsHft4qieDyu2In446zvVtHwgXN.NU2Ul.JxFb4e', '1', 1, '', NULL, 0, NULL),
('30019081', 'santiago', 'santiagocasamayor14@gmail.com', '$2y$10$w3PudI37OEvaV8.2W0//kO//YjIkvD0Cdts2wlfpXeutaD5EZdsYy', '1', 3, '4f6a7f8ecc34de6cecae2e98b5bc3e352e0d3b05b9785a0ffe5a18d6312e58eb', 676647, 1, '2024-10-22 20:28:09'),
('30019085', 'santiagox', 'santiagocasamayor14@gmail.com', '$2y$10$i8WubU1TY4qUT9olB.di4.5IH6o0EuW6g5MTq14G4PSKdVMsRJbVG', '1', 1, 'd4ce6d0434665742fa29bbb5781f2ee410d2230a62b8d36d90004b3241c60053', 509203, 0, '2024-07-12 01:43:11'),
('30019111', 'matemat', 'santiagocasamayor@gmail.com', '$2y$10$aqNA0pwG7jwaqclkJugg8e7vMF3VauXOS.A8GYdgAMlGZSUkcMXkK', '1', 19, '', NULL, 0, NULL),
('30664129', 'Yeisson', 'yeissoncolmenarez@gmail.com', '$2y$10$9KiY9uibGYOwUev4WqxEXuRBGW11Bde6zCoL/5VDfkY.zsY5YqzUG', '1', 19, '3143251b4dc716c481d4c61cdbb9b5b9da99c529d2402e19a47837b4abcc4e93', 909605, 0, '2024-07-20 17:10:34'),
('32765982', 'Maribel', 'luisa23@gmail.com', '$2y$10$1OZoM7cn.LuLcreiNYg3zOXIS1GTSle0fZJ5aDOu0F5HEg2wWv2A6', '1', 19, '', NULL, 0, NULL),
('7402476', 'Flora', 'correocolegioprueba@gmail.com', '$2y$10$VONrFhs2YWz2kHTBMIZWwek21kOPSQM3CME657sSYCQ08NR6q0txu', '1', 24, '', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tutor`
--

CREATE TABLE `usuarios_tutor` (
  `id` int(11) NOT NULL,
  `id_usuarios` varchar(50) NOT NULL,
  `id_tutor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_tutor`
--

INSERT INTO `usuarios_tutor` (`id`, `id_usuarios`, `id_tutor`) VALUES
(9, '28621408', '28621408'),
(10, '28621409', '28621409'),
(11, '32765982', '32765982');

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
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `dolar_venezuela`
--
ALTER TABLE `dolar_venezuela`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ano_academico` (`id_ano_academico`);

--
-- Indices de la tabla `eventos_docente`
--
ALTER TABLE `eventos_docente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventos_docente_ibfk_1` (`id_evento`),
  ADD KEY `eventos_docente_ibfk_2` (`id_docente`);

--
-- Indices de la tabla `ficha_medica`
--
ALTER TABLE `ficha_medica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario_ano`
--
ALTER TABLE `horario_ano`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ano` (`id_ano`,`id_horario`),
  ADD KEY `id_horario` (`id_horario`);

--
-- Indices de la tabla `horario_docente`
--
ALTER TABLE `horario_docente`
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
-- Indices de la tabla `montos`
--
ALTER TABLE `montos`
  ADD PRIMARY KEY (`codigo`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ano_estudiantes`
--
ALTER TABLE `ano_estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `ano_secciones`
--
ALTER TABLE `ano_secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `años`
--
ALTER TABLE `años`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `años_materias`
--
ALTER TABLE `años_materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT de la tabla `deudas`
--
ALTER TABLE `deudas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `docente_guia`
--
ALTER TABLE `docente_guia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `docente_horario`
--
ALTER TABLE `docente_horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `dolar_venezuela`
--
ALTER TABLE `dolar_venezuela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiantes_tutor`
--
ALTER TABLE `estudiantes_tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `estudiante_ficha`
--
ALTER TABLE `estudiante_ficha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `eventos_docente`
--
ALTER TABLE `eventos_docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ficha_medica`
--
ALTER TABLE `ficha_medica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `horario_ano`
--
ALTER TABLE `horario_ano`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `horario_docente`
--
ALTER TABLE `horario_docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `materias_docentes`
--
ALTER TABLE `materias_docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `materia_horario_docente`
--
ALTER TABLE `materia_horario_docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `montos`
--
ALTER TABLE `montos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3483;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4465;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `secciones_años`
--
ALTER TABLE `secciones_años`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuarios_tutor`
--
ALTER TABLE `usuarios_tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`id_anos_secciones`) REFERENCES `secciones_años` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
