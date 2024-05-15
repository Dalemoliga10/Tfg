<?php
include "header.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">
            <div class="card">
                <div class="card-header display-6">
                    Inicio sesion
                </div>
            </div>
            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Ingresar datos:
                        </div>
                        <!-- MULTIPART/FORMDATA para incluir ficheros -->
                        <form class="p-4" method="POST" action="iniciarSesion.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="correo" class="form-label">correo</label>
                                <input type="text" class="form-control" name="correo" id="correo" placeholder="Introduce contraseña" required />
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Contraseña</label>
                                <input type="pass" class="form-control" name="contrasena" id="contrasena" placeholder="Introduce contraseña" required />
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Iniciar sesion">
                            </div>
                        </form>
                    </div>
                    <a href="altaUsuario.php" style="text-decoration: none;">¿Nuevo usuario?</a>
                </div>
                <!--otro icono curioso de back: bi bi-backspace -->
                <a href="index.php"><i class="bi-arrow-return-left px-3" style="font-size:4rem; color:black;"></i></a>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>