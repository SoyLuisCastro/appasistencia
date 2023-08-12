-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 11-07-2023 a las 21:34:09
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_asistencia`
--

CREATE TABLE `tb_asistencia` (
  `id_asistencia` int(11) NOT NULL,
  `id_estudiantes` int(11) DEFAULT NULL,
  `id_jornada2` int(11) DEFAULT NULL,
  `id_carreras` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `emergencia` time DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_asistencia`
--

INSERT INTO `tb_asistencia` (`id_asistencia`, `id_estudiantes`, `id_jornada2`, `id_carreras`, `fecha`, `hora_entrada`, `hora_salida`, `emergencia`, `estado`) VALUES
(1, 23, 1, 1, '2022-11-03', '07:59:05', '07:40:49', '00:00:00', 1),
(3, 23, 1, 1, '2022-11-03', '07:59:51', '00:00:00', '00:00:00', 1),
(4, 37, 1, 1, '2022-11-06', '10:01:31', '00:00:00', '00:00:00', 0),
(5, 37, 1, 2, '2022-11-06', '10:03:36', '00:00:00', '00:00:00', 0),
(6, 37, 1, 2, '2022-11-06', '10:03:44', '00:00:00', '00:00:00', 0),
(8, 37, 1, 1, '2022-11-06', '10:04:22', '08:47:35', '00:00:00', 1),
(9, 37, 1, 2, '2022-11-06', '10:05:51', '00:00:00', '00:00:00', 1),
(10, 37, 1, 2, '2022-11-07', '11:44:58', '11:46:24', '00:00:00', 1),
(12, 45, 1, 1, '2022-11-07', '12:18:35', '12:20:54', '00:00:00', 1),
(13, 37, 1, 1, '2022-11-25', '08:47:29', '00:00:00', '00:00:00', 1),
(15, 46, 1, 2, '2022-12-03', '10:57:35', '10:58:35', '00:00:00', 1),
(16, 33, 1, 4, '2023-06-11', '08:45:39', '08:45:56', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_carreras`
--

CREATE TABLE `tb_carreras` (
  `id_carreras` int(11) NOT NULL,
  `siglas` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_carreras`
--

INSERT INTO `tb_carreras` (`id_carreras`, `siglas`, `descripcion`, `estado`) VALUES
(1, 'TDS', 'tecnologia desarrollo sofware', 1),
(2, 'TEMEC', 'tecnolgia en computadoras', 1),
(3, 'TSA', 'tecniologia en admitracion', 1),
(4, 'TSC', 'tecnologia en contabildad', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cursos`
--

CREATE TABLE `tb_cursos` (
  `id_cursos` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_cursos`
--

INSERT INTO `tb_cursos` (`id_cursos`, `descripcion`, `estado`) VALUES
(1, 'cuarto', 1),
(2, 'quinto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cursos2`
--

CREATE TABLE `tb_cursos2` (
  `id_cursos` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_cursos2`
--

INSERT INTO `tb_cursos2` (`id_cursos`, `descripcion`, `url`) VALUES
(1, 'forma', 'https://forms.gle/JzbjU2vhVv8GJ9BD9'),
(3, 'peliz gratis', 'https://wwo.repelis24.cx/'),
(4, 'romero', 'https://jonathan591.github.io/romerp/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estudiantes`
--

CREATE TABLE `tb_estudiantes` (
  `id_estudiantes` int(11) NOT NULL,
  `nombres_apellidos` varchar(50) DEFAULT NULL,
  `cedula` varchar(10) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `id_carreras` int(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `id_cursos` int(11) DEFAULT NULL,
  `id_paralelos` int(11) DEFAULT NULL,
  `id_jornadas` int(11) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_estudiantes`
--

INSERT INTO `tb_estudiantes` (`id_estudiantes`, `nombres_apellidos`, `cedula`, `telefono`, `correo`, `id_carreras`, `id_cursos`, `id_paralelos`, `id_jornadas`, `direccion`, `fecha_registro`, `estado`) VALUES
(23, 'Kristhel Rossemary Abad Vera', '0938383999', '0987654321', 'jonathan@gmai.com', 00000000003, 1, 1, 1, 'kim 31 via a daule', '2022-08-04', 1),
(28, 'jamith maiy pacheco pacheco', '0923833322', '0987654321', 'jacientolopez2029@gmail.com', 00000000004, 2, 1, 1, 'kim 31 via a daule', '2022-10-16', 1),
(30, 'martines bajañs', '092383332', '0987654321', 'jacientolopez2029@gmail.com', 00000000002, 2, 1, 2, 'mw', '2022-10-24', 0),
(33, 'jose marcos martines', '0987654321', '0912382192', 'jonathanlopez3020@gmail.com', 00000000004, 2, 2, 2, 'iughAUISGiuas', '2022-08-12', 1),
(34, 'matxoa jose jabier', '1234567890', '3242112321', 'sdjbisduigfuwgdfu', 00000000003, 2, 1, 1, 'fsdfdsfasf', '2022-10-24', 0),
(35, 'jose marcos martines', '12345678', '0912382192', 'jonathanlopez3020@gmail.com', 00000000002, 2, 2, 2, 'hejdhuashduas', '2022-10-24', 0),
(36, 'jose marcos martines', '123456789', '0912382192', 'sdjbisduigfuwgdfu', 00000000003, 2, 1, 2, 'saskldnaklds', '2022-10-24', 0),
(37, 'jose marcos martines', '123456', '0912382192', 'jonathanlopez3020@gmail.com', 00000000002, 2, 2, 2, 'iughAUISGiuas', '2022-11-07', 1),
(38, 'jose marcos martines', '09099333', '0912382192', 'jonathanlopez3020@hotmail.com', 00000000002, 2, 2, 2, 'hejdhuashduas', '2022-10-24', 0),
(39, 'marcos abd herrera', '0923833322', '0912382192', 'jose3020@gmail.com', 00000000001, 2, 1, 2, 'quien te pregunto ', '2022-10-24', 0),
(40, 'jose marcos martines', '32', '22', 'jonathanlopez3020@gmail.com', 00000000002, 1, 2, 1, 'iughAUISGiuas', '2022-10-26', 1),
(41, 'jose marcos martines', '12', '22', 'jonathanlopez3020@gmail.com', 00000000002, 1, 2, 1, 'iughAUISGiuas', '2022-10-26', 1),
(42, 'jose marcos martines', '22', '122', 'jonathanlopez3020@gmail.com', 00000000002, 2, 2, 2, 'hejdhuashduas', '2022-10-26', 1),
(43, 'matxoa jose jabier', '0923833322', '0912382192', 'jonathanlopez3020@gmail.com', 00000000001, 1, 0, 1, 'ZJHXBHZVXZH<Z', '2022-10-26', 1),
(44, 'jaciento cedeño', '0990933232', '0930283293', 'jonathanlopez3020@gmail.com', 00000000001, 1, 2, 1, 'jgdygaud', '2022-11-25', 0),
(45, 'marcso jose hose ', '0928764532', '0912382192', 'jesua3020@gmail.com', 00000000001, 1, 1, 1, 'wejhqwieuqw', '2022-11-07', 1),
(46, 'jose marcos martines ', '0934893333', '093203838', 'jonathanlopez3020@hotmail.com', 00000000002, 1, 1, 1, 'jose km 43', '2022-12-03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_jornada2`
--

CREATE TABLE `tb_jornada2` (
  `id_jornada2` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_jornada2`
--

INSERT INTO `tb_jornada2` (`id_jornada2`, `descripcion`, `estado`) VALUES
(1, 'matutina', 1),
(2, 'vespertina', 1),
(3, 'virtual', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_jornadas`
--

CREATE TABLE `tb_jornadas` (
  `id_jornadas` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` varchar(45) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_jornadas`
--

INSERT INTO `tb_jornadas` (`id_jornadas`, `descripcion`, `estado`) VALUES
(1, 'matutina', '1'),
(2, 'vespertina', '1'),
(3, 'nocturna', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_paralelos`
--

CREATE TABLE `tb_paralelos` (
  `id_paralelos` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_paralelos`
--

INSERT INTO `tb_paralelos` (`id_paralelos`, `descripcion`, `estado`) VALUES
(1, 'A', 1),
(2, 'B', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_usuario`
--

CREATE TABLE `tb_tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_tipo_usuario`
--

INSERT INTO `tb_tipo_usuario` (`id_tipo_usuario`, `descripcion`, `estado`) VALUES
(1, 'Admin', 1),
(2, 'Pasante', 1),
(3, 'Secretaria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `cedula` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_tipo_usuario` int(11) DEFAULT 1,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nombre`, `cedula`, `correo`, `clave`, `fecha`, `id_tipo_usuario`, `estado`) VALUES
(77, 'jonathan', 'admin', 'jonathanlopez3020@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-08-13', 1, 1),
(80, 'marcos', '0987654321', 'jonathanlopez3020@hotmail.com', '202cb962ac59075b964b07152d234b70', '2022-10-14', 2, 1),
(89, 'marcos', 'marcos', 'jesua3020@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', '2022-10-21', 3, 1),
(93, 'asdas', '0923833322', 'iosajdisadiasd', 'a8f5f167f44f4964e6c998dee827110c', '2022-10-26', 2, 1),
(96, 'admin', '0923833322', 'jesua3020@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-10-26', 1, 1),
(97, 'admin', '0923833322', 'jose3020@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-10-26', 2, 1),
(99, 'admin', '0923833322', 'jesua3020@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-10-26', 2, 2),
(100, 'admin', '09099333', 'jesua3020@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-10-26', 2, 1),
(102, 'admin', '433', 'jonathanlopez3020@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-10-26', 1, 1),
(104, 'jose', '98238', 'jonathanlopez3020@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-10-26', 1, 1),
(105, 'jose', '98238', 'jose3020@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-10-26', 1, 1),
(106, 'jose', '98238', 'jose3020@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-10-26', 2, 1),
(107, 'jose', '9823322321', 'jonathanlopez3020@gmail.com', 'b4cbf7ebbfe7633a1537cfa054833703', '2022-10-26', 1, 1),
(108, 'admin', '98238', 'jesua3020@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-10-26', 2, 1),
(109, 'admin', '3', 'jose3020@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-10-26', 2, 1),
(111, 'admin', '0928378232', 'jesua3020@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-10-26', 2, 1),
(112, 'admin', '0923833322', 'jonathanlopez3020@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-10-26', 2, 1),
(113, 'admin', '0923833322', 'jesua3020@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-10-27', 2, 1),
(116, 'hola', '0987654321', 'jose3020@gmail.com', '$2y$10$MVHdrCcROpt3CfELyGSDhOV0IpCnGNZtTrFiP2UjlD3', '2022-11-01', 1, 1),
(117, 'admin', '98238', 'jose3020@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-11-03', 1, 1),
(118, 'mracos', '0928764532', 'jose3020@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', '2022-11-07', 2, 1),
(119, 'Steven', '0942274549', 'sr.mindiolaza@gmail.com', 'c0e8d695f50f7c49c553713beb718f68', '2022-11-09', 1, 1),
(120, 'jonathan', '23312213', 'marcaso@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-11-17', 1, 1),
(121, 'sfsdfsf', '3243243', 'marcaso@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-11-17', 2, 0),
(122, 'jonatna ', '09238293823', 'jonathan@gmai.com', '21232f297a57a5a743894a0e4a801fc3', '2022-11-24', 2, 1),
(123, 'marcos', '0934893333', 'jonathanlopez3020@hotmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', '2022-12-03', 2, 1),
(124, 'vivina', 'vivina', 'jesua3020@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', '2023-06-14', 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_asistencia`
--
ALTER TABLE `tb_asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `FK_tb_asistencia_tb_estudiantes` (`id_estudiantes`),
  ADD KEY `FK_tb_asistencia_tb_jornada2` (`id_jornada2`),
  ADD KEY `FK_tb_asistencia_tb_carreras` (`id_carreras`);

--
-- Indices de la tabla `tb_carreras`
--
ALTER TABLE `tb_carreras`
  ADD PRIMARY KEY (`id_carreras`);

--
-- Indices de la tabla `tb_cursos`
--
ALTER TABLE `tb_cursos`
  ADD PRIMARY KEY (`id_cursos`);

--
-- Indices de la tabla `tb_cursos2`
--
ALTER TABLE `tb_cursos2`
  ADD PRIMARY KEY (`id_cursos`);

--
-- Indices de la tabla `tb_estudiantes`
--
ALTER TABLE `tb_estudiantes`
  ADD PRIMARY KEY (`id_estudiantes`),
  ADD KEY `FK_tb_estudiantes_tb_carreras` (`id_carreras`),
  ADD KEY `FK_tb_estudiantes_tb_cursos` (`id_cursos`),
  ADD KEY `FK_tb_estudiantes_tb_paralelos` (`id_paralelos`),
  ADD KEY `FK_tb_estudiantes_tb_jornadas` (`id_jornadas`);

--
-- Indices de la tabla `tb_jornada2`
--
ALTER TABLE `tb_jornada2`
  ADD PRIMARY KEY (`id_jornada2`) USING BTREE;

--
-- Indices de la tabla `tb_jornadas`
--
ALTER TABLE `tb_jornadas`
  ADD PRIMARY KEY (`id_jornadas`);

--
-- Indices de la tabla `tb_paralelos`
--
ALTER TABLE `tb_paralelos`
  ADD PRIMARY KEY (`id_paralelos`);

--
-- Indices de la tabla `tb_tipo_usuario`
--
ALTER TABLE `tb_tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `FK_tb_usuario_tb_tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_asistencia`
--
ALTER TABLE `tb_asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tb_carreras`
--
ALTER TABLE `tb_carreras`
  MODIFY `id_carreras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_cursos`
--
ALTER TABLE `tb_cursos`
  MODIFY `id_cursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_cursos2`
--
ALTER TABLE `tb_cursos2`
  MODIFY `id_cursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_estudiantes`
--
ALTER TABLE `tb_estudiantes`
  MODIFY `id_estudiantes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tb_jornada2`
--
ALTER TABLE `tb_jornada2`
  MODIFY `id_jornada2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_jornadas`
--
ALTER TABLE `tb_jornadas`
  MODIFY `id_jornadas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_usuario`
--
ALTER TABLE `tb_tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_asistencia`
--
ALTER TABLE `tb_asistencia`
  ADD CONSTRAINT `FK_tb_asistencia_tb_carreras` FOREIGN KEY (`id_carreras`) REFERENCES `tb_carreras` (`id_carreras`),
  ADD CONSTRAINT `FK_tb_asistencia_tb_estudiantes` FOREIGN KEY (`id_estudiantes`) REFERENCES `tb_estudiantes` (`id_estudiantes`),
  ADD CONSTRAINT `FK_tb_asistencia_tb_jornada2` FOREIGN KEY (`id_jornada2`) REFERENCES `tb_jornada2` (`id_jornada2`);

--
-- Filtros para la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `FK_tb_usuario_tb_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tb_tipo_usuario` (`id_tipo_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
