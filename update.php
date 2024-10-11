<?php
require 'db.php';

// Obtener el producto actual
$id = $_GET['id'];
$sql = "SELECT * FROM productos WHERE id = $id";
$resultado = $conexion->query($sql);
$producto = $resultado->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    // Actualizar producto en la base de datos
    $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio' WHERE id=$id";
    
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
    <title>Editar Producto</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Producto</h1>
        <form action="update.php?id=<?= $id; ?>" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?= $producto['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required><?= $producto['descripcion']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" id="precio" name="precio" class="form-control" value="<?= $producto['precio']; ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Actualizar Producto</button>
            <a href="index.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>

    <!-- Enlace a Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
