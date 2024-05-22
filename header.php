<?php

require_once('conexion.php');

mysqli_select_db($conexion, "bdfinal");

$consultar = "SELECT nombre FROM etiquetas";

$registros = mysqli_query($conexion, $consultar);

$contador = 0;
?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="icon" type="image/x-icon" href="imagenes/icono_gameDex.png">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- Incluimos css con iconos de bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<style>
    .hide {
        max-height: 0 !important;
    }

    .dropdown {
        border: 0.1em solid black;
        width: 20%;
        margin-bottom: 1em;
    }

    .dropdown .title {
        margin: .3em .3em .3em .3em;
        width: 100%;
    }

    .dropdown .title .fa-angle-right {
        float: right;
        margin-right: .7em;
        transition: transform .3s;
    }

    .dropdown .menu {
        transition: max-height .5s ease-out;
        max-height: 20em;
        overflow: hidden;
    }

    .dropdown .menu .option {
        margin: .3em .3em .3em .3em;
        margin-top: 0.3em;
    }

    .dropdown .menu .option:hover {
        background: rgba(0, 0, 0, 0.2);
    }

    .pointerCursor:hover {
        cursor: pointer;
    }

    .rotate-90 {
        transform: rotate(90deg);
    }

    /* form{
        background-color: rgb(18, 0, 119);
    } */
</style>
<header>
    <form action="listado.php" id="miniform" name="miniform" method="get">
        <div class="container-fluid d-flex align-items-center" style="height: 100px;">
            <!-- Hay que poner la imagen para que no moleste al form -->
            <img src="imagenes/logo gameDex.png" style="width:10%;">
            <div class="container" style="width: 60%;">
                <div class="d-flex align-items-center justify-content-center">
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Buscar" style="width: 90%;">
                    <button type="submit" class="btn btn-primary" style="margin-left: 9px;"><i class="bi bi-search"></i></button>
                </div>
            </div>
            <div style="width: 20%;display:flex;justify-content:space-around;flex-direction:column;">
                <?php
                @session_start();
                if (@$_SESSION) {
                ?>
                    <p style="margin-bottom: -5px;">Sesion iniciada como :<br> <?php echo $_SESSION['rol'] . "  " . $_SESSION['nombre'] ?></p>
                    <div><a href="dashboard.php">Ir al dashboard</a> <a href="cierreSesion">Cerrar sesion</a></div>

                <?php
                } else {
                ?>
                    <div><p> No has iniciado sesion</p>
                        <a href="formInicioSesion.php">Iniciar sesion</a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="d-flex justify-content-center" style="width: 100%;">
            <div class='dropdown' style="width: 80%;">
                <div class='title pointerCursor' style="text-align: center;clear:both;">
                    Filtrar por categoria
                </div>
                <div class='menu pointerCursor hide d-flex flex-wrap justify-content-around'>
                    <?php while ($registro = mysqli_fetch_row($registros)) { ?>
                        <div style="margin-left: 40px;">
                            <label for="option<?php echo $contador ?>" style="margin-top: 5px;"><?php echo $registro[0] ?></label>
                            <input type="checkbox" id='option<?php echo $contador ?>' name="<?php echo $registro[0] ?>" style="margin-bottom:10px;"><br>
                        </div>
                    <?php $contador = $contador + 1;
                    } ?>
                </div>

            </div>
        </div>
    </form>
    <script>
        function toggleClass(elem, className) {
            if (elem.className.indexOf(className) !== -1) {
                elem.className = elem.className.replace(className, '');
            } else {
                elem.className = elem.className.replace(/\s+/g, ' ') + ' ' + className;
            }
            return elem;
        }

        function toggleDisplay(elem) {
            const curDisplayStyle = elem.style.display;
            if (curDisplayStyle === 'none' || curDisplayStyle === '') {
                elem.style.display = 'block';
            } else {
                elem.style.display = 'none';
            }
        }

        function toggleMenuDisplay(e) {
            const dropdown = e.currentTarget.parentNode;
            const menu = dropdown.querySelector('.menu');
            const icon = dropdown.querySelector('.fa-angle-right');
            toggleClass(menu, 'hide');
            toggleClass(icon, 'rotate-90');
        }

        function handleOptionSelected(e) {
            toggleClass(e.target.parentNode, 'hide');
            const id = e.target.id;
            const newValue = e.target.textContent + ' ';
            const titleElem = document.querySelector('.dropdown .title');
            const icon = document.querySelector('.dropdown .title .fa');
            titleElem.textContent = newValue;
            titleElem.appendChild(icon);
            //trigger custom event
            document.querySelector('.dropdown .title').dispatchEvent(new Event('change'));
            //setTimeout is used so transition is properly shown
            setTimeout(() => toggleClass(icon, 'rotate-90', 0));
        }

        const dropdownTitle = document.querySelector('.dropdown .title');
        const dropdownOptions = document.querySelectorAll('.dropdown .option');
        //bind listeners to these elements
        dropdownTitle.addEventListener('click', toggleMenuDisplay);
        dropdownOptions.forEach(option => option.addEventListener('click', handleOptionSelected));
    </script>
</header>