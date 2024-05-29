<?php
    interface CarInterface {
        public function registrarCarro($carro);
        public function obtenerCarroPorId($id);
        public function actualizarCarro($id, $carro);
        public function borrarCarro($id);
        public function obtenerTodosLosCarros();
    }
?>
