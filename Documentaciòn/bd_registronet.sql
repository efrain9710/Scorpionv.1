-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2017 a las 21:54:17
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_registronet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_empresa`
--

CREATE TABLE `tb_empresa` (
  `id_empresa` int(11) NOT NULL,
  `nom_empresa` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `telefono` int(10) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `url_logo_empresa` varchar(50) NOT NULL,
  `id_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_empresa`
--

INSERT INTO `tb_empresa` (`id_empresa`, `nom_empresa`, `descripcion`, `telefono`, `correo`, `direccion`, `url_logo_empresa`, `id_usuarios`) VALUES
(1, 'foen soft', 'desarrollo de software', 2147483647, 'foensoft@gmail.com', 'barrio divino niÃ±o', 'foen_soft.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_log`
--

CREATE TABLE `tb_log` (
  `id_log` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `informacion` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_personal`
--

CREATE TABLE `tb_personal` (
  `num_doc` varchar(13) NOT NULL,
  `nom_per` varchar(20) NOT NULL,
  `apl_per` varchar(20) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `id_tip_usu` int(11) NOT NULL,
  `cod_barra` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_personal`
--

INSERT INTO `tb_personal` (`num_doc`, `nom_per`, `apl_per`, `correo`, `id_tip_usu`, `cod_barra`) VALUES
('1120580671', 'Daniela', 'Gomez CastaÃ±o', 'dani0422@gmail.com', 5, '1120580717005'),
('1120580717', 'Efrain Alfonso', 'Gomez CastaÃ±o', 'efra100597@gmail.com', 1, '1120580717002'),
('97051006066', 'Alfonso', 'Gomez Castellanos', 'alfon9705@gmail.com', 4, '9705100606602');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_registro`
--

CREATE TABLE `tb_registro` (
  `id_registro` int(11) NOT NULL,
  `num_doc` varchar(13) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL,
  `observacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_registro`
--

INSERT INTO `tb_registro` (`id_registro`, `num_doc`, `fecha_ingreso`, `fecha_salida`, `observacion`) VALUES
(1, '97051006066', '2017-08-23 18:30:31', '2017-08-23 22:58:19', 'prueba22'),
(2, '97051006066', '2017-08-23 18:34:03', '2017-08-23 22:58:19', 'prueba22'),
(3, '97051006066', '2017-08-23 18:35:22', '2017-08-23 22:58:19', 'prueba22'),
(4, '97051006066', '2017-08-23 18:46:49', '2017-08-23 22:58:19', 'prueba22'),
(5, '97051006066', '2017-08-23 19:10:34', '2017-08-23 22:58:19', 'lleva un tablero y cinco computadores portatiles'),
(6, '97051006066', '2017-08-23 19:15:51', '2017-08-23 22:58:19', 'llega tarde al ambiente'),
(7, '97051006066', '2017-08-23 20:18:35', '2017-08-23 22:58:19', 'va asia el ambienrte 2'),
(8, '97051006066', '2017-08-23 22:57:38', '2017-08-23 22:58:19', 'llega tarde por mal tiempo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tip_usuarios`
--

CREATE TABLE `tb_tip_usuarios` (
  `id_tip_usu` int(11) NOT NULL,
  `tip_usu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_tip_usuarios`
--

INSERT INTO `tb_tip_usuarios` (`id_tip_usu`, `tip_usu`) VALUES
(1, 'administrador'),
(2, 'instructor'),
(3, 'administrativo'),
(4, 'Aprendiz'),
(5, 'Visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `num_doc_usu` int(13) NOT NULL,
  `nom_usu` varchar(20) NOT NULL,
  `apl_usu` varchar(20) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `id_tip_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuarios`, `num_doc_usu`, `nom_usu`, `apl_usu`, `correo`, `clave`, `id_tip_usu`) VALUES
(1, 1120580717, 'Efrain Alfonso', 'Gomez Castaño', 'efra100597@gmail.com', 'efra9710', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `tb_personal`
--
ALTER TABLE `tb_personal`
  ADD PRIMARY KEY (`num_doc`);

--
-- Indices de la tabla `tb_registro`
--
ALTER TABLE `tb_registro`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `tb_tip_usuarios`
--
ALTER TABLE `tb_tip_usuarios`
  ADD PRIMARY KEY (`id_tip_usu`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb_registro`
--
ALTER TABLE `tb_registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tb_tip_usuarios`
--
ALTER TABLE `tb_tip_usuarios`
  MODIFY `id_tip_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
