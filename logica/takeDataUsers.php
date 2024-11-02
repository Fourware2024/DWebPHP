<?php

require_once 'databaseConnect.php';
session_start();

try {
    if($_SESSION['type'] == 'cliente'){
    $stmt = $pdo->prepare("SELECT username, nombre, apellido, tel, email FROM cliente");
    $stmt->execute();
    $result = $stmt->fetchAll();
    print_r($result);
    if (count($result[0]) > 2) {
        $_SESSION['contacto'] = $result[0][3];
        $_SESSION['email'] = $result[0][4];
    } else {
        echo "No hay suficientes resultados.";
    }
}else if($_SESSION['type'] == 'empresa'){
    $stmt = $pdo->prepare("SELECT nombre, contacto, calificacion, email FROM vendedor");
    $stmt->execute();
    $result = $stmt->fetchAll();
    print_r($result);
    if (count($result[0]) > 2) {
        $_SESSION['contacto'] = $result[0][1];
        $_SESSION['calificacion'] = $result[0][2];
        $_SESSION['email'] = $result[0][3];
    } else {
        echo "No hay suficientes resultados.";
    }
    
}
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}