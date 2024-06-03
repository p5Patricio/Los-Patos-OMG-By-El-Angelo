<?php
session_start();

if(isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h2>Bienvenido " . $row["usuario"] . ", aqui podras ver el historial de tus compras y rentas</h2>";
            echo "<h2>tu id de usuario es " . $row["id"] . "</h2>";
            echo "<button onclick=\"comprar(" . $row["carro_id"] . ")\">Historial de Compras</button>";
            echo "<button onclick=\"rentar(" . $row["carro_id"] . ")\">Historial de Rentas</button>";
            echo "</div>";
        }
    } else {
        echo "id del usuario no encontrado";
    }
}
?>
