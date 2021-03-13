<?php
    include 'db.inc.php';
    $db = new UserManager();
    //create the connection
    $conn = $db->createConnection();
    //insert message and update the user
    $db->insertMessage($conn,$_GET['message'],$_GET['receiver'],$_GET['user_id']);