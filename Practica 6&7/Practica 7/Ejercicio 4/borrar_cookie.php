<?php
// Eliminar la cookie expirándola
setcookie("titular", "", time() - 3600);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cookie borrada</title>
</head>
<body>
    <h1>Preferencia borrada</h1>
    <p>La cookie del tipo de titular fue eliminada correctamente.</p>
    <a href="periodico.php">Volver al periódico</a>
</body>
</html>
