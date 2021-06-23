CREATE DATABASE  IF NOT EXISTS `amaterasu` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `amaterasu`;
-- MariaDB dump 10.19  Distrib 10.4.19-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: amaterasu
-- ------------------------------------------------------
-- Server version	10.4.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `t_administrador`
--

DROP TABLE IF EXISTS `t_administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_administrador` (
  `idAdministrador` int(11) NOT NULL AUTO_INCREMENT,
  `fk_idDocente` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAdministrador`),
  KEY `fk_idDocente` (`fk_idDocente`),
  CONSTRAINT `fk_idDocente` FOREIGN KEY (`fk_idDocente`) REFERENCES `t_docentes` (`idDocentes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_administrador`
--

LOCK TABLES `t_administrador` WRITE;
/*!40000 ALTER TABLE `t_administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_alumnos`
--

DROP TABLE IF EXISTS `t_alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_alumnos` (
  `idAlumno` int(11) NOT NULL AUTO_INCREMENT,
  `numControl` int(11) DEFAULT NULL,
  `nombreAlumno` varchar(255) DEFAULT NULL,
  `apellidoPaternoA` varchar(255) DEFAULT NULL,
  `apellidoMaternoA` varchar(255) DEFAULT NULL,
  `carrera` varchar(255) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `fk_archivoAlumno` int(11) DEFAULT NULL,
  `fk_calificaciones` int(11) DEFAULT NULL,
  `fk_semestre` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAlumno`),
  KEY `fk_semestre` (`fk_semestre`),
  KEY `fk_archivoAlumno` (`fk_archivoAlumno`),
  KEY `fk_calificaciones` (`fk_calificaciones`),
  CONSTRAINT `fk_archivoAlumno` FOREIGN KEY (`fk_archivoAlumno`) REFERENCES `t_archivos` (`idArchivos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_calificaciones` FOREIGN KEY (`fk_calificaciones`) REFERENCES `t_calificaciones` (`idCalificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_semestre` FOREIGN KEY (`fk_semestre`) REFERENCES `t_semestre` (`idSemestre`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_alumnos`
--

LOCK TABLES `t_alumnos` WRITE;
/*!40000 ALTER TABLE `t_alumnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_archivos`
--

DROP TABLE IF EXISTS `t_archivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_archivos` (
  `idArchivos` int(11) NOT NULL AUTO_INCREMENT,
  `nombreArchivo` varchar(255) DEFAULT NULL,
  `tipoArchivo` varchar(255) DEFAULT NULL,
  `fechaSubida` date DEFAULT NULL,
  `fk_idMateria` int(11) DEFAULT NULL,
  PRIMARY KEY (`idArchivos`),
  KEY `fk_idMateria` (`fk_idMateria`),
  CONSTRAINT `fk_idMateria` FOREIGN KEY (`fk_idMateria`) REFERENCES `t_materias` (`idMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_archivos`
--

LOCK TABLES `t_archivos` WRITE;
/*!40000 ALTER TABLE `t_archivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_archivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_calificaciones`
--

DROP TABLE IF EXISTS `t_calificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_calificaciones` (
  `idCalificacion` int(11) NOT NULL AUTO_INCREMENT,
  `calificacionAsignada` int(11) DEFAULT NULL,
  `aprobado` tinyint(1) DEFAULT NULL,
  `reprobado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idCalificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_calificaciones`
--

LOCK TABLES `t_calificaciones` WRITE;
/*!40000 ALTER TABLE `t_calificaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_calificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_docentes`
--

DROP TABLE IF EXISTS `t_docentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_docentes` (
  `idDocentes` int(11) NOT NULL AUTO_INCREMENT,
  `rfc` varchar(255) DEFAULT NULL,
  `areaProfesor` varchar(255) DEFAULT NULL,
  `nombreDocente` varchar(255) DEFAULT NULL,
  `apellidoPaternoP` varchar(255) DEFAULT NULL,
  `apellidoMaternoP` varchar(255) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `fk_archivoDocente` int(11) DEFAULT NULL,
  `fk_calificaciones` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDocentes`),
  KEY `fk_archivoDocente` (`fk_archivoDocente`),
  KEY `fx_calificaciones` (`fk_calificaciones`),
  CONSTRAINT `fk_archivoDocente` FOREIGN KEY (`fk_archivoDocente`) REFERENCES `t_archivos` (`idArchivos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fx_calificaciones` FOREIGN KEY (`fk_calificaciones`) REFERENCES `t_calificaciones` (`idCalificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_docentes`
--

LOCK TABLES `t_docentes` WRITE;
/*!40000 ALTER TABLE `t_docentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_docentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_materias`
--

DROP TABLE IF EXISTS `t_materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_materias` (
  `idMateria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMateria` varchar(255) DEFAULT NULL,
  `fk_semestre_M` int(11) DEFAULT NULL,
  `fk_profesor` int(11) DEFAULT NULL,
  `fk_calificaciones_M` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMateria`),
  KEY `fk_semestre_M` (`fk_semestre_M`),
  KEY `fk_profesor` (`fk_profesor`),
  KEY `fk_calificaciones_M` (`fk_calificaciones_M`),
  CONSTRAINT `fk_calificaciones_M` FOREIGN KEY (`fk_calificaciones_M`) REFERENCES `t_calificaciones` (`idCalificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_profesor` FOREIGN KEY (`fk_profesor`) REFERENCES `t_docentes` (`idDocentes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_semestre_M` FOREIGN KEY (`fk_semestre_M`) REFERENCES `t_semestre` (`idSemestre`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_materias`
--

LOCK TABLES `t_materias` WRITE;
/*!40000 ALTER TABLE `t_materias` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_rol`
--

DROP TABLE IF EXISTS `t_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `fk_idRolAlumnos` int(11) DEFAULT NULL,
  `fk_idRolDocentes` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRol`),
  KEY `fk_idRolAlumnos` (`fk_idRolAlumnos`),
  KEY `fk_idRolDocentes` (`fk_idRolDocentes`),
  CONSTRAINT `fk_idRolAlumnos` FOREIGN KEY (`fk_idRolAlumnos`) REFERENCES `t_alumnos` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idRolDocentes` FOREIGN KEY (`fk_idRolDocentes`) REFERENCES `t_docentes` (`idDocentes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_rol`
--

LOCK TABLES `t_rol` WRITE;
/*!40000 ALTER TABLE `t_rol` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_semestre`
--

DROP TABLE IF EXISTS `t_semestre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_semestre` (
  `idSemestre` int(11) NOT NULL AUTO_INCREMENT,
  `semestre` int(11) DEFAULT NULL,
  `inicioSemestre` date DEFAULT NULL,
  `finSemestre` date DEFAULT NULL,
  PRIMARY KEY (`idSemestre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_semestre`
--

LOCK TABLES `t_semestre` WRITE;
/*!40000 ALTER TABLE `t_semestre` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_semestre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_usuario`
--

DROP TABLE IF EXISTS `t_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fk_idRol` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_idRol` (`fk_idRol`),
  CONSTRAINT `fk_idRol` FOREIGN KEY (`fk_idRol`) REFERENCES `t_rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_usuario`
--

LOCK TABLES `t_usuario` WRITE;
/*!40000 ALTER TABLE `t_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-17 22:08:23
