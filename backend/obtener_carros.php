<?php

require_once './db/Database.php'; // Importa la clase Database desde el segundo archivo

$database = new Database(); // Crea una instancia de la clase Database

$conexion = $database->getConnection(); // Obtiene la conexión a la base de datos desde la instancia

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $carro_id = $_POST['carro_id'];
    $nueva_disponibilidad = $_POST['nueva_disponibilidad'];

    $sql_update = "UPDATE carros SET disponibilidad = ? WHERE carro_id = ?";
    $stmt = $conexion->prepare($sql_update);
    $stmt->bind_param("ii", $nueva_disponibilidad, $carro_id);

    if ($stmt->execute()) {
        echo "Disponibilidad actualizada correctamente.";
    } else {
        echo "Error al actualizar la disponibilidad: " . $stmt->error;
    }
    exit;
}

$sql = "SELECT * FROM carros";
$resultado = $conexion->query($sql);

$carros = array();
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $carros[] = $fila;
    }
}

echo json_encode($carros);

$conexion->close(); // Cierra la conexión después de su uso

?>