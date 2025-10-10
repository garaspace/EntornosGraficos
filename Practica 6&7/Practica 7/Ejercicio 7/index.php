<?php
session_start();

// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = ""; // tu contraseña
$dbname = "Compras";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener productos
$result = $conn->query("SELECT * FROM catalogo");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Catálogo</title>
</head>
<body>
    <h2>Catálogo de Productos</h2>

    <table border="1">
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['producto']); ?></td>
            <td><?php echo "$" . number_format($row['precio'], 2); ?></td>
            <td>
                <form action="agregar_carrito.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="submit" value="Agregar al carrito">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <a href="ver_carrito.php">Ver Carrito</a>
</body>
</html>

<?php
$conn->close();
?>
