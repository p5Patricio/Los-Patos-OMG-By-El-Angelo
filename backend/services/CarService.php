<?php
require_once '../backend/models/Car.php';
require_once '../backend/db/Database.php';

class CarService {
    private $bd;

    public function __construct($bd) {
        $this->bd = $bd;
    }

    public function obtenerTodosLosCarros() {
        $sql = "SELECT * FROM carros";
        $resultado = $this->bd->query($sql);
        $carros = array(); 

        if ($resultado->num_rows > 0){
            while($fila = $resultado->fetch_assoc()){
                $carros[] = $fila;
            }
        }

        return $carros;  
    }

    public function obtenerCarroPorId($idCarro) {
        $sql = "SELECT * FROM carros WHERE id = '$idCarro'";
        $resultado = $this->bd->query($sql);

        if($resultado->num_rows == 1){
            return $resultado->fetch_assoc();
        }

        return null; 
    }

    public function procesarCompra($idCarro, $idUsuario) {
        // Lógica para procesar la compra del carro
        // Esto podría involucrar actualizar el estado del carro en la base de datos,
        // registrar la transacción, etc.
        // Por simplicidad, esto devuelve un valor booleano simulando el resultado de la operación.
        return true;
    }

    // Otros métodos requeridos para el servicio...
}
?>
