<?php

  require_once '../backend/config/config.php';

  class Database {
    private $conn;

    public function __construct () {
      $this->conn = new mysqli('localhost:8889', 'root', 'root', 'ventacarros');

      if ($this->conn->connect_error){
        die('Error de Conexión' . $this->conn->connect_error); 
      }
    }

    public function getConnection() {
      return $this->conn;
    }
  }

?>