<?php include_once 'header.php'?>
<script src="https://www.paypal.com/sdk/js?&client-id=AczgWiTgHZZMaEMuAHZTseLxcqZZ8x8C-6omZTCm109mn8X2T-xCRXc4hOMMztB_HNvJsFK6DGw4h8on"></script>

<div id="paypal-button-container"></div>

<!-- Add the checkout buttons, set up the order and approve the order -->
<script>
    paypal.Buttons({
    createOrder: function(data, actions) {
        return actions.order.create({
        purchase_units: [{
            amount: {
            value: '0.01'
            }
        }]
        });
    },
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
        alert('Transaction completed by ' + details.payer.name.given_name);
        console.log(details);
        });
    }
    }).render('#paypal-button-container'); // Display payment options on your web page
</script>
<?php include_once 'footer.php'?>