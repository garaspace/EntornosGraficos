<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit();
}


$conexion = new mysqli("localhost", "root", "", "mi_base");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


$sql = "SELECT id, nombre, precio FROM productos";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #555;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
        .cerrar-sesion {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        a:hover {
            color: green;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Listado de Productos</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio ($)</th>
        </tr>
        <?php
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila["id"] . "</td>";
                echo "<td>" . $fila["nombre"] . "</td>";
                echo "<td>" . $fila["precio"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay productos disponibles.</td></tr>";
        }
        ?>
    </table>

    <div class="cerrar-sesion">
        <a href="logout.php">Cerrar sesión</a>
    </div>
</body>
</html>
