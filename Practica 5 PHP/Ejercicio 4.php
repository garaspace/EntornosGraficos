<?php
session_start(); // Iniciar o continuar la sesión

// Si no existe la variable de sesión, se crea e inicializa en 0
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 1;
} else {
    // Si ya existe, se incrementa en 1
    $_SESSION['contador']++;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador de páginas visitadas</title>
</head>
<body>
    <h1>Contador de páginas visitadas</h1>
    <p>Has visitado esta página <strong><?php echo $_SESSION['contador']; ?></strong> veces durante esta sesión.</p>

    <p><a href="contador.php">Recargar página</a> (para aumentar el contador)</p>

    <form method="post" action="">
        <input type="submit" name="reset" value="Reiniciar contador">
    </form>

    <?php
    // Si el usuario presiona el botón "Reiniciar contador"
    if (isset($_POST['reset'])) {
        $_SESSION['contador'] = 0;
        echo "<p>El contador ha sido reiniciado.</p>";
    }
    ?>
</body>
</html>