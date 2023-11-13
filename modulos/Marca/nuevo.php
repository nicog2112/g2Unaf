<?php
# Salir si alguno de los datos no está presente
if (!isset($_POST["descripcion"])) {
    exit("Datos incompletos");
}

# Validación de datos
$descripcion = $_POST["descripcion"];

# Si todo va bien, se ejecuta esta parte del código...
include_once "../../db/ConexionDB/base_de_datos.php";

try {
    # Preparar la consulta - el siguno de ptregunta se le pasa la descripcion mas abajo
    $sentencia = $base_de_datos->prepare("INSERT INTO Marca (descripcion) VALUES (?);");

    # Ejecutar la consulta - Aca se le manda a la sentencia el parametro descripcion que reemplazar al signo de pregunta.
    $resultado = $sentencia->execute([$descripcion]);

    if ($resultado === true) {
        # Redirigir después de la inserción exitosa
        header("Location: ./listar.php");
        exit;
    } else {
        echo "Algo salió mal. Por favor, verifica que la tabla exista.";
    }
} catch (Exception $e) {
    # Manejo de errores
    echo "Error: " . $e->getMessage();
} finally {
    # Cerrar la conexión
    $base_de_datos = null;
}

# Incluir el pie de página
include_once "../../pie.php";
?>
