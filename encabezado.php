<?php
	define('BASE_URL', '/g2Unaf/');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Ventas</title>
	
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/fontawesome-all.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/estilo.css">
	<script src="<?php echo BASE_URL; ?>js/validarRubro.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" style="background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo BASE_URL; ?>Inicio.php">G2 Accesorios</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
				<li><a href="<?php echo BASE_URL; ?>Inicio.php">Inicio</a></li>
				<!-- <li><a href="<?php echo BASE_URL; ?>modulos/Productos/listar.php">Productos</a></li> -->
				<li><a href="<?php echo BASE_URL; ?>modulos/Marca/listar.php">Marcas</a></li>
				<li><a href="<?php echo BASE_URL; ?>modulos/Rubro/listar.php">Rubros</a></li>
				<li><a href="<?php echo BASE_URL; ?>modulos/Login/login.php">Cerrar Sesion</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row">