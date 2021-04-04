paypal.Buttons({
    createOrder: function (data, actions) {
        var amount = document.getElementById("fee");
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: amount
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            //save the transaction
            saveTransfer(
                details.id,
                details.payer.address.country_code,
                details.payer.email_address,
                details.payer.name.given_name,
                details.status,
                details.create_time
            );
        });
    },
    onCancel: function (data) {
        //send to cancelled transaction
    }
}).render('#paypal-button-container'); // Display payment options on your web page


function saveTransfer(paypal_id,paypal_address,paypal_email,paypal_name,paypal_status,create_time){
    //access the order number
}