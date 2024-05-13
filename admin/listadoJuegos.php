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
        </style>";

        // Incluir el archivo de conexión
        require_once('../conexion.php');

        print "<h1>Informacion de usuarios</h1>";

        $consultar = "SELECT * FROM juegos";

        $registros = mysqli_query($conexion, $consultar);
        $cambiado = "";

        print "<table>";
        print "<tr><th>nombre</th>";
        print "<th>descripcion</th>";
        print "<th>descripcion_corta</th>";
        print "<th>foto1</th>";
        print "<th>foto2</th>";
        print "<th>foto3</th>";
        print "<th>Página oficial</th>";
        print "<th>etiqueta1</th>";
        print "<th>etiqueta2</th>";
        print "<th>etiqueta3</th>";
        print "<th>acciones</th></tr>";
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
            print "<td><a href='/CRUDUser/eliminarUsuario.php?codigo=$registro[0]'>Eliminar</a>  ";
            print "<a href='/CRUDUser/añadirUsuario.php?'>Añadir</a>  ";
            //Al acceder al enlace podemos sacar el id del usuario facilmente
            print "<a href='/CRUDUser/modificarUsuario.php?codigo=$$registro[0]'>Modificar</a></td></tr>";
        }
        print "</table>";
        print "<a href='../dashboard.php?'>volver al inicio</a>";
    } else {
        echo "No tienes permisos para acceder aqui";
        echo "<a href='../index.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
    }
} else {
    echo "No has iniciado sesion";
    echo "<a href='../index.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
}



include "../footer.php";
