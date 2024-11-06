$(document).ready(function() {


const imgs = [
    '../carruselTop/img1.png',
    '../carruselTop/img2.png'
];
let imgPos = 0;

$("#arrow-banner-left").click(previousImg);
$("#arrow-banner-right").click(nextImg);

function nextImg() {
    if(imgPos >= imgs.length-1) {
        imgPos = 0;
    }else{
        imgPos++;
    }
    $("#carrusel-inner").css('background-image','url(' + imgs[imgPos] + ')');
}

function previousImg() {
    if(imgPos < imgs.length-1) {
        imgPos = imgs.length-1;
    }else{
        imgPos--;
    }
    $("#carrusel-inner").css('background-image','url(' + imgs[imgPos] + ')');
}

  var sellers = new Splide( '.sellers', {
    perPage: 5,
    rewind : true,
    speed: 1000,
    padding: '1%',
    gap: '100px',
    arrow: {prev: '.splide__arrow--prev', next: '.splide__arrow--next'},
  } );

  







fetch('../../logica/showLastProducts.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); 
    })
    .then(data => {
        const productsContainer = $('#ultProductos'); 
        console.log(data);

        if (Array.isArray(data) && data.length > 0) {
            productsContainer.empty(); 

            data.forEach(product => {
                const productCard = `
                    <li class="splide__slide">
                        <figure class="card">
                            <a href="producto.html?id=${product.idProducto}">
                                <img src="${product.imagen}">
                            </a>
                            <p class="desc">${product.categoria}</p>
                            <h2 class="title">${product.nombre}</h2>
                            <div class="box">
                                <div class="price">$${product.precio}</div>
                                <button class="btn" name="${product.idProducto}">Comprar</button>
                            </div>
                        </figure>                              
                    </li>
                    
                `;
                productsContainer.append(productCard);
                
            });
            sellers.mount();
        } else {
            productsContainer.append('<p>No hay productos disponibles.</p>');
        }
        })

        .catch(error => console.error('Error:', error));

        function añadirCarrito(id) {
            const producto = {
                id: id,
                cantidad: 1
            };
            fetch('../../logica/agregarCarrito.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(producto)
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
            })
            .catch(error => console.error('Error:', error));
        }

        $("#ultProductos").on("click", ".btn", function() {
            let id = $(this).attr('name');
            console.log(id);
            añadirCarrito(id);
        });



});