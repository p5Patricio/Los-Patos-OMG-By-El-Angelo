<?php
require_once '../backend/services/CarService.php';

class CarController {
    private $carService;

    public function __construct() {
        $bd = (new Database())->getConnection();
        $this->carService = new CarService($bd);
    }

    public function mostrarCatalogo() {
        $carros = $this->carService->obtenerTodosLosCarros();
        if ($carros) {
            echo json_encode(array("exito" => true, "carros" => $carros));
        } else {
            echo json_encode(array("exito" => false, "mensaje" => "Error al obtener el catálogo de carros"));
        }
    }

    public function mostrarDetallesCarro($idCarro) {
        $carro = $this->carService->obtenerCarroPorId($idCarro);
        if ($carro) {
            echo json_encode(array("exito" => true, "carro" => $carro));
        } else {
            echo json_encode(array("exito" => false, "mensaje" => "Error al obtener los detalles del carro"));
        }
    }

    public function comprarCarro($idCarro, $idUsuario) {
        // Lógica para procesar la compra del carro
        $resultado = $this->carService->procesarCompra($idCarro, $idUsuario);
        if ($resultado) {
            echo json_encode(array("exito" => true, "mensaje" => "Compra del carro realizada con éxito"));
        } else {
            echo json_encode(array("exito" => false, "mensaje" => "Error al procesar la compra del carro"));
        }
    }
}
?>
