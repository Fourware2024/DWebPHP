
$("#signButton").click(validarSignUser);

function validarSignUser() {
    event.preventDefault();

    nameP = $("#name").val();
    surname = $("#surname").val();
    username = $("#username").val();
    email = $("#email").val();
    tel = $("#tel").val();
    password = $("#password").val();
    passConf = $("#confirmPass").val();
    error =  $("#error");

    const nombreApellidoRegex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,20}$/;
    const usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const telRegex = /^[0-9\s]{9}$/;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/;

    const user  = 
        {
            "name": nameP,
            "surname": surname,
            "username": username,
            "email": email,
            "tel": tel,
            "password": password
          };



    if (!nombreApellidoRegex.test(nameP)) {
        error.html("Tu nombre debe contener entre 3 y 20 caracteres");
    } else if(!nombreApellidoRegex.test(surname)) {
        error.html("Tu apellido debe contener entre 3 y 20 caracteres");
    } else if(!usernameRegex.test(username)) {
        error.html("Tu nombre de usuario debe contener entre 3 y 20 caracteres, solo letras, números y guiones bajos");
    } else if(!emailRegex.test(email)) {
        error.html("Tu correo electrónico no es válido");
    } else if(!telRegex.test(tel)) {
        error.html("Tu teléfono debe contener 9 dígitos");
    } else if(!passwordRegex.test(password)) {
        error.html("Tu contraseña debe contener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número");
    } else if(password !== passConf){
        error.html("Las contraseñas no coinciden");
    } else {
        fetch('../../logica/registerUser.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(user)
          })
          .then(response => response.text())
          .then(data => {
            console.log(data)
          })
          .catch(error => console.error('Error:', error))
        
    }

}