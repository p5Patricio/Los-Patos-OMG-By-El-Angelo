<?php
session_start();
include '../backend/config/db.php'; // Iniciar sesión para verificar si el usuario ha iniciado sesión
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Carros</title>
    <link rel="stylesheet" href="./css/catalogo.css">
</head>
<body>
<div class="custom-navbar">
    <div>
        <h1 style="font-size: 24px;">Dinoco 🏆</h1>
    </div>
    <ul class="nav-tabs">
        <li><a href="./index.php">Home</a></li>
        <?php if(isset($_SESSION['nombre'])) { ?>
            <li><a href="./comprasyventas.php">Mis Compras y Rentas</a></li>
            <li><a href="../backend/controllers/logout.php">Cerrar Sesión</a></li>
        <?php } else { ?>
            <li><a href="./login.php">Log-In</a></li>
            <li><a href="./register.php">Registrarse</a></li>
        <?php } ?>
        <li><a href="./acercade.php">Acerca de Nosotros</a></li>
        <li><a href="./contacto.php">Contacto</a></li>
    </ul>
</div>
<h1>Catálogo de Carros</h1>
<?php include '../backend/controllers/mostrar_catalogo.php'; ?>
<footer>
    &copy; 2024 Dinoco - Todos los derechos reservados.
</footer>
<script src="./js/acciones_catalogo.js"></script>
</body>
</html>