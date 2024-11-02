<?php
session_start();
require_once 'databaseConnect.php';

// Verificar que el usuario esté autenticado
if (!isset($_SESSION['username'])) {
    die("Acceso no autorizado.");
}

// Obtener el nombre de usuario de la sesión
$username = $_SESSION['username'];

try {
    if($_SESSION['type'] == 'cliente'){
        $stmt = $pdo->prepare("SELECT imagenPerfil FROM cliente WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();

    
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $imageData = $row['imagenPerfil'];

        
            header("Content-Type: image/jpeg");
            echo $imageData;
        } else {
            echo "No se encontró la imagen.";
        }
    }else if($_SESSION['type'] == 'empresa'){
        $stmt = $pdo->prepare("SELECT imagenPerfil FROM vendedor WHERE nombre = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();

    
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $imageData = $row['imagenPerfil'];

        
            header("Content-Type: image/jpeg");
            echo $imageData;
        } else {
            echo "No se encontró la imagen.";
        }

    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>