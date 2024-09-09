<?php
    require_once 'databaseConnect.php';
    if (isset($_POST)){
        $data = file_get_contents("php://input");

        $user =  json_decode($data, true);

        $name = trim($user["name"]);
        $email = trim($user["email"]);
        $tel = trim($user["tel"]);
        $password = trim($user["password"]);

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        if (!is_string($name) && !is_string($surname)) {
            exit();
        }

        $stmt = $pdo->prepare("INSERT INTO `vendedor` (`nombre`, `calificacion`, `resena`, `contacto_email`, `contacto_tel`, `contrasena`) VALUES (?, ?, ?, ?, ?, ?)");

        if ($stmt->execute([$name, 0, "", $email, $tel, $password_hash])) {
            echo json_encode(['message' => 'Cuenta Creada']);
        }else {
            echo json_encode(['message' => 'Error al crear la cuenta']);
        }
    }