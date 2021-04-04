<?php require 'header.php';
session_start();
if ($_SESSION['user_id']) {
    if(isset($_POST['submit'])){
        $order_id = $_POST['order_id'];
        $sector = $_POST['sector'];
        $type = $_POST['type'];
        $category = $_POST['category'];
        $duration = $_POST['duration'];
        $spacing = $_POST['spacing'];
        $pages = $_POST['pages'];
        $deadline = $_POST['deadline'];
        $fee = $_POST['fee'];
    }else{
        header('Location: order.php?access=denied');
        exit();
    }
}else{
    header('Location: login.php?access=denied');
    exit();
}
?>
<main>
    <div class="checkout-body">
        <div class="checkout-card">
            <div class="checkout-title">
                <h3>Make Your Payment Here</h3>
            </div>
            <div class="checkout-details">
                <ul id="checkout-specific">
                    <li>Order Number:</li>
                    <li>Sector:</li>
                    <li>Type:</li>
                    <li>Category:</li>
                    <li>Dureation:</li>
                    <li>Spacing:</li>
                    <li>Pages:</li>
                    <li>Deadline:</li>
                    <li>Fee:</li>          
                </ul>
                <ul>
                    <?php
                        echo'
                            <li>'.$order_id.'</li>
                            <li>'.$sector.'</li>
                            <li>'.$type.'</li>
                            <li>'.$category.'</li>
                            <li>'.$duration.'</li>
                            <li>'.$spacing.'</li>
                            <li>'.$pages.'</li>
                            <li>'.$deadline.'</li>
                            <li id="fee" value="'.$fee.'">'.$fee.'</li>
                        ';
                    ?>
                </ul>
                <div class="cash-in">
                    <h3>Choose Payment Method</h3>
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://www.paypal.com/sdk/js?&client-id=AczgWiTgHZZMaEMuAHZTseLxcqZZ8x8C-6omZTCm109mn8X2T-xCRXc4hOMMztB_HNvJsFK6DGw4h8on"></script>
<!-- Add the checkout buttons, set up the order and approve the order -->

<?php require 'footer.php';?>
