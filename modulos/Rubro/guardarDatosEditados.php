<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["descripcion"]) || 
	!isset($_POST["id"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../../db/ConexionDB/base_de_datos.php";
$id = $_POST["id"];
$descripcion = $_POST["descripcion"];

$sentencia = $base_de_datos->prepare("UPDATE rubro SET  descripcion = ?  WHERE id_rubro = ?;");
$resultado = $sentencia->execute([$descripcion, $id]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del Rubro";
