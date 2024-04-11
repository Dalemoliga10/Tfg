<?php
include "header.php";
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">
            <div class="card">
                <div class="card-header display-6">
                    Alta de producto
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
                                <label for="pagOficial" class="form-label">Pagina Oficial</label>
                                <input type="text" class="form-control" name="pagOficial" id="pagOficial" required />
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Crear Juego">
                            </div>
                        </form>
                    </div>
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