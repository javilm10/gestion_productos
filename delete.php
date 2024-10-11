<?php
require 'db.php';

$id = $_GET['id'];

// Eliminar producto
$sql = "DELETE FROM productos WHERE id = $id";

if ($conexion->query($sql) === TRUE) {
    header('Location: index.php');
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}
?>
