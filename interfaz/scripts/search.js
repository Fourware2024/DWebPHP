$(document).ready(function() {

    
    const url = new URL(window.location.href);
    const busqueda =  url.searchParams.get('busqueda');

    fetch('../../logica/search.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `busqueda=${encodeURIComponent(busqueda)}`
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); 
    })
    .then(data => {
        const productsContainer = $('#products'); 
        console.log(data);

        if (Array.isArray(data) && data.length > 0) {
            productsContainer.empty(); 

            data.forEach(product => {
                const producto = `

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

                `;
                productsContainer.append(producto);
            });
        } else {
            productsContainer.append('<p>No hay productos disponibles.</p>');
        }
        
        
    })
    .catch(error => console.error('Error:', error));




});



 