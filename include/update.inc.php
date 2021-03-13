<?php
    include 'db.inc.php';
    $receive = $_GET['receiver'];
    $user_id = $_GET['user_id'];
    $db = new UserManager();
    $conn = $db->createConnection();
    $receiver = $db->senders($conn,$user_id);
    //merge both of the messages
    $messages = array_merge($sender,$receiver);
    //sort them in the same way they were sent
    ksort($messages);

