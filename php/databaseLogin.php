<?php 
$servidor = '127.0.0.1';
$cuenta = 'root';
$password = '';
$bd = 'truenews';
try {
    $conn = new PDO("mysql:host=$servidor;dbname=$bd;", $cuenta, $password);
  } catch (PDOException $e) {
    die('Conexión Fallida: ' . $e->getMessage());
  }

?>