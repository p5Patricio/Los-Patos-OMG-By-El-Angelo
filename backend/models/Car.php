<?php

class Car {
    private $id;
    private $anio;
    private $modelo;
    private $marca;
    private $precio;
    private $descripcion;
    private $enganche;
    private $comisionApertura;
    private $seguroContado;

    public function __construct($anio, $modelo, $marca, $precio, $descripcion, $enganche, $comisionApertura, $seguroContado) {
        $this->anio = $anio;
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->enganche = $enganche;
        $this->comisionApertura = $comisionApertura;
        $this->seguroContado = $seguroContado;
    }

    public function getId() {
        return $this->id;
    }

    public function getAnio() {
        return $this->anio;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getEnganche() {
        return $this->enganche;
    }

    public function getComisionApertura() {
        return $this->comisionApertura;
    }

    public function getSeguroContado() {
        return $this->seguroContado;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Métodos setters para las demás propiedades...
}
?>
