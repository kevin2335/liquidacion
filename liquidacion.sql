-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2016 at 08:22 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liquidacion`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificacion`
--

CREATE TABLE `certificacion` (
  `id` int(11) NOT NULL COMMENT 'Id:',
  `id_empleado` int(11) NOT NULL COMMENT 'Empleado Id:',
  `id_estado` int(11) NOT NULL COMMENT 'estado Id:'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `certificacion`
--

INSERT INTO `certificacion` (`id`, `id_empleado`, `id_estado`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL COMMENT 'Id:',
  `nombre_dept` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Nombre del departamento:'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id`, `nombre_dept`) VALUES
(1, 'lol');

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL COMMENT 'id:',
  `nombre` varchar(56) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre:',
  `apellido_m` varchar(128) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido Materno:',
  `apellido_p` varchar(128) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido Paterno:',
  `seguro_social` int(11) NOT NULL COMMENT 'Seguro Social:',
  `nombramiento` varchar(128) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombramiento:',
  `puesto` varchar(56) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Puesto que ocupa:',
  `oficina_division` varchar(56) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Oficina o división:',
  `fecha_empleado` int(11) DEFAULT NULL COMMENT 'Fecha del cese o cambio:',
  `razon_cese` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Razón de cese:',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Correo:'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `apellido_m`, `apellido_p`, `seguro_social`, `nombramiento`, `puesto`, `oficina_division`, `fecha_empleado`, `razon_cese`, `created_at`, `updated_at`, `email`) VALUES
(1, 'lol', 'tu', 'no', 2147483647, 'ayre', 'mago', 'izq', 978676, 'muerte', NULL, NULL, ''),
(2, 'Aloha', 'tu', 'si', 12345678, 'Aloha', 'Mago', 'NPI', 71016, 'Contrato', NULL, NULL, 'kevin.sanchez@upr.edu'),
(3, 'kevin', 'hjhj', 'fhkl', 5484, 'jlklj', 'lhlihlih', 'lhlhjh', 5878, 'hhjh', 1473976020, 1473976020, ''),
(4, 'Luis', 'Padro', 'Melendez', 1234, 'Hola', 'prueba', 'Prueba', 71012, 'Second', 1473977352, 1473977352, ''),
(34, 'Prueba', 'Burgos', 'Prueba', 1234567894, 'Prueba', '', 'Prueba', 71011, 'Prueba', 1474390109, 1474390109, 'kevin.sanchez@upr.edu'),
(35, 'Prueba', 'Burgos', 'Prueba', 1234567894, 'Prueba', '', 'Prueba', 71011, 'Prueba', 1474390127, 1474390127, 'kevin.sanchez@upr.edu');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL COMMENT 'Id:',
  `estado` varchar(56) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Estado:'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`id`, `estado`) VALUES
(1, 'Forma Sometida');

-- --------------------------------------------------------

--
-- Table structure for table `firmas`
--

CREATE TABLE `firmas` (
  `id` int(11) NOT NULL COMMENT 'Id:',
  `id_supervisor` int(11) NOT NULL COMMENT 'Supervisor Id:',
  `id_certificacion` int(11) NOT NULL COMMENT 'Certificacion Id:',
  `firma` tinyint(1) NOT NULL COMMENT 'Firma:',
  `fecha_firma` int(11) DEFAULT NULL COMMENT 'Fecha:',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `id_dept` int(11) NOT NULL COMMENT 'Departamento:'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL COMMENT 'Id:',
  `id_dept` int(11) NOT NULL COMMENT 'Departamento Id:',
  `pregunta` mediumtext COLLATE utf8_spanish_ci NOT NULL COMMENT 'Pregunta:',
  `no_bool` int(1) DEFAULT NULL COMMENT 'No',
  `si_bool` int(1) DEFAULT NULL COMMENT 'Sí',
  `na_bool` int(1) DEFAULT NULL COMMENT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `preguntas`
--

INSERT INTO `preguntas` (`id`, `id_dept`, `pregunta`, `no_bool`, `si_bool`, `na_bool`) VALUES
(1, 1, 'Pregunta 111111 Dept 1', NULL, NULL, NULL),
(2, 1, 'Preunta 22222 Dept 1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resultado`
--

CREATE TABLE `resultado` (
  `id` int(11) NOT NULL COMMENT 'Id:',
  `id_supervisor` int(11) NOT NULL COMMENT 'Supervisor Id:',
  `id_certificacion` int(11) NOT NULL COMMENT 'Certidicación Id:',
  `resultado` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Resultado:',
  `comentario` mediumtext COLLATE utf8_spanish_ci COMMENT 'Explicación:',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `resultado`
--

INSERT INTO `resultado` (`id`, `id_supervisor`, `id_certificacion`, `resultado`, `comentario`, `created_at`, `updated_at`) VALUES
(4, 1, 2, 'si', 'fxgvgx', 1473288966, 1473288966),
(5, 1, 2, 'si', 'fgszg', 1473288966, 1473288966),
(6, 1, 2, 'si', 'fxgvgx', 1473289213, 1473289213),
(7, 1, 2, 'si', 'fgszg', 1473289213, 1473289213),
(8, 1, 2, 'si', 'Aloha', 1473349900, 1473349900),
(9, 1, 2, 'no', 'Aloha', 1473349901, 1473349901),
(10, 1, 2, 'na', '', 1473355204, 1473355204),
(11, 1, 2, 'si', 'Probando', 1473355204, 1473355204),
(12, 1, 2, '', '', 1473887447, 1473887447),
(13, 1, 2, '', '', 1473887448, 1473887448),
(14, 1, 2, '', '', 1473887459, 1473887459),
(15, 1, 2, '', '', 1473887459, 1473887459);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL COMMENT 'Id:',
  `id_dept` int(11) NOT NULL COMMENT 'Departamento Id:',
  `nombre_sup` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Nombre del supervisor:',
  `apellido_m_sup` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Apellido materno del superrvisor:',
  `apellido_p_sup` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Apellido paterno del supervisor',
  `activo` tinyint(1) NOT NULL COMMENT 'Activo:'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `id_dept`, `nombre_sup`, `apellido_m_sup`, `apellido_p_sup`, `activo`) VALUES
(1, 1, 'Sup1', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificacion`
--
ALTER TABLE `certificacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_certificacion_empleado` (`id_empleado`),
  ADD KEY `FK_certificacion_estado` (`id_estado`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firmas`
--
ALTER TABLE `firmas`
  ADD PRIMARY KEY (`id`,`id_dept`),
  ADD KEY `FK_firmas_cert` (`id_certificacion`),
  ADD KEY `FK_firmas_super` (`id_supervisor`);

--
-- Indexes for table `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_preguntas_dept` (`id_dept`);

--
-- Indexes for table `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_resultado_super` (`id_supervisor`),
  ADD KEY `FK_resultado_cert` (`id_certificacion`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_supervisor_dept` (`id_dept`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificacion`
--
ALTER TABLE `certificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id:', AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `firmas`
--
ALTER TABLE `firmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:';
--
-- AUTO_INCREMENT for table `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `resultado`
--
ALTER TABLE `resultado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:', AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:', AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificacion`
--
ALTER TABLE `certificacion`
  ADD CONSTRAINT `FK_certificacion_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certificacion_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `firmas`
--
ALTER TABLE `firmas`
  ADD CONSTRAINT `FK_firmas_super` FOREIGN KEY (`id_supervisor`) REFERENCES `supervisor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `firmas_ibfk_1` FOREIGN KEY (`id_certificacion`) REFERENCES `certificacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `FK_preguntas_dept` FOREIGN KEY (`id_dept`) REFERENCES `departamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `FK_resultado_cert` FOREIGN KEY (`id_certificacion`) REFERENCES `certificacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_resultado_super` FOREIGN KEY (`id_supervisor`) REFERENCES `supervisor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `FK_supervisor_dept` FOREIGN KEY (`id_dept`) REFERENCES `departamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
