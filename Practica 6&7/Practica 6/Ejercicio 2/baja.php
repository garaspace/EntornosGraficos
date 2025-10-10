<?php
$link = mysqli_connect("localhost", "root", "", "Capitales");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $sql = "DELETE FROM ciudades WHERE id=$id";

    if (mysqli_query($link, $sql)) {
        echo "<p>Ciudad eliminada correctamente.</p>";
    } else {
        echo "<p>Error: " . mysqli_error($link) . "</p>";
    }
}

$resultado = mysqli_query($link, "SELECT * FROM ciudades");
?>

<h1>Eliminar Ciudad</h1>
<form method="post" action="">
    <label>Seleccioná una ciudad:</label><br>
    <select name="id" required>
        <?php while ($fila = mysqli_fetch_array($resultado)) {
            echo "<option value='{$fila['id']}'>{$fila['ciudad']} ({$fila['pais']})</option>";
        } ?>
    </select><br><br>
    <input type="submit" value="Eliminar">
</form>

<a href="index.php">Volver al menú</a>

<?php
mysqli_free_result($resultado);
mysqli_close($link);
?>
