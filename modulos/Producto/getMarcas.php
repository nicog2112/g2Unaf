<?php

include_once "../../db/ConexionDB/base_de_datos.php";

try {
    // Consulta SQL para obtener los registros de la base de datos
    $consulta = "SELECT * FROM marca";
    $resultado = $base_de_datos->query($consulta);

    // Verificar si hay registros
    if ($resultado->rowCount() > 0) {
        // Crear un array para almacenar los resultados
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        // Devolver los resultados como JSON
        echo json_encode($data);
    } else {
        // Devolver un JSON con un mensaje indicando que no hay elementos
        echo json_encode(array("mensaje" => "No hay elementos"));
    }
} catch (PDOException $e) {
    // Manejar errores de PDO
    echo json_encode(array("error" => $e->getMessage()));
}
?>
