<?php
include_once "../../db/ConexionDB/base_de_datos.php";

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
	<h1>Nueva Persona</h1>
	<form method="post" action="nuevo.php" onsubmit="return validarFormulario()" class="row g-3">

		<!-- Columna 1 - Campos para la tabla Persona -->
		<div class="col-md-6">
			<label for="nombre">Nombre:</label>
			<input type="text" id="nombre" name="nombre" class="form-control" required>
			<span id="errorNombre" class="text-danger"></span>

			<label for="apellido">Apellido:</label>
			<input type="text" id="apellido" name="apellido" class="form-control" required>
			<span id="errorApellido" class="text-danger"></span>

			<label for="dni">DNI:</label>
			<input type="text" id="dni" name="dni" maxlength="8" class="form-control" required>
			<span id="errorDNI" class="text-danger"></span>

			<label for="fecha_nacimiento">Fecha de Nacimiento:</label>
			<input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" required>
			<span id="errorFechaNacimiento" class="text-danger"></span>

			<label for="cuil">CUIL:</label>
			<input type="text" id="cuil" name="cuil" maxlength="11" class="form-control" required>
			<span id="errorCUIL" class="text-danger"></span>

            <label for="cuil">Estado:</label>
			<input type="text" id="estado" name="estado" maxlength="11" class="form-control" required>
			<span id="errorEstado" class="text-danger"></span>
		</div>

		<!-- Columna 2 - Campos para la tabla Persona -->
		<div class="col-md-6">
			<label for="sexo">Sexo:</label>
			<select id="sexo" name="sexo" class="form-control" required>
				<option value="">Ninguno</option> <!-- Opción adicional -->
				<?php foreach ($list_sexo as $sexo) : ?>
					<option value="<?= $sexo->id_sexo ?>"><?= $sexo->descripcion ?></option>
				<?php endforeach; ?>
			</select>
			<span id="errorSexo" class="text-danger"></span>

			<label for="tipo_documento">Tipo de Documento:</label>
			<select id="tipo_documento" name="tipo_documento" class="form-control" required>
				<option value="">Ninguno</option> <!-- Opción adicional -->
				<?php foreach ($list_tipo_documento as $tipo_documento) : ?>
					<option value="<?= $tipo_documento->id_tipo_documento ?>"><?= $tipo_documento->descripcion ?></option>
				<?php endforeach; ?>
			</select>
			<span id="errorTipoDocumento" class="text-danger"></span>
		</div>

		<!-- Botón de Guardar -->
		<div class="col-12 mt-3">
			<a href="javascript:history.go(-1);" class="btn btn-danger">Cancelar</a>
			<input class="btn btn-success" type="submit" value="Guardar">
		</div>

	</form>



</div>

<?php include_once "../../pie.php" ?>