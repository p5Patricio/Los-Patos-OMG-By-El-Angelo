<?php
session_start(); // Iniciar sesión para acceder a las variables de sesión
session_unset(); // Eliminar todas las variables de sesión
session_destroy(); // Destruir la sesión
header("Location: ../../frontend/index.php"); // Redirigir a la página de inicio
exit();
?>
