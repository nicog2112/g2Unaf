<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../../db/ConexionDB/base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM tipo_contacto WHERE id_tipo_contacto = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal";
