-- Crear base de datos
CREATE DATABASE IF NOT EXISTS ventacarros;
USE ventacarros;

-- Tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apaterno VARCHAR(100) NOT NULL,
    amaterno VARCHAR(100) NOT NULL,
    telefono VARCHAR(15),
    correo VARCHAR(100) UNIQUE NOT NULL,
    usuario VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Tabla de carros
CREATE TABLE IF NOT EXISTS carros (
    carro_id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    anio YEAR NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    descripcion TEXT NOT NULL,
    caracteristicas TEXT NOT NULL,
    disponibilidad BOOLEAN DEFAULT TRUE NOT NULL,
    imagen VARCHAR(255)
);

-- Tabla de ventas
CREATE TABLE IF NOT EXISTS ventas (
    venta_id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    carro_id INT NOT NULL,
    fecha_venta DATE NOT NULL,
    enganche DECIMAL(10, 2) NOT NULL,
    total_pagar DECIMAL(10, 2) NOT NULL,
    CONSTRAINT fk_venta_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    CONSTRAINT fk_venta_carro FOREIGN KEY (carro_id) REFERENCES carros(carro_id)
);

-- Tabla de rentas
CREATE TABLE IF NOT EXISTS rentas (
    renta_id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    carro_id INT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    monto_total DECIMAL(10, 2) NOT NULL,
    CONSTRAINT fk_renta_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    CONSTRAINT fk_renta_carro FOREIGN KEY (carro_id) REFERENCES carros(carro_id)
);

-- Tabla de pagos
CREATE TABLE IF NOT EXISTS pagos_ventas (
    pago_id INT AUTO_INCREMENT PRIMARY KEY,
    venta_id INT NOT NULL,
    fecha_pago DATE NOT NULL,
    enganche DECIMAL(10, 2) NOT NULL,
    metodo_pago ENUM('tarjeta', 'transferencia', 'efectivo') NOT NULL,
    CONSTRAINT fk_pago_venta FOREIGN KEY (venta_id) REFERENCES ventas(venta_id)
);

-- Tabla de pagos para rentas
CREATE TABLE IF NOT EXISTS pagos_rentas (
    pago_id INT AUTO_INCREMENT PRIMARY KEY,
    renta_id INT NOT NULL,
    fecha_pago DATE NOT NULL,
    monto_pago DECIMAL(10, 2) NOT NULL,
    metodo_pago ENUM('tarjeta', 'transferencia', 'efectivo') NOT NULL,
    CONSTRAINT fk_pago_renta FOREIGN KEY (renta_id) REFERENCES rentas(renta_id)
);

