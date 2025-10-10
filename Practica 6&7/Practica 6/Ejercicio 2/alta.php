<?php
$link = mysqli_connect("localhost", "root", "", "Capitales");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ciudad = $_POST["ciudad"];
    $pais = $_POST["pais"];
    $habitantes = $_POST["habitantes"];
    $superficie = $_POST["superficie"];
    $tieneMetro = isset($_POST["tieneMetro"]) ? 1 : 0;

    $sql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro)
            VALUES ('$ciudad', '$pais', $habitantes, $superficie, $tieneMetro)";
    
    if (mysqli_query($link, $sql)) {
        echo "<p>Ciudad agregada correctamente.</p>";
    } else {
        echo "<p>Error: " . mysqli_error($link) . "</p>";
    }
}

mysqli_close($link);
?>

<form method="post" action="">
    <label>Ciudad:</label><br><input type="text" name="ciudad" required><br>
    <label>País:</label><br><input type="text" name="pais" required><br>
    <label>Habitantes:</label><br><input type="number" name="habitantes" required><br>
    <label>Superficie:</label><br><input type="number" step="0.01" name="superficie" required><br>
    <label>Tiene metro:</label><input type="checkbox" name="tieneMetro"><br><br>
    <input type="submit" value="Agregar">
</form>

<a href="index.php">Volver al menú</a>
