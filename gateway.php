<script src="https://www.paypal.com/sdk/js?&client-id=AczgWiTgHZZMaEMuAHZTseLxcqZZ8x8C-6omZTCm109mn8X2T-xCRXc4hOMMztB_HNvJsFK6DGw4h8on"></script>
<?php require 'header.php';
if (isset($_SESSION['user_id'])) {
    if(isset($_GET['order_id'])){
        include_once 'include/db.inc.php';
        $db = new UserManager();
        $conn = $db->createConnection();
        $order_id = $_GET['order_id'];
        $object = $db->singleOrder($conn,$order_id);
        $sector = $object[0][0];
        $type = $object[0][1];
        $category = $object[0][2];
        $duration = $object[0][3];
        $spacing = $object[0][4];
        $pages = $object[0][5];
        $deadline = $object[0][6];
        $fee = $object[0][7];
        echo '<script>let id="'.base64_encode($order_id).'"; let myPrice="'.base64_encode($fee).'";  </script>';
    }else{
        header('Location: order.php?error=order_id');
        exit();
    }
}else{
    header('Location: login.php?error=noUser');
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
                <div class="checkout-details-list">
                    <ul id="checkout-specific">
                        <li>Order Number:</li>
                        <li>Sector:</li>
                        <li>Type:</li>
                        <li>Category:</li>
                        <li>Duration:</li>
                        <li>Spacing:</li>
                        <li>Pages:</li>
                        <li>Deadline:</li>
                        <li>Fee:</li>          
                    </ul>
                    <ul>
                        <?php
                            echo'
                                <li id="order_id">'.$order_id.'</li>
                                <li>'.$sector.'</li>
                                <li>'.$type.'</li>
                                <li>'.$category.'</li>
                                <li>'.$duration.'</li>
                                <li>'.$spacing.'</li>
                                <li>'.$pages.'</li>
                                <li>'.$deadline.'</li>
                                <li id="fee">'.$fee.'</li>
                            ';
                        ?>
                    </ul>
                </div>
                <div class="cash-in">
                    <h3>Choose Payment Method</h3>
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Add the checkout buttons, set up the order and approve the order -->
<script src="js/loader.js"></script>
<?php require 'footer.php';?>
