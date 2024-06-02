<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de Carro</title>
    <link rel="stylesheet" type="text/css" href="../../frontend/css/comprar.css">
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

            $sql = "SELECT id FROM usuarios WHERE usuario='$usuario'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $usuario_id = $row['id'];

                $sql = "SELECT * FROM carros WHERE carro_id = $carro_id AND disponibilidad = TRUE";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<h1>Comprar " . $row["marca"] . " " . $row["modelo"] . "</h1>";
                    echo "<p>Precio: $" . $row["precio"] . "</p>";
                    $enganche = calcularEnganche($row["precio"]);
                    echo "<p>Enganche: $" . $enganche . "</p>";
                    echo "<p>Total a pagar al confirmar la compra: $" . ($row["precio"] - $enganche) . "</p>";
                    echo "<p>Usuario: " . $usuario . "</p>"; // Mostrar el usuario actual
                    echo "<form method='post' action='procesar_compra.php'>";
                    echo "<input type='hidden' name='carro_id' value='" . $carro_id . "'>";
                    echo "<input type='hidden' name='usuario_id' value='" . $usuario_id . "'>";
                    echo "<input type='submit' value='Confirmar Compra'>";
                    echo "</form>";
                } else {
                    echo "<p class='error'>El carro seleccionado no está disponible para compra.</p>";
                }
            } else {
                echo "<p class='error'>Error al obtener el ID del usuario.</p>";
            }
        } else {
            echo "<p class='error'>ID de carro no especificado o usuario no identificado.</p>";
        }
        ?>
    </div>
    <footer>
        &copy; 2024 Dinoco - Todos los derechos reservados.
    </footer>

    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        /* Estilos de la barra de navegación */
        .custom-navbar {
            background-color: #1e488f;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 30px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            color: white;
        }

        .custom-navbar h1 {
            color: white;
        }

        .nav-tabs {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .nav-tabs li {
            display: inline;
            margin-right: 20px;
        }

        .nav-tabs li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding-bottom: 5px;
            border-bottom: 2px solid transparent;
            transition: border-bottom 0.3s ease;
        }

        .nav-tabs li a:hover {
            border-bottom: 2px solid #fff;
        }

        /* Estilos del footer */
        footer {
            background-color: #1e488f;
            color: #fff;
            text-align: center;
            padding: 20px 0; 
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .container {
            max-width: 600px;
            margin: 14% auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            text-align: center;
        }

        input[type="submit"] {
            width: 48%; 
            background-color: #1e488f;
            color: #fff;
            border: none;
            padding: 10px 0; 
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px; 
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0e2c5f;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</body>
</html>
