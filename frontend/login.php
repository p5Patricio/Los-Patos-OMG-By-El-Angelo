<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <div class="custom-navbar">
        <div>
            <h1 style="font-size: 24px;">Dinoco 🏆</h1>
        </div>
        <ul class="nav-tabs">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./acercade.php">Acerca de Nosotros</a></li>
            <li><a href="./contacto.php">Contacto</a></li>
        </ul>
    </div>

    <div class="center-container">
        <div class="card">
            <h2 style="color: #1e488f;">Iniciar Sesión</h2>
            <div class="image-container">
                <img src="./img/guido.png" alt="A los Pits!!!" class="profile-image">
            </div>
            <form method="post" action="../backend/controllers/login_process.php">
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="btn-group">
                    <input type="submit" class="btn-primary" value="Iniciar Sesión">
                    <a href="./register.php" class="btn-secondary">Registrarse</a>
                </div>
            </form>
        </div>
    </div>

    <footer>
        &copy; 2024 Dinoco - Todos los derechos reservados.
    </footer>
</body>
</html>
