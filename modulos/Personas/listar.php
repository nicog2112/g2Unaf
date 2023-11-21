<?php include_once "../../encabezado.php" ?>
<?php
include_once "../../db/ConexionDB/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM Personas AS p
JOIN tipo_documento AS td ON p.id_tipo_documento = td.id_tipo_documento
JOIN sexo AS sx ON p.id_sexo = sx.id_sexo");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="col-xs-12">
	<h1>Personas</h1>
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
                <th>Fecha de nacimiento</th>
                <th>Tipo de documento</th>
                <th>Sexo</th>
				<th>DNI</th>
                <th>CUIL</th>
                <th>Estado civil</th> 
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($personas as $personas) { ?>
				<tr>
					<td><?php echo $personas->id_persona ?></td>
					<td><?php echo $personas->nombre ?></td>
					<td><?php echo $personas->apellido ?></td>
                    <td><?php echo $personas->fecha_nacimiento ?></td>
                    <td><?php echo $personas->id_tipo_documento ?></td>
                    <td><?php echo $personas->id_sexo ?></td>
					<td><?php echo $personas->dni ?></td>   
                    <td><?php echo $personas->cuil ?></td>
                    <td><?php echo $personas->estado ?></td>
					<td><a class="btn btn-primary" href="<?php echo "editar.php?id=" . $personas->id_persona ?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $personas->id_persona ?>"><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php include_once "../../pie.php" ?>