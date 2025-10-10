<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Variables de Sesión</title>
</head>
<body>
    <h2>Datos guardados en la sesión</h2>

    <?php
    if (isset($_SESSION['usuario']) && isset($_SESSION['clave'])) {
        echo "<p><strong>Usuario:</strong> " . htmlspecialchars($_SESSION['usuario']) . "</p>";
        echo "<p><strong>Clave:</strong> " . htmlspecialchars($_SESSION['clave']) . "</p>";
    } else {
        echo "<p>No hay variables de sesión definidas.</p>";
    }
    ?>

    <br>
    <a href="login.php">Volver al login</a>
</body>
</html>
