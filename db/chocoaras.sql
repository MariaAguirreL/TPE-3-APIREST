-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2024 a las 12:10:16
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
-- Base de datos: `chocoaras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chocolate`
--

CREATE TABLE `chocolate` (
  `ID` int(11) NOT NULL,
  `SABOR` varchar(20) NOT NULL,
  `RELLENO` varchar(20) NOT NULL,
  `EMPAQUE` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `chocolate`
--

INSERT INTO `chocolate` (`ID`, `SABOR`, `RELLENO`, `EMPAQUE`) VALUES
(1, 'Blanco', 'ddl', 'plastico'),
(2, 'negro', 'crema', 'tela'),
(3, 'con leche', 'frutilla', 'papel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combos`
--

CREATE TABLE `combos` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `FK_CHOCOLATE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `combos`
--

INSERT INTO `combos` (`ID`, `NOMBRE`, `descripcion`, `FK_CHOCOLATE`) VALUES
(1, 'Combo 1', 'bombones:chocolate blanco rellenado con ddl y empaque plastico', 1),
(2, 'Combo 2', 'alfajores:chocolate negro relleno de crema y empaque de tela', 2),
(3, 'Combo 3', 'chupetines:chocolate blanco relleno de ddl y empaque plastico', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `contraseña` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chocolate`
--
ALTER TABLE `chocolate`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `combos`
--
ALTER TABLE `combos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_CHOCOLATE` (`FK_CHOCOLATE`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chocolate`
--
ALTER TABLE `chocolate`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `combos`
--
ALTER TABLE `combos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `combos`
--
ALTER TABLE `combos`
  ADD CONSTRAINT `combos_ibfk_1` FOREIGN KEY (`FK_CHOCOLATE`) REFERENCES `chocolate` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
