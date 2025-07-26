<?php
session_start();
// login.php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "pentesting";

// Conexión a la base de datos
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Capturar datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta vulnerable (NO usar en producción)
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
//echo $query;
$result = mysqli_query($conn, $query);
//echo "<br>";
//echo "Resultados: ".mysqli_num_rows($result);
// Verificar resultado

if (mysqli_num_rows($result) > 0) {
     // Simulamos login exitoso
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit;
} else {
    echo "❌ Acceso denegado.";
}

mysqli_close($conn);
?>
