<?php include '../backend/config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Compras y Rentas</title>
    <link rel="stylesheet" href="./css/historial.css">
    <style>
        .content-container {
            background-color: white; /* color de fondo del contenedor */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px; /* ajustar el ancho del contenedor según sea necesario */
            margin: auto;
            margin-top: 20px;
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
        <li><a href="./catalogo.php">Catalogo</a></li>
        <li><a href="./acercade.php">Acerca de Nosotros</a></li>
    </ul>
</div>

<div class="content-container">
    <h1>Tu historial de carros comprados y rentados</h1>
    <?php include '../backend/controllers/historial_compras.php'; ?>
    <?php include '../backend/controllers/historial_rentas.php'; ?>
    <script src="./js/comprasyventas.js"></script>
</div>

<footer style="text-align: center; margin-top: 20px;">
    &copy; 2024 Dinoco - Todos los derechos reservados.
</footer>
</body>
</html>
