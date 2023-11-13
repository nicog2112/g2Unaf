<?php

if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../../db/ConexionDB/base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM productos WHERE id_producto = ?;");
$resultado = $sentencia->execute([$id]);
    if ($resultado) {
        echo "<script>
        alert('PRODUCTO ELIMINADO CORRECTAMENTE');
        window.location.href='listar.php';
        </script>";
    } else {
        //echo"<div class ='alert alert-danger'>ERROR AL ELIMINAR</div>";
        "<script>
        alert('ERROR AL ELIMINAR EL REGISTRO');
        window.location.href='listar.php';
        </script>"; 
    }
//if(!isset($_GET["id"])) exit();
//$id = $_GET["id"];
//include_once "../../db/ConexionDB/base_de_datos.php";
//$sentencia = $base_de_datos->prepare("DELETE FROM productos WHERE id_producto = ?;");
//$resultado = $sentencia->execute([$id]);
//if($resultado === TRUE){
//	header("Location: ./listar.php");
//	exit;
//}
//else echo "Algo salió mal";
?>