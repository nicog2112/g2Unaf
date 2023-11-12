<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../../db/ConexionDB/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE id_producto = ?;");
$sentencia->execute([$id]);
$productos = $sentencia->fetch(PDO::FETCH_OBJ);
if($productos === FALSE){
	echo "¡No existe ningun producto con ese ID!";
	exit();
}

?>
<?php include_once "../../encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar productos con el ID <?php echo $productos->id_producto; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $productos->id_producto; ?>">

            <label for="nombre">Nombre:</label>
			<textarea required id="nombre" name="nombre" cols="30" rows="5" class="form-control"><?php echo $productos->nombre ?></textarea>
			
			<label for="descripcion">Descripción:</label>
			<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"><?php echo $productos->descripcion ?></textarea>
            
			<label for="precio_venta">Precio de Venta:</label>
			<textarea required id="precio_venta" name="precio_venta" cols="30" rows="5" class="form-control"><?php echo $productos->precio_venta ?></textarea>
			
			<label for="precio_compra">Precio de Compra:</label>
			<textarea required id="precio_compra" name="precio_compra" cols="30" rows="5" class="form-control"><?php echo $productos->precio_compra ?></textarea>
			
			<label for="fecha_alta">Fecha de Alta:</label>
			<textarea required id="fecha_alta" name="fecha_alta" cols="30" rows="5" class="form-control"><?php echo $productos->fecha_alta ?></textarea>
			
			<label for="estado">Estado:</label>
			<textarea required id="estado" name="estado" cols="30" rows="5" class="form-control"><?php echo $productos->estado ?></textarea>
            
			<label for="color">Color:</label>
			<textarea required id="color" name="color" cols="30" rows="5" class="form-control"><?php echo $productos->color ?></textarea>
            
			<label for="stock">Stock:</label>
			<textarea required id="stock" name="stock" cols="30" rows="5" class="form-control"><?php echo $productos->stock ?></textarea>
			
			<label for="stock_minimo">Stock Mínimo:</label>
			<textarea required id="stock_minimo" name="stock_minimo" cols="30" rows="5" class="form-control"><?php echo $productos->stock_minimo ?></textarea>
			
			<label for="codigo_barras">Código de Barra:</label>
			<textarea required id="codigo_barras" name="codigo_barras" cols="30" rows="5" class="form-control"><?php echo $productos->codigo_barras ?></textarea>
		
			<label for="id_marca">Marca:</label>
			<textarea required id="id_marca" name="id_marca" cols="30" rows="5" class="form-control"><?php echo $productos->id_marca ?></textarea>
			
			<label for="id_rubro">Rubro:</label>
			<textarea required id="id_rubro" name="id_rubro" cols="30" rows="5" class="form-control"><?php echo $productos->id_rubro ?></textarea>
			
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			
		</form>
	</div>
<?php include_once "../../pie.php" ?>
