--
-- Database: `Intranetpuro`
--

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Insert into para la tabla `roles`

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Superadministrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int  NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido_pat` varchar(100) NOT NULL,
  `apellido_mat` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roles_id` int DEFAULT NULL,
  `nombre_foto` longtext DEFAULT NULL,
  `foto` longtext DEFAULT NULL,
   FOREIGN KEY (roles_id) REFERENCES roles(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Structure for view `serverside_user`
--
DROP TABLE IF EXISTS `serverside_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `serverside_user`  AS SELECT `usuarios`.`id` AS `id`, `usuarios`.`username` AS `username`, `usuarios`.`nombre` AS `usnom`, `usuarios`.`apellido_pat` AS `apellido_pat`, `usuarios`.`apellido_mat` AS `apellido_mat`, `usuarios`.`correo` AS `correo`, `usuarios`.`roles_id` AS `roles_id`, `usuarios`.`foto` AS `foto`, `roles`.`nombre` AS `rolnom` FROM (`usuarios` join `roles` on((`usuarios`.`roles_id` = `usuarios`.`roles_id`)))  ;