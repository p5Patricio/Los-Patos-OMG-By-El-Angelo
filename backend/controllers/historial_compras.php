<?php
session_start();
include '../config/db.php';

if(isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $usuario_id = $row["id"];
            $sql_compras = "SELECT * FROM ventas WHERE usuario_id='$usuario_id'";
            $result_compras = $conn->query($sql_compras);

            if ($result_compras->num_rows > 0) {
                echo "<h2>Historial de Compras</h2>";
                echo "<ul>";
                while($compra = $result_compras->fetch_assoc()) {
                    // Obtener información del carro comprado
                    $carro_id = $compra['carro_id'];
                    $sql_carro = "SELECT * FROM carros WHERE carro_id='$carro_id'";
                    $result_carro = $conn->query($sql_carro);
                    $carro = $result_carro->fetch_assoc();

                    // Mostrar información de la compra
                    echo "<li>Carro: " . $carro['marca'] . " " . $carro['modelo'] . " - Fecha de compra: " . $compra['fecha_venta'] . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No hay compras registradas para este usuario.</p>";
            }
        }
    } else {
        echo "Usuario no encontrado";
    }
}
?>
