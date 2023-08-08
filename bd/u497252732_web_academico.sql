-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 08:57 PM
-- Server version: 10.6.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u497252732_web_academico`
--

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `titulo_curso` varchar(150) NOT NULL,
  `descripcion_curso` varchar(255) NOT NULL,
  `img_curso` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`id_curso`, `titulo_curso`, `descripcion_curso`, `img_curso`) VALUES
(1, 'INGENIERIA', 'Curso Pre-facultativo de Ingeniería', ''),
(2, 'INGENIERIA DE SISTEMAS', 'Curso de Nivelación', 'bn-imagen-cursos-online-gratuitos-Ingenieria-Civil.png'),
(3, 'INGENIERIA DE SOFTWARE V2', 'Curso de Actualización V2', 'images (2).jpeg'),
(4, 'DERECHO LABORAL', 'Curso de Derecho', ''),
(6, 'MEDICINA UPEA', 'Es un curso preparatorio exclusivo para la carrera de medicina UPEA , en las materias de Matemática, Biofísica, Química, Lenguaje, Biología, Anatomía y Primeros Auxilios', 'logocuatro.png'),
(7, 'ECONOMIA', 'Economia basica', ''),
(8, 'LINGUISTICA', 'Curso de Idiomas', 'fondoo.jpg'),
(9, 'CONTABILIDAD', 'Curso de Contabilidad General', 'matematicas ingenieros cursos online gratis.jpg'),
(10, 'NEMO ESSE ODIO DOLOR', 'Voluptatibus perspic', 'fondoo.jpg'),
(11, 'INGENIERIA DE SOFTWARE V2', 'COMPU', 'fondoo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `curso_materia`
--

CREATE TABLE `curso_materia` (
  `id_curso_materia` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `docente`
--

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL,
  `nombre_docente` varchar(50) NOT NULL,
  `ap_pat_docente` varchar(50) NOT NULL,
  `ap_mat_docente` varchar(50) NOT NULL,
  `direccion_docente` varchar(100) NOT NULL,
  `telefono_docente` varchar(50) NOT NULL,
  `fecha_nac_docente` date NOT NULL,
  `ci_docente` varchar(50) NOT NULL,
  `img_docente` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado_docente` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `docente`
--

