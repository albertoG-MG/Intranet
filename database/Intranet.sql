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
  `username` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `apellido_pat` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `apellido_mat` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `roles_id` int NOT NULL,
  `foto` longtext COLLATE latin1_spanish_ci DEFAULT NULL,
   FOREIGN KEY (roles_id) REFERENCES roles(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------