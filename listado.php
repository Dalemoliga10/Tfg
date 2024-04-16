<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>
<style>
    .card:hover {
        background-color: blue;
        transition: background-color 0.5s; /*transicion*/
    }
</style>
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

    echo sizeof($selectedOptions);
    //Con esto filtro por nombre y etiquetas solo si ha puesto
    if(sizeof($selectedOptions)>0){
        $idEtiquetas = array();
        for($i=0;$i<sizeof($selectedOptions);$i= $i +1){
            $consultarEtiquetas = "SELECT id FROM etiquetas WHERE nombre LIKE '$selectedOptions[$i]%'";
            $registros = mysqli_query($conexion, $consultarEtiquetas);

            while ($registro = mysqli_fetch_row($registros)) { 
                $idEtiquetas []= $registro[0];
            }
        }
        var_dump($idEtiquetas);
        $consultar = "SELECT * FROM juegos WHERE nombre LIKE '$nombre%' AND etiqueta1 = $idEtiquetas[0] ORDER BY nombre";
    }else{
        $consultar = "SELECT * FROM juegos WHERE nombre LIKE '$nombre%' ORDER BY nombre";
    }
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
            <div class="card mb-1">
                <div class="card-body d-flex flex-column flex-md-row">
                    
                    <div class="col-md-3 order-md-1">
                        <div class="d-flex justify-content-center align-items-center">
                            <?php echo '<img width="80%" height="80%" src="imagenes/' . $registro[4] . '">'; ?>
                        </div>
                    </div>
                    
                    <div class="col-md-9 order-md-2">
                        <div class="d-flex justify-content-center">
                            <div style="font-weight: bold;">
                                <?php echo $registro[1]; ?>
                            </div>
                        </div>
                        <div>
                            <?php echo $registro[2]; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>