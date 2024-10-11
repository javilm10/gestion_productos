<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    // Insertar producto en la base de datos
    $sql = "INSERT INTO productos (nombre, descripcion, precio) VALUES ('$nombre', '$descripcion', '$precio')";
    
    if ($conexion->query($sql) === TRUE) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Producto</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Añadir Producto</h1>
        <form action="create.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" id="precio" name="precio" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Añadir Producto</button>
            <a href="index.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>

    <!-- Enlace a Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
