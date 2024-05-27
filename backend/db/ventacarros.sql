-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 26-05-2024 a las 17:05:16
-- Versión del servidor: 5.7.24
-- Versión de PHP: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventacarros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carros`
--

CREATE TABLE `carros` (
  `carro_id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `anio` year(4) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text NOT NULL,
  `caracteristicas` text NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`carro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carros`
--
INSERT INTO carros (marca, modelo, anio, precio, descripcion, caracteristicas, disponibilidad) VALUES 
('Toyota', 'Yaris', '2020', 20000.00, 'Sedán compacto con excelente economía de combustible.', 'Transmisión automática, Asientos de tela, Sistema de audio con pantalla táctil.', 0),
('Toyota', 'Supra', '1999', 60000.00, '¡Prepárate para desatar todo el poder del Toyota Supra!', 'Motor turbo, Tracción trasera, Asientos deportivos de cuero.', 1),
('Toyota', 'Camry', '2018', 25000.00, 'Sedán mediano con comodidad y eficiencia.', 'Motor de 4 cilindros, Sistema de navegación, Asientos eléctricos.', 1),
('Toyota', 'RAV4', '2017', 28000.00, 'SUV compacto versátil para aventuras urbanas y todoterreno.', 'Tracción en las cuatro ruedas, Techo corredizo, Cámara de visión trasera.', 1),
('Toyota', 'Corolla', '2021', 23000.00, 'El sedán compacto más vendido del mundo.', 'Sistema de seguridad Toyota Sense, Pantalla táctil de 8 pulgadas, Control de crucero adaptativo.', 1),
('Toyota', 'Highlander', '2019', 35000.00, 'SUV de tamaño mediano para toda la familia.', 'Asientos de cuero, Sistema de entretenimiento para pasajeros traseros, AWD.', 1),
('Toyota', 'Tacoma', '2020', 32000.00, 'Pickup mediana resistente y confiable.', 'Cabina doble, Sistema de tracción activa, Cámara de vista trasera.', 1),
('Toyota', 'Prius', '2022', 27000.00, 'El híbrido líder en eficiencia de combustible.', 'Consumo de combustible de hasta 50 mpg, Sistema de infoentretenimiento de 11.6 pulgadas, Toyota Safety Sense.', 1),
('Toyota', 'Sienna', '2016', 34000.00, 'Minivan espaciosa y repleta de características de seguridad.', 'Asientos para 8 pasajeros, Puertas corredizas automáticas, Sistema de sonido JBL.', 1),
('Toyota', 'Land Cruiser', '2015', 85000.00, 'SUV de lujo y capacidad todoterreno incomparable.', 'Tracción en todas las ruedas, Asientos de cuero ventilados, Sistema de infoentretenimiento de pantalla táctil.', 1);

INSERT INTO carros (marca, modelo, anio, precio, descripcion, caracteristicas, disponibilidad) VALUES 
('Honda', 'Civic', '2019', 22000.00, 'Sedán deportivo con alta confiabilidad.', 'Motor turbo, Pantalla táctil de 7 pulgadas, Control de clima dual.', 0),
('Honda', 'Accord', '2021', 28000.00, 'Sedán mediano con estilo y rendimiento.', 'Motor de 4 cilindros, Asientos con calefacción, Sistema Honda Sensing.', 1),
('Honda', 'CR-V', '2020', 30000.00, 'SUV compacto líder en ventas con comodidad y seguridad.', 'Asientos de cuero, Techo corredizo, Sistema de audio premium.', 1),
('Honda', 'Pilot', '2018', 35000.00, 'SUV de tamaño mediano con capacidad para ocho pasajeros.', 'Asientos de segunda y tercera fila plegables, Pantalla táctil de 8 pulgadas, Tracción en todas las ruedas.', 1),
('Honda', 'Odyssey', '2017', 32000.00, 'Minivan familiar con versatilidad y tecnología.', 'Puertas corredizas eléctricas, Sistema de entretenimiento trasero, Cámara de vista trasera.', 1),
('Honda', 'HR-V', '2020', 26000.00, 'SUV subcompacto con eficiencia de combustible y espacio.', 'Asientos traseros Magic Seat, Pantalla táctil de 7 pulgadas, Honda LaneWatch.', 1),
('Honda', 'Ridgeline', '2019', 33000.00, 'Pickup mediana con características innovadoras.', 'Cama de carga de doble acción, Sistema de audio premium, Tracción en todas las ruedas.', 1),
('Honda', 'Fit', '2018', 23000.00, 'Hatchback subcompacto con asientos mágicos.', 'Asientos traseros Magic Seat, Sistema de infoentretenimiento de pantalla táctil de 7 pulgadas, Control de clima automático.', 1),
('Honda', 'Insight', '2019', 27000.00, 'Híbrido compacto con estilo y eficiencia.', 'Sistema Honda Sensing, Asientos de cuero, Pantalla táctil de 8 pulgadas.', 1),
('Honda', 'Civic Type R', '2020', 35000.00, 'Deportivo compacto con rendimiento de pista.', 'Motor turbo de 4 cilindros, Suspensión ajustable, Asientos deportivos tipo cubo.', 1);

