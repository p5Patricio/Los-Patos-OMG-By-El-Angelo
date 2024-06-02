<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Dinoco 🏆</title>
    <link rel="stylesheet" href="./css/contacto.css">
    <style>
        .contact-info {
            text-align: center;
            margin-top: 50px; /* Añadimos espacio arriba */
        }
        .contact-card {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: inline-block;
            border: 2px solid #ccc; /* Agregamos un borde */
            max-width: 300px; /* Limitamos el ancho del contenedor */
            margin: 0 auto; /* Centramos horizontalmente */
            text-align: justify; /* Justificamos el texto */
        }
        .contact-card h3 {
            margin-bottom: 10px;
            color: #333; /* Cambiamos el color del texto */
        }
        .contact-card ul {
            list-style-type: none;
            padding: 0;
        }
        .contact-card ul li {
            margin-bottom: 5px;
            color: #666; /* Cambiamos el color del texto */
        }
        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
            display: block; /* Aseguramos que la imagen esté centrada */
            transition: transform 0.3s ease-in-out;
        }
        .profile-pic:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="custom-navbar">
        <div>
            <h1 style="font-size: 24px;">Dinoco 🏆</h1>
        </div>
        <ul class="nav-tabs">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./login.php">Log-In</a></li>
            <li><a href="./acercade.php">Acerca de nosotros</a></li>
        </ul>
    </div>

    <div class="contact-info">
        <h2>¡Contáctanos!</h2>
        <p>Para obtener más información sobre nuestros servicios de venta y alquiler de automóviles, no dudes en contactarnos:</p>
        <div class="contact-card">
            <img class="profile-pic" src="./img/jefesin.png" alt="Foto del Jefe del Área">
            <h3>Jefe del Área</h3>
            <p>Graduado con honores de la Universidad de Guanajuato con un título en Ingeniería Mecánica, nuestro Jefe del Área cuenta con una sólida formación académica y experiencia en la industria automotriz.</p>
            <ul>
                <li><strong>Nombre:</strong> Tristan Ramírez</li>
                <li><strong>Teléfono:</strong> 473-171-5026</li>
                <li><strong>Correo Electrónico:</strong> jefesin@dinoco.com</li>
            </ul>
        </div>
        <p>Nuestro equipo, liderado por el Jefe del Área, estará encantado de atenderte y responder a todas tus preguntas. ¡Esperamos escucharte pronto!</p>
    </div>

    <footer>
        &copy; 2024 Dinoco - Todos los derechos reservados.
    </footer>
</body>
</html>
