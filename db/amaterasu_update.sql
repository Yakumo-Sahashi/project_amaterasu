-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-06-2021 a las 05:20:39
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `amaterasu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_alumnos`
--
CREATE DATABASE amaterasu;
USE amaterasu;

CREATE TABLE `t_alumnos` (
  `idAlumno` int(11) NOT NULL,
  `n_Control` int(11) DEFAULT NULL,
  `nombreAlumno` varchar(255) DEFAULT NULL,
  `apellidoPaternoA` varchar(255) DEFAULT NULL,
  `apellidoMaternoA` varchar(255) DEFAULT NULL,
  `carrera` varchar(255) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `fk_semestre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_alumnos`
--

INSERT INTO `t_alumnos` (`idAlumno`, `n_Control`, `nombreAlumno`, `apellidoPaternoA`, `apellidoMaternoA`, `carrera`, `fechaNacimiento`, `fk_semestre`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 191190077, 'Jose', 'Fuentes', 'Suarez', 'Sistemas', '2000-06-23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_calificaciones`
--

CREATE TABLE `t_calificaciones` (
  `idCalificacion` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `materia` int(11) NOT NULL,
  `alumno_inscrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_docentes`
--

CREATE TABLE `t_docentes` (
  `idDocentes` int(11) NOT NULL,
  `rfc` varchar(255) DEFAULT NULL,
  `areaProfesor` varchar(255) DEFAULT NULL,
  `nombreDocente` varchar(255) DEFAULT NULL,
  `apellidoPaternoP` varchar(255) DEFAULT NULL,
  `apellidoMaternoP` varchar(255) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_docentes`
--

INSERT INTO `t_docentes` (`idDocentes`, `rfc`, `areaProfesor`, `nombreDocente`, `apellidoPaternoP`, `apellidoMaternoP`, `fechaNacimiento`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'CUPU800825569', 'Sistemas', 'Diego', 'Sahashi', 'Uchiha', '1990-03-08'),
(3, 'CUPU800825569', 'Sistemas', 'Prueba', 'Paterno', 'Materno', '1989-04-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_horarioAlumno`
--

CREATE TABLE `t_horarioAlumno` (
  `idHorarioAlumno` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `idHorario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_horarios`
--

CREATE TABLE `t_horarios` (
  `idHorario` int(11) NOT NULL,
  `aula` varchar(10) NOT NULL,
  `lunes` varchar(20) NOT NULL DEFAULT '00:00-00:00',
  `martes` varchar(20) NOT NULL DEFAULT '00:00-00:00',
  `miercoles` varchar(20) NOT NULL DEFAULT '00:00-00:00',
  `jueves` varchar(20) NOT NULL DEFAULT '00:00-00:00',
  `viernes` varchar(20) NOT NULL DEFAULT '00:00-00:00',
  `id_materia` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_materias`
--

CREATE TABLE `t_materias` (
  `idMateria` int(11) NOT NULL,
  `nombreMateria` varchar(255) DEFAULT NULL,
  `carrera` varchar(255) NOT NULL,
  `m_semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_semestre`
--

CREATE TABLE `t_semestre` (
  `idSemestre` int(11) NOT NULL,
  `semestre` varchar(50) DEFAULT NULL,
  `inicioSemestre` date DEFAULT NULL,
  `finSemestre` date DEFAULT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_semestre`
--

INSERT INTO `t_semestre` (`idSemestre`, `semestre`, `inicioSemestre`, `finSemestre`, `estado`) VALUES
(1, 'Ene-Jun 2021', '2021-03-10', '2021-07-02', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE `t_usuario` (
  `idUsuario` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `rol` int(11) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT 0,
  `datosAlumno` int(11) DEFAULT 1,
  `datosDocente` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_usuario`
--

INSERT INTO `t_usuario` (`idUsuario`, `email`, `password`, `estado`, `rol`, `admin`, `datosAlumno`, `datosDocente`) VALUES
(2, 'prueba@mail.com', '$2y$10$0Dxb5OVtNvkK.e7GJxoB9eGS/UxnuJzxbLuNXCcc7qEehBChhekJ6', 2, 2, 1, 1, 2),
(5, 'docente@mail.com', '$2y$10$0Dxb5OVtNvkK.e7GJxoB9eGS/UxnuJzxbLuNXCcc7qEehBChhekJ6', 2, 2, 0, 1, 3),
(6, 'alumno1@mail.com', '$2y$10$0Dxb5OVtNvkK.e7GJxoB9eGS/UxnuJzxbLuNXCcc7qEehBChhekJ6', 2, 3, 0, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_alumnos`
--
ALTER TABLE `t_alumnos`
  ADD PRIMARY KEY (`idAlumno`),
  ADD KEY `fk_semestre` (`fk_semestre`);

--
-- Indices de la tabla `t_calificaciones`
--
ALTER TABLE `t_calificaciones`
  ADD PRIMARY KEY (`idCalificacion`),
  ADD KEY `materia` (`materia`),
  ADD KEY `alumno_inscrito` (`alumno_inscrito`);

--
-- Indices de la tabla `t_docentes`
--
ALTER TABLE `t_docentes`
  ADD PRIMARY KEY (`idDocentes`);

--
-- Indices de la tabla `t_horarioAlumno`
--
ALTER TABLE `t_horarioAlumno`
  ADD PRIMARY KEY (`idHorarioAlumno`),
  ADD KEY `idAlumno` (`idAlumno`),
  ADD KEY `idHorario` (`idHorario`);

--
-- Indices de la tabla `t_horarios`
--
ALTER TABLE `t_horarios`
  ADD PRIMARY KEY (`idHorario`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `idDocente` (`idDocente`);

--
-- Indices de la tabla `t_materias`
--
ALTER TABLE `t_materias`
  ADD PRIMARY KEY (`idMateria`),
  ADD KEY `m_semestre` (`m_semestre`);

--
-- Indices de la tabla `t_semestre`
--
ALTER TABLE `t_semestre`
  ADD PRIMARY KEY (`idSemestre`);

--
-- Indices de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `datosAlumno` (`datosAlumno`),
  ADD KEY `datosDocente` (`datosDocente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_alumnos`
--
ALTER TABLE `t_alumnos`
  MODIFY `idAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_calificaciones`
--
ALTER TABLE `t_calificaciones`
  MODIFY `idCalificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_docentes`
--
ALTER TABLE `t_docentes`
  MODIFY `idDocentes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_horarioAlumno`
--
ALTER TABLE `t_horarioAlumno`
  MODIFY `idHorarioAlumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_horarios`
--
ALTER TABLE `t_horarios`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_materias`
--
ALTER TABLE `t_materias`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_semestre`
--
ALTER TABLE `t_semestre`
  MODIFY `idSemestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_alumnos`
--
ALTER TABLE `t_alumnos`
  ADD CONSTRAINT `t_alumnos_ibfk_1` FOREIGN KEY (`fk_semestre`) REFERENCES `t_semestre` (`idSemestre`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `t_calificaciones`
--
ALTER TABLE `t_calificaciones`
  ADD CONSTRAINT `t_calificaciones_ibfk_1` FOREIGN KEY (`materia`) REFERENCES `t_materias` (`idMateria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_calificaciones_ibfk_2` FOREIGN KEY (`alumno_inscrito`) REFERENCES `t_alumnos` (`idAlumno`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `t_horarioAlumno`
--
ALTER TABLE `t_horarioAlumno`
  ADD CONSTRAINT `t_horarioAlumno_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `t_alumnos` (`idAlumno`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_horarioAlumno_ibfk_2` FOREIGN KEY (`idHorario`) REFERENCES `t_horarios` (`idHorario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `t_horarios`
--
ALTER TABLE `t_horarios`
  ADD CONSTRAINT `t_horarios_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `t_materias` (`idMateria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_horarios_ibfk_2` FOREIGN KEY (`idDocente`) REFERENCES `t_docentes` (`idDocentes`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `t_materias`
--
ALTER TABLE `t_materias`
  ADD CONSTRAINT `t_materias_ibfk_1` FOREIGN KEY (`m_semestre`) REFERENCES `t_semestre` (`idSemestre`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD CONSTRAINT `t_usuario_ibfk_1` FOREIGN KEY (`datosDocente`) REFERENCES `t_docentes` (`idDocentes`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_usuario_ibfk_2` FOREIGN KEY (`datosAlumno`) REFERENCES `t_alumnos` (`idAlumno`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
