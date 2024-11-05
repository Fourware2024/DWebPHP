$(document).ready(function() {

    const url = new URL(window.location.href);
    const id =  url.searchParams.get('id');


    fetch('../../logica/producto.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id=${encodeURIComponent(id)}`
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); 
    })
    .then(data => {
        const productsContainer = $('#producto'); 

        if (Array.isArray(data) && data.length > 0) {
            productsContainer.empty(); 

            data.forEach(product => {
                const producto = `

                    <div class="top">
                        <img src="${product.imagen}">
                        <div class="datos">
                            <div class="datos-top">
                                <label id="Nombre">${product.nombre}</label><br>
                                <label id="Categoria">${product.categoria}</label><br>
                            </div>
                            <div class="datos-bottom" id="datos-bottom">
                                <div class="rating">
                                    <input type="radio" id="star-1" name="star-radio" value="star-1">
                                    <label for="star-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
                                    </label>
                                    <input type="radio" id="star-2" name="star-radio" value="star-1">
                                    <label for="star-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
                                    </label>
                                    <input type="radio" id="star-3" name="star-radio" value="star-1">
                                    <label for="star-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
                                    </label>
                                    <input type="radio" id="star-4" name="star-radio" value="star-1">
                                    <label for="star-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
                                    </label>
                                    <input type="radio" id="star-5" name="star-radio" value="star-1">
                                    <label for="star-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
                                    </label>
                                </div>
                                <label id="Precio">$${product.precio}</label><br>
                                <input id="Cantidad" type="number" min="0" oninput="this.value = Math.max(this.value, 0);""><br>
                                <button id="Agregar">Agregar</button>
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <label>${product.descripcion}</label>
                    </div>

                `;
                productsContainer.append(producto);
            });
        } else {
            productsContainer.append('<p>No hay productos disponibles.</p>');
        }
        
        
    })
    .catch(error => console.error('Error:', error));



    function añadirCarrito(id, cantidad) {
        const producto = {
            id: id,
            cantidad: cantidad
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

        })
        .catch(error => console.error('Error:', error));
    }

    $(document).on("click", "#Agregar", function() {
        let cantidad = $("#Cantidad").val();
        if(cantidad > 0) {
            añadirCarrito(id, cantidad);
        }else{
            alert("Cantidad Invalida!!!")
        }
    });
});