<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de Carro</title>
    <link rel="stylesheet" type="text/css" href="../../frontend/css/comprar.css">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; /* Hace que el contenedor ocupe al menos el 100% de la altura de la ventana */
        }

        .btn-secondaryc {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="custom-navbar">
        <div>
            <h1 style="font-size: 24px;">Dinoco 🏆</h1>
        </div>
        <ul class="nav-tabs">
            <li><a href="../../frontend/index.php">Home</a></li>
            <li><a href="../../frontend/catalogo.php">Catalogo</a></li>
            <li><a href="../../frontend/acercade.php">Acerca de Nosotros</a></li>
            <li><a href="../../frontend/contacto.php">Contacto</a></li>
        </ul>
    </div>

    <div class="container">
        <?php
        include '../config/db.php';

        session_start();

        function calcularEnganche($precio) {
            return $precio * 0.1;
        }

        if(isset($_GET['id']) && isset($_SESSION['usuario'])) {
            $carro_id = $_GET['id'];
            $usuario = $_SESSION['usuario'];

            $sql = "SELECT nombre, apaterno, amaterno, id FROM usuarios WHERE usuario='$usuario'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nombre_usuario = $row['nombre'];
                $apellido_paterno = $row['apaterno'];
                $apellido_materno = $row['amaterno'];
                $usuario_id = $row['id'];

                $sql = "SELECT * FROM carros WHERE carro_id = $carro_id AND disponibilidad = TRUE";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<div class='car-details'>";
                    echo "<h1>Comprar " . $row["marca"] . " " . $row["modelo"] . "</h1>";
                    echo "<img src='../../frontend/" . $row["imagen"] . "' class='car-image'>";
                    echo "<p>Precio: $" . $row["precio"] . "</p>";
                    $enganche = calcularEnganche($row["precio"]);
                    echo "<p>Enganche: $" . $enganche . "</p>";
                    echo "<p>Total a pagar al confirmar la compra: $" . ($row["precio"] - $enganche) . "</p>";
                    echo "<p>Persona que va a comprar: " . $nombre_usuario . " " . $apellido_paterno . " " . $apellido_materno . "</p>"; // Mostrar el nombre completo del usuario
                    echo "<form method='post' action='procesar_compra.php'>";
                    echo "<input type='hidden' name='carro_id' value='" . $carro_id . "'>";
                    echo "<input type='hidden' name='usuario_id' value='" . $usuario_id . "'>"; // Usar $usuario_id obtenido de la sesión
                    echo "<input type='submit' value='Confirmar Compra'>";
                    echo "</form>";
                    echo "</div>";
                } else {
                    echo "<p class='error'>El carro seleccionado no está disponible para compra.</p>";
                }
            } else {
                echo "<p class='error'>Error al obtener el ID del usuario.</p>";
            }
        } else {
            echo "<p class='error'>Para comprar o rentar un carro, por favor inicie sesión.</p>";
            echo "<a href='../../../Los-Patos-OMG-By-El-Angelo/frontend/login.php' class='btn-secondaryc'>Ir al login</a>";
        }
        ?>
    </div>
    <footer>
        &copy; 2024 Dinoco - Todos los derechos reservados.
    </footer>
</body>
</html>
