<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Footer que se muestra en todas las paginas -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-AhZO5qFNt71pXXK+ZBbdFqzDFhX78lvI51aHAE1UgpkM8pcBZdfYXZ2CbxLoUs/" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            flex-direction: column;
        }
        footer {
            background-color: #343a40;
            color: #ffffff; 
            text-align: center;
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
</head>
<footer class="container-fluid bg-dark text-light text-center py-2" id="main-footer">
    <div class="row">
        <div class="py-3">
            Sitio Web diseñado por Daniel Alejandro
        </div>
        <div class="col-6 py-3 d-inline">
            <i class="bi-building py-3"></i>
            <br />
            IES Playamar
        </div>
        <a href="https://github.com/Dalemoliga10" class="col-6 py-3 d-inline text-white" style="text-decoration: none;" target="_blank">
            <div>
                <i class="bi-github py-3"></i>
                <br />
                <span>dalemoliga10</span>
            </div>
        </a>
    </div>
</footer>

<script>
    //Espera a que el contenido se catrgue completamente
    document.addEventListener("DOMContentLoaded", function() {
        const footer = document.getElementById('main-footer');
        const bodyHeight = document.body.offsetHeight;
        const windowHeight = window.innerHeight;

        //Si el tamaño del body es menor que el de la ventana, se aplica un position absolute al footer para que se queda abajo
        if (bodyHeight < windowHeight) {
            footer.style.position = 'absolute';
            footer.style.bottom = '0';
            footer.style.width = '100%';
        }
    });
</script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</html>
