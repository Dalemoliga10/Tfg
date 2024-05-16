<?php
// En tu archivo conexion.php
global $servidor, $usuario, $password, $basedatos;

$servidor = "localhost";
$usuario = "root";
$password = "";

// Establecer la conexión con MySQL
$conexion = mysqli_connect($servidor, $usuario, $password) or die("Error de conexión");

?>