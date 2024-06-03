<?php
$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "ventacarros";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
