<?php
session_start();

// Datos de conexión MySQL
$host = "localhost";
$user = "root";
$password = ""; // tu contraseña
$dbname = "base2";

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$mail = $_POST['mail'] ?? '';

if ($mail != '') {
    $stmt = $conn->prepare("SELECT nombre FROM alumnos WHERE mail = ?");
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    $stmt->bind_result($nombre);
    $stmt->fetch();

    if ($nombre) {
        $_SESSION['nombre'] = $nombre;
        header("Location: bienvenida.php");
    } else {
        echo "<p>El mail no existe en la base de datos.</p>";
        echo "<a href='buscar_mail.php'>Volver</a>";
    }

    $stmt->close();
} else {
    echo "<p>Debe ingresar un mail.</p>";
    echo "<a href='buscar_mail.php'>Volver</a>";
}

$conn->close();
?>
