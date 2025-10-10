<?php
session_start();

// Guardar valores enviados desde login.php en variables de sesión
$_SESSION['usuario'] = $_POST['usuario'] ?? '';
$_SESSION['clave'] = $_POST['clave'] ?? '';

// Redirigir a la página donde mostraremos las variables de sesión
header("Location: mostrar_sesion.php");
exit;
?>
