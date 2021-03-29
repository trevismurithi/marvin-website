<?php
    include 'db.inc.php';
    if(isset($_POST['user_id'])){
        $db = new UserManager();
        //create the connection
        $conn = $db->createConnection();
        //insert message and update the user
        $db->insertMessage($conn,$_POST['message'],$_POST['receiver'],$_POST['user_id']);
    }