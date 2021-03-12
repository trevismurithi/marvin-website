<?php
    include 'db.inc.php';
    $db = new UserManager();
    //create the connection
    $conn = $db->createConnection();
    //insert message and update the user
    $db->insertMessage($conn,$_GET['message'],$_GET['receiver'],$_GET['user_id']);
    // $sender = $db->userMessages($conn,$_GET['receiver'],$_GET['user_id']);
    // $receiver = $db->userMessages($conn,$_GET['user_id'],$_GET['receiver']);
    // //merge both of the messages
    // $messages = array_merge($sender,$receiver);
    // //sort them in the same way they were sent
    // ksort($messages);
    // foreach ($messages as $key => $value) {
    //     //depending on the user id it will show text
    //     if($value[1]==$_GET['receiver']){
    //         echo'
    //             <div class="seller">
    //                 <div class="receive">
    //                     <img src="img/writer.jpg" alt="">
    //                     <p id=receive>'.$value[0].'</p>
    //                     <p id="time">'.date('l jS \of F Y h:i:s A', strtotime($key)).'</p>
    //                 </div>
    //             </div>
    //         ';
    //     }else if($value[1]==$_GET['user_id']){
    //         echo '
    //             <div class="buyer">
    //                 <div></div>
    //                 <div class="sent">
    //                     <img src="img/dwayne.png" alt="">
    //                     <p>'.$value[0].'</p>
    //                     <p id="time">'.date('l jS \of F Y h:i:s A', strtotime($key)).'</p>
    //                 </div>
    //             </div>
    //         ';
    //     }  
    // }
    // $conn->close();