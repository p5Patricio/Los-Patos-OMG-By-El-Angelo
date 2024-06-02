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
            $mensaje = "¡Compra realizada con éxito! Detalles de la compra:<br>";
            $mensaje .= "Carro ID: $carro_id<br>";
            $mensaje .= "Precio: $" . number_format($precio, 2) . "<br>";
            $mensaje .= "Enganche: $" . number_format($enganche, 2) . "<br>";
            $mensaje .= "Total a pagar: $" . number_format($totalPagar, 2);
        } else {
            $conn->rollback();
            $mensaje = "Error al actualizar la disponibilidad del carro: " . $conn->error;
        }
    } else {
        $conn->rollback();
        $mensaje = "Error al procesar la compra: " . $conn->error;
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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Compra</title>
    <link rel="stylesheet" type="text/css" href="../../frontend/css/ticket-compras.css">
</head>
<body>
    <div class="container">
        <h2>Ticket de Compra</h2>
        <img class="circle-img" src="../../frontend/img/dinoco.png" alt="Imagen">
        <?php if(isset($mensaje)): ?>
            <div class="ticket-info">
                <p><?php echo $mensaje; ?></p>
            </div>
        <?php endif; ?>
        <button onclick="window.location.href='../../frontend/index.php'">Home</button>
    </div>
</body>
</html>
