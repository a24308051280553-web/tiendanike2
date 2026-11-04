<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Consultar si el usuario y la contraseña coinciden en MySQL
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND password = '$password'";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        // Inicio de sesión correcto -> Redirige a la página de calzado
        echo "<script>
                alert('¡Bienvenido a Nike Store!');
                window.location.href = 'calzado.php';
              </script>";
        exit();
    } else {
        // Datos incorrectos -> Alerta y regresa al inicio
        echo "<script>
                alert('Correo o contraseña incorrectos. Intenta de nuevo.');
                window.location.href = 'index.php';
              </script>";
        exit();
    }
} else {
    // Si intentan entrar directo a login.php lo manda al index
    header("Location: index.php");
    exit();
}
?>