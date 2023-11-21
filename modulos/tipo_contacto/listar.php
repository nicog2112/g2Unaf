<?php include_once "../../encabezado.php" ?>
<?php
include_once "../../db/ConexionDB/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM tipo_contacto;");
$tipo_contacto = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="col-xs-12">
	<h1>Tipo de contacto</h1>
	<div>
		<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
	</div>
	<br>
	<table class="table table-bordered">
		<thead class="table-dark">
			<tr>
				<th>ID</th>
				<th>Descripción</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tipo_contacto as $tipo_contacto) { ?>
				<tr>
					<td><?php echo $tipo_contacto->id_tipo_contacto ?></td>
					<td><?php echo $tipo_contacto->descripcion ?></td>
					<td><a class="btn btn-primary" href="<?php echo "editar.php?id=" . $tipo_contacto->id_tipo_contacto ?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $tipo_contacto->id_tipo_contacto ?>"><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php include_once "../../pie.php" ?>