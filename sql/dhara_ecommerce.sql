-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2023 a las 17:59:26
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dhara_ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_lanzamiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`, `fecha_lanzamiento`) VALUES
(1, 'Decoración', 'Te ofrecemos una amplia gama de artículos diseñados para embellecer y personalizar todos tus espacios. Incluye elementos como cuadros, esculturas, jarrones, alfombras, espejos y lámparas, entre otros. Estos productos están disponibles en diversos estilos y materiales, lo que te permitirá a las personas expresar tu individualidad y crear ambientes únicos en tu casa u oficina.', '2023-06-19'),
(4, 'Yoga', 'Te ofrecemos una amplia gama de productos para practicar esta antigua disciplina y alcanzar un mayor bienestar físico, flexibilidad, equilibrio y paz mental. Encontrarás MAT de yoga de alta calidad, bloques de apoyo, pelotas, correas de estiramiento, ropa cómoda para la práctica, y mucho más.', '2023-06-14'),
(5, 'Meditación', 'En esta categoría podrás encontrar herramientas y accesorios que te ayudarán a practicar la meditación y lograr un estado de calma y claridad mental. Estos productos pueden incluir cojines de meditación ergonómicos, bancos de meditación, mantas suaves y confortables, inciensos relajantes, campanas tibetanas y música tranquila.  Los productos de meditación están diseñados para fomentar la relajación, reducir el estrés y promover un mayor bienestar emocional y espiritual.', '2023-06-14'),
(8, 'Rebajas', 'En esta sección podrás encontrar una amplia variedad de productos con descuentos especiales, todos por debajo de $5000. No olvides que estas ofertas son por tiempo limitado, por lo que te recomendamos aprovecharlas mientras estén disponibles.', '2023-06-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `importe` float(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `id_usuario`, `fecha`, `importe`) VALUES
(1, 1, '2023-08-04', 3400.00),
(2, 1, '2023-08-04', 25091.50),
(3, 1, '2023-08-04', 2580.00),
(4, 2, '2023-08-04', 23560.00),
(5, 1, '2023-08-05', 113805.00),
(6, 1, '2023-08-05', 10200.00),
(7, 1, '2023-08-05', 3625.00),
(8, 3, '2023-08-05', 10225.00),
(9, 4, '2023-08-05', 6800.00),
(10, 4, '2023-08-05', 6800.00),
(11, 2, '2023-08-06', 2930.50),
(12, 2, '2023-08-06', 2930.50),
(13, 5, '2023-08-06', 6500.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre_etiqueta` varchar(256) NOT NULL,
  `icono_etiq` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `nombre_etiqueta`, `icono_etiq`) VALUES
