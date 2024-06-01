<?php
$sql = "SELECT * FROM carros";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<img src='" . $row["imagen"] . "' alt='" . $row["marca"] . " " . $row["modelo"] . "'>";
        echo "<h2>" . $row["marca"] . " " . $row["modelo"] . "</h2>";
        echo "<p>Año: " . $row["anio"] . "</p>";
        echo "<p>Precio: $" . $row["precio"] . "</p>";
        echo "<p>" . $row["descripcion"] . "</p>";
        echo "<p>Caracteristicas: " . $row["caracteristicas"] . "</p>";

        // Verificar la disponibilidad y deshabilitar los botones si no está disponible
        if ($row["disponibilidad"] == 1) {
            echo "<p>Disponible: Sí</p>";
            echo "<button onclick=\"comprar(" . $row["carro_id"] . ")\">Comprar</button>";
            echo "<button onclick=\"rentar(" . $row["carro_id"] . ")\">Rentar</button>";
        } else {
            echo "<p>Disponible: No</p>";
            echo "<button disabled>Comprar</button>";
            echo "<button disabled>Rentar</button>";
        }

        echo "</div>";
    }
} else {
    echo "No hay carros disponibles.";
}
?>