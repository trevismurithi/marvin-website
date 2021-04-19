<?php
    include_once 'db.inc.php';
    include_once 'html.inc.php';
    session_start();
    if($_SESSION['user_id']){
        if(isset($_POST['order_id'])){
            $paypal_id = $_POST['paypal_id'];
            $paypal_address = $_POST['paypal_address'];
            $paypal_email = $_POST['paypal_email'];
            $paypal_name = $_POST['paypal_name'];
            $paypal_status = $_POST['paypal_status'];
            $order_id = $_POST['order_id'];
            //save the payment details
            $db = new UserManager();
            $conn = $db->createConnection();
            $db->insertPayment($conn,$paypal_id,$paypal_address,$paypal_email,$paypal_name,$paypal_status,$order_id,$_SESSION['user_id']);
            //tranfer project to progress
            $db->updateOrder($conn,"progress",$order_id);
            // send email to Admin
            $to = "trevismurithi@gmail.com";
            $subject = "Order Alert";
            $headers = "CC: tyresewaithaka@gmail.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $msg = "<p>".$_SESSION['username']." has registered to your website.</p>
            <p>The clients website details are:</p> 
            <p>".$_SESSION['email']."</p>
            <p>".$_SESSION['phone']."</p>
            <p>".$_SESSION['user_id']."</p>
            <p>Has made payment for an order with the id ".$order_id."</p>
            <p>Kindly contact the client and assign a writer</p>";
            mail($to,$subject,messageEdit("Support Team",$msg),$headers);
            echo "ok";
        }else{
            echo "order_id error";
        }
    }else{
        echo "user_id error";    
    }