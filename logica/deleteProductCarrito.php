<?php

require_once 'databaseConnect.php';
session_start();

$id = $_POST['id'];

try {
    $stmt = $pdo->prepare("SELECT IdCarrito FROM carrito WHERE IdCliente = :idCliente");
    $stmt->bindParam(':idCliente', $_SESSION['userID']);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($result) > 0) {
        $idCarrito = $result[0]["IdCarrito"];
        $stmt = $pdo->prepare("DELETE FROM producto_carrito WHERE IdCarrito = :idCarrito AND IdProducto = :idProducto");
        $stmt->bindParam(':idCarrito', $idCarrito);
        $stmt->bindParam(':idProducto', $id);
        $stmt->execute();
    }

}catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}