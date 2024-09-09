<?php
require_once 'databaseConnect.php';

if (isset($_POST) && isset($_POST['username'])) {
    $sender = "aaa";
    $username = $_POST['username'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM cliente WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if (count($result) > 0) {
            $sender = "true";
        } else {
            $stmt = $pdo->prepare("SELECT * FROM vendedor WHERE nombre = :username");
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $result = $stmt->fetchAll();

            if (count($result) > 0) {
                $sender = "true";
            } else {
                $sender = "false";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    echo $sender;
}