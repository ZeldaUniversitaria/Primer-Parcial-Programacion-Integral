-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb1034.awardspace.net
-- Tiempo de generación: 08-09-2025 a las 05:54:45
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `4667283_usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE `accesos` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` enum('Empleado','Visitante') NOT NULL,
  `matricula` varchar(50) DEFAULT NULL,
  `piso` varchar(100) DEFAULT NULL,
  `ingreso` enum('Entrada','Salida') NOT NULL,
  `empleado_visita` varchar(100) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `accesos`
--

INSERT INTO `accesos` (`id`, `nombre`, `tipo`, `matricula`, `piso`, `ingreso`, `empleado_visita`, `fecha`) VALUES
(1, 'Mark Scout', 'Empleado', '123456', 'Piso 4', 'Entrada', '', '2025-09-07 10:33:09'),
(2, 'Mark Scout', 'Empleado', '123456', '', 'Salida', '', '2025-09-07 10:33:44'),
(3, 'Silvia Alexa Torres Estrada', 'Visitante', '', 'Piso 2', 'Entrada', 'Mark Scout', '2025-09-08 05:43:44'),
(4, 'Silvia Alexa Torres Estrada', 'Visitante', '', '', 'Salida', 'Mark Scout', '2025-09-08 05:44:07'),
(5, 'Alondra Regina Lopez Rojas', 'Empleado', '567234', 'Piso 2', 'Entrada', '', '2025-09-08 05:45:07'),
(6, 'Alondra Regina Lopez Rojas', 'Empleado', '567234', '', 'Salida', '', '2025-09-08 05:45:23'),
(7, 'Ernesto Lora Ruiz', 'Empleado', '123789', 'Piso 2', 'Entrada', '', '2025-09-08 05:51:15'),
(8, 'Ernesto Lora Ruiz', 'Empleado', '123789', '', 'Salida', '', '2025-09-08 05:51:27'),
(9, 'Teodora Alexandra Almeraz Perez', 'Empleado', '234890', 'Piso 5', 'Entrada', '', '2025-09-08 05:53:00'),
(10, 'Teodora Alexandra Almeraz Perez', 'Empleado', '234890', '', 'Salida', '', '2025-09-08 05:53:14'),
(11, 'Leonardo Fernandez Molina', 'Visitante', '', 'Piso 5', 'Entrada', 'Teodora Alexandra Almeraz Perez', '2025-09-08 05:54:00'),
(12, 'Leonardo Fernandez Molina', 'Visitante', '', '', 'Salida', 'Teodora Alexandra Almeraz Perez', '2025-09-08 05:54:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesos`
--
ALTER TABLE `accesos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
