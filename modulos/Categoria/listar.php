<?php include_once "../../encabezado.php" ?>
<?php
include_once "../../db/ConexionDB/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM categorias;");
$categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Categorias</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Descripción</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($categorias as $categoria){ ?>
				<tr>
					<td><?php echo $categoria->id_categoria ?></td>
					<td><?php echo $categoria->descripcion ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $categoria->id_categoria?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $categoria->id_categoria?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "../../pie.php" ?>