INSERT INTO `carros` (`marca`, `modelo`, `anio`, `precio`, `descripcion`, `caracteristicas`, `disponibilidad`, `imagen`) VALUES
('Toyota', 'Supra', 1999, '60000.00', '¡Prepárate para desatar todo el poder del Toyota Supra!', 'Motor turbo, Tracción trasera, Asientos deportivos de cuero.', 0, 'img/supra.jpg'),
('Toyota', 'RAV4', 2017, '28000.00', 'SUV compacto versátil para aventuras urbanas y todoterreno.', 'Tracción en las cuatro ruedas, Techo corredizo, Cámara de visión trasera.', 1, 'img/rav4.jpg'),
('Toyota', 'Corolla', 2021, '23000.00', 'El sedán compacto más vendido del mundo.', 'Sistema de seguridad Toyota Sense, Pantalla táctil de 8 pulgadas, Control de crucero adaptativo.', 1, 'img/corolla.jpg'),
('Toyota', 'Tacoma', 2020, '32000.00', 'Pickup mediana resistente y confiable.', 'Cabina doble, Sistema de tracción activa, Cámara de vista trasera.', 1, 'img/tacoma.jpg'),
('Toyota', 'Sienna', 2016, '34000.00', 'Minivan espaciosa y repleta de características de seguridad.', 'Asientos para 8 pasajeros, Puertas corredizas automáticas, Sistema de sonido JBL.', 1, 'img/sienna.jpg'),
('Honda', 'HR-V', 2020, '26000.00', 'SUV subcompacto con eficiencia de combustible y espacio.', 'Asientos traseros Magic Seat, Pantalla táctil de 7 pulgadas, Honda LaneWatch.', 1, 'img/hrv.jpg'),
('Honda', 'Ridgeline', 2019, '33000.00', 'Pickup mediana con características innovadoras.', 'Cama de carga de doble acción, Sistema de audio premium, Tracción en todas las ruedas.', 1, 'img/ridgeline.jpg'),
('Honda', 'Fit', 2018, '23000.00', 'Hatchback subcompacto con asientos mágicos.', 'Asientos traseros Magic Seat, Sistema de infoentretenimiento de pantalla táctil de 7 pulgadas, Control de clima automático.', 1, 'img/fit.jpg'),
('Honda', 'Insight', 2019, '27000.00', 'Híbrido compacto con estilo y eficiencia.', 'Sistema Honda Sensing, Asientos de cuero, Pantalla táctil de 8 pulgadas.', 1, 'img/insight.jpg'),
('Honda', 'Civic Type R', 2020, '35000.00', 'Deportivo compacto con rendimiento de pista.', 'Motor turbo de 4 cilindros, Suspensión ajustable, Asientos deportivos tipo cubo.', 1, 'img/civictyper.jpg'),
('Nissan', 'Skyline R34', 1999, '4900000.00', '¡Experimenta la emoción pura de la velocidad con el legendario Nissan Skyline R34!', 'Motor twin-turbo RB26DETT, Tracción en las cuatro ruedas, Sistema de suspensión ajustable.', 1, 'img/skyline.jpg'),
('Nissan', '370Z', 2020, '33000.00', 'El coupé deportivo legendario que ofrece emociones puras de manejo.', 'Motor V6 de 3.7 litros, Transmisión manual de 6 velocidades, Sistema de frenos deportivos.', 1, 'img/370z.jpg'),
('Nissan', 'Versa', 2022, '18000.00', 'El sedán compacto que combina estilo y economía.', 'Motor de 4 cilindros, Sistema de frenos antibloqueo, Cámara de visión trasera.', 1, 'img/versa.jpg'),
('Nissan', 'Frontier', 2021, '29000.00', 'La pickup mediana que te lleva a donde necesitas ir.', 'Motor V6 potente, Cabina King o Crew, Sistema de tracción en todas las ruedas.', 1, 'img/frontier.jpg'),
('Nissan', 'Sentra', 2022, '22000.00', 'El sedán compacto con estilo y tecnología avanzada.', 'Motor de 4 cilindros, Sistema de frenado automático de emergencia, Sistema de infoentretenimiento NissanConnect.', 1, 'img/sentra.jpg'),
('Mitsubishi', 'Eclipse', 1999, '40000.00', '¡Entra en el mundo de la velocidad con el Mitsubishi Eclipse!', 'Motor turbo de 4 cilindros, Tracción delantera, Asientos deportivos de cuero.', 0, 'img/eclipse.jpg'),
('Mitsubishi', 'Lancer Evolution', 2006, '35000.00', 'El legendario sedan deportivo con raíces en el rally.', 'Motor turbo MIVEC de 4 cilindros, Sistema de tracción en todas las ruedas, Suspensión deportiva.', 1, 'img/lancer.jpg'),
 ('Mitsubishi', 'Mirage', 2022, '15000.00', 'El subcompacto eficiente y asequible que te lleva más lejos con menos.', 'Motor de 3 cilindros, Sistema de frenado automático de emergencia, Control de crucero.', 1, 'img/mirage.jpg'),
