<?php
    session_start();
    include 'db.inc.php';

    if($_POST['current']=='all'){
        $db = new UserManager();
        $conn = $db->createConnection();
        //get users status 
        $status = $db->viewAllStatus($conn);
        echo json_encode($status);
    }else if($_POST['current']=='one'){
        $db = new UserManager();
        $conn = $db->createConnection();
        //update the time and state
        //create time
        $time = date("Y-m-d h:i:sa");
        $db->updateStatus($conn,"online",$time,$_SESSION['user_id'],$db->getUpdateStatus());
    }
