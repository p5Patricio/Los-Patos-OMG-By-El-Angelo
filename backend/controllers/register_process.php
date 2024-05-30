<?php
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "INSERT INTO usuarios (nombre, apaterno, amaterno, telefono, correo, usuario, password) VALUES ('$nombre', '$apaterno', '$amaterno', '$telefono', '$correo', '$usuario', '$password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../../frontend/login.php");
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }
}
?>
