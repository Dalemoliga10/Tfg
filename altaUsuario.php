<?php
include "header.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">
            <div class="card">
                <div class="card-header display-6">
                    Creacion de usuario
                </div>
            </div>
            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Ingresar datos:
                        </div>
                        <!-- MULTIPART/FORMDATA para incluir ficheros -->
                        <form class="p-4" method="POST" action="registrarUsuario.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introduce nombre" required />
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Introduce apellidos" required />
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">correo</label>
                                <input type="text" class="form-control" name="correo" id="correo" placeholder="Introduce correo" required />
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Contraseña</label>
                                <input type="pass" class="form-control" name="contrasena" id="contrasena" placeholder="Introduce contraseña" required />
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Crear Juego">
                            </div>
                        </form>
                    </div>
                </div>
                <!--otro icono curioso de back: bi bi-backspace -->
                <a href="formInicioSesion.php"><i class="bi-arrow-return-left px-3" style="font-size:4rem; color:black;"></i></a>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>