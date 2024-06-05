<?php
include "../headerDashboard.php";
//Formulario modificacion usuario

if (session_status()) {
    session_start();
    if ($_SESSION["rol"] == "admin") {
        //Codigo
?>
        <?php
        $idModificar = $_GET["codigo"];
        include_once('../conexion.php');
                $consultar = "SELECT * FROM usuarios WHERE id_usuario = $idModificar";

        $registros = mysqli_query($conexion, $consultar);
        while ($registro = mysqli_fetch_row($registros)) { ?>
            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Modificar:
                        </div>
                        <form class="p-4" method="POST" action="hacerModificacion.php" enctype="multipart/form-data" id="FORMULARIO">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="id" id="id" value="<?php echo $registro[0] ?>" hidden />
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $registro[1] ?>" required />
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $registro[2] ?>" required />
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Modificar usuario">
                            </div>
                            <!-- <div class="mb-3">
                                <label for="apellidos" class="form-label">contraseña</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $registro[2] ?>" required />
                            </div> -->
                        </form>
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



include "../footer.php"
?>