<?php
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['nombre'] = $row["nombre"];
            $_SESSION['apellidos'] = $row["apaterno"] . ' ' . $row["amaterno"];
            $_SESSION['id'] = $row["id"];
            header("Location: ../../frontend/index.php");
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>
