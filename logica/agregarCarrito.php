<?php

require_once 'databaseConnect.php';
session_start();

if (isset($_POST)){
    $data = file_get_contents("php://input");

    $producto =  json_decode($data, true);

    $id = $producto["id"];
    $cantidad = $producto["cantidad"];

    try {
        $stmt = $pdo->prepare("SELECT IdCarrito FROM carrito WHERE IdCliente = :idCliente");
        $stmt->bindParam(':idCliente', $_SESSION['userID']);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($result) > 0) {
            $idCarrito = $result[0]["IdCarrito"];
            $stmt = $pdo->prepare("SELECT cantidad FROM producto_carrito WHERE IdProducto = :idProducto AND IdCarrito = :idCarrito");
            $stmt->bindParam(':idCarrito', $idCarrito);
            $stmt->bindParam(':idProducto', $id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($result) > 0) {
                $stmt = $pdo->prepare("UPDATE producto_carrito SET cantidad = cantidad + :cantidad WHERE IdProducto = :idProducto AND IdCarrito = :idCarrito");
                $stmt->bindParam(':idCarrito', $idCarrito);
                $stmt->bindParam(':idProducto', $id);
                $stmt->bindParam(':cantidad', $cantidad);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(['message' => 'Producto Agregado']);
            }else{
                $stmt = $pdo->prepare("INSERT INTO producto_carrito (IdProducto, IdCarrito, cantidad) VALUES (?, ?, ?)");
                    if ($stmt->execute([$id, $idCarrito,  $cantidad])) {
                        echo json_encode(['message' => 'Producto Agregado']);

                    }else{
                        echo json_encode(['message' => 'Error al agregar producto']);
                    }
            }
        }else {
            try {
            $stmt = $pdo->prepare("INSERT INTO carrito (IdCliente, estado) VALUES (?, ?)");
            if ($stmt->execute([$_SESSION['userID'], "Inactivo"])) {
                $stmt = $pdo->prepare("SELECT IdCarrito FROM carrito WHERE IdCliente = :idCliente");
                $stmt->bindParam(':idCliente', $_SESSION['userID']);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $idCarrito = $result[0]["IdCarrito"];
                if(count($result) > 0) {
                    
                    $stmt = $pdo->prepare("INSERT INTO producto_carrito (IdProducto, IdCarrito, cantidad) VALUES (?, ?, ?)");
                    if ($stmt->execute([$id, $idCarrito,  $cantidad])) {
                        echo json_encode(['message' => 'Producto Agregado']);

                    }else{
                        echo json_encode(['message' => 'Error al agregar producto']);
                    }

        
            }else {
                echo json_encode(['message' => 'Error al crear el carrito']);
            }
        }
        } catch (PDOException $e) {
            echo json_encode(['message' => 'UserError']);
        }
    }
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

}