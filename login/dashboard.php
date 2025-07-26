<?php
session_start();

// Validar que el usuario haya iniciado sesión correctamente
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// Sanitizar el valor solo si está definido
$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="resources/dashboard.css">
</head>
<body>
    <h2>Bienvenido, <?php echo $username; ?>!</h2>
    <p>Has iniciado sesión correctamente.</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
