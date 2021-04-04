<?php
    include_once 'db.inc.php';
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
            echo "ok";
        }else{
            echo "order_id error";
        }
    }else{
        echo "user_id error";    
    }