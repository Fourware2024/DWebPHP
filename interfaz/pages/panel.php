<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php

session_start();

if (isset($_POST['logout'])) {

    session_destroy();
 
    header("Location: index.html"); 
    exit();
}

?>

<body>
    <h1><?php 

        echo $_SESSION['username'];

    ?></h1>


    <form method="POST">
        <button type="submit" name="logout">Log Out</button>
    </form>

</body>
</html>