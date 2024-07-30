-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2024 a las 05:06:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `s9formdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `s9_clientes`
--

CREATE TABLE `TablaSolicitudes` (
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `Ayuda` varchar(25) NOT NULL,
  `ApellidoFamiliar` varchar(25) NOT NULL,
  `NumIntegrantes` int NOT NULL,
  `Niños` int NOT NULL,
  `Adolescentes` int NOT NULL,
  `Adultos` int NOT NULL,
  `Provincia` varchar(25) NOT NULL,
  `Canton` varchar(25) NOT NULL,
  `Destino` varchar(25) NOT NULL,
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `s9_clientes`
--

INSERT INTO `TabalaSolicitudes`(`nombre`, `apellido` , `telefono` , `ayuda` , `ApellidoFamiliar`, `NumIntegrantesP`
        , `Niños` , `Adolescentes`, `Adultos`, `Provincia`, , `Canton`, `Destino`) VALUES
('Jonh', 'Doe' , `12345678` , `Economica` , 'Doe Mendez' , 4 , 1 , 1 , 2 , 'San Jose' , 'Guadalupe' , 'Frontera Nicaragua');

--
-- Índices para tablas volcadas
--
--
--
ALTER TABLE `TablaSolicitudes`
  ADD PRIMARY KEY (`nombre`);
--
-- AUTO_INCREMENT de las tablas volcadas
--
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
