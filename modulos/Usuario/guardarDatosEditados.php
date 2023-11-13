<?php
# Salir si alguno de los datos no está presente
if (!isset($_POST["id_persona"], $_POST["id_usuario"], $_POST["nombre"], $_POST["apellido"], $_POST["dni"], $_POST["fecha_nacimiento"],
    $_POST["cuil"], $_POST["sexo"], $_POST["tipo_documento"], $_POST["username"], $_POST["password"], $_POST["perfil"])) {
    exit("Datos incompletos");
}

# Validación de datos
$id_persona = $_POST["id_persona"];
$id_usuario = $_POST["id_usuario"];

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$dni = $_POST["dni"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$cuil = $_POST["cuil"];
$sexo = $_POST["sexo"];
$tipo_documento = $_POST["tipo_documento"];

$username = $_POST["username"];
$password = $_POST["password"];
$perfil = $_POST["perfil"];

# Si todo va bien, se ejecuta esta parte del código...
include_once "../../db/ConexionDB/base_de_datos.php";

try {
    # Iniciar una transacción
    $base_de_datos->beginTransaction();

    # Actualizar en la tabla Persona
    $sentenciaPersona = $base_de_datos->prepare("UPDATE Personas SET nombre=?, apellido=?, dni=?, fecha_nacimiento=?, cuil=?, id_sexo=?, id_tipo_documento=? WHERE id_persona=?;");
    $resultadoPersona = $sentenciaPersona->execute([$nombre, $apellido, $dni, $fecha_nacimiento, $cuil, $sexo, $tipo_documento, $id_persona]);

    if (!$resultadoPersona) {
        throw new Exception("Error al actualizar en la tabla Personas");
    }

    # Actualizar en la tabla Usuario
    $sentenciaUsuario = $base_de_datos->prepare("UPDATE Usuarios SET username=?, password=?, id_perfil=? WHERE id_usuario=?;");
    $resultadoUsuario = $sentenciaUsuario->execute([$username, $password, $perfil, $id_usuario]);

    if (!$resultadoUsuario) {
        throw new Exception("Error al actualizar en la tabla Usuarios");
    }

    # Confirmar la transacción
    $base_de_datos->commit();

    # Redirigir después de la edición exitosa
    header("Location: ./listar.php");
    exit;

} catch (Exception $e) {
    # Deshacer la transacción en caso de error
    $base_de_datos->rollBack();

    # Manejo de errores
    echo "Error: " . $e->getMessage();
} finally {
    # Cerrar la conexión
    $base_de_datos = null;
}

# Incluir el pie de página
include_once "../../pie.php";
