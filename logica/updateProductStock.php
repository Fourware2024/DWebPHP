<?php

require_once 'databaseConnect.php';

session_start();

$data = file_get_contents("php://input");

$producto =  json_decode($data, true);
$id = $producto["id"];
$type = $producto["type"];
$stock = 1;

try {
    $stmt = $pdo->prepare("SELECT IdOwner FROM producto WHERE idOwner = :idOwner AND IdProducto = :IdProducto");
    $stmt->bindParam(':IdProducto', $id);
    $stmt->bindParam(':idOwner', $_SESSION['userID']);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($result) > 0) {
        if($type == 'plus'){
            $stmt = $pdo->prepare("UPDATE producto SET stock = stock + :stock WHERE IdProducto = :idProducto");
            $stmt->bindParam(':idProducto', $id);
            $stmt->bindParam(':stock', $stock);
            $stmt->execute();
            echo json_encode(['message' => 'Success']);
        }else if($type == 'minus'){
            $stmt = $pdo->prepare("UPDATE producto SET stock = stock - :stock WHERE IdProducto = :idProducto");
            $stmt->bindParam(':idProducto', $id);
            $stmt->bindParam(':stock', $stock);
            $stmt->execute();
            echo json_encode(['message' => 'Success']);
        }
    }else{
        echo json_encode(['message' => 'Failure']);
    }
}catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}