






$("#crear").click(function() {
    event.preventDefault();

    nombre = $("#nombre").val();
    categoria = $("#categoria").val();
    descripcion = $("#descripcion").val();
    precio = $("#precio").val();
    stock = $("#stock").val();
    var fileInput = $('#imagen')[0];
    var file = fileInput.files[0];
    var formData = new FormData();

    formData.append('file', file);
    formData.append('nombre', nombre);
    formData.append('categoria', categoria);
    formData.append('descripcion', descripcion);
    formData.append('precio', precio);
    formData.append('stock', stock);
    
    fetch('../../logica/createProduct.php', {
        method: 'POST',
        body: formData

    })
    .then(response => response.text())
    .then(data => {
              console.log(data)
            })
    .catch(error => console.error('Error:', error))
});