<?php
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carro_id = $_POST['carro_id'];
    $usuario_id = $_POST['usuario_id'];

    $precio = obtenerPrecioCarro($carro_id);
    $enganche = calcularEnganche($precio);
    $totalPagar = max(0, $precio - $enganche);

    $conn->begin_transaction();

    $fecha_venta = date("Y-m-d");
    $sql_venta = "INSERT INTO ventas (usuario_id, carro_id, fecha_venta, enganche, total_pagar) VALUES ('$usuario_id', '$carro_id', '$fecha_venta', '$enganche', '$totalPagar')";
    if ($conn->query($sql_venta) === TRUE) {
        $sql_disponibilidad = "UPDATE carros SET disponibilidad = FALSE WHERE carro_id = $carro_id";
        if ($conn->query($sql_disponibilidad) === TRUE) {
            $conn->commit();
            echo "Compra realizada exitosamente. Total a pagar: $" . $totalPagar;
        } else {
            $conn->rollback();
            echo "Error al actualizar la disponibilidad del carro: " . $conn->error;
        }
    } else {
        $conn->rollback();
        echo "Error al procesar la compra: " . $conn->error;
    }
}

$conn->close();

function calcularEnganche($precio) {
    $porcentajeEnganche = 0.1; // 10% del precio como enganche
    return $precio * $porcentajeEnganche;
}

function obtenerPrecioCarro($carro_id) {
    global $conn;
    $sql = "SELECT precio FROM carros WHERE carro_id = $carro_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["precio"];
    } else {
        return 0;
    }
}
?>
