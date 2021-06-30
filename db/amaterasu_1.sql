-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2021 a las 04:16:47
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

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
(2, 191190077, 'Jose', 'Fuentes', 'Suarez', 'Sistemas', '2000-06-23', 1),
(3, 161190014, 'Fernando', 'Balderas', 'Solís', 'Sistemas', '1998-11-06', 14),
(4, 181190100, 'Amelia', 'Juárez', 'Sánchez', 'Sistemas', '2000-02-19', 8),
(5, 171190020, 'Armando', 'Lopez', 'Cortes', 'Sistemas', '1999-10-07', 14),
(6, 151190075, 'Israel', 'Tobar', 'Vázquez', 'Sistemas', '1997-06-14', 14),
(7, 171190030, 'Martin', 'Ochoa', 'Moreno', 'Sistemas', '1998-10-05', 7),
(8, 161190068, 'Saul', 'Gutiérrez', 'Alemán', 'Sistemas', '1998-08-27', 5),
(9, 181190074, 'Santiago', 'Lima', 'Buendía', 'Sistemas', '2000-09-25', 9),
(10, 151190055, 'Ana Maria', 'Duran', 'Nuñez', 'Sistemas', '1997-12-06', 14),
(11, 191190039, 'Humberto', 'Flores', 'Flores', 'Sistemas', '2001-07-23', 14),
(12, 171190058, 'Brenda', 'Quintana', 'Arcos', 'Sistemas', '1998-06-11', 8),
(13, 191190054, 'Ernesto', 'Palacios', 'Quiroga', 'Sistemas', '2001-02-25', 14),
(14, 171190020, 'Patricia', 'Garcia', 'Sosa', 'Sistemas', '1999-09-19', 14),
(15, 161190087, 'Sofia', 'Luna', 'Contreras', 'Sistemas', '1998-12-05', 14),
(16, 151190049, 'Jesús', 'Aguilar', 'Herrera', 'Sistemas', '1997-08-26', 14),
(17, 171190111, 'Isabela', 'Núñez', 'Núñez', 'Sistemas', '1999-04-05', 14),
(18, 161190102, 'Ezequiel', 'Ines', 'Hernandez', 'Sistemas', '1998-09-11', 14),
(19, 171190032, 'Alejandra', 'Suarez', 'Osorio', 'Sistemas', '1999-01-20', 14),
(20, 181190077, 'José Luis', 'Vargas', 'Rivera', 'Sistemas', '2000-04-05', 14),
(21, 191190066, 'Pedro Octavio', 'Jimenez', 'Garita', 'Sistemas', '2001-04-18', 14),
(22, 151190043, 'Andrea', 'Chávez', 'Zapata', 'Sistemas', '1997-11-02', 14),
(23, 161190005, 'Sebastián', 'Malagón', 'Serrano', 'Sistemas', '1998-02-19', 14),
(24, 191190109, 'Ricardo', 'González', 'Luna', 'Sistemas', '2001-06-04', 14),
(25, 151190052, 'Karen', 'Paredes', 'López', 'Sistemas', '1996-01-16', 14),
(26, 181190046, 'Víctor', 'Quezada', 'Arriaga', 'Sistemas', '2000-07-13', 14),
(27, 161190015, 'Patricia', 'Galván', 'Castillo', 'Sistemas', '1998-05-15', 14),
(28, 181190026, 'Fátima', 'Benítez', 'Pérez', 'Sistemas', '2000-04-17', 14),
(29, 151190107, 'Ximena', 'Ortiz', 'Zabala', 'Sistemas', '1997-05-26', 14),
(30, 151190096, 'Ignacio', 'Rodríguez', 'Diaz', 'Sistemas', '1996-06-17', 14),
(31, 161190052, 'Jesenia', 'Pacheco', 'Ayala', 'Sistemas', '1998-03-15', 14),
(32, 191190125, 'Rodrigo', 'Sandoval', 'Flores', 'Sistemas', '2000-04-05', 14),
(33, 151190085, 'Estela', 'Cruz', 'Jurado', 'Gestión', '1996-04-29', 14),
(34, 171190021, 'Pablo', 'Villarreal', 'Olmedo', 'Gestión', '1996-05-18', 14),
(35, 181190034, 'Karina', 'Melo', 'Cervantes', 'Gestión', '1997-01-30', 14),
(36, 171190066, 'Néstor', 'Rivera', 'Paz', 'Gestión', '1999-06-14', 14),
(37, 151190088, 'Lorena', 'Arcos', 'Jiménez', 'Gestión', '1996-07-12', 14),
(38, 161190010, 'Oswaldo', 'Gómez', 'Lujan', 'Gestión', '1995-10-06', 14),
(39, 191190003, 'Karla', 'Palomo', 'Sánchez', 'Gestión', '2000-08-16', 14),
(40, 151190044, 'Héctor', 'Martínez', 'Flores', 'Gestión', '1995-03-18', 14),
(41, 171190120, 'Itzel', 'Carballo', 'Torres', 'Gestión', '1996-02-05', 14),
(42, 181190071, 'Diego', 'Alcántara', 'Hernández', 'Gestión', '2000-01-28', 14),
(43, 171190107, 'Luisa', 'Flores', 'De la Cruz', 'Gestión', '1998-07-11', 14),
(44, 181190108, 'Martha', 'Vázquez', 'Gómez', 'Gestión', '1999-07-14', 14),
(45, 201190002, 'Yamilet', 'Santos', 'Diaz', 'Gestión', '2002-06-18', 14),
(46, 161190095, 'David', 'Herrera', 'Cortes', 'Gestión', '1995-07-16', 14),
(47, 151190062, 'Gabriela', 'Cardenas', 'Domínguez', 'Gestión', '1994-10-03', 14),
(48, 191190030, 'Iván', 'Trejo', 'Guzmán', 'Gestión', '1996-04-13', 14),
(49, 161190118, 'Alexander', 'Fernández', 'Romero', 'Gestión', '1998-07-04', 14),
(50, 201190050, 'Juan', 'Silva', 'Ramírez', 'Gestión', '2001-06-15', 14),
(51, 171190123, 'Alan', 'Gutiérrez', 'Soto', 'Industrial', '1999-08-16', 14),
(52, 181190106, 'Rogelio', 'Ruiz', 'Ortega', 'Industrial', '2000-07-28', 14),
(53, 201190069, 'Claudia', 'Romero', 'Santos', 'Industrial', '2000-12-07', 14),
(54, 171190045, 'Silvia', 'Calderón', 'Villagomez', 'Industrial', '1998-04-18', 14),
(55, 191190000, 'Lucia', 'Palacios', 'Reyes', 'Industrial', '1998-09-17', 14),
(56, 181190027, 'Horacio', 'Jiménez', 'Cárdenas', 'Industrial', '2000-12-09', 14),
(57, 171190110, 'Sarah', 'Linares', 'Fuentes', 'Industrial', '1999-06-18', 14),
(58, 191190081, 'Roberto', 'Aguilar', 'García', 'Industrial', '1995-06-19', 14),
(59, 151190119, 'Gerardo', 'Sandoval', 'Fernández', 'Industrial', '1996-08-14', 14),
(60, 161190099, 'Florentino', 'Castañeda', 'Salgado', 'Industrial', '1995-09-28', 14),
(61, 171190046, 'Oscar', 'Herrera', 'León', 'Industrial', '1999-05-11', 14),
(62, 161190037, 'Mauricio', 'Palomo', 'Rosales', 'Industrial', '1998-12-01', 14);

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
  `fechaNacimiento` date DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_docentes`
--

INSERT INTO `t_docentes` (`idDocentes`, `rfc`, `areaProfesor`, `nombreDocente`, `apellidoPaternoP`, `apellidoMaternoP`, `fechaNacimiento`, `telefono`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'CUPU800825569', 'Sistemas', 'Diego', 'Sahashi', 'Uchiha', '1990-03-08', NULL),
(3, 'CUPU800825569', 'Sistemas', 'Prueba', 'Paterno', 'Materno', '1989-04-09', NULL),
(5, 'CAFA700213QWE', 'Sistemas', 'Armando', 'Castillo', 'Flores', '1970-02-13', NULL),
(6, 'ESLM690911PLM', 'Sistemas', 'Mariana', 'Espinosa', 'Luna', '1969-09-11', NULL),
(7, 'PADA821031NYX', 'Sistemas', 'Alberto', 'Palomo', 'Domínguez', '1982-10-31', NULL),
(8, 'ZAMR850504ZMO', 'Sistemas', 'Rolando', 'Zapata', 'Martínez', '1985-05-04', NULL),
(9, 'MOSJ770312RTY', 'Sistemas', 'Jorge', 'Montes', 'Salgado', '1977-03-12', NULL),
(10, 'CESA801217GHJ', 'Gestión', 'Ana Luisa', 'Cedillo', 'Sandoval', '1980-12-17', NULL),
(11, 'VIAF790211KXA', 'Gestión', 'Fernando', 'Villa', 'Aguilar', '1979-02-11', NULL),
(12, 'IGCP900129VMI', 'Gestión', 'Paola', 'Iglesias', 'Castañeda', '1990-01-29', NULL),
(13, 'SAJJ681204RTY', 'Gestión', 'Javier', 'Salgado', 'Jiménez', '1968-12-04', NULL),
(14, 'FURR720730CVR', 'Gestión', 'Raúl', 'Fuentes', 'Rodríguez', '1972-07-30', NULL),
(15, 'OLLU780824IUJ', 'Industrial', 'Ulises', 'Olvera', 'Lima', '1978-08-24', NULL),
(16, 'GOHC800927MER', 'Industrial', 'Cynthia', 'González', 'Hernández', '1980-09-27', NULL),
(17, 'PEAD740828GJY', 'Industrial', 'Daniela', 'Pérez', 'Ayala', '1974-08-28', NULL),
(18, 'ALJG870615FKU', 'Industrial', 'Gustavo', 'Altamirano', 'Jurado', '1987-06-15', NULL),
(19, 'HUTJ730517AUT', 'Industrial', 'Julieta', 'Hurtado', 'Torres', '1973-05-17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_examenes`
--

