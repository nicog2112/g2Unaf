<?php include_once "../../encabezado.php" ?>

<div class="col-xs-12">
    <h1>Nuevo Producto</h1>
    <form method="post" action="nuevo.php" onsubmit="return validarFormulario()">
        
        <label for="nombre">Nombre:</label>
        <textarea id="nombre" name="nombre" cols="30" rows="5" class="form-control"></textarea>
        <span id="errorNombre" class="text-danger"></span>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>
        <span id="errorDescripcion" class="text-danger"></span>

        <label for="precio_venta">Precio de Venta:</label>
        <textarea id="precio_venta" name="precio_venta" cols="30" rows="5" class="form-control"></textarea>
        <span id="errorPrecio_venta" class="text-danger"></span>

        <label for="precio_compra">Precio de Compra:</label>
        <textarea id="precio_compra" name="precio_compra" cols="30" rows="5" class="form-control"></textarea>
        <span id="errorPrecio_compra" class="text-danger"></span>

        <label for="fecha_alta">Fecha de Alta:</label>
        <textarea id="fecha_alta" name="fecha_alta" cols="30" rows="5" class="form-control"></textarea>
        <span id="errorFecha_alta" class="text-danger"></span>

        <label for="estado">Estado:</label>
        <textarea id="estado" name="estado" cols="30" rows="5" class="form-control"></textarea>
        <span id="errorEstado" class="text-danger"></span>

        <label for="color">Color:</label>
        <textarea id="color" name="color" cols="30" rows="5" class="form-control"></textarea>
        <span id="errorColor" class="text-danger"></span>

        <label for="stock">Stock:</label>
        <textarea id="stock" name="stock" cols="30" rows="5" class="form-control"></textarea>
        <span id="errorStock" class="text-danger"></span>

        <label for="stock_minimo">Stock Mínimo:</label>
        <textarea id="stock_minimo" name="stock_minimo" cols="30" rows="5" class="form-control"></textarea>
        <span id="errorStock_minimo" class="text-danger"></span>

        <label for="codigo_barras">Código de Barra:</label>
        <textarea id="codigo_barras" name="codigo_barras" cols="30" rows="5" class="form-control"></textarea>
        <span id="errorCodigo_barras" class="text-danger"></span>

        <label for="id_marca">Marca:</label>
        <textarea id="id_marca" name="id_marca" cols="30" rows="5" class="form-control"></textarea>
        <span id="errorMarca" class="text-danger"></span>
        
        <label for="id_rubro">Rubro:</label>
        <textarea id="id_rubro" name="id_rubro" cols="30" rows="5" class="form-control"></textarea>
        <span id="errorRubro" class="text-danger"></span>
    
        <br><br><input class="btn btn-info" type="submit" value="Guardar">
    </form>
</div>

<?php include_once "../../pie.php" ?>