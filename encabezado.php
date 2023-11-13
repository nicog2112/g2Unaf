<?php
define('BASE_URL', '/g2Unaf/');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Ventas</title>
    <script src="<?php echo BASE_URL; ?>js/validarRubro.js"></script>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/fontawesome-all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/estilo.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/header.css">
    <script src="<?php echo BASE_URL; ?>js/header.js"></script>
    <script>
        $(document).ready(function() {
            // Manejador de clic para los elementos de navegación
            $(".nav_link").click(function(e) {
                e.preventDefault(); // Evitar el comportamiento predeterminado del enlace

                // Obtener la URL del atributo personalizado
                var linkURL = $(this).data("destino");

                // Obtener el nombre de la página a donde se va a redirigir
                var pagina = $(this).data("item");

                // Redirigir a la URL con el parámetro pagina
                window.location.href = linkURL + "?pagina=" + pagina;
            });

            // Obtener el valor del parámetro pagina de la URL
            var urlParams = new URLSearchParams(window.location.search);
            var pagina = urlParams.get('pagina');

            if (pagina !== "") {
                // Eliminar la clase "active" de todos los enlaces
                $(".nav_link").removeClass("active");

                // Agregar la clase "active" al enlace correspondiente
                $("#" + pagina).addClass("active");
            }
        });
    </script>

</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div class="header_img">
            <img src="<?php echo BASE_URL; ?>img/user.png" alt="">
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <i class='bx bxs-store-alt nav_logo-icon'></i>
                    <span class="nav_logo-name">G2 Accesorios</span>
                </a>
                <div class="nav_list">
                    <a href="#" id="Inicio" class="nav_link active" data-item="Inicio" data-destino="<?php echo BASE_URL; ?>Inicio.php">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Inicio</span>
                    </a>
                    <a href="#" id="Usuarios" class="nav_link" data-item="Usuarios" data-destino="<?php echo BASE_URL; ?>modulos/Usuario/listar.php">
                        <i class='bx bxs-user-account nav_icon'></i>
                        <span class="nav_name">Usuarios</span>
                    </a>
                    <a href="#" id="Rubros" class="nav_link" data-item="Rubros" data-destino="<?php echo BASE_URL; ?>modulos/Rubro/listar.php">
                        <i class='bx bxs-category-alt nav_icon'></i>
                        <span class="nav_name">Rubros</span>
                    </a>
                    <a href="#" id="Marcas" class="nav_link" data-item="Marcas" data-destino="<?php echo BASE_URL; ?>modulos/Marca/listar.php">
                        <i class='bx bxs-purchase-tag-alt nav_icon'></i>
                        <span class="nav_name">Marcas</span>
                    </a>
                    <a href="#" id="Marcas" class="nav_link" data-item="Marcas" data-destino="<?php echo BASE_URL; ?>modulos/Producto/listar.php">
                        <i class='bx bxs-purchase-tag-alt nav_icon'></i>
                        <span class="nav_name">Productos</span>
                    </a>

                </div>
            </div>
            <a href="#" class="nav_link" data-item="" data-destino="<?php echo BASE_URL; ?>modulos/Login/login.php">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">Cerrar Sesion</span>
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100">
        <div class="container">
            <div class="row">
            </div>