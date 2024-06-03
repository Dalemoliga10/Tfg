<?php
include "../headerDashboard.php";


if (session_status()) {
    session_start();
    if ($_SESSION["rol"] == "admin") {
        //Codigo
?>
        <script>
            //JS que permite ver si se han subido 3 imagenes o ninguna
            function validarImagenes() {
                var imagen1 = document.getElementById("imagen").value;
                var imagen2 = document.getElementById("imagen2").value;
                var imagen3 = document.getElementById("imagen3").value;

                if ((imagen1 != "" && imagen2 != "" && imagen3 != "") || (imagen1 !== "" && imagen2 !== "" && imagen3 !== "")) {
                    // Todas las imágenes están presentes o ninguna está presente
                    return true;
                } else {
                    return false;
                }
            }
            //Revisa si se han subido las 3 imagenes o ninguna
            function enviarFormulario() {
                if (validarImagenes()) {
                    var valorInput = document.getElementById("imagenes").value;
                    document.getElementById("imagenes").value = "true";
                    document.getElementById("FORMULARIO").submit();
                } else {
                    var valorInput = document.getElementById("imagenes").value;
                    document.getElementById("imagenes").value = "false";
                    document.getElementById("FORMULARIO").submit();
                }
            }
            enviarFormulario()
        </script>

        <?php

        include_once('../conexion.php');
        mysqli_select_db($conexion, "bdfinal");
        $idModificar = $_GET["codigo"];
        $consultar = "SELECT * FROM juegos WHERE id = $idModificar";

        $registros = mysqli_query($conexion, $consultar);
        while ($registro = mysqli_fetch_row($registros)) { ?>
            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Modificar:
                        </div>
                        <form class="p-4" method="POST" action="hacerModificacion.php" enctype="multipart/form-data" onsubmit="event.preventDefault(); enviarFormulario();" id="FORMULARIO">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="id" id="id" value="<?php echo $registro[0] ?>" hidden />
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="imagenes" id="imagenes" value="" hidden />
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $registro[1] ?>" required />
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"><?php echo $registro[2]; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="descripcionCorta" class="form-label">Descripción Corta</label>
                                <textarea class="form-control" name="descripcionCorta" id="descripcionCorta" rows="3"><?php echo $registro[3]; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Imagen</label>
                                <input type="file" class="form-control" name="imagen" id="imagen" accept=" image/*" />
                            </div>
                            <div class="mb-3">
                                <label for="imagen2" class="form-label">Imagen 2</label>
                                <input type="file" class="form-control" name="imagen2" id="imagen2" accept=" image/*" />
                            </div>
                            <div class="mb-3">
                                <label for="imagen3" class="form-label">Imagen 3</label>
                                <input type="file" class="form-control" name="imagen3" id="imagen3" accept=" image/*" />
                            </div>
                            <div class="mb-3">
                                <label for="pagOficial" class="form-label">Pagina Oficial</label>
                                <input type="text" class="form-control" name="pagOficial" id="pagOficial" value="<?php echo $registro[8] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="etiqueta1" class="form-label">Etiqueta 1</label>
                                <input type="number" class="etiqueta1" name="etiqueta1" id="etiqueta1" required value="<?php echo $registro[9] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="etiqueta2" class="form-label">Etiqueta 2</label>
                                <input type="number" class="etiqueta2" name="etiqueta2" id="etiqueta2" value="<?php echo $registro[10] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="etiqueta3" class="form-label">Etiqueta 3</label>
                                <input type="number" class="etiqueta3" name="etiqueta3" id="etiqueta3" value="<?php echo $registro[11] ?>" />
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Modificar Juego"><!--LLeva al js-->
                            </div>
                        </form>
                    </div>
                    <a href='../admin/listadoJuegos.php' style="text-align: center;"><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>

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



include "../footer.php"
?>