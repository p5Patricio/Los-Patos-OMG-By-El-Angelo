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
            $sql_rentas = "SELECT * FROM rentas WHERE usuario_id='$usuario_id'";
            $result_rentas = $conn->query($sql_rentas);

            if ($result_rentas->num_rows > 0) {
                echo "<h2>Historial de Rentas</h2>";
                echo "<ul>";
                while($renta = $result_rentas->fetch_assoc()) {
                    // Obtener información del carro rentado
                    $carro_id = $renta['carro_id'];
                    $sql_carro = "SELECT * FROM carros WHERE carro_id='$carro_id'";
                    $result_carro = $conn->query($sql_carro);
                    $carro = $result_carro->fetch_assoc();

                    // Mostrar información de la renta
                    echo "<li>Carro: " . $carro['marca'] . " " . $carro['modelo'] . " - Fecha de inicio: " . $renta['fecha_inicio'] . " - Fecha de fin: " . $renta['fecha_fin'] . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No hay rentas registradas para este usuario.</p>";
            }
        }
    } else {
        echo "Usuario no encontrado";
    }
}
?>
