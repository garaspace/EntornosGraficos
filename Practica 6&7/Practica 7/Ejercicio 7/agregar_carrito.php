<?php
session_start();

$id = $_POST['id'] ?? '';

if ($id != '') {
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
    $_SESSION['carrito'][] = $id;
}

header("Location: index.php");
exit;
?>
