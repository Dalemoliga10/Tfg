<?php
//Formulario creacion etiqueta
include "../headerDashboard.php";
?>
<body >
<div class="container my-5">
    <div class="row">
        <div class="col text-center">
            <div class="card">
                <div class="card-header display-6" style="color: #CFB53B;">
                    Crear etiqueta                
                </div>
            </div>
            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Ingresar datos:
                        </div>
                        <!-- MULTIPART/FORMDATA para incluir ficheros -->
                        <form class="p-4" method="POST" action="procesoCrearEtiqueta.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Nombre etiqueta</label>
                                <input type="pass" class="form-control" name="etiqueta" id="etiqueta" placeholder="Introduce etiqueta" required />
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Iniciar sesion">
                            </div>
                        </form>
                    </div>
                </div>
                <!--otro icono curioso de back: bi bi-backspace -->
                <a href="listadoJuegos.php"><i class="bi-arrow-return-left px-3" style="font-size:4rem; color:black;"></i></a>
            </div>
        </div>
    </div>
</div>
</body>
<?php
include "../footer.php";
?>