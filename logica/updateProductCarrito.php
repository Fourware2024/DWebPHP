<?php

require_once 'databaseConnect.php';

session_start();

$data = file_get_contents("php://input");

$producto =  json_decode($data, true);
$id = $producto["id"];
$type = $producto["type"];
$cantidad = 1;

try {
    $stmt = $pdo->prepare("SELECT IdCarrito FROM carrito WHERE IdCliente = :idCliente");
    $stmt->bindParam(':idCliente', $_SESSION['userID']);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($result) > 0) {
        $idCarrito = $result[0]["IdCarrito"];
        if($type == 'sum'){
            $stmt = $pdo->prepare("UPDATE producto_carrito SET cantidad = cantidad + :cantidad WHERE IdProducto = :idProducto AND IdCarrito = :idCarrito");
            $stmt->bindParam(':idCarrito', $idCarrito);
            $stmt->bindParam(':idProducto', $id);
            $stmt->bindParam(':cantidad', $cantidad);
            $stmt->execute();
            echo json_encode(['message' => 'Product Sum']);
        }else if($type == 'minus'){
            $stmt = $pdo->prepare("UPDATE producto_carrito SET cantidad = cantidad - :cantidad WHERE IdProducto = :idProducto AND IdCarrito = :idCarrito");
            $stmt->bindParam(':idCarrito', $idCarrito);
            $stmt->bindParam(':idProducto', $id);
            $stmt->bindParam(':cantidad', $cantidad);
            $stmt->execute();
            echo json_encode(['message' => 'Product Minus']);
        }
        

    }
}catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}