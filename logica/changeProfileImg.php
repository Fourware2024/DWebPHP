<?php
session_start();
require_once 'databaseConnect.php';

if(isset($_POST)) {
    $file = $_FILES['file']['tmp_name'];
    $blob = file_get_contents($file);
    try {

        if($_SESSION['type'] == 'cliente') {
            $stmt = $pdo->prepare("UPDATE cliente SET imagenPerfil = :img WHERE username = :username");
            $stmt->bindParam(":img", $blob);
            $stmt->bindParam(":username", $_SESSION['username']);
            if ($stmt->execute()) {
                echo "Archivo subido y guardado exitosamente.";
            } else {
                echo "Error al guardar el archivo: " . $stmt->error;
            }
        }else if($_SESSION['type'] == 'empresa'){
            $stmt = $pdo->prepare("UPDATE vendedor SET imagenPerfil = :img WHERE nombre = :username");
            $stmt->bindParam(":img", $blob);
            $stmt->bindParam(":username", $_SESSION['username']);
            if ($stmt->execute()) {
                echo "Archivo subido y guardado exitosamente.";
            } else {
                echo "Error al guardar el archivo: " . $stmt->error;
            }
        }

        
    } catch (PDOException $e) {
        echo "No se ha subido ningún archivo o ha ocurrido un error.";
    } 
}