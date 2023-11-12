<?php include_once "../../encabezado.php" ?>
<?php
include_once "../../db/ConexionDB/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Productos</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo Producto <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio de Venta</th>
					<th>Precio de Compra</th>
					<th>Fecha de Alta</th>
                    <th>Estado</th>
                    <th>Color</th>
                    <th>Stock</th>
					<th>Stock Mínimo</th>
					<th>Código de Barra</th>
					<th>Marca</th>
					<th>Rubro</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->id_producto ?></td>
                    <td><?php echo $producto->nombre ?></td>
                    <td><?php echo $producto->descripcion ?></td>
                    <td><?php echo $producto->precio_venta ?></td>
					<td><?php echo $producto->precio_compra ?></td>
					<td><?php echo $producto->fecha_alta ?></td>
					<td><?php echo $producto->estado ?></td>
                    <td><?php echo $producto->color ?></td>
                    <td><?php echo $producto->stock ?></td>
					<td><?php echo $producto->stock_minimo ?></td>
					<td><?php echo $producto->codigo_barras ?></td>
					<td><?php echo $producto->id_marca ?></td>
					<td><?php echo $producto->id_rubro ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id_producto?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto->id_producto?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "../../pie.php" ?>