<?php

require_once 'databaseConnect.php';

session_start();

$id = $_SESSION['userID'];

header('Content-Type: application/json');

try {
    $stmt = $pdo->prepare("SELECT IdCarrito FROM carrito WHERE IdCliente = :idCliente");
    $stmt->bindParam(':idCliente', $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($result) > 0) {
        $stmt = $pdo->prepare("SELECT pc.idproducto, p.nombre, p.precio, pc.cantidad, p.imagen FROM producto_carrito pc JOIN producto p ON pc.idproducto = p.idproducto WHERE pc.idcarrito = :idcarrito;");
        $stmt->bindParam(':idcarrito', $result[0]['IdCarrito']);
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
    }

} catch (Exception $e) {

    echo json_encode(['error' => $e->getMessage()]);
}