(1, 'Novedad', '01-novedad.png'),
(2, 'Producto hecho a mano', '02-hecho-a-mano.png'),
(3, 'Producto destacado', '03-prod-destacado.png'),
(4, 'Edición limitada', '04-edicion-limitada.png'),
(5, 'Producto certificado', '05-prod-certificado.png'),
(6, 'Producto ecológico', '06-prod-ecologico.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas_x_producto`
--

CREATE TABLE `etiquetas_x_producto` (
  `id` int(11) UNSIGNED NOT NULL,
  `producto_id` int(11) UNSIGNED NOT NULL,
  `etiqueta_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `etiquetas_x_producto`
--

INSERT INTO `etiquetas_x_producto` (`id`, `producto_id`, `etiqueta_id`) VALUES
(1, 1, 4),
(2, 1, 3),
(3, 15, 2),
(4, 12, 4),
(29, 33, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `origen`
--

CREATE TABLE `origen` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `continente` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `origen`
--

INSERT INTO `origen` (`id`, `nombre`, `continente`) VALUES
(1, 'India', 'Asia'),
(3, 'Japón', 'Asia'),
(4, 'Argentina', 'América del sur'),
(5, 'Malasia', 'Asia'),
(6, 'Tailandia', 'Asia'),
(7, 'Nepal', 'Asia'),
(8, 'Indonesia', 'Asia'),
(9, 'EEUU', 'América del Norte'),
(21, 'Uruguay', 'América del sur'),
(22, 'China', 'Asia'),
(23, 'Colombia', ''),
(25, 'Bolivia', 'América del Sur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_prod` varchar(256) NOT NULL,
  `categoria` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(256) NOT NULL,
  `alt` text NOT NULL,
  `descripcion` text DEFAULT NULL,
  `origen` int(11) UNSIGNED NOT NULL,
  `material` varchar(256) NOT NULL,
  `medidas` varchar(256) NOT NULL,
  `peso` varchar(256) NOT NULL,
  `cuidado` varchar(256) DEFAULT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `precio` decimal(12,2) NOT NULL,
  `inicio_promocion` datetime DEFAULT NULL,
  `fin_promocion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_prod`, `categoria`, `imagen`, `alt`, `descripcion`, `origen`, `material`, `medidas`, `peso`, `cuidado`, `stock`, `precio`, `inicio_promocion`, `fin_promocion`) VALUES
(1, 'Porta incienso plateado Buda', 1, '01.jpg', 'Porta incienso plateado Buda', 'Con un diseño inspirado en Buda, este porta incienso es perfecto para crear un ambiente relajado y meditativo. Además, su diseño es elegante y se ajusta perfectamente a cualquier decoración.', 1, 'Metal', '10 x 4 cm.', '150gr.', 'limpiar con paño húmedo', 50, '1761.00', '2023-06-01 11:17:24', '2023-07-30 11:17:24'),
(2, 'Jardín Zen Yin-yang', 1, '02.jpg', 'Jardín Zen Yin-yang', 'El karesansui, también conocido como jardín zen, es un estilo de jardín japonés seco que consiste en un campo de arena poco profunda y que contiene arena, grava, rocas y ocasionalmente hierbas, musgo y otros elementos naturales. Son utilizados como forma de meditación por los monjes Zen japoneses.', 3, 'Piedra', '15 cm.', '250gr.', 'Producto frágil', 60, '3400.00', NULL, NULL),
(3, 'Vela de soja en base de cemento Buda', 1, '03.jpg', 'Vela de soja en base de cemento Buda', 'Vela de cera de soja en base de cemento , forma rostro de Buda, con aroma a madera del arbol del Sándalo.', 4, 'cera de soja y cemento', '10 x 10 cm , 300 ml de cera de soja', '400gr.', 'Cuando se enciende dejar que se consuma la primera capa, cortar el pabilo despues de cada uso.', 100, '3625.00', NULL, NULL),
(4, 'Buda Meditando Sobre Pedestal Grande', 1, '04.jpg', 'Buda Meditando Sobre Pedestal Grande', 'Estatua de Buda decorativa, apta Exterior.', 3, 'resina náutica', '40 x 22 x 47 cm.', '2500gr.', 'Gran resistencia a la intemperie.', 25, '5900.00', NULL, NULL),
(5, 'Buda con porta velas loto', 1, '05.jpg', 'Buda con porta velas loto', 'Incluye dos soportes para velas cuidadosamente fabricados a mano, una estatua ornamental de la cabeza de Buda, piedras decorativas y base de madera.', 5, 'resina', '27 x 15.24 cm.', '629gr.', 'Producto frágil.', 354, '6500.00', NULL, NULL),
(6, 'Yoga Mat Colchoneta Pilates', 4, '06.jpg', 'Yoga Mat Colchoneta Pilates', 'Colchoneta Pilates Yoga Mat. Ideal para Fitness - Yoga - Meditación. Antideslizante | Enrollable | Transportable | Súper liviana', 6, 'PVC', '173 x 61 cm', '1000gr.', 'Para su correcta limpieza utilizar jabón neutro y un paño húmedo. NO utilizar productos de limpieza o abrasivos. No exponer al sol.', 30, '4300.00', NULL, NULL),
(7, 'Cuenco tibetano', 5, '07.jpg', 'Cuenco tibetano', 'Cuenco fabricado a mano. Excelente opción para yoga, meditación, terapia de sonido, reuniones espirituales y alivio del estrés. Ideal para curar los trastornos de estrés, el dolor y la depresión.', 7, 'bronce', '12 cm.', '433gr.', 'Limpiar con un trapo humedecido con agua dulce o destilada.', 10, '21000.00', NULL, NULL),
(8, 'Zafú De Meditación', 5, '08.jpg', 'Zafú De Meditación', 'Favorece el apoyo cómodo de las piernas y la verticalidad de la columna. Al sentarse en el Zafu para llevar a cabo la práctica de meditación, las caderas y las piernas se relajan, lo que ayuda a elevar y abrir el pecho y los pulmones y facilitar la respiración.', 3, 'gabardina, relleno de trigo sarraceno', '20 x 30 cm.', '1600gr.', 'Lavado en seco o a mano con un jabón suave.', 60, '2930.50', NULL, NULL),
(9, 'Zafú De Meditación Grande', 5, '09.jpg', 'Zafú De Meditación Grande', 'Favorece el apoyo cómodo de las piernas y la verticalidad de la columna. Al sentarse en el Zafu para llevar a cabo la práctica de meditación, las caderas y las piernas se relajan, lo que ayuda a elevar y abrir el pecho y los pulmones y facilitar la respiración.', 3, 'PVC', '85.5 x 76.2 cm.', '1522gr.', 'Lavable.', 20, '11780.00', NULL, NULL),
(10, 'Cuenco tibetano de cuarzo', 5, '10.jpg', 'Cuenco tibetano de cuarzo', 'TONALIDAD: Fa (F). Estos poderosos y cristalinos instrumentos de sanación se fabrican con cuarzo al 99%, lo que genera que su vibración sea extremadamente pura y dar increible duración. Esta frecuencia estimula la glándula pituitaria, la atención y la apertura del tercer ojo.', 8, 'cuarzo', '45.72 cm.', '3200gr.', 'Limpiar con un trapo humedecido con agua dulce o destilada.', 10, '97320.00', NULL, NULL),
(11, 'Pelota de yoga MIR', 4, '11.jpg', 'Pelota de yoga MIR', 'Pelota rítmica de 25 cm de goma inflada. Para masajes y ejercicios de coordinación y tonificación muscular. Muy utilizada en rutinas de Yoga y Pilates.', 4, 'Vinilo PVC', '45 cm.', '1000gr.', 'Limpiar con un trapo humedecido. No exponer a fuentes de calor.', 5, '6600.00', NULL, NULL),
(12, 'Colchoneta MAT de yoga MIR', 4, '12.jpg', 'Colchoneta MAT de yoga MIR', 'Goma Tramada de 6mm. de espesor. Ideal para Fitness - Yoga - Meditación. Antideslizante | Transportable | Súper liviana', 8, 'Caucho sintético NBR', '170 x 60 cm.', '1000gr.', 'Limpiar con un trapo humedecido con agua dulce o destilada.', 8, '7980.50', NULL, NULL),
(13, 'Flex ring - Aro flexible para yoga', 4, '13.jpg', 'Flex ring - Aro flexible para yoga', 'Aro flexible circular que ayuda a tonificar y afirmar áreas de músculos, específicamente tus muslos interiores y exteriores, brazos superiores, caderas, glúteos y cuello. Para entrenamiento de cuerpo completo: ideal para todo tipo de ejercicios de pilates y yoga.', 9, 'FOAM', '40 cm.', '800gr.', 'No someter a más de 100kg de presión.', 35, '8100.00', NULL, NULL),
(14, 'Ladrillo para yoga', 4, '14.jpg', 'Ladrillo para yoga', 'Los bloques para hacer yoga facilitan la realización de asanas, haciendo que el practicante pueda adaptar su postura haciéndola más accesible.', 21, 'Espuma de EVA', '22 x 11 x 7 cm.', '300gr.', 'Limpiar con un trapo humedecido.', 50, '2580.00', NULL, NULL),
(15, 'Japa Mala, Rosario de meditación', 5, '15.jpg', 'Rosario de meditación', 'Igual que un rosario cristiano se utiliza para recitar oraciones, el japa mala se utiliza para repetir mantras, es decir, frases o palabras que producen una vibración y que, repetidos, calman la mente y pueden llevarnos a un estado de conciencia superior.', 1, 'Cuentas de madera', '50 cm.', '3200gr.', 'No mojar, lavar en seco.', 10, '2900.00', NULL, NULL),
(16, 'Campanas tibetanas para meditación', 5, '16.jpg', 'Campanas tibetanas para meditación', 'Los armoniosos Címbalos de meditación tibetanos, conocidos como Ting-sha o Ting-shags, al entrechocar, instantáneamente resuenan como un eco dentro del alma humana. Su sonido es puro y cristalino, y su vibración es capaz de penetrar en los más profundos recovecos de nuestro ser, despertando la conciencia y la energía vital.', 7, 'Aleación de 7 metales', '6 cm.', '500gr.', 'Producto frágil.', 15, '25000.00', NULL, NULL),
(17, 'Campana de meditación de tres tonos', 5, '17.jpg', 'Campana de meditación de tres tonos', 'El timbre Aklot de 3 tonos es ideal para yoga o meditación. tiene un sonido melodioso, golpeando el timbre con la baqueta suavemente, obtendrás un sonido sorpresa de larga duración y un buen eco relajante. El tono de los tres timbres es de 440 Hz C7, D7, E7.', 22, 'Metal y madera', '20 cm.', '800gr.', 'Limpiar con un trapo humedecido con agua dulce o destilada.', 25, '8000.00', NULL, NULL),
(18, 'Jardín Zen grande', 1, '18.jpg', 'Jardín Zen grande', 'Los jardines zen son áreas verdes diseñadas para transmitir tranquilidad. Su composición es muy sencilla, se basa en dos elementos al alcance de todos: arena y piedras. Su principal objetivo es favorecer la serenidad interior y reducir el estrés a través de su belleza y elegancia. Aquí tienes un jardín zen en miniatuara, con un gong, arena blanca, una piedra, una planta y un buda.', 3, 'arena, piedras, madera, metal, plástico', '15 x 17 x 12 cm.', '3200gr.', 'Producto frágil', 8, '10500.00', NULL, NULL),
(19, 'Vajra Dorje Tibetano', 5, '19.jpg', 'Vajra Dorje Tibetano', 'El más importante de los objetos de culto del budismo tibetano: el Dorje, se ha convertido en el símbolo de toda manifestación de la verdad clara e invariable. En la iconografía y en los ritos del budismo Tibetano el Dorje está siempre acompañado de una Campana y junto a estos dos símbolos representan lo opuesto de convivencia, la campana símbolo del lado femenino, mientras el Dorje, es del lado masculino, del trueno y de la mente.', 7, 'Bronce', '9 cm.', '400gr.', 'Limpiar con un paño suave.', 3, '3801.00', NULL, NULL),
(20, 'Farol solar decorativo de jardín', 1, '1691437833.jpg', '  Farol solar decorativo de jardín', 'Adorno de jardín de estilo japonés o chino, pagoda Zen y linternas de palacio de cuatro esquinas de diseño arquitectónico antiguo. Ilumina tus noches con la energía silenciosa de nuestros graciosos. Sin cableado fácil de instalar.', 3, 'resina', '30 cm.', '1500gr.', 'Resistente al agua.', 10, '20300.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'producto1', 1, '1691438012.jpg', ' gggg', 'bbbb', 9, 'cemento', '30 cm', '1500 gr', 'fragil', 20, '1500.50', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_x_compra`
--

CREATE TABLE `productos_x_compra` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_compra` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_x_compra`
--

INSERT INTO `productos_x_compra` (`id`, `id_compra`, `id_producto`, `cantidad`) VALUES
(1, 1, 2, 1),
(2, 2, 2, 1),
(3, 2, 6, 3),
(4, 2, 8, 3),
(5, 3, 14, 1),
(6, 4, 9, 2),
(7, 5, 1, 5),
(8, 5, 7, 5),
(9, 6, 2, 3),
(10, 7, 3, 1),
(11, 8, 3, 1),
(12, 8, 11, 1),
(13, 9, 2, 2),
(14, 10, 2, 2),
(15, 11, 8, 1),
(16, 12, 8, 1),
(17, 13, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(256) NOT NULL,
  `nombre` varchar(256) DEFAULT NULL,
  `apellido` varchar(256) DEFAULT NULL,
  `contrasena` varchar(64) NOT NULL,
  `email` varchar(256) NOT NULL,
  `rol` enum('superadmin','admin','usuario','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `apellido`, `contrasena`, `email`, `rol`) VALUES
(1, 'jperez_dv', 'Jorge', 'Perez', '$2y$10$ifIpiDhQEBY/fJFJ7jGn4eoX8m7syw5ngWDvEvk7mt3LoGeok4HUO', 'jorge.perez@davinci.edu.ar', 'usuario'),
(2, 'ro_scotto', 'Rocio Belen', 'Scotto', '$2y$10$ifIpiDhQEBY/fJFJ7jGn4eoX8m7syw5ngWDvEvk7mt3LoGeok4HUO', 'rocio.scotto@davinci.edu.ar', 'admin'),
(3, 'pedro_gch', 'Pedro', 'Gonzalez Chavez', '$2y$10$ifIpiDhQEBY/fJFJ7jGn4eoX8m7syw5ngWDvEvk7mt3LoGeok4HUO', 'pedro.gonzalez@davinci.edu.ar', 'superadmin'),
(4, 'vero_carranza', 'Veronica', 'Carranza', '$2y$10$immrEqyWTF37RPbL9.rAhewiekUQGfPbBb3VXCspFtyxsEHPsEaKe', 'veronicacarranza@gmail.com', 'usuario'),
(5, 'usuario_prueba2', 'Nombre2', 'Apellido2', '$2y$10$QegJuQWVef1n/BTHqap/muUNBfsH.LdTN86Vg3dJRJKMBqJb2mLmC', 'emailprueba2@gmail.com', 'usuario'),
(6, 'usuario_prueba2', 'Nombre2', 'Apellido2', '$2y$10$dZdtQym4XtJfzuM2Zl5Msu1OkbJ2rx852V6vLNuy9yLZztrb8QAU2', 'emailprueba2@gmail.com', 'usuario'),
(7, 'usuario_prueba3', 'Nombre3', 'Apellido3', '$2y$10$to4TX7x0CgW0l61GHqGBc.F9teBq5uqGmc8fejv62xayES6HFXMmi', 'emailprueba3@gmail.com', 'usuario'),
(8, 'usuario_prueba4', 'Nombre4', 'Apellido4', '$2y$10$uwv0vlibWKL2p7F1MscFp.GOaESSH7G0YGlMQTEL6kioyHjACu5ZG', 'emailprueba4@gmail.com', 'usuario'),
(9, 'usuario_prueba9', 'Nombre9', 'Apellido9', '$2y$10$Su0kzNq10fLIi5Khp/CWbO9bQPcmQiZ8dBJ/wrK4dFCw3LMafVVLS', 'emailprueba9@gmail.com', 'usuario'),
(10, 'usuario_prueba10', 'Nombre10', 'Apellido10', '$2y$10$1iImgOFgJICoznqw13VXmOtySkf2Qq.PT/V.vNVzDvtsWhvAYQXZK', 'emailprueba10@gmail.com', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_info_adicional`
--

CREATE TABLE `usuarios_info_adicional` (
  `id` int(10) UNSIGNED NOT NULL,
  `ult_digitos_tarj` int(4) NOT NULL,
  `dni` varchar(256) NOT NULL,
  `telefono` varchar(256) NOT NULL,
  `calle` varchar(256) NOT NULL,
  `altura` varchar(256) NOT NULL,
  `cp` varchar(256) NOT NULL,
  `localidad` varchar(256) NOT NULL,
  `provincia` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_info_adicional`
--

INSERT INTO `usuarios_info_adicional` (`id`, `ult_digitos_tarj`, `dni`, `telefono`, `calle`, `altura`, `cp`, `localidad`, `provincia`) VALUES
(1, 0, '', '', '', '', '', '', ''),
(2, 0, '34949860', '1132419968', 'Franz Liszt', '1987', '1746', 'Francisco Álvarez', 'Buenos Aires'),
(3, 0, '', '', '', '', '', '', ''),
(4, 0, '', '', '', '', '', '', ''),
(5, 0, '34949860', '1123232323', 'Saraza', '1746', '1746', 'MORENO', 'BUENOS AIRES'),
(6, 0, '', '', '', '', '', '', ''),
(7, 0, '', '', '', '', '', '', ''),
(8, 0, '', '', '', '', '', '', ''),
(9, 1234, '34949860', '1132419968', 'Av. Cabildo', '5960', '1429', 'CABA', 'BSAS'),
(10, 0, '', '', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `etiquetas_x_producto`
--
ALTER TABLE `etiquetas_x_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `etiqueta_id` (`etiqueta_id`);

--
-- Indices de la tabla `origen`
--
ALTER TABLE `origen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria`),
  ADD KEY `origen_id` (`origen`);

--
-- Indices de la tabla `productos_x_compra`
--
ALTER TABLE `productos_x_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_info_adicional`
--
ALTER TABLE `usuarios_info_adicional`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `etiquetas_x_producto`
--
ALTER TABLE `etiquetas_x_producto`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `origen`
--
ALTER TABLE `origen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `productos_x_compra`
--
ALTER TABLE `productos_x_compra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios_info_adicional`
--
ALTER TABLE `usuarios_info_adicional`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `etiquetas_x_producto`
--
ALTER TABLE `etiquetas_x_producto`
  ADD CONSTRAINT `etiquetas_x_producto_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `etiquetas_x_producto_ibfk_2` FOREIGN KEY (`etiqueta_id`) REFERENCES `etiquetas` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`origen`) REFERENCES `origen` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_x_compra`
--
ALTER TABLE `productos_x_compra`
  ADD CONSTRAINT `productos_x_compra_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_x_compra_ibfk_2` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_info_adicional`
--
ALTER TABLE `usuarios_info_adicional`
  ADD CONSTRAINT `usuarios_info_adicional_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
