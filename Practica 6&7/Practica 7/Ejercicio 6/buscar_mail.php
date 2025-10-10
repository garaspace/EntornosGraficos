<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Buscar Alumno</title>
</head>
<body>
    <h2>Formulario de búsqueda de alumno</h2>
    <form action="guardar_sesion_alumno.php" method="post">
        <label>Ingrese el mail del alumno:</label><br>
        <input type="email" name="mail" required><br><br>

        <input type="submit" value="Buscar">
    </form>
</body>
</html>
