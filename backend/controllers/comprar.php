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
            echo "El carro seleccionado no está disponible para compra.";
        }
    } else {
        echo "Error al obtener el ID del usuario.";
    }
} else {
    echo "ID de carro no especificado o usuario no identificado.";
}
?>
