$(document).ready(function() {

    var precioTotal;

    fetch('../../logica/carritoMostrar.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); 
    })
    .then(data => {
        const productsContainer = $('#productos'); 
        let subtotal = 0;
        let tax = 0;
        let total = 0;


        if (Array.isArray(data) && data.length > 0) {
            productsContainer.empty(); 
            
            data.forEach(product => {
                id = product.idproducto;
                if(product.cantidad>0){
                    let precio =  product.precio*product.cantidad;
                    subtotal = subtotal + precio;
                    nombre = product.nombre.charAt(0).toUpperCase() + product.nombre.slice(1).toLowerCase();
                    
                    const productCard = `
                    
                    <div class="producto">
                        <img class="imagen" src="${product.imagen}">
                        <label class="nombre">${nombre}</label>
                        <button class="sum">+</button>
                        <label class="cantidad" id="${id}">${product.cantidad}</label>
                        <button class="minus">-</button>
                        <label class="precio">$${precio}</label>
                    </div>`;
                    productsContainer.append(productCard);
                }else{
                    fetch('../../logica/deleteProductCarrito.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'id=' + encodeURIComponent(id)
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data);
                    })
                    .catch(error => console.error('Error:', error));
            }
            });
            tax = (subtotal*5)/100;
            total = subtotal + tax;
            precioTotal = total;
            $("#subtotal").html("$" +  subtotal);
            $("#tax").html("$" + tax);
            $("#total").html("$" + total);
        

        } else {
            productsContainer.append('<p>No hay productos disponibles.</p>');
        }
        
        $(document).on("click", ".sum", function() {
            const productDiv = $(this).closest('.producto');
            const productId = productDiv.find('.cantidad').attr('id');

            const producto = {
                id: productId,
                type: 'sum'
            };

            fetch('../../logica/updateProductCarrito.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                  },
                  body: JSON.stringify(producto)
            })
            .then(response => response.text())
            .then(data => {
                location.reload();
            })
            .catch(error => console.error('Error:', error));

        });

        $(document).on("click", ".minus", function() {
            const productDiv = $(this).closest('.producto');
            const productId = productDiv.find('.cantidad').attr('id');

            const producto = {
                id: productId,
                type: 'minus'
            };

            fetch('../../logica/updateProductCarrito.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                  },
                  body: JSON.stringify(producto)
            })
            .then(response => response.text())
            .then(data => {
                location.reload();
            })
            .catch(error => console.error('Error:', error));

        });


    })
    .catch(error => console.error('Error:', error));

    $(document).on("click", "#comprar", function() {
        fetch('paypal_payment.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                amount: precioTotal, 
                currency: 'USD', 
                description: 'Compra de GoldCart'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.approvalUrl) {

                window.location.href = data.approvalUrl;
            } else {
                console.error('Error al generar el pago:', data.error);
            }
        })
        .catch(error => console.error('Error en la solicitud:', error));
    });

});