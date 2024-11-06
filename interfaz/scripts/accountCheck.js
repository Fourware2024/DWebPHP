$("#account").click(accountClick);

function accountClick() {
    fetch('../../logica/accountCheck.php')
    .then(response => response.text())
    .then(data => {
        console.log(data);
        if(data == true) {
            location.href="../pages/panel.php";
        }else if(data == false){
            location.href="../pages/login.html";
        }


    })
    .catch(error => console.error('Error:', error));
}