INSERT INTO `docente` (`id_docente`, `nombre_docente`, `ap_pat_docente`, `ap_mat_docente`, `direccion_docente`, `telefono_docente`, `fecha_nac_docente`, `ci_docente`, `img_docente`, `id_usuario`, `estado_docente`) VALUES
(10, 'AGUSTIN', 'FLORES', 'CHOQUE', 'ZONA BAUTISTA SAAVEDRA NRO 213', '78945464', '1988-03-03', ' 46494654', 'Vikingos_Serie_de_TV-535105811-large.jpg', 0, 1),
(15, 'AGUSTIN2', 'FLORES2', 'CHOQUE2', 'ZONA BAUTISTA SAAVEDRA NRO 213', '78945464', '1988-03-03', ' 46494654', 'user6-128x128.jpg', 0, 1),
(17, 'ALICE', 'CRUZ', 'MORALES', 'ZONA ALTOLIMA, FRENTE A COLEGIO DON BOSCO', '56465465', '2023-04-19', '45651214', 'user8-128x128.jpg', 0, 0),
(22, 'ANA', 'MONTALBO ', 'SIVILA', 'ZONA ALTOLIMA, FRENTE A COLEGIO DON BOSCO', '78656456', '1988-07-20', '24564534', 'Imagen de WhatsApp 2023-03-04 a las 14.17.37.jpg', 0, 1),
(23, 'LUCAS', 'MORALES', 'SARATA', 'DON BOSCO, 16 DE JULIO BALLIVIAN', '78978644', '1996-09-04', '789786', 'raisedbywolves-mother-cmyk-tunein1-1598365812152_ue3u.620.webp', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `docente_materia`
--

CREATE TABLE `docente_materia` (
  `id_docente_materia` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `docente_materia`
--

INSERT INTO `docente_materia` (`id_docente_materia`, `id_docente`, `id_materia`, `dia`, `hora`) VALUES
(2, 10, 3, '2023-04-13', '04:07:00'),
(3, 15, 3, '0000-00-00', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(11) NOT NULL,
  `nombre_estudiante` varchar(50) NOT NULL,
  `ap_pat_estudiante` varchar(50) NOT NULL,
  `ap_mat_estudiante` varchar(50) NOT NULL,
  `direccion_estudiante` varchar(100) NOT NULL,
  `telefono_estudiante` varchar(50) NOT NULL,
  `fecha_nac_estudiante` date NOT NULL,
  `ci_estudiante` varchar(50) NOT NULL,
  `matricula` varchar(50) NOT NULL,
  `img_estudiante` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado_estudiante` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `nombre_estudiante`, `ap_pat_estudiante`, `ap_mat_estudiante`, `direccion_estudiante`, `telefono_estudiante`, `fecha_nac_estudiante`, `ci_estudiante`, `matricula`, `img_estudiante`, `id_usuario`, `estado_estudiante`) VALUES
(3, 'JUANA ARI', 'DE LA CRUZ', 'MORALES', 'SAN FELIPE DE SEKE, NRO 4554', '78854952', '1995-06-08', '45649465', 'JCM-2023', 'Aspectos-a-considerar-para-las-fotos-carnet.jpg', 0, 0),
(6, 'PEPE', 'MORALES', 'CAQUE', 'VILLA EL CARME, CALLE LOS RIOS, NRO 3232', '4543534', '1998-05-10', '100546533', 'PMC-004', 'roberto-valdivia-rcUw6b4iYe0-unsplash.jpg', 4, 1),
(7, 'ARAMIS TONNY', 'CONDORI', 'LIMACHI', 'Z SAN LUIS II CH. C JOSE MANUEL CORTEZ N 1044', '60112757', '1996-10-18', '7099664', '', '', 0, 1),
(8, 'PEDRO', 'ALANOCA', 'TICONA', 'SAN FELIPE DE SEÑE, NRO 4554', '78854788', '1995-08-10', '2125654', '15000537', 'gua1.png', 0, 1),
(9, 'DELIA', 'APAZA', 'SANCHEZ', 'VILLA EL CARME, CALLE LOS RIOS, NRO 3232', '45612314', '1979-02-25', '45613214', '55545', 'Imagen1.png', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `estudiante_curso`
--

CREATE TABLE `estudiante_curso` (
  `id_estu_curso` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `fecha_asignacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estudiante_curso`
--

INSERT INTO `estudiante_curso` (`id_estu_curso`, `id_estudiante`, `id_curso`, `id_grupo`, `fecha_asignacion`) VALUES
(1, 6, 3, 1, '2023-07-04'),
(2, 3, 4, 2, '2023-05-04'),
(3, 7, 6, 6, '2023-07-04'),
(4, 9, 9, 7, '2023-07-20'),
(5, 8, 7, 7, '2023-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `turno` varchar(30) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `desc_grupo` int(11) NOT NULL,
  `estado_grupo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `id_curso`, `fecha_inicio`, `turno`, `hora_inicio`, `hora_fin`, `desc_grupo`, `estado_grupo`) VALUES
(1, 3, '2023-05-10', 'noche', '18:00:00', '20:00:00', 1, 0),
(2, 2, '2023-05-27', 'Mañana', '19:00:00', '21:30:00', 2, 0),
(6, 6, '2023-08-07', 'MAÑANA', '08:00:00', '11:15:00', 3, 1),
(7, 9, '2023-07-20', 'Noche', '16:15:00', '18:15:00', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `dias` text NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `estado_horario` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `horario`
--

INSERT INTO `horario` (`id_horario`, `id_materia`, `id_docente`, `dias`, `hora_inicio`, `hora_fin`, `estado_horario`) VALUES
(12, 14, 17, '[\"Martes\",\"Jueves\",\"Sabado\"]', '21:45:00', '22:45:00', 1),
(13, 19, 17, '[\"Lunes\",\"Miercoles\",\"Viernes\"]', '16:41:00', '18:41:00', 1),
(14, 17, 22, '[\"Lunes\",\"Jueves\"]', '19:44:00', '21:44:00', 1),
(16, 2, 23, '[\"Martes\",\"Jueves\"]', '16:48:00', '20:47:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inicio_curso`
--

CREATE TABLE `inicio_curso` (
  `id_inicio_curso` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `id_curso_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(100) NOT NULL,
  `contenido_materia` varchar(100) NOT NULL,
  `img_materia` varchar(50) NOT NULL,
  `costo_materia` decimal(10,2) NOT NULL,
  `estado_materia` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre_materia`, `contenido_materia`, `img_materia`, `costo_materia`, `estado_materia`) VALUES
(1, 'INTRODUCCION A LA PROGRAMACION', '- ALGORITMOS\r\n- DIAGRAMAS DE FLUJO\r\n- ESTRUCTURA DE DATOS\r\n- VARIABLES Y OPERADORES', 'programacion.jpg', 80.00, 1),
(2, 'CALCULO II', '- INTERVALOS\r\n- FACTORIZACION\r\n- VARIABLES', 'calculo.png', 100.00, 1),
(3, 'Teoría Musical G', '- CLAVES DE NOTAS\r\n- GUITARRA I\r\n- LENGUAJE MUSICAL', 'musica.jpg', 85.00, 1),
(4, 'Codeigniter 4', '- HTML5\r\n- CSS3\r\n- JAVASCRIPT', 'codigniter.jpg', 120.00, 1),
(5, 'PHP', '- Estructura\r\n- Arreglos\r\n- Importación de archivos', 'images (1).jpeg', 150.00, 1),
(7, 'CALCULO IV', '- COMPORTAMIENTO', 'LoginFondo.png', 123.00, 1),
(10, 'Introduccion a la programacion', 'Concepetos basicos sobre la logiaca de programacion', '', 0.00, 1),
(12, 'MATEMATICA MED UPEA', '- Algebra\r\n- Manejo de calculadora\r\n- Resolución de examenes pasados', '', 0.00, 1),
(13, 'BIOFISICA MED UPEA', '- Fundamentos de fisica', '', 0.00, 1),
(14, 'QUIMICA MED UPEA', '- Fundamentos de la quimica', '', 0.00, 1),
(15, 'LENGUAJE MED UPEA', '-Fundamentos al lenguaje', '', 0.00, 1),
(16, 'BIOLOGIA ANATOMIA MED UPEA', '- Introduccion a la biologia humana', '', 0.00, 1),
(17, 'PRIMEROS AUXILIOS MED UPEA', '- Introduccion a los primeros auxilios', '', 0.00, 1),
(18, 'Contabilidad I', 'Curso de contabilidad basica', '', 0.00, 1),
(19, 'Contabilidad Básica', 'Se estudiara desde los conceptos mas escenciales de la contabilidad', '', 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `desc_modulo` varchar(100) NOT NULL,
  `costo_modulo` decimal(10,2) NOT NULL,
  `duracion_modulo` varchar(100) NOT NULL,
  `estado_modulo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `id_curso`, `desc_modulo`, `costo_modulo`, `duracion_modulo`, `estado_modulo`) VALUES
(1, 3, '2do Módulo', 120.00, '2 semanas', 1),
(2, 2, '3er Módulo', 150.00, '3 semanas', 1),
(6, 6, '1er MODULO', 0.00, '4 MESES', 1),
(7, 7, '1er modulo', 250.00, '1 mes', 0),
(8, 9, '1er modulo', 300.00, '2 semanas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modulo_materia`
--

CREATE TABLE `modulo_materia` (
  `id_modulo_materia` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modulo_materia`
--

INSERT INTO `modulo_materia` (`id_modulo_materia`, `id_modulo`, `id_materia`) VALUES
(1, 1, 3),
(2, 2, 5),
(3, 2, 2),
(4, 1, 4),
(5, 2, 4),
(6, 2, 1),
(7, 7, 18),
(8, 6, 12),
(9, 6, 13),
(10, 6, 14),
(11, 6, 16),
(12, 6, 15),
(13, 6, 17),
(14, 8, 18),
(15, 8, 19),
(16, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `calificacion` float NOT NULL,
  `desc_nota` varchar(50) NOT NULL,
  `emision_nota` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_curso`, `id_modulo`, `id_materia`, `id_estudiante`, `calificacion`, `desc_nota`, `emision_nota`, `id_usuario`) VALUES
(1, 3, 3, 2, 6, 60, 'examen final', '2023-05-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `noticia`
--

CREATE TABLE `noticia` (
  `id_noticia` int(11) NOT NULL,
  `titulo_noticia` varchar(255) NOT NULL,
  `descripcion_noticia` text NOT NULL,
  `img_noticia` varchar(100) NOT NULL,
  `fecha_noticia` date NOT NULL,
  `estado_noticia` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `noticia`
--

INSERT INTO `noticia` (`id_noticia`, `titulo_noticia`, `descripcion_noticia`, `img_noticia`, `fecha_noticia`, `estado_noticia`) VALUES
(1, 'Cómo los celulares han cambiado nuestro cerebr', 'La primera llamada con un teléfono móvil se hizo hace 50 años.\n\nDesde entonces, estos dispositivos se han convertido en una herramienta esencial que nos ayuda a llevar adelante nuestras vidas. ¿Pero también alteran la forma en que funciona nuestro cerebro?\n\nAl igual que muchos de nosotros, paso demasiado tiempo en el celular. Y, como muchos de nosotros, soy muy consciente de ello y a menudo me siento culpable.\n\nA veces lo dejo en el otro extremo de la casa o lo apago para usarlo menos. Sin embargo, antes de lo que me gustaría admitir, termino caminando por el pasillo por algo que necesito hacer y que solo puedo hacer, o hago de manera más eficiente, a través del teléfono.', 'noticia1.jpg', '2023-04-13', 1),
(2, 'Los indígenas que se impusieron a las grandes telefónicas y crearon sus propias redes celulares en M', 'La \"gozona\" es uno de los conceptos más hermosos de una tierra hermosa como la de las montañas de Oaxaca, en el sur de México.\r\n\r\nEn comunidades con pocos habitantes, unir la fuerza laboral bajo la idea de que \"tú hoy trabajas para mí, yo mañana trabajo para ti\", adquiere una importancia crucial para completar tareas como la cosecha de café o la reparación de un camino dañado.\r\n\r\nEl solo reunir a hombres y mujeres para la \"gozona\", luego de visitarlos casa por casa, es una labor que puede llevarse toda la jornada.', 'Hospital-del-Norte.jpg', '2023-04-14', 1),
(11, 'Una lucha entre David vs. Goliat', 'Hasta antes de la llegada de la telefonía terrestre y celular, comunicarse con otros fuera de las comunidades de la Sierra Norte requería métodos antiguos. \"Antes se mandaban recados o cartas. Si un familiar iba a Oaxaca (la capital), mandábamos ahí en el autobús. Tardaban mucho pues, hasta días\", dice Olga Ramírez, una vecina de la comunidad de San Juan Yaeé. Un pueblo vecino de Yaeé es Santiago Lalopa, que se encuentra al otro lado de la cañada, a menos de 4 km de distancia lineal. Llevar un recado a alguien ahí implica un rodeo de una hora por los sinuosos caminos de las montañas', '', '2023-04-19', 1),
(12, 'Una lucha David vs. SANSON', 'Sanson', '', '2023-04-14', 1),
(14, 'Incio de Clases Académicas', 'El inicio de clases academicas se traslado para dentro de 2 semanas, los cuales esperemos se esten cuidadndo de estas altas temperaturas.', 'LoginFondo.png', '2023-07-20', 1),
(15, 'In possimus asperna', 'Dolor ratione molest', '', '2016-05-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `login_usuario` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `perfil` varchar(30) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `disponibilidad` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `login_usuario`, `password`, `perfil`, `estado`, `disponibilidad`) VALUES
(1, 'Sr Administrador', 'admin', '$2y$10$WCgjea1KKjZ/nzNWDV66jucqlutZ2UnMFdrkxoe8aRQI2ceuQjkku', 'Administrador', 1, 0),
(11, 'Usuario moderador', 'prueba', '$2y$10$4muLBDOVb0vI9.mLbsK3lOgkGlVjF2hy.gzdRct.yzS939ZS7t/E2', 'Estudiante', 1, 0),
(14, 'prueba2', 'prueba2', '$2y$10$IHnfAlMQM26PkIo98rvmwe8hDnTq8J7nWmnZOI9iqN3Ui6prBBrAm', 'Docente', 1, 0),
(15, 'prueba3', 'prueba3', '$2y$10$BHpxba7QII8ITJL4Bxe2cO2QHEc9UgSvn8HSGgdSDoMAQrL1ScdTe', 'Estudiante', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `curso_materia`
--
ALTER TABLE `curso_materia`
  ADD PRIMARY KEY (`id_curso_materia`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indexes for table `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_docente`);

--
-- Indexes for table `docente_materia`
--
ALTER TABLE `docente_materia`
  ADD PRIMARY KEY (`id_docente_materia`),
  ADD KEY `id_docente` (`id_docente`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indexes for table `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indexes for table `estudiante_curso`
--
ALTER TABLE `estudiante_curso`
  ADD PRIMARY KEY (`id_estu_curso`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `id_docente` (`id_docente`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indexes for table `inicio_curso`
--
ALTER TABLE `inicio_curso`
  ADD PRIMARY KEY (`id_inicio_curso`),
  ADD KEY `id_curso_materia` (`id_curso_materia`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indexes for table `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indexes for table `modulo_materia`
--
ALTER TABLE `modulo_materia`
  ADD PRIMARY KEY (`id_modulo_materia`),
  ADD KEY `id_modulo` (`id_modulo`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `curso_materia`
--
ALTER TABLE `curso_materia`
  MODIFY `id_curso_materia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `docente_materia`
--
ALTER TABLE `docente_materia`
  MODIFY `id_docente_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `estudiante_curso`
--
ALTER TABLE `estudiante_curso`
  MODIFY `id_estu_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `inicio_curso`
--
ALTER TABLE `inicio_curso`
  MODIFY `id_inicio_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `modulo_materia`
--
ALTER TABLE `modulo_materia`
  MODIFY `id_modulo_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `curso_materia`
--
ALTER TABLE `curso_materia`
  ADD CONSTRAINT `curso_materia_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`),
  ADD CONSTRAINT `curso_materia_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);

--
-- Constraints for table `docente_materia`
--
ALTER TABLE `docente_materia`
  ADD CONSTRAINT `docente_materia_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`),
  ADD CONSTRAINT `docente_materia_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`);

--
-- Constraints for table `estudiante_curso`
--
ALTER TABLE `estudiante_curso`
  ADD CONSTRAINT `estudiante_curso_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`),
  ADD CONSTRAINT `estudiante_curso_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`);

--
-- Constraints for table `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`),
  ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`);

--
-- Constraints for table `inicio_curso`
--
ALTER TABLE `inicio_curso`
  ADD CONSTRAINT `inicio_curso_ibfk_1` FOREIGN KEY (`id_curso_materia`) REFERENCES `curso_materia` (`id_curso_materia`);

--
-- Constraints for table `modulo`
--
ALTER TABLE `modulo`
  ADD CONSTRAINT `modulo_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);

--
-- Constraints for table `modulo_materia`
--
ALTER TABLE `modulo_materia`
  ADD CONSTRAINT `modulo_materia_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id_modulo`),
  ADD CONSTRAINT `modulo_materia_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
