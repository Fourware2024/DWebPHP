<?php

require_once 'databaseConnect.php';

session_start();

if (isset($_POST)) {
    $data = file_get_contents("php://input");

    $user =  json_decode($data, true);

    $username = $user['username'];
    $password = $user['password'];

    $stmt = $pdo->prepare("SELECT contrasena FROM cliente WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetchAll();

    

    if (count($result) > 0) {
        $stored_password = $result[0]['contrasena'];
        if (password_verify($password, $stored_password)) { 
            $_SESSION['username'] = $username;
            $response = array('result' => true);
        } else {
            $response = array('result' => false);
        }
    }

    $stmt = $pdo->prepare("SELECT contrasena FROM vendedor WHERE nombre = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetchAll();

    

    if (count($result) > 0) {
        $stored_password = $result[0]['contrasena'];
        if (password_verify($password, $stored_password)) { 
            $_SESSION['username'] = $username;
            $response = array('result' => true);
        } else {
            $response = array('result' => false);
        }
    }else{
        $response = array('result' => false);
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}