<?php
// Iniciar sesión
session_start();

// Si el usuario elige un estilo, se guarda en una cookie y en la sesión
if (isset($_POST['estilo'])) {
    $estilo = $_POST['estilo'];
    $_SESSION['estilo'] = $estilo;
    setcookie('estilo', $estilo, time() + 3600 * 24 * 30); // dura 30 días
}

// Si hay cookie y no hay sesión, recuperar la preferencia
if (!isset($_SESSION['estilo']) && isset($_COOKIE['estilo'])) {
    $_SESSION['estilo'] = $_COOKIE['estilo'];
}

// Definir estilo por defecto
$estilo = isset($_SESSION['estilo']) ? $_SESSION['estilo'] : 'estilo1';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 - Estilos Configurables</title>
    <link rel="stylesheet" href="<?php echo $estilo; ?>.css">
</head>
<body>
    <h1>Ejercicio 1: Configurar estilo de la página</h1>

    <form method="post" action="">
        <label>Elegí el estilo:</label><br>
        <input type="radio" name="estilo" value="estilo1" <?php if($estilo=='estilo1') echo 'checked'; ?>> Estilo 1<br>
        <input type="radio" name="estilo" value="estilo2" <?php if($estilo=='estilo2') echo 'checked'; ?>> Estilo 2<br>
        <input type="radio" name="estilo" value="estilo3" <?php if($estilo=='estilo3') echo 'checked'; ?>> Estilo 3<br><br>
        <input type="submit" value="Guardar preferencia">
    </form>

    <p>El estilo elegido se recordará en tus próximas visitas.</p>
</body>
</html>
