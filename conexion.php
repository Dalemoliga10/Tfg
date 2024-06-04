<?php
// En tu archivo conexion.php
global $servidor, $usuario, $password, $basedatos;

$servidor = "bdq4jbeczeuvey4mum0o-mysql.services.clever-cloud.com";
$usuario = "uvksv99vnu13phpo";
$password = "0St23Y5RqQSzAqUuKdUA";

// Establecer la conexión con MySQL
$conexion = mysqli_connect($servidor, $usuario, $password) or die("Error de conexión");
mysqli_select_db($conexion, "bdq4jbeczeuvey4mum0o");

?>