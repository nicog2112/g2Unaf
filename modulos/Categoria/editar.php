<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../../db/ConexionDB/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM categorias WHERE id_categoria = ?;");
$sentencia->execute([$id]);
$categoria = $sentencia->fetch(PDO::FETCH_OBJ);
if($categoria === FALSE){
	echo "¡No existe ninguna categoria con ese ID!";
	exit();
}

?>
<?php include_once "../../encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar categoria con el ID <?php echo $categoria->id_categoria; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $categoria->id_categoria; ?>">

			<label for="descripcion">Descripción:</label>
			<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"><?php echo $categoria->descripcion ?></textarea>

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "../../pie.php" ?>
