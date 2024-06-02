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
            $mensaje = "¡Renta realizada con éxito! Detalles del ticket de renta:<br>";
            $mensaje .= "Carro ID: $carro_id<br>";
            $mensaje .= "Precio: $" . number_format($precio, 2) . "<br>";
            $mensaje .= "Fecha de inicio de la renta: $fecha_inicio<br>";
            $mensaje .= "Fecha de fin de la renta: $fecha_fin<br>";
            $mensaje .= "Monto total: $" . number_format($monto_total, 2);
        } else {
            $conn->rollback();
            $mensaje = "Error al actualizar la disponibilidad del carro: " . $conn->error;
        }
    } else {
        $conn->rollback();
        $mensaje = "Error al procesar la renta: " . $conn->error;
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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../frontend/css/ticket-rentas.css">

    <title>Resultado de la Renta</title>
</head>
<body>
    <div class="container">
        <h2>Ticket</h2>
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
