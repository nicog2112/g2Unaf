<?php
#Salir si alguno de los datos no está presente
if (
    !isset($_POST["nombre"]) ||
    !isset($_POST["descripcion"]) ||
    !isset($_POST["precio_venta"]) ||
    !isset($_POST["precio_compra"]) ||
    !isset($_POST["color"]) ||
    !isset($_POST["stock"]) ||
    !isset($_POST["stock_minimo"]) ||
    !isset($_POST["codigo_barras"]) ||
    !isset($_POST["id_marca"]) ||
    !isset($_POST["id_rubro"])
) exit();


#Si todo va bien, se ejecuta esta parte del código...

include_once "../../db/ConexionDB/base_de_datos.php";
$id_producto = $_POST["id_producto"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio_venta = $_POST["precio_venta"];
$precio_compra = $_POST["precio_compra"];
$color = $_POST["color"];
$stock = $_POST["stock"];
$stock_minimo = $_POST["stock_minimo"];
$codigo_barras = $_POST["codigo_barras"];
$id_marca = $_POST["id_marca"];
$id_rubro = $_POST["id_rubro"];

$sentencia = $base_de_datos->prepare("UPDATE productos SET 
    nombre = :nombre, 
    descripcion = :descripcion, 
    precio_venta = :precio_venta, 
    precio_compra = :precio_compra, 
    stock = :stock, 
    stock_minimo = :stock_minimo, 
    codigo_barras = :codigo_barras, 
    id_marca = :id_marca, 
    id_rubro = :id_rubro 
    WHERE id_producto = :id_producto"
);

// Bind de parámetros
$sentencia->bindParam(':nombre', $nombre);
$sentencia->bindParam(':descripcion', $descripcion);
$sentencia->bindParam(':precio_venta', $precio_venta);
$sentencia->bindParam(':precio_compra', $precio_compra);
$sentencia->bindParam(':stock', $stock);
$sentencia->bindParam(':stock_minimo', $stock_minimo);
$sentencia->bindParam(':codigo_barras', $codigo_barras);
$sentencia->bindParam(':id_marca', $id_marca);
$sentencia->bindParam(':id_rubro', $id_rubro);
$sentencia->bindParam(':id_producto', $id_producto); // Asegúrate de definir $id_producto antes de este punto


$resultado = $sentencia->execute();
if ($resultado === TRUE) {
    header("Location: ./listar.php");
    exit;
} else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "../../pie.php" ?>