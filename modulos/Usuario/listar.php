<?php include_once "../../encabezado.php" ?>
<?php
include_once "../../db/ConexionDB/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM Usuarios AS u 
JOIN Personas AS p  ON p.id_persona = u.id_persona;");
$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="col-xs-12">
	<h1>Usuarios</h1>
	<div>
		<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
	</div>
	<br>
	<table class="table table-bordered">
		<thead class="table-dark">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Username</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($usuarios as $usuario) { ?>
				<tr>
					<td><?php echo $usuario->id_usuario ?></td>
					<td><?php echo $usuario->nombre ?></td>
					<td><?php echo $usuario->apellido ?></td>
					<td><?php echo $usuario->username ?></td>
					<td><a class="btn btn-primary" href="<?php echo "editar.php?id=" . $usuario->id_usuario ?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $usuario->id_usuario ?>"><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php include_once "../../pie.php" ?>