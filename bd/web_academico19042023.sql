-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2023 a las 20:21:40
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web_academico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `titulo_curso` varchar(150) NOT NULL,
  `descripcion_curso` varchar(255) NOT NULL,
  `horario_curso` time NOT NULL,
  `costo_curso` decimal(10,2) NOT NULL,
  `img_curso` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_materia`
--

CREATE TABLE `curso_materia` (
  `id_curso_materia` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
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
  `estado_docente` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id_docente`, `nombre_docente`, `ap_pat_docente`, `ap_mat_docente`, `direccion_docente`, `telefono_docente`, `fecha_nac_docente`, `ci_docente`, `img_docente`, `estado_docente`) VALUES
(1, 'Julio', 'Barra', 'Herrera', 'Zona, San Jose de yunguyo, Nro 3232', '78546568', '1991-04-17', '23265445', '', 1),
(10, 'AGUSTIN', 'FLORES', 'CHOQUE', 'ZONA BAUTISTA SAAVEDRA NRO 213', '78945464', '1988-03-03', ' 46494654', 'Vikingos_Serie_de_TV-535105811-large.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_materia`
--

CREATE TABLE `docente_materia` (
  `id_docente_materia` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docente_materia`
--

INSERT INTO `docente_materia` (`id_docente_materia`, `id_docente`, `id_materia`, `dia`, `hora`) VALUES
(1, 1, 4, '2023-04-13', '14:00:00'),
(2, 10, 3, '2023-04-13', '04:07:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
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
  `estado_estudiante` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `nombre_estudiante`, `ap_pat_estudiante`, `ap_mat_estudiante`, `direccion_estudiante`, `telefono_estudiante`, `fecha_nac_estudiante`, `ci_estudiante`, `matricula`, `img_estudiante`, `estado_estudiante`) VALUES
(1, 'Eliseo ', 'Fernandez', 'Amaru', 'Yunguyo Nro 1234', '7854851', '1995-08-04', '10054653', 'EAF10054652', '', 0),
(2, 'MARCOS', 'AMARU', 'FERNANDEZ', 'VILLA EL CARME, CALLE LOS RIOS, NRO 3232', '78854789', '1997-03-02', '45998416', '1500537', 'Imagen de WhatsApp 2023-03-04 a las 21.42.39.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `duracion` time NOT NULL,
  `hora` time NOT NULL,
  `dia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_horario`, `id_materia`, `duracion`, `hora`, `dia`) VALUES
(1, 4, '02:00:00', '12:00:00', 'lunes'),
(2, 3, '02:30:00', '03:00:00', 'Miercoles'),
(3, 3, '01:00:00', '04:00:00', 'Martes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio_curso`
--

CREATE TABLE `inicio_curso` (
  `id_inicio_curso` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `id_curso_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(100) NOT NULL,
  `contenido_materia` varchar(100) NOT NULL,
  `img_materia` varchar(50) NOT NULL,
  `costo_materia` decimal(10,2) NOT NULL,
  `estado_materia` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre_materia`, `contenido_materia`, `img_materia`, `costo_materia`, `estado_materia`) VALUES
(1, 'INTRODUCCION A LA PROGRAMACION P-001', '- ALGORITMOS\r\n- DIAGRAMAS DE FLUJO\r\n- ESTRUCTURA DE DATOS\r\n- VARIABLES Y OPERADORES', 'programacion.jpg', '80.00', 1),
(2, 'CALCULO II', '- INTERVALOS\r\n- FACTORIZACION\r\n- VARIABLES', 'calculo.png', '100.00', 1),
(3, 'Teoría Musical G', '- CLAVES DE NOTAS\r\n- GUITARRA I\r\n- LENGUAJE MUSICAL', 'musica.jpg', '85.00', 1),
(4, 'Codeigniter 4', '- HTML5\r\n- CSS3\r\n- JAVASCRIPT', 'codigniter.jpg', '120.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id_noticia` int(11) NOT NULL,
  `titulo_noticia` varchar(255) NOT NULL,
  `descripcion_noticia` text NOT NULL,
  `img_noticia` varchar(100) NOT NULL,
  `fecha_noticia` date NOT NULL,
  `estado_noticia` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id_noticia`, `titulo_noticia`, `descripcion_noticia`, `img_noticia`, `fecha_noticia`, `estado_noticia`) VALUES
(1, 'Cómo los celulares han cambiado nuestro cerebr', 'La primera llamada con un teléfono móvil se hizo hace 50 años.\n\nDesde entonces, estos dispositivos se han convertido en una herramienta esencial que nos ayuda a llevar adelante nuestras vidas. ¿Pero también alteran la forma en que funciona nuestro cerebro?\n\nAl igual que muchos de nosotros, paso demasiado tiempo en el celular. Y, como muchos de nosotros, soy muy consciente de ello y a menudo me siento culpable.\n\nA veces lo dejo en el otro extremo de la casa o lo apago para usarlo menos. Sin embargo, antes de lo que me gustaría admitir, termino caminando por el pasillo por algo que necesito hacer y que solo puedo hacer, o hago de manera más eficiente, a través del teléfono.', 'noticia1.jpg', '2023-04-13', 1),
(2, 'Los indígenas que se impusieron a las grandes telefónicas y crearon sus propias redes celulares en M', 'La \"gozona\" es uno de los conceptos más hermosos de una tierra hermosa como la de las montañas de Oaxaca, en el sur de México.\r\n\r\nEn comunidades con pocos habitantes, unir la fuerza laboral bajo la idea de que \"tú hoy trabajas para mí, yo mañana trabajo para ti\", adquiere una importancia crucial para completar tareas como la cosecha de café o la reparación de un camino dañado.\r\n\r\nEl solo reunir a hombres y mujeres para la \"gozona\", luego de visitarlos casa por casa, es una labor que puede llevarse toda la jornada.', 'Hospital-del-Norte.jpg', '2023-04-14', 1),
(3, 'Una lucha entre David vs. Goliat', 'Hasta antes de la llegada de la telefonía terrestre y celular, comunicarse con otros fuera de las comunidades de la Sierra Norte requería métodos antiguos.\r\n\r\n\"Antes se mandaban recados o cartas. Si un familiar iba a Oaxaca (la capital), mandábamos ahí en el autobús. Tardaban mucho pues, hasta días\", dice Olga Ramírez, una vecina de la comunidad de San Juan Yaeé.\r\n\r\nUn pueblo vecino de Yaeé es Santiago Lalopa, que se encuentra al otro lado de la cañada, a menos de 4 km de distancia lineal. Llevar un recado a alguien ahí implica un rodeo de una hora por los sinuosos caminos de las montañas', 'noticiaDefault.jpg', '2023-04-13', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `login_usuario` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `perfil` varchar(30) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `login_usuario`, `password`, `perfil`, `estado`) VALUES
(1, 'Sr Administrador', 'admin', '$2y$10$WCgjea1KKjZ/nzNWDV66jucqlutZ2UnMFdrkxoe8aRQI2ceuQjkku', 'Administrador', 1),
(2, 'ELISEO AMARU', 'eliseo', '$2y$10$95r0hsUjQm/eSRJ6lPV/sOuqy4s9qnNsbzke7RbYOnRBFHOrjAsDW', 'Administrador', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `curso_materia`
--
ALTER TABLE `curso_materia`
  ADD PRIMARY KEY (`id_curso_materia`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_docente`);

--
-- Indices de la tabla `docente_materia`
--
ALTER TABLE `docente_materia`
  ADD PRIMARY KEY (`id_docente_materia`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `inicio_curso`
--
ALTER TABLE `inicio_curso`
  ADD PRIMARY KEY (`id_inicio_curso`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `curso_materia`
--
ALTER TABLE `curso_materia`
  MODIFY `id_curso_materia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `docente_materia`
--
ALTER TABLE `docente_materia`
  MODIFY `id_docente_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `inicio_curso`
--
ALTER TABLE `inicio_curso`
  MODIFY `id_inicio_curso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
