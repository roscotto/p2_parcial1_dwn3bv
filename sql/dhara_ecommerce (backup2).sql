-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2023 a las 23:57:48
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
  `fecha_lanzamiento` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`, `fecha_lanzamiento`) VALUES
(1, 'decoracion', NULL, '2023-06-14 13:19:14'),
(4, 'yoga', NULL, '2023-06-14 13:19:14'),
(5, 'meditación', NULL, '2023-06-14 13:19:14');

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
(1, 'Novedad', 'icono_generico1.png'),
(2, 'Producto hecho a mano', 'icono_generico2.png'),
(3, 'Producto destacado', 'icono_generico3.png'),
(4, 'Edición limitada', 'icono_generico4.png'),
(5, 'Producto certificado', 'icono_generico5.png'),
(6, 'Producto ecológico', 'icono_generico6.png');

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
(2, 1, 3);

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
(1, 'india', 'asia'),
(3, 'japón', 'asia'),
(4, 'argentina', 'america del sur'),
(5, 'malasia', 'asia'),
(6, 'tailandia', 'asia'),
(7, 'nepal', 'asia'),
(8, 'indonesia', 'asia'),
(9, 'eeuu', 'america del norte'),
(21, 'uruguay', 'america del sur'),
(22, 'china', 'asia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_prod` varchar(256) NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(256) NOT NULL,
  `alt` text NOT NULL,
  `descripcion` text DEFAULT NULL,
  `origen_id` int(11) UNSIGNED NOT NULL,
  `material` varchar(256) NOT NULL,
  `medidas` varchar(256) NOT NULL,
  `peso` varchar(256) NOT NULL,
  `cuidado` varchar(256) DEFAULT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `precio` decimal(12,2) NOT NULL,
  `etiqueta_id` int(10) UNSIGNED DEFAULT NULL,
  `inicio_promocion` datetime DEFAULT NULL,
  `fin_promocion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_prod`, `categoria_id`, `imagen`, `alt`, `descripcion`, `origen_id`, `material`, `medidas`, `peso`, `cuidado`, `stock`, `precio`, `etiqueta_id`, `inicio_promocion`, `fin_promocion`) VALUES
