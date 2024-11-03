<?php
require_once 'databaseConnect.php';
session_start();

$id = $_POST['id'];
$found = false;

$stmt = $pdo->prepare("SELECT idOwner FROM producto WHERE IdProducto = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $producto) {
    if ($producto['idOwner'] == $_SESSION['userID']) {
        $found = true; 
        break; 
        
    }
}

if($found || $_SESSION['type'] == 'admin') {
    $stmt = $pdo->prepare("DELETE FROM producto WHERE idProducto = :id");
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            echo json_encode(["message" => "Producto eliminado con exito."]);
        } else {
            echo json_encode(["message" => "No se encontró el producto con la ID proporcionada."]);
        }
    } else {
        echo json_encode(["message" => "Error al eliminar el producto."]);
    }
}else{
    echo json_encode(["message" => "No tienes permisos para eliminar este producto o no existe."]);
}



