<?php
require_once '../controlador/SociosController.php';

$controller = new SociosController();
$mensaje = ""; // Inicializar mensaje

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $fecha_nacimiento = trim($_POST['fecha_nacimiento']);

    // Validar que los campos no estén vacíos
    if (!empty($nombre) && !empty($apellido) && !empty($email) && !empty($telefono) && !empty($fecha_nacimiento)) {
        // Llama a la función de agregar socio
        $resultado = $controller->agregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento);

        if ($resultado) {
            $mensaje = "¡Socio agregado exitosamente!";
            // Redirigir a la página principal después de agregar el socio
            echo "<script>setTimeout(function() { window.location.href = 'http://localhost:8080/programacion/proyecto_CRUD_PHP/'; }, 2000);</script>";
            header("Location: http://localhost:8080/programacion/proyecto_CRUD_PHP/");
            exit();
        } else {
            $mensaje = "Error al agregar al socio. Intenta de nuevo.";
            header("Location: http://localhost:8080/programacion/proyecto_CRUD_PHP/");
            exit();
        }
    } else {
        $mensaje = "Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Socio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Agregar Nuevo Socio</h1>

        <!-- Mensaje de éxito o error -->
        <?php if (!empty($mensaje)): ?>
            <div class="alert <?= strpos($mensaje, 'Error') === false ? 'alert-success' : 'alert-danger' ?> text-center">
                <?= $mensaje ?>
            </div>
        <?php endif; ?>

        <!-- Formulario para agregar socio -->
        <form action="alta_socio.php" method="POST" class="bg-white p-4 shadow rounded">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Agregar Socio</button>
                <a href="http://localhost:8080/programacion/proyecto_CRUD_PHP/" class="btn btn-secondary">Volver al Listado</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>