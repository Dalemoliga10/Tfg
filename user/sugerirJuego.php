<?php
include "../headerDashboard.php";


if (session_status()) {
    session_start();?>
        <div class="container my-5">
            <div class="row">
                <div class="col text-center">
                    <div class="card">
                        <div class="card-header display-6"  style="color: #CFB53B;">
                            Sugerir un juego
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-md-center">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    Excepto el nombre, ningun dato es obligatorio, si no sabes/ no existe algo, puedes dejarlo en blanco
                                </div>
                                <!-- MULTIPART/FORMDATA para incluir ficheros -->
                                <form class="p-4" method="POST" action="registrarSugerencia.php" enctype="multipart/form-data" style="background-color: #3E5F8A;color: #CFB53B;">
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introduce nombre" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pagOficial" class="form-label">Enlace ordenador</label>
                                        <input type="text" class="form-control" name="enlacePC" id="pagOficial" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="pagOficial" class="form-label">Enlace movil</label>
                                        <input type="text" class="form-control" name="enlaceMovil" id="pagOficial" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="pagOficial" class="form-label">Enlace consola</label>
                                        <input type="text" class="form-control" name="enlaceConsola" id="pagOficial" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="pagOficial" class="form-label">Pagina Oficial</label>
                                        <input type="text" class="form-control" name="pagOficial" id="pagOficial" />
                                    </div>
                                    <div class="d-grid">
                                        <input type="submit" class="btn btn-primary" value="Sugerir Juego">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--otro icono curioso de back: bi bi-backspace -->
                        <a href="../dashboard.php" class="bi-arrow-return-left px-3" style="font-size:4rem; color:black;"></i></a>
                    </div>
                </div>
            </div>
        </div>



<?php
} else {
    echo "No has iniciado sesion";
    echo "<a href='../index.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
}

?>



<?php
include "../footer.php";
?>