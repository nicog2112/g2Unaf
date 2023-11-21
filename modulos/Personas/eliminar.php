<?php
if (!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../../db/ConexionDB/base_de_datos.php";

try {
    $base_de_datos->beginTransaction();

    // Eliminar de la tabla Persona
    $sentenciaPersona = $base_de_datos->prepare("DELETE FROM Personas WHERE id_persona = ?;");
    $resultadoPersona = $sentenciaPersona->execute([$id]);

    if (!$resultadoPersona) {
        throw new Exception("Error al eliminar de la tabla Personas");
    }

    $base_de_datos->commit();

    header("Location: ./listar.php");
    exit;
} catch (Exception $e) {
    $base_de_datos->rollBack();
    echo "Error: " . $e->getMessage();
}
