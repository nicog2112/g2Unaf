<?php

include_once "../../db/ConexionDB/base_de_datos.php";

if (!isset($_GET["id"])) exit();
$id = $_GET["id"];

// obtengo el usuario actual
$sentencia = $base_de_datos->prepare("SELECT * FROM Personas AS p
JOIN tipo_documento AS td ON p.id_tipo_documento = td.id_tipo_documento
JOIN sexo AS sx ON p.id_sexo = sx.id_sexo WHERE id_persona = ?;");
$sentencia->execute([$id]);

$personas = $sentencia->fetch(PDO::FETCH_OBJ);
if ($personas === FALSE) {
	echo "¡No existe ningun usuario con ese ID!";
	exit();
}

// Obtener datos de la tabla Sexo
$sentenciaSexo = $base_de_datos->prepare("SELECT * FROM Sexo;");
$sentenciaSexo->execute();
$list_sexo = $sentenciaSexo->fetchAll(PDO::FETCH_OBJ);

// Obtener datos de la tabla Tipo_documento
$sentenciaTipoDocumento = $base_de_datos->prepare("SELECT * FROM Tipo_documento;");
$sentenciaTipoDocumento->execute();
$list_tipo_documento = $sentenciaTipoDocumento->fetchAll(PDO::FETCH_OBJ);

?>

<?php include_once "../../encabezado.php" ?>

<div class="col-xs-12">
	<h1>Modificar Persona</h1>
	<form method="post" action="guardarDatosEditados.php" onsubmit="return validarFormulario()" class="row g-3">

		<!-- Campos para la tabla Persona -->
		<input type="hidden" name="id_persona" value="<?php echo $personas->id_persona; ?>">
		

		<div class="col-md-6">
			<label for="nombre">Nombre:</label>
			<input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $personas->nombre ?>" required>
			<span id="errorNombre" class="text-danger"></span>

			<label for="apellido">Apellido:</label>
			<input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $personas->apellido ?>" required>
			<span id="errorApellido" class="text-danger"></span>

			<label for="dni">DNI:</label>
			<input type="text" id="dni" name="dni" maxlength="8" class="form-control" value="<?php echo $personas->dni ?>" required>
			<span id="errorDNI" class="text-danger"></span>

			<label for="fecha_nacimiento">Fecha de Nacimiento:</label>
			<input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="<?php echo $personas->fecha_nacimiento ?>" required>
			<span id="errorFechaNacimiento" class="text-danger"></span>

			<label for="cuil">CUIL:</label>
			<input type="text" id="cuil" name="cuil" maxlength="11" class="form-control" value="<?php echo $personas->cuil ?>" required>
			<span id="errorCUIL" class="text-danger"></span>

            <label for="cuil">Estado:</label>
			<input type="text" id="estado" name="estado" maxlength="11" class="form-control" value="<?php echo $personas->estado ?>" required>
			<span id="errorEstado" class="text-danger"></span>
		</div>


		<div class="col-md-6">


			<label for="sexo">Sexo:</label>
			<select id="sexo" name="sexo" class="form-control" required>
				<option value="">Ninguno</option>
				<?php foreach ($list_sexo as $sexoOption) : ?>
					<option value="<?= $sexoOption->id_sexo ?>" <?php echo ($sexoOption->id_sexo == $personas->id_sexo) ? 'selected' : ''; ?>>
						<?= $sexoOption->descripcion ?>
					</option>
				<?php endforeach; ?>
			</select>
			<span id="errorSexo" class="text-danger"></span>

			<label for="tipo_documento">Tipo de Documento:</label>
			<select id="tipo_documento" name="tipo_documento" class="form-control" required>
				<option value="">Ninguno</option>
				<?php foreach ($list_tipo_documento as $tipo_documentoOption) : ?>
					<option value="<?= $tipo_documentoOption->id_tipo_documento ?>" <?php echo ($tipo_documentoOption->id_tipo_documento == $personas->id_tipo_documento) ? 'selected' : ''; ?>>
						<?= $tipo_documentoOption->descripcion ?>
					</option>
				<?php endforeach; ?>
			</select>
			<span id="errorTipoDocumento" class="text-danger"></span>
		</div>

		<div class="col-12 mt-3">
			<a href="javascript:history.go(-1);" class="btn btn-danger">Cancelar</a>
			<input class="btn btn-success" type="submit" value="Guardar">

		</div>
	</form>



</div>

<?php include_once "../../pie.php" ?>