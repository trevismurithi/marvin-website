<?php
include_once 'header.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php?error=nouser');
    exit();
}
?>
<main>
    <div class="success-page">
        <div class="success-page-1">
        <lottie-player src="https://assets2.lottiefiles.com/private_files/lf30_jq4i7W.json"  
        background="transparent"  
        speed="1"  
        style="width: 300px; height: 300px;"  
        loop  
        autoplay>
        </lottie-player>
            <div class="success-page-2">
                <h2>Cancelled order</h2>
                <p>Something went wrong with the payment process</p>
                <p>Kindly try again with the payment.</p>
                <p>Chat with the Support or writer if the problem continues</p>
                <p>When your order is complete it will be transferred to completed tasks,</p>
                <p><a href="https://www.essaypro.website/order.php"></a></p>
                <p>You can also reach us through support@essaypro.website for immediate feedback.</p>
            </div>
        </div>
    </div>
</main>
<?php include_once 'footer.php'?>