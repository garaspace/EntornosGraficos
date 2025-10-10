<?php
// Verificar si la cookie "contador" ya existe
if (isset($_COOKIE['contador'])) {
    // Si existe, aumentar en 1 su valor
    $contador = $_COOKIE['contador'] + 1;
    setcookie('contador', $contador, time() + 3600 * 24 * 30); // dura 30 días
    $mensaje = "Has visitado esta página <strong>$contador</strong> veces.";
} else {
    // Si no existe, crear la cookie y mostrar mensaje de bienvenida
    $contador = 1;
    setcookie('contador', $contador, time() + 3600 * 24 * 30); // dura 30 días
    $mensaje = "¡Bienvenido! Es la primera vez que visitas esta página.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 - Contador de visitas con cookies</title>
</head>
<body>
    <h1>Contador de Visitas</h1>
    <p><?php echo $mensaje; ?></p>
</body>
</html>
