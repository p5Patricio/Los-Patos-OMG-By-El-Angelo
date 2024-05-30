<!DOCTYPE html>
<html>
<head>
    <title>Registrarse</title>
    <!-- Estilos, scripts, etc. -->
</head>
<body>
    <h1>Registrarse</h1>
    <form method="post" action="../backend/controllers/register_process.php">
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
    </form>
    <a href="login.php">Iniciar Sesión</a>
</body>
</html>