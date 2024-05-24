<link rel="stylesheet" href="listados.css">
<?php
include "../headerDashboard.php";

if (session_status()) {
    session_start();
    if ($_SESSION["rol"] == "admin") {
        //Codigo
        print "<style>
        table,tr,td,th{
            border:1px solid black;
            border-collapse:collapse;
            margin-top:20px;
        </style>";

        // Incluir el archivo de conexión
        require_once('../conexion.php');
        
        mysqli_select_db($conexion, "bdfinal");

        print "<h1 style=text-align:center;>Informacion de Juegos</h1>";

        $consultar = "SELECT * FROM juegos";

        $registros = mysqli_query($conexion, $consultar);
        $cambiado = "";

        print "<table style=text-align:center;>";
        print "<tr><th style='width: 10%;'>nombre</th>";
        print "<th style='width: 30%;'>descripcion</th>";
        print "<th>descripcion_corta</th>";
        print "<th>foto1</th>";
        print "<th>foto2</th>";
        print "<th>foto3</th>";
        print "<th>Página oficial</th>";
        print "<th>etq1</th>";
        print "<th>etq2</th>";
        print "<th>etq3</th>";
        print "<th style='width:20%;'>acciones</th></tr>";
        //PAra poder mandar el id del usuario
        while ($registro = mysqli_fetch_row($registros)) {
            print "<tr><td>$registro[1]</td>";
            print "<td>$registro[2]</td>";
            print "<td>$registro[3]</td>";
            print "<td><a href='/proyectoFinal/imagenes/{$registro[5]}' target='_blank'>Ver imagen</a></td>";
            print "<td><a href='/proyectoFinal/imagenes/{$registro[6]}' target='_blank'>Ver imagen</a></td>";
            print "<td><a href='/proyectoFinal/imagenes/{$registro[7]}' target='_blank'>Ver imagen</a></td>";            
            print "<td>$registro[8]</td>";
            print "<td>$registro[9]</td>";
            print "<td>$registro[10]</td>";
            print "<td>$registro[11]</td>";
            print "<td><button class='btn btn-primary btn-animado' style='background-color:red;'><a style='color:black;text-decoration:none;' href='../CRUDUser/eliminarUsuario.php?codigo=$registro[0]'>Eliminar</a></button>  ";
                print "<button class='btn btn-primary btn-animado' style='background-color:green;'><a style='color:black;text-decoration:none;' href='/CRUDUser/añadirUsuario.php?'>Añadir</a></button>";
                //Al acceder al enlace podemos sacar el id del usuario facilmente
                print "<button class='btn btn-primary btn-animado' style='background-color:yellow;margin-left:5px;'><a style='color:black;text-decoration:none;' href='../CRUDUser/modificarUsuario.php?codigo=$registro[0]'>Modificar</a></button></td></tr>";
        }
        print "</table>";
        print "<a href='../dashboard.php' style='text-align:center;'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;''></i></a>";
    } else {
        echo "No tienes permisos para acceder aqui";
        echo "<a href='../index.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
    }
} else {
    echo "No has iniciado sesion";
    echo "<a href='../index.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
}



include "../footer.php";
