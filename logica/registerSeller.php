<?php
    require_once 'databaseConnect.php';
    if (isset($_POST)){
        $data = file_get_contents("php://input");

        $user =  json_decode($data, true);

        $name = trim($user["name"]);
        $surname = trim($user["surname"]);
        $username = trim($user["username"]);
        $email = trim($user["email"]);
        $tel = trim($user["tel"]);
        $password = trim($user["password"]);

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        echo $password_hash;

        if (!is_string($name) && !is_string($surname)) {
            exit();
        }

        $stmt = $pdo->prepare("INSERT INTO `cliente` (`nombre`, `apellido`, `tel`, `email`, `contraseña`) VALUES (?, ?, ?, ?, ?)");

        if ($stmt->execute([$name, $surname, $tel, $email, $password_hash])) {
            echo json_encode(['message' => 'Cuenta Creada']);
        }else {
            echo json_encode(['message' => 'Error al crear la cuenta']);
        }
    }