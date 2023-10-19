--
-- Database: `Intranetpuro`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=CURRENT_USER FUNCTION `sessionid` () RETURNS INT DETERMINISTIC RETURN @var$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Insert into para la tabla `roles`

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Superadministrador'),
(2, 'Administrador'),
(3, 'Director general'),
(4, 'Director'),
(5, 'Gerente'),
(6, 'Empleado'),
(7, 'Supervisor'),
(8, 'Tecnico'),
(9, 'Usuario externo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jerarquia`
--

CREATE TABLE `jerarquia`(
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `rol_id` int NOT NULL,
  `jerarquia_id` int DEFAULT NULL,
   FOREIGN KEY (rol_id) REFERENCES roles(id) ON DELETE CASCADE,
   FOREIGN KEY (jerarquia_id) REFERENCES jerarquia(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Insert into para la tabla `jerarquia`

INSERT INTO `jerarquia` (`id`, `rol_id`, `jerarquia_id`) VALUES
(1, 3, NULL),
(2, 4, 1),
(3, 5, 2),
(4, 6, 3),
(5, 7, 3),
(6, 8 ,3);

-- --------------------------------------------------------

--
-- Estructura para la vista `subroles`
--

CREATE TABLE `subroles` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `roles_id` int NOT NULL,
  `subrol_nombre` varchar(100) NOT NULL,
  FOREIGN KEY (roles_id) REFERENCES roles(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Insert into para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Usuarios'),
(2, 'Expedientes'),
(3, 'Roles'),
(4, 'Permisos'),
(5, 'Departamentos'),
(6, 'Incidencias'),
(7, 'Solicitud incidencias'),
(8, 'Vacaciones'),
(9, 'Solicitud vacaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
`id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
`nombre` varchar(100) NOT NULL UNIQUE,
`categoria_id` int DEFAULT NULL,
FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Insert into para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`, `categoria_id`) VALUES
(1, 'Acceso a usuarios', 1),
(2, 'Vista tecnico', 1),
(3, 'Crear usuario', 1),
(4, 'Ver usuario', 1),
(5, 'Editar usuario', 1),
(6, 'Eliminar usuario', 1),
(7, 'Acceso a expedientes', 2),
(8, 'Crear expediente', 2),
(9, 'Ver expediente', 2),
(10, 'Editar expediente', 2),
(11, 'Eliminar expediente', 2),
(12, 'Exportar reporte de empleados', 2),
(13, 'Administrar tokens a expedientes', 2),
(14, 'Acceso a roles', 3),
(15, 'Crear roles', 3),
(16, 'Editar roles', 3),
(17, 'Eliminar roles', 3),
(18, 'Acceso a permisos', 4),
(19, 'Crear permiso', 4),
(20, 'Editar permiso', 4),
(21, 'Eliminar permiso', 4),
(22, 'Acceso a departamentos', 5),
(23, 'Crear departamento', 5),
(24, 'Editar departamento', 5),
(25, 'Eliminar departamento', 5),
(26, 'Acceso a incidencias', 6),
(27, 'Crear incidencia', 6),
(28, 'Ver incidencia', 6),
(29, 'Acceso a acta administrativa', 6),
(30, 'Acceso a carta compromiso', 6),
(31, 'Crear acta administrativa', 6),
(32, 'Crear carta compromiso', 6),
(33, 'Ver todas las incidencias', 6),
(34, 'Ver todos los documentos administrativos', 6),
(35, 'Editar estatus de las incidencias', 6),
(36, 'Acceso a solicitud incidencias', 7),
(37, 'Acceso a vacaciones', 8),
(38, 'Ver todas las vacaciones', 8),
(39, 'Acceso al historial de vacaciones', 8),
(40, 'Editar estatus de las vacaciones', 8),
(41, 'Acceso a solicitud vacaciones', 9);

-- --------------------------------------------------------

--
-- Table structure for table `rolesxcategorias`
--

CREATE TABLE `rolesxcategorias` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `roles_id` int NOT NULL,
  `categorias_id` int NOT NULL,
  FOREIGN KEY (roles_id) REFERENCES roles(id) ON DELETE CASCADE,
  FOREIGN KEY (categorias_id) REFERENCES categorias(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subrolesxpermisos`
--

CREATE TABLE `subrolesxpermisos` (
`id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
`subroles_id` int NOT NULL,
`permisos_id` int NOT NULL,
 FOREIGN KEY (subroles_id) REFERENCES subroles(id) ON DELETE CASCADE,
 FOREIGN KEY (permisos_id) REFERENCES permisos(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolesxpermisos`
--

CREATE TABLE `rolesxpermisos` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `roles_id` int NOT NULL,
  `permisos_id` int NOT NULL,
  FOREIGN KEY (roles_id) REFERENCES roles(id) ON DELETE CASCADE,
  FOREIGN KEY (permisos_id) REFERENCES permisos(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `departamento` varchar(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Insert into para la tabla departamentos
--

INSERT INTO `departamentos` (`id`, `departamento`) VALUES
(1, 'Soporte tecnico'),
(2, 'Capital humano'),
(3, 'Finanzas'),
(4, 'Call center'),
(5, 'Laboratorio'),
(6, 'Almacen'),
(7, 'Operaciones'),
(8, 'TI'),
(9, 'Ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int  NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(30) NOT NULL UNIQUE,
  `nombre` varchar(100) NOT NULL,
  `apellido_pat` varchar(100) NOT NULL,
  `apellido_mat` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL UNIQUE,
  `password` varchar(100) NOT NULL,
  `departamento_id` int DEFAULT NULL,
  `roles_id` int DEFAULT NULL,
  `subrol_id` int DEFAULT NULL,
  `nombre_foto` longtext DEFAULT NULL,
  `foto_identificador` longtext DEFAULT NULL,
   FOREIGN KEY (departamento_id) REFERENCES departamentos(id) ON DELETE SET NULL,
   FOREIGN KEY (roles_id) REFERENCES roles(id) ON DELETE SET NULL,
   FOREIGN KEY (subrol_id) REFERENCES subroles(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE `estados` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`id`, `nombre`) VALUES
(1, 'AGUASCALIENTES'),
(2, 'BAJA CALIFORNIA NORTE'),
(3, 'BAJA CALIFORNIA SUR'),
(4, 'CAMPECHE'),
(5, 'CHIAPAS'),
(6, 'CHIHUAHUA'),
(7, 'CIUDAD DE MÉXICO'),
(8, 'COAHUILA DE ZARAGOZA'),
(9, 'COLIMA'),
(10, 'DURANGO'),
(11, 'ESTADO DE MÉXICO'),
(12, 'GUANAJUATO'),
(13, 'GUERRERO'),
(14, 'HIDALGO'),
(15, 'JALISCO'),
(16, 'MICHOACÁN DE OCAMPO'),
(17, 'MORELOS'),
(18, 'NAYARIT'),
(19, 'NUEVO LEÓN'),
(20, 'OAXACA'),
(21, 'PUEBLA'),
(22, 'QUERÉTARO'),
(23, 'QUINTANAROO'),
(24, 'SAN LUIS POTOSÍ'),
(25, 'SIN LOCALIDAD'),
(26, 'SINALOA'),
(27, 'SONORA'),
(28, 'TABASCO'),
(29, 'TAMAULIPAS'),
(30, 'TLAXCALA'),
(31, 'VERACRUZ DE IGNACIO DE LA LLAVE'),
(32, 'ZACATECAS'),
(33, 'YUCATAN');

-- --------------------------------------------------------

--
-- Table structure for table `municipios`
--

CREATE TABLE `municipios` (
  `Id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `estado` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
   FOREIGN KEY (estado) REFERENCES estados(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Dumping data for table `municipios`
--

INSERT INTO `municipios` (`Id`, `estado`, `nombre`, `clave`) VALUES
(33, 1, 'AGUASCALIENTES', ''),
(34, 1, 'ASIENTOS', ''),
(35, 1, 'CALVILLO', ''),
(36, 1, 'COSÍO', ''),
(37, 1, 'JESÚS MARÍA', ''),
(38, 1, 'PABELLÓN DE ARTEAGA', ''),
(39, 1, 'RINCÓN DE ROMOS', ''),
(40, 1, 'SAN JOSÉ DE GRACIA', ''),
(41, 1, 'TEPEZALÁ', ''),
(42, 1, 'EL LLANO', ''),
(43, 1, 'SAN FRANCISCO DE LOS ROMO', ''),
(44, 2, 'ENSENADA', ''),
(45, 2, 'MEXICALI', ''),
(46, 2, 'TECATE', ''),
(47, 2, 'TIJUANA', ''),
(48, 2, 'PLAYAS DE ROSARITO', ''),
(49, 3, 'COMONDÚ', ''),
(50, 3, 'MULEGÉ', ''),
(51, 3, 'LA PAZ', ''),
(52, 3, 'LOS CABOS', ''),
(53, 3, 'LORETO', ''),
(54, 4, 'CALKINÍ', ''),
(55, 4, 'CAMPECHE', ''),
(56, 4, 'CARMEN', ''),
(57, 4, 'CHAMPOTÓN', ''),
(58, 4, 'HECELCHAKÁN', ''),
(59, 4, 'HOPELCHÉN', ''),
(60, 4, 'PALIZADA', ''),
(61, 4, 'TENABO', ''),
(62, 4, 'ESCÁRCEGA', ''),
(63, 4, 'CALAKMUL', ''),
(64, 5, 'ACACOYAGUA', ''),
(65, 5, 'ACALA', ''),
(66, 5, 'ACAPETAHUA', ''),
(67, 5, 'ALTAMIRANO', ''),
(68, 5, 'AMATÁN', ''),
(69, 5, 'AMATENANGO DE LA FRONTERA', ''),
(70, 5, 'AMATENANGO DEL VALLE', ''),
(71, 5, 'ANGEL ALBINO CORZO', ''),
(72, 5, 'ARRIAGA', ''),
(73, 5, 'BEJUCAL DE OCAMPO', ''),
(74, 5, 'BELLA VISTA', ''),
(75, 5, 'BERRIOZÁBAL', ''),
(76, 5, 'BOCHIL', ''),
(77, 5, 'EL BOSQUE', ''),
(78, 5, 'CACAHOATÁN', ''),
(79, 5, 'CATAZAJÁ', ''),
(80, 5, 'CINTALAPA', ''),
(81, 5, 'COAPILLA', ''),
(82, 5, 'COMITÁN DE DOMÍNGUEZ', ''),
(83, 5, 'LA CONCORDIA', ''),
(84, 5, 'COPAINALÁ', ''),
(85, 5, 'CHALCHIHUITÁN', ''),
(86, 5, 'CHAMULA', ''),
(87, 5, 'CHANAL', ''),
(88, 5, 'CHAPULTENANGO', ''),
(89, 5, 'CHENALHÓ', ''),
(90, 5, 'CHIAPA DE CORZO', ''),
(91, 5, 'CHIAPILLA', ''),
(92, 5, 'CHICOASÉN', ''),
(93, 5, 'CHICOMUSELO', ''),
(94, 5, 'CHILÓN', ''),
(95, 5, 'ESCUINTLA', ''),
(96, 5, 'FRANCISCO LEÓN', ''),
(97, 5, 'FRONTERA COMALAPA', ''),
(98, 5, 'FRONTERA HIDALGO', ''),
(99, 5, 'LA GRANDEZA', ''),
(100, 5, 'HUEHUETÁN', ''),
(101, 5, 'HUIXTÁN', ''),
(102, 5, 'HUITIUPÁN', ''),
(103, 5, 'HUIXTLA', ''),
(104, 5, 'LA INDEPENDENCIA', ''),
(105, 5, 'IXHUATÁN', ''),
(106, 5, 'IXTACOMITÁN', ''),
(107, 5, 'IXTAPA', ''),
(108, 5, 'IXTAPANGAJOYA', ''),
(109, 5, 'JIQUIPILAS', ''),
(110, 5, 'JITOTOL', ''),
(111, 5, 'JUÁREZ', ''),
(112, 5, 'LARRÁINZAR', ''),
(113, 5, 'LA LIBERTAD', ''),
(114, 5, 'MAPASTEPEC', ''),
(115, 5, 'LAS MARGARITAS', ''),
(116, 5, 'MAZAPA DE MADERO', ''),
(117, 5, 'MAZATÁN', ''),
(118, 5, 'METAPA', ''),
(119, 5, 'MITONTIC', ''),
(120, 5, 'MOTOZINTLA', ''),
(121, 5, 'NICOLÁS RUÍZ', ''),
(122, 5, 'OCOSINGO', ''),
(123, 5, 'OCOTEPEC', ''),
(124, 5, 'OCOZOCOAUTLA DE ESPINOSA', ''),
(125, 5, 'OSTUACÁN', ''),
(126, 5, 'OSUMACINTA', ''),
(127, 5, 'OXCHUC', ''),
(128, 5, 'PALENQUE', ''),
(129, 5, 'PANTELHÓ', ''),
(130, 5, 'PANTEPEC', ''),
(131, 5, 'PICHUCALCO', ''),
(132, 5, 'PIJIJIAPAN', ''),
(133, 5, 'EL PORVENIR', ''),
(134, 5, 'VILLA COMALTITLÁN', ''),
(135, 5, 'PUEBLO NUEVO SOLISTAHUACÁN', ''),
(136, 5, 'RAYÓN', ''),
(137, 5, 'REFORMA', ''),
(138, 5, 'LAS ROSAS', ''),
(139, 5, 'SABANILLA', ''),
(140, 5, 'SALTO DE AGUA', ''),
(141, 5, 'SAN CRISTÓBAL DE LAS CASAS', ''),
(142, 5, 'SAN FERNANDO', ''),
(143, 5, 'SILTEPEC', ''),
(144, 5, 'SIMOJOVEL', ''),
(145, 5, 'SITALÁ', ''),
(146, 5, 'SOCOLTENANGO', ''),
(147, 5, 'SOLOSUCHIAPA', ''),
(148, 5, 'SOYALÓ', ''),
(149, 5, 'SUCHIAPA', ''),
(150, 5, 'SUCHIATE', ''),
(151, 5, 'SUNUAPA', ''),
(152, 5, 'TAPACHULA', ''),
(153, 5, 'TAPALAPA', ''),
(154, 5, 'TAPILULA', ''),
(155, 5, 'TECPATÁN', ''),
(156, 5, 'TENEJAPA', ''),
(157, 5, 'TEOPISCA', ''),
(158, 5, 'TILA', ''),
(159, 5, 'TONALÁ', ''),
(160, 5, 'TOTOLAPA', ''),
(161, 5, 'LA TRINITARIA', ''),
(162, 5, 'TUMBALÁ', ''),
(163, 5, 'TUXTLA GUTIÉRREZ', ''),
(164, 5, 'TUXTLA CHICO', ''),
(165, 5, 'TUZANTÁN', ''),
(166, 5, 'TZIMOL', ''),
(167, 5, 'UNIÓN JUÁREZ', ''),
(168, 5, 'VENUSTIANO CARRANZA', ''),
(169, 5, 'VILLA CORZO', ''),
(170, 5, 'VILLAFLORES', ''),
(171, 5, 'YAJALÓN', ''),
(172, 5, 'SAN LUCAS', ''),
(173, 5, 'ZINACANTÁN', ''),
(174, 5, 'SAN JUAN CANCUC', ''),
(175, 5, 'ALDAMA', ''),
(176, 5, 'BENEMÉRITO DE LAS AMÉRICAS', ''),
(177, 5, 'MARAVILLA TENEJAPA', ''),
(178, 5, 'MARQUÉS DE COMILLAS', ''),
(179, 5, 'MONTECRISTO DE GUERRERO', ''),
(180, 5, 'SAN ANDRÉS DURAZNAL', ''),
(181, 5, 'SANTIAGO EL PINAR', ''),
(182, 6, 'AHUMADA', ''),
(183, 6, 'ALDAMA', ''),
(184, 6, 'ALLENDE', ''),
(185, 6, 'AQUILES SERDÁN', ''),
(186, 6, 'ASCENSIÓN', ''),
(187, 6, 'BACHÍNIVA', ''),
(188, 6, 'BALLEZA', ''),
(189, 6, 'BATOPILAS', ''),
(190, 6, 'BOCOYNA', ''),
(191, 6, 'BUENAVENTURA', ''),
(192, 6, 'CAMARGO', ''),
(193, 6, 'CARICHÍ', ''),
(194, 6, 'CASAS GRANDES', ''),
(195, 6, 'CORONADO', ''),
(196, 6, 'COYAME DEL SOTOL', ''),
(197, 6, 'LA CRUZ', ''),
(198, 6, 'CUAUHTÉMOC', ''),
(199, 6, 'CUSIHUIRIACHI', ''),
(200, 6, 'CHIHUAHUA', ''),
(201, 6, 'CHÍNIPAS', ''),
(202, 6, 'DELICIAS', ''),
(203, 6, 'DR. BELISARIO DOMÍNGUEZ', ''),
(204, 6, 'GALEANA', ''),
(205, 6, 'SANTA ISABEL', ''),
(206, 6, 'GÓMEZ FARÍAS', ''),
(207, 6, 'GRAN MORELOS', ''),
(208, 6, 'GUACHOCHI', ''),
(209, 6, 'GUADALUPE', ''),
(210, 6, 'GUADALUPE Y CALVO', ''),
(211, 6, 'GUAZAPARES', ''),
(212, 6, 'GUERRERO', ''),
(213, 6, 'HIDALGO DEL PARRAL', ''),
(214, 6, 'HUEJOTITÁN', ''),
(215, 6, 'IGNACIO ZARAGOZA', ''),
(216, 6, 'JANOS', ''),
(217, 6, 'JIMÉNEZ', ''),
(218, 6, 'JUÁREZ', ''),
(219, 6, 'JULIMES', ''),
(220, 6, 'LÓPEZ', ''),
(221, 6, 'MADERA', ''),
(222, 6, 'MAGUARICHI', ''),
(223, 6, 'MANUEL BENAVIDES', ''),
(224, 6, 'MATACHÍ', ''),
(225, 6, 'MATAMOROS', ''),
(226, 6, 'MEOQUI', ''),
(227, 6, 'MORELOS', ''),
(228, 6, 'MORIS', ''),
(229, 6, 'NAMIQUIPA', ''),
(230, 6, 'NONOAVA', ''),
(231, 6, 'NUEVO CASAS GRANDES', ''),
(232, 6, 'OCAMPO', ''),
(233, 6, 'OJINAGA', ''),
(234, 6, 'PRAXEDIS G. GUERRERO', ''),
(235, 6, 'RIVA PALACIO', ''),
(236, 6, 'ROSALES', ''),
(237, 6, 'ROSARIO', ''),
(238, 6, 'SAN FRANCISCO DE BORJA', ''),
(239, 6, 'SAN FRANCISCO DE CONCHOS', ''),
(240, 6, 'SAN FRANCISCO DEL ORO', ''),
(241, 6, 'SANTA BÁRBARA', ''),
(242, 6, 'SATEVÓ', ''),
(243, 6, 'SAUCILLO', ''),
(244, 6, 'TEMÓSACHIC', ''),
(245, 6, 'EL TULE', ''),
(246, 6, 'URIQUE', ''),
(247, 6, 'URUACHI', ''),
(248, 6, 'VALLE DE ZARAGOZA', ''),
(249, 7, 'AZCAPOTZALCO', ''),
(250, 7, 'COYOACÁN', ''),
(251, 7, 'CUAJIMALPA DE MORELOS', ''),
(252, 7, 'GUSTAVO A. MADERO', ''),
(253, 7, 'IZTACALCO', ''),
(254, 7, 'IZTAPALAPA', ''),
(255, 7, 'LA MAGDALENA CONTRERAS', ''),
(256, 7, 'MILPA ALTA', ''),
(257, 7, 'ÁLVARO OBREGÓN', ''),
(258, 7, 'TLÁHUAC', ''),
(259, 7, 'TLALPAN', ''),
(260, 7, 'XOCHIMILCO', ''),
(261, 7, 'BENITO JUÁREZ', ''),
(262, 7, 'CUAUHTÉMOC', ''),
(263, 7, 'MIGUEL HIDALGO', ''),
(264, 7, 'VENUSTIANO CARRANZA', ''),
(265, 8, 'ABASOLO', ''),
(266, 8, 'ACUÑA', ''),
(267, 8, 'ALLENDE', ''),
(268, 8, 'ARTEAGA', ''),
(269, 8, 'CANDELA', ''),
(270, 8, 'CASTAÑOS', ''),
(271, 8, 'CUATRO CIÉNEGAS', ''),
(272, 8, 'ESCOBEDO', ''),
(273, 8, 'FRANCISCO I. MADERO', ''),
(274, 8, 'FRONTERA', ''),
(275, 8, 'GENERAL CEPEDA', ''),
(276, 8, 'GUERRERO', ''),
(277, 8, 'HIDALGO', ''),
(278, 8, 'JIMÉNEZ', ''),
(279, 8, 'JUÁREZ', ''),
(280, 8, 'LAMADRID', ''),
(281, 8, 'MATAMOROS', ''),
(282, 8, 'MONCLOVA', ''),
(283, 8, 'MORELOS', ''),
(284, 8, 'MÚZQUIZ', ''),
(285, 8, 'NADADORES', ''),
(286, 8, 'NAVA', ''),
(287, 8, 'OCAMPO', ''),
(288, 8, 'PARRAS', ''),
(289, 8, 'PIEDRAS NEGRAS', ''),
(290, 8, 'PROGRESO', ''),
(291, 8, 'RAMOS ARIZPE', ''),
(292, 8, 'SABINAS', ''),
(293, 8, 'SACRAMENTO', ''),
(294, 8, 'SALTILLO', ''),
(295, 8, 'SAN BUENAVENTURA', ''),
(296, 8, 'SAN JUAN DE SABINAS', ''),
(297, 8, 'SAN PEDRO', ''),
(298, 8, 'SIERRA MOJADA', ''),
(299, 8, 'TORREÓN', ''),
(300, 8, 'VIESCA', ''),
(301, 8, 'VILLA UNIÓN', ''),
(302, 8, 'ZARAGOZA', ''),
(303, 9, 'ARMERÍA', ''),
(304, 10, 'CANATLÁN', ''),
(305, 10, 'CANELAS', ''),
(306, 10, 'CONETO DE COMONFORT', ''),
(307, 10, 'CUENCAMÉ', ''),
(308, 10, 'DURANGO', ''),
(309, 10, 'GENERAL SIMÓN BOLÍVAR', ''),
(310, 10, 'GÓMEZ PALACIO', ''),
(311, 10, 'GUADALUPE VICTORIA', ''),
(312, 10, 'GUANACEVÍ', ''),
(313, 10, 'HIDALGO', ''),
(314, 10, 'INDÉ', ''),
(315, 10, 'LERDO', ''),
(316, 10, 'MAPIMÍ', ''),
(317, 10, 'MEZQUITAL', ''),
(318, 10, 'NAZAS', ''),
(319, 10, 'NOMBRE DE DIOS', ''),
(320, 10, 'OCAMPO', ''),
(321, 10, 'EL ORO', ''),
(322, 10, 'OTÁEZ', ''),
(323, 10, 'PÁNUCO DE CORONADO', ''),
(324, 10, 'PEÑÓN BLANCO', ''),
(325, 10, 'POANAS', ''),
(326, 10, 'PUEBLO NUEVO', ''),
(327, 10, 'RODEO', ''),
(328, 10, 'SAN BERNARDO', ''),
(329, 10, 'SAN DIMAS', ''),
(330, 10, 'SAN JUAN DE GUADALUPE', ''),
(331, 10, 'SAN JUAN DEL RÍO', ''),
(332, 10, 'SAN LUIS DEL CORDERO', ''),
(333, 10, 'SAN PEDRO DEL GALLO', ''),
(334, 10, 'SANTA CLARA', ''),
(335, 10, 'SANTIAGO PAPASQUIARO', ''),
(336, 10, 'SÚCHIL', ''),
(337, 10, 'TAMAZULA', ''),
(338, 10, 'TEPEHUANES', ''),
(339, 10, 'TLAHUALILO', ''),
(340, 10, 'TOPIA', ''),
(341, 10, 'VICENTE GUERRERO', ''),
(342, 10, 'NUEVO IDEAL', ''),
(343, 11, 'ACAMBAY DE RUÍZ CASTAÑEDA', ''),
(344, 11, 'ACOLMAN', ''),
(345, 11, 'ACULCO', ''),
(346, 11, 'ALMOLOYA DE ALQUISIRAS', ''),
(347, 11, 'ALMOLOYA DE JUÁREZ', ''),
(348, 11, 'ALMOLOYA DEL RÍO', ''),
(349, 11, 'AMANALCO', ''),
(350, 11, 'AMATEPEC', ''),
(351, 11, 'AMECAMECA', ''),
(352, 11, 'APAXCO', ''),
(353, 11, 'ATENCO', ''),
(354, 11, 'ATIZAPÁN', ''),
(355, 11, 'ATIZAPÁN DE ZARAGOZA', ''),
(356, 11, 'ATLACOMULCO', ''),
(357, 11, 'ATLAUTLA', ''),
(358, 11, 'AXAPUSCO', ''),
(359, 11, 'AYAPANGO', ''),
(360, 11, 'CALIMAYA', ''),
(361, 11, 'CAPULHUAC', ''),
(362, 11, 'COACALCO DE BERRIOZÁBAL', ''),
(363, 11, 'COATEPEC HARINAS', ''),
(364, 11, 'COCOTITLÁN', ''),
(365, 11, 'COYOTEPEC', ''),
(366, 11, 'CUAUTITLÁN', ''),
(367, 11, 'CHALCO', ''),
(368, 11, 'CHAPA DE MOTA', ''),
(369, 11, 'CHAPULTEPEC', ''),
(370, 11, 'CHIAUTLA', ''),
(371, 11, 'CHICOLOAPAN', ''),
(372, 11, 'CHICONCUAC', ''),
(373, 11, 'CHIMALHUACÁN', ''),
(374, 11, 'DONATO GUERRA', ''),
(375, 11, 'ECATEPEC DE MORELOS', ''),
(376, 11, 'ECATZINGO', ''),
(377, 11, 'HUEHUETOCA', ''),
(378, 11, 'HUEYPOXTLA', ''),
(379, 11, 'HUIXQUILUCAN', ''),
(380, 11, 'ISIDRO FABELA', ''),
(381, 11, 'IXTAPALUCA', ''),
(382, 11, 'IXTAPAN DE LA SAL', ''),
(383, 11, 'IXTAPAN DEL ORO', ''),
(384, 11, 'IXTLAHUACA', ''),
(385, 11, 'XALATLACO', ''),
(386, 11, 'JALTENCO', ''),
(387, 11, 'JILOTEPEC', ''),
(388, 11, 'JILOTZINGO', ''),
(389, 11, 'JIQUIPILCO', ''),
(390, 11, 'JOCOTITLÁN', ''),
(391, 11, 'JOQUICINGO', ''),
(392, 11, 'JUCHITEPEC', ''),
(393, 11, 'LERMA', ''),
(394, 11, 'MALINALCO', ''),
(395, 11, 'MELCHOR OCAMPO', ''),
(396, 11, 'METEPEC', ''),
(397, 11, 'MEXICALTZINGO', ''),
(398, 11, 'MORELOS', ''),
(399, 11, 'NAUCALPAN DE JUÁREZ', ''),
(400, 11, 'NEZAHUALCÓYOTL', ''),
(401, 11, 'NEXTLALPAN', ''),
(402, 11, 'NICOLÁS ROMERO', ''),
(403, 11, 'NOPALTEPEC', ''),
(404, 11, 'OCOYOACAC', ''),
(405, 11, 'OCUILAN', ''),
(406, 11, 'EL ORO', ''),
(407, 11, 'OTUMBA', ''),
(408, 11, 'OTZOLOAPAN', ''),
(409, 11, 'OTZOLOTEPEC', ''),
(410, 11, 'OZUMBA', ''),
(411, 11, 'PAPALOTLA', ''),
(412, 11, 'LA PAZ', ''),
(413, 11, 'POLOTITLÁN', ''),
(414, 11, 'RAYÓN', ''),
(415, 11, 'SAN ANTONIO LA ISLA', ''),
(416, 11, 'SAN FELIPE DEL PROGRESO', ''),
(417, 11, 'SAN MARTÍN DE LAS PIRÁMIDES', ''),
(418, 11, 'SAN MATEO ATENCO', ''),
(419, 11, 'SAN SIMÓN DE GUERRERO', ''),
(420, 11, 'SANTO TOMÁS', ''),
(421, 11, 'SOYANIQUILPAN DE JUÁREZ', ''),
(422, 11, 'SULTEPEC', ''),
(423, 11, 'TECÁMAC', ''),
(424, 11, 'TEJUPILCO', ''),
(425, 11, 'TEMAMATLA', ''),
(426, 11, 'TEMASCALAPA', ''),
(427, 11, 'TEMASCALCINGO', ''),
(428, 11, 'TEMASCALTEPEC', ''),
(429, 11, 'TEMOAYA', ''),
(430, 11, 'TENANCINGO', ''),
(431, 11, 'TENANGO DEL AIRE', ''),
(432, 11, 'TENANGO DEL VALLE', ''),
(433, 11, 'TEOLOYUCAN', ''),
(434, 11, 'TEOTIHUACÁN', ''),
(435, 11, 'TEPETLAOXTOC', ''),
(436, 11, 'TEPETLIXPA', ''),
(437, 11, 'TEPOTZOTLÁN', ''),
(438, 11, 'TEQUIXQUIAC', ''),
(439, 11, 'TEXCALTITLÁN', ''),
(440, 11, 'TEXCALYACAC', ''),
(441, 11, 'TEXCOCO', ''),
(442, 11, 'TEZOYUCA', ''),
(443, 11, 'TIANGUISTENCO', ''),
(444, 11, 'TIMILPAN', ''),
(445, 11, 'TLALMANALCO', ''),
(446, 11, 'TLALNEPANTLA DE BAZ', ''),
(447, 11, 'TLATLAYA', ''),
(448, 11, 'TOLUCA', ''),
(449, 11, 'TONATICO', ''),
(450, 11, 'TULTEPEC', ''),
(451, 11, 'TULTITLÁN', ''),
(452, 11, 'VALLE DE BRAVO', ''),
(453, 11, 'VILLA DE ALLENDE', ''),
(454, 11, 'VILLA DEL CARBÓN', ''),
(455, 11, 'VILLA GUERRERO', ''),
(456, 11, 'VILLA VICTORIA', ''),
(457, 11, 'XONACATLÁN', ''),
(458, 11, 'ZACAZONAPAN', ''),
(459, 11, 'ZACUALPAN', ''),
(460, 11, 'ZINACANTEPEC', ''),
(461, 11, 'ZUMPAHUACÁN', ''),
(462, 11, 'ZUMPANGO', ''),
(463, 11, 'CUAUTITLÁN IZCALLI', ''),
(464, 11, 'VALLE DE CHALCO SOLIDARIDAD', ''),
(465, 11, 'LUVIANOS', ''),
(466, 11, 'SAN JOSÉ DEL RINCÓN', ''),
(467, 11, 'TONANITLA', ''),
(468, 12, 'ABASOLO', ''),
(469, 12, 'ACÁMBARO', ''),
(470, 12, 'SAN MIGUEL DE ALLENDE', ''),
(471, 12, 'APASEO EL ALTO', ''),
(472, 12, 'APASEO EL GRANDE', ''),
(473, 12, 'ATARJEA', ''),
(474, 12, 'CELAYA', ''),
(475, 12, 'MANUEL DOBLADO', ''),
(476, 12, 'COMONFORT', ''),
(477, 12, 'CORONEO', ''),
(478, 12, 'CORTAZAR', ''),
(479, 12, 'CUERÁMARO', ''),
(480, 12, 'DOCTOR MORA', ''),
(481, 12, 'DOLORES HIDALGO CUNA DE LA INDEPENDENCIA NACIONAL', ''),
(482, 12, 'GUANAJUATO', ''),
(483, 12, 'HUANÍMARO', ''),
(484, 12, 'IRAPUATO', ''),
(485, 12, 'JARAL DEL PROGRESO', ''),
(486, 12, 'JERÉCUARO', ''),
(487, 12, 'LEÓN', ''),
(488, 12, 'MOROLEÓN', ''),
(489, 12, 'OCAMPO', ''),
(490, 12, 'PÉNJAMO', ''),
(491, 12, 'PUEBLO NUEVO', ''),
(492, 12, 'PURÍSIMA DEL RINCÓN', ''),
(493, 12, 'ROMITA', ''),
(494, 12, 'SALAMANCA', ''),
(495, 12, 'SALVATIERRA', ''),
(496, 12, 'SAN DIEGO DE LA UNIÓN', ''),
(497, 12, 'SAN FELIPE', ''),
(498, 12, 'SAN FRANCISCO DEL RINCÓN', ''),
(499, 12, 'SAN JOSÉ ITURBIDE', ''),
(500, 12, 'SAN LUIS DE LA PAZ', ''),
(501, 12, 'SANTA CATARINA', ''),
(502, 12, 'SANTA CRUZ DE JUVENTINO ROSAS', ''),
(503, 12, 'SANTIAGO MARAVATÍO', ''),
(504, 12, 'SILAO DE LA VICTORIA', ''),
(505, 12, 'TARANDACUAO', ''),
(506, 12, 'TARIMORO', ''),
(507, 12, 'TIERRA BLANCA', ''),
(508, 12, 'URIANGATO', ''),
(509, 12, 'VALLE DE SANTIAGO', ''),
(510, 12, 'VICTORIA', ''),
(511, 12, 'VILLAGRÁN', ''),
(512, 12, 'XICHÚ', ''),
(513, 12, 'YURIRIA', ''),
(514, 13, 'ACAPULCO DE JUÁREZ', ''),
(515, 13, 'AHUACUOTZINGO', ''),
(516, 13, 'AJUCHITLÁN DEL PROGRESO', ''),
(517, 13, 'ALCOZAUCA DE GUERRERO', ''),
(518, 13, 'ALPOYECA', ''),
(519, 13, 'APAXTLA', ''),
(520, 13, 'ARCELIA', ''),
(521, 13, 'ATENANGO DEL RÍO', ''),
(522, 13, 'ATLAMAJALCINGO DEL MONTE', ''),
(523, 13, 'ATLIXTAC', ''),
(524, 13, 'ATOYAC DE ÁLVAREZ', ''),
(525, 13, 'AYUTLA DE LOS LIBRES', ''),
(526, 13, 'AZOYÚ', ''),
(527, 13, 'BENITO JUÁREZ', ''),
(528, 13, 'BUENAVISTA DE CUÉLLAR', ''),
(529, 13, 'COAHUAYUTLA DE JOSÉ MARÍA IZAZAGA', ''),
(530, 13, 'COCULA', ''),
(531, 13, 'COPALA', ''),
(532, 13, 'COPALILLO', ''),
(533, 13, 'COPANATOYAC', ''),
(534, 13, 'COYUCA DE BENÍTEZ', ''),
(535, 13, 'COYUCA DE CATALÁN', ''),
(536, 13, 'CUAJINICUILAPA', ''),
(537, 13, 'CUALÁC', ''),
(538, 13, 'CUAUTEPEC', ''),
(539, 13, 'CUETZALA DEL PROGRESO', ''),
(540, 13, 'CUTZAMALA DE PINZÓN', ''),
(541, 13, 'CHILAPA DE ÁLVAREZ', ''),
(542, 13, 'CHILPANCINGO DE LOS BRAVO', ''),
(543, 13, 'FLORENCIO VILLARREAL', ''),
(544, 13, 'GENERAL CANUTO A. NERI', ''),
(545, 13, 'GENERAL HELIODORO CASTILLO', ''),
(546, 13, 'HUAMUXTITLÁN', ''),
(547, 13, 'HUITZUCO DE LOS FIGUEROA', ''),
(548, 13, 'IGUALA DE LA INDEPENDENCIA', ''),
(549, 13, 'IGUALAPA', ''),
(550, 13, 'IXCATEOPAN DE CUAUHTÉMOC', ''),
(551, 13, 'ZIHUATANEJO DE AZUETA', ''),
(552, 13, 'JUAN R. ESCUDERO', ''),
(553, 13, 'LEONARDO BRAVO', ''),
(554, 13, 'MALINALTEPEC', ''),
(555, 13, 'MÁRTIR DE CUILAPAN', ''),
(556, 13, 'METLATÓNOC', ''),
(557, 13, 'MOCHITLÁN', ''),
(558, 13, 'OLINALÁ', ''),
(559, 13, 'OMETEPEC', ''),
(560, 13, 'PEDRO ASCENCIO ALQUISIRAS', ''),
(561, 13, 'PETATLÁN', ''),
(562, 13, 'PILCAYA', ''),
(563, 13, 'PUNGARABATO', ''),
(564, 13, 'QUECHULTENANGO', ''),
(565, 13, 'SAN LUIS ACATLÁN', ''),
(566, 13, 'SAN MARCOS', ''),
(567, 13, 'SAN MIGUEL TOTOLAPAN', ''),
(568, 13, 'TAXCO DE ALARCÓN', ''),
(569, 13, 'TECOANAPA', ''),
(570, 13, 'TÉCPAN DE GALEANA', ''),
(571, 13, 'TELOLOAPAN', ''),
(572, 13, 'TEPECOACUILCO DE TRUJANO', ''),
(573, 13, 'TETIPAC', ''),
(574, 13, 'TIXTLA DE GUERRERO', ''),
(575, 13, 'TLACOACHISTLAHUACA', ''),
(576, 13, 'TLACOAPA', ''),
(577, 13, 'TLALCHAPA', ''),
(578, 13, 'TLALIXTAQUILLA DE MALDONADO', ''),
(579, 13, 'TLAPA DE COMONFORT', ''),
(580, 13, 'TLAPEHUALA', ''),
(581, 13, 'LA UNIÓN DE ISIDORO MONTES DE OCA', ''),
(582, 13, 'XALPATLÁHUAC', ''),
(583, 13, 'XOCHIHUEHUETLÁN', ''),
(584, 13, 'XOCHISTLAHUACA', ''),
(585, 13, 'ZAPOTITLÁN TABLAS', ''),
(586, 13, 'ZIRÁNDARO', ''),
(587, 13, 'ZITLALA', ''),
(588, 13, 'EDUARDO NERI', ''),
(589, 13, 'ACATEPEC', ''),
(590, 13, 'MARQUELIA', ''),
(591, 13, 'COCHOAPA EL GRANDE', ''),
(592, 13, 'JOSÉ JOAQUÍN DE HERRERA', ''),
(593, 13, 'JUCHITÁN', ''),
(594, 13, 'ILIATENCO', ''),
(595, 14, 'ACATLÁN', ''),
(596, 14, 'ACAXOCHITLÁN', ''),
(597, 14, 'ACTOPAN', ''),
(598, 14, 'AGUA BLANCA DE ITURBIDE', ''),
(599, 14, 'AJACUBA', ''),
(600, 14, 'ALFAJAYUCAN', ''),
(601, 14, 'ALMOLOYA', ''),
(602, 14, 'APAN', ''),
(603, 14, 'EL ARENAL', ''),
(604, 14, 'ATITALAQUIA', ''),
(605, 14, 'ATLAPEXCO', ''),
(606, 14, 'ATOTONILCO EL GRANDE', ''),
(607, 14, 'ATOTONILCO DE TULA', ''),
(608, 14, 'CALNALI', ''),
(609, 14, 'CARDONAL', ''),
(610, 14, 'CUAUTEPEC DE HINOJOSA', ''),
(611, 14, 'CHAPANTONGO', ''),
(612, 14, 'CHAPULHUACÁN', ''),
(613, 14, 'CHILCUAUTLA', ''),
(614, 14, 'ELOXOCHITLÁN', ''),
(615, 14, 'EMILIANO ZAPATA', ''),
(616, 14, 'EPAZOYUCAN', ''),
(617, 14, 'FRANCISCO I. MADERO', ''),
(618, 14, 'HUASCA DE OCAMPO', ''),
(619, 14, 'HUAUTLA', ''),
(620, 14, 'HUAZALINGO', ''),
(621, 14, 'HUEHUETLA', ''),
(622, 14, 'HUEJUTLA DE REYES', ''),
(623, 14, 'HUICHAPAN', ''),
(624, 14, 'IXMIQUILPAN', ''),
(625, 14, 'JACALA DE LEDEZMA', ''),
(626, 14, 'JALTOCÁN', ''),
(627, 14, 'JUÁREZ HIDALGO', ''),
(628, 14, 'LOLOTLA', ''),
(629, 14, 'METEPEC', ''),
(630, 14, 'SAN AGUSTÍN METZQUITITLÁN', ''),
(631, 14, 'METZTITLÁN', ''),
(632, 14, 'MINERAL DEL CHICO', ''),
(633, 14, 'MINERAL DEL MONTE', ''),
(634, 14, 'LA MISIÓN', ''),
(635, 14, 'MIXQUIAHUALA DE JUÁREZ', ''),
(636, 14, 'MOLANGO DE ESCAMILLA', ''),
(637, 14, 'NICOLÁS FLORES', ''),
(638, 14, 'NOPALA DE VILLAGRÁN', ''),
(639, 14, 'OMITLÁN DE JUÁREZ', ''),
(640, 14, 'SAN FELIPE ORIZATLÁN', ''),
(641, 14, 'PACULA', ''),
(642, 14, 'PACHUCA DE SOTO', ''),
(643, 14, 'PISAFLORES', ''),
(644, 14, 'PROGRESO DE OBREGÓN', ''),
(645, 14, 'MINERAL DE LA REFORMA', ''),
(646, 14, 'SAN AGUSTÍN TLAXIACA', ''),
(647, 14, 'SAN BARTOLO TUTOTEPEC', ''),
(648, 14, 'SAN SALVADOR', ''),
(649, 14, 'SANTIAGO DE ANAYA', ''),
(650, 14, 'SANTIAGO TULANTEPEC DE LUGO GUERRERO', ''),
(651, 14, 'SINGUILUCAN', ''),
(652, 14, 'TASQUILLO', ''),
(653, 14, 'TECOZAUTLA', ''),
(654, 14, 'TENANGO DE DORIA', ''),
(655, 14, 'TEPEAPULCO', ''),
(656, 14, 'TEPEHUACÁN DE GUERRERO', ''),
(657, 14, 'TEPEJI DEL RÍO DE OCAMPO', ''),
(658, 14, 'TEPETITLÁN', ''),
(659, 14, 'TETEPANGO', ''),
(660, 14, 'VILLA DE TEZONTEPEC', ''),
(661, 14, 'TEZONTEPEC DE ALDAMA', ''),
(662, 14, 'TIANGUISTENGO', ''),
(663, 14, 'TIZAYUCA', ''),
(664, 14, 'TLAHUELILPAN', ''),
(665, 14, 'TLAHUILTEPA', ''),
(666, 14, 'TLANALAPA', ''),
(667, 14, 'TLANCHINOL', ''),
(668, 14, 'TLAXCOAPAN', ''),
(669, 14, 'TOLCAYUCA', ''),
(670, 14, 'TULA DE ALLENDE', ''),
(671, 14, 'TULANCINGO DE BRAVO', ''),
(672, 14, 'XOCHIATIPAN', ''),
(673, 14, 'XOCHICOATLÁN', ''),
(674, 14, 'YAHUALICA', ''),
(675, 14, 'ZACUALTIPÁN DE ÁNGELES', ''),
(676, 14, 'ZAPOTLÁN DE JUÁREZ', ''),
(677, 14, 'ZEMPOALA', ''),
(678, 14, 'ZIMAPÁN', ''),
(679, 15, 'ACATIC', ''),
(680, 15, 'ACATLÁN DE JUÁREZ', ''),
(681, 15, 'AHUALULCO DE MERCADO', ''),
(682, 15, 'AMACUECA', ''),
(683, 15, 'AMATITÁN', ''),
(684, 15, 'AMECA', ''),
(685, 15, 'SAN JUANITO DE ESCOBEDO', ''),
(686, 15, 'ARANDAS', ''),
(687, 15, 'EL ARENAL', ''),
(688, 15, 'ATEMAJAC DE BRIZUELA', ''),
(689, 15, 'ATENGO', ''),
(690, 15, 'ATENGUILLO', ''),
(691, 15, 'ATOTONILCO EL ALTO', ''),
(692, 15, 'ATOYAC', ''),
(693, 15, 'AUTLÁN DE NAVARRO', ''),
(694, 15, 'AYOTLÁN', ''),
(695, 15, 'AYUTLA', ''),
(696, 15, 'LA BARCA', ''),
(697, 15, 'BOLAÑOS', ''),
(698, 15, 'CABO CORRIENTES', ''),
(699, 15, 'CASIMIRO CASTILLO', ''),
(700, 15, 'CIHUATLÁN', ''),
(701, 15, 'ZAPOTLÁN EL GRANDE', ''),
(702, 15, 'COCULA', ''),
(703, 15, 'COLOTLÁN', ''),
(704, 15, 'CONCEPCIÓN DE BUENOS AIRES', ''),
(705, 15, 'CUAUTITLÁN DE GARCÍA BARRAGÁN', ''),
(706, 15, 'CUAUTLA', ''),
(707, 15, 'CUQUÍO', ''),
(708, 15, 'CHAPALA', ''),
(709, 15, 'CHIMALTITÁN', ''),
(710, 15, 'CHIQUILISTLÁN', ''),
(711, 15, 'DEGOLLADO', ''),
(712, 15, 'EJUTLA', ''),
(713, 15, 'ENCARNACIÓN DE DÍAZ', ''),
(714, 15, 'ETZATLÁN', ''),
(715, 15, 'EL GRULLO', ''),
(716, 15, 'GUACHINANGO', ''),
(717, 15, 'GUADALAJARA', ''),
(718, 15, 'HOSTOTIPAQUILLO', ''),
(719, 15, 'HUEJÚCAR', ''),
(720, 15, 'HUEJUQUILLA EL ALTO', ''),
(721, 15, 'LA HUERTA', ''),
(722, 15, 'IXTLAHUACÁN DE LOS MEMBRILLOS', ''),
(723, 15, 'IXTLAHUACÁN DEL RÍO', ''),
(724, 15, 'JALOSTOTITLÁN', ''),
(725, 15, 'JAMAY', ''),
(726, 15, 'JESÚS MARÍA', ''),
(727, 15, 'JILOTLÁN DE LOS DOLORES', ''),
(728, 15, 'JOCOTEPEC', ''),
(729, 15, 'JUANACATLÁN', ''),
(730, 15, 'JUCHITLÁN', ''),
(731, 15, 'LAGOS DE MORENO', ''),
(732, 15, 'EL LIMÓN', ''),
(733, 15, 'MAGDALENA', ''),
(734, 15, 'SANTA MARÍA DEL ORO', ''),
(735, 15, 'LA MANZANILLA DE LA PAZ', ''),
(736, 15, 'MASCOTA', ''),
(737, 15, 'MAZAMITLA', ''),
(738, 15, 'MEXTICACÁN', ''),
(739, 15, 'MEZQUITIC', ''),
(740, 15, 'MIXTLÁN', ''),
(741, 15, 'OCOTLÁN', ''),
(742, 15, 'OJUELOS DE JALISCO', ''),
(743, 15, 'PIHUAMO', ''),
(744, 15, 'PONCITLÁN', ''),
(745, 15, 'PUERTO VALLARTA', ''),
(746, 15, 'VILLA PURIFICACIÓN', ''),
(747, 15, 'QUITUPAN', ''),
(748, 15, 'EL SALTO', ''),
(749, 15, 'SAN CRISTÓBAL DE LA BARRANCA', ''),
(750, 15, 'SAN DIEGO DE ALEJANDRÍA', ''),
(751, 15, 'SAN JUAN DE LOS LAGOS', ''),
(752, 15, 'SAN JULIÁN', ''),
(753, 15, 'SAN MARCOS', ''),
(754, 15, 'SAN MARTÍN DE BOLAÑOS', ''),
(755, 15, 'SAN MARTÍN HIDALGO', ''),
(756, 15, 'SAN MIGUEL EL ALTO', ''),
(757, 15, 'GÓMEZ FARÍAS', ''),
(758, 15, 'SAN SEBASTIÁN DEL OESTE', ''),
(759, 15, 'SANTA MARÍA DE LOS ÁNGELES', ''),
(760, 15, 'SAYULA', ''),
(761, 15, 'TALA', ''),
(762, 15, 'TALPA DE ALLENDE', ''),
(763, 15, 'TAMAZULA DE GORDIANO', ''),
(764, 15, 'TAPALPA', ''),
(765, 15, 'TECALITLÁN', ''),
(766, 15, 'TECOLOTLÁN', ''),
(767, 15, 'TECHALUTA DE MONTENEGRO', ''),
(768, 15, 'TENAMAXTLÁN', ''),
(769, 15, 'TEOCALTICHE', ''),
(770, 15, 'TEOCUITATLÁN DE CORONA', ''),
(771, 15, 'TEPATITLÁN DE MORELOS', ''),
(772, 15, 'TEQUILA', ''),
(773, 15, 'TEUCHITLÁN', ''),
(774, 15, 'TIZAPÁN EL ALTO', ''),
(775, 15, 'TLAJOMULCO DE ZÚÑIGA', ''),
(776, 15, 'SAN PEDRO TLAQUEPAQUE', ''),
(777, 15, 'TOLIMÁN', ''),
(778, 15, 'TOMATLÁN', ''),
(779, 15, 'TONALÁ', ''),
(780, 15, 'TONAYA', ''),
(781, 15, 'TONILA', ''),
(782, 15, 'TOTATICHE', ''),
(783, 15, 'TOTOTLÁN', ''),
(784, 15, 'TUXCACUESCO', ''),
(785, 15, 'TUXCUECA', ''),
(786, 15, 'TUXPAN', ''),
(787, 15, 'UNIÓN DE SAN ANTONIO', ''),
(788, 15, 'UNIÓN DE TULA', ''),
(789, 15, 'VALLE DE GUADALUPE', ''),
(790, 15, 'VALLE DE JUÁREZ', ''),
(791, 15, 'SAN GABRIEL', ''),
(792, 15, 'VILLA CORONA', ''),
(793, 15, 'VILLA GUERRERO', ''),
(794, 15, 'VILLA HIDALGO', ''),
(795, 15, 'CAÑADAS DE OBREGÓN', ''),
(796, 15, 'YAHUALICA DE GONZÁLEZ GALLO', ''),
(797, 15, 'ZACOALCO DE TORRES', ''),
(798, 15, 'ZAPOPAN', ''),
(799, 15, 'ZAPOTILTIC', ''),
(800, 15, 'ZAPOTITLÁN DE VADILLO', ''),
(801, 15, 'ZAPOTLÁN DEL REY', ''),
(802, 15, 'ZAPOTLANEJO', ''),
(803, 15, 'SAN IGNACIO CERRO GORDO', ''),
(804, 16, 'ACUITZIO', ''),
(805, 16, 'AGUILILLA', ''),
(806, 16, 'ÁLVARO OBREGÓN', ''),
(807, 16, 'ANGAMACUTIRO', ''),
(808, 16, 'ANGANGUEO', ''),
(809, 16, 'APATZINGÁN', ''),
(810, 16, 'APORO', ''),
(811, 16, 'AQUILA', ''),
(812, 16, 'ARIO', ''),
(813, 16, 'ARTEAGA', ''),
(814, 16, 'BRISEÑAS', ''),
(815, 16, 'BUENAVISTA', ''),
(816, 16, 'CARÁCUARO', ''),
(817, 16, 'COAHUAYANA', ''),
(818, 16, 'COALCOMÁN DE VÁZQUEZ PALLARES', ''),
(819, 16, 'COENEO', ''),
(820, 16, 'CONTEPEC', ''),
(821, 16, 'COPÁNDARO', ''),
(822, 16, 'COTIJA', ''),
(823, 16, 'CUITZEO', ''),
(824, 16, 'CHARAPAN', ''),
(825, 16, 'CHARO', ''),
(826, 16, 'CHAVINDA', ''),
(827, 16, 'CHERÁN', ''),
(828, 16, 'CHILCHOTA', ''),
(829, 16, 'CHINICUILA', ''),
(830, 16, 'CHUCÁNDIRO', ''),
(831, 16, 'CHURINTZIO', ''),
(832, 16, 'CHURUMUCO', ''),
(833, 16, 'ECUANDUREO', ''),
(834, 16, 'EPITACIO HUERTA', ''),
(835, 16, 'ERONGARÍCUARO', ''),
(836, 16, 'GABRIEL ZAMORA', ''),
(837, 16, 'HIDALGO', ''),
(838, 16, 'LA HUACANA', ''),
(839, 16, 'HUANDACAREO', ''),
(840, 16, 'HUANIQUEO', ''),
(841, 16, 'HUETAMO', ''),
(842, 16, 'HUIRAMBA', ''),
(843, 16, 'INDAPARAPEO', ''),
(844, 16, 'IRIMBO', ''),
(845, 16, 'IXTLÁN', ''),
(846, 16, 'JACONA', ''),
(847, 16, 'JIMÉNEZ', ''),
(848, 16, 'JIQUILPAN', ''),
(849, 16, 'JUÁREZ', ''),
(850, 16, 'JUNGAPEO', ''),
(851, 16, 'LAGUNILLAS', ''),
(852, 16, 'MADERO', ''),
(853, 16, 'MARAVATÍO', ''),
(854, 16, 'MARCOS CASTELLANOS', ''),
(855, 16, 'LÁZARO CÁRDENAS', ''),
(856, 16, 'MORELIA', ''),
(857, 16, 'MORELOS', ''),
(858, 16, 'MÚGICA', ''),
(859, 16, 'NAHUATZEN', ''),
(860, 16, 'NOCUPÉTARO', ''),
(861, 16, 'NUEVO PARANGARICUTIRO', ''),
(862, 16, 'NUEVO URECHO', ''),
(863, 16, 'NUMARÁN', ''),
(864, 16, 'OCAMPO', ''),
(865, 16, 'PAJACUARÁN', ''),
(866, 16, 'PANINDÍCUARO', ''),
(867, 16, 'PARÁCUARO', ''),
(868, 16, 'PARACHO', ''),
(869, 16, 'PÁTZCUARO', ''),
(870, 16, 'PENJAMILLO', ''),
(871, 16, 'PERIBÁN', ''),
(872, 16, 'LA PIEDAD', ''),
(873, 16, 'PURÉPERO', ''),
(874, 16, 'PURUÁNDIRO', ''),
(875, 16, 'QUERÉNDARO', ''),
(876, 16, 'QUIROGA', ''),
(877, 16, 'COJUMATLÁN DE RÉGULES', ''),
(878, 16, 'LOS REYES', ''),
(879, 16, 'SAHUAYO', ''),
(880, 16, 'SAN LUCAS', ''),
(881, 16, 'SANTA ANA MAYA', ''),
(882, 16, 'SALVADOR ESCALANTE', ''),
(883, 16, 'SENGUIO', ''),
(884, 16, 'SUSUPUATO', ''),
(885, 16, 'TACÁMBARO', ''),
(886, 16, 'TANCÍTARO', ''),
(887, 16, 'TANGAMANDAPIO', ''),
(888, 16, 'TANGANCÍCUARO', ''),
(889, 16, 'TANHUATO', ''),
(890, 16, 'TARETAN', ''),
(891, 16, 'TARÍMBARO', ''),
(892, 16, 'TEPALCATEPEC', ''),
(893, 16, 'TINGAMBATO', ''),
(894, 16, 'TINGÜINDÍN', ''),
(895, 16, 'TIQUICHEO DE NICOLÁS ROMERO', ''),
(896, 16, 'TLALPUJAHUA', ''),
(897, 16, 'TLAZAZALCA', ''),
(898, 16, 'TOCUMBO', ''),
(899, 16, 'TUMBISCATÍO', ''),
(900, 16, 'TURICATO', ''),
(901, 16, 'TUXPAN', ''),
(902, 16, 'TUZANTLA', ''),
(903, 16, 'TZINTZUNTZAN', ''),
(904, 16, 'TZITZIO', ''),
(905, 16, 'URUAPAN', ''),
(906, 16, 'VENUSTIANO CARRANZA', ''),
(907, 16, 'VILLAMAR', ''),
(908, 16, 'VISTA HERMOSA', ''),
(909, 16, 'YURÉCUARO', ''),
(910, 16, 'ZACAPU', ''),
(911, 16, 'ZAMORA', ''),
(912, 16, 'ZINÁPARO', ''),
(913, 16, 'ZINAPÉCUARO', ''),
(914, 16, 'ZIRACUARETIRO', ''),
(915, 16, 'ZITÁCUARO', ''),
(916, 16, 'JOSÉ SIXTO VERDUZCO', ''),
(917, 17, 'AMACUZAC', ''),
(918, 17, 'ATLATLAHUCAN', ''),
(919, 17, 'AXOCHIAPAN', ''),
(920, 17, 'AYALA', ''),
(921, 17, 'COATLÁN DEL RÍO', ''),
(922, 17, 'CUAUTLA', ''),
(923, 17, 'CUERNAVACA', ''),
(924, 17, 'EMILIANO ZAPATA', ''),
(925, 17, 'HUITZILAC', ''),
(926, 17, 'JANTETELCO', ''),
(927, 17, 'JIUTEPEC', ''),
(928, 17, 'JOJUTLA', ''),
(929, 17, 'JONACATEPEC DE LEANDRO VALLE', ''),
(930, 17, 'MAZATEPEC', ''),
(931, 17, 'MIACATLÁN', ''),
(932, 17, 'OCUITUCO', ''),
(933, 17, 'PUENTE DE IXTLA', ''),
(934, 17, 'TEMIXCO', ''),
(935, 17, 'TEPALCINGO', ''),
(936, 17, 'TEPOZTLÁN', ''),
(937, 17, 'TETECALA', ''),
(938, 17, 'TETELA DEL VOLCÁN', ''),
(939, 17, 'TLALNEPANTLA', ''),
(940, 17, 'TLALTIZAPÁN DE ZAPATA', ''),
(941, 17, 'TLAQUILTENANGO', ''),
(942, 17, 'TLAYACAPAN', ''),
(943, 17, 'TOTOLAPAN', ''),
(944, 17, 'XOCHITEPEC', ''),
(945, 17, 'YAUTEPEC', ''),
(946, 17, 'YECAPIXTLA', ''),
(947, 17, 'ZACATEPEC', ''),
(948, 17, 'ZACUALPAN DE AMILPAS', ''),
(949, 17, 'TEMOAC', ''),
(950, 18, 'ACAPONETA', ''),
(951, 18, 'AHUACATLÁN', ''),
(952, 18, 'AMATLÁN DE CAÑAS', ''),
(953, 18, 'COMPOSTELA', ''),
(954, 18, 'HUAJICORI', ''),
(955, 18, 'IXTLÁN DEL RÍO', ''),
(956, 18, 'JALA', ''),
(957, 18, 'XALISCO', ''),
(958, 18, 'DEL NAYAR', ''),
(959, 18, 'ROSAMORADA', ''),
(960, 18, 'RUÍZ', ''),
(961, 18, 'SAN BLAS', ''),
(962, 18, 'SAN PEDRO LAGUNILLAS', ''),
(963, 18, 'SANTA MARÍA DEL ORO', ''),
(964, 18, 'SANTIAGO IXCUINTLA', ''),
(965, 18, 'TECUALA', ''),
(966, 18, 'TEPIC', ''),
(967, 18, 'TUXPAN', ''),
(968, 18, 'LA YESCA', ''),
(969, 18, 'BAHÍA DE BANDERAS', ''),
(970, 19, 'ABASOLO', ''),
(971, 19, 'AGUALEGUAS', ''),
(972, 19, 'LOS ALDAMAS', ''),
(973, 19, 'ALLENDE', ''),
(974, 19, 'ANÁHUAC', ''),
(975, 19, 'APODACA', ''),
(976, 19, 'ARAMBERRI', ''),
(977, 19, 'BUSTAMANTE', ''),
(978, 19, 'CADEREYTA JIMÉNEZ', ''),
(979, 19, 'EL CARMEN', ''),
(980, 19, 'CERRALVO', ''),
(981, 19, 'CIÉNEGA DE FLORES', ''),
(982, 19, 'CHINA', ''),
(983, 19, 'DOCTOR ARROYO', ''),
(984, 19, 'DOCTOR COSS', ''),
(985, 19, 'DOCTOR GONZÁLEZ', ''),
(986, 19, 'GALEANA', ''),
(987, 19, 'GARCÍA', ''),
(988, 19, 'SAN PEDRO GARZA GARCÍA', ''),
(989, 19, 'GENERAL BRAVO', ''),
(990, 19, 'GENERAL ESCOBEDO', ''),
(991, 19, 'GENERAL TERÁN', ''),
(992, 19, 'GENERAL TREVIÑO', ''),
(993, 19, 'GENERAL ZARAGOZA', ''),
(994, 19, 'GENERAL ZUAZUA', ''),
(995, 19, 'GUADALUPE', ''),
(996, 19, 'LOS HERRERAS', ''),
(997, 19, 'HIGUERAS', ''),
(998, 19, 'HUALAHUISES', ''),
(999, 19, 'ITURBIDE', ''),
(1000, 19, 'JUÁREZ', ''),
(1001, 19, 'LAMPAZOS DE NARANJO', ''),
(1002, 19, 'LINARES', ''),
(1003, 19, 'MARÍN', ''),
(1004, 19, 'MELCHOR OCAMPO', ''),
(1005, 19, 'MIER Y NORIEGA', ''),
(1006, 19, 'MINA', ''),
(1007, 19, 'MONTEMORELOS', ''),
(1008, 19, 'MONTERREY', ''),
(1009, 19, 'PARÁS', ''),
(1010, 19, 'PESQUERÍA', ''),
(1011, 19, 'LOS RAMONES', ''),
(1012, 19, 'RAYONES', ''),
(1013, 19, 'SABINAS HIDALGO', ''),
(1014, 19, 'SALINAS VICTORIA', ''),
(1015, 19, 'SAN NICOLÁS DE LOS GARZA', ''),
(1016, 19, 'HIDALGO', ''),
(1017, 19, 'SANTA CATARINA', ''),
(1018, 19, 'SANTIAGO', ''),
(1019, 19, 'VALLECILLO', ''),
(1020, 19, 'VILLALDAMA', ''),
(1021, 20, 'ABEJONES', ''),
(1022, 20, 'ACATLÁN DE PÉREZ FIGUEROA', ''),
(1023, 20, 'ASUNCIÓN CACALOTEPEC', ''),
(1024, 20, 'ASUNCIÓN CUYOTEPEJI', ''),
(1025, 20, 'ASUNCIÓN IXTALTEPEC', ''),
(1026, 20, 'ASUNCIÓN NOCHIXTLÁN', ''),
(1027, 20, 'ASUNCIÓN OCOTLÁN', ''),
(1028, 20, 'ASUNCIÓN TLACOLULITA', ''),
(1029, 20, 'AYOTZINTEPEC', ''),
(1030, 20, 'EL BARRIO DE LA SOLEDAD', ''),
(1031, 20, 'CALIHUALÁ', ''),
(1032, 20, 'CANDELARIA LOXICHA', ''),
(1033, 20, 'CIÉNEGA DE ZIMATLÁN', ''),
(1034, 20, 'CIUDAD IXTEPEC', ''),
(1035, 20, 'COATECAS ALTAS', ''),
(1036, 20, 'COICOYÁN DE LAS FLORES', ''),
(1037, 20, 'LA COMPAÑÍA', ''),
(1038, 20, 'CONCEPCIÓN BUENAVISTA', ''),
(1039, 20, 'CONCEPCIÓN PÁPALO', ''),
(1040, 20, 'CONSTANCIA DEL ROSARIO', ''),
(1041, 20, 'COSOLAPA', ''),
(1042, 20, 'COSOLTEPEC', ''),
(1043, 20, 'CUILÁPAM DE GUERRERO', ''),
(1044, 20, 'CUYAMECALCO VILLA DE ZARAGOZA', ''),
(1045, 20, 'CHAHUITES', ''),
(1046, 20, 'CHALCATONGO DE HIDALGO', ''),
(1047, 20, 'CHIQUIHUITLÁN DE BENITO JUÁREZ', ''),
(1048, 20, 'HEROICA CIUDAD DE EJUTLA DE CRESPO', ''),
(1049, 20, 'ELOXOCHITLÁN DE FLORES MAGÓN', ''),
(1050, 20, 'EL ESPINAL', ''),
(1051, 20, 'TAMAZULÁPAM DEL ESPÍRITU SANTO', ''),
(1052, 20, 'FRESNILLO DE TRUJANO', ''),
(1053, 20, 'GUADALUPE ETLA', ''),
(1054, 20, 'GUADALUPE DE RAMÍREZ', ''),
(1055, 20, 'GUELATAO DE JUÁREZ', ''),
(1056, 20, 'GUEVEA DE HUMBOLDT', ''),
(1057, 20, 'MESONES HIDALGO', ''),
(1058, 20, 'VILLA HIDALGO', ''),
(1059, 20, 'HEROICA CIUDAD DE HUAJUAPAN DE LEÓN', ''),
(1060, 20, 'HUAUTEPEC', ''),
(1061, 20, 'HUAUTLA DE JIMÉNEZ', ''),
(1062, 20, 'IXTLÁN DE JUÁREZ', ''),
(1063, 20, 'HEROICA CIUDAD DE JUCHITÁN DE ZARAGOZA', ''),
(1064, 20, 'LOMA BONITA', ''),
(1065, 20, 'MAGDALENA APASCO', ''),
(1066, 20, 'MAGDALENA JALTEPEC', ''),
(1067, 20, 'SANTA MAGDALENA JICOTLÁN', ''),
(1068, 20, 'MAGDALENA MIXTEPEC', ''),
(1069, 20, 'MAGDALENA OCOTLÁN', ''),
(1070, 20, 'MAGDALENA PEÑASCO', ''),
(1071, 20, 'MAGDALENA TEITIPAC', ''),
(1072, 20, 'MAGDALENA TEQUISISTLÁN', ''),
(1073, 20, 'MAGDALENA TLACOTEPEC', ''),
(1074, 20, 'MAGDALENA ZAHUATLÁN', ''),
(1075, 20, 'MARISCALA DE JUÁREZ', ''),
(1076, 20, 'MÁRTIRES DE TACUBAYA', ''),
(1077, 20, 'MATÍAS ROMERO AVENDAÑO', ''),
(1078, 20, 'MAZATLÁN VILLA DE FLORES', ''),
(1079, 20, 'MIAHUATLÁN DE PORFIRIO DÍAZ', ''),
(1080, 20, 'MIXISTLÁN DE LA REFORMA', ''),
(1081, 20, 'MONJAS', ''),
(1082, 20, 'NATIVIDAD', ''),
(1083, 20, 'NAZARENO ETLA', ''),
(1084, 20, 'NEJAPA DE MADERO', ''),
(1085, 20, 'IXPANTEPEC NIEVES', ''),
(1086, 20, 'SANTIAGO NILTEPEC', ''),
(1087, 20, 'OAXACA DE JUÁREZ', ''),
(1088, 20, 'OCOTLÁN DE MORELOS', ''),
(1089, 20, 'LA PE', ''),
(1090, 20, 'PINOTEPA DE DON LUIS', ''),
(1091, 20, 'PLUMA HIDALGO', ''),
(1092, 20, 'SAN JOSÉ DEL PROGRESO', ''),
(1093, 20, 'PUTLA VILLA DE GUERRERO', ''),
(1094, 20, 'SANTA CATARINA QUIOQUITANI', ''),
(1095, 20, 'REFORMA DE PINEDA', ''),
(1096, 20, 'LA REFORMA', ''),
(1097, 20, 'REYES ETLA', ''),
(1098, 20, 'ROJAS DE CUAUHTÉMOC', ''),
(1099, 20, 'SALINA CRUZ', ''),
(1100, 20, 'SAN AGUSTÍN AMATENGO', ''),
(1101, 20, 'SAN AGUSTÍN ATENANGO', ''),
(1102, 20, 'SAN AGUSTÍN CHAYUCO', ''),
(1103, 20, 'SAN AGUSTÍN DE LAS JUNTAS', ''),
(1104, 20, 'SAN AGUSTÍN ETLA', ''),
(1105, 20, 'SAN AGUSTÍN LOXICHA', ''),
(1106, 20, 'SAN AGUSTÍN TLACOTEPEC', ''),
(1107, 20, 'SAN AGUSTÍN YATARENI', ''),
(1108, 20, 'SAN ANDRÉS CABECERA NUEVA', ''),
(1109, 20, 'SAN ANDRÉS DINICUITI', ''),
(1110, 20, 'SAN ANDRÉS HUAXPALTEPEC', ''),
(1111, 20, 'SAN ANDRÉS HUAYÁPAM', ''),
(1112, 20, 'SAN ANDRÉS IXTLAHUACA', ''),
(1113, 20, 'SAN ANDRÉS LAGUNAS', ''),
(1114, 20, 'SAN ANDRÉS NUXIÑO', ''),
(1115, 20, 'SAN ANDRÉS PAXTLÁN', ''),
(1116, 20, 'SAN ANDRÉS SINAXTLA', ''),
(1117, 20, 'SAN ANDRÉS SOLAGA', ''),
(1118, 20, 'SAN ANDRÉS TEOTILÁLPAM', ''),
(1119, 20, 'SAN ANDRÉS TEPETLAPA', ''),
(1120, 20, 'SAN ANDRÉS YAÁ', ''),
(1121, 20, 'SAN ANDRÉS ZABACHE', ''),
(1122, 20, 'SAN ANDRÉS ZAUTLA', ''),
(1123, 20, 'SAN ANTONINO CASTILLO VELASCO', ''),
(1124, 20, 'SAN ANTONINO EL ALTO', ''),
(1125, 20, 'SAN ANTONINO MONTE VERDE', ''),
(1126, 20, 'SAN ANTONIO ACUTLA', ''),
(1127, 20, 'SAN ANTONIO DE LA CAL', ''),
(1128, 20, 'SAN ANTONIO HUITEPEC', ''),
(1129, 20, 'SAN ANTONIO NANAHUATÍPAM', ''),
(1130, 20, 'SAN ANTONIO SINICAHUA', ''),
(1131, 20, 'SAN ANTONIO TEPETLAPA', ''),
(1132, 20, 'SAN BALTAZAR CHICHICÁPAM', ''),
(1133, 20, 'SAN BALTAZAR LOXICHA', ''),
(1134, 20, 'SAN BALTAZAR YATZACHI EL BAJO', ''),
(1135, 20, 'SAN BARTOLO COYOTEPEC', ''),
(1136, 20, 'SAN BARTOLOMÉ AYAUTLA', ''),
(1137, 20, 'SAN BARTOLOMÉ LOXICHA', ''),
(1138, 20, 'SAN BARTOLOMÉ QUIALANA', ''),
(1139, 20, 'SAN BARTOLOMÉ YUCUAÑE', ''),
(1140, 20, 'SAN BARTOLOMÉ ZOOGOCHO', ''),
(1141, 20, 'SAN BARTOLO SOYALTEPEC', ''),
(1142, 20, 'SAN BARTOLO YAUTEPEC', ''),
(1143, 20, 'SAN BERNARDO MIXTEPEC', ''),
(1144, 20, 'SAN BLAS ATEMPA', ''),
(1145, 20, 'SAN CARLOS YAUTEPEC', ''),
(1146, 20, 'SAN CRISTÓBAL AMATLÁN', ''),
(1147, 20, 'SAN CRISTÓBAL AMOLTEPEC', ''),
(1148, 20, 'SAN CRISTÓBAL LACHIRIOAG', ''),
(1149, 20, 'SAN CRISTÓBAL SUCHIXTLAHUACA', ''),
(1150, 20, 'SAN DIONISIO DEL MAR', ''),
(1151, 20, 'SAN DIONISIO OCOTEPEC', ''),
(1152, 20, 'SAN DIONISIO OCOTLÁN', ''),
(1153, 20, 'SAN ESTEBAN ATATLAHUCA', ''),
(1154, 20, 'SAN FELIPE JALAPA DE DÍAZ', ''),
(1155, 20, 'SAN FELIPE TEJALÁPAM', ''),
(1156, 20, 'SAN FELIPE USILA', ''),
(1157, 20, 'SAN FRANCISCO CAHUACUÁ', ''),
(1158, 20, 'SAN FRANCISCO CAJONOS', ''),
(1159, 20, 'SAN FRANCISCO CHAPULAPA', ''),
(1160, 20, 'SAN FRANCISCO CHINDÚA', ''),
(1161, 20, 'SAN FRANCISCO DEL MAR', ''),
(1162, 20, 'SAN FRANCISCO HUEHUETLÁN', ''),
(1163, 20, 'SAN FRANCISCO IXHUATÁN', ''),
(1164, 20, 'SAN FRANCISCO JALTEPETONGO', ''),
(1165, 20, 'SAN FRANCISCO LACHIGOLÓ', ''),
(1166, 20, 'SAN FRANCISCO LOGUECHE', ''),
(1167, 20, 'SAN FRANCISCO NUXAÑO', ''),
(1168, 20, 'SAN FRANCISCO OZOLOTEPEC', ''),
(1169, 20, 'SAN FRANCISCO SOLA', ''),
(1170, 20, 'SAN FRANCISCO TELIXTLAHUACA', ''),
(1171, 20, 'SAN FRANCISCO TEOPAN', ''),
(1172, 20, 'SAN FRANCISCO TLAPANCINGO', ''),
(1173, 20, 'SAN GABRIEL MIXTEPEC', ''),
(1174, 20, 'SAN ILDEFONSO AMATLÁN', ''),
(1175, 20, 'SAN ILDEFONSO SOLA', ''),
(1176, 20, 'SAN ILDEFONSO VILLA ALTA', ''),
(1177, 20, 'SAN JACINTO AMILPAS', ''),
(1178, 20, 'SAN JACINTO TLACOTEPEC', ''),
(1179, 20, 'SAN JERÓNIMO COATLÁN', ''),
(1180, 20, 'SAN JERÓNIMO SILACAYOAPILLA', ''),
(1181, 20, 'SAN JERÓNIMO SOSOLA', ''),
(1182, 20, 'SAN JERÓNIMO TAVICHE', ''),
(1183, 20, 'SAN JERÓNIMO TECÓATL', ''),
(1184, 20, 'SAN JORGE NUCHITA', ''),
(1185, 20, 'SAN JOSÉ AYUQUILA', ''),
(1186, 20, 'SAN JOSÉ CHILTEPEC', ''),
(1187, 20, 'SAN JOSÉ DEL PEÑASCO', ''),
(1188, 20, 'SAN JOSÉ ESTANCIA GRANDE', ''),
(1189, 20, 'SAN JOSÉ INDEPENDENCIA', ''),
(1190, 20, 'SAN JOSÉ LACHIGUIRI', ''),
(1191, 20, 'SAN JOSÉ TENANGO', ''),
(1192, 20, 'SAN JUAN ACHIUTLA', ''),
(1193, 20, 'SAN JUAN ATEPEC', ''),
(1194, 20, 'ÁNIMAS TRUJANO', ''),
(1195, 20, 'SAN JUAN BAUTISTA ATATLAHUCA', ''),
(1196, 20, 'SAN JUAN BAUTISTA COIXTLAHUACA', ''),
(1197, 20, 'SAN JUAN BAUTISTA CUICATLÁN', ''),
(1198, 20, 'SAN JUAN BAUTISTA GUELACHE', ''),
(1199, 20, 'SAN JUAN BAUTISTA JAYACATLÁN', ''),
(1200, 20, 'SAN JUAN BAUTISTA LO DE SOTO', ''),
(1201, 20, 'SAN JUAN BAUTISTA SUCHITEPEC', ''),
(1202, 20, 'SAN JUAN BAUTISTA TLACOATZINTEPEC', ''),
(1203, 20, 'SAN JUAN BAUTISTA TLACHICHILCO', ''),
(1204, 20, 'SAN JUAN BAUTISTA TUXTEPEC', ''),
(1205, 20, 'SAN JUAN CACAHUATEPEC', ''),
(1206, 20, 'SAN JUAN CIENEGUILLA', ''),
(1207, 20, 'SAN JUAN COATZÓSPAM', ''),
(1208, 20, 'SAN JUAN COLORADO', ''),
(1209, 20, 'SAN JUAN COMALTEPEC', ''),
(1210, 20, 'SAN JUAN COTZOCÓN', ''),
(1211, 20, 'SAN JUAN CHICOMEZÚCHIL', ''),
(1212, 20, 'SAN JUAN CHILATECA', ''),
(1213, 20, 'SAN JUAN DEL ESTADO', ''),
(1214, 20, 'SAN JUAN DEL RÍO', ''),
(1215, 20, 'SAN JUAN DIUXI', ''),
(1216, 20, 'SAN JUAN EVANGELISTA ANALCO', ''),
(1217, 20, 'SAN JUAN GUELAVÍA', ''),
(1218, 20, 'SAN JUAN GUICHICOVI', ''),
(1219, 20, 'SAN JUAN IHUALTEPEC', ''),
(1220, 20, 'SAN JUAN JUQUILA MIXES', ''),
(1221, 20, 'SAN JUAN JUQUILA VIJANOS', ''),
(1222, 20, 'SAN JUAN LACHAO', ''),
(1223, 20, 'SAN JUAN LACHIGALLA', ''),
(1224, 20, 'SAN JUAN LAJARCIA', ''),
(1225, 20, 'SAN JUAN LALANA', ''),
(1226, 20, 'SAN JUAN DE LOS CUÉS', ''),
(1227, 20, 'SAN JUAN MAZATLÁN', ''),
(1228, 20, 'SAN JUAN MIXTEPEC', ''),
(1229, 20, 'SAN JUAN MIXTEPEC', ''),
(1230, 20, 'SAN JUAN ÑUMÍ', ''),
(1231, 20, 'SAN JUAN OZOLOTEPEC', ''),
(1232, 20, 'SAN JUAN PETLAPA', ''),
(1233, 20, 'SAN JUAN QUIAHIJE', ''),
(1234, 20, 'SAN JUAN QUIOTEPEC', ''),
(1235, 20, 'SAN JUAN SAYULTEPEC', ''),
(1236, 20, 'SAN JUAN TABAÁ', ''),
(1237, 20, 'SAN JUAN TAMAZOLA', ''),
(1238, 20, 'SAN JUAN TEITA', ''),
(1239, 20, 'SAN JUAN TEITIPAC', ''),
(1240, 20, 'SAN JUAN TEPEUXILA', ''),
(1241, 20, 'SAN JUAN TEPOSCOLULA', ''),
(1242, 20, 'SAN JUAN YAEÉ', ''),
(1243, 20, 'SAN JUAN YATZONA', ''),
(1244, 20, 'SAN JUAN YUCUITA', ''),
(1245, 20, 'SAN LORENZO', ''),
(1246, 20, 'SAN LORENZO ALBARRADAS', ''),
(1247, 20, 'SAN LORENZO CACAOTEPEC', ''),
(1248, 20, 'SAN LORENZO CUAUNECUILTITLA', ''),
(1249, 20, 'SAN LORENZO TEXMELÚCAN', ''),
(1250, 20, 'SAN LORENZO VICTORIA', ''),
(1251, 20, 'SAN LUCAS CAMOTLÁN', ''),
(1252, 20, 'SAN LUCAS OJITLÁN', ''),
(1253, 20, 'SAN LUCAS QUIAVINÍ', ''),
(1254, 20, 'SAN LUCAS ZOQUIÁPAM', ''),
(1255, 20, 'SAN LUIS AMATLÁN', ''),
(1256, 20, 'SAN MARCIAL OZOLOTEPEC', ''),
(1257, 20, 'SAN MARCOS ARTEAGA', ''),
(1258, 20, 'SAN MARTÍN DE LOS CANSECOS', ''),
(1259, 20, 'SAN MARTÍN HUAMELÚLPAM', ''),
(1260, 20, 'SAN MARTÍN ITUNYOSO', ''),
(1261, 20, 'SAN MARTÍN LACHILÁ', ''),
(1262, 20, 'SAN MARTÍN PERAS', ''),
(1263, 20, 'SAN MARTÍN TILCAJETE', ''),
(1264, 20, 'SAN MARTÍN TOXPALAN', ''),
(1265, 20, 'SAN MARTÍN ZACATEPEC', ''),
(1266, 20, 'SAN MATEO CAJONOS', ''),
(1267, 20, 'CAPULÁLPAM DE MÉNDEZ', ''),
(1268, 20, 'SAN MATEO DEL MAR', ''),
(1269, 20, 'SAN MATEO YOLOXOCHITLÁN', ''),
(1270, 20, 'SAN MATEO ETLATONGO', ''),
(1271, 20, 'SAN MATEO NEJÁPAM', ''),
(1272, 20, 'SAN MATEO PEÑASCO', ''),
(1273, 20, 'SAN MATEO PIÑAS', ''),
(1274, 20, 'SAN MATEO RÍO HONDO', ''),
(1275, 20, 'SAN MATEO SINDIHUI', ''),
(1276, 20, 'SAN MATEO TLAPILTEPEC', ''),
(1277, 20, 'SAN MELCHOR BETAZA', ''),
(1278, 20, 'SAN MIGUEL ACHIUTLA', ''),
(1279, 20, 'SAN MIGUEL AHUEHUETITLÁN', ''),
(1280, 20, 'SAN MIGUEL ALOÁPAM', ''),
(1281, 20, 'SAN MIGUEL AMATITLÁN', ''),
(1282, 20, 'SAN MIGUEL AMATLÁN', ''),
(1283, 20, 'SAN MIGUEL COATLÁN', ''),
(1284, 20, 'SAN MIGUEL CHICAHUA', ''),
(1285, 20, 'SAN MIGUEL CHIMALAPA', ''),
(1286, 20, 'SAN MIGUEL DEL PUERTO', ''),
(1287, 20, 'SAN MIGUEL DEL RÍO', ''),
(1288, 20, 'SAN MIGUEL EJUTLA', ''),
(1289, 20, 'SAN MIGUEL EL GRANDE', ''),
(1290, 20, 'SAN MIGUEL HUAUTLA', ''),
(1291, 20, 'SAN MIGUEL MIXTEPEC', ''),
(1292, 20, 'SAN MIGUEL PANIXTLAHUACA', ''),
(1293, 20, 'SAN MIGUEL PERAS', ''),
(1294, 20, 'SAN MIGUEL PIEDRAS', ''),
(1295, 20, 'SAN MIGUEL QUETZALTEPEC', ''),
(1296, 20, 'SAN MIGUEL SANTA FLOR', ''),
(1297, 20, 'VILLA SOLA DE VEGA', ''),
(1298, 20, 'SAN MIGUEL SOYALTEPEC', ''),
(1299, 20, 'SAN MIGUEL SUCHIXTEPEC', ''),
(1300, 20, 'VILLA TALEA DE CASTRO', ''),
(1301, 20, 'SAN MIGUEL TECOMATLÁN', ''),
(1302, 20, 'SAN MIGUEL TENANGO', ''),
(1303, 20, 'SAN MIGUEL TEQUIXTEPEC', ''),
(1304, 20, 'SAN MIGUEL TILQUIÁPAM', ''),
(1305, 20, 'SAN MIGUEL TLACAMAMA', ''),
(1306, 20, 'SAN MIGUEL TLACOTEPEC', ''),
(1307, 20, 'SAN MIGUEL TULANCINGO', ''),
(1308, 20, 'SAN MIGUEL YOTAO', ''),
(1309, 20, 'SAN NICOLÁS', ''),
(1310, 20, 'SAN NICOLÁS HIDALGO', ''),
(1311, 20, 'SAN PABLO COATLÁN', ''),
(1312, 20, 'SAN PABLO CUATRO VENADOS', ''),
(1313, 20, 'SAN PABLO ETLA', ''),
(1314, 20, 'SAN PABLO HUITZO', ''),
(1315, 20, 'SAN PABLO HUIXTEPEC', ''),
(1316, 20, 'SAN PABLO MACUILTIANGUIS', ''),
(1317, 20, 'SAN PABLO TIJALTEPEC', ''),
(1318, 20, 'SAN PABLO VILLA DE MITLA', ''),
(1319, 20, 'SAN PABLO YAGANIZA', ''),
(1320, 20, 'SAN PEDRO AMUZGOS', ''),
(1321, 20, 'SAN PEDRO APÓSTOL', ''),
(1322, 20, 'SAN PEDRO ATOYAC', ''),
(1323, 20, 'SAN PEDRO CAJONOS', ''),
(1324, 20, 'SAN PEDRO COXCALTEPEC CÁNTAROS', ''),
(1325, 20, 'SAN PEDRO COMITANCILLO', ''),
(1326, 20, 'SAN PEDRO EL ALTO', ''),
(1327, 20, 'SAN PEDRO HUAMELULA', ''),
(1328, 20, 'SAN PEDRO HUILOTEPEC', ''),
(1329, 20, 'SAN PEDRO IXCATLÁN', ''),
(1330, 20, 'SAN PEDRO IXTLAHUACA', ''),
(1331, 20, 'SAN PEDRO JALTEPETONGO', ''),
(1332, 20, 'SAN PEDRO JICAYÁN', ''),
(1333, 20, 'SAN PEDRO JOCOTIPAC', ''),
(1334, 20, 'SAN PEDRO JUCHATENGO', ''),
(1335, 20, 'SAN PEDRO MÁRTIR', ''),
(1336, 20, 'SAN PEDRO MÁRTIR QUIECHAPA', ''),
(1337, 20, 'SAN PEDRO MÁRTIR YUCUXACO', ''),
(1338, 20, 'SAN PEDRO MIXTEPEC', ''),
(1339, 20, 'SAN PEDRO MIXTEPEC', ''),
(1340, 20, 'SAN PEDRO MOLINOS', ''),
(1341, 20, 'SAN PEDRO NOPALA', ''),
(1342, 20, 'SAN PEDRO OCOPETATILLO', ''),
(1343, 20, 'SAN PEDRO OCOTEPEC', ''),
(1344, 20, 'SAN PEDRO POCHUTLA', ''),
(1345, 20, 'SAN PEDRO QUIATONI', ''),
(1346, 20, 'SAN PEDRO SOCHIÁPAM', ''),
(1347, 20, 'SAN PEDRO TAPANATEPEC', ''),
(1348, 20, 'SAN PEDRO TAVICHE', ''),
(1349, 20, 'SAN PEDRO TEOZACOALCO', ''),
(1350, 20, 'SAN PEDRO TEUTILA', ''),
(1351, 20, 'SAN PEDRO TIDAÁ', ''),
(1352, 20, 'SAN PEDRO TOPILTEPEC', ''),
(1353, 20, 'SAN PEDRO TOTOLÁPAM', ''),
(1354, 20, 'VILLA DE TUTUTEPEC', ''),
(1355, 20, 'SAN PEDRO YANERI', ''),
(1356, 20, 'SAN PEDRO YÓLOX', ''),
(1357, 20, 'SAN PEDRO Y SAN PABLO AYUTLA', ''),
(1358, 20, 'VILLA DE ETLA', ''),
(1359, 20, 'SAN PEDRO Y SAN PABLO TEPOSCOLULA', ''),
(1360, 20, 'SAN PEDRO Y SAN PABLO TEQUIXTEPEC', ''),
(1361, 20, 'SAN PEDRO YUCUNAMA', ''),
(1362, 20, 'SAN RAYMUNDO JALPAN', ''),
(1363, 20, 'SAN SEBASTIÁN ABASOLO', ''),
(1364, 20, 'SAN SEBASTIÁN COATLÁN', ''),
(1365, 20, 'SAN SEBASTIÁN IXCAPA', ''),
(1366, 20, 'SAN SEBASTIÁN NICANANDUTA', ''),
(1367, 20, 'SAN SEBASTIÁN RÍO HONDO', ''),
(1368, 20, 'SAN SEBASTIÁN TECOMAXTLAHUACA', ''),
(1369, 20, 'SAN SEBASTIÁN TEITIPAC', ''),
(1370, 20, 'SAN SEBASTIÁN TUTLA', ''),
(1371, 20, 'SAN SIMÓN ALMOLONGAS', ''),
(1372, 20, 'SAN SIMÓN ZAHUATLÁN', ''),
(1373, 20, 'SANTA ANA', ''),
(1374, 20, 'SANTA ANA ATEIXTLAHUACA', ''),
(1375, 20, 'SANTA ANA CUAUHTÉMOC', ''),
(1376, 20, 'SANTA ANA DEL VALLE', ''),
(1377, 20, 'SANTA ANA TAVELA', ''),
(1378, 20, 'SANTA ANA TLAPACOYAN', ''),
(1379, 20, 'SANTA ANA YARENI', ''),
(1380, 20, 'SANTA ANA ZEGACHE', ''),
(1381, 20, 'SANTA CATALINA QUIERÍ', ''),
(1382, 20, 'SANTA CATARINA CUIXTLA', ''),
(1383, 20, 'SANTA CATARINA IXTEPEJI', ''),
(1384, 20, 'SANTA CATARINA JUQUILA', ''),
(1385, 20, 'SANTA CATARINA LACHATAO', ''),
(1386, 20, 'SANTA CATARINA LOXICHA', ''),
(1387, 20, 'SANTA CATARINA MECHOACÁN', ''),
(1388, 20, 'SANTA CATARINA MINAS', ''),
(1389, 20, 'SANTA CATARINA QUIANÉ', ''),
(1390, 20, 'SANTA CATARINA TAYATA', ''),
(1391, 20, 'SANTA CATARINA TICUÁ', ''),
(1392, 20, 'SANTA CATARINA YOSONOTÚ', ''),
(1393, 20, 'SANTA CATARINA ZAPOQUILA', ''),
(1394, 20, 'SANTA CRUZ ACATEPEC', ''),
(1395, 20, 'SANTA CRUZ AMILPAS', ''),
(1396, 20, 'SANTA CRUZ DE BRAVO', ''),
(1397, 20, 'SANTA CRUZ ITUNDUJIA', ''),
(1398, 20, 'SANTA CRUZ MIXTEPEC', ''),
(1399, 20, 'SANTA CRUZ NUNDACO', ''),
(1400, 20, 'SANTA CRUZ PAPALUTLA', ''),
(1401, 20, 'SANTA CRUZ TACACHE DE MINA', ''),
(1402, 20, 'SANTA CRUZ TACAHUA', ''),
(1403, 20, 'SANTA CRUZ TAYATA', ''),
(1404, 20, 'SANTA CRUZ XITLA', ''),
(1405, 20, 'SANTA CRUZ XOXOCOTLÁN', ''),
(1406, 20, 'SANTA CRUZ ZENZONTEPEC', ''),
(1407, 20, 'SANTA GERTRUDIS', ''),
(1408, 20, 'SANTA INÉS DEL MONTE', ''),
(1409, 20, 'SANTA INÉS YATZECHE', ''),
(1410, 20, 'SANTA LUCÍA DEL CAMINO', ''),
(1411, 20, 'SANTA LUCÍA MIAHUATLÁN', ''),
(1412, 20, 'SANTA LUCÍA MONTEVERDE', ''),
(1413, 20, 'SANTA LUCÍA OCOTLÁN', ''),
(1414, 20, 'SANTA MARÍA ALOTEPEC', ''),
(1415, 20, 'SANTA MARÍA APAZCO', ''),
(1416, 20, 'SANTA MARÍA LA ASUNCIÓN', ''),
(1417, 20, 'HEROICA CIUDAD DE TLAXIACO', ''),
(1418, 20, 'AYOQUEZCO DE ALDAMA', ''),
(1419, 20, 'SANTA MARÍA ATZOMPA', ''),
(1420, 20, 'SANTA MARÍA CAMOTLÁN', ''),
(1421, 20, 'SANTA MARÍA COLOTEPEC', ''),
(1422, 20, 'SANTA MARÍA CORTIJO', ''),
(1423, 20, 'SANTA MARÍA COYOTEPEC', ''),
(1424, 20, 'SANTA MARÍA CHACHOÁPAM', ''),
(1425, 20, 'VILLA DE CHILAPA DE DÍAZ', ''),
(1426, 20, 'SANTA MARÍA CHILCHOTLA', ''),
(1427, 20, 'SANTA MARÍA CHIMALAPA', ''),
(1428, 20, 'SANTA MARÍA DEL ROSARIO', ''),
(1429, 20, 'SANTA MARÍA DEL TULE', ''),
(1430, 20, 'SANTA MARÍA ECATEPEC', ''),
(1431, 20, 'SANTA MARÍA GUELACÉ', ''),
(1432, 20, 'SANTA MARÍA GUIENAGATI', ''),
(1433, 20, 'SANTA MARÍA HUATULCO', ''),
(1434, 20, 'SANTA MARÍA HUAZOLOTITLÁN', ''),
(1435, 20, 'SANTA MARÍA IPALAPA', ''),
(1436, 20, 'SANTA MARÍA IXCATLÁN', ''),
(1437, 20, 'SANTA MARÍA JACATEPEC', ''),
(1438, 20, 'SANTA MARÍA JALAPA DEL MARQUÉS', ''),
(1439, 20, 'SANTA MARÍA JALTIANGUIS', ''),
(1440, 20, 'SANTA MARÍA LACHIXÍO', ''),
(1441, 20, 'SANTA MARÍA MIXTEQUILLA', ''),
(1442, 20, 'SANTA MARÍA NATIVITAS', ''),
(1443, 20, 'SANTA MARÍA NDUAYACO', ''),
(1444, 20, 'SANTA MARÍA OZOLOTEPEC', ''),
(1445, 20, 'SANTA MARÍA PÁPALO', ''),
(1446, 20, 'SANTA MARÍA PEÑOLES', ''),
(1447, 20, 'SANTA MARÍA PETAPA', ''),
(1448, 20, 'SANTA MARÍA QUIEGOLANI', ''),
(1449, 20, 'SANTA MARÍA SOLA', ''),
(1450, 20, 'SANTA MARÍA TATALTEPEC', ''),
(1451, 20, 'SANTA MARÍA TECOMAVACA', ''),
(1452, 20, 'SANTA MARÍA TEMAXCALAPA', ''),
(1453, 20, 'SANTA MARÍA TEMAXCALTEPEC', ''),
(1454, 20, 'SANTA MARÍA TEOPOXCO', ''),
(1455, 20, 'SANTA MARÍA TEPANTLALI', ''),
(1456, 20, 'SANTA MARÍA TEXCATITLÁN', ''),
(1457, 20, 'SANTA MARÍA TLAHUITOLTEPEC', ''),
(1458, 20, 'SANTA MARÍA TLALIXTAC', ''),
(1459, 20, 'SANTA MARÍA TONAMECA', ''),
(1460, 20, 'SANTA MARÍA TOTOLAPILLA', ''),
(1461, 20, 'SANTA MARÍA XADANI', ''),
(1462, 20, 'SANTA MARÍA YALINA', ''),
(1463, 20, 'SANTA MARÍA YAVESÍA', ''),
(1464, 20, 'SANTA MARÍA YOLOTEPEC', ''),
(1465, 20, 'SANTA MARÍA YOSOYÚA', ''),
(1466, 20, 'SANTA MARÍA YUCUHITI', ''),
(1467, 20, 'SANTA MARÍA ZACATEPEC', ''),
(1468, 20, 'SANTA MARÍA ZANIZA', ''),
(1469, 20, 'SANTA MARÍA ZOQUITLÁN', ''),
(1470, 20, 'SANTIAGO AMOLTEPEC', ''),
(1471, 20, 'SANTIAGO APOALA', ''),
(1472, 20, 'SANTIAGO APÓSTOL', ''),
(1473, 20, 'SANTIAGO ASTATA', ''),
(1474, 20, 'SANTIAGO ATITLÁN', ''),
(1475, 20, 'SANTIAGO AYUQUILILLA', ''),
(1476, 20, 'SANTIAGO CACALOXTEPEC', ''),
(1477, 20, 'SANTIAGO CAMOTLÁN', ''),
(1478, 20, 'SANTIAGO COMALTEPEC', ''),
(1479, 20, 'SANTIAGO CHAZUMBA', ''),
(1480, 20, 'SANTIAGO CHOÁPAM', ''),
(1481, 20, 'SANTIAGO DEL RÍO', ''),
(1482, 20, 'SANTIAGO HUAJOLOTITLÁN', ''),
(1483, 20, 'SANTIAGO HUAUCLILLA', ''),
(1484, 20, 'SANTIAGO IHUITLÁN PLUMAS', ''),
(1485, 20, 'SANTIAGO IXCUINTEPEC', ''),
(1486, 20, 'SANTIAGO IXTAYUTLA', ''),
(1487, 20, 'SANTIAGO JAMILTEPEC', ''),
(1488, 20, 'SANTIAGO JOCOTEPEC', ''),
(1489, 20, 'SANTIAGO JUXTLAHUACA', ''),
(1490, 20, 'SANTIAGO LACHIGUIRI', ''),
(1491, 20, 'SANTIAGO LALOPA', ''),
(1492, 20, 'SANTIAGO LAOLLAGA', ''),
(1493, 20, 'SANTIAGO LAXOPA', ''),
(1494, 20, 'SANTIAGO LLANO GRANDE', ''),
(1495, 20, 'SANTIAGO MATATLÁN', ''),
(1496, 20, 'SANTIAGO MILTEPEC', ''),
(1497, 20, 'SANTIAGO MINAS', ''),
(1498, 20, 'SANTIAGO NACALTEPEC', ''),
(1499, 20, 'SANTIAGO NEJAPILLA', ''),
(1500, 20, 'SANTIAGO NUNDICHE', ''),
(1501, 20, 'SANTIAGO NUYOÓ', ''),
(1502, 20, 'SANTIAGO PINOTEPA NACIONAL', ''),
(1503, 20, 'SANTIAGO SUCHILQUITONGO', ''),
(1504, 20, 'SANTIAGO TAMAZOLA', ''),
(1505, 20, 'SANTIAGO TAPEXTLA', ''),
(1506, 20, 'VILLA TEJÚPAM DE LA UNIÓN', ''),
(1507, 20, 'SANTIAGO TENANGO', ''),
(1508, 20, 'SANTIAGO TEPETLAPA', ''),
(1509, 20, 'SANTIAGO TETEPEC', ''),
(1510, 20, 'SANTIAGO TEXCALCINGO', ''),
(1511, 20, 'SANTIAGO TEXTITLÁN', ''),
(1512, 20, 'SANTIAGO TILANTONGO', ''),
(1513, 20, 'SANTIAGO TILLO', ''),
(1514, 20, 'SANTIAGO TLAZOYALTEPEC', ''),
(1515, 20, 'SANTIAGO XANICA', ''),
(1516, 20, 'SANTIAGO XIACUÍ', ''),
(1517, 20, 'SANTIAGO YAITEPEC', ''),
(1518, 20, 'SANTIAGO YAVEO', ''),
(1519, 20, 'SANTIAGO YOLOMÉCATL', ''),
(1520, 20, 'SANTIAGO YOSONDÚA', ''),
(1521, 20, 'SANTIAGO YUCUYACHI', ''),
(1522, 20, 'SANTIAGO ZACATEPEC', ''),
(1523, 20, 'SANTIAGO ZOOCHILA', ''),
(1524, 20, 'NUEVO ZOQUIÁPAM', ''),
(1525, 20, 'SANTO DOMINGO INGENIO', ''),
(1526, 20, 'SANTO DOMINGO ALBARRADAS', ''),
(1527, 20, 'SANTO DOMINGO ARMENTA', ''),
(1528, 20, 'SANTO DOMINGO CHIHUITÁN', ''),
(1529, 20, 'SANTO DOMINGO DE MORELOS', ''),
(1530, 20, 'SANTO DOMINGO IXCATLÁN', ''),
(1531, 20, 'SANTO DOMINGO NUXAÁ', ''),
(1532, 20, 'SANTO DOMINGO OZOLOTEPEC', ''),
(1533, 20, 'SANTO DOMINGO PETAPA', ''),
(1534, 20, 'SANTO DOMINGO ROAYAGA', ''),
(1535, 20, 'SANTO DOMINGO TEHUANTEPEC', ''),
(1536, 20, 'SANTO DOMINGO TEOJOMULCO', ''),
(1537, 20, 'SANTO DOMINGO TEPUXTEPEC', ''),
(1538, 20, 'SANTO DOMINGO TLATAYÁPAM', ''),
(1539, 20, 'SANTO DOMINGO TOMALTEPEC', ''),
(1540, 20, 'SANTO DOMINGO TONALÁ', ''),
(1541, 20, 'SANTO DOMINGO TONALTEPEC', ''),
(1542, 20, 'SANTO DOMINGO XAGACÍA', ''),
(1543, 20, 'SANTO DOMINGO YANHUITLÁN', ''),
(1544, 20, 'SANTO DOMINGO YODOHINO', ''),
(1545, 20, 'SANTO DOMINGO ZANATEPEC', ''),
(1546, 20, 'SANTOS REYES NOPALA', ''),
(1547, 20, 'SANTOS REYES PÁPALO', ''),
(1548, 20, 'SANTOS REYES TEPEJILLO', ''),
(1549, 20, 'SANTOS REYES YUCUNÁ', ''),
(1550, 20, 'SANTO TOMÁS JALIEZA', ''),
(1551, 20, 'SANTO TOMÁS MAZALTEPEC', ''),
(1552, 20, 'SANTO TOMÁS OCOTEPEC', ''),
(1553, 20, 'SANTO TOMÁS TAMAZULAPAN', ''),
(1554, 20, 'SAN VICENTE COATLÁN', ''),
(1555, 20, 'SAN VICENTE LACHIXÍO', ''),
(1556, 20, 'SAN VICENTE NUÑÚ', ''),
(1557, 20, 'SILACAYOÁPAM', ''),
(1558, 20, 'SITIO DE XITLAPEHUA', ''),
(1559, 20, 'SOLEDAD ETLA', ''),
(1560, 20, 'VILLA DE TAMAZULÁPAM DEL PROGRESO', ''),
(1561, 20, 'TANETZE DE ZARAGOZA', ''),
(1562, 20, 'TANICHE', ''),
(1563, 20, 'TATALTEPEC DE VALDÉS', ''),
(1564, 20, 'TEOCOCUILCO DE MARCOS PÉREZ', ''),
(1565, 20, 'TEOTITLÁN DE FLORES MAGÓN', ''),
(1566, 20, 'TEOTITLÁN DEL VALLE', ''),
(1567, 20, 'TEOTONGO', ''),
(1568, 20, 'TEPELMEME VILLA DE MORELOS', ''),
(1569, 20, 'HEROICA VILLA TEZOATLÁN DE SEGURA Y LUNA, CUNA DE LA INDEPENDENCIA DE OAXACA', ''),
(1570, 20, 'SAN JERÓNIMO TLACOCHAHUAYA', ''),
(1571, 20, 'TLACOLULA DE MATAMOROS', ''),
(1572, 20, 'TLACOTEPEC PLUMAS', ''),
(1573, 20, 'TLALIXTAC DE CABRERA', ''),
(1574, 20, 'TOTONTEPEC VILLA DE MORELOS', ''),
(1575, 20, 'TRINIDAD ZAACHILA', ''),
(1576, 20, 'LA TRINIDAD VISTA HERMOSA', ''),
(1577, 20, 'UNIÓN HIDALGO', ''),
(1578, 20, 'VALERIO TRUJANO', ''),
(1579, 20, 'SAN JUAN BAUTISTA VALLE NACIONAL', ''),
(1580, 20, 'VILLA DÍAZ ORDAZ', ''),
(1581, 20, 'YAXE', ''),
(1582, 20, 'MAGDALENA YODOCONO DE PORFIRIO DÍAZ', ''),
(1583, 20, 'YOGANA', ''),
(1584, 20, 'YUTANDUCHI DE GUERRERO', ''),
(1585, 20, 'VILLA DE ZAACHILA', ''),
(1586, 20, 'SAN MATEO YUCUTINDOO', ''),
(1587, 20, 'ZAPOTITLÁN LAGUNAS', ''),
(1588, 20, 'ZAPOTITLÁN PALMAS', ''),
(1589, 20, 'SANTA INÉS DE ZARAGOZA', ''),
(1590, 20, 'ZIMATLÁN DE ÁLVAREZ', ''),
(1591, 21, 'ACAJETE', ''),
(1592, 21, 'ACATENO', ''),
(1593, 21, 'ACATLÁN', ''),
(1594, 21, 'ACATZINGO', ''),
(1595, 21, 'ACTEOPAN', ''),
(1596, 21, 'AHUACATLÁN', ''),
(1597, 21, 'AHUATLÁN', ''),
(1598, 21, 'AHUAZOTEPEC', ''),
(1599, 21, 'AHUEHUETITLA', ''),
(1600, 21, 'AJALPAN', ''),
(1601, 21, 'ALBINO ZERTUCHE', ''),
(1602, 21, 'ALJOJUCA', ''),
(1603, 21, 'ALTEPEXI', ''),
(1604, 21, 'AMIXTLÁN', ''),
(1605, 21, 'AMOZOC', '');
INSERT INTO `municipios` (`Id`, `estado`, `nombre`, `clave`) VALUES
(1606, 21, 'AQUIXTLA', ''),
(1607, 21, 'ATEMPAN', ''),
(1608, 21, 'ATEXCAL', ''),
(1609, 21, 'ATLIXCO', ''),
(1610, 21, 'ATOYATEMPAN', ''),
(1611, 21, 'ATZALA', ''),
(1612, 21, 'ATZITZIHUACÁN', ''),
(1613, 21, 'ATZITZINTLA', ''),
(1614, 21, 'AXUTLA', ''),
(1615, 21, 'AYOTOXCO DE GUERRERO', ''),
(1616, 21, 'CALPAN', ''),
(1617, 21, 'CALTEPEC', ''),
(1618, 21, 'CAMOCUAUTLA', ''),
(1619, 21, 'CAXHUACAN', ''),
(1620, 21, 'COATEPEC', ''),
(1621, 21, 'COATZINGO', ''),
(1622, 21, 'COHETZALA', ''),
(1623, 21, 'COHUECAN', ''),
(1624, 21, 'CORONANGO', ''),
(1625, 21, 'COXCATLÁN', ''),
(1626, 21, 'COYOMEAPAN', ''),
(1627, 21, 'COYOTEPEC', ''),
(1628, 21, 'CUAPIAXTLA DE MADERO', ''),
(1629, 21, 'CUAUTEMPAN', ''),
(1630, 21, 'CUAUTINCHÁN', ''),
(1631, 21, 'CUAUTLANCINGO', ''),
(1632, 21, 'CUAYUCA DE ANDRADE', ''),
(1633, 21, 'CUETZALAN DEL PROGRESO', ''),
(1634, 21, 'CUYOACO', ''),
(1635, 21, 'CHALCHICOMULA DE SESMA', ''),
(1636, 21, 'CHAPULCO', ''),
(1637, 21, 'CHIAUTLA', ''),
(1638, 21, 'CHIAUTZINGO', ''),
(1639, 21, 'CHICONCUAUTLA', ''),
(1640, 21, 'CHICHIQUILA', ''),
(1641, 21, 'CHIETLA', ''),
(1642, 21, 'CHIGMECATITLÁN', ''),
(1643, 21, 'CHIGNAHUAPAN', ''),
(1644, 21, 'CHIGNAUTLA', ''),
(1645, 21, 'CHILA', ''),
(1646, 21, 'CHILA DE LA SAL', ''),
(1647, 21, 'HONEY', ''),
(1648, 21, 'CHILCHOTLA', ''),
(1649, 21, 'CHINANTLA', ''),
(1650, 21, 'DOMINGO ARENAS', ''),
(1651, 21, 'ELOXOCHITLÁN', ''),
(1652, 21, 'EPATLÁN', ''),
(1653, 21, 'ESPERANZA', ''),
(1654, 21, 'FRANCISCO Z. MENA', ''),
(1655, 21, 'GENERAL FELIPE ÁNGELES', ''),
(1656, 21, 'GUADALUPE', ''),
(1657, 21, 'GUADALUPE VICTORIA', ''),
(1658, 21, 'HERMENEGILDO GALEANA', ''),
(1659, 21, 'HUAQUECHULA', ''),
(1660, 21, 'HUATLATLAUCA', ''),
(1661, 21, 'HUAUCHINANGO', ''),
(1662, 21, 'HUEHUETLA', ''),
(1663, 21, 'HUEHUETLÁN EL CHICO', ''),
(1664, 21, 'HUEJOTZINGO', ''),
(1665, 21, 'HUEYAPAN', ''),
(1666, 21, 'HUEYTAMALCO', ''),
(1667, 21, 'HUEYTLALPAN', ''),
(1668, 21, 'HUITZILAN DE SERDÁN', ''),
(1669, 21, 'HUITZILTEPEC', ''),
(1670, 21, 'ATLEQUIZAYAN', ''),
(1671, 21, 'IXCAMILPA DE GUERRERO', ''),
(1672, 21, 'IXCAQUIXTLA', ''),
(1673, 21, 'IXTACAMAXTITLÁN', ''),
(1674, 21, 'IXTEPEC', ''),
(1675, 21, 'IZÚCAR DE MATAMOROS', ''),
(1676, 21, 'JALPAN', ''),
(1677, 21, 'JOLALPAN', ''),
(1678, 21, 'JONOTLA', ''),
(1679, 21, 'JOPALA', ''),
(1680, 21, 'JUAN C. BONILLA', ''),
(1681, 21, 'JUAN GALINDO', ''),
(1682, 21, 'JUAN N. MÉNDEZ', ''),
(1683, 21, 'LAFRAGUA', ''),
(1684, 21, 'LIBRES', ''),
(1685, 21, 'LA MAGDALENA TLATLAUQUITEPEC', ''),
(1686, 21, 'MAZAPILTEPEC DE JUÁREZ', ''),
(1687, 21, 'MIXTLA', ''),
(1688, 21, 'MOLCAXAC', ''),
(1689, 21, 'CAÑADA MORELOS', ''),
(1690, 21, 'NAUPAN', ''),
(1691, 21, 'NAUZONTLA', ''),
(1692, 21, 'NEALTICAN', ''),
(1693, 21, 'NICOLÁS BRAVO', ''),
(1694, 21, 'NOPALUCAN', ''),
(1695, 21, 'OCOTEPEC', ''),
(1696, 21, 'OCOYUCAN', ''),
(1697, 21, 'OLINTLA', ''),
(1698, 21, 'ORIENTAL', ''),
(1699, 21, 'PAHUATLÁN', ''),
(1700, 21, 'PALMAR DE BRAVO', ''),
(1701, 21, 'PANTEPEC', ''),
(1702, 21, 'PETLALCINGO', ''),
(1703, 21, 'PIAXTLA', ''),
(1704, 21, 'PUEBLA', ''),
(1705, 21, 'QUECHOLAC', ''),
(1706, 21, 'QUIMIXTLÁN', ''),
(1707, 21, 'RAFAEL LARA GRAJALES', ''),
(1708, 21, 'LOS REYES DE JUÁREZ', ''),
(1709, 21, 'SAN ANDRÉS CHOLULA', ''),
(1710, 21, 'SAN ANTONIO CAÑADA', ''),
(1711, 21, 'SAN DIEGO LA MESA TOCHIMILTZINGO', ''),
(1712, 21, 'SAN FELIPE TEOTLALCINGO', ''),
(1713, 21, 'SAN FELIPE TEPATLÁN', ''),
(1714, 21, 'SAN GABRIEL CHILAC', ''),
(1715, 21, 'SAN GREGORIO ATZOMPA', ''),
(1716, 21, 'SAN JERÓNIMO TECUANIPAN', ''),
(1717, 21, 'SAN JERÓNIMO XAYACATLÁN', ''),
(1718, 21, 'SAN JOSÉ CHIAPA', ''),
(1719, 21, 'SAN JOSÉ MIAHUATLÁN', ''),
(1720, 21, 'SAN JUAN ATENCO', ''),
(1721, 21, 'SAN JUAN ATZOMPA', ''),
(1722, 21, 'SAN MARTÍN TEXMELUCAN', ''),
(1723, 21, 'SAN MARTÍN TOTOLTEPEC', ''),
(1724, 21, 'SAN MATÍAS TLALANCALECA', ''),
(1725, 21, 'SAN MIGUEL IXITLÁN', ''),
(1726, 21, 'SAN MIGUEL XOXTLA', ''),
(1727, 21, 'SAN NICOLÁS BUENOS AIRES', ''),
(1728, 21, 'SAN NICOLÁS DE LOS RANCHOS', ''),
(1729, 21, 'SAN PABLO ANICANO', ''),
(1730, 21, 'SAN PEDRO CHOLULA', ''),
(1731, 21, 'SAN PEDRO YELOIXTLAHUACA', ''),
(1732, 21, 'SAN SALVADOR EL SECO', ''),
(1733, 21, 'SAN SALVADOR EL VERDE', ''),
(1734, 21, 'SAN SALVADOR HUIXCOLOTLA', ''),
(1735, 21, 'SAN SEBASTIÁN TLACOTEPEC', ''),
(1736, 21, 'SANTA CATARINA TLALTEMPAN', ''),
(1737, 21, 'SANTA INÉS AHUATEMPAN', ''),
(1738, 21, 'SANTA ISABEL CHOLULA', ''),
(1739, 21, 'SANTIAGO MIAHUATLÁN', ''),
(1740, 21, 'HUEHUETLÁN EL GRANDE', ''),
(1741, 21, 'SANTO TOMÁS HUEYOTLIPAN', ''),
(1742, 21, 'SOLTEPEC', ''),
(1743, 21, 'TECALI DE HERRERA', ''),
(1744, 21, 'TECAMACHALCO', ''),
(1745, 21, 'TECOMATLÁN', ''),
(1746, 21, 'TEHUACÁN', ''),
(1747, 21, 'TEHUITZINGO', ''),
(1748, 21, 'TENAMPULCO', ''),
(1749, 21, 'TEOPANTLÁN', ''),
(1750, 21, 'TEOTLALCO', ''),
(1751, 21, 'TEPANCO DE LÓPEZ', ''),
(1752, 21, 'TEPANGO DE RODRÍGUEZ', ''),
(1753, 21, 'TEPATLAXCO DE HIDALGO', ''),
(1754, 21, 'TEPEACA', ''),
(1755, 21, 'TEPEMAXALCO', ''),
(1756, 21, 'TEPEOJUMA', ''),
(1757, 21, 'TEPETZINTLA', ''),
(1758, 21, 'TEPEXCO', ''),
(1759, 21, 'TEPEXI DE RODRÍGUEZ', ''),
(1760, 21, 'TEPEYAHUALCO', ''),
(1761, 21, 'TEPEYAHUALCO DE CUAUHTÉMOC', ''),
(1762, 21, 'TETELA DE OCAMPO', ''),
(1763, 21, 'TETELES DE AVILA CASTILLO', ''),
(1764, 21, 'TEZIUTLÁN', ''),
(1765, 21, 'TIANGUISMANALCO', ''),
(1766, 21, 'TILAPA', ''),
(1767, 21, 'TLACOTEPEC DE BENITO JUÁREZ', ''),
(1768, 21, 'TLACUILOTEPEC', ''),
(1769, 21, 'TLACHICHUCA', ''),
(1770, 21, 'TLAHUAPAN', ''),
(1771, 21, 'TLALTENANGO', ''),
(1772, 21, 'TLANEPANTLA', ''),
(1773, 21, 'TLAOLA', ''),
(1774, 21, 'TLAPACOYA', ''),
(1775, 21, 'TLAPANALÁ', ''),
(1776, 21, 'TLATLAUQUITEPEC', ''),
(1777, 21, 'TLAXCO', ''),
(1778, 21, 'TOCHIMILCO', ''),
(1779, 21, 'TOCHTEPEC', ''),
(1780, 21, 'TOTOLTEPEC DE GUERRERO', ''),
(1781, 21, 'TULCINGO', ''),
(1782, 21, 'TUZAMAPAN DE GALEANA', ''),
(1783, 21, 'TZICATLACOYAN', ''),
(1784, 21, 'VENUSTIANO CARRANZA', ''),
(1785, 21, 'VICENTE GUERRERO', ''),
(1786, 21, 'XAYACATLÁN DE BRAVO', ''),
(1787, 21, 'XICOTEPEC', ''),
(1788, 21, 'XICOTLÁN', ''),
(1789, 21, 'XIUTETELCO', ''),
(1790, 21, 'XOCHIAPULCO', ''),
(1791, 21, 'XOCHILTEPEC', ''),
(1792, 21, 'XOCHITLÁN DE VICENTE SUÁREZ', ''),
(1793, 21, 'XOCHITLÁN TODOS SANTOS', ''),
(1794, 21, 'YAONÁHUAC', ''),
(1795, 21, 'YEHUALTEPEC', ''),
(1796, 21, 'ZACAPALA', ''),
(1797, 21, 'ZACAPOAXTLA', ''),
(1798, 21, 'ZACATLÁN', ''),
(1799, 21, 'ZAPOTITLÁN', ''),
(1800, 21, 'ZAPOTITLÁN DE MÉNDEZ', ''),
(1801, 21, 'ZARAGOZA', ''),
(1802, 21, 'ZAUTLA', ''),
(1803, 21, 'ZIHUATEUTLA', ''),
(1804, 21, 'ZINACATEPEC', ''),
(1805, 21, 'ZONGOZOTLA', ''),
(1806, 21, 'ZOQUIAPAN', ''),
(1807, 21, 'ZOQUITLÁN', ''),
(1808, 22, 'AMEALCO DE BONFIL', ''),
(1809, 22, 'PINAL DE AMOLES', ''),
(1810, 22, 'ARROYO SECO', ''),
(1811, 22, 'CADEREYTA DE MONTES', ''),
(1812, 22, 'COLÓN', ''),
(1813, 22, 'CORREGIDORA', ''),
(1814, 22, 'EZEQUIEL MONTES', ''),
(1815, 22, 'HUIMILPAN', ''),
(1816, 22, 'JALPAN DE SERRA', ''),
(1817, 22, 'LANDA DE MATAMOROS', ''),
(1818, 22, 'EL MARQUÉS', ''),
(1819, 22, 'PEDRO ESCOBEDO', ''),
(1820, 22, 'PEÑAMILLER', ''),
(1821, 22, 'QUERÉTARO', ''),
(1822, 22, 'SAN JOAQUÍN', ''),
(1823, 22, 'SAN JUAN DEL RÍO', ''),
(1824, 22, 'TEQUISQUIAPAN', ''),
(1825, 22, 'TOLIMÁN', ''),
(1826, 23, 'COZUMEL', ''),
(1827, 23, 'FELIPE CARRILLO PUERTO', ''),
(1828, 23, 'ISLA MUJERES', ''),
(1829, 23, 'OTHÓN P. BLANCO', ''),
(1830, 23, 'BENITO JUÁREZ', ''),
(1831, 23, 'JOSÉ MARÍA MORELOS', ''),
(1832, 23, 'LÁZARO CÁRDENAS', ''),
(1833, 23, 'SOLIDARIDAD', ''),
(1834, 23, 'TULUM', ''),
(1835, 23, 'BACALAR', ''),
(1836, 23, 'PUERTO MORELOS', ''),
(1837, 24, 'AHUALULCO', ''),
(1838, 24, 'ALAQUINES', ''),
(1839, 24, 'AQUISMÓN', ''),
(1840, 24, 'ARMADILLO DE LOS INFANTE', ''),
(1841, 24, 'CÁRDENAS', ''),
(1842, 24, 'CATORCE', ''),
(1843, 24, 'CEDRAL', ''),
(1844, 24, 'CERRITOS', ''),
(1845, 24, 'CERRO DE SAN PEDRO', ''),
(1846, 24, 'CIUDAD DEL MAÍZ', ''),
(1847, 24, 'CIUDAD FERNÁNDEZ', ''),
(1848, 24, 'TANCANHUITZ', ''),
(1849, 24, 'CIUDAD VALLES', ''),
(1850, 24, 'COXCATLÁN', ''),
(1851, 24, 'CHARCAS', ''),
(1852, 24, 'EBANO', ''),
(1853, 24, 'GUADALCÁZAR', ''),
(1854, 24, 'HUEHUETLÁN', ''),
(1855, 24, 'LAGUNILLAS', ''),
(1856, 24, 'MATEHUALA', ''),
(1857, 24, 'MEXQUITIC DE CARMONA', ''),
(1858, 24, 'MOCTEZUMA', ''),
(1859, 24, 'RAYÓN', ''),
(1860, 24, 'RIOVERDE', ''),
(1861, 24, 'SALINAS', ''),
(1862, 24, 'SAN ANTONIO', ''),
(1863, 24, 'SAN CIRO DE ACOSTA', ''),
(1864, 24, 'SAN LUIS POTOSÍ', ''),
(1865, 24, 'SAN MARTÍN CHALCHICUAUTLA', ''),
(1866, 24, 'SAN NICOLÁS TOLENTINO', ''),
(1867, 24, 'SANTA CATARINA', ''),
(1868, 24, 'SANTA MARÍA DEL RÍO', ''),
(1869, 24, 'SANTO DOMINGO', ''),
(1870, 24, 'SAN VICENTE TANCUAYALAB', ''),
(1871, 24, 'SOLEDAD DE GRACIANO SÁNCHEZ', ''),
(1872, 24, 'TAMASOPO', ''),
(1873, 24, 'TAMAZUNCHALE', ''),
(1874, 24, 'TAMPACÁN', ''),
(1875, 24, 'TAMPAMOLÓN CORONA', ''),
(1876, 24, 'TAMUÍN', ''),
(1877, 24, 'TANLAJÁS', ''),
(1878, 24, 'TANQUIÁN DE ESCOBEDO', ''),
(1879, 24, 'TIERRA NUEVA', ''),
(1880, 24, 'VANEGAS', ''),
(1881, 24, 'VENADO', ''),
(1882, 24, 'VILLA DE ARRIAGA', ''),
(1883, 24, 'VILLA DE GUADALUPE', ''),
(1884, 24, 'VILLA DE LA PAZ', ''),
(1885, 24, 'VILLA DE RAMOS', ''),
(1886, 24, 'VILLA DE REYES', ''),
(1887, 24, 'VILLA HIDALGO', ''),
(1888, 24, 'VILLA JUÁREZ', ''),
(1889, 24, 'AXTLA DE TERRAZAS', ''),
(1890, 24, 'XILITLA', ''),
(1891, 24, 'ZARAGOZA', ''),
(1892, 24, 'VILLA DE ARISTA', ''),
(1893, 24, 'MATLAPA', ''),
(1894, 24, 'EL NARANJO', ''),
(1895, 26, 'AHOME', ''),
(1896, 26, 'ANGOSTURA', ''),
(1897, 26, 'BADIRAGUATO', ''),
(1898, 26, 'CONCORDIA', ''),
(1899, 26, 'COSALÁ', ''),
(1900, 26, 'CULIACÁN', ''),
(1901, 26, 'CHOIX', ''),
(1902, 26, 'ELOTA', ''),
(1903, 26, 'ESCUINAPA', ''),
(1904, 26, 'EL FUERTE', ''),
(1905, 26, 'GUASAVE', ''),
(1906, 26, 'MAZATLÁN', ''),
(1907, 26, 'MOCORITO', ''),
(1908, 26, 'ROSARIO', ''),
(1909, 26, 'SALVADOR ALVARADO', ''),
(1910, 26, 'SAN IGNACIO', ''),
(1911, 26, 'SINALOA', ''),
(1912, 27, 'ACONCHI', ''),
(1913, 27, 'AGUA PRIETA', ''),
(1914, 27, 'ALAMOS', ''),
(1915, 27, 'ALTAR', ''),
(1916, 27, 'ARIVECHI', ''),
(1917, 27, 'ARIZPE', ''),
(1918, 27, 'ATIL', ''),
(1919, 27, 'BACADÉHUACHI', ''),
(1920, 27, 'BACANORA', ''),
(1921, 27, 'BACERAC', ''),
(1922, 27, 'BACOACHI', ''),
(1923, 27, 'BÁCUM', ''),
(1924, 27, 'BANÁMICHI', ''),
(1925, 27, 'BAVIÁCORA', ''),
(1926, 27, 'BAVISPE', ''),
(1927, 27, 'BENJAMÍN HILL', ''),
(1928, 27, 'CABORCA', ''),
(1929, 27, 'CAJEME', ''),
(1930, 27, 'CANANEA', ''),
(1931, 27, 'CARBÓ', ''),
(1932, 27, 'LA COLORADA', ''),
(1933, 27, 'CUCURPE', ''),
(1934, 27, 'CUMPAS', ''),
(1935, 27, 'DIVISADEROS', ''),
(1936, 27, 'EMPALME', ''),
(1937, 27, 'ETCHOJOA', ''),
(1938, 27, 'FRONTERAS', ''),
(1939, 27, 'GRANADOS', ''),
(1940, 27, 'GUAYMAS', ''),
(1941, 27, 'HERMOSILLO', ''),
(1942, 27, 'HUACHINERA', ''),
(1943, 27, 'HUÁSABAS', ''),
(1944, 27, 'HUATABAMPO', ''),
(1945, 27, 'HUÉPAC', ''),
(1946, 27, 'IMURIS', ''),
(1947, 27, 'MAGDALENA', ''),
(1948, 27, 'MAZATÁN', ''),
(1949, 27, 'MOCTEZUMA', ''),
(1950, 27, 'NACO', ''),
(1951, 27, 'NÁCORI CHICO', ''),
(1952, 27, 'NACOZARI DE GARCÍA', ''),
(1953, 27, 'NAVOJOA', ''),
(1954, 27, 'NOGALES', ''),
(1955, 27, 'ONAVAS', ''),
(1956, 27, 'OPODEPE', ''),
(1957, 27, 'OQUITOA', ''),
(1958, 27, 'PITIQUITO', ''),
(1959, 27, 'PUERTO PEÑASCO', ''),
(1960, 27, 'QUIRIEGO', ''),
(1961, 27, 'RAYÓN', ''),
(1962, 27, 'ROSARIO', ''),
(1963, 27, 'SAHUARIPA', ''),
(1964, 27, 'SAN FELIPE DE JESÚS', ''),
(1965, 27, 'SAN JAVIER', ''),
(1966, 27, 'SAN LUIS RÍO COLORADO', ''),
(1967, 27, 'SAN MIGUEL DE HORCASITAS', ''),
(1968, 27, 'SAN PEDRO DE LA CUEVA', ''),
(1969, 27, 'SANTA ANA', ''),
(1970, 27, 'SANTA CRUZ', ''),
(1971, 27, 'SÁRIC', ''),
(1972, 27, 'SOYOPA', ''),
(1973, 27, 'SUAQUI GRANDE', ''),
(1974, 27, 'TEPACHE', ''),
(1975, 27, 'TRINCHERAS', ''),
(1976, 27, 'TUBUTAMA', ''),
(1977, 27, 'URES', ''),
(1978, 27, 'VILLA HIDALGO', ''),
(1979, 27, 'VILLA PESQUEIRA', ''),
(1980, 27, 'YÉCORA', ''),
(1981, 27, 'GENERAL PLUTARCO ELÍAS CALLES', ''),
(1982, 27, 'BENITO JUÁREZ', ''),
(1983, 27, 'SAN IGNACIO RÍO MUERTO', ''),
(1984, 28, 'BALANCÁN', ''),
(1985, 28, 'CÁRDENAS', ''),
(1986, 28, 'CENTLA', ''),
(1987, 28, 'CENTRO', ''),
(1988, 28, 'COMALCALCO', ''),
(1989, 28, 'CUNDUACÁN', ''),
(1990, 28, 'EMILIANO ZAPATA', ''),
(1991, 28, 'HUIMANGUILLO', ''),
(1992, 28, 'JALAPA', ''),
(1993, 28, 'JALPA DE MÉNDEZ', ''),
(1994, 28, 'JONUTA', ''),
(1995, 28, 'MACUSPANA', ''),
(1996, 28, 'NACAJUCA', ''),
(1997, 28, 'PARAÍSO', ''),
(1998, 28, 'TACOTALPA', ''),
(1999, 28, 'TEAPA', ''),
(2000, 28, 'TENOSIQUE', ''),
(2001, 29, 'ABASOLO', ''),
(2002, 29, 'ALDAMA', ''),
(2003, 29, 'ALTAMIRA', ''),
(2004, 29, 'ANTIGUO MORELOS', ''),
(2005, 29, 'BURGOS', ''),
(2006, 29, 'BUSTAMANTE', ''),
(2007, 29, 'CAMARGO', ''),
(2008, 29, 'CASAS', ''),
(2009, 29, 'CIUDAD MADERO', ''),
(2010, 29, 'CRUILLAS', ''),
(2011, 29, 'GÓMEZ FARÍAS', ''),
(2012, 29, 'GONZÁLEZ', ''),
(2013, 29, 'GÜÉMEZ', ''),
(2014, 29, 'GUERRERO', ''),
(2015, 29, 'GUSTAVO DÍAZ ORDAZ', ''),
(2016, 29, 'HIDALGO', ''),
(2017, 29, 'JAUMAVE', ''),
(2018, 29, 'JIMÉNEZ', ''),
(2019, 29, 'LLERA', ''),
(2020, 29, 'MAINERO', ''),
(2021, 29, 'EL MANTE', ''),
(2022, 29, 'MATAMOROS', ''),
(2023, 29, 'MÉNDEZ', ''),
(2024, 29, 'MIER', ''),
(2025, 29, 'MIGUEL ALEMÁN', ''),
(2026, 29, 'MIQUIHUANA', ''),
(2027, 29, 'NUEVO LAREDO', ''),
(2028, 29, 'NUEVO MORELOS', ''),
(2029, 29, 'OCAMPO', ''),
(2030, 29, 'PADILLA', ''),
(2031, 29, 'PALMILLAS', ''),
(2032, 29, 'REYNOSA', ''),
(2033, 29, 'RÍO BRAVO', ''),
(2034, 29, 'SAN CARLOS', ''),
(2035, 29, 'SAN FERNANDO', ''),
(2036, 29, 'SAN NICOLÁS', ''),
(2037, 29, 'SOTO LA MARINA', ''),
(2038, 29, 'TAMPICO', ''),
(2039, 29, 'TULA', ''),
(2040, 29, 'VALLE HERMOSO', ''),
(2041, 29, 'VICTORIA', ''),
(2042, 29, 'VILLAGRÁN', ''),
(2043, 29, 'XICOTÉNCATL', ''),
(2044, 30, 'AMAXAC DE GUERRERO', ''),
(2045, 30, 'APETATITLÁN DE ANTONIO CARVAJAL', ''),
(2046, 30, 'ATLANGATEPEC', ''),
(2047, 30, 'ATLTZAYANCA', ''),
(2048, 30, 'APIZACO', ''),
(2049, 30, 'CALPULALPAN', ''),
(2050, 30, 'EL CARMEN TEQUEXQUITLA', ''),
(2051, 30, 'CUAPIAXTLA', ''),
(2052, 30, 'CUAXOMULCO', ''),
(2053, 30, 'CHIAUTEMPAN', ''),
(2054, 30, 'MUÑOZ DE DOMINGO ARENAS', ''),
(2055, 30, 'ESPAÑITA', ''),
(2056, 30, 'HUAMANTLA', ''),
(2057, 30, 'HUEYOTLIPAN', ''),
(2058, 30, 'IXTACUIXTLA DE MARIANO MATAMOROS', ''),
(2059, 30, 'IXTENCO', ''),
(2060, 30, 'MAZATECOCHCO DE JOSÉ MARÍA MORELOS', ''),
(2061, 30, 'CONTLA DE JUAN CUAMATZI', ''),
(2062, 30, 'TEPETITLA DE LARDIZÁBAL', ''),
(2063, 30, 'SANCTÓRUM DE LÁZARO CÁRDENAS', ''),
(2064, 30, 'NANACAMILPA DE MARIANO ARISTA', ''),
(2065, 30, 'ACUAMANALA DE MIGUEL HIDALGO', ''),
(2066, 30, 'NATÍVITAS', ''),
(2067, 30, 'PANOTLA', ''),
(2068, 30, 'SAN PABLO DEL MONTE', ''),
(2069, 30, 'SANTA CRUZ TLAXCALA', ''),
(2070, 30, 'TENANCINGO', ''),
(2071, 30, 'TEOLOCHOLCO', ''),
(2072, 30, 'TEPEYANCO', ''),
(2073, 30, 'TERRENATE', ''),
(2074, 30, 'TETLA DE LA SOLIDARIDAD', ''),
(2075, 30, 'TETLATLAHUCA', ''),
(2076, 30, 'TLAXCALA', ''),
(2077, 30, 'TLAXCO', ''),
(2078, 30, 'TOCATLÁN', ''),
(2079, 30, 'TOTOLAC', ''),
(2080, 30, 'ZILTLALTÉPEC DE TRINIDAD SÁNCHEZ SANTOS', ''),
(2081, 30, 'TZOMPANTEPEC', ''),
(2082, 30, 'XALOZTOC', ''),
(2083, 30, 'XALTOCAN', ''),
(2084, 30, 'PAPALOTLA DE XICOHTÉNCATL', ''),
(2085, 30, 'XICOHTZINCO', ''),
(2086, 30, 'YAUHQUEMEHCAN', ''),
(2087, 30, 'ZACATELCO', ''),
(2088, 30, 'BENITO JUÁREZ', ''),
(2089, 30, 'EMILIANO ZAPATA', ''),
(2090, 30, 'LÁZARO CÁRDENAS', ''),
(2091, 30, 'LA MAGDALENA TLALTELULCO', ''),
(2092, 30, 'SAN DAMIÁN TEXÓLOC', ''),
(2093, 30, 'SAN FRANCISCO TETLANOHCAN', ''),
(2094, 30, 'SAN JERÓNIMO ZACUALPAN', ''),
(2095, 30, 'SAN JOSÉ TEACALCO', ''),
(2096, 30, 'SAN JUAN HUACTZINCO', ''),
(2097, 30, 'SAN LORENZO AXOCOMANITLA', ''),
(2098, 30, 'SAN LUCAS TECOPILCO', ''),
(2099, 30, 'SANTA ANA NOPALUCAN', ''),
(2100, 30, 'SANTA APOLONIA TEACALCO', ''),
(2101, 30, 'SANTA CATARINA AYOMETLA', ''),
(2102, 30, 'SANTA CRUZ QUILEHTLA', ''),
(2103, 30, 'SANTA ISABEL XILOXOXTLA', ''),
(2104, 30, 'VERACRUZ', ''),
(2105, 31, 'ACAJETE', ''),
(2106, 31, 'ACATLÁN', ''),
(2107, 31, 'ACAYUCAN', ''),
(2108, 31, 'ACTOPAN', ''),
(2109, 31, 'ACULA', ''),
(2110, 31, 'ACULTZINGO', ''),
(2111, 31, 'CAMARÓN DE TEJEDA', ''),
(2112, 31, 'ALPATLÁHUAC', ''),
(2113, 31, 'ALTO LUCERO DE GUTIÉRREZ BARRIOS', ''),
(2114, 31, 'ALTOTONGA', ''),
(2115, 31, 'ALVARADO', ''),
(2116, 31, 'AMATITLÁN', ''),
(2117, 31, 'NARANJOS AMATLÁN', ''),
(2118, 31, 'AMATLÁN DE LOS REYES', ''),
(2119, 31, 'ANGEL R. CABADA', ''),
(2120, 31, 'LA ANTIGUA', ''),
(2121, 31, 'APAZAPAN', ''),
(2122, 31, 'AQUILA', ''),
(2123, 31, 'ASTACINGA', ''),
(2124, 31, 'ATLAHUILCO', ''),
(2125, 31, 'ATOYAC', ''),
(2126, 31, 'ATZACAN', ''),
(2127, 31, 'ATZALAN', ''),
(2128, 31, 'TLALTETELA', ''),
(2129, 31, 'AYAHUALULCO', ''),
(2130, 31, 'BANDERILLA', ''),
(2131, 31, 'BENITO JUÁREZ', ''),
(2132, 31, 'BOCA DEL RÍO', ''),
(2133, 31, 'CALCAHUALCO', ''),
(2134, 31, 'CAMERINO Z. MENDOZA', ''),
(2135, 31, 'CARRILLO PUERTO', ''),
(2136, 31, 'CATEMACO', ''),
(2137, 31, 'CAZONES DE HERRERA', ''),
(2138, 31, 'CERRO AZUL', ''),
(2139, 31, 'CITLALTÉPETL', ''),
(2140, 31, 'COACOATZINTLA', ''),
(2141, 31, 'COAHUITLÁN', ''),
(2142, 31, 'COATEPEC', ''),
(2143, 31, 'COATZACOALCOS', ''),
(2144, 31, 'COATZINTLA', ''),
(2145, 31, 'COETZALA', ''),
(2146, 31, 'COLIPA', ''),
(2147, 31, 'COMAPA', ''),
(2148, 31, 'CÓRDOBA', ''),
(2149, 31, 'COSAMALOAPAN DE CARPIO', ''),
(2150, 31, 'COSAUTLÁN DE CARVAJAL', ''),
(2151, 31, 'COSCOMATEPEC', ''),
(2152, 31, 'COSOLEACAQUE', ''),
(2153, 31, 'COTAXTLA', ''),
(2154, 31, 'COXQUIHUI', ''),
(2155, 31, 'COYUTLA', ''),
(2156, 31, 'CUICHAPA', ''),
(2157, 31, 'CUITLÁHUAC', ''),
(2158, 31, 'CHACALTIANGUIS', ''),
(2159, 31, 'CHALMA', ''),
(2160, 31, 'CHICONAMEL', ''),
(2161, 31, 'CHICONQUIACO', ''),
(2162, 31, 'CHICONTEPEC', ''),
(2163, 31, 'CHINAMECA', ''),
(2164, 31, 'CHINAMPA DE GOROSTIZA', ''),
(2165, 31, 'LAS CHOAPAS', ''),
(2166, 31, 'CHOCAMÁN', ''),
(2167, 31, 'CHONTLA', ''),
(2168, 31, 'CHUMATLÁN', ''),
(2169, 31, 'EMILIANO ZAPATA', ''),
(2170, 31, 'ESPINAL', ''),
(2171, 31, 'FILOMENO MATA', ''),
(2172, 31, 'FORTÍN', ''),
(2173, 31, 'GUTIÉRREZ ZAMORA', ''),
(2174, 31, 'HIDALGOTITLÁN', ''),
(2175, 31, 'HUATUSCO', ''),
(2176, 31, 'HUAYACOCOTLA', ''),
(2177, 31, 'HUEYAPAN DE OCAMPO', ''),
(2178, 31, 'HUILOAPAN DE CUAUHTÉMOC', ''),
(2179, 31, 'IGNACIO DE LA LLAVE', ''),
(2180, 31, 'ILAMATLÁN', ''),
(2181, 31, 'ISLA', ''),
(2182, 31, 'IXCATEPEC', ''),
(2183, 31, 'IXHUACÁN DE LOS REYES', ''),
(2184, 31, 'IXHUATLÁN DEL CAFÉ', ''),
(2185, 31, 'IXHUATLANCILLO', ''),
(2186, 31, 'IXHUATLÁN DEL SURESTE', ''),
(2187, 31, 'IXHUATLÁN DE MADERO', ''),
(2188, 31, 'IXMATLAHUACAN', ''),
(2189, 31, 'IXTACZOQUITLÁN', ''),
(2190, 31, 'JALACINGO', ''),
(2191, 31, 'XALAPA', ''),
(2192, 31, 'JALCOMULCO', ''),
(2193, 31, 'JÁLTIPAN', ''),
(2194, 31, 'JAMAPA', ''),
(2195, 31, 'JESÚS CARRANZA', ''),
(2196, 31, 'XICO', ''),
(2197, 31, 'JILOTEPEC', ''),
(2198, 31, 'JUAN RODRÍGUEZ CLARA', ''),
(2199, 31, 'JUCHIQUE DE FERRER', ''),
(2200, 31, 'LANDERO Y COSS', ''),
(2201, 31, 'LERDO DE TEJADA', ''),
(2202, 31, 'MAGDALENA', ''),
(2203, 31, 'MALTRATA', ''),
(2204, 31, 'MANLIO FABIO ALTAMIRANO', ''),
(2205, 31, 'MARIANO ESCOBEDO', ''),
(2206, 31, 'MARTÍNEZ DE LA TORRE', ''),
(2207, 31, 'MECATLÁN', ''),
(2208, 31, 'MECAYAPAN', ''),
(2209, 31, 'MEDELLÍN DE BRAVO', ''),
(2210, 31, 'MIAHUATLÁN', ''),
(2211, 31, 'LAS MINAS', ''),
(2212, 31, 'MINATITLÁN', ''),
(2213, 31, 'MISANTLA', ''),
(2214, 31, 'MIXTLA DE ALTAMIRANO', ''),
(2215, 31, 'MOLOACÁN', ''),
(2216, 31, 'NAOLINCO', ''),
(2217, 31, 'NARANJAL', ''),
(2218, 31, 'NAUTLA', ''),
(2219, 31, 'NOGALES', ''),
(2220, 31, 'OLUTA', ''),
(2221, 31, 'OMEALCA', ''),
(2222, 31, 'ORIZABA', ''),
(2223, 31, 'OTATITLÁN', ''),
(2224, 31, 'OTEAPAN', ''),
(2225, 31, 'OZULUAMA DE MASCAREÑAS', ''),
(2226, 31, 'PAJAPAN', ''),
(2227, 31, 'PÁNUCO', ''),
(2228, 31, 'PAPANTLA', ''),
(2229, 31, 'PASO DEL MACHO', ''),
(2230, 31, 'PASO DE OVEJAS', ''),
(2231, 31, 'LA PERLA', ''),
(2232, 31, 'PEROTE', ''),
(2233, 31, 'PLATÓN SÁNCHEZ', ''),
(2234, 31, 'PLAYA VICENTE', ''),
(2235, 31, 'POZA RICA DE HIDALGO', ''),
(2236, 31, 'LAS VIGAS DE RAMÍREZ', ''),
(2237, 31, 'PUEBLO VIEJO', ''),
(2238, 31, 'PUENTE NACIONAL', ''),
(2239, 31, 'RAFAEL DELGADO', ''),
(2240, 31, 'RAFAEL LUCIO', ''),
(2241, 31, 'LOS REYES', ''),
(2242, 31, 'RÍO BLANCO', ''),
(2243, 31, 'SALTABARRANCA', ''),
(2244, 31, 'SAN ANDRÉS TENEJAPAN', ''),
(2245, 31, 'SAN ANDRÉS TUXTLA', ''),
(2246, 31, 'SAN JUAN EVANGELISTA', ''),
(2247, 31, 'SANTIAGO TUXTLA', ''),
(2248, 31, 'SAYULA DE ALEMÁN', ''),
(2249, 31, 'SOCONUSCO', ''),
(2250, 31, 'SOCHIAPA', ''),
(2251, 31, 'SOLEDAD ATZOMPA', ''),
(2252, 31, 'SOLEDAD DE DOBLADO', ''),
(2253, 31, 'SOTEAPAN', ''),
(2254, 31, 'TAMALÍN', ''),
(2255, 31, 'TAMIAHUA', ''),
(2256, 31, 'TAMPICO ALTO', ''),
(2257, 31, 'TANCOCO', ''),
(2258, 31, 'TANTIMA', ''),
(2259, 31, 'TANTOYUCA', ''),
(2260, 31, 'TATATILA', ''),
(2261, 31, 'CASTILLO DE TEAYO', ''),
(2262, 31, 'TECOLUTLA', ''),
(2263, 31, 'TEHUIPANGO', ''),
(2264, 31, 'ÁLAMO TEMAPACHE', ''),
(2265, 31, 'TEMPOAL', ''),
(2266, 31, 'TENAMPA', ''),
(2267, 31, 'TENOCHTITLÁN', ''),
(2268, 31, 'TEOCELO', ''),
(2269, 31, 'TEPATLAXCO', ''),
(2270, 31, 'TEPETLÁN', ''),
(2271, 31, 'TEPETZINTLA', ''),
(2272, 31, 'TEQUILA', ''),
(2273, 31, 'JOSÉ AZUETA', ''),
(2274, 31, 'TEXCATEPEC', ''),
(2275, 31, 'TEXHUACÁN', ''),
(2276, 31, 'TEXISTEPEC', ''),
(2277, 31, 'TEZONAPA', ''),
(2278, 31, 'TIERRA BLANCA', ''),
(2279, 31, 'TIHUATLÁN', ''),
(2280, 31, 'TLACOJALPAN', ''),
(2281, 31, 'TLACOLULAN', ''),
(2282, 31, 'TLACOTALPAN', ''),
(2283, 31, 'TLACOTEPEC DE MEJÍA', ''),
(2284, 31, 'TLACHICHILCO', ''),
(2285, 31, 'TLALIXCOYAN', ''),
(2286, 31, 'TLALNELHUAYOCAN', ''),
(2287, 31, 'TLAPACOYAN', ''),
(2288, 31, 'TLAQUILPA', ''),
(2289, 31, 'TLILAPAN', ''),
(2290, 31, 'TOMATLÁN', ''),
(2291, 31, 'TONAYÁN', ''),
(2292, 31, 'TOTUTLA', ''),
(2293, 31, 'TUXPAN', ''),
(2294, 31, 'TUXTILLA', ''),
(2295, 31, 'URSULO GALVÁN', ''),
(2296, 31, 'VEGA DE ALATORRE', ''),
(2297, 31, 'VERACRUZ', ''),
(2298, 31, 'VILLA ALDAMA', ''),
(2299, 31, 'XOXOCOTLA', ''),
(2300, 31, 'YANGA', ''),
(2301, 31, 'YECUATLA', ''),
(2302, 31, 'ZACUALPAN', ''),
(2303, 31, 'ZARAGOZA', ''),
(2304, 31, 'ZENTLA', ''),
(2305, 31, 'ZONGOLICA', ''),
(2306, 31, 'ZONTECOMATLÁN DE LÓPEZ Y FUENTES', ''),
(2307, 31, 'ZOZOCOLCO DE HIDALGO', ''),
(2308, 31, 'AGUA DULCE', ''),
(2309, 31, 'EL HIGO', ''),
(2310, 31, 'NANCHITAL DE LÁZARO CÁRDENAS DEL RÍO', ''),
(2311, 31, 'TRES VALLES', ''),
(2312, 31, 'CARLOS A. CARRILLO', ''),
(2313, 31, 'TATAHUICAPAN DE JUÁREZ', ''),
(2314, 31, 'UXPANAPA', ''),
(2315, 31, 'SAN RAFAEL', ''),
(2316, 31, 'SANTIAGO SOCHIAPAN', ''),
(2317, 32, 'APOZOL', ''),
(2318, 32, 'APULCO', ''),
(2319, 32, 'ATOLINGA', ''),
(2320, 32, 'BENITO JUÁREZ', ''),
(2321, 32, 'CALERA', ''),
(2322, 32, 'CAÑITAS DE FELIPE PESCADOR', ''),
(2323, 32, 'CONCEPCIÓN DEL ORO', ''),
(2324, 32, 'CUAUHTÉMOC', ''),
(2325, 32, 'CHALCHIHUITES', ''),
(2326, 32, 'FRESNILLO', ''),
(2327, 32, 'TRINIDAD GARCÍA DE LA CADENA', ''),
(2328, 32, 'GENARO CODINA', ''),
(2329, 32, 'GENERAL ENRIQUE ESTRADA', ''),
(2330, 32, 'GENERAL FRANCISCO R. MURGUÍA', ''),
(2331, 32, 'EL PLATEADO DE JOAQUÍN AMARO', ''),
(2332, 32, 'GENERAL PÁNFILO NATERA', ''),
(2333, 32, 'GUADALUPE', ''),
(2334, 32, 'HUANUSCO', ''),
(2335, 32, 'JALPA', ''),
(2336, 32, 'JEREZ', ''),
(2337, 32, 'JIMÉNEZ DEL TEUL', ''),
(2338, 32, 'JUAN ALDAMA', ''),
(2339, 32, 'JUCHIPILA', ''),
(2340, 32, 'LORETO', ''),
(2341, 32, 'LUIS MOYA', ''),
(2342, 32, 'MAZAPIL', ''),
(2343, 32, 'MELCHOR OCAMPO', ''),
(2344, 32, 'MEZQUITAL DEL ORO', ''),
(2345, 32, 'MIGUEL AUZA', ''),
(2346, 32, 'MOMAX', ''),
(2347, 32, 'MONTE ESCOBEDO', ''),
(2348, 32, 'MORELOS', ''),
(2349, 32, 'MOYAHUA DE ESTRADA', ''),
(2350, 32, 'NOCHISTLÁN DE MEJÍA', ''),
(2351, 32, 'NORIA DE ÁNGELES', ''),
(2352, 32, 'OJOCALIENTE', ''),
(2353, 32, 'PÁNUCO', ''),
(2354, 32, 'PINOS', ''),
(2355, 32, 'RÍO GRANDE', ''),
(2356, 32, 'SAIN ALTO', ''),
(2357, 32, 'EL SALVADOR', ''),
(2358, 32, 'SOMBRERETE', ''),
(2359, 32, 'SUSTICACÁN', ''),
(2360, 32, 'TABASCO', ''),
(2361, 32, 'TEPECHITLÁN', ''),
(2362, 32, 'TEPETONGO', ''),
(2363, 32, 'TEÚL DE GONZÁLEZ ORTEGA', ''),
(2364, 32, 'TLALTENANGO DE SÁNCHEZ ROMÁN', ''),
(2365, 32, 'VALPARAÍSO', ''),
(2366, 32, 'VETAGRANDE', ''),
(2367, 32, 'VILLA DE COS', ''),
(2368, 32, 'VILLA GARCÍA', ''),
(2369, 32, 'VILLA GONZÁLEZ ORTEGA', ''),
(2370, 32, 'VILLA HIDALGO', ''),
(2371, 32, 'VILLANUEVA', ''),
(2372, 32, 'ZACATECAS', ''),
(2373, 32, 'TRANCOSO', ''),
(2374, 32, 'SANTA MARÍA DE LA PAZ', ''),
(2375, 25, 'SIN LOCALIDAD', '');

-- --------------------------------------------------------

--
-- Table structure for table `expedientes`
--

CREATE TABLE `expedientes` (
  `id` int  NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `num_empleado` varchar(100) DEFAULT NULL UNIQUE,
  `puesto` varchar(100) DEFAULT NULL,
  `estudios` varchar(100) DEFAULT NULL,
  `posee_correo` varchar(100) DEFAULT NULL,
  `correo_adicional` varchar(100) DEFAULT NULL UNIQUE,
  `calle` varchar(100) DEFAULT NULL,
  `num_interior` varchar(100) DEFAULT NULL,
  `num_exterior` varchar(100) DEFAULT NULL,
  `colonia` varchar(100) DEFAULT NULL,
  `estado_id` int DEFAULT NULL,
  `municipio_id` int DEFAULT NULL,
  `codigo` varchar(100) DEFAULT NULL,
  `tel_dom` varchar(100) DEFAULT NULL,
  `posee_telmov` varchar(100) DEFAULT NULL,
  `tel_mov` varchar(100) DEFAULT NULL,
  `posee_telempresa` varchar(100) DEFAULT NULL,
  `marcacion` varchar(100) DEFAULT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `sim` varchar(100) DEFAULT NULL,
  `numerored_empresa` varchar(100) DEFAULT NULL,
  `modelotel_empresa` varchar(100) DEFAULT NULL,
  `marcatel_empresa` varchar(100) DEFAULT NULL,
  `imei` varchar(200) DEFAULT NULL,
  `posee_laptop` varchar(200) DEFAULT NULL,
  `marca_laptop` varchar(200) DEFAULT NULL,
  `modelo_laptop` varchar(200) DEFAULT NULL,
  `serie_laptop` varchar(200) DEFAULT NULL,
  `casa_propia` varchar(100) DEFAULT NULL,
  `ecivil` varchar(100) DEFAULT NULL,
  `posee_retencion` varchar(100) DEFAULT NULL,
  `monto_mensual` float DEFAULT NULL,  
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_inicioc` date DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `salario_contrato` float DEFAULT NULL,
  `salario_fechaalta` float DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `curp` varchar(100) DEFAULT NULL,
  `nss` varchar(100) DEFAULT NULL,
  `rfc` varchar(100) DEFAULT NULL,
  `tipo_identificacion` varchar(100) DEFAULT NULL,
  `num_identificacion` varchar(100) DEFAULT NULL,
  `fecha_enuniforme` date DEFAULT NULL,
  `cantidad_polo` varchar(100) DEFAULT NULL,
  `talla_polo` varchar(100) DEFAULT NULL,
  `emergencia_nombre` varchar(100) DEFAULT NULL,
  `emergencia_apellidopat` varchar(100) DEFAULT NULL,
  `emergencia_apellidomat` varchar(100) DEFAULT NULL,
  `emergencia_relacion` varchar(100) DEFAULT NULL,
  `emergencia_telefono` varchar(100) DEFAULT NULL,
  `emergencia_nombre2` varchar(100) DEFAULT NULL,
  `emergencia_apellidopat2` varchar(100) DEFAULT NULL,
  `emergencia_apellidomat2` varchar(100) DEFAULT NULL,
  `emergencia_relacion2` varchar(100) DEFAULT NULL,
  `emergencia_telefono2` varchar(100) DEFAULT NULL,
  `capacitacion` varchar(100) DEFAULT NULL,
  `resultado_antidoping` varchar(100) DEFAULT NULL,
  `tipo_sangre` varchar(100) DEFAULT NULL,
  `vacante` varchar(100) DEFAULT NULL,
  `fam_dentro_empresa` varchar(100) DEFAULT NULL,
  `fam_nombre` varchar(100) DEFAULT NULL,
  `fam_apellidopat` varchar(100) DEFAULT NULL,
  `fam_apellidomat` varchar(100) DEFAULT NULL,
  `banco_personal` varchar(100) DEFAULT NULL,
  `cuenta_personal` varchar(100) DEFAULT NULL,
  `clabe_personal` varchar(100) DEFAULT NULL,
  `plastico_personal` varchar(100) DEFAULT NULL,
  `banco_nomina` varchar(100) DEFAULT NULL,
  `cuenta_nomina` varchar(100) DEFAULT NULL,
  `clabe_nomina` varchar(100) DEFAULT NULL,
  `plastico` varchar(100) DEFAULT NULL,
  `estatus_expediente` varchar(100) DEFAULT NULL,
  FOREIGN KEY (users_id) REFERENCES usuarios(id) ON DELETE CASCADE,
  FOREIGN KEY (estado_id) REFERENCES estados(id),
  FOREIGN KEY (municipio_id) REFERENCES municipios(Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expedientes_temporales`
--

CREATE TABLE `expedientes_temporales` (
  `id` int  NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `num_empleado` varchar(100) DEFAULT NULL UNIQUE,
  `puesto` varchar(100) DEFAULT NULL,
  `estudios` varchar(100) DEFAULT NULL,
  `posee_correo` varchar(100) DEFAULT NULL,
  `correo_adicional` varchar(100) DEFAULT NULL UNIQUE,
  `calle` varchar(100) DEFAULT NULL,
  `num_interior` varchar(100) DEFAULT NULL,
  `num_exterior` varchar(100) DEFAULT NULL,
  `colonia` varchar(100) DEFAULT NULL,
  `estado_id` int DEFAULT NULL,
  `municipio_id` int DEFAULT NULL,
  `codigo` varchar(100) DEFAULT NULL,
  `tel_dom` varchar(100) DEFAULT NULL,
  `posee_telmov` varchar(100) DEFAULT NULL,
  `tel_mov` varchar(100) DEFAULT NULL,
  `posee_telempresa` varchar(100) DEFAULT NULL,
  `marcacion` varchar(100) DEFAULT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `sim` varchar(100) DEFAULT NULL,
  `numerored_empresa` varchar(100) DEFAULT NULL,
  `modelotel_empresa` varchar(100) DEFAULT NULL,
  `marcatel_empresa` varchar(100) DEFAULT NULL,
  `imei` varchar(200) DEFAULT NULL,
  `posee_laptop` varchar(200) DEFAULT NULL,
  `marca_laptop` varchar(200) DEFAULT NULL,
  `modelo_laptop` varchar(200) DEFAULT NULL,
  `serie_laptop` varchar(200) DEFAULT NULL,
  `casa_propia` varchar(100) DEFAULT NULL,
  `ecivil` varchar(100) DEFAULT NULL,
  `posee_retencion` varchar(100) DEFAULT NULL,
  `monto_mensual` float DEFAULT NULL,  
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_inicioc` date DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `salario_contrato` float DEFAULT NULL,
  `salario_fechaalta` float DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `curp` varchar(100) DEFAULT NULL,
  `nss` varchar(100) DEFAULT NULL,
  `rfc` varchar(100) DEFAULT NULL,
  `tipo_identificacion` varchar(100) DEFAULT NULL,
  `num_identificacion` varchar(100) DEFAULT NULL,
  `fecha_enuniforme` date DEFAULT NULL,
  `cantidad_polo` varchar(100) DEFAULT NULL,
  `talla_polo` varchar(100) DEFAULT NULL,
  `emergencia_nombre` varchar(100) DEFAULT NULL,
  `emergencia_apellidopat` varchar(100) DEFAULT NULL,
  `emergencia_apellidomat` varchar(100) DEFAULT NULL,
  `emergencia_relacion` varchar(100) DEFAULT NULL,
  `emergencia_telefono` varchar(100) DEFAULT NULL,
  `emergencia_nombre2` varchar(100) DEFAULT NULL,
  `emergencia_apellidopat2` varchar(100) DEFAULT NULL,
  `emergencia_apellidomat2` varchar(100) DEFAULT NULL,
  `emergencia_relacion2` varchar(100) DEFAULT NULL,
  `emergencia_telefono2` varchar(100) DEFAULT NULL,
  `capacitacion` varchar(100) DEFAULT NULL,
  `resultado_antidoping` varchar(100) DEFAULT NULL,
  `tipo_sangre` varchar(100) DEFAULT NULL,
  `vacante` varchar(100) DEFAULT NULL,
  `fam_dentro_empresa` varchar(100) DEFAULT NULL,
  `fam_nombre` varchar(100) DEFAULT NULL,
  `fam_apellidopat` varchar(100) DEFAULT NULL,
  `fam_apellidomat` varchar(100) DEFAULT NULL,
  `banco_personal` varchar(100) DEFAULT NULL,
  `cuenta_personal` varchar(100) DEFAULT NULL,
  `clabe_personal` varchar(100) DEFAULT NULL,
  `plastico_personal` varchar(100) DEFAULT NULL,
  `banco_nomina` varchar(100) DEFAULT NULL,
  `cuenta_nomina` varchar(100) DEFAULT NULL,
  `clabe_nomina` varchar(100) DEFAULT NULL,
  `plastico` varchar(100) DEFAULT NULL,
  `estatus_expediente` varchar(100) DEFAULT NULL,
  FOREIGN KEY (users_id) REFERENCES usuarios(id) ON DELETE CASCADE,
  FOREIGN KEY (estado_id) REFERENCES estados(id),
  FOREIGN KEY (municipio_id) REFERENCES municipios(Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ref_laborales_temporales`
--

CREATE TABLE `ref_laborales_temporales` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `expediente_id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido_pat` varchar(100) NOT NULL,
  `apellido_mat` varchar(100) NOT NULL,
  `relacion` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  FOREIGN KEY (expediente_id) REFERENCES expedientes_temporales(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ben_bancarios_temporales`
--

CREATE TABLE `ben_bancarios_temporales` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `expediente_id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido_pat` varchar(100) NOT NULL,
  `apellido_mat` varchar(100) NOT NULL,
  `relacion` varchar(100) NOT NULL,
  `rfc` varchar(100) NOT NULL,
  `curp` varchar(100) NOT NULL,
  `porcentaje` varchar(100) NOT NULL,
  FOREIGN KEY (expediente_id) REFERENCES expedientes_temporales(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------    

-- TABLA BENEFICIARIOS TEMPORALES DE TOKEN --

CREATE TABLE `ben_bancarios_tokentemporales` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `expediente_id` int NOT NULL,
  `nombre` 		    varchar(100) NOT NULL,
  `apellido_pat`  varchar(100) NOT NULL,
  `apellido_mat`  varchar(100) NOT NULL,
  `relacion`   	  varchar(100) NOT NULL,
  `rfc` 	   	    varchar(100) NOT NULL,
  `curp` 	   	    varchar(100) NOT NULL,
  `porcentaje` 	  varchar(100) NOT NULL,
  FOREIGN KEY (expediente_id) REFERENCES expediente_temporal_token(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------    


-- TABLA REFERENCIAS TEMPORALES DE TOKEN --

CREATE TABLE `ref_laborales_tokentemporales` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `expediente_id` int NOT NULL,
  `nombre` 		    varchar(100) NOT NULL,
  `apellido_pat`  varchar(100) NOT NULL,
  `apellido_mat`  varchar(100) NOT NULL,
  `relacion` 	    varchar(100) NOT NULL,
  `telefono`	    varchar(100) NOT NULL,
  FOREIGN KEY (expediente_id) REFERENCES expediente_temporal_token(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------    

--
-- Table structure for table `ref_laborales`
--

CREATE TABLE `ref_laborales` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `expediente_id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido_pat` varchar(100) NOT NULL,
  `apellido_mat` varchar(100) NOT NULL,
  `relacion` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  FOREIGN KEY (expediente_id) REFERENCES expedientes(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ben_bancarios`
--

CREATE TABLE `ben_bancarios` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `expediente_id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido_pat` varchar(100) NOT NULL,
  `apellido_mat` varchar(100) NOT NULL,
  `relacion` varchar(100) NOT NULL,
  `rfc` varchar(100) NOT NULL,
  `curp` varchar(100) NOT NULL,
  `porcentaje` varchar(100) NOT NULL,
  FOREIGN KEY (expediente_id) REFERENCES expedientes(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- TABLA EXPEDIENTE TEMPORAL TOKEN --

CREATE TABLE `expediente_temporal_token` (
  `id` 		 				        int  NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `users_id` 				      int  NOT NULL,
  `num_empleado` 			    varchar(100) DEFAULT NULL UNIQUE,
  `puesto` 		 			      varchar(100) DEFAULT NULL,
  `estudios` 	 			      varchar(100) DEFAULT NULL,
  `posee_correo` 			    varchar(100) DEFAULT NULL,
  `correo_adicional` 		  varchar(100) DEFAULT NULL UNIQUE,
  `calle` 					      varchar(100) DEFAULT NULL,
  `num_interior` 			    varchar(100) DEFAULT NULL,
  `num_exterior` 			    varchar(100) DEFAULT NULL,
  `colonia` 				      varchar(100) DEFAULT NULL,
  `estado_id` 				    int DEFAULT NULL,
  `municipio_id` 			    int DEFAULT NULL,
  `codigo` 					      varchar(100) DEFAULT NULL,
  `tel_dom` 				      varchar(100) DEFAULT NULL,
  `posee_telmov` 			    varchar(100) DEFAULT NULL,
  `tel_mov` 				      varchar(100) DEFAULT NULL,
  `posee_telempresa` 		  varchar(100) DEFAULT NULL,
  `marcacion` 				    varchar(100) DEFAULT NULL,
  `serie` 					      varchar(100) DEFAULT NULL,
  `sim` 					        varchar(100) DEFAULT NULL,
  `numerored_empresa` 		varchar(100) DEFAULT NULL,
  `modelotel_empresa`		  varchar(100) DEFAULT NULL,
  `marcatel_empresa` 		  varchar(100) DEFAULT NULL,
  `imei` 					        varchar(200) DEFAULT NULL,
  `posee_laptop` 			    varchar(200) DEFAULT NULL,
  `marca_laptop` 			    varchar(200) DEFAULT NULL,
  `modelo_laptop` 			  varchar(200) DEFAULT NULL,
  `serie_laptop` 			    varchar(200) DEFAULT NULL,
  `casa_propia` 			    varchar(100) DEFAULT NULL,
  `ecivil` 					      varchar(100) DEFAULT NULL,
  `posee_retencion` 		  varchar(100) DEFAULT NULL,
  `monto_mensual` 			  float DEFAULT NULL,  
  `fecha_nacimiento` 		  date DEFAULT NULL,
  `fecha_inicioc` 			  date DEFAULT NULL,
  `fecha_alta` 				    date DEFAULT NULL,
  `salario_contrato` 		  float DEFAULT NULL,
  `salario_fechaalta` 		float DEFAULT NULL,
  `observaciones` 			  text DEFAULT NULL,
  `curp`					        varchar(100) DEFAULT NULL,
  `nss` 					        varchar(100) DEFAULT NULL,
  `rfc` 					        varchar(100) DEFAULT NULL,
  `tipo_identificacion` 	varchar(100) DEFAULT NULL,
  `num_identificacion` 		varchar(100) DEFAULT NULL,
  `fecha_enuniforme` 		  date DEFAULT NULL,
  `cantidad_polo` 			  varchar(100) DEFAULT NULL,
  `talla_polo` 			      varchar(100) DEFAULT NULL,
  `emergencia_nombre` 		  varchar(100) DEFAULT NULL,
  `emergencia_apellidopat`  varchar(100) DEFAULT NULL,
  `emergencia_apellidomat`  varchar(100) DEFAULT NULL,
  `emergencia_relacion` 	  varchar(100) DEFAULT NULL,
  `emergencia_telefono` 	  varchar(100) DEFAULT NULL,
  `emergencia_nombre2` 		  varchar(100) DEFAULT NULL,
  `emergencia_apellidopat2` varchar(100) DEFAULT NULL,
  `emergencia_apellidomat2` varchar(100) DEFAULT NULL,
  `emergencia_relacion2` 	  varchar(100) DEFAULT NULL,
  `emergencia_telefono2` 	  varchar(100) DEFAULT NULL,
  `capacitacion` 		 	      varchar(100) DEFAULT NULL,
  `resultado_antidoping` 	  varchar(100) DEFAULT NULL,
  `tipo_sangre` 	   		    varchar(100) DEFAULT NULL,
  `vacante` 		   		      varchar(100) DEFAULT NULL,
  `fam_dentro_empresa` 		  varchar(100) DEFAULT NULL,
  `fam_nombre`         		  varchar(100) DEFAULT NULL,
  `fam_apellidopat`    		  varchar(100) DEFAULT NULL,
  `fam_apellidomat`    		  varchar(100) DEFAULT NULL,
  `banco_personal` 	   		  varchar(100) DEFAULT NULL,
  `cuenta_personal`    		  varchar(100) DEFAULT NULL,
  `clabe_personal`     		  varchar(100) DEFAULT NULL,
  `plastico_personal`  		  varchar(100) DEFAULT NULL,
  `banco_nomina` 	   		    varchar(100) DEFAULT NULL,
  `cuenta_nomina` 	   		  varchar(100) DEFAULT NULL,
  `clabe_nomina` 	   		    varchar(100) DEFAULT NULL,
  `plastico` 	 	   		      varchar(100) DEFAULT NULL,
  `estatus_expediente` 		  varchar(100) DEFAULT NULL,
  FOREIGN KEY (users_id) 	 REFERENCES usuarios(id) ON DELETE CASCADE,
  FOREIGN KEY (estado_id) 	 REFERENCES estados(id),
  FOREIGN KEY (municipio_id) REFERENCES municipios(Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- --------------------------------------------------------    



-- TABLA EXPEDIENTES RELACIÓN --
CREATE TABLE `expedientes_relacion` (
			`id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
			`expediente_temporal_id`  int DEFAULT NULL,
			`expediente_principal_id` int DEFAULT NULL,
   			`exp_temtoken_id` 		  int DEFAULT NULL,
			`fecha_vinculacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			FOREIGN KEY (`expediente_temporal_id`) 	REFERENCES `expedientes_temporales`(`id`) ON DELETE CASCADE,
			FOREIGN KEY (`expediente_principal_id`) REFERENCES `expedientes`(`id`) ON DELETE CASCADE,
    		FOREIGN KEY (`exp_temtoken_id`) 		REFERENCES `expediente_temporal_token`(`id`) ON DELETE CASCADE
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------    


--
-- Table structure for table `estatus_empleado`
--

CREATE TABLE `estatus_empleado` (
  `id` int  NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `expedientes_id` int  NOT NULL,
  `situacion_del_empleado` varchar(100) NOT NULL,
  `estatus_del_empleado` varchar(100) NOT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  `fecha` date NOT NULL,
  FOREIGN KEY (expedientes_id) REFERENCES expedientes(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historial_estatus_empleado`
--

CREATE TABLE `historial_estatus_empleado` (
  `id` bigint  NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `estatus_empleado_id` int  NOT NULL,
  `vieja_situacion_del_empleado` varchar(100) NOT NULL,
  `viejo_estatus_del_empleado` varchar(100) NOT NULL,
  `viejo_motivo` varchar(100) DEFAULT NULL,
  `vieja_fecha` date DEFAULT NULL,
   FOREIGN KEY (estatus_empleado_id) REFERENCES estatus_empleado(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_papeleria`
--

CREATE TABLE `tipo_papeleria` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_papeleria`
--

INSERT INTO `tipo_papeleria` (`id`, `nombre`) VALUES
(1, 'CURRICULUM Y/O SOLICITUD'),
(2, 'EVALUACION PSICOMETRICA'),
(3, 'ACTA DE NACIMIENTO'),
(4, 'CURP'),
(5, 'CONSTANCIA SITUACION FISCAL'),
(6, 'IDENTIFICACION OFICIAL'),
(7, 'NUMERO DE SEGURO SOCIAL'),
(8, 'COMPROBANTE DE DOMICILIO RECIENTE'),
(9, 'COMPROBANTE DE ESTUDIOS'),
(10, 'CARTA DE RECOMENDACION LABORAL'),
(11, 'CARTA DE RECOMENDACION PERSONAL'),
(12, 'AVISO DE RETENCION CREDITO INFONAVIT'),
(13, 'ACTA DE MATRIMONIO'),
(14, 'IMAGEN DE DATOS BANCARIOS (SOLO PARA TECNICOS EN CAMPO)'),
(15, 'CONTRATO DETERMINADO'),
(16, 'PRESTADOR DE SERVICIOS'),
(17, 'CONVENIO DE CONFIDENCIALIDAD'),
(18, 'CONTRATO INDETERMINADO'),
(19, 'ALTA DE IMSS'),
(20, 'CONTRATO NOMINA BANCARIA'),
(21, 'REGLAMENTO INTERIOR DEL TRABAJO'),
(22, 'CARTA RESPONSIVA DE EQUIPOS ASIGNADOS'),
(23, 'MODIFICACION SALARIAL'),
(24, 'BAJA ANTE IMSS');

-- --------------------------------------------------------

--
-- Table structure for table `papeleria_empleado`
--

CREATE TABLE `papeleria_empleado` (
  `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `expediente_id` int NOT NULL,
  `tipo_archivo` int NOT NULL,
  `nombre_archivo` longtext NOT NULL,
  `identificador` longtext NOT NULL,
  `fecha_subida` datetime NOT NULL,
  FOREIGN KEY (expediente_id) REFERENCES expedientes(id) ON DELETE CASCADE,
  FOREIGN KEY (tipo_archivo) REFERENCES tipo_papeleria(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_papeleria_empleado`
--

CREATE TABLE `historial_papeleria_empleado` (
  `id` bigint  NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `expediente_id` int NOT NULL,
  `tipo_archivo` int  NOT NULL,
  `viejo_nombre_archivo` longtext NOT NULL,
  `viejo_identificador` longtext NOT NULL,
  `vieja_fecha_subida` datetime NOT NULL,
   FOREIGN KEY (expediente_id) REFERENCES expedientes(id) ON DELETE CASCADE,
   FOREIGN KEY (tipo_archivo) REFERENCES tipo_papeleria(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_estatus_incidencia`
--


CREATE TABLE `tipo_estatus_incidencia`(
   `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `descripcion_estado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Insert into para la tabla `tipo_estatus_incidencia`


INSERT INTO `tipo_estatus_incidencia` (`id`, `descripcion_estado`) VALUES
   (1, 'Aprobada'),
   (2, 'Cancelada'),
   (3, 'Rechazada'),
   (4, 'Pendiente'),
   (5, 'Sin jefe'),
   (6, 'Sin jerarquía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_incidencia`
--
	
CREATE TABLE `estatus_incidencia`(
   `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `tipo_estatus_id` int NOT NULL,
   `nombre` varchar(200) NOT NULL,
	FOREIGN KEY (tipo_estatus_id) REFERENCES tipo_estatus_incidencia(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- --------------------------------------------------------

-- Insert into para la tabla `estatus_incidencia`


INSERT INTO `estatus_incidencia` (`id`, `tipo_estatus_id`, `nombre`) VALUES
   (1, 1, "Esta incidencia ha sido aprobada"),
   (2, 2, "Esta incidencia ha sido cancelada"),
   (3, 3, "Esta incidencia ha sido rechazada"),
   (4, 4, "En proceso de evaluación"),
   (5, 5, "Ústed no tiene un superior"),
   (6, 6, "Ústed no tiene jerarquía");

-- --------------------------------------------------------								

--
-- Estructura de tabla para la tabla `solicitudes_incidencias`
--

CREATE TABLE `solicitudes_incidencias` (
  `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `fecha_solicitud` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `estatus` int DEFAULT 4,
   FOREIGN KEY (users_id) REFERENCES usuarios(id) ON DELETE CASCADE,
   FOREIGN KEY (estatus) REFERENCES estatus_incidencia(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones_incidencias`
--

CREATE TABLE `notificaciones_incidencias` (
	`id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`id_solicitud_incidencias` bigint NOT NULL,
	`id_notificado` int NOT NULL,
	FOREIGN KEY (id_solicitud_incidencias) REFERENCES solicitudes_incidencias(id) ON DELETE CASCADE,
	FOREIGN KEY (id_notificado) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incapacidades`
--

CREATE TABLE `incapacidades` (
  `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `numero_incapacidad` int NOT NULL,
  `serie_folio_incapacidad` varchar(100) NOT NULL,
  `tipo_incapacidad` varchar(100) NOT NULL,
  `ramo_seguro_incapacidad` varchar(100) NOT NULL,
  `periodo_incapacidad` varchar(100) NOT NULL,
  `motivo_incapacidad` varchar(100) NOT NULL,
  `observaciones_incapacidad` varchar(100) DEFAULT NULL,
  `nombre_justificante_incapacidad` longtext NOT NULL,
  `archivo_identificador_incapacidad` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_reglamentarios`
--

CREATE TABLE `permisos_reglamentarios` (
  `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `permiso_r` varchar(100) NOT NULL,
  `periodo_ausencia_r` varchar(100) NOT NULL,
  `motivo_permiso_r` varchar(100) DEFAULT NULL,
  `observaciones_permiso_r` varchar(100) DEFAULT NULL,
  `nombre_justificante_r` longtext NOT NULL,
  `identificador_justificante_r` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_no_reglamentarios`
--

CREATE TABLE `permisos_no_reglamentarios` (
  `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `permiso_nr` varchar(100) NOT NULL,
  `periodo_ausencia_nr` varchar(100) NOT NULL,
  `motivo_permiso_nr` varchar(100) DEFAULT NULL,
  `observaciones_permiso_nr` varchar(100) DEFAULT NULL,
  `posee_jpermiso_nr` varchar(100) NOT NULL,
  `nombre_justificante_nr` longtext DEFAULT NULL,
  `identificador_justificante_nr` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_solicitud_incidencias` bigint NOT NULL,
  `id_permiso_reglamentario` bigint DEFAULT NULL,
  `id_permiso_no_reglamentario` bigint DEFAULT NULL,
  `id_incapacidades` bigint DEFAULT NULL,
   FOREIGN KEY (id_solicitud_incidencias) REFERENCES solicitudes_incidencias(id) ON DELETE CASCADE,
   FOREIGN KEY (id_permiso_reglamentario) REFERENCES permisos_reglamentarios(id) ON DELETE CASCADE,
   FOREIGN KEY (id_permiso_no_reglamentario) REFERENCES permisos_no_reglamentarios(id) ON DELETE CASCADE,
   FOREIGN KEY (id_incapacidades) REFERENCES incapacidades(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias_acta_administrativas`
--

CREATE TABLE `incidencias_acta_administrativas` (
  `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `motivo_acta` varchar(100) NOT NULL,
  `observaciones_acta` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias_carta_compromiso`
--

CREATE TABLE `incidencias_carta_compromiso` (
  `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `resposabilidades_carta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias_administrativas`
--

CREATE TABLE `incidencias_administrativas` (
  `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `asignada_a` int NOT NULL,
  `fecha_expedicion` varchar(100) NOT NULL,
  `id_acta_administrativa` bigint DEFAULT NULL,
  `id_carta_compromiso` bigint DEFAULT NULL,
  `nombre_archivo_firmado` longtext DEFAULT NULL,
  `identificador_archivo_firmado` longtext DEFAULT NULL,
   FOREIGN KEY (users_id) REFERENCES usuarios(id) ON DELETE CASCADE,
   FOREIGN KEY (asignada_a) REFERENCES expedientes(id) ON DELETE CASCADE,
   FOREIGN KEY (id_acta_administrativa) REFERENCES incidencias_acta_administrativas(id) ON DELETE CASCADE,
   FOREIGN KEY (id_carta_compromiso) REFERENCES incidencias_carta_compromiso(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transicion_estatus_incidencia`
--


CREATE TABLE `transicion_estatus_incidencia`(
   `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `incidencias_id` bigint(20) NOT NULL,
   `estatus_actual` int NOT NULL,
   `estatus_siguiente` int NOT NULL,
   FOREIGN KEY (incidencias_id) REFERENCES incidencias(id) ON DELETE CASCADE,
   FOREIGN KEY (estatus_actual) REFERENCES estatus_incidencia(id),
   FOREIGN KEY (estatus_siguiente) REFERENCES estatus_incidencia(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_accion_incidencias`
--

CREATE TABLE `tipo_accion_incidencias`(
   `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `descripcion_accion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Insert into para la tabla `tipo_accion_incidencias`


INSERT INTO `tipo_accion_incidencias` (`id`, `descripcion_accion`) VALUES
   (1, 'Aprobar'),
   (2, 'Cancelar'),
   (3, 'Rechazar');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accion_incidencias`
--

CREATE TABLE `accion_incidencias`(
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `incidencias_id` bigint NOT NULL,
  `tipo_de_accion` int NOT NULL,
  `goce_de_sueldo` tinyint DEFAULT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `evaluado_por` int DEFAULT NULL,
  FOREIGN KEY (incidencias_id) REFERENCES incidencias(id) ON DELETE CASCADE,
  FOREIGN KEY (tipo_de_accion) REFERENCES tipo_accion_incidencias(id),
  FOREIGN KEY (evaluado_por) REFERENCES usuarios(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transición_acción_incidencias`
--

CREATE TABLE `transicion_accion_incidencias`(
   id_transicion int NOT NULL,
   id_accion int NOT NULL,
   FOREIGN KEY (id_transicion) REFERENCES transicion_estatus_incidencia(id) ON DELETE CASCADE,
   FOREIGN KEY (id_accion) REFERENCES accion_incidencias(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_estatus_vacaciones`
--


CREATE TABLE `tipo_estatus_vacaciones`(
   `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `descripcion_estado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

INSERT INTO `tipo_estatus_vacaciones` (`id`, `descripcion_estado`) VALUES
   (1, 'Aprobada'),
   (2, 'Cancelada'),
   (3, 'Rechazada'),
   (4, 'Pendiente'),
   (5, 'Sin jefe'),
   (6, 'Sin jerarquía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_vacaciones`
--
	
CREATE TABLE `estatus_vacaciones`(
   `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `tipo_estatus_vacaciones_id` int NOT NULL,
   `nombre` varchar(200) NOT NULL,
	FOREIGN KEY (tipo_estatus_vacaciones_id) REFERENCES tipo_estatus_vacaciones(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Insert into para la tabla `estatus_vacaciones`


INSERT INTO `estatus_vacaciones` (`id`, `tipo_estatus_vacaciones_id`, `nombre`) VALUES
   (1, 1, "Esta solicitud de vacaciones ha sido aprobada"),
   (2, 2, "Esta solicitud de vacaciones ha sido cancelada"),
   (3, 3, "Esta solicitud de vacaciones ha sido rechazada"),
   (4, 4, "En proceso de evaluación"),
   (5, 5, "Ústed no tiene un superior"),
   (6, 6, "Ústed no tiene jerarquía");

-- --------------------------------------------------------	

CREATE TABLE `solicitud_vacaciones` (
  `id` int  NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `users_id` int  NOT NULL,
  `periodo_solicitado` varchar(100) NOT NULL,
  `dias_solicitados` int NOT NULL,
  `fecha_solicitud` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `estatus` int DEFAULT 4,
  FOREIGN KEY (users_id) REFERENCES usuarios(id) ON DELETE CASCADE,
  FOREIGN KEY (estatus) REFERENCES estatus_vacaciones(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
	
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones_vacaciones`
--

CREATE TABLE `notificaciones_vacaciones` (
	`id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`id_solicitud_vacaciones` int NOT NULL,
	`id_notificado` int NOT NULL,
	FOREIGN KEY (id_solicitud_vacaciones) REFERENCES solicitud_vacaciones(id) ON DELETE CASCADE,
	FOREIGN KEY (id_notificado) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transicion_estatus_vacaciones`
--


CREATE TABLE `transicion_estatus_vacaciones`(
   `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `id_solicitud_vacaciones` int NOT NULL,
   `estatus_actual` int NOT NULL,
   `estatus_siguiente` int NOT NULL,
   FOREIGN KEY (id_solicitud_vacaciones) REFERENCES solicitud_vacaciones(id) ON DELETE CASCADE,
   FOREIGN KEY (estatus_actual) REFERENCES estatus_vacaciones(id),
   FOREIGN KEY (estatus_siguiente) REFERENCES estatus_vacaciones(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_accion_vacaciones`
--

CREATE TABLE `tipo_accion_vacaciones`(
   `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `descripcion_accion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Insert into para la tabla `tipo_accion_vacaciones`


INSERT INTO `tipo_accion_vacaciones` (`id`, `descripcion_accion`) VALUES
   (1, 'Aprobar'),
   (2, 'Cancelar'),
   (3, 'Rechazar');


-- --------------------------------------------------------	

--
-- Estructura de tabla para la tabla `accion_vacaciones`
--

CREATE TABLE `accion_vacaciones`(
	`id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`id_solicitud_vacaciones` int NOT NULL,
	`tipo_de_accion` int NOT NULL,
	`comentario` varchar(200) DEFAULT NULL,
	`evaluado_por` int DEFAULT NULL,
	 FOREIGN KEY (id_solicitud_vacaciones) REFERENCES solicitud_vacaciones(id) ON DELETE CASCADE,
	 FOREIGN KEY (tipo_de_accion) REFERENCES tipo_accion_vacaciones(id),
	 FOREIGN KEY (evaluado_por) REFERENCES usuarios(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transición_acción_vacaciones`
--

CREATE TABLE `transicion_accion_vacaciones`(
   id_transicion int NOT NULL,
   id_accion int NOT NULL,
   FOREIGN KEY (id_transicion) REFERENCES transicion_estatus_vacaciones(id) ON DELETE CASCADE,
   FOREIGN KEY (id_accion) REFERENCES accion_vacaciones(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura para la tabla `alertas`
--

CREATE TABLE `alertas` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `modificado_por` int DEFAULT NULL,
  `titulo_alerta` varchar(100) NOT NULL,
  `descripcion_alerta` longtext NOT NULL,
  `fecha_creacion_alerta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` datetime DEFAULT NULL,
  `filename_alertas` longtext DEFAULT NULL,
  `alertas_foto_identificador` longtext DEFAULT NULL,
  `filename_alertas_archivo` longtext DEFAULT NULL,
  `alertas_archivo_identificador` longtext DEFAULT NULL,
   FOREIGN KEY (users_id) REFERENCES usuarios(id) ON DELETE CASCADE,
   FOREIGN KEY (modificado_por) REFERENCES usuarios(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura para la tabla `avisos`
--

CREATE TABLE `avisos` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `modificado_por` int DEFAULT NULL,
  `titulo_aviso` varchar(100) NOT NULL,
  `descripcion_aviso` longtext NOT NULL,
  `fecha_creacion_aviso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` datetime DEFAULT NULL,
  `filename_avisos` longtext DEFAULT NULL,
  `avisos_foto_identificador` longtext DEFAULT NULL,
  `filename_archivo_aviso` longtext DEFAULT NULL,
  `aviso_archivo_identificador` longtext DEFAULT NULL,
   FOREIGN KEY (users_id) REFERENCES usuarios(id) ON DELETE CASCADE,
   FOREIGN KEY (modificado_por) REFERENCES usuarios(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura para la tabla `comunicados`
--

CREATE TABLE `comunicados` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `modificado_por` int DEFAULT NULL,
  `titulo_comunicado` varchar(100) NOT NULL,
  `descripcion_comunicado` longtext NOT NULL,
  `fecha_creacion_comunicado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` datetime DEFAULT NULL,
  `filename_comunicados` longtext DEFAULT NULL,
  `comunicados_foto_identificador` longtext DEFAULT NULL,
  `filename_comunicados_archivo` longtext DEFAULT NULL,
  `comunicados_archivo_identificador` longtext DEFAULT NULL,
   FOREIGN KEY (users_id) REFERENCES usuarios(id) ON DELETE CASCADE,
   FOREIGN KEY (modificado_por) REFERENCES usuarios(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token_expediente`
--

CREATE TABLE `token_expediente` (
  `id` int  NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `expedientes_id` int  NOT NULL,
  `token` varchar(255) NOT NULL,
  `link` longtext NOT NULL,
  `exp_date` TIMESTAMP NULL,
  FOREIGN KEY (expedientes_id) REFERENCES expedientes(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura para la tabla `alerta_notificaciones`
--

CREATE TABLE `alerta_notificaciones` (
  `id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `notificado_a` int NOT NULL,
  `enviado_por` int DEFAULT NULL,
  `tipo_alerta` longtext NOT NULL,
  `alerta_titulo` longtext NOT NULL,
  `alerta_mensaje` longtext NOT NULL,
  `alerta_estatus` int NOT NULL,
  `link` longtext DEFAULT NULL,
  `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   FOREIGN KEY (notificado_a) REFERENCES usuarios(id) ON DELETE CASCADE,
   FOREIGN KEY (enviado_por) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura para la vista `reset_password`
--

CREATE TABLE `reset_password`(
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `reset_link_token` varchar(255) NOT NULL,
  `exp_date` TIMESTAMP NULL,
   FOREIGN KEY (user_id) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura para la vista `historial_password`
--

CREATE TABLE `historial_password`(
	`id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`user_id` int NOT NULL,
	`password` varchar(255) NOT NULL,
	`today_date` date NOT NULL,
    FOREIGN KEY (user_id) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura para la tabla `blacklist_password`
--

CREATE TABLE `blacklist_password` (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Insert into para la tabla `blacklist_password`


INSERT INTO `blacklist_password` VALUES
    (1,'12345'),
    (2,'123456'),
    (3,'123456789'),
    (4,'test1'),
    (5,'password'),
    (6,'12345678'),
    (7,'zinch'),
    (8,'g_czechout'),
    (9,'asdf'),
    (10,'qwerty'),
    (11,'1234567890'),
    (12,'1234567'),
    (13,'Aa123456'),
    (14,'iloveyou'),
    (15,'1234'),
    (16,'abc123'),
    (17,'111111'),
    (18,'123123'),
    (19,'dubsmash'),
    (20,'test'),
    (21,'princess'),
    (22,'qwertyuiop'),
    (23,'sunshine'),
    (24,'BvtTest123'),
    (25,'11111'),
    (26,'ashley'),
    (27,'password1'),
    (28,'monkey'),
    (29,'livetest'),
    (30,'55555'),
    (31,'soccer'),
    (32,'charlie'),
    (33,'asdfghjkl'),
    (34,'654321'),
    (35,'family'),
    (36,'michael'),
    (37,'123321'),
    (38,'football'),
    (39,'baseball'),
    (40,'q1w2e3r4t5y6'),
    (41,'nicole'),
    (42,'jessica'),
    (43,'purple'),
    (44,'shadow'),
    (45,'hannah'),
    (46,'chocolate'),
    (47,'michelle'),
    (48,'daniel'),
    (49,'maggie'),
    (50,'qwerty123'),
    (51,'hello'),
    (52,'112233'),
    (53,'jordan'),
    (54,'tigger'),
    (55,'666666'),
    (56,'987654321'),
    (57,'superman'),
    (58,'12345678910'),
    (59,'summer'),
    (60,'1q2w3e4r5t'),
    (61,'fitness'),
    (62,'bailey'),
    (63,'zxcvbnm'),
    (64,'fuckyou'),
    (65,'121212'),
    (66,'buster'),
    (67,'butterfly'),
    (68,'dragon'),
    (69,'jennifer'),
    (70,'amanda'),
    (71,'justin'),
    (72,'cookie'),
    (73,'basketball'),
    (74,'shopping'),
    (75,'pepper'),
    (76,'joshua'),
    (77,'hunter'),
    (78,'ginger'),
    (79,'matthew'),
    (80,'abcd1234'),
    (81,'taylor'),
    (82,'samantha'),
    (83,'whatever'),
    (84,'andrew'),
    (85,'1qaz2wsx3edc'),
    (86,'thomas'),
    (87,'jasmine'),
    (88,'animoto'),
    (89,'madison'),
    (90,'54321'),
    (91,'flower'),
    (92,'maria'),
    (93,'babygirl'),
    (94,'lovely'),
    (95,'sophie'),
    (96,'Chegg123'),
    (97,'computer'),
    (98,'qwe123'),
    (99,'anthony'),
    (100,'1q2w3e4r'),
    (101,'peanut'),
    (102,'bubbles'),
    (103,'asdasd'),
    (104,'qwert'),
    (105,'1qaz2wsx'),
    (106,'pakistan'),
    (107,'123qwe'),
    (108,'liverpool'),
    (109,'elizabeth'),
    (110,'harley'),
    (111,'chelsea'),
    (112,'familia'),
    (113,'yellow'),
    (114,'william'),
    (115,'george'),
    (116,'7777777'),
    (117,'loveme'),
    (118,'123abc'),
    (119,'letmein'),
    (120,'oliver'),
    (121,'batman'),
    (122,'cheese'),
    (123,'banana'),
    (124,'testing'),
    (125,'secret'),
    (126,'angel'),
    (127,'friends'),
    (128,'jackson'),
    (129,'aaaaaa'),
    (130,'softball'),
    (131,'chicken'),
    (132,'lauren'),
    (133,'andrea'),
    (134,'welcome'),
    (135,'asdfgh'),
    (136,'robert'),
    (137,'orange'),
    (138,'Testing1'),
    (139,'pokemon'),
    (140,'555555'),
    (141,'melissa'),
    (142,'morgan'),
    (143,'123123123'),
    (144,'qazwsx'),
    (145,'diamond'),
    (146,'brandon'),
    (147,'jesus'),
    (148,'mickey'),
    (149,'olivia'),
    (150,'changeme'),
    (151,'danielle'),
    (152,'victoria'),
    (153,'gabriel'),
    (154,'123456a'),
    (155,'loveyou'),
    (156,'hockey'),
    (157,'freedom'),
    (158,'azerty'),
    (159,'snoopy'),
    (160,'skinny'),
    (161,'myheritage'),
    (162,'qwerty1'),
    (163,'159753'),
    (164,'forever'),
    (165,'iloveu'),
    (166,'killer'),
    (167,'joseph'),
    (168,'master'),
    (169,'mustang'),
    (170,'hellokitty'),
    (171,'school'),
    (172,'patrick'),
    (173,'blink182'),
    (174,'tinkerbell'),
    (175,'rainbow'),
    (176,'nathan'),
    (177,'cooper'),
    (178,'onedirection'),
    (179,'alexander'),
    (180,'jordan23'),
    (181,'lol123'),
    (182,'jasper'),
    (183,'junior'),
    (184,'q1w2e3r4'),
    (185,'222222'),
    (186,'11111111'),
    (187,'benjamin'),
    (188,'jonathan'),
    (189,'passw0rd'),
    (190,'a123456'),
    (191,'samsung'),
    (192,'123'),
    (193,'love123'),
    (194,'picture1'),
    (195,'senha'),
    (196,'Million2'),
    (197,'aaron431'),
    (198,'qqww1122'),
    (199,'omgpop'),
    (200,'qwer123456'),
    (201,'unknown'),
    (202,'chatbooks'),
    (203,'20100728'),
    (204,'jacket025'),
    (205,'evite'),
    (206,'5201314'),
    (207,'Bangbang123'),
    (208,'jobandtalent'),
    (209,'default'),
    (210,'123654'),
    (211,'ohmnamah23'),
    (212,'zing'),
    (213,'102030'),
    (214,'147258369'),
    (215,'party'),
    (216,'myspace1'),
    (217,'asd123'),
    (218,'a123456789'),
    (219,'888888'),
    (220,'1234qwer'),
    (221,'147258'),
    (222,'999999'),
    (223,'159357'),
    (224,'88888888'),
    (225,'789456123'),
    (226,'anhyeuem'),
    (227,'1q2w3e'),
    (228,'789456'),
    (229,'6655321'),
    (230,'naruto'),
    (231,'123456789a'),
    (232,'password123'),
    (233,'686584'),
    (234,'iloveyou1'),
    (235,'25251325'),
    (236,'love'),
    (237,'987654'),
    (238,'princess1'),
    (239,'101010'),
    (240,'12341234'),
    (241,'a801016'),
    (242,'1111'),
    (243,'1111111'),
    (244,'yugioh'),
    (245,'fuckyou1'),
    (246,'asdf1234'),
    (247,'trustno1'),
    (248,'x4ivygA51F'),
    (249,'starwars'),
    (250,'michael1');
INSERT INTO `blacklist_password` VALUES
    (251,'jakcgt333'),
    (252,'babygirl1'),
    (253,'456789'),
    (254,'qwer1234'),
    (255,'hello123'),
    (256,'10203'),
    (257,'12345a'),
    (258,'131313'),
    (259,'123456b'),
    (260,'Sample123'),
    (261,'777777'),
    (262,'football1'),
    (263,'jesus1'),
    (264,'b123456'),
    (265,'333333'),
    (266,'1111111111'),
    (267,'a12345'),
    (268,'142536'),
    (269,'11223344'),
    (270,'angel1'),
    (271,'aa12345678'),
    (272,'123456q'),
    (273,'zxcvbn'),
    (274,'qazwsxedc'),
    (275,'target123'),
    (276,'asdasd123'),
    (277,'qweasdzxc'),
    (278,'tinkle'),
    (279,'q1w2e3r4t5'),
    (280,'1g2w3e4r'),
    (281,'gwerty123'),
    (282,'zag12wsx'),
    (283,'gwerty'),
    (284,'qweqwe'),
    (285,'12344321'),
    (286,'12qwaszx'),
    (287,'1234561'),
    (288,'Status'),
    (289,'qwerty12'),
    (290,'qweasd'),
    (291,'12345qwert'),
    (292,'1qazxsw2'),
    (293,'marina'),
    (294,'111222'),
    (295,'1234554321'),
    (296,'qqqqqq'),
    (297,'123654789'),
    (298,'12345q'),
    (299,'internet'),
    (300,'q1w2e3'),
    (301,'google'),
    (302,'mynoob'),
    (303,'qwertyui'),
    (304,'qwertyu'),
    (305,'monkey1'),
    (306,'nikita'),
    (307,'7758521'),
    (308,'87654321'),
    (309,'147852'),
    (310,'212121'),
    (311,'123789'),
    (312,'147852369'),
    (313,'123456789q'),
    (314,'qwe'),
    (315,'741852963'),
    (316,'123qweasd'),
    (317,'123456abc'),
    (318,'1q2w3e4r5t6y'),
    (319,'qazxsw'),
    (320,'232323'),
    (321,'999999999'),
    (322,'qwerty12345'),
    (323,'qwaszx'),
    (324,'1234567891'),
    (325,'456123'),
    (326,'444444'),
    (327,'qq123456');

-- --------------------------------------------------------

--
-- Estructura para la tabla `temporal_password`
--


CREATE TABLE `temporal_password`(
   `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `user_id` int NOT NULL UNIQUE,
   FOREIGN KEY (user_id) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura para la tabla `loginlogs`
--

CREATE TABLE `loginlogs`(
   `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `user_id` int NOT NULL,
   `fecha_intento` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura para la tabla `tabla_usuarios_log`
--

CREATE TABLE `tabla_usuarios_log`(
	`id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`logged_usuario` varchar(100) NOT NULL,
	`data_usuario` varchar(100) NOT NULL,
	`fecha_log` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	`accion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura para la tabla `tabla_expedientes_log`
--

CREATE TABLE `tabla_expedientes_log`(
	`id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`logged_usuario` varchar(100) NOT NULL,
	`data_usuario` varchar(100) NOT NULL,
	`num_empleado` varchar(100) NOT NULL,
	`fecha_log` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	`accion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura para la tabla `tabla_papeleria_log`
--

CREATE TABLE `tabla_papeleria_log`(
	`id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`logged_usuario` varchar(100) NOT NULL,
	`data_usuario` varchar(100) NOT NULL,
	`num_empleado` varchar(100) NOT NULL,
	`tipo_papeleria` varchar(100) NOT NULL,
	`nombre_archivo` varchar(100) NOT NULL,
	`fecha_log` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	`accion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura para la tabla `tabla_historial_papeleria_log`
--

CREATE TABLE `tabla_historial_papeleria_log`(
	`id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`logged_usuario` varchar(100) NOT NULL,
	`data_usuario` varchar(100) NOT NULL,
	`num_empleado` varchar(100) NOT NULL,
	`tipo_papeleria` varchar(100) NOT NULL,
	`nombre_archivo` varchar(100) NOT NULL,
	`fecha_log` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	`accion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura para la tabla `historial_solicitud_vacaciones`
--

CREATE TABLE `historial_solicitud_vacaciones` (
  `id` int  NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `users_id` int  NOT NULL,
  `periodo_solicitado` varchar(100) NOT NULL,
  `dias_solicitados` int NOT NULL,
  `fecha_solicitud` varchar(100) NOT NULL,
  `estatus` int NOT NULL,
  FOREIGN KEY (users_id) REFERENCES usuarios(id) ON DELETE CASCADE,
  FOREIGN KEY (estatus) REFERENCES estatus_vacaciones(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura para la tabla `historial_accion_incidencias`
--

CREATE TABLE `historial_accion_incidencias`(
	`id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`incidencias_id` bigint NOT NULL,
	`tipo_de_accion` int NOT NULL,
	`goce_de_sueldo` tinyint DEFAULT NULL,
	`comentario` varchar(200) DEFAULT NULL,
	`evaluado_por` int DEFAULT NULL,
	FOREIGN KEY (incidencias_id) REFERENCES incidencias(id) ON DELETE CASCADE,
	FOREIGN KEY (tipo_de_accion) REFERENCES tipo_accion_incidencias(id),
	FOREIGN KEY (evaluado_por) REFERENCES usuarios(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura para la tabla `historial_accion_vacaciones`
--

CREATE TABLE `historial_accion_vacaciones`(
	`id` bigint NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`solicitud_id` int NOT NULL,
	`tipo_de_accion` int NOT NULL,
	`comentario` varchar(200) DEFAULT NULL,
	`evaluado_por` int DEFAULT NULL,
	 FOREIGN KEY (solicitud_id) REFERENCES solicitud_vacaciones(id) ON DELETE CASCADE,
	 FOREIGN KEY (tipo_de_accion) REFERENCES tipo_accion_incidencias(id),
	 FOREIGN KEY (evaluado_por) REFERENCES usuarios(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Trigger que inserta en la tabla alerta_notificaciones cuando se crea una incidencia
--

DELIMITER $$
CREATE TRIGGER alerta_incidencias
AFTER INSERT on notificaciones_incidencias
FOR EACH ROW
	BEGIN
		INSERT INTO alerta_notificaciones(notificado_a, enviado_por, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus, link)
		SELECT NEW.id_notificado, solicitudes_incidencias.users_id, "Incidencias", "Incidencia recibida", CONCAT('El usuario ', CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat), ' te ha enviado una incidencia, haz clic aquí para ver más información.'), "0", "solicitud_incidencia.php" FROM solicitudes_incidencias INNER JOIN usuarios ON usuarios.id=solicitudes_incidencias.users_id WHERE solicitudes_incidencias.id=NEW.id_solicitud_incidencias;
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Trigger que inserta en la tabla alerta_notificaciones cuando se crea una solicitud de vacaciones
--

DELIMITER $$
CREATE TRIGGER alerta_vacaciones
AFTER INSERT on notificaciones_vacaciones
FOR EACH ROW
	BEGIN
		SET @periodo = (SELECT sv.periodo_solicitado FROM notificaciones_vacaciones nv INNER JOIN solicitud_vacaciones sv ON sv.id=nv.id_solicitud_vacaciones WHERE nv.id_solicitud_vacaciones = NEW.id_solicitud_vacaciones);
		SET @fecha = (SELECT sv.fecha_solicitud FROM notificaciones_vacaciones nv INNER JOIN solicitud_vacaciones sv ON sv.id=nv.id_solicitud_vacaciones WHERE nv.id_solicitud_vacaciones = NEW.id_solicitud_vacaciones);
	
		INSERT INTO alerta_notificaciones(notificado_a, enviado_por, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus, link)
		SELECT NEW.id_notificado, solicitud_vacaciones.users_id, "Vacaciones", "Solicitud de vacaciones recibida", CONCAT('El usuario ', CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat), ' te ha enviado una solicitud de vacaciones con el periodo solicitado que va desde: ', @periodo , ' con fecha de expedeción en: ', @fecha , '. Haz clic aquí para ver más información.'), "0", "solicitud_vacaciones.php" FROM solicitud_vacaciones INNER JOIN usuarios ON usuarios.id=solicitud_vacaciones.users_id WHERE solicitud_vacaciones.id=NEW.id_solicitud_vacaciones;
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Trigger que inserta en la tabla alerta_notificaciones cuando se crea una alerta
--

DELIMITER $$
CREATE TRIGGER notificaciones_alerta
AFTER INSERT on alertas
FOR EACH ROW
	BEGIN
		SET @count_usuarios = (SELECT count(*) FROM usuarios);
		IF (@count_usuarios > 1 ) THEN
			SET @enviado_por = (SELECT CONCAT(nombre, ' ', apellido_pat, ' ', apellido_mat) FROM usuarios WHERE id=NEW.users_id);
			
			INSERT INTO alerta_notificaciones(notificado_a, enviado_por, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus, link)
			SELECT usuarios.id, NEW.users_id, "Alertas", "Nueva alerta", CONCAT('El usuario ', @enviado_por, ' ha creado una nueva alerta en la fecha ', NEW.fecha_creacion_alerta, '. Haz clic aquí para ver más información.'), "0", "dashboard.php" FROM usuarios LEFT JOIN roles ON roles.id=usuarios.roles_id WHERE roles.nombre NOT IN ('Superadministrador', 'Administrador', 'Usuario externo') AND usuarios.id != NEW.users_id;
		END IF;		
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Trigger que inserta en la tabla alerta_notificaciones cuando se crea un aviso
--

DELIMITER $$
CREATE TRIGGER notificaciones_avisos
AFTER INSERT on avisos
FOR EACH ROW
	BEGIN
		SET @count_usuarios = (SELECT count(*) FROM usuarios);
		IF (@count_usuarios > 1 ) THEN
			SET @enviado_por = (SELECT CONCAT(nombre, ' ', apellido_pat, ' ', apellido_mat) FROM usuarios WHERE id=NEW.users_id);
			
			INSERT INTO alerta_notificaciones(notificado_a, enviado_por, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus, link)
			SELECT usuarios.id, NEW.users_id, "Avisos", "Nuevo aviso", CONCAT('El usuario ', @enviado_por, ' ha creado una nuevo aviso en la fecha ', NEW.fecha_creacion_aviso, '. Haz clic aquí para ver más información.'), "0", "dashboard.php" FROM usuarios LEFT JOIN roles ON roles.id=usuarios.roles_id WHERE roles.nombre NOT IN ('Superadministrador', 'Administrador', 'Usuario externo') AND usuarios.id != NEW.users_id;
		END IF;	
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Trigger que inserta en la tabla alerta_notificaciones cuando se crea un comunicado
--

DELIMITER $$
CREATE TRIGGER notificaciones_comunicados
AFTER INSERT on comunicados
FOR EACH ROW
	BEGIN
		SET @count_usuarios = (SELECT count(*) FROM usuarios);
		IF (@count_usuarios > 1 ) THEN
			SET @enviado_por = (SELECT CONCAT(nombre, ' ', apellido_pat, ' ', apellido_mat) FROM usuarios WHERE id=NEW.users_id);
			
			INSERT INTO alerta_notificaciones(notificado_a, enviado_por, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus, link)
			SELECT usuarios.id, NEW.users_id, "Comunicados", "Nuevo comunicado", CONCAT('El usuario ', @enviado_por, ' ha creado un nuevo comunicado en la fecha ', NEW.fecha_creacion_comunicado, '. Haz clic aquí para ver más información.'), "0", "dashboard.php" FROM usuarios LEFT JOIN roles ON roles.id=usuarios.roles_id WHERE roles.nombre NOT IN ('Superadministrador', 'Administrador', 'Usuario externo') AND usuarios.id != NEW.users_id;
		END IF;	
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que inserta y actualiza el estatus en las tablas transicion_estatus_incidencia y transicion_accion_incidencias y envía una nueva notificación al usuario sobre la respuesta de la notificación
--

DELIMITER $$
CREATE TRIGGER insertar_transicion_estatus_notificacion_incidencia
AFTER INSERT ON accion_incidencias FOR EACH ROW
BEGIN

	SET @enviado_por = (SELECT CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat) FROM accion_incidencias INNER JOIN usuarios ON usuarios.id = accion_incidencias.evaluado_por WHERE accion_incidencias.incidencias_id=NEW.incidencias_id);
	SET @notificado_a = (SELECT usuarios.id FROM accion_incidencias INNER JOIN incidencias ON incidencias.id = accion_incidencias.incidencias_id INNER JOIN solicitudes_incidencias ON solicitudes_incidencias.id=incidencias.id_solicitud_incidencias INNER JOIN usuarios ON usuarios.id=solicitudes_incidencias.users_id WHERE accion_incidencias.incidencias_id = NEW.incidencias_id);
	SET @nombre_notificado = (SELECT CONCAT(nombre, ' ', apellido_pat, ' ', apellido_mat) FROM usuarios WHERE id=@notificado_a);
	SET @count_usuario = (SELECT count(*) FROM usuarios WHERE username='servicios_al_colaborador' OR correo='servicios_al_colaborador@sinttecom.com');
	SET @ch = (SELECT id FROM usuarios WHERE username='servicios_al_colaborador' OR correo='servicios_al_colaborador@sinttecom.com');
	
	INSERT INTO transicion_estatus_incidencia(incidencias_id, estatus_actual, estatus_siguiente) SELECT incidencias.id, solicitudes_incidencias.estatus, accion_incidencias.tipo_de_accion FROM accion_incidencias INNER JOIN incidencias ON accion_incidencias.incidencias_id=incidencias.id INNER JOIN solicitudes_incidencias ON solicitudes_incidencias.id=incidencias.id_solicitud_incidencias WHERE accion_incidencias.incidencias_id=NEW.incidencias_id;
	
	INSERT INTO alerta_notificaciones (notificado_a, enviado_por, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus, link)
	VALUES (@notificado_a, NEW.evaluado_por, "Solicitud incidencias", "Solicitud de incidencia evaluada", CONCAT('El usuario ', @enviado_por, ' ha evaluado tu incidencia. Haz clic aquí para ver más información'), "0", CONCAT('ver_incidencia.php?idIncidencia=', NEW.incidencias_id));
	
	IF (@count_usuario > 0 ) THEN
		INSERT INTO alerta_notificaciones (notificado_a, enviado_por, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus, link)
		VALUES (@ch, NEW.evaluado_por, "Solicitud incidencias", "Se ha evaluado una solicitud de incidencia", CONCAT('El usuario ', @enviado_por, ' ha evaluado una incidencia de ', @nombre_notificado, '. Haz clic aquí para ver más información'), "0", CONCAT('ver_incidencia.php?idIncidencia=', NEW.incidencias_id));
	END IF;	
END;
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Trigger que inserta en la tabla transicion_accion_incidencia
--

DELIMITER $$

CREATE TRIGGER link_transcicion_accion
AFTER INSERT ON transicion_estatus_incidencia FOR EACH ROW
BEGIN
	 DECLARE AccionId INTEGER(4);

	 SELECT id INTO AccionId from accion_incidencias where incidencias_id=NEW.incidencias_id;

	 INSERT INTO transicion_accion_incidencias(id_transicion, id_accion) VALUES (NEW.id, AccionId);
END;
$$


DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que inserta y actualiza el estatus en las tablas transicion_estatus_vacaciones y transicion_accion_vacaciones y envía una nueva notificación al usuario sobre la respuesta de la notificación
--


DELIMITER $$
CREATE TRIGGER insertar_transicion_estatus_notificaciones_vacaciones
AFTER INSERT ON accion_vacaciones FOR EACH ROW
BEGIN

	SET @enviado_por = (SELECT CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat) FROM accion_vacaciones INNER JOIN usuarios ON usuarios.id = accion_vacaciones.evaluado_por WHERE accion_vacaciones.id_solicitud_vacaciones=NEW.id_solicitud_vacaciones);
	SET @notificado_a = (SELECT usuarios.id FROM accion_vacaciones INNER JOIN solicitud_vacaciones ON solicitud_vacaciones.id = accion_vacaciones.id_solicitud_vacaciones INNER JOIN usuarios ON usuarios.id=solicitud_vacaciones.users_id WHERE accion_vacaciones.id_solicitud_vacaciones=NEW.id_solicitud_vacaciones);
	SET @periodo = (SELECT solicitud_vacaciones.periodo_solicitado FROM accion_vacaciones INNER JOIN solicitud_vacaciones ON solicitud_vacaciones.id=accion_vacaciones.id_solicitud_vacaciones WHERE accion_vacaciones.id_solicitud_vacaciones = NEW.id_solicitud_vacaciones);
	SET @fecha = (SELECT solicitud_vacaciones.fecha_solicitud FROM accion_vacaciones INNER JOIN solicitud_vacaciones ON solicitud_vacaciones.id=accion_vacaciones.id_solicitud_vacaciones WHERE accion_vacaciones.id_solicitud_vacaciones = NEW.id_solicitud_vacaciones);
	SET @nombre_notificado = (SELECT CONCAT(nombre, ' ', apellido_pat, ' ', apellido_mat) FROM usuarios WHERE id=@notificado_a);
	SET @count_usuario = (SELECT count(*) FROM usuarios WHERE username='servicios_al_colaborador' OR correo='servicios_al_colaborador@sinttecom.com');
	SET @ch = (SELECT id FROM usuarios WHERE username='servicios_al_colaborador' OR correo='servicios_al_colaborador@sinttecom.com');
	
	INSERT INTO transicion_estatus_vacaciones(id_solicitud_vacaciones, estatus_actual, estatus_siguiente) SELECT solicitud_vacaciones.id, solicitud_vacaciones.estatus, accion_vacaciones.tipo_de_accion FROM accion_vacaciones INNER JOIN solicitud_vacaciones ON accion_vacaciones.id_solicitud_vacaciones=solicitud_vacaciones.id WHERE accion_vacaciones.id_solicitud_vacaciones=NEW.id_solicitud_vacaciones;
	
	INSERT INTO alerta_notificaciones (notificado_a, enviado_por, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus, link)
	VALUES (@notificado_a, NEW.evaluado_por, "Solicitud vacaciones", "Solicitud de vacaciones evaluada", CONCAT('El usuario ', @enviado_por, ' ha evaluado tu solicitud de vacaciones con el periodo solicitado que va desde: ', @periodo , ' con fecha de expedeción en: ', @fecha , '. Haz clic aquí para ver más información'), "0", "vacaciones.php");
	
	IF (@count_usuario > 0 ) THEN
		INSERT INTO alerta_notificaciones (notificado_a, enviado_por, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus, link)
		VALUES (@ch, NEW.evaluado_por, "Solicitud vacaciones", "Se ha evaluado una solicitud de vacaciones", CONCAT('El usuario ', @enviado_por, ' ha evaluado una solicitud de vacaciones de ', @nombre_notificado ,' con el periodo solicitado que va desde: ', @periodo , ' con fecha de expedeción en: ', @fecha , '. Haz clic aquí para ver más información'), "0", "vacaciones.php");
	END IF;	
END;
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Trigger que inserta en la tabla transicion_accion_vacaciones
--

DELIMITER $$

CREATE TRIGGER link_transcicion_accion_vacaciones
AFTER INSERT ON transicion_estatus_vacaciones FOR EACH ROW
BEGIN
	 DECLARE AccionId INTEGER(4);

	 SELECT id INTO AccionId from accion_vacaciones where id_solicitud_vacaciones=NEW.id_solicitud_vacaciones;

	 INSERT INTO transicion_accion_vacaciones(id_transicion, id_accion) VALUES (NEW.id, AccionId);
END;
$$


DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que mueve las contraseñas al historial `temp_password`
--

DELIMITER $$

CREATE TRIGGER temp_password BEFORE UPDATE ON usuarios
FOR EACH ROW
BEGIN
    IF NOT(NEW.password <=> OLD.password) THEN
      INSERT INTO historial_password(user_id, password, today_date) SELECT NEW.id, OLD.password, CURDATE() FROM usuarios WHERE usuarios.id=NEW.id;
    END IF;
END$$    

DELIMITER ;

-- --------------------------------------------------------								

--
-- Estructura para el trigger que guarda el evento de insertar de la tabla usuarios en la tabla_usuarios_log y envía una nueva notificación al nuevo usuario  `log_notificaciones_usuarios_insertar`
--

DELIMITER $$
	CREATE TRIGGER log_notificaciones_usuarios_insertar AFTER INSERT ON usuarios
	FOR EACH ROW
	BEGIN
		INSERT INTO tabla_usuarios_log (logged_usuario, data_usuario, accion)
		VALUES (COALESCE(@logged_user, CURRENT_USER()), CONCAT(NEW.nombre, ' ', NEW.apellido_pat, ' ', NEW.apellido_mat), 'Insertar');
		
		INSERT INTO alerta_notificaciones (notificado_a, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus)
		VALUES (NEW.id, "Usuarios", "Intranet", "Todo sinttecom te da la bienvenida a la intranet, es necesario estar siempre al pendiente de las notificaciones que se mandan por aquí.", "0");
		
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que guarda el evento de actualizar de la tabla usuarios en la tabla_usuarios_log  `log_usuarios_actualizar`
--

DELIMITER $$
	CREATE TRIGGER log_usuarios_actualizar AFTER UPDATE ON usuarios
	FOR EACH ROW
	BEGIN
		INSERT INTO tabla_usuarios_log (logged_usuario, data_usuario, accion)
		VALUES (COALESCE(@logged_user, CURRENT_USER()), CONCAT(OLD.nombre, ' ', OLD.apellido_pat, ' ', OLD.apellido_mat), 'Actualizar');
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que guarda el evento de eliminar de la tabla usuarios en la tabla_usuarios_log  `log_usuarios_eliminar`
--

DELIMITER $$
	CREATE TRIGGER log_usuarios_eliminar AFTER DELETE ON usuarios
	FOR EACH ROW
	BEGIN
		INSERT INTO tabla_usuarios_log (logged_usuario, data_usuario, accion)
		VALUES (COALESCE(@logged_user, CURRENT_USER()), CONCAT(OLD.nombre, ' ', OLD.apellido_pat, ' ', OLD.apellido_mat), 'Eliminar');
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que guarda el evento de insertar de la tabla expedientes en la tabla_expedientes_log y envía una nueva notificación al usuario sobre el expediente creado `log_notificaciones_expedientes_insert`
--

DELIMITER $$
CREATE TRIGGER log_notificaciones_expedientes_insert AFTER INSERT on expedientes
FOR EACH ROW
	BEGIN
		INSERT INTO tabla_expedientes_log (logged_usuario, data_usuario, num_empleado, accion)
		SELECT COALESCE(@logged_user, CURRENT_USER()), CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat), NEW.num_empleado, "INSERTAR" FROM usuarios WHERE NEW.users_id = usuarios.id;
		
		INSERT INTO alerta_notificaciones (notificado_a, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus)
		VALUES (NEW.users_id, "Expedientes", "Expediente asignado", "Se le ha asignado un expediente lo cual significa que ya puede enviar incidencias y vacaciones.", "0");	
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que inserta en la tabla alerta_notificaciones cuando se asigna un token a un expediente 
--

DELIMITER $$
CREATE TRIGGER alert_token_expediente AFTER INSERT on token_expediente
FOR EACH ROW
	BEGIN
		SET @notificado_a = (SELECT usuarios.id FROM usuarios INNER JOIN expedientes ON expedientes.users_id=usuarios.id WHERE expedientes.id=NEW.expedientes_id);
	
		INSERT INTO alerta_notificaciones (notificado_a, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus, link)
		VALUES (@notificado_a, "Token_expediente", "Nuevo token asignado", "Se le ha asignado un token lo cual significa que necesita llenar los datos de su expediente. Haz clic en la notificación para ir al link", "0", CONCAT('expediente_modo_edicion.php?token=', NEW.token));
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que guarda el evento de actualizar de la tabla expedientes en la tabla_expedientes_log  `log_expedientes_update`
--

DELIMITER $$
CREATE TRIGGER log_expedientes_update AFTER UPDATE on expedientes
FOR EACH ROW
	BEGIN
		INSERT INTO tabla_expedientes_log (logged_usuario, data_usuario, num_empleado, accion)
		SELECT COALESCE(@logged_user, CURRENT_USER()), CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat), NEW.num_empleado, "ACTUALIZAR" FROM usuarios WHERE NEW.users_id = usuarios.id;
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que guarda el evento de insertar de la tabla papeleria_empleado en la tabla_papeleria_log  `log_papeleria_insert`
--

DELIMITER $$
CREATE TRIGGER log_papeleria_insert
AFTER INSERT on papeleria_empleado
FOR EACH ROW
	BEGIN
		INSERT INTO tabla_papeleria_log (logged_usuario, data_usuario, num_empleado, tipo_papeleria, nombre_archivo, accion)
		SELECT COALESCE(@logged_user, CURRENT_USER()), CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat), expedientes.num_empleado, tipo_papeleria.nombre, NEW.nombre_archivo, "INSERTAR" FROM usuarios INNER JOIN expedientes INNER JOIN tipo_papeleria WHERE expedientes.users_id = usuarios.id AND NEW.expediente_id=expedientes.id AND NEW.tipo_archivo=tipo_papeleria.id;
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que guarda el evento de actualizar de la tabla papeleria_empleado en la tabla_papeleria_log  `log_papeleria_update`
--

DELIMITER $$
CREATE TRIGGER log_papeleria_update
AFTER UPDATE on papeleria_empleado
FOR EACH ROW
	BEGIN
		INSERT INTO tabla_papeleria_log (logged_usuario, data_usuario, num_empleado, tipo_papeleria, nombre_archivo, accion)
		SELECT COALESCE(@logged_user, CURRENT_USER()), CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat), expedientes.num_empleado, tipo_papeleria.nombre, NEW.nombre_archivo, "ACTUALIZAR" FROM usuarios INNER JOIN expedientes INNER JOIN tipo_papeleria WHERE expedientes.users_id = usuarios.id AND NEW.expediente_id=expedientes.id AND NEW.tipo_archivo=tipo_papeleria.id;
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que guarda el evento de eliminar de la tabla papeleria_empleado en la tabla_papeleria_log  `log_papeleria_eliminar`
--

DELIMITER $$
CREATE TRIGGER log_papeleria_eliminar 
BEFORE DELETE ON papeleria_empleado
FOR EACH ROW
	BEGIN
		INSERT INTO tabla_papeleria_log (logged_usuario, data_usuario, num_empleado, tipo_papeleria, nombre_archivo, accion)
		SELECT COALESCE(@logged_user, CURRENT_USER()), CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat), expedientes.num_empleado, tipo_papeleria.nombre, OLD.nombre_archivo, "ELIMINAR" FROM usuarios INNER JOIN expedientes INNER JOIN tipo_papeleria WHERE expedientes.users_id = usuarios.id AND OLD.expediente_id=expedientes.id AND OLD.tipo_archivo=tipo_papeleria.id;
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que guarda el evento de eliminar de la tabla expedientes con su llave foránea papeleria_empleado e historial en la tabla_expedientes_log, tabla_papeleria_log y tabla_historial_papeleria_log  `log_expedientespapeleriaehistorial_eliminar`
--

DELIMITER $$
CREATE TRIGGER log_expedientespapeleriaehistorial_eliminar 
BEFORE DELETE ON expedientes
FOR EACH ROW
	BEGIN
		INSERT INTO tabla_expedientes_log (logged_usuario, data_usuario, num_empleado, accion)
		SELECT COALESCE(@logged_user, CURRENT_USER()), CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat), OLD.num_empleado, "ELIMINAR" FROM usuarios WHERE OLD.users_id = usuarios.id;
		
		INSERT INTO tabla_papeleria_log (logged_usuario, data_usuario, num_empleado, tipo_papeleria, nombre_archivo, accion)
		SELECT COALESCE(@logged_user, CURRENT_USER()), CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat), OLD.num_empleado, tipo_papeleria.nombre, papeleria_empleado.nombre_archivo, "ELIMINAR" FROM usuarios INNER JOIN papeleria_empleado INNER JOIN tipo_papeleria WHERE OLD.users_id = usuarios.id AND OLD.id = papeleria_empleado.expediente_id AND papeleria_empleado.tipo_archivo = tipo_papeleria.id;
		
		INSERT INTO tabla_historial_papeleria_log (logged_usuario, data_usuario, num_empleado, tipo_papeleria, nombre_archivo, accion)
		SELECT COALESCE(@logged_user, CURRENT_USER()), CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat), OLD.num_empleado, tipo_papeleria.nombre, historial_papeleria_empleado.viejo_nombre_archivo, "ELIMINAR" FROM usuarios INNER JOIN historial_papeleria_empleado INNER JOIN tipo_papeleria WHERE OLD.users_id = usuarios.id AND OLD.id = historial_papeleria_empleado.expediente_id AND historial_papeleria_empleado.tipo_archivo = tipo_papeleria.id;
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que guarda el evento de insertar de la tabla historial_papeleria_empleado en la tabla_historial_papeleria_log  `log_historialpapeleria_insert`
--

DELIMITER $$
CREATE TRIGGER log_historialpapeleria_insert
AFTER INSERT on historial_papeleria_empleado
FOR EACH ROW
	BEGIN
		INSERT INTO tabla_historial_papeleria_log (logged_usuario, data_usuario, num_empleado, tipo_papeleria, nombre_archivo, accion)
		SELECT COALESCE(@logged_user, CURRENT_USER()), CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat), expedientes.num_empleado, tipo_papeleria.nombre, NEW.viejo_nombre_archivo, "INSERTAR" FROM expedientes INNER JOIN usuarios INNER JOIN tipo_papeleria WHERE NEW.expediente_id = expedientes.id AND usuarios.id = expedientes.users_id AND NEW.tipo_archivo = tipo_papeleria.id;
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que guarda el evento de actualizar de la tabla historial_papeleria_empleado en la tabla_historial_papeleria_log  `log_historialpapeleria_update`
--

DELIMITER $$
CREATE TRIGGER log_historialpapeleria_update
AFTER UPDATE on historial_papeleria_empleado
FOR EACH ROW
	BEGIN
		INSERT INTO tabla_historial_papeleria_log (logged_usuario, data_usuario, num_empleado, tipo_papeleria, nombre_archivo, accion)
		SELECT COALESCE(@logged_user, CURRENT_USER()), CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat), expedientes.num_empleado, tipo_papeleria.nombre, NEW.viejo_nombre_archivo, "ACTUALIZAR" FROM expedientes INNER JOIN usuarios INNER JOIN tipo_papeleria WHERE NEW.expediente_id = expedientes.id AND usuarios.id = expedientes.users_id AND NEW.tipo_archivo = tipo_papeleria.id;
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que guarda el evento de eliminar de la tabla historial_papeleria_empleado en la tabla_historial_papeleria_log  `log_historialpapeleria_eliminar`
--

DELIMITER $$
CREATE TRIGGER log_historialpapeleria_eliminar
BEFORE DELETE ON historial_papeleria_empleado
FOR EACH ROW
	BEGIN
		INSERT INTO tabla_historial_papeleria_log (logged_usuario, data_usuario, num_empleado, tipo_papeleria, nombre_archivo, accion)
		SELECT COALESCE(@logged_user, CURRENT_USER()), CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat), expedientes.num_empleado, tipo_papeleria.nombre, OLD.viejo_nombre_archivo, "ELIMINAR" FROM expedientes INNER JOIN usuarios INNER JOIN tipo_papeleria WHERE OLD.expediente_id = expedientes.id AND usuarios.id = expedientes.users_id AND OLD.tipo_archivo = tipo_papeleria.id;
	END$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que inserta en la historial_accion_incidencias, actualiza el estatus de la incidencia y envia una notificación al usuario que envío una incidencia
--

DELIMITER $$
CREATE TRIGGER update_transicion_estatus_notificacion_incidencia
AFTER UPDATE ON accion_incidencias FOR EACH ROW
BEGIN
	SET @enviado_por = (SELECT CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat) FROM accion_incidencias INNER JOIN usuarios ON usuarios.id = accion_incidencias.evaluado_por WHERE accion_incidencias.incidencias_id=NEW.incidencias_id);
	SET @notificado_a = (SELECT usuarios.id FROM accion_incidencias INNER JOIN incidencias ON incidencias.id = accion_incidencias.incidencias_id INNER JOIN solicitudes_incidencias ON solicitudes_incidencias.id=incidencias.id_solicitud_incidencias INNER JOIN usuarios ON usuarios.id=solicitudes_incidencias.users_id WHERE accion_incidencias.incidencias_id = NEW.incidencias_id);
	SET @nombre_notificado = (SELECT CONCAT(nombre, ' ', apellido_pat, ' ', apellido_mat) FROM usuarios WHERE id=@notificado_a);
	
	INSERT INTO historial_accion_incidencias(incidencias_id, tipo_de_accion, goce_de_sueldo, comentario, evaluado_por) VALUES (OLD.incidencias_id, OLD.tipo_de_accion, OLD.goce_de_sueldo, OLD.comentario, OLD.evaluado_por);

	UPDATE transicion_estatus_incidencia SET estatus_actual = OLD.tipo_de_accion, estatus_siguiente = NEW.tipo_de_accion WHERE incidencias_id=NEW.incidencias_id;
	
	INSERT INTO alerta_notificaciones (notificado_a, enviado_por, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus, link)
	VALUES (@notificado_a, NEW.evaluado_por, "Solicitud incidencias reevaluada", "Solicitud de incidencia reevaluada", CONCAT('El usuario ', @enviado_por, ' ha reevaluado tu incidencia. Haz clic aquí para ver más información'), "0", CONCAT('ver_incidencia.php?idIncidencia=', NEW.incidencias_id));	
	
	INSERT INTO alerta_notificaciones (notificado_a, enviado_por, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus, link)
	VALUES (OLD.evaluado_por, NEW.evaluado_por, "Solicitud incidencias reevaluada", "Solicitud de incidencia reevaluada", CONCAT('El usuario ', @enviado_por, ' ha reevaluado la incidencia de ', @nombre_notificado, '. Haz clic aquí para ver más información'), "0", CONCAT('ver_incidencia.php?idIncidencia=', NEW.incidencias_id));
END;
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para el trigger que inserta en la historial_accion_vacaciones, actualiza el estatus de la solicitud de vacaciones y envia una notificación al usuario que envío una solicitud de vacaciones
--

DELIMITER $$
CREATE TRIGGER update_transicion_estatus_notificacion_vacaciones
AFTER UPDATE ON accion_vacaciones FOR EACH ROW
BEGIN
	
	SET @enviado_por = (SELECT CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat) FROM accion_vacaciones INNER JOIN usuarios ON usuarios.id = accion_vacaciones.evaluado_por WHERE accion_vacaciones.id_solicitud_vacaciones=NEW.id_solicitud_vacaciones);
	SET @notificado_a = (SELECT usuarios.id FROM accion_vacaciones INNER JOIN solicitud_vacaciones ON solicitud_vacaciones.id = accion_vacaciones.id_solicitud_vacaciones INNER JOIN usuarios ON usuarios.id=solicitud_vacaciones.users_id WHERE accion_vacaciones.id_solicitud_vacaciones=NEW.id_solicitud_vacaciones);
	SET @periodo = (SELECT solicitud_vacaciones.periodo_solicitado FROM accion_vacaciones INNER JOIN solicitud_vacaciones ON solicitud_vacaciones.id=accion_vacaciones.id_solicitud_vacaciones WHERE accion_vacaciones.id_solicitud_vacaciones = NEW.id_solicitud_vacaciones);
	SET @fecha = (SELECT solicitud_vacaciones.fecha_solicitud FROM accion_vacaciones INNER JOIN solicitud_vacaciones ON solicitud_vacaciones.id=accion_vacaciones.id_solicitud_vacaciones WHERE accion_vacaciones.id_solicitud_vacaciones = NEW.id_solicitud_vacaciones);
	SET @nombre_notificado = (SELECT CONCAT(nombre, ' ', apellido_pat, ' ', apellido_mat) FROM usuarios WHERE id=@notificado_a);
	
	INSERT INTO historial_accion_vacaciones(solicitud_id, tipo_de_accion, comentario, evaluado_por) VALUES (OLD.id_solicitud_vacaciones, OLD.tipo_de_accion, OLD.comentario, OLD.evaluado_por);

	UPDATE transicion_estatus_vacaciones SET estatus_actual = OLD.tipo_de_accion, estatus_siguiente = NEW.tipo_de_accion WHERE id_solicitud_vacaciones=NEW.id_solicitud_vacaciones;
	
	INSERT INTO alerta_notificaciones (notificado_a, enviado_por, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus, link)
	VALUES (@notificado_a, NEW.evaluado_por, "Solicitud vacaciones reevaluada", "Solicitud de vacaciones reevaluada", CONCAT('El usuario ', @enviado_por, ' ha reevaluado tu solicitud de vacaciones con el periodo solicitado que va desde: ', @periodo , ' con fecha de expedeción en: ', @fecha , '. Haz clic aquí para ver más información'), "0", "vacaciones.php");	

	INSERT INTO alerta_notificaciones (notificado_a, enviado_por, tipo_alerta, alerta_titulo, alerta_mensaje, alerta_estatus, link)
	VALUES (OLD.evaluado_por, NEW.evaluado_por, "Solicitud vacaciones reevaluada", "Solicitud de vacaciones reevaluada", CONCAT('El usuario ', @enviado_por, ' ha reevaluado la solicitud de vacaciones de ', @nombre_notificado ,' con el periodo solicitado que va desde: ', @periodo , ' con fecha de expedeción en: ', @fecha , '. Haz clic aquí para ver más información'), "0", "vacaciones.php");
END;
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `serverside_user_superadministrador`
--
DROP TABLE IF EXISTS `serverside_user_superadministrador`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `serverside_user_superadministrador`  AS SELECT concat(`usuarios`.`nombre`,' ',`usuarios`.`apellido_pat`,' ',`usuarios`.`apellido_mat`) AS `nombre`, `usuarios`.`correo` AS `correo`, `usuarios`.`foto_identificador` AS `foto_identificador`, (case when (`departamentos`.`departamento` is null) then (case when ((`roles`.`nombre` = 'Superadministrador') or (`roles`.`nombre` = 'Administrador') or (`roles`.`nombre` = 'Usuario externo') or (`roles`.`nombre` = 'Director general')) then 'Dep. Indisponible' else 'Sin asignar' end) else `departamentos`.`departamento` end) AS `departamento`, (case when (`roles`.`nombre` is null) then 'Sin rol' else `roles`.`nombre` end) AS `rol`, (case when (`subroles`.`subrol_nombre` is null) then (case when ((`roles`.`nombre` = 'Superadministrador') or (`roles`.`nombre` = 'Administrador')) then 'Subrol indisponible' else 'Sin subrol' end) else `subroles`.`subrol_nombre` end) AS `subrol`, `usuarios`.`id` AS `id` FROM (((`usuarios` left join `roles` on((`roles`.`id` = `usuarios`.`roles_id`))) left join `departamentos` on((`departamentos`.`id` = `usuarios`.`departamento_id`))) left join `subroles` on((`subroles`.`id` = `usuarios`.`subrol_id`))) WHERE (`usuarios`.`id` <> `sessionid`())  ;

-- --------------------------------------------------------

--
-- Structure for view `serverside_user_administrador`
--
DROP TABLE IF EXISTS `serverside_user_administrador`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `serverside_user_administrador`  AS SELECT concat(`usuarios`.`nombre`,' ',`usuarios`.`apellido_pat`,' ',`usuarios`.`apellido_mat`) AS `nombre`, `usuarios`.`correo` AS `correo`, `usuarios`.`foto_identificador` AS `foto_identificador`, (case when (`departamentos`.`departamento` is null) then (case when ((`roles`.`nombre` = 'Superadministrador') or (`roles`.`nombre` = 'Administrador') or (`roles`.`nombre` = 'Usuario externo') or (`roles`.`nombre` = 'Director general')) then 'Dep. Indisponible' else 'Sin asignar' end) else `departamentos`.`departamento` end) AS `departamento`, (case when (`roles`.`nombre` is null) then 'Sin rol' else `roles`.`nombre` end) AS `rol`, (case when (`subroles`.`subrol_nombre` is null) then (case when ((`roles`.`nombre` = 'Superadministrador') or (`roles`.`nombre` = 'Administrador')) then 'Subrol indisponible' else 'Sin subrol' end) else `subroles`.`subrol_nombre` end) AS `subrol`, `usuarios`.`id` AS `id` FROM (((`usuarios` left join `roles` on((`roles`.`id` = `usuarios`.`roles_id`))) left join `departamentos` on((`departamentos`.`id` = `usuarios`.`departamento_id`))) left join `subroles` on((`subroles`.`id` = `usuarios`.`subrol_id`))) WHERE (((`roles`.`nombre` <> 'Superadministrador') AND (`roles`.`nombre` <> 'Administrador')) OR (`roles`.`nombre` is null))  ;

-- --------------------------------------------------------

--
-- Structure for view `serverside_user_vistausuarios`
--
DROP TABLE IF EXISTS `serverside_user_vistausuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `serverside_user_vistausuarios`  AS SELECT concat(`usuarios`.`nombre`,' ',`usuarios`.`apellido_pat`,' ',`usuarios`.`apellido_mat`) AS `nombre`, `usuarios`.`correo` AS `correo`, `usuarios`.`foto_identificador` AS `foto_identificador`, (case when (`departamentos`.`departamento` is null) then (case when ((`roles`.`nombre` = 'Superadministrador') or (`roles`.`nombre` = 'Administrador') or (`roles`.`nombre` = 'Usuario externo') or (`roles`.`nombre` = 'Director general')) then 'Dep. Indisponible' else 'Sin asignar' end) else `departamentos`.`departamento` end) AS `departamento`, (case when (`roles`.`nombre` is null) then 'Sin rol' else `roles`.`nombre` end) AS `rol`, (case when (`subroles`.`subrol_nombre` is null) then (case when ((`roles`.`nombre` = 'Superadministrador') or (`roles`.`nombre` = 'Administrador')) then 'Subrol indisponible' else 'Sin subrol' end) else `subroles`.`subrol_nombre` end) AS `subrol`, `usuarios`.`id` AS `id` FROM (((`usuarios` left join `roles` on((`roles`.`id` = `usuarios`.`roles_id`))) left join `departamentos` on((`departamentos`.`id` = `usuarios`.`departamento_id`))) left join `subroles` on((`subroles`.`id` = `usuarios`.`subrol_id`))) WHERE (((`roles`.`nombre` <> 'Superadministrador') AND (`roles`.`nombre` <> 'Administrador') AND (`usuarios`.`id` <> `sessionid`())) OR (`roles`.`nombre` is null))  ;

-- --------------------------------------------------------

--
-- Structure for view `serverside_user_vistatecnicos`
--
DROP TABLE IF EXISTS `serverside_user_vistatecnicos`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `serverside_user_vistatecnicos`  AS SELECT concat(`usuarios`.`nombre`,' ',`usuarios`.`apellido_pat`,' ',`usuarios`.`apellido_mat`) AS `nombre`, `usuarios`.`correo` AS `correo`, `usuarios`.`foto_identificador` AS `foto_identificador`, (case when (`departamentos`.`departamento` is null) then (case when ((`roles`.`nombre` = 'Superadministrador') or (`roles`.`nombre` = 'Administrador') or (`roles`.`nombre` = 'Usuario externo') or (`roles`.`nombre` = 'Director general')) then 'Dep. Indisponible' else 'Sin asignar' end) else `departamentos`.`departamento` end) AS `departamento`, (case when (`roles`.`nombre` is null) then 'Sin rol' else `roles`.`nombre` end) AS `rol`, (case when (`subroles`.`subrol_nombre` is null) then (case when ((`roles`.`nombre` = 'Superadministrador') or (`roles`.`nombre` = 'Administrador')) then 'Subrol indisponible' else 'Sin subrol' end) else `subroles`.`subrol_nombre` end) AS `subrol`, `usuarios`.`id` AS `id` FROM (((`usuarios` left join `roles` on((`roles`.`id` = `usuarios`.`roles_id`))) left join `departamentos` on((`departamentos`.`id` = `usuarios`.`departamento_id`))) left join `subroles` on((`subroles`.`id` = `usuarios`.`subrol_id`))) WHERE ((`roles`.`nombre` = 'Tecnico') OR (`roles`.`nombre` is null))  ;

-- --------------------------------------------------------

--
-- Structure for view `serverside_expuser`
--
DROP TABLE IF EXISTS `serverside_expuser`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `serverside_expuser`  AS SELECT (case when (`expedientes`.`num_empleado` is null) then 'Sin asignar' else `expedientes`.`num_empleado` end) AS `num_empleado`, concat(`usuarios`.`nombre`,' ',`usuarios`.`apellido_pat`,' ',`usuarios`.`apellido_mat`) AS `nombre`, `estatus_empleado`.`situacion_del_empleado` AS `estatus`, (case when (`departamentos`.`departamento` is null) then 'Sin departamento' else `departamentos`.`departamento` end) AS `departamento`, `roles`.`nombre` AS `rolnom`, (case when (`usuarios`.`subrol_id` is null) then 'Sin subrol' else `subroles`.`subrol_nombre` end) AS `subnombre`, `usuarios`.`foto_identificador` AS `foto`, `expedientes`.`id` AS `expediente_id` FROM (((((`expedientes` join `usuarios` on((`usuarios`.`id` = `expedientes`.`users_id`))) join `roles` on((`roles`.`id` = `usuarios`.`roles_id`))) join `estatus_empleado` on((`estatus_empleado`.`expedientes_id` = `expedientes`.`id`))) left join `departamentos` on((`departamentos`.`id` = `usuarios`.`departamento_id`))) left join `subroles` on((`subroles`.`id` = `usuarios`.`subrol_id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `serverside_rol`
--
DROP TABLE IF EXISTS `serverside_rol`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `serverside_rol`  AS SELECT `a`.`id` AS `rol_id`, `a`.`nombre` AS `rol`, `t1`.`id` AS `jerarquia_id`, `b`.`nombre` AS `jefe` FROM (((`roles` `a` left join `jerarquia` `t1` on((`t1`.`rol_id` = `a`.`id`))) left join `jerarquia` `t2` on((`t1`.`jerarquia_id` = `t2`.`id`))) left join `roles` `b` on((`t2`.`rol_id` = `b`.`id`)))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `serverside_permisos`
--
DROP TABLE IF EXISTS `serverside_permisos`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `serverside_permisos`  AS SELECT `permisos`.`id` AS `permisoid`, `permisos`.`nombre` AS `pernom`, `categorias`.`nombre` AS `catnom`, `categorias`.`id` AS `catid` FROM (`permisos` join `categorias` on((`categorias`.`id` = `permisos`.`categoria_id`)))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `serverside_subrol`
--

DROP TABLE IF EXISTS `serverside_subrol`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `serverside_subrol`  AS SELECT `subroles`.`id` AS `sbid`, `subroles`.`subrol_nombre` AS `sbnombre`, `roles`.`nombre` AS `rolnom` FROM (`subroles` join `roles` on((`roles`.`id` = `subroles`.`roles_id`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `serverside_historial_vacaciones`
--
DROP TABLE IF EXISTS `serverside_historial_vacaciones`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `serverside_historial_vacaciones`  AS SELECT `historial_solicitud_vacaciones`.`id` AS `id`, concat(`usuarios`.`nombre`,' ',`usuarios`.`apellido_pat`,' ',`usuarios`.`apellido_mat`) AS `nombre`, `historial_solicitud_vacaciones`.`periodo_solicitado` AS `periodo`, `historial_solicitud_vacaciones`.`fecha_solicitud` AS `fecha_solicitud`, `historial_solicitud_vacaciones`.`estatus` AS `estatus` FROM (`historial_solicitud_vacaciones` join `usuarios` on((`usuarios`.`id` = `historial_solicitud_vacaciones`.`users_id`))) ;

-- --------------------------------------------------------