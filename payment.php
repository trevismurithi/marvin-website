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
            <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_7W0ppe.json"  
            background="transparent"  speed="1"  
            style="width: 400px; height: 400px;"  loop  autoplay>
            </lottie-player>
            <div class="success-page-2">
                <h2>Start tracking your order</h2>
                <p>Your project has been transferred to progress.</p>
                <p>You will be assigned a writer,</p>
                <p>Chat with the Support or writer in case of anything,</p>
                <p>When your order is complete it will be transferred to completed tasks,</p>
                <p>You can also reach us through support@essaypro.website for immediate feedback.</p>
            </div>
        </div>
    </div>
</main>
<?php include_once 'footer.php'?>