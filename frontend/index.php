<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta y Renta de Carros</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenido a Dinoco</h1>
        <img src="./img/dinoco.png" alt="Imagen de perfil" class="profile-image">
        <?php 
        session_start(); // Iniciar sesión para verificar si el usuario ha iniciado sesión
        if(isset($_SESSION['nombre']) && isset($_SESSION['apellidos']) && isset($_SESSION['id'])) {
            echo "<p>Bienvenido, " . $_SESSION['nombre'] . " " . $_SESSION['apellidos'] . ", tienes el id " . $_SESSION['id'] . " | <a href='../backend/controllers/logout.php' class='button'>Cerrar Sesión</a></p>";
        } else {
            echo "<p><a href='login.php' class='button'>Iniciar Sesión</a> | <a href='register.php' class='button'>Registrarse</a></p>";
        }
        ?>

        <h2>Explora nuestro catálogo</h2>
        <a href="./catalogo.php" class="button">Ver Catálogo</a>

        <h2>Mis Compras y Rentas</h2>
        <?php 
        if(isset($_SESSION['nombre'])) {
            echo "<a href='./comprasyventas.php' class='button'>Ver Mis Compras y Rentas</a>";
        } else {
            echo "<p>Para ver sus compras y rentas, por favor <a href='login.php'>Inicie Sesión</a></p>";
        }
        ?>
    </div>
</body>
</html>
