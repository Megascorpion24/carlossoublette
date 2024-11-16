-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2024 a las 03:00:18
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegiocarlossoublette_usuario`
--

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
(4463, 27, 66),
(4464, 27, 69),
(4527, 3, 62),
(4528, 3, 63),
(4529, 3, 64),
(4530, 3, 65),
(4531, 3, 66),
(4532, 3, 67),
(4533, 3, 68),
(4534, 3, 69),
(4535, 3, 70),
(4536, 3, 71),
(4537, 3, 72),
(4538, 3, 73),
(4539, 3, 74),
(4540, 3, 111),
(4541, 3, 128),
(4542, 3, 75),
(4543, 3, 76),
(4544, 3, 77),
(4545, 3, 112),
(4546, 3, 121),
(4547, 3, 122),
(4548, 3, 127),
(4549, 3, 78),
(4550, 3, 79),
(4551, 3, 80),
(4552, 3, 81),
(4553, 3, 82),
(4554, 3, 83),
(4555, 3, 84),
(4556, 3, 85),
(4557, 3, 86),
(4558, 3, 87),
(4559, 3, 88),
(4560, 3, 89),
(4561, 3, 90),
(4562, 3, 91),
(4563, 3, 92),
(4564, 3, 93),
(4565, 3, 98),
(4566, 3, 99),
(4567, 3, 100),
(4568, 3, 101),
(4569, 3, 102),
(4570, 3, 103),
(4571, 3, 104),
(4572, 3, 105),
(4573, 3, 106),
(4574, 3, 107),
(4575, 3, 108),
(4576, 3, 109),
(4577, 3, 110),
(4578, 3, 116),
(4579, 3, 114),
(4580, 3, 113),
(4581, 3, 115),
(4582, 3, 125),
(4583, 3, 117),
(4584, 3, 118),
(4585, 3, 119),
(4586, 3, 120),
(4587, 3, 123),
(4588, 3, 124),
(4589, 3, 126);

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
('28276744', 'asdasd', 'jesusfob2021@gmail.com', '$2y$10$R38XPX/QtGic0l1M4Z8fPuYPlZrNYfWH77b0GZuxZ6EPlwNj0oVJy', '1', 19, '', NULL, 0, NULL),
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4590;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
