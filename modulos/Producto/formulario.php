<?php include_once "../../encabezado.php" ?>
<?php
include_once "../../db/ConexionDB/base_de_datos.php";

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
?>
<?php
include_once "../../db/ConexionDB/base_de_datos.php";
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
            <h1>Nuevo Producto</h1>
            <form method="post" action="nuevo.php" onsubmit="return validarFormulario()">

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control">
                <!-- <textarea id="nombre" name="nombre" cols="30" rows="5" class="form-control"></textarea> -->
                <span id="errorNombre" class="text-danger"></span>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>
                <span id="errorDescripcion" class="text-danger"></span>

                <label for="precio_venta">Precio de Venta:</label>
                <input type="number" name="precio_venta" id="precio_venta" class="form-control">
                <span id="errorPrecio_venta" class="text-danger"></span>

                <label for="precio_compra">Precio de Compra:</label>
                <input type="number" name="precio_compra" id="precio_compra" class="form-control">
                <span id="errorPrecio_compra" class="text-danger"></span>

                <!-- <label for="fecha_alta">Fecha de Alta:</label>
                <textarea id="fecha_alta" name="fecha_alta" cols="30" rows="5" class="form-control"></textarea>
                <span id="errorFecha_alta" class="text-danger"></span> -->

                <!-- <label for="estado">Estado:</label>
                <textarea id="estado" name="estado" cols="30" rows="5" class="form-control"></textarea>
                <span id="errorEstado" class="text-danger"></span> -->

                <label for="color">Color:</label>
                <input type="name" name="color" id="color" class="form-control">
                <span id="errorColor" class="text-danger"></span>

                <label for="stock">Stock:</label>
                <!-- <textarea id="stock" name="stock" cols="30" rows="5" class="form-control"></textarea> -->
                <input type="number" name="stock" id="stock" class="form-control">

                <span id="errorStock" class="text-danger"></span>

                <label for="stock_minimo">Stock Mínimo:</label>
                <!-- <textarea id="stock_minimo" name="stock_minimo" cols="30" rows="5" class="form-control"></textarea> -->
                <input type="number" name="stock_minimo" id="stock_minimo" class="form-control">
                <span id="errorStock_minimo" class="text-danger"></span>

                <label for="codigo_barras">Código de Barra:</label>
                <!-- <textarea id="codigo_barras" name="codigo_barras" cols="30" rows="5" class="form-control"></textarea> -->
                <input type="number" name="codigo_barras" id="codigo_barras" class="form-control">
                <span id="errorCodigo_barras" class="text-danger"></span>

                <label for="id_marca">Marca:</label>
                <!-- <textarea id="id_marca" name="id_marca" cols="30" rows="5" class="form-control"></textarea> -->
                <select name="id_marca" id="id_marca" class="form-control">
                    <option value="0" selected disabled>Seleccione una opción</option>
                    <?php
                        // Verificar si hay datos en $data
                        if ($marca) {
                            // Iterar sobre los resultados y agregar opciones al combo
                            foreach ($marca as $marcas) {
                                echo '<option value="' . $marcas['id_marca'] . '">' . $marcas['descripcion'] . '</option>';
                            }
                        } else {
                            // Si no hay datos, mostrar una opción deshabilitada
                            echo '<option value="" disabled>No hay marcas cargadas en el sistema</option>';
                        }
                    ?>
                </select>
                <span id="errorMarca" class="text-danger"></span>

                <label for="id_rubro">Rubro:</label>
                <select name="id_rubro" id="id_rubro" class="form-control">
                    <option value="0" selected disabled>Seleccione una opción</option>
                    <?php
                        // Verificar si hay datos en $data
                        if ($rubro) {
                            // Iterar sobre los resultados y agregar opciones al combo
                            foreach ($rubro as $rubros) {
                                echo '<option value="' . $rubros['id_rubro'] . '">' . $rubros['descripcion'] . '</option>';
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

                <br><br><input class="btn btn-info" type="submit" value="Guardar">
            </form>
        </div>
    </div>
</div>


<?php include_once "../../pie.php" ?>


<!-- <script>
    $(document).ready(function() {
        // Hacer una solicitud Ajax al archivo.php para obtener los datos
        $.ajax({
            url: 'getMarcas.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Verificar si hay elementos en el JSON
                if (data.length > 0) {
                    // Iterar sobre los resultados y agregar opciones al combo
                    $.each(data, function(index, element) {
                        $('#id_marca').append($('<option>', {
                            value: element.id,
                            text: element.descripcion
                        }));
                    });
                } else {
                    // Si no hay elementos, agregar una opción indicando que no hay elementos
                    $('#id_marca').append($('<option>', {
                        value: '',
                        text: 'No hay elementos'
                    }));
                }
            },
            error: function() {
                // Manejar errores si la solicitud Ajax falla
                alert('Error al cargar los datos');
            }
        });
    });
</script> -->

<!-- <script>
    $(document).ready(function() {
        // Hacer una solicitud Ajax al archivo.php para obtener los datos
        $.ajax({
            url: 'getRubro.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Verificar si hay elementos en el JSON
                if (data.length > 0) {
                    // Iterar sobre los resultados y agregar opciones al combo
                    $.each(data, function(index, element) {
                        $('#id_rubro').append($('<option>', {
                            value: element.id_rubro,
                            text: element.descripcion
                        }));
                    });
                } else {
                    // Si no hay elementos, agregar una opción indicando que no hay elementos
                    $('#id_rubro').append($('<option>', {
                        value: '',
                        text: 'No hay elementos'
                    }));
                }
            },
            error: function() {
                // Manejar errores si la solicitud Ajax falla
                alert('Error al cargar los datos');
            }
        });
    });
</script> -->