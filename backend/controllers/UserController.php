<?php
  require_once '../backend/services/UserService.php';

  class UserController {
    private $userService;

    public function __construct() {
      $db = (new Database())->getConnection();
      $this->userService = new UserService($db);
    }

    public function login(){
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        //validamos que no esten vacios
        if(!empty($usuario) && !empty($password)){
          $user = $this->userService->login($usuario, $password);
          if ($user){
            // redirigir a otra página
            echo json_encode(array("success" => true, "message" => "Inicio Satisfactorio"));
        } else {
          echo json_encode(array("success" => false, "message" => "Credenciales Incorrectas"));
        }
        } else {
          echo json_encode(array("success" => false, "message" => "Faltan Datos"));
        }
      } else {
        echo json_encode(array("success" => false, "message" => "Tipo de peticion incorrecta"));
      }
    }

    public function registrar() {
      $nombre = $_POST['nombre'];
      $apaterno = $_POST['apaterno'];
      $amaterno = $_POST['amaterno'];
      $telefono = $_POST['telefono'];
      $correo = $_POST['correo'];
      $usuario = $_POST['usuario'];
      $password = $_POST['password'];


      $usuarioNuevo = new User($nombre, $apaterno, $amaterno, $telefono, $correo, $usuario, $password);
      $resultado = $this->userService->registrarUsuario($usuarioNuevo);

      if($resultado){
        echo json_encode(array("success" => true, "message" => "Usuario Registrado Satisfactoriamente"));
      } else {
        echo json_encode(array("success" => false, "message" => "Error al registrar usuario"));
      }
    }

    public function obtenerTodosUsuarios() {
      $users = $this->userService->obtenerTodosUsuarios();

      if($users) {
        echo json_encode(array("success" => true, "users" => $users));
      } else {
        echo json_encode(array("success" => false, "message" => "Error al obtener usuarios"));
      }
    }

    public function borrarUsuario ($id) {
      $resultado = $this->userService->borrarUsuario($id);
      if ($resultado) {
        echo json_encode(array("success" => true, "message" => "Usuario Eliminado Correctamente"));
      } else {
        echo json_encode(array("success" => false, "message" => "Error al Borrar Usuario"));
      }
    }

    public function obtenerUsuarioPorId ($id) {
      $resultado = $this->userService->obtenerUsuarioPorId($id);
      if ($resultado) {
        echo json_encode(array("success" => true, "user" => $resultado));
      } else {
        echo json_encode(array("success" => false, "message" => "Error al Borrar Usuario"));
      }
    }

    public function actualizarUsuario ($id) {
      $nombre = $_POST['nombre'];
      $apaterno = $_POST['apaterno'];
      $amaterno = $_POST['amaterno'];
      $direccion = $_POST['direccion'];
      $telefono = $_POST['telefono'];
      $correo = $_POST['correo'];
      $usuario = $_POST['usuario'];
      $password = $_POST['password'];

      $usuarioNuevo = new User($nombre, $apaterno, $amaterno, $direccion, $telefono, $correo, $usuario, $password);
      
      $resultado = $this->userService->actualizarUsuario($id, $usuarioNuevo);

      if($resultado){
        echo json_encode(array("success" => true, "message" => "Usuario Actualizado Satisfactoriamente"));
      } else {
        echo json_encode(array("success" => false, "message" => "Error al Actualizar Usuario"));
      }
    }
  }
?>