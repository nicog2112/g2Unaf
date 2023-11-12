<?php

include_once "../../db/ConexionDB/base_de_datos.php";

if (!isset($_GET["id"])) exit();
$id = $_GET["id"];

// obtengo el usuario actual
$sentencia = $base_de_datos->prepare("SELECT * FROM Usuarios as u JOIN Personas AS p  ON p.id_persona = u.id_persona WHERE id_usuario = ?;");
$sentencia->execute([$id]);

$usuario = $sentencia->fetch(PDO::FETCH_OBJ);
if ($usuario === FALSE) {
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

// Obtener datos de la tabla Tipo_Perfil
$sentenciaPerfiles = $base_de_datos->prepare("SELECT * FROM Perfiles;");
$sentenciaPerfiles->execute();
$list_perfiles = $sentenciaPerfiles->fetchAll(PDO::FETCH_OBJ);

?>

<?php include_once "../../encabezado.php" ?>

<div class="col-xs-12">
	<h1>Modificar Usuario</h1>
	<form method="post" action="nuevo.php" onsubmit="return validarFormulario()" class="row g-3">

		<!-- Campos para la tabla Persona -->
		<input type="hidden" name="id_persona" value="<?php echo $usuario->id_persona; ?>">
		<input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario; ?>">

		<div class="col-md-6">
			<label for="nombre">Nombre:</label>
			<input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $usuario->nombre ?>" required>
			<span id="errorNombre" class="text-danger"></span>

			<label for="apellido">Apellido:</label>
			<input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $usuario->apellido ?>" required>
			<span id="errorApellido" class="text-danger"></span>

			<label for="dni">DNI:</label>
			<input type="text" id="dni" name="dni" maxlength="8" class="form-control" value="<?php echo $usuario->dni ?>" required>
			<span id="errorDNI" class="text-danger"></span>

			<label for="fecha_nacimiento">Fecha de Nacimiento:</label>
			<input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="<?php echo $usuario->fecha_nacimiento ?>" required>
			<span id="errorFechaNacimiento" class="text-danger"></span>

			<label for="cuil">CUIL:</label>
			<input type="text" id="cuil" name="cuil" maxlength="11" class="form-control" value="<?php echo $usuario->cuil ?>" required>
			<span id="errorCUIL" class="text-danger"></span>
		</div>

		<div class="col-md-6">


			<label for="sexo">Sexo:</label>
			<select id="sexo" name="sexo" class="form-control" required>
				<option value="">Ninguno</option>
				<?php foreach ($list_sexo as $sexoOption) : ?>
					<option value="<?= $sexoOption->id_sexo ?>" <?php echo ($sexoOption->id_sexo == $usuario->id_sexo) ? 'selected' : ''; ?>>
						<?= $sexoOption->descripcion ?>
					</option>
				<?php endforeach; ?>
			</select>
			<span id="errorSexo" class="text-danger"></span>

			<label for="tipo_documento">Tipo de Documento:</label>
			<select id="tipo_documento" name="tipo_documento" class="form-control" required>
				<option value="">Ninguno</option>
				<?php foreach ($list_tipo_documento as $tipo_documentoOption) : ?>
					<option value="<?= $tipo_documentoOption->id_tipo_documento ?>" <?php echo ($tipo_documentoOption->id_tipo_documento == $usuario->id_tipo_documento) ? 'selected' : ''; ?>>
						<?= $tipo_documentoOption->descripcion ?>
					</option>
				<?php endforeach; ?>
			</select>
			<span id="errorTipoDocumento" class="text-danger"></span>

			<label for="username">Nombre de Usuario:</label>
			<input type="text" id="username" name="username" class="form-control" value="<?php echo $usuario->username ?>" required>
			<span id="errorUsername" class="text-danger"></span>

			<label for="password">Contraseña:</label>
			<input type="password" id="password" name="password" class="form-control" value="<?php echo $usuario->password ?>" required>
			<span id="errorPassword" class="text-danger"></span>

			<label for="perfil">Perfil:</label>
			<select id="perfil" name="perfil" class="form-control" required>
				<option value="">Ninguno</option>
				<?php foreach ($list_perfiles as $perfilOption) : ?>
					<option value="<?= $perfilOption->id_perfil ?>" <?php echo ($perfilOption->id_perfil == $usuario->id_perfil) ? 'selected' : ''; ?>>
						<?= $perfilOption->descripcion ?>
					</option>
				<?php endforeach; ?>
			</select>
			<span id="errorPerfil" class="text-danger"></span>
		</div>

		<!-- Otros campos de la tabla Persona -->


		<!-- Otros campos de la tabla Usuario -->

		<div class="col-12 mt-3">
			<a href="javascript:history.go(-1);" class="btn btn-danger">Cancelar</a>
			<input class="btn btn-success" type="submit" value="Guardar">

		</div>
	</form>



</div>

<?php include_once "../../pie.php" ?>