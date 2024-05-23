<?php 
session_start();
include "headerDashboard.php" ?>
<style>
.btn-animado {
            position: relative;
            overflow: hidden;
            transition: transform 0.1s;
        }

        .btn-animado::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.5);
            transition: all 0.4s;
            transform: translate(-50%, -50%) scale(0);
            border-radius: 50%;
        }


        .btn-animado:active {
            transform: scale(0.95);
        }
    </style>

<?php
if ($_SESSION["rol"] == "admin"){?>

<div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
        <div class="container text-center">
            <h1 style="margin-bottom: 50px;">Bienvenido al dashboard <?php echo $_SESSION["rol"] . " " . $_SESSION["nombre"]?></h1>
            <div class="container" style="text-align:center; margin-top:15px;">
                <div class="row" style="background-color:#3E5F8A;color:#CFB53B;">
                    <div class="col-md-4 border p-3" >
                        <div onclick="window.location.href='admin/listadoJuegos.php';" style="text-decoration:none; cursor:pointer;">
                            Administración de juegos
                            <br>
                            <i class="bi bi-joystick py-3" style="font-size: 5.25rem;"></i>
                        </div>
                    </div>
                    <div class="col-md-4 border p-3">
                        <div onclick="window.location.href='admin/listadoUsuarios.php';" style="text-decoration:none; cursor:pointer;">
                            Administración de usuarios
                            <br>
                            <i class="bi bi-person-fill py-3" style="font-size: 5.25rem;"></i>
                        </div>
                    </div>
                    <div class="col-md-4 border p-3">
                        <div onclick="window.location.href='admin/altaAdmin.php';" style="text-decoration:none; cursor:pointer;">
                            Crear administrador
                            <br>
                            <i class="bi bi-journal-plus bi-5x py-3" style="font-size: 5.25rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h2>O también puedes</h2>
                <button class="btn btn-primary btn-animado">
                    <a href='cierreSesion.php' class="mb-2" style="color: black; text-decoration: none;">cerrar sesión</a>
                </button>
                <button class="btn btn-primary btn-animado">
                    <a href='index.php' class="mb-2" style="color: black; text-decoration: none;">Página principal</a>
                </button>
            </div>
        </div>
    </div>
    
  <?php
}else if ($_SESSION["rol"] == "user"){
    ?>
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
        <div class="container text-center">
            <h1 style="margin-bottom: 50px;">Bienvenido al dashboard <?php echo $_SESSION["rol"] . " " . $_SESSION["nombre"]?></h1>
            <div class="row mt-3" style="background-color:#3E5F8A;color:#CFB53B;">
                <div class="col-md-6 border p-3">
                    <div onclick="window.location.href='user/listadoFavoritos.php';" style="text-decoration:none; cursor:pointer;">
                        Ver tu lista de favoritos
                        <br>
                        <i class="bi bi-bookmark-star bi-5x py-3" style="font-size: 5.25rem;"></i>
                    </div>
                </div>
                <div class="col-md-6 border p-3">
                    <div onclick="window.location.href='admin/modificarUser.php';" style="text-decoration:none; cursor:pointer;">
                        Cambiar datos de tu usuario
                        <br>
                        <i class="bi bi-person-fill bi-5x py-3" style="font-size: 5.25rem;"></i>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h2>O también puedes</h2>
                <button class="btn btn-primary btn-animado">
                    <a href='cierreSesion.php' class="mb-2" style="color: black; text-decoration: none;">cerrar sesión</a>
                </button>
                <button class="btn btn-primary btn-animado">
                    <a href='index.php' class="mb-2" style="color: black; text-decoration: none;">Página principal</a>
                </button>
            </div>
        </div>
    </div>
<?php
}
?>
<?php include "footer.php" ?>