<?php
    include 'db.inc.php';
    $receive = $_GET['receiver'];
    $user_id = $_GET['user_id'];
    $db = new UserManager();
    $conn = $db->createConnection();
    $sender = $db->userMessages($conn,$receive,$user_id);
    $receiver = $db->userMessages($conn,$user_id,$receive);
    //merge both of the messages
    $messages = array_merge($sender,$receiver);
    //sort them in the same way they were sent
    ksort($messages);
    foreach ($messages as $key => $value) {
        //depending on the user id it will show text
        if($value[1]==$receive){
            echo'
                <div class="seller">
                    <div class="receive">
                        <p id=receive>'.$value[0].'</p>
                        <p id="time">'.date('l jS \of F Y h:i:s A', strtotime($key)).'</p>
                    </div>
                </div>
            ';
        }else if($value[1]==$user_id){
            echo '
                <div class="buyer">
                    <div></div>
                    <div class="sent">
                        <p>'.$value[0].'</p>
                        <p id="time">'.date('l jS \of F Y h:i:s A', strtotime($key)).'</p>
                    </div>
                </div>
            ';
        }  
    }