(1, 'Porta incienso plateado Buda', 1, '01.jpg', 'Porta incienso plateado Buda', 'Con un diseño inspirado en Buda, este porta incienso es perfecto para crear un ambiente relajado y meditativo. Además, su diseño es elegante y se ajusta perfectamente a cualquier decoración.', 1, 'Metal', '10 x 4 cm.', '150gr.', 'limpiar con paño húmedo', 50, '1761.00', 0, NULL, NULL),
(2, 'Jardín Zen Yin-yang', 1, '02.jpg', 'Jardín Zen Yin-yang', 'El karesansui, también conocido como jardín zen, es un estilo de jardín japonés seco que consiste en un campo de arena poco profunda y que contiene arena, grava, rocas y ocasionalmente hierbas, musgo y otros elementos naturales. Son utilizados como forma de meditación por los monjes Zen japoneses.', 3, 'Piedra', '15 cm.', '250gr.', 'Producto frágil', 60, '3400.00', NULL, NULL, NULL),
(3, 'Vela de soja en base de cemento Buda', 1, '03.jpg', 'Vela de soja en base de cemento Buda', 'Vela de cera de soja en base de cemento , forma rostro de Buda, con aroma a madera del arbol del Sándalo.', 4, 'cera de soja y cemento', '10 x 10 cm , 300 ml de cera de soja', '400gr.', 'Cuando se enciende dejar que se consuma la primera capa, cortar el pabilo despues de cada uso.', 100, '3625.00', NULL, NULL, NULL),
(4, 'Buda Meditando Sobre Pedestal Grande', 1, '04.jpg', 'Buda Meditando Sobre Pedestal Grande', 'Estatua de Buda decorativa, apta Exterior.', 3, 'resina náutica', '40 x 22 x 47 cm.', '2500gr.', 'Gran resistencia a la intemperie.', 25, '5900.00', NULL, NULL, NULL),
(5, 'Buda con porta velas loto', 1, '05.jpg', 'Buda con porta velas loto', 'Incluye dos soportes para velas cuidadosamente fabricados a mano, una estatua ornamental de la cabeza de Buda, piedras decorativas y base de madera.', 5, 'resina', '27 x 15.24 cm.', '629gr.', 'Producto frágil.', 354, '6500.00', NULL, NULL, NULL),
(6, 'Yoga Mat Colchoneta Pilates', 4, '06.jpg', 'Yoga Mat Colchoneta Pilates', 'Colchoneta Pilates Yoga Mat. Ideal para Fitness - Yoga - Meditación. Antideslizante | Enrollable | Transportable | Súper liviana', 6, 'PVC', '173 x 61 cm', '1000gr.', 'Para su correcta limpieza utilizar jabón neutro y un paño húmedo. NO utilizar productos de limpieza o abrasivos. No exponer al sol.', 30, '4300.00', NULL, NULL, NULL),
(7, 'Cuenco tibetano', 5, '07.jpg', 'Cuenco tibetano', 'Cuenco fabricado a mano. Excelente opción para yoga, meditación, terapia de sonido, reuniones espirituales y alivio del estrés. Ideal para curar los trastornos de estrés, el dolor y la depresión.', 7, 'bronce', '12 cm.', '433gr.', 'Limpiar con un trapo humedecido con agua dulce o destilada.', 10, '21000.00', NULL, NULL, NULL),
(8, 'Zafú De Meditación', 5, '08.jpg', 'Zafú De Meditación', 'Favorece el apoyo cómodo de las piernas y la verticalidad de la columna. Al sentarse en el Zafu para llevar a cabo la práctica de meditación, las caderas y las piernas se relajan, lo que ayuda a elevar y abrir el pecho y los pulmones y facilitar la respiración.', 3, 'gabardina, relleno de trigo sarraceno', '20 x 30 cm.', '1600gr.', 'Lavado en seco o a mano con un jabón suave.', 60, '2930.50', NULL, NULL, NULL),
(9, 'Zafú De Meditación Grande', 5, '09.jpg', 'Zafú De Meditación Grande', 'Favorece el apoyo cómodo de las piernas y la verticalidad de la columna. Al sentarse en el Zafu para llevar a cabo la práctica de meditación, las caderas y las piernas se relajan, lo que ayuda a elevar y abrir el pecho y los pulmones y facilitar la respiración.', 3, 'PVC', '85.5 x 76.2 cm.', '1522gr.', 'Lavable.', 20, '11780.00', NULL, NULL, NULL),
(10, 'Cuenco tibetano de cuarzo', 5, '10.jpg', 'Cuenco tibetano de cuarzo', 'TONALIDAD: Fa (F). Estos poderosos y cristalinos instrumentos de sanación se fabrican con cuarzo al 99%, lo que genera que su vibración sea extremadamente pura y dar increible duración. Esta frecuencia estimula la glándula pituitaria, la atención y la apertura del tercer ojo.', 8, 'cuarzo', '45.72 cm.', '3200gr.', 'Limpiar con un trapo humedecido con agua dulce o destilada.', 10, '97320.00', NULL, NULL, NULL),
(11, 'Pelota de yoga MIR', 4, '11.jpg', 'Pelota de yoga MIR', 'Pelota rítmica de 25 cm de goma inflada. Para masajes y ejercicios de coordinación y tonificación muscular. Muy utilizada en rutinas de Yoga y Pilates.', 4, 'Vinilo PVC', '45 cm.', '1000gr.', 'Limpiar con un trapo humedecido. No exponer a fuentes de calor.', 5, '6600.00', NULL, NULL, NULL),
(12, 'Colchoneta MAT de yoga MIR', 4, '12.jpg', 'Colchoneta MAT de yoga MIR', 'Goma Tramada de 6mm. de espesor. Ideal para Fitness - Yoga - Meditación. Antideslizante | Transportable | Súper liviana', 8, 'Caucho sintético NBR', '170 x 60 cm.', '1000gr.', 'Limpiar con un trapo humedecido con agua dulce o destilada.', 8, '7980.50', NULL, NULL, NULL),
(13, 'Flex ring - Aro flexible para yoga', 4, '13.jpg', 'Flex ring - Aro flexible para yoga', 'Aro flexible circular que ayuda a tonificar y afirmar áreas de músculos, específicamente tus muslos interiores y exteriores, brazos superiores, caderas, glúteos y cuello. Para entrenamiento de cuerpo completo: ideal para todo tipo de ejercicios de pilates y yoga.', 9, 'FOAM', '40 cm.', '800gr.', 'No someter a más de 100kg de presión.', 35, '8100.00', NULL, NULL, NULL),
(14, 'Ladrillo para yoga', 4, '14.jpg', 'Ladrillo para yoga', 'Los bloques para hacer yoga facilitan la realización de asanas, haciendo que el practicante pueda adaptar su postura haciéndola más accesible.', 21, 'Espuma de EVA', '22 x 11 x 7 cm.', '300gr.', 'Limpiar con un trapo humedecido.', 50, '2580.00', NULL, NULL, NULL),
(15, 'Japa Mala, Rosario de meditación', 5, '15.jpg', 'Rosario de meditación', 'Igual que un rosario cristiano se utiliza para recitar oraciones, el japa mala se utiliza para repetir mantras, es decir, frases o palabras que producen una vibración y que, repetidos, calman la mente y pueden llevarnos a un estado de conciencia superior.', 1, 'Cuentas de madera', '50 cm.', '3200gr.', 'No mojar, lavar en seco.', 10, '2900.00', NULL, NULL, NULL),
(16, 'Campanas tibetanas para meditación', 5, '16.jpg', 'Campanas tibetanas para meditación', 'Los armoniosos Címbalos de meditación tibetanos, conocidos como Ting-sha o Ting-shags, al entrechocar, instantáneamente resuenan como un eco dentro del alma humana. Su sonido es puro y cristalino, y su vibración es capaz de penetrar en los más profundos recovecos de nuestro ser, despertando la conciencia y la energía vital.', 7, 'Aleación de 7 metales', '6 cm.', '500gr.', 'Producto frágil.', 15, '25000.00', NULL, NULL, NULL),
(17, 'Campana de meditación de tres tonos', 5, '17.jpg', 'Campana de meditación de tres tonos', 'El timbre Aklot de 3 tonos es ideal para yoga o meditación. tiene un sonido melodioso, golpeando el timbre con la baqueta suavemente, obtendrás un sonido sorpresa de larga duración y un buen eco relajante. El tono de los tres timbres es de 440 Hz C7, D7, E7.', 22, 'Metal y madera', '20 cm.', '800gr.', 'Limpiar con un trapo humedecido con agua dulce o destilada.', 25, '8000.00', NULL, NULL, NULL),
(18, 'Jardín Zen grande', 1, '18.jpg', 'Jardín Zen grande', 'Los jardines zen son áreas verdes diseñadas para transmitir tranquilidad. Su composición es muy sencilla, se basa en dos elementos al alcance de todos: arena y piedras. Su principal objetivo es favorecer la serenidad interior y reducir el estrés a través de su belleza y elegancia. Aquí tienes un jardín zen en miniatuara, con un gong, arena blanca, una piedra, una planta y un buda.', 3, 'arena, piedras, madera, metal, plástico', '15 x 17 x 12 cm.', '3200gr.', 'Producto frágil', 8, '10500.00', NULL, NULL, NULL),
(19, 'Vajra Dorje Tibetano', 5, '19.jpg', 'Vajra Dorje Tibetano', 'El más importante de los objetos de culto del budismo tibetano: el Dorje, se ha convertido en el símbolo de toda manifestación de la verdad clara e invariable. En la iconografía y en los ritos del budismo Tibetano el Dorje está siempre acompañado de una Campana y junto a estos dos símbolos representan lo opuesto de convivencia, la campana símbolo del lado femenino, mientras el Dorje, es del lado masculino, del trueno y de la mente.', 7, 'Bronce', '9 cm.', '400gr.', 'Limpiar con un paño suave.', 3, '3801.00', NULL, NULL, NULL),
(20, 'Farol solar decorativo de jardín', 1, '20.jpg', 'Farol solar decorativo de jardín', 'Adorno de jardín de estilo japonés o chino, pagoda Zen y linternas de palacio de cuatro esquinas de diseño arquitectónico antiguo. Ilumina tus noches con la energía silenciosa de nuestros graciosos. Sin cableado fácil de instalar.', 3, 'resina', '30 cm.', '1500gr.', 'Resistente al agua.', 10, '20300.00', NULL, NULL, NULL);

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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `origen_id` (`origen_id`),
  ADD KEY `etiqueta_id` (`etiqueta_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `etiquetas_x_producto`
--
ALTER TABLE `etiquetas_x_producto`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `origen`
--
ALTER TABLE `origen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

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
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`origen_id`) REFERENCES `origen` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
