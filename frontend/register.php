<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="./css/registrarse.css">
    <style>
        /* Estilo para la imagen redondeada */
        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            transition: transform 0.3s ease-in-out;
        }
        
        /* Efecto de acercamiento al pasar el cursor */
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
            <li><a href="./contacto.php">Contacto</a></li>
        </ul>
    </div>
    
    <form method="post" action="../backend/controllers/register_process.php">
        <!-- Título del formulario -->
        <h2 style="text-align: center;">Regístrate</h2>
        
        <!-- Imagen redondeada con efecto de acercamiento -->
        <img src="./img/rayo.png" alt="Imagen de perfil" class="profile-pic"><br><br>
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apaterno">Apellido Paterno:</label>
        <input type="text" id="apaterno" name="apaterno" required><br><br>

        <label for="amaterno">Apellido Materno:</label>
        <input type="text" id="amaterno" name="amaterno" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Registrarse">
        <a href="login.php">Iniciar Sesión</a> <!-- Enlace agregado -->
    </form>
    
    <footer>
        &copy; 2024 Dinoco - Todos los derechos reservados.
    </footer>
</body>
</html>
