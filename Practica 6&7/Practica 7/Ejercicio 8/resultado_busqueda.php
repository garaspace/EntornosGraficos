<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = ""; // tu contraseña
$dbname = "prueba";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$buscar = $_GET['buscar'] ?? '';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultados de Búsqueda</title>
</head>
<body>
    <h2>Resultados de búsqueda para: "<?php echo htmlspecialchars($buscar); ?>"</h2>

    <?php
    if ($buscar != '') {
        $stmt = $conn->prepare("SELECT canciones FROM buscador WHERE canciones LIKE ?");
        $likeBuscar = "%" . $buscar . "%";
        $stmt->bind_param("s", $likeBuscar);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($row['canciones']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No se encontraron canciones.</p>";
        }

        $stmt->close();
    } else {
        echo "<p>No ingresaste ningún término de búsqueda.</p>";
    }

    $conn->close();
    ?>

    <br>
    <a href="buscar_canciones.php">Volver al buscador</a>
</body>
</html>
