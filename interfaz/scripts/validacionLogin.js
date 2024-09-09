$("#loginButton").click(validacionLogin);

function validacionLogin() {
    event.preventDefault();

    let username = $("#usernameLogin").val();
    let password = $("#passwordLogin").val();
    let error = $("#error");

    const user = {
        "username": username,
        "password": password,
    };
    
    fetch('../../logica/loginConfirmation.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(user)
    })
    .then(response => response.json())
    .then(data => { 
        if(data.result) {
            console.log("Login successful!");
            location.href="http://localhost/proyecto/DWebPHP/interfaz/pages/index.html";
        }else {
            console.log("Login failed!");
            error.html("El nombre de usuario o la contraseña son incorrectos")
        }

    })
    .catch(error => console.error('Error:', error));
}
