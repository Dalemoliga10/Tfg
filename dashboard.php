<?php 
session_start();
include "header.php" ?>

<?php


if ($_SESSION["rol"] == "admin"){
    echo "Bienvenido admin" . $_SESSION["nombre"];
    echo "<a href='cierreSesion.php'>cerrar sesion</a>";
}else if ($_SESSION["rol"] == "user"){
    echo "Bienvenido usuario" . $_SESSION["nombre"];
    echo "<a href='cierreSesion.php'>cerrar sesion</a>";}

?>

<?php include "footer.php" ?>