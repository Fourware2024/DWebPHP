<?php

require_once 'databaseConnect.php';
header('Content-Type: application/json');
try {
    $stmt = $pdo->prepare("SELECT idProducto, nombre, precio, categoria, imagen FROM producto ORDER BY fecha DESC LIMIT 10");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as &$product) {
        if ($product['imagen']) {
            $product['imagen'] = 'data:image/jpeg;base64,' . base64_encode($product['imagen']);
        }
    }

    echo json_encode($result);
} catch (Exception $e) {

    echo json_encode(['error' => $e->getMessage()]);
}