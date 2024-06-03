<?php
include '../config/db.php';

$message = "";

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
            header("Location: ../../../Los-Patos-OMG-By-El-Angelo/frontend/index.php");
            exit(); // Asegúrate de salir después de redirigir
        } else {
            $message = "Usuario o contraseña incorrectos.";
        }
    } else {
        $message = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../../Los-Patos-OMG-By-El-Angelo/frontend/css/login_process.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
        }
        .message {
            width: 400px; /* Ajusta el ancho del rectángulo */
            height: 200px; /* Ajusta la altura del rectángulo */
            padding: 20px; /* Ajusta el relleno interno */
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            font-size: 1.2em;
            font-family: 'Georgia', serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .btn-secondary {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php if (!empty($message)): ?>
        <div class="message">
            <?php echo $message; ?>
            <br>
            <a href="../../../Los-Patos-OMG-By-El-Angelo/frontend/login.php" class="btn-secondary">Volver al login</a>
        </div>
    <?php endif; ?>
</body>
</html>
