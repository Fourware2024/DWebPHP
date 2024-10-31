<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/stylePanel.css">
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
<nav class="navbar">
        <div class="logo">
            <h1>Goldcart</h1>
        </div>
        <div class="searchbar">
            <input type="text" class="bar" placeholder="Search...">
            <button class="enter"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19C12.8487 19 14.551 18.3729 15.9056 17.3199L19.2929 20.7071C19.6834 21.0976 20.3166 21.0976 20.7071 20.7071C21.0976 20.3166 21.0976 19.6834 20.7071 19.2929L17.3199 15.9056C18.3729 14.551 19 12.8487 19 11C19 6.58172 15.4183 3 11 3ZM5 11C5 7.68629 7.68629 5 11 5C14.3137 5 17 7.68629 17 11C17 14.3137 14.3137 17 11 17C7.68629 17 5 14.3137 5 11Z" fill="#152C70"/>
                </svg></button>
        </div>
        <ul class="menu">
            <li>
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16C10.8954 16 10 16.8954 10 18V19H14V18C14 16.8954 13.1046 16 12 16ZM8 18C8 15.7909 9.79086 14 12 14C14.2091 14 16 15.7909 16 18V20C16 20.5523 15.5523 21 15 21H9C8.44772 21 8 20.5523 8 20V18Z" fill="#4296FF"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.89648 4.18152C10.715 2.74182 13.285 2.74182 15.1035 4.18152L19.1035 7.34818C20.3014 8.29654 21 9.74055 21 11.2684V16C21 18.7614 18.7614 21 16 21H8C5.23858 21 3 18.7614 3 16V11.2684C3 9.74055 3.69857 8.29654 4.89648 7.34818L8.89648 4.18152ZM13.8621 5.74961C12.771 4.88579 11.229 4.88579 10.1379 5.74961L6.13789 8.91628C5.41914 9.48529 5 10.3517 5 11.2684V16C5 17.6569 6.34315 19 8 19H16C17.6569 19 19 17.6569 19 16V11.2684C19 10.3517 18.5809 9.48529 17.8621 8.91628L13.8621 5.74961Z" fill="#152C70"/>
                    </svg></i></a>
            </li>
            <li>
                <a class="account" id="account"><svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0002 8C11.1718 8 10.5002 8.67157 10.5002 9.5C10.5002 10.3284 11.1718 11 12.0002 11C12.8286 11 13.5002 10.3284 13.5002 9.5C13.5002 8.67157 12.8286 8 12.0002 8ZM8.50018 9.5C8.50018 7.567 10.0672 6 12.0002 6C13.9332 6 15.5002 7.567 15.5002 9.5C15.5002 11.433 13.9332 13 12.0002 13C10.0672 13 8.50018 11.433 8.50018 9.5Z" fill="#4296FF"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6 18C6.00478 18.1073 6.00044 18.0205 6.00044 18.0205L6.00048 18.0222L6.00056 18.0259L6.0008 18.0341L6.00157 18.054C6.00225 18.0688 6.00326 18.0866 6.00478 18.1073C6.00783 18.1486 6.01294 18.2014 6.02151 18.2642C6.03862 18.3895 6.06978 18.5561 6.12678 18.7504C6.2409 19.1392 6.4606 19.6447 6.88176 20.1444C7.75153 21.1765 9.31667 22 12.0001 22C14.4911 22 16.0226 21.2914 16.9304 20.3527C17.8205 19.4323 17.9691 18.436 17.9945 18.123C18.014 17.8823 17.955 17.6735 17.8751 17.5137C17.1048 15.9732 15.5302 15 13.8078 15H10.2363C8.48712 15 6.88806 15.9883 6.1058 17.5528L6 18ZM8.04522 18.185L8.04584 18.1871C8.09681 18.3608 8.20021 18.6053 8.4111 18.8556C8.80544 19.3235 9.74023 20 12.0001 20C14.1057 20 15.0583 19.4116 15.4927 18.9623C15.7742 18.6713 15.9006 18.3745 15.9569 18.1796C15.4928 17.45 14.6845 17 13.8078 17H10.2363C9.34631 17 8.52487 17.4513 8.04522 18.185Z" fill="#4296FF"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z" fill="#152C70"/>
                    </svg></a>
            </li>
            <li>
                <a href="carrito.html"><svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 3C3.44772 3 3 3.44772 3 4C3 4.55228 3.44772 5 4 5H5C5.50065 5 5.91537 5.36792 5.98854 5.84813L6.26745 10.3118C6.43211 12.947 8.61737 15 11.2577 15H16C18.7614 15 21 12.7614 21 10C21 7.23858 18.7614 5 16 5H7.82929C7.41746 3.83481 6.30622 3 5 3H4ZM8.26356 10.1871L8.06442 7H16C17.6568 7 19 8.34315 19 10C19 11.6569 17.6568 13 16 13H11.2577C9.67351 13 8.36235 11.7682 8.26356 10.1871Z" fill="#152C70"/>
                    <path d="M12 19C12 20.1046 11.1046 21 10 21C8.89543 21 8 20.1046 8 19C8 17.8954 8.89543 17 10 17C11.1046 17 12 17.8954 12 19Z" fill="#4296FF"/>
                    <path d="M16 21C17.1046 21 18 20.1046 18 19C18 17.8954 17.1046 17 16 17C14.8954 17 14 17.8954 14 19C14 20.1046 14.8954 21 16 21Z" fill="#4296FF"/>
                    </svg></a>
            </li>
        </ul>

        <div class="menu-btn">
            <i class="fa fa-bars"></i>
        </div>
    </nav>
    <h1><?php 

        echo $_SESSION['username'];

    ?></h1>


    <form method="POST">
        <button type="submit" name="logout">Log Out</button>
    </form>
    <div class="divImg">
        <input id="cargaImagen" type="file" accept="image/*">
        <img src="../../logica/showImageProfile.php" alt="Imagen de Perfil" id="imgPerfil"/>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../scripts/panelScripts.js"></script>
</body>
</html>