<?php include_once "../../encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo Rubro</h1>
	<form method="post" action="nuevo.php" onsubmit="return validarFormulario()">
		
		<label for="descripcion">Descripción:</label>
		<textarea id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>
        <span id="errorDescripcion" class="text-danger"></span>

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>

<?php include_once "../../pie.php" ?>

