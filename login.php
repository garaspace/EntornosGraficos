<?php
session_start(); 


$conexion = new mysqli("localhost", "root", "", "mi_base"); 
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


$mensaje = "";
$username_guardado = "";


if (isset($_COOKIE["ultimo_usuario"])) {
    $username_guardado = $_COOKIE["ultimo_usuario"];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $sql = "SELECT id, username, password FROM usuarios WHERE username = '$username' AND password = '$password'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        
        $usuario = $resultado->fetch_assoc();

        
        $_SESSION["id_usuario"] = $usuario["id"];

        
        setcookie("ultimo_usuario", $username, time() + (7 * 24 * 60 * 60));

        
        header("Location: productos.php");
        exit();
    } else {
        $mensaje = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form method="POST" action="login.php">
        <label>Usuario:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username_guardado); ?>" required><br><br>

        <label>Contraseña:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Ingresar">
    </form>

    <p style="color:red;"><?php echo $mensaje; ?></p>
</body>
</html>
