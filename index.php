<?php
require 'db.php';

// Consultar productos
$sql = "SELECT * FROM productos";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
    <!-- Enlace a Bootstrap CSS  -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Productos</h1>
        <a href="create.php" class="btn btn-primary mb-3">Añadir nuevo producto</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($producto = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= $producto['id']; ?></td>
                    <td><?= $producto['nombre']; ?></td>
                    <td><?= $producto['descripcion']; ?></td>
                    <td><?= number_format($producto['precio'], 2); ?> €</td>
                    <td>
                        <a href="update.php?id=<?= $producto['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="delete.php?id=<?= $producto['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Enlace a Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
