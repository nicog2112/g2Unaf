<?php
if (!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../../db/ConexionDB/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM tipo_contacto WHERE id_tipo_contacto = ?;");
$sentencia->execute([$id]);
$tipo_contacto = $sentencia->fetch(PDO::FETCH_OBJ);
if ($tipo_contacto === FALSE) {
	echo "¡No existe ningun rubro con ese ID!";
	exit();
}

?>
<?php include_once "../../encabezado.php" ?>
<div class="col-xs-12">
	<h1>Editar contacto con el ID <?php echo $tipo_contacto->id_tipo_contacto; ?></h1>
	<form method="post" action="guardarDatosEditados.php">
		<input type="hidden" name="id" value="<?php echo $tipo_contacto->id_tipo_contacto; ?>">

		<label for="descripcion">Descripción:</label>
		<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"><?php echo $tipo_contacto->descripcion ?></textarea>


		<div class="col-12 mt-3">
			<a href="javascript:history.go(-1);" class="btn btn-danger">Cancelar</a>
			<input class="btn btn-success" type="submit" value="Guardar">

		</div>
	</form>
</div>
<?php include_once "../../pie.php" ?>