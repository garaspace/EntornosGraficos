<?php
session_start();

$host = "localhost";
$user = "root";
$password = ""; // tu contraseña
$dbname = "Compras";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
</head>
<body>
    <h2>Carrito de Compras</h2>

    <?php
    if (!empty($_SESSION['carrito'])) {
        $ids = implode(",", $_SESSION['carrito']);
        $result = $conn->query("SELECT * FROM catalogo WHERE id IN ($ids)");

        $total = 0;
        echo "<table border='1'>
                <tr><th>Producto</th><th>Precio</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['producto']) . "</td>
                    <td>$" . number_format($row['precio'], 2) . "</td>
                  </tr>";
            $total += $row['precio'];
        }

        echo "<tr><td><strong>Total</strong></td><td><strong>$" . number_format($total, 2) . "</strong></td></tr>";
        echo "</table>";
    } else {
        echo "<p>El carrito está vacío.</p>";
    }
    ?>

    <br>
    <a href="index.php">Volver al catálogo</a>
</body>
</html>

<?php
$conn->close();
?>
