<?php
require_once 'databaseConnect.php';
session_start();

if(isset($_POST)){

    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id = $_SESSION['userID'];
    $file = $_FILES['file']['tmp_name'];
    $blob = file_get_contents($file);

    $stmt = $pdo->prepare("INSERT INTO `producto` ( `idOwner`, `nombre`, `precio`, `categoria`, `descripcion`, `stock`, `imagen`) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if ($stmt->execute([$id, $nombre, $precio, $categoria, $descripcion, $stock, $blob])) {
        echo json_encode(['message' => 'Producto creado']);
    }else {
        echo json_encode(['message' => 'Error al crear el producto']);
    }
}