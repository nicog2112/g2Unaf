<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["descripcion"]) ) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../../db/ConexionDB/base_de_datos.php";
$descripcion = $_POST["descripcion"];


$sentencia = $base_de_datos->prepare("INSERT INTO rubro ( descripcion ) VALUES (?);");
$resultado = $sentencia->execute([ $descripcion ]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "../../pie.php" ?>