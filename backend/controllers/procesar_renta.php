<?php
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carro_id = $_POST['carro_id'];
    $usuario_id = $_POST['usuario_id'];
    $precio = obtenerPrecioCarro($carro_id);


    // Calcular el monto total para la renta (por ejemplo, asumiendo una renta semanal)
    $monto_total = $precio * 0.2; // Ejemplo: 20% del precio como monto total para la renta

    $conn->begin_transaction();

    // Registrar la renta
    $fecha_inicio = date("Y-m-d");
    $fecha_fin = date('Y-m-d', strtotime($fecha_inicio . ' + 7 days')); // Ejemplo: Rentar por 7 días
    $sql_renta = "INSERT INTO rentas (usuario_id, carro_id, fecha_inicio, fecha_fin, monto_total) VALUES ('$usuario_id', '$carro_id', '$fecha_inicio', '$fecha_fin', '$monto_total')";
    if ($conn->query($sql_renta) === TRUE) {
        $sql_disponibilidad = "UPDATE carros SET disponibilidad = FALSE WHERE carro_id = $carro_id";
        if ($conn->query($sql_disponibilidad) === TRUE) {
            $conn->commit();
            echo "Compra realizada exitosamente. Monto estimado a pagar: $" . $monto_total;
        } else {
            $conn->rollback();
            echo "Error al actualizar la disponibilidad del carro: " . $conn->error;
        }
    } else {
        $conn->rollback();
        echo "Error al procesar la renta: " . $conn->error;
    }
}

$conn->close();


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
