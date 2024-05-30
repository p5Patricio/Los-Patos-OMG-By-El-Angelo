<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <!-- Estilos, scripts, etc. -->
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form method="post" action="../backend/controllers/login_process.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Iniciar Sesión">
    </form>
    <a href="./register.php">Registrarse</a>
</body>
</html>
