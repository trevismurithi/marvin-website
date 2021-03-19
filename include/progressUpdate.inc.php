<?php
    include_once 'db.inc.php';
    //load the orders based on the users request
    if(isset($_POST['user_id'])){
        //load the connections
        $db = new UserManager();
        $conn = $db->createConnection();
        //update the orders
        $db->updateOrder($conn,$_POST['state'],$_POST['order_id']);
    }