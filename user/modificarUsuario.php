<?php
include "../headerDashboard.php";
session_start();
//formulario modificacion usuario
?>
<style>
    form {
        background-color: #3E5F8A;
        color: #FFD700;
    }
</style>
<?php
$idModificar = $_SESSION["id"];
include_once('../conexion.php');
$consultar = "SELECT * FROM usuarios WHERE id_usuario = $idModificar";

$registros = mysqli_query($conexion, $consultar);
while ($registro = mysqli_fetch_row($registros)) { ?>
    <h1 style="text-align: center;margin:15px 0px;">Modificar Usuario</h1>

    <div class="d-flex justify-content-md-center">
        <div class="col-md-4">
            <div class="card" style="text-align:center;">
                <div class="card-header" style="text-align: center;">
                    Inserte datos:
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
    <a href="../dashboard.php" style="text-align: center;"><i class="bi-arrow-return-left px-3" style="font-size:4rem; color:black;"></i></a>

<?php
}

include "../footer.php"
?>