<?php 
require_once '../controlador/SociosController.php';

// Inicializa variables
$id_socio = $_GET['id'] ?? null;
$socio = null;

// Obtener datos del cliente a editar
$controller = new SociosController();
$socio = $controller->obtenerSocioPorId($id_socio);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Actualizar los datos del cliente
    $controller->actualizarSocio(
        $id_socio, 
        $_POST['nombre'], 
        $_POST['apellido'], 
        $_POST['email'], 
        $_POST['telefono'], 
        $_POST['fecha_nacimiento']
    );
    header("Location: lista_socios.php");
    exit();
}?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Socio</title>
    <!-- Enlace a Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            padding: 20px;
            margin-top: 40px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        a.btn-secondary-custom {
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }
        a.btn-secondary-custom:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Editar Información del Socio</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?= htmlspecialchars($socio['nombre']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" id="apellido" name="apellido" class="form-control" value="<?= htmlspecialchars($socio['apellido']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($socio['email']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" class="form-control" value="<?= htmlspecialchars($socio['telefono']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="<?= htmlspecialchars($socio['fecha_nacimiento']) ?>" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-custom">Guardar Cambios</button>
                <a href="lista_socios.php" class="btn-secondary-custom">Volver al listado</a>
            </div>
        </form>
    </div>

    <!-- Script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
