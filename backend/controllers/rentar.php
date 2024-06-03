<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta de Carro</title>
    <link rel="stylesheet" type="text/css" href="../../frontend/css/rentar.css">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; /* Hace que el contenedor ocupe al menos el 100% de la altura de la ventana */
        }

        .btn-secondaryr {
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
                    $marca_modelo = $row["marca"] . " " . $row["modelo"];
                    $precio_renta = $row["precio"];
                    $monto_total = calcularMontoTotalRenta($precio_renta);

                    echo "<h1>Rentar $marca_modelo</h1>";
                    echo "<img src='../../frontend/" . $row["imagen"] . "' class='car-image'>";
                    echo "<p>Precio de renta: $ $precio_renta por semana</p>";
                    echo "<p>Monto total estimado a pagar: $ $monto_total</p>";
                    echo "<p>Usuario: $usuario</p>";
                    echo "<form method='post' action='procesar_renta.php'>";
                    echo "<input type='hidden' name='carro_id' value='$carro_id'>";
                    echo "<input type='hidden' name='usuario_id' value='$usuario_id'>"; 
                    echo "<input type='submit' value='Confirmar Renta'>";
                    echo "</form>";
                } else {
                    echo "<p class='error'>El carro seleccionado no está disponible para renta.</p>";
                }
            } else {
                echo "<p class='error'>Error al obtener el ID del usuario.</p>";
            }
        } else {
            echo "<p class='error'>Para comprar o rentar un carro, por favor inicie sesión.</p>";
            echo "<a href='../../../Los-Patos-OMG-By-El-Angelo/frontend/login.php' class='btn-secondaryr'>Ir al login</a>";
        }

        function calcularMontoTotalRenta($precio) {
            // Calcular el monto total para la renta (por ejemplo, asumiendo una renta semanal)
            return $precio * 0.2; // Ejemplo: 20% del precio como monto total para la renta
        }
        ?>
    </div>
    <footer>
        &copy; 2024 Dinoco - Todos los derechos reservados.
    </footer>
    
</body>
</html>
