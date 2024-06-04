<?php
include "../headerDashboard.php";
    session_start();
?>
        <?php
        $idModificar = $_SESSION["id"];
        include_once('../conexion.php');
                $consultar = "SELECT * FROM usuarios WHERE id_usuario = $idModificar";

        $registros = mysqli_query($conexion, $consultar);
        while ($registro = mysqli_fetch_row($registros)) { ?>
            <div class="row mt-3 justify-content-md-center">
                <h1 style="text-align: center;">Modificar</h1>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header" style="text-align: center;">
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
                                <input type="submit" class="btn btn-primary" value="Modificar">
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

include "../footer.php"
?>