('Mitsubishi', 'ASX', 2021, '28000.00', 'La SUV compacta con estilo y capacidad.', 'Motor de 4 cilindros, Tracción delantera, Sistema de audio premium.', 1, 'img/asx.jpg'),
('Audi', 'R8', 2022, '170000.00', 'El superdeportivo de alto rendimiento que redefine la emoción de conducir.', 'Motor V10, Tracción en todas las ruedas, Sistema de escape deportivo.', 1, 'img/r8.jpg'),
('Audi', 'A4', 2021, '40000.00', 'El sedán ejecutivo con estilo y tecnología avanzada.', 'Motor de 4 cilindros, Tracción en todas las ruedas quattro, Sistema de infoentretenimiento MMI.', 1, 'img/a4.jpg'),
('Audi', 'Q7', 2022, '60000.00', 'La SUV de lujo que combina elegancia y versatilidad.', 'Motor V6 turbo, Tercera fila de asientos, Sistema de audio Bang & Olufsen.', 1, 'img/q7.jpg'),
('Audi', 'TT', 2021, '50000.00', 'El coupé deportivo que mezcla diseño clásico con tecnología moderna.', 'Motor de 4 cilindros turbo, Tracción en todas las ruedas quattro, Asientos deportivos de cuero.', 1, 'img/tt.jpg'),
('Audi', 'A6', 2021, '55000.00', 'El sedán de lujo que combina rendimiento y confort.', 'Motor V6 turbo, Interior de cuero fino, Sistema de asistencia al conductor.', 1, 'img/a6.jpg');


INSERT INTO usuarios (nombre, apaterno, amaterno, telefono, correo, usuario, password) VALUES
('Juan', 'Pérez', 'Gómez', '5551234567', 'juan.perez@example.com', 'juanp', 'password123'),
('María', 'López', 'Martínez', '5559876543', 'maria.lopez@example.com', 'marial', 'password456'),
('Carlos', 'Sánchez', 'Rodríguez', '5551112222', 'carlos.sanchez@example.com', 'carloss', 'password789'),
('Ana', 'Hernández', 'Fernández', '5553334444', 'ana.hernandez@example.com', 'anah', 'password012');


-- Insertar datos en la tabla de ventas
INSERT INTO ventas (usuario_id, carro_id, fecha_venta, enganche) VALUES
(1, 1, '2023-01-15', 20000.00),
(1, 2, '2023-02-20', 22000.00),
(2, 3, '2023-03-25', 30000.00),
(3, 1, '2023-04-30', 20000.00); -- Ejemplo de un usuario que compra más de un carro

-- Insertar datos en la tabla de ventas
INSERT INTO rentas (usuario_id, carro_id, fecha_inicio, fecha_fin, monto_total)
	VALUES(1, 3, '2024-05-29', '2024-06-05', 250.00),
		(1, 7, '2024-06-29', '2024-07-05', 250.00),
        (1, 7, '2024-07-29', '2024-08-05', 250.00);

-- SELECT * from carros where carro_id=1

-- Insertar datos en la tabla de pagos
INSERT INTO pagos_ventas (venta_id, fecha_pago, enganche, metodo_pago) VALUES
(1, '2023-01-16', 20000.00, 'tarjeta'),
(2, '2023-02-21', 22000.00, 'transferencia'),
(3, '2023-03-26', 30000.00, 'efectivo');

INSERT INTO pagos_rentas (renta_id, fecha_pago, monto_pago, metodo_pago) VALUES
(1, '2023-01-16', 20000.00, 'tarjeta'),
(2, '2023-02-21', 22000.00, 'transferencia'),
(3, '2023-03-26', 30000.00, 'efectivo');

SELECT
    u.id AS usuario_id,
    u.nombre,
    u.apaterno,
    u.amaterno,
    u.telefono,
    u.correo,
    u.usuario,
    v.venta_id,
    v.fecha_venta,
    v.enganche,
    c.carro_id,
    c.marca,
    c.modelo,
    c.anio,
    c.precio,
    c.descripcion
FROM
    usuarios u
JOIN
    ventas v ON u.id = v.usuario_id
JOIN
    carros c ON v.carro_id = c.carro_id
WHERE
    u.usuario = 'juanp';  -- Reemplaza 'juanp' con el nombre de usuario específico que deseas consultar */