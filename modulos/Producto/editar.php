<?php include_once "../../encabezado.php" ?>
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

try {
    // Consulta SQL para obtener los registros de la base de datos
    $consulta = "SELECT * FROM marca";
    $resultado = $base_de_datos->query($consulta);

    // Verificar si hay registros
    if ($resultado->rowCount() > 0) {
        // Crear un array para almacenar los resultados
        $marca = $resultado->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $marca =[];
    }
} catch (PDOException $e) {
    // Manejar errores de PDO
    echo 'Error: ' . $e->getMessage();
    exit(); // Terminar la ejecución en caso de error
}

try {
    // Consulta SQL para obtener los registros de la base de datos
    $consulta = "SELECT * FROM rubro";
    $resultado = $base_de_datos->query($consulta);

    // Verificar si hay registros
    if ($resultado->rowCount() > 0) {
        // Crear un array para almacenar los resultados
        $rubro = $resultado->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $rubro =[];
    }
} catch (PDOException $e) {
    // Manejar errores de PDO
    echo 'Error: ' . $e->getMessage();
    exit(); // Terminar la ejecución en caso de error
}
?>


<div class="container">
    <div class="row" style="display: flex; justify-content: center;">
        <div class="col-xs-12 col-md-6">
            <h1>Editar Producto</h1>
            <form method="post" action="guardarDatosEditados.php">
				<input type="hidden" name="id_producto" value="<?php echo $productos->id_producto; ?>">

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $productos->nombre; ?>">
                <!-- <textarea id="nombre" name="nombre" cols="30" rows="5" class="form-control"></textarea> -->
                <span id="errorNombre" class="text-danger"></span>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"><?php echo $productos->descripcion;?></textarea>
                <span id="errorDescripcion" class="text-danger"></span>

                <label for="precio_venta">Precio de Venta:</label>
                <input type="number" name="precio_venta" id="precio_venta" class="form-control" value="<?php echo $productos->precio_venta;?>">
                <span id="errorPrecio_venta" class="text-danger"></span>

                <label for="precio_compra">Precio de Compra:</label>
                <input type="number" name="precio_compra" id="precio_compra" class="form-control" value="<?php echo $productos->precio_compra;?>">
                <span id="errorPrecio_compra" class="text-danger"></span>

                <!-- <label for="fecha_alta">Fecha de Alta:</label>
                <textarea id="fecha_alta" name="fecha_alta" cols="30" rows="5" class="form-control"></textarea>
                <span id="errorFecha_alta" class="text-danger"></span> -->

                <!-- <label for="estado">Estado:</label>
                <textarea id="estado" name="estado" cols="30" rows="5" class="form-control"></textarea>
                <span id="errorEstado" class="text-danger"></span> -->

                <label for="color">Color:</label>
                <input type="name" name="color" id="color" class="form-control" value="<?php echo $productos->color;?>">
                <span id="errorColor" class="text-danger"></span>

                <label for="stock">Stock:</label>
                <!-- <textarea id="stock" name="stock" cols="30" rows="5" class="form-control"></textarea> -->
                <input type="number" name="stock" id="stock" class="form-control" value="<?php echo $productos->stock;?>">

                <span id="errorStock" class="text-danger"></span>

                <label for="stock_minimo">Stock Mínimo:</label>
                <!-- <textarea id="stock_minimo" name="stock_minimo" cols="30" rows="5" class="form-control"></textarea> -->
                <input type="number" name="stock_minimo" id="stock_minimo" class="form-control" value="<?php echo $productos->stock_minimo;?>">
                <span id="errorStock_minimo" class="text-danger"></span>

                <label for="codigo_barras">Código de Barra:</label>
                <!-- <textarea id="codigo_barras" name="codigo_barras" cols="30" rows="5" class="form-control"></textarea> -->
                <input type="number" name="codigo_barras" id="codigo_barras" class="form-control" value="<?php echo $productos->codigo_barras;?>">
                <span id="errorCodigo_barras" class="text-danger"></span>

                <label for="id_marca">Marca:</label>
                <!-- <textarea id="id_marca" name="id_marca" cols="30" rows="5" class="form-control"></textarea> -->
                <select name="id_marca" id="id_marca" class="form-control" value="<?php echo $productos->id_marca;?>">
                    <option value="0" selected disabled>Seleccione una opción</option>
                    <?php
                        // Verificar si hay datos en $data
                        if ($marca) {
                            // Iterar sobre los resultados y agregar opciones al combo
                            foreach ($marca as $marcas) {
								if($productos->id_marca == $marcas['id_marca']){
									echo '<option selected value="' . $marcas['id_marca'] . '">' . $marcas['descripcion'] . '</option>';
								}else{
									echo '<option selected value="' . $marcas['id_marca'] . '">' . $marcas['descripcion'] . '</option>';
								}
                            }
                        } else {
                            // Si no hay datos, mostrar una opción deshabilitada
                            echo '<option value="" disabled>No hay marcas cargadas en el sistema</option>';
                        }
                    ?>
                </select>
                <span id="errorMarca" class="text-danger"></span>

                <label for="id_rubro">Rubro:</label>
                <select name="id_rubro" id="id_rubro" class="form-control" value="<?php echo $productos->id_rubro;?>">
                    <option value="0" selected disabled>Seleccione una opción</option>
                    <?php
                        // Verificar si hay datos en $data
                        if ($rubro) {
                            // Iterar sobre los resultados y agregar opciones al combo
                            foreach ($rubro as $rubros) {
								if($productos->id_rubro == $rubros['id_rubro']){
									echo '<option selected value="' . $rubros['id_rubro'] . '">' . $rubros['descripcion'] . '</option>';
								}else{
									echo '<option value="' . $rubros['id_rubro'] . '">' . $rubros['descripcion'] . '</option>';
								}
                            }
                        } else {
                            // Si no hay datos, mostrar una opción deshabilitada
                            echo '<option value="" disabled>No hay marcas cargadas en el sistema</option>';
                        }
                    ?>
                </select>

                <span id="errorMarca" class="text-danger"></span>

                <!-- <label for="id_rubro">Rubro:</label>
                <textarea id="id_rubro" name="id_rubro" cols="30" rows="5" class="form-control"></textarea>
                <span id="errorRubro" class="text-danger"></span> -->

                <br>  
                <div class="col-12">
                    <a href="javascript:history.go(-1);" class="btn btn-danger">Cancelar</a>
                    <input class="btn btn-success" type="submit" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once "../../pie.php" ?>
