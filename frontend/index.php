<!DOCTYPE html>
<html>
<head>
    <title>Venta y Renta de Carros</title>
    <!-- Estilos, scripts, etc. -->
</head>
<body>
    <h1>Bienvenido a nuestro sitio de Venta y Renta de Carros</h1>
    
    <?php 
    session_start(); // Iniciar sesión para verificar si el usuario ha iniciado sesión
    if(isset($_SESSION['usuario'])) {
        echo "<p>Bienvenido, " . $_SESSION['usuario'] . " tienes el id " . $_SESSION['id'] . " | <a href='../backend/controllers/logout.php'>Cerrar Sesión</a></p>";
    } else {
        echo "<p><a href='login.php'>Iniciar Sesión</a> | <a href='register.php'>Registrarse</a></p>";
    }
    ?>

    <h2>Explora nuestro catálogo</h2>
    <a href="./catalogo.php">Ver Catálogo</a>

    <h2>Mis Compras y Rentas</h2>
    <?php 
    if(isset($_SESSION['usuario'])) {
        echo "<a href='./comprasyventas.php'>Ver Mis Compras y Rentas</a>";
    } else {
        echo "<p>Para ver sus compras y rentas, por favor <a href='login.php'>Inicie Sesión</a></p>";
    }
    ?>
    <!-- Otros enlaces o secciones relevantes de la página principal -->
</body>
</html>
