<?php

require_once 'databaseConnect.php';

$id = $_POST['id'];

header('Content-Type: application/json');

try {
    $stmt = $pdo->prepare("SELECT nombre, precio, categoria, descripcion, stock, imagen FROM producto WHERE IdProducto  = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    foreach ($result as &$product) {
        if ($product['imagen']) {
            $product['imagen'] = 'data:image/jpeg;base64,' . base64_encode($product['imagen']);
        }
    }

    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode([]); 
    }
    } catch (Exception $e) {

    echo json_encode(['error' => $e->getMessage()]);
}