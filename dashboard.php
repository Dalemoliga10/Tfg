<?php 
session_start();
include "headerDashboard.php" ?>

<?php
if ($_SESSION["rol"] == "admin"){
    echo "Bienvenido admin" . $_SESSION["nombre"];?>
    <div class="container" style="text-align:center;">
        <div class="row">
            <div class="col-md-4 border p-3">
                <div onclick="window.location.href='admin/listadoJuegos.php';" style="text-decoration:none; cursor:pointer;">
                    Administración de juegos
                    <br>
                    <i class="bi-joystick py-3" style="font-size: 5.25rem;"></i>
                </div>
            </div>  
            <div class="col-md-4 border p-3">
                <div onclick="window.location.href='admin/listadoUsuarios.php';" style="text-decoration:none; cursor:pointer;">
                    Administración de usuarios
                    <br>
                    <i class="bi-person-fill py-3" style="font-size: 5.25rem;"></i>
                </div>
            </div>
            <div class="col-md-4 border p-3">
                <div onclick="window.location.href='admin/altaAdmin.php';" style="text-decoration:none; cursor:pointer;">
                    Crear administrador
                    <br>
                    <i class="bi-journal-plus bi-5x py-3" style="font-size: 5.25rem;"></i>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href='cierreSesion.php'>cerrar sesion</a>
        <a href='index.php'>Volver al inicio sin cerrar sesion</a>
    </div>
    
  <?php
}else if ($_SESSION["rol"] == "user"){
    echo "Bienvenido usuario" . $_SESSION["nombre"];
    echo "<a href='cierreSesion.php'>cerrar sesion</a>";
    ?>
    <div class="container" style="text-align:center;">
        <div class="row">
            <div class="col-md-6 border p-3">
                <div onclick="window.location.href='user/listadoFavoritos.php';" style="text-decoration:none; cursor:pointer;">
                    Ver tu lista de favoritos
                    <br>
                    <i class="bi-bookmark-star bi-5x py-3" style="font-size: 5.25rem;"></i>
                </div>
            </div>  
            <div class="col-md-6 border p-3">
                <div onclick="window.location.href='admin/modificarUser.php';" style="text-decoration:none; cursor:pointer;">
                    Cambiar datos de tu usuario
                    <br>
                    <i class="bi-person-fill bi-5x py-3"style="font-size: 5.25rem;"></i>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href='cierreSesion.php'>cerrar sesion</a>
        <a href='index.php'>Volver al inicio sin cerrar sesion</a>
    </div>
<?php
}
?>
<?php include "footer.php" ?>