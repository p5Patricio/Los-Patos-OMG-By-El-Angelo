<?php
require_once '../backend/controllers/UserController.php';
require_once '../backend/controllers/CarController.php';

$userController = new UserController();
$carController = new CarController();

switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        $accion = $_POST['accion'];
        if ($accion == 'registrar') {
            $userController->registrar();
        } elseif ($accion == 'login') {
            $userController->login();
        } elseif ($accion == 'actualizar') {
            $idUser = $_POST['idUpdate'];
            $userController->obtenerUsuarioPorId($idUser);
        } elseif ($accion == 'borrar') {
            $idUser = $_POST['id'];
            $userController->borrarUsuario($idUser);
        } elseif ($accion == 'actualizarUsuario') {
            $idUser = $_POST['id'];
            $userController->actualizarUsuario($idUser);
        } elseif ($accion == 'comprar') {
            $idCarro = $_POST['idCarro'];
            $idUsuario = $_POST['idUsuario'];
            $carController->comprarCarro($idCarro, $idUsuario);
        }
        break;
    case 'GET':
        $accion = $_GET['accion'];
        if ($accion == 'todos') {
            $userController->obtenerTodosUsuarios();
        } elseif ($accion == 'catalogo') {
            $carController->mostrarCatalogo();
        } elseif ($accion == 'detalles') {
            $idCarro = $_GET['idCarro'];
            $carController->mostrarDetallesCarro($idCarro);
        }
        break;
}
?>