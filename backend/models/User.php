<?php

  class User  {
    private $id;
    private $nombre;
    private $apaterno;
    private $amaterno;
    private $telefono;
    private $correo;
    private $usuario;
    private $password;

    public function __construct ($nombre, $apaterno, $amaterno, $telefono, $correo, $usuario, $password) {
      $this->nombre = $nombre;
      $this->apaterno = $apaterno;
      $this->amaterno = $amaterno;
      $this->telefono = $telefono;
      $this->correo = $correo;
      $this->usuario = $usuario;
      $this->password = $password;
    }

    public function getId() {
      return $this->id;
    }

    public function getNombre() {
      return $this->nombre;
    }

    public function getApaterno() {
      return $this->apaterno;
    }

    public function getAmaterno() {
      return $this->amaterno;
    }

    public function getTelefono() {
      return $this->telefono;
    }

    public function getCorreo() {
      return $this->correo;
    }

    public function getUsuario() {
      return $this->usuario;
    }

    public function getPassword() {
      return $this->password;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }

    public function setApaterno($apaterno) {
      $this->apaterno = $apaterno;
    }

    public function setAmaterno($amaterno) {
      $this->amaterno = $amaterno;
    }

    public function setTelefono($telefono) {
      $this->telefono = $telefono;
    }

    public function setCorreo($correo) {
      $this->correo = $correo;
    }

    public function setUsuario($usuario) {
      $this->usuario = $usuario;
    }

    public function setPassword($password) {
      $this->password = $password;
    }
  }
?>