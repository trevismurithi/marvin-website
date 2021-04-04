paypal.Buttons({
    createOrder: function (data, actions) {
        var amount = document.getElementById("fee");
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: amount.innerText.substring(1)
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
            );
        });
    },
    onCancel: function (data) {
        //send to cancelled transaction
        window.location.replace("http://www.essaypro.website/order.php");
    }
}).render('#paypal-button-container'); // Display payment options on your web page


function saveTransfer(paypal_id,paypal_address,paypal_email,paypal_name,paypal_status){
    //access the order number
    var order_id = document.getElementById("order_id");
    if (isNaN(parseInt(order_id.innerText))){
        window.location.replace("http://www.essaypro.website/order.php");
    }
    url="../include/payment.inc.php";
    param="paypal_id="+paypal_id+"&paypal_address="+paypal_address+
            "&paypal_email="+paypal_email+"&paypal_name="+paypal_name+
            "&paypal_status="+paypal_status+"&order_id="+order_id.innerText;
    let xttp = new XMLHttpRequest();
    xttp.open("POST",url,true);
    xttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xttp.onreadystatechange = function(){
        if(this.status==200 && this.readyState==4){
            //after succesful response back
            if(this.responseText == "ok"){
                window.location.replace("http://localhost:4000/success.php");
            }else{
                window.location.replace("http://localhost:4000/order.php?error=failedpayment");
            }
        }
    };
    xttp.send(param);
}