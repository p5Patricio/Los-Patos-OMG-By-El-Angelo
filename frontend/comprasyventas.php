<?php include '../backend/config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Historial de Compras y Rentas</title>
    <!-- Estilos, scripts, etc. -->
</head>
<body>
    <h1>Tu historial de carros comprados y rentados</h1>
    <?php include '../backend/controllers/historial_compras.php'; ?>
    <?php include '../backend/controllers/historial_rentas.php'; ?>
    <script src="./js/comprasyventas.js"></script>
</body>
</html>
