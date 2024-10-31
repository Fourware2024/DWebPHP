<?php
    require_once 'databaseConnect.php';
    if (isset($_POST)){
        $data = file_get_contents("php://input");

        $user =  json_decode($data, true);
        $name = trim($user["name"]);
        $email = trim($user["email"]);
        $tel = trim($user["tel"]);
        $password = trim($user["password"]);
        $imagen = file_get_contents('../interfaz/perfilDefault.png');

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        if (!is_string($name)) {
            exit();
        }

        $stmt = $pdo->prepare("INSERT INTO `vendedor` (`nombre`, `calificacion`, `resena`, `email`, `contacto`, `contrasena`, `imagenPerfil`) VALUES (?, ?, ?, ?, ?, ?, ?)");

        if ($stmt->execute([$name, 0, "", $email, $tel, $password_hash, $imagen])) {
            echo json_encode(['message' => 'Cuenta Creada']);
        }else {
            echo json_encode(['message' => 'Error al crear la cuenta']);
        }
    }