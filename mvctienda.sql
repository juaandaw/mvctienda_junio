-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql
-- Tiempo de generación: 10-12-2020 a las 15:04:46
-- Versión del servidor: 5.7.32
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mvctienda`
--
CREATE DATABASE IF NOT EXISTS `mvctienda` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mvctienda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `login_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `status`, `deleted`, `login_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Heriberto', 'heriberto@mail.es', '806cc6e9290ccac7e77a34f545b28fdf3c8a87dab0f144f3885b2411483e433df0a34d9d11355f20b74df86b9bbbe5dd95d4046be9430851b8fbdbc390dc8e54', 1, 0, '2020-12-03 15:17:10', '2020-11-06 20:15:14', '2020-11-12 16:27:07', NULL),
(2, 'María', 'maria@mail.es', '806cc6e9290ccac7e77a34f545b28fdf3c8a87dab0f144f3885b2411483e433df0a34d9d11355f20b74df86b9bbbe5dd95d4046be9430851b8fbdbc390dc8e54', 0, 1, NULL, '2020-11-12 14:54:40', NULL, '2020-11-13 18:16:56'),
(3, 'Ana', 'ana@mail.es', '806cc6e9290ccac7e77a34f545b28fdf3c8a87dab0f144f3885b2411483e433df0a34d9d11355f20b74df86b9bbbe5dd95d4046be9430851b8fbdbc390dc8e54', 1, 1, '2020-11-13 18:19:22', '2020-11-13 18:18:48', NULL, '2020-11-13 18:18:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `send` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carts`
--

INSERT INTO `carts` (`id`, `state`, `user_id`, `product_id`, `quantity`, `discount`, `send`, `date`) VALUES
(4, 1, 5, 3, '1.00', '0.99', '0.00', '2020-12-01 14:38:58'),
(5, 1, 5, 2, '2.00', '1.00', '0.50', '2020-12-03 14:58:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `type`, `value`, `description`) VALUES
(1, 'adminStatus', 0, 'Inactivo'),
(2, 'adminStatus', 1, 'Activo'),
(3, 'productType', 1, 'Curso en línea'),
(4, 'productType', 2, 'Libro'),
(5, 'productStatus', 0, 'Inactivo'),
(6, 'productStatus', 1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `type` char(1) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `send` decimal(10,2) NOT NULL,
  `image` varchar(100) NOT NULL,
  `published` date NOT NULL,
  `relation1` int(11) NOT NULL,
  `relation2` int(11) NOT NULL,
  `relation3` int(11) NOT NULL,
  `mostSold` char(1) NOT NULL,
  `new` char(1) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `author` varchar(200) NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `pages` int(11) NOT NULL,
  `people` text NOT NULL,
  `objetives` text NOT NULL,
  `necesites` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `type`, `name`, `description`, `price`, `discount`, `send`, `image`, `published`, `relation1`, `relation2`, `relation3`, `mostSold`, `new`, `status`, `deleted`, `created_at`, `updated_at`, `deleted_at`, `author`, `publisher`, `pages`, `people`, `objetives`, `necesites`) VALUES
(2, '2', 'El se&ntilde;or de los anillos', '&lt;p&gt;Un &lt;strong&gt;libro&lt;/strong&gt; muy &lt;i&gt;gordo&lt;/i&gt;&lt;/p&gt;', '24.56', '1.00', '0.50', '20150822-mac.jpg', '2020-11-20', 1, 0, 0, '1', '0', 1, 0, '2020-11-20 18:04:48', NULL, NULL, 'JRR Tolkien', 'La suya', 900, '', '', ''),
(3, '1', 'PHP mediante MVC', '&lt;p&gt;Aprender &lt;strong&gt;PHP&lt;/strong&gt; siguiendo el patr&oacute;n &lt;strong&gt;MVC&lt;/strong&gt;&lt;/p&gt;', '9.99', '0.99', '0.00', '20150718-mac.jpg', '2020-11-20', 0, 0, 0, '0', '1', 1, 0, '2020-11-20 18:17:12', NULL, NULL, '', '', 0, 'Todos', 'Aprender PHP', 'POO'),
(5, '2', 'Lo que el viento se llev&oacute;', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&lt;br&gt;tempor incididunt ut labore et dolore magna aliqua. &lt;strong&gt;Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&lt;/strong&gt; Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, &lt;i&gt;sed do eiusmod&lt;/i&gt;&lt;br&gt;&lt;i&gt;tempor incididunt ut labore et dolore magna aliqua.&lt;/i&gt; Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;&lt;ol&gt;&lt;li&gt;punto 1&lt;/li&gt;&lt;li&gt;punto 2&lt;/li&gt;&lt;li&gt;punto 3&lt;/li&gt;&lt;/ol&gt;', '29.99', '1.99', '0.99', '20150704-mac.jpg', '2020-11-24', 2, 0, 0, '1', '0', 1, 0, '2020-11-24 15:02:34', NULL, NULL, 'Ni se sabe', 'Su casa', 1000, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `last_name_1` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `last_name_2` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `address` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `city` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `state` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `zipcode` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `country` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name_1`, `last_name_2`, `email`, `address`, `city`, `state`, `zipcode`, `country`, `password`) VALUES
(1, 'Pepe', 'Pérez', '', 'pepe.perez@mail.es', 'calle', 'mur', 'mu', '30', 'esp', '18d5d5afa89f7cfce991c6b93cb191859061c0e806d8cddc545a107138d0efe5d6494ed49e89f9a57e50aed95c9345aa961b4f94011782243c2545da73d9974d'),
(2, 'Juan', 'Gómez', '', 'juan@mail.es', 'dfghdfgh', 'dfghdfghdf', 'dfghdf', 'fghdf', 'dfghdfgh', '806cc6e9290ccac7e77a34f545b28fdf3c8a87dab0f144f3885b2411483e433df0a34d9d11355f20b74df86b9bbbe5dd95d4046be9430851b8fbdbc390dc8e54'),
(3, 'Carlos', 'Martínez', 'Giménez', 'carlos@mail.es', 'c/ Picasso', 'Barcelona', 'Barcelona', '08008', 'España', '806cc6e9290ccac7e77a34f545b28fdf3c8a87dab0f144f3885b2411483e433df0a34d9d11355f20b74df86b9bbbe5dd95d4046be9430851b8fbdbc390dc8e54'),
(5, 'Antonio', 'Antunez', '', 'antonio@mail.es', 'c/ La gloria', 'Murcia', 'Murcia', '30001', 'España', '806cc6e9290ccac7e77a34f545b28fdf3c8a87dab0f144f3885b2411483e433df0a34d9d11355f20b74df86b9bbbe5dd95d4046be9430851b8fbdbc390dc8e54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
