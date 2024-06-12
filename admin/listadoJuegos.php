<link rel="stylesheet" href="listados.css">
<?php
//Listado de juegos
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
        
        
        print "<h1 style=text-align:center;>Informacion de Juegos</h1>";

        $consultar = "SELECT * FROM juegos";

        $registros = mysqli_query($conexion, $consultar);
        $cambiado = "";
        print "<table style=text-align:center;>";
        print "<tr><th style='width:5%;'>nombre</th>";
        print "<th style='width: 35%;'>Descripcion Completa</th>";
        print "<th style='width: 25%;'>descripcion_corta</th>";
        print "<th>foto1</th>";
        print "<th>foto2</th>";
        print "<th>foto3</th>";
        print "<th style='width: 50px;'>Página oficial</th>";
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
            print "<td>"; //Control de si tiene pagina oficial o no
            if($registro[8] != ''){
                print "<a href='$registro[8]' target=_blank>Ver página</a>";
            }else{
                print"No pag";
            }
           
            print "</td>";
            print "<td>$registro[9]</td>";
            print "<td>$registro[10]</td>";
            print "<td>$registro[11]</td>";
            print "<td><button class='btn btn-primary btn-animado' style='background-color:red;'><a style='color:black;text-decoration:none;' href='../CRUD/eliminar.php?codigo=$registro[0]'>Eliminar</a></button>  ";                
            print "<button class='btn btn-primary btn-animado' style='background-color:yellow;margin-left:5px;'><a style='color:black;text-decoration:none;' href='../CRUD/modificar.php?codigo=$registro[0]'>Modificar</a></button></td></tr>";
        }
        print "</table>";
        print "</div>";
        ?>
        <div class="container d-flex flex-column align-items-center">
            <h1>Otras opciones</h1>
            <div>
                <button class='btn btn-primary btn-animado' style='background-color:green;margin-left:5px;'><a style='color:black;text-decoration:none;' href='../CRUD/alta.php?codigo=$registro[0]'>Crear juego</a></button>
                <button class='btn btn-primary btn-animado' style='background-color:green;margin-left:5px;'><a style='color:black;text-decoration:none;' href="crearEtiqueta.php">Crear etiqueta</a></button>
            </div>
        </div>
        
        <?php
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
