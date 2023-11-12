<?php
#Salir si alguno de los datos no está presente
if (
    !isset($_POST["nombre"]) ||
    !isset($_POST["descripcion"]) ||
    !isset($_POST["precio_venta"]) ||
    !isset($_POST["precio_compra"]) ||
    !isset($_POST["fecha_alta"]) ||
    !isset($_POST["estado"]) ||
    !isset($_POST["color"]) ||
    !isset($_POST["stock"]) ||
    !isset($_POST["stock_minimo"]) ||
    !isset($_POST["codigo_barras"]) ||
    !isset($_POST["id_marca"]) ||
    !isset($_POST["id_rubro"])
) exit();



#Si todo va bien, se ejecuta esta parte del código...

include_once "../../db/ConexionDB/base_de_datos.php";
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio_venta = $_POST["precio_venta"];
$precio_compra = $_POST["precio_compra"];
$fecha_alta = $_POST["fecha_alta"];
$estado = $_POST["estado"];
$color = $_POST["color"];
$stock = $_POST["stock"];
$stock_minimo = $_POST["stock_minimo"];
$codigo_barras = $_POST["codigo_barras"];
$id_marca = $_POST["id_marca"];
$id_rubro = $_POST["id_rubro"];



$sentencia = $base_de_datos->prepare("INSERT INTO productos ( nombre, descripcion, precio_venta, precio_compra, fecha_alta, estado, color, stock, stock_minimo, codigo_barras, id_marca, id_rubro	
) VALUES ('$nombre', '$descripcion', '$precio_venta', '$precio_compra', '$fecha_alta', '$estado', '$color', '$stock', '$stock_minimo','$codigo_barras', '$id_marca', '$id_rubro');");

$resultado = $sentencia->execute([$nombre, $descripcion, $precio_venta, $precio_compra, $fecha_alta, $estado, $color, $stock, $stock_minimo, $codigo_barras, $id_marca, $id_rubro]);

if ($resultado === TRUE) {
    header("Location: ./listar.php");
    exit;
} else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "../../pie.php" ?>