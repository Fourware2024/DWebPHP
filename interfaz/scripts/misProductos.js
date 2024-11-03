$(document).ready(function() {
    fetch('../../logica/myProductsData.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); 
    })
    .then(data => {
        const productsContainer = $('#products'); 


        if (Array.isArray(data) && data.length > 0) {
            productsContainer.empty(); 

            data.forEach(product => {
                const productCard = `
                    <figure class="card" name="${product.idProducto}">
                        <img src="${product.imagen}" alt="Imagen de ${product.nombre}">
                        <p class="desc">${product.categoria}</p>
                        <h2 class="title">${product.nombre}</h2>
                        <div class="box">
                            <div class="priceDel">
                                <div class="price">$${product.precio}</div>
                                <button class="del btnCard">Delete</button>
                            </div>
                            <div class="stock">
                                <div class="stock-info">
                                    <label>Stock</label>
                                </div>
                                <div class="botones">
                                    <button class="btnCard">-</button>
                                    <label id="stock">${product.stock}</label>
                                    <button class="btnCard">+</button>
                                </div>
                            </div>
                        </div>
                    </figure>
                `;
                productsContainer.append(productCard);
            });
        } else {
            productsContainer.append('<p>No hay productos disponibles.</p>');
        }

        $(".del").click(function() {

            const confirmation = confirm("¿Estás seguro de que deseas eliminar este producto?");
            if (confirmation) {
                $(this).closest('figure').remove(); 
                let id = $(this).closest('figure').attr('name');
                fetch('../../logica/deleteproduct.php', {
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













    })
    .catch(error => console.error('Error:', error));
});

