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
            echo "<h1>Rentar " . $row["marca"] . " " . $row["modelo"] . "</h1>";
            echo "<p>Precio de renta: $" . $row["precio"] . " por semana</p>";
            $monto_total = calcularMontoTotalRenta($row["precio"]);
            echo "<p>Monto total estimado a pagar: $" . $monto_total . "</p>";
            echo "<p>Usuario: " . $usuario . "</p>";
            echo "<form method='post' action='procesar_renta.php'>";
            echo "<input type='hidden' name='carro_id' value='" . $carro_id . "'>";
            echo "<input type='hidden' name='usuario_id' value='" . $usuario_id . "'>"; 
            echo "<input type='submit' value='Confirmar Renta'>";
            echo "</form>";
        } else {
            echo "El carro seleccionado no está disponible para renta.";
        }
    } else {
        echo "Error al obtener el ID del usuario.";
    }
} else {
    echo "ID de carro no especificado o usuario no identificado.";
}

function calcularMontoTotalRenta($precio) {
    // Calcular el monto total para la renta (por ejemplo, asumiendo una renta semanal)
    return $precio * 0.2; // Ejemplo: 20% del precio como monto total para la renta
}
?>