CREATE TABLE `t_examenes` (
  `idExamen` int(11) NOT NULL,
  `unidad1` int(1) DEFAULT NULL,
  `fk_materia` int(11) DEFAULT NULL,
  `examen` varchar(255) DEFAULT NULL,
  `calificacion` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_horarioalumno`
--

CREATE TABLE `t_horarioalumno` (
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

--
-- Volcado de datos para la tabla `t_horarios`
--

INSERT INTO `t_horarios` (`idHorario`, `aula`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `id_materia`, `idDocente`) VALUES
(1, 'B4', '07:00-09:00', '00:00-00:00', '09:00-11:00', '00:00-00:00', '08:00-09:00', 1, 5),
(2, 'B3', '09:00-11:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', '09:00-11:00', 4, 6),
(3, 'B2', '11:00-12:00', '00:00-00:00', '11:00-13:00', '00:00-00:00', '11:00-13:00', 3, 7),
(4, 'B4', '00:00-00:00', '09:00-11:00', '00:00-00:00', '09:00-11:00', '00:00-00:00', 2, 8),
(5, 'B2', '00:00-00:00', '11:00-13:00', '00:00-00:00', '11:00-14:00', '00:00-00:00', 5, 9),
(6, 'A2', '07:00-09:00', '00:00-00:00', '09:00-11:00', '00:00-00:00', '00:00-00:00', 6, 10),
(7, 'A3', '11:00-13:00', '00:00-00:00', '07:00-09:00', '00:00-00:00', '00:00-00:00', 7, 11),
(8, 'A4', '00:00-00:00', '07:00-09:00', '00:00-00:00', '07:00-09:00', '00:00-00:00', 10, 12),
(9, 'A2', '00:00-00:00', '09:00-11:00', '00:00-00:00', '09:00-12:00', '00:00-00:00', 8, 13),
(10, 'A3', '00:00-00:00', '00:00-00:00', '11:00-13:00', '00:00-00:00', '07:00-09:00', 9, 14),
(11, 'C2', '07:00-09:00', '00:00-00:00', '00:00-00:00', '00:00-00:00', '07:00-09:00', 11, 15),
(12, 'C4', '09:00-11:00', '00:00-00:00', '07:00-09:00', '00:00-00:00', '11:00-12:00', 13, 16),
(13, 'C3', '00:00-00:00', '09:00-11:00', '00:00-00:00', '00:00-00:00', '09:00-11:00', 12, 17),
(14, 'C2', '00:00-00:00', '11:00-13:00', '00:00-00:00', '11:00-13:00', '00:00-00:00', 14, 18),
(15, 'C4', '00:00-00:00', '00:00-00:00', '09:00-11:00', '07:00-09:00', '00:00-00:00', 15, 19);

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

--
-- Volcado de datos para la tabla `t_materias`
--

INSERT INTO `t_materias` (`idMateria`, `nombreMateria`, `carrera`, `m_semestre`) VALUES
(1, 'Programación Orientada a Objetos', 'Sistemas', 14),
(2, 'Graficación', 'Sistemas', 14),
(3, 'Sistemas Web', 'Sistemas', 14),
(4, 'Taller de Bases de Datos', 'Sistemas', 14),
(5, 'Tópicos Avanzados de Programación', 'Sistemas', 14),
(6, 'Legislación Laboral', 'Gestión', 14),
(7, 'Ingeniería Económica', 'Gestión', 14),
(8, 'Mercadotecnia Electrónica', 'Gestión', 14),
(9, 'Gestión de la Producción I', 'Gestión', 14),
(10, 'Entorno Macroeconómico', 'Gestión', 14),
(11, 'Metrología y Normalización', 'Industrial', 14),
(12, 'Higiene y Seguridad Industrial', 'Industrial', 14),
(13, 'Estadística Inferencial II', 'Industrial', 14),
(14, 'Análisis de la Realidad Nacional', 'Industrial', 14),
(15, 'Electricidad y Electrónica Industrial', 'Industrial', 14);

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
(1, 'Ene-Jun 2021', '2021-03-10', '2021-07-02', 'finalizado'),
(2, 'Ene-Jun 2015', '2015-01-19', '2015-06-26', 'finalizado'),
(3, 'Ago-Dic 2015', '2015-08-12', '2015-12-11', 'finalizado'),
(4, 'Ene-Jun 2016', '2016-01-11', '2016-06-24', 'finalizado'),
(5, 'Ago-Dic 2016', '2016-08-22', '2016-12-09', 'finalizado'),
(6, 'Ene-Jun 2017', '2017-01-09', '2021-06-30', 'finalizado'),
(7, 'Ago-Dic 2017', '2017-08-21', '2017-12-13', 'finalizado'),
(8, 'Ene-Jun 2018', '2018-01-10', '2018-06-29', 'finalizado'),
(9, 'Ago-Dic 2018', '2018-08-20', '2018-12-14', 'finalizado'),
(10, 'Ene-Jun 2019', '2019-01-07', '2019-06-28', 'finalizado'),
(11, 'Ago-Dic 2019', '2019-08-19', '2019-12-13', 'finalizado'),
(12, 'Ene-Jun 2020', '2020-01-08', '2020-06-24', 'finalizado'),
(13, 'Ago-Dic 2020', '2020-08-17', '2020-12-11', 'finalizado'),
(14, 'Ene-Jun 2021', '2021-03-01', '2021-07-07', 'activo'),
(15, 'Ago-Dic 2021', '2021-09-13', '2022-01-26', 'inactivo');

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
-- Indices de la tabla `t_examenes`
--
ALTER TABLE `t_examenes`
  ADD PRIMARY KEY (`idExamen`),
  ADD KEY `fk_materia` (`fk_materia`);

--
-- Indices de la tabla `t_horarioalumno`
--
ALTER TABLE `t_horarioalumno`
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
  MODIFY `idAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `t_calificaciones`
--
ALTER TABLE `t_calificaciones`
  MODIFY `idCalificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_docentes`
--
ALTER TABLE `t_docentes`
  MODIFY `idDocentes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `t_examenes`
--
ALTER TABLE `t_examenes`
  MODIFY `idExamen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_horarioalumno`
--
ALTER TABLE `t_horarioalumno`
  MODIFY `idHorarioAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_horarios`
--
ALTER TABLE `t_horarios`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `t_materias`
--
ALTER TABLE `t_materias`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `t_semestre`
--
ALTER TABLE `t_semestre`
  MODIFY `idSemestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- Filtros para la tabla `t_examenes`
--
ALTER TABLE `t_examenes`
  ADD CONSTRAINT `t_examenes_ibfk_1` FOREIGN KEY (`fk_materia`) REFERENCES `t_materias` (`idMateria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t_horarioalumno`
--
ALTER TABLE `t_horarioalumno`
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
