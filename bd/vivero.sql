-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2020 a las 22:46:44
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vivero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorio`
--

CREATE TABLE `accesorio` (
  `IDaccesorio` int(11) NOT NULL,
  `IDcategoria` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT 'sinImagen2.png',
  `cantidad` int(10) NOT NULL,
  `costo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `accesorio`
--

INSERT INTO `accesorio` (`IDaccesorio`, `IDcategoria`, `Titulo`, `descripcion`, `img`, `cantidad`, `costo`) VALUES
(1, 8, 'Escoba', ' Su función es barrer materiales de poca consistencia como frutos caídos, hojas secas, hierba cortada etc. La escoba Surtek 132051 está hecha de Polipropileno de Alto Impacto, lo que la hace resistente y muy flexible.', 'img01.jpeg', 10, '4.00'),
(2, 8, 'Desbrozadora', ' Esta herramienta es ideal para cortar hierba o césped en lugares donde una podadora no puede acceder. La desbrozadora a gasolina Surtek DG752A tiene una potencia de 2.65 HP además de un arnés que hace más fácil llevarla a cualquier lugar.', 'img02.jpeg', 5, '50.00'),
(3, 8, 'Cortasetos', ' Esta herramienta hace que podar árboles, setos y arbustos sea una tarea sencilla con poco esfuerzo. El cortasetos a gasolina Surtek H6024 tiene un motor de 2 tiempos con una potencia de 26 cc y sistema antivibración que garantizan un manejo muy práctico y cortes eficientes.', 'img03.jpeg', 5, '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `IDcategoria` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IDcategoria`, `Nombre`, `Descripcion`) VALUES
(6, 'Plantas sin flor', 'son aquéllas que no producen flor, por ejemplo, helechos, colas de caballo, musgos, pinos, abetos y cipreses (se dividen en briofitas, pteridofitas y gimnospermas).'),
(7, 'Plantas con flor', 'son aquéllas con flores complejas que suelen ser llamativas, las semillas están recubiertas por un fruto que las protege. De ellas se obtiene un gran número de materias primas y productos naturales. Por ejemplo, encinos, manzanos, orquídeas (se llaman angiospermas).'),
(8, 'Herramientas', 'Las herramientas de jardinería son aquellas utilizadas para fines domésticos, así como para actividades jardineras a gran escala'),
(11, 'Plantas medicinales‎ ', 'Se denomina plantas medicinales a aquellas plantas que pueden utilizarse enteras o por partes específicas (hojas, flores, frutos, cortezas, tallos o raíces), para tratar enfermedades de personas o animales. ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `IdNotificacion` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`IdNotificacion`, `Nombre`, `Correo`, `Titulo`, `Comentario`) VALUES
(6, 'Daniel Márquez', 'mdaniel.o.s@hotmail.com', 'Costo de envio', 'El costo de envio hacia El Salvador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IDProducto` int(11) NOT NULL,
  `IDcategoria` int(11) NOT NULL,
  `IDTiempo` int(11) NOT NULL,
  `IDuser` int(10) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT 'sinImagen.png',
  `cantidad` int(11) NOT NULL,
  `costo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IDProducto`, `IDcategoria`, `IDTiempo`, `IDuser`, `Titulo`, `descripcion`, `img`, `cantidad`, `costo`) VALUES
(1, 7, 5, 6, 'Girasoles', 'Empezamos nuestra lista de flores con los girasoles, una bonita planta originaria de América del Norte dónde las antiguas comunidades indígenas y las actuales lo consideran una planta sagrada puesto que va girando a lo largo del día para orientarse hacia el sol. Se trata de unas flores que pueden llegar a medir seis metros, de color amarillo anaranjado en cuyo centro se crean las semillas que una vez maduras pueden ser consumidas a modo de pipas. ¿Te gustan los girasoles? Encuentra más información en nuestro artículo sobre el girasol.', 'img1.jpeg', 10, '2.40'),
(2, 7, 5, 6, 'Rosas', 'Las rosas son naturales de América del Norte, de Europa y de Asia. Hay tres tipos de flores de rosas, clasificándose en rosas de matorral, arbustos y trepadoras. Existe un gran número de clases de rosas diferentes y sus colores son realmente variables, pudiendo ser desde blancas hasta rojas pasando por naranja, amarillo y rosa. Existen también algunas variedades realmente exóticas que pueden florecer en morado o en tonos verdes. Si te encantan las rosas, no dejes de leer nuestro artículo sobre la rosa, una de las flores más bonitas del mundo.', 'img2.jpeg', 25, '1.50'),
(3, 7, 5, 6, 'Hortensias', '', 'img3.jpeg', 2, '10.00'),
(4, 7, 5, 6, 'Tulipanes', 'Los tulipanes son unas plantas clásicas apreciadas por floristas y amantes de las plantas. Son originarios de Asia y de Europa y también están presentes en algunas zonas de Oriente Medio. Actualmente se cultivan en todo el mundo, en 100 especies diferentes y las flores salen desde bulbos subterráneos. Las variedades de colores que incluyen van desde el amarillo hasta el ciruela pasando por el rojo o el bronce. Hemos preparado toda la información sobre ellos en este artículo sobre el tulipán. ¡No te la pierdas!', 'img4.jpeg', 12, '1.50'),
(5, 6, 5, 6, 'Grama japonesa', 'Como has visto, hay diversos tipos de grama de características bastante diferentes. Si necesitas cubrir una zona que va a soportar poco tránsito, donde el sol incide durante buena parte del día y en una zona con un clima cálido templado, básicamente puedes usar la grama que más te guste teniendo en cuenta su aspecto.', 'img5.jpeg', 4, '2.00'),
(6, 11, 5, 6, 'Manzanilla', 'La manzanilla es una de las plantas medicinales que más se conocen por las propiedades de su flor. Sus efectos son especialmente relevantes en el tratamiento de molestias gastrointestinales.\r\n\r\nAdemás de ello, tiene efectos antiinflamatorios, antibacterianas y relajantes. Se utiliza en dolor gastrointestinal y muscular, calambres y cefaleas, eczemas, inflamación de encías, heridas y sinusitis. También reduce el colesterol y al parecer tiene propiedades anticancerígenas.', 'img6.jpeg', 20, '4.50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `IDTiempo` int(11) NOT NULL,
  `FechaInicial` date NOT NULL,
  `FechaFinal` date NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`IDTiempo`, `FechaInicial`, `FechaFinal`, `comentario`) VALUES
(5, '2020-04-01', '2020-05-30', 'El producto es devuelto a la empresa para tener un mayor cuido con las plantas. Pero regresan en primavera'),
(6, '2020-05-01', '2020-07-31', 'Son regresado a la empresa para el cuido del invierno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IDuser` int(10) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT 'imguser.png',
  `Estado` varchar(15) NOT NULL DEFAULT '0',
  `FechaCreado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDuser`, `Nombre`, `correo`, `contrasena`, `sexo`, `cargo`, `img`, `Estado`, `FechaCreado`) VALUES
(6, 'Administrador', 'admin@udb.edu.sv', '$2y$10$c9zNW3nMAo0/Aa7nBfxxhOJ2rGPX/iovngTIZNJcmdzKLKouOK8tS', 'Masculino', 'Administrador', 'imguser.png', 'Activo', '2020-04-15 00:10:22'),
(7, 'Daniel Márquez', 'daniel.marquez@oportunidades.org.sv', '$2y$10$UAt3eldnov7EaXmc3pjoGuGh3UPRHrruIIM7Z0Z6Dvk0af1osuS3W', 'Masculino', 'Administrador', 'imguser.png', 'Activo', '2020-05-02 23:42:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE `video` (
  `IDVideo` int(11) NOT NULL,
  `IDcategoria` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Descripcion` text NOT NULL,
  `url` varchar(250) NOT NULL,
  `FechaPublicado` datetime NOT NULL DEFAULT current_timestamp(),
  `img` varchar(100) NOT NULL DEFAULT 'image_1.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`IDVideo`, `IDcategoria`, `Titulo`, `Descripcion`, `url`, `FechaPublicado`, `img`) VALUES
(1, 6, 'Cóleos, cuidados y consejos', 'Los cóleos son plantas que podemos tener tanto en el exterior como en el interior de casa. Vamos a conocer más sobre los cuidados y características de los cóleos. ', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Ttugz8hduTQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2020-05-03 14:40:53', 'img00001.jpeg'),
(2, 7, 'Cuidados de las alegrías guineanas - Jardinería', 'Vamos a ver los cuidados de las alegrías guineanas, también llamadas Híbridos de Nueva Guinea (Impatiens hawkeri), unas plantas hermanas de la Alegría de la casa (Impatiens walleriana).', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ijY2JT7_k0A\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2020-05-03 14:42:52', 'img00002.jpeg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesorio`
--
ALTER TABLE `accesorio`
  ADD PRIMARY KEY (`IDaccesorio`),
  ADD KEY `Fk_accesorio-categoria` (`IDcategoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IDcategoria`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`IdNotificacion`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IDProducto`),
  ADD KEY `FK_usario_producto` (`IDuser`),
  ADD KEY `FK_Categoria_Producto` (`IDcategoria`),
  ADD KEY `FK_Tiempo_producto` (`IDTiempo`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`IDTiempo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDuser`);

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`IDVideo`),
  ADD KEY `FkVideo_Categoria` (`IDcategoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesorio`
--
ALTER TABLE `accesorio`
  MODIFY `IDaccesorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IDcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `IdNotificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IDProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `IDTiempo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDuser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
  MODIFY `IDVideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accesorio`
--
ALTER TABLE `accesorio`
  ADD CONSTRAINT `Fk_accesorio-categoria` FOREIGN KEY (`IDcategoria`) REFERENCES `categoria` (`IDcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_Categoria_Producto` FOREIGN KEY (`IDcategoria`) REFERENCES `categoria` (`IDcategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Tiempo_producto` FOREIGN KEY (`IDTiempo`) REFERENCES `publicaciones` (`IDTiempo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_usario_producto` FOREIGN KEY (`IDuser`) REFERENCES `usuarios` (`IDuser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FkVideo_Categoria` FOREIGN KEY (`IDcategoria`) REFERENCES `categoria` (`IDcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
