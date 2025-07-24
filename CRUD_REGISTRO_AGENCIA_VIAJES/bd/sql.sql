-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2025 a las 18:20:23
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
-- Base de datos: `agencia_viajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `habitaciones_disponibles` int(11) NOT NULL,
  `tarifa_noche` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nombre`, `ubicacion`, `habitaciones_disponibles`, `tarifa_noche`) VALUES
(1, 'Hotel Atton', 'Santiago, Chile', 12, 100.00),
(2, 'Hotel Bogotá', 'Bogotá', 234, 4000.00),
(3, 'hotel Buenos Aires', 'Buenos Aires, Argentina', 34, 100000.00),
(4, 'Hotel Sheraton', 'Santiago, Chile', 5, 100.00),
(5, 'Sehraton', 'Miami', 7, 300000.00),
(6, 'Hotel sao paulo', 'Sao Paulo', 10, 200000.00),
(7, 'Hotel Alaska', 'Alaska', 34, 200000.00),
(8, 'Hotel Lisboa', 'Lisboa', 32, 100000.00),
(9, 'Hotel Puerto Montt', 'Puerto Montt', 34, 100000.00),
(10, 'Hotel Lima', 'Lima', 6, 20000.00),
(11, 'Hotel Lima', 'Lima', 6, 20000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `id_vuelo` int(11) DEFAULT NULL,
  `id_hotel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_cliente`, `fecha_reserva`, `id_vuelo`, `id_hotel`) VALUES
(4, 1, '2025-08-28', 1, 3),
(5, 2, '2025-08-28', 1, 3),
(6, 3, '2025-08-28', 1, 3),
(7, 4, '2025-08-28', 2, 8),
(8, 5, '2025-08-28', 10, 10),
(9, 6, '2025-08-28', 1, 3),
(10, 6, '2025-08-28', 2, 8),
(11, 7, '2025-08-28', 2, 8),
(12, 8, '2025-07-25', 6, 7),
(13, 9, '2025-07-01', 6, 7),
(14, 10, '2025-07-10', 6, 7),
(15, 11, '2025-07-01', 1, 2),
(16, 1, '2025-07-02', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE `vuelo` (
  `id_vuelo` int(11) NOT NULL,
  `origen` varchar(50) NOT NULL,
  `destino` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `plazas_disponibles` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`id_vuelo`, `origen`, `destino`, `fecha`, `plazas_disponibles`, `precio`) VALUES
(1, 'Santiago', 'Buenos Aires', '2025-08-28', 4, 20000.00),
(2, 'Lisboa', 'Santiago', '2025-08-28', 40, 1800.00),
(4, 'Lisboa', 'Santiago', '2025-08-28', 40, 1800.00),
(5, 'Arica', 'puerto montt', '2025-08-28', 23, 30000.00),
(6, 'Santiago', 'Alaska', '2025-08-28', 12, 800000.00),
(7, 'Santiago', 'Sao paulo', '2025-08-28', 5, 200000.00),
(8, 'Santiago', 'Miami', '2025-08-28', 6, 500000.00),
(9, 'Santiago', 'Bogotá', '2025-08-28', 6, 50000.00),
(10, 'Santiago', 'Lima', '2025-08-28', 40, 100000.00),
(11, 'Santiago', 'Lima', '2025-07-27', 40, 100000.00),
(12, 'Santiago', 'Lima', '2025-07-27', 40, 100000.00),
(13, 'Lisboa', 'Santiago', '2025-07-01', 32, 100000.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_vuelo` (`id_vuelo`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indices de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`id_vuelo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `id_vuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_vuelo`) REFERENCES `vuelo` (`id_vuelo`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