INSERT INTO carros (marca, modelo, anio, precio, descripcion, caracteristicas, disponibilidad) VALUES 
('Nissan', 'Skyline R34', '1999', 4900000.00, '¡Experimenta la emoción pura de la velocidad con el legendario Nissan Skyline R34!', 'Motor twin-turbo RB26DETT, Tracción en las cuatro ruedas, Sistema de suspensión ajustable.', 1),
('Nissan', 'GT-R', '2021', 120000.00, 'El superdeportivo definitivo que combina rendimiento y tecnología.', 'Motor twin-turbo V6, Sistema de tracción a las cuatro ruedas ATTESA E-TS, Sistema de control de lanzamiento.', 1),
('Nissan', '370Z', '2020', 33000.00, 'El coupé deportivo legendario que ofrece emociones puras de manejo.', 'Motor V6 de 3.7 litros, Transmisión manual de 6 velocidades, Sistema de frenos deportivos.', 1),
('Nissan', 'Maxima', '2021', 35000.00, 'El sedán deportivo de lujo que combina potencia y elegancia.', 'Motor V6 de 3.5 litros, Techo corredizo panorámico, Sistema de audio premium Bose.', 1),
('Nissan', 'Leaf', '2022', 40000.00, 'El automóvil eléctrico líder en ventas con tecnología avanzada.', 'Motor eléctrico de alta eficiencia, Autonomía mejorada, Sistema ProPILOT Assist.', 1),
('Nissan', 'Armada', '2021', 65000.00, 'La SUV de lujo que ofrece comodidad y capacidad.', 'Motor V8 de 5.6 litros, Asientos de cuero con calefacción y ventilación, Sistema de entretenimiento para pasajeros.', 1),
('Nissan', 'Versa', '2022', 18000.00, 'El sedán compacto que combina estilo y economía.', 'Motor de 4 cilindros, Sistema de frenos antibloqueo, Cámara de visión trasera.', 1),
('Nissan', 'Frontier', '2021', 29000.00, 'La pickup mediana que te lleva a donde necesitas ir.', 'Motor V6 potente, Cabina King o Crew, Sistema de tracción en todas las ruedas.', 1),
('Nissan', 'Sentra', '2022', 22000.00, 'El sedán compacto con estilo y tecnología avanzada.', 'Motor de 4 cilindros, Sistema de frenado automático de emergencia, Sistema de infoentretenimiento NissanConnect.', 1),
('Nissan', 'Murano', '2021', 40000.00, 'La SUV de lujo con un diseño audaz y tecnología avanzada.', 'Motor V6 de 3.5 litros, Sistema de navegación NissanConnect, Asientos Zero Gravity.', 1);

INSERT INTO carros (marca, modelo, anio, precio, descripcion, caracteristicas, disponibilidad) VALUES 
('Mitsubishi', 'Eclipse', '1999', 40000.00, '¡Entra en el mundo de la velocidad con el Mitsubishi Eclipse!', 'Motor turbo de 4 cilindros, Tracción delantera, Asientos deportivos de cuero.', 1),
('Mitsubishi', 'Lancer Evolution', '2006', 35000.00, 'El legendario sedan deportivo con raíces en el rally.', 'Motor turbo MIVEC de 4 cilindros, Sistema de tracción en todas las ruedas, Suspensión deportiva.', 1),
('Mitsubishi', 'Outlander PHEV', '2021', 45000.00, 'La SUV híbrida enchufable que combina eficiencia y versatilidad.', 'Motor de gasolina y dos motores eléctricos, Tracción en todas las ruedas, Sistema de infoentretenimiento con pantalla táctil.', 1),
('Mitsubishi', 'Mirage', '2022', 15000.00, 'El subcompacto eficiente y asequible que te lleva más lejos con menos.', 'Motor de 3 cilindros, Sistema de frenado automático de emergencia, Control de crucero.', 1),
('Mitsubishi', 'Montero Sport', '2021', 40000.00, 'La SUV todo terreno que te lleva a lugares que nunca imaginaste.', 'Motor V6 de 3.0 litros, Tracción en todas las ruedas, Sistema de infoentretenimiento con pantalla táctil.', 1),
('Mitsubishi', 'ASX', '2021', 28000.00, 'La SUV compacta con estilo y capacidad.', 'Motor de 4 cilindros, Tracción delantera, Sistema de audio premium.', 1),
('Mitsubishi', 'Xpander', '2020', 25000.00, 'El MPV moderno que combina versatilidad y comodidad.', 'Motor de gasolina de 4 cilindros, Asientos reclinables en la tercera fila, Sistema de audio con pantalla táctil.', 1),
('Mitsubishi', 'Attrage', '2022', 18000.00, 'El sedan compacto con bajo consumo de combustible y espacio amplio.', 'Motor de 3 cilindros, Sistema de frenos antibloqueo, Control de estabilidad.', 1),
('Mitsubishi', 'Pajero', '2021', 60000.00, 'La SUV todoterreno con historia legendaria.', 'Motor V6 de 3.5 litros, Tracción en todas las ruedas, Sistema de infoentretenimiento con pantalla táctil.', 1),
('Mitsubishi', 'Strada', '2022', 32000.00, 'La pickup mediana que combina rendimiento y capacidad.', 'Motor de 4 cilindros, Tracción en todas las ruedas, Sistema de infoentretenimiento con pantalla táctil.', 1);

