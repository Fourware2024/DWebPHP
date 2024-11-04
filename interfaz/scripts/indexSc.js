$(document).ready(function() {


$(".menu-btn").click(function() {
    $(".navbar .menu").toggleClass("active");
    $(".menu-btn i").toggleClass("active");
});

$(".enter").click(function(){
    alert("Buscar...")
})


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

var offers = new Splide( '.offers', {
    perPage: 5,
    rewind : true,
    speed: 1000,
    padding: '1%',
    gap: '100px',
    arrow: {prev: '.splide__arrow--prev', next: '.splide__arrow--next'},
  } );

  var sellers = new Splide( '.sellers', {
    perPage: 5,
    rewind : true,
    speed: 1000,
    padding: '1%',
    gap: '100px',
    arrow: {prev: '.splide__arrow--prev', next: '.splide__arrow--next'},
  } );

  offers.mount();
  

$("#account").click(accountClick);

function accountClick() {
    fetch('../../logica/accountCheck.php')
    .then(response => response.text())
    .then(data => {
        console.log(data);
        if(data == true) {
            location.href="../pages/panel.php";
        }else if(data == false){
            location.href="../pages/login.html";
        }


    })
    .catch(error => console.error('Error:', error));
}


$(".btn").click(function() {
    let id = $(this).attr('name');
    console.log(id);
});


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
                                <button class="btn">Comprar</button>
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
});