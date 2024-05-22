<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Listado de juegos</title>
</head>
<style>
.card {
    background-color: rgb(0, 51, 128);
    transition: background-color 0.5s !important; /* transición */
}

.card:hover {
    background-color: blue;
}

</style>
<link rel="stylesheet" href="css/estiloListado.css">
<body>
    <?php
    include "header.php";
    require_once("conexion.php");

    $nombre = $_GET['nombre'];

    $selectedOptions = array();

    // Iterar sobre los valores recibidos del formulario
    foreach ($_GET as $key => $value) {
        // Verificar si el valor recibido corresponde a un checkbox seleccionado
        if (/*substr($key, 0, 6) && */$value === 'on') {
            // Agregar la opción seleccionada al array
            $selectedOptions[] = $key;
        }
    }

    //Quitar los _ que salen en el array de los checkbox selecionados
    for($i=0;$i<sizeof($selectedOptions);$i = $i + 1){
        $selectedOptions[$i] = str_replace("_", " ", $selectedOptions[$i]);
    }

    //echo sizeof($selectedOptions);
    //Con esto filtro por nombre y etiquetas solo si ha puesto
    $idEtiquetas = array();
    if(sizeof($selectedOptions)>0){
        for($i=0;$i<sizeof($selectedOptions);$i= $i +1){
            $consultarEtiquetas = "SELECT id FROM etiquetas WHERE nombre LIKE '$selectedOptions[$i]%'";
            $registros = mysqli_query($conexion, $consultarEtiquetas);

            while ($registro = mysqli_fetch_row($registros)) { 
                $idEtiquetas []= $registro[0];
            }
        }
        var_dump($idEtiquetas);
        
    }
    $consultar = "SELECT * FROM juegos WHERE nombre LIKE '$nombre%' ORDER BY nombre";
    //else{
    //     $consultar = "SELECT * FROM juegos WHERE nombre LIKE '$nombre%' ORDER BY nombre";
    // }
    // Seleccionamos la Base de Datos
    mysqli_select_db($conexion, "bdfinal");

    

    $registros = mysqli_query($conexion, $consultar);

    if($nombre != ''){
    ?>
    <p class="d-flex justify-content-center">Juegos que comienzan por <?php echo $nombre ?></p>
    <?php }else{?>
        <p class="d-flex justify-content-center">Todos los juegos</p>
    <?php } ?>

    <div class="container-fluid d-flex flex-column mb-4" style="width: 75%;">
        <?php while ($registro = mysqli_fetch_row($registros)) { ?>
            
            <!-- Ya he sacado los datos basados en el nombre, ahora filtro por etiqueta -->
            <?php 
            if(sizeof($idEtiquetas) != 0){
                $tieneEtiquetas = True;
                //Itero sobre todas las etiquetas, para comprobar si las etiquetas 
                //1,2,3 tienen esa
                for($i=0;$i<sizeof($idEtiquetas);$i= $i +1){

                    //Comprueba primera etiqueta
                    if($idEtiquetas[$i] == $registro[9]){
                        //Si la ha encontrado, no hay que seguir revisando, 
                        //que pase directamente a la siguiente etiqueta
                        continue;
                    }else{
                        //Comprueba segunda etiqueta del juego
                        if($idEtiquetas[$i] == $registro[10]){
                            continue;
                            
                        }else{
                            //Comprueba tercera etiqueta del juego
                            if($idEtiquetas[$i] == $registro[11]){
                                continue;
                            }else{
                                //En caso de no haber encontrado la etiqueta marcada en ninguna 
                                //de las 3 etiquetas que tiene el juego, marca falso y sale del bucle
                                $tieneEtiquetas = False;
                                break;
                            }
                        }
                    }
                }
                
            if($tieneEtiquetas == True){
            echo "<a href='detalle.php?idJuego=$registro[0]' style='text-decoration:none;'>";
            
            ?>
            <div class="card mb-1">
                <div class="card-body d-flex flex-column flex-md-row">
                    
                    <div class="col-md-3 order-md-1">
                        <div class="d-flex justify-content-center align-items-center">
                            <?php echo '<img width="80%" height="80%" src="imagenes/' . $registro[5] . '">'; ?>
                        </div>
                    </div>
                    
                    <div class="col-md-9 order-md-2">
                        <div class="d-flex justify-content-center">
                            <div style="font-weight: bold;">
                                <?php echo $registro[1]; ?>
                            </div>
                        </div>
                        <div>
                            <?php echo $registro[3]; ?>
                        </div>
                    </div>
                </div>
                <div class="container d-flex justify-content-center mb-2">
                    <?php
                        //Dentro de este contenedor voy a llamar al nombre de las etiquetas
                        //Para que el usuario vea a que etiquetas pertenece
                        
                        $consultarEtiqueta = "SELECT nombre FROM etiquetas WHERE id = '$registro[9]'";
                        $registroEtiqueta = mysqli_query($conexion, $consultarEtiqueta);
                        while ($nombre = mysqli_fetch_row($registroEtiqueta)){
                            echo "<div style='border:black 1px solid;margin-right:15px;border-radius: 20px;padding:5px;'>" . $nombre[0] . "</div>";
                        }

                        $consultarEtiqueta2 = "SELECT nombre FROM etiquetas WHERE id = '$registro[10]'";
                        $registroEtiqueta = mysqli_query($conexion, $consultarEtiqueta2);
                        while ($nombre = mysqli_fetch_row($registroEtiqueta)){
                            echo "<div style='border:black 1px solid;margin-right:15px;border-radius: 20px;padding:5px;'>" . $nombre[0] . "</div>";
                        }

                        $consultarEtiqueta3 = "SELECT nombre FROM etiquetas WHERE id = '$registro[11]'";
                        $registroEtiqueta = mysqli_query($conexion, $consultarEtiqueta3);
                        while ($nombre = mysqli_fetch_row($registroEtiqueta)){
                            echo "<div style='border:black 1px solid;margin-right:15px;border-radius: 15px;padding:5px;'>" . $nombre[0] . " </div>";
                        }

                    ?>
                </div>
            </div>
        <?php }echo "</a>"; }else{ echo "<a href='detalle.php?idJuego=$registro[0]' style='text-decoration:none;'>"; ?>
            <div class="card mb-1">
                <div class="card-body d-flex flex-column flex-md-row">
                    
                    <div class="col-md-3 order-md-1">
                        <div class="d-flex justify-content-center align-items-center">
                            <?php echo '<img width="80%" height="80%" src="imagenes/' . $registro[5] . '">'; ?>
                        </div>
                    </div>
                    
                    <div class="col-md-9 order-md-2">
                        <div class="d-flex justify-content-center">
                            <div style="font-weight: bold;">
                                <?php echo $registro[1]; ?>
                            </div>
                        </div>
                        <div>
                            <?php echo $registro[3]; ?>
                        </div>
                    </div>
                </div>
                <div class="container d-flex justify-content-center mb-2">
                    <?php
                        //Dentro de este contenedor voy a llamar al nombre de las etiquetas
                        //Para que el usuario vea a que etiquetas pertenece
                        
                        $consultarEtiqueta = "SELECT nombre FROM etiquetas WHERE id = '$registro[9]'";
                        $registroEtiqueta = mysqli_query($conexion, $consultarEtiqueta);
                        while ($nombre = mysqli_fetch_row($registroEtiqueta)){
                            echo "<div style='border:black 1px solid;margin-right:15px;border-radius: 20px;padding:5px;'>" . $nombre[0] . "</div>";
                        }

                        $consultarEtiqueta2 = "SELECT nombre FROM etiquetas WHERE id = '$registro[10]'";
                        $registroEtiqueta = mysqli_query($conexion, $consultarEtiqueta2);
                        while ($nombre = mysqli_fetch_row($registroEtiqueta)){
                            echo "<div style='border:black 1px solid;margin-right:15px;border-radius: 20px;padding:5px;'>" . $nombre[0] . "</div>";
                        }

                        $consultarEtiqueta3 = "SELECT nombre FROM etiquetas WHERE id = '$registro[11]'";
                        $registroEtiqueta = mysqli_query($conexion, $consultarEtiqueta3);
                        while ($nombre = mysqli_fetch_row($registroEtiqueta)){
                            echo "<div style='border:black 1px solid;margin-right:15px;border-radius: 15px;padding:5px;'>" . $nombre[0] . " </div>";
                        }
                    ?>
                </div>
            </div>
            
        <?php }echo "</a>";} ?>
    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>