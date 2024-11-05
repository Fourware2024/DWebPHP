$("#Comprar").click(function(){
    console.log("hola");
    fetch('paypal_payment.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            amount: 10, 
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