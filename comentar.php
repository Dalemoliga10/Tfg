<?php
include "header.php";
$_SESSION["juego"] = $_GET["juego"];
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">
            <div class="card">
                <div class="card-header display-6">
                    Comentar Juego
                </div>
            </div>
            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Hacer conentario:
                        </div>
                        <!-- MULTIPART/FORMDATA para incluir ficheros -->
                        <form class="p-4" method="POST" action="hacerComentario.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="correo" class="form-label">correo</label>
                                <input type="text" class="form-control" name="correo" id="correo" placeholder="Introduce contraseña" value= <?php echo $_SESSION["correo"]?>  required />
                            </div>
                            <div class="mb-3">
                                <label for="comentario" class="form-label">Comentario:</label>
                                <textarea class="form-control" name="comentario" id="comentario" rows="3"></textarea>
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Subir comentario">
                            </div>
                        </form>
                    </div>
                </div>
                <a href="index.php"><i class="bi-arrow-return-left px-3" style="font-size:4rem; color:black;"></i></a>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>