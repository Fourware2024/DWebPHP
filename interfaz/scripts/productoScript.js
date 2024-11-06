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