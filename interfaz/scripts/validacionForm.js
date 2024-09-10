
$("#signButtonUser").click(validarSignUser);
$("#signButtonEmpresa").click(validarSignEmpresa);

function validarSignUser() {
    event.preventDefault();

    nameUser = $("#nameUser").val();
    surnameUser = $("#surnameUser").val();
    usernameUser = $("#usernameUser").val();
    emailUser = $("#emailUser").val();
    telUser = $("#telUser").val();
    passwordUser = $("#passwordUser").val();
    passConfUser = $("#confirmPassUser").val();
    errorUser =  $("#errorUser");

    const nombreApellidoRegex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,20}$/;
    const usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const telRegex = /^[0-9\s]{9}$/;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/;

    const user  = 
        {
            "name": nameUser,
            "surname": surnameUser,
            "username": usernameUser,
            "email": emailUser,
            "tel": telUser,
            "password": passwordUser
          };

    
    fetch('../../logica/checkUsernameUser.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'username=' + encodeURIComponent(usernameUser)
      })
      .then(response => response.text())
      .then(data => {
        if (data === 'true') {
          errorUser.html("El nombre de usuario ya existe");
        } else {
          
          if (!nombreApellidoRegex.test(nameUser)) {
            errorUser.html("Tu nombre debe contener entre 3 y 20 caracteres");
          } else if(!nombreApellidoRegex.test(surnameUser)) {
            errorUser.html("Tu apellido debe contener entre 3 y 20 caracteres");
          } else if(!usernameRegex.test(usernameUser)) {
            errorUser.html("Tu nombre de usuario debe contener entre 3 y 20 caracteres, solo letras, números y guiones bajos");
          } else if(!emailRegex.test(emailUser)) {
            errorUser.html("Tu correo electrónico no es válido");
          } else if(!telRegex.test(telUser)) {
            errorUser.html("Tu teléfono debe contener 9 dígitos");
          } else if(!passwordRegex.test(passwordUser)) {
            errorUser.html("Tu contraseña debe contener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número");
          } else if(passwordUser !== passConfUser){
            errorUser.html("Las contraseñas no coinciden");
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
            location.href="../pages/login.html";
          }
        }
      })
      .catch(error => console.error('Error:', error))
}

function validarSignEmpresa() {
    event.preventDefault();

    nameEmp = $("#nameEmp").val();
    emailEmp = $("#emailEmp").val();
    telEmp = $("#telEmp").val();
    passwordEmp = $("#passwordEmp").val();
    passConfEmp = $("#confirmPassEmp").val();
    errorEmp =  $("#errorEmp");

    const usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const telRegex = /^[0-9\s]{9}$/;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/;

    const user  = 
        {
            "name": nameEmp,
            "email": emailEmp,
            "tel": telEmp,
            "password": passwordEmp
          };

    fetch('../../logica/checkUsernameEmp.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'username=' + encodeURIComponent(nameEmp)
      })
      .then(response => response.text())
      .then(data => {
      if (data === 'true') {
        errorEmp.html("El nombre de usuario ya existe");
      } else {
        if (!usernameRegex.test(nameEmp)) {
          errorEmp.html("Tu nombre debe contener entre 3 y 20 caracteres");
        } else if(!emailRegex.test(emailEmp)) {
          errorEmp.html("Tu correo electrónico no es válido");
        } else if(!telRegex.test(telEmp)) {
          errorEmp.html("Tu teléfono debe contener 9 dígitos");
        } else if(!passwordRegex.test(passwordEmp)) {
          errorEmp.html("Tu contraseña debe contener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número");
        } else if(passwordEmp !== passConfEmp){
          errorEmp.html("Las contraseñas no coinciden");
        } else {
          fetch('../../logica/registerSeller.php', {
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
          location.href="../pages/login.html";
      }
    }
  }).catch(error => console.error('Error:', error))
}


