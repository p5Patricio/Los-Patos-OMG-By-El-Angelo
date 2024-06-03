<?php
include '../backend/config/db.php'; // Incluir el archivo donde se define la conexión a la base de datos

$sql = "SELECT * FROM carros";
$result = $conn->query($sql);

echo '<!DOCTYPE html>';
echo '<html lang="es">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>Catálogo de Carros</title>';
echo '<link rel="stylesheet" href="../frontend/css/mostrar_catalogo.css">'; // Enlace al archivo CSS
echo '</head>';
echo '<body>';

echo '<div class="contenedor-carros">';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='carro'>";
        echo "<img src='" . $row["imagen"] . "' alt='" . $row["marca"] . " " . $row["modelo"] . "'>";
        echo "<h2>" . $row["marca"] . " " . $row["modelo"] . "</h2>";
        echo "<p class='alineado-izquierda'>Año: " . $row["anio"] . "</p>";
        echo "<p class='alineado-izquierda'>Precio: $" . $row["precio"] . "</p>";
        echo "<p class='alineado-izquierda'>" . $row["descripcion"] . "</p>";
        echo "<p class='alineado-izquierda'>Características: " . $row["caracteristicas"] . "</p>";

        // Verificar la disponibilidad y deshabilitar los botones si no está disponible
        if ($row["disponibilidad"] == 1) {
            echo "<p class='alineado-izquierda'>Disponible: Sí</p>";
            echo "<button onclick='comprar(" . $row["carro_id"] . ")'>Comprar</button>";
            echo "<button onclick='rentar(" . $row["carro_id"] . ")'>Rentar</button>";
        } else {
            echo "<p class='alineado-izquierda'>Disponible: No</p>";
            echo "<button disabled>Comprar</button>";
            echo "<button disabled>Rentar</button>";
        }

        echo "</div>";
    }
} else {
    echo "No hay carros disponibles.";
}

echo '</div>';
?>
