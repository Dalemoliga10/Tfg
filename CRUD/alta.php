<?php
include "../headerDashboard.php";

//Creacion de juego
if (session_status()) {
    session_start();
    if ($_SESSION["rol"] == "admin") { //SOlo accesible si eres admin?>
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
                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introduce nombre" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
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
                                        <input type="text" class="form-control" name="enlacePC" id="enlacePC"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pagOficial" class="form-label">Enlace movil</label>
                                        <input type="text" class="form-control" name="enlaceMovil" id="enlaceMovil"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pagOficial" class="form-label">Enlace consola</label>
                                        <input type="text" class="form-control" name="enlaceConsola" id="enlaceConsola"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pagOficial" class="form-label">Pagina Oficial</label>
                                        <input type="text" class="form-control" name="pagOficial" id="pagOficial" />
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