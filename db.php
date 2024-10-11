<?php
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "croudecommerce"; 

// Crear conexión
$conexion = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>