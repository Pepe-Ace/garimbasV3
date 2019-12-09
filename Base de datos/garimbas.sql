-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2019 a las 21:01:16
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `garimbas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beer`
--

CREATE TABLE `beer` (
  `id_beer` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `pais` varchar(40) NOT NULL,
  `estilo` varchar(40) NOT NULL,
  `color` varchar(40) NOT NULL,
  `alcohol` varchar(40) NOT NULL,
  `cantidad` varchar(40) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `precio` float NOT NULL,
  `mostrar` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `beer`
--

INSERT INTO `beer` (`id_beer`, `nombre`, `pais`, `estilo`, `color`, `alcohol`, `cantidad`, `foto`, `precio`, `mostrar`) VALUES
(1, 'Blue Moon Belgian White', 'USA', 'Trigo Belga', 'Naranja', '5.4', '33.5', 'img/13d9055e4de5ca0df3af3aa46daf9fff.jpg', 4.5, 's'),
(2, 'Brew Dog Tokyo Stouth', 'Escocia', 'Stout', 'Negro', '18.2', '33', 'img/4673413f161a559d837c8f2ea7277559.jpg', 5.5, 's'),
(3, 'Chimay Azul', 'Belgica', 'Abadia Trapense', 'Marron Oscuro', '9.0', '33', 'img/9a14d9692d9c309d554e80b5fcf16e1d.jpg', 4, 's'),
(4, 'Delirium Tremens', 'Belgica', 'Ale', 'Dorado', '8.5', '33', 'img/d66c2298997b388c28384dbbee371d1f.jpg', 6.5, 's'),
(5, 'Gulden Draak', 'Belgica', 'Ale', 'Castaño', '10.5', '75', 'img/95992aad9479fec477465d86ef9ea205.png', 11.5, 'n'),
(6, 'Hertog Jan Dubbel', 'Holanda', 'Abadia', 'Marron Oscuro', '7.3', '50', 'img/aedfa1aba25552c126e1b71c7c1f3302.jpg', 10.5, 's'),
(7, 'Triple Karmeliet', 'Belgica', 'Ale', 'Dorado', '8', '33', 'img/9e8880f50b94ba9ffeb5e61b8a6fc95b.png', 5.5, 's'),
(8, 'Kasteel Donker', 'Belgica', 'Ale Fuerte', 'Marron Oscuro', '11', '33', 'img/a8581f9a3f6de73faff609e553846d7e.jpg', 4.5, 's'),
(9, 'kwak', 'Belgica', 'Ale', 'Marron Oscuro', '11', '33', 'img/41ae620562c04cc356ac5d9bd2018bfc.png', 4.5, 's'),
(10, 'La Guillotine', 'Belgica', 'Ale', 'Dorado', '9', '33', 'img/13b3e819ef90823d7b7b99cb9668443f.jpg', 5.5, 'n'),
(11, 'O`Hara`s Lean Follain', 'Irlanda', 'Stout', 'Marron Oscuro', '6', '50', 'img/c0e73c3a929dc477f96d8f03c808a3ec.jpg', 6.5, 's'),
(12, 'Rochefort 10', 'Belgica', 'Abadia Trapense', 'Marron Oscuro', '11.3', '33', 'img/3f3894913e7381889fcee963442a6851.jpg', 6, 's'),
(13, 'Samichlaus Barrique Barley Wine', 'Austria', 'Barley Wine', 'Marron Rojizo', '14', '33', 'img/9664243699b23601e84287adbc6b3743.jpg', 8.5, 's'),
(14, 'Samuel Adams Boston Lager', 'Boston USA', 'Lager', 'Ambar', '4.8', '35.5', 'img/afd0de8f730e6c62f2605dfa260efe8a.jpg', 3.5, 's'),
(15, 'Two Chefs Howling Wolf', 'Holanda', 'Porter Imperial', 'Marron Oscuro', '8', '33', 'img/a838f53d88768c170b09c6526871fdf9.jpg', 5.5, 's'),
(16, 'Waterloo Triple 7 Blonde', 'Belgica', 'Abadia', 'Dorado', '7.5', '33', 'img/27e7d607fc724542cc5bb6a30874e288.jpg', 4.5, 's'),
(17, 'Estrella de Galicia', 'Galicia (España)', 'Lager', 'Dorado', '5.6', '33', 'img/678318948e37818b4ab5e163af642c3a.jpg', 2.5, 'n'),
(18, 'Belzebuth Triple', 'Francia', 'Ale Fuerte', 'Dorado', '13', '33', 'img/cf68ea62fd0ecfb1bd9b5e8b51c19f61.jpg', 3.5, 's'),
(19, 'Biere du Demon', 'Francia', 'Ale Fuerte', 'Dorado', '12', '33', 'img/5a34015609961fe36a5dcded32081ebe.jpg', 5, 's'),
(20, 'Birra del Borgo Ducale', 'Italia', 'Ale', 'Rubí Oscuro', '8.5', '75', 'img/291192ce468f9bf838b91a72af508803.jpg', 16, 's'),
(21, 'Camerons Rye Pale Ale', 'Canadá', 'Pale Ale Esp. Grano', 'Ambar', '6.5', '34.1', 'img/719092cf0d56175c606ae7440e403bb7.jpg', 5.5, 's'),
(22, 'Eggenberg Urbock 23', 'Austria', 'Bock', 'Dorado', '23', '33', 'img/4a1513bac8e644bcbe062072d5922409.jpg', 5.5, 's'),
(23, 'Franziskaner Hefe Weissbier', 'Alemania', 'Trigo', 'Ambar', '5', '50', 'img/3bfe26844a64c70a1425d7cc21c30a12.jpg', 5, 's'),
(24, 'Piraat', 'Belgica', 'Ale Fuerte', 'Dorado Anaranjado', '10.5', '33', 'img/9a747c4a90ca18f652cf0d73f5c2645b.jpg', 4.5, 's'),
(25, 'Super Bock', 'Portugal', 'Pilsener', 'Dorado', '5.2', '33', 'img/a06a7591021bb8c703cede35a77a39bf.jpg', 2.5, 'n'),
(26, 'Super Bock Stout', 'Portugal', 'Stout', 'Negro', '5', '33', 'img/78f048bc3c9d3348db08da8f6b17d5c2.jpg', 3, 's'),
(27, 'Super Bock Abadia', 'Portugal', 'Abadia Belga', 'Cobre', '6.4', '33', 'img/4114a69e42930f7cba49bcc109c1c731.jpg', 3.5, 's'),
(28, 'Foster`s Lager', 'Australia', 'Lager', 'Dorado Brillante', '5', '33', 'img/4ea1fff32b4dc8c90be8cb7bdd53b855.jpg', 3.5, 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `titulo` varchar(60) NOT NULL,
  `et_1` varchar(12) NOT NULL,
  `et_2` varchar(12) NOT NULL,
  `et_3` varchar(12) NOT NULL,
  `et_4` varchar(5) NOT NULL,
  `et_5` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`titulo`, `et_1`, `et_2`, `et_3`, `et_4`, `et_5`) VALUES
('BierGarten - Cervezas de la Semana', 'País', 'Estilo', 'Color', '%Alc.', 'Cant');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `n_us` varchar(20) NOT NULL,
  `p_us` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`n_us`, `p_us`) VALUES
('pepe', '9834');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `beer`
--
ALTER TABLE `beer`
  ADD PRIMARY KEY (`id_beer`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`titulo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`n_us`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `beer`
--
ALTER TABLE `beer`
  MODIFY `id_beer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
