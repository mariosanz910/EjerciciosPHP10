<?php 
require_once '../controlador/SociosController.php';

// Inicializa variables
$id_socio = $_GET['id'] ?? null;

if ($id_socio) {
    // Obtener datos del cliente a eliminar
    $controller = new SociosController();
    $socio = $controller->obtenerSocioPorId($id_socio);

    if (!$socio) {
        echo "Socio no encontrado.";
        exit();
    }
} else {
    echo "ID de socio no especificado.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Eliminar el socio
    $controller->eliminarSocio($id_socio);
    header("Location: lista_socios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Socio</title>
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
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn-custom:hover {
            background-color: #c82333;
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
        <h2 class="text-center mb-4">Eliminar Socio</h2>
        <form method="POST" action="">
            <div class="alert alert-warning" role="alert">
                ¿Estás seguro de que deseas eliminar el socio <?= htmlspecialchars($socio['nombre']) ?> <?= htmlspecialchars($socio['apellido']) ?>?
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-custom">Eliminar Socio</button>
                <a href="lista_socios.php" class="btn-secondary-custom">Cancelar</a>
            </div>
        </form>
    </div>

    <!-- Script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
