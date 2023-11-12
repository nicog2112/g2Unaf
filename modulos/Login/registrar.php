<?php
include_once "../ConexionDB/base_de_datos.php";


if (strlen($_POST['usuario']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['contraseña']) >= 1) {
    $usuario = trim($_POST['usuario']);
    $correo = trim($_POST['correo']);
    $contraseña = trim($_POST['contraseña']);
    $fechareg = date("y/m/d");
    $sentencia = $base_de_datos->prepare("INSERT INTO usuarios(usuario, correo, contraseña) VALUES (?, ?, ?);");
    $resultado = $sentencia->execute([$usuario, $correo, $contraseña]);
    if ($resultado) {

        header("location: login.php?validacion=true");
    } else {
        header("location: login.php?validacion=false");
    }
} else {
?>
    <h3 class="bad">¡Por favor complete los campos!</h3>
<?php
}


?>