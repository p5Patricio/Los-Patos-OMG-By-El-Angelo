<?php
session_start();

// Verificar si el usuario ha iniciado sesión y si es un administrador
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../../frontend/login.php"); // Redirigir al inicio de sesión si el usuario no es un administrador
    exit();
}

// Incluir archivo de configuración de la base de datos
include '../config/db.php';

$message = "";

// Procesar el formulario para actualizar disponibilidad
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['actualizar_disponibilidad'])) {
        $carro_id = $_POST['carro_id'];
        actualizarDisponibilidadCarro($carro_id);
    }
}

// Función para actualizar disponibilidad del carro
function actualizarDisponibilidadCarro($carro_id) {
    global $conn;

    // Consulta para actualizar disponibilidad del carro
    $queryUpdateCarro = "UPDATE carros SET disponibilidad = TRUE WHERE carro_id = $carro_id";
    $conn->query($queryUpdateCarro);
    // Puedes ajustar la consulta según sea necesario si deseas cambiar la disponibilidad a FALSE

    // Puedes agregar más lógica aquí si es necesario después de actualizar la disponibilidad
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
</head>
<body>
    <h1>Panel de Administrador</h1>
    <h2>Actualizar Disponibilidad</h2>
    <form method="post">
        <label for="carro_id">ID de Carro:</label>
        <input type="text" name="carro_id" id="carro_id" required>
        <button type="submit" name="actualizar_disponibilidad">Actualizar Disponibilidad</button>
    </form>
</body>
</html>
