<?php
$sql = "SELECT * FROM carros";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>" . $row["marca"] . " " . $row["modelo"] . "</h2>";
        echo "<p>Año: " . $row["anio"] . "</p>";
        echo "<p>Precio: $" . $row["precio"] . "</p>";
        echo "<p>" . $row["descripcion"] . "</p>";
        echo "<button onclick=\"comprar(" . $row["carro_id"] . ")\">Comprar</button>";
        echo "<button onclick=\"rentar(" . $row["carro_id"] . ")\">Rentar</button>";
        echo "</div>";
    }
} else {
    echo "No hay carros disponibles.";
}
?>
