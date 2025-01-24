<?php
require_once '../controlador/SociosController.php';
$controller = new SociosController();
$socios = $controller->listarSocios();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Socios</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Socios Registrados</h1>

        <!-- Tabla de socios -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($socios as $socio): ?>
                        <tr>
                            <td><?= $socio['id_socio'] ?></td>
                            <td><?= $socio['nombre'] ?></td>
                            <td><?= $socio['apellido'] ?></td>
                            <td><?= $socio['email'] ?></td>
                            <td><?= $socio['telefono'] ?></td>
                            <td><?= $socio['fecha_nacimiento'] ?></td>
                            <td>
                                <a href="editar_socio.php?id=<?= $socio['id_socio'] ?>" class="btn btn-primary btn-sm">Editar</a>
                                <a href="eliminar_socio.php?id=<?= $socio['id_socio'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Botón para agregar nuevo socio -->
        <div class="text-center mt-4">
            <a href="alta_socio.php" class="btn btn-success">Agregar un nuevo socio</a>
            <br>
            <br>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<footer class="bg-dark text-white text-center py-3">
    <p class="mb-0">© 2025 Mi Sitio Web. Todos los derechos reservados.</p>
</footer>

</body>
</html>
