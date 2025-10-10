<?php
$link = mysqli_connect("localhost", "root", "", "Capitales");

$resultado = mysqli_query($link, "SELECT * FROM ciudades");
?>

<h1>Listado de Ciudades</h1>
<table border="1" cellpadding="5">
<tr>
    <th>ID</th><th>Ciudad</th><th>País</th>
    <th>Habitantes</th><th>Superficie</th><th>Tiene Metro</th>
</tr>

<?php
while ($fila = mysqli_fetch_array($resultado)) {
    echo "<tr>";
    echo "<td>{$fila['id']}</td>";
    echo "<td>{$fila['ciudad']}</td>";
    echo "<td>{$fila['pais']}</td>";
    echo "<td>{$fila['habitantes']}</td>";
    echo "<td>{$fila['superficie']}</td>";
    echo "<td>" . ($fila['tieneMetro'] ? 'Sí' : 'No') . "</td>";
    echo "</tr>";
}
?>

</table>
<a href="index.php">Volver al menú</a>

<?php
mysqli_free_result($resultado);
mysqli_close($link);
?>
