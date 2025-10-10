<?php
// Si el usuario seleccionó un titular, guardar en cookie
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["titular"])) {
    $titular = $_POST["titular"];
    setcookie("titular", $titular, time() + 3600 * 24 * 7); // cookie válida 7 días
} elseif (isset($_COOKIE["titular"])) {
    $titular = $_COOKIE["titular"];
} else {
    $titular = "todos"; // primera visita
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Periódico - Ejercicio 4</title>
</head>
<body>
    <h1>🗞️ Periódico en línea</h1>
    <form method="post" action="">
        <p>Seleccione el tipo de titular que desea ver:</p>
        <label><input type="radio" name="titular" value="politica" <?php if ($titular=="politica") echo "checked"; ?>> Noticia política</label><br>
        <label><input type="radio" name="titular" value="economica" <?php if ($titular=="economica") echo "checked"; ?>> Noticia económica</label><br>
        <label><input type="radio" name="titular" value="deportiva" <?php if ($titular=="deportiva") echo "checked"; ?>> Noticia deportiva</label><br><br>
        <input type="submit" value="Mostrar titulares">
    </form>

    <hr>

    <?php
    echo "<h2>Titulares de hoy:</h2>";

    // Mostrar titulares según cookie o primera visita
    if ($titular == "politica" || $titular == "todos") {
        echo "<p><strong>Política:</strong> El Congreso debate una nueva ley de transparencia.</p>";
    }
    if ($titular == "economica" || $titular == "todos") {
        echo "<p><strong>Economía:</strong> El dólar registra una leve baja en los mercados internacionales.</p>";
    }
    if ($titular == "deportiva" || $titular == "todos") {
        echo "<p><strong>Deportes:</strong> La selección nacional gana 3-0 en un amistoso.</p>";
    }
    ?>

    <hr>
    <p><a href="borrar_cookie.php">Borrar preferencia de titulares</a></p>
</body>
</html>
