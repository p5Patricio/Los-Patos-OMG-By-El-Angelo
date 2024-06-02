<?php
$sql = "SELECT * FROM carros";
$result = $conn->query($sql);

echo '<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    .contenedor-carros {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }
    .carro {
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px;
        padding: 20px;
        width: 300px;
        text-align: center;
    }
    .carro img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto 10px;
    }
    .carro h2 {
        font-size: 24px;
        margin: 10px 0;
    }
    .carro p {
        font-size: 16px;
        margin: 5px 0;
    }
    .carro button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        margin: 10px 5px;
        border-radius: 5px;
        cursor: pointer;
    }
    .carro button:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }
</style>';

echo '<h1 class="titulo">Catálogo de carros</h1>';

echo '<div class="contenedor-carros">';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='carro'>";
        echo "<img src='" . $row["imagen"] . "' alt='" . $row["marca"] . " " . $row["modelo"] . "'>";
        echo "<h2>" . $row["marca"] . " " . $row["modelo"] . "</h2>";
        echo "<p>Año: " . $row["anio"] . "</p>";
        echo "<p>Precio: $" . $row["precio"] . "</p>";
        echo "<p>" . $row["descripcion"] . "</p>";
        echo "<p>Características: " . $row["caracteristicas"] . "</p>";

        // Verificar la disponibilidad y deshabilitar los botones si no está disponible
        if ($row["disponibilidad"] == 1) {
            echo "<p>Disponible: Sí</p>";
            echo "<button onclick='comprar(" . $row["carro_id"] . ")'>Comprar</button>";
            echo "<button onclick='rentar(" . $row["carro_id"] . ")'>Rentar</button>";
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

echo '</div>';
?>
