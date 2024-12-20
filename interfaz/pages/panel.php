<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile || Goldcart</title>
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
    <a href="index.html" class="logo">
            <h1>Goldcart</h1>
        </a>
        <div class="searchbar">
            <input type="text" class="bar" placeholder="Search...">
            <button class="enter"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19C12.8487 19 14.551 18.3729 15.9056 17.3199L19.2929 20.7071C19.6834 21.0976 20.3166 21.0976 20.7071 20.7071C21.0976 20.3166 21.0976 19.6834 20.7071 19.2929L17.3199 15.9056C18.3729 14.551 19 12.8487 19 11C19 6.58172 15.4183 3 11 3ZM5 11C5 7.68629 7.68629 5 11 5C14.3137 5 17 7.68629 17 11C17 14.3137 14.3137 17 11 17C7.68629 17 5 14.3137 5 11Z" fill="#152C70"/>
                </svg></button>
        </div>
        <ul class="menu">
            <li>
                <a href="index.html"><svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" fill="none">
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
    

    <section>
        <div class="divImg">
            <input id="cargaImagen" type="file" accept="image/*">
            <img src="../../logica/showImageProfile.php" alt="Imagen de Perfil" id="imgPerfil"/>
        </div>
        <form method="POST">
            <button type="submit" name="logout" id="logout">Log Out</button>
        </form>
        <div class="fields">
            <?php
                if($_SESSION['type'] == 'empresa'){
                    echo '<a href="añadirProducto.html" class="Añadir">Añadir Producto</a>';
                    echo '<a href="MisProductos.html" class="MyProducts">Mis Productos</a>';
                    echo '<label>Empresa: </label>';
                    echo '<label>'.$_SESSION['username'].'</label>';
                    echo '<br>';
                    echo '<label>Correo: </label>';
                    echo '<label>'.$_SESSION['email'].'</label>';
                    echo '<br>';
                    echo '<label>Telefono: </label>';
                    echo '<label>'.$_SESSION['contacto'].'</label>';
                }else if($_SESSION['type'] == 'cliente'){
                    echo '<label >Username: </label> ';
                    echo '<label>'.$_SESSION['username'].'</label>';
                    echo '<br>';
                    echo '<label>Correo: </label>';
                    echo '<label>'.$_SESSION['email'].'</label>';
                    echo '<br>';
                    echo '<label>Telefono: </label>';
                    echo '<label>'.$_SESSION['contacto'].'</label>';
                    
                }
                

            ?>
        
        </div>
    </section>

    
    <footer>
        <p>Copyright © 2024 Goldcart. All rights reserved. Terms of use | Privacy Policy</p>

        <div class="redes">
            <a href="https://instagram.com" target="_blank">
                <svg viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z" fill="#0F0F0F"></path> <path d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228 17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19 5.44772 18.5523 5 18 5Z" fill="#0F0F0F"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M1.65396 4.27606C1 5.55953 1 7.23969 1 10.6V13.4C1 16.7603 1 18.4405 1.65396 19.7239C2.2292 20.8529 3.14708 21.7708 4.27606 22.346C5.55953 23 7.23969 23 10.6 23H13.4C16.7603 23 18.4405 23 19.7239 22.346C20.8529 21.7708 21.7708 20.8529 22.346 19.7239C23 18.4405 23 16.7603 23 13.4V10.6C23 7.23969 23 5.55953 22.346 4.27606C21.7708 3.14708 20.8529 2.2292 19.7239 1.65396C18.4405 1 16.7603 1 13.4 1H10.6C7.23969 1 5.55953 1 4.27606 1.65396C3.14708 2.2292 2.2292 3.14708 1.65396 4.27606ZM13.4 3H10.6C8.88684 3 7.72225 3.00156 6.82208 3.0751C5.94524 3.14674 5.49684 3.27659 5.18404 3.43597C4.43139 3.81947 3.81947 4.43139 3.43597 5.18404C3.27659 5.49684 3.14674 5.94524 3.0751 6.82208C3.00156 7.72225 3 8.88684 3 10.6V13.4C3 15.1132 3.00156 16.2777 3.0751 17.1779C3.14674 18.0548 3.27659 18.5032 3.43597 18.816C3.81947 19.5686 4.43139 20.1805 5.18404 20.564C5.49684 20.7234 5.94524 20.8533 6.82208 20.9249C7.72225 20.9984 8.88684 21 10.6 21H13.4C15.1132 21 16.2777 20.9984 17.1779 20.9249C18.0548 20.8533 18.5032 20.7234 18.816 20.564C19.5686 20.1805 20.1805 19.5686 20.564 18.816C20.7234 18.5032 20.8533 18.0548 20.9249 17.1779C20.9984 16.2777 21 15.1132 21 13.4V10.6C21 8.88684 20.9984 7.72225 20.9249 6.82208C20.8533 5.94524 20.7234 5.49684 20.564 5.18404C20.1805 4.43139 19.5686 3.81947 18.816 3.43597C18.5032 3.27659 18.0548 3.14674 17.1779 3.0751C16.2777 3.00156 15.1132 3 13.4 3Z" fill="#0F0F0F"></path>
                </svg>
            </a>

            <a href="https://facebook.com" target="_blank">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20 1C21.6569 1 23 2.34315 23 4V20C23 21.6569 21.6569 23 20 23H4C2.34315 23 1 21.6569 1 20V4C1 2.34315 2.34315 1 4 1H20ZM20 3C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H15V13.9999H17.0762C17.5066 13.9999 17.8887 13.7245 18.0249 13.3161L18.4679 11.9871C18.6298 11.5014 18.2683 10.9999 17.7564 10.9999H15V8.99992C15 8.49992 15.5 7.99992 16 7.99992H18C18.5523 7.99992 19 7.5522 19 6.99992V6.31393C19 5.99091 18.7937 5.7013 18.4813 5.61887C17.1705 5.27295 16 5.27295 16 5.27295C13.5 5.27295 12 6.99992 12 8.49992V10.9999H10C9.44772 10.9999 9 11.4476 9 11.9999V12.9999C9 13.5522 9.44771 13.9999 10 13.9999H12V21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3H20Z" fill="#0F0F0F"></path>
                </svg>
            </a>
        </div>

    </footer>
    


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../scripts/panelScripts.js"></script>
    <script src="../scripts/navBar.js"></script>
    <script src="../scripts/accountCheck.js"></script>
</body>
</html>