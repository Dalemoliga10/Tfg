<?php
//formulario de creacion de juego, trae los datos de la sugerencia
include_once("../conexion.php");
include "../headerDashboard.php";
$seleccion = "SELECT * FROM sugerencias_juegos WHERE id_sugerencia = $_GET[codigo]";
$registros = mysqli_query($conexion, $seleccion);

if (session_status()) {
    session_start();
    if ($_SESSION["rol"] == "admin") { //Solo accesible si eres admin
        while ($registro = mysqli_fetch_row($registros)) { echo $registro[1];?>

        <div class="container my-5">
            <div class="row">
                <div class="col text-center">
                    <div class="card">
                        <div class="card-header display-6">
                            Creacion de nuevo juego
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-md-center">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    Ingresar datos:
                                </div>
                                <!-- MULTIPART/FORMDATA para incluir ficheros -->
                                <form class="p-4" method="POST" action="registrar.php" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introduce nombre" required value="<?php echo $registro[1]?>" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" ><?php echo $registro[2]?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcionCorta" class="form-label">Descripción Corta</label>
                                        <textarea class="form-control" name="descripcionCorta" id="descripcionCorta" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagen" class="form-label">Imagen</label>
                                        <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagen2" class="form-label">Imagen 2</label>
                                        <input type="file" class="form-control" name="imagen2" id="imagen2" accept="image/*" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagen3" class="form-label">Imagen 3</label>
                                        <input type="file" class="form-control" name="imagen3" id="imagen3" accept="image/*" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="pagOficial" class="form-label">Enlace PC</label>
                                        <input type="text" class="form-control" name="enlacePC" id="enlacePC" value="<?php echo $registro[3]?>"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pagOficial" class="form-label">Enlace movil</label>
                                        <input type="text" class="form-control" name="enlaceMovil" id="enlaceMovil" value="<?php echo $registro[4]?>"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pagOficial" class="form-label">Enlace consola</label>
                                        <input type="text" class="form-control" name="enlaceConsola" id="enlaceConsola" value="<?php echo $registro[5]?>"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pagOficial" class="form-label">Pagina Oficial</label>
                                        <input type="text" class="form-control" name="pagOficial" id="pagOficial" value="<?php echo $registro[6]?>"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="etiqueta1" class="form-label">Etiqueta 1</label>
                                        <input type="number" class="etiqueta1" name="etiqueta1" id="etiqueta1" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="etiqueta2" class="form-label">Etiqueta 2</label>
                                        <input type="number" class="etiqueta2" name="etiqueta2" id="etiqueta2" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="etiqueta3" class="form-label">Etiqueta 3</label>
                                        <input type="number" class="etiqueta3" name="etiqueta3" id="etiqueta3" />
                                    </div>
                                    <div class="d-grid">
                                        <input type="submit" class="btn btn-primary" value="Crear Juego">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--otro icono curioso de back: bi bi-backspace -->
                        <a href="../formInicioSesion.php" class="bi-arrow-return-left px-3" style="font-size:4rem; color:black;"></i></a>
                    </div>
                </div>
            </div>
        </div>



<?php
        }
    } else {
        echo "No tienes permisos para acceder aqui";
        echo "<a href='../dashboard.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
    }
} else {
    echo "No has iniciado sesion";
    echo "<a href='../index.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
}

?>



<?php
include "../footer.php";
?>