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
    // Preparar la consulta para obtener la imagen
    $stmt = $pdo->prepare("SELECT imagenPerfil FROM cliente WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    // Obtener la imagen
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $imageData = $row['imagenPerfil'];

        // Establecer el tipo de contenido adecuado
        header("Content-Type: image/jpeg"); // Cambia a image/png si es un PNG
        echo $imageData; // Enviar la imagen al navegador
    } else {
        echo "No se encontró la imagen.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>