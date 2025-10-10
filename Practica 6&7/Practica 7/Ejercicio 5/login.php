<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Formulario de login</h2>
    <form action="guardar_sesion.php" method="post">
        <label>Nombre de usuario:</label><br>
        <input type="text" name="usuario" required><br><br>

        <label>Clave:</label><br>
        <input type="password" name="clave" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
