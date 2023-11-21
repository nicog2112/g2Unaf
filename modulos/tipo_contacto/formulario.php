<?php include_once "../../encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo Contacto</h1>
	<form method="post" action="nuevo.php" onsubmit="return validarFormulario()">

		<label for="descripcion">Descripción:</label>
		<textarea id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>
		<span id="errorDescripcion" class="text-danger"></span>

		<div class="col-12 mt-3">
			<a href="javascript:history.go(-1);" class="btn btn-danger">Cancelar</a>
			<input class="btn btn-success" type="submit" value="Guardar">

		</div>
	</form>
</div>

<?php include_once "../../pie.php" ?>