INSERT INTO carros (marca, modelo, anio, precio, descripcion, caracteristicas, disponibilidad) VALUES 
('Audi', 'R8', '2022', 170000.00, 'El superdeportivo de alto rendimiento que redefine la emoción de conducir.', 'Motor V10, Tracción en todas las ruedas, Sistema de escape deportivo.', 1),
('Audi', 'A4', '2021', 40000.00, 'El sedán ejecutivo con estilo y tecnología avanzada.', 'Motor de 4 cilindros, Tracción en todas las ruedas quattro, Sistema de infoentretenimiento MMI.', 1),
('Audi', 'Q7', '2022', 60000.00, 'La SUV de lujo que combina elegancia y versatilidad.', 'Motor V6 turbo, Tercera fila de asientos, Sistema de audio Bang & Olufsen.', 1),
('Audi', 'TT', '2021', 50000.00, 'El coupé deportivo que mezcla diseño clásico con tecnología moderna.', 'Motor de 4 cilindros turbo, Tracción en todas las ruedas quattro, Asientos deportivos de cuero.', 1),
('Audi', 'A6', '2021', 55000.00, 'El sedán de lujo que combina rendimiento y confort.', 'Motor V6 turbo, Interior de cuero fino, Sistema de asistencia al conductor.', 1),
('Audi', 'Q5', '2022', 48000.00, 'La SUV compacta que ofrece un equilibrio perfecto entre rendimiento y comodidad.', 'Motor de 4 cilindros turbo, Tracción en todas las ruedas quattro, Sistema de infoentretenimiento MMI.', 1),
('Audi', 'A3', '2021', 35000.00, 'El sedán compacto con estilo y tecnología avanzada.', 'Motor de 4 cilindros, Sistema de infoentretenimiento Audi Virtual Cockpit, Asientos deportivos.', 1),
('Audi', 'Q3', '2022', 42000.00, 'La SUV compacta premium con un diseño elegante y capacidad versátil.', 'Motor de 4 cilindros turbo, Sistema de tracción en todas las ruedas quattro, Sistema de navegación MMI.', 1),
('Audi', 'E-Tron', '2022', 70000.00, 'El SUV totalmente eléctrico que ofrece rendimiento y lujo sin emisiones.', 'Motor eléctrico dual, Tracción en todas las ruedas, Sistema de infoentretenimiento Audi MMI.', 1),
('Audi', 'S8', '2021', 130000.00, 'La berlina de lujo con un rendimiento impresionante.', 'Motor V8 twin-turbo, Interior de cuero Valcona, Sistema de suspensión neumática adaptativa.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `pago_id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `metodo_pago` enum('tarjeta','transferencia','efectivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`pago_id`, `venta_id`, `fecha_pago`, `monto`, `metodo_pago`) VALUES
(1, 1, '2023-01-16', '20000.00', 'tarjeta'),
(2, 2, '2023-02-21', '22000.00', 'transferencia'),
(3, 3, '2023-03-26', '30000.00', 'efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apaterno` varchar(100) NOT NULL,
  `amaterno` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apaterno`, `amaterno`, `telefono`, `correo`, `usuario`, `password`) VALUES
(1, 'Juan', 'Pérez', 'Gómez', '5551234567', 'juan.perez@example.com', 'juanp', 'password123'),
(2, 'María', 'López', 'Martínez', '5559876543', 'maria.lopez@example.com', 'marial', 'password456'),
(3, 'Carlos', 'Sánchez', 'Rodríguez', '5551112222', 'carlos.sanchez@example.com', 'carloss', 'password789'),
(4, 'Ana', 'Hernández', 'Fernández', '5553334444', 'ana.hernandez@example.com', 'anah', 'password012'),
(5, 'prueba nombre', 'apaterno', 'amaterno', '1234567890', 'test@test.com', 'prueba', '$2y$10$TKsI9/VC0aYiVf7kktlJ4.9I4/W1AhJ0/3GJmhN3.x/Z9jBPjYRgy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `venta_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `carro_id` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`venta_id`, `usuario_id`, `carro_id`, `fecha_venta`, `monto`) VALUES
(1, 1, 1, '2023-01-15', '20000.00'),
(2, 1, 2, '2023-02-20', '22000.00'),
(3, 2, 3, '2023-03-25', '30000.00'),
(4, 3, 1, '2023-04-30', '20000.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`carro_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`pago_id`),
  ADD KEY `fk_pago_venta` (`venta_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`venta_id`),
  ADD KEY `fk_venta_usuario` (`usuario_id`),
  ADD KEY `fk_venta_carro` (`carro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carros`
--
ALTER TABLE `carros`
  MODIFY `carro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `pago_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_pago_venta` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`venta_id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_venta_carro` FOREIGN KEY (`carro_id`) REFERENCES `carros` (`carro_id`),
  ADD CONSTRAINT `fk_venta_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
