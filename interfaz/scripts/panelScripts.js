$('#cargaImagen').on('change', cambioImg);

function cambioImg() {
    var fileInput = $('#cargaImagen')[0];
    var file = fileInput.files[0];
    var formData = new FormData();
    formData.append('file', file);

    fetch('../../logica/changeProfileImg.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


