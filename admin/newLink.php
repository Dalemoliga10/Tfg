<?php
include "../headerDashboard.php";
if (session_status()) {
    session_start();
    if ($_SESSION["rol"] == "admin") {
?>
        <style>
            form {
                background-color: #3E5F8A;
                color: #FFD700;
            }
        </style>
        <div class="container my-5">
            <div class="row">
                <div class="col text-center">
                    <div class="card">
                        <div class="card-header display-6">
                            Añadir link
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-md-center">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    Ingresar datos:
                                </div>
                                <!-- MULTIPART/FORMDATA para incluir ficheros -->
                                <form class="p-4" method="POST" action="anadeLink.php" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Juego</label>
                                        <input type="text" class="form-control" name="juego" id="juego" value='<?php echo $_GET["juego"] ?>' required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="plataforma" class="form-label">Plataforma</label>
                                        <select class="form-select" name="plataforma" id="plataforma" required>
                                            <option value="">Selecciona una plataforma</option>
                                            <option value="pc">PC</option>
                                            <option value="consola">Consola</option>
                                            <option value="movil">Movil</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="correo" class="form-label">nuevo link</label>
                                        <input type="text" class="form-control" name="link" id="link" placeholder="Introduce link" required />
                                    </div>
                                    <div class="d-grid">
                                        <input type="submit" class="btn btn-primary" value="Crear Juego">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--otro icono curioso de back: bi bi-backspace -->
                        <?php echo "<a href='../detalle.php?idJuego=$_GET[juego]'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";?>
                    </div>
                </div>
            </div>
        </div>

<?php
    } else {
        echo "No tienes permisos para acceder aqui";
        echo "<a href='../index.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
    }
} else {
    echo "No has iniciado sesion";
    echo "<a href='../index.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
}
include "../footer.php";
?>