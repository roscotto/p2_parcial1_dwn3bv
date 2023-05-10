<?php

const DB_SERVER = "localhost";
const DB_USER = "root";
const DB_PASS = "";
const DB_NAME = "dhara_ecommerce";

const DB_DSN = "mysql:host=".DB_SERVER.";dbname=". DB_NAME .";charset=utf8mb4";



try {
  $conexion = new PDO(DB_DSN, DB_USER, DB_PASS);
} catch (\Throwable $e) {
  echo "<p>Hubo un error de conexion con la base de datos</p>";
  echo "<pre>";
  print_r($e);
  echo "</pre>";

  // echo "<p>El error se genero en el siguiente archivo: </p>";
  // echo $e->getFile();
  // echo "<p>en la linea: </p>";
  // echo $e->getLine();
  die('se corto la ejecucion porque no se pudo establecer la conexion a la db');
}
//averiguar por la clase pdo statement
$query = "SELECT * FROM productos"
?>