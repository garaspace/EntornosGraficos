<?php
$link = mysqli_connect("localhost", "root", "", "Capitales");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $ciudad = $_POST["ciudad"];
    $pais = $_POST["pais"];
    $habitantes = $_POST["habitantes"];
    $superficie = $_POST["superficie"];
    $tieneMetro = isset($_POST["tieneMetro"]) ? 1 : 0;

    $sql = "UPDATE ciudades SET ciudad='$ciudad', pais='$pais', habitantes=$habitantes,
            superficie=$superficie, tieneMetro=$tieneMetro WHERE id=$id";
    
    if (mysqli_query($link, $sql)) {
        echo "<p>Ciudad modificada correctamente.</p>";
    } else {
        echo "<p>Error: " . mysqli_error($link) . "</p>";
    }
}

$resultado = mysqli_query($link, "SELECT * FROM ciudades");
?>

<h1>Modificar Ciudad</h1>
<form method="post" action="">
    <label>ID de ciudad a modificar:</label><br>
    <select name="id" required>
        <?php while ($fila = mysqli_fetch_array($resultado)) {
            echo "<option value='{$fila['id']}'>{$fila['ciudad']} ({$fila['pais']})</option>";
        } ?>
    </select><br><br>

    <label>Nueva Ciudad:</label><br><input type="text" name="ciudad" required><br>
    <label>Nuevo País:</label><br><input type="text" name="pais" required><br>
    <label>Nuevos Habitantes:</label><br><input type="number" name="habitantes" required><br>
    <label>Nueva Superficie:</label><br><input type="number" step="0.01" name="superficie" required><br>
    <label>Tiene Metro:</label><input type="checkbox" name="tieneMetro"><br><br>

    <input type="submit" value="Modificar">
</form>

<a href="index.php">Volver al menú</a>

<?php
mysqli_free_result($resultado);
mysqli_close($link);
?>
